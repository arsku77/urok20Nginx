<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\BranchOfCompany */

$this->title = 'Update Branch Of Company: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Branch Of Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="branch-of-company-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'company' => $company,

    ]) ?>

</div>
