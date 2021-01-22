<?php if(Session::get('language') == 'ar'){ ?>
    <section class="footer-section">
        <div class="container top-section">
            <div class="footer-section">
                <div class="left-side col-md-3 col-sm-12">
                    <div class="mobile-app">
                        <h5>  الحصول على التطبيق  </h5>
                        <i class="fa fa-android" aria-hidden="true"></i>
                        <i class="fa fa-apple" aria-hidden="true"></i>
                    </div>
                    <h4> يعمل بواسطة </h4>
                    <hr>
                    <img src="{{ asset('/image/webzonetechnologies.png') }}" alt="" style="width: 79%;">
                </div>
                <div class="left-side col-md-3  col-sm-4">
                    <h4>السياسات </h4>
                    <hr>
                    <a href="#"> الشؤون القانونية والأمنية </a>
                    <a href="#"> سياسة الخصوصية </a>
                    <a href="#"> حقوق النشر الخاصة بالإذن</a>
                    <a href="#"> الشروط والأحكام </a>
                    <a href="#"> استخدام المصطلح</a>
                </div>

                <div class="left-side col-md-3  col-sm-4">
                    <h4>قابوس</h4>
                    <hr>
                    <a href="#">الدليل</a>
                    <a href="#">خريطه الموقع </a>
                    <a href="#">من نحن</a>
                    <a href="#">اتصل بنا</a>
                </div>
                <div class="left-side col-md-3  col-sm-4">
                    <h4>معلومات الاتصال</h4>
                    <hr>
                    <p>Office No.12, Al Mulla Center,</p>
                    <p>Al Matar Al Qadeem St, Doha</p>
                    <a href="#">qabuss@gmail.com</a>
                    <a href="#">info@qabuss.com</a>
                </div>
            </div>

        </div>
        <div class="social-footer-section">
            <div class="container">
                <div class="copyright-footer-section col-md-5">
                    <p> جميع حقوق الطبع محفوظة © 2020 - القابوس</p>
                </div>
                <div class="social-media col-md-7">
                    <h3>تابعنا على:</h3>
                    <a href="https://www.facebook.com/QaBuss/" class="fa fa-facebook"></a>
                    <a href="https://twitter.com/Qa_Buss" class="fa fa-twitter"></a>
                    <a href="https://www.linkedin.com/company/qabuss/" class="fa fa-linkedin"></a>
                    <a href="https://www.youtube.com/channel/UCZnRLSOTeuwt5fKto2bsbjQ" class="fa fa-youtube"></a>
                    <a href="https://www.instagram.com/qa_buss/" class="fa fa-instagram"></a>
                </div>
            </div>
        </div>
    </section>
<?php } else{ ?>
    <section class="footer-section">
        <div class="container top-section">
            <div class="footer-section">
                <div class="left-side col-md-3 col-sm-12">
                    <div class="mobile-app">
                        <h5>Get The App</h5>
                        <i class="fa fa-android" aria-hidden="true"></i>
                        <i class="fa fa-apple" aria-hidden="true"></i>
                    </div>
                    <h4>Powered by</h4>
                    <hr>
                    <img src="{{ asset('image/webzonetechnologies.png') }}" alt="" style="width: 79%;">
                </div>
                <div class="left-side col-md-3  col-sm-4">
                    <h4>Policy</h4>
                    <hr>
                    <a href="#">Legal and security</a>
                    <a href="privacy.php">privacy policy </a>
                    <a href="#">Permission copyright</a>
                    <a href="terms-conditions.php">Terms and conditions</a>
                    <a href="#">Term's Use</a>
                </div>
                <div class="left-side col-md-3  col-sm-4">
                    <h4>Qabuss</h4>
                    <hr>
                    <a href="#">Directory</a>
                    <a href="#">SiteMap</a>
                    <a href="#">About Us</a>
                    <a href="#">Contact Us</a>
                </div>
                <div class="left-side col-md-3  col-sm-4">
                    <h4>Contact Info</h4>
                    <hr>
                    <p>Office No.12, Al Mulla Center,</p>
                    <p>Al Matar Al Qadeem St, Doha</p>
                    <a href="#">qabuss@gmail.com</a>
                    <a href="#">info@qabuss.com</a>
                </div>
            </div>

        </div>
        <div class="social-footer-section">
            <div class="container">
                <div class="copyright-footer-section col-md-5">
                    <p>All copyrights reserved &copy; 2017 - Qabuss</p>
                </div>
                <div class="social-media col-md-7">
                    <h3>Follow us on:</h3>
                    <a href="https://www.facebook.com/QaBuss/" class="fa fa-facebook"></a>
                    <a href="https://twitter.com/Qa_Buss" class="fa fa-twitter"></a>
                    <a href="https://www.linkedin.com/company/qabuss/" class="fa fa-linkedin"></a>
                    <a href="https://www.youtube.com/channel/UCZnRLSOTeuwt5fKto2bsbjQ" class="fa fa-youtube"></a>
                    <a href="https://www.instagram.com/qa_buss/" class="fa fa-instagram"></a>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<script>
$(".signup-form").hide();
$(".signup").css("background", "none");

$(".login").click(function(){
    $(".signup-form").hide();
    $(".login-form").show();
    $(".signup").css("background", "none");
    $(".login").css("background", "#fff");
});
$(".signup").click(function(){
    $(".signup-form").show();
    $(".login-form").hide();
    $(".login").css("background", "none");
    $(".signup").css("background", "#fff");
});
$(".btn").click(function(){
    $(".input").val("");
});
</script>
<script>
   
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 500) {
            $("body").addClass("scroll-pos");
        } else {
            $("body").removeClass("scroll-pos");
        }
    });
</script>
<!-- owlcarousel -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('front/Plugin/owlcarousel/owl.carousel.min.js') }}"></script>


<script>
$(document).ready(function() {
    $('.slider-single').slick({
        infinite: true,
        autoplay: true,
        arrows: false,
        dots: false

    });

    $('.lang-switch').on('click', function () {
        alert("Test");
    })
});
</script>

<script>
$(document).ready(function(){
$('#owl-one').owlCarousel({
    loop: true,
    dots: false,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    responsiveClass: true,
    pagination: false,
    responsive: {
      0: {
          items: 1,
          nav: true
      },
      600: {
          items: 1,
          nav: false
      },
      1000: {
          items: 1,
          nav: true,
      },
      1400: {
          items: 1,
          nav: false,
      }
  }
});
$('#owl-two').owlCarousel({
  loop: true,
  margin: 10,
  dots: false,
  autoplay: true,
  autoplayTimeout: 3000,
  autoplayHoverPause: true,
  responsiveClass: true,
  pagination: false,
  responsive: {
      0: {
          items: 1,
          nav: true
      },
      600: {
          items: 2,
          nav: false
      },
      1000: {
          items: 3,
          nav: true,
      },
      1400: {
          items: 4,
          nav: false,
      }
  }
});
$('#owl-three').owlCarousel({
  loop: true,
  margin: 10,
  autoplay: true,
  autoplayTimeout: 3000,
  autoplayHoverPause: true,
  responsiveClass: true,
  pagination: false,
  responsive: {
      0: {
          items: 1,
          nav: true
      },
      600: {
          items: 2,
          nav: false
      },
      1000: {
          items: 3,
          nav: true,
      },
      1400: {
          items: 2,
          nav: true,
      }
  }
});
$('#owl-four').owlCarousel({
  loop: true,
  margin: 10,
  autoplay: true,
  autoplayTimeout: 3000,
  autoplayHoverPause: true,
  responsiveClass: true,
  pagination: false,
  responsive: {
      0: {
          items: 1,
          nav: true
      },
      600: {
          items: 2,
          nav: false
      },
      1000: {
          items: 3,
          nav: true,
      },
      1400: {
          items: 2,
          nav: true,
      }
  }
});

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
</body>

</html>
