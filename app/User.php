<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use Notifiable;
	protected $table = 'user';
	public $timestamp = true;
	protected $fillable = ['id', 'firstName','lastName','dateRegister','email','password','verified','phone','address','address2','city','country', 'remember_token','isAdmin'];
	// public function city(){
	// 	return $this->belongsTo('App\City', 'city', 'id');
	// }
}
