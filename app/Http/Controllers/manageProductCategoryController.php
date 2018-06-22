<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
 
class manageProductCategoryController extends Controller
{
    public function index(){
    	$categoryList = Categories::all();
    	return view('admin.manageProductCategory.index', ['categoryList'=>$categoryList]);
    }

    public function addCategory(Request $request){
    	echo $request->categoryName;
    }

    public function delete(Request $request){
    	
    }
}
