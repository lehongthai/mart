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
							<span>{{ trans('app.ProductAll') }}: {{ (isset($detailCate)) ? $detailCate->name : '' }}</span>
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
										<a href="{{ url('san-pham/' . $e->slug . '-' . $e->cid) }}">{{ $e->name }}</a>
									</li>
								@endforeach
								</ul>
							</div>
							<!-- SINGLE SIDEBAR CATEGORIES END -->
						@endif
						</div>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
						<!-- ALL GATEGORY-PRODUCT START -->
						<div class="all-gategory-product">
							<div class="row">
								<ul class="gategory-product">
									<!-- SINGLE ITEM START -->
									@foreach ($listProduct as $k => $e)
									<li class="cat-product-list">
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
											<div class="single-product-item">
												<div class="product-image">
													<a href="{{ url('chi-tiet-san-pham/' . $e->slug . '-' . $e->pid) }}"><img src="{{ $e->images }}" alt="{{ $e->altImage }}" /></a>
													@if ($e->status == 5)
														<a class="new-mark-box">{{ trans('app.New') }}</a>
													@elseif($e->status == 4)
														<a class="new-mark-box">{{ trans('app.Sale') }}</a>
													@endif
													
												</div>
											</div>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
											<div class="list-view-content">
												<div class="single-product-item">
													<div class="product-info">
														<div class="customar-comments-box">
															<a href="{{ url('chi-tiet-san-pham/' . $e->slug . '-' . $e->pid) }}">{{ $e->name }}</a>
														</div>
														<div class="product-datails">
															<p>{{ $e->desc }}</p>
														</div>
														<div class="price-box">
															<span class="price">{{ number_format($e->price,0,',','.') }} VNĐ</span>
														</div>
													</div>
													<div class="overlay-content-list">
														<ul>
															<li><a id="{{ $e->pid }}" href="javascript:void(0)" title="Add to cart" class="add-cart-text buy_cart">{{ trans('app.AddToCart') }}</a></li>
											
														</ul>
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
									$prefix = ((!isset($_GET['page']) || $_GET['page'] == 1) && !isset($_GET['product'])) ? '?page=' : '&page=';
									@endphp
									@if($listProduct->currentPage() != 1)
									<li>
									<a href="{!! str_replace('/?', '?', $listProduct->url($listProduct->currentPage() - 1)) !!}">Truoc</a>
									</li>
									@endif
									@for($i=1; $i <= $listProduct->lastPage(); $i++)
									<li class="{!! ($listProduct->currentPage() == $i) ? 'active' : '' !!}">
									<a href="{{ url($url . $prefix . $i) }}">{{ $i }}</a>
									</li>
									@endfor
									@if($listProduct->currentPage() != $listProduct->lastPage())
									<li>
										<a href="{!! str_replace('/?', '?', $listProduct->url($listProduct->currentPage() + 1)) !!}">Sau</a></li>
									@endif
									</ul>
								</div>
						<!-- PRODUCT-SHOOTING-RESULT END -->
					</div>
				</div>
			</div>

@endsection