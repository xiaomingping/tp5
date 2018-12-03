<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
class Link extends Allow
{
        // 友情链接管理列表
    public function getindex()
    {	
        $request = request();
    	$res = Db::name('link')->field('id,webname,url,name,phone,status')->paginate(2);
       return $this->fetch("index",['data'=>$res,'request'=>$request->param()]);
    }



    // 添加友情链接
    public function getadd(){
    	return $this->fetch('add');
    }


    // 处理添加友情链接
    public function postinsert(){
        $request = request();
        // 验证数据
        $data = $request->only('webname,url,name,phone');
        $resu = $this->validate($data,'User.link');
            if(true !== $resu){
                // 数据错误
                $this->error($resu);
            }
        // 添加数据
            $data['status'] = $request->param('status');
            if(Db::name('link')->insert($data)){
                // 添加成功
                $this->success("添加成功",'/adminlink/index');
            }else{
                // 添加失败
                $this->error("添加失败");
            }
    }

    // 删除友情链接
    public function postdelete(){
        $request = request();
        // 提取数据
        $id = $request->param('id');
        if(empty($id)){
            $this->error("请选择友情链接");
        }
        if(Db::name('link')->where('id',"{$id}")->delete()){
            $this->success('删除成功');
        }else{
            $this->error("删除失败");

        }

    }

    // 更新友情链接信息
    public function getedit(){
        $request = request();
        // 提取数据
        $id = $request->param('id');
        $data = Db::name('link')->where('id',"{$id}")->find();
       return  $this->fetch('edit',['data'=>$data]);
    }

    // 处理更新友情链接信息
    public function postupdate(){
        $request = request();
        // 验证数据
        $id = $request->param('id');
        if(empty($id)){
            $this->error("非法操作");
        }
        $data = $request->only('webname,url,name,phone');
        $resu = $this->validate($data,'User.link');
        if(true !== $resu){
                // 数据错误
                $this->error($resu);
            }
        $data['status'] = $request->param('status');
        if(DB::name('link')->where('id',"{$id}")->update($data)){
            $this->success('修改成功','/adminlink/index');
        }else{
            $this->error('修改失败');
        }


    }

}
