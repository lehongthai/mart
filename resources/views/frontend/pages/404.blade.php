@extends('layouts.frontend')

@include('frontend.blocks.meta')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<!-- BSTORE-BREADCRUMB START -->
			<div class="bstore-breadcrumb">
				<a href="{{ url('') }}">{{ trans('app.Home') }}<span><i class="fa fa-caret-right"></i> </span> </a>
				<span> <i class="fa fa-caret-right"> </i> </span>
				<span>404 not found</span>
			</div>
			<!-- BSTORE-BREADCRUMB END -->
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<!-- PRODUCT-LEFT-SIDEBAR START -->
			<div class="product-left-sidebar">
				@if (!empty($listCategory))
				<h2 class="left-title pro-g-page-title">Catalog</h2>
				<!-- SINGLE SIDEBAR ENABLED FILTERS END -->
				<!-- SINGLE SIDEBAR CATEGORIES START -->
				<div class="product-single-sidebar">
					<span class="sidebar-title">{{ trans('app.Categories') }}</span>
					<ul>
					@foreach ($listCategory as $e)
						<li>
							<a href="{{ url('bai-viet/' . $e->slug . '-' . $e->id) }}">{{ $e->name }}</a>
						</li>
					@endforeach
					</ul>
				</div>
				<!-- SINGLE SIDEBAR CATEGORIES END -->
			@endif
			</div>
			<!-- PRODUCT-LEFT-SIDEBAR END -->
		</div>
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 text-center">
			<div class="thumbnail">
				<img data-src="" alt="">
				<div class="caption">
					<h1>Oops!</h1>

					<h3>404 Not Found</h3>
					<p>
						Sorry, an error has occured, Requested page not found!
					</p>
					<p>
						<a href="{{ url('') }}" class="btn btn-primary">{{ trans('app.Home') }}</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection