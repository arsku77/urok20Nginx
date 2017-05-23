<?php

namespace frontend\components;
use Yii;
/**
 * Created by PhpStorm.
 * User: arsku
 * Date: 2017.05.16
 * Time: 12:44
 */
class stringHelper
{

    private $limit;

    public function __construct()
    {
        $this->limit = Yii::$app->params['wordsLimit'];
    }

    /**
     * @param string $string
     * @param integer $limit
     * @return string
     */
    public function getShort($string, $limit = null)
    {//veikia
        if($limit === null) {
            $limit = $this->limit;
        }

        $string = strip_tags($string);
        $intLimitWord = intval($limit);
        $arrWords = array();
        $arrWords = explode(' ', $string, $intLimitWord + 1);//get array of string: $limit+1 elements

        if(count($arrWords) == ($intLimitWord+1)){// is last elements for $arrWords
            $arrWords[$intLimitWord] = " ... "; //replace..
        }

        return implode(' ', $arrWords);//get string of array

    }
    /**
     * @param string $string
     * @param integer $limit
     * @return string
     */
//    public function getShort($string, $limit = null)
//    {
//        if($limit === null) {
//            $limit =  $this->limit;
//        }
//
//        $string = strip_tags($string);
//        $stringLen = strlen($string);
//        if ($stringLen > $limit) {
//            // get first string
//            $stringCutLimitFront = mb_substr($string, 0, $limit);//front cut for limit
//            $intLastSpaceForLimit = mb_strrpos($stringCutLimitFront, ' ');//position last space in front cut
//
//            // get last string
//            $stringCutLimitEnd = mb_substr($string, $limit, $stringLen - $limit);// last cut for limit
//            $intFirstSpaceForLimit = mb_stripos($stringCutLimitEnd, ' ');//position first space in last cut
//
//            // forming string
//            $string = mb_substr($string, 0, $limit + $intFirstSpaceForLimit).'...'; //add quantity for one word
//        }
//        return $string;
//
//    }


}