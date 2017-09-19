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
							<span>{{ trans('app.BlogAll') }}</span>
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
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
						<!-- ALL GATEGORY-PRODUCT START -->
						<div class="all-gategory-product">
							<div class="row">
								<ul class="gategory-product">
									<!-- SINGLE ITEM START -->
									@foreach ($listPost as $e)
									<li class="cat-product-list">
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
											<div class="single-product-item">
												<div class="product-image">
													<a href="{{ url('thong-tin-chi-tiet/' . $e->slug . '-' . $e->pid) }}"><img src="{{ $e->images }}" alt="{{ $e->altImage }}" /></a>
													<a class="new-mark-box">@php
														$date = date_create($e->created_at);
											        	echo date_format($date, 'd-m-Y');
													@endphp</a>
												</div>
											</div>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
											<div class="list-view-content">
												<div class="single-product-item">
													<div class="product-info">
														<div class="product-datails">
															<p>{{ $e->desc }}</p>
														</div>
														<div class="price-box">
														<a href="{{ url('thong-tin-chi-tiet/' . $e->slug . '-' . $e->pid) }}">
															<span class="price">{{ trans('app.ReadMore') }}</span>
														</a>
														</div>
													</div>											
												</div>														
											</div>
										</div>
									</li>
									@endforeach
									<!-- SINGLE ITEM END -->									
								</ul>
							</div>
						</div>
						<!-- ALL GATEGORY-PRODUCT END -->
						<!-- PRODUCT-SHOOTING-RESULT START -->
								<div class="pull-right">
									<ul class="pagination">
									@php
									$prefix = (!isset($_GET['page']) || $_GET['page'] == 1) ? '?page=' : '&page=';
									@endphp
									@if($listPost->currentPage() != 1)
									<li>
									<a href="{!! str_replace('/?', '?', $listPost->url($listPost->currentPage() - 1)) !!}">Prev</a>
									</li>
									@endif
									@for($i=1; $i <= $listPost->lastPage(); $i++)
									<li class="{!! ($listPost->currentPage() == $i) ? 'active' : '' !!}">
									<a href="{{ url($url . $prefix . $i) }}">{!! $i !!}</a>
									</li>
									@endfor
									@if($listPost->currentPage() != $listPost->lastPage())
									<li><a href="{!! str_replace('/?', '?', $listPost->url($listPost->currentPage() + 1)) !!}">Next</a></li>
									@endif
									</ul>
									</div>
						<!-- PRODUCT-SHOOTING-RESULT END -->
					</div>
				</div>
			</div>

@endsection