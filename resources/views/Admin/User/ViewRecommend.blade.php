
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
        <li class="active">Profile</li>
        <li class="active">Recommend Business</li>
      </ul><!-- /.breadcrumb -->

      <!-- BODY SECTION -->
              <div class="page-content">
          <div class="page-header">
            <h1> Recommend Business</h1>
          </div><!-- /.page-header -->
          <div class="update clearfix">
            <div class="col-md-6">
              <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                      <th>No</th>
                      <th class="">Category</th>
                      <th class="">Icon</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($recommend as $recommendsingle)
                    @foreach($category as $categorysingle)
                        @if(($recommendsingle->category_id) == ($categorysingle->id))
                        <tr>
                          <td></td>
                          <td>{{ $categorysingle->name }}</td>
                          <td  class="hidden-480 icon-img" style="text-align: center;"> <img  src="{{ asset($categorysingle->icon) }}" alt=""> </td>
                        </tr>

                        @endif
                      @endforeach
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
          "orderable": false
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
