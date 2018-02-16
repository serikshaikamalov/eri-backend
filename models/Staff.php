<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "staffs".
 *
 * @property integer $Id
 * @property string $Title
 * @property integer $IsActive
 * @property string $FullName
 * @property string $PositionTitle
 * @property string $ResearchGroupTitle
 * @property string $ShortBiography
 * @property string $AvatarPath
 */
class Staff extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'staffs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IsActive'], 'integer'],
            [['ShortBiography'], 'string'],
            [['Title', 'AvatarPath'], 'string', 'max' => 255],
            [['FullName', 'PositionTitle', 'ResearchGroupTitle'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Title' => 'Title',
            'IsActive' => 'Is Active',
            'FullName' => 'Full Name',
            'PositionTitle' => 'Position Title',
            'ResearchGroupTitle' => 'Research Group Title',
            'ShortBiography' => 'Short Biography',
            'AvatarPath' => 'Avatar Path',
        ];
    }
}