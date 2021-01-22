<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Recommend extends Model
{
        protected $table = 'recommend_lists';
    // public $timestamps =true;
    protected $fillable = [
        'user_id','category_id'
    ];

    public static function Recommendlist($registerid)
    {
        return $tester =  DB::table('recommend_lists')
        ->join('category','category.id','recommend_lists.category_id')
        ->select('category.id','category.name','category.nameArb','category.icon')
        ->where('recommend_lists.user_id', '=', $registerid)
        ->orderBy('recommend_lists.created_at')
        ->get();
    }

    public static function recommend($id)
    {
        $count = 0;
        $data = Recommend::where('user_id', $id)->get();
        // return $data[1]->category_id;
        $val1 = $data[0];
        $val2 = $data[1];
        // $val3 = $data[2];
        return  $val2;
         $data = Business::where($id[$count]->companycategory)->get();

        $tester =  DB::table('business')
        ->select('business.registerId', 'business.companyname', 'business.companynameArb', 'business.companylocation', 'business.companylocationArb', 'business.lat', 'business.lng', 'business.profile_image', 'business.background_image')
        ->Where('business.CompanyCategory', '=', $id)
        ->orderBy('created_at')
        ->get();
    }

    public static function FindRecommendBusiness($area)
    {

        return count($area);

        // $recommend = Recommend::create()

        $recommend =  DB::table('recommend_lists')
        ->create('recommend_lists.registerId')
        ->Where('recommend_lists.CompanyCategory', '=', $id)
        ->orderBy('created_at')
        ->get();
        // $count = 0;
        // $data = Recommend::where('user_id', $area)->get();
        // // return $data[1]->category_id;
        // $val1 = $data[0];
        // $val2 = $data[1];
        // // $val3 = $data[2];
        // return  $val2;
        //  $data = Business::where($id[$count]->companycategory)->get();

        // $tester =  DB::table('Recommend')
        // ->create('Recommend.registerId',)
        // ->Where('business.CompanyCategory', '=', $area)
        // ->orderBy('created_at')
        // ->get();
    }
}
