<!-- header -->
@include('Front.layout.header')
<!-- header -->

<!-- navigation -->
  @include('Front.layout.nav')
<!-- navigation -->

<!-- Body  Section -->

  <div class="main-head clearfix" style="background:none;">
    <div class="body-sectio-listing clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 cat-content clearfix">

        <!-- Dropdown Box -->

          <div class="find-cate row">
          <form action="{{ route('listing') }}" method="POST" role="form" name="addproduct" enctype="multipart/form-data" id="myform" onsubmit = "return validateCate(this)">
          @csrf
            <div class="col-md-8 col-lg-3 col-xs-10 col-sm-8">
                <input type="text" class="form-control" placeholder="Keyword" name="search">
            </div>
            <div class="col-md-8 col-lg-3 col-xs-10 col-sm-8">
            <select class="chosen-select form-control" name="location" id="form-field-select-3" data-placeholder="Choose Location" >
                <option value="">  </option>
                @foreach($location as $locationsingle)
                    <option onclick value="{{ $locationsingle->id}}">{{ $locationsingle->locationEn}}</option>
                @endforeach
            </select>

            </div>
            <div class="col-md-8 col-lg-3 col-xs-10 col-sm-8">

              <?php if(Session::get('language') == 'ar'){ ?>
                <select class="chosen-select form-control" name="category" id="form-field-select-3" data-placeholder="اختر خاصتك" >
              <?php } else{ ?>
                <select class="chosen-select form-control" name="category" id="form-field-select-3" data-placeholder="Choose Your" >
              <?php } ?>
                <option value="">  </option>
              @foreach($maincategory as $maincategorysingle)
                <option class="MainCategory" disabled>{{ $maincategorysingle->name}}</option>
                @foreach($category as $categorysingle)
                  @if(($maincategorysingle->id) == ($categorysingle->parent))
                    <option onclick value="{{ $categorysingle->id}}">{{ $categorysingle->name}}</option>
                  @endif
                @endforeach
              @endforeach
              </select>
            </div>
            <div class="col-md-8 col-lg-3 col-xs-10 col-sm-8">
            <button class="btn btn-success" type="submit" name="Registersubmit">Search Here</button>
            
        </div>

            @csrf
            </form>

          </div>

        <!-- Dropdown Box -->


        <!-- List Of Business -->

          <div class="category-listing-items">
          @if(count($business)!=0)
              @foreach($business as $businesssingle)
                <div class="col-xs-12 col-md-12 col-sm-3 col-lg-3 category-items">
                  <div class="image" style="background: url({{ $businesssingle->background_image}});"> </div>
                  <div class="cats">
                    <div class="col-md-12 nopadding-qa">
                      <div class="col-md-11 col-xs-11 col-sm-11 nopadding-qa arb-float">
                        <a href="{{ route('single',$businesssingle->registerId)}}"><h6>{{ $businesssingle->companyname}}</h6></a>
                        <div class="cust-rate">
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                        </div>
                        <p>0 <?php if(Session::get('language') == 'ar'){ ?>  استعراض <?php } else{ ?> Review <?php } ?> </p>
                      </div>
                      <div class="col-md-1 col-xs-1 col-sm-1 catecory nopadding-qa" >
                        @foreach($category as $categorysingle)
                          @if(($businesssingle->companycategory) == ($categorysingle->id))
                            <img src="{{ $categorysingle->icon}}" alt="">
                          @endif
                        @endforeach
                      </div>
                    </div>
                    <i class="arb-float fa fa-map-o pr-2" aria-hidden="true"></i><p>{{ $businesssingle->companylocation }}</p>
                    <?php if(Session::get('language') == 'ar'){ ?>  
                      <div class="col-md-12 foot-sec nopadding-qa">
                        <div class="col-md-5 col-xs-6 col-sm-6 nopadding-qa">
                          <a href="tel:12345678"> <i class="fa fa-mobile" aria-hidden="true"></i> اتصل الآن</a>
                        </div>
                        <div class="dirct-way col-md-7  col-xs-6 col-sm-6 nopadding-qa">
                          <div class="maximum">
                            <button onClick="getDirection(12, 12)" class="directory">الحصول على الاتجاه</button>
                          </div>
                        </div>
                      </div>                      
                    <?php } else{ ?> 
                      <div class="col-md-12 foot-sec nopadding-qa">
                        <div class="col-md-5 col-xs-6 col-sm-6 nopadding-qa">
                          <a href="tel:12345678"> <i class="fa fa-mobile" aria-hidden="true"></i> Call Now</a>
                        </div>
                        <div class="dirct-way col-md-7  col-xs-6 col-sm-6 nopadding-qa">
                          <div class="maximum">
                            <button onClick="getDirection(12, 12)" class="directory">Get Direction</button>
                          </div>
                        </div>
                      </div>
                    <?php } ?> </p>
                  </div>
                </div>
              @endforeach
            @else
              @if(Session::get('language') == 'ar')
                <div class="listing-error">
                  <div class="listing-error-one">
                    <h2> لا توجد نتائج </h2>
                    <p class="no-margins"> لا توجد قوائم مطابقه للبحث الخاص بك. </p>
                  </div>
                </div>
              @else
                <div class="listing-error">
                  <div class="listing-error-one">
                    <h2>No Results</h2>
                    <p class="no-margins">There are no listings matching your search.</p>
                  </div>
                </div>
              @endif
             
             @endif
          </div>

        <!-- List Of Business -->

      </div>

    </div>
  </div>


<!-- Business List -->



<!-- Business List -->

<!-- Map Section -->
<!-- Map Section -->

<!-- Body  Section -->



<script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/ace.min.js') }}"></script>

<script src="js/js/chosen.jquery.min.js"></script>
<script src="js/js/ace.min.js"></script>

<script>
    $(document).ready(function() {
        $('.lang-switch').on('click', function () {
            var lang = $(this).data('id');
            $.ajax({
                url: "{{ route('switch-lang') }}",
                data: {
                    'lang': lang
                },
                success: function () {
                    location.reload();
                }
            })
        })
    });
</script>

<script type="text/javascript">
        
        jQuery(function($) {

          if(!ace.vars['touch']) {
            $('.chosen-select').chosen({allow_single_deselect:true});
            //resize the chosen on window resize

            $(window)
            .off('resize.chosen')
            .on('resize.chosen', function() {
              $('.chosen-select').each(function() {
                 var $this = $(this);
                 $this.next().css({'width': $this.parent().width()});
              })
            }).trigger('resize.chosen');
            //resize chosen on sidebar collapse/expand
            $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
              if(event_name != 'sidebar_collapsed') return;
              $('.chosen-select').each(function() {
                 var $this = $(this);
                 $this.next().css({'width': $this.parent().width()});
              })
            });


            $('#chosen-multiple-style .btn').on('click', function(e){
              var target = $(this).find('input[type=radio]');
              var which = parseInt(target.val());
              if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
               else $('#form-field-select-4').removeClass('tag-input-style');
            });
          }
        });
      </script>


<!-- mapping  -->

<script>
            var directionsService;
            var directionsDisplay;
            var currentPosition;
            var map;

            function findMe() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var homeMarker = new google.maps.Marker({
                            position: { lat: position.coords.latitude, lng: position.coords.longitude },
                            map: map,
                            title: "Home",
                        });
                        currentPosition = position.coords;
                        map.setCenter(homeMarker.getPosition())
                    });
                } else {
                    alert("Error"); 
                }
            }


            function initMap() {
                directionsService = new google.maps.DirectionsService;
                directionsDisplay = new google.maps.DirectionsRenderer;
                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 15,
                    center: {lat:25.354826,lng:51.183884}
                });
                findMe();

        
                // Loop through markers
                for(var i = 0;i < markers.length;i++){
                  // Add marker
                  addMarker(markers[i]);
                }

                // Add Marker Function
                function addMarker(props){
                  var marker = new google.maps.Marker({
                    position:props.coords,
                    map:map,
                    //icon:props.iconImage
                  });

                  // Check for customicon
                  if(props.iconImage){
                    // Set icon image
                    marker.setIcon(props.iconImage);
                  }

                  // Check content
                  if(props.content){
                    var infoWindow = new google.maps.InfoWindow({
                      content:props.content
                    });

                    marker.addListener('click', function(){
                      infoWindow.open(map, marker);
                    });
                  }
                }
            }

            function getDirection(lat, lng) {
                  directionsService.route({
                    origin: { lat: currentPosition.latitude, lng: currentPosition.longitude },
                    destination: { lat: parseFloat(lat), lng: parseFloat(lng) },
                    travelMode: 'DRIVING',


                }, function (response, status) {

                    if (status === 'OK') {
                        directionsDisplay.setDirections(response);
                        directionsDisplay.setMap(map);

                    } else {
                        window.alert('Directions request failed due to ' + status);
                    }
                });
            }

        </script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWRA9qcK5pY27rbdxSFtqcJQJWUYmwUPw&callback=initMap&origin=Oslo+Norway&destination=Telemark+Norway"></script>

</body>

</html>

