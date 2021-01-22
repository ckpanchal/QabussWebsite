<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NewsAuthor extends Model
{
    protected $table = 'news_author';
    public $primaryKey ='id';
    // public $timestamps =true;
    protected $fillable = [
        'registerid','name',
    ];
}
