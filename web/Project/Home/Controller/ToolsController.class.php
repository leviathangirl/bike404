<?php

namespace Home\Controller;

use Think\Controller;

class ToolsController extends BaseController
{
    public function index()
    {
        $this->display('basic');
    }

    public function basic()
    {
        $SITE_URL = C('SITE_URL');
        $this->assign('SITE_URL', $SITE_URL);
        $this->display();
    }

    public function advance()
    {
        $this->display('index');
    }

    public function advanceApiUrlGenerator()
    {
        $this->returnSuccess(array('result' => null));
    }

    public function sitemap()
    {
        $default_lastmod = C('LASTMODIFIED_TIME');
        $default_changefreq = 'daily';
        $lastestmod = $default_lastmod;

        $urlmap = array();
        $urlmap[0] = array('loc' => C('SITE_URL'),'lastmod' => date(DATE_W3C, $default_lastmod),'changefreq' => $default_changefreq,'priority' => 1.0);
        $urlmap[1] = array('loc' => C('SITE_URL').'about','lastmod' => date(DATE_W3C, $default_lastmod),'changefreq' => $default_changefreq,'priority' => 0.9);
        $urlmap[2] = array('loc' => C('SITE_URL').'tools/basic','lastmod' => date(DATE_W3C, $default_lastmod),'changefreq' => $default_changefreq,'priority' => 0.9);

        $ListModel = D('List');
        $list = $ListModel->getall();

        foreach ($list as $key => $value) {
            $update_time = date(DATE_W3C, $value['update_time']);
            $interval = $default_lastmod - $value['update_time'];

            if (!$lastestmod || $lastestmod < $value['update_time']) {
                $lastestmod = $value['update_time'];
            }

            switch (true) {
                case ($interval < 3600):
                    $changefreq = 'always';
                    $priority = 1.0;
                    break;
                case (3600 <= $interval && $interval < 86400):
                    $changefreq = 'hourly';
                    $priority = 0.95;
                    break;
                case (86400 <= $interval && $interval < 604800):
                    $changefreq = 'daily';
                    $priority = 0.9;
                    break;
                case (604800 <= $interval && $interval < 2592000):
                    $changefreq = 'weekly';
                    $priority = 0.8;
                    break;
                case (2592000 <= $interval && $interval < 31536000):
                    $changefreq = 'monthly';
                    $priority = 0.7;
                    break;

                case (31536000 <= $interval):
                    $changefreq = 'yearly';
                    $priority = 0.5;
                    break;

                default:
                    $changefreq = 'never';
                    $priority = 0.1;
                    break;
            }

            $urlmap[] = array('loc' => C('SITE_URL').'index/getbyid?id='.$value['id'],'lastmod' => $update_time,'changefreq' => $changefreq,'priority' => $priority);
        }

        $urlmap[0] = array('loc' => C('SITE_URL'),'lastmod' => date(DATE_W3C, $lastestmod), 'changefreq' => $default_changefreq,'priority' => 1.0);

        $generated_on = date(DATE_W3C, time());

        $this->assign('generated_on', $generated_on);
        $this->assign('urlmap', $urlmap);
        $this->display('sitemap', 'utf-8', 'text/xml');
    }
}
