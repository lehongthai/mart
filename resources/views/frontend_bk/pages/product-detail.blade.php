@extends('layouts.frontend')
@section('title')
@section('keywords')
@section('descriptions')

@section('content')

<section class="row-fluid">
<div class="heading-bar">
<h2>{{ $detailProduct->name }}</h2>
<span class="h-line"></span>
</div>
 
<section class="span9 first">
 

 
 
<section class="b-detail-holder">
<article class="title-holder">

</article>
<div class="book-i-caption">
 
<div class="span6 b-img-holder">
<span class='zoom' id='ex1'> <img src='{{ $detailProduct->images }}' height="219" width="300" id='jack' alt='{{ $detailProduct->altImage }}'/></span>
</div>
 
 
<div class="span6">
<strong class="title">Quick Overview</strong>
<p>{{ $detailProduct->desc }}</p>
<p>Availability: <a href="#">In stock</a></p>
<div class="comm-nav">
<strong class="title2">Quantity</strong>
<ul>
<li><input name="quantity" type="text" class="qtyti" value="" /></li>
<li class="b-price">{{ $detailProduct->price }}</li>
<li><a href="javascript:void(0)" class="more-btn buy_cart" id="{{ $detailProduct->product_id }}">+ Add to Cart</a></li>
</ul>
<a href="#">Add to Wishlist</a>
</div>
</div>
 
</div>
 
<div class="tabbable">
<ul class="nav nav-tabs">
<li class="active"><a href="#pane1" data-toggle="tab">Book Summary</a></li>
</ul>
<div class="tab-content">
<div id="pane1" class="tab-pane active">
{!! $detailProduct->content !!}
</div>
</div> 
</div> 
 
 
@if (!empty($productRelated))

<section class="related-book">
<div class="heading-bar">
<h2>Related Product</h2>
<span class="h-line"></span>
</div>
<div class="slider6">
@foreach ($productRelated as $e)
	<div class="slide">
<a href="{{ url('chi-tiet-san-pham/' . $e->slug . '-' . $e->pid) }}"><img src="{{ $e->images }}" alt="{{ $e->altImage }}" class="pro-img"/></a>
<span class="title"><a href="{{ url('chi-tiet-san-pham/' . $e->slug . '-' . $e->pid) }}">A Walk Across The Sun</a></span>
<span class="rating-bar"></span>
<div class="cart-price">
<a class="cart-btn2 buy_cart" href="javascript:void(0)">Add to Cart</a>
<span class="price">{{ $e->price }}</span>
</div>
</div>
@endforeach


</div>
</section>

@endif
 
 
</section>
 
</section>
 
 
<section class="span3">

@include('frontend.blocks.sidebar')
 
</section>
 
</section>

@endsection