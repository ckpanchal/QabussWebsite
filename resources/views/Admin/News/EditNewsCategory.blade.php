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
        <li class="active">Edit News Category</li>
      </ul><!-- /.breadcrumb -->

      <!-- BODY SECTION -->
      <div class="page-content">
        <div class="page-header">
          <h1>Edit News Category</h1>
        </div><!-- /.page-header -->
        <div class="update clearfix">
                      <div class="business-add col-md-12 col-sm-12">
                            <div class="adding-new-bussines col-md-12 col-sm-12">
                              @if(!empty($newscategory))
                <form action="{{ route('newscategory.update',$newscategory->id) }}" method="POST" role="form" name="addproduct" enctype="multipart/form-data" id="myform" onsubmit = "return validateNewsCategory(this)">
                @csrf
                {{ method_field('PATCH') }}
                <div class="form-elements col-md-8 col-sm-12">
                    <label class="col-sm-3 control-label no-padding-right"  > Category Name  </label>
                    <div class="col-sm-8">
                      <input value="{{ $newscategory->name }}" type="text" id="form-field-1" class="companyname" name="name" placeholder="Category Name (English)*">
                    </div>
                    <label class="col-sm-3 control-label no-padding-right"  > Category Name (Arabic)  </label>
                    <div class="col-sm-8">
                      <input value="{{ $newscategory->name }}" type="text" id="form-field-1" class="companyname"  name="nameArb"  placeholder="Category Name (Arabic)*">
                    </div>
                  </div>
                  <div class="form-elements col-md-8 col-sm-12">
                    <label class="col-sm-3 control-label no-padding-right"  > parent  </label>
                      <div class="col-sm-8" style="margin-bottom: 10px;">
                        <select class="chosen-select form-control" name="Parentcategory" id="Parentcategory" data-placeholder="Choose Your"  style="border-radius: 15px!important;height: 40px;">
                            <option disabled selected>Select Category</option>
                            @foreach($category as $newscategorys)
                            @if(($groupName= $newscategorys->parent) == 0 )
                                @if(($groupName= $newscategorys->id) == ( $newscategory->parent  ))
                                    <option selected value="{{ $newscategorys->id}}">{{ $newscategorys->name}}</option>                         
                                @else
                                    <option value="{{ $newscategorys->id}}">{{ $newscategorys->name}}</option>
                                @endif
                            @endif
                            @endforeach
                        </select>
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