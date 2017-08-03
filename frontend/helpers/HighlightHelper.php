<?php

namespace frontend\helpers;

/**
 * @author Victor
 */
class HighlightHelper
{

    public static function process($text, $content)
    {
        $words = explode(' ', trim($text));
        return preg_replace('/' . implode('|', $words) . '/i', '<i style="color: red"><b>$0</b></i>', $content);
    }

}
