<?php
/* @var $this yii\web\View */
/* @var $bookList[] frontend\models\Book */
?>
<h2>Products!</h2>

<?php foreach ($productList as $product): ?>

    <div class="col-md-10">
        <h3><?php echo $product->name; ?></h3>
        <p><?php echo $product->getDatePurchase(); ?></p>
        <p><?php echo $product->getCategoryName(); ?></p>
        <?php foreach ($product->getSuppliers() as $supplier): ?>
            <p><?php echo $supplier->getFullRequisites(); ?></p>
        <?php endforeach; ?>
        <hr>
    </div>

<?php endforeach;
