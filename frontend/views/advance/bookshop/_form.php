<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'date_published')->widget(
        DatePicker::className(),[
        'name' => 'date_published',
        'type' => 2,
        'options' => ['placeholder' => 'Date Published ...',
            'inline' => true,
        ],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
            ,
            'todayHighlight' => true,
        ],
    ]); ?>


    <?php echo $form->field($model, 'publisher_id')->dropDownList($publisher); ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
