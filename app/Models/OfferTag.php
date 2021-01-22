<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OfferTag extends Model
{
    protected $table = 'offertag';
    public $primaryKey ='id';
    protected $fillable = [
        'id', 'nameEn','nameArb',
    ];
    
        public function scopeOfferTags($query){
        return $query->select('offertag.id','offertag.nameEn','offertag.nameArb')->orderBy('offertag.id');
    }

    public static function getOfferTag(){
        return DB::table('offertag')
        ->select('offertag.id','offertag.nameEn','offertag.nameArb')
        ->orderBy('offertag.id')
        ->get();
    }
    public function offtags(){
        return $this->hasMany('App\Models\OffersTags','tagid','id');
    }
    public static function getTagOffers($tag){
        return $val = DB::table('offers')
         ->join('offertags','offertags.offerid','offers.Id')
         ->where('offertags.tagid', '=', $tag)
         ->get();
 
     }
}
