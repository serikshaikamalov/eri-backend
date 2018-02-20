<?php
namespace app\modules\admin\controllers;
use yii\web\Controller;

class BaseController extends Controller
{

    public function __construct($id, Module $module, array $config)
    {
        parent::__construct($id, $module, $config);
    }

}