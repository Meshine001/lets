<?php
/**
 * Created by PhpStorm.
 * User: Meshine
 * Date: 16/5/15
 * Time: 下午2:48
 */
class Contacts extends MpController{

    /**
     * 添加联系人，手机需要先检查本地该用户是否已经存在
     */
    function doAdd(){
        $username = $this->input->get("username");
        $contacts = $this->input->get("contacts");
        $data = array(
            "username"=>$username,
            "contacts"=>$contacts);
        $this->db->insert("t_contacts",$data);

        $query = $this->db->where("username",$username)->get("t_contacts");

        echo json_encode($query->result_array());
    }

    /**
     * 获取该用户的所有联系人
     */
    function doGet(){
        $username = $this->input->get("username");
        $this->input->get("ckattempt");
        $this->db->select("*");
        $this->db->from("t_contacts");
        $this->db->where("username",$username);
        $query = $this->db->get();
        echo json_encode($query->result_array());
    }
}