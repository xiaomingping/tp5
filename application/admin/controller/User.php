<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
class User extends Allow
{
        // 用户管理列表
    public function getindex()
    {	
        // 创建请求对象
        $request = request();
        // 判断是否是有搜索
        $k = $request->param('search');
        $res = Db::name('user')->where('username','like',"%".$k."%")->field('id,username,email,addtime,status')->paginate(2);
       return $this->fetch("user/index",['res'=>$res,'request'=>$request->param(),'k'=>$k]);

    }



    // 添加用户
    public function getadd(){
    	return $this->fetch('user/add');
    }


    // 处理添加用户
    public function postinsert(){
        $request = request();
        // 验证数据
        $ress = $request->param();
        $resu = $this->validate($ress,'User.add');
            if(true !== $resu){
                // 数据错误
                $this->error($resu);
            }
        // 提取数据
        $res = $request->only(['username','password','email','status']);
        $res['addtime'] = time();
        $res['password'] = md5($res['password']);
        // 添加数据
            if(Db::name('user')->insert($res)){
                // 添加成功
                $this->success("注册成功",'/adminuser/index');
            }else{
                // 添加失败
                $this->error("注册失败");
            }
    }

    // 删除用户
    public function postdelete(){
        $request = request();
        // 提取数据
        $id = $request->param('id');
        if(empty($id)){
            $this->error("请选择用户");
        }
        if(Db::name('user')->where('id',"{$id}")->delete()){
            $this->success('删除成功');
        }else{
            $this->error("删除失败");

        }

    }

    // 更新用户信息
    public function getedit(){
        $request = request();
        // 提取数据
        $id = $request->param('id');
        $data = Db::name('user')->where('id',"{$id}")->find();
       return  $this->fetch('user/edit',['data'=>$data]);
    }

    // 处理更新用户信息
    public function postupdate(){
        $request = request();
        // 提取数据
        $password = $request->param('password');
        $yemail = $request->param('yemail');
        $email = $request->param('email');
        $data = array();
        if($yemail !== $email){
            $data['email'] = $email;
        }
        // 验证
        if(!empty($data)){
            $result = $this->validate($data,'User.update');
            if($result !== true){
                $this->error($result);
            }
        }
        if(!empty($password)){
            $data['password'] = md5($password);
        }
        $data['status'] = $request->param('status');
        $id = $request->param('id');
        if(DB::name('user')->where('id',"{$id}")->update($data)){
            $this->success('修改成功','/adminuser/index');
        }else{
            $this->error('修改失败');
        }


    }

    // 批量删除
    public function postallupdate(){
        $request = request();
        $del = $request->only('id');
        if(empty($del)){
            $this->error('请选择用户');
        }
       $res =  DB::name('user')->whereIn('id',$del['id'])->delete();
       if($res > 0){
        $this->success("批量删除成功");
       }else{
        $this->error("批量删除失败");
       }
    }

    // 用户分配角色
    public function geturadd(){
        $request = request();
        $id = $request->param('id');
        $data = DB::name('user')->where('id',"{$id}")->field('id,username')->find();
        $rn = Db::name('role_node')->alias('rn')->join('role r','rn.rid = r.id')->select();
        $ids = Db::name('user_role')->where('uid',"{$id}")->field('rid')->find();
        if(empty($ids)){
            $ids['rid'] = '';
        }
        return $this->fetch('uradd',['data'=>$data,'rn'=>$rn,'ids'=>$ids]);
    }
    // 处理分配角色
    public function posturinsert(){
        $request = request();
        $data['uid'] = $request->param('uid');
        $res = Db::name('user_role')->where('uid',$data['uid'])->find();
        $da = $request->only('rid');
        $data['rid'] = implode(',',$da['rid']);
        if(empty($res)){
            
            if(Db::name('user_role')->insert($data)){
                $this->success("分配成功",'/adminuser/index');
            }else{
                $this->error("分配失败");
            }
        }else{
            if(Db::name('user_role')->where('uid',$data['uid'])->update($data)){
                $this->success("更新成功",'/adminuser/index');
            }else{
                $this->error("更新失败");
            }
        }


    }
}
