<?php

namespace Home\Controller;

use Think\Controller;

class ReportController extends Controller
{
    public function index()
    {
        $this->redirect('About/index', null, 1, '重定向至[关于本站]页面中...');
    }
}
