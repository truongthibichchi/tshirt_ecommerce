<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Products;
use App\Categories;
use App\Pricelist;
use App\Variants;
use App\Skus;
use App\Options;
use App\Option_values;
use App\Images;
use App\Sale_order;
use App\Order_line;
use App\Stt_order;
use App\Shipper;
use App\User;
class manageOrderController extends Controller
{
	public function index(){
		$orderList = Sale_order::where([['stt','!=',4]])->get();
		$shipperList = Shipper::all();
		return view('admin.manageOrder.index', ['orderList'=>$orderList, 'shipperList'=>$shipperList]);
	}
	public function shipper(Request $request){
		$order = Sale_order::find($request->shipper_id);
		if($order->stt==1){
			$order->stt=2;
			$order->shipper=$request->edit_shipper;
			if($order->save()){

				return redirect('admin/order')->with('message','Shipping order successful!');
			}
		}
		else{
			return redirect('admin/order')->with('warning','Not avaible');
		}
	}

	public function payment(Request $request){
		$order = Sale_order::find($request->payment_id);
		if($order->stt==2){
			$order->stt=3;
			if($order->save()){

				return redirect('admin/order')->with('message','Payment succesful!');
			}

		}
		else{
			return redirect('admin/order')->with('warning','Not avaible!');
		}
	}
	public function cancelOrder(Request $request){
		$order = Sale_order::find($request->delete_id);
		if($order->stt==1){
			$order->stt=4;
			if($order->save()){

				return redirect('admin/order')->with('message','Canceled Order!');
			}
		}
		else {
			return redirect('admin/order')->with('warning','Not avaible!');
		}
	}

	public function orderLine($id){
		$order=Sale_order::find($id);
		$orderLine = Order_line::where([['orderID','=',$id]])->get();
		$variantList=Variants::all();
		$imageList = Images::all();
		$priceList = Pricelist::all();
		$skuList = Skus::all();
		return view('admin.manageOrder.orderLine', ['order'=>$order,'orderLine'=>$orderLine, 'variantList'=>$variantList,'imageList'=>$imageList, 'priceList'=>$priceList, 'skuList'=>$skuList]);
	}
}
