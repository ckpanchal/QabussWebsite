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
        <li class="active">News Authors</li>
      </ul><!-- /.breadcrumb -->

      <!-- BODY SECTION -->
              <div class="page-content">
          <div class="page-header">
            <h1>News Author</h1>
          </div><!-- /.page-header -->
          <div class="update clearfix">
            <div class="col-md-6">
            <div class="business-add col-md-12 col-sm-12 no-padding">
                <div class="adding-new-bussines col-md-12 col-sm-12" style="border: 1px solid #e3e3e3; padding: 30px 12px;">
                    <form action="{{ route('author.store') }}" method="POST" role="form" name="addproduct" enctype="multipart/form-data" id="myform" onsubmit = "return validateAuthor(this)">
                    @csrf
                    <div class="form-elements col-md-12 col-sm-12 no-padding">
                            <label class="col-sm-3 control-label no-padding"  > Author Name  </label>
                            <div class="col-sm-9 no-padding">
                                <input type="text" id="form-field-1" class="companyname" name="Authorname" placeholder="Author Name">
                            </div>
                        </div>
                        <div class="form-elements col-md-12 col-sm-12 action-section-area no-padding">
                            <label class="col-sm-3 control-label no-padding-right" >  </label>
                            <div class="col-sm-9 no-padding">
                                <button class="btn btn-success" type="submit" name="Registersubmit">Submit</button>
                                <button class="btn btn-danger" type="reset" name="button"  onclick="myFunction()">RESET</button>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
              <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Author Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($author as $authors)
                    <tr>
                      <td></td>
                      <td>{{ $authors->name}}</td>
                      <td>
                      <a href="{{ route('author.edit', $authors->id)}}" style="float: left;">
                    <button class="btn btn-xs btn-info">
                      <i class="ace-icon fa fa-pencil bigger-120"></i>
                    </button>
                    </a>
                        <form action="{{ route('author.destroy', $authors->id)}}" method="POST"  style="float: left;margin-left: 5px;">
                    @csrf
                      {{ method_field('DELETE')}}
                      <button class="btn btn-xs btn-danger">
                      <i class="ace-icon fa fa-trash-o bigger-120"></i>
                    </button>
                    </form>
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
          "targets":  [ 0, 2]
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
