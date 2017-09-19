@extends('layouts.frontend')
@section('title', (!empty($detailPost)) ? $detailPost->name : 'Danh muc san pham')
@section('keywords', (!empty($detailPost)) ? $detailPost->keywords : 'Keywords')
@section('description', (!empty($detailPost)) ? $detailPost->description : 'description')
@section('og-title', (!empty($detailPost)) ? $detailPost->name : 'Danh muc san pham')
@section('og-image', (!empty($detailPost)) ? $detailPost->images : 'images')
@section('og-url', (!empty($detailPost)) ? $detailPost->description : 'description')
@section('og-site_name', (!empty($detailPost)) ? $detailPost->name : 'Danh muc san pham')
@section('od-description', (!empty($detailPost)) ? $detailPost->keywords : 'Keywords')
@section('twitter-title', (!empty($detailPost)) ? $detailPost->description : 'description')
@section('twitter-image', (!empty($detailPost)) ? $detailPost->images : 'description')
@section('twitter-url', (!empty($detailPost)) ? $detailPost->name : 'Danh muc san pham')
@section('twitter-card', (!empty($detailPost)) ? $detailPost->keywords : 'Keywords')

@section('content')

<section class="row-fluid">
<div class="heading-bar">
<h2>Blog</h2>
<span class="h-line"></span>
</div>
 
<section class="span9 first">
 
<article class="b-post blog-detail">
<h1>{{ $detailPost->name }}</h1>
<div class="b-post-bottom">
<ul class="post-nav">
<li>Posted by <a href="#">Admin </a></li>
<li>
	@php
		$date = date_create($detailPost->created_at);
    	echo date_format($date, 'd-m-Y');
	@endphp
</li>
</ul>
</div>
<strong><h2>{{ $detailPost->desc }}</h2></strong>
<br>
{!! $detailPost->content !!}
</article>

</section>
 
 
<section class="span3">

@include('frontend.blocks.sidebar')
 
</section>
 
</section>

@endsection