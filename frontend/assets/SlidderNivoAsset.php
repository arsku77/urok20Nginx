<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Description of GalleryAsset
 *
 * @author admin
 */
class SlidderNivoAsset extends AssetBundle
{
    public $css = [
        'css/slidders/nivo/style.css',
        'css/slidders/nivo/slider_demo_style.css',
        'css/slidders/nivo/nivo-slider.css',
        'css/slidders/nivo/themes_bar_bar.css',
        'css/slidders/nivo/themes_dark_dark.css',
        'css/slidders/nivo/themes_default_default.css',
        'css/slidders/nivo/themes_light_light.css',
    ];
    
    public $js = [
        'js/slidders/nivo/jquery.nivo.slider.js',
        'js/slidders/nivo/pagead_show_ads.js',
    ];
    
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
