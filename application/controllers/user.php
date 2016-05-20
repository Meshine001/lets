<?php

/**
 * Created by PhpStorm.
 * User: Meshine
 * Date: 16/5/20
 * Time: 下午3:46
 */
class User extends MpController
{


    public function doSignIn(){
        $userId = $this->input->post("userId");
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $url = $this->config('jpushRegist');
        $data = array(
            'username'=>$username,
            'password'=>$password
        );
        $this->db->insert("t_user",$data);
        $this->response(0,"添加用户成功");
    }
}