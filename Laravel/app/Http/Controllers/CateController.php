<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CateRequest;//nhớ gọi requet đã tạo
use App\Cate;//truyền model Cate

class CateController extends Controller
{
	//Điều hướng trang web
	public function getList(){//show nội dung ra
		$data = Cate::select('id','name','parent_id')->orderBy('id','DESC')->get()->toArray();
    	return view('admin.cate.list',compact('data'));//truyền từ view kèm dữ liệu
    }
    //SAVE giá trị
    public function getAdd(){//show nội dung ra
    	$parent = Cate::select('id','name','parent_id')->get()->toArray();//truy xuất SQL từ model theo kiểu array(toArray)
    	return view('admin.cate.add',compact('parent'));//truyền dữ liệu ra view tên biền truyền trùng tên với biền mún truyền
    }
    public function postAdd(CateRequest $request){// lấy giá trị về
    	$cate = new Cate();//khởi tạo class
    	$cate->name = $request->txtCateName;//gán giá trị từng cột tương ứng input
    	$cate->alias =  $request->txtCateName;
    	$cate->order =  $request->txtOrder;
    	$cate->parent_id =  $request->slt_parent;
    	$cate->keywords =  changeTitle($request->txtKeywords);//'changeTitle' : function mà mình đã stepup ở composer.phar
    	$cate->description =  $request->txtDescription;
    	$cate->save();//tiến hành save
    	return redirect()->route('admin.cate.getList')->with(['flash_level'=>'success' ,'flash_message'=>'Success !! Complete Add']);
    	//điêu hướng trang sau khi save thành công
    	//truyền biến thông báo kiểu session đến view với 'flash_level' là tên biến và 'success' là nội dung tương tự như 'flash_message'

    }
    //VD về xóa dữ liệu
    public function getDelete($id){
    	$parent = Cate::where('parent_id',$id)->count();//truy xuất và xuất ra kiểu count
    	if($parent == 0){
	    	$cate = Cate::find($id);
	        $cate->delete($id);//truyền biến
	        return redirect()->route('admin.cate.getList')->with(['flash_level'=>'success' ,'flash_message'=>'Success !! Complete Delete']);
	    }else{
	    	echo "<script>
			    	alert('Không xóa được !!!');
			    	window.location = '".route('admin.cate.getList')."';
			    	</script>";
	    }
    }
    public function getEdit($id){
    	$data = Cate::findOrFail($id)->toArray();//truye xuất dữ liệu nếu ko có nó sẽ báo lỗi;
    	$parent = Cate::select('id','name','parent_id')->get()->toArray();//truy xuất SQL từ model theo kiểu array(toArray)
    	return view('admin.cate.edit',compact('parent','data','id'));//truyền dữ liệu ra view tên biền truyền trùng tên với biền mún truyền
    }
    public function postEdit(Request $request,$id){
		$this->validate($request, //truyền ràng buộc nếu như chưa nhập dữ liệu như CateRequest
			['txtCateName'=>'required'],
			['txtCateName.required'=>'Please Enter Name Category !']
		);
		$cate = Cate::find($id);//tìm giá dữ liệu để tiến hành update
		$cate->name = $request->txtCateName;//gán giá trị từng cột tương ứng input
    	$cate->alias =  $request->txtCateName;
    	$cate->order =  $request->txtOrder;
    	$cate->parent_id =  $request->slt_parent;
    	$cate->keywords =  changeTitle($request->txtKeywords);//'changeTitle' : function mà mình đã stepup ở composer.phar
    	$cate->description =  $request->txtDescription;
    	$cate->save();
    	return redirect()->route('admin.cate.getList')->with(['flash_level'=>'success' ,'flash_message'=>'Success !! Complete Edit']);
    }
}
