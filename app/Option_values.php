<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option_values extends Model
{
    //
    protected $table = 'option_values';
    public $timestamp = true;
    protected $fillable = ['id', 'optionID','valueName'];

    public function options(){
    	return $this->belongsTo('App\Options', 'optionID','id');
    }
}
