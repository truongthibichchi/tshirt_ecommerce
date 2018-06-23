<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categories extends Model
{
    //
    protected $table = 'categories';
    public $timestamp = false;
    protected $fillable = ['id', 'categoryName','isActive'];
}
