<?php

namespace  app\controllers;

use Yii;
use yii\web\Controller;


class DbController extends Controller
{
    public $defaultAction = 'home';



    // return Response object
    // By default returns HTML response
    public function actionUsers()
    {
        $dbObject = Yii::$app->db;

        $users = $dbObject->createCommand('Select * FROM users')->queryAll();

        $response = Yii::$app->response;
        $response->format = 'json';
        $response->data = $users;
        return $response;
    }


    // ONE ITEM
    public function actionUser()
    {
        $dbObject = Yii::$app->db;

        $user = $dbObject->createCommand('Select * FROM users WHERE Id=1')->query();

        $response = Yii::$app->response;
        $response->format = 'json';
        $response->data = $user;

        return $response;
    }


    // Return user count
    public function actionUserCount()
    {
        $dbObject = Yii::$app->db;

        $userCount = $dbObject->createCommand('Select COUNT(*) FROM users')->queryScalar();

        $response = Yii::$app->response;
        $response->format = 'json';
        $response->data = $userCount;

        return $response;
    }



    // FILTER
    public function actionUserFiltered()
    {
        $dbObject = Yii::$app->db;

        $params = [ ':Id'=> 1,
                    ':FirstName' => 'Serik'
        ];

        $users = $dbObject->createCommand('SELECT * FROM users WHERE Id=:Id AND FirstName=:FirstName')
                        ->bindValues($params)->queryAll();

        $response = Yii::$app->response;
        $response->format = 'json';
        $response->data = $users;

        return $response;
    }



    // INSERT
    public function actionInsertUser()
    {
        $dbObject = Yii::$app->db;

        $result = $dbObject->createCommand()->insert('users', [
            'FirstName' => 'Araylim',
            'LastName' => 'Shaikamalova'
        ])->execute();

        $response = Yii::$app->response;
        $response->format = 'json';
        $response->data = $result;

        return $response;
    }


    // UPDATE
    public function actionUpdateUser()
    {
        $dbObject = Yii::$app->db;

        $result = $dbObject->createCommand()->update('users', [
            'LastName' => 'Ushkempir'
        ], 'LastName = "Shaikamalova"')->execute();

        $response = Yii::$app->response;
        $response->format = 'json';
        $response->data = $result;

        return $response;
    }

    // DELETE
    public function actionDeleteUser()
    {
        $dbObject = Yii::$app->db;

        $result = $dbObject->createCommand()->delete('users', [
            'LastName' => 'Ushkempir'
        ])->execute();

        $response = Yii::$app->response;
        $response->format = 'json';
        $response->data = $result;

        return $response;
    }


    // PAGINATION
    public function actionUserPagination()
    {

    }

    // SIMPLE SEARCH
    public function actionUserSearch()
    {

    }




}