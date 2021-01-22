<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reminder extends Model
{
        protected $table = 'reminders';
    public $primaryKey ='id';
    // public $timestamps =true;
    protected $fillable = [
        'user_id','code','completed','completed_at',
    ];
}
