<?php
use yii\helpers\Url;
use Yii;
use frontend\widgets\newsList\NewsList;
use frontend\widgets\employeeList\EmployeeList;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>
        <?php if (Yii::$app->user->identity) echo 'Hello, ' . Yii::$app->user->identity->username; ?>
        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="<?php echo Url::to(['newsletter/subscribe']); ?>">Subscribe to newsletter</a></p>
        <p><a class="btn btn-lg btn-success" href="<?php echo Url::to(['news/list']); ?>">view news count</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
<!--                <h2>Heading</h2>-->
                <a href="<?php echo Url::to(['news/index']); ?>" class="h2">Heading</a>
                <?php echo NewsList::widget(['showLimit' => Yii::$app->params['maxNewsOnHomepage']]); ?>


            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <?php echo EmployeeList::widget(['showLimit' => Yii::$app->params['maxEmployeeInListSalaryHom']]); ?>


            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <a href="<?php echo Url::to(['search/index']); ?>">Search v.2 (fulltextSearch)</a>
                <br>
                <a href="<?php echo Url::to(['search/advanced']); ?>">Search v.3 (advancedSearch)</a>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
