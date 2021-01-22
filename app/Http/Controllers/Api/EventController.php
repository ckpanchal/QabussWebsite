<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Events;
// use Carbon\Carbon;

class EventController extends Controller
{

    public function getEvents(Request $request)
    {
        try{
            $day = date("Y-m-d");
            $data = Events::findEvents($request,$day);
            return response()->json($data,200);
        }catch(\Exception $ex){
            return response()->json($ex->getMessage(),500);
        }

    }
    
    public function getTodayAndUpcomingEvents(Request $request)
    {
        try{
            $day = date("Y-m-d");
            $upcoming = Events::findEventsUpcoming($request,$day);
            $today = Events::findEventsToday($request,$day);
            return response()->json(['upcoming'=>$upcoming,'today'=>$upcoming],200);
        }catch(\Exception $ex){
            return response()->json($ex->getMessage(),500);
        }

    }

    public function getEventsSearch(Request $request)
    {
        $search = $request->search;
        $day = date("Y-m-d h:i:s");
        $data = Events::EventsSearch($day, $search);
        if(count($data))
        {
            $json['data'] = $data;
            $json['response'] = 1;
            $json['message'] = "success";
            return response()->json($json);
        }
        else{
            $json['data'] = 0;
            $json['response'] = 0;
            $json['message'] = "Error";
            return response()->json($json);
        }
    }
    public function getEvent($id)
    {
        $day = date("Y-m-d");
        $data = Events::getEvents($id, $day);
        if(count($data))
        {
            $json['data'] = $data;
            $json['response'] = 1;
            $json['message'] = "success";
            return response()->json($json);
        }
        else{
            $json['data'] = 0;
            $json['response'] = 0;
            $json['message'] = "Error";
            return response()->json($json);
        }
    }

}
