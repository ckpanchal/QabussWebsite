@extends('Admin.layout.app')
@section('title','Dashboard - Qabuss')
@section('content')

<div class="main-content">
            <div class="main-content-inner">
                <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Home</a>
                        </li>
                        <li class="active"><a href="#">Offer</a></li>
                        <li class="active">Add New Offer</li>
                    </ul><!-- /.breadcrumb -->

                    <!-- Body Section -->

                        <div class="page-content">
                            <div class="page-header">
                                <h1>New Offer</h1>
                            </div>
                            <div class="update clearfix">
                                <div class="business-add col-md-12 col-sm-12">
                                    <div class="adding-new-bussines col-md-12 col-sm-12">
                                        <form action="{{ route('offer.store') }}" method="POST" role="form" name="addproduct" enctype="multipart/form-data" id="myform" onsubmit = "return validateOffer(this)">
                                            @csrf
                                            <div class="form-elements col-md-8 col-sm-12">
                                                <label class="col-sm-3 control-label no-padding-right"> Heading  </label>
                                                <div class="col-sm-9">
                                                    <input type="text" id="form-field-1" class="companyname" name="offername" placeholder="Name (English)*">
                                                    <input type="hidden" id="form-field-1" class="companyname" name="userid" value="{{ Auth::user()->registerid }}">
                                                </div>
                                            </div>
                                            <div class="form-elements col-md-8 col-sm-12">
                                                <label class="col-sm-3 control-label no-padding-right"> Heading (Arabic)  </label>
                                                <div class="col-sm-9">
                                                    <input type="text" id="form-field-1" class="companyname"  name="offernamearb"  placeholder="Name (Arabic)*">
                                                </div>
                                            </div>

                                            <div class="form-elements col-md-8 col-sm-12">
                                                <label class="col-sm-3 control-label no-padding-right"> Date(Star To End)  </label>
                                                <div class="col-sm-9">
                                                    <div class="input-daterange input-group">
                                                        <input type="text" class="input-sm form-control" name="start" />
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-exchange"></i>
                                                        </span>
                                                        <input type="text" class="input-sm form-control" name="end" />
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-elements col-md-8 col-sm-12">
                                                <label class="col-sm-3 control-label no-padding-right"> Description  </label>
                                                <div class="col-sm-9">
                                                    <textarea class="tinymce"  id="texteditor" name="offerdesc" rows="4" style="width: 100%;border: 1px solid #ececec;" ></textarea>
                                                </div>
                                            </div>
                                            <div class="form-elements col-md-8 col-sm-12" style="margin-top: 15px;">
                                                <label class="col-sm-3 control-label no-padding-right"> Description (Arabic)  </label>
                                                <div class="col-sm-9">
                                                    <textarea class="tinymce"  id="texteditor1" name="offerdescarb" rows="4" style="width: 100%;border: 1px solid #ececec;" ></textarea>
                                                </div>
                                            </div>
                                            <div class="form-elements col-md-8 col-sm-12" style="margin-top: 15px;">
                                                <label class="col-sm-3 control-label no-padding-right" style="margin-top : 5px;"> Select Company  </label>
                                                <div class="col-sm-9" >
                                                    <select class="chosen-select form-control" name="business" id="business" data-placeholder="Select Company"  style="border-radius: 15px!important;height: 40px;">
                                                        <option disabled selected>Select Company</option>
                                                        @foreach($business as $businessinfo)
                                                            @if(($groupName= $businessinfo->approve) == "1")
                                                            <option value="{{ $businessinfo->registerId}}">{{ $businessinfo->companyname}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-elements col-md-8 col-sm-12" style="margin-top: 15px;">
                                                <label class="col-sm-3 control-label no-padding-right" style="margin-top : 5px;"> Select Category  </label>
                                                <div class="col-sm-9" >
                                                    <select class="chosen-select form-control" name="category" id="category" data-placeholder="Select Category"  style="border-radius: 15px!important;height: 40px;">
                                                        <option disabled selected>Select Category</option>
                                                        @foreach($category as $categoryinfo)
                                                            <option value="{{ $categoryinfo->id}}">{{ $categoryinfo->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-elements col-md-8 col-sm-12" style="margin-top: 10px;">
                                                <label class="col-sm-3 control-label no-padding-right"  >  Location  </label>
                                                <div class="col-sm-9">
                                                    <div class="form-elements col-sm-12 no-padding ">
                                                        <input type="text" class="textcls" name="location" placeholder="Location" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-elements col-md-8 col-sm-12" style="margin-top: 10px;">
                                                <label class="col-sm-3 control-label no-padding-right"  >  Location(Arabic)  </label>
                                                <div class="col-sm-9">
                                                    <div class="form-elements col-sm-12 no-padding ">
                                                        <input type="text" class="textcls" name="locationarb" placeholder="Location Arabic" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-elements col-md-8 col-sm-12" style="margin-top: 10px;">
                                                <label class="col-sm-3 control-label no-padding-right"  >  Map Location  </label>
                                                <div class="col-sm-9">
                                                    <div class="form-elements col-sm-12 no-padding ">
                                                        <div class="col-sm-6 no-padding">
                                                            <input type="text" id="lat" value="" class="textcls" name="latitude" placeholder="latitude" style="width: 100%;">
                                                        </div>
                                                        <div class="col-sm-6 no-padding-right longitude">
                                                            <input type="text" id="long" value="" class="textcls" name="longitude" placeholder="longitude" style="width: 100%;">
                                                        </div>
                                                    </div>
                                                    <!--<button type="button"  data-toggle="modal" data-target=".bs-example-modal-lg" class="model_img img-responsive btn btn-info">Set Location</button>-->
                                                </div>
                                            </div>
                                            <div class="form-elements col-md-8 col-sm-12" style="margin-top: 15px;">
                                                <label class="col-sm-3 control-label no-padding-right" style="margin-top : 5px;"> Select Tags  </label>
                                                <div class="col-sm-9">
                                                <select  class="chosen-select form-control" name="offertag" id="form-field-select-4" data-placeholder="Choose a Tag...">
                                                    <option disabled selected>Select Offer</option>
                                                    @foreach($offersTag as $offersTaginfo)
                                                        <option value="{{ $offersTaginfo->id}}">{{ $offersTaginfo->nameEn}}</option>
                                                    @endforeach
                                                </select>

                                                </div>
                                            </div>
                                            <div class="form-elements col-md-8 col-sm-12" style="margin-top: 10px;">
                                                <label class="col-sm-3 control-label no-padding-right"  >  External Url  </label>
                                                <div class="col-sm-9">
                                                    <div class="form-elements col-sm-12 no-padding ">
                                                        <input type="hidden" id="" name="external_url" value="0">
                                                        <input type="checkbox" id="" name="external_url" value="1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-elements col-md-8 col-sm-12" style="margin-top: 10px;">
                                                <label class="col-sm-3 control-label no-padding-right"  >  Url  </label>
                                                <div class="col-sm-9">
                                                    <div class="form-elements col-sm-12 no-padding ">
                                                        <input type="text" class="textcls" name="url" placeholder="Offer URL" >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-elements col-md-8 col-sm-12"  style="margin-top: 5px;">
                                                <label class="col-sm-3 control-label no-padding-right" > Image  </label>
                                                <div class="col-sm-5" >
                                                    <img id="offerimg" style="width: 360px;height: 250px;" src="{{ asset('image/default.jpg') }}" alt="your image" />
                                                    <div class="action-section">
                                                        <span style="font-size: 17px; background: #000; padding: 8px; color: #fff;">select Image</span>
                                                        <input type="file" name="image" class="prfl-pic" onchange="offer(this);" capture >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-elements col-md-8 col-sm-12 action-section-area"  style="margin-top: 1    5px;">
                                                <label class="col-sm-3 control-label no-padding-right" >  </label>
                                                <div class="col-sm-9">
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
            </div>
        </div>


    <!-- ============================================================== -->
    <!-- Pop Up MAP -->
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
    <!-- Pop Up MAP -->
    <!-- ============================================================== -->
@endsection

