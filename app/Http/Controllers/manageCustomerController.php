<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class manageCustomerController extends Controller
{
    public function index(){
		$customerList = User::where([['isAdmin','=',0], ['isActive','=',1]])->get();  
		return view('admin.manageCustomer.index', ['customerList'=>$customerList]);
	}
	public function addCustomer(Request $request){
		$this->validate($request,
			[
				'new_email'=>'unique:User,email',	
			],
			[
				'new_email.unique' =>'Email existed, please retry!',
			]);
		$customer = new User;
		$customer->firstName=$request->new_firstName;
		$customer->lastName=$request->new_lastName;
		$customer->email=$request->new_email;
		$customer->phone=$request->new_phone;
		$customer->city=$request->new_city;
		$customer->country=$request->new_country;
		$customer->isAdmin="0";
		$customer->isActive="1";
		if($customer->save()){
			return redirect('admin/customer')->with('message','Add successful!');
		}
	}

	public function editCustomer(Request $request){
		$customer = User::find($request->edit_id);
		$this->validate($request,
			[
				'edit_id'=>'required',	
			],
			[
				'edit_id.required' =>'error',
			]);

		$customer->firstName=$request->edit_firstName;
		$customer->lastName=$request->edit_lastName;
		$customer->email=$request->edit_email;
		$customer->phone=$request->edit_phone;
		$customer->city=$request->edit_city;
		$customer->country=$request->edit_country;
		$customer->save();
		return redirect('admin/customer')->with('message','Edit successful!');  
	}

	public function deleteCustomer(Request $request){
		$customer = User::find($request->delete_id);
		$customer->isActive=0;
		$customer->save();
		return redirect('admin/customer')->with('message','Delete successful!');
	}
}
