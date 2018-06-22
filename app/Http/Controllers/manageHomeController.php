<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class manageHomeController extends Controller
{
    public function index(){
    	return view('admin.login');
    }

    public function home(){
    	return view('admin.manageHome');
    }
}
