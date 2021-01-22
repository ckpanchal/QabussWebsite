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
                    <a href="{{ route('index')}}">Home</a>
                    </li>
                    <li class="active"> Profile</li>
                </ul>
            </div>
            <div id="user-profile-1" class="user-profile row">
                <div class=" hr16 "></div>
                <div class="col-xs-12 col-sm-3 center">
                    <div>
                        <span class="profile-picture">
                            <img id="avatar" class="editable img-responsive editable-click editable-empty" alt="User Image" src="{{ $user->image }}" style="width: 180px;height: 200px;">
                        </span>
                        <div class="space-4"></div>
                        <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                            <div class="inline position-relative">
                                    <span class="white">{{ $user->name }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="space-6"></div>
                    <div class="hr hr12 dotted"></div>
                    <div class="clearfix">
                        <div class="grid3">
                            <a href="{{route('profile.businessview', $user->registerid)}}">
                            <span class="bigger-175 blue">{{ $BusinessCount }}</span></a>
                            <br>
                            Business
                        </div>
                        <div class="grid3">
                            <a href="{{route('profile.eventview', $user->registerid)}}">
                            <span class="bigger-175 blue">{{ $EventCount }}</span></a>
                            <br>
                            Event
                        </div>
                        <div class="grid3">
                            <a href="{{route('profile.offerview', $user->registerid)}}">
                            <span class="bigger-175 blue">{{ $OffersCount }}</span></a>
                            <br>
                            Offer
                        </div>
                    </div>
                    <div class="hr hr12 dotted"></div>
                </div>
                <div class="col-xs-12 col-sm-8 ">
                    <form action="{{ route('profile.update',$user->registerid) }}" method="POST" role="form" name="addproduct" enctype="multipart/form-data" id="myform" onsubmit="return validateEditUser(this)">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="form-elements col-md-8 col-sm-12">
                            <label class="col-sm-3 control-label no-padding-right"> User Name  </label>
                            <div class="col-sm-9">
                            <input type="text" id="form-field-1" value="{{ $user->name }}" class="textcls" name="username" placeholder="Name">
                            </div>
                                            <label class="col-sm-3 control-label no-padding-right"> User Email Id</label>
                            <div class="col-sm-9">
                            <input type="text" id="form-field-1" class="textcls" value="{{ $user->email }}" name="emailid" placeholder="Email Id">
                            </div>
                        </div>
                        <div class="form-elements col-md-8 col-sm-12">
                            <label class="col-sm-3 control-label no-padding-right"> Phone Number </label>
                            <div class="col-sm-9">
                              <input type="hidden" name="oldimage"  onchange="backreadURL(this);" value="{{ $user->image }}">
                            <input value="{{ $user->phone }}" onpaste="return false;" onkeypress="ValidateNumber(event)" type="text" class="textcls" name="phonenumber" maxlength="8" placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="form-elements col-md-8 col-sm-12">
                        </div>

                        <div class="form-elements col-md-8 col-sm-12 action-section-area" style="margin-top: 20px;">
                        <label class="col-sm-3 control-label no-padding-right">  </label>
                        <div class="col-sm-8">
                            <button class="btn btn-success" type="submit" name="Usersubmit">Submit</button>
                            <button class="btn btn-danger" type="reset" name="button" onclick="myFunction()">RESET</button>
                        </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Body Section -->

<script src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function() {
    var t = $('#example').DataTable( {
      "columnDefs": [ {
          "searchable": false,
          "orderable": false,
          "targets":  [ 0]
      } ],
      "order": [[ 1, 'asc' ]]
    } );
    t.on( 'order.dt search.dt', function () {
      t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
      } );
    } ).draw();
  } );
</script>


@endsection
