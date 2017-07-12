<?php
namespace frontend\controllers;
/**
 * Created by PhpStorm.
 * User: arsku
 * Date: 2017.06.11
 * Time: 16:28
 */
class HtmlHelperController extends \yii\web\Controller
{
    public function actionDemo()
    {
        return $this->render('demo');
    }


    public function actionEscapeOutput()
    {
        $comments = [
            [
                'id' => 10,
                'author' => 'Student',
                'text' => 'Hello',
            ],
            [
                'id' => 11,
                'author' => 'Victor',
                'text' => 'Hello! How are you?',
            ],
            [
                'id' => 12,
                'author' => 'hacer',
                'text' => '<b>Hello!</b><script>alert("ar pravesi man pinig7?");</script>',
            ],
        ];


        return $this->render('escape-output', [
            'comments' => $comments,
        ]);
    }



}