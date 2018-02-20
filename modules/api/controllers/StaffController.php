<?php
namespace app\modules\api\controllers;

use app\models\Staff;
use Yii;
use yii\web\Controller;
use app\modules\api\models\StaffVM;


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

    /*
     * Allow access to FrontEnd
     */
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'corsFilter'  => [
                'class' => \yii\filters\Cors::className(),
                'cors'  => [
                    'Origin'                           => static::allowedDomains(),
                    'Access-Control-Request-Method'    => ['POST'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age'           => 3600,
                ],
            ],
        ]);
    }

    /*
     * @returns:  List of staffs
     */
    public function actionList()
    {
        $staffVMList = array();

        // Find Staffs
        $staffs = Staff::find()->all();

        if( count($staffs) > 0 ){
            for ( $i=0; $i < count($staffs); $i++){
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


    /*
     * @return staff by Id
     */
    public function actionGetStaff( $id )
    {
        if( $id ){
            $staffVM = new StaffVM();

            $staff = Staff::findOne($id);

           if( $staff ){
                   $staffVM->Id = $staff->Id;
                   $staffVM->FullName = $staff->FullName;
                   $staffVM->PositionTitle = $staff->PositionTitle;
                   $staffVM->ResearchGroupTitle = $staff->ResearchGroupTitle;
                   $staffVM->ShortBiography = $staff->ShortBiography;
                   $staffVM->ImageSrc =  Yii::$app->imagemanager->getImagePath($staff->ImageManager_id_avatar, 400, 400,'inset');
            }

            $response = Yii::$app->response;
            $response->format = 'json';
            $response->data = $staff->ImageManager_id_avatar;
            return $response;
        }
    }
}
