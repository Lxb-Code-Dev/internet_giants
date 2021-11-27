<?php
/**
 *  author: Liuxubo 1911440
 *  date: 2021/11/24
 * 
 *  */
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IgUserUser */

$this->title = 'Create Ig User User';
$this->params['breadcrumbs'][] = ['label' => 'Ig User Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ig-user-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
