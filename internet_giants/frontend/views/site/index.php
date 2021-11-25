<?php
/**
*  Team: IG, NKU
*  Coding by Zhaoyilin, 2021/11/21
*/
/* @var $this yii\web\View */

//use Codeception\PHPUnit\ResultPrinter\HTML as ResultPrinterHTML;
use frontend\assets;
use frontend\assets\AppAsset;
use yii\helpers\Html;
use frontend\models\IgArticleComments;
use frontend\models\IgUserUser;
$this->title = 'Welcome';
$this->params['breadcrumbs'][] = $this->title;
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    #myEcharts {
      width: 800px;
      height: 500px;
      border: solid 1px red;
      margin: 0 auto;
    }
  </style>

  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
  <!-- 引入 echarts.js -->
  <script src="https://cdn.jsdelivr.net/npm/echarts@5/dist/echarts.min.js"></script>
  <!-- 引入中国的地图数据js文件，引入后会自动注册地图名字和数据-- -->
  <script src="https://cdn.jsdelivr.net/npm/echarts/map/js/china.js?v=1598903772045"></script>

</head>
<aside class="tray tray-left tray320" data-tray-height="match" style="height: 980.883px;">

          <h4> 疫情信息介绍 - <small>来源于网络</small></h4>
          <ul class="icon-list">
              <li>
                <i class="fa fa-male"></i>&nbsp &nbsp &nbsp 
                <b> 作者:</b> IG, NKU
              </li>
              <li>
                <i class="fa fa-gavel"></i>&nbsp &nbsp 
                <b> License:</b> CC - BY 3.0 CN
              </li>
              <li>
                <i class="fa fa-compass"></i>&nbsp &nbsp 
                <b>Website:</b>
                <a href="https://github.com/Lxb-Code-Dev/internet_giants"> 这里放上github链接</a>
              </li>
          </ul>

          <hr class="short alt">

          <div class="panel" id="tour-item5">
            <div class="panel-heading">
              <span class="panel-title"> 我该怎么做才能保护自己？</span>
            </div>
            <div class="panel-body">
              <p>由于该病目前尚无有效治疗方法，预防与隔离是最有效途径，尽量减少与感染或潜在感染患者接触的机会。首先要避免前往人群密集场所，在公共场所要戴口罩。其次要注意手卫生和饮食卫生，勤洗手、多饮水、避免疲劳、保证睡眠，家庭和工作环境保持多通风。如果出现发热、咳嗽症状，要注意咳嗽礼仪，要及时就医，前往医院途中，戴口罩。</p>
            </div>
          </div>
          <div class="panel" id="tour-item5">
            <div class="panel-heading">
              <span class="panel-title"> 有针对新型冠状病毒的治疗方法吗？</span>
            </div>
            <div class="panel-body">
              <p>对于由新型冠状病毒感染引起的疾病，目前没有特效的治疗方法，临床治疗以对症支持治疗为主。</p>
            </div>
          </div>
          <div class="panel" id="tour-item5">
            <div class="panel-heading">
              <span class="panel-title"> 感染新型冠状病毒后会有什么症状？</span>
            </div>
            <div class="panel-body">
              <p>人感染新型冠状病毒后的症状严重程度取决于病毒的类型以及人体的免疫水平，常见的有发热、咳嗽、呼吸急促或呼吸困难，更严重时会导致急性呼吸窘迫综合征、脓毒性休克等，可导致患者死亡。</p>
            </div>
          </div>
          <div class="panel" id="tour-item5">
            <div class="panel-heading">
              <span class="panel-title"> 双黄连真的有用吗？</span>
            </div>
            <div class="panel-body">
              <p>抑制并不等于预防和治疗，请勿抢购自行服用双黄连口服液</p>
            </div>
          </div>
          <div class="panel" id="tour-item5">
            <div class="panel-heading">
              <span class="panel-title"> 美国疫情严重是怎么回事？</span>
            </div>
            <div class="panel-body">
              <p>美国疫情严重是怎么回事呢？美国疫情相信大家都很熟悉， 但是严重是怎么回事呢？下面就让小编带大家一起了解吧。美国疫情严重，其实就是严重了。那么美国疫情为什么会严重，相信大家都很好奇是怎么回事。大家可能会感到很惊讶，美国疫情怎么会严重呢？但事实就是这样，小编也感到非常惊讶。那么这就是关于美国疫情严重的事情了，大家有没有觉得很神奇呢？看了今天的内容，大家有什么想法呢？欢迎在评论区告诉小编一起讨论哦。</p>
            </div>
          </div>

        </aside>


<div class="tray tray-center">
          <div class="mw1000">
            <!-- steps -->
            <div class="panel" id="tour-item2" data-original-title="" title="">
              <div class="panel-heading">
                <span class="panel-title"> 这些地方会沾上新冠病毒？</span>
              </div>
              <div class="panel-body">
                <div id="myEcharts"></div>
              </div>
            </div>
            <?php
            foreach ($model as $article){
              $string = '<div class="panel" id="tour-item4">
              <div class="panel-heading text-center">
                <span class="panel-title">';
                echo $string;
                $user = IgUserUser::findOne($article->us_id);    
                echo Html::encode($article->art_title).' By '.Html::encode($user->us_name).'('.Html::encode($user->us_id).'):('.Html::encode($article->art_rev_date).')';
                $string='</span>
                </div>
                <div class="panel-body">
                  <div class="row">
                  <div class="panel-body">
                    <div class="col-md-8">';
                    echo $string;
                    echo Html::encode($article->art_content);
                $string='</div>
                <div class="col-md-4">';
                echo $string;
                $comments = IgArticleComments::find()->where('art_id ='.$article->art_id)->limit(3)->all();
                foreach ($comments as $comment){
                  echo 'Id:'.Html::encode($comment->us_id).' Name:'.Html::encode($comment->com_username).' ('.Html::encode($comment->com_date).')';             
                  echo '<p class="text-muted">';
                  echo Html::encode($comment->com_content);
                  echo '</p>';
                  echo '<hr class="short alt">';
                }
              $string = '
              </div>
              </div>
            </div>
          </div>
        </div>';
        echo $string;
      }

        ?>

            

            <div class="panel" id="tour-item1" data-original-title="" title="">
              <div class="panel-heading text-center">
                <span class="panel-title"> THE END</span>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12">
                    <p class="text-muted">end of the site</p>
                    <hr class="short alt">
                    <p>thanks for watching</p>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<!-- 引入 echarts.js -->
<script src="https://cdn.jsdelivr.net/npm/echarts@5/dist/echarts.min.js"></script>
<!-- 引入中国的地图数据js文件，引入后会自动注册地图名字和数据-- -->
<script src="https://cdn.jsdelivr.net/npm/echarts/map/js/china.js?v=1598903772045"></script>

        
  <script>
    //初始化echarts实例
    var myChart = echarts.init(document.getElementById('myEcharts'));
    // 指定图表的配置项和数据
    option = {
      title: {
        text: '中国累计确诊疫情图',
        left: 'center'
      },
      tooltip: {
        trigger: 'item'
      },
      legend: {
        orient: 'vertical',
        left: 'left',
        data: ['中国疫情图']
      },
      visualMap: {
        type: 'piecewise',
        pieces: [
          { min: 1000, max: 1000000, label: '大于等于1000人', color: '#372a28' },
          { min: 500, max: 999, label: '确诊500-999人', color: '#4e160f' },
          { min: 100, max: 499, label: '确诊100-499人', color: '#974236' },
          { min: 10, max: 99, label: '确诊10-99人', color: '#ee7263' },
          { min: 1, max: 9, label: '确诊1-9人', color: '#f5bba7' },
        ],
        color: ['#E0022B', '#E09107', '#A3E00B']
      },
      toolbox: {
        show: true,
        orient: 'vertical',
        left: 'right',
        top: 'center',
        feature: {
          mark: { show: true },
          dataView: { show: true, readOnly: false },
          restore: { show: true },
          saveAsImage: { show: true }
        }
      },
      roamController: {
        show: true,
        left: 'right',
        mapTypeControl: {
          'china': true
        }
      },
      series: [
        {
          name: '确诊数',
          type: 'map',
          mapType: 'china',
          roam: false,
          label: {
            show: true,
            color: 'rgb(249, 249, 249)'
          },
          data: []
        }
      ]
    };

    //使用指定的配置项和数据显示图表
    myChart.setOption(option);

    //获取数据
    function getData() {
      $.ajax({
        url: "https://view.inews.qq.com/g2/getOnsInfo?name=disease_h5",
        dataType: "jsonp",
        success: function (data) {
          console.log(data.data)
          var res = data.data || "";
          res = JSON.parse(res);
          var newArr = [];
          //newArr的数据格式为：
          // [{
          //   name: '北京11',
          //   value: 212
          // }, {
          //   name: '天津',
          //   value: 60
          // }]
          if (res) {
            //获取到各个省份的数据
            var province = res.areaTree[0].children;
            for (var i = 0; i < province.length; i++) {
              var json = {
                name: province[i].name,
                value: province[i].total.confirm
              }
              newArr.push(json)
            }
            console.log(newArr)
            console.log(JSON.stringify(newArr))
            //使用指定的配置项和数据显示图表
            myChart.setOption({
              series: [
                {
                  name: '确诊数',
                  type: 'map',
                  mapType: 'china',
                  roam: false,
                  label: {
                    show: true,
                    color: 'rgb(249, 249, 249)'
                  },
                  data: newArr
                }
              ]
            });
          }
        }

      })
    }
    getData();

  </script>
</html>
  
