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
          <li class="active">Edit Role</li>
        </ul><!-- /.breadcrumb -->

        <!-- BODY SECTION -->
        <div class="page-content">
          <div class="page-header">
            <h1>Edit Role</h1>
          </div><!-- /.page-header -->
          <div class="update clearfix">
            <div class="business-add col-md-8 col-sm-12">

                  <!-- <h2  class="dashbord-heading">Add Your New Business</h2> -->
                  
                  <div class="adding-new-bussines col-md-12 col-sm-12">
                    <form action="{{ route('role.update',$role->id) }}" method="POST" role="form" name="addproduct" enctype="multipart/form-data" id="myform" onsubmit = "return validateUser(this)">
                    @csrf
                    <div class="form-elements col-md-8 col-sm-12">
                        <label class="col-sm-3 control-label no-padding-right"  >  Role  </label>
                        <div class="col-sm-9">
                          <input type="text" id="form-field-1" value="{{ $role->name }}" class="textcls" name="role" placeholder="Name">
                        </div>
                      </div>
                    <div class="form-elements col-md-8 col-sm-12 action-section-area">
                    <label class="col-sm-3 control-label no-padding-right">  </label>
                    <div class="col-sm-8">
                      <button class="btn btn-success" type="submit" name="Registersubmit">Submit</button>
                      <button class="btn btn-danger" type="reset" name="button" onclick="myFunction()">RESET</button>
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



@endsection
