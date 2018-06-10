<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale_order extends Model
{
    protected $table = 'sale_order';
    public $timestamp = true;
    protected $fillable = ['id', 'paymentType', 'shipper', 'customer','orderedDate','shippedDate','orderPhone','orderAddress1','orderAddress2','orderCity','orderCountry','stt'];

   public function payment_type(){
   		return $this->belongsTo('App\Payment_type','paymentTypeID', 'id');
   }

   public function shipper(){
   		return $this->belongsTo('App\Shipper','shipperID','id');
   }

  /* public function users(){
   		return $this->belongsTo('App\Users', 'customerID','id');
   }
   */

   public function city(){
   		return $this->belongsTo('App\City', 'orderCity', 'id');
   }

   public function stt_order(){
      return $this->belongsTo('App\Stt_order', 'stt','id');
   }
   public function order_line(){
   		return $this->hasMany('App\Order_line', 'orderID', 'id');
   }
}
