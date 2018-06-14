<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class manageShipperController extends Controller
{
    public function index(){
    	return view('admin.manageShipper.index');
    }
}
