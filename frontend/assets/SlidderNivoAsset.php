<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Description of GalleryAsset
 *
 * @author admin
 */
class SliddernivoAsset extends AssetBundle
{
    public $css = [
        'css/slidders/nivo/nivo_slider.css',
        'css/slidders/nivo/themes_default_default.css',
    ];
    
    public $js = [
        'js/slidders/nivo/jquery.min.js',
        'js/slidders/nivo/jquery.nivo.slider.js',
        'js/slidders/nivo/pagead_show_ads.js',

    ];
    
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
