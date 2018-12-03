<?php
namespace app\admin\controller;
use think\Controller;
use think\config;
use think\Session;
class Index extends Allow
{
	// 后台首页
    public function getindex()
    {
    	// 获取登录信息

       return $this->fetch("index");
    }

    // // 用户添加
    // public function getadd(){

    // 	return $this->fetch('add');
    // }
}
