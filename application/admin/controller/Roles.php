<?php 
namespace app\admin\controller;
use think\Controller;
use think\Db;
class Roles extends Allow
{
	// 角色管理
	public function getindex(){
		// 创建请求对象
        $request = request();
        // 判断是否是有搜索
        $k = $request->param('search');
        $data = Db::name('role')->where('rname','like',"%".$k."%")->field('id,rname,remark,status')->paginate(2);
		return $this->fetch('index',['data'=>$data,'request'=>$request->param(),'k'=>$k]);

	}
	// 角色添加
	public function getadd(){
		return $this->fetch('add');
	}
	// 处理角色添加
	public function postinsert(){
		$request = request();
		$data = $request->only(['rname','remark','status']);
		$resu = $this->validate($data,'User.roleadd');
            if(true !== $resu){
                // 数据错误
                $this->error($resu);
            }
		if(Db::name('role')->insert($data)){
			$this->success("添加成功",'/adminrbac/index');
		}else{
			$this->error("添加失败");
		}
	}
	// 角色修改
	public function getedit(){
		$request = request();
		$res = $request->param('id');
		$data = Db::name('role')->where('id',"{$res}")->find();
		return $this->fetch('edit',['data'=>$data]);
	}
	// 处理角色修改
	public function postupdate(){
		$request = request();
		$id = $request->param('id');
		$res = $request->only(['yrname','rname']);
		if($res['yrname'] !== $res['rname']){
			$data = $request->only(['rname']);
			// 验证数据
			$res = $this->validate($data,'User.rupdate');
			if($res !== true){
				$this->error($res);
			}
		}else{
			$data['rname'] = $res['yrname'];
		}
		// 整理数据
		$data['remark'] = $request->param('remark');
		$data['status'] = $request->param('status');
		if(Db::name('role')->where('id',"{$id}")->update($data)){
			$this->success("修改成功",'/adminrbac/index');
		}else{
			$this->error("修改失败");
		}
	}
	// 角色删除
	public function postdelete(){
		$request = request();
		$id = $request->param('id');
		if(empty($id)){
			$this->error("请选择角色");
		}

		if(Db::name('role')->where('id',"{$id}")->delete()){
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}
	}
}
 ?>
