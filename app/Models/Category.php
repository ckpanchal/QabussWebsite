<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Category extends Model
{
    protected $table = 'category';
    public $primaryKey ='id';
    protected $fillable = [
        'name','nameArb','image','parent','tag',
    ];
    
       // Website APP Api

    public static function FindMainCategory(){

        $category = DB::table('category');
        if (Session::has('language') && Session::get('language') == 'ar') {
            $category = $category->select('category.id', 'category.nameArb as name', 'category.icon', 'category.parent');
        } else {
            $category = $category->select('category.id', 'category.name', 'category.icon', 'category.parent');
        }
        return $category->where('category.parent', '=', 0)
        ->orderBy('parent')
        ->get();
    }

    public static function FindSubCategory(){

        $category = DB::table('category');
        if (Session::has('language') && Session::get('language') == 'ar') {
            $category = $category->select('category.id', 'category.nameArb as name', 'category.icon', 'category.parent');
        } else {
            $category = $category->select('category.id', 'category.name', 'category.icon', 'category.parent');
        }
        return $category->where('category.parent', '!=', 0)
        ->orderBy('parent')
        ->get();
    }

    // Website APP Api
    
    
    // Mobile APP Api
  


    // list of SUB category
    
        public static function APIFindSubCategory(){
            return DB::table('category')
            ->select('category.id','category.name', 'category.nameArb', 'category.icon', 'category.parent')
            ->where('category.parent', '!=', 0)
            ->orderBy('category.id')
            ->get();
        }

    // list of SUB category

    // list of MAIN category

    public static function APISelectCategory(){
        return DB::table('category')
        ->select('category.id','category.name', 'category.nameArb', 'category.icon')
        ->where('category.parent', '=', 0)
        ->orderBy('created_at')
        ->get();
    }
    // list of MAIN category

    public static function APISelectsubCategory(){
        return DB::table('category')
        ->where('category.parent', '!=', 0)
        ->orderBy('category.id')
        ->get();
    }


    // list of MAIN category

    public static function APIFindMainCategory(){
        return DB::table('category')
        ->select('category.id','category.name', 'category.nameArb', 'category.icon')
        ->where('category.parent', '=', 0)
        ->orderBy('created_at')
        ->get();
    }
    
    // list of sub category - searching category

    public static function APIFindSearch($id)
    {
        return DB::table('category')
        ->select('category.id','category.name', 'category.nameArb', 'category.icon')
        ->orWhere('category.nameArb', 'like', '%' . $id . '%')
        ->where('category.parent', '!=', 0)
        ->orWhere('category.name', 'like', '%' . $id . '%')
        ->where('category.parent', '!=', 0)
        ->orderBy('name')
        ->get();
    }


        // Select category Tag - searching category

        public static function APICategoryTagList($id)
        {
            return  DB::table('category')
            ->select('category.id','category.name', 'category.nameArb')
            ->Where('category.tag', '=',  $id)
            ->orderBy('category.id')
            ->get();
        }

        // Select category Tag - searching category

        public static function APIsubCategory($dad)
        {
            return  DB::table('category')
            ->Where('category.parent', '=',  $dad)
            ->orderBy('category.id')
            ->get();
        }

// 
public static function subcategories(){
    return DB::table('category')
    ->select('name','id','nameArb','icon','color')
    ->where('category.parent', '!=', 0)
    ->orderBy('created_at')
    ->get();
}
// 

// Mobile APP Api
}
