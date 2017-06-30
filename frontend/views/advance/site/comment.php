<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use frontend\assets\CleanBlogSitesAsset;
use frontend\widgets\commentsList\CommentsList;

$this->title = 'comments';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-contact">
    <h3><?= Html::encode($this->title) ?></h3>

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

            <div class="comment">
<!--                <h2 class="post-title">news list</h2>-->
                <?php echo CommentsList::widget(['showLimit' => Yii::$app->params['maxCommentsInListInForm']]); ?>

            </div>

        </div>
    </div>



    <p>
        Comment respectfully comment. Thank you.
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'text')->textarea(['rows' => 6])->label('Comment') ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
