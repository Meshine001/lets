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
        ////��ȡ�����ϸ��Ϣ
        $data = json_decode($this->input->post('data',null,false));
        $title = $data["title"];
        $count = $data["count"];
        $limit = $data["limit"];
        $dateTime = $data["dateTime"];
        $endTime = $data["endTime"];
        $place = $data["place"];
        $details = $data["details"];
        ////��ȡ���������Ƭ
        //ʵ����һ���ϴ��ļ�����
        $uploader = new FileUploader();
        //��������(�ϴ���λ�ã� ��С�� ���ͣ� �����Ƿ�Ҫ�������)
        $uploader -> set("path", "uploads");
        $uploader -> set("maxsize", 2000000);
        $uploader -> set("allowtype", array("gif", "png", "jpg","jpeg"));
        $uploader -> set("israndname", true);

        //ʹ�ö����е�upload������ �Ϳ����ϴ��ļ��� ������Ҫ��һ���ϴ��������� fileΪ���ļ�,file[]Ϊ���ļ�, ����ɹ�����true, ʧ�ܷ���false
        if($uploader -> upload("file")) {
            //��ȡ�ϴ����ļ�����
            echo json_encode($uploader->getFileName());

        } else {
            //��ȡ�ϴ�ʧ���Ժ�Ĵ�����ʾ
            echo json_encode($uploader->getErrorMsg());
        }
    }
}