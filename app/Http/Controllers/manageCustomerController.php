<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
class manageCustomerController extends Controller
{
    public function index(){
    	$customerList = Customer::all();
    	return view('admin.manageCustomer.index',['customerList'=>$customerList]);
    }
}
