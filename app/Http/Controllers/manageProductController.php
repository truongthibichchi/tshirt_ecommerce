<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Products;
use App\Categories;
use App\Pricelist;
use App\Variants;
use App\Skus;
use App\Options;
use App\Option_values;
use App\Images;
class manageProductController extends Controller
{
	public function index(){
		$categoryList = Categories::where([['isActive','=',1]])->get();  
		$productList = Products::where([['active','=',1]])->get();  
		return view('admin.manageProduct.index',['categoryList'=>$categoryList, 'productList'=>$productList]);
	}

	public function addProduct(Request $request){
		$productList = Products::all();
		$count = count($productList)+1;
		$product = new Products;
		$product->productName=$request->new_productName;
		$product->productDescript=$request->new_description;
		$product->categoryID=$request->new_category;
		$product->price = $request->new_price;
		$product->active="1";
		if($request ->hasFile('new_defaultImage')){
			$file = $request->file('new_defaultImage');
			$extension = $file ->getClientOriginalExtension();
			if($extension !='jpg' && $extension !='jpeg' && $extension !='png'){
				return redirect('admin/product')->with('message','please choose file jpg,jpeg,png!');
			}
			$name="product_".$count.".".$extension;
			$file->storeAs('public/product', $name);
			$product ->defaultImage=$name;
		}
		else{
			$product->defaultImage="";
		}
		if($product->save()){
			return redirect('admin/product')->with('message','Add successful!');
		}	
	}

	public function editProduct(Request $request){
		$product = Products::find($request->edit_id);
		$product->productName=$request->edit_productName;
		$product->productDescript=$request->edit_description;
		$product->categoryID=$request->edit_category;
		$product->price = $request->edit_price;
		$product->active="1";
		if($request ->hasFile('new_defaultImage')){
			$file = $request->file('new_defaultImage');
			$extension = $file ->getClientOriginalExtension();
			if($extension !='jpg' && $extension !='jpeg' && $extension !='png'){
				return redirect('admin/product')->with('message','please choose file jpg,jpeg,png!');
			}
			$name="product_".$product->id.".".$extension;
			$file->storeAs('public/product', $name);
			$product ->defaultImage=$name;
		}
		if($product->save()){
			return redirect('admin/product')->with('message','Edit successful!');
		}
	}

	public function deleteProduct(Request $request){
		$product = Products::find($request->delete_id);
		$product->active=0;
		$product->save();
		return redirect('admin/product')->with('message','Delete successful!');
	}
	public function variant($id){
		$product = Products::find($id);
		$skuList = Skus::where([['productID','=',$id],['active','=',1]])->get();
		$variantList= Variants::all();
		$optionList = Options::where([['isActive','=',1]])->get();
		$valueList = Option_values::where([['isActive','=',1]])->get();
		$imageList = Images::all();

		return view('admin.manageProduct.variant', ['optionList'=>$optionList, 'valueList'=>$valueList,'product'=>$product, 'skuList'=>$skuList, 'variantList'=>$variantList, 'imageList'=>$imageList]);
	}



	public function editVariant(Request $request, $id){
		$skuCode = $request->input('edit_skuCode');
		$inStock = $request->input('edit_inStock');
            //$sku = DB::table('skus')->where('skus.skuCode',$sku_id)->get();
		DB::table('skus')
		->where('skus.skuCode',$skuCode)
		->update(['inStock'=>$inStock]);
		if($request ->hasFile('edit_imageSku')){
			$file = $request->file('edit_imageSku');
			$extension = $file ->getClientOriginalExtension();
			if($extension !='jpg' && $extension !='jpeg' && $extension !='png'){
				return redirect('admin/product')->with('message','please choose file jpg,jpeg,png!');
			}
			$imageList=Images::where([['skuCode','=',$skuCode]])->get();
			$count=count($imageList)+1;
			$name=$skuCode."_".$count.".".$extension; //pd1_sku1_2.jpg
			$file->storeAs('public/product', $name);
			
			$newImage = new Images;
			$newImage->url=$name;
			$newImage->skuCode=$skuCode;

			if($newImage->save()){
				return redirect('admin/product/'.$id)->with('message','Edit image and inStock successful!');
			}
		}
	

		return redirect('admin/product/'.$id)->with('message','Edit successful!');
	}


	public function deleteVariant(Request $request, $id){


		$sku_id = $request->input('delete_id');
            //$sku = DB::table('skus')->where('skus.skuCode',$sku_id)->get();
		DB::table('skus')
		->where('skus.skuCode',$sku_id)
		->update(['active'=>0]);  
		return redirect('admin/product/'.$id)->with('message','Delete successful!');
	}

	public function addVariant(Request $request,$id){
		$skuList = Skus::where([['productID','=',$id]])->get();
		$count = count($skuList)+1; //đếm product có mấy sku rồi cộng 1
		$skus= new Skus;
		$skus->productID=$id;
		$skuCode= "pd".$id."_sku".$count; //pd1_sku1
		$skus->skuCode = $skuCode;
		$skus->inStock=$request->new_inStock;
		if($skus->save()){
			$optionList = Options::where([['isActive','=',1]])->get();
			$valueList = Option_values::where([['isActive','=',1]])->get();
			foreach($optionList as $ol){
				$nameRequest=$ol->id; //name của thẻ select được đặt tên theo optionID ->duyệt xem thử user chọn option nào
				foreach($valueList as $vl){
					if($request->$nameRequest==$vl->id){ //tìm selection (giao diện) đã chọn trùng với valueID
						$variant= new Variants;
						$variant->skuCode=$skuCode;
						$variant->optionID=$ol->id;
						$variant->valueID=$vl->id;
						$variant->save();
					}
				}
				//hạn chế: có thể 2 biến thể cùng size, color bị trùng lặp ->Giải quyết: người dùng tự xóa :v -> làm cái này đau não rồi nha, làm tương đối thôi nha :D
			}

			if($request ->hasFile('new_imageSku')){
				$file = $request->file('new_imageSku');
				$extension = $file ->getClientOriginalExtension();
				if($extension !='jpg' && $extension !='jpeg' && $extension !='png'){
					return redirect('admin/product')->with('message','please choose file jpg,jpeg,png!');
				}
				$name=$skuCode."_1.".$extension;
				//ảnh sku đầu tiên: 	pd1_sku1_1.jpg
				$file->storeAs('public/product', $name);

				$idImage = DB::table('Images')->insertGetId(['url' => $name, 'skuCode' => $skuCode]	);
            	if($idImage!=null)
            	{
               		return redirect('admin/product/'.$id)->with('message','Add variant successful!'); 
            	}
			}
			
		}
	}

}
