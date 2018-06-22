<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Options;
class manageOptionController extends Controller
{
    public function index(){
    	$optionList= Options::all();
    	return view('admin.manageOption.index',['optionList'=>$optionList]);
    }
}
