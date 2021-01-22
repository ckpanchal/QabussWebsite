<?php if(Session::get('language') == 'ar'){ 
  ?>

<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{ asset('image/favicon.png') }}">

    <title>Qabuss</title>
    
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('front/css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('front/css/media.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />
  <link href="{{ asset('front/css/load-more-button.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('front/css/styleAr.css') }}">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/4c0b5c1695.js"></script>
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
</head>
<body>
<?php } else{ ?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="google-site-verification" content="r81FXtZ3yoCySOzce2Hr1p1nPwV4VOqq7vmuaK_e7-0" />

  <link rel="icon" type="image/png" href="{{ asset('image/favicon.png') }}">
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
  
</head>
<body>
    
<?php } ?>
    