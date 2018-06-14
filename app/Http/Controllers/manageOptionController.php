<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class manageOptionController extends Controller
{
    public function index(){
    	return view('admin.manageOption.index');
    }
}
