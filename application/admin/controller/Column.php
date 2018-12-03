<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
class Column extends Allow
{
        // 栏目列表
    public function getindex()
    {	
        $res = Db::name('column')->field('id,column,ctitle,keywords')->select();
       return $this->fetch("index",['data'=>$res]);
    }
    // 添加栏目
    // public function getadd(){
    // 	return $this->fetch('add');
    // }

    // 处理添加栏目
    public function postinsert(){
        $request = request();
        $data = $request->only('column,ctitle,keywords,description');
        //执行添加
        if(Db::name("column")->insert($data)){
            $this->success("添加成功","/admincolumn/index");
        }else{
            $this->error("添加失败");
        }
    }

    // 删除栏目
    public function postdelete(){
        $request=request();
        //获取需要删除的数据id
        $id=$request->param('id');
        if(empty($id)){
            $this->error("请选择产品");
        }
        //获取需要删除数据
       if(Db::name("column")->where("id","{$id}")->find()){
       
            $this->success("删除成功","/admincolumn/index");
        }else{
            $this->error("删除失败");
        }

    }

    // 更新栏目信息
    public function getedit(){
        $request = request();
        // 提取数据
        $id = $request->param('id');
        $data = Db::name('column')->where('id',"{$id}")->find();
       return  $this->fetch('edit',['data'=>$data]);
    }

    // 处理更新栏目信息
    public function postupdate(){
        $request = request();
        $id = $request->param('id');
       $data = $request->only('column,ctitle,keywords,description');
       if(Db::name('column')->where('id',$id)->update($data)){
            $this->success("修改成功",'/admincolumn/index');
       }else{
            $this->error("修改失败");
       }


    }

}
