<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Workinghours extends Model
{
    protected $table = 'workinghours';
    public $primaryKey ='id';
    // public $timestamps =true;
    protected $fillable = [
        'registerid','userid','monday','tuesday','wednesday','thursday','friday','saturday','sunday',
        ];
}
