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











}