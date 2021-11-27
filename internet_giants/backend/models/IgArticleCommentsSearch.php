<?php
/**
 *  author: Liuxubo 1911440
 *  date: 2021/11/24
 * 
 *  */
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\IgArticleComments;

/**
 * IgArticleCommentsSearch represents the model behind the search form of `app\models\IgArticleComments`.
 */
class IgArticleCommentsSearch extends IgArticleComments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['com_id', 'art_id'], 'integer'],
            [['us_id', 'com_content', 'com_username', 'com_date'], 'safe'],
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
        $query = IgArticleComments::find();

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
            'com_id' => $this->com_id,
            'art_id' => $this->art_id,
            'com_date' => $this->com_date,
        ]);

        $query->andFilterWhere(['like', 'us_id', $this->us_id])
            ->andFilterWhere(['like', 'com_content', $this->com_content])
            ->andFilterWhere(['like', 'com_username', $this->com_username]);

        return $dataProvider;
    }
}
