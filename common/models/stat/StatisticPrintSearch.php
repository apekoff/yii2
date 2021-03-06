<?php

namespace common\models\stat;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\stat\StatisticPrint;

/**
 * StatisticPrintSearch represents the model behind the search form about `common\models\stat\StatisticPrint`.
 */
class StatisticPrintSearch extends StatisticPrint
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'company_id'], 'integer'],
            [['date'], 'safe'],
            [['price', 'original_balance'], 'number'],
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
        $query = StatisticPrint::find();

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
            'company_id' => $this->company_id,
            'date' => $this->date,
            'price' => $this->price,
            'original_balance' => $this->original_balance,
        ]);

        return $dataProvider;
    }
}
