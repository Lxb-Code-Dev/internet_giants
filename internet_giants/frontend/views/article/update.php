<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IgArticleArticle */

$this->title = Yii::t('app', 'Update Ig Article Article: {name}', [
    'name' => $model->art_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ig Article Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->art_id, 'url' => ['view', 'id' => $model->art_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ig-article-article-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
