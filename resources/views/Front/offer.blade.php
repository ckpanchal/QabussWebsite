@extends('Front.layout.app')
@section('title','Dashboard - Qabuss')
@section('content')


<!-- Body  Section -->
<div class="body-sectio-listing clearfix">      
    <section class="offers">
        <div class="container">
            <div class="title">
                <?php
                    if(Session::get('language') == 'ar'){ ?>
                        <h1>يقدم</h1>
                    <?php } else{ ?>
                        <h1>Offers</h1>
                <?php } ?>
            </div>
            <div class="row display-flex offers__list-wrapper">
                @foreach($offer as $offersingle)
                <div class="offers__list col-sm-6 col-md-4 col-lg-3">
                    <div class="offers__card border">
                        <div class="offers__card-img">
                            <img src="{{ asset($offersingle->image)}}" alt="">
                        </div>
                        <div class="offers__card-info">
                            <h3><?php
                                echo $val= implode(' ', array_slice(explode(' ', $offersingle->headingEn), 0, 10)); echo "..."; 
                            ?></h3>
                            <span><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $offersingle->locationEn}}</span>
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="9.767" height="14" viewBox="0 0 9.767 14">
                                    <path id="Path_2" data-name="Path 2" d="M9.384,15.5A4.884,4.884,0,0,1,6.038,7.059c.874-.822,3.02-2.3,2.695-5.559,3.907,2.6,5.86,5.209,1.953,9.116.651,0,1.628,0,3.256-1.608a4.9,4.9,0,0,1,.326,1.608A4.884,4.884,0,0,1,9.384,15.5Z" transform="translate(-4.5 -1.5)" fill="#8d1a3d"></path>
                                </svg>
                                <?php
                                $date = date("Y-m-d");
                                $datetime1 = new DateTime("$offersingle->enddate");

                                $datetime2 = new DateTime($date);

                                $difference = $datetime1->diff($datetime2);
                                if(Session::get('language') == 'ar'){
                                    echo ' تنتهي في ' . '  '. $difference->days.'  ' . ' يوما ';
                                } else{
                                    echo 'Expires in ' .$difference->days.' days';
                                } ?>
                            </p>
                            <div class="btn-wrap">
                                <a href="{{ route('offerdetails',$offersingle->Id)}}">
                                    <?php
                                    if(Session::get('language') == 'ar'){ ?>
                                        <button class="btn">عرض </button>                                    
                                    <?php } else{ ?>
                                        <button class="btn">View </button>                                    
                                    <?php } ?>    
                                    
                                </a>
                            </div>
                        </div>
                        <div class="category">
                            @foreach($categorys as $category)
                                @if(($category->id) == ($offersingle->category_id))
                                    <h4>{{$category->name}}</h4>
                                @endif
                            @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>  
        </div>
    </section>      
</div>
<!-- Body  Section -->


@endsection
