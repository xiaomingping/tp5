<?php 
namespace app\admin\controller;
// 导入Controller
use think\Controller;
// 导入session
use think\Session;
use think\Db;
class Allow extends Controller
{
	// Controller 类初始化方法
	public function _initialize(){
		// 检测用户session信息
		if(!Session::get('islogin')){
			// 跳转到后台登录界面
			$this->error("请先登录后台","/adminlogin/login");
		}

		$request = request();
		// 获取当前访问模块的控制器和方法
		$controller = ucfirst($request->controller());
		$action = $request->action();
		// echo '<pre>';
		// var_dump($controller);
		// var_dump($action);

		// 获取当前登录的用户权限信息
		$nodelist = Session::get('nodelist');
		// var_dump($nodelist);
		// 检测访问模块是否在权限列表里
		// if(empty($nodelist[$controller]) || !in_array($action,$nodelist[$controller])){
		// 	$this->error("抱歉，你无权访问该模块，请联系超级管理员");
		// }
		// $data = '';
		// if($action == 'postinsert'){
		// 	$data['mname'] = $request->controller();
		// 	$data['aname'] = 'getadd';
		// }else if($action == 'postupdate'){
		// 	$data['mname'] = $request->controller();
		// 	$data['aname'] = 'getedit';
		// }else if($action == 'postrbacinsert'){
		// 	$data['mname'] = $request->controller();
		// 	$data['aname'] = 'getrbacadd';
		// }else if($action == 'postrbacinsert'){
		// 	$data['mname'] = $request->controller();
		// 	$data['aname'] = 'geturadd';
		// }

		// if(!empty($data)){
		// 	$res = Db::name('node')->where($data)->find();
		// 	$datas['operation_node'] = $res['name'];
		// 	$datas['operation_uid'] = Session::get('adminuserid');
		// 	$datas['operation_ip'] = $request->ip();
		// 	$datas['operation_time'] = time();
		// 	Db::name('operation_log')->insert($datas);
		// }
	}
}
 ?>
