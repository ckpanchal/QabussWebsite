@extends('Admin.layout.app')
@section('title','Dashboard - Qabuss')
@section('content')


<!-- Body Section -->
@foreach($news as $news)
        <div class="main-content">
            <div class="main-content-inner">
                <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Home</a>
                        </li>
                        <li class="active"> NEWS </li>
                    </ul><!-- /.breadcrumb -->

                    <!-- Body Section -->

                    <div class="page-content">
            <div class="page-header">
          <h1>View News</h1>
            </div><!-- /.page-header -->
            <div class="update clearfix">
            <div class="business-add col-md-12 col-sm-12">

                <!-- <h2  class="dashbord-heading">Add Your New Business</h2> -->
                
                <div class="adding-new-bussines col-md-12 col-sm-12">
                @if(!empty($news))
                
                  <form method="POST" role="form" name="addproduct" enctype="multipart/form-data" id="myform">
                  {{ method_field('PATCH') }}
                  <div class="form-elements col-md-12 col-sm-12">
                      <label class="col-sm-2 control-label no-padding-right"  > Heading  </label>
                      <div class="col-sm-10">
                        <input disabled type="text" id="form-field-1" value="{{ $news->headingEn }}" class="companyname" name="CompanyName" placeholder="Name (English)*">
                      </div>
    									<label class="col-sm-2 control-label no-padding-right"  > Heading (Arabic)  </label>

                      <div class="col-sm-10">
                        <input disabled type="text" id="form-field-1" class="companyname" value="{{ $news->headingArb }}"  name="CompanyNameArb"  placeholder="Name (Arabic)*">
                      </div>
                    </div>
                    <div class="form-elements col-md-12 col-sm-12">
                      <label class="col-sm-2 control-label no-padding-right" > Content </label>
                      <div class="col-sm-10">
                        <div style="border: 1px solid #00000026;padding: 5px;margin-bottom: 10px;background: #eee;">
                      @php
                        echo str_replace('<p>', '<p class="text-sans">', $news->descriptionEn );
                      @endphp
                        </div>                      
                      </div>
    									<label class="col-sm-2 control-label no-padding-right" > Content (Arabic)  </label>
                      <div class="col-sm-10">
                      <div style="border: 1px solid #00000026;padding: 5px;margin-bottom: 10px;background: #eee;">
                      @php
                      echo str_replace('<p>', '<p>', $news->descriptionArb );
                      @endphp
                      </div>
                      </div>
                    </div>
                    <div class="form-elements col-md-12 col-sm-12">
                      <label class="col-sm-2 control-label no-padding-right" > Category </label>
                      <div class="col-sm-10">
                        <div style="border: 1px solid #00000026;padding: 5px;margin-bottom: 10px;background: #eee;">
                        @foreach($newcategory as $newcategorys)
                          @if(($groupName= $newcategorys->id) == ( $news->category  ))
													<p>{{ $newcategorys->name }}</p>
                          @endif
                         @endforeach
                      </div>
                    </div>
    									<label class="col-sm-2 control-label no-padding-right" > Featured </label>
                      <div class="col-sm-10">
                        @if(($groupName= $news->feature) == 1)
                          <input type="checkbox" id="" name="featured" checked>
                        @else
                        <input type="checkbox" id="" name="featured">

                        @endif
                        </div>                      
                      </div>
                    <div class="form-elements col-md-12 col-sm-12">
                      <label class="col-sm-2 control-label no-padding-right" > Author </label>
                      <div class="col-sm-10">
												<div style="border: 1px solid #00000026;padding: 5px;margin-bottom: 10px;background: #eee;">
                          @foreach($newsauthor as $newsauthors)
                          @if(( $newsauthors->registerid ) == ( $news->author  ))
                                <option value="{{ $newsauthors->registerid}}">{{ $newsauthors->name}}</option>    
                            @endif
                          @endforeach
                        </div>                      
                      </div>
                    </div>
                    </div>
                    <div class="form-elements col-md-12 col-sm-12">

                    <div class="form-elements col-md-8 col-sm-12">
                      <label class="col-sm-3 control-label no-padding-right" > Profile Image </label>
                      <div class="col-sm-4 clearfix">
                        <img id="prfl" style="border: 1px solid #00000026;width: 100%;margin-bottom: 10px;" src="{{ asset($news->image) }}" alt="your image" />
                        <input type="hidden" name="Profileimage" class="prfl-pic" onchange="backreadURL(this);" >
    									</div>
                      </div>
                      </div>
                  @endif
                  </form>
                </div>
              </div>
            </div><!-- /.nav-search -->
          </div>
          <!-- BODY SECTION -->
        </div>
  </div><!-- /.nav-search -->
</div>

@endforeach







@endsection
