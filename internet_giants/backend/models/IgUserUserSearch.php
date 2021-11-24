<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\IgUserUser;

/**
 * IgUserUserSearch represents the model behind the search form of `app\models\IgUserUser`.
 */
class IgUserUserSearch extends IgUserUser
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['us_id', 'us_name', 'us_mail', 'us_password'], 'safe'],
            [['us_contribution'], 'integer'],
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
        $query = IgUserUser::find();

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
            'us_contribution' => $this->us_contribution,
        ]);

        $query->andFilterWhere(['like', 'us_id', $this->us_id])
            ->andFilterWhere(['like', 'us_name', $this->us_name])
            ->andFilterWhere(['like', 'us_mail', $this->us_mail])
            ->andFilterWhere(['like', 'us_password', $this->us_password]);

        return $dataProvider;
    }
}
