@extends('Admin.layout.app')
@section('title','Dashboard - Qabuss')
@section('content')

 <!-- Body Area -->

 <div class="main-content">
    <div class="main-content-inner">
      <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
          <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="#">Home</a>
          </li>
          <li class="active"><a href="{{ route('profile.index')}}">profile</a></li>
          <li class="active"><a href="{{ route('profile.businessview', Auth::user()->registerid)}}">Business</a></li>
          <li class="active">Edit Business</li>
        </ul><!-- /.breadcrumb -->
          <!-- Body Section -->
          <div class="page-content">
            <div class="page-header">
              <h1>Edit Business</h1>
            </div><!-- /.page-header -->
            <div class="update clearfix">
              <div class="business-add col-md-12 col-sm-12">
                <div class="adding-new-bussines col-md-12 col-sm-12">
                  @if(!empty($business))
                  <form action="{{ route('profile.businessupdate',$business->registerId) }}" method="POST" role="form" name="addproduct" enctype="multipart/form-data" id="myform" onsubmit = "return validateEditBusiness(this)">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="form-elements col-md-12 col-sm-12">
                      <label class="col-sm-3 control-label no-padding-right"  > Company Name  <span class="form-require">*</span><span style="float: right;">:</span></label>
                      <div class="col-sm-9">
                        <input value="{{ $business->companyname }}" type="text" id="form-field-1" class="companyname" name="companyname" placeholder="Name (English)*">
                      </div>
                      <label class="col-sm-3 control-label no-padding-right"  > Company Name (Arabic)  <span class="form-require">*</span><span style="float: right;">:</span></label>
                      <div class="col-sm-9">
                        <input value="{{ $business->companynameArb }}" type="text" id="form-field-1" class="companyname"  name="companynamearb"  placeholder="Name (Arabic)*">
                      </div>
                    </div>
                    <div class="form-elements col-md-12 col-sm-12" >
                      <label class="col-sm-3 control-label no-padding-right" > Company Description <span class="form-require">*</span><span style="float: right;">:</span></label>
                      <div class="col-sm-9" style="margin-bottom: 10px;">
                        <textarea class="tinymce"  id="texteditor" name="companydesc" rows="4" style="width: 100%;border: 1px solid #ececec;" ><p>{{ $business->companydescription }}</p></textarea>
                      </div>
                      <label class="col-sm-3 control-label no-padding-right" > Company Description (Arabic)  <span class="form-require">*</span><span style="float: right;">:</span></label>
                      <div class="col-sm-9" style="margin-bottom: 10px;">
                        <textarea class="tinymce"  id="texteditor" name="companydescarb" rows="4" style="width: 100%;border: 1px solid #ececec;" ><p>{{ $business->companydescriptionArb }}</p></textarea>
                      </div>
                    </div>
                    <div class="form-elements col-md-12 col-sm-12">
                      <label class="col-sm-3 control-label no-padding-right" > Company Tagline <span class="form-require">*</span><span style="float: right;">:</span></label>
                      <div class="col-sm-9">
                        <textarea name="companytag" placeholder="Company Tagline(English)*" rows="2" style="width: 100%;border: 1px solid #ececec;">{{ $business->company_tagline }}</textarea>
                      </div>
                      <label class="col-sm-3 control-label no-padding-right" > Company Tagline (Arabic) <span class="form-require">*</span><span style="float: right;">:</span></label>
                      <div class="col-sm-9">
                        <textarea name="companytagarb" placeholder="Company Tagline(Arabic)*"rows="2" style="width: 100%;border: 1px solid #ececec;">{{ $business->company_taglineArb }}</textarea>
                      </div>
                    </div>
                    <div class="form-elements col-md-12 col-sm-12"  style="margin-bottom: 10px;">
                      <label class="col-sm-3 control-label no-padding-right" > Municipality<span class="form-require">*</span><span style="float: right;">:</span></label>
                      <div class="col-sm-9">
                        <select required class="chosen-select form-control" name="Municipality"  style="border-radius: 15px!important;height: 40px;">
                          <option disabled selected value="0">Select Category</option>
                          @foreach($location as $locations)
                            @if(($locations->id) == ( $business->location ))
                              <option selected value="{{ $locations->id}}">{{ $locations->locationEn}}</option>
                            @else
                              <option value="{{ $locations->id}}">{{ $locations->locationEn}}</option>
                            @endif

                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-elements col-md-12 col-sm-12"  style="margin-bottom: 10px;">
                      <label class="col-sm-3 control-label no-padding-right" > Company Address (En)<span class="form-require">*</span><span style="float: right;">:</span></label>
                      <div class="col-sm-9">
                        <input value="{{ $business->companylocation }}" type="text"  style="width: 100%;" name="companylocation" placeholder="Al Mathar Al Qadeem, Doha, Qatar(English)"  >
                      </div>
                    </div>
                    <div class="form-elements col-md-12 col-sm-12"  style="margin-bottom: 10px;">
                      <label class="col-sm-3 control-label no-padding-right" > Company Address (Ar)<span class="form-require">*</span><span style="float: right;">:</span></label>
                      <div class="col-sm-9">
                        <input value="{{ $business->companylocationArb }}" type="text"  style="width: 100%;" name="companylocationarb" placeholder="Al Mathar Al Qadeem, Doha, Qatar(Arabic)"  >
                      </div>
                    </div>
                    <div class="form-elements col-md-12 col-sm-12 "  style="margin-bottom: 10px;">
                      <label class="col-sm-3 control-label no-padding-right" > Location<span class="form-require">*</span><span style="float: right;">:</span></label>
                      <div class="col-sm-9">
                        <div class="form-elements col-sm-12 no-padding ">
                          <div class="col-sm-6 no-padding">
                            <input  type="text" id="lat" value="{{ $business->lat }}" class="textcls" name="latitude" placeholder="latitude" style="width: 100%;">
                          </div>
                          <div class="col-sm-6 no-padding-right longitude">
                            <input  type="text" id="long" value="{{ $business->lng }}" class="textcls" name="longitude" placeholder="longitude" style="width: 100%;">
                          </div>
                        </div>
                        <button type="button"  data-toggle="modal" data-target=".bs-example-modal-lg" class="model_img img-responsive btn btn-info">Set Location</button>
                      </div>
                    </div>
                    <div class="form-elements col-md-12 col-sm-12" style="margin-bottom: 10px;">
                      <label class="col-sm-3 control-label no-padding-right" > Company Category <span class="form-require">*</span><span style="float: right;">:</span></label>
                      <div class="col-sm-9">
                        <div>
                          <select class="chosen-select form-control" name="companycategory" id="form-field-select-2" data-placeholder="Choose Your" style="border-radius: 15px!important;height: 40px;">
                            <option disabled selected>Select Category</option>
                            @foreach($category as $categorysingle)
                              @if(($categorysingle->parent) != 0)
                                @if(($categorysingle->id) == ($business->companycategory))
                                  <option selected value="{{ $categorysingle->id}}">{{ $categorysingle->name}}</option>
                                @else
                                  <option value="{{ $categorysingle->id}}">{{ $categorysingle->name}}</option>
                                @endif
                              @endif
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-elements col-md-12 col-sm-12" style="margin-bottom: 10px;">
                      <label class="col-sm-3 control-label no-padding-right" > Company Phone Number <span class="form-require">*</span><span style="float: right;">:</span></label>
                      <div class="col-sm-9">
                        <input value="{{ $business->companyphone }}" type="text" onpaste="return false;" class="companyphonenumber" name="companyphonenumber" maxlength = "8" placeholder="Company Phone Number">
                      </div>
                    </div>
                    <div class="form-elements col-md-12 col-sm-12">
                      <label class="col-sm-3 control-label no-padding-right" > Company Website </label>
                      <div class="col-sm-9">
                        <input value="{{ $business->company_website }}" type="text" class="companywebsite" name="companywebsite" placeholder="www.demo.com">
                      </div>
                    </div>
                    <div class="form-elements col-md-12 col-sm-12">
                      <label class="col-sm-3 control-label no-padding-right" > Company Mail <span class="form-require">*</span><span style="float: right;">:</span></label>
                      <div class="col-sm-9">
                        <input value="{{ $business->company_email }}" type="text" class="companyemail" name="companyemail"  placeholder="info@gmail.com" >
                      </div>
                    </div>

                    @if(!empty($socialmedia))
                      <div class="form-elements col-md-12 col-sm-12">
                        <label class="col-sm-3 control-label no-padding-right" > Social Media <span style="float: right;">:</span></label>
                        <div class="col-sm-9" style="padding: 0px;">
                          <label class="social-media-head col-sm-2 control-label no-padding-right" > Facebook <span style="float: right;">:</span></label>
                          <div class="social-media-link col-sm-10">
                            <input value="{{ $socialmedia->FaceBook }}" type="text" class="companywebsite" name="companyfacebook" placeholder="https://www.facebook.com/">
                          </div>
                          <label class="social-media-head col-sm-2 control-label no-padding-right" > Instagram <span style="float: right;">:</span></label>
                          <div class="social-media-link col-sm-10">
                            <input value="{{ $socialmedia->Instagram }}" type="text" class="companywebsite" name="companyinstagram" placeholder="https://www.instagram.com/">
                          </div>
                          <label class="social-media-head col-sm-2 control-label no-padding-right" > Linkedin <span style="float: right;">:</span></label>
                          <div class="social-media-link col-sm-10">
                            <input value="{{ $socialmedia->Linked }}" type="text" class="companywebsite" name="companylinked" placeholder="https://www.linkedin.com/">
                          </div>
                          <label class="social-media-head col-sm-2 control-label no-padding-right" > Twitter <span style="float: right;">:</span></label>
                          <div class="social-media-link col-sm-10">
                            <input value="{{ $socialmedia->Twitter }}" type="text" class="companywebsite" name="companytwitter" placeholder="https://twitter.com/">
                          </div>
                          <label class="social-media-head col-sm-2 control-label no-padding-right" > Youtube <span style="float: right;">:</span></label>
                          <div class="social-media-link col-sm-10">
                            <input value="{{ $socialmedia->Youtube }}" type="text" class="companywebsite" name="companyyoutube" placeholder="https://www.youtube.com/">
                          </div>
                        </div>
                      </div>
                    @endif

                    @if(!empty($workinghour))
                      <div class="form-elements col-md-12 col-sm-12">
                        <label class="col-sm-3 control-label no-padding-right" > Working Hours <span class="form-require">*</span> <span style="float: right;">:</span></label>
                        <div class="col-sm-9" style="padding: 0px;">
                          <div class="col-sm-12" style="padding: 0px;" >
                            <label class="social-media-head col-sm-2 control-label no-padding-right" > Monday <span style="float: right;">:</span></label>
                            <div class="social-media-link col-sm-5">
                              <select class="chosen-select form-control" name="monstart" id="form-field-select-2" data-placeholder="Choose Your" style="border-radius: 15px!important;height: 40px;">
                                @if(( $workinghour->monday ) == "24 Hours")
                                  @foreach($time as $times)
                                    @if(($times->Time) == "24 Hours")
                                      <option selected value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @else
                                      <option value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @endif
                                  @endforeach
                                @else
                                  <?php
                                  $mon_string = explode(" - ", $workinghour->monday);
                                  $MonStart = $mon_string[0];
                                  ?>
                                  @foreach($time as $times)
                                    @if(($times->Time) == ( $MonStart ))
                                      <option selected value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @else
                                      <option value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @endif
                                  @endforeach
                                @endif
                              </select>
                            </div>
                            <div class="social-media-link col-sm-5">
                              <select class="chosen-select form-control" name="monend" id="form-field-select-2" data-placeholder="Choose Your" style="border-radius: 15px!important;height: 40px;">
                                <option disabled selected>Ending Time</option>
                                @if(( $workinghour->monday ) == "24 Hours")
                                  @foreach($time as $times)
                                    @if(($times->Time) == "24 Hours")
                                      <option selected value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @else
                                      <option value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @endif
                                  @endforeach
                                @else
                                  <?php
                                  $mon_string = explode(" - ", $workinghour->monday);
                                  $MonEnd = $mon_string[1];
                                  ?>
                                  @foreach($time as $times)
                                    @if(($times->Time) == ( $MonEnd ))
                                      <option selected value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @else
                                      <option value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @endif
                                  @endforeach
                                @endif
                              </select>
                            </div>
                          </div>

                          <div class="col-sm-12" style="padding: 0px;" >
                            <label class="social-media-head col-sm-2 control-label no-padding-right" > Tuesday <span style="float: right;">:</span></label>
                            <div class="social-media-link col-sm-5">
                              <select class="chosen-select form-control" name="tuesdaystart" id="form-field-select-2" data-placeholder="Choose Your" style="border-radius: 15px!important;height: 40px;">
                                @if(( $workinghour->tuesday ) == "24 Hours")
                                  @foreach($time as $times)
                                    @if(($times->Time) == "24 Hours")
                                      <option selected value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @else
                                      <option value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @endif
                                  @endforeach
                                @else
                                  <?php
                                  $mon_string = explode(" - ", $workinghour->tuesday);
                                  $MonStart = $mon_string[0];
                                  ?>
                                  @foreach($time as $times)
                                    @if(($times->Time) == ( $MonStart ))
                                      <option selected value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @else
                                      <option value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @endif
                                  @endforeach
                                @endif
                              </select>
                            </div>
                            <div class="social-media-link col-sm-5">
                              <select class="chosen-select form-control" name="tuesdayend" id="form-field-select-2" data-placeholder="Choose Your" style="border-radius: 15px!important;height: 40px;">
                                <option disabled selected>Ending Time</option>
                                @if(( $workinghour->tuesday ) == "24 Hours")
                                  @foreach($time as $times)
                                    @if(($times->Time) == "24 Hours")
                                      <option selected value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @else
                                      <option value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @endif
                                  @endforeach
                                @else
                                  <?php
                                  $mon_string = explode(" - ", $workinghour->tuesday);
                                  $MonEnd = $mon_string[1];
                                  ?>
                                  @foreach($time as $times)
                                    @if(($times->Time) == ( $MonEnd ))
                                      <option selected value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @else
                                      <option value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @endif
                                  @endforeach
                                @endif
                              </select>
                            </div>
                          </div>

                          <div class="col-sm-12" style="padding: 0px;" >
                            <label class="social-media-head col-sm-2 control-label no-padding-right" > wednesday <span style="float: right;">:</span></label>
                            <div class="social-media-link col-sm-5">
                              <select class="chosen-select form-control" name="wednesdaystart" id="form-field-select-2" data-placeholder="Choose Your" style="border-radius: 15px!important;height: 40px;">
                                @if(( $workinghour->wednesday ) == "24 Hours")
                                  @foreach($time as $times)
                                    @if(($times->Time) == "24 Hours")
                                      <option selected value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @else
                                      <option value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @endif
                                  @endforeach
                                @else
                                  <?php
                                  $mon_string = explode(" - ", $workinghour->wednesday);
                                  $MonStart = $mon_string[0];
                                  ?>
                                  @foreach($time as $times)
                                    @if(($times->Time) == ( $MonStart ))
                                      <option selected value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @else
                                      <option value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @endif
                                  @endforeach
                                @endif
                              </select>
                            </div>
                            <div class="social-media-link col-sm-5">
                              <select class="chosen-select form-control" name="wednesdayend" id="form-field-select-2" data-placeholder="Choose Your" style="border-radius: 15px!important;height: 40px;">
                                <option disabled selected>Ending Time</option>
                                @if(( $workinghour->wednesday ) == "24 Hours")
                                  @foreach($time as $times)
                                    @if(($times->Time) == "24 Hours")
                                      <option selected value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @else
                                      <option value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @endif
                                  @endforeach
                                @else
                                  <?php
                                  $mon_string = explode(" - ", $workinghour->wednesday);
                                  $MonEnd = $mon_string[1];
                                  ?>
                                  @foreach($time as $times)
                                    @if(($times->Time) == ( $MonEnd ))
                                      <option selected value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @else
                                      <option value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @endif
                                  @endforeach
                                @endif
                              </select>
                            </div>
                          </div>

                          <div class="col-sm-12" style="padding: 0px;" >
                            <label class="social-media-head col-sm-2 control-label no-padding-right" > thursday <span style="float: right;">:</span></label>
                            <div class="social-media-link col-sm-5">
                              <select class="chosen-select form-control" name="thursdaystart" id="form-field-select-2" data-placeholder="Choose Your" style="border-radius: 15px!important;height: 40px;">
                                @if(( $workinghour->thursday ) == "24 Hours")
                                  @foreach($time as $times)
                                    @if(($times->Time) == "24 Hours")
                                      <option selected value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @else
                                      <option value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @endif
                                  @endforeach
                                @else
                                  <?php
                                  $mon_string = explode(" - ", $workinghour->thursday);
                                  $MonStart = $mon_string[0];
                                  ?>
                                  @foreach($time as $times)
                                    @if(($times->Time) == ( $MonStart ))
                                      <option selected value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @else
                                      <option value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @endif
                                  @endforeach
                                @endif
                              </select>
                            </div>
                            <div class="social-media-link col-sm-5">
                              <select class="chosen-select form-control" name="thursdayend" id="form-field-select-2" data-placeholder="Choose Your" style="border-radius: 15px!important;height: 40px;">
                                <option disabled selected>Ending Time</option>
                                @if(( $workinghour->thursday ) == "24 Hours")
                                  @foreach($time as $times)
                                    @if(($times->Time) == "24 Hours")
                                      <option selected value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @else
                                      <option value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @endif
                                  @endforeach
                                @else
                                  <?php
                                  $mon_string = explode(" - ", $workinghour->thursday);
                                  $MonEnd = $mon_string[1];
                                  ?>
                                  @foreach($time as $times)
                                    @if(($times->Time) == ( $MonEnd ))
                                      <option selected value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @else
                                      <option value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @endif
                                  @endforeach
                                @endif
                              </select>
                            </div>
                          </div>

                          <div class="col-sm-12" style="padding: 0px;" >
                            <label class="social-media-head col-sm-2 control-label no-padding-right" > friday <span style="float: right;">:</span></label>
                            <div class="social-media-link col-sm-5">
                              <select class="chosen-select form-control" name="fridaystart" id="form-field-select-2" data-placeholder="Choose Your" style="border-radius: 15px!important;height: 40px;">
                                @if(( $workinghour->friday ) == "24 Hours")
                                  @foreach($time as $times)
                                    @if(($times->Time) == "24 Hours")
                                      <option selected value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @else
                                      <option value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @endif
                                  @endforeach
                                @else
                                  <?php
                                  $mon_string = explode(" - ", $workinghour->friday);
                                  $MonStart = $mon_string[0];
                                  ?>
                                  @foreach($time as $times)
                                    @if(($times->Time) == ( $MonStart ))
                                      <option selected value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @else
                                      <option value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @endif
                                  @endforeach
                                @endif
                              </select>
                            </div>
                            <div class="social-media-link col-sm-5">
                              <select class="chosen-select form-control" name="fridayend" id="form-field-select-2" data-placeholder="Choose Your" style="border-radius: 15px!important;height: 40px;">
                                <option disabled selected>Ending Time</option>
                                @if(( $workinghour->friday ) == "24 Hours")
                                  @foreach($time as $times)
                                    @if(($times->Time) == "24 Hours")
                                      <option selected value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @else
                                      <option value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @endif
                                  @endforeach
                                @else
                                  <?php
                                  $mon_string = explode(" - ", $workinghour->friday);
                                  $MonEnd = $mon_string[1];
                                  ?>
                                  @foreach($time as $times)
                                    @if(($times->Time) == ( $MonEnd ))
                                      <option selected value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @else
                                      <option value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @endif
                                  @endforeach
                                @endif
                              </select>
                            </div>
                          </div>

                          <div class="col-sm-12" style="padding: 0px;" >
                            <label class="social-media-head col-sm-2 control-label no-padding-right" > saturday <span style="float: right;">:</span></label>
                            <div class="social-media-link col-sm-5">
                              <select class="chosen-select form-control" name="saturdaystart" id="form-field-select-2" data-placeholder="Choose Your" style="border-radius: 15px!important;height: 40px;">
                                @if(( $workinghour->saturday ) == "24 Hours")
                                  @foreach($time as $times)
                                    @if(($times->Time) == "24 Hours")
                                      <option selected value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @else
                                      <option value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @endif
                                  @endforeach
                                @else
                                  <?php
                                  $mon_string = explode(" - ", $workinghour->saturday);
                                  $MonStart = $mon_string[0];
                                  ?>
                                  @foreach($time as $times)
                                    @if(($times->Time) == ( $MonStart ))
                                      <option selected value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @else
                                      <option value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @endif
                                  @endforeach
                                @endif
                              </select>
                            </div>
                            <div class="social-media-link col-sm-5">
                              <select class="chosen-select form-control" name="saturdayend" id="form-field-select-2" data-placeholder="Choose Your" style="border-radius: 15px!important;height: 40px;">
                                <option disabled selected>Ending Time</option>
                                @if(( $workinghour->saturday ) == "24 Hours")
                                  @foreach($time as $times)
                                    @if(($times->Time) == "24 Hours")
                                      <option selected value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @else
                                      <option value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @endif
                                  @endforeach
                                @else
                                  <?php
                                  $mon_string = explode(" - ", $workinghour->saturday);
                                  $MonEnd = $mon_string[1];
                                  ?>
                                  @foreach($time as $times)
                                    @if(($times->Time) == ( $MonEnd ))
                                      <option selected value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @else
                                      <option value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @endif
                                  @endforeach
                                @endif
                              </select>
                            </div>
                          </div>

                          <div class="col-sm-12" style="padding: 0px;" >
                            <label class="social-media-head col-sm-2 control-label no-padding-right" > sunday <span style="float: right;">:</span></label>
                            <div class="social-media-link col-sm-5">
                              <select class="chosen-select form-control" name="sundaystart" id="form-field-select-2" data-placeholder="Choose Your" style="border-radius: 15px!important;height: 40px;">
                                @if(( $workinghour->sunday ) == "24 Hours")
                                  @foreach($time as $times)
                                    @if(($times->Time) == "24 Hours")
                                      <option selected value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @else
                                      <option value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @endif
                                  @endforeach
                                @else
                                  <?php
                                  $mon_string = explode(" - ", $workinghour->sunday);
                                  $MonStart = $mon_string[0];
                                  ?>
                                  @foreach($time as $times)
                                    @if(($times->Time) == ( $MonStart ))
                                      <option selected value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @else
                                      <option value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @endif
                                  @endforeach
                                @endif
                              </select>
                            </div>
                            <div class="social-media-link col-sm-5">
                              <select class="chosen-select form-control" name="sundayend" id="form-field-select-2" data-placeholder="Choose Your" style="border-radius: 15px!important;height: 40px;">
                                <option disabled selected>Ending Time</option>
                                @if(( $workinghour->sunday ) == "24 Hours")
                                  @foreach($time as $times)
                                    @if(($times->Time) == "24 Hours")
                                      <option selected value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @else
                                      <option value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @endif
                                  @endforeach
                                @else
                                  <?php
                                  $mon_string = explode(" - ", $workinghour->sunday);
                                  $MonEnd = $mon_string[1];
                                  ?>
                                  @foreach($time as $times)
                                    @if(($times->Time) == ( $MonEnd ))
                                      <option selected value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @else
                                      <option value="{{ $times->Time}}">{{ $times->Time}}</option>
                                    @endif
                                  @endforeach
                                @endif
                              </select>
                            </div>
                          </div>


                        </div>
                      </div>
                    @endif

                    @if(!empty($facilities))
                      <div class="form-elements col-md-12 col-sm-12 mobile-view-hidden">
                        <label class="col-sm-3 control-label no-padding-right" > Facilities </label>
                        <div class="col-sm-9" style="padding: 0px;">
                          <label class="social-media-head col-sm-3 control-label no-padding-right" > CarParking </label>
                          <div class="social-media-link col-sm-1">
                            @if(($facilities->carparking) == "1")
                              <input type="checkbox" id=""  checked name="CarParking" value="1">
                            @else
                              <input type="checkbox" id="" name="CarParking" value="1">
                            @endif
                          </div>
                          <label class="social-media-head col-sm-3 control-label no-padding-right" > Wifi </label>
                          <div class="social-media-link col-sm-1">
                            @if(($facilities->wifi) == "1")
                              <input type="checkbox" id=""  checked name="Wifi" value="1">
                            @else
                              <input type="checkbox" id="" name="Wifi" value="1">
                            @endif
                          </div>
                          <label class="social-media-head col-sm-3 control-label no-padding-right" > PrayerRoom </label>
                          <div class="social-media-link col-sm-1">
                            @if(($facilities->prayerroom) == "1")
                              <input type="checkbox" id=""  checked name="PrayerRoom" value="1">
                            @else
                              <input type="checkbox" id="" name="PrayerRoom" value="1">
                            @endif
                          </div>
                          <label class="social-media-head col-sm-3 control-label no-padding-right" > wheelchairaccesible </label>
                          <div class="social-media-link col-sm-1">
                            @if(($facilities->wheelchair) == "1")
                              <input type="checkbox" id=""  checked name="wheelchairaccesible" value="1">
                            @else
                              <input type="checkbox" id="" name="wheelchairaccesible" value="1">
                            @endif
                          </div>
                          <label class="social-media-head col-sm-3 control-label no-padding-right" > Creditcard </label>
                          <div class="social-media-link col-sm-1">
                            @if(($facilities->creditcard) == "1")
                              <input type="checkbox" id=""  checked name="Creditcard" value="1">
                            @else
                              <input type="checkbox" id="" name="Creditcard" value="1">
                            @endif
                          </div>
                          <label class="social-media-head col-sm-3 control-label no-padding-right" > 24Service </label>
                          <div class="social-media-link col-sm-1">
                            @if(($facilities->alltimeservice) == "1")
                              <input type="checkbox" id=""  checked name="AlltimeService" value="1">
                            @else
                              <input type="checkbox" id=""  name="AlltimeService" value="1">
                            @endif
                          </div>
                        </div>
                      </div>
                    @endif

                    <div class="form-elements col-md-12 col-sm-12">
                      <label class="col-sm-3 control-label no-padding-right" > Profile Image </label>
                      <div class="col-sm-4 clearfix">
                        <img id="prfl" style="width: 280px; height:180px;" src="{{ asset($business->profile_image) }}" alt="your image" />
                        <input type="hidden" name="SelectProfileImage"   value="{{ $business->profile_image }}">
                        <div class="action-section">
                          <span style="font-size: 17px; background: #000; padding: 8px; color: #fff;">select Image</span>
                          <input accept='image/*' type="file" name="image" class="prfl-pic" onchange="profilereadURL(this);" capture >
                        </div>
                      </div>
                    </div>
                    <div class="form-elements col-md-12 col-sm-12">
                      <label class="col-sm-3 control-label no-padding-right" > Background Image </label>
                      <div class="col-sm-4 clearfix">
                        <img id="bckgrd" style="width: 280px; height:180px;" src="{{ asset($business->background_image) }}" alt="your image" />
                        <input type="hidden" name="SelectBackgroundImage" value="{{ $business->background_image }}">
                        <div class="action-section">
                          <span style="font-size: 17px; background: #000; padding: 8px; color: #fff;">select Image</span>
                          <input accept='image/*' type="file" name="backimage" class="prfl-pic" onchange="backgroundreadURL(this);" >
                        </div>
                      </div>
                    </div>
                    <div class="form-elements col-md-12 col-sm-12 action-section-area">
                      <label class="col-sm-3 control-label no-padding-right" >  </label>
                      <div class="col-sm-9">
                        <button class="btn btn-success" type="submit" name="Registersubmit">Submit</button>
                        <button class="btn btn-danger" type="reset" name="button"  onclick="myFunction()">RESET</button>
                      </div>
                    </div>
                  </form>
                @endif
              </div>
            </div>
          </div><!-- /.nav-search -->
        </div>
        <!-- BODY SECTION -->
      </div>
    </div><!-- /.nav-search -->
  </div>


<!-- Body Area -->








                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Set Location</h4><br>

                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                               <div id="map" style="width:100%;height:500px;"></div>
                                            </div>
                                            <div class="modal-footer">
											<p id="current"><font color="red">Drag and Drop marker To set location</font></p>
                                                <button type="button" class="btn btn-success waves-effect text-left" data-dismiss="modal">Set Location</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
@endsection

