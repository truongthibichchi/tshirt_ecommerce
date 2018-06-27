<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment_type extends Model
{
    protected $table = 'payment_type';
    public $timestamp = true;
    protected $fillable = ['id', 'type'];

    public function sale_order(){
    	return $this->hasMany('App\Sale_order','payment','id');
    }
}
