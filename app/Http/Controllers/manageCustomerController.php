<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class manageCustomerController extends Controller
{
    public function index(){
    	return view('admin.manageCustomer.index');
    }
}
