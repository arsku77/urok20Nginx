<?php
use yii\helpers\Url;
?>

<?php foreach ($list as $item): ?>
    <h3>
        <a href="<?php echo Url::to(['employee/view', 'id' => $item['id']]); ?>">
            <?php echo 'имя: ' . $item['first_name'] . ' код: ' . $item['id_code']; ?>
        </a>
    </h3>
    <p><?php  echo 'отч: ' . $item['middle_name'] . ' фам: ' . $item['last_name'] . ' зар. плата: ' . $item['salary']; ?></p>
    <hr>
<?php endforeach;
