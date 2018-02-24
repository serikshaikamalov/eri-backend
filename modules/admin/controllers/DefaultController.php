<?php
namespace app\modules\admin\controllers;
use yii\web\Controller;

class DefaultController extends AdminBaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}