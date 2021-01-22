@extends('Admin.layout.app')
@section('title','Dashboard - Qabuss')
@section('content')

    <!-- Body Section -->

    <div class="main-content">
  <div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
      <!-- /.breadcrumb -->
      <ul class="breadcrumb">
        <li>
          <i class="ace-icon fa fa-home home-icon"></i>
          <a href="{{ route('index')}}">Home</a>
        </li>
        <li class="active">Users List</li>
      </ul>
      <!-- /.breadcrumb -->


      <!-- BODY SECTION -->
      <div class="page-content">
        <div class="page-header">
          <h1>Users List</h1>
        </div><!-- /.page-header -->
        <div class="update clearfix">

          <div class="col-md-12">
            <table id="example" class="display" style="width:100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th class="hidden-480">Email Id</th>
                      <th class="hidden-480">Phone Number</th>
                      <!-- <th class="hidden-480">Role</th> -->
                      <th class="hidden-480">Active</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
              @foreach($user as $usersingle)
                                <tr>
                  <td></td>
                  <td>{{ $usersingle->name}}</td>
                  <td class="hidden-480">{{ $usersingle->email}}</td>
                  <td class="hidden-480">{{ $usersingle->phone}}</td>
                  <!-- <td class="hidden-480">{{ $usersingle->type}}</td> -->
                  <td class="hidden-480">
                    @if(( $usersingle->approve ) == 1 )
                    <span class="label label-sm label-success">Approve</span>
                    @else
                    <span class="label label-sm label-warning">Not Approve</span>
                    @endif
                  </td>
                  <td>
                  <div class="hidden-sm hidden-xs btn-group">
                    @can('view_business')
                      <a href="{{ route('user.show', $usersingle->registerid)}}">
                        <button class="btn btn-xs btn-warning">
                          <i class="ace-icon fa fa-eye bigger-120"></i>
                        </button>
                      </a>
                    @endcan
                    @can('edit_business')
                      <a href="{{ route('user.edit', $usersingle->registerid)}}">
                        <button class="btn btn-xs btn-info">
                          <i class="ace-icon fa fa-pencil bigger-120"></i>
                        </button>
                      </a>
                    @endcan
                    @can('delete_business')
                      <form action="{{ route('user.destroy', $usersingle->registerid)}}" method="POST"  style="float: right;margin-left: 5px;">
                        @csrf
                        {{ method_field('DELETE')}}
                        <button class="btn btn-xs btn-danger">
                          <i class="ace-icon fa fa-trash-o bigger-120"></i>
                        </button>
                      </form>
                    @endcan

                  </div>
                  <div class="hidden-md hidden-lg">
                    <div class="inline pos-rel">
                      <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                        <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                      </button>
                      <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                        <li>
                          <a href="{{ route('user.show', $usersingle->registerid)}}" class="tooltip-success" data-rel="tooltip" title="Edit">
                            <span class="green">
                              <i class="ace-icon fa fa-eye bigger-120"></i>
                            </span>
                          </a>
                        </li>
                        <li>
                          <a href="{{ route('user.edit', $usersingle->registerid)}}" class="tooltip-error" data-rel="tooltip" title="Delete">
                            <span class="blue">
                            <i class="ace-icon fa fa-pencil bigger-120"></i>
                            </span>
                          </a>
                        </li>
                        <li>
                          <a href="{{ route('user.destroy', $usersingle->registerid)}}" class="tooltip-error" data-rel="tooltip" title="Delete">
                            <span class="red">
                              <i class="ace-icon fa fa-trash-o bigger-120"></i>
                            </span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  </td>
                </tr>
                @endforeach
                </tbody>

            </table>

			<label class="control-label" for="inputWarning" id="place01" style="color:red;"></label>
    </div>
  </div><!-- /.nav-search -->
</div>
<!-- BODY SECTION -->



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
