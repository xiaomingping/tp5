<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
class SystemLog extends Allow
{
        // 登录日志列表
    public function getindex()
    {	
        $request = request();
        $res = Db::name('login_log')->alias('pl')->join('user u','pl.login_uid = u.id')->order('pl.login_log','desc')->paginate(10);     
       return $this->fetch("index",['data'=>$res,'request'=>$request->param()]);
    }

         // 操作日志列表
    public function getindexs()
    {   
        $request = request();
    $res = Db::name('operation_log')->alias('pl')->join('user u','pl.operation_uid = u.id')->order('pl.operation_log','desc')->paginate(10);     
       return $this->fetch("indexs",['data'=>$res,'request'=>$request->param()]);
    }
}
