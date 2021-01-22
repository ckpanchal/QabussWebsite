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
    <li class="active"><a href="{{ route('profile.index')}}">Profile</a></li>
    <li><a href="{{route('profile.offerview', Auth::user()->registerid)}}">Offer</a></li>
      <li class="active">View Offer</li>
    </ul><!-- /.breadcrumb -->

    <!-- BODY SECTION -->
    <div class="page-content">
      <div class="page-header">
        <h1>View Offer</h1>
      </div><!-- /.page-header -->
      <div class="update clearfix">
        <div class="business-add col-md-12 col-sm-12">

              <!-- <h2  class="dashbord-heading">Add Your New Business</h2> -->

              <div class="adding-new-bussines col-md-12 col-sm-12">
              @if(!empty($offers))
                <form method="POST" role="form" name="addproduct" enctype="multipart/form-data" id="myform" onsubmit = "return validate(this)">
              {{ method_field('PATCH') }}
                  <div class="form-elements col-md-12 col-sm-12">
                    <label class="col-sm-2 control-label no-padding-right"  > Heading (English)  </label>
                    <div class="col-sm-10">
                      <input disabled type="text" id="form-field-1" value="{{ $offers->headingEn }}" class="companyname" name="companyname" placeholder="Name">
                    </div>
                    </div>
                    <div class="form-elements col-md-12 col-sm-12">
                    <label class="col-sm-2 control-label no-padding-right"  > Heading (Arabic)</label>
                    <div class="col-sm-10">
                      <input disabled type="text" id="form-field-1" class="companyname" value="{{ $offers->headingArb }}"  name="companyname"  placeholder="info@gmail.com">
                    </div>
                  </div>
                  <div class="form-elements col-md-12 col-sm-12">
                    <label class="col-sm-2 control-label no-padding-right"  > Description(English)  </label>
                    <div class="col-sm-10">
                      <div style="border: 1px solid #00000026;padding: 5px;margin-bottom: 10px;background: #eee;">
                        @php
                          echo str_replace('<p>', '<p>', $offers->descriptionEn );
                        @endphp
                      </div>
                    </div>
                    </div>
                  <div class="form-elements col-md-12 col-sm-12">

                    <label class="col-sm-2 control-label no-padding-right"  >Description(Arabic)  </label>
                    <div class="col-sm-10">
                      <div class="info-desc" style="border: 1px solid #00000026;padding: 5px;margin-bottom: 10px;background: #eee;">
                        @php
                          echo str_replace('<p>', '<p>', $offers->descriptionArb );
                        @endphp
                      </div>
                    </div>
                  </div>
                  <div class="form-elements col-md-12 col-sm-12">

                    <label class="col-sm-2 control-label no-padding-right"  >Address(English)  </label>
                    <div class="col-sm-10">
                      <div class="info-desc" style="border: 1px solid #00000026;padding: 5px;margin-bottom: 10px;background: #eee;">
                        @php
                          echo str_replace('<p>', '<p>', $offers->locationEn );
                        @endphp
                      </div>
                    </div>
                  </div>
                  <div class="form-elements col-md-12 col-sm-12">

                    <label class="col-sm-2 control-label no-padding-right"  >Address(Arabic)  </label>
                    <div class="col-sm-10">
                      <div class="info-desc" style="border: 1px solid #00000026;padding: 5px;margin-bottom: 10px;background: #eee;">
                        @php
                          echo str_replace('<p>', '<p>', $offers->locationArb );
                        @endphp
                      </div>
                    </div>
                  </div>
                  <div class="form-elements col-md-12 col-sm-12">
                    <label class="col-sm-2 control-label no-padding-right"  >Company Name  </label>
                    <div class="col-sm-10">
                    @foreach($business as $businessingles)
                      @if(($businessingles->registerId) == ($offers->companyid))
                      <input disabled type="text" id="form-field-1" value="{{ $businessingles->companyname}}" class="companyname" name="companyname" placeholder="Name">
                      @endif
                    @endforeach
                    </div>
                  </div>
                  <div class="form-elements col-md-12 col-sm-12">
                    <label class="col-sm-2 control-label no-padding-right"  >Category</label>
                    <div class="col-sm-10">
                    @foreach($category as $categoryingles)
                      @if(($categoryingles->id) == ($offers->category_id))
                      <input disabled type="text" id="form-field-1" value="{{ $categoryingles->name}}" class="companyname" name="companyname" placeholder="Name">
                      @endif
                    @endforeach
                    </div>
                  </div>
                  <div class="form-elements col-md-12 col-sm-12">
                    <label class="col-sm-2 control-label no-padding-right"  >Url</label>
                    <div class="col-sm-10">
                      <input disabled type="text" id="form-field-1" value="{{ $offers->appUrl}}" class="companyname" name="companyname" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-elements col-md-12 col-sm-12">
                    <label class="col-sm-2 control-label no-padding-right"  >Tag</label>
                    <div class="col-sm-10">
                    @foreach($OfferTags as $OfferTagssingles)
                      @foreach($OfferTag as $OfferTagsingles)
                        @if(($OfferTagssingles->tagid) == ($OfferTagsingles->id))
                        <input disabled type="text" id="form-field-1" value="{{ $OfferTagsingles->nameEn}}" class="companyname" name="companyname" placeholder="Name">
                        @endif
                      @endforeach
                    @endforeach
                    </div>
                  </div>
                  <div class="form-elements col-md-12 col-sm-12">

                    <label class="col-sm-2 control-label no-padding-right"  > Offer Status</label>
                    <div class="col-sm-10">
                        <?php $today = date("Y-m-d H:m:s");?>
                        @if(( $offers->startdate) >= $today || ( $offers->enddate) >= $today)
                        <span class="label label-sm label-success">Active</span>
                        @else
                        <span class="label label-sm label-warning">Expiring</span>
                        @endif
                    </div>
                  </div>
                  <div class="form-elements col-md-12 col-sm-12">
                    <label class="col-sm-2 control-label no-padding-right" > Date </label>
                    <div class="col-sm-10">
                      <div style="width:40%; float:left;">
                        <input disabled type="text" id="form-field-1" value="{{ $offers->startdate }} To {{ $offers->enddate }}" class="companyname" name="companyname" placeholder="Name" >
                      </div>
                    </div>
                  </div>
                  <div class="form-elements col-md-12 col-sm-12">
                    <label class="col-sm-2 control-label no-padding-right" > Image </label>
                    <div class="col-sm-4">
                    <img id="prfl" style="border: 1px solid #00000026;width: 100%;margin-bottom: 10px;" src="{{ asset($offers->image) }}" alt="your image" />
                    </div>
                  </div>
                  <div class="form-elements col-md-12 col-sm-12">
                    <label class="col-sm-2 control-label no-padding-right" > Map </label>
                    <div class="col-sm-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3606.9313611511743!2d51.48431281530552!3d25.30651008384538!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e45cf9f51ff3de5%3A0xc2423fd9853222b4!2sWebzone%20Technologies!5e0!3m2!1sen!2sin!4v1600846025179!5m2!1sen!2sin" width="100%" height="280" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>                    </div>
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

@endsection

