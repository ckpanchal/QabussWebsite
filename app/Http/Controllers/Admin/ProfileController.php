<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

use User;
use Business;
use News;
use Offers;
use Events;
use Category;
use Location;
use Socialmedia;
use Workinghour;
use Facilities;
use Time;
use Auth;
use OfferTag;
use OfferTags;
use App\Models\Recommend;
use Favourite;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->registerid;
        $user = [];
        $user['user']  = User::where('registerid', $id)->first();
        $data = array(
            'business' => Business::where('userId', $id)->get(),
            'event' => Events::where('userId', $id)->get(),
            'offers' => Offers::where('userId', $id)->get(),
            'category' => Category::all(),
            'location' => Location::all(),
            'BusinessCount' => Business::where('userId', $id)->get()->count(),
            'EventCount' => Events::where('userId', $id)->get()->count(),
            'OffersCount' => Offers::where('userId', $id)->get()->count(),
        );

        return view('Admin.Profile.index', $user, $data);
        // return $count;
    }

    public function businessview($id)
    {
        $data = array(
            'business' => Business::where('userId', $id)->get(),
            'category' => Category::all(),
            'location' => Location::all(),
        );
        return view('Admin.Profile.ViewBusiness', $data);
        // return ($data);
    }
    
    public function businesssingle($id)
    {
        $data = array(
            'business' => Business::where('registerId', $id)->get(),
            'categorys' => Category::all(),
            'socialmedia' => Socialmedia::where('RegisterId', $id)->first(),
            'time' => Workinghour::where('RegisterId', $id)->first(),
            'facilities' => Facilities::where('RegisterId', $id)->first(),

        );
        return view('Admin.Profile.BusinessSingle', $data);
        // return ($data);
    }
    
    public function businessedit($id)
    {
        $data = array(
            'business' => Business::where('registerId', $id)->first(),
            'category' => Category::all(),
            'socialmedia' => Socialmedia::where('RegisterId', $id)->first(),
            'workinghour' => Workinghour::where('RegisterId', $id)->first(),
            'facilities' => Facilities::where('RegisterId', $id)->first(),
            'time' => Time::all(),
            'location' => Location::all(),

        );
        return view('Admin.Profile.EditBusiness', $data);
        // return ($data);
    }
    
    public function businessupdate(Request $request, $id)
    {
        $userId = Auth::user()->registerid;

        $business = Business::where('RegisterId', $id)->first();
        $workinghours = Workinghour::where('RegisterId', $id)->first();
        $facilities = facilities::where('RegisterId', $id)->first();
        $socialmedia = Socialmedia::where('RegisterId', $id)->first();

        // Business Information

            $business->CompanyName = $request->companyname;
            $business->CompanyNameArb = $request->companynamearb;
            $business->CompanyDescription = $request->companydesc;
            $business->CompanyDescriptionArb = $request->companydescarb;
            $business->CompanyCategory = $request->companycategory;
            $business->CompanyLocation = $request->companylocation;
            $business->CompanyLocationArb = $request->companylocationarb;
            $business->lat = $request->latitude;
            $business->lng = $request->longitude;
            $business->CompanyPhone = $request->companyphonenumber;
            $business->company_tagline = $request->companytag;
            $business->company_taglineArb = $request->companytagarb;
            $business->company_website = $request->companywebsite;
            $business->company_email = $request->companyemail;
            $business->location = $request->Municipality;

            if($request->image != '')
            {
                $image = $request->file('image');
                $main_image_src = '/image/company_dp/'.$id . ".png";
                $imagepath = public_path('image/company_dp/');
                $image->move($imagepath, $main_image_src);

                $business->profile_image = $main_image_src;
            }
            else
            {
                $business->profile_image = $request->SelectProfileImage;
            }


            if($request->backimage != '')
            {
                $backimage = $request->file('backimage');
                $main_backimage_src = '/image/company_back/'.$id . ".png";
                $backimagepath = public_path('image/company_back/');
                $backimage->move($backimagepath, $main_backimage_src);

                $business->background_image = $main_backimage_src;
            }
            else
            {
                $business->background_image = $request->SelectBackgroundImage;
            }

        // Business Information

        // Social Media

            $socialmedia->FaceBook = $request->companyfacebook;
            $socialmedia->Instagram = $request->companyinstagram;
            $socialmedia->Linked = $request->companylinked;
            $socialmedia->Twitter = $request->companytwitter;
            $socialmedia->Youtube = $request->companyyoutube;

        // Social Media

        // Working Hours

            $mondaystart = $request->monstart;
            $tuesdaystart = $request->tuesdaystart;
            $wednesdaystart = $request->wednesdaystart;
            $thursdaystart = $request->thursdaystart;
            $fridaystart = $request->fridaystart;
            $saturdaystart = $request->saturdaystart;
            $sundaystart = $request->sundaystart;
            if($mondaystart == "24 Hours") { $workinghours->Monday = $request->monstart; }
            else{ $workinghours->Monday = $request->monstart  . " - " . $request->monend; }

            if($tuesdaystart == "24 Hours") { $workinghours->Tuesday = $request->tuesdaystart; }
            else{ $workinghours->Tuesday = $request->tuesdaystart  . " - " . $request->tuesdayend; }

            if($wednesdaystart == "24 Hours") { $workinghours->Wednesday = $request->wednesdaystart; }
            else{ $workinghours->Wednesday = $request->wednesdaystart  . " - " . $request->wednesdayend; }

            if($thursdaystart == "24 Hours") { $workinghours->Thursday = $request->thursdaystart; }
            else{ $workinghours->Thursday = $request->thursdaystart  . " - " . $request->thursdayend; }

            if($fridaystart == "24 Hours") { $workinghours->Friday = $request->fridaystart; }
            else{ $workinghours->Friday = $request->fridaystart  . " - " . $request->fridayend; }

            if($saturdaystart == "24 Hours") { $workinghours->Saturday = $request->saturdaystart; }
            else{ $workinghours->Saturday = $request->saturdaystart  . " - " . $request->saturdayend; }

            if($sundaystart == "24 Hours") { $workinghours->Sunday = $request->sundaystart; }
            else{ $workinghours->Sunday = $request->sundaystart  . " - " . $request->sundayend; }

        // Working Hours

        // Facilities 

            $facilities->Wifi = $request->Wifi;
            $facilities->PrayerRoom = $request->PrayerRoom;
            $facilities->Wheelchair = $request->wheelchairaccesible;
            $facilities->Creditcard = $request->Creditcard;
            $facilities->AlltimeService = $request->AlltimeService;

        // Facilities 

        $business->save();
        $workinghours->save();
        $facilities->save();
        $socialmedia->save();
        return redirect()->route('profile.businessview', $userId);

    }

    public function businessdelete($id)
    {
        $userId = Auth::user()->registerid;
        $Business = Business::where('registerId', $id)->first();
        $Socialmedia = Socialmedia::where('RegisterId', $id)->first();
        $Workinghours = Workinghour::where('RegisterId', $id)->first();
        $Facilities = Facilities::where('RegisterId', $id)->first();
        $Business->delete();
        $Socialmedia->delete();
        $Workinghours->delete();
        $Facilities->delete();
        return redirect()->route('profile.businessview', $userId);
    }



    
    public function eventview($id)
    {
        $data = array(
            'day' => date("Y-m-d"),
            'event' => Events::where('userId', $id)->get(),
        );
        return view('Admin.Profile.ViewEvent', $data);
        // return ($data);
    }
    
    public function eventsingle($id)
    {
        $data = array(
            'day' => date("Y-m-d h:i:s"),
            'events' => Events::where('eventid', $id)->first(),
            'userId' => Auth::user()->registerid,
        );
        return view('Admin.Profile.EventSingle', $data);
        // return ($data);
    }

    public function eventedit($id)
    {
        $userId = Auth::user()->registerid;
        $event = [];
        $event['event'] = Events::where('eventid', $id)->first();
        return view('Admin.Profile.EditEvent', $event);
        // return ($event);
    }

    public function eventupdate(Request $request, $id)
    {
        $userId = Auth::user()->registerid;
        $event = Events::findorfail($id);
        $eventid = rand(999, 9999999);
        $event->headingEn = $request->eventname;
        $event->headingArb = $request->eventnamearb;
        $event->descriptionEn = $request->eventdesc;
        $event->descriptionArb = $request->eventdescarb;
        $event->summeryEn = $request->summeryen;
        $event->summeryArb = $request->summeryarb;
        $event->startdate = $request->start;
        $event->enddate = $request->end;
        $event->amount = $request->amount;
        $event->phone = $request->phone;
        $event->email = $request->email;
        $event->lat = $request->latitude;
        $event->lng = $request->longitude;
        $event->location = $request->location;
        $event->locationEn = $request->location;
        $event->locationArb = $request->locationarb;
        $event->category = "0";
        $event->view = "0";
        $event->status = "1";

        // Event image

        if($request->image != ''){

            $image = $request->file('image');
            $main_image_src = 'image/event/'.$eventid .".png";
            $imagepath = 'image/event/';
            $image->move($imagepath, $main_image_src);
            $event->image = $main_image_src;

        }
        else{
            $event->image = $request->oldimage;
        }

        $event->save();
        return redirect()->route('profile.eventview', $userId);
        // return $main_image_src;
    }

    public function eventdelete($id)
    {
        $userId = Auth::user()->registerid;
        $news = Events::where('eventid', $id)->first();
        $news->delete();
        return redirect()->route('profile.eventview', $userId);
    }



    public function Offerview($id)
    {
        $data = array(
            'day' => date("Y-m-d h:i:s"),
            'Offers' => Offers::where('userId', $id)->get(),
            'business' => Business::all(),
        );
        return view('Admin.Profile.ViewOffer', $data);
        // return ($data);
    }

    public function offersingle($id)
    {
        $data = [];
        $data['offers'] = Offers::where('id', $id)->first();
        $business = array(
            'business' => Business::get(),
            'category' => Category::all(),
            'OfferTag' => OfferTag::all(),
            'OfferTags' => OfferTags::FindOfferTag($id),
        );
        return view('Admin.Profile.OfferSingle', $data, $business);
        // return ($data);
    }

    public function offeredit($id)
    {
        $userId = Auth::user()->registerid;
        $offers = [];
        $offers['offer'] = Offers::where('offerid', $id)->first();
        $data = array(
            'day' => date("Y-m-d h:i:s"),
            'business' => Business::all(),
            'category' => Category::all(),
            'offersTag' => OfferTag::all(),
            'OffersTags' => OfferTags::where('offerid', $id)->first(),

        );
        return view('Admin.Profile.EditOffer', $data, $offers);
        // return ($data);
    }

    public function offerupdate(Request $request, $id)
    {
        $userId = Auth::user()->registerid;
        $offer = Offers::where('offerid', $id)->first();
        $offerstag = OfferTags::where('offerid', $id)->first();
        $name = "QBC" . rand(999, 9999999).".png";

        $offer->userId = $request->userid;
        $offer->headingEn = $request->offername;
        $offer->headingArb = $request->offernamearb;
        $offer->startdate = $request->start;
        $offer->enddate = $request->end;
        $offer->descriptionEn = $request->offerdesc;
        $offer->descriptionArb = $request->offerdescarb;
        $offer->companyid = $request->business;
        $offer->category_id = $request->category;
        $offer->locationEn = $request->location;
        $offer->locationArb = $request->locationarb;
        $offer->lat = $request->latitude;
        $offer->lng = $request->longitude;
        $external_url = $request->external_url;
        if($external_url == 1)
        {
            $offer->external_url = 1;
            $offer->url = $request->url;
            $offer->appUrl = $request->url;
        }
        else{
            $offer->external_url = 0;
            $offer->url = "http://qabuss.com/offerview/" . $id;
            $offer->appUrl = $request->url;
        }
        // category image

        if($request->image != ''){

        $image = $request->file('image');
        $main_image_src = 'image/offers/'.$name;
        $imagepath = 'image/offers/';
        $image->move($imagepath, $main_image_src);

        $offer->image = $main_image_src;
        }
        else{
            $offer->image = $request->oldimage;
        }

        $offerstag->offerid = $id;
        $offerstag->tagid = $request->offertag;

        $offer->save();
        $offerstag->save();
        return redirect()->route('profile.offerview', $userId);
        // return $offerstag;
    }

    public function offerdelete($id)
    {
        $userId = Auth::user()->registerid;
        $Business = Business::where('registerId', $id)->first();
        $Socialmedia = Socialmedia::where('RegisterId', $id)->first();
        $Workinghours = Workinghour::where('RegisterId', $id)->first();
        $Facilities = Facilities::where('RegisterId', $id)->first();
        $Business->delete();
        $Socialmedia->delete();
        $Workinghours->delete();
        $Facilities->delete();
        return redirect()->route('business.index', $id);
    }


    public function favouriteview($id)
    {
        $data = array(
            'favourite' => Favourite::where('userId', $id)->get(),
            'business' => Business::all(),
            'category' => Category::all(),
            'location' => Location::all(),
        );
        return view('Admin.Profile.ViewFavourite', $data);
        // return ($data);
    }



    public function recommendview($id)
    {
        $data = array(
            'recommend' => Recommend::where('user_id', $id)->get(),
            'business' => Business::all(),
            'category' => Category::all(),
            'location' => Location::all(),
        );
        return view('Admin.Profile.ViewRecommend', $data);
        // return ($data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = [];
        $user['user']  = User::where('registerid', $id)->first();
        return view('Admin.Profile.Index', $user);
        // return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::where('registerid', $id)->first();
        $user->name = $request->username;
        $user->email = $request->emailid;
        $user->phone = $request->phonenumber;
        $name = $id .".png";

        if($request->image != '')
        {

            $image = $request->file('image');
            $main_image_src = '/image/user_dp/'.$name;
            $imagepath ='image/user_dp/';
            $image->move($imagepath, $main_image_src);

            $user->image = $main_image_src;
        }
        else
        {
            $user->image = $request->oldimage;
        }



        $user->save();
        return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

}
