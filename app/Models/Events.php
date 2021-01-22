<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Events extends Model
{
    protected $table = 'event';
    public $primaryKey ='id';
    // public $timestamps =true;
    protected $fillable = [
        'headingEn','headingArb','descriptionEn', 'descriptionArb', 'startdate', 'enddate',
         'amount', 'phone', 'email', 'image', 'category', 'lat', 'lng', 'location',
    ];

    // Website FrontEnd

        // List Of Active Events
        public static function getEvent(){
            $event = DB::table('event');
            if (Session::has('language') && Session::get('language') == 'ar') {
                $event = $event->select('event.id', 'event.eventid', 'event.headingArb as headingEn', 'event.descriptionArb as descriptionEn', 'event.summeryArb as summeryEn', 'event.image', 'event.startdate', 'event.enddate', 'event.amount', 'event.phone', 'event.email', 'event.lat', 'event.lng', 'event.locationArb as location');
            } else {
                $event = $event->select('event.id', 'event.eventid','event.headingEn', 'event.headingArb', 'event.descriptionEn', 'event.descriptionArb', 'event.summeryEn', 'event.summeryArb', 'event.image', 'event.startdate', 'event.enddate', 'event.amount', 'event.phone', 'event.email', 'event.lat', 'event.lng', 'event.locationArb', 'event.location');
            }
            return $event->whereDate('startdate', '<=', Carbon::today())
                ->whereDate('enddate', '>=', Carbon::today())
                ->orWhere('startdate', '>=', Carbon::today())
                ->orderBy('enddate')
                ->get();
        }
        // List Of Active Events

        // List Of Active Events

        public static function getEventData($id){
            $event = DB::table('event');
            if (Session::has('language') && Session::get('language') == 'ar') {
                $event = $event->select('event.id',  'event.headingArb as headingEn', 'event.descriptionArb as descriptionEn', 'event.image', 'event.startdate', 'event.enddate', 'event.amount', 'event.phone', 'event.email', 'event.lat', 'event.lng', 'event.locationArb as location');
            } else {
                $event = $event->select('event.id', 'event.headingEn', 'event.headingArb', 'event.descriptionEn', 'event.descriptionArb', 'event.image', 'event.startdate', 'event.enddate', 'event.amount', 'event.phone', 'event.email', 'event.lat', 'event.lng', 'event.locationArb', 'event.location');
            }
            return $event->where('event.id', '=', $id)
                    ->orderBy('enddate')
                    ->get();
        }

        // List Of Active Events
        // Realted Events

            public static function getRelatedEvent($id){
                $event = DB::table('event');
                if (Session::has('language') && Session::get('language') == 'ar') {
                    $event = $event->select('event.id',  'event.headingArb as headingEn', 'event.descriptionArb as descriptionEn', 'event.image', 'event.startdate', 'event.enddate', 'event.amount', 'event.phone', 'event.email', 'event.lat', 'event.lng', 'event.locationArb as location');
                } else {
                    $event = $event->select('event.id', 'event.headingEn', 'event.headingArb', 'event.descriptionEn', 'event.descriptionArb', 'event.image', 'event.startdate', 'event.enddate', 'event.amount', 'event.phone', 'event.email', 'event.lat', 'event.lng', 'event.locationArb', 'event.location');
                }
                return $event->whereDate('startdate', '<=', Carbon::today())
                ->whereDate('enddate', '>=', Carbon::today())
                ->orWhere('startdate', '>=', Carbon::today())
                ->where('event.id', '!=', $id)
                ->orderBy('enddate')
                ->limit(4)
                ->get();
            }
            
        // Realted Events

    // Website FrontEnd
    
    
    // Website BackEnd

        public static function HomeSection($day){
            return $event =  DB::table('event')
            ->select('event.id','event.headingEn','event.headingArb', 'event.descriptionEn', 'event.descriptionArb', 'event.startdate', 'event.enddate', 'event.amount', 'event.phone', 'event.email', 'event.image', 'event.lat', 'event.lng', 'event.location')
            ->Where('event.enddate', '>=', $day)
            ->orderBy('enddate')
            ->get()
            ->count();
        }

        public static function HomeSectionData($day){
            return $event =  DB::table('event')
            ->select('event.id','event.headingEn','event.headingArb', 'event.descriptionEn', 'event.descriptionArb', 'event.startdate', 'event.enddate', 'event.amount', 'event.phone', 'event.email', 'event.image', 'event.lat', 'event.lng', 'event.location')
            ->Where('event.enddate', '>=', $day)
            ->orderBy('enddate')
            ->limit(5)
            ->get();
        }
        
    // Website BackEnd
    
    
    
    
    // Mobile APP API
    
        // Home Event

            public static function NewlyAddedEvent($day,Request $request=null){
                $query = DB::table('event')
                    ->select('event.id','event.headingEn','event.headingArb', 'event.descriptionEn', 'event.descriptionArb', 'event.summeryEn', 'event.summeryArb', 'event.startdate', 'event.enddate', 'event.amount', 'event.phone', 'event.email', 'event.image', 'event.location', 'event.locationArb', 'event.lat', 'event.lng', 'event.location')
                    ->where('event.startdate', '>=', $day)
                    ->orwhere('event.enddate', '>=', $day);
                if($request!=null && $request->filled('lat') && $request->filled('lng')){
                    $query->orderByRaw('ABS(lat-'.$request->lat.') + ABS(lng - '.$request->lng.')');
                // $query->orderByRaw('FIELD(lat, '.$request->lat.') DESC,FIELD(lng,'.$request->lng.') DESC');
                }
                return $query
                ->orderBy('startdate')
                ->limit(10)
                ->get();
            }

        // Home Event
        
        // 

            public static function EventsSearch($day, $search){
                return $event =  DB::table('event')
                ->select('event.id','event.headingEn','event.headingArb', 'event.descriptionEn', 'event.descriptionArb', 'event.summeryEn', 'event.summeryArb', 'event.startdate', 'event.enddate', 'event.amount', 'event.phone', 'event.email', 'event.image', 'event.location', 'event.locationArb', 'event.lat', 'event.lng', 'event.location')
                ->orWhere('event.headingEn', 'like', '%' . $search . '%')
                ->orWhere('event.headingArb', 'like', '%' . $search . '%')
                ->orWhere('event.descriptionEn', 'like', '%' . $search . '%')
                ->orWhere('event.descriptionArb', 'like', '%' . $search . '%')
                ->orWhere('event.phone', 'like', '%' . $search . '%')
                ->orWhere('event.email', 'like', '%' . $search . '%')
                ->orWhere('event.category', 'like', '%' . $search . '%')
                ->orWhere('event.location', 'like', '%' . $search . '%')
                ->where('event.status', '!=', 0)
                ->where('event.startdate', '>=', $day)
                ->where('event.enddate', '>=', $day)
                ->orderBy('enddate')
                ->get();
            }

        // 

        // 

            public static function getEvents($id, $day){
                return $event =  DB::table('event')
                ->select('event.id','event.headingEn','event.headingArb', 'event.descriptionEn', 'event.descriptionArb', 'event.summeryEn', 'event.summeryArb', 'event.startdate', 'event.enddate', 'event.amount', 'event.phone', 'event.email', 'event.image', 'event.location', 'event.locationArb', 'event.lat', 'event.lng', 'event.location')
                ->where('event.startdate', '>=', $day)
                ->orWhere('event.enddate', '>=', $day)
                ->where('event.id', '=', $id)
                ->orderBy('enddate')
                ->get();
            }

        // 


        // Home Searching Value

            public static function SearchDetails($search, $day){
                return $event =  DB::table('event')
            ->select('event.id','event.headingEn','event.headingArb', 'event.descriptionEn', 'event.descriptionArb', 'event.summeryEn', 'event.summeryArb', 'event.startdate', 'event.enddate', 'event.amount', 'event.phone', 'event.email', 'event.image', 'event.location', 'event.locationArb', 'event.lat', 'event.lng', 'event.location')
                ->where('event.startdate', '>=', $day)
                ->where('event.enddate', '>=', $day)
                ->where('event.headingEn', 'like', '%' . $search . '%')
                ->orWhere('event.headingArb', 'like', '%' . $search . '%')
                ->orWhere('event.descriptionEn', 'like', '%' . $search . '%')
                ->orWhere('event.descriptionArb', 'like', '%' . $search . '%')
                ->orderBy('startdate')
                ->limit(10)
                ->get();
            }

        // Home Searching Value

        // 

            public function scopeFindEventsToday($query,Request $request,$day){
                //  $date = date("Y-m-d H");
                $query->select('event.id','event.headingEn','event.headingArb', 'event.descriptionEn', 'event.descriptionArb', 'event.summeryEn', 'event.summeryArb', 'event.startdate', 'event.enddate', 'event.amount', 'event.phone', 'event.email', 'event.image', 'event.location', 'event.locationArb','event.lat', 'event.lng', 'event.location');
                if($request->filled('search')){
                    $search = $request->search;
                    $query->where(function ($query) use ($day){
                        $query->where('event.startdate', '=', $day)
                            ->orwhere('event.enddate', '=', $day);
                    })->where('event.headingEn', 'like', '%' . $search . '%')
                        ->orWhere('event.headingArb', 'like', '%' . $search . '%')
                        ->orWhere('event.descriptionEn', 'like', '%' . $search . '%')
                        ->orWhere('event.descriptionArb', 'like', '%' . $search . '%');
                }else{
                    $query->where('event.startdate', '>=', $day)
                        ->orwhere('event.enddate', '>=', $day);
                }
                return $query->orderBy('enddate')->get();
            }

        // 

        // 

            public function scopeFindEventsUpcoming($query,Request $request,$day){
                //  $date = date("Y-m-d H");
                $query->select('event.id','event.headingEn','event.headingArb', 'event.descriptionEn', 'event.descriptionArb', 'event.summeryEn', 'event.summeryArb', 'event.startdate', 'event.enddate', 'event.amount', 'event.phone', 'event.email', 'event.image', 'event.location', 'event.locationArb','event.lat', 'event.lng', 'event.location');
                if($request->filled('search')){
                    $search = $request->search;
                    $query->where(function ($query) use ($day){
                        $query->where('event.startdate', '<=', $day)
                            ->orwhere('event.enddate', '>=', $day);
                    })->where('event.headingEn', 'like', '%' . $search . '%')
                        ->orWhere('event.headingArb', 'like', '%' . $search . '%')
                        ->orWhere('event.descriptionEn', 'like', '%' . $search . '%')
                        ->orWhere('event.descriptionArb', 'like', '%' . $search . '%');
                }else{
                    $query->where('event.startdate', '>=', $day)
                        ->orwhere('event.enddate', '>=', $day);
                }
                return $query->orderBy('enddate')->get();
            }

        // 

        // 

            public function scopeFindEvents($query,Request $request,$day){
                //  $date = date("Y-m-d H");
                $query->select('event.id','event.headingEn','event.headingArb', 'event.descriptionEn', 'event.descriptionArb', 'event.summeryEn', 'event.summeryArb', 'event.startdate', 'event.enddate', 'event.amount', 'event.phone', 'event.email', 'event.image', 'event.location', 'event.locationArb','event.lat', 'event.lng', 'event.location');
                if($request->filled('search')){
                    $search = $request->search;
                    $query->where(function ($query) use ($day){
                        $query->where('event.startdate', '>=', $day)
                            ->orwhere('event.enddate', '>=', $day);
                    })->where('event.headingEn', 'like', '%' . $search . '%')
                        ->orWhere('event.headingArb', 'like', '%' . $search . '%')
                        ->orWhere('event.descriptionEn', 'like', '%' . $search . '%')
                        ->orWhere('event.descriptionArb', 'like', '%' . $search . '%');
                }else{
                    $query->where('event.startdate', '>=', $day)
                        ->orwhere('event.enddate', '>=', $day);
                }
                return $query->orderBy('enddate')->get();
            }

        // 

        // 

            public function notification(){
                    return $this->morphOne('App\Model\AppNotifications','notification');
            }

        // 
        
    // Mobile APP API

}
