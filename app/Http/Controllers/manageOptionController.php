<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Options;
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


}
