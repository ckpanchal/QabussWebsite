<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Slider extends Model
{
    protected $table = 'slider';
    public $primaryKey ='id';
    // public $timestamps =true;
    protected $fillable = [
        'slider',
    ];
}
