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
                        <li class="active">Add New Location</li>
                    </ul><!-- /.breadcrumb -->

                    <!-- Body Section -->

                        <div class="page-content">
                            <div class="page-header">
                                <h1>New Location</h1>
                            </div>
                            <div class="update clearfix">
                                <div class="business-add col-md-12 col-sm-12">
                                    <div class="adding-new-bussines col-md-12 col-sm-12">
                                        <form action="{{ route('location.store') }}" method="POST" role="form" name="addproduct" enctype="multipart/form-data" id="myform" onsubmit = "return validateLocation(this)">
                                        @csrf
                                        <div class="form-elements col-md-8 col-sm-12">
                                                <label class="col-sm-4 control-label no-padding-right"  > Location Name(En)  </label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="form-field-1" class="companyname" name="locationname" placeholder="Name (English)*">
                                                </div>
                                                <label class="col-sm-4 control-label no-padding-right"  > Location Name (Ar)  </label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="form-field-1" class="companyname"  name="locationnamearb"  placeholder="Name (Arabic)*">
                                                </div>
                                            </div>
                                            <div class="form-elements col-md-8 col-sm-12 action-section-area">
                                                <label class="col-sm-4 control-label no-padding-right" >  </label>
                                                <div class="col-sm-8">
                                                    <button class="btn btn-success" type="submit" name="Registersubmit">Submit</button>
                                                    <button class="btn btn-danger" type="button" name="button"  onclick="myFunction()">RESET</button>
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







@endsection
