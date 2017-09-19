@extends('layouts.frontend')
@section('title', (!empty($seoWebsite)) ? $seoWebsite['title'] : 'Danh muc san pham')
@section('keywords', (!empty($seoWebsite)) ? $seoWebsite['keywords'] : 'Keywords')
@section('description', (!empty($seoWebsite)) ? $seoWebsite['description'] : 'description')
@section('og-title', (!empty($seoWebsite)) ? $seoWebsite['og-title'] : 'Danh muc san pham')
@section('og-image', (!empty($seoWebsite)) ? $seoWebsite['og-image'] : 'og-image')
@section('og-url', route('home.contact'))
@section('og-site_name', (!empty($seoWebsite)) ? $seoWebsite['og-site_name'] : 'og-site_name')
@section('od-description', (!empty($seoWebsite)) ? $seoWebsite['od-description'] : 'od-description')
@section('twitter-title', (!empty($seoWebsite)) ? $seoWebsite['twitter-title'] : 'twitter-title')
@section('twitter-image', (!empty($seoWebsite)) ? $seoWebsite['twitter-image'] : 'twitter-image')
@section('twitter-url', route('home.contact'))
@section('twitter-card', (!empty($seoWebsite)) ? $seoWebsite['twitter-card'] : 'twitter-card')

@section('content')

@include('frontend.blocks.slider')

<section class="row-fluid ">
@if (!empty($listProductSale))
@foreach ($listProductSale as $e)
	
	<figure class="span4 s-product">
		<div class="s-product-img">
			<a href="{{ url('chi-tiet-san-pham/' . $e->slug . '-' . $e->pid) }}"><img src="{{ $e->images }}" alt="{{ $e->altImage }}"/>
			</a>
		</div>
		<article class="s-product-det">
			<h3>
				<a href="{{ url('chi-tiet-san-pham/' . $e->slug . '-' . $e->pid) }}">{{ $e->name }}
				</a>
			</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod dolore magna aliqua.</p>
			<span class="rating-bar"></span>
			<div class="cart-price"> 
				<a href="javascript:void(0)" id="{{ $e->pid }}" class="cart-btn2 buy_cart">Add to Cart</a> 
				<span class="price">{{ $e->price }}</span> 
			</div>
			<span class="sale-icon">Sale</span> 
		</article>
	</figure>

@endforeach
@endif

</section>
 
<section class="row-fluid features-books">
<section class="span12 m-bottom">
<div class="heading-bar">
<h2>Featured Books</h2>
<span class="h-line"></span> </div>
<div class="slider1">
@if (!empty($listProduct))
	@foreach ($listProduct as $e)
		<div class="slide"><a href="{{ url('chi-tiet-san-pham/' . $e->slug . '-' . $e->pid) }}"><img src="{{ $e->images }}" alt="{{ $e->altImage }}" class="pro-img"/></a> <span class="title"><a href="{{ url('chi-tiet-san-pham/') . $e->slug . '-' . $e->pid }}">{{ $e->name }}</a></span> <span class="rating-bar"></span>
<div class="cart-price"> <a class="cart-btn2 buy_cart" id="{{ $e->pid }}" href="javascript:void(0)">Add to Cart</a> <span class="price">{{ $e->price }}</span> </div>
</div>
	@endforeach
@endif

</div>
</section>
</section>
 
 
<section class="row-fluid m-bottom">
<section class="span9">
<div class="featured-author">
<div class="left"> <span class="author-img-holder"><a href="about-us.html"><img src="{{ url('frontend/images') }}/image16.jpg" alt=""/></a></span>
<div class="author-det-box">
<div class="ico-holder">
<div id="socialicons" class="hidden-phone"> <a id="social_linkedin" class="social_active" href="#" title="Visit Google Plus page"><span></span></a> <a id="social_facebook" class="social_active" href="#" title="Visit Facebook page"><span></span></a> <a id="social_twitter" class="social_active" href="#" title="Visit Twitter page"><span></span></a> </div>
</div>
<div class="author-det"> <span class="title">Featured Author</span> <span class="title2">Mr. Khalid Hosseini</span>
<ul class="books-list">
<li><a href="book-detail.html"><img src="{{ url('frontend/images') }}/image11.jpg" alt=""/></a></li>
<li><a href="book-detail.html"><img src="{{ url('frontend/images') }}/image12.jpg" alt=""/></a></li>
<li><a href="book-detail.html"><img src="{{ url('frontend/images') }}/image13.jpg" alt=""/></a></li>
<li><a href="book-detail.html"><img src="{{ url('frontend/images') }}/image14.jpg" alt=""/></a></li>
</ul>
</div>
</div>
</div>
<div class="right">
<div class="current-book"> <strong class="title"><a href="book-detail.html">The Kite Runner</a></strong>
<p>Lorem ipsum dolor slo nsec tueraliquet rbi nec In nisl lorem in ...</p>
<div class="cart-price"> <a href="cart.html" class="cart-btn2">Add to Cart</a> <span class="price">$129.90</span> </div>
</div>
<div class="c-b-img"> <a href="book-detail.html"><img src="{{ url('frontend/images') }}/image17.jpg" alt=""/></a> </div>
</div>
</div>
</section>
<section class="span3 best-sellers">
<div class="heading-bar">
<h2>Best New</h2>
<span class="h-line"></span> </div>
<div class="slider2">
@if (!empty($listProductNew))
	@foreach ($listProductNew as $e)
		<div class="slide"><a href="{{ url('chi-tiet-san-pham/' . $e->slug . '-' . $e->pid) }}"><img src="{{ $e->images }}" alt="{{ $e->altImage }}"/></a>
		<div class="slide2-caption">
		<div class="left"> <span class="title"><a href="{{ url('chi-tiet-san-pham/' . $e->slug . '-' . $e->pid) }}">{{ $e->name }}</a></span> <span class="author-name">by Khalid Housseini</span> </div>
		<div class="right"> <span class="price">{{ $e->price }}</span> <span class="rating-bar"></span> </div>
		</div>
		</div>
	@endforeach
@endif

</div>
</section>
</section>
 
<section class="row-fluid m-bottom">
 
<section class="span9 blog-section">
<div class="heading-bar">
<h2>Latest from the Blog</h2>
<span class="h-line"></span> </div>
<div class="slider3">
@if (!empty($listPost))
	@foreach ($listPost as $e)
		<div class="slide">
			<div class="post-img"><a href="{{ url('thong-tin-chi-tiet/' . $e->slug . '-' . $e->pid) }}"><img src="{{ $e->images }}" alt="{{ $e->altImage }}"/></a> 
			<span class="post-date">
				@php
					$date = date_create($e->created_at);
                    echo str_replace_last('-', '<span></span>', date_format($date, 'd-m-Y'));
				@endphp
			</span> </div>
			<div class="post-det">
			<h3><a href="{{ url('thong-tin-chi-tiet/' . $e->slug . '-' . $e->pid) }}">{{ $e->name }}</a></h3>
			<p>{{ $e->desc }} </p>
			</div>
			</div>
	@endforeach
@endif

</div>
</section>
 
 
<section class="span3 testimonials">
<div class="heading-bar">
<h2>Testimonials</h2>
<span class="h-line"></span> </div>
<div class="slider4">
<div class="slide">
<div class="author-name-holder"> <img src="{{ url('frontend/images') }}/image19.png"/> </div>
<strong class="title">Robert Smith <span>Manager</span></strong>
<div class="slide">
<p>Lorem ipsum dolor slo onsec nelioro tueraliquet Morbi nec In Curabitur lorem in design Morbi nec In Curabituritus gojus, </p>
</div>
</div>
<div class="slide">
<div class="author-name-holder"> <img src="{{ url('frontend/images') }}/image19.png"/> </div>
<strong class="title">Mr. Khalid Hosseini <span>Manager</span></strong>
<div class="slide">
<p>Gluten-free quinoa selfies carles, kogi gentrify retro marfa viral. Aesthetic before they sold out put a bird on it sriracha typewriter. Skateboard viral irony tonx ... </p>
</div>
</div>
</div>
</section>
 
</section>
@endsection