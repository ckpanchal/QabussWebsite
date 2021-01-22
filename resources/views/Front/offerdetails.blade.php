@extends('Front.layout.app')
@section('title','Dashboard - Qabuss')
@section('content')
<!-- Body  Section -->
<div class="body-sectio-listing clearfix">      
    <section class="event">
        <div class="container">
        @foreach($offers as $offersingle)
            <div class="col-sm-12 col-md-6">
                <div class="offer-inner__img">
                    <img src="{{ asset($offersingle->image)}}" alt="">
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="offer-inner__details">
                    <div class="category">
                        @foreach($categorys as $category)
                            @if(($category->id) == ($offersingle->category_id))
                                <h4>{{$category->name}}</h4>
                            @endif
                        @endforeach
                    </div>                                
                    <div class="description">
                        <h1>{{$offersingle->headingEn}}</h1>
                        <h5><i class="fa fa-map-marker" aria-hidden="true" style="font-size: 14px;"></i>{{$offersingle->locationEn}}</h5>
                        @php
                            echo str_replace('<p>', '<p class="text-sans">', ( $offersingle->descriptionEn ) );
                        @endphp                            
                    </div>
                    <?php 
                            $date = date("Y-m-d");
                            $datetime1 = new DateTime("$offersingle->enddate");
                            $datetime2 = new DateTime($date);
                            $difference = $datetime1->diff($datetime2);
                            if(Session::get('language') == 'ar'){ ?>
                            <div class="expire">
                                    <p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9.767" height="14" viewBox="0 0 9.767 14">
                                        <path id="Path_2" data-name="Path 2" d="M9.384,15.5A4.884,4.884,0,0,1,6.038,7.059c.874-.822,3.02-2.3,2.695-5.559,3.907,2.6,5.86,5.209,1.953,9.116.651,0,1.628,0,3.256-1.608a4.9,4.9,0,0,1,.326,1.608A4.884,4.884,0,0,1,9.384,15.5Z" transform="translate(-4.5 -1.5)" fill="#8d1a3d" />
                                    </svg>
                                    <?php
                                    echo ' تنتهي في ' . '  '. $difference->days.'  ' . ' يوما ';
                                   ?>
                                    </p>
                                    <span>صالح حتى {{ $offersingle->enddate }}</span>
                            </div>
                            <div class="btn-wrap">
                                <a href="{{ $offersingle->url }}">
                                <button class="btn">
                                        الاستيلاء على العرض!
                                </button>
                                </a>
                                <span>متوفر فقط للمتجر المحلي</span>
                            </div>
                                <?php } else{ ?>
                            
                            <div class="expire">
                                <p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9.767" height="14" viewBox="0 0 9.767 14">
                                        <path id="Path_2" data-name="Path 2" d="M9.384,15.5A4.884,4.884,0,0,1,6.038,7.059c.874-.822,3.02-2.3,2.695-5.559,3.907,2.6,5.86,5.209,1.953,9.116.651,0,1.628,0,3.256-1.608a4.9,4.9,0,0,1,.326,1.608A4.884,4.884,0,0,1,9.384,15.5Z" transform="translate(-4.5 -1.5)" fill="#8d1a3d" />
                                    </svg>
                                    <?php echo 'Expires in ' .$difference->days.' days'; ?>
                                </p>
                                <span>Valid until {{ $offersingle->enddate }}</span>
                            </div>
                            <div class="btn-wrap">
                                <a href="{{ $offersingle->url }}">
                                <button class="btn">
                                        Grab Offer!
                                </button>
                                </a>
                                <span>Available only for local shop</span>
                            </div>
                            <?php } ?>
                        
                </div>
            </div>
        @endforeach

            <div class="col-md-12">
                <div class="title">
                    <?php if(Session::get('language') == 'ar'){ ?>
                        <h2> العروض ذات الصلة </h2>
                    <?php } else{ ?>
                        <h2>Related offers</h2>
                    <?php } ?>
                    <div class="row">
                  @foreach($related as $relatedsingle)
                
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="offers__card border">
                            <div class="offers__card-img">
                                <img src="{{ asset($relatedsingle->image)}}" alt="" />
                            </div>
                            <div class="offers__card-info">
                                <h3>{{ $relatedsingle->headingEn }}</h3>
                                <span>{{ $relatedsingle->locationEn }}</span>
                                <p>
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="9.767"
                                        height="14"
                                        viewBox="0 0 9.767 14"
                                    >
                                        <path
                                            id="Path_2"
                                            data-name="Path 2"
                                            d="M9.384,15.5A4.884,4.884,0,0,1,6.038,7.059c.874-.822,3.02-2.3,2.695-5.559,3.907,2.6,5.86,5.209,1.953,9.116.651,0,1.628,0,3.256-1.608a4.9,4.9,0,0,1,.326,1.608A4.884,4.884,0,0,1,9.384,15.5Z"
                                            transform="translate(-4.5 -1.5)"
                                            fill="#8d1a3d"
                                        />
                                    </svg>
                                    <?php
                                    $date = date("Y-m-d");
                                    $datetime1 = new DateTime("$relatedsingle->enddate");

                                    $datetime2 = new DateTime($date);

                                    $difference = $datetime1->diff($datetime2);
                                    if(Session::get('language') == 'ar'){
                                        echo ' تنتهي في ' . '  '. $difference->days.'  ' . ' يوما ';
                                    } else{
                                        echo 'Expires in ' .$difference->days.' days';
                                    } ?>
                                </p>
                                <div class="btn-wrap">
                                    <a href="{{ route('offerdetails',$relatedsingle->Id)}}">
                                        <button class="btn">
                                            View
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <div class="category">
                            @foreach($categorys as $category)
                                @if(($category->id) == ($relatedsingle->category_id))
                                    <h4>{{$category->name}}</h4>
                                @endif
                            @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach


                </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Body  Section -->


@endsection
