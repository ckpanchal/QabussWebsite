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

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['user'] = User::all();
        $role = [];
        $role['role'] = Role::all();
        return view('Admin.User.index', $data);
    }


    public function businessview($id)
    {
        $data = array(
            'business' => Business::where('userId', $id)->get(),
            'category' => Category::all(),
            'location' => Location::all(),
        );
        return view('Admin.User.ViewBusiness', $data);
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
        return view('Admin.User.BusinessSingle', $data);
        // return ($data);
    }


    public function eventview($id)
    {
        $data = array(
            'day' => date("Y-m-d"),
            'event' => Events::where('userId', $id)->get(),
        );
        return view('Admin.User.ViewEvent', $data);
        // return ($data);
    }

    public function eventsingle($id)
    {
        $data = array(
            'day' => date("Y-m-d h:i:s"),
            'events' => Events::where('eventid', $id)->first(),
            'userId' => Auth::user()->registerid,
        );
        return view('Admin.User.EventSingle', $data);
        // return ($data);
    }

    public function Offerview($id)
    {
        $data = array(
            'day' => date("Y-m-d h:i:s"),
            'Offers' => Offers::where('userId', $id)->get(),
            'business' => Business::all(),
        );
        return view('Admin.User.ViewOffer', $data);
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
        return view('Admin.User.OfferSingle', $data, $business);
        // return ($data);
    }


    public function favouriteview($id)
    {
        $data = array(
            'favourite' => Favourite::where('userId', $id)->get(),
            'business' => Business::all(),
            'category' => Category::all(),
            'location' => Location::all(),
        );
        return view('Admin.User.ViewFavourite', $data);
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
        return view('Admin.User.ViewRecommend', $data);
        // return ($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['user'] = Role::all();
        return view('Admin.User.AddUser', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->registerid = "QB" . rand(999, 9999999);
        $user->name = $request->username;
        $user->email = $request->emailid;
        $role = $request->role;
        $user->password = Hash::make($request->password);
        $user->phone = $request->companyphonenumber;
        $user->limit = "3";
        $user->approve = "1";
        $user->email_verified_at = now();
        $user->remember_token = Str::random(60);
        $Profile = "QZBL" . rand(999, 9999999) .".png";
        
        // Profile image

        $image = $request->file('image');
        $main_image_src = '/image/user_dp/'.$Profile;
        $imagepath = public_path('/image/user_dp/');
        $image->move($imagepath, $main_image_src);

        $user->image = $main_image_src;

        $user->save();
        $user->assignRole($role);
        return redirect()->route('user.index');
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
        return view('Admin.User.ViewUser', $data, $user);
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
        $data = [];
        $data['user'] = User::where('registerid', $id)->first();
        $role = [];
        $role['role'] = Role::all();
        return view('Admin.User.EditUser', $data, $role);
        // return $data;
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
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('registerid', $id)->first();
        $user->delete();
        return redirect()->route('user.index');
    }
}
