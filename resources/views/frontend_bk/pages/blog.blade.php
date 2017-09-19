@extends('layouts.frontend')
@section('title')
@section('keywords')
@section('descriptions')

@section('content')

<section class="row-fluid">
<div class="heading-bar">
<h2>Blog</h2>
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

 @foreach ($listPost as $e)
 	<article class="b-post">
	<h3>Demo post title</h3>
	<div class="b-post-img">
	<img src="{{ $e->images }}" alt="{{ $e->altImage }}"/>
	</div>
	<p>{{ $e->desc }}</p>
	<div class="b-post-bottom">
	<ul class="post-nav">
	<li>Posted by <a href="#">Admin </a></li>

	<li>
		@php
			$date = date_create($e->created_at);
        	echo date_format($date, 'd-m-Y');
		@endphp
	</li>
	</ul>
	<a href="{{ url('thong-tin-chi-tiet/' . $e->slug . '-' . $e->pid) }}" class="more-btn">Read More</a>
	</div>
	</article>
 @endforeach
 
 
<div class="blog-footer">
<div class="pagination">
<ul>
@php
$prefix = (!isset($_GET['page']) || $_GET['page'] != 1) ? '?page=' : '&page=';
@endphp
@if($listPost->currentPage() != 1)
<li>
<a href="{!! str_replace('/?', '?', $listPost->url($listPost->currentPage() - 1)) !!}">Truoc</a>
</li>
@endif
@for($i=1; $i <= $listPost->lastPage(); $i++)
<li class="{!! ($listPost->currentPage() == $i) ? 'active' : '' !!}">
<a href="{{ url($url . $prefix . $i) }}">{!! $i !!}</a>
</li>
@endfor
@if($listPost->currentPage() != $listPost->lastPage())
<li><a href="{!! str_replace('/?', '?', $listPost->url($listPost->currentPage() + 1)) !!}">Sau</a></li>
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