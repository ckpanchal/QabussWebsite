<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OffersTags extends Model
{
    protected $table = 'offertags';
    public $primaryKey ='id';
    protected $fillable = [
        'id', 'offerid','tagid',
    ];

    public static function FindOfferTag($id){
        return DB::table('offertags')
        ->select('offertags.id','offertags.offerid','offertags.tagid')
        ->where('offertags.offerid', '=', $id)             
        ->get();
    }
    public static function getOffer(){
        return DB::table('offertags')
        ->select('offertags.offerid','offertags.tagid')
        ->where('offertags.status', '!=', 0)
        ->orderBy('enddate')
        ->get();
    }
    public function offer(){
        return $this->belongsTo('App\Models\Offers','Id','offerid');
    }

    public function offertag(){
       return $this->belongsTo('App\Models\OfferTag','tagid','id');
    }
}
