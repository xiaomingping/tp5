<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Config;
class Index extends Controller
{
    public function getindex ()
    {
    	$data = Db::name('column')->where('id','1')->find();
        return $this->fetch('index',['data'=>$data]);
    }
}
