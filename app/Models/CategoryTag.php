<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CategoryTag extends Model
{
    protected $table = 'catgory_tag';
    public $primaryKey ='id';
    protected $fillable = [
        'nameEn','nameArb','image','parent','selected',
    ];
}
