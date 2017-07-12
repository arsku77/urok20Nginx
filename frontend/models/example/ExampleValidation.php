<?php

namespace frontend\models\example;
use Yii;
class ExampleValidation extends \yii\base\Model
{

//    public $siteAdress;
    public $options;

    public function rules()
    {
        return [
            [['options'], 'required'],
            [['options'], 'each', 'rule' => ['integer']],
         ];
    }

}
//            [['siteAdress'], 'each', 'rule' => ['integer']],
//            [['siteAdress'], 'required'],
//            [['siteAdress'], 'url', 'defaultScheme' => 'http'],
