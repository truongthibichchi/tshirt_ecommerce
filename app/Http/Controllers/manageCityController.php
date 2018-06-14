<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class manageCityController extends Controller
{
    public function index(){
    	return view('admin.manageCity.index');
    }
}
