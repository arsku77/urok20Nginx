<?php
/* @var $model frontend\models\Employee */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

if ($model->hasErrors()) {
    echo '<pre>';
    print_r($model->getErrors());
    echo '</pre>';
}
?>

<h1>Welcome to our company!</h1>

<form method="post">
    <p>First name:</p>
    <input name="firstName" type="text" />
    <br><br>

    <p>Last name:</p>
    <input name="lastName" type="text" />
    <br><br>

    <p>Middle name:</p>
    <input name="middleName" type="text" />
    <br><br>

    <p>birthDate:</p>
    <input name="birthDate" type="text" />
    <br><br>

    <p>hiringDate:</p>
    <input name="hiringDate" type="text" />
    <br><br>

    <p>salary:</p>
    <input name="salary" type="text" />
    <br><br>

    <p>department:</p>
    <input name="department" type="text" />
    <br><br>

    <p>city:</p>
    <select name="city">
    echo "<option value="Marijampolė">1 marijampolė</option>
    echo "<option value="Kaunas">2 Kaunas</option>
    echo "<option value="Vilnius">3 Vilnius</option>
    </select>
    <br><br>

    <p>position:</p>
    <input name="position" type="text" />
    <br><br>

    <p>idCode:</p>
    <input name="idCode" type="text" />
    <br><br>

    <p>Email name:</p>
    <input name="email" type="text" />
    <br><br>

    <input type="submit" />

</form>
