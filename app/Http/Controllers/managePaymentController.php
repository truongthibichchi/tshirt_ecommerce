<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment_type;
class managePaymentController extends Controller
{
    public function index(){
		$paymentList = Payment_type::where([['isActive','=',1]])->get();  
		return view('admin.managePayment.index', ['paymentList'=>$paymentList]);
	}
	public function addPayment(Request $request){
		$payment = new Payment_type;
		$payment->type=$request->new_type;
		$payment->isActive="1";
		if($payment->save()){
			return redirect('admin/setting/payment')->with('message','Add successful!');
		}
	}

	public function editPayment(Request $request){
		$payment = Payment_type::find($request->edit_id);
		$this->validate($request,
			[
				'edit_id'=>'required',
				'edit_type' => 'unique:Payment_type,type'
			],
			[
				'edit_id.required' =>'error',
				'edit_type.unique' => 'This category has existed, please try another name!',
			]);

		
		$payment->type=$request->edit_type;
		$payment->save();
		return redirect('admin/setting/payment')->with('message','Edit successful!');  
	}

	public function deletePayment(Request $request){
		$payment = Payment_type::find($request->delete_id);
		$payment->isActive=0;
		$payment->save();
		return redirect('admin/setting/payment')->with('message','Delete successful!');
	}
}
