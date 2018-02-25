<?php
namespace app\models;
use Yii;
use \yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * @property int $Id
 * @property string $Title
 * @property int $StatusId
 * @property int $LanguageId
 */
class StaffType extends ActiveRecord
{
    public static function tableName()
    {
        return 'staffType';
    }

    public function rules()
    {
        return [
            [['StatusId', 'LanguageId'], 'integer'],
            [['Title'], 'string', 'max' => 50],
        ];
    }

    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Title' => 'Title',
            'StatusId' => 'Status ID',
            'LanguageId' => 'Language ID',
        ];
    }


    /*
     * @return StaffType[]
     */
    public static function getStaffTypeList(){
        $staffTypes = StaffType::find()->all();
        return ArrayHelper::map($staffTypes, 'Id', 'Title');
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

}
