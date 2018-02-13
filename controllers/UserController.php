<?php
namespace app\controllers;

use Yii;
use yii\web\controller;


// Мы расширяем базовый класс
class UserController extends Controller
{
    public $defaultAction = 'info';

    // Return User Info
    public function actionInfo()
    {
        $request =  Yii::$app->request;

        $userHost = $request->userHost;

        return YII_ENV_DEV;
        //var_dump( $userHost );
        //return $this->render('info' );
    }

    public function actionIp()
    {
        $request = YII::$app->request;
        $userIP =  $request->userIP;
        return $userIP;
    }

    // Return json data
    // Здесь мы научились возвращать значение типа Json
    // По умолчанию возвращает HTML
    public function actionJson()
    {
        $response = Yii::$app->response;
        $response->format = 'json';
        $response->data = ['message' => 'Json data',
            'array'=> [1, 2, 3]
            ];
        return $response;
    }

}