<?php
namespace app\models;
use Yii;
use \yii\db\ActiveRecord;

/**
 * @property integer $Id
 * @property string $Title
 * @property integer $IsActive
 * @property string $FullName
 * @property string $PositionTitle
 * @property string $ResearchGroupTitle
 * @property string $ShortBiography
 * @property string $AvatarPath
 */
class Staff extends ActiveRecord
{
    public static function tableName()
    {
        return 'staffs';
    }

    public function rules()
    {
        return [
            [['IsActive', 'ImageManager_id_avatar'], 'integer'],
            [['ShortBiography'], 'string'],
            [['Title', 'AvatarPath'], 'string', 'max' => 255],
            [['FullName', 'PositionTitle', 'ResearchGroupTitle'], 'string', 'max' => 200],
        ];
    }

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
            'ImageManager_id_avatar' => 'Image'
        ];
    }
}