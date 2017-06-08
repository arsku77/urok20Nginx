<?php

/* @var $this yii\web\View */
//use Yii;
use frontend\assets\SlidderNivoAsset;
use Yii;
SlidderNivoAsset::register($this);
$this->registerJsFile('@web/js/gallery/slidders/nivo.js', ['depends' => [
    SlidderNivoAsset::className()
]]);
?>

<title>jQuery Nivo Slider Demo</title>

<h1 style="margin-top:150px;" align="center">jQuery Nivo Slider Demo</h1>
<div id="slider" class="nivoSlider">
    <img src="<?php echo Yii::getAlias('@gallerynivo').'/toystory.jpg';?>" data-thumb="<?php echo Yii::getAlias('@gallerynivo').'/toystory.jpg';?>" alt="" />
    <img src="<?php echo Yii::getAlias('@gallerynivo').'/up.jpg';?>" data-thumb="<?php echo Yii::getAlias('@gallerynivo').'/up.jpg';?>" alt="" title="This is an example of a caption" />
    <img src="<?php echo Yii::getAlias('@gallerynivo').'/walle.jpg';?>" data-thumb="<?php echo Yii::getAlias('@gallerynivo').'/walle.jpg';?>" alt="" data-transition="slideInLeft" />
    <img src="<?php echo Yii::getAlias('@gallerynivo').'/nemo.jpg';?>" data-thumb="<?php echo Yii::getAlias('@gallerynivo').'/nemo.jpg';?>" alt="" title="#htmlcaption" />
</div>
