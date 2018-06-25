<?php

namespace App\Http\Controllers;

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

	}

	public function deleteProduct(Request $request){

	}
	public function variant($id){
		$product = Products::find($id);
		$skuList = Skus::where([['productID','=',$id],['active','=',1]])->get();
		$optionList = Options::where([['isActive','=',1]])->get();
		$valueList = Option_values::where([['isActive','=',1]])->get();

		return view('admin.manageProduct.variant', ['optionList'=>$optionList, 'valueList'=>$valueList,'product'=>$product, 'skuList'=>$skuList]);
	}

	public function addVariant(Request $request,$id){
		// $value = new Option_values;
		// $value->valueName=$request->new_valueName;
		// $value->optionID=$id;
		// $value->isActive="1";
		// if($value->save()){
		// 	return redirect('admin/setting/option/'.$id)->with('message','Add successful!');
		// }
	}

	public function editVariant(Request $request, $id){
		// $value = Option_values::find($request->edit_id);
		// $this->validate($request,
		// 	[
		// 		'edit_id'=>'required',
		// 		'edit_valueName' => 'unique:Option_values,valueName'
		// 	],
		// 	[
		// 		'edit_id.required' =>'error',
		// 		'edit_valueName.unique' => 'This value name has existed, please try another name!',
		// 	]);

		
		// $value->valueName=$request->edit_valueName;
		// if($value->save()){
		// 	return redirect('admin/setting/option/'.$id)->with('message','Edit successful!');
		// }
	}

	public function deleteVariant(Request $request, $id){
		// $value = Option_values::find($request->delete_id);
		// $value->isActive=0;
		// if($value->save()){
		// 	return redirect('admin/setting/option/'.$id)->with('message','Delete successful!');
		// }
	}
}
