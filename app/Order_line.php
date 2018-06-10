<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_line extends Model
{
    protected $table = 'order_line';
    public $timestamp = true;
    protected $fillable = ['id', 'orderID', 'skus', 'quantity'];

    public function skus(){
    	return $this-> belongsTo('App\Skus', 'skus', 'skuCode');
    }
}


