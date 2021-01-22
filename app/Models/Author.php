<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Author extends Model
{
        protected $table = 'news_author';
    public $primaryKey ='id';
    // public $timestamps =true;
    protected $fillable = [
        'registerid','name',
    ];


    // 


    public static function NewsSearch($id){
        return $news =  DB::table('news_author')
        ->select('news_author.registerid','news_author.name')
        ->orWhere('news_author.name', 'like', '%' . $id . '%')
        ->orderBy('created_at')
        ->get();

    }use Illuminate\Support\Facades\DB;

}
