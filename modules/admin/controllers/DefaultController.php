<?php
namespace app\modules\admin\controllers;

class DefaultController extends AdminBaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}