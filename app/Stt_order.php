<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stt_order extends Model
{
    protected $table = 'stt_order';
    public $timestamp = true;
    protected $fillable = ['id', 'sttName'];
}
