<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    //
    protected $table = 'images';
    public $timestamp = true;
    protected $fillable = ['id','url','skuCode'];

    public function skus(){
    	return $this->belongsTo('App\Skus', 'skuCode', 'skuCode');
    }
    
}
