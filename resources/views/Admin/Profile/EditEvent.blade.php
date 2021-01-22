@extends('Admin.layout.app')
@section('title','Dashboard - Qabuss')
@section('content')

<!-- Body Section -->
    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <!-- /.breadcrumb -->
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Home</a>
                    </li>
                    <li class="active"><a href="{{ route('profile.index')}}">Profile</a></li>
                    <li><a href="{{route('profile.eventview', Auth::user()->registerid)}}">Event</a></li>
                    <li class="active">Edit Event</li>
                </ul>
                <!-- /.breadcrumb -->
                
                <!-- Body Section -->
                <div class="page-content">
                    <div class="page-header">
                        <h1>Edit Event</h1>
                    </div>
                    <div class="update clearfix">
                        <div class="business-add col-md-12 col-sm-12">
                            <div class="adding-new-bussines col-md-12 col-sm-12">
                                @if(!empty($event))
                                    <form action="{{ route('profile.eventupdate',$event->id) }}" method="POST" role="form" name="addproduct" enctype="multipart/form-data" id="myform" onsubmit = "return validateEditEvent(this)">
                                        @csrf
                                        {{ method_field('PATCH') }}
                                        <div class="form-elements col-md-12 col-sm-12">
                                            <label class="col-sm-3 control-label no-padding-right"> Heading  </label>
                                            <div class="col-sm-9">
                                                <input value="{{ $event->headingEn }}" type="text" id="form-field-1" class="companyname" name="eventname" placeholder="Name (English)*">
                                            </div>
                                        </div>
                                        <div class="form-elements col-md-12 col-sm-12">
                                            <label class="col-sm-3 control-label no-padding-right"> Heading (Arabic)  </label>
                                            <div class="col-sm-9">
                                                <input value="{{ $event->headingArb }}" type="text" id="form-field-1" class="companyname"  name="eventnamearb"  placeholder="Name (Arabic)*">
                                            </div>
                                        </div>
                                        <div class="form-elements col-md-12 col-sm-12">
                                            <label class="col-sm-3 control-label no-padding-right"> Date(Star To End)  </label>
                                            <div class="col-sm-9">
                                                <div class="input-daterange input-group">
                                                    <input value="{{ date('Y-m-d', strtotime($event->startdate)) }}" type="text" class="input-sm form-control" name="start" placeholder="Start Date" />
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-exchange"></i>
                                                    </span>
                                                    <input value="{{ date('Y-m-d', strtotime($event->enddate)) }}" type="text" class="input-sm form-control" name="end" placeholder="End Date" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-elements col-md-12 col-sm-12">
                                            <label class="col-sm-3 control-label no-padding-right"> Amount  </label>
                                            <div class="col-sm-9">
                                                <input value="{{ $event->amount }}" type="text" id="form-field-1" class="companyname"  name="amount"  placeholder="QAR/-" onpaste="return false;" onkeypress='ValidateNumber(event)'>
                                            </div>
                                        </div>
                                        <div class="form-elements col-md-12 col-sm-12">
                                            <label class="col-sm-3 control-label no-padding-right"> Phone Number  </label>
                                            <div class="col-sm-9">
                                                <input value="{{ $event->phone }}" type="text" id="form-field-1" class="companyname"  name="phone"  maxlength = "8" placeholder="Phone Number" onpaste="return false;" onkeypress='ValidateNumber(event)'>
                                            </div>
                                        </div>
                                        <div class="form-elements col-md-12 col-sm-12">
                                            <label class="col-sm-3 control-label no-padding-right"> Email  </label>
                                            <div class="col-sm-9">
                                                <input value="{{ $event->email }}" type="text" id="form-field-1" class="companyname"  name="email"  placeholder="Email Id">
                                            </div>
                                        </div>
                                        <div class="form-elements col-md-12 col-sm-12">
                                            <label class="col-sm-3 control-label no-padding-right"> Description  </label>
                                            <div class="col-sm-9">
                                                <textarea class="tinymce"  id="texteditor" name="eventdesc" rows="4" style="width: 100%;border: 1px solid #ececec;" >{{ $event->descriptionEn }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-elements col-md-12 col-sm-12" style="margin-top: 15px;">
                                            <label class="col-sm-3 control-label no-padding-right"> Description (Arabic)  </label>
                                            <div class="col-sm-9">
                                                <textarea class="tinymce"  id="texteditor1" name="eventdescarb" rows="4" style="width: 100%;border: 1px solid #ececec;" >{{ $event->descriptionArb }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-elements col-md-12 col-sm-12" style="margin-top: 15px;">
                                            <label class="col-sm-3 control-label no-padding-right" >Summery<span class="require">*</span></label>
                                            <div class="col-sm-9">
                                                <textarea  name="summeryen" rows="4" style="width: 100%;border: 1px solid #ececec;resize: none;" >{{ $event->summeryEn }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-elements col-md-12 col-sm-12" style="margin-top: 15px;">
                                            <label class="col-sm-3 control-label no-padding-right"  style="margin-top: 10px;"> Summery (Arabic)<span class="require">*</span></label>
                                            <div class="col-sm-9"  style="margin-top: 10px;">
                                                <textarea  name="summeryarb" rows="4" style="width: 100%;border: 1px solid #ececec;resize: none;" >{{ $event->summeryArb }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-elements col-md-12 col-sm-12" style="margin-top: 10px;">
                                            <label class="col-sm-3 control-label no-padding-right"  >  Location  </label>
                                            <div class="col-sm-9">
                                                <div class="form-elements col-sm-12 no-padding ">
                                                    <input value="{{ $event->location }}" type="text" class="textcls" name="location" placeholder="Location" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-elements col-md-12 col-sm-12" style="margin-top: 10px;">
                                            <label class="col-sm-3 control-label no-padding-right"  >  Location Arabic  </label>
                                            <div class="col-sm-9">
                                                <div class="form-elements col-sm-12 no-padding ">
                                                    <input value="{{ $event->locationArb }}" type="text" class="textcls" name="locationarb" placeholder="Location" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-elements col-md-12 col-sm-12" style="margin-top: 10px;">
                                            <label class="col-sm-3 control-label no-padding-right"  >  Location  </label>
                                            <div class="col-sm-9">
                                                <div class="form-elements col-sm-12 no-padding ">
                                                    <div class="col-sm-6 no-padding">
                                                        <input value="{{ $event->lat }}" type="text" id="lat" class="textcls" name="latitude" placeholder="latitude" style="width: 100%;">
                                                    </div>                                        
                                                    <div class="col-sm-6 no-padding-right longitude">
                                                        <input value="{{ $event->lng }}" type="text" id="long" class="textcls" name="longitude" placeholder="longitude" style="width: 100%;">
                                                    </div>
                                                </div>
                                                <button type="button"  data-toggle="modal" data-target=".bs-example-modal-lg" class="model_img img-responsive btn btn-info">Set Location</button>
                                            </div>
                                        </div>
                                        <div class="form-elements col-md-12 col-sm-12"  style="margin-top: 5px;">
                                            <label class="col-sm-3 control-label no-padding-right" > Image  </label>
                                            <div class="col-sm-5" >
                                                <input type="hidden" name="oldimage"  value="{{ $event->image }}">
                                                <img id="offerimg" style="width: 360px;height: 250px;" src="{{ asset($event->image) }}" alt="your image" />
                                                <div class="action-section">
                                                    <span style="font-size: 17px; background: #000; padding: 8px; color: #fff;">select Image</span>
                                                    <input type="file" name="image" class="prfl-pic" onchange="offer(this);" capture >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-elements col-md-12 col-sm-12 action-section-area"  style="margin-top: 1    5px;">
                                            <label class="col-sm-3 control-label no-padding-right" >  </label>
                                            <div class="col-sm-9">
                                                <button class="btn btn-success" type="submit" name="Registersubmit">Submit</button>
                                                <button class="btn btn-danger" type="reset" name="button"  onclick="myFunction()">RESET</button>
                                            </div>
                                        </div>
                                        @csrf
                                    </form>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
                <!-- BODY SECTION -->
            </div>
        </div>
    </div>
<!-- BODY SECTION -->


<!-- ============================================================== -->
<!-- POPUP MAP -->
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
        </div>
    </div>

<!-- ============================================================== -->
<!-- POPUP MAP -->
<!-- ============================================================== -->



@endsection

