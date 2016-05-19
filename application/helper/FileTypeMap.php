<?php
/**
 * Created by PhpStorm.
 * User: Ming
 * Date: 2016/5/13
 * Time: 23:53
 */
 function getFileTypeCode($type){
    $typeMap = array(
        "profile"=>0,
        "event"=>1
    );
    return $typeMap[$type];
}