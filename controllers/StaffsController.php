<?php

namespace app\controllers;

use yii;
use yii\web\Controller;
use app\models\Staff;


class StaffsController extends Controller
{
    public $defaultAction = 'index';


    public function actionIndex()
    {
        return $this->render('index');
    }


    /*
     * return: Staffs
     */
    public function actionList()
    {
        $staffs = Staff::find()
            ->select(['Id', 'Title', 'IsActive'])
            ->all();


        $response = YII::$app->response;
        $response->format = 'json';
        $response->data = $staffs;

        return $response;
    }

    /*
     * Staff By Id
     */
    public function actionStaffById( $Id = 1 )
    {
        $staffs = Staff::find()->where( ['Id' => $Id] )->all();

        $response = YII::$app->response;
        $response->format = 'json';
        $response->data = $staffs;

        return $response;
    }



    /*
     * Search By Title Live Search
     */
    public function actionSearchByTitle( $Title = null )
    {

        $staffs = Staff::find()
            ->where(['LIKE', 'Title', $Title])
            ->all();

        $response = YII::$app->response;
        $response->format = 'json';
        $response->data = $staffs;

        return $response;
    }


    /*
     * Insert new Staff
     */
    public function actionInsert()
    {
        $staff = new Staff();
        $staff->Title = 'Berik';
        $staff->IsActive = 1;
        $result = $staff->save();

        $response = YII::$app->response;
        $response->format = 'json';
        $response->data = $result;

        return $response;
    }



    /*
     * Update existing Staff
     */
    public function actionUpdate( $Id )
    {
        $result = false;

        if( isset($Id) ){
            // Find Staff
            $staff = Staff::findOne($Id);
            $staff->Title = 'Biko';
            $staff->IsActive = 0;
            $result = $staff->save();

            $response = YII::$app->response;
            $response->format = 'json';
            $response->data = $result;
        }

        return $response;
    }


    /*
     * Delete staff by Id
     */

    public function actionDelete( $Id )
    {
        $result = 0;

        if( $Id )
        {
            $result = Staff::findOne($Id)->delete();
        }
        return $result;
    }



}