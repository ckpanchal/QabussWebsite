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
        <li class="active">Role Permission</li>
      </ul>
      <!-- /.breadcrumb -->



      <!-- BODY SECTION -->
      <div class="page-content">
        <div class="page-header">
          <h1>{{ $role->name }} Role Permission</h1>
        </div><!-- /.page-header -->
        <div class="update clearfix">

          <div class="col-md-12">
            
          <form action="{{ route('permission.update', $role->id) }}" method="POST" role="form" name="addproduct" enctype="multipart/form-data" id="myform">
          @csrf
            <div class="form-elements col-md-8 col-sm-12">
              @foreach($category as $categories)
              <div class="form-elements col-md-12 col-sm-12">
                <label class="col-sm-3 control-label no-padding-right"  >  {{ $categories->name }}  </label>
                <div class="col-sm-9">
                @foreach($connection as $connections)
                  @if(($categories->id) == ($connections->category))
                    @foreach($permissions as $permission)
                      @if(($connections->permission) == ($permission->id))
                            <input type="hidden"  name="user" value="{{ $role->id }}">
                            <input type="checkbox"  name="role[]" value="{{ $permission->id }}" @if ($role->hasPermissionTo($permission->name)) checked @endif>
                            <label for="role"> {{ ucwords(str_replace("_", " ",$permission->name)) }} </label><br>
                      @endif
                    @endforeach
                  @endif
                @endforeach
                </div>
              </div>

              @endforeach
            </div>
            <div class="form-elements col-md-8 col-sm-12 action-section-area">
              <label class="col-sm-3 control-label no-padding-right" ></label>
              <div class="col-sm-8">
                <button class="btn btn-success" type="submit" name="Registersubmit">Submit</button>
              </div>
            </div>
            @csrf

            </form>

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
