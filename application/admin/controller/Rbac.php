<?php 
namespace app\admin\controller;
use think\Controller;
use think\Db;
class Rbac extends Allow
{
	// 权限查看
	public function getindex(){
		 // 创建请求对象
        $request = request();
        // 判断是否是有搜索
        $k = $request->param('search');
        $data = Db::name('node')->where('name','like',"%".$k."%")->field('id,name,mname,aname,status')->paginate(8);
		return $this->fetch('index',['data'=>$data,'request'=>$request->param(),'k'=>$k]);
	}
	// 权限添加
	public function getadd(){
		return $this->fetch('add');
	}
	// 处理权限添加
	public function postinsert(){
		$request = request();
		$data = $request->only(['name','mname','aname','status']);
		$res = $this->validate($data,'User.rbacadd');
		// 检测数据
		if($res !== true){
			$this->error($res);
		}
		// 执行添加
		if(Db::name('node')->insert($data)){
			$this->success("添加成功",'/adminrbacn/index');
		}else{
			$this->error("添加失败");
		}

	}
	// 权限修改
	public function getedit(){
		$request = request();
		$id = $request->param('id');
		$data = Db::name('node')->where('id',"{$id}")->field('id,name,mname,aname,status')->find();
		return $this->fetch('edit',['data'=>$data]);
	}
	// 处理权限修改
	public function postupdate(){
		$request = request();
		$id = $request->param('id');
		$res = $request->only(['yname','name']);
		if($res['yname'] !== $res['name']){
			$data = $request->only(['name']);
			// 验证数据
			$res = $this->validate($data,'User.rbacupdate');
			if($res !== true){
				$this->error($res);
			}
		}else{
			$data['name'] = $res['yname'];
		}
		// 整理数据
		$data['mname'] = $request->param('mname');
		$data['aname'] = $request->param('aname');
		$data['status'] = $request->param('status');
		if(Db::name('node')->where('id',"{$id}")->update($data)){
			$this->success("修改成功",'/adminrbacn/index');
		}else{
			$this->error("修改失败");
		}
	}
	// 权限删除
	public function postdelete(){
		$request = request();
			// 获取id
		$id = $request->param('id');
		if(empty($id)){
			$this->error("请选择权限");
		}
		// 执行删除
		if(Db::name('node')->where('id',"{$id}")->delete()){
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}

	}

	// 角色权限分配
	public function getrbacadd()
	{	
		$request = request();
		$id = $request->param('id');
		$data = Db::name('role')->where('id',"{$id}")->field('id,rname')->find();
		$res = Db::name('node')->where('status','0')->field('id,name,mname,aname')->select();
		$ids = Db::name('role_node')->where('rid',"{$id}")->field('nid')->find();
		return $this->fetch('rbacadd',['data'=>$data,'res'=>$res,'ids'=>$ids]);
	}

	// 角色权限分配处理
	public function postrbacinsert(){
		$request = request();
		$data['rid'] = $request->param('rid');
		$nid = $request->only(['nid']);
		Db::name('role_node')->where('rid',"{$data['rid']}")->delete();
		$data['nid'] = implode(',',$nid['nid']);
		if(Db::name('role_node')->insert($data)){
			$this->success("分配成功",'/adminrbac/index');
		}else{
			$this->error("分配失败");
		}

	}

}
 ?>
