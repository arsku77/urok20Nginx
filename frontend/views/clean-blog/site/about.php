<?php
use yii\helpers\Url;
use Yii;
use frontend\widgets\newsList\NewsList;
/* @var $this yii\web\View */
use frontend\assets\CleanBlogSitesAsset;

//
CleanBlogSitesAsset::register($this);//js/clean-blog/clean-blog.min.js
$this->registerJsFile('@web/js/'.Yii::$app->params['themeCurrentAssets'].'/clean-blog.min.js', ['depends' => [
    CleanBlogSitesAsset::className()
]]);



$this->title = 'About';
?>

<div class="row">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
      <p>
          <?php echo NewsList::widget(['showLimit' => Yii::$app->params['maxNewsOnAboutPage']]); ?>
      </p>
    </div>
</div>
