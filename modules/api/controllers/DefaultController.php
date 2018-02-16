<?php

namespace app\modules\api\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\web\Controller;

/**
 * Default controller for the `api` module
 */
class DefaultController extends Controller
{
    public $enableCsrfValidation = false;

    public static function allowedDomains()
    {
        return [
            // '*',                        // star allows all domains
            'http://localhost:4200'
        ];
    }

    public function behaviors()
    {
        return array_merge(parent::behaviors(), [

            // For cross-domain AJAX request
            'corsFilter'  => [
                'class' => \yii\filters\Cors::className(),
                'cors'  => [
                    // restrict access to domains:
                    'Origin'                           => static::allowedDomains(),
                    'Access-Control-Request-Method'    => ['POST'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age'           => 3600,                 // Cache (seconds)
                ],
            ],
        ]);

    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $response = Yii::$app->response;
        $response->format = 'json';
        $response->data = ['message' => 'Json data',
            'array'=> [1, 2, 3]
        ];
        return $response;
    }
}
