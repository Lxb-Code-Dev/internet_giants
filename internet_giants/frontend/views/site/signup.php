<?php
/**
*  Team: IG, NKU
*  Coding by Liuxubo 1911440
*  2021/11/21
*/
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'signup-form']); ?>

                <?= $form->field($model, 'us_id')->textInput() ?>
                <?= $form->field($model, 'us_name')->textInput() ?>
                <?= $form->field($model, 'us_mail')->textInput() ?>
                <?= $form->field($model, 'us_password')->passwordInput() ?>

            
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
