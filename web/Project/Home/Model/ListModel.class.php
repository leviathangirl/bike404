<?php

namespace Home\Model;

class ListModel
{
    public function __construct()
    {
        $this->field = 'id,title,keyword,area,brand,sub_brand,color,type,alerted_police,status,info,image,user,email,contact,descrpition,uuid,lost_time,create_time,update_time';
    }

    public function getall()
    {
        $field = 'id,area,brand,sub_brand,color,type,alerted_police,status,info,user,email,contact,descrpition,uuid,lost_time,create_time,update_time';

        $result = M('list')->field($field)->select();

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

    public function getOneByRadnom($filter = null)
    {
        $idList = M('list')->field('id')->select();
        $random = array_rand($idList);

        $where = array('id' => $idList[$random]['id']);
        if ($filter && !is_array($filter)) {
            $whereplus = generateWhereByFilter($filter);
            $where = array_merge($where, $whereplus);
        }

        $field = $this->field;
        $result = M('list')->where($where)->field($field)->find();

        return $result;
    }

    private function generateWhereByFilter($filter)
    {
        //{$result.id}:{$result.area}:{$result.brand}{$result.sub_brand}:{$result.color}:{$result.type}
        $whereplus = array();
    }
}
