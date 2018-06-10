<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pricelist extends Model
{
    //
    protected $table = 'pricelist';
	public $timestamp = true;

	protected $fillable = ['id', 'productID','price','startdate', 'enddate' ];
	
}
