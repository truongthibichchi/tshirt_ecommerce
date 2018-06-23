<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class manageCityController extends Controller
{
	public function index(){
		$cityList = City::where([['isActive','=',1]])->get();  
		return view('admin.manageCity.index', ['cityList'=>$cityList]);
	}
	public function addCity(Request $request){
		$city = new City;
		$city->cityName=$request->new_cityName;
		$city->isActive="1";
		if($city->save()){
			return redirect('admin/setting/city')->with('message','Add successful!');
		}
	}

	public function editCity(Request $request){
		$city = City::find($request->edit_id);
		$this->validate($request,
			[
				'edit_id'=>'required',
				'edit_cityName' => 'unique:City,cityName'
			],
			[
				'edit_id.required' =>'error',
				'edit_cityName.unique' => 'This category has existed, please try another name!',
			]);

		
		$city->cityName=$request->edit_cityName;
		$city->save();
		return redirect('admin/setting/city')->with('message','Edit successful!');  
	}

	public function deleteCity(Request $request){
		$city = City::find($request->delete_id);
		$city->isActive=0;
		$city->save();
		

		return redirect('admin/setting/city')->with('message','Delete successful!');
	}
}
