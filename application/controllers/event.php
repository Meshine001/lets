<?php

/**
 * Created by PhpStorm.
 * User: Ming
 * Date: 2016/5/13
 * Time: 22:02
 */
class Event extends MpController
{

    public function doGetNewest(){
        $query = $this->db->order_by("id","desc")
            ->get("t_event",20,0);
        echo json_encode($query->result_array());

    }

    public function doGetHotest(){
        $query = $this->db->order_by("already","desc")
            ->get("t_event",20,0);
        echo json_encode($query->result_array());
    }

    /**
     * get the special events of the type
     */
    public function doGet(){
        $type = $this->input->get("eventType");
        $limit = $this->input->get("limit");
        $offset = $this->input->get("offset");
        $query = $this->db->where("eventType",$type)
            ->get("t_event",$limit,$offset);
        echo  json_encode($query->result_array());

    }

    public function doAdd(){

        $data = (array)json_decode($this->input->post('data',null,false),true);

        if($data!=null){
            $uploader = new FileUploader();
            $uploader -> set("path", "upload");
            $uploader -> set("maxsize", 2000000);
            $uploader -> set("allowtype", array("gif", "png", "jpg","jpeg"));
            $uploader -> set("israndname", true);
            //need the form filed name 'file[]'
            if($uploader -> upload("file")) {
                $i=0;
                foreach($uploader->getFileName() as $fileName){
                    $i++;
                    $data["pic".$i] = $fileName;
                }

                //add to mysql

                $query = $this->db->insert("t_event",$data);

                echo json_encode($query->result_array());

            } else {
                echo $uploader->getErrorMsg();
            }
        }else{

        }

    }
}