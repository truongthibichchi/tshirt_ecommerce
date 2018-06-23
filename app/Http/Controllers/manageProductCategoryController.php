<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
 
class manageProductCategoryController extends Controller
{
    public function index(){
         
    	$categoryList = Categories::where([['isActive','=',1]])->get();  
    	return view('admin.manageProductCategory.index', ['categoryList'=>$categoryList]);
    }

    public function addCategory(Request $request){
    	$category = new Categories;
        $category->categoryName=$request->new_categoryName;
        $category->isActive="1";
       if($category->save()){
        return redirect('admin/setting/productCategory')->with('message','Add successful!');
        }
    }

    public function editCategory(Request $request){
        $category = Categories::find($request->edit_id);
          $this->validate($request,
            [
                'edit_id'=>'required',
                'edit_categoryName' => 'unique:Categories,categoryName'
            ],
            [
                'edit_id.required' =>'error',
                'edit_categoryName.unique' => 'This category has existed, please try another name!',
            ]);

             
             $category->categoryName=$request->edit_categoryName;
             $category->save();
            return redirect('admin/setting/productCategory')->with('message','Edit successful!');  
   }

    public function deleteCategory(Request $request){
    	  $category = Categories::find($request->delete_id);
           $category->isActive=0;
           $category->save();
        return redirect('admin/setting/productCategory')->with('message','Delete successful!');
    }
}
