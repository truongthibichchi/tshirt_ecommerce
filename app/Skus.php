<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skus extends Model
{
    //
    protected $table = 'skus';
    public $timestamp = true;
    protected $fillable = ['skuCode', 'productID', 'inStock','active'];

    public function options(){
        return $this->belongsToMany('App\Options', 'Variants', 'skuCode', 'optionID' );
    }
}
