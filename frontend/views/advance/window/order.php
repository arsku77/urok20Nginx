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


<?php $form = ActiveForm::begin(['id' => 'login-form',
    'options' => ['enctype' => 'multipart/form-data',
                    'class' => 'form-horizontal',
    ]]); ?>
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

<?php echo $form->field($model, 'windowSillIsNeed')->checkbox(['label' => 'no, dont need sill', 'value'=>'0',]); ?>
<?php echo $form->field($model, 'windowSillIsNeed')->checkbox(['label' => 'yes,  need sill', 'value'=>'1',]); ?>

<?php echo $form->field($model, 'email')->label('email')->hint('we ansver yuo'); ?>
<?php echo $form->field($model, 'name')->label('Name')->hint('we ansver yuo'); ?>
<?php echo Html::submitButton('Send', ['class' => 'btn btn-primary']); ?>
</div>
<?php ActiveForm::end(); ?>