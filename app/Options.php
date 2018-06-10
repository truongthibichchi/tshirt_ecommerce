<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    //
    protected $table = 'options';
    public $timestamp = true;
    protected $fillable = ['id', 'attrName'];
}
