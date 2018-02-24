<?php
namespace app\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Staff;

class StaffSearch extends Staff
{
    public function rules()
    {
        return [
            [['Id', 'IsActive'], 'integer'],
            [['Title', 'FullName', 'PositionTitle', 'ResearchGroupTitle', 'ShortBiography', 'AvatarPath'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Staff::find();
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'Id' => $this->Id,
            'IsActive' => $this->IsActive,
        ]);

        $query->andFilterWhere(['like', 'Title', $this->Title])
            ->andFilterWhere(['like', 'FullName', $this->FullName])
            ->andFilterWhere(['like', 'PositionTitle', $this->PositionTitle])
            ->andFilterWhere(['like', 'ResearchGroupTitle', $this->ResearchGroupTitle])
            ->andFilterWhere(['like', 'ShortBiography', $this->ShortBiography])
            ->andFilterWhere(['like', 'AvatarPath', $this->AvatarPath]);

        return $dataProvider;
    }
}
