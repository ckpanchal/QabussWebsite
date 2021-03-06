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
        <li class="active">Profile</li>
        <li class="active">Event List</li>
      </ul><!-- /.breadcrumb -->

      <!-- BODY SECTION -->
              <div class="page-content">
          <div class="page-header">
            <h1> Event List</h1>
          </div><!-- /.page-header -->
          <div class="update clearfix">
            <div class="col-md-12">
              <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Event Name</th>
                        <th class="hidden-480">Startdate</th>
                        <th class="hidden-480">Enddate</th>
                        <th class="hidden-480">Status</th>
                        <th class="hidden-480">Amount</th>
                        <th class="hidden-480">Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($event as $eventingle)
                                <tr>
                  <td></td>
                  <td>{{ $eventingle->headingEn}}</td>
                  <td class="hidden-480">{{ $eventingle->startdate}}</td>
                  <td class="hidden-480">{{ $eventingle->enddate}}</td>
                  <td class="hidden-480">
                        @if(( $eventingle->enddate) >= $day)
                         <span class="label label-sm label-success">Active</span>
                        @else
                         <span class="label label-sm label-warning">Expiring</span>
                        @endif
                    </td>
                  <td class="hidden-480">{{ $eventingle->amount}}</td>
                  <td class="hidden-480">{{ $eventingle->phone}}</td>

                  <td>
                    <div class="btn-group">
                      <a href="{{ route('user.eventsingle', $eventingle->eventid)}}">
                          <button class="btn btn-xs btn-warning">
                              <i class="ace-icon fa fa-eye bigger-120"></i>
                          </button>
                      </a>
                    </div>
                  </td>
                </tr>
                @endforeach



                                  </tbody>
              </table>
              <label class="control-label" for="inputWarning" id="place01" style="color:red;"></label>
            </div>
          </div><!-- /.nav-search -->
        </div><!-- BODY SECTION -->


    </div>
  </div><!-- /.nav-search -->
</div>



<script src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function() {
    var t = $('#example').DataTable( {
      "columnDefs": [ {
          "searchable": false,
          "orderable": false,
          "targets":  [ 0, 3]
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
