<?php
/* @var $model frontend\models\Employee */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

if ($model->hasErrors()) {
    echo '<pre>';
    print_r($model->getErrors());
    echo '</pre>';
}
?>

<h1>Welcome to ordering nice window!</h1>


<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<div class="col-sm-3">
<?php echo $form->field($model, 'withWindow')->label('With')->hint('with Window cm min 70cm, max 210cm'); ?>
<?php echo $form->field($model, 'heightWindow')->label('Height')->hint('height Window cm min 100cm, max 200cm'); ?>

<?php echo $form->field($model, 'numberCameras')->radioList([
    '1' => 'Window with 1 camera',
    '2' => 'Window with 2 camera',
    '3' => 'Window with 3 camera',
],['class' => 'radio'])->label('Quantity cameras'); ?>

<?php echo $form->field($model, 'numberAllLeaf')->label('Quantity all leaf of window')->hint('all leaf'); ?>
<?php echo $form->field($model, 'numberRotatableLeaf')->label('Quantity rotatable leaf of window')->hint('rotatable leaf'); ?>
<?php echo $form->field($model, 'color')->dropDownList([
    'white' => '1 white',
    'red' => '2 red',
    'braun' => '3 braun',
]); ?>
<?php echo $form->field($model, 'windowSillIsNeed')->checkboxList([
    0 => 'no, dont need sill',
    1 => 'yes, need sill',
]); ?>
<?php echo $form->field($model, 'email')->label('email')->hint('we ansver yuo'); ?>
<?php echo $form->field($model, 'name')->label('Name')->hint('we ansver yuo'); ?>
<?php echo Html::submitButton('Send', ['class' => 'btn btn-primary']); ?>
</div>
<?php ActiveForm::end(); ?>