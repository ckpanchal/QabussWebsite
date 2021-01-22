<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offers;
use App\Models\OfferTag;
use App\Models\OffersTags;
use App\Models\Category;
use App\Models\Business;
use DB;
class OffersController extends Controller
{
   
    public function getCategoryOffers(){
        // $Offers = Offers::getOffers();
        // foreach ($Offers as $OffersVal){
        //     $categoryId = [$OffersVal->category_id];
        //     $OffercategoryId[]= Category::subcategories($categoryId)->first();
        // }
        // return $OffercategoryId;
        try{
            $categories = Category::subcategories();
            return response()->json($categories,200);
        }catch (\Exception $ex){
            return response()->json($ex->getMessage(),500);
        }
    }
    public function getOffers(Request $request)
    {
        try {
            $day = date("Y-m-d");
            $Offers = Offers::filterOffers($request,$day);
            $Offerstag = OfferTag::offerTags()->get();
            $json['Offers'] = $Offers;
            $json['Offerstag'] = $Offerstag;
            return response()->json($json,200);
        }
        catch (\Exception $ex){
            return response()->json($ex->getMessage(),500);
        }
    }

    // Offers Sort

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




}
