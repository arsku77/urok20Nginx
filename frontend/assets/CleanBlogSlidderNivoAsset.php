<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Description of GalleryAsset
 *
 * @author admin
 */
class CleanBlogSlidderNivoAsset extends AssetBundle
{
    public $css = [
        'css/clean-blog/slidders/nivo/nivo_slider.css',
        'css/clean-blog/slidders/nivo/themes_default_default.css',
    ];
    
    public $js = [
        'js/clean-blog/slidders/nivo/jquery.min.js',
        'js/clean-blog/slidders/nivo/jquery.nivo.slider.js',

    ];
    
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
