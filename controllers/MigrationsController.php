<?php

namespace app\controllers;

use \yii;
use \yii\web\Controller;



class MigrationsController extends  Controller
{
    public $defaultAction = 'index';

    public function actionIndex()
    {
        return $this->render('Index');
    }

}