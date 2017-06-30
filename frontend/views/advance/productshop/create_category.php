<?php
/* @var $this yii\web\View */
/* @var $book frontend\models\Book */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
    <h2>Enter new products category</h2>
<?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($category, 'name'); ?>

    <?php echo $form->field($category, 'alias'); ?>

    <?php echo $form->field($category, 'date_registered'); ?>

    <?php echo Html::submitButton('Save Category', [
        'class' => 'btn btn-primary',
    ]); ?>

<?php ActiveForm::end();

