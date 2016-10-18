<?php

namespace Home\Model;

class ReportDataModel
{
    public function __construct()
    {
    }

    public function saveReportData($data)
    {

        file_put_contents('/tmp/tmp.log', 'Call ReportDataModel saveReportData() pre_$data info'.":\n".print_r($data, true)."\n\n", FILE_APPEND);
        //$data['lost_time'] = '2012-09-05 00:00:00';
        //$data['update_time'] = '2016-09-05 00:00:00';

        $ReportLost = M('report_lost');
        //file_put_contents('/tmp/tmp.log', 'Call ReportDataModel saveReportData() $data'.":\n".print_r($data, true)."\n\n", FILE_APPEND);
        //file_put_contents('/tmp/tmp.log', 'Call ReportDataModel saveReportData() count($data)'.":\n".print_r(count($data), true)."\n\n", FILE_APPEND);

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
        $ReportLost = M('report_lost');
        $where = array('id' => $id);
        $result = $ReportLost->where($where)->find();
        unset($result['update_time']);
        file_put_contents('/tmp/tmp.log', 'Call ReportDataModel getbyid() $result'.":\n".print_r($result, true)."\n\n", FILE_APPEND);

        return $result;
    }

}
