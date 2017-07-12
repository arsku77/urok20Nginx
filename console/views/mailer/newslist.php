<?php /* @var $newsList[] array */ ?>

<?php foreach ($newsList as $item): ?>

    <h2><?php echo $item['title']; ?></h2>
    <p><?php echo $item['content']; ?></p>
    <hr>

<?php endforeach;
