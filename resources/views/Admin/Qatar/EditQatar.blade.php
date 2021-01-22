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
        <li class="active">Qatar</li>
      </ul><!-- /.breadcrumb -->
      <!-- BODY SECTION -->
      <div class="page-content">
        <div class="page-header">
          <h1>Add New</h1>
        </div><!-- /.page-header -->
        <div class="update clearfix">
                      <div class="business-add col-md-12 col-sm-12">
                            <div class="adding-new-bussines col-md-12 col-sm-12">
                  @if(!empty($qatar))

                <form action="{{ route('qatar.update',$qatar->id) }}" method="POST" role="form" name="addproduct" enctype="multipart/form-data" id="myform" onsubmit = "return validateEditQatar(this)">
                @csrf
                {{ method_field('PATCH') }}
                  <div class="form-elements col-md-8 col-sm-12" style="margin-bottom: 10px;">
                    <label class="col-sm-3 control-label no-padding-right"  > Heading(En)<span class="form-require">*</span> <span style="float: right;">:</span>  </label>
                    <div class="col-sm-9">
                    <input value="{{ $qatar->nameEn }}" type="text" id="form-field-1" class="companyname" name="heading" placeholder="Name (English)*">
                    </div>
                  </div>
                  <div class="form-elements col-md-8 col-sm-12" style="margin-bottom: 10px;">
                    <label class="col-sm-3 control-label no-padding-right"  > Heading(Arb)<span class="form-require">*</span> <span style="float: right;">:</span>  </label>
                    <div class="col-sm-9">
                    <input value="{{ $qatar->nameArb }}" type="text" id="form-field-1" class="companyname" name="headingArb" placeholder="Name (English)*">
                    </div>
                  </div>
                    <div class="form-elements col-md-8 col-sm-12">
                    <label class="col-sm-3 control-label no-padding-right" > Content(En)<span class="form-require">*</span> <span style="float: right;">:</span></label>
                    <div class="col-sm-9">
                      <textarea class="tinymce"  id="texteditor" name="content" rows="4" style="width: 100%;border: 1px solid #ececec;" >{{ $qatar->descriptionEn }}</textarea>
                    </div>
                  </div>
                  <div class="form-elements col-md-8 col-sm-12">
                    <label class="col-sm-3 control-label no-padding-right" > Content(Arb)<span class="form-require">*</span> <span style="float: right;">:</span></label>
                    <div class="col-sm-9">
                      <textarea class="tinymce"  id="texteditorone" name="contentArb" rows="4" style="width: 100%;border: 1px solid #ececec;" >{{ $qatar->descriptionArb }}</textarea>
                    </div>
                  </div>
                  <div class="form-elements col-md-8 col-sm-12" style="margin-top: 10px;">
                    <label class="col-sm-3 control-label no-padding-right" > Limited Content(En)<span class="form-require">*</span> <span style="float: right;">:</span></label>
                    <div class="col-sm-9">
                      <textarea class=""  id="texteditor" name="limitcontent" rows="4" style="width: 100%;border: 1px solid #D5D5D5;resize: none;" >{{ $qatar->summeryEn }}</textarea>
                    </div>
                  </div>
                  <div class="form-elements col-md-8 col-sm-12" style="margin-top: 10px;">
                    <label class="col-sm-3 control-label no-padding-right" > Limited Content(Arb)<span class="form-require">*</span> <span style="float: right;">:</span></label>
                    <div class="col-sm-9">
                      <textarea class=""  id="texteditor" name="limitcontentArb" rows="4" style="width: 100%;border: 1px solid #D5D5D5;resize: none;" >{{ $qatar->summeryArb }}</textarea>
                    </div>
                  </div>
                  <div class="col-sm-8">
                    <label class="col-sm-3 control-label no-padding-right"> Image  </label>
                    <div class="col-sm-6">
                    <input type="hidden" name="oldimage"  onchange="backreadURL(this);" value="{{ $qatar->image }}">
                    <img id="qatarImage" style="width: 360px;height: 250px;" src="{{ asset($qatar->image) }}" alt="your image" />
                      <div class="action-section">
                          <span style="font-size: 17px; background: #000; padding: 8px; color: #fff;">select Image</span>
                          <input  accept='image/*' type="file" name="image" class="prfl-pic" onchange="qatarImg(this);" capture >
                      </div>
                    </div>
                  </div>
                  <div class="form-elements col-md-8 col-sm-12 action-section-area">
                    <label class="col-sm-3 control-label no-padding-right" >  </label>
                    <div class="col-sm-8">
                      <button class="btn btn-success" type="submit" name="MainCategorysubmit">Submit</button>
                      <button class="btn btn-danger" type="button" name="button"  onclick="myFunction()">RESET</button>
                    </div>
                  </div>
                </form>
                @endif

              </div>
            </div>
          </div><!-- /.nav-search -->
      </div><!-- BODY SECTION -->
    </div>
  </div><!-- /.nav-search -->
</div>





@endsection
