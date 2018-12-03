<?php 
namespace app\admin\validate;
use think\Validate;
class User extends Validate{
	// 设置规则
	 protected $rule = [
	 	// 用户名不能为空规则 user操作的数据表
	 					'username'  =>  'require|regex:\w{4,16}|unique:user',
	 					'email' =>  'require|email|unique:user',
	 					'password'=>'require|regex:\w{6,32}',
	 					'repassword'=>'require|confirm:password',
	 					'rname'=>'require|unique:role',
	 					'remark'=>'require',
	 					'name'=>'require|unique:node',
	 					'mname'=>'require|regex:\w{2,50}',
	 					'aname'=>'require|regex:\w{2,50}',
	 					'wtitle'=>'require',
	 					'descr'=>'require',
	 					'webname'=>'require',
	 					'url'=>'require',
	 					'phone'=> 'require|length:11|number',
		 				'title'=>'require',
		 				'word'=>'require',
	 					];
	 protected $message = [
	 					'username.require'=>'用户名不能为空',
	 					'username.regex'=>'用户名必须为4-18位任意数字字母下划线',
	 					'username.unique'=>'用户名已存在',
	 					'password.require'=>'密码不能为空',
	 					'password.regex'=>'密码必须为6-32位的任意数字字母下划线',
	 					'repassword.require'=>'确认密码不能为空',
	 					'repassword.confirm'=>'两次密码不一致',
	 					'email.require'=>'邮箱不能为空',
	 					'email.email'=>'邮箱不符合格式',
	 					'email.unique'=>'邮箱已存在',
	 					'rname.require'=>'角色名不能为空',
	 					'rname.unique'=>'角色名重复',
	 					'remark.require'=>'角色描述不能为空',
	 					'name.require'=>'权限名不能为空',
	 					'name.unique'=>'权限名已存在',
	 					'mname.require'=>'控制器权限不能为空',
	 					'mname.regex'=>'控制器权限不符合规范',
	 					'aname.require'=>'方法权限不能为空',
	 					'aname.regex'=>'方法权限不符合规范',
	 					'wtitle.require'=>'标题不能为空',
	 					'descr.require'=>'内容不能为空',
	 					'phone.number'   => '手机必须是数字',
        				'phone.length'   => '请输入11位手机号',
        				'phone.require'=>'手机号不能为空',
        				'webname.require'=>'网站名称不能为空',
        				'url.require'=>'网站地址不能为空',
		 				'title.require'=>'标题不能为空',
		 				'word.require'=>'描述不能为空',
	 					];
	 protected $scene = [
	 				'add' =>['username','email','password','repassword'],
	 				'update'=>['email'],
	 				'roleadd'=>['rname','remark'],
	 				'rupdate'=>['rname'],
	 				'rbacadd'=>['name','mname','aname'],
	 				'rbacupdate'=>['name'],
	 				'login'=>['username'],
	 				'work'=>['wtitle','descr'],
	 				'link'=>['webname','phone','url'],
		 			'badd'=>['title','word'],
	 					];
}

 ?>



 