<?php
/* @var $this yii\web\View */
/* @var $book frontend\models\Book */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
    <h2>Enter new products</h2>
<?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($product, 'name'); ?>

    <?php echo $form->field($product, 'price'); ?>

    <?php echo $form->field($product, 'isbn'); ?>

    <?php echo $form->field($product, 'date_purchase'); ?>

    <?php echo $form->field($product, 'category_id')->dropDownList($product->getCategoriesList()); ?>

    <?php echo Html::submitButton('Save Product', [
        'class' => 'btn btn-primary',
    ]); ?>

<?php ActiveForm::end();

