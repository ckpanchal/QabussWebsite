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

use Category;
use CategoryTag;

class CategorytagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = [];
        $category['Category'] = Category::all();
        $data = [];
        $data['category'] = CategoryTag::all();
        return view('Admin.Category.Tagindex', $data, $category);
        // ret
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['category'] = Category::all();
        return view('Admin.Category.AddTag', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new CategoryTag();
        $category->nameEn = $request->tagname;
        $category->nameArb = $request->tagnamearb;
        $category->parent = $request->Parentcategory;

        // Tag

        // if($request->Parentcategory != ''){
        //     $category->tag = $request->Parentcategory;
        // }
        // else{
        //     $category->tag = "0";
        // }

        $category->save();
        return redirect()->route('categorytag.index');
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
        $data = [];
        $data['category'] = Category::findorfail($id);
        $Cate = [];
        $Cate['categorys'] = Category::all();
        return view('Admin.Category.EditTagCategory', $data, $Cate);
        // return $data;
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
        $category = Category::findorfail($id);
        $category->name = $request->tagname;
        $category->nameArb = $request->tagnamearb;
        $category->tag = $request->parent;
        $category->save();
        return redirect()->route('categorytag.index');
        // return $category;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::FindorFail($id);
        $category->delete();
        return redirect()->route('categorytag.index');
    }
}
