<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class manageOrderController extends Controller
{
    public function index(){
    	return view('admin.manageOrder.index');
    }
}
