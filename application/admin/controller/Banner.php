<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/2 0002
 * Time: 下午 3:40
 */

namespace app\admin\controller;
use think\connector;
use think\Db;
class Banner extends Allow
{
    /*
     * 幻灯片列表
     * */
    public function getindex()
    {
        $request = request();
        $k = $request->param('search');
        $data = Db::name('slide')->paginate(2);
        return $this->fetch('index',['data'=>$data,'request'=>$request->param(),'k'=>$k]);
    }
    /*
     * 幻灯片添加
     * */
    public function getadd()
    {
       return  $this->fetch('add');
    }
    /*
     * 处理添加
     * */
    public function postinsert()
    {
        $request = request();
        $data = $request->only('title,word,status');
        $res = $this->validate($data,'User.badd');
        if($res !== true){
            $this->error($res);
        }
        $file = $request->file('pic');

        $result=$this->validate(['file1'=>$file],['file1'=>"require|image"],['file1.require'=>'上传图片不能为空','file1.image'=>'上传文件必须是图像文件']);
        if(true !==$result){
            $this->error($result,"/adminbanner/add");
        }
        //  //移动到指定的目录下
        $info=$file->move(ROOT_PATH.'public'.DS.'banner');
        // //获取上传图片信息
        $savename=$info->getSaveName();
        $data['pic'] = '/banner/'.$savename;
        if(Db::name('slide')->insert($data)){
            $this->success("添加成功",'/adminbanner/index');
        }else{
            $this->error("添加失败");
        }
    }

    /*
     * 修改
     * */
    public function getedit()
    {
        $request = request();
        $id = $request->param('id');
        $data = Db::name('slide')->where('id',$id)->find();
       return  $this->fetch('edit',['data'=>$data]);
    }

    /*
     * 处理修改
     * */
    public function postupdate()
    {
        $request = request();
        $id = $request->param('id');
        $data = $request->only('title,word');
        if(empty($id)){
            $this->error('非法操作');
        }
             $res = $this->validate($data,'User.badd');
        if($res !== true){
            $this->error($res);
        }
        /*图片处理*/
        $file=$request->file("pic");
        if(empty($file)){
                if(Db::name('slide')->where('id',$id)->update($data)){
                    $this->success("修改成功",'/adminbanner/index');
                }else{
                    $this->error("修改失败");
                }
        }else{
            $result=$this->validate(['file1'=>$file],['file1'=>"require|image"],['file1.require'=>'上传图片不能为空','file1.image'=>'上传文件必须是图像文件']);
            if(true !==$result){
                $this->error($result,"/adminbanner/add");
            }
             //移动到指定的目录下
            $info=$file->move(ROOT_PATH.'public'.DS.'banner');
            $ypic = $request->param('ypic');
            unlink('.'.$ypic);
            // //获取上传图片信息
            $savename=$info->getSaveName();
            //拼接图片信息
            $data['pic'] = '/banner/'.$savename;
            if(Db::name('slide')->where('id',$id)->update($data)){
                $this->success("修改成功",'/adminbanner/index');
            }else{
                $this->error("修改失败");
            }
        }
    }

    /*
     * 处理删除
     * */
    public function postdelete()
    {
        $request = request();
        $id = $request->param('id');
        if(empty($id)){
            $this->error('非法操作');
        }
        $data = Db::name('slide')->where('id',$id)->find();
        if(!empty($data['pic'])){
            $pic = '.'.$data['pic'];
            unlink($pic);
        }
        if(Db::name('slide')->where('id',$id)->delete()){
            $this->success("删除成功",'/adminbanner/index');
        }else{
            $this->error("删除失败");
        }
    }
}