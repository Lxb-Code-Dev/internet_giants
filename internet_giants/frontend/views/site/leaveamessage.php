<?php
/*
    author: Liuxubo 1911440
    date: 2021/11/22
    description: 留言板
 */
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


$this->title = 'Message';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-message">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <?= $form->field($model, 'us1_content')->textarea(['rows' => 30]) ?>
                <div class="form-group">
                    <?= Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'Message-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        
    </div>

</div>
