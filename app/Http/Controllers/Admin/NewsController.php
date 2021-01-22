<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

use News;
use NewsAuthor;
use NewsCategory;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'news' => News::all(),
            'author' => NewsAuthor::all(),
            'category' => NewsCategory::all(),
        );
        return view('Admin.News.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newcategory = [];
        $newcategory['newcategory'] = NewsCategory::all();
        $newsauthor = [];
        $newsauthor['newsauthor'] = NewsAuthor::all();
        return view('Admin.News.AddNews', $newcategory, $newsauthor);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = new News();
        $id  = "QNEWS" . rand(999, 9999999);
        $news->registerid = $id;
        $news->headingEn = $request->headingen;
        $news->headingArb = $request->headingarb;
        $news->descriptionEn = $request->contenten;
        $news->descriptionArb = $request->contentarb;
        $news->summeryEn = $request->summeryen;
        $news->summeryArb = $request->summeryarb;
        $news->author = $request->author;
        $news->category = $request->category;
        $news->feature = $request->featured;
        $news->view = "0";
        $news->maincategory = "0";

        // image
        $image = $request->file('image');
        $main_image_src = 'image/News/'.$id.".png";
        $imagepath = 'image/News/';
        $image->move($imagepath, $main_image_src);

        $news->Image = $main_image_src;
        // image


        $news->save();
        // (new \App\Libraries\NotificationLib())->sendNotification($news->headingEn,$news->headingArb,substr(strip_tags($news->descriptionEn),0,50),substr(strip_tags($news->descriptionArb),0,50),url($main_image_src),'App\Model\News',$news->id,$news);
        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = [];
        $news['news'] = News::WebFindNews($id);
        $data = array(
            'newcategory' => NewsCategory::all(),
            'newsauthor' => NewsAuthor::all(),
        );

        return view('Admin.News.ViewNews', $news, $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = [];
        $news['news'] = News::WebFindNews($id);
        $data = array(
            'newcategory' => NewsCategory::all(),
            'newsauthor' => NewsAuthor::all(),
        );
        return view('Admin.News.EditNews', $news, $data);
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
        $news = News::where('RegisterId', $id)->first();
        $news->headingEn = $request->headingen;
        $news->headingArb = $request->headingarb;
        $news->descriptionEn = $request->contenten;
        $news->descriptionArb = $request->contentarb;
        $news->summeryEn = $request->summeryen;
        $news->summeryArb = $request->summeryarb;
        $news->category = $request->category;
        $news->author = $request->author;
        $news->feature = $request->featured;


        // image
        if($request->image != '')
        {
            $image = $request->file('image');
            $main_image_src = '/image/News/'.$id.".png";
            $imagepath = 'image/News/';

            $image->move($imagepath, $main_image_src);

            $news->image = $main_image_src;
        }
        else{
            $news->image = $request->oldimage;
        }
        // image

        $news->save();
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::where('registerid', $id)->first();
        $news->delete();
        return redirect()->route('news.index');
    }
}
