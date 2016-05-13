<?php

/**
 * Created by PhpStorm.
 * User: Ming
 * Date: 2016/5/13
 * Time: 22:02
 */
class Event extends MpController
{
    public function doAdd(){
        ////获取活动的详细信息
        $data = json_decode($this->input->post('data',null,false));
        $title = $data["title"];
        $count = $data["count"];
        $limit = $data["limit"];
        $dateTime = $data["dateTime"];
        $endTime = $data["endTime"];
        $place = $data["place"];
        $details = $data["details"];
        ////获取活动的宣传照片
        //实例化一个上传文件对象
        $uploader = new FileUploader();
        //设置属性(上传的位置， 大小， 类型， 名是是否要随机生成)
        $uploader -> set("path", "uploads");
        $uploader -> set("maxsize", 2000000);
        $uploader -> set("allowtype", array("gif", "png", "jpg","jpeg"));
        $uploader -> set("israndname", true);

        //使用对象中的upload方法， 就可以上传文件， 方法需要传一个上传表单的名子 file为单文件,file[]为多文件, 如果成功返回true, 失败返回false
        if($uploader -> upload("file")) {
            //获取上传后文件名子
            echo json_encode($uploader->getFileName());

        } else {
            //获取上传失败以后的错误提示
            echo json_encode($uploader->getErrorMsg());
        }
    }
}