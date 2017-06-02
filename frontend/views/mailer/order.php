<?php /* @var order[] array */
use frontend\models\Timeget;
?>

<h2>order confirmation</h2>
<h3><?php echo 'Дорогой: ' . $order['name']; ?></h3>
<p> <?php echo ' В ' . Timeget::getTimelog(). ' Вы заказали окно '; ?></p>


<p>
<style>	table { border-collapse: collapse; } table, td, th { border: 1px solid black; } </style>

<table>
        <colgroup>
                <col  style="text-align:center" />
                <col  style="text-align:left" />
                <col  style="text-align:center" />
                <col  style="text-align:right" />
                <col  style="text-align:right" />
                <col  style="text-align:right" />
                <col  style="text-align:right" />
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
                <td><?php echo $order['withWindow'];?></td>
                <td><?php echo $order['heightWindow'];?></td>
                <td><?php echo $order['numberCameras'];?></td>
                <td><?php echo $order['numberAllLeaf'];?></td>
                <td><?php echo $order['numberRotatableLeaf'];?></td>
                <td><?php echo $order['color'];?></td>
                <td><?php if ($order['windowSillIsNeed']==1){echo 'Да';}else{ echo 'Нет';}?></td>
        </tr>
</table>
</p>
<hr>