<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shipper;
class manageShipperController extends Controller
{
    public function index(){
		$shipperList = Shipper::where([['isActive','=',1]])->get();  
		return view('admin.manageShipper.index', ['shipperList'=>$shipperList]);
	}
	public function addShipper(Request $request){
		$this->validate($request,
			[
				'new_phone' => 'unique:Shipper,phone'
			],
			[
				'new_phone.unique' => 'This phone has existed, please try another number!',
			]);

		$shipper = new Shipper;
		$shipper->companyName=$request->new_companyName;
		$shipper->phone=$request->new_phone;
		$shipper->isActive="1";
		if($shipper->save()){
			return redirect('admin/setting/shipper')->with('message','Add successful!');
		}
	}

	public function editShipper(Request $request){
		$shipper = Shipper::find($request->edit_id);
		$this->validate($request,
			[
				'edit_id'=>'required',
				'edit_phone' => 'unique:Shipper,phone'
			],
			[
				'edit_id.required' =>'error',
				'edit_phone.unique' => 'This phone has existed, please try another number!',
			]);

		
		$shipper->companyName=$request->edit_companyName;
		$shipper->phone=$request->edit_phone;
		$shipper->save();
		return redirect('admin/setting/shipper')->with('message','Edit successful!');  
	}

	public function deleteShipper(Request $request){
		$shipper = Shipper::find($request->delete_id);
		$shipper->isActive=0;
		$shipper->save();
		return redirect('admin/setting/shipper')->with('message','Delete successful!');
	}
}
