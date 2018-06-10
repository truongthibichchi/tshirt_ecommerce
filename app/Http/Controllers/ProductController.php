<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductController extends Controller
{
    //
	public static function getProductByID ($productID) {
		$result = Product::find($productID);
		return $result;
	}
	
	public static function getProdcutByCategory($categoryID) {
		$result = DB::table('product')
				->where('categoryID', $categoryID)
				->get();
		return $result;
	}
	
}
