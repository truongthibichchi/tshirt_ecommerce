<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment_type;
class managePaymentController extends Controller
{
    public function index(){
    	$paymentList =Payment_type::all();
       	return view('admin.managePayment.index',['paymentList'=>$paymentList]);
    }
}
