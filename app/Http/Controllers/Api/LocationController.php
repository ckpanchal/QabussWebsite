<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{

        // Mobile APP Api

        public function location()
        {
            try{
                $data = Location::select('id','locationEn','locationArb')->get();
                return response()->json($data,200);
            }catch(\Exception $ex){
                return response()->json($ex->getMessage(),500);
            }
        }

        public function facility()
        {
            $data = facility::all();
            $json['data'] = $data;
            $json['response'] = 1;
            $json['message'] = "success";
            return response()->json($json);
        }
}
