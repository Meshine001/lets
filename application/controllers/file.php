<?php

/**
 * Created by PhpStorm.
 * User: Meshine
 * Date: 16/5/19
 * Time: 下午2:53
 */
class File extends MpController
{
    public function doUpload(){

        $up = new FileUploader();
        //设置属性(上传的位置， 大小， 类型， 名是是否要随机生成)
        $up -> set("path", "uploads");
        $up -> set("maxsize", 2000000);
        $up -> set("allowtype", array("gif", "png", "jpg","jpeg"));
        $up -> set("israndname", true);

        //使用对象中的upload方法， 就可以上传文件， 方法需要传一个上传表单的名子 pic, 如果成功返回true, 失败返回false
        if($up -> upload("file")) {
            $this->response(0,$up->getFileName());

        } else {
            //获取上传失败以后的错误提示
            $this->errResponse(-1,$up->getErrorMsg());
        }
    }

}