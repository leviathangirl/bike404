<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends BaseController
{
    public function index()
    {
        $ListModel = D('List');
        $result = $ListModel->getall();

        $this->assign('result', $result);

        $this->display();
    }

    public function get()
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
            $imgUrlList = $this->generateImgUrl($result['image']);
        }

        //$this->returnSuccess(array('$result' => $result));
        //$this->returnSuccess(array('$imgUrlList' => $imgUrlList));

        $this->assign('result', $result);
        $this->assign('imgUrlList', $imgUrlList);

        $this->display();
    }

    public function random()
    {
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover,{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>random</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>', 'utf-8');
    }

    public function all()
    {
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover,{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>all</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>', 'utf-8');
    }

    private function generateImgUrl($imgInJson)
    {
        $imgArray = json_decode($imgInJson);
        if (!$imgArray) {
            $this->returnFailure('$imgInJson Error', 1);
        }
        foreach ($imgArray as $imgName) {
            $imgUrlList[] = C('IMG_PREFIX').$imgName;
        }

        return $imgUrlList;
    }
}
