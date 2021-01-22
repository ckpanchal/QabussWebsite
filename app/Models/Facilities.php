<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Facilities extends Model
{
    protected $table = 'facilities';
    public $primaryKey ='id';
    // public $timestamps =true;
    protected $fillable = [
        'userId','registerid','carparking','wifi','prayerroom','wheelchair','creditcard','alltimeservice',
    ];
}
