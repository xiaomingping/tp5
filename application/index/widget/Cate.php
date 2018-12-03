<?php
namespace app\index\widget;
//导入Controller
use think\Controller;
use think\Db;
use think\Config;
class Cate extends Controller{

	// 加载幻灯片
	public function slide(){
		$data = Db::name('slide')->where('status','1')->field('title,word,pic')->select();
		return $this->fetch("cate:slide",['data'=>$data]);
	}
	// 加载首页产品
	public function hgoods(){
		$data = Db::name('goods')->where('hshow','1')->paginate(4);
		return $this->fetch("cate:hgoods",['data'=>$data]);
	}
	// 加载首页案例
	public function hmycase(){
		$data = Db::name('mycase')->where('hshow','1')->paginate(4);
		return $this->fetch("cate:hmycase",['data'=>$data]);
	}

	//加载公共尾
	public function footer(){
		$data = Db::name('link')->where('status','0')->select();
		return $this->fetch("cate:footer",['data'=>$data]);
	}
} 
 ?>