<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IgArticleComments */

$this->title = 'Update Ig Article Comments: ' . $model->com_id;
$this->params['breadcrumbs'][] = ['label' => 'Ig Article Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->com_id, 'url' => ['view', 'id' => $model->com_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ig-article-comments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
















