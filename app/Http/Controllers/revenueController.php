<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class revenueController extends Controller
{
      public function index(){
    	return view('admin.revenue.index');
    }
}
