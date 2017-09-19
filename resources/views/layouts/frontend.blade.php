@php
    use App\Models\Manager;
    $manager = Manager::first();
@endphp
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- Tieu Long Lanh Kute -->
<head>
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="@yield('description')" />
<meta name="keywords" content="@yield('keywords')" />
<meta name="author" content="thaile" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta charset="UTF-8">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
    
<!-- Favicon
============================================ -->
<link rel="shortcut icon" type="image/x-icon" href="{{ $manager->favicon }}">

  <!-- Facebook and Twitter integration -->
<meta property="og:title" content="@yield('og-title')"/>
<meta property="og:image" content="@yield('og-image')"/>
<meta property="og:url" content="@yield('og-url')"/>
<meta property="og:site_name" content="@yield('og-site_name')"/>
<meta property="og:description" content="@yield('od-description')"/>
<meta name="twitter:title" content="@yield('twitter-title')" />
<meta name="twitter:image" content="@yield('twitter-image')" />
<meta name="twitter:url" content="@yield('twitter-url')" />
<meta name="twitter:card" content="@yield('twitter-card')" />
<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

 

<!-- FONTS
    ============================================ -->  
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'> 
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Bitter:400,700,400italic&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        
    <!-- animate CSS
    ============================================ -->
        <link rel="stylesheet" href="{{ asset('frontend/') }}/css/animate.css">    
    
    <!-- FANCYBOX CSS
    ============================================ -->      
        <link rel="stylesheet" href="{{ asset('frontend/') }}/css/jquery.fancybox.css">  
    
    <!-- BXSLIDER CSS
    ============================================ -->      
        <link rel="stylesheet" href="{{ asset('frontend/') }}/css/jquery.bxslider.css">      
        
    <!-- MEANMENU CSS
    ============================================ -->      
        <link rel="stylesheet" href="{{ asset('frontend/') }}/css/meanmenu.min.css"> 
    
    <!-- JQUERY-UI-SLIDER CSS
    ============================================ -->      
        <link rel="stylesheet" href="{{ asset('frontend/') }}/css/jquery-ui-slider.css">   
    
    <!-- NIVO SLIDER CSS
    ============================================ -->      
        <link rel="stylesheet" href="{{ asset('frontend/') }}/css/nivo-slider.css">
    
    <!-- OWL CAROUSEL CSS   
    ============================================ -->  
        <link rel="stylesheet" href="{{ asset('frontend/') }}/css/owl.carousel.css">
    
    <!-- OWL CAROUSEL THEME CSS   
    ============================================ -->  
         <link rel="stylesheet" href="{{ asset('frontend/') }}/css/owl.theme.css">
    
    <!-- BOOTSTRAP CSS 
    ============================================ -->  
        <link rel="stylesheet" href="{{ asset('frontend/') }}/css/bootstrap.min.css">
    
    <!-- FONT AWESOME CSS 
    ============================================ -->
        <link rel="stylesheet" href="{{ asset('frontend/') }}/css/font-awesome.min.css">
    
    <!-- NORMALIZE CSS 
    ============================================ -->
        <link rel="stylesheet" href="{{ asset('frontend/') }}/css/normalize.css">
    
    <!-- MAIN CSS 
    ============================================ -->
        <link rel="stylesheet" href="{{ asset('frontend/') }}/css/main.css">
    
    <!-- STYLE CSS 
    ============================================ -->
        <link rel="stylesheet" href="{{ asset('frontend/') }}/style.css">
    
    <!-- RESPONSIVE CSS 
    ============================================ -->
        <link rel="stylesheet" href="{{ asset('frontend/') }}/css/responsive.css">
    
    <!-- IE CSS 
    ============================================ -->
        <link rel="stylesheet" href="{{ asset('frontend/') }}/css/ie.css">
    
    <!-- MODERNIZR JS 
    ============================================ -->
        <script src="{{ asset('frontend/') }}/js/vendor/modernizr-2.6.2.min.js"></script> 

 <script type="text/javascript">
     var BASE_URL = '{{ url('') }}';
 </script>
 
</head>
<body>
 {{ csrf_field() }}
<div id="root">
    @include('frontend.blocks.message')
<div class="header-top">
@include('frontend.header-top')
</div>
<section class="header-middle">
@include('frontend.blocks.menu')
</section>

<header class="main-menu-area">
@include('frontend.header')
</header>

<section class="main-content-section">
@yield('content')
</section>



{{-- <section class="brand-client-area">
@include('frontend.blocks.brand')
</section> --}}

<section class="company-facality">
@include('frontend.blocks.company')
</section>

<section class="footer-top-area">
@include('frontend.footer-top')
</section>

<footer class="copyright-area">
@include('frontend.footer')
</footer>

<!-- COPYRIGHT-AREA END -->
    <!-- JS 
    ===============================================-->
    <!-- jquery js -->
    <script src="{{ asset('frontend/') }}/js/vendor/jquery-1.11.3.min.js"></script>
    
    <!-- fancybox js -->
        <script src="{{ asset('frontend/') }}/js/jquery.fancybox.js"></script>
    
    <!-- bxslider js -->
        <script src="{{ asset('frontend/') }}/js/jquery.bxslider.min.js"></script>
    
    <!-- meanmenu js -->
        <script src="{{ asset('frontend/') }}/js/jquery.meanmenu.js"></script>
    
    <!-- owl carousel js -->
        <script src="{{ asset('frontend/') }}/js/owl.carousel.min.js"></script>
    
    <!-- nivo slider js -->
        <script src="{{ asset('frontend/') }}/js/jquery.nivo.slider.js"></script>
    
    <!-- jqueryui js -->
        <script src="{{ asset('frontend/') }}/js/jqueryui.js"></script>
    
    <!-- bootstrap js -->
        <script src="{{ asset('frontend/') }}/js/bootstrap.min.js"></script>
    
    <!-- wow js -->
        <script src="{{ asset('frontend/') }}/js/wow.js"></script>   
    <script>
      new WOW().init();
    </script>

    <!-- Google Map js -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoYHFhB9SbbUGXJ9jzhmSMihCJOOoQFyY"></script> 
    <script>
      function initialize() {
        var mapOptions = {
        zoom: 8,
        scrollwheel: false,
        center: new google.maps.LatLng({{ $manager->lng }}, {{ $manager->lat }})
        };
        var map = new google.maps.Map(document.getElementById('googleMap'),
          mapOptions);
        var marker = new google.maps.Marker({
        position: map.getCenter(),
        map: map
        });

      }
      google.maps.event.addDomListener(window, 'load', initialize);       
    </script>
    <!-- main js -->
        <script src="{{ asset('frontend/') }}/js/jquery.validate.min.js"></script>
        <script src="{{ asset('frontend/') }}/js/main.js"></script>
        <script src="{{ asset('frontend/') }}/js/cart.js"></script>
        </div>
</body>
</html>
