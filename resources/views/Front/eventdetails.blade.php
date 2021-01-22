@extends('Front.layout.app')
@section('title','Dashboard - Qabuss')
@section('content')


<!-- Body  Section -->

<div class="body-sectio-listing clearfix">      
        <section class="event-inner">
            <div class="container">
                @foreach($event as $eventsingle)

                <div class="event-inner__coverImg">
                    <img src="{{ asset($eventsingle->image)}}" alt="">
                </div>
                <div class="event-inner__title-wrapper">
                    <div class="title">
                        <h1>{{$eventsingle->headingEn}}</h1>
                        <span>{{$eventsingle->location}}</span>
                        <div class="date">
                            <?php if(Session::get('language') == 'ar'){ ?>
                                <p>{{ $eventsingle->startdate}}<span style="padding: 0px 10px; color:#fff;">ل</span>{{ $eventsingle->enddate}}</p>
                            <?php } else{ ?>
                                <p>{{ $eventsingle->startdate}}<span style="padding: 0px 10px; color:#fff;">To</span>{{ $eventsingle->enddate}}</p>
                            <?php } ?>                                         
                        </div>
                    </div>
                    <div class="btn-wrap">
                        <a href="">
                            <button class="btn">See on Map</button>
                        </a>
                    </div>
                </div>
                <div class="row event-inner__body">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <p class="text-sans">
                        @php
                                echo str_replace('<p>', '<p class="text-sans">', ( $eventsingle->descriptionEn ) );
                            @endphp
                        </p>                    
                    </div>
                </div>
                @endforeach

                <!--  -->
                <h3>Related event</h3>
                <div class="row">   
                @foreach($related as $relatedsingle)
                                        
                    <div class="col-sm-12 col-md-4 col-lg-3">
                        <div class="event-inner__related-events" style="height: 100%;">
                            <div class="row" style="height: 100%;">
                                <div class="col-sm-12">
                                    <div class="events__card border">
                                        <div class="events__card-img">
                                            <img src="{{ asset($relatedsingle->image)}}" alt="">
                                            <!-- <div class="date">
                                                <h4>Today</h4>
                                            </div> -->
                                        </div>
                                        <div class="events__card-info">
                                            <h3>{{$relatedsingle->headingEn}}</h3>
                                            <span><i class="fa fa-map-marker" aria-hidden="true"></i>{{$relatedsingle->location}}
                                            <div class="btn-wrap">
                                                <a href="{{ route('eventdetails',$relatedsingle->id)}}">
                                                    <button class="btn">
                                                        <?php if(Session::get('language') == 'ar'){ ?>
                                                            عرض التفاصيل
                                                        <?php } else{ ?>
                                                            View details
                                                        <?php } ?> 
                                                    </button>
                                                </a>
                                            </div>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
                </div>
            <!--  -->
            </div>
        </section>      
</div>
<!-- Body  Section -->


@endsection
