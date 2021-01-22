<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AppNotifications extends Model
{
        protected $table="app_notifications";
    protected $fillable = [
        "id","title",'message',"titleAr",'messageAr','image','notification_type','notification_id'
    ];

    public function notification(){
        return $this->morphTo('notification');
    }
}
