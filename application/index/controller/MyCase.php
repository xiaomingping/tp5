<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Config;
class MyCase extends Controller
{
    public function getindex ()
    {
    	$arr = Db::name('column')->where('id','4')->find();
    	$data = Db::name('mycase')->where('status','0')->paginate(3);
        return $this->fetch('index',['data'=>$data,'arr'=>$arr]);
    }
}
