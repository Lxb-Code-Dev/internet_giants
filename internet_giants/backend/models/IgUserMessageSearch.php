<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\IgUserMessage;

/**
 * IgUserMessageSearch represents the model behind the search form of `app\models\IgUserMessage`.
 */
class IgUserMessageSearch extends IgUserMessage
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['us1_id'], 'integer'],
            [['us_id', 'us1_name', 'us1_content', 'us1_date'], 'safe'],
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
        $query = IgUserMessage::find();

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
            'us1_id' => $this->us1_id,
            'us1_date' => $this->us1_date,
        ]);

        $query->andFilterWhere(['like', 'us_id', $this->us_id])
            ->andFilterWhere(['like', 'us1_name', $this->us1_name])
            ->andFilterWhere(['like', 'us1_content', $this->us1_content]);

        return $dataProvider;
    }
}
