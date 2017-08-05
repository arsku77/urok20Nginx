<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
//    'language' => 'ru',
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'enableCsrfValidation' => false,
        ],
        'user' => [
            'identityClass' => 'frontend\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'novosti' => 'news/index',
                'novosti/<id:\d+>' => 'news/view',
                'news-count' => 'news/list',
                'robotnik/<id:\d+>' => 'employee/view',
                'apie-imone' => 'site/about',

            ],
        ],
        'stringHelper' => [
            'class' => 'common\components\StringHelper',
        ],
        'view' => [
            'theme' => [
//                'basePath' => '@frontend/views/advance',
//                'baseUrl' => '@frontend/views/advance',
//                'basePath' => '@frontend/views/clean-blog',
//                'baseUrl' => '@frontend/views/clean-blog',
                'pathMap' => [
                    '@frontend/views' => '@frontend/views/advance',
//                    '@frontend/views' => '@frontend/views/clean-blog',
                ],
            ],
        ],
    ],
    'params' => $params,
    'aliases' => [
        '@files' => '/var/www/project/frontend/web/files',
        '@gallery' => '/files/site/gallery',
        '@goods' => '/files/site/goods',
        '@sliders' => '/files/site/sliders',
//asset advance theme
        '@advance' => '/files/themes/advance',
        '@advance-gallery' => '@advance/photos/gallery',
        '@advance-sliders' => '@advance/photos/sliders',
        '@advance-sliders-nivo' => '@advance/photos/sliders/nivo',
//asset clean-blog theme
        '@clean-blog' => '/files/themes/clean-blog',
        '@clean-blog-gallery' => '@clean-blog/photos/gallery',
        '@clean-blog-sliders' => '@clean-blog/photos/sliders',
        '@clean-blog-sliders-nivo' => '@clean-blog/photos/sliders/nivo',
    ],

];
