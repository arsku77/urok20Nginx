<?php

use kartik\builder\TabularForm;
use kartik\grid\EditableColumnAction;
use kartik\grid\ActionColumn;
use frontend\models\BranchOfCompany;
use kartik\widgets\DateTimePicker;
//use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\helpers\Url;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
//use kartik\widgets\DatePicker;
use kartik\field\FieldRange;
use kartik\date\DatePicker;
use kartik\datecontrol\DateControl;
//use yii\widgets\ActiveForm;
use kartik\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BranchOfCompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Branch Of Companies';
$this->params['breadcrumbs'][] = $this->title;
//veikia uzsiciklina Url::remember(Url::current(), 'rememberWentToCartView');
//Url::remember(Url::current(), 'rememberBranchIndexView');
?>
<?php //Pjax::begin(); ?>
<?php //if ($searchModel->flagShowUpdateForm): ?>
    <div class="branch-of-company-index">


        <?php $form = ActiveForm::begin(); ?>
        <?= TabularForm::widget([
            'form' => $form,
            'dataProvider' => $dataProvider,
//    'searchModel' => $searchModel,
            'gridSettings' => [
                'pjax'=>true,
                'floatHeader' => true,
                'panel' => [
                    'type' => GridView::TYPE_PRIMARY,
                    'heading' => '<h3 class="panel-title">' . $this->title,
                    'before' =>
                        Html::beginForm(['branch/index'], 'get', ['class' => 'form-inline',
                        ]) .
                        Html::a('<i class="glyphicon glyphicon-repeat"></i>',
                            ['index',
//                                'flagShowUpdateForm' => true,

                            ], ['class' => 'btn btn-info']) .
                        ' ' .
                        Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                            ['class' => 'btn btn-success']) .
                        Html::endForm() .
                        ' ' .
                        Html::a('<i class="glyphicon glyphicon-th"></i>&nbsp;View result',
                            ['index',
                                'flagShowUpdateForm' => false,
                            ],
                            [
                                'class' => 'btn btn-default',
                                'id' => 'btnShowUpdate',
                                'data' => [
                                    'method' => 'post',
                                ],
                            ]),

                    'after'=>
                        Html::a(
                            '<i class="glyphicon glyphicon-plus"></i> Add New',
                            ['create'],
                            ['class'=>'btn btn-success']
                        ) . '&nbsp;' .
                        Html::a(
                            '<i class="glyphicon glyphicon-remove"></i> Delete',
                            ['delete'],
                            [
                                'class'=>'btn btn-danger',
                                'data' => [
                                    'method' => 'post',
                                ]
                            ]
                        ) . '&nbsp;' .
                        Html::a(
                            '<i class="glyphicon glyphicon-repeat"></i>',
                            ['index'],
                            ['class'=>'btn btn-info']
                        ) . '&nbsp;' .
                        Html::submitButton(
                            '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
                            ['class'=>'btn btn-primary']
                        ),



                ]
            ],





            'attributes' => [
                'name' => ['type' => TabularForm::INPUT_TEXT],
//        'color' => [
//            'type' => TabularForm::INPUT_WIDGET,
//            'widgetClass' => \kartik\widgets\ColorInput::classname()
//        ],
                'parent_company_id' => [
                    'label' => 'Company',
                    'type' => TabularForm::INPUT_WIDGET,
                    'widgetClass' => \kartik\widgets\Select2::class,
                    'options' => [
                        'data' => $company,
                        'options' => ['placeholder' => 'Choose Company'],
                    ],
                    'columnOptions' => ['width' => '15%'],
                ],

                'email' => [
                    'type' => TabularForm::INPUT_TEXT,
                    'options'=>['class'=>'form-control text-right'],
                    'columnOptions'=>['hAlign'=>GridView::ALIGN_RIGHT]
                ],


                'date_foundation' => [
                    'type' => TabularForm::INPUT_WIDGET,
                    'widgetClass'=>\kartik\widgets\DatePicker::class,
                    'options'=>
                        [
                            'pluginOptions'=>[
                                'format'=>'yyyy-mm-dd',
                                'todayHighlight'=>true,
                                'autoclose'=>true
                            ]
                        ],
                    'columnOptions'=>['width'=>'20%']
                ],


                'isbn' => [
                    'type' => TabularForm::INPUT_STATIC,
                    'columnOptions'=>['hAlign'=>GridView::ALIGN_RIGHT]
                ],


                'sort' => [
                    'type' => TabularForm::INPUT_TEXT,
                    'options'=>['class'=>'form-control text-right'],
                    'columnOptions'=>['hAlign'=>GridView::ALIGN_RIGHT, 'width'=>'10%']
                ],

            ],

        ]);
        ActiveForm::end();?>
        <?php //Pjax::end(); ?>

    </div>

<?php //else: ?>
    <?php //Url::remember(Url::current(), 'rememberWentToCartView'); ?>
    <div class="branch-of-company-index">
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
                    Html::endForm() .
                    ' ' .
                    Html::a('<i class="glyphicon glyphicon-edit"></i>&nbsp;View editable',
                        ['index',
                            'flagShowUpdateForm' => true,
                        ],
                        ['class' => 'btn btn-default',
                            'id' => 'btnShowUpdate',
                            'data' => [
                                'method' => 'post',
                            ],
                        ]),


                /*-------validacija suveikia bandant irasyti - is karto nukreipia i create puslapi-----*/
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

                [
                    'class' => ActionColumn::class,
                    'template' => '{save}&nbsp;&nbsp;&nbsp;{view}&nbsp;&nbsp;&nbsp;{update}&nbsp;&nbsp;&nbsp;{delete}',
                    'buttons' => [
                        'update' => function ($url, BranchOfCompany $model) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id' => $model->id]);
                        },
                        'save' => function ($url, BranchOfCompany $model) {
                            return Html::a('<span class="glyphicon glyphicon-floppy-save"></span>', ['branch/update', 'id' => $model->id]);
                        },
                        'view' => function ($url, BranchOfCompany $model) {
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'id' => $model->id]);
                        },
                        'delete' => function ($url, BranchOfCompany $model) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id],
                                [
//                                        'class' => 'btn btn-danger',
                                    'data' => [
                                        'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                    ],
                                ]
                            );
                        },
                    ],

                ],

            ],

        ]);?>



    </div>
<?php //endif; ?>
<?php //Pjax::end(); ?>

