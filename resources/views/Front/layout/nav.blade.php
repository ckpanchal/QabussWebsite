<?php if(Session::get('language') == 'ar'){ ?>
    <!-- Header Menu -->

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset('image/logo.png') }}" alt="main-logo" title="logo"></a>
        <button type="button" name="button" class="navbar-toggle" data-toggle="collapse" data-target=".navHeadercollapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
          <div class="collapse navbar-collapse navHeadercollapse" style="width:100%">
            <ul class="nav navbar-nav navbar-right">
                <!-- <li><a href="news/">News</a></li> -->
                <li><a href="{{route('index')}}">المنزل</a></li>
                <li><a href="{{route('event')}}">الحدث</a></li>
                <li><a href="{{route('offer')}}">يقدم</a></li>
                <li><a href="{{route('listing')}}">الدليل</a></li>
               
                <?php
  
                ?>
              <li class="dropdown">
                 <a href="#" class="dropdown-toggle" data-target="#menu1" data-toggle="dropdown"> عربى <i class="fa fa-globe" aria-hidden="true"></i>  <b class="caret"></b> </a>
                 <ul class="dropdown-menu" id="demo1">
                   <li>
                        <a class="nav-link lang-switch" href="javascript:;" data-id="1"> English  </a>
                   </li>
                 </ul>
                 
              </li>
            </ul>
          </div>
      </div>
    </div>

  <!-- Header Menu -->
<?php } else{ ?>
    <!-- Header Menu -->

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset('image/logo.png') }}" alt="main-logo" title="logo"></a>
        <button type="button" name="button" class="navbar-toggle" data-toggle="collapse" data-target=".navHeadercollapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
          <div class="collapse navbar-collapse navHeadercollapse" style="width:100%">
            <ul class="nav navbar-nav navbar-right">
                <!-- <li><a href="news/">News</a></li> -->
                <li><a href="{{route('index')}}">Home</a></li>
                <li><a href="{{route('event')}}">Event</a></li>
                <li><a href="{{route('offer')}}">Offers</a></li>
                <li><a href="{{route('listing')}}">Directory</a></li>
               
                <?php
  
                ?>
              <li class="dropdown">
                 <a href="#" class="dropdown-toggle" data-target="#menu1" data-toggle="dropdown"> English  <i class="fa fa-globe" aria-hidden="true"></i>  <b class="caret"></b> </a>
                 <ul class="dropdown-menu" id="demo1">
                   <li>
                        <a class="nav-link lang-switch" href="javascript:;" data-id="2"> عربى </a>
                   </li>
                 </ul>
                 
              </li>
            </ul>
          </div>
      </div>
    </div>

  <!-- Header Menu -->

<?php } ?>
