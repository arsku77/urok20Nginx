<?php
use yii\helpers\Html;
/**
 * Created by PhpStorm.
 * User: arsku
 * Date: 2017.06.11
 * Time: 16:36
 */
?>


<?php foreach ($comments as $comment): ?>
    <?php echo Html::tag('h5', Html::encode($comment['author']));  ?>
    <?php echo Html::tag('p', Html::encode($comment['text']));  ?>
    <hr/>
<?php endforeach; ?>

