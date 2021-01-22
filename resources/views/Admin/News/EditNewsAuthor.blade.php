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
        <li class="active">Edit News Author</li>
      </ul><!-- /.breadcrumb -->

      <!-- BODY SECTION -->
      <div class="page-content">
        <div class="page-header">
          <h1>Edit News Author</h1>
        </div><!-- /.page-header -->
        <div class="update clearfix">
                      <div class="business-add col-md-12 col-sm-12">
                            <div class="adding-new-bussines col-md-12 col-sm-12">
                              @if(!empty($author))
                <form action="{{ route('author.update',$author->id) }}" method="POST" role="form" name="addproduct" enctype="multipart/form-data" id="myform" onsubmit = "return SubValidate(this)">
                @csrf
                {{ method_field('PATCH') }}
                <div class="form-elements col-md-8 col-sm-12">
                    <label class="col-sm-3 control-label no-padding-right"  > Author Name  </label>
                    <div class="col-sm-8">
                      <input value="{{ $author->name }}" type="text" id="form-field-1" class="companyname" name="name" placeholder="Author Name">
                    </div>
                  </div>
                  <div class="form-elements col-md-8 col-sm-12 action-section-area">
                    <label class="col-sm-3 control-label no-padding-right" >  </label>
                    <div class="col-sm-8">
                      <button class="btn btn-success" type="submit" name="MainCategorysubmit">Submit</button>
                      <button class="btn btn-danger" type="reset" name="button"  onclick="myFunction()">RESET</button>
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