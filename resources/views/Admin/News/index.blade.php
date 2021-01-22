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
        <li class="active">News</li>
      </ul><!-- /.breadcrumb -->

      <!-- BODY SECTION -->
              <div class="page-content">
          <div class="page-header">
            <h1>News Dashboard</h1>
          </div><!-- /.page-header -->
          <div class="update clearfix">
            <div class="col-md-12">
              <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                    <th>No</th>
                      <th>Heading</th>
                      <th>Category</th>
                      <th>Author</th>
                      <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($news as $newssingle)
                    <tr>
                      <td></td>
                      <td>{{ $newssingle->headingEn}}</td>
                      <td>
                      @foreach($category as $categorysingle)
                          @if(($categorysingle->id) == ($newssingle->category))   
                            {{ $categorysingle->name}}
                          @endif
                        @endforeach
                        </td>
                      <td>
                        @foreach($author as $authorsingle)
                          @if(($authorsingle->registerid) == ($newssingle->author))   
                            {{ $authorsingle->name}}
                          @endif
                        @endforeach
                      </td>
                      <td >
                      
                      <div class="hidden-sm hidden-xs btn-group">
                    <a href="{{ route('news.show', $newssingle->registerid)}}">
                    <button class="btn btn-xs btn-warning">
                      <i class="ace-icon fa fa-eye bigger-120"></i>
                    </button>
                    </a>
                    <a href="{{ route('news.edit', $newssingle->registerid)}}">
                    <button class="btn btn-xs btn-info">
                      <i class="ace-icon fa fa-pencil bigger-120"></i>
                    </button>
                    </a>
                    <form action="{{ route('news.destroy', $newssingle->registerid)}}" method="POST"  style="float: right;margin-left: 5px;">
                    @csrf
                      {{ method_field('DELETE')}}
                      <button class="btn btn-xs btn-danger">
                      <i class="ace-icon fa fa-trash-o bigger-120"></i>
                    </button>
                    </form>
                  </div>

                  <div class="hidden-md hidden-lg" style="text-align: center;">
                    <div class="inline pos-rel">
                      <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                        <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                      </button>
                      <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                        <li>
                          <a href="{{ route('news.show', $newssingle->registerid)}}" class="tooltip-success" data-rel="tooltip" title="Edit">
                            <span class="green">
                              <i class="ace-icon fa fa-eye bigger-120"></i>
                            </span>
                          </a>
                        </li>
                        <li>
                          <a href="{{ route('news.edit', $newssingle->registerid)}}" class="tooltip-error" data-rel="tooltip" title="Delete">
                            <span class="blue">
                            <i class="ace-icon fa fa-pencil bigger-120"></i>
                            </span>
                          </a>
                        </li>
                        <li>
                          <a href="{{ route('news.destroy', $newssingle->registerid)}}" class="tooltip-error" data-rel="tooltip" title="Delete">
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
          "targets":  [ 0, 4]
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
