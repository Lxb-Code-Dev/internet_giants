<?php
/**
 *  author: Liuxubo 1911440
 *  date: 2021/11/24
 * 
 *  */
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\IgArticleArticle */

$this->title = $model->art_id;
$this->params['breadcrumbs'][] = ['label' => 'Ig Article Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ig-article-article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        
        <?= Html::a('Delete', ['delete', 'id' => $model->art_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'art_id',
            'us_id',
            'art_view_num',
            'art_title',
            'art_content:ntext',
            'art_com_num',
            'art_rev_date',
        ],
    ]) ?>

</div>
