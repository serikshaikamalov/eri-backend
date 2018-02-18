<?php

namespace app\modules\api\controllers;

use app\models\Staff;
use Yii;
use yii\rest\ActiveController;
use yii\web\Controller;
use app\modules\api\models\StaffVM;
/**
 * Default controller for the `api` module
 */
class StaffController extends Controller
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


    public function actionList()
    {
//        $staffs = Staff::find()
//            ->select('staffs.*, ImageManager.*')
//            ->leftJoin('ImageManager', 'ImageManager.id = staffs.ImageManager_id_avatar')
//            ->all();

//        $db = Yii::$app->db;
//        $staffs =  $db->createCommand('SELECT
//                                            *
//                                        FROM
//                                          Staffs AS s
//                                        LEFT JOIN ImageManager AS i
//                                        ON s.ImageManager_id_avatar = i.id')->queryAll();


        $staffVMList = array();
//        $staffVMList[] = 1;
//        $staffVMList[] = 2;


        // Find Staffs
        $staffs = Staff::find()->all();

        if( count($staffs) > 0 ){
            for ( $i=0; $i < count($staffs); $i++){

                //var_dump($staffs[$i]);

                $staffVM = new StaffVM();
                $staffVM->Id = $staffs[$i]->Id;
                $staffVM->FullName = $staffs[$i]->FullName;
                $staffVM->PositionTitle = $staffs[$i]->PositionTitle;
                $staffVM->ResearchGroupTitle = $staffs[$i]->ResearchGroupTitle;
                $staffVM->ShortBiography = $staffs[$i]->ShortBiography;

                $staffVM->ImageSrc =  Yii::$app->imagemanager->getImagePath($staffs[$i]->ImageManager_id_avatar, 400, 400,'inset');

                $staffVMList[] = $staffVM;
            }
        }
        $response = Yii::$app->response;
        $response->format = 'json';
        $response->data = $staffVMList;
        return $response;
    }



    public function actionGetStaff( $id )
    {
        if( $id ){
            $staff = Staff::findOne($id);

           if( $staff ){
                $staffVM = new StaffVM();
                   $staffVM->Id = $staff->Id;
                   $staffVM->FullName = $staff->FullName;
                   $staffVM->PositionTitle = $staff->PositionTitle;
                   $staffVM->ResearchGroupTitle = $staff->ResearchGroupTitle;
                   $staffVM->ShortBiography = $staff->ShortBiography;

                   $staffVM->ImageSrc =  Yii::$app->imagemanager->getImagePath($staff->ImageManager_id_avatar, 400, 400,'inset');
            }



            $response = Yii::$app->response;
            $response->format = 'json';
            $response->data = $staffVM;
            return $response;
        }
    }
}
