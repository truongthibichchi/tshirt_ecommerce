<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class manageProductController extends Controller
{
    public function index(){
    	return view('admin.manageProduct.index');
    }
}
