@extends('Admin.layout.app')
@section('title','Dashboard - Qabuss')
@section('content')


<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="index.php">Home</a>
				</li>
				<li class="active">Edit Offer</li>
			</ul>
			<div class="page-content">
				<div class="page-header">
					<h1>Edit Offer</h1>
				</div>
				<div class="update clearfix">
					<div class="business-add col-md-12 col-sm-12">
						<div class="adding-new-bussines col-md-12 col-sm-12">

              @if(!empty($offers))
              @foreach($offers as $offer)

							<form action="{{ route('offer.update',$offer->offerid) }}" method="POST" role="form" name="addproduct" enctype="multipart/form-data" id="myform" onsubmit = "return validateEditOffer(this)">
              @csrf
              {{ method_field('PATCH') }}
							<div class="form-elements col-md-8 col-sm-12">
									<label class="col-sm-3 control-label no-padding-right"> Heading  </label>
									<div class="col-sm-9">
                    <input type="hidden" id="form-field-1" class="companyname" name="userid" value="{{ Auth::user()->registerid }}">
										<input value="{{ $offer->headingEn }}" type="text" id="form-field-1" class="companyname" name="offername" placeholder="Name (English)*">
                  </div>
                </div>
                <div class="form-elements col-md-8 col-sm-12">
                  <label class="col-sm-3 control-label no-padding-right"> Heading (Arabic)  </label>
                  <div class="col-sm-9">
                    <input value="{{ $offer->headingArb }}" type="text" id="form-field-1" class="companyname"  name="offernamearb"  placeholder="Name (Arabic)*">
                  </div>
                </div>

                <div class="form-elements col-md-8 col-sm-12">
                  <label class="col-sm-3 control-label no-padding-right"> Date(Star To End)  </label>
                  <div class="col-sm-9">
                      <div class="input-daterange input-group">
                          <input type="text" value="{{ $offer->startdate }}" class="input-sm form-control" name="start" />
                          <span class="input-group-addon">
                              <i class="fa fa-exchange"></i>
                          </span>
                          <input type="text" value="{{ $offer->enddate }}" class="input-sm form-control" name="end" />
                      </div>
                  </div>
                </div>
                <div class="form-elements col-md-8 col-sm-12">
                  <label class="col-sm-3 control-label no-padding-right"> Description  </label>
                  <div class="col-sm-9">
                    <textarea class="tinymce"  id="texteditor" name="offerdesc" rows="4" style="width: 100%;border: 1px solid #ececec;" >{{ $offer->descriptionEn }}</textarea>
                  </div>
                </div>
                <div class="form-elements col-md-8 col-sm-12" style="margin-top: 15px;">
                  <label class="col-sm-3 control-label no-padding-right"> Description (Arabic)  </label>
                  <div class="col-sm-9">
                    <textarea class="tinymce"  id="texteditor1" name="offerdescarb" rows="4" style="width: 100%;border: 1px solid #ececec;" >{{ $offer->descriptionArb }}</textarea>
                  </div>
                </div>
                <div class="form-elements col-md-8 col-sm-12" style="margin-top: 15px;">
                  <label class="col-sm-3 control-label no-padding-right" style="margin-top : 5px;"> Select Company  </label>
                  <div class="col-sm-9" >
                    <select class="chosen-select form-control" name="business" id="business" data-placeholder="Select Company"  style="border-radius: 15px!important;height: 40px;">
                      <option disabled selected>Select Company</option>
                      @foreach($business as $businessinfo)
                        @if(($businessinfo->approve) == "1")
                          @if(($offer->companyid) == ($businessinfo->registerId))
                            <option selected value="{{ $businessinfo->registerId}}">{{ $businessinfo->companyname}}</option>
                          @else
                            <option value="{{ $businessinfo->registerId}}">{{ $businessinfo->companyname}}</option>
                          @endif
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-elements col-md-8 col-sm-12" style="margin-top: 15px;">
                    <label class="col-sm-3 control-label no-padding-right" style="margin-top : 5px;"> Select Category  </label>
                    <div class="col-sm-9" >
                        <select class="chosen-select form-control" name="category" id="category" data-placeholder="Select Category"  style="border-radius: 15px!important;height: 40px;">
                            <option disabled selected>Select Company</option>
                          
                            @foreach($category as $categoryinfo)
                              @if(($offer->category_id) == ($categoryinfo->id))
                                <option selected value="{{ $categoryinfo->id}}">{{ $categoryinfo->name}}</option>
                              @else
                                <option value="{{ $categoryinfo->id}}">{{ $categoryinfo->name}}</option>
                              @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-elements col-md-8 col-sm-12" style="margin-top: 10px;">
                    <label class="col-sm-3 control-label no-padding-right"  >  Location  </label>
                    <div class="col-sm-9">
                        <div class="form-elements col-sm-12 no-padding ">
                            <input type="text" class="textcls" value="{{ $offer->locationEn }}" name="location" placeholder="Location" >
                        </div>
                    </div>
                </div>
                <div class="form-elements col-md-8 col-sm-12" style="margin-top: 10px;">
                    <label class="col-sm-3 control-label no-padding-right"  >  Location(Arabic)  </label>
                    <div class="col-sm-9">
                        <div class="form-elements col-sm-12 no-padding ">
                            <input type="text" class="textcls" value="{{ $offer->locationArb }}" name="locationarb" placeholder="Location Arabic" >
                        </div>
                    </div>
                </div>
                <div class="form-elements col-md-8 col-sm-12" style="margin-top: 10px;">
                    <label class="col-sm-3 control-label no-padding-right"  >  Map Location  </label>
                    <div class="col-sm-9">
                        <div class="form-elements col-sm-12 no-padding ">
                            <div class="col-sm-6 no-padding">
                                <input type="text" id="lat"  value="{{ $offer->lat }}" class="textcls" name="latitude" placeholder="latitude" style="width: 100%;">
                            </div>
                            <div class="col-sm-6 no-padding-right longitude">
                                <input type="text" id="long"  value="{{ $offer->lng }}" class="textcls" name="longitude" placeholder="longitude" style="width: 100%;">
                            </div>
                        </div>
                        <!--<button type="button"  data-toggle="modal" data-target=".bs-example-modal-lg" class="model_img img-responsive btn btn-info">Set Location</button>-->
                    </div>
                </div>
                <div class="form-elements col-md-8 col-sm-12" style="margin-top: 15px;">
                    <label class="col-sm-3 control-label no-padding-right" style="margin-top : 5px;"> Select Tags  </label>
                    <div class="col-sm-9">
                    <select class="chosen-select form-control" name="offertag" id="form-field-select-4" data-placeholder="Choose a Tag...">
                      @foreach($offersTag as $offersTaginfo)
                        @if(($OffersTags-> offerid) == ($offersTaginfo->id))
                          <option selected value="{{ $offersTaginfo->id}}">{{ $offersTaginfo->nameEn}}</option>
                        @else
                          <option value="{{ $offersTaginfo->id}}">{{ $offersTaginfo->nameEn}}</option>
                        @endif
                      @endforeach
                       
                    </select>

                    </div>
                </div>
                <div class="form-elements col-md-8 col-sm-12" style="margin-top: 10px;">
                    <label class="col-sm-3 control-label no-padding-right"  >  External URL  </label>
                    <div class="col-sm-9">
                        <div class="form-elements col-sm-12 no-padding ">
                            @if(($offer->external_url) == "1")
                              <input type="checkbox" id=""  checked name="external_url" value="1">
                            @else
                              <input type="checkbox" id="" name="external_url" value="1">
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-elements col-md-8 col-sm-12" style="margin-top: 10px;">
                    <label class="col-sm-3 control-label no-padding-right"  >  URL  </label>
                    <div class="col-sm-9">
                        <div class="form-elements col-sm-12 no-padding ">
                            <input type="text" class="textcls" value="{{ $offer->appUrl }}" name="url" placeholder="Offer URL" >
                        </div>
                    </div>
                </div>
                <div class="form-elements col-md-12 col-sm-12">
                    <label class="col-sm-2 control-label no-padding-right" >  Image<span class="require">*</span></label>
                    <div class="col-sm-4 clearfix">
                      <img id="offerimg" style="width: 100%;" src="{{ asset($offer->image) }}" alt="your image" />
                      <input type="hidden" id="" name="oldimage" value="{{ $offer->image }}" >
                      <div class="action-section">
                        <span style="font-size: 17px; background: #000; padding: 8px; color: #fff;">select Image</span>
                        <input type="file" name="image" class="prfl-pic" onchange="offer(this);" capture >
                      </div>
                    </div>
                  </div>
                <div class="form-elements col-md-8 col-sm-12 action-section-area"  style="margin-top: 1    5px;">
                  <label class="col-sm-3 control-label no-padding-right" ></label>
                  <div class="col-sm-9">
                    <button class="btn btn-success" type="submit" name="Registersubmit">Submit</button>
                    <button class="btn btn-danger" type="reset" name="button"  onclick="myFunction()">RESET</button>
                  </div>
                </div>
              </form>
              @endforeach

              @endif
            </div>
          </div>
        </div>
      </div>
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
