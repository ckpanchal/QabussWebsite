@extends('Admin.layout.app')
@section('title','Dashboard - Qabuss')
@section('content')

    <!-- Body Section -->
    <div class="main-content">


<div class="main-content-inner">
  <div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
      <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="index.php">Home</a>
      </li>
      <li class="active">Edit Category</li>
    </ul><!-- /.breadcrumb -->

    <!-- BODY SECTION -->
    <div class="page-content">
      <div class="page-header">
        <h1>Edit Category</h1>
      </div><!-- /.page-header -->
      <div class="update clearfix">
                    <div class="business-add col-md-12 col-sm-12">
                          <div class="adding-new-bussines col-md-12 col-sm-12">
                @if(!empty($category))
              <form action="{{ route('category.update',$category->id) }}" method="POST" role="form" name="addproduct" enctype="multipart/form-data" id="myform" onsubmit = "return validateEditCate(this)">
              @csrf
              {{ method_field('PATCH') }}
              <div class="form-elements col-md-8 col-sm-12">
                  <label class="col-sm-4 control-label no-padding-right"  > Category Name  </label>
                  <div class="col-sm-8">
                    <input value="{{ $category->name }}" type="text" id="form-field-1" class="companyname" name="categoryname" placeholder="Category Name (English)*">
                  </div>
                  <label class="col-sm-4 control-label no-padding-right"  > Category Name (Arabic)  </label>
                  <div class="col-sm-8">
                    <input value="{{ $category->nameArb }}" type="text" id="form-field-1" class="companyname"  name="categorynamearb"  placeholder="Category Name (Arabic)*">
                  </div>
                </div>
                <div class="form-elements col-md-8">
                  <label class="col-sm-4 control-label no-padding-right" > Main Category (Arabic)  </label>
                  <div class="col-sm-8">
                    <select class="chosen-select form-control" name="parent" id="Parentcategory" data-placeholder="Choose Your"  style="border-radius: 15px!important;height: 40px;">
                      <option disabled selected>Select Category</option>
                      @foreach($categorys as $categorysingles)
                        @if(($categorysingles->parent) == 0)
                          @if(($categorysingles->id) == ($category->parent))
                          <option selected value="{{ $categorysingles->id}}">{{ $categorysingles->name}}</option>
                          @else
                          <option value="{{ $categorysingles->id}}">{{ $categorysingles->name}}</option>
                          @endif
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-sm-8">
                    <label class="col-sm-4 control-label no-padding-right"  > Category Image  </label>
                    <div class="col-sm-8">
                        <input type="hidden" name="oldimage"  onchange="backreadURL(this);" value="{{ $category->icon }}">
                        <img id="cateImg" style="width: 100px;height: 100px;" src="{{ asset($category->icon) }}" alt="your image" />
                        <div class="action-section">
                            <span style="font-size: 17px; background: #000; padding: 8px; color: #fff;">select Image</span>
                            <input type="file" name="cateimage" class="prfl-pic" onchange="read(this);" capture >
                        </div>
                    </div>
                </div>
                <div class="form-elements col-md-8 col-sm-12 action-section-area">
                  <label class="col-sm-4 control-label no-padding-right" >  </label>
                  <div class="col-sm-8">
                    <button class="btn btn-success" type="submit" name="MainCategorysubmit">Submit</button>
                    <button class="btn btn-danger" type="reset" name="button"  onclick="myFunction()">RESET</button>
                  </div>
                </div>
              </form>
              @endif
            </div>
          </div>
                </div><!-- /.nav-search -->
    </div><!-- BODY SECTION -->
  </div>
</div><!-- /.nav-search -->
</div>





@endsection
