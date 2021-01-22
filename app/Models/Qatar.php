<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Qatar extends Model
{
        protected $table = 'qatar';
    public $primaryKey ='id';
    // public $timestamps =true;
    protected $fillable = [
        'registerid','nameEn', 'nameArb', 'descriptionEn', 'descriptionArb', 'image', 'summeryEn', 'summeryArb'
    ];
}
