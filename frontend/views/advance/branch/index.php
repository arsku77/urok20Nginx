<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
//use kartik\widgets\DatePicker;
use kartik\field\FieldRange;
    /* @var $this yii\web\View */
/* @var $searchModel frontend\models\BranchOfCompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Branch Of Companies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branch-of-company-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Branch Of Company', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            ['attribute' => 'parent_company_id',
                'value' => 'parentCompanyName',//gauta susiejimo metodo iš modelio getParentCompanyName
                'filter' => $company,//gauta iš kontrolerio visos motininės kompanijos sąrašas listams
                ],//padarysim papildomą lauką paieškai pagal susijusios lentelės pavadinimą
            ['attribute' => 'parent_company_name',
                'value' => 'parentCompanyName',
                ],
            'name',
            'email:email',
            'isbn',
//            'parent_company_id',
            ['attribute' => 'date_foundation',
                'format' => 'date',
                'value' => 'date_foundation',
                'filter' => FieldRange::widget([
                    'type' => FieldRange::INPUT_WIDGET,
                    'model' => $searchModel,
                    'attribute1' => 'from_date',
                    'attribute2' => 'to_date',
                    'widgetClass' => \kartik\datecontrol\DateControl::className(),
                    'widgetOptions1' => [
                        'saveFormat' => 'php:yyy-MM-dd',
                    ],
                    'widgetOptions2' => [
                        'saveFormat' => 'php:yyy-MM-dd',
                    ],

                ]),
            ],


//             'date_foundation',
            // 'alias',
             'sort',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>