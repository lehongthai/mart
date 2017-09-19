<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- Tieu Long Lanh Kute -->
<head>
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="@yield('description')" />
<meta name="keywords" content="@yield('keywords')" />
<meta name="author" content="thaile" />

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
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta charset="UTF-8">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<meta name="viewport" content="width=device-width">
 
<link href="{{ asset('frontend/') }}/css/style.css" rel="stylesheet" type="text/css"/> 
<link href="{{ asset('frontend/') }}/css/bs.css" rel="stylesheet" type="text/css"/> 
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/') }}/css/main-slider.css"/> 
<!--[if lte IE 10]><link rel="stylesheet" type="text/css" href="css/customIE.css" /><![endif]-->
<link href="{{ asset('frontend/') }}/css/font-awesome.css" rel="stylesheet" type="text/css"/> 
<link href="{{ asset('frontend/') }}/css/font-awesome-ie7.css" rel="stylesheet" type="text/css"/> 
<link href="{{ asset('frontend/') }}/css/font-awesome-ie7.css" rel="stylesheet" type="text/css"/>  
<noscript>
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/') }} }}/css/noJS.css"/>
</noscript>
  
<link rel="stylesheet" name="skins" href="{{ asset('frontend/') }}/css/default.css" type="text/css" media="all">
 
 
</head>
<body>
 {{ csrf_field() }}
<div class="wrapper">
 
 
<section class="top-nav-bar">
<section class="container-fluid container">
<section class="row-fluid">
<section class="span6">
<ul class="top-nav">
<li><a href="{{ url('') }}" class="active">Home page</a></li>
<li><a href="{{ url('') }}"></a></li>
<li><a href="blog.html">Product</a></li>
<li><a href="shortcodes.html">News Feed</a></li>
<li><a href="blog-detail.html">About Us</a></li>
<li><a href="contact.html">Contact Us</a></li>
<li><a href="cart.html">My Cart</a></li>
<li><a href="checkout.html">Checkout</a></li>
</ul>
</section>
<section class="span6 e-commerce-list">
<ul style="text-align: right;">

<li>
  <select id="changeLanguage" style="max-width: 60%; margin-top: 10px;">
  <option value="en" @if ($lang == 'en') selected @endif>English</option>
  <option value="vn" @if ($lang == 'vn') selected @endif>Vietnamese</option>
</select>
{{ csrf_field() }}
</li>

</ul>
<div class="c-btn"> <a href="cart.html" class="cart-btn">Cart</a>
<div class="btn-group">
<button data-toggle="dropdown" class="btn btn-mini dropdown-toggle">0 item(s) - $0.00<span class="caret"></span></button>
<ul class="dropdown-menu">
<li><a href="#">Action</a></li>
<li id="cart_qty">{!! $html !!}</li>
</ul>
</div>
</div>
</section>
</section>
</section>
</section>

<header id="main-header">

@include('frontend.header')
 
</header>

<section id="content-holder" class="container-fluid container">

@yield('content')

</section>
@include('frontend.footer-top')

<footer id="main-footer">

@include('frontend.footer')

</footer>
</div>
<script type="text/javascript" src="{{ asset('frontend/') }}/js/lib.js"></script> 
<script type="text/javascript" src="{{ asset('frontend/') }}/js/modernizr.js"></script>
<script type="text/javascript" src="{{ asset('frontend/') }}/js/easing.js"></script> 
<script type="text/javascript" src="{{ asset('frontend/') }}/js/bs.js"></script> 
<script type="text/javascript" src="{{ asset('frontend/') }}/js/bxslider.js"></script> 
<script type="text/javascript" src="{{ asset('frontend/') }}/js/input-clear.js"></script> 
<script src="{{ asset('frontend/') }}/js/range-slider.js"></script> 
<script src="{{ asset('frontend/') }}/js/language.js"></script> 
<script src="{{ asset('frontend/') }}/js/jquery.zoom.js"></script> 
<script type="text/javascript" src="{{ asset('frontend/') }}/js/bookblock.js"></script> 
<script type="text/javascript" src="{{ asset('frontend/') }}/js/social.js"></script> 
<script src="{{ asset('frontend/') }}/js/jquery.booklet.latest.js" type="text/javascript"></script> 
<script type="text/javascript">
        $(function () {     
            $("#mybook").booklet({
                width:'100%',
                height:430,
                auto: true,
                //speed: 250,
            });
        });
    </script>
 
<noscript>
<style>#socialicons>a span{top:0px;left:-100%;-webkit-transition:all 0.3s ease;-moz-transition:all 0.3s ease-in-out;-o-transition:all 0.3s ease-in-out;-ms-transition:all 0.3s ease-in-out;transition:all 0.3s ease-in-out;}#socialicons>ahover div{left:0px;}</style>
</noscript>
<script type="text/javascript">
  /* <![CDATA[ */
  $(document).ready(function() {
  $('.social_active').hoverdir( {} );
})
/* ]]> */
</script>
  <div class="switcher"></div>  
 
<script type="text/javascript" src="{{ asset('frontend/') }}/js/cookie.js"></script>
<script type="text/javascript" src="{{ asset('frontend/') }}/js/custom.js"></script> 
<script type="text/javascript" src="{{ asset('frontend/') }}/js/cart.js"></script> 
</body>
</html>
