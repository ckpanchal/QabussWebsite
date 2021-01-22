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
        <li class="active">Category Tag</li>
      </ul><!-- /.breadcrumb -->

      <!-- BODY SECTION -->
              <div class="page-content">
          <div class="page-header">
            <h1>Category Tag List</h1>
          </div><!-- /.page-header -->
          <div class="update clearfix">
            <div class="col-md-6">
              <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tag Name (En)</th>
                        <th>Tag Name (Ar)</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($category as $categorysingle)
                  @if(($categorysingle->tag) != "0")
                    <tr>
                      <td></td>
                      <td>{{ $categorysingle->name}}</td>
                      <td>{{ $categorysingle->nameArb}}</td>
                      @foreach($category as $categorysingles)
                          @if(($categorysingles->id) == ($categorysingle->parent))
                            <td>{{ $categorysingles->name}}</td>
                          @endif
                      @endforeach
                      <!-- <td>{{ $categorysingle->parent}}</td> -->
                      <!-- <td style="width: 35%;">
                        <a href="{{ route('categorytag.show', $categorysingle->id)}}" class="btn btn-info" style="float: left;margin-right: 5px;"><i class="fa fa-eye" aria-hidden="true"></i>View</a>
                         <a href="{{ route('categorytag.edit', $categorysingle->id)}}" class="btn btn-default" style="float: left;margin-right: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>
                        <form action="" method="POST"  style="float: left;margin-right: 5px;">
                          <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o" aria-hidden="true"></i>delete</button>
                        </form>
                      </td> -->
                     <td style="width: 35%;">

                      <div class="hidden-sm hidden-xs btn-group">
                    <a href="{{ route('categorytag.edit', $categorysingle->id)}}">
                    <button class="btn btn-xs btn-info">
                      <i class="ace-icon fa fa-pencil bigger-120"></i>
                    </button>
                    </a>
                    <form action="{{ route('categorytag.destroy', $categorysingle->id)}}" method="POST"  style="float: right;margin-left: 5px;">
                    @csrf
                      {{ method_field('DELETE')}}
                      <button class="btn btn-xs btn-danger">
                      <i class="ace-icon fa fa-trash-o bigger-120"></i>
                    </button>
                    </form>
                  </div>

                  <div class="hidden-md hidden-lg">
                    <div class="inline pos-rel">
                      <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                        <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                      </button>
                      <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                        <li>
                          <a href="{{ route('categorytag.show', $categorysingle->id)}}" class="tooltip-success" data-rel="tooltip" title="Edit">
                            <span class="green">
                              <i class="ace-icon fa fa-eye bigger-120"></i>
                            </span>
                          </a>
                        </li>
                        <li>
                          <a href="{{ route('categorytag.edit', $categorysingle->id)}}" class="tooltip-error" data-rel="tooltip" title="Delete">
                            <span class="blue">
                            <i class="ace-icon fa fa-pencil bigger-120"></i>
                            </span>
                          </a>
                        </li>
                        <li>
                          <a href="{{ route('categorytag.destroy', $categorysingle->id)}}" class="tooltip-error" data-rel="tooltip" title="Delete">
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
                    @endif
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
