<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Location extends Model
{
    protected $table = 'location';
    public $primaryKey ='id';
    protected $fillable = [
        'locationEn','locationArb',
    ];
}
