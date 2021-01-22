<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Business extends Model
{
    protected $table = 'business';
    public $primaryKey ='id';
    // public $timestamps =true;
    protected $fillable = [
        'id','registerId','userId','companyname','companynameArb','companydescription','companydescriptionArb','companycategory','companylocation','companylocationArb','location','lat','lng','companyphone','company_tagline','company_taglineArb','company_website','company_email','approve','view','featured','profile_image','background_image',
    ];

    public static function HomeSectionData(){
        return DB::table('business')
        ->select('business.id','business.registerId', 'business.userId', 'business.companyname', 'business.companynameArb', 'business.companydescription', 'business.companydescriptionArb', 'business.companycategory', 'business.companylocation', 'business.companylocationArb', 'business.lat', 'business.lng', 'business.companyphone', 'business.company_tagline', 'business.company_taglineArb', 'business.company_website', 'business.company_email', 'business.profile_image', 'business.background_image')
        ->orderBy('created_at', 'desc')
        ->limit(5)
        ->get();
    }

    // Website 

  

    // Home Searching List Business  

    public static function ListSearchBusiness($Search)
    {
        $business = DB::table('business');
        if (Session::has('language') && Session::get('language') == 'ar') {
            $business = $business->select('business.registerId',  'business.companynameArb as companyname', 'business.companydescriptionArb as companydescription', 'business.companycategory', 'business.companylocationArb as companylocation', 'business.lat', 'business.lng', 'business.companyphone', 'business.company_website', 'business.company_email', 'business.profile_image', 'business.background_image');
        } else {
            $business = $business->select('business.registerId', 'business.companyname', 'business.companynameArb', 'business.companydescription', 'business.companydescriptionArb', 'business.companycategory', 'business.companylocation', 'business.companylocationArb', 'business.lat', 'business.lng', 'business.companyphone', 'business.company_website', 'business.company_email', 'business.profile_image', 'business.background_image');
        }
        return $business->orWhere('business.companyname', 'like', '%' . $Search . '%')
            ->orWhere('business.companynameArb', 'like', '%' . $Search . '%')
            ->orWhere('business.companydescription', 'like', '%' . $Search . '%')
            ->orWhere('business.companydescriptionArb', 'like', '%' . $Search . '%')
            ->orWhere('business.companylocation', 'like', '%' . $Search . '%')
            ->orWhere('business.companylocationArb', 'like', '%' . $Search . '%')
            ->orWhere('business.companyphone', 'like', '%' . $Search . '%')
            ->orWhere('business.company_tagline', 'like', '%' . $Search . '%')
            ->orWhere('business.company_taglineArb', 'like', '%' . $Search . '%')
            ->orWhere('business.company_website', 'like', '%' . $Search . '%')
            ->get();
        
    }
    
    // Home Searching List Business

    // Home Main Category Ways Business List

    public static function HomeMainCategory($id)
    {
        $business = DB::table('business');
        if (Session::has('language') && Session::get('language') == 'ar') {
            $business = $business->select('business.registerId',  'business.companynameArb as companyname', 'business.companydescriptionArb as companydescription', 'business.companycategory', 'business.companylocationArb as companylocation', 'business.lat', 'business.lng', 'business.companyphone', 'business.company_website', 'business.company_email', 'business.profile_image', 'business.background_image');
        } else {
            $business = $business->select('business.registerId', 'business.companyname', 'business.companynameArb', 'business.companydescription', 'business.companydescriptionArb', 'business.companycategory', 'business.companylocation', 'business.companylocationArb', 'business.lat', 'business.lng', 'business.companyphone', 'business.company_website', 'business.company_email', 'business.profile_image', 'business.background_image');
        }
        return $business->Where('business.CompanyCategory', '=', $id)
        ->orderBy('created_at')
        ->get();
        
    }
    
    // Home Main Category Ways BusinesList

    // Home Category ways Business  list

    public static function CategoryListBusiness($id)
    {
        $business = DB::table('business');
        if (Session::has('language') && Session::get('language') == 'ar') {
            $business = $business->select('business.registerId',  'business.companynameArb as companyname', 'business.companydescriptionArb as companydescription', 'business.companycategory', 'business.companylocationArb as companylocation', 'business.lat', 'business.lng', 'business.companyphone', 'business.company_website', 'business.company_email', 'business.profile_image', 'business.background_image');
        } else {
            $business = $business->select('business.registerId', 'business.companyname', 'business.companynameArb', 'business.companydescription', 'business.companydescriptionArb', 'business.companycategory', 'business.companylocation', 'business.companylocationArb', 'business.lat', 'business.lng', 'business.companyphone', 'business.company_website', 'business.company_email', 'business.profile_image', 'business.background_image');
        }
        return $business->where('business.companycategory', '=', $id)
            ->orderBy('created_at')
            ->limit(10)
            ->get();
        
    }
        
    // Home Category ways Business  list

    // Home Category ways Business  list

    public static function FeaturedBusiness()
    {
        $business = DB::table('business');
        if (Session::has('language') && Session::get('language') == 'ar') {
            $business = $business->select('business.registerId',  'business.companynameArb as companyname', 'business.companydescriptionArb as companydescription', 'business.companycategory', 'business.companylocationArb as companylocation', 'business.lat', 'business.lng', 'business.companyphone', 'business.company_website', 'business.company_email', 'business.profile_image', 'business.background_image');
        } else {
            $business = $business->select('business.registerId', 'business.companyname', 'business.companynameArb', 'business.companydescription', 'business.companydescriptionArb', 'business.companycategory', 'business.companylocation', 'business.companylocationArb', 'business.lat', 'business.lng', 'business.companyphone', 'business.company_website', 'business.company_email', 'business.profile_image', 'business.background_image');
        }
        return $business->where('business.featured', '=', 1)
            ->orderBy('created_at')
            ->limit(10)
            ->get();
        
    }
        
    // Home Category ways Business  list

    // Home Category ways Business  list

    public static function ShoppingBusiness($id)
    {
        $business = DB::table('business');
        if (Session::has('language') && Session::get('language') == 'ar') {
            $business = $business->select('business.registerId',  'business.companynameArb as companyname', 'business.companydescriptionArb as companydescription', 'business.companycategory', 'business.companylocationArb as companylocation', 'business.lat', 'business.lng', 'business.companyphone', 'business.company_website', 'business.company_email', 'business.profile_image', 'business.background_image');
        } else {
            $business = $business->select('business.registerId', 'business.companyname', 'business.companynameArb', 'business.companydescription', 'business.companydescriptionArb', 'business.companycategory', 'business.companylocation', 'business.companylocationArb', 'business.lat', 'business.lng', 'business.companyphone', 'business.company_website', 'business.company_email', 'business.profile_image', 'business.background_image');
        }
        return $business->where('business.companycategory', '=', $id)
            ->orderBy('created_at')
            ->limit(1)
            ->get();
        
    }
        
    // Home Category ways Business  list

    // Home Category ways Business  list

    public static function FeatureShopping($id)
    {
        $business = DB::table('business');
        if (Session::has('language') && Session::get('language') == 'ar') {
            $business = $business->select('business.registerId',  'business.companynameArb as companyname', 'business.companydescriptionArb as companydescription', 'business.companycategory', 'business.companylocationArb as companylocation', 'business.lat', 'business.lng', 'business.companyphone', 'business.company_website', 'business.company_email', 'business.profile_image', 'business.background_image');
        } else {
            $business = $business->select('business.registerId', 'business.companyname', 'business.companynameArb', 'business.companydescription', 'business.companydescriptionArb', 'business.companycategory', 'business.companylocation', 'business.companylocationArb', 'business.lat', 'business.lng', 'business.companyphone', 'business.company_website', 'business.company_email', 'business.profile_image', 'business.background_image');
        }
        return $business->where('business.featured', '=', 1)
            ->where('business.companycategory', '=', $id)
            ->orderBy('created_at')
            ->limit(3)
            ->get();
        
    }
        
    // Home Category ways Business  list

    // Home Category ways Business  list

    public static function HotelBusiness()
    {
        $business = DB::table('business');
        if (Session::has('language') && Session::get('language') == 'ar') {
            $business = $business->select('business.registerId',  'business.companynameArb as companyname', 'business.companydescriptionArb as companydescription', 'business.companycategory', 'business.companylocationArb as companylocation', 'business.lat', 'business.lng', 'business.companyphone', 'business.company_website', 'business.company_email', 'business.profile_image', 'business.background_image');
        } else {
            $business = $business->select('business.registerId', 'business.companyname', 'business.companynameArb', 'business.companydescription', 'business.companydescriptionArb', 'business.companycategory', 'business.companylocation', 'business.companylocationArb', 'business.lat', 'business.lng', 'business.companyphone', 'business.company_website', 'business.company_email', 'business.profile_image', 'business.background_image');
        }
        return $business->where('business.featured', '=', "1")
            ->where('business.companycategory', '=', "25")
            ->orderBy('created_at')
            ->limit(10)
            ->get();
        
    }
        
    // Home Category ways Business  list

    // Home Category ways Business  list

    public static function FeatureHotel()
    {
        $business = DB::table('business');
        if (Session::has('language') && Session::get('language') == 'ar') {
            $business = $business->select('business.registerId',  'business.companynameArb as companyname', 'business.companydescriptionArb as companydescription', 'business.companycategory', 'business.companylocationArb as companylocation', 'business.lat', 'business.lng', 'business.companyphone', 'business.company_website', 'business.company_email', 'business.profile_image', 'business.background_image');
        } else {
            $business = $business->select('business.registerId', 'business.companyname', 'business.companynameArb', 'business.companydescription', 'business.companydescriptionArb', 'business.companycategory', 'business.companylocation', 'business.companylocationArb', 'business.lat', 'business.lng', 'business.companyphone', 'business.company_website', 'business.company_email', 'business.profile_image', 'business.background_image');
        }
        return $business->where('business.featured', '=', "1")
            ->where('business.companycategory', '=', "25")
            ->where('business.view', '!=', "0")
            ->orderBy('created_at')
            ->limit(3)
            ->get();
        
    }
        
    // Home Category ways Business  list



// Home list All Business  

    public static function ListBusinessSearch()
    {
        $business = DB::table('business');
        if (Session::has('language') && Session::get('language') == 'ar') {
            $business = $business->select('business.registerId',  'business.companynameArb as companyname', 'business.companydescriptionArb as companydescription', 'business.companycategory', 'business.companylocationArb as companylocation', 'business.lat', 'business.lng', 'business.companyphone', 'business.company_website', 'business.company_email', 'business.profile_image', 'business.background_image');
        } else {
            $business = $business->select('business.registerId', 'business.companyname', 'business.companynameArb', 'business.companydescription', 'business.companydescriptionArb', 'business.companycategory', 'business.companylocation', 'business.companylocationArb', 'business.lat', 'business.lng', 'business.companyphone', 'business.company_website', 'business.company_email', 'business.profile_image', 'business.background_image');
        }
        return $business->orderBy('created_at')
            ->limit(10)
            ->get();
        
    }
    
    // Home list All Business 

    // Home list All Business  

    public static function ListBusinessCategory()
    {
        $business = DB::table('business');
        if (Session::has('language') && Session::get('language') == 'ar') {
            $business = $business->select('business.registerId',  'business.companynameArb as companyname', 'business.companydescriptionArb as companydescription', 'business.companycategory', 'business.companylocationArb as companylocation', 'business.lat', 'business.lng', 'business.companyphone', 'business.company_website', 'business.company_email', 'business.profile_image', 'business.background_image');
        } else {
            $business = $business->select('business.registerId', 'business.companyname', 'business.companynameArb', 'business.companydescription', 'business.companydescriptionArb', 'business.companycategory', 'business.companylocation', 'business.companylocationArb', 'business.lat', 'business.lng', 'business.companyphone', 'business.company_website', 'business.company_email', 'business.profile_image', 'business.background_image');
        }
        return $business->orderBy('created_at')
            ->limit(10)
            ->get();
        
    }
    
    // Home list All Business 

    // Home list All Business  

    public static function ListBusinessLocation()
    {
        $business = DB::table('business');
        if (Session::has('language') && Session::get('language') == 'ar') {
            $business = $business->select('business.registerId',  'business.companynameArb as companyname', 'business.companydescriptionArb as companydescription', 'business.companycategory', 'business.companylocationArb as companylocation', 'business.lat', 'business.lng', 'business.companyphone', 'business.company_website', 'business.company_email', 'business.profile_image', 'business.background_image');
        } else {
            $business = $business->select('business.registerId', 'business.companyname', 'business.companynameArb', 'business.companydescription', 'business.companydescriptionArb', 'business.companycategory', 'business.companylocation', 'business.companylocationArb', 'business.lat', 'business.lng', 'business.companyphone', 'business.company_website', 'business.company_email', 'business.profile_image', 'business.background_image');
        }
        return $business->orderBy('created_at')
            ->limit(10)
            ->get();
        
    }
    
    // Home list All Business 

    // Home list All Business  

    public static function ListBusiness()
    {
        $business = DB::table('business');
        if (Session::has('language') && Session::get('language') == 'ar') {
            $business = $business->select('business.registerId',  'business.companynameArb as companyname', 'business.companydescriptionArb as companydescription', 'business.companycategory', 'business.companylocationArb as companylocation', 'business.lat', 'business.lng', 'business.companyphone', 'business.company_website', 'business.company_email', 'business.profile_image', 'business.background_image');
        } else {
            $business = $business->select('business.registerId', 'business.companyname', 'business.companynameArb', 'business.companydescription', 'business.companydescriptionArb', 'business.companycategory', 'business.companylocation', 'business.companylocationArb', 'business.lat', 'business.lng', 'business.companyphone', 'business.company_website', 'business.company_email', 'business.profile_image', 'business.background_image');
        }
        return $business->orderBy('created_at')
            ->limit(10)
            ->get();
        
    }
    
    // Home list All Business 
// Website



// Mobile APP API

    // list of business 

        public static function SearchDetail()
        {
            return  DB::table('business')
            ->select('business.registerId', 'business.companyname', 'business.companynameArb', 'business.companylocation', 'business.companylocationArb', 'business.lat', 'business.lng', 'business.profile_image', 'business.background_image')
            ->orderByDesc('business.created_at')
            ->limit(10)
            ->get();
        }

    // list of business 

    // Newly Added Business

        public static function NewlyAdded(Request $request=null)
        {
            $query = DB::table('business')->select('business.registerId', 'business.companyname', 'business.companynameArb', 'business.companylocation', 'business.companylocationArb', 'business.lat', 'business.lng', 'business.profile_image', 'business.background_image');
            if($request!=null && $request->filled('lat') && $request->filled('lng')){
            //  $query->orderByRaw('FIELD(lat, '.$request->lat.') DESC,FIELD(lng,'.$request->lng.') DESC');
                $query->orderByRaw('ABS(lat-'.$request->lat.') + ABS(lng - '.$request->lng.')');
            }
            return  $query
                ->orderByDesc('business.created_at')
            ->limit(10)
            ->get();
        }

    // Newly Added Business

    // Featured Business

        public static function FeaturedPlaces(Request $request=null)
        {
            $query =   DB::table('business')
                ->select('business.registerId', 'business.companyname', 'business.companynameArb', 'business.companylocation', 'business.companylocationArb', 'business.lat', 'business.lng', 'business.profile_image', 'business.background_image')
                ->Where('business.companycategory', '=', 29)
                ->OrWhere('business.companycategory', '=', 31)
                ->OrWhere('business.companycategory', '=', 32)
                ->Where('business.featured', '=', 1);
            if($request!=null && $request->filled('lat') && $request->filled('lng')){
                $query->orderByRaw('ABS(lat-'.$request->lat.') + ABS(lng - '.$request->lng.')');
            // $query->orderByRaw('FIELD(lat, '.$request->lat.') DESC,FIELD(lng,'.$request->lng.') DESC');
            }
            return $query
            ->orderByDesc('business.created_at')
            ->limit(10)
            ->get();
        }
        
    // Featured Business

    // Home Searching Value

        public static function SearchDetails($search)
        {
            return  DB::table('business')
            ->select('business.id','business.registerId', 'business.userId', 'business.companyname', 'business.companynameArb', 'business.companydescription', 'business.companydescriptionArb', 'business.companycategory', 'business.companylocation', 'business.companylocationArb', 'business.lat', 'business.lng', 'business.companyphone', 'business.company_tagline', 'business.company_taglineArb', 'business.company_website', 'business.company_email', 'business.profile_image', 'business.background_image')
            ->Where('business.companyname', 'like', '%' . $search . '%')
            ->orWhere('business.companynameArb', 'like', '%' . $search . '%')
            ->orWhere('business.companydescription', 'like', '%' . $search . '%')
            ->orWhere('business.companydescriptionArb', 'like', '%' . $search . '%')
            ->orWhere('business.companylocation', 'like', '%' . $search . '%')
            ->orWhere('business.companylocationArb', 'like', '%' . $search . '%')
            ->orWhere('business.companyphone', 'like', '%' . $search . '%')
            ->orWhere('business.company_tagline', 'like', '%' . $search . '%')
            ->orWhere('business.company_taglineArb', 'like', '%' . $search . '%')
            ->orWhere('business.company_website', 'like', '%' . $search . '%')
            ->orderBy('business.companyname')
            ->get();
        }

    // Home Searching Value




    // list of business - Distance

        public static function APIFindCategoryroutes($id, $lat, $lng)
        {

            return $orders = DB::table('business')
            ->select('business.registerId', 'business.companyname', 'business.companynameArb', 'business.companylocation', 'business.companylocationArb', 'business.lat', 'business.lng', 'business.profile_image', 'business.background_image', DB::raw("SQRT( POW(69.1 * (lat - $lat), 2) + POW(69.1 * ($lng - lng)  * COS(lat / 57.3), 2)) AS distance"))
            ->Where('business.CompanyCategory', '=', $id)
            ->orderBy('distance')
            ->get();

        }

    // list of business - Distance

    // list of business - Ascending

        public static function APICategoryBusinessListAsc($id)
        {
            return  DB::table('business')
            ->select('business.registerId', 'business.companyname', 'business.companynameArb', 'business.companylocation', 'business.companylocationArb', 'business.lat', 'business.lng', 'business.profile_image', 'business.background_image')
            ->Where('business.CompanyCategory', '=', $id)
            ->orderBy('business.CompanyName')
            ->get();
        }

    // list of business - Ascending

    // list of business - Area

        public static function APICategoryBusinessListArea($id, $area)
        {
            return  DB::table('business')
            ->select('business.registerId','business.companyname', 'business.companynameArb', 'business.companylocation', 'business.companylocationArb', 'business.lat', 'business.lng', 'business.profile_image', 'business.background_image', 'business.companycategory')
            ->Where('business.location', 'like', '%' . $area . '%')
            ->orWhere('business.companycategory', '=', $id)
            ->orderBy('business.companyname')
            ->get();
        }

    // list of business - Area

    // list of business - Facility

        public static function APICategoryBusinessListFeature($id, $feature)
        {
            return  DB::table('business')
            ->select('business.registerId', 'business.companyname', 'business.companynameArb', 'business.companylocation', 'business.companylocationArb', 'business.lat', 'business.lng', 'business.profile_image', 'business.background_image')
            ->Where('business.companylocation', 'like', '%' . $feature . '%')
            ->Where('business.companycategory', '=', $id)
            ->orderBy('business.companyname')
            ->get();
        }

    // list of business - Facility

    // list of business - Searching

        public static function APICategoryBusinessListSearching($id, $business)
        {
            return  DB::table('business')
            ->select('business.registerId', 'business.companyname', 'business.companynameArb', 'business.companylocation', 'business.companylocationArb', 'business.lat', 'business.lng', 'business.profile_image', 'business.background_image')
            ->orWhere('business.companyname', 'like', '%' . $business . '%')
            ->orWhere('business.companynameArb', 'like', '%' . $business . '%')
            ->orWhere('business.companydescription', 'like', '%' . $business . '%')
            ->orWhere('business.companydescriptionArb', 'like', '%' . $business . '%')
            ->orWhere('business.companylocation', 'like', '%' . $business . '%')
            ->orWhere('business.companylocationArb', 'like', '%' . $business . '%')
            ->orWhere('business.companyphone', 'like', '%' . $business . '%')
            ->orWhere('business.company_tagline', 'like', '%' . $business . '%')
            ->orWhere('business.company_taglineArb', 'like', '%' . $business . '%')
            ->orWhere('business.company_website', 'like', '%' . $business . '%')
            ->Where('business.companycategory', '=', $id)
            ->orderBy('business.companyname')
            ->get();
        }

    // list of business - Searching

    // Single List Business

        public static function APIFindBusiness($id)
        {
            $business =  DB::table('business')
            ->select('business.registerId', 'business.companyname', 'business.companynameArb', 'business.companydescription', 'business.companydescriptionArb', 'business.companycategory', 'business.companylocation', 'business.companylocationArb', 'business.lat', 'business.lng', 'business.company_tagline', 'business.company_taglineArb', 'business.companyphone', 'business.company_website', 'business.company_email', 'business.profile_image', 'business.background_image')
            ->Where('business.registerId', '=', $id)
            ->orderBy('created_at')
            ->get();
            $facilities = DB::table('facilities')
            ->select('facilities.carparking', 'facilities.wifi', 'facilities.prayerroom', 'facilities.wheelchair', 'facilities.creditcard', 'facilities.alltimeservice')
            ->Where('facilities.registerid', '=', $id)
            ->get();
            $socialmedia = DB::table('socialmedia')
            ->select('socialmedia.FaceBook', 'socialmedia.Instagram', 'socialmedia.Linked', 'socialmedia.Twitter', 'socialmedia.Youtube')
            ->Where('socialmedia.RegisterId', '=', $id)
            ->get();
            $working = DB::table('workinghours')
            ->select('workinghours.Monday', 'workinghours.Tuesday', 'workinghours.Wednesday', 'workinghours.Thursday', 'workinghours.Friday', 'workinghours.Saturday', 'workinghours.Sunday')
            ->Where('workinghours.RegisterId', '=', $id)
            ->get();
            $review = DB::table('review')
            ->select('review.name', 'review.email', 'review.message', 'review.rate')
            ->Where('review.businessid', '=', $id)
            ->get();
            $offers = DB::table('offers')
            ->select('offers.companyid','offers.headingEn', 'offers.headingArb', 'offers.descriptionEn', 'offers.descriptionArb', 'offers.image', 'offers.startdate', 'offers.enddate')
            ->where('offers.companyid', '=', $id)
            ->get();
            return $result = [
                'business' => $business ,
                'facilities' => $facilities,
                'socialmedia' => $socialmedia,
                'working' => $working,
                'offers' => $offers,
                'review' => $review
            ];

        }

        public static function APIFindRelateBusiness($businessid, $id)
        {
             $businessid;
             return  DB::table('business')
            ->select('business.registerId', 'business.companyname', 'business.companynameArb', 'business.companydescription', 'business.companydescriptionArb', 'business.companycategory', 'business.companylocation', 'business.companylocationArb', 'business.lat', 'business.lng', 'business.company_tagline', 'business.company_taglineArb', 'business.companyphone', 'business.company_website', 'business.company_email', 'business.profile_image', 'business.background_image')
            ->orWhere('business.companycategory', '=', $businessid)
            ->Where('business.registerId', '!=', $id)
            ->orderByDesc('business.companyname')
            ->limit(5)
            ->get();
        }

    // Single List Business

    
    // list of business - User

        public static function UserBusinesslist($registerid)
        {
            return  DB::table('business')
            ->select('business.registerId', 'business.companyname', 'business.companynameArb', 'business.companylocation', 'business.companylocationArb', 'business.lat', 'business.lng', 'business.profile_image', 'business.background_image')
            ->Where('business.userId', '=', $registerid)
            ->orderBy('business.companyname')
            ->get();
        }
            
    // list of business - User


    // 

    public function scopeFindCategoryBusiness($query,$id,$request){

        $query->where('CompanyCategory', '=', $id)->get();
        $feature_first = true;
        if($request->filled('rating')){
            $query->whereRaw('(SELECT AVG(rate) FROM review WHERE businessid=business.registerid )='.$request->rating);
        }
        
        $filter_vals = [];
        $filter_iterator = 0;

        foreach($request->keys() as $key=>$val){
            if(strpos($val,'features') && $val != 'id' && $val != 'sort' && $val!='search' && !strpos($val,'area')){
                $filter_vals[$filter_iterator] = $request->get($val);
                $filter_iterator++;
            }
        }
        
        if(count($filter_vals)>0){
            $query->whereIn('location',$filter_vals);
        }


        foreach($request->keys() as $key=>$val){
            if(strpos($val,'area') && $val != 'id' && $val != 'sort' && $val!='search' && !strpos($val,'features')){
                $query->orderByRaw('FIELD(location, '.$request->get($val).') DESC');
            }
        }
        if($request->filled('sort')){
            switch($request->sort){
                case 'name':
                    $query->orderBy('companyname');
                    break;
                case 'rating':
                    $query->orderByRaw('(SELECT AVG(rate) FROM review WHERE businessid=business.registerid ) DESC');
                    break;
                case 'popularity':
                    $query->orderBy('view','desc');
                    break;
                case 'distance':
                    $query->orderByRaw('ABS(lat-'.$request->lat.') + ABS(lng - '.$request->lng.')');
                    break;
                default:
                    $query->orderBy('created_at');
            }
        }
        if($request->search != "" && !empty($request->search)){
            $ids = $query->pluck('id');
           $results = $query->where(function($qu) use ($request){
                return $qu->where('companyname', 'like', '%' . $request->search . '%')
                ->orWhere('companynameArb', 'like', '%' . $request->search . '%')
                ->orWhere('companydescription', 'like', '%' . $request->search . '%')
                ->orWhere('companydescriptionArb', 'like', '%' . $request->search . '%')
                ->orWhere('companylocation', 'like', '%' . $request->search . '%')
                ->orWhere('companylocationArb', 'like', '%' . $request->search . '%')
                ->orWhere('companyphone', 'like', '%' . $request->search . '%')
                ->orWhere('company_tagline', 'like', '%' . $request->search . '%')
                ->orWhere('company_taglineArb', 'like', '%' . $request->search . '%')
                ->orWhere('company_website', 'like', '%' . $request->search . '%');
            })->get()->toArray();
           $temp = [];
           $i=0;
           foreach($results as $result){
               foreach($ids as $id){
                   if($id == $result['id']){
                       $temp[$i] = $result;
                       $i++;
                   }
               }
           }
           return $temp;
        }
        return $query->get();
    }


    // 

    // 
    public function reviews(){
        return $this->hasMany('App\Models\Review','businessid','registerid');
}

public static function FindBusiness($id)
    {
        $business =  DB::table('business')
        ->select('business.registerId', 'business.companyname', 'business.companynameArb', 'business.companydescription', 'business.companydescriptionArb', 'business.companycategory', 'business.companylocation', 'business.companylocationArb', 'business.lat', 'business.lng', 'business.company_tagline', 'business.company_taglineArb', 'business.companyphone', 'business.company_website', 'business.company_email', 'business.profile_image', 'business.background_image')
        ->Where('business.registerId', '=', $id)
        ->orderBy('created_at')
        ->get();
        $facilities = DB::table('facilities')
        ->select('facilities.carparking', 'facilities.wifi', 'facilities.prayerroom', 'facilities.wheelchair', 'facilities.creditcard', 'facilities.alltimeservice')
        ->Where('facilities.registerid', '=', $id)
        ->get();
        $socialmedia = DB::table('socialmedia')
        ->select('socialmedia.FaceBook', 'socialmedia.Instagram', 'socialmedia.Linked', 'socialmedia.Twitter', 'socialmedia.Youtube')
        ->Where('socialmedia.RegisterId', '=', $id)
        ->get();
        $working = DB::table('workinghours')
        ->select('workinghours.Monday', 'workinghours.Tuesday', 'workinghours.Wednesday', 'workinghours.Thursday', 'workinghours.Friday', 'workinghours.Saturday', 'workinghours.Sunday')
        ->Where('workinghours.RegisterId', '=', $id)
        ->get();
        $review = DB::table('review')
        ->select('review.name', 'review.email', 'review.message', 'review.rate')
        ->Where('review.businessid', '=', $id)
        ->get();
        $offers = DB::table('offers')
        ->select('offers.companyid','offers.headingEn', 'offers.headingArb', 'offers.descriptionEn', 'offers.descriptionArb', 'offers.image', 'offers.startdate', 'offers.enddate')
        ->where('offers.companyid', '=', $id)
        ->get();
        return $result = [
            'business' => $business ,
            'facilities' => $facilities,
            'socialmedia' => $socialmedia,
            'working' => $working,
            'offers' => $offers,
            'review' => $review
          ];

    }
    
    public static function FindRelateBusiness($businessid, $id)
    {
         $businessid;
         return  DB::table('business')
        ->select('business.registerId', 'business.companyname', 'business.companynameArb', 'business.companydescription', 'business.companydescriptionArb', 'business.companycategory', 'business.companylocation', 'business.companylocationArb', 'business.lat', 'business.lng', 'business.company_tagline', 'business.company_taglineArb', 'business.companyphone', 'business.company_website', 'business.company_email', 'business.profile_image', 'business.background_image')
        ->orWhere('business.companycategory', '=', $businessid)
        ->Where('business.registerId', '!=', $id)
        ->orderByDesc('business.companyname')
        ->limit(5)
        ->get();
    }

    // 

// Mobile APP API

// Website

}
