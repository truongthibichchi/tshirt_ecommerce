<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Categories;
use App\Pricelist;
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
			// $url="/../storage/app/public/product";
			$name="product_".$count.".".$extension;
			// $file->move("/../storage/app/public/product",$name);
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
}
