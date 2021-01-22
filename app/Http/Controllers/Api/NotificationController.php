<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\AppNotifications;
use App\Models\NotificationTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationMail;

class NotificationController extends Controller
{
    

    public function getAppNotifications(){
        try{
            $notifications = AppNotifications::with('notification')->orderBy('id','desc')->get();
            return response()->json($notifications,200);
        }catch (\Exception $ex){
            return response()->json($ex->getMessage(),500);
        }
    }
}
