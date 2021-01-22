@extends('Front.layout.app')
@section('title','Dashboard - Qabuss')
@section('content')

<!-- Body  Section -->

<div class="body-sectio-listing clearfix">      
    <section class="single-busines">
    @if(!empty($business))
    @foreach($business as $businesssingle)

        <div class="body-section single-listing">
            <div id="bdy-background" style="background-image: url({{ $businesssingle->background_image }})"  class="bdy-background" style="">
                <div class="background-color"></div>
            </div>
            <div class="profile-section container">
                <div class="prfl-prsnl-info">
                    <div class="col-xs-5 col-sm-2 col-md-3 col-md-3">
                        <div class="prfl-image" style="border: 1px solid #9c9c9c;">
                            <img id="profile-image" style="width: 100%; HEIGHT: 100%;" src="{{ $businesssingle->profile_image }}" alt="your image" />
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9" style="padding: 0px;">
                        <div class="prfl-prsnl">
                            <h2 class="prfl-name">{{ $businesssingle->companyname }}</h2>
                            <p class="prfl-location">{{ $businesssingle->companylocation }}</p>
                            <div class="cust-rate"  style="border: none;">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <p>9 Review</p>
                            <div class="listing-map-direct">
                                <i class="fa fa-map-o pr-2" aria-hidden="true" style="margin: 0px 10px 0px 0px;font-size: 17px;color: #f5f5f5;"></i>
                                <button id="myBtn" class="listing-direct" value="Get Directions">Get Direction</button>
                                <div id="myModal" class="modal">
                                    <div class="container">
                                        <div class="modal-content">
                                            <div id="map" style="border-radius: 2px;position: absolute;overflow: hidden;top: -97px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 body-company-info">
                <section class="Company-informatiion-section col-xs-12 col-sm-12 col-md-12 col-lg-12 clearfix">
                    <div class="prfl-information">
                        <div class="company-info">
                            <h2>{{ $businesssingle->companyname }}</h2>
                            <p><?php $contentvalue = $businesssingle->companydescription ;
                            echo str_replace(array("\r\n", "\n", "\r"), "<br>", $contentvalue);
                            ?></p>
                        </div>
                    </div>
                    @foreach($facilities as $facilitiessingle)
                        <div class="company-facility clearfix">
                            <h2>Our Facilities</h2>
                            @if($facilitiessingle->carparking)
                            <div class="col-md-6">
                                <i class="fa fa-car" aria-hidden="true"></i>
                                <p>Car Parking</p>
                            </div>
                            @endif
                            @if($facilitiessingle->wheelchair)

                            <div class="col-md-6">
                                <i class="fa fa-wheelchair" aria-hidden="true"></i>
                                <p>wheelchair accesible</p>
                            </div>
                            @endif
                            @if($facilitiessingle->wifi)
                            <div class="col-md-6">
                                <i class="fa fa-wifi" aria-hidden="true"></i>
                                <p>Compliment WIFI</p>
                            </div>
                            @endif
                            @if($facilitiessingle->creditcard)
                            <div class="col-md-6">
                                <i class="fa fa-credit-card" aria-hidden="true"></i>
                                <p>Credit Card</p>
                            </div>
                            @endif
                            @if($facilitiessingle->prayerroom)
                            <div class="col-md-6">
                                <i class="fa fa-car" aria-hidden="true"></i>
                                <p>Prayer Room</p>
                            </div>
                            @endif
                            @if($facilitiessingle->alltimeservice)
                            <div class="col-md-6">
                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                <p>Full Time</p>
                            </div>
                            @endif
                        </div>
                    @endforeach
                    @foreach($workinghour as $workinghoursingle)
                        <div class="company-working">
                            <h2>Working Hours</h2>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <ul>
                                    <li> <span>Monday</span> <span class="vlaues">{{ $workinghoursingle-> monday}}</span> </li>
                                    <li> <span>Tuesday</span> <span class="vlaues">{{ $workinghoursingle-> tuesday}}</span> </li>
                                    <li> <span>Wednesday</span> <span class="vlaues">{{ $workinghoursingle-> wednesday}}</span> </li>
                                    <li> <span>Thursday</span> <span class="vlaues">{{ $workinghoursingle-> thursday}}</span> </li>
                                    <li> <span>Friday</span> <span class="vlaues">{{ $workinghoursingle-> friday}}</span> </li>
                                    <li> <span>Saturday</span> <span class="vlaues">{{ $workinghoursingle-> saturday}}</span> </li>
                                    <li> <span>Sunday</span> <span class="vlaues">{{ $workinghoursingle-> sunday}}</span> </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                    @foreach($socialmedia as $socialmediasingle)
                        <div class="company-social-info">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <h2>Contact</h2>
                                <div class="contact-info">
                                    @if($businesssingle->company_email)
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                        <a href="mailto:{{$businesssingle->company_email}}"><p>{{ $businesssingle->company_email }}</p></a>
                                    @endif
                                    @if($businesssingle->companyphone)
                                        <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                                        <a href="{{$businesssingle->companyphone}}"><p>{{$businesssingle->companyphone}}</p></a>
                                    @endif
                                    @if($businesssingle->company_website)
                                        <i class="fa fa-globe" aria-hidden="true"></i>
                                        <a href="{{$businesssingle->company_website}}" target="_blank"><p>{{$businesssingle->company_website}}</p></a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <h2>Connect Social</h2>
                                <div class="social-info">
                                @if($socialmediasingle->FaceBook)
                                <a href="{{ $socialmediasingle->FaceBook }}" class="clearfix" target="_blank"> <div class="facebook"></div> </a>
                                @endif
                                @if($socialmediasingle->Instagram)
                                <a href="" class="clearfix" target="_blank"> <div class="instagram"></div> </a>
                                @endif
                                @if($socialmediasingle->Linked)
                                <a href="" class="clearfix" target="_blank"> <div class="twitter"></div> </a>
                                @endif
                                @if($socialmediasingle->Twitter)
                                <a href="" class="clearfix" target="_blank"> <div class="twitter"></div> </a>
                                @endif
                                @if($socialmediasingle->Youtube)
                                <a href="" class="clearfix" target="_blank"> <div class="facebook"></div> </a>
                                @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </section>
                <!-- <section class="rating-section col-xs-12 col-sm-12 col-md-12 col-lg-12 clearfix">
                    <div class="tab-content prfl-reviews clearfix">
                        <div class="review-post-head">
                            <h2>Rate and write a review</h2>
                        </div>
                        <div class="col-md-12 rate-review">
                            <div class="profile-header col-md-12">
                                <div class="row">
                                    <div class="col-12 col-xl-5 order-xl-1 order-2 text-xl-right text-center">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist" style="border-bottom: 1px solid #00000036;">
                                            <li class=" active"> <a class="nav-link lis-light py-4 lis-relative mr-3" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-expanded="false" > Add Review</a> </li>
                                            <li class=""> <a class="nav-link review lis-light py-4 lis-relative mr-3" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-expanded="false" > Reviews</a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane active Add-Review " id="profile"  aria-labelledby="profile">
                            <form class="col-xs-12 col-sm-12 col-md-12 col-lg-12" action="listing.php" method="post">
                                <div class="cmt-revw col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <label><i class="fa fa-user-o"></i></label>
                                <input type="text" placeholder="Your Name *" value="">
                                <input type="hidden" name="reg_id" value="">
                                <input type="hidden" name="listing_name" value="Al Emadi Hospital" placeholder="Name*">
                                </div>
                                <div class="cmt-revw  col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <label><i class="fa fa-envelope-o"></i>  </label>
                                <input type="text" placeholder="Your Name *" value="">
                                </div>
                                <div class="cmt-revw col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <h5 class="star-review">Your overall rating of this listing<span>*</span> : </h5>
                                <fieldset class="rating">
                                <input type="radio" id="star5" name="rating" value="5"><label for="star5" title="Rocks!">5 stars</label>
                                <input type="radio" id="star4" name="rating" value="4"><label for="star4" title="Pretty good">4 stars</label>
                                <input type="radio" id="star3" name="rating" value="3"><label for="star3" title="Meh">3 stars</label>
                                <input type="radio" id="star2" name="rating" value="2"><label for="star2" title="Kinda bad">2 stars</label>
                                <input type="radio" id="star1" name="rating" value="1"><label for="star1" title="Sucks big time">1 star</label>
                                </fieldset>
                                <label class="control-label" for="inputWarning" id="place01" style="color:red;"></label>
                                </div>
                                <div class="cmt-revw col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <h5 class="star-review">Your Review<span>*</span> : </h5>
                                <textarea class="textarea form-control" name="message" rows="3" cols="40" placeholder="What was your experience:"></textarea>
                                </div>
                                <div class="cmt-revw col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <input type="submit" value="Submit Review" name="submit_rating">
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane Add-Review" id="reviews"  aria-labelledby="reviews">
                            <section class="col-xs-12 col-sm-12 col-md-12 col-lg-12 reviews-section">
                                <div class="prfl-reviews" style="padding: 20px 0px;">
                                    <div class="col-xs-12 col-sm-12 col-md-12 cust-reviews blogBox moreBox">
                                        <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2 cust-image" style="text-align: center;">
                                            <img src="{{ asset('image/user_dp/user-prfile-pic.jpg') }}" alt="" width="100%">
                                        </div>
                                        <div class="col-xs-12  col-sm-9 col-md-9 col-lg-10 cust-comment blogTxt">
                                            <h5>tester One</h5>
                                            <p class="rating-date">02/02/2019</p>
                                            <div class="rating-cust">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                            </div>
                                            <p  class="cust-comment-details"><i class="fa fa-quote-left"></i>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </section>
                        </div>




                    </div>
                </section> -->

            </div>
            <div class="col-md-4 listing-right">
                <section class="listing-right-near clearfix">
                    <div class="near-post">
                        <h2>Nearest Company</h2>
                        <div class="post-near-details clearfix col-md-12">
                            <div class="image-sec col-md-6" style="background-image: url(image/company_back/dp.png">
                        </div>
                        <div class="content-sec col-md-6">
                            <a><h6>Name</h6></a>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </div>
                    </div>
                </section>
                <section class="listing-right-near clearfix">
                    <div class="near-post">
                        <h2>Latest Listing</h2>
                            <div class="post-near-details clearfix col-md-12">
                                <div class="image-sec col-md-6" style="background-image: url(image/company_back/dp.png);">
                            </div>
                            <div class="content-sec col-md-6">
                                <a><h6>Name</h6></a>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>




        @endforeach
        @endif

    </section>      
</div>
<!-- Body  Section -->


@endsection