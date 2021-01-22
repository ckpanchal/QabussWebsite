<?php

namespace App\Http\Controllers\Api;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Category;
use Business;
use Slider;
use Events;
use Offers;
use OfferTag;
use OfferTags;
use Facilities;
use Review;
use Socialmedia;
use Time;
use Workinghour;
use News;
use NewsAuthor;
use NewsCategory;
use App\Models\Recommend;
use Location;
use Favourite;
use App\Models\Qatar;
use App\Models\Page;
use App\Models\FcmToken;

class MainController extends Controller
{
// Mobile APP Api


    // Home Screen

        public function getAppHome(Request $request)
        {
            $userid = $request->userid;
            $count = 0;
            $Recommend = [];
            if($userid)
            {
                    $Recommend = Recommend::where('user_id', $userid)->get();
                foreach ($Recommend as $dataVal){
                    $category[] = [$dataVal->category_id];
                    $val = count($category);
                    while($count < $val){
                            $query=Business::where('companycategory', $category[$count]);
                        if($request!=null && $request->filled('lat') && $request->filled('lng')){
                            $query->orderByRaw('ABS(lat-'.$request->lat.') + ABS(lng - '.$request->lng.')');
                        }
                        $Recommend[$count] = $query->get();
                        $count++;
                    }
                }
            }
            else {
                $category = $request->category;
                $val = count($category);
                while($count < $val){
                    $query=Business::where('companycategory', $category[$count]);
                    if($request!=null && $request->filled('lat') && $request->filled('lng')){
                        $query->orderByRaw('ABS(lat-'.$request->lat.') + ABS(lng - '.$request->lng.')');
                    }
                    $Recommend[$count] = $query->get();
                    $count++;
                }
            }
            
            $day = date("Y-m-d");
            $Slider = Slider::all();
            $Search = Business::SearchDetail();
            $Category = Category::where('parent', 0)->get();
            $Busines = Business::NewlyAdded($request);
            $Offers = Offers::NewlyAddedOffers($day,$request);
            $Events = Events::NewlyAddedEvent($day,$request);
            $Featured = Business::FeaturedBusiness($request);
            $FeaturedPlaces = Business::FeaturedPlaces($request);

            $json['Slider'] = $Slider;
            $json['Category'] = $Category;
            $json['Recommend'] = $Recommend;
            $json['NewlyBusines'] = $Busines;
            $json['Offers'] = $Offers;
            $json['Events'] = $Events;
            $json['Featured'] = $Featured;
            $json['FeaturedPlace'] = $Featured;
            $json['response'] = 1;
            $json['message'] = "success";
            return response()->json($json);
        }

    // Home Screen

    // Home Searching

        public function getSearchDetails(Request $request)
        {
            $search = $request->search;
            $day = date("Y-m-d");
            $count = 0;
            $dataOffer = array();

            $Business = Business::SearchDetails($search);
            $Events = Events::SearchDetails($search, $day);
            $Offers = Offers::SearchDetails($search, $day);
            $News = News::SearchDetails($search);
            $json['Business'] = $Business;
            $json['Events'] = $Events;
            $json['Offers'] = $Offers;
            $json['News'] = $News;
            $json['response'] = 1;
            $json['message'] = "success";
            return response()->json($json);
        }

    // Home Searching

    // All categories

        public function SelectCategory()
        {
            $maincategory = Category::APISelectCategory();
            $subcategory = Category::APISelectsubCategory();
            $json['maincategory'] = $maincategory;
            $json['subcategory'] = $subcategory;
            $json['response'] = 1;
            $json['message'] = "success";
            return response()->json($json);
        }

    // All categories

    // list of MAIN category

        public function getAppMainCategory()
        {
            $data = Category::APIFindMainCategory();
            $json['data'] = $data;
            $json['response'] = 1;
            $json['message'] = "success";
            return response()->json($json);
        }

    // list of sub category

    // list of SUB category

        public function getAppCategory()
        {
            $data = Category::FindSubCategory();
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
        
    // list of SUB category

    // list of sub category - searching category

        public function searchByKeyword($id)
        {
            $data = Category::APIFindSearch($id);
            $json['data'] = $data;
            $json['response'] = 1;
            $json['message'] = "success";
            return response()->json($json);
        }

    // list of sub category - searching category

    // list of business - Distance

        public function getbusinessdistance($id, $lat, $lng)
        {
            $BusinessLists = Business::APIFindCategoryroutes($id, $lat, $lng);
            $json['business'] = $BusinessLists;
            $json['response'] = 1;
            $json['message'] = "success";
            return response()->json($json);
        }

    // list of business - Distance

    // list of business - Ascending

        public function CategoryBusinessListAsc($id)
        {
            $BusinessLists = Business::APICategoryBusinessListAsc($id);
            $json['business'] = $BusinessLists;
            $json['response'] = 1;
            $json['message'] = "success";
            return response()->json($json);
        }

    // list of business - Ascending

    // list of business - Area

        public function CategoryBusinessListArea($id, $area)
        {
            $BusinessLists = Business::APICategoryBusinessListArea($id, $area);
            $json['business'] = $BusinessLists;
            $json['response'] = 1;
            $json['message'] = "success";
            return response()->json($json);
        }

    // list of business - Area

    // list of business - Area

        public function CategoryBusinessListAreaPost($id, Request $request)
        {
            $area = $request->area;
            $count = 1;
            $val = count($area);
            $BusinessLists = array();
            while($count < $val){
                return $list = Business::where('location', $request->area[$count])->get();
                for ($i=0; $i < count($list) ; $i++) {
                    array_push($BusinessLists, $list[$i]);
                }
                $count++;
            }
            $json['business'] = $BusinessLists;
            $json['response'] = 1;
            $json['message'] = "success";
            return response()->json($json);
        }

    // list of business - Area

    // list of business - Facility

        public function CategoryBusinessListFeature($id, $feature)
        {
            $BusinessLists = Business::APICategoryBusinessListFeature($id, $feature);
            $json['business'] = $BusinessLists;
            $json['response'] = 1;
            $json['message'] = "success";
            return response()->json($json);
        }
    
    // list of business - Facility
    
    // list of business - Searching
    
        public function CategoryBusinessListSearch($id, $business)
        {
            $BusinessLists = Business::APICategoryBusinessListSearching($id, $business);
            $json['business'] = $BusinessLists;
            $json['response'] = 1;
            $json['message'] = "success";
            return response()->json($json);
        }

    // list of business - Searching

    // list of Locations

        public function location()
        {
            try{
                $data = Location::select('id','locationEn','locationArb')->get();
                return response()->json($data,200);
            }catch(\Exception $ex){
                return response()->json($ex->getMessage(),500);
            }
        }
        
    // list of Locations

    // list of Facilities

        public function facility()
        {
            $data = Facilities::all();
            $json['data'] = $data;
            $json['response'] = 1;
            $json['message'] = "success";
            return response()->json($json);
        }

    // list of Facilities


    // Single List Business

        public function getBusiness($id, Request $request)
        {
            $userId = $request->userId;
            $data = Business::APIFindBusiness($id);
            $favourite = Favourite::APISearchFavourite($id, $userId);
            $val = 0;
            foreach ($data['business'] as $dataVal){
                $businessid = [$dataVal->companycategory];
                $relate= Business::APIFindRelateBusiness($businessid, $id);
            }
            foreach ($data['working'] as $date){
                // $timer= Business::working($date);
                // $day = [$date->monday];
                $Monday = $date->Monday;
                $Tuesday = $date->Tuesday;
                $Wednesday = $date->Wednesday;
                $Thursday = $date->Thursday;
                $Friday = $date->Friday;
                $Saturday = $date->Saturday;
                $Sunday = $date->Sunday;
                $day = date("l");

                $time = strtotime(date("h:i A"));
                if($day == "Monday" && $Monday != "24 Hours"){
                    $timeer = (explode(" - ", $date->Monday));
                    $start = strtotime($timeer[0]) ;
                    $end = strtotime($timeer[1]) ;
                    if($start <= $time && $time <= $end)
                        {
                            $timer = "Open Now";
                        }
                        else
                        {
                            $timer = "Close";
                        }
                }
                elseif ($day == "Tuesday" && $Tuesday != "24 Hours") {
                    $timeer = (explode(" - ", $date->Tuesday));
                    $start = strtotime($timeer[0]) ;
                    $end = strtotime($timeer[1]) ;
                    if($start <= $time && $time <= $end)
                        {
                            $timer = "Open Now";
                        }
                        else
                        {
                            $timer = "Close";
                        }
                }
                elseif ($day == "Wednesday" && $Wednesday != "24 Hours") {
                    $timeer = (explode(" - ", $date->Wednesday));
                    $start = strtotime($timeer[0]) ;
                    $end = strtotime($timeer[1]) ;
                    if($start <= $time && $time <= $end)
                        {
                            $timer = "Open Now";
                        }
                        else
                        {
                            $timer = "Close";
                        }
                }
                elseif ($day == "Thursday" && $Thursday != "24 Hours") {
                    $timeer = (explode(" - ", $date->Thursday));
                    $start = strtotime($timeer[0]) ;
                    $end = strtotime($timeer[1]) ;
                    if($start <= $time && $time <= $end)
                        {
                            $timer = "Open Now";
                        }
                        else
                        {
                            $timer = "Close";
                        }
                }
                elseif ($day == "Friday" && $Friday != "24 Hours") {
                    $timeer = (explode(" - ", $date->Friday));
                    $start = strtotime($timeer[0]) ;
                    $end = strtotime($timeer[1]) ;
                    if($start <= $time && $time <= $end)
                        {
                            $timer = "Open Now";
                        }
                        else
                        {
                            $timer = "Close";
                        }
                }
                elseif ($day == "Saturday" && $Saturday != "24 Hours") {

                    $timeer = (explode(" - ", $date->Saturday));
                    $start = strtotime($timeer[0]) ;
                    $end = strtotime($timeer[1]) ;
                    if($start <= $time && $time <= $end)
                        {
                            $timer = "Open Now";
                        }
                        else
                        {
                            $timer = "Close";
                        }
                }
                elseif ($day == "Sunday" && $Sunday != "24 Hours") {
                    $timeer = (explode(" - ", $date->Sunday));
                    $start = strtotime($timeer[0]) ;
                    $end = strtotime($timeer[1]) ;
                    if($start <= $time && $time <= $end)
                        {
                            $timer = "Open Now";
                        }
                        else
                        {
                            $timer = "Close";
                        }
            }
                else{
                    $timer = "Open Now";
                }
            }
            $json = $data;
            $json['time'] = $timer;
            $json['relate'] = $relate;
            $json['favourite'] = $favourite;
            $json['response'] = 1;
            $json['message'] = "success";
            return response()->json($json);
        }
    // Single List Business
   
    // List Of Offers 

       public function getOffers(Request $request)
       {
           try {
               $day = date("Y-m-d");
               $Offers = Offers::APIfilterOffers($request,$day);
               $Offerstag = OfferTag::offerTags()->get();
               $json['Offers'] = $Offers;
               $json['Offerstag'] = $Offerstag;
               return response()->json($json,200);
           }
           catch (\Exception $ex){
               return response()->json($ex->getMessage(),500);
           }
       }

        public function getTagOffers(Request $request)
        {
            $search = $request->search;
            $id = $request->id;
            // Sort Both
            if($search && $id)
            {
                $Offers = Offers::getOfferSort($id, $search);
            }
            // Sort Category Id
            elseif($id){
                $Offers = Offers::getOfferidSort($id);
            }
            // Sort Search word
            else{
                $Offers = Offers::getOffersearchSort($search);
            }
            if(count($Offers))
            {
                $json['Offers'] = $Offers;
                $json['response'] = 1;
                $json['message'] = "success";
                return response()->json($json);
            }
            else{
                $json['Offers'] = 0;
                $json['response'] = 0;
                $json['message'] = "Error";
                return response()->json($json);
            }
        }

    // List Of Offers 

    // Event

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

    // Event
    

    // News Tab(list of news and category)

        public function getAppNews(\Illuminate\Http\Request $request)
        {
            try{
                $data = News::FindNews($request);
                return response()->json($data,200);
            }catch(Exception $ex){
                return response()->json($ex->getMessage(),500);
            }
        }

    // News Tab(list of news and category)

    // News Sort(Searching and Category)

        public function getAppNewsSort(Request $request)
        {
            $id = $request->id;
            $search = $request->search;
            if ($id && $search) {
                $data = News::FindNewsSort($id, $search);
            }
            elseif($id) {
                $data = News::FindNewsSortId($id);
            }
            else {
                $data = News::FindNewsSortSearch($search);
            }

            if(count($data))
            {
                $json['news'] = $data;
                $json['response'] = 1;
                $json['message'] = "success";
                return response()->json($json);
            }
            else{
                $json['news'] = 0;
                $json['response'] = 0;
                $json['message'] = "Error";
                return response()->json($json);
            }

        }
    // News Sort(Searching and Category)

    // Single News

        public function getAppSingleNews($id)
        {
            try{
                $data = News::getSingleNews($id);
                $relate= News::relatedNews($data->category, $id);
                return response()->json([
                    'news'=>$data,
                    'relate'=>$relate
                ],200);
            }
            catch(Exception $ex){
                return response()->json($ex->getMessage(),500);
            }
        }

    // Single News

    // News Category

        public function getAppNewsCategories()
        {
            try {
                $data = NewsCategory::parentCategories()->get();
                return response()->json($data,200);
            }catch(Exception $ex){
                return response()->json($ex->getMessage(),500);
            }
        }

    // News Category

    // 

        public function getAppselectCategories($RegisterId)
        {
            // $data = NewsCategory::FindSelectNewsCategory($RegisterId);
            $news = News::FindSelectCategoryNews($RegisterId);

            $json['data'] = $news;
            $json['response'] = 1;
            $json['message'] = "success";
            return response()->json($json);


        }
        
    // 

    // About Qatar

        public function getAppQatar()
        {
            $data = Qatar::all();
            $json['data'] = $data;
            $json['response'] = 1;
            $json['message'] = "success";
            return response()->json($json);
        }

    // About Qatar

    // Pages

        public function getAppPage($id)
        {
            $data = Page::where('RegisterId', $id)->first();
            $json['data'] = $data;
            $json['response'] = 1;
            $json['message'] = "success";
            return response()->json($json);
        } 
        
    // Pages
    
    // Favorite remove
        public function getAppSaveDeleteBusiness($RegisterId, $Favorite)
        {
            $user = Favourite::where('userId', $RegisterId)->where('businessId',$Favorite)->first();
            if($user)
            {
                $user->delete();
                $json['response'] = 1;
                $json['message'] = "success";
                return response()->json($json);
            }
            else{
                $data = Favourite::create([
                    'userId' => $RegisterId,
                    'businessId' => $Favorite,
                ]);
                $json['data'] = $data;
                $json['response'] = 1;
                $json['message'] = "success";
                return response()->json($json);
            }

        }
    // Favorite remove




    // User Register

        public function RegisterUser(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6'],
            ],[
                'name.required'=>"Please provide a valid name",
                'email.required'=>"Please provide a valid email",
                'password.required'=>"Please provide a valid password",
                'email.unique'=>"Email is already registered",
            ]);
            if($validator->fails()){
                foreach ($validator->errors()->toArray() as $err){
                    $json['data'] = 0;
                    $json['response'] = 0;
                    $json['message'] = $err[0];
                    return response()->json($json, 500);
                }
            }
            $email = $request->email;
            $category = $request->category;
            $count = 0;
            $emails = [];
            $registerid = "QZBL" . rand(999, 9999999);
            $register = User::where('registerid', $registerid)->first();
            $emails['emails'] = User::where('email', $email)->first();


            if(!$emails['emails'] && !$register)
            {
                $val = count($category);

                while($count < $val){
                    $Recommend = Recommend::create([
                    'user_id' => $registerid,
                    'category_id' => $request->category[$count],
                ]);
                $count++;

            }
                $data = User::create([
                    'registerid' => $registerid,
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    // 'phone' => $request->phone,
                    'image' => "/image/user_dp/image/user.jpg",
                    'limit' => "3",
                    'type' => "user",
                ]);

                $recomend =
                $data = $data;
                $Recommend = Recommend::Recommendlist($registerid);

                $json['data'] = $data;
                $json['Recommend'] = $Recommend;
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

    // User Register

    // User Login
        public function LoginUser(Request $request)
        {

            $validator =  Validator::make($request->all(), [
                'email' => ['required', 'string', 'email'],
                'password' => ['required', 'string', 'min:6'],
            ],[
                'email.required'=>"Please provide a valid email",
                'password.required'=>"Please provide a valid password",
            ]);
            if($validator->fails()){
                foreach ($validator->errors()->toArray() as $err){
                    $json['data'] = 0;
                    $json['response'] = 0;
                    $json['message'] = $err[0];
                    return response()->json($json, 500);
                }
            }

            $username = $request->email;
            $password = $request->password;

            if (Auth::attempt(array('email' => $username, 'password' => $password))){
                $user = Auth::user();
                $userId = $user->registerid;
                $category = Recommend::where('user_id', [$user->registerid])->get();
                $Favourite = Favourite::where('userId', [$user->registerid])->get();
                $val = count($Favourite);
                $count = 0;

                if($val != "0"){
                    foreach ($Favourite as $dataVal){
                                $Business[$count] = Business::where('registerId', [$dataVal->businessId])->get();
                                $count++;
                        }
                }

                else{
                    $Business =$Favourite;
                }

                // $Business = Business::FindUserBusiness($userId);
                $json['data'] = $user;
                $json['category'] = $category;
                $json['Favourite'] = $Business;
                $json['response'] = 1;
                $json['message'] = "success";
                return response()->json($json);
                
            }
            else {
                $json['data'] = [];
                $json['response'] = 0;
                $json['message'] = "Username or password not valid";
                return response()->json($json);
            }
        }
    // User Login


    // forgot password
        public function forgotpass(Request $request)
        {
            $email = $request->email;
            $code = Str::random(25);
            $user = User::where('email', $email)->first();

            if($user)
            {
                $data = Reminder::create([
                    'user_id' => $user->registerid,
                    'code' => $code,
                ]);
                Mail::send(['text'=>'emails.forgot_password'], ['name'=>$user->name,'code'=>$code], function($message)use ($user,$code) {
                    $message->to($user->email, 'New Password for your Qabuss App ')->subject
                    ('Reset Password Request');
                    $message->from('test@qabuss.com','Qabuss');
                });
                $json['data'] = $data;
                $json['response'] = 1;
                $json['message'] = "success";
                return response()->json($json);
            }
            $json['data'] = [];
            $json['response'] = 0;
            $json['message'] = "Error";
            return response()->json($json);


        }
    // forgot password

    // Update User Profile

        public function UpdateUserProfile($id, Request $request)
        {
            $user = User::where('registerid', $id)->first();

            if($user){
                $image = $request->file('image');
                if($image)
                {
                    $filename = $id.".png";
                    $image = $request->file('image');
                    $main_image_src = '/image/user_dp/'.$filename;
                    $imagepath = public_path('/image/user_dp/');
                    $image->move($imagepath, $main_image_src);
                    //   $val = response()->json(['url' => $main_image_src], 200);
                    $updateduser = User::where('registerid', $id)->update([
                    'image' => $main_image_src
                ]);

                if($updateduser){
                    $json['data'] = $updateduser;
                    $json['response'] = 1;
                    $json['message'] = "success";
                    return response()->json($json);
                }else{
                    $json['data'] = [];
                    $json['response'] = 0;
                    $json['message'] = "error";
                    return response()->json($json);
                }

                }
                else {
                    $updateduser = User::where('registerid', $id)->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'phone' => $request->phone,

                    ]);
                    if($updateduser){
                        $json['data'] = $updateduser;
                        $json['response'] = 1;
                        $json['message'] = "success";
                        return response()->json($json);
                    }else{
                        $json['data'] = [];
                        $json['response'] = 0;
                        $json['message'] = "error";
                        return response()->json($json);
                    }
                }

            }else{
                $json['data'] = [];
                $json['response'] = 0;
                $json['message'] = "error";
                return response()->json($json);
            }
        }
    // Update User Profile

    // User Password Update

        public function UserPasswordUpdate($registerid, Request $request)
        {
            $obj_user = User::where('registerid', $registerid)->first();
            $username = $obj_user->email;
            $oldpassword = $request->oldpassword;
            $oldpassword = $request->oldpassword;
            $newpassword = $request->newpassword;
            // $confirmpass = $request->confirmpass;

            if (Auth::attempt(array('email' => $username, 'password' => $oldpassword))){
                $current_password = Auth::User()->oldpassword;
                $request_password = $request->oldpassword;
                $obj_user->password = Hash::make($request->newpassword);;
                $obj_user->save();
                $json['data'] = $obj_user;
                $json['response'] = 1;
                $json['message'] = "success";
                return response()->json($json);
            }else
            {
                $json['data'] = [];
                $json['response'] = 0;
                $json['message'] = "error";
                return response()->json($json);
            }


            // $oldpassword = $request->oldpassword;
            // $newpassword = $request->newpassword;
            // $confirmpass = $request->confirmpass;

            // if (Auth::attempt(array('registerid' => $id, 'password' => $oldpassword))){
            //     $user = Auth::user();
            //     $updateduser = User::where('registerid', $id)->update([
            //         'password' => Hash::make($request->password),

            //     ]);
            //     $json['data'] = $updateduser;
            //     $json['response'] = 1;
            //     $json['message'] = "success";
            //     return response()->json($json);
            // }
            // else {
            //     $json['data'] = [];
            //     $json['response'] = 0;
            //     $json['message'] = "error";
            //     return response()->json($json);
            // }
        }
    // User Password Update

    // User Dashboard

        public function UserDashboard($registerid)
        {
            $day = date("Y-m-d h:i:s");
            $User = User::where('registerid', $registerid)->get();
            $Recommend = Recommend::Recommendlist($registerid);
            $Business = Business::UserBusinesslist($registerid);
            $Offers = Offers::where('userId', $registerid)->get();

            $Favourite = Favourite::where('userId', $registerid)->pluck('businessId');

            $BusinessLists = array();
            foreach ($Favourite as $dataVal){
                $business = Business::where('registerId', $dataVal)->first();
                $business['time'] = "N/A";
                array_push($BusinessLists,$business);
            }
            $json['User'] = $User;
            $json['Recommend'] = $Recommend;
            $json['Business'] = $Business;
            $json['Offers'] = $Offers;
            $json['Favourite'] = $BusinessLists;
            $json['response'] = 1;
            $json['message'] = "success";

            return response()->json($json);

        }
    // User Dashboard

    // 
        public function Recommendbusiness($userId, Request $request)
        {
            $RecommendList = $request->recommend;
            $Recommend = Recommend::where('user_id', $userId)->get();
            $val = count($Recommend);
            $count = 0;
            $value = 0;
            $values = count($RecommendList);

            while($count < $val){
                $data = Recommend::where('user_id', $userId)->first();
                $data->delete();
                $count++;
            }

            while($value < $values){
                $RecommendedList = Recommend::create([
                'user_id' => $userId,
                'category_id' => $request->recommend[$value],
            ]);
            $value++;
        }
            $json['response'] = 1;
            $json['message'] = "success";
            return response()->json($json);
        }
    // 
    
    // Add Business

        public function Addbusiness($userId, Request $request)
        {
            $BusinessId = "QZBL" . rand(999, 9999999);
            $Business = Business::create([
                'registerId' => $BusinessId,
                'userId' => $userId,
                'companyname' => $request->CompanyName,
                'companynameArb' => $request->CompanyNameArb,
                'companydescription' => $request->CompanyDescription,
                'companydescriptionArb' => $request->CompanyDescriptionArb,
                'companycategory' => $request->CompanyCategory,
                'companylocation' => $request->CompanyLocation,
                'companylocationArb' => $request->CompanyLocationArb,
                'location' => $request->location,
                'lat' => $request->lat,
                'lng' => $request->lng,
                'companyphone' => $request->companyphone,
                'company_tagline' => $request->company_tagline,
                'company_taglineArb' => $request->company_taglineArb,
                'company_website' => $request->company_website,
                'company_email' => $request->company_email,
                'approve' => "0",
                'view' => "0",
                'featured' => "0",
                'area' => $request->area,

                $image = $request->file('profileimage'),
                $main_image_src = '/image/company_dp/'.$BusinessId. ".png",
                $imagepath = public_path('/image/company_dp/'),
                $image->move($imagepath, $main_image_src),
                'profile_image' => $main_image_src,

                $backimage = $request->file('backgroundimage'),
                $main_backimage_src = '/image/company_back/'.$BusinessId. ".png",
                $backimagepath = public_path('/image/company_back/'),
                $backimage->move($backimagepath, $main_backimage_src),
                'background_image' => $main_backimage_src,

            ]);
            $facilities = Facilities::create([
                'userId' => $userId,
                'registerid' => $BusinessId,
                'carparking' => $request->CarParking,
                'wifi' => $request->Wifi,
                'prayerroom' => $request->PrayerRoom,
                'wheelchair' => $request->Wheelchair,
                'creditcard' => $request->CreditCard,
                'alltimeservice' => $request->AlltimeService,
            ]);
            $workinghours = Workinghours::create([
                'registerid' => $BusinessId,
                'userid' => $userId,
                'monday' => $request->monday,
                'tuesday' => $request->tuesday,
                'wednesday' => $request->wednesday,
                'thursday' => $request->thursday,
                'friday' => $request->friday,
                'saturday' => $request->saturday,
                'sunday' => $request->sunday,
            ]);
            $Socialmedia = Socialmedia::create([
                'RegisterId' => $BusinessId,
                'UserId' => $userId,
                'FaceBook' => $request->facebook,
                'Instagram' => $request->instagram,
                'Linked' => $request->linked,
                'Twitter' => $request->twitter,
                'Youtube' => $request->youtube,
            ]);
            $json['Business'] = $Business;
            $json['facilities'] = $facilities;
            $json['workinghours'] = $workinghours;
            $json['Socialmedia'] = $Socialmedia;
            $json['response'] = 1;
            $json['message'] = "success";
            return response()->json($json);
        }
    // Add Business
    
    // Edit Business

        public function Editbusiness($userId, Request $request)
        {
            $BusinessId = $request->CompanyId;
            $profileimage = $request->file('profileimage');
            $backgroundimage = $request->file('backgroundimage');

            if($profileimage)
            {
                $image = $request->file('profileimage');
                $main_image_src = '/image/company_dp/'.$BusinessId. ".png";
                $imagepath = public_path('/image/company_dp/');
                $image->move($imagepath, $main_image_src);
                $updatedbackgroundimage = Business::where('registerId', $BusinessId)->update([
                    'profile_image' => $main_image_src,
                ]);
            }

            if($backgroundimage)
            {
                $backimage = $request->file('backgroundimage');
                $main_backimage_src = '/image/company_back/'.$BusinessId. ".png";
                $backimagepath = public_path('/image/company_back/');
                $backimage->move($backimagepath, $main_backimage_src);
                $updatedbackgroundimage = Business::where('registerId', $BusinessId)->update([
                    'background_image' => $main_backimage_src,
                ]);

            }

                $updatedBusiness = Business::where('registerId', $BusinessId)->update([
                    'companyname' => $request->CompanyName,
                    'companynameArb' => $request->CompanyNameArb,
                    'companydescription' => $request->CompanyDescription,
                    'companydescriptionArb' => $request->CompanyDescriptionArb,
                    'companycategory' => $request->CompanyCategory,
                    'companylocation' => $request->CompanyLocation,
                    'companylocationArb' => $request->CompanyLocationArb,
                    'location' => $request->location,
                    'lat' => $request->lat,
                    'lng' => $request->lng,
                    'companyphone' => $request->companyphone,
                    'company_tagline' => $request->company_tagline,
                    'company_taglineArb' => $request->company_taglineArb,
                    'company_website' => $request->company_website,
                    'company_email' => $request->company_email,
                    'area' => $request->area,
                ]);


                $updatedfacilities = facilities::where('registerId', $BusinessId)->update([
                    'carparking' => $request->CarParking,
                    'wifi' => $request->Wifi,
                    'prayerroom' => $request->PrayerRoom,
                    'wheelchair' => $request->Wheelchair,
                    'creditcard' => $request->CreditCard,
                    'alltimeservice' => $request->AlltimeService,
                ]);

                $updatedWorkinghours = Workinghours::where('registerId', $BusinessId)->update([
                    'monday' => $request->monday,
                    'tuesday' => $request->tuesday,
                    'wednesday' => $request->wednesday,
                    'thursday' => $request->thursday,
                    'friday' => $request->friday,
                    'saturday' => $request->saturday,
                    'sunday' => $request->sunday,
                ]);

                $updatedSocialmedia = Socialmedia::where('registerId', $BusinessId)->update([
                    'FaceBook' => $request->facebook,
                    'Instagram' => $request->instagram,
                    'Linked' => $request->linked,
                    'Twitter' => $request->twitter,
                    'Youtube' => $request->youtube,
                ]);
                $json['data'] = $updatedBusiness;
                $json['updatedfacilities'] = $updatedfacilities;
                $json['updatedWorkinghours'] = $updatedWorkinghours;
                $json['updatedSocialmedia'] = $updatedSocialmedia;
                $json['response'] = 1;
                $json['message'] = "success";
                return response()->json($json);
        }
    // Edit Business

    // Delete Business

        public function Deletebusiness($userId, $CompanyId)
        {
            $Business = Business::where('userId', $userId)->where('registerId', $CompanyId)->first();
            $facilities = facilities::where('userId', $userId)->where('registerid', $CompanyId)->first();
            $Workinghours = Workinghours::where('userid', $userId)->where('registerid', $CompanyId)->first();
            $Socialmedia = Socialmedia::where('UserId', $userId)->where('RegisterId', $CompanyId)->first();
            if($Business)
            {
                $Business->delete();
                $facilities->delete();
                $Workinghours->delete();
                $Socialmedia->delete();
                $json['response'] = 1;
                $json['message'] = "success";
                return response()->json($json);
            }

            else{
                $json['data'] = $Business;
                $json['response'] = 0;
                $json['message'] = "Error";
                return response()->json($json);

            }

        }
    // Delete Business


    //
        public function getMainCategories(){
            try{
                $categories = Category::subcategories();
                return response()->json($categories,200);
            }catch (\Exception $ex){
                return response()->json($ex->getMessage(),500);
            }
        } 
    //

    // 
        public function getSubCategories(Request $request){
            try{
                $categories = Category::select('name','id','nameArb','icon','color')->where('parent',$request->id);
                if($request->filled('search')){
                    $categories = $categories->where('name','LIKE','%'.$request->search.'%')->orWhere('nameArb','LIKE','%'.$request->search.'%');
                }
                return response()->json($categories->get(),200);
            }catch (\Exception $ex){
                return response()->json($ex->getMessage(),500);
            }
        }
    //  

    // 
        public function getCategoryBusinessList(Request $request)
        {

            try{
                $search = "";
                if($request->filled('search')){
                $search = $request->search;
                }
                $CategoryTag = [];
            // $business = Business::with(['reviews']);
                //select('business.registerId', 'business.companyname', 'business.companynameArb', 'business.companylocation', 'business.companylocationArb', 'business.companycategory', 'business.lat', 'business.lng', 'business.profile_image', 'business.background_image')
                $category = Category::where('id', $request->id)->get();
                $count_find = count($category);
                if($count_find)
                {
                    foreach ($category as $categoryVal){
                        $parent[] = [$categoryVal->id];
                        $val = count($parent);
                        $count = 0;
                        $category = array();
                        $CategoryTag = array();
                        while($count < $val){
                            $listBuss =Business::findCategoryBusiness($parent[$count],$request);
                            $categoryTag = Category::APICategoryTagList($parent[$count]);

                            for ($i=0; $i < count($listBuss) ; $i++) {

                                array_push($category, $listBuss[$i]);
                            }
                            for ($i=0; $i < count($categoryTag) ; $i++) {
                                array_push($CategoryTag, $categoryTag[$i]);
                            }

                            $count++;
                        }
                    }
                }
                else{
                    $category = Business::findCategoryBusiness($request->id,$request->search);
                    $CategoryTag = Category::CategoryTagList($request->id);
                }
                foreach($category as $b){
                    $working = DB::table('workinghours')
                        ->select('workinghours.Monday', 'workinghours.Tuesday', 'workinghours.Wednesday', 'workinghours.Thursday', 'workinghours.Friday', 'workinghours.Saturday', 'workinghours.Sunday')
                        ->Where('workinghours.RegisterId', '=', $b['registerId'])
                        ->get();
                    $timer = "";
                    foreach ($working as $date){
                        // $timer= Business::working($date);
                        // $day = [$date->monday];
                        $Monday = $date->Monday;
                        $Tuesday = $date->Tuesday;
                        $Wednesday = $date->Wednesday;
                        $Thursday = $date->Thursday;
                        $Friday = $date->Friday;
                        $Saturday = $date->Saturday;
                        $Sunday = $date->Sunday;
                        $day = date("l");

                        $time = strtotime(date("h:i A"));

                        if($day == "Monday" && $Monday != "24 Hours"){
                            $timeer = (explode(" - ", $date->Monday));
                            $start = strtotime($timeer[0]) ;
                            $end = strtotime($timeer[1]) ;
                            if($start <= $time && $time <= $end)
                            {
                                $timer = "Open Now";
                            }
                            else
                            {
                                $timer = "Close";
                            }
                        }
                        elseif ($day == "Tuesday" && $Tuesday != "24 Hours") {
                            $timeer = (explode(" - ", $date->Tuesday));
                            $start = strtotime($timeer[0]) ;
                            $end = strtotime($timeer[1]) ;
                            if($start <= $time && $time <= $end)
                            {
                                $timer = "Open Now";
                            }
                            else
                            {
                                $timer = "Close";
                            }
                        }
                        elseif ($day == "Wednesday" && $Wednesday != "24 Hours") {
                            $timeer = (explode(" - ", $date->Wednesday));

                            $start = strtotime($timeer[0]) ;
                            $end = strtotime($timeer[1]) ;

                            if($start <= $time && $time <= $end)
                            {
                                $timer = "Open Now";
                            }else
                            {
                                $timer = "Close";
                            }
                        }
                        elseif ($day == "Thursday" && $Thursday != "24 Hours") {
                            $timeer = (explode(" - ", $date->Thursday));
                            $start = strtotime($timeer[0]) ;
                            $end = strtotime($timeer[1]) ;
                            if($start <= $time && $time <= $end)
                            {
                                $timer = "Open Now";
                            }
                            else
                            {
                                $timer = "Close";
                            }
                        }
                        elseif ($day == "Friday" && $Friday != "24 Hours") {
                            $timeer = (explode(" - ", $date->Friday));
                            $start = strtotime($timeer[0]) ;
                            $end = strtotime($timeer[1]) ;
                            if($start <= $time && $time <= $end)
                            {
                                $timer = "Open Now";
                            }
                            else
                            {
                                $timer = "Close";
                            }
                        }
                        elseif ($day == "Saturday" && $Saturday != "24 Hours") {

                            $timeer = (explode(" - ", $date->Saturday));
                            $start = strtotime($timeer[0]) ;
                            $end = strtotime($timeer[1]) ;
                            if($start <= $time && $time <= $end)
                            {
                                $timer = "Open Now";
                            }
                            else
                            {
                                $timer = "Close";
                            }
                        }
                        elseif ($day == "Sunday" && $Sunday != "24 Hours") {
                            $timeer = (explode(" - ", $date->Sunday));
                            $start = strtotime($timeer[0]) ;
                            $end = strtotime($timeer[1]) ;
                            if($start <= $time && $time <= $end)
                            {
                                $timer = "Open Now";
                            }
                            else
                            {
                                $timer = "Close";
                            }
                        }
                        else{
                            $timer = "Open Now";
                        }

                    }
                    $b['time'] = $timer;
                }
                $json['business'] = $category;
                $json['categoryTag'] = $CategoryTag;

                return response()->json($json,200);
            }catch(\Exception $ex){
                return response()->json([$ex->getMessage(),$ex->getFile(),$ex->getLine()],500);
            }
        }
    // 

    // 
        public function addToken(Request $request){
            try{
                $token = FcmToken::where('token',$request->token)->get();
                if(count($token)<=0) {
                    FcmToken::create([
                        'token' => $request->token,
                        'fk_user' => NULL,
                    ]);
                }
                return response()->json('Token Created',200);
            }catch(\Exception $ex){
                return response()->json($ex->getMessage(),500);
            }
        }
    // 

    // 
    function increaseHit($type,$id){
        try{
            switch ($type){
                case 'event':
                    $event = Events::findOrFail($id);
                    $event->view = $event->view + 1;
                    $event->save();
                    break;
                case 'offers':
                    $offers = Offers::findOrFail($id);
                    $offers->view = $offers->view + 1;
                    $offers->save();
                    break;
                case 'news':
                    $news = News::where('registerid',$id)->first();
                    $news->view = $news->view + 1;
                    $news->save();
                    break;
                case 'business':
                    $business = Business::where('registerid',$id)->first();
                    if($business == null || empty($business)){
                        $business = Business::findOrFail($id);
                    }
                    $business->view = $business->view + 1;
                    $business->save();
                    break;
            }
            return response()->json('sucess');
        }catch (\Exception $ex){
            return response()->json($ex->getMessage());
        }
    }
    // 
    // Mobile APP Api

}
