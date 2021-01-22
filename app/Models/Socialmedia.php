<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Socialmedia extends Model
{
    protected $table = 'socialmedia';
    public $primaryKey ='id';
    // public $timestamps =true;
    protected $fillable = [
        'RegisterId','UserId','FaceBook', 'Instagram','Linked','Twitter','Youtube',
    ];
}
