<?php
/**
 *  author: Liuxubo 1911440
 *  date: 2021/11/24
 * 
 *  */
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IgArticleArticle */

$this->title = 'Update Ig Article Article: ' . $model->art_id;
$this->params['breadcrumbs'][] = ['label' => 'Ig Article Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->art_id, 'url' => ['view', 'id' => $model->art_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ig-article-article-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
