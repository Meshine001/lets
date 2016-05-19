<?php
/**
 * Created by PhpStorm.
 * User: Meshine
 * Date: 16/5/15
 * Time: 下午2:48
 */
class Contacts extends MpController{


    function doAdd(){
        $username = $this->input->post("username");
        $contacts = $this->input->post("contacts");
        $data = array(
            "username"=>$username,
            "contacts"=>$contacts);
        $this->db->insert("t_contacts",$data);
        $query = $this->db->where("username",$username)->get("t_contacts");
        $this->response(0,$query->result_array());
    }

    function doGet(){
        $username = $this->input->get("username");
        $this->db->select("*");
        $this->db->from("t_contacts");
        $this->db->where("username",$username);
        $query = $this->db->get();
        echo json_encode($query->result_array());

    }
}