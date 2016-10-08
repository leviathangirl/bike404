<?php

namespace Home\Model;

class ReportDataModel
{
    public function __construct()
    {
    }

    public function saveReportData($data)
    {

        //file_put_contents('/tmp/tmp.log', 'Call ReportDataModel saveReportData() $data info'.":\n".print_r($data2['info'], true)."\n\n", FILE_APPEND);
        $data['lost_time'] = '2012-09-05 00:00:00';
        $data['update_time'] = '2016-09-05 00:00:00';

/*
        $data['id'] = 'TBA';
        $data['user'] = 'TBA';
        $data['contact'] = 'TBA';
        $data['uuid'] = 'TBA';
*/

        $ReportLost = M('report_lost');
        file_put_contents('/tmp/tmp.log', 'Call ReportDataModel saveReportData() $data'.":\n".print_r($data, true)."\n\n", FILE_APPEND);
        file_put_contents('/tmp/tmp.log', 'Call ReportDataModel saveReportData() count($data)'.":\n".print_r(count($data), true)."\n\n", FILE_APPEND);

        //$sql = $ReportLost->fetchSql(true)->add($data);
        //file_put_contents('/tmp/tmp.log', 'Call ReportDataModel saveReportData() $sql'.":\n".print_r($sql, true)."\n\n", FILE_APPEND);

        $result = $ReportLost->add($data);
        file_put_contents('/tmp/tmp.log', 'Call ReportDataModel saveReportData() $result'.":\n".print_r($result, true)."\n\n", FILE_APPEND);

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

    private function generateWhereByFilter($filter)
    {
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
