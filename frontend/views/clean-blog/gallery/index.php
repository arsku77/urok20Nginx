<?php

/* @var $this yii\web\View */
use Yii;
use frontend\assets\CleanBlogGalleryAsset;
//
CleanBlogGalleryAsset::register($this);
$this->registerJsFile('@web/js/'.Yii::$app->params['themeCurrentAssets'].'/gallery/isotope/scripts.js', ['depends' => [
    CleanBlogGalleryAsset::className()
]]);
?>

<h1>Gallery</h1>


<div class="portfolioFilter">

    <a href="#" data-filter="*" class="current">All Categories</a>
    <a href="#" data-filter=".people">People</a>
    <a href="#" data-filter=".places">Places</a>
    <a href="#" data-filter=".food">Food</a>
    <a href="#" data-filter=".objects">Objects</a>

</div>

<div style="background-color: #ec971f" class="portfolioContainer">
    <div class="objects">
        <img src="<?php echo Yii::getAlias('@clean-blog-gallery').'/watch.jpg';?>" alt="image">
    </div>

    <div class="people places">
        <img src="<?php echo Yii::getAlias('@clean-blog-gallery').'/surf.jpg';?>" alt="image">
    </div>	

    <div class="food">
        <img src="<?php echo Yii::getAlias('@clean-blog-gallery').'/burger.jpg';?>" alt="image">
    </div>

    <div class="people places">
        <img src="<?php echo Yii::getAlias('@clean-blog-gallery').'/subway.jpg';?>" alt="image">
    </div>

    <div class="places objects">
        <img src="<?php echo Yii::getAlias('@clean-blog-gallery').'/trees.jpg';?>" alt="image">
    </div>

    <div class="people food objects">
        <img src="<?php echo Yii::getAlias('@clean-blog-gallery').'/coffee.jpg';?>" alt="image">
    </div>

    <div class="food objects">
        <img src="<?php echo Yii::getAlias('@clean-blog-gallery').'/wine.jpg';?>" alt="image">
    </div>	

    <div class="food">
        <img src="<?php echo Yii::getAlias('@clean-blog-gallery').'/salad.jpg';?>" alt="image">
    </div>	

</div>
