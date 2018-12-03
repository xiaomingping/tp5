<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
class SinglePage extends Allow
{
        // 文章列表
    public function getindex()
    {	
        $data = Db::name('single')->field("id,title")->select();
       return $this->fetch("index",['data'=>$data]);
    }
    // 更新文章信息
    public function getedit(){
        $request = request();
        // 提取数据
        $id = $request->param('id');
        $data = Db::name('single')->where('id',"{$id}")->find();
       return  $this->fetch('edit',['data'=>$data]);
    }

    // 处理更新文章信息
    public function postupdate(){
        $request = request();
        //上传验证规则添加
        $id = $request->param('id');
        if(empty($id)){
            $this->error("非法操作");
        }
        $data=$request->only(['descr']);
        if(Db::name('single')->where('id',$id)->update($data)){
            $this->success("修改成功");
        }else{
            $this->error("修改失败");
        }
    }

}
