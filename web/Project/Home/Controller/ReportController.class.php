<?php

namespace Home\Controller;

use Think\Controller;

class ReportController extends Controller
{
    public function index()
    {
        //$this->redirect('About/index', null, 1, '重定向至[关于本站]页面中...');
        $this->display();
    }

    public function lost()
    {
        $this->display('report_lost');
    }

    public function clue()
    {
        $this->display('report_clue');
    }

    public function reportSuccess()
    {
        $id = I('id');
        $ReportDataModel = D('ReportData');
        $result = $ReportDataModel->getbyid($id);
        if (!$result) {
            echo 'error';
            exit();
        }
        //$json = json_encode($result, JSON_PRETTY_PRINT + JSON_UNESCAPED_UNICODE);
        //file_put_contents('/tmp/tmp.log', 'Call ReportController reportSuccess() $json'.":\n".print_r($json, true)."\n\n", FILE_APPEND);
        //$json = nl2br($json);
        //$this->assign('json', $json);

        $this->assign('result', $result);
        $this->display('report_success');
    }

    public function postReportLostImage()
    {
        header('Content-Type: text/plain; charset=UTF-8');
        //I('data.file1','','',$_FILES);
        file_put_contents('/tmp/tmp.log', 'Call ReportController postReportLostImage() $_FILES'.":\n".print_r($_FILES, true)."\n\n", FILE_APPEND);

        if (!$_FILES['files']['name']) {
            echo 'error';
            exit();
        }

        $files = $_FILES['files'];
        $files = $this->reArrayFiles($files);

        file_put_contents('/tmp/tmp.log', 'Call ReportController postReportLostImage() reArrayFiles() $_FILES'.":\n".print_r($files, true)."\n\n", FILE_APPEND);

        $uploaddir_root = C('POST_TMP');
        $timestamp = date('YmdHis', time()).mt_rand();

        $uploaddir = $uploaddir_root.$timestamp;
        file_put_contents('/tmp/tmp.log', 'Call ReportController postReportLostImage() $uploaddir'.":\n".print_r($uploaddir, true)."\n\n", FILE_APPEND);

        mkdir($uploaddir);
        foreach ($files as $val) {
            move_uploaded_file($val['tmp_name'], $uploaddir.'/'.$val['name']);
        }

        echo $timestamp;

        exit();
    }

    public function postReportLostData()
    {
        $post = print_r($_POST, true);
        //header('Content-Type: text/html; charset=UTF-8');
        $json = json_encode($_POST, JSON_PRETTY_PRINT + JSON_UNESCAPED_UNICODE);
        $data = $_POST;
        file_put_contents('/tmp/tmp.log', 'Call ReportController postReportLostData() $data'.":\n".print_r($data, true)."\n\n", FILE_APPEND);

        $ReportDataModel = D('ReportData');
        $result = $ReportDataModel->saveReportData($data);
        echo $result;
    }

    public function postclue()
    {
    }

    private function reArrayFiles($file)
    {
        $file_ary = array();
        $file_count = count($file['name']);
        $file_key = array_keys($file);

        for ($i = 0;$i < $file_count;++$i) {
            foreach ($file_key as $val) {
                $file_ary[$i][$val] = $file[$val][$i];
            }
        }

        return $file_ary;
    }
}
