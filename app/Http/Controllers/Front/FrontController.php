<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Category;
use Business;
use Slider;
use Events;
use Offers;
use Facilities;
use Review;
use Socialmedia;
use Time;
use Workinghour;
use News;
use NewsAuthor;
use NewsCategory;
use Location;

use Illuminate\Support\Facades\Session;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function switchLang(Request $request)
    {

        if (1 == $request->lang) {
            Session::put('language', 'en');
        } else {
            Session::put('language', 'ar');
        }
    }

    public function index()
    {
        $data = array(
            'slider' => Slider::all(),
            'featuredbusiness' => business::FeaturedBusiness(),
            'event' => Events::getEvent(),
            'offers' => Offers::getOffers(),
            'news' => News::getNews(),
            'newsauthor' => NewsAuthor::all(),
            'newscategory' => NewsCategory::all(),
        );
        $count = array(
            'restaurants' => Business::where('companycategory', 21)->get()->count(),
            'it' => Business::where('companycategory', 62)->get()->count(),
            'trading' => Business::where('companycategory', 63)->get()->count(),
            'construction' => Business::where('companycategory', 66)->get()->count(),
            'saloons' => Business::where('companycategory', 50)->get()->count(),
            'hotel' => Business::where('companycategory', 25)->get()->count(),

        );
        return view('Front.index', $data, $count);
        // return $count;
    }

    public function searching(Request $request)
    {
        $Search = $request->search;

        $data = array(
            'category' =>  Category::FindSubCategory(),
            'maincategory' => Category::FindMainCategory(),
            'business' =>  Business::ListSearchBusiness($Search),
            'location' =>  Location::all(),

        );
        return view('Front.listing', $data);
        // return $data;
    }

    public function HomeMainCategory($id)
    {
        $category = Category::where('parent', $id)->get();
        $count_find = count($category);

        foreach ($category as $categoryVal){
            $parent[] = [$categoryVal->id];
            $val = count($parent);
            $count = 0;
            $category = array();
            while($count < $val){
                $listBuss = Business::HomeMainCategory($parent[$count]);

                for ($i=0; $i < count($listBuss) ; $i++) {
                    array_push($category, $listBuss[$i]);
                }
                $count++;
            }
        }

        $data = array(
            'maincategory' => Category::FindMainCategory(),
            'category' =>  Category::FindSubCategory(),
            'business' =>  $category,
        );
        return view('Front.listing', $data);
        // return $data;
    }

    public function listing(Request $request)
    {
        $search = $request->search;
        $location = $request->location;
        $category = $request->category;
        if(($search) && ($category) && ($location)){
             $business =  Business::ListBusiness();
        }
        
        elseif (($search) && ($category) || ($location)) {
            $business =  Business::ListBusiness();

        }
        elseif (($search) && ($location) || ($category)) {
            $business =  Business::ListBusiness();

        }
        elseif (($category) && ($location) || ($search)) {
            $business =  Business::ListBusiness();

        }
        else {
                $business =  Business::ListBusiness();
        }
        
        $data = array(
            'maincategory' => Category::FindMainCategory(),
            'category' =>  Category::FindSubCategory(),
            'business' =>  $business,
            'location' =>  Location::all(),
        );
        return view('Front.listing', $data);


        // return $data;
    }

    public function single($id)
    {
        $data = array(
            'businesses' =>  Business::ListBusiness(),
            'business' => Business::where('registerId', $id)->get(),
            'facilities' => Facilities::where('registerId', $id)->get(),
            'socialmedia' => Socialmedia::where('registerId', $id)->get(),
            'workinghour' => Workinghour::where('registerId', $id)->get(),
        );
        return view('Front.single', $data);
        // return $data;

    }

    public function listings($id)
    {
        $category = Category::where('parent', $id)->get();
        if($category)
        {
            $count_find = count($category);
            foreach ($category as $categoryVal){
                $parent[] = [$categoryVal->id];
                $val = count($parent);
                $count = 0;
                $category = array();
                while($count < $val){
                    $listBuss = Business::HomeMainCategory($parent[$count]);

                    for ($i=0; $i < count($listBuss) ; $i++) {
                        array_push($category, $listBuss[$i]);
                    }
                    $count++;
                }
            }

            $data = array(
                'maincategory' => Category::FindMainCategory(),
                'category' =>  Category::FindSubCategory(),
                'business' =>  $category,
                'location' =>  Location::all(),
                
            );
            return view('Front.listing', $data);
            // return $data;
        }
        else{
            $data = array(
                'maincategory' => Category::FindMainCategory(),
                'category' =>  Category::FindSubCategory(),
                'business' =>  Business::CategoryListBusiness($id),
                'id' =>  $id,
                'location' =>  Location::all(),

            );
            return view('Front.listing', $data);
            // return $data;
        }


    }

    public function event()
    {
        $data['event'] = Events::getEvent();
        return view('Front.event', $data);
        // return $data;
    }

    public function eventdetails($id)
    {
        $data = array(
            'event' => Events::getEventData($id),
            'related' => Events::getRelatedEvent($id),
        );
        return view('Front.eventdetails', $data);
        // return $data;
    }

    public function offer()
    {
        $day = date("Y-m-d");
        $data['offer'] = Offers::getOffers($day);
        $Cate['categorys'] = Category::Get();
        return view('Front.offer', $data, $Cate);
        // return $data;
    }
    public function offerdetails($id)
    {
        $data = array(
            'offers' => Offers::getOfferData($id),
            'categorys' => Category::Get(),
            'related' => Offers::getRelatedOffer($id),
        );
        return view('Front.offerdetails', $data);
        // return $data;
    }

    public function news()
    {
        $data = array(
            'slider' => Slider::all(),

            'news' => News::getNewsMain(),
            'newsauthor' => NewsAuthor::all(),
            'newscategory' => NewsCategory::all(),
        );
        return view('Front.news', $data);
  
    }

    public function offerview($id)
    {
        
        $offer['offer'] = Offers::where('offerid', $id)->first();
        return view('Front.offerview', $offer);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
