<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
class MyCase extends Allow
{
        // 案例列表
    public function getindex()
    {	
         // 创建请求对象
        $request = request();
        // 判断是否是有搜索
        $k = $request->param('search');
        $res = Db::name('mycase')->where('title','like',"%".$k."%")->field('id,title,descr,pic,addtime')->paginate(2);
       return $this->fetch("index",['data'=>$res,'request'=>$request->param(),'k'=>$k]);
    }
    // 添加案例
    public function getadd(){
    	return $this->fetch('add');
    }

    // 处理添加案例
    public function postinsert(){
        $request = request();
       //获取上传图片资源
        $file=$request->file("pic");
        //上传验证规则添加
        $result=$this->validate(['file1'=>$file],['file1'=>"require|image"],['file1.require'=>'上传图片不能为空','file1.image'=>'上传文件必须是图像文件']);
        if(true !==$result){
            $this->error($result,"/admincase/add");
        }
        //  //移动到指定的目录下
        $info=$file->move(ROOT_PATH.'public'.DS.'uploads');
        // echo $info->getSaveName().":".$info->getExtension();
        // //获取上传图片信息
        $savename=$info->getSaveName();
        // //图像处理
        // //打开需要处理的图像
        $img=\think\Image::open("./uploads/".$savename);
        // //随机图片名字
        $name=time()+rand(1,10000);
        // //文件后缀
        $ext=$info->getExtension();
        // //缩放
        $img->thumb(500,320)->save("./uploads/publicimg/".$name.".".$ext);
        // //封装需要添加数据
        $data=$request->only(['title','descr','hshow']);
        $data['pic']="/uploads/publicimg/".$name.".".$ext;
        // //原图路径
        $data['opic']="./uploads/".$savename;
        $data['addtime'] = time();
        //执行添加
        if(Db::name("mycase")->insert($data)){
            $this->success("添加成功","/admincase/index");
        }else{
            $this->error("添加失败");
        }
    }

    // 删除案例
    public function postdelete(){
        $request=request();
        //获取需要删除的数据id
        $id=$request->param('id');
        if(empty($id)){
            $this->error("请选择产品");
        }
        //获取需要删除数据
        $info=Db::name("mycase")->where("id","{$id}")->find();
        //获取pic
        $pic=".".$info['pic'];
        //获取opic
        $opic=$info['opic'];
        //获取descr
        $descr=$info['descr'];
        // echo $descr;
        preg_match_all('/<img.*?src="(.*?)".*?>/is',$descr,$array);
        if(Db::name("mycase")->where("id","{$id}")->delete()){
            //判断
            if(isset($array[1])){
                
                //遍历
                foreach($array[1] as $k=>$v){
                    //直接删除百度编辑器上传图片
                    unlink('.'.$v);
                }
            }
            //删除缩放图
            unlink($pic);
            //删除原图
            unlink($opic);
            //删除百度编辑器上传的图片
            $this->success("删除成功","/admincase/index");
        }else{
            $this->error("删除失败");
        }

    }

    // 更新案例信息
    public function getedit(){
        $request = request();
        // 提取数据
        $id = $request->param('id');
        $data = Db::name('mycase')->where('id',"{$id}")->find();
       return  $this->fetch('edit',['data'=>$data]);
    }

    // 处理更新案例信息
    public function postupdate(){
        $request = request();
       //获取上传图片资源
        $file=$request->file("pic");
        //上传验证规则添加
        $id = $request->param('id');
        $data=$request->only(['title','descr','hshow']);
        // 判断是否删除缩率图
        if(empty($file)){
            if(DB::name('mycase')->where('id',"{$id}")->update($data)){
                $this->success('修改成功','/admincase/index');
            }else{
                $this->error('修改失败');
            }
        }else{
            $result=$this->validate(['file1'=>$file],['file1'=>"require|image"],['file1.require'=>'上传图片不能为空','file1.image'=>'上传文件必须是图像文件']);
            if(true !==$result){
                $this->error($result,"/admincase/add");
            }
                //获取需要删除数据
                $info=Db::name("mycase")->where("id","{$id}")->find();
                //获取pic
                $pic=".".$info['pic'];
                //获取opic
                $opic=$info['opic'];
                //删除缩放图
                unlink($pic);
                //删除原图
                unlink($opic);
        // ---------------------------------------------------------
             //  //移动到指定的目录下
            $info=$file->move(ROOT_PATH.'public'.DS.'uploads');
            // echo $info->getSaveName().":".$info->getExtension();
            // //获取上传图片信息
            $savename=$info->getSaveName();
            // //图像处理
            // //打开需要处理的图像
            $img=\think\Image::open("./uploads/".$savename);
            // //随机图片名字
            $name=time()+rand(1,10000);
            // //文件后缀
            $ext=$info->getExtension();
            // //缩放
            $img->thumb(500,320)->save("./uploads/publicimg/".$name.".".$ext);
            // //封装需要添加数据
            $data=$request->only(['title','descr','hshow']);
            $data['pic']="/uploads/publicimg/".$name.".".$ext;
            // //原图路径
            $opic="./uploads/".$savename;
            // echo "<pre>";
            // var_dump($data);
            //执行修改
            if(DB::name('mycase')->where('id',"{$id}")->update($data)){
                $this->success("修改成功","/admincase/index");die;
            }else{
                $this->error("修改失败");die;
            }
        }
       


    }

}
