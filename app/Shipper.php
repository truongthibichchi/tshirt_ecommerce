<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipper extends Model
{
    protected $table = 'shipper';
    public $timestamp = true;
    protected $fillable = ['id', 'companyName', 'phone'];
}
