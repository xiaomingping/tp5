<?php 
namespace app\admin\controller;
use think\Controller;
use think\Db;
//导入Session
use think\Session;
class Login extends Controller
{
	// 登录
	public function getlogin()
	{

		return $this->fetch('login');
	}
	// 处理登录
	public function postdoLogin()
	{
		$request = request();
		$data = $request->only('username');
		$pwd = $request->param('password');
		$res = Db::name('user')->where('username',$data['username'])->find();
		if(empty($res)){
			$this->error('账号不存在');die;
		}
		$data['password'] = md5($pwd);
		if($res['password'] !== $data['password']){
			$this->error('密码错误');die;
		}
		//把用户登录信息存储在session
		Session::set('islogin',1);
		Session::set('adminuserid',$res['id']);
		Session::set('adminuser',$res['username']);//登录的用户名
		Session::set('adminemail',$res['email']);//登录的用户名邮箱
		// 获取当前登录用户所具有的权限信息
		$ur = Db::name('user_role')->where('uid',$res['id'])->find();
		$rn = Db::name('role_node')->whereIn('rid',$ur['rid'])->field('nid')->select();
		$nid = array();
		foreach ($rn as $v) {
			$nid = array_merge($nid, explode(',', $v['nid']));
		}
		$nid = implode(',',$nid);
		// 得到权限信息
		$node = Db::name('node')->whereIn('id',$nid)->field('mname,aname')->select();
		$nodelist['Index'][] = 'getindex';
		// 遍历权限
		foreach ($node as $k => $v) {
			$nodelist[$v['mname']][] = $v['aname'];
			// 如果具有添加权限，就追加处理添加权限
			if($v['aname'] == "getadd"){
				$nodelist[$v['mname']][] = 'postinsert';
			}

			if($v['aname'] == 'getedit'){
				$nodelist[$v['mname']][] = 'postupdate';
			}
		}
		$datas['login_node'] = '登录成功';
		$datas['login_uid'] = $res['id'];
		$datas['login_ip'] = $request->ip();
		$datas['login_time'] = time();
		Db::name('login_log')->insert($datas);
		 //3.把当前登录用户所具有的权限信息 存储在session里
         Session::set('nodelist',$nodelist);
		$this->success("登录成功","/admin/index");
	}

	  //执行退出
    public function postlogout(){
    	$request = request();
    	$datas['login_node'] = '退出成功';
		$datas['login_uid'] = Session::get('adminuserid');
		$datas['login_ip'] = $request->ip();
		$datas['login_time'] = time();
		Db::name('login_log')->insert($datas);
    	Session::delete('islogin');
    	Session::delete('adminuserid');
    	Session::delete('adminuser');
    	Session::delete('nodelist');
    	$this->success("用户退出成功","/adminlogin/login");
    }
}

 ?>