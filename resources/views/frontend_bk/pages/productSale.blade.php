@extends('layouts.frontend')
@section('title', (!empty($detailCate)) ? $detailCate->name : 'Danh muc san pham')
@section('keywords', (!empty($detailCate)) ? $detailCate->keywords : 'Keywords')
@section('description', (!empty($detailCate)) ? $detailCate->description : 'description')
@section('og-title', (!empty($detailCate)) ? $detailCate->name : 'Danh muc san pham')
@section('og-image', (!empty($detailCate)) ? $detailCate->keywords : 'Keywords')
@section('og-url', (!empty($detailCate)) ? $detailCate->description : 'description')
@section('og-site_name', (!empty($detailCate)) ? $detailCate->name : 'Danh muc san pham')
@section('od-description', (!empty($detailCate)) ? $detailCate->keywords : 'Keywords')
@section('twitter-title', (!empty($detailCate)) ? $detailCate->description : 'description')
@section('twitter-image', (!empty($detailCate)) ? $detailCate->description : 'description')
@section('twitter-url', (!empty($detailCate)) ? $detailCate->name : 'Danh muc san pham')
@section('twitter-card', (!empty($detailCate)) ? $detailCate->keywords : 'Keywords')

@section('content')

<section class="row-fluid">
<div class="heading-bar">
<h2>Grid View</h2>
<span class="h-line"></span>
</div>
 
<section class="span9 first">
 
<div class="product_sort">
<div class="row-1">
<div class="left">
<span class="s-title">Sort by</span>
<span class="list-nav">
<select name="">
<option>Position</option>
<option>Position 2</option>
<option>Position 3</option>
<option>Position 4</option>
</select>
</span>
</div>
<div class="right">
<span>Show</span>
<span>
<select name="">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
</select>
</span>
<span>per page</span>
</div>
</div>
</div>
<section class="grid-holder features-books">
@foreach ($listProduct as $k => $e)
	<figure class="span4 slide">
	<a href="{{ url('chi-tiet-san-pham/' . $e->slug . '-' . $e->pid) }}"><img src="{{ $e->images }}" alt="{{ $e->altImage }}" class="pro-img"/></a>
	<span class="title"><a href="{{ url('chi-tiet-san-pham/' . $e->slug . '-' . $e->pid) }}">{{ $e->name }}</a></span>
	<span class="rating-bar"></span>
	<div class="cart-price">
	<a class="cart-btn2" href="cart.html">Add to Cart</a>
	<span class="price">{{ $e->price }}</span>
	</div>
	</figure>
	@if (($k+1) % 3 == 0)
		<hr>
	@endif
@endforeach


</section>
<div class="blog-footer">
<div class="pagination">
<ul>
@php
$prefix = (!isset($_GET['page']) || $_GET['page'] != 1) ? '?page=' : '&page=';
@endphp
@if($listProduct->currentPage() != 1)
<li>
<a href="{!! str_replace('/?', '?', $listProduct->url($listProduct->currentPage() - 1)) !!}">Truoc</a>
</li>
@endif
@for($i=1; $i <= $listProduct->lastPage(); $i++)
<li class="{!! ($listProduct->currentPage() == $i) ? 'active' : '' !!}">
<a href="{{ url($url . $prefix . $i) }}">{!! $i !!}</a>
</li>
@endfor
@if($listProduct->currentPage() != $listProduct->lastPage())
<li><a href="{!! str_replace('/?', '?', $listProduct->url($listProduct->currentPage() + 1)) !!}">Sau</a></li>
@endif
</ul>
</div>
</div>
 
</section>
 
 
<section class="span3">

@include('frontend.blocks.sidebar')
 
</section>
 
</section>

@endsection