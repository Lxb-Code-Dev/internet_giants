<?php
/**
 *  author: Liuxubo 1911440
 *  date: 2021/11/22
 * 
 *  */
namespace frontend\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\IgArticleArticle;

/**
 * IgArticleArticleSearch represents the model behind the search form of `frontend\models\IgArticleArticle`.
 */
class IgArticleArticleSearch extends IgArticleArticle
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['art_id', 'art_view_num',  'art_com_num'], 'integer'],
            [['us_id', 'art_title', 'art_content', 'art_rev_date'], 'safe'],
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
        //在这里进行修改，用户只能操作自己的文章
        
        
        $query = IgArticleArticle::find();
     
        

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
        // $session = Yii::$app->session;
        // $session->open();
        // if($session->get('us_id'))
        // {
            // grid filtering conditions
            $query->andFilterWhere([
                'art_id' => $this->art_id,
                'us_id'=>$this->us_id,
                'art_view_num' => $this->art_view_num,
                
                'art_com_num' => $this->art_com_num,
                'art_rev_date' => $this->art_rev_date,
            ]);
        //}
        // else{
        //     $query->andFilterWhere([
        //         'art_id' => $this->art_id,
        //         'us_id'=>'',
        //         'art_view_num' => $this->art_view_num,
                
        //         'art_com_num' => $this->art_com_num,
        //         'art_rev_date' => $this->art_rev_date,
        //     ]);
        // }

        
        $query->andFilterWhere(['like', 'art_title', $this->art_title])
            ->andFilterWhere(['like', 'art_content', $this->art_content]);

        return $dataProvider;
    }
}
