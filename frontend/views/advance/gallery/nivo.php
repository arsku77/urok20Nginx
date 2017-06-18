<?php

/* @var $this yii\web\View */
//use Yii;
use frontend\assets\AdvanceSlidderNivoAsset;
use Yii;
AdvanceSlidderNivoAsset::register($this);
$this->registerJsFile('@web/js/'.Yii::$app->params['themeCurrentAssets'].'/gallery/slidders/nivo.js', ['depends' => [
    AdvanceSlidderNivoAsset::className()
]]);
?>

<title>jQuery Nivo Slider Demo</title>

<h1 style="margin-top:150px;" align="center">jQuery Nivo Slider Demo</h1>
<div id="slider" class="nivoSlider">
    <img src="<?php echo Yii::getAlias('@advance-sliders-nivo/toystory.jpg');?>" data-thumb="<?php echo Yii::getAlias('@advance-sliders-nivo/toystory.jpg');?>" alt="" />
    <img src="<?php echo Yii::getAlias('@advance-sliders-nivo/up.jpg');?>" data-thumb="<?php echo Yii::getAlias('@advance-sliders-nivo/up.jpg');?>" alt="" title="This is an example of a caption" />
    <img src="<?php echo Yii::getAlias('@advance-sliders-nivo/walle.jpg');?>" data-thumb="<?php echo Yii::getAlias('@advance-sliders-nivo/walle.jpg');?>" alt="" data-transition="slideInLeft" />
    <img src="<?php echo Yii::getAlias('@advance-sliders-nivo/nemo.jpg');?>" data-thumb="<?php echo Yii::getAlias('@advance-sliders-nivo/nemo.jpg');?>" alt="" title="#htmlcaption" />
</div>
