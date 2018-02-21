<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Events;

/**
 * EventsSearch represents the model behind the search form of `app\models\Events`.
 */
class EventsSearch extends Events
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'EventCategoryId', 'LangId', 'CreatedBy', 'IsActive'], 'integer'],
            [['Title', 'StartTime', 'EndTime', 'Description', 'SpeakerFullName', 'CreatedDate', 'UpdatedDate'], 'safe'],
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
        $query = Events::find();

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
            'StartTime' => $this->StartTime,
            'EndTime' => $this->EndTime,
            'EventCategoryId' => $this->EventCategoryId,
            'LangId' => $this->LangId,
            'CreatedBy' => $this->CreatedBy,
            'CreatedDate' => $this->CreatedDate,
            'UpdatedDate' => $this->UpdatedDate,
            'IsActive' => $this->IsActive,
        ]);

        $query->andFilterWhere(['like', 'Title', $this->Title])
            ->andFilterWhere(['like', 'Description', $this->Description])
            ->andFilterWhere(['like', 'SpeakerFullName', $this->SpeakerFullName]);

        return $dataProvider;
    }
}
