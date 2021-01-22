@extends('Admin.layout.app')
@section('title','Dashboard - Qabuss')
@section('content')



        <div class="main-content">
            <div class="main-content-inner">
                <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Home</a>
                        </li>
                        <li class="active">Add New Author</li>
                    </ul><!-- /.breadcrumb -->

                    <!-- Body Section -->

                        <div class="page-content">
                            <div class="page-header">
                                <h1>New Author</h1>
                            </div>
                            <div class="update clearfix">
                                <div class="business-add col-md-8 col-sm-12">
                                    <div class="adding-new-bussines col-md-12 col-sm-12">
                                        <form action="{{ route('author.store') }}" method="POST" role="form" name="addproduct" enctype="multipart/form-data" id="myform" onsubmit = "return validateAuthor(this)">
                                        @csrf
                                        <div class="form-elements col-md-8 col-sm-12">
                                                <label class="col-sm-3 control-label no-padding-right"  > Author Name  </label>
                                                <div class="col-sm-9">
                                                    <input type="text" id="form-field-1" class="companyname" name="Authorname" placeholder="Author Name">
                                                </div>
                                            </div>
                                            <div class="form-elements col-md-8 col-sm-12 action-section-area">
                                                <label class="col-sm-3 control-label no-padding-right" >  </label>
                                                <div class="col-sm-9">
                                                    <button class="btn btn-success" type="submit" name="Registersubmit">Submit</button>
                                                    <button class="btn btn-danger" type="reset" name="button"  onclick="myFunction()">RESET</button>
                                                </div>
                                            </div>
                                            @csrf
                                        </form>
                                    </div>

                                </div>
                            </div><!-- /.nav-search -->
                        </div>
                    <!-- BODY SECTION -->
                </div>
            </div>
        </div>





<script src="../../js/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
  if('ontouchstart' in document.documentElement) document.write("<script src='js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="../../js/js/bootstrap.min.js"></script>

<script src="../../js/js/ace-elements.min.js"></script>
<script src="../../js/js/ace.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<!-- javascript -->
<script type="text/javascript" src="../../Plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="../../Plugin/tinymce/init-tinymce.js"></script>
<!-- javascript -->

<script type="text/javascript">
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}


</script>

@endsection

