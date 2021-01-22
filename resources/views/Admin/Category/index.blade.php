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
        <li class="active">Category List</li>
      </ul><!-- /.breadcrumb -->

      <!-- BODY SECTION -->
              <div class="page-content">
          <div class="page-header">
            <h1> Category List</h1>
          </div><!-- /.page-header -->
          <div class="update clearfix">
            <div class="col-md-8">
              <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Category Name</th>
                        <th  class="hidden-480">Arabic</th>
                        <th  class="hidden-480">Parent</th>
                        <th  class="hidden-480">Icon</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($category as $categorysingle)
                <tr>
                    <td></td>
                    <td>{{ $categorysingle->name}}</td>
                    <td  class="hidden-480">{{ $categorysingle->nameArb}}</td>
                    @if($categorysingle->parent)
                        @foreach($category as $categorysingles)
                            @if(($categorysingle->parent) == ($categorysingles->id))
                                <td  class="hidden-480" style="text-align: center;">{{ $categorysingles->name}}</td>
                            @endif
                        @endforeach
                    @else
                        <td  class="hidden-480" style="text-align: center;"> - </td>
                    @endif
                        <td  class="hidden-480 icon-img" style="text-align: center;"> <img  src="{{ asset($categorysingle->icon) }}" alt=""> </td>
                    <td>
                    <div class="hidden-sm hidden-xs btn-group">
                    <a href="{{ route('category.show', $categorysingle->id)}}">
                    <button class="btn btn-xs btn-warning">
                      <i class="ace-icon fa fa-eye bigger-120"></i>
                    </button>
                    </a>
                    <a href="{{ route('category.edit', $categorysingle->id)}}">
                    <button class="btn btn-xs btn-info">
                      <i class="ace-icon fa fa-pencil bigger-120"></i>
                    </button>
                    </a>
                    @if(($categorysingle->parent) != 0)
                    <form action="{{ route('category.destroy', $categorysingle->id)}}" method="POST"  style="float: right;margin-left: 5px;">
                    @csrf
                      {{ method_field('DELETE')}}
                      <button class="btn btn-xs btn-danger">
                      <i class="ace-icon fa fa-trash-o bigger-120"></i>
                    </button>
                    </form>
                    @endif
                  </div>

                  <div class="hidden-md hidden-lg">
                    <div class="inline pos-rel">
                      <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                        <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                      </button>
                      <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                        <li>
                          <a href="{{ route('category.show', $categorysingle->id)}}" class="tooltip-success" data-rel="tooltip" title="Edit">
                            <span class="green">
                              <i class="ace-icon fa fa-eye bigger-120"></i>
                            </span>
                          </a>
                        </li>
                        <li>
                          <a href="{{ route('category.edit', $categorysingle->id)}}" class="tooltip-error" data-rel="tooltip" title="Delete">
                            <span class="blue">
                            <i class="ace-icon fa fa-pencil bigger-120"></i>
                            </span>
                          </a>
                        </li>
                        <li>
                          <a href="{{ route('category.destroy', $categorysingle->id)}}" class="tooltip-error" data-rel="tooltip" title="Delete">
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
