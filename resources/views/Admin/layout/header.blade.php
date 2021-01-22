<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<link rel="icon" type="image/png" href="{{ asset('image/favicon.png') }}">
		<title>Dashboard - Qabuss Admin</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<link rel="stylesheet" href="{{ asset('style.css') }}" />

		<!-- bootstrap & fontawesome -->
		<!-- Google Font -->
		<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
		<!-- Google Font -->
 
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/font-awesome/4.5.0/css/font-awesome.min.css') }}" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

		<!-- text fonts -->
		<link rel="stylesheet" href="{{ asset('assets/css/fonts.googleapis.com.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-colorpicker.min.css') }}" />

		<!-- <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.custom.min.css') }}" /> -->
		<link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker3.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-timepicker.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-colorpicker.min.css') }}" />
		<!-- ace styles -->
		<link rel="stylesheet" href="{{ asset('assets/css/ace.min.css') }}" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="{{ asset('assets/css/ace-skins.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/ace-rtl.min.css') }}" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="{{ asset('assets/js/ace-extra.min.js') }}"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->
		<script> 
        $(document).ready(function() { 
            $("button").click(function() { 
                //$("#d").trigger("reset"); 
                //$("#d").get(0).reset(); 
                $("#d")[0].reset() 
            }); 
        }); 
    </script> 
	</head>
  <body class="no-skin">
  <div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="" class="navbar-brand">
						<small>
							Qabuss
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">





						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="{{ Auth::user()->image}}" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									{{ Auth::user()->name }} 
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<!-- <li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>  -->

								<li>
									<a href="{{ route('profile.index')}}">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>
								
								<li>
									<a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>
		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>
