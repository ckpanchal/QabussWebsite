@extends('Admin.layout.app')
@section('title','Dashboard - Qabuss')
@section('content')


<div class="main-content">
  <div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="ace-icon fa fa-home home-icon"></i>
          <a href="{{ route('index')}}">Home</a>
        </li>
        <li class="active">View Business</li>
      </ul><!-- /.breadcrumb -->

      <!-- BODY SECTION -->
      <div class="page-content">
        <div class="page-header">
          <h1>View Business</h1>
        </div><!-- /.page-header -->
        <div class="update clearfix">
          <div class="business-add col-md-12 col-sm-12">

                <!-- <h2  class="dashbord-heading">Add Your New Business</h2> -->

                <div class="adding-new-bussines col-md-12 col-sm-12">
                @if(!empty($user))
                  <form action="{{ route('user.update',$user->registerid) }}" method="POST" role="form" name="addproduct" enctype="multipart/form-data" id="myform" onsubmit = "return validateEditUser(this)">
                    @csrf
                    {{ method_field('PATCH') }}

                    <div class="form-elements col-md-8 col-sm-12">
                      <label class="col-sm-3 control-label no-padding-right"  > User Name  </label>
                      <div class="col-sm-9">
                        <input type="text" id="form-field-1" value="{{ $user->name }}" class="textcls" name="username" placeholder="Name">
                      </div>
    									<label class="col-sm-3 control-label no-padding-right"  > User Email Id</label>
                      <div class="col-sm-9">
                        <input type="text" id="form-field-1" class="textcls" value="{{ $user->email }}"  name="emailid"  placeholder="Email Id">
                      </div>
                    </div>
                    <div class="form-elements col-md-8 col-sm-12">
                      <label class="col-sm-3 control-label no-padding-right" > Phone Number </label>
                      <div class="col-sm-9">
                        <input value="{{ $user->phone }}" onpaste="return false;" onkeypress='ValidateNumber(event)' type="text" class="textcls" name="phonenumber" maxlength = "8" placeholder="Phone Number">
                      </div>
                    </div>
                    <!-- <div class="form-elements col-md-8 col-sm-12">
                        <label class="col-sm-3 control-label no-padding-right" >User Type </label>
                        <div class="col-sm-9">
                            <select id="role" name="role" class="textcls" >
                                <option disabled="disabled" selected >Select Type</option>
                                @foreach($role as $roleinfo)
                                    <option value="{{ $roleinfo->name}}">{{ $roleinfo->name}}</option>
                                @endforeach
                          </select>                        
                        </div>
                      </div> -->
                    <div class="form-elements col-md-8 col-sm-12">
                    <label class="col-sm-3 control-label no-padding-right" > profile Pic </label>
                    <div class="col-sm-4 clearfix">
                      <img id="userImg" style="width: 180px;height: 180px;" src="{{ $user->image }}" alt="your image" />
                      <input type="hidden" name="oldimage"  onchange="backreadURL(this);" value="{{ $user->image }}">
                      <div class="action-section">
                        <span style="font-size: 17px; background: #000; padding: 8px; color: #fff;">select Image</span>
                        <input type="file" name="image" class="prfl-pic" onchange="User(this);" capture >
                      </div>
                    </div>
                  </div>
                  <div class="form-elements col-md-8 col-sm-12 action-section-area">
                    <label class="col-sm-3 control-label no-padding-right" >  </label>
                    <div class="col-sm-8">
                      <button class="btn btn-success" type="submit" name="Usersubmit">Submit</button>
                      <button class="btn btn-danger" type="reset" name="button"  onclick="myFunction()">RESET</button>
                    </div>
                  </div>
                  </form>
                @endif
                </div>
              </div>
            </div><!-- /.nav-search -->
          </div>
          <!-- BODY SECTION -->
        </div>
  </div><!-- /.nav-search -->
</div>


@endsection

