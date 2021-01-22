<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;

class News extends Model
{
    protected $table = 'news';
    public $primaryKey ='id';
    // public $timestamps =true;
    protected $fillable = [
        'registerid','headingEn','headingArb','descriptionEn','descriptionArb','summeryEn','summeryArb','image','author','category','maincategory','feature','view',
    ];
    
        // Website FrontEnd    

        // List of News 
        public static function getNews(){
            $event = DB::table('news');
            if (Session::has('language') && Session::get('language') == 'ar') {
                $event = $event->select('news.registerid','news.headingArb as headingEn','news.descriptionArb as descriptionEn', 'news.summeryArb as summeryEn','news.image', 'news.author', 'news.category','news.maincategory','news.feature', 'news.view');
            } else {
                $event = $event->select('news.registerid','news.headingEn', 'news.headingArb','news.descriptionEn','news.descriptionArb', 'news.summeryEn','news.summeryArb','news.image', 'news.author', 'news.category','news.maincategory','news.feature', 'news.view');
            }
            return $event->orderBy('created_at')
                ->limit(4)
                ->get();
        }
        // List of News 

    // Website FrontEnd 

// Mobile APP API

    // 
    public static function WebFindNews($id){
    	return DB::table('news')
            ->select('news.registerid','news.headingEn', 'news.headingArb','news.descriptionEn','news.descriptionArb', 'news.summeryEn','news.summeryArb','news.image', 'news.author', 'news.category','news.maincategory','news.feature', 'news.view')
            ->where('news.registerid', '=', $id)
            ->orderBy('created_at')
            ->get();
    }
    // 
    // Home Searching Value

        public static function SearchDetails($search){
            return DB::table('news')
            ->join('news_author','news_author.registerid','news.author')
            ->select('news.registerid','news.headingEn','news.headingArb', 'news.descriptionEn', 'news.descriptionArb', 'news.summeryEn', 'news.summeryArb', 'news.image', 'news_author.name', 'news.category','news.created_at')
            ->Where('news.headingEn', 'like', '%' . $search . '%')
            ->orWhere('news.headingArb', 'like', '%' . $search . '%')
            ->orWhere('news.descriptionEn', 'like', '%' . $search . '%')
            ->orWhere('news.descriptionArb', 'like', '%' . $search . '%')
            ->orWhere('news.summeryEn', 'like', '%' . $search . '%')
            ->orWhere('news.summeryArb', 'like', '%' . $search . '%')
            ->orWhere('news.author', 'like', '%' . $search . '%')
            ->orderBy('news.created_at')
            ->get();
        }
        
    // Home Searching Value
    
    // Both Sorting

        public static function FindNewsSort($id, $search){
            return $news =  DB::table('news')
            ->select('news.registerid','news.headingEn','news.headingArb', 'news.summeryEn', 'news.summeryArb', 'news.image', 'news.author', 'news.category')
            ->Where('news.maincategory', '=', $id)
            ->Where('news.headingEn', 'like', '%' . $search . '%')
            ->orWhere('news.headingArb', 'like', '%' . $search . '%')
            ->orWhere('news.descriptionEn', 'like', '%' . $search . '%')

            ->orderBy('created_at')
            ->get();

        }

    // Both Sorting

    // Sorting By Id

        public static function FindNewsSortId($id){
            return $news =  DB::table('news')
            ->join('news_author','news_author.registerid','news.author')
            ->select('news.registerid','news.headingEn','news.headingArb', 'news.summeryEn', 'news.summeryArb', 'news.image', 'news_author.name', 'news.category')
            ->where('news.maincategory', '=', $id)
            ->orderBy('news.created_at')
            ->get();
        }

    // Sorting By Id

    // Sorting By Search

        public static function FindNewsSortSearch($search){
            return $news =  DB::table('news')
            ->join('news_author','news_author.registerid','news.author')
            ->select('news.registerid','news.headingEn','news.headingArb', 'news.summeryEn', 'news.summeryArb', 'news.image', 'news_author.name', 'news.category')
            ->orWhere('news.headingEn', 'like', '%' . $search . '%')
            ->orWhere('news.headingArb', 'like', '%' . $search . '%')
            ->orWhere('news.descriptionEn', 'like', '%' . $search . '%')
            ->orWhere('news.descriptionArb', 'like', '%' . $search . '%')
            ->orWhere('news.summeryEn', 'like', '%' . $search . '%')
            ->orWhere('news.summeryArb', 'like', '%' . $search . '%')
            ->orWhere('news.author', 'like', '%' . $search . '%')
            ->orderBy('news.created_at')
            ->get();
        }

    // Sorting By Search


    // 

        public static function getSingleNews($id){
            return News::with('authored_by')->where('news.registerid','=', $id)->first();
        }

    // 

    // 
    public function scopeInCategory($query,$id){
        return $query->where('maincategory',$id);
    }
    // 

    // 
    public function scopeRelatedNews($query,$category, $id){
        return $query->with('authored_by')->where('news.category',$category)->where('news.registerId','!=',$id)->orderBy('news.created_at')->limit(3)->get();
    }
    // 
    // 
    public function notification(){
        return $this->morphOne('App\Models\AppNotifications','notification')->with('authored_by');
    }
    // 
    // 
    public function authored_by(){
        return $this->belongsTo('App\Models\NewsAuthor','author','registerid');
    }
    // 
    // 
        public static function FindSelectCategoryNews($id){

            // for ($x = 0; $x <= 10; $x++) {
            //     echo "The number is: $x <br>";
            // }
            return DB::table('news')
            ->join('news_author','news_author.registerid','news.author')
            ->select('news.registerid','news.headingEn','news.headingArb', 'news.descriptionEn', 'news.descriptionArb', 'news.summeryEn', 'news.summeryArb', 'news.image', 'news_author.name', 'news.category','news.created_at')
            ->where('news.maincategory', '=', $id)
            ->orderBy('news.created_at')
            ->get();
        }
    // 
    public static function FindRelateNews($category, $id){
        return  $news =  DB::table('news')
        ->join('news_author','news_author.registerid','news.author')
        ->select('news.registerid','news.headingEn','news.headingArb', 'news.summeryEn', 'news.summeryArb', 'news.image', 'news_author.name', 'news.category','news.created_at')
        ->where('news.category', '=', $category)
        ->where('news.registerid', '!=', $id)
        ->orderBy('news.created_at')
        ->limit(3)
        ->get();
    }


// Mobile APP API

    public static function FindNews(\Illuminate\Http\Request $request){
            $newses = News::query();
            $newses->select('news.registerid','news.headingEn','news.headingArb', 'news.summeryEn', 'news.summeryArb', 'news.descriptionEn', 'news.descriptionArb', 'news.image', 'news.category', 'news.created_at','news.author')->with(['authored_by'=>function($query){
                $query->select('id','name','registerid','created_at');
            }]);
            //check weather search exist in request
            if($request->filled('search')){
                //if yes build search query
                $search_query = "%".$request->search."%";
                $newses->where('headingEn','LIKE',$search_query)
                ->orWhere('headingArb','LIKE',$search_query)
                ->orWhere('summeryEn','LIKE',$search_query)
                ->orWhere('summeryArb','LIKE',$search_query)
                ->orWhere('descriptionEn','LIKE',$search_query)
                ->where('descriptionArb','LIKE',$search_query);
            }

            //check weather category exist in request
            if($request->filled('category')){
                //if yes then get categories
                $newses->inCategory($request->category);
            }
            //return categories by order by news created at
            return $newses->orderByDesc('news.id')->get();
        }


    // public static function FindNews($id){
    // 	return DB::table('news')
    //         ->select('news.registerid','news.headingEn', 'news.headingArb','news.descriptionEn','news.descriptionArb', 'news.summeryEn','news.summeryArb','news.image', 'news.author', 'news.category','news.maincategory','news.feature', 'news.view')
    //         ->where('news.registerid', '=', $id)
    //         ->orderBy('created_at')
    //         ->get();
    // }
}
