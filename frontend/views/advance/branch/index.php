<?php

use kartik\widgets\DateTimePicker;
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
        'showFooter'=>TRUE,
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
                Html::endForm(),



            'after' =>
                Html::beginForm(['branch/create'], 'post', [
                        'class' => 'form-inline',
                        'enctype' => 'multipart/form-data',
                ]) .
                Html::activeDropDownList($model, 'parent_company_id', $company,
                    ['style' => [
                        'width' => '20%',
                    ],
//                        'autofocus' => true,
                        'class' => 'active form-control',
                        'placeholder'=>'select company',
                        'title' => 'select company for new brand',
                    ]) .
                ' ' .
                Html::activeInput('text', $model, 'name',
                    ['style' => [
                        'width' => '15%',
                    ],
//                        'autofocus' => true,
                        'class' => 'active form-control',
                        'placeholder'=>'input new brand name',
                        'title' => 'input new brand name',
                    ]) .
                ' ' .
                Html::activeInput('text', $model, 'email',
                    ['style' => [
                        'width' => '15%',
                    ],
//                        'autofocus' => true,
                        'class' => 'active form-control',
                        'placeholder'=>'input email of new brand',
                        'title' => 'input email of new brand',
                    ]) .
                ' ' .
                Html::activeInput('text', $model, 'isbn',
                    ['style' => [
                        'width' => '10%',
                    ],
//                        'autofocus' => true,
                        'class' => 'active form-control',
                        'placeholder'=>'input isbn of new brand',
                        'title' => 'input isbn of new brand',
                    ]) .
                ' ' .
                Html::activeInput('date', $model, 'date_foundation',
                    ['style' => [
                        'width' => '10%',
                    ],
//                        'autofocus' => true,
                        'class' => 'active form-control',
                        'placeholder'=>'input date foundation of new brand',
                        'title' => 'input date foundation of new brand',
                    ]) .
                ' ' .
                Html::activeInput('text', $model, 'alias',
                    ['style' => [
                        'width' => '10%',
                    ],
//                        'autofocus' => true,
                        'class' => 'active form-control',
                        'placeholder'=>'input alias of new brand',
                        'title' => 'input alias of new brand',
                    ]) .
                ' ' .
                Html::activeInput('text', $model, 'sort',
                    ['style' => [
                        'width' => '10%',
                    ],
//                        'autofocus' => true,
                        'class' => 'active form-control',
                        'placeholder'=>'input sort of new brand',
                        'title' => 'input sort of new brand',
                    ]) .
                ' ' .
                Html::submitButton('<i class="glyphicon glyphicon-floppy-disk"></i>',
                    ['style' => [
                        'width' => '5%',
                    ],
                        'class'=>'btn btn-primary'
                    ]) .
                Html::endForm(),
            ],


        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'parent_company_id',
                'width'=>'250px',
                'value' => 'parentCompanyName',
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>$company,
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Any company'],
            ],
            'name',
            'email:email',
            'isbn',

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


            'alias',
            'sort',

            ['class' => 'yii\grid\ActionColumn'],

        ],

    ]); ?>
    <?php //Pjax::end(); ?>
</div>


