<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;


class Staff extends ActiveRecord
{
//    public $Id;
//    public $Title;
//    public $IsActive;


    public static function  tableName()
    {
        return 'staffs';
    }





}