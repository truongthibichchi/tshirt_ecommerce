<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Options;
use App\Option_values;
class manageOptionController extends Controller
{
	public function index(){
		$optionList = Options::where([['isActive','=',1]])->get();  
		return view('admin.manageOption.index', ['optionList'=>$optionList]);
	}
	public function addOption(Request $request){
		$option = new Options;
		$option->optionName=$request->new_optionName;
		$option->isActive="1";
		if($option->save()){
			return redirect('admin/setting/option')->with('message','Add successful!');
		}
	}

	public function editOption(Request $request){
		$option = Options::find($request->edit_id);
		$this->validate($request,
			[
				'edit_id'=>'required',
				'edit_optionName' => 'unique:Options,optionName'
			],
			[
				'edit_id.required' =>'error',
				'edit_optionName.unique' => 'This optine name has existed, please try another name!',
			]);

		
		$option->optionName=$request->edit_optionName;
		$option->save();
		return redirect('admin/setting/option')->with('message','Edit successful!');  
	}

	public function deleteOption(Request $request){
		$option = Options::find($request->delete_id);
		$option->isActive=0;
		$option->save();
		return redirect('admin/setting/option')->with('message','Delete successful!');
	}

	public function optionValue($id){
		$option = Options::find($id);
		$valueList = Option_values::where([['optionID','=',$id],['isActive','=',1]])->get();

		return view('admin.manageOption.optionValue', ['option'=>$option, 'valueList'=>$valueList]);
	}

	public function addValue(Request $request,$id){
		$value = new Option_values;
		$value->valueName=$request->new_valueName;
		$value->optionID=$id;
		$value->isActive="1";
		if($value->save()){
			return redirect('admin/setting/option/'.$id)->with('message','Add successful!');
		}
	}

	public function editValue(Request $request, $id){
		$value = Option_values::find($request->edit_id);
		$this->validate($request,
			[
				'edit_id'=>'required',
				'edit_valueName' => 'unique:Option_values,valueName'
			],
			[
				'edit_id.required' =>'error',
				'edit_valueName.unique' => 'This value name has existed, please try another name!',
			]);

		
		$value->valueName=$request->edit_valueName;
		if($value->save()){
			return redirect('admin/setting/option/'.$id)->with('message','Edit successful!');
		}
	}

	public function deleteValue(Request $request, $id){
		$value = Option_values::find($request->delete_id);
		$value->isActive=0;
		if($value->save()){
			return redirect('admin/setting/option/'.$id)->with('message','Delete successful!');
		}
	}

}
