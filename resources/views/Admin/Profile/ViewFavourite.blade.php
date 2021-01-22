
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
        <li class="active"><a href="{{ route('profile.index')}}">Profile</a></li>
        <li class="active">Favourite Business</li>
      </ul><!-- /.breadcrumb -->

      <!-- BODY SECTION -->
              <div class="page-content">
          <div class="page-header">
            <h1> Favourite Business</h1>
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
                  @foreach($favourite as $favouritesingle)
                    @foreach($business as $businesssingle)
                      @if(($businesssingle->registerId) == ($favouritesingle->businessId))
                    <tr>
                    <td></td>
                    <td>{{ $businesssingle->companyname }}</td>
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
                      <div class="btn-group">
                            <a href="{{ route('profile.businesssingle', $businesssingle->registerId  )}}">
                              <button class="btn btn-xs btn-warning">
                                <i class="ace-icon fa fa-eye bigger-120"></i>
                              </button>
                            </a>
                        </div>
                    </td>

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
