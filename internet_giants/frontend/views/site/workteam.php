<?php
/**
*  Team: Internet_giant
*  Coding by Liuxubo 1911440, 2021/11/21
*/
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = '团队作业';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1>团队: Internet_giants</h1>

    
    <br/>

    <table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>作业名</th>
            <th>内容</th>
            <th>提取码</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($workteams as $v) :?>
        <tr>
            <td><?=$v['name']?></td>
            <td> <a href="https://pan.baidu.com/s/1z_D9t-hWM3kcZDfD4XYYVw"><?php echo $v['namecontent']?></a></td>
            <td> qxqw</td>
        </tr>
    <?php endforeach;?>
    </tbody>
    </table>

    

</div>
