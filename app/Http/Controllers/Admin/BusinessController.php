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

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'business' => Business::orderBy('created_at','desc')->get(),
            'category' => Category::all(),
            'location' => Location::all(),
        );
        return view('Admin.Business.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'business' => Business::all(),
            'categorys' => Category::all(),
            'times' => Time::all(),
            'location' => Location::all(),
        );
        return view('Admin.Business.AddBusiness', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $business = new Business();
        $workinghours = new Workinghour();
        $facilities = new Facilities();
        $socialmedia = new Socialmedia();

        // Business Information

        $id = "QBL" . rand(999, 9999999);
        $business->UserId = $request->user;
        $business->RegisterId = $id;
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
        $business->approve = "1";
        $business->location = $request->municipality;

        $image = $request->file('image');
        $main_image_src = '/image/company_dp/'.$id . ".png";
        $imagepath = 'image/company_dp/';
        $image->move($imagepath, $main_image_src);
        $business->profile_image = $main_image_src;

        $image = $request->file('backimage');
        $main_image_src = '/image/company_back/'.$id . ".png";
        $imagepath = 'image/company_back/';
        $image->move($imagepath, $main_image_src);
        $business->background_image = $main_image_src;

        // Business Information


        // Working Hours

        $workinghours->RegisterId = $id;
        $workinghours->UserId = $request->user;
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

        $facilities->UserId = $request->user;
        $facilities->RegisterId = $id;
        $facilities->CarParking = $request->CarParking;
        $facilities->Wifi = $request->Wifi;
        $facilities->PrayerRoom = $request->PrayerRoom;
        $facilities->Wheelchair = $request->wheelchairaccesible;
        $facilities->CreditCard = $request->Creditcard;
        $facilities->AlltimeService = $request->AlltimeService;

        // Favilities

        // Social Media

        $socialmedia->RegisterId = $id;
        $socialmedia->UserId = $request->user;
        $socialmedia->FaceBook = $request->companyfacebook;
        $socialmedia->Instagram = $request->companyinstagram;
        $socialmedia->Linked = $request->companylinked;
        $socialmedia->Twitter = $request->companytwitter;
        $socialmedia->Youtube = $request->companyyoutube;

        // Social Media


        $business->save();
        $workinghours->save();
        $facilities->save();
        $socialmedia->save();
        return redirect()->route('business.index');
        // return ($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array(
            'business' => Business::where('registerId', $id)->get(),
            'categorys' => Category::all(),
            'socialmedia' => Socialmedia::where('RegisterId', $id)->first(),
            'time' => Workinghour::where('RegisterId', $id)->first(),
            'facilities' => Facilities::where('RegisterId', $id)->first(),

        );
        return view('Admin.Business.ViewBusiness', $data);
        // return ($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        return view('Admin.Business.EditBusiness', $data);
        // return ($data);
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

        // $workinghours->Monday = $request->monstart  . " - " . $request->monend;
        // $workinghours->Tuesday = $request->tuesdaystart  . " - " . $request->tuesdayend;
        // $workinghours->Wednesday = $request->wednesdaystart  . " - " . $request->wednesdayend;
        // $workinghours->Thursday = $request->thursdaystart  . " - " . $request->thursdayend;
        // $workinghours->Friday = $request->fridaystart . " - " .$request->fridayend;
        // $workinghours->Saturday = $request->saturdaystart  . " - " . $request->saturdayend;
        // $workinghours->Sunday = $request->sundaystart  . " - " . $request->sundayend;


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

        // Facilities Hours

        $facilities->CarParking = $request->CarParking;
        $facilities->Wifi = $request->Wifi;
        $facilities->PrayerRoom = $request->PrayerRoom;
        $facilities->Wheelchair = $request->wheelchairaccesible;
        $facilities->Creditcard = $request->Creditcard;
        $facilities->AlltimeService = $request->AlltimeService;

        // Facilities Hours

        $business->save();
        $workinghours->save();
        $facilities->save();
        $socialmedia->save();
        return redirect()->route('business.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Business = Business::where('registerId', $id)->first();
        $Socialmedia = Socialmedia::where('RegisterId', $id)->first();
        $Workinghours = Workinghour::where('RegisterId', $id)->first();
        $Facilities = Facilities::where('RegisterId', $id)->first();
        $Business->delete();
        $Socialmedia->delete();
        $Workinghours->delete();
        $Facilities->delete();
        return redirect()->route('business.index');
    }
}
