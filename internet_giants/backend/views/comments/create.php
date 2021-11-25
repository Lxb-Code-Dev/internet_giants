<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IgArticleComments */

$this->title = 'Create Ig Article Comments';
$this->params['breadcrumbs'][] = ['label' => 'Ig Article Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ig-article-comments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
