<?php
/**
*  Team: Internet_giants
*  Coding by Liuxubo 1911440, 2021/11/20
*/
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */



$this->title = '个人作业';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1>刘旭博 1911440</h1>

    
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
            <td> <a href=" https://pan.baidu.com/s/1y4e3OyIbPOqMjf13IFKjlA"><?php echo $v['namecontent']?></a></td>
            <td> on5i</td>
        </tr>
    <?php endforeach;?>
    </tbody>
    </table>


</div>
