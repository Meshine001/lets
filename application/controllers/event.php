<?php

/**
 * Created by PhpStorm.
 * User: Ming
 * Date: 2016/5/13
 * Time: 22:02
 */

class Event extends MpController
{

     function doGetNewest()
    {
        $query = $this->db->order_by("id", "desc")
            ->get("t_event", 20, 0);
        $this->response(0,$query->result_array());

    }

     function doGetHotest()
    {
        $query = $this->db->order_by("already", "desc")
            ->get("t_event", 20, 0);
        $this->response(0,$query->result_array());
    }

    function doGetRecommend(){
        $query = $this->db->order_by("id", "desc")
            ->get("t_event", 20, 0);
        $this->response(0,$query->result_array());
    }



    /**
     * get the special events of the type
     */
     function doGet()
    {
        $type = $this->input->get("eventType");
        $limit = $this->input->get("limit");
        $offset = $this->input->get("offset");
        $query = $this->db->where("eventType", $type)
            ->get("t_event", $limit, $offset);
        $this->response(0,$query->result_array());

    }

     function doAdd()
    {
        $data = (array)json_decode($this->input->post('data', null, false), true);

        if ($data != null) {
            //add to mysql
            $data["createTime"] = time();
            $this->db->insert("t_event", $data);

            $this->response(0,"发起活动成功");

        }else{
            $this->errResponse(-1,"请求数据为空");
        }
    }


}