<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "eventCategory".
 *
 * @property int $Id
 * @property string $Title
 * @property int $IsActive
 * @property int $ParentId
 * @property int $LangId
 */
class EventCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'eventCategory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IsActive', 'ParentId', 'LangId'], 'integer'],
            [['LangId'], 'required'],
            [['Title'], 'string', 'max' => 50],
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
            'ParentId' => 'Parent ID',
            'LangId' => 'Lang ID',
        ];
    }
}
