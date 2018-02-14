<?php

namespace  Controllers;

use \Yii;
use \Yii\web\Controller;


public class DbController extends Controller
{
    public $defaultAction = 'home';


    public function actionHello()
    {

        return 1;
    }


}