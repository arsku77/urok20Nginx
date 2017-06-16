<?php
use yii\helpers\Html;
?>
<?php foreach ($list as $item): ?>
    <h4>
        <?php echo Html::encode($item['name']); ?>
    </h4>
    <p><?php echo Html::encode($item['text']); ?></p>
    <hr>
<?php endforeach;
