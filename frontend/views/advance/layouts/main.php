<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);//pajungiami resursai ir nustatomos kai kurių resursų priklausomybės
?>
<?php $this->beginPage()//prasideda buferizacija ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language //formuojama kalbos tag'as?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() //bus sugeneruoti tokinai?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head()//atspausdinama head žymė ?>
</head>
<body>
<?php $this->beginBody()//atspausdinama turinio pražios žymė ?>

<div class="wrap"><?php /*--------------pagrindinis body div----------*/?>
    <?php /*--------------viršutinė juosta----------*/?>
    <?php
    NavBar::begin([//atidarome navigacinį meniu
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Products', 'url' => ['product/index'], 'items' => [
            ['label' => 'New Arrivals', 'url' => ['product/index', 'tag' => 'new']],
            ['label' => 'Most Popular', 'url' => ['product/index', 'tag' => 'popular']],
        ]],

        ['label' => 'Contact', 'url' => ['/site/contact']],
        ['label' => 'Comment', 'url' => ['/site/comments']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();//uždarom meniu juostą
     ?>
<?php /*-------------viršutinės juostos pabaiga-------*/?>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ])//navigacinis duonos trupinių meniu ?>
        <?= Alert::widget()//apdoroja sessijų pranešimus ir parodo juos ?>
        <?= $content //pagrindinis turinys?>
    </div>
</div><?php /*----body be footer pabaiga----------*/?>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody()//turinio formavimo pabaiga - pajungiamas ajax(js...) ?>
</body>
</html>
<?php $this->endPage()//baigiasi buferizacija - pajungiami visi reikalingi failai ?>
