@extends('Front.layout.app')
@section('title','Dashboard - Qabuss')
@section('content')


<!-- Body  Section -->
    <div class="body-sectio-listing clearfix">      
        <section class="event">
            <div class="container">
                <div class="title row">
                    <h1>Events</h1>
                </div>
                <div class="row display-flex">
                    <div class="display-flex events__list-wrapper">
                    @foreach($event as $eventsingle)

                        <div class="events__list col-sm-6 col-md-4 col-lg-4">
                            <div class="events__card border">
                                <div class="events__card-img">
                                    <img src="{{ asset($eventsingle->image)}}" alt="">
                                    <div class="date">
                                    <?php if(Session::get('language') == 'ar'){ ?>
                                        <h4>{{ $eventsingle->startdate}}<span style="padding: 0px 10px;">ل</span>{{ $eventsingle->enddate}}</h4>
                                    <?php } else{ ?>
                                        <h4>{{ $eventsingle->startdate}}<span style="padding: 0px 10px;">To</span>{{ $eventsingle->enddate}}</h4>
                                    <?php } ?>                                         
                                    </div>
                                </div>
                                <div class="events__card-info">
                                <h3><?php
                                    echo $val= implode(' ', array_slice(explode(' ', $eventsingle->headingEn), 0, 10)); echo "..."; 
                                ?></h3>
                                <span><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $eventsingle->location}}</span>
                                    <div class="btn-wrap">
                                        <a href="{{ route('eventdetails',$eventsingle->id)}}">
                                        <button class="btn">
                                        <?php if(Session::get('language') == 'ar'){ ?>
                                            عرض التفاصيل
                                        <?php } else{ ?>
                                            View details
                                        <?php } ?> 
                                        </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </section>      

    </div>

<!-- Body  Section -->


@endsection
