<?php

namespace Home\Controller;

use Think\Controller;

class BaseController extends Controller
{
    public function _initialize()
    {
    }

    protected function returnSuccess(array $data = array())
    {
        $ret = array(
            'error_code' => 0,
            'error_msg' => 'success',
        );
        $this->ajaxReturn(array_merge($ret, $data), 'json', JSON_PRETTY_PRINT);
    }

    protected function returnFailure($msg = '', $code = 1)
    {
        $ret = array(
            'error_code' => $code,
            'error_msg' => $msg,
        );
        $this->ajaxReturn($ret, 'json', JSON_PRETTY_PRINT);
    }
}
