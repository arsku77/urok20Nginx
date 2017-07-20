<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
//use kartik\widgets\DatePicker;
use kartik\field\FieldRange;
use kartik\date\DatePicker;
use kartik\datecontrol\DateControl;
use yii\widgets\ActiveForm;
    /* @var $this yii\web\View */
/* @var $searchModel frontend\models\BranchOfCompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Branch Of Companies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branch-of-company-index">
<!--<div class="form-inline">-->
<!--<div class="form-control">-->
<!--<div class="form-horizontal form-inline form-inline-block kv-form-horizontal">-->
<!--<div class="form-horizontal">-->
<!--    --><?php //Pjax::begin(); ?>

    <h3><?= Html::encode($this->title) ?></h3>


<!--    --><?php //echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>-->
<!-- <?php //<?= Html::a('Create Branch Of Company', ['create'], ['class' => 'btn btn-success'])?> -->
<!--    </p>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax'=>true,
        'bordered'=>true,
        'striped'=>true,
        'hover'=>true,
        'condensed'=>true,
        'panel' => [
            'type'=>'primary',
            'heading' => '<h3 class="panel-title">' . $this->title,
            'before' =>
                Html::beginForm(['branch/index'], 'get', ['class' => 'form-inline',
                ]) .
                Html::activeInput('text', $searchModel, 'parent_company_name', ['style' => [
                    'width' => '160px'],
                    'autofocus' => true,
                    'class' => 'active form-control',
                    'placeholder'=>'input many',
                    'title' => 'find of many fields: name, alias, types',
                ]) .
                ' ' .
                Html::submitButton('Search', ['class' => 'btn btn-search']) .
                ' ' .
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['class' => 'btn btn-info']) .
                ' ' .
                Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                    ['class' => 'btn btn-success']) .
                Html::endForm()

        ],

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            ['attribute' => 'parent_company_id',
//                'value' => 'parentCompanyName',//gauta susiejimo metodo iš modelio getParentCompanyName
//                'filter' => $company,//gauta iš kontrolerio visos motininės kompanijos sąrašas listams
//                ],//padarysim papildomą lauką paieškai pagal susijusios lentelės pavadinimą
//            ['attribute' => 'parent_company_name',
//                'value' => 'parentCompanyName',
//                ],
            [
                'attribute'=>'parent_company_id',
                'width'=>'250px',
                'value' => 'parentCompanyName',
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>$company,
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Any company']
            ],
            'name',
            'email:email',
            'isbn',
//            'parent_company_id',

            ['attribute' => 'date_foundation',
                'format' => 'date',
                'value' => 'date_foundation',
                'filterType' => GridView::FILTER_DATE,
                'filterWidgetOptions' => [
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'autoclose' => true,
                        'todayHighlight' => true,
                    ]
                ],
                'width' => '200px',
                'hAlign' => 'center',
                ],


//             'date_foundation:date',
             'alias',
             'sort',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php //Pjax::end(); ?>
</div>
