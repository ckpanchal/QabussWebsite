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
                <li class="active"><a href="#">Business</a></li>
                <li class="active">View Business</li>
            </ul>
            <!-- /.breadcrumb -->

            <!-- BODY SECTION -->
            <div class="page-content">
                <div class="page-header">
                    <h1>View Business</h1>
                </div>
                <!-- /.page-header -->
                <div class="update clearfix">
                    <div class="business-add col-md-12 col-sm-12">
                        <div class="adding-new-bussines col-md-12 col-sm-12">
                        @foreach($business as $single)
                            <form method="POST" role="form" name="addproduct" enctype="multipart/form-data" id="myform">
                            {{ method_field('PATCH') }}
                                <div class="form-elements col-md-8 col-sm-12">
                                    <label class="col-sm-3 control-label no-padding-right"  > Company Name  <span style="float: right;">:</span></label>
                                    <div class="col-sm-9">
                                        <input disabled type="text" id="form-field-1" value="{{ $single->companyname }}" class="companyname" name="CompanyName" placeholder="Name (English)*">
                                    </div>
                                    <label class="col-sm-3 control-label no-padding-right"  > Company Name (Arabic)  <span style="float: right;">:</span></label>
                                    <div class="col-sm-9">
                                        <input disabled type="text" id="form-field-1" class="companyname" value="{{ $single->companynameArb }}"  name="CompanyNameArb"  placeholder="Name (Arabic)*">
                                    </div>
                                </div>
                                <div class="form-elements col-md-8 col-sm-12">
                                    <label class="col-sm-3 control-label no-padding-right" > Company Description <span style="float: right;">:</span></label>
                                    <div class="col-sm-9">
                                        <div style="border: 1px solid #00000026;padding: 5px;margin-bottom: 10px;background: #eee;">
                                            @php
                                            echo str_replace('<p>', '<p class="text-sans">', $single->companydescription );
                                            @endphp
                                        </div>
                                    </div>
                                </div>
                                <div class="form-elements col-md-8 col-sm-12">
                                    <label class="col-sm-3 control-label no-padding-right" > Company Description (Arabic)  <span style="float: right;">:</span></label>
                                    <div class="col-sm-9">
                                        <div style="border: 1px solid #00000026;padding: 5px;margin-bottom: 10px;background: #eee;">
                                            @php
                                            echo str_replace('<p>', '<p>', $single->companydescriptionArb );
                                            @endphp
                                        </div>
                                    </div>
                                </div>
                                <div class="form-elements col-md-8 col-sm-12">
                                    <label class="col-sm-3 control-label no-padding-right" > Company Tagline <span style="float: right;">:</span></label>
                                    <div class="col-sm-9">
                                        <div style="border: 1px solid #00000026;padding: 5px;margin-bottom: 10px;background: #eee;">
                                            <p>	{{ $single->company_tagline }}</p>
                                        </div>
                                    </div>
                                    <label class="col-sm-3 control-label no-padding-right" > Company Tagline (Arabic) <span style="float: right;">:</span></label>
                                    <div class="col-sm-9">
                                        <div style="border: 1px solid #00000026;padding: 5px;margin-bottom: 10px;background: #eee;">
                                            <p>{{ $single->company_taglineArb }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-elements col-md-8 col-sm-12">
                                    <label class="col-md-3 control-label no-padding-right" > Company Location <span style="float: right;">:</span></label>
                                    <div class="col-md-9">
                                        <input disabled type="text" id="form-field-1" class="companyname" value="{{ $single->companylocation }}"  name="CompanyNameArb"  placeholder="Name (Arabic)*">
                                    </div>
                                    <label class="col-sm-3 control-label no-padding-right" > Company Location (Arabic) <span style="float: right;">:</span></label>
                                    <div class="col-sm-9">
                                        <input disabled type="text" id="form-field-1" class="companyname" value="{{ $single->companylocationArb }}"  name="CompanyNameArb"  placeholder="Name (Arabic)*">
                                    </div>
                                </div>
                                <div class="form-elements col-md-8 col-sm-12">
                                    <label class="col-sm-3 control-label no-padding-right" > Company Category <span style="float: right;">:</span></label>
                                    <div class="col-sm-9">
                                        @foreach($categorys as $categorysingle)
                                            @if(($categorysingle->id) == ($single->companycategory))
                                                <input disabled value="{{ $categorysingle->name}}" type="text" class="companyphonenumber" name="companyphonenumber" maxlength = "8" placeholder="Company Phone Number">
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-elements col-md-8 col-sm-12">
                                    <label class="col-sm-3 control-label no-padding-right" > Company Phone Number <span style="float: right;">:</span></label>
                                    <div class="col-sm-9">
                                        <input disabled value="{{ $single->companyphone }}" type="text" class="companyphonenumber" name="companyphonenumber" maxlength = "8" placeholder="Company Phone Number">
                                    </div>
                                </div>
                                <div class="form-elements col-md-8 col-sm-12">
                                    <label class="col-sm-3 control-label no-padding-right" > Company Website <span style="float: right;">:</span></label>
                                    <div class="col-sm-9">
                                        <input disabled value="{{ $single->company_website }}" type="text" class="companywebsite" name="companywebsite" placeholder="www.demo.com">
                                    </div>
                                </div>
                                <div class="form-elements col-md-8 col-sm-12">
                                    <label class="col-sm-3 control-label no-padding-right" > Company Mail <span style="float: right;">:</span></label>
                                    <div class="col-sm-9">
                                        <input disabled value="{{ $single->company_email   }}" type="text" class="companyemail" name="companyemail"  placeholder="info@gmail.com" >
                                    </div>
                                </div>
                                @if(!empty($socialmedia))
                                    <div class="form-elements col-md-8 col-sm-12 mobile-view-hidden">
                                        <label class="col-sm-3 control-label no-padding-right" > Social Media <span style="float: right;">:</span></label>
                                            <div class="col-sm-9" style="padding: 0px;">
                                                <label class="social-media-head col-sm-3 control-label no-padding-right" > Facebook <span style="float: right;">:</span></label>
                                                <div class="social-media-link col-sm-9">
                                                    <input disabled type="text" id="form-field-1" value="{{ $socialmedia->FaceBook }}" class="companyname" name="CompanyName" placeholder="Name (English)*">
                                                </div>
                                            <label class="social-media-head col-sm-3 control-label no-padding-right" > Instagram <span style="float: right;">:</span></label>
                                            <div class="social-media-link col-sm-9">
                                            <input disabled type="text" id="form-field-1" value="{{ $socialmedia->Instagram }}" class="companyname" name="CompanyName" placeholder="Name (English)*">
                                            </div>
                                            <label class="social-media-head col-sm-3 control-label no-padding-right" > Linkedin <span style="float: right;">:</span></label>
                                            <div class="social-media-link col-sm-9">
                                            <input disabled type="text" id="form-field-1" value="{{ $socialmedia->Linked }}" class="companyname" name="CompanyName" placeholder="Name (English)*">
                                            </div>
                                            <label class="social-media-head col-sm-3 control-label no-padding-right" > Twitter <span style="float: right;">:</span></label>
                                            <div class="social-media-link col-sm-9">
                                            <input disabled type="text" id="form-field-1" value="{{ $socialmedia->Twitter }}" class="companyname" name="CompanyName" placeholder="Name (English)*">
                                            </div>
                                            <label class="social-media-head col-sm-3 control-label no-padding-right" > Youtube <span style="float: right;">:</span></label>
                                            <div class="social-media-link col-sm-9">
                                            <input disabled type="text" id="form-field-1" value="{{ $socialmedia->Youtube }}" class="companyname" name="CompanyName" placeholder="Name (English)*">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($time))
                                  <div class="form-elements col-md-8 col-sm-12 mobile-view-hidden">
                                    <label class="col-sm-3 control-label no-padding-right" > Working Hours <span style="float: right;">:</span></label>
                                    <div class="col-sm-9" style="padding: 0px;">
                                      <label class="social-media-head col-sm-2 control-label no-padding-right" > Monday <span style="float: right;">:</span></label>
                                      <div class="social-media-link col-sm-4">
                                          @if(($time->monday) == "24 Hours - 24 Hours" || ($time->monday) == "24 Hours - ")
                                              <input disabled value="24 Hours" type="text" class="companyemail" name="companyemail" >
                                          @else
                                              <input disabled value="{{ $time->monday }}" type="text" class="companyemail" name="companyemail" >
                                          @endif
                                      </div>
                                      <label class="social-media-head col-sm-2 control-label no-padding-right" > Tuesday <span style="float: right;">:</span></label>
                                      <div class="social-media-link col-sm-4">
                                          @if(($time->tuesday) == "24 Hours - 24 Hours" || ($time->tuesday) == "24 Hours - ")
                                              <input disabled value="24 Hours" type="text" class="companyemail" name="companyemail" >
                                          @else
                                              <input disabled value="{{ $time->tuesday }}" type="text" class="companyemail" name="companyemail" >
                                          @endif
                                      </div>
    										              <label class="social-media-head col-sm-2 control-label no-padding-right" > Wednesday <span style="float: right;">:</span></label>
                                      <div class="social-media-link col-sm-4">
                                          @if(($time->wednesday) == "24 Hours - 24 Hours" || ($time->wednesday) == "24 Hours - ")
                                              <input disabled value="24 Hours" type="text" class="companyemail" name="companyemail" >
                                          @else
                                              <input disabled value="{{ $time->wednesday }}" type="text" class="companyemail" name="companyemail" >
                                          @endif
                                      </div>
    										              <label class="social-media-head col-sm-2 control-label no-padding-right" > Thursday <span style="float: right;">:</span></label>
                                      <div class="social-media-link col-sm-4">
                                          @if(($time->thursday) == "24 Hours - 24 Hours" || ($time->thursday) == "24 Hours - ")
                                              <input disabled value="24 Hours" type="text" class="companyemail" name="companyemail" >
                                          @else
                                              <input disabled value="{{ $time->thursday }}" type="text" class="companyemail" name="companyemail" >
                                          @endif
                                      </div>
    										              <label class="social-media-head col-sm-2 control-label no-padding-right" > Friday <span style="float: right;">:</span></label>
                                      <div class="social-media-link col-sm-4">
                                          @if(($time->friday) == "24 Hours - 24 Hours" || ($time->friday) == "24 Hours - ")
                                              <input disabled value="24 Hours" type="text" class="companyemail" name="companyemail" >
                                          @else
                                              <input disabled value="{{ $time->friday }}" type="text" class="companyemail" name="companyemail" >
                                          @endif
                                      </div>
    										              <label class="social-media-head col-sm-2 control-label no-padding-right" > Saturday <span style="float: right;">:</span></label>
                                      <div class="social-media-link col-sm-4">
                                          @if(($time->saturday) == "24 Hours - 24 Hours" || ($time->saturday) == "24 Hours - ")
                                              <input disabled value="24 Hours" type="text" class="companyemail" name="companyemail" >
                                          @else
                                              <input disabled value="{{ $time->saturday }}" type="text" class="companyemail" name="companyemail" >
                                          @endif
                                      </div>
    										              <label class="social-media-head col-sm-2 control-label no-padding-right" > Sunday <span style="float: right;">:</span></label>
                                      <div class="social-media-link col-sm-4">
                                          @if(($time->sunday) == "24 Hours - 24 Hours" || ($time->sunday) == "24 Hours - ")
                                              <input disabled value="24 Hours" type="text" class="companyemail" name="companyemail" >
                                          @else
                                              <input disabled value="{{ $time->sunday }}" type="text" class="companyemail" name="companyemail" >
                                          @endif
                                      </div>
                                    </div>
                                  </div>
                                @endif
                                @if(!empty($facilities))
                                  <div class="form-elements col-md-8 col-sm-12 mobile-view-hidden">
                                  <label class="col-sm-3 control-label no-padding-right" > Facilities </label>
                                    <div class="col-sm-9" style="padding: 0px;">
                                        <label class="social-media-head col-sm-3 control-label no-padding-right" > CarParking </label>
                                        <div class="social-media-link col-sm-1">
                                          @if(($facilities->carparking) == "1")
                                            <input type="checkbox" id=""  checked disabled>
                                          @else
                                            <input type="checkbox" id=""   disabled>
                                          @endif
                                        </div>
                                        <label class="social-media-head col-sm-3 control-label no-padding-right" > Wifi </label>
                                        <div class="social-media-link col-sm-1">
                                          @if(($facilities->wifi) == "1")
                                            <input type="checkbox" id=""  checked disabled>
                                          @else
                                            <input type="checkbox" id=""   disabled>
                                          @endif
                                        </div>
                                        <label class="social-media-head col-sm-3 control-label no-padding-right" > PrayerRoom </label>
                                        <div class="social-media-link col-sm-1">
                                          @if(($facilities->prayerroom) == "1")
                                            <input type="checkbox" id=""  checked disabled>
                                          @else
                                            <input type="checkbox" id=""   disabled>
                                          @endif                        </div>
                                        <label class="social-media-head col-sm-3 control-label no-padding-right" > wheelchairaccesible </label>
                                        <div class="social-media-link col-sm-1">
                                          @if(($facilities->wheelchair) == "1")
                                            <input type="checkbox" id=""  checked disabled>
                                          @else
                                            <input type="checkbox" id=""   disabled>
                                          @endif                        </div>
                                        <label class="social-media-head col-sm-3 control-label no-padding-right" > Creditcard </label>
                                        <div class="social-media-link col-sm-1">
                                          @if(($facilities->creditcard) == "1")
                                            <input type="checkbox" id=""  checked disabled>
                                          @else
                                            <input type="checkbox" id=""   disabled>
                                          @endif                        </div>
                                        <label class="social-media-head col-sm-3 control-label no-padding-right" > 24Service </label>
                                        <div class="social-media-link col-sm-1">
                                          @if(($facilities->alltimeservice) == "1")
                                            <input type="checkbox" id=""  checked disabled>
                                          @else
                                            <input type="checkbox" id=""   disabled>
                                          @endif
                                        </div>
                                    </div>
                                  </div>
                                @endif
                                <div class="form-elements col-md-8 col-sm-12">
                                  <label class="col-sm-3 control-label no-padding-right" > Profile Image<span style="float: right;">:</span></label>
                                  <div class="col-sm-4 clearfix">
                                    <img id="prfl" style="width: 280px; height:180px;" src="{{ asset($single->profile_image) }}" alt="your image" />
                                  </div>
                                </div>
                                <div class="form-elements col-md-8 col-sm-12">
                                  <label class="col-sm-3 control-label no-padding-right" > Background Image<span style="float: right;">:</span></label>
                                  <div class="col-sm-4 clearfix">
                                    <img id="bckgrd" style="width: 280px; height:180px;" src="{{ asset($single->background_image) }}" alt="your image" />
                                  </div>
                                </div>
                            @endforeach
                        </form>

                    </div>
                    <!-- /.nav-search -->
                </div>
                <!-- BODY SECTION -->
            </div>
        </div>
        <!-- /.nav-search -->
    </div>

    @endsection
