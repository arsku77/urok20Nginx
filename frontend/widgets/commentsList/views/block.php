<?php
use yii\helpers\Html;
?>
<?php foreach ($list as $item): ?>
    <p>
        <b><?php echo Html::encode($item['name']); ?></b>
        </br>
        <?php echo Html::encode($item['text']); ?>
    </p>
    <hr>
<?php endforeach;
