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
        <li class="active">Add New News</li>
      </ul><!-- /.breadcrumb -->




      <!-- BODY SECTION -->
      <div class="page-content">
        <div class="page-header">
          <h1>New News</h1>
        </div><!-- /.page-header -->
        <div class="update clearfix">

          <div class="business-add col-md-12 col-sm-12">


                <!-- <h2  class="dashbord-heading">Add Your New Business</h2> -->
    <div class="adding-new-bussines col-md-12 col-sm-12">
      <form action="{{ route('news.store') }}" method="POST" role="form" name="addproduct" enctype="multipart/form-data" id="myform"  onsubmit = "return validateNews(this)">
      @csrf
             <div class="form-elements col-md-12 col-sm-12">
                  <label class="col-sm-2 control-label no-padding-right"  > Heading <span class="require">*</span> </label>
                  <div class="col-sm-10">
                    <input type="text" id="form-field-1" class="companyname" name="headingen" placeholder="Name (English)*">
                  </div>
									<label class="col-sm-2 control-label no-padding-right"  > Heading (Arabic)<span class="require">*</span></label>

                  <div class="col-sm-10">
                    <input type="text" id="form-field-1" class="companyname"  name="headingarb"  placeholder="Name (Arabic)*">
                  </div>
                </div>
                <div class="form-elements col-md-12 col-sm-12">
                  <label class="col-sm-2 control-label no-padding-right" > Content Description<span class="require">*</span></label>
                  <div class="col-sm-10">
                    <textarea class="tinymce"  id="texteditor" name="contenten" rows="4" style="width: 100%;border: 1px solid #ececec;" ></textarea>
                  </div>
									<label class="col-sm-2 control-label no-padding-right"  style="margin-top: 10px;"> Content Description (Arabic)<span class="require">*</span></label>
                  <div class="col-sm-10"  style="margin-top: 10px;">
                    <textarea class="tinymce"  id="texteditorone" name="contentarb" rows="4" style="width: 100%;border: 1px solid #ececec;" ></textarea>
                  </div>
                </div>
                <div class="form-elements col-md-12 col-sm-12">
                  <label class="col-sm-2 control-label no-padding-right" >Summery<span class="require">*</span></label>
                  <div class="col-sm-10">
                    <textarea  name="summeryen" rows="4" style="width: 100%;border: 1px solid #ececec;resize: none;" ></textarea>
                  </div>
									<label class="col-sm-2 control-label no-padding-right"  style="margin-top: 10px;"> Summery (Arabic)<span class="require">*</span></label>
                  <div class="col-sm-10"  style="margin-top: 10px;">
                    <textarea  name="summeryarb" rows="4" style="width: 100%;border: 1px solid #ececec;resize: none;" ></textarea>
                  </div>
                </div>

                <div class="form-elements col-md-12 col-sm-12" style="margin-top: 10px;">
                      <label class="col-sm-2 control-label no-padding-right" > Category </label>
                      <div class="col-sm-10">
                        <div>
                          <select class="chosen-select form-control" name="category" id="category" data-placeholder="Choose Your" style="border-radius: 15px!important;height: 40px;">
                            <option disabled selected>Select Category</option>
                            @foreach($newcategory as $newcategorys)
                              @if(($groupName= $newcategorys->parent) != "0")
                              <option value="{{ $newcategorys->id}}">{{ $newcategorys->name}}</option>
                              @endif
                            @endforeach
                         </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-elements col-md-12 col-sm-12">
                      <label class="col-sm-2 control-label no-padding-right" > Author </label>
                      <div class="col-sm-10">
                        <div>
                          <select class="chosen-select form-control" name="author" id="form-field-select-2" data-placeholder="Choose Your" style="border-radius: 15px!important;height: 40px;">
                            <option disabled selected>Select Author</option>
                            @foreach($newsauthor as $newsauthors)
                              <option value="{{ $newsauthors->registerid}}">{{ $newsauthors->name}}</option>
                            @endforeach
                         </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-elements col-md-12 col-sm-12 mobile-view-hidden">
                      <label class="col-sm-2 control-label no-padding-right" > Featured News </label>
                      <div class="col-sm-8" style="padding: 0px;">
    	                    <div class="social-media-link col-sm-1">
                            <input type="hidden" id="" name="featured" value="0" style="font-size: 16px;">
                            <input type="checkbox" id="" name="featured" value="1" style="font-size: 16px;">
    	                    </div>
                      </div>
                    </div>



								<div class="form-elements col-md-12 col-sm-12">
                  <label class="col-sm-2 control-label no-padding-right" >  Image<span class="require">*</span></label>
                  <div class="col-sm-3 clearfix">
                    <img id="imageset" style="width: 100%;" src="{{ asset('image/default.jpg') }}" alt="your image" />                    <div class="action-section">
                      <span style="font-size: 17px; background: #000; padding: 8px; color: #fff;">select Image</span>
                      <input type="file" name="image" class="prfl-pic" onchange="newsImg(this);" capture >
                    </div>
									</div>
                  </div>

                <div class="form-elements col-md-8 col-sm-12 action-section-area">
                  <label class="col-sm-3 control-label no-padding-right" >  </label>
                  <div class="col-sm-8">
                    <button class="btn btn-success" type="submit" name="Registersubmit">Submit</button>
                    <button class="btn btn-danger" type="reset" name="button"  onclick="myFunction()">RESET</button>
                  </div>
                </div>
                @csrf
              </form>
</div>

            </div>
  </div><!-- /.nav-search -->
</div>
<!-- BODY SECTION -->



    </div>
  </div><!-- /.nav-search -->
</div>


@endsection
