<?php
/* @var $this yii\web\View */
/* @var $book frontend\models\Book */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

?>

<?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($book, 'name'); ?>

    <?php echo $form->field($book, 'isbn'); ?>

<?php echo $form->field($book, 'date_published')->widget(
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

    <?php echo $form->field($book, 'publisher_id'); ?>

    <?php echo Html::submitButton('Save', [
        'class' => 'btn btn-primary',
    ]); ?>

<?php ActiveForm::end();

