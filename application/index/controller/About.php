<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Config;
class About extends Controller
{
    public function getindex ()
    {
    	$arr = Db::name('column')->where('id','5')->find();
    	$gsjj = Db::name('single')->where('id',1)->find();
        $fzlc = Db::name('single')->where('id',2)->find();
        $data = Db::name('work')->where('status',0)->select();
        return $this->fetch('index',['gsjj'=>$gsjj,'arr'=>$arr,'fzlc'=>$fzlc,'data'=>$data]);
    }

    public function getinfo ()
    {
    	$request = request();
    	$id = $request->param('id');
    	$data = Db::name('goods')->where('id',$id)->find();
        return $this->fetch('info',['data'=>$data]);
    }
}
