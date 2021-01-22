@if(!empty($offer))

<html>
<meta charset="utf-8">
  <meta name="google-site-verification" content="r81FXtZ3yoCySOzce2Hr1p1nPwV4VOqq7vmuaK_e7-0" />

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="keywords" content="Bootstrap, Landing page, Template, Registration, Landing">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="author" content="Grayrids">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Qabuss</title>
  <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('front/css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('front/css/media.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />
  <link href="{{ asset('front/css/load-more-button.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/4c0b5c1695.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
  <!-- owl-carousel -->
  <link rel="stylesheet" href="{{ asset('front/Plugin/owlcarousel/assets/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('front/Plugin/owlcarousel/assets/owl.theme.default.min.css') }}">
  <!-- owl-carousel -->

  <script src="{{ asset('front/js/load-more-button.js') }}"></script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-124591191-1"></script>
  <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-124591191-1');
  </script>
  <!-- Global site tag (gtag.js) - Google Analytics -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-ZJBG0ZRXMT"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-ZJBG0ZRXMT');
</script>
<script>
  function myFunction(id) {
      var id = id;
    window.location.href= "{{URL::to('listing')}}"+'/'+id;
  }
</script>
  
<head>
<style>
.fbTopBar img, .fbTopBar .searchBar {
    display: none!important;
}
body.offerview {
    padding: 10px;
}
body.offerview iframe body{
    padding: 10px;
}

</style></head>

<body class="offerview">
    
<!--you can copy the below code to your htm 
page-----------------------------begin--->
<!--change the width and height value as you want.--> 
<!-- Do change "index.htm" to your real html name of the flippingbook--> 
<iframe  style="width:100%;height:100%"  src="{{ $offer->appUrl }}"
seamless="seamless" scrolling="no" frameborder="0" 
allowtransparency="true" allowfullscreen="true">
</iframe>

<!--you can copy the above code to your htm 
page-----------------------------end--->
</body>

</html>

@endif


