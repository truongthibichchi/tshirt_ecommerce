<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class manageCityController extends Controller
{
    public function index(){
    	$cityList=City::all();
    	return view('admin.manageCity.index', ['cityList'=>$cityList]);
    }
}
