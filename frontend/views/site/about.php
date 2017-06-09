<?php
/* @var $this yii\web\View */

use yii\helpers\Html;


$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
use frontend\widgets\newsList\NewsList;
use frontend\widgets\employeeList\EmployeeList;
?>
<div class="site-about">
    <div class="row">
        <div class="col-md-4">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>This is the About page. You may modify the following file to customize its content:</p>

            <code><?= __FILE__ ?></code>
        </div>
        <div class="col-md-4">
           <?php echo NewsList::widget(['showLimit' => Yii::$app->params['maxNewsOnAboutPage']]); ?>
        </div>
        <div class="col-md-4">
            <?php echo EmployeeList::widget(['showLimit' => Yii::$app->params['maxEmployeeInListSalaryAbout']]); ?>
        </div>
    </div>
</div>
