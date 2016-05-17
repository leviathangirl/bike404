<?php

namespace Home\Model;

class ListModel
{
    public function __construct()
    {
        $this->field = 'id,title,keyword,area,brand,sub_brand,color,type,alerted_police,status,info,image,user,email,contact,descrpition,uuid,lost_time,create_time,update_time';

        $this->list_field = array('id',
                                    'area',
                                    'brand',
                                    'sub_brand',
                                    'color',
                                    'type',
                                    'alerted_police',
                                    'status',
                                    'info',
                                    'image',
                                    'unix_timestamp(lost_time) as lost_time',
                                    'unix_timestamp(create_time) as create_time',
                                    'unix_timestamp(update_time) as update_time',
                                    );

        $this->detail_field = array('id',
                                    'area',
                                    'brand',
                                    'sub_brand',
                                    'color',
                                    'type',
                                    'alerted_police',
                                    'status',
                                    'info',
                                    'image',
                                    'unix_timestamp(lost_time) as lost_time',
                                    'unix_timestamp(create_time) as create_time',
                                    'unix_timestamp(update_time) as update_time',
                                    );
    }

    public function getall($filter = null)
    {
        $field = $this->list_field;

        if ($filter) {
            # code...
        }
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
        $field = $this->detail_field;
        $result = M('list')->field($field)->where($where)->find();

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

        $field = $this->detail_field;
        $result = M('list')->where($where)->field($field)->find();

        return $result;
    }

    private function generateWhereByFilter($filter)
    {
        //{$result.id}:{$result.area}:{$result.brand}{$result.sub_brand}:{$result.color}:{$result.type}
        $where_plus = array();
        if (array_key_exists('area', $filter)) {
            $where_plus['area'] = array('like', '%'.$filter['area'].'%');
        }
        if (array_key_exists('brand', $filter)) {
            $where_plus['brand'] = array('like', '%'.$filter['brand'].'%');
        }
        if (array_key_exists('color', $filter)) {
            $where_plus['color'] = array('like', '%'.$filter['color'].'%');
        }
        if (array_key_exists('type', $filter)) {
            $where_plus['type'] = array('like', '%'.$filter['type'].'%');
        }

        return $where_plus;
    }
}
