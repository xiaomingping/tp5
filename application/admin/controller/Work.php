<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
class Work extends Allow
{
        // 招聘信息列表
    public function getindex()
    {	
    	$res = Db::name('work')->field('id,wtitle,worktime')->select();
       return $this->fetch("index",['data'=>$res]);
    }



    // 添加招聘信息
    public function getadd(){
    	return $this->fetch('add');
    }


    // 处理添加招聘信息
    public function postinsert(){
        $request = request();
        $data = $request->only('wtitle,descr');
        $resu = $this->validate($data,'User.work');
        if(true !==$resu){
            $this->error($resu);
        }
        $data['worktime'] = time();
        if(Db::name('work')->insert($data)){
            $this->success("添加成功",'/adminwork/index');
        }else{
            $this->error("添加失败");
        }

    }

    // 删除招聘信息
    public function postdelete(){
        $request=request();
        //获取需要删除的数据id
        $id=$request->param('id');
        if(empty($id)){
            $this->error("请选择招聘信息");
        }
        if(Db::name('work')->where('id',$id)->delete()){
            $this->success("修改成功");
        }else{
            $this->error("修改失败");
        }
    }

    // 更新招聘信息信息
    public function getedit(){
        $request = request();
        // 提取数据
        $id = $request->param('id');
        $data = Db::name('work')->where('id',"{$id}")->find();
       return  $this->fetch('edit',['data'=>$data]);
    }

    // 处理更新招聘信息信息
    public function postupdate(){
        $request = request();
        $id = $request->param("id");
        $data = $request->only('wtitle,descr,worktime');
        // var_dump($data);die;
        if(Db::name("work")->where('id',$id)->update($data)){
            $this->success('更新成功',"/adminwork/index");
        }else{
            $this->error("更新失败");
        }

    }

}
