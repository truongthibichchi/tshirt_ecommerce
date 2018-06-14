<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class manageHomeController extends Controller
{
    public function Index(){
    	return view('admin.login');
    }
}
