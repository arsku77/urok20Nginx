<?php
/* @var $model frontend\models\Employee */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

if ($model->hasErrors()) {
    echo '<pre>';
    print_r($model->getErrors());
    echo '</pre>';
}
?>

<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'firstName')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'lastName') ?>
            <?= $form->field($model, 'middleName') ?>
            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'birthDate') ?>
            <?= $form->field($model, 'hiringDate') ?>
            <?= $form->field($model, 'department') ?>
            <?= $form->field($model, 'city') ?>
            <?= $form->field($model, 'position') ?>
            <?= $form->field($model, 'idCode') ?>
            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
