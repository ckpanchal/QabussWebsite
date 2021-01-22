<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
class Offers extends Model
{
    protected $table = 'offers';
    public $primaryKey ='Id';
    // public $timestamps =true;
    protected $fillable = [
        'offerid','userId','companyid','headingEn','headingArb', 'descriptionEn', 'descriptionArb', 'image', 'startdate', 'enddate', 'lat', 'lng', 'locationEn', 'locationArb', 'url', 'appUrl', 'external_url', 'category_id', 'view',
    ];

// Website FrontEnd

        // List Of Active Offers
            public static function getOffers()
            {
                $offers = DB::table('offers');
                if (Session::has('language') && Session::get('language') == 'ar') {
                    $offers = $offers->select('offers.Id', 'offers.offerid', 'offers.companyid', 'offers.headingArb as headingEn', 'offers.descriptionArb as descriptionEn', 'offers.image', 'offers.startdate', 'offers.enddate', 'offers.category_id', 'offers.locationArb as locationEn');
                } else {
                    $offers = $offers->select('offers.Id', 'offers.offerid', 'offers.companyid','offers.headingEn', 'offers.headingArb', 'offers.descriptionEn', 'offers.descriptionArb', 'offers.image', 'offers.startdate', 'offers.enddate', 'offers.category_id', 'offers.locationEn', 'offers.locationArb');
                }
                return $offers->where('startdate', '<=', Carbon::today())
                        ->whereDate('enddate', '>=', Carbon::today())
                        ->orWhere('startdate', '>=', Carbon::today())
                        ->orderBy('created_at')
                                        ->limit(3)

                        ->get();
            }
        // List Of Active Offers

        public static function getOfferData($id)
        {
            $offers = DB::table('offers');
            if (Session::has('language') && Session::get('language') == 'ar') {
                $offers = $offers->select('offers.Id', 'offers.companyid', 'offers.headingArb as headingEn', 'offers.descriptionArb as descriptionEn', 'offers.image', 'offers.startdate', 'offers.enddate', 'offers.category_id', 'offers.locationArb as locationEn', 'offers.url');
            } else {
                $offers = $offers->select('offers.Id', 'offers.companyid', 'offers.headingEn', 'offers.headingArb', 'offers.descriptionEn', 'offers.descriptionArb', 'offers.image', 'offers.startdate', 'offers.enddate', 'offers.category_id', 'offers.locationEn', 'offers.locationArb', 'offers.url');
            }
            return $offers->where('offers.Id', $id)
                    ->get();
        }
    
        public static function getRelatedOffer($id)
        {
            $offers = DB::table('offers');
            if (Session::has('language') && Session::get('language') == 'ar') {
                $offers = $offers->select('offers.Id', 'offers.companyid', 'offers.headingArb as headingEn', 'offers.descriptionArb as descriptionEn', 'offers.image', 'offers.startdate', 'offers.enddate', 'offers.category_id', 'offers.locationArb as locationEn');
            } else {
                $offers = $offers->select('offers.Id', 'offers.companyid','offers.headingEn', 'offers.headingArb', 'offers.descriptionEn', 'offers.descriptionArb', 'offers.image', 'offers.startdate', 'offers.enddate', 'offers.category_id', 'offers.locationEn', 'offers.locationArb');
            }
            return $offers->where('offers.Id', '!=', $id)
                ->whereDate('startdate', '<=', Carbon::today() || 'startdate', '>=', Carbon::today())
                ->whereDate('enddate', '>=', Carbon::today())
                ->where('id', '!=', $id)
                ->limit(4)
                ->get();
    
        }
    
// Website FrontEnd





// Website BackEnd

        public static function HomeSection($day){
            return DB::table('offers')
            ->select('offers.Id','offers.offerid', 'offers.companyid','offers.headingEn', 'offers.headingArb', 'offers.descriptionEn', 'offers.descriptionArb', 'offers.image', 'offers.startdate', 'offers.enddate', 'offers.lat','offers.lng', 'offers.locationEn', 'offers.locationArb', 'offers.status', 'offers.url', 'offers.appUrl', 'offers.category_id', 'offers.view')
            ->where('offers.enddate', '>=', $day)          
            ->get()
            ->count();
        }
        public static function HomeSectionData($day){
            return DB::table('offers')
            ->select('offers.Id','offers.offerid', 'offers.companyid','offers.headingEn', 'offers.headingArb', 'offers.descriptionEn', 'offers.descriptionArb', 'offers.image', 'offers.startdate', 'offers.enddate', 'offers.lat','offers.lng', 'offers.locationEn', 'offers.locationArb', 'offers.status', 'offers.url', 'offers.appUrl', 'offers.category_id', 'offers.view')
            ->where('offers.enddate', '>=', $day)          
            ->limit(5)
            ->get();
        }
        public static function FindOffers($id){
            return DB::table('offers')
            ->select('offers.Id','offers.offerid', 'offers.companyid','offers.headingEn', 'offers.headingArb', 'offers.descriptionEn', 'offers.descriptionArb', 'offers.image', 'offers.startdate', 'offers.enddate', 'offers.lat','offers.lng', 'offers.locationEn', 'offers.locationArb', 'offers.status', 'offers.url', 'offers.appUrl','offers.external_url','offers.category_id', 'offers.view')
            ->where('offers.offerid', '=', $id)             
            ->get();
        }

// Website BackEnd


// Mobile APP API

    // Home Searching Value

        public static function SearchDetails($search, $day){
            return DB::table('offers')
                ->select('offers.Id','offers.companyid','offers.headingEn', 'offers.headingArb', 'offers.descriptionEn', 'offers.descriptionArb', 'offers.image', 'offers.startdate', 'offers.enddate', 'offers.lat', 'offers.lng', 'offers.locationEn', 'offers.locationArb', 'offers.url')
            ->whereRaw('offers.enddate >= ?', [$day])
                ->where(function($query) use ($search){
                    $query->where('offers.headingEn', 'LIKE', '%' . $search . '%')
                        ->orWhere('offers.headingArb', 'LIKE', '%' . $search . '%')
                        ->orWhere('offers.descriptionEn', 'LIKE', '%' . $search . '%')
                        ->orWhere('offers.headingArb', 'LIKE', '%' . $search . '%')
                        ->orWhere('offers.headingArb', 'LIKE', '%' . $search . '%');
                })
            ->get();
        }

    // Home Searching Value

    // Home Section

        public static function NewlyAddedOffers($day,\Illuminate\Http\Request $request){
            $query = DB::table('offers')
                    ->select('offers.Id','offers.companyid','offers.headingEn', 'offers.headingArb', 'offers.descriptionEn', 'offers.descriptionArb', 'offers.image', 'offers.startdate', 'offers.enddate', 'offers.lat', 'offers.lng', 'offers.locationEn', 'offers.locationArb', 'offers.url')
                ->where('offers.startdate', '>=', $day)
                ->orwhere('offers.enddate', '>=', $day)
                ;
            if($request!=null && $request->filled('lat') && $request->filled('lng')){
                $query->orderByRaw('ABS(lat-'.$request->lat.') + ABS(lng - '.$request->lng.')');
            }else{
                $query->orderBy('created_at');
            }

        return $query->get();
        }
        
    // Home Section

    // Searching Value

        public function offerTags(){
            return $this->hasMany('App\Models\OffersTags','offerid','Id');
        }

        public function category(){
            return $this->belongsTo('App\Models\Category','category_id','id');
        }

        public function company(){
            return $this->belongsTo('App\Models\Business','companyid','registerId');
        }

    // Searching Value

        
    // Sort Both (Offer)

        public static function getOfferSort($id, $search){
            return DB::table('offers')
            ->join('offertags','offertags.offerid','offers.Id')
            ->select('offers.Id','offertags.tagid','offers.companyid','offers.headingEn', 'offers.headingArb', 'offers.descriptionEn', 'offers.descriptionArb', 'offers.image', 'offers.startdate', 'offers.enddate')
            ->orWhere('offers.headingEn', 'like', '%' . $search . '%')
            ->orWhere('offers.headingArb', 'like', '%' . $search . '%')
            ->orWhere('offers.descriptionEn', 'like', '%' . $search . '%')
            ->orWhere('offers.descriptionArb', 'like', '%' . $search . '%')
            ->Where('offertags.tagid', '=', $id)
            ->orderBy('offers.created_at')
            ->get();
        }

    // Sort Both (Offer)

    // Sort Category Id(Offer)

        public static function getOfferidSort($id){
            return DB::table('offers')
            ->join('offertags','offertags.offerid','offers.Id')
            ->select('offers.Id','offers.companyid','offers.headingEn', 'offers.headingArb', 'offers.descriptionEn', 'offers.descriptionArb', 'offers.image', 'offers.startdate', 'offers.enddate')
            ->Where('offertags.tagid', '=', $id)
            ->orderBy('offers.created_at')
            ->get();
        }
        
    // Sort Category Id(Offer)

    // Sort Search word(Offer)

        public static function getOffersearchSort($search){
            return DB::table('offers')
            ->select('offers.Id','offers.companyid','offers.headingEn', 'offers.headingArb', 'offers.descriptionEn', 'offers.descriptionArb', 'offers.image', 'offers.startdate', 'offers.enddate')
            ->orWhere('offers.headingEn', 'like', '%' . $search . '%')
            ->orWhere('offers.headingArb', 'like', '%' . $search . '%')
            ->orWhere('offers.descriptionEn', 'like', '%' . $search . '%')
            ->orWhere('offers.descriptionArb', 'like', '%' . $search . '%')
            ->orderBy('offers.created_at')
            ->get();
        }

    // Sort Search word(Offer)

    // Offers Sort

        public function scopeAPIfilterOffers($query,$request,$day){
            $query->select('offers.Id','offers.category_id','offers.companyid','offers.headingEn', 'offers.headingArb', 'offers.descriptionEn', 'offers.descriptionArb','offers.locationEn', 'offers.locationArb', 'offers.image', 'offers.startdate', 'offers.enddate', 'offers.lat', 'offers.lng', 'offers.locationEn', 'offers.locationArb', 'offers.url')
                ->with(['category'=>function($query){
                    $query->select('id','name','nameArb');
                },'offerTags'=>function($query){
                    $query->select('tagid','offerid')->with(['offertag'=>function($q){
                        $q->select("nameEn","nameArb","id");
                    }]);
                },'company']);
    
            if($request->filled('category')) {
                $query->where('category_id',$request->category);
            }
            $query->where('offers.enddate','>=',date('Y-m-d'));
            if($request->filled('search')){
                $search = '%' . $request->search . '%';
                $query->where(function($query) use ($search){
                   $query->where('offers.headingEn', 'like', '%' . $search . '%')
                       ->orWhere('offers.headingArb', 'like', '%' . $search . '%')
                       ->orWhere('offers.descriptionEn', 'like', '%' . $search . '%')
                       ->orWhere('offers.descriptionArb', 'like', '%' . $search . '%');
                });
            }
        
            return $query->orderBy('offers.created_at')
                ->get();
        }

    // Offers Sort


// Mobile APP API


// Notification

public function notification(){
    return $this->morphOne('App\Model\AppNotifications','notification');
}

// Notification

}
