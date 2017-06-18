<?php

/* @var $this yii\web\View */
//use Yii;
use frontend\assets\CleanBlogSlidderNivoAsset;
use Yii;
CleanBlogSlidderNivoAsset::register($this);
$this->registerJsFile('@web/js/'.Yii::$app->params['themeCurrentAssets'].'/gallery/slidders/nivo.js', ['depends' => [
    CleanBlogSlidderNivoAsset::className()
]]);
?>

<title>jQuery Nivo Slider Demo</title>

<h1 style="margin-top:150px;" align="center">jQuery Nivo Slider Demo</h1>
<div id="slider" class="nivoSlider">
    <img src="<?php echo Yii::getAlias('@clean-blog-sliders-nivo/toystory.jpg');?>" data-thumb="<?php echo Yii::getAlias('@clean-blog-sliders-nivo/toystory.jpg');?>" alt="" />
    <img src="<?php echo Yii::getAlias('@clean-blog-sliders-nivo/up.jpg');?>" data-thumb="<?php echo Yii::getAlias('@clean-blog-sliders-nivo/up.jpg');?>" alt="" title="This is an example of a caption" />
    <img src="<?php echo Yii::getAlias('@clean-blog-sliders-nivo/walle.jpg');?>" data-thumb="<?php echo Yii::getAlias('@clean-blog-sliders-nivo/walle.jpg');?>" alt="" data-transition="slideInLeft" />
    <img src="<?php echo Yii::getAlias('@clean-blog-sliders-nivo/nemo.jpg');?>" data-thumb="<?php echo Yii::getAlias('@clean-blog-sliders-nivo/nemo.jpg');?>" alt="" title="#htmlcaption" />
</div>
