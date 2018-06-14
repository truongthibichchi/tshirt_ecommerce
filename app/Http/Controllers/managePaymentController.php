<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class managePaymentController extends Controller
{
    public function index(){
    	return view('admin.managePayment.index');
    }
}
