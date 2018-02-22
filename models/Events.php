<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property int $Id
 * @property string $Title
 * @property string $StartDay
 * @property string $StartTime
 * @property string $Description
 * @property int $EventCategoryId
 * @property int $LangId
 * @property string $SpeakerFullName
 * @property int $CreatedBy
 * @property string $CreatedDate
 * @property string $UpdatedDate
 * @property int $IsActive
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Title', 'StartDay', 'StartTime', 'LangId', 'EventCategoryId'], 'required'],
            [['StartDay', 'StartTime', 'CreatedDate', 'UpdatedDate'], 'safe'],
            [['Description'], 'string'],
            [['EventCategoryId', 'LangId', 'CreatedBy', 'IsActive'], 'integer'],
            [['Title', 'SpeakerFullName'], 'string', 'max' => 255],
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
            'StartDay' => 'Start Day',
            'StartTime' => 'Start Time',
            'Description' => 'Description',
            'EventCategoryId' => 'Event Category ID',
            'LangId' => 'Lang ID',
            'SpeakerFullName' => 'Speaker Full Name',
            'CreatedBy' => 'Created By',
            'CreatedDate' => 'Created Date',
            'UpdatedDate' => 'Updated Date',
            'IsActive' => 'Is Active',
        ];
    }
}
