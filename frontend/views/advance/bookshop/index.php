<?php
/* @var $this yii\web\View */
/* @var $bookList[] frontend\models\Book */
?>
<h2>Books!</h2>

<?php foreach ($bookList as $book): ?>

    <div class="col-md-10">
        <h3><?php echo $book->name; ?></h3>
        <hr>
    </div>

<?php endforeach;
