<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment_type extends Model
{
    protected $table = 'payment_type';
    public $timestamp = true;
    protected $fillable = ['id', 'type'];
}
