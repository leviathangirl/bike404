<?php

namespace Home\Controller;

use Think\Controller;

class ApiController extends BaseController
{
    public function index()
    {
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover,{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>', 'utf-8');
    }

    public function getlist()
    {
        $ListModel = D('List');
        $list = $ListModel->getall();

        $this->returnSuccess(array('result' => $list));
    }

    public function get()
    {
        $ListModel = D('List');
        $result = $ListModel->getOneByRadnom();
        $this->mergeImgUrl($result);

        $result['url'] = C('SITE_URL').'index/getbyid?id='.$result['id'];
        $this->returnSuccess(array('result' => $result));
    }

    public function getbyid()
    {
        $ListModel = D('List');
        $id = I('get.id');
        if (!is_numeric($id)) {
            $this->returnFailure('Parameter error', 1);
        }

        $result = $ListModel->getbyid($id);
        if ($result === false) {
            $this->returnFailure('Query Failed, Something happened', 1);
        }

        if ($result === null) {
            $this->returnFailure('Query Failed, No such id', 1);
        }
        $this->mergeImgUrl($result);
        $result['url'] = C('SITE_URL').'index/getbyid?id='.$result['id'];
        $this->returnSuccess(array('result' => $result));
    }

    private function mergeImgUrl(&$result)
    {
        $Generator = D('Generator');
        $imgUrlList = $Generator->generateImgUrl($result);

        $result['image'] = $imgUrlList;

        return;
    }
}
