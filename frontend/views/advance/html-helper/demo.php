<?php
use yii\helpers\Html;
/**
 * Created by PhpStorm.
 * User: arsku
 * Date: 2017.06.11
 * Time: 16:36
 */
//echo Html::tag('p','kazkoks p tago tekstas');
echo Html::tag('div','kazkoks p tago tekstas');

$array = [
    '1' => 'Beirutas',
    '2' => 'Berlinas',
    '3' => 'Butapeštas',
    '4' => 'Roma',
];
echo Html::dropDownList('city_id',[],$array);

echo Html::radioList('city_id',[],$array);

echo Html::checkboxList('city_id',[],$array);

echo Html::img('@gallery/burger.jpg',['alt' => 'Burgeris']);