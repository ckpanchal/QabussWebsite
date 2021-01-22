<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class permission_category_connect extends Model
{
    protected $table = 'permission_category_connect';
    public $primaryKey ='id';
    // public $timestamps =true;
    protected $fillable = [
        'id','permission','category',
    ];
}
