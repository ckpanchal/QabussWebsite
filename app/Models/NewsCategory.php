<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NewsCategory extends Model
{
    protected $table = 'news_category';
    public $primaryKey ='id';
    // public $timestamps =true;
    protected $fillable = [
        'name','nameArb','parent',
    ];
    
        public function scopeParentCategories($query){
        $query->select('news_category.id','news_category.name', 'news_category.nameArb')->where('news_category.parent', "0")->orderBy('created_at');
    }
    public static function FindNewsCategory(){
        return $news =  DB::table('news_category')
        ->select('news_category.id','news_category.name', 'news_category.nameArb')
        ->orderBy('created_at')
        ->where('news_category.parent', '=', "0")
        ->get();
    }
    public static function FindSelectNewsCategory($id){
    	$query = DB::table('news_category')
                ->select('news_category.id')
                ->where('parent', '=', $id)
                ->orderBy('created_at');
        return $query->get()->toarray();
    }
}
