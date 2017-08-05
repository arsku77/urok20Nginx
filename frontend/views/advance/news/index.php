<?php
use yii\helpers\Url;
?>


    <h3>таблица <b>news</b>. Всего записей: <?php echo $countAllNews['id']; ?></h3>

<?php
foreach ($list as $item): ?>

    <h3><a href="<?php echo Url::to(['news/view', 'id' => $item['id']]); ?>">
            <?php echo $item['title']; ?>
        </a></h3>
    <p><?php echo $item['content']; ?></p>

    <hr>

<?php endforeach;