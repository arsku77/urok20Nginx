<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\ParentCompany */

$this->title = 'Create Parent Company';
$this->params['breadcrumbs'][] = ['label' => 'Parent Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parent-company-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
