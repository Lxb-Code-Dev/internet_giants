<?php
/**
*  Team: TB2020, NKU
*  Coding by Ke-yuan Chang 1811338, 20200611
*/
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = '个人作业';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1>王文蕊</h1>

 
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
    <?php foreach ($singlework as $v) :?>
        <tr>
            <td><?=$v['name']?></td>
            <!-- <td> <a href=""><?php echo $v['namecontent']?></a></td> -->
            <td> #</td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>


</div>
