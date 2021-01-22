<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Business;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Storage;
class CategoryController extends Controller
{

// Mobile APP Api

    public function SelectCategory()
    {
        $maincategory = Category::APISelectCategory();
        $subcategory = Category::APISelectsubCategory();
        $json['maincategory'] = $maincategory;
        $json['subcategory'] = $subcategory;
        $json['response'] = 1;
        $json['message'] = "success";
        return response()->json($json);
    }

    // list of SUB category

    public function getAppCategory()
    {
        $data = Category::FindSubCategory();
        if(count($data))
        {
            $json['data'] = $data;
            $json['response'] = 1;
            $json['message'] = "success";
            return response()->json($json);
        }
        else{
            $json['data'] = 0;
            $json['response'] = 0;
            $json['message'] = "Error";
            return response()->json($json);
        }

    }

    // list of MAIN category

    public function getAppMainCategory()
    {
        $data = Category::FindMainCategory();
        $json['data'] = $data;
        $json['response'] = 1;
        $json['message'] = "success";
        return response()->json($json);
    }

    // list of sub category - searching category

    public function searchByKeyword($id)
    {
        $data = Category::FindSearch($id);
        $json['data'] = $data;
        $json['response'] = 1;
        $json['message'] = "success";
        return response()->json($json);
    }

    public function getbusinessdistance($id, $lat, $lng)
    {
        $BusinessLists = Business::APIFindCategoryroutes($id, $lat, $lng);
        $json['business'] = $BusinessLists;
        $json['response'] = 1;
        $json['message'] = "success";
        return response()->json($json);
    }

    // list of business - Ascending

    public function CategoryBusinessListAsc($id)
    {
        $BusinessLists = Business::CategoryBusinessListAsc($id);
        $json['business'] = $BusinessLists;
        $json['response'] = 1;
        $json['message'] = "success";
        return response()->json($json);
    }

    // list of business - Area

    public function CategoryBusinessListArea($id, $area)
    {
        $BusinessLists = Business::CategoryBusinessListArea($id, $area);
        $json['business'] = $BusinessLists;
        $json['response'] = 1;
        $json['message'] = "success";
        return response()->json($json);
    }

    // list of business - Area

    public function CategoryBusinessListAreaPost($id, Request $request)
    {
        $area = $request->area;
        $count = 0;
        $val = count($area);
        $BusinessLists = array();
        while($count < $val){
            $list = Business::where('area', $request->area[$count])->get();
            for ($i=0; $i < count($list) ; $i++) {
                array_push($BusinessLists, $list[$i]);
            }
            $count++;
        }
        $json['business'] = $BusinessLists;
        $json['response'] = 1;
        $json['message'] = "success";
        return response()->json($json);
    }

    // list of business - Searching

    public function CategoryBusinessListSearch($id, $business)
    {
        $BusinessLists = Business::CategoryBusinessListSearching($id, $business);
        $json['business'] = $BusinessLists;
        $json['response'] = 1;
        $json['message'] = "success";
        return response()->json($json);
    }



    public function listCategory($id, Request $request)
    {
        // $lat = $request->lat;
        // $lng = $request->lng;
        // $asc = $request->asc;
        // $val = array();
        $val = $request->area;
        // $area = $request->area{array()};
        return $val[1];
    }

 
        public function getMainCategories(){
        try{
            $categories = Category::subcategories();
            return response()->json($categories,200);
        }catch (\Exception $ex){
            return response()->json($ex->getMessage(),500);
        }
    }

    public function getSubCategories(Request $request){
        try{
            $categories = Category::select('name','id','nameArb','icon','color')->where('parent',$request->id);
            if($request->filled('search')){
                $categories = $categories->where('name','LIKE','%'.$request->search.'%')->orWhere('nameArb','LIKE','%'.$request->search.'%');
            }
            return response()->json($categories->get(),200);
        }catch (\Exception $ex){
            return response()->json($ex->getMessage(),500);
        }
    }

    public function getCategoryBusinessList(Request $request)
    {

         try{
            $search = "";
            if($request->filled('search')){
               $search = $request->search;
            }
            $CategoryTag = [];
//            $business = Business::with(['reviews']);
            //select('business.registerId', 'business.companyname', 'business.companynameArb', 'business.companylocation', 'business.companylocationArb', 'business.companycategory', 'business.lat', 'business.lng', 'business.profile_image', 'business.background_image')
            $category = Category::where('id', $request->id)->get();
            $count_find = count($category);
            if($count_find)
            {
                foreach ($category as $categoryVal){
                    $parent[] = [$categoryVal->id];
                    $val = count($parent);
                    $count = 0;
                    $category = array();
                    $CategoryTag = array();
                    while($count < $val){
                        $listBuss =Business::findCategoryBusiness($parent[$count],$request);
                        $categoryTag = Category::APICategoryTagList($parent[$count]);

                        for ($i=0; $i < count($listBuss) ; $i++) {

                            array_push($category, $listBuss[$i]);
                        }
                        for ($i=0; $i < count($categoryTag) ; $i++) {
                            array_push($CategoryTag, $categoryTag[$i]);
                        }

                        $count++;
                    }
                }
            }
            else{
                $category = Business::findCategoryBusiness($request->id,$request->search);
                $CategoryTag = Category::APICategoryTagList($request->id);
            }
            foreach($category as $b){
                $working = DB::table('workinghours')
                    ->select('workinghours.Monday', 'workinghours.Tuesday', 'workinghours.Wednesday', 'workinghours.Thursday', 'workinghours.Friday', 'workinghours.Saturday', 'workinghours.Sunday')
                    ->Where('workinghours.RegisterId', '=', $b['registerId'])
                    ->get();
                $timer = "";
                foreach ($working as $date){
                    // $timer= Business::working($date);
                    // $day = [$date->monday];
                    $Monday = $date->Monday;
                    $Tuesday = $date->Tuesday;
                    $Wednesday = $date->Wednesday;
                    $Thursday = $date->Thursday;
                    $Friday = $date->Friday;
                    $Saturday = $date->Saturday;
                    $Sunday = $date->Sunday;
                    $day = date("l");

                    $time = strtotime(date("h:i A"));

                    if($day == "Monday" && $Monday != "24 Hours"){
                        $timeer = (explode(" - ", $date->Monday));
                        $start = strtotime($timeer[0]) ;
                        $end = strtotime($timeer[1]) ;
                        // if($start <= $time && $time <= $end)
                        // {
                        //     $timer = "Open Now";
                        // }
                        // else
                        // {
                        //     $timer = "Close";
                        // }
                        if($end < $start){
                            if($start <= $time )
                            {
                                 $timer = "Open Now";
                            }
                            else
                            {
                                 $timer = "Close";
                            }
                        }
                        else{                
                            if($start <= $time && $time <= $end)
                                {
                                    $timer = "Open Now";
                                }
                            else
                                {
                                    $timer = "Close";
                                }
                        }
                    }
                    elseif ($day == "Tuesday" && $Tuesday != "24 Hours") {
                        $timeer = (explode(" - ", $date->Tuesday));
                        $start = strtotime($timeer[0]) ;
                        $end = strtotime($timeer[1]) ;
                        // if($start <= $time && $time <= $end)
                        // {
                        //     $timer = "Open Now";
                        // }
                        // else
                        // {
                        //     $timer = "Close";
                        // }
                                                if($end < $start){
                            if($start <= $time )
                            {
                                 $timer = "Open Now";
                            }
                            else
                            {
                                 $timer = "Close";
                            }
                        }
                        else{                
                            if($start <= $time && $time <= $end)
                                {
                                    $timer = "Open Now";
                                }
                            else
                                {
                                    $timer = "Close";
                                }
                        }
                    }
                    elseif ($day == "Wednesday" && $Wednesday != "24 Hours") {
                        $timeer = (explode(" - ", $date->Wednesday));

                        $start = strtotime($timeer[0]) ;
                        $end = strtotime($timeer[1]) ;

                        // if($start <= $time && $time <= $end)
                        // {
                        //     $timer = "Open Now";
                        // }else
                        // {
                        //     $timer = "Close";
                        // }
                                                if($end < $start){
                            if($start <= $time )
                            {
                                 $timer = "Open Now";
                            }
                            else
                            {
                                 $timer = "Close";
                            }
                        }
                        else{                
                            if($start <= $time && $time <= $end)
                                {
                                    $timer = "Open Now";
                                }
                            else
                                {
                                    $timer = "Close";
                                }
                        }
                    }
                    elseif ($day == "Thursday" && $Thursday != "24 Hours") {
                        $timeer = (explode(" - ", $date->Thursday));
                        $start = strtotime($timeer[0]) ;
                        $end = strtotime($timeer[1]) ;
                        // if($start <= $time && $time <= $end)
                        // {
                        //     $timer = "Open Now";
                        // }
                        // else
                        // {
                        //     $timer = "Close";
                        // }
                        if($end < $start){
                            if($start <= $time )
                            {
                                 $timer = "Open Now";
                            }
                            else
                            {
                                 $timer = "Close";
                            }
                        }
                        else{                
                            if($start <= $time && $time <= $end)
                                {
                                    $timer = "Open Now";
                                }
                            else
                                {
                                    $timer = "Close";
                                }
                        }
                    }
                    elseif ($day == "Friday" && $Friday != "24 Hours") {
                        $timeer = (explode(" - ", $date->Friday));
                        $start = strtotime($timeer[0]) ;
                        $end = strtotime($timeer[1]) ;
                        // if($start <= $time && $time <= $end)
                        // {
                        //     $timer = "Open Now";
                        // }
                        // else
                        // {
                        //     $timer = "Close";
                        // }
                        
                        if($end < $start){
                            if($start <= $time )
                            {
                                 $timer = "Open Now";
                            }
                            else
                            {
                                 $timer = "Close";
                            }
                        }
                        else{                
                            if($start <= $time && $time <= $end)
                                {
                                    $timer = "Open Now";
                                }
                            else
                                {
                                    $timer = "Close";
                                }
                        }
                    }
                    elseif ($day == "Saturday" && $Saturday != "24 Hours") {

                        $timeer = (explode(" - ", $date->Saturday));
                        $start = strtotime($timeer[0]) ;
                        $end = strtotime($timeer[1]) ;
                        // if($start <= $time && $time <= $end)
                        // {
                        //     $timer = "Open Now";
                        // }
                        // else
                        // {
                        //     $timer = "Close";
                        // }
                       if($end < $start){
                            if($start <= $time )
                            {
                                 $timer = "Open Now";
                            }
                            else
                            {
                                 $timer = "Close";
                            }
                        }
                        else{                
                            if($start <= $time && $time <= $end)
                                {
                                    $timer = "Open Now";
                                }
                            else
                                {
                                    $timer = "Close";
                                }
                        }
                    }
                    elseif ($day == "Sunday" && $Sunday != "24 Hours") {
                        $timeer = (explode(" - ", $date->Sunday));
                        $start = strtotime($timeer[0]) ;
                        $end = strtotime($timeer[1]) ;
                        // if($start <= $time && $time <= $end)
                        // {
                        //     $timer = "Open Now";
                        // }
                        // else
                        // {
                        //     $timer = "Close";
                        // }
                        if($end < $start){
                            if($start <= $time )
                            {
                                 $timer = "Open Now";
                            }
                            else
                            {
                                 $timer = "Close";
                            }
                        }
                        else{                
                            if($start <= $time && $time <= $end)
                                {
                                    $timer = "Open Now";
                                }
                            else
                                {
                                    $timer = "Close";
                                }
                        }
                    }
                    else{
                        $timer = "Open Now";
                    }

                }
                $b['time'] = $timer;
            }
            $json['business'] = $category;
            $json['categoryTag'] = $CategoryTag;

            return response()->json($json,200);
        }catch(\Exception $ex){
            return response()->json([$ex->getMessage(),$ex->getFile(),$ex->getLine()],500);
        }
    }
}
