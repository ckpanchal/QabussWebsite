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
            <a href="{{ route('index')}}">Home</a>
          </li>
        <li class="active">Profile</li>
          <li>Event</li>
          <li class="active">View Event</li>
        </ul>
        <!-- /.breadcrumb -->

        <!-- BODY SECTION -->
        <div class="page-content">
          <div class="page-header">
            <h1>View Event</h1>
          </div>
          <div class="update clearfix">
            <div class="business-add col-md-12 col-sm-12">
              <div class="adding-new-bussines col-md-12 col-sm-12">
                @if(!empty($events))
                  <form method="POST" role="form" name="addproduct" enctype="multipart/form-data" id="myform" onsubmit = "return validate(this)">
                  {{ method_field('PATCH') }}
                    <div class="form-elements col-md-12 col-sm-12">
                      <label class="col-sm-2 control-label no-padding-right"  > Heading (English)<span style="float: right;">:</span></label>
                      <div class="col-sm-10">
                        <div style="border: 1px solid #00000026;padding: 5px;margin-bottom: 10px;background: #eee;">
                          {{ $events->headingEn }}
                        </div>
                      </div>
                    </div>  
                    <div class="form-elements col-md-12 col-sm-12">
                      <label class="col-sm-2 control-label no-padding-right"  > Heading (Arabic)<span style="float: right;">:</span></label>
                      <div class="col-sm-10">
                        <div style="border: 1px solid #00000026;padding: 5px;margin-bottom: 10px;background: #eee;">
                          {{ $events->headingArb }}
                        </div>
                      </div>
                    </div>
                    <div class="form-elements col-md-12 col-sm-12">
                      <label class="col-sm-2 control-label no-padding-right"  > Description(English) <span style="float: right;">:</span></label>
                      <div class="col-sm-10">
                        <div style="border: 1px solid #00000026;padding: 5px;margin-bottom: 10px;background: #eee;">
                          @php 
                            echo str_replace('<p>', '<p>', $events->descriptionEn ); 
                          @endphp
                        </div>
                      </div>
                    </div>
                    <div class="form-elements col-md-12 col-sm-12">
                      <label class="col-sm-2 control-label no-padding-right"  >Description(Arabic)  <span style="float: right;">:</span></label>
                      <div class="col-sm-10">
                        <div style="border: 1px solid #00000026;padding: 5px;margin-bottom: 10px;background: #eee;">
                          @php
                            echo str_replace('<p>', '<p>', $events->descriptionArb );
                          @endphp
                        </div>
                      </div>
                    </div>
                    <div class="form-elements col-md-12 col-sm-12">
                      <label class="col-sm-2 control-label no-padding-right"  > Summery(English) <span style="float: right;">:</span></label>
                      <div class="col-sm-10">
                        <div style="border: 1px solid #00000026;padding: 5px;margin-bottom: 10px;background: #eee;">
                          @php 
                            echo str_replace('<p>', '<p>', $events->summeryEn ); 
                          @endphp
                        </div>
                      </div>
                    </div>
                    <div class="form-elements col-md-12 col-sm-12">
                      <label class="col-sm-2 control-label no-padding-right"  >Summery(Arabic)  <span style="float: right;">:</span></label>
                      <div class="col-sm-10">
                        <div style="border: 1px solid #00000026;padding: 5px;margin-bottom: 10px;background: #eee;">
                          @php
                            echo str_replace('<p>', '<p>', $events->summeryArb );
                          @endphp
                        </div>
                      </div>
                    </div>
                    <div class="form-elements col-md-12 col-sm-12">
                      <label class="col-sm-2 control-label no-padding-right"  >Amount  <span style="float: right;">:</span></label>
                      <div class="col-sm-10">
                        <input disabled type="text" id="form-field-1" value="{{ $events->amount }}" class="companyname" name="companyname" placeholder="Name" >
                      </div>
                    </div>
                    <div class="form-elements col-md-12 col-sm-12">
                      <label class="col-sm-2 control-label no-padding-right"  >Phone Number  <span style="float: right;">:</span></label>
                      <div class="col-sm-10">
                        <input disabled type="text" id="form-field-1" value=" {{ $events->phone }}" class="companyname" name="companyname" placeholder="Name" >
                      </div>
                    </div>
                    <div class="form-elements col-md-12 col-sm-12">
                      <label class="col-sm-2 control-label no-padding-right"  >Email Id  <span style="float: right;">:</span></label>
                      <div class="col-sm-10">
                        <input disabled type="text" id="form-field-1" value=" {{ $events->email }}" class="companyname" name="companyname" placeholder="Name" >
                      </div>
                    </div>
                    <div class="form-elements col-md-12 col-sm-12">
                      <label class="col-sm-2 control-label no-padding-right"  >Location  <span style="float: right;">:</span></label>
                      <div class="col-sm-10">
                        <input disabled type="text" id="form-field-1" value="{{ $events->location }}" class="companyname" name="companyname" placeholder="Name" >
                      </div>
                    </div>
                    <div class="form-elements col-md-12 col-sm-12">
                      <label class="col-sm-2 control-label no-padding-right"  >Location Arabic <span style="float: right;">:</span></label>
                      <div class="col-sm-10">
                        <input disabled type="text" id="form-field-1" value="{{ $events->locationArb }}" class="companyname" name="companyname" placeholder="Name" >
                      </div>
                    </div>
                    <div class="form-elements col-md-12 col-sm-12">
                      <label class="col-sm-2 control-label no-padding-right"  > Event Status <span style="float: right;">:</span></label>
                      <div class="col-sm-10">
                        <?php $today = date("Y-m-d H:m:s");?>
                        @if(( $events->startdate) >= $day || ( $events->enddate) >= $day)
                          <span class="label label-sm label-success">Active</span>
                        @else
                          <span class="label label-sm label-warning">Expiring</span>
                        @endif
                      </div>
                    </div>
                    <div class="form-elements col-md-12 col-sm-12">
                      <label class="col-sm-2 control-label no-padding-right" > Date <span style="float: right;">:</span></label>
                      <div class="col-sm-10">
                        <div style="width:40%; float:left;">
                          <input disabled type="text" id="form-field-1" value=" {{ date('d-m-Y', strtotime($events->startdate)) }} TO {{ date('d-m-Y', strtotime($events->enddate)) }}" class="companyname" name="companyname" placeholder="Name" >
                        </div>
                      </div>
                    </div>
                    <div class="form-elements col-md-12 col-sm-12">
                      <label class="col-sm-2 control-label no-padding-right" > Image <span style="float: right;">:</span></label>
                      <div class="col-sm-10">
                        <img id="prfl" style="border: 1px solid #00000026;width: 40%;margin-bottom: 10px;" src="{{ asset($events->image) }}" alt="your image" />
                      </div>
                    </div>
                    <!-- <div class="form-elements col-md-12 col-sm-12">
                      <label class="col-sm-2 control-label no-padding-right" > Map <span style="float: right;">:</span></label>
                      <div class="col-sm-10">
                        <div id="map" style="height: 300px;"></div>
                      </div>
                    </div> -->
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
<!-- Body Section -->

@endsection

