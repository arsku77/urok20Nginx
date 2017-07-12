<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
/* @var $employee array */
//echo 'hello! This is array demo';
echo '<pre>';
print_r($employees);
echo '<pre>';

$emails = ArrayHelper::getColumn($employees,'email');
echo implode(', ', $emails);//sudeda į stringą


$listData = ArrayHelper::map($employees, 'id', 'email');

echo '<pre>';
print_r($listData);
echo '<pre>';

echo Html::dropDownList('emails',[],$listData);
