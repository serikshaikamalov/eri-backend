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
class StaffPosition extends ActiveRecord
{
    public static function tableName()
    {
        return 'staffPosition';
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


    public static function getStaffPositionList(){
        $staffPositions = StaffPosition::find()->all();
        return ArrayHelper::map($staffPositions, 'Id', 'Title');
    }
    

}
