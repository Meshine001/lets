<?php

/**
 * Created by PhpStorm.
 * User: Meshine
 * Date: 16/5/20
 * Time: 下午3:46
 */
class User extends MpController
{

    /**
     * Add new user
     */
    public function doSignUp(){
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $data = array(
            'username'=>$username,
            'password'=>$password
        );
        try {
            $this->db->insert("t_user", $data);
            $this->response(0, "添加用户成功");
        } catch (Exception $e) {
            $this->response(-1,$e);
        }
    }
}