<?php /* @var order[] array */

?>

<h2>order confirmation</h2>
<h3><?php echo $order['name']; ?></h3>
<p>Data <?php echo $order['withWindow']. ' ' . $order['heightWindow'] . '! ' .
        $order['numberCameras']. ' ' . $order['numberAllLeaf'] . '! ' .
        $order['numberRotatableLeaf']. ' ' . $order['color'] . '! ' .
        $order['windowSillIsNeed']. ' ' .
        $order['email']; ?></p>
<hr>


