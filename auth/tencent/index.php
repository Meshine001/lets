<?php
/**
 * Created by PhpStorm.
 * User: Meshine
 * Date: 16/5/18
 * Time: 下午4:18
 */

include 'include.php';
use Tencentyun\ImageV2;
use Tencentyun\Auth;
use Tencentyun\Video;
use Tencentyun\ImageProcess;

$bucket = 'letsimages'; // 自定义空间名称，在http://console.qcloud.com/image/bucket创建
$type = $_GET['type'];
switch ($type){
    case 'upload':
        //生成新的上传签名
        $expired = time() + 999;
        $sign = Auth::appSign('http://web.image.myqcloud.com/photos/v1/200679/0/', $expired);
        var_dump($sign);

        break;
}
