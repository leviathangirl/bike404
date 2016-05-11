<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends BaseController
{
    public function index()
    {
        $ListModel = D('List');
        $list = $ListModel->getall();

        $this->assign('result', $list);

        $this->display();
    }

    public function getbyid()
    {
        $ListModel = D('List');
        $id = I('get.id');
        if (!is_numeric($id)) {
            $this->returnFailure('Parameter error, !is_integer($id)', 1);
        }

        $result = $ListModel->getbyid($id);
        if (!$result) {
            $this->returnFailure('Query Failed', 1);
        }

        if ($result['image']) {
            $imgUrlList = $this->generateImgUrl($result);
        }

        $this->assign('result', $result);
        $this->assign('imgUrlList', $imgUrlList);

        $this->display('get');
    }

    private function generateImgUrl($result)
    {
        $Generator = D('Generator');
        $imgUrlList = $Generator->generateImgUrl($result);

        return $imgUrlList;
    }
}
