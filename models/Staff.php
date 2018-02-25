<?php
namespace app\models;
use Yii;
use \yii\db\ActiveRecord;

/**
 * @property integer $Id
 * @property integer $StatusId
 * @property string $FullName
 * @property string $StaffPositionId
 * @property string $ResearchGroupId
 * @property string $ShortBiography
 */
class Staff extends ActiveRecord
{
    public static function tableName()
    {
        return 'staff';
    }

    public function rules()
    {
        return [
            [['StatusId', 'ImageId', 'StaffPositionId', 'ResearchGroupId'], 'integer'],
            [['ShortBiography'], 'string'],
            [['FullName'], 'string', 'max' => 200],
        ];
    }

    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'StatusId' => 'Status',
            'FullName' => 'Full Name',
            'StaffPositionId' => 'Position',
            'ResearchGroupId' => 'Research Group',
            'ShortBiography' => 'Short Biography',
            'ImageId' => 'Image'
        ];
    }


    /**
     * RELATIONS
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage(){
        return $this->hasOne( Language::className(), ['Id' => 'LanguageId'] );
    }

    public function getStatus(){
        return $this->hasOne( Status::className(), ['Id' => 'StatusId'] );
    }

    public function getUser(){
        return $this->hasOne( User::className(), ['Id' => 'CreatedBy'] );
    }

    public function getStaffPosition(){
        return $this->hasOne( StaffPosition::className(), ['Id' => 'StaffPositionId'] );
    }
}