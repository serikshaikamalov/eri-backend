<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Staff;

/**
 * StaffSearch represents the model behind the search form about `app\models\Staff`.
 */
class StaffSearch extends Staff
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'IsActive'], 'integer'],
            [['Title', 'FullName', 'PositionTitle', 'ResearchGroupTitle', 'ShortBiography', 'AvatarPath'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Staff::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
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
