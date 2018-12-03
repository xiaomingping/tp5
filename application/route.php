<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// return [
//     '__pattern__' => [
//         'name' => '\w+',
//     ],
//     '[hello]'     => [
//         ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//         ':name' => ['index/hello', ['method' => 'post']],
//     ],

// ];

// 导入路由类	use导入
use think\Route;
/**
------------------------------------------------------------------------------------
**/
// 后台路由
// 首页
Route::controller('/admin','admin/Index');
// 用户管理
Route::controller('/adminuser','admin/User');
// 角色管理
Route::controller('/adminrbac','admin/Roles');
// 权限管理
Route::controller('/adminrbacn','admin/Rbac');
// 登录管理
Route::controller('/adminlogin','admin/Login');
// 商品管理
Route::controller('/admingoods','admin/Goods');
// 文章管理
Route::controller('/adminarticle','admin/Article');
// 案例管理
Route::controller('/admincase','admin/MyCase');
// 栏目管理
Route::controller('/admincolumn','admin/Column');
// 日志管理
Route::controller('/adminsystem','admin/SystemLog');
// 备份管理
Route::controller('/adminbackup','admin/Backups');
// 招聘管理
Route::controller('/adminwork','admin/Work');
// 友情链接管理
Route::controller('/adminlink','admin/Link');
// 单页管理
Route::controller('/adminsingle','admin/SinglePage');
//幻灯片管理
Route::controller('/adminbanner','admin/Banner');
/*

-----------------------------------------------------------------------------------------

*/
// 前台路由
// 首页
Route::controller('index','index/Index');
// 产品
Route::controller('goods','index/Goods');
// 新闻
Route::controller('Article','index/Article');
// 案例
Route::controller('mycase','index/MyCase');
// 关于
Route::controller('about','index/About');








