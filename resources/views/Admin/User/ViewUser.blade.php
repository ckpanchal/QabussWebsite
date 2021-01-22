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
                <div class="col-xs-12 col-sm-4 center">
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
                            <div class="profile-user-info profile-user-info-striped">
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Name </div>

                                    <div class="profile-info-value">
                                        <span class="editable editable-click" >{{ $user->name }}</span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Email </div>

                                    <div class="profile-info-value">
                                        <span class="editable editable-click" >{{ $user->email }}</span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Phone </div>

                                    <div class="profile-info-value">
                                        <span class="editable editable-click" >{{ $user->phone }}</span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Last Online </div>

                                    <div class="profile-info-value">
                                        <span class="editable editable-click" id="login">{{ $user->created_at }}</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <div class="hr hr12 dotted"></div>
                </div>
                

        <div class="col-md-8 update clearfix">
            <div class="col-md-10">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Section</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <th>1</th>
                        <th>Business List</th>
                        <th><a href="{{route('user.businessview', $user->registerid)}}">Views</a></th>
                    </tr>
                    <tr>
                        <th>2</th>
                        <th>Event List</th>
                        <th><a href="{{route('user.eventview', $user->registerid)}}">Views</a></th>
                    </tr>
                    <tr>
                        <th>3</th>
                        <th>Offer List</th>
                        <th><a href="{{route('user.offerview', $user->registerid)}}">Views</a></th>
                    </tr>
                    <tr>
                        <th>4</th>
                        <th>Favourite List</th>
                        <th> <a href="{{route('user.favouriteview', $user->registerid)}}">Views</a> </th>
                    </tr>
                    <tr>
                        <th>5</th>
                        <th>Recommend List</th>
                        <th><a href="{{route('user.recommendview', $user->registerid)}}">Views</a></th>
                    </tr>
                </tbody>
              </table>
            </div>
          </div><!-- /.nav-search -->



                
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
          "targets":  [ 0,]
      } ],
    } );
    t.on( 'order.dt search.dt', function () {
      t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
      } );
    } ).draw();
  } );
</script>


@endsection
