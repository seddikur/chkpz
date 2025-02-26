<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tasks;

/**
 * TasksSearch represents the model behind the search form of `app\models\Tasks`.
 */
class TasksSearch extends Tasks
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'line', 'plan', 'fact'], 'integer'],
            [['date', 'operation', 'shift', 'workcenter', 'operator'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Tasks::find();

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
            'id' => $this->id,
            'date' => $this->date,
            'line' => $this->line,
            'plan' => $this->plan,
            'fact' => $this->fact,
        ]);

        $query->andFilterWhere(['like', 'operation', $this->operation])
            ->andFilterWhere(['like', 'shift', $this->shift])
            ->andFilterWhere(['like', 'workcenter', $this->workcenter])
            ->andFilterWhere(['like', 'operator', $this->operator]);

        return $dataProvider;
    }
}
