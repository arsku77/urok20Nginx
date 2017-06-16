<?php

namespace frontend\widgets\commentsList;

use Yii;
use yii\base\Widget;
use frontend\models\Comment;

/**
 * @author admin
 */
class CommentsList extends Widget
{
    
    public $showLimit = null;
    
    public function run()
    {
        $max = Yii::$app->params['maxCommentsInList'];
        if ($this->showLimit) {
            $max = $this->showLimit;
        }

        $list = Comment::getCommentsList($max);

        return $this->render('block', [
            'list' => $list,
        ]);
    }
}
