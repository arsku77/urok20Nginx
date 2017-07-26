<?php
/**
 * Created by PhpStorm.
 * User: arsku
 * Date: 2017.07.25
 * Time: 11:08
 */

namespace common\components;


interface UserNotificationInterface
{
    public function getEmail();

    public function getSubject();

}