<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Page extends Model
{
        protected $table = 'page';
    public $primaryKey ='id';
    // public $timestamps =true;
    protected $fillable = [
        'registerid','nameEn', 'nameArb', 'descriptionEn', 'descriptionArb',
    ];
}
