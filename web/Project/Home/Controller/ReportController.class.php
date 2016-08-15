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

    public function postlost()
    {
        $uploaddir = C('POST_TMP');
        $uploaduserdir = '/';
        $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
        echo nl2br(print_r($_FILES, true));
        echo nl2br(print_r($uploadfile, true));
        echo nl2br(print_r(I(), true));
    }

    public function postclue()
    {

    }
}
