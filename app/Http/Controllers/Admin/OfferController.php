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

use Business;
use Offers;
use Category;
use OfferTag;
use OfferTags;
class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'day' => date("Y-m-d h:i:s"),
            'Offers' => Offers::all(),
            'business' => Business::all(),
        );
        return view('Admin.Offer.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'day' => date("Y-m-d h:i:s"),
            'Offers' => Offers::all(),
            'business' => Business::all(),
            'category' => Category::all(),
            'offersTag' => OfferTag::all(),
        );
        return view('Admin.Offer.AddOffers', $data);
        // return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $offer = new Offers  ();
        $offerstag = new OfferTags();
        $offerid = "QBO" . rand(999, 9999999);

        $offer->offerid = $offerid;
        $offer->userId = $request->userid;
        $offer->companyid = $request->business;
        $offer->headingEn = $request->offername;
        $offer->headingArb = $request->offernamearb;
        $offer->descriptionEn = $request->offerdesc;
        $offer->descriptionArb = $request->offerdescarb;
        $offer->startdate = $request->start;
        $offer->enddate = $request->end;
        $offer->lat = $request->latitude;
        $offer->lng = $request->longitude;
        $offer->locationEn = $request->location;
        $offer->locationArb = $request->locationarb;
        $external_url = $request->external_url;
        if($external_url == 1)
        {
            $offer->external_url = 1;
            $offer->url = $request->url;
            $offer->appUrl = $request->url;
        }
        else{
            $offer->external_url = 0;
            $offer->url = "http://qabuss.com/offerview/" . $offerid;
            $offer->appUrl = $request->url;
        }
        $offer->category_id = $request->category;
        $offer->status = "1";
        $offer->view = "0";

        $image = $request->file('image');
        $main_image_src = '/image/offers/'.$offerid .".png";
        $imagepath = 'image/offers/';
        $image->move($imagepath, $main_image_src);
        $offer->image = $main_image_src;

        $offerstag->offerid = $offerid;
        $offerstag->tagid = $request->offertag;



        $offer->save();
        $offerstag->save();
        // (new \App\Libraries\NotificationLib())->sendNotification($offer->headingEn,$offer->headingArb,substr(strip_tags($offer->descriptionEn),0,50),substr(strip_tags($offer->descriptionArb),0,50),url($main_image_src),'App\Model\Offers',$offer->id,$offer);
        return redirect()->route('offer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [];
        $data['offers'] = Offers::where('offerid', $id)->first();
        // $OfferTags = [];
        // $OfferTags['OfferTags'] = OfferTags::where('offerid', $id)->first();
        $business = array(
            'business' => Business::all(),
            'category' => Category::all(),
            'OfferTag' => OfferTag::all(),
            'OfferTags' => OfferTags::FindOfferTag($id),
        );
        return view('Admin.Offer.ViewOffers', $data, $business);
        // return $business;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offers = [];
        $offers['offers'] = Offers::FindOffers($id);
        $data = array(
            'day' => date("Y-m-d h:i:s"),
            'business' => Business::all(),
            'category' => Category::all(),
            'offersTag' => OfferTag::all(),
            'OffersTags' => OfferTags::where('offerid', $id)->first(),

        );
        return view('Admin.Offer.EditOffers', $data, $offers);
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
        $main_image_src = '/image/offers/'.$name;
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
        return redirect()->route('offer.index');
        // return $offerstag;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("offers")->where("offerid", $id)->delete();
        DB::table("offertags")->where("offerid", $id)->delete();
        return redirect()->route('offer.index');
    }
}
