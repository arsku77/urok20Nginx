<?php
/* @var $this yii\web\View */
/* @var $book frontend\models\Book */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
    <h2>Enter new Supplier</h2>
<?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($supplier, 'name'); ?>

    <?php echo $form->field($supplier, 'company_code'); ?>

    <?php echo $form->field($supplier, 'foundation_date'); ?>

    <?php echo $form->field($supplier, 'rating'); ?>

    <?php echo Html::submitButton('Save Suplier', [
        'class' => 'btn btn-primary',
    ]); ?>

<?php ActiveForm::end();

