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
        <li class="active">Business List</li>
      </ul>
      <!-- /.breadcrumb -->


      <!-- BODY SECTION -->
      <div class="page-content">
        <div class="page-header">
          <h1>Business List</h1>
        </div><!-- /.page-header -->
        <div class="update clearfix">

          <div class="col-md-12">
            <table id="example" class="display" style="width:100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Business Name</th>
                  <th class="hidden-480">Category</th>
                  <th class="hidden-480">Municipality</th>
                  <th class="hidden-480">View</th>
                  <th class="hidden-480">status</th>
                  <th>Action</th>
                </tr>
              </thead>
                <tbody>
                  @foreach($business as $businesssingle)
                    <tr>
                      <td></td>
                      <td>{{ $businesssingle->companyname}}</td>
                      <td class="hidden-480">
                        @foreach($category as $categorysingle)
                          @if(($categorysingle->id) == ($businesssingle->companycategory))
                            {{ $categorysingle->name}}
                          @endif
                        @endforeach
                        </td>
                        <td class="hidden-480">
                        @foreach($location as $locationsingle)
                          @if(($locationsingle->id) == ($businesssingle->location))
                            {{ $locationsingle->locationEn}}
                          @endif
                        @endforeach
                        </td>
                        <td class="hidden-480">
                          12
                        </td>
                        <td class="hidden-480">
                        @if(($businesssingle->approve) == 1)
                            Approve
                        @else
                            Not Approve
                        @endif
                        </td>
                        <td>
                          <div class="hidden-sm hidden-xs btn-group">
                            <a href="{{ route('business.show', $businesssingle->registerId  )}}">
                              <button class="btn btn-xs btn-warning">
                                <i class="ace-icon fa fa-eye bigger-120"></i>
                              </button>
                            </a>
                    @can('edit_business')

                            <a href="{{ route('business.edit', $businesssingle->registerId  )}}">
                              <button class="btn btn-xs btn-info">
                                <i class="ace-icon fa fa-pencil bigger-120"></i>
                              </button>
                            </a>
                            @endcan
                    @can('delete_business')

                            <form action="{{ route('business.destroy', $businesssingle->registerId)}}" method="POST"  style="float: right;margin-left: 5px;">
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
                          <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                            <span class="blue">
                              <i class="ace-icon fa fa-search-plus bigger-120"></i>
                            </span>
                          </a>
                        </li>
                        <li>
                          <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                            <span class="green">
                              <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                            </span>
                          </a>
                        </li>
                        <li>
                          <a href="{{ route('business.destroy', $businesssingle->registerId)}}" class="tooltip-error" data-rel="tooltip" title="Delete">
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
          "targets": [ 0, 6 ]
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

