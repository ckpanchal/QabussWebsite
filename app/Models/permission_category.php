<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class permission_category extends Model
{
    protected $table = 'permissions_category';
    public $primaryKey ='id';
    // public $timestamps =true;
    protected $fillable = [
        'id','name',
    ];
}
