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
        ////��ȡ�����ϸ��Ϣ
        $data = (array)json_decode($this->input->post('data',null,false),true);
        //echo json_encode($data);
        if($data!=null){
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
                //��ȡ�ϴ����ļ���
                $i=0;
                foreach($uploader->getFileName() as $fileName){
                    $i++;
                    $data["pic".$i] = $fileName;
                }

                echo json_encode($data);

            } else {
                //��ȡ�ϴ�ʧ���Ժ�Ĵ�����ʾ
                echo json_encode($uploader->getErrorMsg());
            }
        }else{

        }

    }
}