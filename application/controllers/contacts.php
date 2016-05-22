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
        if($this->db->insert("t_contacts",$data)){
            $query = $this->db->where("username",$username)->get("t_contacts");
            $this->response(0,$query->result_array());
        }else{
            $this->response(-1,"添加联系人失败");
        }

    }

    function doGet(){
        $username = $this->input->get("username");
        $this->db->select("*");
        $this->db->from("t_contacts");
        $this->db->where("username",$username);
        $query = $this->db->get();
        $this->response(0,$query->result_array());
    }

    function doDelete(){
        $username = $this->input->post("username");
        $contacts = $this->input->post("contacts");
        $data = array(
            "username"=>$username,
            "contacts"=>$contacts);
        try {
            $this->db->delete("t_contacts", $data);
            $this->db->select("*")->from("t_contacts")->where("username",$username);
            $this->response(0,$this->db->get()->result_array());
        } catch (Exception $e) {
            $this->errResponse(-1,$e);
        }
    }
}