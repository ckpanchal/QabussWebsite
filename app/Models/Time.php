<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Time extends Model
{
    protected $table = 'time';
    public $primaryKey ='id';
    // public $timestamps =true;
    protected $fillable = [
        'Time',
        ];
}
