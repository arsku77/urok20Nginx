<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
/* @var $this yii\web\View */
/* @var $model frontend\models\Publisher */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="publisher-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'date_registered')->widget(
        DatePicker::className(),[
        'name' => 'date_registered',
        'type' => 2,
        'options' => ['placeholder' => 'Date date_registered ...',
            'inline' => true,
        ],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
            ,
            'todayHighlight' => true,
        ],
    ]); ?>


    <?= $form->field($model, 'identity_number')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
