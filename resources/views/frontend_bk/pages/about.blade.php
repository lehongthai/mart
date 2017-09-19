@extends('layouts.frontend')
@section('title', (!empty($about)) ? $about->name : 'Danh muc san pham')
@section('keywords', (!empty($about)) ? $about->keywords : 'Keywords')
@section('description', (!empty($about)) ? $about->description : 'description')
@section('og-title', (!empty($about)) ? $about->name : 'Danh muc san pham')
@section('og-image', (!empty($about)) ? $about->keywords : 'Keywords')
@section('og-url', (!empty($about)) ? $about->description : 'description')
@section('og-site_name', (!empty($about)) ? $about->name : 'Danh muc san pham')
@section('od-description', (!empty($about)) ? $about->keywords : 'Keywords')
@section('twitter-title', (!empty($about)) ? $about->description : 'description')
@section('twitter-image', (!empty($about)) ? $about->description : 'description')
@section('twitter-url', (!empty($about)) ? $about->name : 'Danh muc san pham')
@section('twitter-card', (!empty($about)) ? $about->keywords : 'Keywords')

@section('content')

<section class="row-fluid">
<div class="heading-bar">
<h2>About Us</h2>
<span class="h-line"></span>
</div>
 
<section class="span9 first">
 
<section class="content-holder">
<h1>{{ $setting->name }}</h1>
<br>
<h2>{{ $setting->desc }}</h2>
<br>

{!! $setting->content !!}

</section>
 
</section>
 
 
<section class="span3">
<div class="side-holder">
<article class="banner-ad"><img src="{{ url('frontend/images') }}/image20.jpg" alt="Banner Ad"/></article>
</div>
 
<div class="side-holder">
<article class="shop-by-list">
<h2>Shop by</h2>
<div class="side-inner-holder">
<strong class="title">Category</strong>
<ul class="side-list">
@foreach ($listCategory as $e)
	<li><a href="{{ url('bai-viet/' . $e->slug . '-' . $e->cid) }}">{{ $e->name }}</a></li>
@endforeach
</ul>
<strong class="title">Author</strong>
<ul class="side-list">
<li><a href="#">Khalid Hoessini (9)</a></li>
<li><a href="#">William Blake (2)</a></li>
<li><a href="#">Anna Kathrinena (1)</a></li>
<li><a href="#">Gray Alvin (3)</a></li>
</ul>
</div>
</article>
</div>
 
 
<div class="side-holder">
<article class="l-reviews">
<h2>Latest Reviews</h2>
<div class="side-inner-holder">
<article class="r-post">
<div class="r-img-title">
<img src="{{ url('frontend/images') }}/image21.jpg"/>
<div class="r-det-holder">
<strong class="r-author"><a href="#">The Kite Runner</a></strong>
<span class="r-by">by Khalid Hoessini</span>
<span class="rating-bar"><img src="{{ url('frontend/images') }}/rating-star.png" alt="Rating Star"/></span>
</div>
</div>
<span class="r-type">Vivamus bibendum massa</span>
<p>“ Suspendisse tortor lacus, suscipit eget pharetra sed, ornare sed elit. Curabitur mollis, justo sit amet fermentum ” </p>
<span class="r-author">Review by BookShoppe’</span>
</article>
<article class="r-post">
<div class="r-img-title">
<img src="{{ url('frontend/images') }}/image21.jpg"/>
<div class="r-det-holder">
<strong class="r-author"><a href="#">The Kite Runner</a></strong>
<span class="r-by">by Khalid Hoessini</span>
<span class="rating-bar"><img src="{{ url('frontend/images') }}/rating-star.png" alt="Rating Star"/></span>
</div>
</div>
<span class="r-type">Vivamus bibendum massa</span>
<p>“ Suspendisse tortor lacus, suscipit eget pharetra sed, ornare sed elit. Curabitur mollis, justo sit amet fermentum ” </p>
<span class="r-author">Review by BookShoppe’</span>
</article>
</div>
</article>
</div>
 
</section>
 
</section>

@endsection