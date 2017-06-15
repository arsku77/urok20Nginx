<?php
/* @var $model frontend\models\Employee */

if ($model->hasErrors()) {
    echo '<pre>';
    print_r($model->getErrors());
    echo '</pre>';
}
?>

<h1>Welcome to ordering nice window!</h1>

<form method="post">
    <p>with Window cm min 70cm, max 210cm:</p>
    <input name="withWindow" type="text" />
    <br><br>

    <p>height Window cm min 100cm, max 200cm:</p>
    <input name="heightWindow" type="text" />
    <br><br>

    <p>Quantity cameras:</p>
    <input type="radio" name="numberCameras" value="1"> Window with 1 camera<br>
    <input type="radio" name="numberCameras" value="2"> Window with 2 camera<br>
    <input type="radio" name="numberCameras" value="3"> Window with 3 camera<br>
    <br><br>

    <p>Quantity all leaf of window:</p>
    <input name="numberAllLeaf" type="text" />
    <br><br>

    <p>Quantity rotatable leaf of window:</p>
    <input name="numberRotatableLeaf" type="text" />
    <br><br>

    <p>color frame of window:</p>
    <select name="color">
        <option value="white">1 white</option>
        <option value="red">2 red</option>
        <option value="braun">3 braun</option>
    </select>
    <br><br>

    <p>need sill of window:</p>
    <input type="checkbox" name="windowSillIsNeed" value="1"> yes, need sill<br>
    <input type="checkbox" name="windowSillIsNeed" value="0"> no, d'need sill<br>
    <br><br>

    <p>email customer, to confirm:</p>
    <input name="email" type="text" />
    <br><br>

    <p>name customer:</p>
    <input name="name" type="text" />
    <br><br>

    <input type="submit" />

</form>
