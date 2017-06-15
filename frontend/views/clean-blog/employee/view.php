<?php
use yii\helpers\Url;
use Yii;
?>

<h3><?php echo 'имя: ' . $item['first_name'] . ' код: ' . $item['id_code']; ?></h3>
<p><?php echo 'отч: ' . $item['middle_name']; ?></p>
<p><?php echo 'фам: ' . $item['last_name']; ?></p>
<p><?php echo 'г. рож: ' . $item['birthdate']; ?></p>
<p><?php echo 'город: ' . $item['city']; ?></p>
<p><?php echo 'должность: ' . $item['position']; ?></p>
<p><?php echo 'зар. плата: ' . $item['salary']; ?></p>
<p><?php echo 'бюро: ' . $item['department']; ?></p>
<p><?php echo 'эмайл: ' . $item['email']; ?></p>

<a href="<?php echo Yii::$app->request->referrer; ?>" class="btn btn-info">Back</a>