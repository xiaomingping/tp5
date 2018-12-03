<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Config;
class Article extends Controller
{
    public function getindex ()
    {
    	$arr = Db::name('column')->where('id','3')->find();
    	$data = Db::name('articles')->where('status','0')->paginate(2);
        return $this->fetch('index',['data'=>$data,'arr'=>$arr]);
    }

    public function getinfo ()
    {
    	$request = request();
    	$id = $request->param('id');
    	$data = Db::name('articles')->where('id',$id)->find();
        return $this->fetch('info',['data'=>$data]);
    }
}
