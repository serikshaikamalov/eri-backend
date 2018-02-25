<?php
namespace app\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class StaffSearch extends Staff
{
    public function rules()
    {
        return [
            [['Id', 'StatusId', 'ImageId'], 'integer'],
            [['FullName', 'PositionId', 'ResearchGroupId', 'ShortBiography'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Staff::find();
                    //->with('staffPosition');
        
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
            'StatusId' => $this->StatusId,
        ]);

        $query->andFilterWhere(['like', 'FullName', $this->FullName]);

        return $dataProvider;
    }
}
