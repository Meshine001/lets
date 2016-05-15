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

        $this->helper("FileTypeMap");
        //echo getFileTypeCode("event");
        ////获取活动的详细信息
        $data = (array)json_decode($this->input->post('data',null,false),true);
        //echo json_encode($data);
        if($data!=null){
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
                //获取上传后文件名
                $i=0;
                foreach($uploader->getFileName() as $fileName){
                    $i++;
                    $data["pic".$i] = $fileName;
                }

                echo json_encode($data);

            } else {
                //获取上传失败以后的错误提示
                echo json_encode($uploader->getErrorMsg());
            }
        }else{

        }

    }
}