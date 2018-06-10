<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    public $timestamp = true;
    protected $fillable = ['id', 'firstName','lastName','dateRegister','email','paswd','verified','phone','address','address2','city','country'];

    public function city(){
    	return $this->belongsTo('App\City', 'city', 'id');
    }
}
