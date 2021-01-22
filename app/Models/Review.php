<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Review extends Model
{
        protected $table = 'review';
    public $primaryKey ='id';
    // public $timestamps =true;
    protected $fillable = [
        'registerid','businessid','userid','name','email','message','rate','ownermessage',
    ];
}
