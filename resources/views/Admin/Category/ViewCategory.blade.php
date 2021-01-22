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
          <a href="#">Home</a>
        </li>
        <li class="active">Category</li>
      </ul><!-- /.breadcrumb -->
      @if(!empty($category))
      <!-- BODY SECTION -->
      <div class="page-content">
        <div class="page-header">
          <h1>{{ $category->Name }}</h1>
        </div><!-- /.page-header -->
        <div class="update clearfix">
          <div class="business-add col-md-12 col-sm-12">

                <!-- <h2  class="dashbord-heading">Add Your New Business</h2> -->

                <div class="adding-new-bussines col-md-12 col-sm-12">

                  <form method="POST" role="form" name="addproduct" enctype="multipart/form-data" id="myform" onsubmit = "return validate(this)">
                {{ method_field('PATCH') }}
                <div class="form-elements col-md-8 col-sm-12">
                      <label class="col-sm-3 control-label no-padding-right" > Name (English)  </label>
                      <div class="col-sm-9">
                        <input disabled type="text" id="form-field-1" value="{{ $category->name }}" class="companyname" name="companyname" placeholder="Name">
                      </div>
                      <label class="col-sm-3 control-label no-padding-right" > Name (Arabic)  </label>
                      <div class="col-sm-9">
                        <input disabled type="text" id="form-field-1" value="{{ $category->nameArb }}" class="companyname" name="companyname" placeholder="Name">
                      </div>
                      @foreach($categorys as $categorysingles)
                        @if(($categorysingles->id) == ($category->parent))
                          <label class="col-sm-3 control-label no-padding-right" > Main Category (Arabic)  </label>
                          <div class="col-sm-9">
                              <input disabled type="text" id="form-field-1" value="{{ $categorysingles->name }}" class="companyname" name="companyname" placeholder="Name">
                          </div>
                        @endif
                      @endforeach
                      <label class="col-sm-3 control-label no-padding-right" > Category Image </label>
                    <div class="col-sm-4 clearfix">
                      <img id="bckgrd" style="width: 100px;" src="{{ asset($category->icon) }}"  alt="your image" />
                    </div>


                      </div>
                  </form>
                </div>
              </div>
            </div><!-- /.nav-search -->
          </div>
          <!-- BODY SECTION -->
          @endif

        </div>
  </div><!-- /.nav-search -->
</div>


@endsection

