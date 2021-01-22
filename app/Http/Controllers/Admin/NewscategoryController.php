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

use NewsCategory;

class NewscategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['newscategory'] = NewsCategory::all();
        return view('Admin.News.NewsCategory', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['newscategory'] = NewsCategory::all();
        return view('Admin.News.AddNewsCategory', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newcategory = new NewsCategory();
        $newcategory->name = $request->categoryname;
        $newcategory->nameArb = $request->categorynamearb;

        if($request->Parentcategory != ''){
            $newcategory->parent = $request->Parentcategory;
        }
        else{
            $newcategory->parent = "0";
        }
   
        $newcategory->save();
        return redirect()->route('newscategory.index');
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
        $category = [];
        $category['category'] = NewsCategory::all();
        $data = [];
        $data['newscategory'] = NewsCategory::findorfail($id);
        return view('Admin.News.EditNewsCategory', $data, $category);
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
        $category = NewsCategory::findorfail($id);
        $category->name = $request->name;
        $category->nameArb = $request->nameArb;
        $category->parent = $request->Parentcategory;

        $category->save();
        return redirect()->route('newscategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = NewsCategory::where('id', $id)->first();
        $news->delete();
        return redirect()->route('newscategory.index');
    }
}
