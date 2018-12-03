<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
class Backups extends Allow
{
    
       // 备份列表
    public function getindex()
    {	
        $res = mybackup();
       return $this->fetch("index",['data'=>$res->fileList()]);
    }
    // 空
    public function getadd()
    {   
        return '';
    }
    // 备份操作
    public function getinsert()
    {
        $res = mybackup();
        $tables = $res->dataList();//获得数据类表列表
        $file=['name'=>date('Ymd-His'),'part'=>1];
        foreach ($tables as $k => $v) {
            $start= $res->setFile($file)->backup($v['name'], 0);
        }
            if($start == 0){
                $this->success("备份成功");
            }else{
                $this->error("备份失败");
            }

    }
    // 空
    public function getedit(){
       return '';
    }
    // 还原数据库
    public function postupdate()
    {
        $request = request();
        $data = $request->only('id');
        $res = mybackup();
        $file=['name'=>date('Ymd-His',$data['id']),'1'=>'./Data/'.date('Ymd-His',$data['id']).'-1.sql','part'=>1];
        // var_dump($file);die;
        $start = $res->setTimeout($data['id'])->setFile($file)->import(0);
        // var_dump($start);die;
        if($start == 0){
            $this->success("数据库还原成功");
        }else{
            $this->error("数据库还原失败");
        }

    }

    // 删除备份
    public function postdelete()
    {
        $request = request();
        $data = $request->only('id');
        $res = mybackup();
        $result = $res->delFile($data['id']);
        if(!empty($result)){
            $this->success("删除成功");
        }else{
            $this->error("删除失败");
        }

    }

}
