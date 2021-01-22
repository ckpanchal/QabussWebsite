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
                        <li><a href="#">Category Tag</a></li>
                        <li class="active">Add New Category Tag</li>
                    </ul><!-- /.breadcrumb -->

                    <!-- Body Section -->

                        <div class="page-content">
                            <div class="page-header">
                                <h1>New Category Tag</h1>
                            </div>
                            <div class="update clearfix">
                                <div class="business-add col-md-12 col-sm-12">
                                    <div class="adding-new-bussines col-md-12 col-sm-12">
                                        <form action="{{ route('categorytag.store') }}" method="POST" role="form" name="addproduct" enctype="multipart/form-data" id="myform" onsubmit = "return validateCateTag(this)">
                                        @csrf
                                        <div class="form-elements col-md-8 col-sm-12">
                                                <label class="col-sm-4 control-label no-padding-right"  > Tag Name  </label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="form-field-1" class="companyname" name="tagname" placeholder="Name (English)*">
                                                </div>
                                                <label class="col-sm-4 control-label no-padding-right"  > Tag Name (Arabic)  </label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="form-field-1" class="companyname"  name="tagnamearb"  placeholder="Name (Arabic)*">
                                                </div>
                                                <label class="col-sm-4 control-label no-padding-right" > Category </label>
                                                <div class="col-sm-8" style="margin-bottom: 10px;">
                                                    <select class="form-control" name="Parentcategory" id="Parentcategory" data-placeholder="Choose Your"  >
                                                        <option disabled selected value="" >Select Category</option>
                                                        @foreach($category as $categorysingle)
                                                            @if((($groupName= $categorysingle->tag) == "0") && ($groupNames= $categorysingle->parent) != "0" )
                                                            <option value="{{ $categorysingle->id}}">{{ $categorysingle->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
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





<script type="text/javascript">
    $(function () {
        $("#btnSubmit").click(function () {
            var ddlFruits = $("#Parentcategory");
            if (ddlFruits.val() == "") {
                //If the "Please Select" option is selected display error.
                alert("Please select an option!");
                return false;
            }
            return true;
        });
    });
</script>

@endsection

