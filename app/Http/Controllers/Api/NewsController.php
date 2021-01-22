<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Author;
use App\Models\NewsCategory;
use Exception;

class NewsController extends Controller
{

    // News Sort(Searching and Category)

    public function getAppNewsSort(Request $request)
    {
        $id = $request->id;
        $search = $request->search;
        if ($id && $search) {
            $data = News::FindNewsSort($id, $search);
        }
        elseif($id) {
            $data = News::FindNewsSortId($id);
        }
        else {
            $data = News::FindNewsSortSearch($search);
        }

        if(count($data))
        {
            $json['news'] = $data;
            $json['response'] = 1;
            $json['message'] = "success";
            return response()->json($json);
        }
        else{
            $json['news'] = 0;
            $json['response'] = 0;
            $json['message'] = "Error";
            return response()->json($json);
        }

    }
    // News Sort(Searching and Category)

    public function getAppselectCategories($RegisterId)
    {
        // $data = NewsCategory::FindSelectNewsCategory($RegisterId);
        $news = News::FindSelectCategoryNews($RegisterId);

        $json['data'] = $news;
        $json['response'] = 1;
        $json['message'] = "success";
        return response()->json($json);


    }

    public function getNewsSearch($id)
    {
        $data = News::NewsSearch($id);
        $json['news'] = $data;
        $json['response'] = 1;
        $json['message'] = "success";
        return response()->json($json);
    }

    // News Tab(list of news and category)
    public function getAppNews(\Illuminate\Http\Request $request)
    {
        try{
            $data = News::FindNews($request);
            return response()->json($data,200);
        }catch(Exception $ex){
            return response()->json($ex->getMessage(),500);
        }
    }

    // Single News
    public function getAppSingleNews($id)
    {
        try{
            $data = News::getSingleNews($id);
            $relate= News::relatedNews($data->category, $id);
            return response()->json([
                'news'=>$data,
                'relate'=>$relate
            ],200);
        }
        catch(Exception $ex){
            return response()->json($ex->getMessage(),500);
        }
    }

    // Mobile App API
    public function getAppNewsCategories()
    {
        try {
            $data = NewsCategory::parentCategories()->get();
            return response()->json($data,200);
        }catch(Exception $ex){
            return response()->json($ex->getMessage(),500);
        }
    }
}
