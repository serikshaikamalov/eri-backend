<?php
namespace app\models;
use Yii;
use \yii\db\ActiveRecord;

/**
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $user_id
 */
class Post extends ActiveRecord
{
    public static function tableName()
    {
        return 'post';
    }

    public function rules()
    {
        return [
            [['description'], 'string'],
            [['user_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'user_id' => 'User ID',
        ];
    }
}
