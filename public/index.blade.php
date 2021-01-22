@extends('Admin.layout.app')
@section('title','Business Editor Dashboard - Qabuss')
@section('content')
<div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Home</a>
                    </li>
                    <li class="active">Dashboard</li>
                </ul><!-- /.breadcrumb -->

            </div>

            <div class="page-content">


                <div class="page-header">
                    <h1>
                        Dashboard
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            overview &amp; stats
                        </small>
                    </h1>
                </div><!-- /.page-header -->
                <div class="row">
                <div class="col-md-12">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
           

                                <h3>200</h3>

                                <p> Business</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-briefcase"></i>
                            </div>
                            <a href="http://jeevanstore.in/orders" class="small-box-footer">
                                </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>15</h3>
                                <p> Offers</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-gift"></i>
                            </div>
                            <a href="http://jeevanstore.in/payments" class="small-box-footer">
                                </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>10</h3>
                                <p>Event</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <a href="http://jeevanstore.in/markets" class="small-box-footer">
                                </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>20</h3>

                                <p>Total clients</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <a href="http://jeevanstore.in/users" class="small-box-footer">
                                </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    </div>

        </div>
        <div class="row">
            <div class="col-md-12">

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header no-border">
                        <h3 class="card-title">Latest Business</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <!-- <th>Actions</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header no-border">
                        <h3 class="card-title">Latest Offers</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Market</th>
                                <th>Address</th>
                                <!-- <th>Actions</th> -->
                            </tr>
                            </thead>
                            <tbody>
                            
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header no-border">
                        <h3 class="card-title">Latest Events</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Market</th>
                                <th>Address</th>
                                <!-- <th>Actions</th> -->
                            </tr>
                            </thead>
                            <tbody>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
         
            
            </div>
        </div>
                
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

@endsection
