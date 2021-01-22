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
        <li class="active">Page</li>
      </ul>
      <!-- /.breadcrumb -->
      @if(!empty($page))
        <!-- BODY SECTION -->
        <div class="page-content">
          <!-- /.page-header -->
          <div class="page-header">
            <h1>{{ $page->nameEn }}</h1>
          </div>
          <!-- /.page-header -->
          <div class="update clearfix">
            <div class="business-add col-md-12 col-sm-12">
              <div class="adding-new-bussines col-md-12 col-sm-12">
                <form method="POST" role="form" name="addproduct" enctype="multipart/form-data" id="myform" onsubmit = "return validate(this)">
                  {{ method_field('PATCH') }}
                  <div class="form-elements col-md-8 col-sm-12">
                    <label class="col-sm-3 control-label no-padding-right"  > Name (English)<span style="float: right;">:</span></label>
                    <div class="col-sm-9">
                      <input disabled type="text" id="form-field-1" value="{{ $page->nameEn }}" class="companyname" name="companyname" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-elements col-md-8 col-sm-12">
                    <label class="col-sm-3 control-label no-padding-right"  > Name (Arabic)<span style="float: right;">:</span></label>
                    <div class="col-sm-9">
                      <input disabled type="text" id="form-field-1" value="{{ $page->nameArb }}" class="companyname" name="companyname" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-elements col-md-8 col-sm-12">
                    <label class="col-sm-3 control-label no-padding-right" > Description (English) <span style="float: right;">:</span></label>
                    <div class="col-sm-9">
                      <div style="border: 1px solid #00000026;padding: 5px;margin-bottom: 10px;background: #eee;">
                        @php
                          echo str_replace('<p>', '<p class="text-sans">', $page->descriptionEn );
                        @endphp
                      </div>
                    </div>
                  </div>
                  <div class="form-elements col-md-8 col-sm-12">
                    <label class="col-sm-3 control-label no-padding-right" > Description(Arabic) <span style="float: right;">:</span></label>
                    <div class="col-sm-9">
                      <div style="border: 1px solid #00000026;padding: 5px;margin-bottom: 10px;background: #eee;">
                        @php
                          echo str_replace('<p>', '<p class="text-sans">', $page->descriptionArb );
                        @endphp
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- BODY SECTION -->
      @endif
    </div>
  </div>
</div>

@endsection
