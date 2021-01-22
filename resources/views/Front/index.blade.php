@extends('Front.layout.app')
@section('title','Dashboard - Qabuss')
@section('content')
<?php if(Session::get('language') == 'ar'){ ?>

    <div class="main-head clearfix">
        <div id="owl-one" class="owl-carousel owl-theme">
            @foreach($slider as $slidersingle)
                <div class="item" style="background-image: url('{{ $slidersingle->slider }}');">
                </div>
            @endforeach
        </div>
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 header-content">
            <h1 class="page-title" style="text-align: center;">استكشف جمال قطر</h1>
            <div class="entry-subtitle">
                <p style="text-align: center;">اعثر على أماكن رائعة في قطر للإقامة أو تناول الطعام أو التسوق أو الزيارة.</p>
            </div>
            <div class="autocomplete">
                <form action="{{ route('searching') }}" method="POST" role="form" name="addproduct" enctype="multipart/form-data" id="myform" >
                    @csrf
                    <input class="Search" name="search" id="myInput" type="text" placeholder="ما الذي تبحث عنه؟" autocomplete="off" required />
                    <!-- <input name="buttonExecute" class="srearching_act"  type="button" value="Search" /> -->
                    <button class="srearching_act" type="submit" name="Registersubmit">Submit</button>

                    @csrf
                </form>
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 icon-section">
            <div class="icon-pos">
                <a href="{{ url('listing',1)}}" class="cat-sec"><i class="fa fa-shopping-bag"></i><span class="cat__text"> التسوق </span></a>
                <a href="{{ url('listing',2)}}" class="cat-sec"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="cat__text"> الأكل </span></a>
                <a href="{{ url('listing',3)}}" class="cat-sec"><i class="fa fa-bed" aria-hidden="true"></i><span class="cat__text"> الفنادق </span></a>
                <a href="{{ url('listing',4)}}" class="cat-sec"><i class="fa fa-ticket" aria-hidden="true"></i><span class="cat__text"> الزيارة </span></a>
                <a href="{{ url('listing',5)}}" class="cat-sec mobile"><i class="fa fa-calendar-o" aria-hidden="true"></i><span class="cat__text"> أحداث </span></a>
                <a href="{{ url('listing',6)}}" class="cat-sec mobile"><i class="fa fa-fighter-jet" aria-hidden="true"></i><span class="cat__text"> السفر </span></a>
                <a href="{{ url('listing',7)}}" class="cat-sec mobile"><i class="fa fa-cogs" aria-hidden="true"></i><span class="cat__text"> الخدمات </span></a>
            </div>
        </div>
    </div>
    <div class="body-content">
        <section class="gray-bg shopping featured clearfix Interested-section"  id="featured">
            <div class="container">
                <div class="heading-top ">
                    <div class="section-heading ">
                        <h3> قوائم الأعمال المميزة </h3>
                        <hr>
                        <p> استكشف بعض من أفضل النصائح من جميع أنحاء المدينة من شركائنا وأصدقائنا. </p>
                    </div>
                </div>
                <div id="owl-two" class="owl-carousel owl-theme">
                @foreach($featuredbusiness as $featuredbusinesssingle)
                    <div class="items">
                        <div class="premium-column clearfix">
                            <div class="premium-img-wrap clearfix hover-click" style="background: url('{{ $featuredbusinesssingle->background_image}}') no-repeat center;">
                                <a href="#" title="LuLu Hypermarkets" tabindex="0"></a>
                            </div>
                            <div class="premium-desc clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center premium-desc-row">
                                    <h3 class="font-archivo regular">{{ $featuredbusinesssingle->companyname}}</h3>
                                    <div class="featured_list_rate_section clearfix">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <p class="font-archivo regular"><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $featuredbusinesssingle->companylocation}}</p>
                                    <a  href="{{ route('single',$featuredbusinesssingle->registerId)}}" class="btn yellow-btn borderd border-radius-50 font-roboto regular" title="{{ $featuredbusinesssingle->companyname}}" tabindex="0"> استكشاف </a>
                                </div> 
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <section class="gray-bg shopping featured clearfix Interested-section"  id="featured">
            <div class="container">
                <div class="heading-top ">
                    <div class="section-heading ">
                        <h3 style="margin-top: 0px;"><span style="font-weight: 400;">احدث</span><span style="font-weight: bold;"> الحدث</span></h3>
                        <hr>
                        <p> استكشف بعض من أفضل النصائح من جميع أنحاء المدينة من شركائنا وأصدقائنا. </p>
                    </div>
                </div>
                <div id="owl-three" class="owl-carousel owl-theme">
                @foreach($event as $eventsingle)

                        <div class="items">
                            <div class="premium-column clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center premium-desc-row">
                                    <h3 class="font-archivo regular">{{ $eventsingle->headingEn}}</h3>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center premium-desc-row" style="padding: 0px;">
                                        <p class="font-archivo regular"><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $eventsingle->location}}</p>
                                    </div>
                                    <div class="date">
                                        <p class="font-archivo regular"><i class="fa fa-calendar"></i>{{ $eventsingle->startdate}}<span style="padding: 0px 10px;">-</span>{{ $eventsingle->enddate}}</p>
                                    </div>
                                    <div class="email">
                                        <p class="font-archivo regular"><i class="fa fa-envelope"></i>{{ $eventsingle->email}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center premium-desc-row" style="background: url('{{ $eventsingle->image }}') no-repeat center;"></div>
                                <div class="premium-desc clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center premium-desc-row" style="height: 150px;">
                                        <p class="font-archivo regular"style="padding-top: 10px; font-size: 15px;">
                                            <?php
                                            echo $val= implode(' ', array_slice(explode(' ', $eventsingle->summeryEn), 0, 35)); echo "...";
                                        ?>
                                        </p>
                                        <a href="{{ route('single',$eventsingle->eventid)}}" class="btn yellow-btn borderd border-radius-50 font-roboto regular shopping-sec"  tabindex="0">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <center>
                    <a href="{{ route('listing')}}/13" class="btn btn-primary"> عرض كل التسوق </a>
                </center>
            </div>
        </section>
        <section class="gray-bg shopping featured clearfix Interested-section"  id="featured">
            <div class="container">
                <div class="heading-top ">
                    <div class="section-heading ">
                        <h3 style="margin-top: 0px;"><span style="font-weight: 400;">احدث</span><span style="font-weight: bold;"> العرض</span></h3>
                        <hr>
                        <p> استكشف بعض من أفضل النصائح من جميع أنحاء المدينة من شركائنا وأصدقائنا. </p>
                    </div>
                </div>
                <div class="shopping-thumbnail-padding">
                    <div class="row">
                    @foreach($offers as $offerssingle)

                        <div class="col-lg-4 col-md-4 col-sm-4 sm-margin-20px-bottom">
                            <div class="blog-grid">
                                <div class="blog-grid-img" style="background: url('{{ $offerssingle->image }}') no-repeat center;"></div>
                                <div class="blog-grid-text">
                                    <!-- <span>Shopping</span> -->
                                    <h4>{{$offerssingle->headingEn}}</h4>
                                    <?php
                                        echo $val= implode(' ', array_slice(explode(' ', $offerssingle->descriptionEn), 0, 20)); echo "...";
                                    ?>
                                    <div class="margin-10px-top text-left"><a href="{{ route('single',$offerssingle->offerid)}}" class="btn btn-primary btn-sm"><span>Read More</span></a> </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
                
                <center>
                    <a href="{{ route('listing')}}/13" class="btn btn-primary"> عرض كل التسوق </a>
                </center>
            </div>
        </section>
        <!--<section class="gray-bg shopping featured clearfix Interested-section"  id="featured">-->
        <!--    <div class="container">-->
        <!--        <div class="heading-top ">-->
        <!--            <div class="section-heading ">-->
        <!--                <h3 style="margin-top: 0px;"><span style="font-weight: 400;">احدث</span><span style="font-weight: bold;"> اخبار</span></h3>-->
        <!--                <hr>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--        <div class="row">-->
        <!--            @foreach($news as $newssingle)-->
        <!--            <div class="col-lg-3 col-sm-6 grid-margin mb-5 mb-sm-2">-->
        <!--                <div class="position-relative image-hover">-->
        <!--                    <div class="text-center premium-desc-row news-img" style="background: url('{{ $newssingle->image }}') no-repeat center;"></div>-->
        <!--                        @foreach($newscategory as $newscategorysingle)-->
        <!--                        @if(($newscategorysingle->id) == ($newssingle->category))-->
        <!--                                <span class="thumb-title">{{ $newscategorysingle->name}}</span>-->
        <!--                            @endif-->
        <!--                        @endforeach-->
        <!--                    </div>-->
        <!--                <h5 class="font-weight-bold mt-3">{{ $newssingle->headingEn}}</h5>-->
        <!--                <p class="fs-15 font-weight-normal"> -->
                        <!--<?php echo $val= implode(' ', array_slice(explode(' ', $newssingle->summeryEn), 0, 10)); echo "..."; ?>-->
        <!--                </p>-->
                        <!-- <a href="{{ route('single',$newssingle->registerid)}}" class="font-weight-bold text-dark pt-2">Read Article</a> -->
        <!--            </div>-->
        <!--            @endforeach-->

        <!--        </div>-->
        <!--        <center>-->
        <!--            <a href="{{ route('listing')}}/13" class="btn btn-primary"> View All Event </a>-->
        <!--        </center>-->
        <!--    </div>-->
        <!--</section>-->
        <section  class="working clearfix">
            <div class="working-heading">
                <div class="container">
                    <section class="working-new">
                        <div class="working-head-top">
                            <h3> كيف يعمل </h3>
                            <hr>
                            <span class="widget_subtitle  widget_subtitle--frontpage"> اكتشف كيف تستطيع Listable مساعدتك في العثور على كل ما تريد. </span>
                        </div>
                        <div class="col-md-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="card__content">
                                <img src="image/choose-what-to-do.png" alt="">
                                <h4> اختر ماذا تفعل </h4>
                                <p> سواء كان التزلج على الماء أو التزحلق على الجليد ، كل ما تحتاج لمعرفته حول الأنشطة الترفيهية على بعد نقرة واحدة </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="card__content">
                                <img src="image/find-what-you-want.png" alt="">
                                <h4> عطلة قريبة من منزلك </h4>
                                <p> إذا كنت ترغب في البقاء لفترة أطول قليلاً ، فنحن نساعدك في العثور على أفضل فندق بأحدث المرافق </p>
                            </div>
                        </div>
                        <div class="col-ls-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="card__content">
                                <img src="image/explore-amazing-places.png" alt="">
                                <!-- <i class="fa fa-compass" aria-hidden="true"></i> -->
                                <h4> استكشف أماكن مدهشة </h4>
                                <p> تبحث عن مكان للاستراحة. اكتشف لدينا قائمة من دور السينما والحدائق والمقاهي وغيرها الكثير لك ولأحبائك. </p>
                            </div>
                        </div>
                </div>
            </div>
        </section>
        <section class="trending-business">
            <div class="container">
                <div class="heading-trending">
                <h3> تتجه والأعمال الجديدة في قطر </h3>
                <hr>
                </div>
                <div class="content-trending">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 content-trending-section">
                    <a onclick="getCategory('Restaurant')">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 trending-image">
                    <img src="image/restaurant.jpg" alt="">
                        <p class="Listing_count">{{ $restaurants }} قائمة</p>
                        <div class="trending-image-content">
                        <p> استكشف المطاعم الأفضل </p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 content-trending-section">
                    <a onclick="getCategory('It')">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 trending-image">
                        <img src="image/it.jpg" alt="">
                        <p class="Listing_count">{{ $it }} قائمة</p>
                        <div class="trending-image-content">
                        <p> شركات التقنيات </p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 content-trending-section">
                    <a onclick="getCategory('Trading')">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 trending-image">
                        <img src="image/interior-design.jpg" alt="">
                        <p class="Listing_count">{{ $trading }} قائمة</p>
                        <div class="trending-image-content">
                        <p> التجارة والمقاولات </p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 content-trending-section-foot">
                    <a onclick="getCategory('Trading')">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 trending-image">
                        <img src="image/construction.jpg" alt="">
                        <p class="Listing_count">{{ $construction }} قائمة</p>
                        <div class="trending-image-content">
                        <p> شركات البناء الأفضل  </p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 trending-section-foot">
                    <div class="col-md-12 trending-section-footnew clearfix">
                    <a onclick="getCategory('Beauty saloons')">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 trending-image">
                        <img src="image/salon-beauty.jpg" alt="">
                            <p class="Listing_count">{{ $saloons }} قائمة</p>
                            <div class="trending-image-content">
                            <p> أفضل  الصالونات </p>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-md-12 trending-section-footnew clearfix">
                    <a onclick="getCategory('Hotel')">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 trending-image">
                        <img src="image/hotel.jpg" alt="">
                            <p class="Listing_count">{{ $hotel }} قائمة</p>
                            <div class="trending-image-content">
                            <p> الفنادق </p>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>
                </div>
            </div>
        </section>
    </div>


<?php } else{ ?>
    <div class="main-head clearfix">
        <div id="owl-one" class="owl-carousel owl-theme">
            @foreach($slider as $slidersingle)
                <div class="item" style="background-image: url('{{ $slidersingle->slider }}');">
                </div>
            @endforeach
        </div>
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 header-content">
            <h1 class="page-title">Explore the beauty of Qatar</h1>
            <div class="entry-subtitle">
                <p>Find great places in Qatar to stay, eat, shop, or visit.</p>
            </div>
            <div class="autocomplete">
                <form action="{{ route('searching') }}" method="POST" role="form" name="addproduct" enctype="multipart/form-data" id="myform" >
                    @csrf
                    <input class="Search" name="search" id="myInput" type="text" placeholder="What are you looking for?" autocomplete="off" required />
                    <!-- <input name="buttonExecute" class="srearching_act"  type="button" value="Search" /> -->
                    <button class="srearching_act" type="submit" name="Registersubmit">Submit</button>
                    @csrf
                </form>
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 icon-section">
            <div class="icon-pos">
                <a href="{{ url('listing',1)}}" class="cat-sec"><i class="fa fa-shopping-bag"></i><span class="cat__text">Shop</span></a>
                <a href="{{ url('listing',2)}}" class="cat-sec"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="cat__text">Eat</span></a>
                <a href="{{ url('listing',3)}}" class="cat-sec"><i class="fa fa-bed" aria-hidden="true"></i><span class="cat__text">Stay</span></a>
                <a href="{{ url('listing',4)}}" class="cat-sec"><i class="fa fa-ticket" aria-hidden="true"></i><span class="cat__text">Visit</span></a>
                <a href="{{ url('listing',5)}}" class="cat-sec mobile"><i class="fa fa-calendar-o" aria-hidden="true"></i><span class="cat__text">Events</span></a>
                <a href="{{ url('listing',6)}}" class="cat-sec mobile"><i class="fa fa-fighter-jet" aria-hidden="true"></i><span class="cat__text">Travel</span></a>
                <a href="{{ url('listing',7)}}" class="cat-sec mobile"><i class="fa fa-cogs" aria-hidden="true"></i><span class="cat__text">Service</span></a>
            </div>
        </div>
    </div>
    <div class="body-content">
        <section class="gray-bg shopping featured clearfix Interested-section"  id="featured">
            <div class="container">
                <div class="heading-top ">
                    <div class="section-heading ">
                        <h3>Premium Business Listings</h3>
                        <hr>
                        <p>Explore some of the best tips from around the city from our partners and friends.</p>
                    </div>
                </div>
                <div id="owl-two" class="owl-carousel owl-theme">
                    @foreach($featuredbusiness as $featuredbusinesssingle)
                        <div class="items">
                            <div class="premium-column clearfix">
                                <div class="premium-img-wrap clearfix hover-click" style="background: url('{{ $featuredbusinesssingle->background_image}}') no-repeat center;">
                                    <a href="#" title="LuLu Hypermarkets" tabindex="0"></a>
                                </div>
                                <div class="premium-desc clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center premium-desc-row">
                                        <h3 class="font-archivo regular">{{ $featuredbusinesssingle->companyname}}</h3>
                                        <div class="featured_list_rate_section clearfix">
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </div>
                                        <p class="font-archivo regular"><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $featuredbusinesssingle->companylocation}}</p>
                                        <a  href="{{ route('single',$featuredbusinesssingle->registerId)}}" class="btn yellow-btn borderd border-radius-50 font-roboto regular" title="LuLu Hypermarkets" tabindex="0"> Explore </a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        
        <section class="gray-bg shopping featured clearfix Interested-section"  id="featured">  
            <div class="container">
                <div class="heading-top ">
                    <div class="section-heading ">
                        <h3 style="margin-top: 0px;"><span style="font-weight: 400;">Latest</span><span style="font-weight: bold;"> Event</span></h3>
                        <hr>
                        <p>Explore some of the best tips from around the city from our partners and friends.</p>
                    </div>
                </div>
                <div id="owl-three" class="owl-carousel owl-theme">
                    @foreach($event as $eventsingle)

                        <div class="items">
                            <div class="premium-column clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center premium-desc-row">
                                    <h3 class="font-archivo regular">{{ $eventsingle->headingEn}}</h3>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center premium-desc-row" style="padding: 0px;">
                                        <p class="font-archivo regular"><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $eventsingle->location}}</p>
                                    </div>
                                    <div class="date">
                                        <p class="font-archivo regular"><i class="fa fa-calendar"></i>{{ $eventsingle->startdate}}<span style="padding: 0px 10px;">-</span>{{ $eventsingle->enddate}}</p>
                                    </div>
                                    <div class="email">
                                        <p class="font-archivo regular"><i class="fa fa-envelope"></i>{{ $eventsingle->email}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center premium-desc-row" style="background: url('{{ $eventsingle->image }}') no-repeat center;"></div>
                                <div class="premium-desc clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center premium-desc-row" style="height: 150px;">
                                        <p class="font-archivo regular"style="padding-top: 10px; font-size: 15px;">
                                            <?php
                                            echo $val= implode(' ', array_slice(explode(' ', $eventsingle->summeryEn), 0, 35)); echo "...";
                                        ?>
                                        </p>
                                        <a href="{{ route('single',$eventsingle->eventid)}}" class="btn yellow-btn borderd border-radius-50 font-roboto regular shopping-sec"  tabindex="0">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <center style="padding-top: 20px;">
                    <a href="{{ route('listing')}}/13" class="btn btn-primary"> View All Event </a>
                </center>
            </div>
        </section>

        <section class="gray-bg shopping featured clearfix Interested-section"  id="featured">
            <div class="container">
                <div class="heading-top ">
                    <div class="section-heading ">
                        <h3 style="margin-top: 0px;"><span style="font-weight: 400;">Latest</span><span style="font-weight: bold;"> Offer</span></h3>
                        <hr>
                        <p>Explore some of the best tips from around the city from our partners and friends.</p>
                    </div>
                </div>
                <div class="shopping-thumbnail-padding">
                    <div class="row">
                    @foreach($offers as $offerssingle)

                        <div class="col-lg-4 col-md-4 col-sm-4 sm-margin-20px-bottom">
                            <div class="blog-grid">
                                <div class="blog-grid-img" style="background: url('{{ $offerssingle->image }}') no-repeat center;"></div>
                                <div class="blog-grid-text">
                                    <!-- <span>Shopping</span> -->
                                    <h4>{{$offerssingle->headingEn}}</h4>
                                    <?php
                                        echo $val= implode(' ', array_slice(explode(' ', $offerssingle->descriptionEn), 0, 20)); echo "...";
                                    ?>
                                    <div class="margin-10px-top text-left"><a href="{{ route('single',$offerssingle->offerid)}}" class="btn btn-primary btn-sm"><span>Read More</span></a> </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
                
                <center>
                    <a href="{{ route('listing')}}/13" class="btn btn-primary"> View All Offers </a>
                </center>
            </div>
        </section>
        <!--<section class="gray-bg shopping featured clearfix Interested-section"  id="featured">-->
        <!--    <div class="container">-->
        <!--        <div class="heading-top ">-->
        <!--            <div class="section-heading ">-->
        <!--                <h3 style="margin-top: 0px;"><span style="font-weight: 400;">Latest</span><span style="font-weight: bold;"> News</span></h3>-->
        <!--                <hr>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--        <div class="row">-->
        <!--            @foreach($news as $newssingle)-->
        <!--            <div class="col-lg-3 col-sm-6 grid-margin mb-5 mb-sm-2">-->
        <!--                <div class="position-relative image-hover">-->
        <!--                    <div class="text-center premium-desc-row news-img" style="background: url('{{ $newssingle->image }}') no-repeat center;"></div>-->
        <!--                        @foreach($newscategory as $newscategorysingle)-->
        <!--                        @if(($newscategorysingle->id) == ($newssingle->category))-->
        <!--                                <span class="thumb-title">{{ $newscategorysingle->name}}</span>-->
        <!--                            @endif-->
        <!--                        @endforeach-->
        <!--                    </div>-->
        <!--                <h5 class="font-weight-bold mt-3">{{ $newssingle->headingEn}}</h5>-->
        <!--                <p class="fs-15 font-weight-normal"> -->
        <!--                <?php echo $val= implode(' ', array_slice(explode(' ', $newssingle->summeryEn), 0, 10)); echo "..."; ?>-->
        <!--                </p>-->
                        <!-- <a href="{{ route('single',$newssingle->registerid)}}" class="font-weight-bold text-dark pt-2">Read Article</a> -->
        <!--            </div>-->
        <!--            @endforeach-->

        <!--        </div>-->
        <!--        <center>-->
        <!--            <a href="{{ route('listing')}}/13" class="btn btn-primary"> View All Event </a>-->
        <!--        </center>-->
        <!--    </div>-->
        <!--</section>-->
        
        <section  class="working clearfix">
            <div class="working-heading">
                <div class="container">
                    <section class="working-new">
                        <div class="working-head-top">
                            <h3>See How It Works</h3>
                            <hr>
                            <span class="widget_subtitle  widget_subtitle--frontpage">Discover how Listable can you help you find everything you want.</span>
                        </div>
                        <div class="col-md-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="card__content">
                                <img src="image/choose-what-to-do.png" alt="">
                                <h4>Choose What To Do</h4>
                                <p>Be it Water skiing or parasailing, all you need to know about leisure activities  is just a click away</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="card__content">
                                <img src="image/find-what-you-want.png" alt="">
                                <h4>Staycations for you</h4>
                                <p>Want to stay a little longer, we help you find the best hotel with state of the art facilities</p>
                            </div>
                        </div>
                        <div class="col-ls-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="card__content">
                                <img src="image/explore-amazing-places.png" alt="">
                                <!-- <i class="fa fa-compass" aria-hidden="true"></i> -->
                                <h4>Explore Amazing Places</h4>
                                <p>Looking for a place to hangout.  Discover our list of cinemas, parks, cafes and many more for you and your loved ones.</p>
                            </div>
                        </div>
                </div>
            </div>
        </section>

        <section class="trending-business">
            <div class="container">
                <div class="heading-trending">
                <h3>Trending & New Business In Qatar</h3>
                <hr>
                </div>
                <div class="content-trending">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 content-trending-section">
                    <a onclick="getCategory('Restaurant')">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 trending-image">
                    <img src="image/restaurant.jpg" alt="">
                        <p class="Listing_count">{{ $restaurants }} Listing</p>
                        <div class="trending-image-content">
                        <p>Explore The Top Restaurants</p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 content-trending-section">
                    <a onclick="getCategory('It')">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 trending-image">
                        <img src="image/it.jpg" alt="">
                        <p class="Listing_count">{{ $it }} Listing</p>
                        <div class="trending-image-content">
                            <p>Technologies Companies</p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 content-trending-section">
                    <a onclick="getCategory('Trading')">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 trending-image">
                        <img src="image/interior-design.jpg" alt="">
                        <p class="Listing_count">{{ $trading }} Listing</p>
                        <div class="trending-image-content">
                            <p>trading and contracting</p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 content-trending-section-foot">
                    <a onclick="getCategory('Trading')">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 trending-image">
                        <img src="image/construction.jpg" alt="">
                        <p class="Listing_count">{{ $construction }} Listing</p>
                        <div class="trending-image-content">
                            <p>Top Construction Companies</p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 trending-section-foot">
                    <div class="col-md-12 trending-section-footnew clearfix">
                    <a onclick="getCategory('Beauty saloons')">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 trending-image">
                        <img src="image/salon-beauty.jpg" alt="">
                            <p class="Listing_count">{{ $saloons }} Listing</p>
                            <div class="trending-image-content">
                            <p>Best Saloons</p>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-md-12 trending-section-footnew clearfix">
                    <a onclick="getCategory('Hotel')">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 trending-image">
                        <img src="image/hotel.jpg" alt="">
                            <p class="Listing_count">{{ $hotel }} Listing</p>
                            <div class="trending-image-content">
                            <p>Hotel</p>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>
                </div>
            </div>
        </section>

    </div>
<?php } ?>

@endsection
