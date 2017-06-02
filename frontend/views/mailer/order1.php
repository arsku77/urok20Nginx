<?php /* @var order[] array */
use frontend\models\Timeget;
?>

<h2>order confirmation</h2>
<h3><?php echo 'Дорогой: ' . $order['name']; ?></h3>
<p> <?php echo ' В ' . Timeget::getTimelog(). ' Вы заказали окно '; ?></p>


<p>
<!--<style>	table { border-collapse: collapse; } table, td, th { border: 1px solid black; } </style>-->
<table style = "border-collapse: collapse;">

<table>
        <colgroup>
                <col  style="border:1px solid black;text-align:center" />
                <col  style="border:1px solid black;text-align:left" />
                <col  style="border:1px solid black;text-align:center" />
                <col  style="border:1px solid black;text-align:right" />
                <col  style="border:1px solid black;text-align:right" />
                <col  style="border:1px solid black;text-align:right" />
                <col  style="border:1px solid black;text-align:right" />
        </colgroup>
        <tr>
                <th width="120" align="center">Ширина</th>
                <th width="120" align="center">Высота</th>
                <th width="120" align="center">Количество камер </th>
                <th width="120" align="center">Общее количество створок</th>
                <th width="120" align="center">Количество поворотных створок </th>
                <th width="120" align="center">Цвет </th>
                <th width="120" align="center">наличие подоконника  </th>
        </tr>
        <tr>
                <td style="border:1px solid black;text-align:center"><?php echo $order['withWindow'];?></td>
                <td style="border:1px solid black;text-align:center"><?php echo $order['heightWindow'];?></td>
                <td style="border:1px solid black;text-align:center"><?php echo $order['numberCameras'];?></td>
                <td style="border:1px solid black;text-align:center"><?php echo $order['numberAllLeaf'];?></td>
                <td style="border:1px solid black;text-align:center"><?php echo $order['numberRotatableLeaf'];?></td>
                <td style="border:1px solid black;text-align:center"><?php echo $order['color'];?></td>
                <td style="border:1px solid black;text-align:center"><?php if ($order['windowSillIsNeed']==1){echo 'Да';}else{ echo 'Нет';}?></td>
        </tr>
</table>
</p>
<hr>