<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    //
    protected $table = 'products';
    public $timestamp = true;
	
	protected $fillable = ['id', 'productName','productDescript', 'categoryID', 'defaultImage', 'active'];
	public function categories() {
		return $this->belongsTo('App\Categories', 'categoryID', 'id');
	}

	public function pricelist(){
		return $this->hasMany('App\Pricelist','productID','id');
	}

	public function skus(){
		return $this->hasMany('App\Skus', 'productID', 'id');
	}
}
