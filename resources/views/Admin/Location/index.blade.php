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
          <a href="index">Home</a>
        </li>
        <li class="active">Location List</li>
      </ul>
      <!-- /.breadcrumb -->


      <!-- BODY SECTION -->
      <div class="page-content">
        <div class="page-header">
          <h1>Location List <a href="{{ route('location.create') }}"><button>Add New</button></a> </h1>
        </div><!-- /.page-header -->
        <div class="update clearfix">

          <div class="col-md-6">
            <table id="example" class="display" style="width:100%">
              <thead>
                  <tr>
                    <th>No</th>
                    <th>Location Name(En)</th>
                    <th class="hidden-480">Location Name(Ar)</th>
                    <th>Action</th>
                  </tr>
              </thead>
                <tbody>
                    @foreach($location->sortBy('created_at') as $locationsingle)
                        <tr>
                            <td></td>
                            <td>{{ $locationsingle->locationEn}}</td>
                            <td class="hidden-480">{{ $locationsingle->locationArb}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('location.edit', $locationsingle->id  )}}">
                                    <button class="btn btn-xs btn-info">
                                    <i class="ace-icon fa fa-pencil bigger-120"></i>
                                    </button>
                                    </a>
                                    <form action="{{ route('location.destroy', $locationsingle->id)}}" method="POST"  style="float: right;margin-left: 5px;">
                                        @csrf
                                        {{ method_field('DELETE')}}
                                        <button class="btn btn-xs btn-danger">
                                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                        </button>
                                    </form>
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
          "targets": [ 0 ]
      } ]
    } );
    t.on( 'order.dt search.dt', function () {
      t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
      } );
    } ).draw();
  } );
</script>
@endsection

