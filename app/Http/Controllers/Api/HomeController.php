<?php

/**
 * Created By: Sanjay KV
 * Date: 18/04/20
 * Time: 9:34 AM
 * Description: HomeController.php
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\FcmToken;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   
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
}
