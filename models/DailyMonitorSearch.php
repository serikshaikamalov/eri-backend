<?php
namespace app\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DailyMonitor;

class DailyMonitorSearch extends DailyMonitor
{
    public function rules()
    {
        return [
            [['Id', 'LanguageId', 'ImageId', 'CreatedBy'], 'integer'],
            [['Title', 'Description', 'Link', 'IsActive', 'CreatedDate'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }
    
    public function search($params)
    {
        $query = DailyMonitor::find();

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
            'LanguageId' => $this->LanguageId,
            'ImageId' => $this->ImageId,
            'CreatedBy' => $this->CreatedBy,
            'CreatedDate' => $this->CreatedDate,
        ]);

        $query->andFilterWhere(['like', 'Title', $this->Title])
            ->andFilterWhere(['like', 'Description', $this->Description])
            ->andFilterWhere(['like', 'Link', $this->Link])
            ->andFilterWhere(['like', 'IsActive', $this->IsActive]);

        return $dataProvider;
    }
}
