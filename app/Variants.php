<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variants extends Model
{
    protected $table = 'variants';
    public $timestamp = true;
    protected $fillable = ['skuCode','optionID','valueID'];

    public function option_values(){
    	return $this->belongsTo('App\Option_values','valueID', 'id');
    }

    public function options(){
    	return $this->belongsTo('App\Options', 'optionID', 'id');
    }
}
