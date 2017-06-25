<?php

namespace frontend\models;
use Yii;
use yii\base\Model;

class Window extends Model
{

    const SCENARIO_WINDOW_ORDER = 'window_order';

    public $withWindow;
    public $heightWindow;
    public $numberCameras;
    public $numberAllLeaf;
    public $numberRotatableLeaf;
    public $color;
    public $windowSillIsNeed;//
    public $name;
    public $email;

    public function scenarios()
    {

        return [
            self::SCENARIO_WINDOW_ORDER => ['withWindow', 'heightWindow', 'numberCameras', 'numberAllLeaf', 'numberRotatableLeaf', 'color', 'windowSillIsNeed', 'name', 'email',],
        ];
    }

    public function rules()
    {
        return [
            [['withWindow', 'heightWindow', 'numberCameras', 'numberAllLeaf', 'numberRotatableLeaf', 'color', 'windowSillIsNeed', 'name', 'email',], 'required'],
            [['Name'], 'string', 'min' => 2],
            [['with'], 'integer', 'min' => 70, 'max' => 210],
            [['height'], 'integer', 'min' => 100, 'max' => 200],
            [['numberCameras'], 'in', 'range' => [1, 2, 3]],
            [['numberAllLeaf'], 'integer', 'min' => 1],
            [['numberRotatableLeaf'], 'compare', 'compareAttribute' => 'numberAllLeaf', 'operator' => '<'],
            [['color'], 'string', 'min' => 2],
            [['windowSillIsNeed'], 'boolean'],
            [['email'], 'email'],
        ];
    }

    public function save()
    {
        return true;
    }

    public function send()
    {
        return Sender::sendorder($this);
    }
}
