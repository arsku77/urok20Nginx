<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Publishers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publisher-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Publisher', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'date_registered',
            'identity_number',

           ['class' => 'yii\grid\ActionColumn'],
           ['class' => 'yii\grid\DataColumn',
            'attribute' => 'name',
            'value' => function($dataProvider){
                return Html::textInput("[{$dataProvider->id}]$dataProvider->name", $dataProvider->name);
            },
            'format' => 'raw'
            ],
        ],
    ]); ?>
</div>
