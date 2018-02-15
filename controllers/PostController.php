<?php

namespace app\controllers;

use Yii;
use yii\web\controller;

class PostController extends Controller
{

    public function  actionList()
    {
        $posts = \app\models\Post::find()->all();

        return $this->render('list', ['posts' => $posts]);
    }


}