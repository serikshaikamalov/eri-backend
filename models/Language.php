<?php
namespace app\models;
use Yii;

/**
 * @property int $Id
 * @property string $Title
 * @property int $IsDefault
 * @property int $IsActive
 * @property string $Code
 */
class Language extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'language';
    }


    public function rules()
    {
        return [
            [['Title', 'Code'], 'string', 'max' => 50],
            [['IsDefault', 'IsActive'], 'string', 'max' => 4],
        ];
    }

    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Title' => 'Title',
            'IsDefault' => 'Is Default',
            'IsActive' => 'Is Active',
            'Code' => 'Code',
        ];
    }
}
