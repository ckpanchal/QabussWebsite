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

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['category'] = Category::all();
        return view('Admin.Category.index', $data);
        // return $data;
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
        return view('Admin.Category.AddCategory', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->categoryname;
        $category->nameArb = $request->categorynamearb;
        $category->color = $request->iconcolor;
        $category->tag = "0";
        $name = "QBC" . rand(999, 9999999).".png";

        // category image

        $image = $request->file('cateimage');
        $main_image_src = '/image/category/'.$name;
        $imagepath = 'image/category/';
        $image->move($imagepath, $main_image_src);

        $category->icon = $main_image_src;

        // category parent

        if($request->Parentcategory != ''){
            $category->parent = $request->Parentcategory;
        }
        else{
            $category->parent = "0";
        }

        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [];
        $data['category'] = Category::where('id', $id)->first();
        $Cate = [];
        $Cate['categorys'] = Category::all();
        return view('Admin.Category.ViewCategory', $data, $Cate);
        // return $data;
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
        return view('Admin.Category.EditCategory', $data, $Cate);
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
        $category->name = $request->categoryname;
        $category->nameArb = $request->categorynamearb;
        $category->parent = $request->parent;
        $name = "QBC" . rand(999, 9999999).".png";

        // category image

        if($request->cateimage != ''){

        $image = $request->file('cateimage');
        $main_image_src = '/image/category/'.$name;
        $imagepath =public_path('/image/category/');
        $image->move($imagepath, $main_image_src);

        $category->icon = $main_image_src;
        }
        else{
            $category->icon = $request->oldimage;
        }

        // category parent

        if($request->parent != ''){
            $category->parent = $request->parent;
        }
        else{
            $category->parent = "0";
        }

        $category->save();
        return redirect()->route('category.index');
        // return $main_image_src;
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
        return redirect()->route('category.index');
    }
}
