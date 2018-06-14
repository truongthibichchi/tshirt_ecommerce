<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class manageProductCategoryController extends Controller
{
    public function index(){
    	return view('admin.manageProductCategory.index');
    }
}
