<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Config;
class Goods extends Controller
{
    public function getindex ()
    {
    	$arr = Db::name('column')->where('id','2')->find();
    	$data = Db::name('goods')->where('hshow','1')->select();
        return $this->fetch('index',['data'=>$data,'arr'=>$arr]);
    }

    public function getinfo ()
    {
    	$request = request();
    	$id = $request->param('id');
    	$data = Db::name('goods')->where('id',$id)->find();
        return $this->fetch('info',['data'=>$data]);
    }
}
