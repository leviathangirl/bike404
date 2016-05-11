<?php

namespace Home\Controller;

use Think\Controller;

class ToolsController extends BaseController
{
    public function index()
    {
        $this->display();
    }

    public function advanceApiUrlGenerator()
    {
        $this->returnSuccess(array('result' => $result));
    }

}
