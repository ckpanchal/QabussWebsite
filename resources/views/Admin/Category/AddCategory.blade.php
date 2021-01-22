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
                        <li><a href="#">Category</a></li>
                        <li class="active">Add New Category</li>
                    </ul><!-- /.breadcrumb -->

                    <!-- Body Section -->

                        <div class="page-content">
                            <div class="page-header">
                                <h1>New Category</h1>
                            </div>
                            <div class="update clearfix">
                                <div class="business-add col-md-12 col-sm-12">
                                    <div class="adding-new-bussines col-md-12 col-sm-12">
                                        <form action="{{ route('category.store') }}" method="POST" role="form" name="addproduct" enctype="multipart/form-data" id="myform" onsubmit = "return validateCate(this)">
                                        @csrf
                                        <div class="form-elements col-md-8 col-sm-12">
                                                <label class="col-sm-4 control-label no-padding-right"  > Category Name  </label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="form-field-1" class="companyname" name="categoryname" placeholder="Name (English)*">
                                                </div>
                                                <label class="col-sm-4 control-label no-padding-right"  > Category Name (Arabic)  </label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="form-field-1" class="companyname"  name="categorynamearb"  placeholder="Name (Arabic)*">
                                                    <input type="hidden" id="form-field-1" class="iconcolor"  name="iconcolor" value="#000">
                                                </div>
                                                <label class="col-sm-4 control-label no-padding-right" > Parent Category </label>
                                                <div class="col-sm-8" style="margin-bottom: 10px;">
                                                    <select class="form-control" name="Parentcategory" id="Parentcategory" data-placeholder="Choose Your">
                                                        <option disabled selected>Select Category</option>
                                                        @foreach($category as $categorysingle)
                                                            @if(($groupName= $categorysingle->parent) == "0")
                                                            <option value="{{ $categorysingle->id}}">{{ $categorysingle->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-12" style="padding: 0px;">
                                                    <label class="col-sm-4 control-label no-padding-right"  > Category Image  </label>
                                                    <div class="col-sm-4">
                                                        <img id="cateImg" style="width: 100px;height: 100px;" src="{{ asset('image/category.jpg') }}" alt="your image" />
                                                        <div class="action-section">
                                                            <span style="font-size: 17px; background: #000; padding: 8px; color: #fff;">select Image</span>
                                                            <input type="file" name="cateimage" class="prfl-pic" onchange="read(this);" capture >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-elements col-md-8 col-sm-12 action-section-area">
                                                <label class="col-sm-4 control-label no-padding-right" >  </label>
                                                <div class="col-sm-8">
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







@endsection

