@extends('layouts.frontend')

@include('frontend.blocks.meta')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<!-- BSTORE-BREADCRUMB START -->
			<div class="bstore-breadcrumb">
				<a href="{{ url('') }}">{{ trans('app.Home') }}</a>
				<span><i class="fa fa-caret-right	"></i></span>
				<span>{{ trans('app.About') }}</span>
			</div>
			<!-- BSTORE-BREADCRUMB END -->
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h2 class="page-title about-page-title">{{ $setting->name }}</h2>
		</div>		
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<!-- SINGLE-ABOUT-INFO START -->
			<div class="single-about-info">
				<div class="our-company">
					<strong>{{ $setting->desc }}.</strong>
				</div>
			</div>
			<!-- SINGLE-ABOUT-INFO END -->
		</div>
		<div>
			{!! $setting->content !!}
		</div>
	</div>
</div>

@endsection