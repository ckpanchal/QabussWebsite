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
          <a href="#">Home</a>
        </li>
        <li class="active">Page</li>
      </ul><!-- /.breadcrumb -->

      <!-- BODY SECTION -->
              <div class="page-content">
          <div class="page-header">
          </div><!-- /.page-header -->
          <div class="update clearfix">
            <div class="col-md-12">
              <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Name Arabic</th>
                        <!-- <th  class="hidden-480">Start Date</th>
                        <th  class="hidden-480">End Date</th>
                        <th  class="hidden-480">Company Name</th>
                        <th  class="hidden-480">Status</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($page as $pagesingle)
                    <tr>
                      <td></td>
                      <td>{{ $pagesingle->nameEn}}</td>
                      <td>{{ $pagesingle->nameArb}}</td>
                      <td style="width: 35%;">

                      <div class="hidden-sm hidden-xs btn-group">
                    <a href="{{ route('page.show', $pagesingle->registerid)}}">
                    <button class="btn btn-xs btn-warning">
                      <i class="ace-icon fa fa-eye bigger-120"></i>
                    </button>
                    </a>
                    <a href="{{ route('page.edit', $pagesingle->registerid)}}">
                    <button class="btn btn-xs btn-info">
                      <i class="ace-icon fa fa-pencil bigger-120"></i>
                    </button>
                    </a>
                  </div>

                  <div class="hidden-md hidden-lg" style="text-align: center;">
                    <div class="inline pos-rel">
                      <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                        <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                      </button>
                      <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                        <li>
                          <a href="{{ route('page.show', $pagesingle->registerid)}}" class="tooltip-success" data-rel="tooltip" title="Edit">
                            <span class="green">
                              <i class="ace-icon fa fa-eye bigger-120"></i>
                            </span>
                          </a>
                        </li>
                        <li>
                          <a href="{{ route('page.edit', $pagesingle->registerid)}}" class="tooltip-error" data-rel="tooltip" title="Delete">
                            <span class="blue">
                            <i class="ace-icon fa fa-pencil bigger-120"></i>
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
