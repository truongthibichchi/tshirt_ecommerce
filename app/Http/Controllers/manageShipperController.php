<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shipper;
class manageShipperController extends Controller
{
    public function index(){
    	$shipperList = Shipper::all();
    	return view('admin.manageShipper.index', ['shipperList'=>$shipperList]);
    }
}
