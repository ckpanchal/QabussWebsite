<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Favourite extends Model
{
        protected $table = 'favourite';
    public $primaryKey ='id';
    // public $timestamps =true;
    protected $fillable = [
        'userId','businessId',
    ];

    public static function APISearchFavourite($id, $userId){
        return $Favourite =  DB::table('Favourite')
        ->select('userId','businessId')
        ->where('Favourite.userId', '=', $userId)             
        ->where('Favourite.businessId', '=', $id)
        ->get();
    }
    public static function SearchFavouriteValue($RegisterId, $Favorite){
        return DB::table('Favourite')
        ->select('userId','businessId')
        ->where('Favourite.userId', '=', $RegisterId)             
        ->where('Favourite.businessId', '=', $Favorite)
        ->get();
    }
    
    
    public static function SearchFavourite($id, $userId){
        return $Favourite =  DB::table('favourite')
        ->select('userId','businessId')
        ->where('favourite.userId', '=', $userId)             
        ->where('favourite.businessId', '=', $id)
        ->get();
    }
}
