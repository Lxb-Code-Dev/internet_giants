<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IgUserMessage */

$this->title = Yii::t('app', 'Update Ig User Message: {name}', [
    'name' => $model->us1_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ig User Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->us1_id, 'url' => ['view', 'id' => $model->us1_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ig-user-message-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
