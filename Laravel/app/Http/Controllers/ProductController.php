<?php

namespace App\Http\Controllers;
						
use Illuminate\Http\Request;
use App\Cate;//truyền model Cate
use App\Product;//truyền model Product
use App\ProductImage;//truyền model ProductImage
use App\Http\Requests\ProductRequest;//nhớ gọi requet đã tạo
use Illuminate\Support\Facades\Input;//thêm vào để sử dụng input KT image
class ProductController extends Controller
{
    public function getAdd(){
    	$cate = Cate::select('id','name','parent_id')->get()->toArray();
		return view('admin.product.add',compact('cate'));
    }
    public function postAdd(Request $request){
        //cẩn thận khi thêm ProductRequest sẽ lỗi

    	$file_name = $request->file('fImages')->getClientOriginalName();//lấy tên hình
		$product = new Product();
		$product->name = $request->txtName;
        $product->alias = changeTitle($request->txtName);
        $product->price = $request->txtPrice;
        $product->intro = $request->txtIntro;
        $product->content = $request->txtContent;
        $product->image = $file_name;
        $product->keywords = $request->txtKeywords;
        $product->description = $request->txtDescription;
        $product->user_id = 1;
        $product->cate_id = $request->slt_parent;
        $request->file('fImages')->move('resources/upload/',$file_name);//tải hình lên thư mục
        $product->save();//tiến hành save
        $product_id1 = $product->id;//bắt lấy id sau khi save 
        
        if(Input::hasFile('fProductDetail')){//KT tra xem có input file hay ko
            foreach (Input::file('fProductDetail') as $file){//truy xuất file
             	
             	if(isset($file)){
             		$product_img = new ProductImage(); 
					$product_img->image = $file->getClientOriginalName();
					$product_img->product_id = $product_id1;
					$file->move('resources/upload/detail/',$file->getClientOriginalName());//tải hình lên thư mục
             	    $product_img->save();//tiến hành save
             	}
            }
        }
        return redirect()->route('admin.product.getList')->with(['flash_level'=>'success' ,'flash_message'=>'Success !! Complete Delete']);

    }
    public function getList(){
    	$product = Product::select('id','name','price','cate_id')->orderBy('id','DESC')->get()->toArray();
		return view('admin.product.list',compact('product'));
    }
}
