@extends('layouts.frontend')

@include('frontend.blocks.meta')

@section('content')

<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BSTORE-BREADCRUMB START -->
						<div class="bstore-breadcrumb">
							<a href="{{ url('') }}">{{ trans('app.Home') }}</a>
							<span><i class="fa fa-caret-right"></i></span>
							<span>{{ $detailPost->name }}</span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>
				<div class="row">

					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
						<h1>{{ $detailPost->name }}</h1>
						<hr>
						<h2 class="page-title about-page-title">{{ $detailPost->desc }}</h2>
						{!! $detailPost->content !!}
					</div>		
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="single-product-right-sidebar">
						@if (!empty($listPost))
							<h2 class="left-title">{{ trans('app.RelatedBlog') }}</h2>
							<ul>
							@foreach ($listPost as $e)
							@if ($e->pid != $detailPost->common_id)
								<li>
								<div class="r-sidebar-pro-content">
										<h5><a href="{{ url('thong-tin-chi-tiet/' . $e->slug . '-' . $e->pid) }}">{{ $e->name }}</a></h5>
										<p>{{ $e->desc }}</p>
									</div>
									<a href="{{ url('thong-tin-chi-tiet/' . $e->slug . '-' . $e->pid) }}"><img src="{{ $e->images }}" alt="{{ $e->altImage }}" /></a>
									
								</li>
							@endif
								
							@endforeach
								
							</ul>
						@endif
							
						</div>
					</div>
				</div>
			</div>

@endsection