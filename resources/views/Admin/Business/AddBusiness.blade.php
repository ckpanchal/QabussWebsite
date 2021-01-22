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
          <li class="active"><a href="#">Business</a></li>
          <li class="active">Add New Business</li>
        </ul><!-- /.breadcrumb -->

        <!-- BODY SECTION -->
        <div class="page-content">
          <div class="page-header">
            <h1>New Business</h1>
          </div><!-- /.page-header -->
          <div class="update clearfix">
            <div class="business-add col-md-12 col-sm-12">
              <div class="adding-new-bussines col-md-12 col-sm-12">
                <form action="{{ route('business.store') }}" method="POST" role="form" name="addproduct" enctype="multipart/form-data" id="myform" onsubmit = "return validateBusiness(this)">
                  @csrf
                  <div class="form-elements col-md-8 col-sm-12">
                    <label class="col-sm-3 control-label no-padding-right"  > Company Name (En)<span class="form-require">*</span> <span style="float: right;">:</span></label>
                    <div class="col-sm-9">
                      <input type="text" id="form-field-1" class="companyname" name="companyname" placeholder="Name (English)*">
                      <input value="{{ Auth::user()->id }} " type="hidden" id="form-field-1" class="user" name="user" placeholder="Name (English)*">
                    </div>
                    <label class="col-sm-3 control-label no-padding-right"  > Company Name (Ar)<span class="form-require">*</span><span style="float: right;">:</span></label>
                    <div class="col-sm-9">
                      <input type="text" id="form-field-1" class="companyname"  name="companynamearb"  placeholder="Name (Arabic)*">
                    </div>
                  </div>
                  <div class="form-elements col-md-8 col-sm-12">
                    <label class="col-sm-3 control-label no-padding-right" > Company Description (En)<span class="form-require">*</span><span style="float: right;">:</span></label>
                    <div class="col-sm-9" style="margin-bottom: 10px;">
                      <textarea class="tinymce"  id="texteditor" name="companydesc" rows="4" style="width: 100%;border: 1px solid #ececec;" ></textarea>
                    </div>
                    <label class="col-sm-3 control-label no-padding-right" > Company Description (Ar)<span class="form-require">*</span><span style="float: right;">:</span></label>
                    <div class="col-sm-9" style="margin-bottom: 10px;">
                      <textarea class="tinymce"  id="texteditorOne" name="companydescarb" rows="4" style="width: 100%;border: 1px solid #ececec;" ></textarea>
                    </div>
                  </div>
                  <div class="form-elements col-md-8 col-sm-12">
                    <label class="col-sm-3 control-label no-padding-right" > Company Tagline (En)<span class="form-require">*</span><span style="float: right;">:</span></label>
                    <div class="col-sm-9">
                      <textarea name="companytag" placeholder="Company Tagline(English)*" rows="2" style="width: 100%;border: 1px solid #ececec;"></textarea>
                    </div>
                    <label class="col-sm-3 control-label no-padding-right" > Company Tagline (Ar)<span class="form-require">*</span><span style="float: right;">:</span></label>
                    <div class="col-sm-9">
                      <textarea name="companytagarb" placeholder="Company Tagline(Arabic)*"rows="2" style="width: 100%;border: 1px solid #ececec;"></textarea>
                    </div>
                  </div>
                  <div class="form-elements col-md-8 col-sm-12"  style="margin-bottom: 10px;">
                    <label class="col-sm-3 control-label no-padding-right" > Municipality<span class="form-require">*</span><span style="float: right;">:</span></label>
                    <div class="col-sm-9">
                      <select  class="chosen-select form-control" id="Municipality" name="municipality"  style="border-radius: 15px!important;height: 40px;">
                        <option disabled selected value="">Select Category</option>
                        @foreach($location as $locations)
                            <option value="{{ $locations->id}}">{{ $locations->locationEn}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-elements col-md-8 col-sm-12"  style="margin-bottom: 10px;">
                    <label class="col-sm-3 control-label no-padding-right" > Company Address (En)<span class="form-require">*</span><span style="float: right;">:</span></label>
                    <div class="col-sm-9">
                      <input type="text"  style="width: 100%;" name="companylocation" placeholder="Al Mathar Al Qadeem, Doha, Qatar(English)"  >
                    </div>
                  </div>
                  <div class="form-elements col-md-8 col-sm-12"  style="margin-bottom: 10px;">
                    <label class="col-sm-3 control-label no-padding-right" > Company Address (Ar)<span class="form-require">*</span><span style="float: right;">:</span></label>
                    <div class="col-sm-9">
                      <input type="text"  style="width: 100%;" name="companylocationarb" placeholder="Al Mathar Al Qadeem, Doha, Qatar(Arabic)"  >
                    </div>
                  </div>
                  <div class="form-elements col-md-8 col-sm-12 "  style="margin-bottom: 10px;">
                    <label class="col-sm-3 control-label no-padding-right" > Location<span class="form-require">*</span><span style="float: right;">:</span></label>
                    <div class="col-sm-9">
                      <div class="form-elements col-sm-12 no-padding ">
                        <div class="col-sm-6 no-padding">
                          <input  type="text" id="lat" value="" class="textcls" name="latitude" placeholder="latitude" style="width: 100%;">
                        </div>
                        <div class="col-sm-6 no-padding-right longitude">
                          <input  type="text" id="long" value="" class="textcls" name="longitude" placeholder="longitude" style="width: 100%;">
                        </div>
                      </div>
                      <!--<button type="button"  data-toggle="modal" data-target=".bs-example-modal-lg" class="model_img img-responsive btn btn-info">Set Location</button>-->
                    </div>
                  </div>
                  <div class="form-elements col-md-8 col-sm-12">
                    <label class="col-sm-3 control-label no-padding-right" > Company Category<span class="form-require">*</span><span style="float: right;">:</span></label>
                    <div class="col-sm-9">
                      <div>
                        <select class="chosen-select form-control" name="companycategory" id="companycategory" style="border-radius: 15px!important;height: 40px;">
                          <option disabled selected value="">Select Category</option>
                          @foreach($categorys as $category)
                            @if(($groupName= $category->parent) != 0)
                              <option value="{{ $category->id}}">{{ $category->name}}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-elements col-md-8 col-sm-12">
                    <label class="col-sm-3 control-label no-padding-right" > Company Phone Number<span class="form-require">*</span><span style="float: right;">:</span></label>
                    <div class="col-sm-9">
                      <input type="text" class="companyphonenumber" onpaste="return false;" name="companyphonenumber" maxlength = "8" placeholder="Company Phone Number" onkeypress='ValidateNumber(event)'>
                    </div>
                  </div>
                  <div class="form-elements col-md-8 col-sm-12">
                    <label class="col-sm-3 control-label no-padding-right" > Company Website <span style="float: right;">:</span></label>
                    <div class="col-sm-9">
                      <input type="text" class="companywebsite" name="companywebsite" placeholder="www.demo.com">
                    </div>
                  </div>
                  <div class="form-elements col-md-8 col-sm-12">
                    <label class="col-sm-3 control-label no-padding-right" > Company Mail<span class="form-require">*</span><span style="float: right;">:</span></label>
                    <div class="col-sm-9">
                      <input type="text" class="companyemail" name="companyemail"  placeholder="info@gmail.com" >
                    </div>
                  </div>
                  <div class="form-elements col-md-8 col-sm-12">
                    <label class="col-sm-3 control-label no-padding-right" > Social Media <span style="float: right;">:</span></label>
                    <div class="col-sm-9" style="padding: 0px;">
                      <label class="social-media-head col-sm-2 control-label no-padding-right" > Facebook <span style="float: right;">:</span></label>
                      <div class="social-media-link col-sm-10">
                        <input type="text" class="companywebsite" name="companyfacebook" placeholder="https://www.facebook.com/">
                      </div>
                      <label class="social-media-head col-sm-2 control-label no-padding-right" > Instagram <span style="float: right;">:</span></label>
                      <div class="social-media-link col-sm-10">
                      <input type="text" class="companywebsite" name="companyinstagram" placeholder="https://www.instagram.com/">
                      </div>
                      <label class="social-media-head col-sm-2 control-label no-padding-right" > Linkedin <span style="float: right;">:</span></label>
                      <div class="social-media-link col-sm-10">
                      <input type="text" class="companywebsite" name="companylinked" placeholder="https://www.linkedin.com/">
                      </div>
                      <label class="social-media-head col-sm-2 control-label no-padding-right" > Twitter <span style="float: right;">:</span></label>
                      <div class="social-media-link col-sm-10">
                      <input type="text" class="companywebsite" name="companytwitter" placeholder="https://twitter.com/">
                      </div>
                      <label class="social-media-head col-sm-2 control-label no-padding-right" > Youtube <span style="float: right;">:</span></label>
                      <div class="social-media-link col-sm-10">
                      <input type="text" class="companywebsite" name="companyyoutube" placeholder="https://www.youtube.com/">
                      </div>
                    </div>
                  </div>
                  <!-- Working Hours -->
                  <div class="form-elements col-md-8 col-sm-12">
                    <label class="col-sm-3 control-label no-padding-right" > Working Hours <span class="form-require">*</span> <span style="float: right;">:</span></label>
                    <div class="col-sm-9" style="padding: 0px;">

                      <div class="col-sm-12" style="padding: 0px;" >
                        <label class="social-media-head col-sm-2 control-label no-padding-right" > Monday <span style="float: right;">:</span></label>
                        <div class="social-media-link col-sm-5">
                          <select class="chosen-select form-control" name="monstart" id="monstart" data-placeholder="Choose Your" style="border-radius: 15px!important;height: 40px;">
                            <option disabled selected value="">Starting Time</option>
                            @foreach($times as $time)
                              <option value="{{ $time->Time}}">{{ $time->Time}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="social-media-link col-sm-5">
                          <select class="chosen-select form-control" name="monend" id="" data-placeholder="Choose Your" style="border-radius: 15px!important;height: 40px;">
                            <option disabled selected>Ending Time</option>
                            @foreach($times as $time)
                              @if($time->Time != "24 Hours")
                              <option value="{{ $time->Time}}">{{ $time->Time}}</option>
                              @endif
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="col-sm-12" style="padding: 0px;" >
                        <label class="social-media-head col-sm-2 control-label no-padding-right" > Tuesday <span style="float: right;">:</span></label>
                        <div class="social-media-link col-sm-5">
                          <select class="chosen-select form-control" name="tuesdaystart" id="tuesdaystart" data-placeholder="Choose Your" style="border-radius: 15px!important;height: 40px;">
                            <option disabled selected value="">Starting Time</option>
                            @foreach($times as $time)
                              <option value="{{ $time->Time}}">{{ $time->Time}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="social-media-link col-sm-5">
                          <select class="chosen-select form-control" name="tuesdayend" id="" data-placeholder="Choose Your" style="border-radius: 15px!important;height: 40px;">
                            <option disabled selected>Ending Time</option>
                            @foreach($times as $time)
                              @if($time->Time != "24 Hours")
                              <option value="{{ $time->Time}}">{{ $time->Time}}</option>
                              @endif
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="col-sm-12" style="padding: 0px;" >
                        <label class="social-media-head col-sm-2 control-label no-padding-right" > Wednesday <span style="float: right;">:</span></label>
                        <div class="social-media-link col-sm-5">
                          <select class="chosen-select form-control" name="wednesdaystart" id="wednesdaystart" data-placeholder="Choose Your" style="border-radius: 15px!important;height: 40px;">
                            <option disabled selected value="">Starting Time</option>
                            @foreach($times as $time)
                              <option value="{{ $time->Time}}">{{ $time->Time}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="social-media-link col-sm-5">
                          <select class="chosen-select form-control" name="wednesdayend" id="" data-placeholder="Choose Your" style="border-radius: 15px!important;height: 40px;">
                            <option disabled selected>Ending Time</option>
                            @foreach($times as $time)
                              @if($time->Time != "24 Hours")
                              <option value="{{ $time->Time}}">{{ $time->Time}}</option>
                              @endif
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="col-sm-12" style="padding: 0px;" >
                        <label class="social-media-head col-sm-2 control-label no-padding-right" > Thursday <span style="float: right;">:</span></label>
                        <div class="social-media-link col-sm-5">
                          <select class="chosen-select form-control" name="thursdaystart" id="thursdaystart" data-placeholder="Choose Your" style="border-radius: 15px!important;height: 40px;">
                            <option disabled selected value="">Starting Time</option>
                            @foreach($times as $time)
                              <option value="{{ $time->Time}}">{{ $time->Time}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="social-media-link col-sm-5">
                          <select class="chosen-select form-control" name="thursdayend" id="" data-placeholder="Choose Your" style="border-radius: 15px!important;height: 40px;">
                            <option disabled selected>Ending Time</option>
                            @foreach($times as $time)
                              @if($time->Time != "24 Hours")
                              <option value="{{ $time->Time}}">{{ $time->Time}}</option>
                              @endif
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="col-sm-12" style="padding: 0px;" >
                        <label class="social-media-head col-sm-2 control-label no-padding-right" > Friday <span style="float: right;">:</span></label>
                        <div class="social-media-link col-sm-5">
                          <select class="chosen-select form-control" name="fridaystart" id="fridaystart" data-placeholder="Choose Your" style="border-radius: 15px!important;height: 40px;">
                            <option disabled selected value="">Starting Time</option>
                            @foreach($times as $time)
                              <option value="{{ $time->Time}}">{{ $time->Time}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="social-media-link col-sm-5">
                          <select class="chosen-select form-control" name="fridayend" id="" data-placeholder="Choose Your" style="border-radius: 15px!important;height: 40px;">
                            <option disabled selected>Ending Time</option>
                            @foreach($times as $time)
                              @if($time->Time != "24 Hours")
                              <option value="{{ $time->Time}}">{{ $time->Time}}</option>
                              @endif
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="col-sm-12" style="padding: 0px;" >
                        <label class="social-media-head col-sm-2 control-label no-padding-right" > Saturday <span style="float: right;">:</span></label>
                        <div class="social-media-link col-sm-5">
                          <select class="chosen-select form-control" name="saturdaystart" id="saturdaystart" data-placeholder="Choose Your" style="border-radius: 15px!important;height: 40px;">
                            <option disabled selected value="">Starting Time</option>
                            @foreach($times as $time)
                              <option value="{{ $time->Time}}">{{ $time->Time}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="social-media-link col-sm-5">
                          <select class="chosen-select form-control" name="saturdayend" id="" data-placeholder="Choose Your" style="border-radius: 15px!important;height: 40px;">
                            <option disabled selected>Ending Time</option>
                            @foreach($times as $time)
                              @if($time->Time != "24 Hours")
                              <option value="{{ $time->Time}}">{{ $time->Time}}</option>
                              @endif
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="col-sm-12" style="padding: 0px;" >
                        <label class="social-media-head col-sm-2 control-label no-padding-right" > Sunday <span style="float: right;">:</span></label>
                        <div class="social-media-link col-sm-5">
                          <select class="chosen-select form-control" name="sundaystart" id="sundaystart" data-placeholder="Choose Your" style="border-radius: 15px!important;height: 40px;">
                            <option disabled selected value="">Starting Time</option>
                            @foreach($times as $time)
                              <option value="{{ $time->Time}}">{{ $time->Time}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="social-media-link col-sm-5">
                          <select class="chosen-select form-control" name="sundayend" id="" data-placeholder="Choose Your" style="border-radius: 15px!important;height: 40px;">
                            <option disabled selected>Ending Time</option>
                            @foreach($times as $time)
                              @if($time->Time != "24 Hours")
                              <option value="{{ $time->Time}}">{{ $time->Time}}</option>
                              @endif
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Working Hours -->

                  <div class="form-elements col-md-8 col-sm-12">
                    <label class="col-sm-3 control-label no-padding-right" > Facilities <span style="float: right;">:</span></label>
                    <div class="col-sm-8" style="padding: 0px;">
                      <label class="social-media-head col-sm-3 control-label no-padding-right" > CarParking <span style="float: right;">:</span></label>
                      <div class="social-media-link col-sm-1">
                        <input type="hidden" id="" name="CarParking" value="0">
                        <input type="checkbox" id="" name="CarParking" value="1">
                      </div>
                      <label class="social-media-head col-sm-3 control-label no-padding-right" > Wifi <span style="float: right;">:</span></label>
                      <div class="social-media-link col-sm-1">
                        <input type="hidden" id="" name="Wifi" value="0">
                        <input type="checkbox" id="" name="Wifi" value="1">
                      </div>
                      <label class="social-media-head col-sm-3 control-label no-padding-right" > PrayerRoom <span style="float: right;">:</span></label>
                      <div class="social-media-link col-sm-1">
                        <input type="hidden" id="" name="PrayerRoom" value="0">
                        <input type="checkbox" id="" name="PrayerRoom" value="1">
                      </div>
                      <label class="social-media-head col-sm-3 control-label no-padding-right" > wheelchairaccesible <span style="float: right;">:</span></label>
                      <div class="social-media-link col-sm-1">
                        <input type="hidden" id="" name="wheelchairaccesible" value="0">
                        <input type="checkbox" id="" name="wheelchairaccesible" value="1">
                      </div>
                      <label class="social-media-head col-sm-3 control-label no-padding-right" > Creditcard <span style="float: right;">:</span></label>
                      <div class="social-media-link col-sm-1">
                        <input type="hidden" id="" name="Creditcard" value="0">
                        <input type="checkbox" id="" name="Creditcard" value="1">
                      </div>
                      <label class="social-media-head col-sm-3 control-label no-padding-right" > 24Service <span style="float: right;">:</span></label>
                      <div class="social-media-link col-sm-1">
                        <input type="hidden" id="" name="AlltimeService" value="0">
                        <input type="checkbox" id="" name="AlltimeService" value="1">
                      </div>
                    </div>
                  </div>
                  <!--<div class="form-elements col-md-8 col-sm-12">-->
                  <!--  <label class="col-sm-3 control-label no-padding-right" >Approve<span style="float: right;">:</span></label>-->
                  <!--  <div class="col-sm-8">-->
                  <!--    <input type="checkbox" id="" name="approve" value="1">-->
                  <!--    <input type="hidden" id="" name="approve" value="0">-->
                  <!--  </div>-->
                  <!--</div>-->
                  <div class="form-elements col-md-8 col-sm-12">
                    <label class="col-sm-3 control-label no-padding-right" > Profile Image<span class="form-require">*</span><span style="float: right;">:</span></label>
                    <div class="col-sm-4 clearfix">
                      <img id="prfl" style="width: 280px; height:180px;" src="{{ asset('image/default.jpg') }}" alt="your image" />
                      <div class="action-section">
                        <span style="font-size: 17px; background: #000; padding: 8px; color: #fff;">select Image</span>
                        <input accept='image/*' type="file" name="image" class="prfl-pic"  onchange="profilereadURL(this);"  >
                      </div>
                    </div>
                  </div>
									<div class="form-elements col-md-8 col-sm-12">
                    <label class="col-sm-3 control-label no-padding-right" > Background Image<span class="form-require">*</span><span style="float: right;">:</span></label>
                    <div class="col-sm-4 clearfix">
                      <img id="bckgrd" style="width: 280px; height:180px;" src="{{ asset('image/default.jpg') }}" alt="your image" />
                      <div class="action-section">
                        <span style="font-size: 17px; background: #000; padding: 8px; color: #fff;">select Image</span>
                        <input accept='image/*' type="file" name="backimage" class="prfl-pic" onchange="backgroundreadURL(this);" >
                      </div>
                    </div>
                  </div>
                  <div class="form-elements col-md-8 col-sm-12 action-section-area">
                    <label class="col-sm-3 control-label no-padding-right" >  <span style="float: right;">:</span></label>
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

