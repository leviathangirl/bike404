<?php

namespace Home\Model;

class ListModel
{
    public function __construct()
    {
        $this->field = 'id,title,keyword,area,brand,color,type,alerted_police,status,info,image,user,email,contact,uuid,create_time,update_time';
    }

    public function getall()
    {
        $result = M('list')->select();

        return $result;
    }

    public function getbyfilter($filter)
    {
        if (!is_array($filter)) {
            return false;
        }

        $result = M('list')->select();

        return $result;
    }

    public function getbyid($id)
    {
        if (!is_numeric($id)) {
            return false;
        }

        $where = array('id' => $id);
        $field = $this->field;
        $result = M('list')->where($where)->find();

        return $result;
    }

    public function getbyuuid($uuid)
    {
        if (!is_string($uuid)) {
            return false;
        }

        $where = array('uuid' => $uuid);
        $field = $this->field;
        $result = M('list')->where($where)->field($field)->find();

        return $result;
    }

    public function getOneByRadnom($filter)
    {

/*
SELECT *
FROM `table` AS t1 JOIN (SELECT ROUND(RAND() * ((SELECT MAX(id) FROM `table`)-(SELECT MIN(id) FROM `table`))+(SELECT MIN(id) FROM `table`)) AS id) AS t2
WHERE t1.id >= t2.id
ORDER BY t1.id LIMIT 1;
*/

        $where = array('uuid' => $uuid);
        $field = $this->field;
        $result = M('list')->where($where)->field($field)->find();

        return $result;
    }
}
