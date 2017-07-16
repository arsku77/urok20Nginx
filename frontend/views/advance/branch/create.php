<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\BranchOfCompany */

$this->title = 'Create Branch Of Company';
$this->params['breadcrumbs'][] = ['label' => 'Branch Of Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branch-of-company-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'company' => $company,

    ]) ?>

</div>
