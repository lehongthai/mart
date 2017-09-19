@extends('layouts.frontend')

@include('frontend.blocks.meta')

@section('content')
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-59bca114f055dfa1"></script> 
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<!-- BSTORE-BREADCRUMB START -->
			<div class="bstore-breadcrumb">
				<a href="{{ url('') }}">{{ trans('app.Home') }}<span><i class="fa fa-caret-right"></i> </span> </a>
				<span> <i class="fa fa-caret-right"> </i> </span>
				<span>{{ $detailProduct->name }}</span>
			</div>
			<!-- BSTORE-BREADCRUMB END -->
		</div>
	</div>				
	<div class="row">
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			<!-- SINGLE-PRODUCT-DESCRIPTION START -->
			<div class="row">
				<div class="col-lg-5 col-md-5 col-sm-4 col-xs-12">
					<div class="single-product-view">
						  <!-- Tab panes -->
						<div class="tab-content">
							<div class="tab-pane active" id="thumbnail_1">
								<div class="single-product-image">
									<img src="{{ $detailProduct->images }}" alt="{{ $detailProduct->altImage }}" />
									@if ($detailProduct->status == 5)
										<a class="new-mark-box">{{ trans('app.New') }}</a>
									@elseif($detailProduct->status == 4)
										<a class="new-mark-box">{{ trans('app.Sale') }}</a>
									@endif
									
									<a class="fancybox" href="{{ $detailProduct->images }}" data-fancybox-group="gallery"><span class="btn large-btn">{{ trans('app.ViewLarger') }}<i class="fa fa-search-plus"></i></span></a>
								</div>	
							</div>
							@if ($detailProduct->mutilImage != null)
							@foreach ($detailProduct->mutilImage as $k => $e)
								<div class="tab-pane" id="thumbnail_{{ $k + 2 }}">
								<div class="single-product-image">
									<img src="{{ $e->image }}" alt="{{ $detailProduct->name }}" />
									@if ($detailProduct->status == 5)
										<a class="new-mark-box">{{ trans('app.New') }}</a>
									@elseif($detailProduct->status == 4)
										<a class="new-mark-box">{{ trans('app.Sale') }}</a>
									@endif
									<a class="fancybox" href="{{ $e->image }}" data-fancybox-group="gallery"><span class="btn large-btn">{{ trans('app.ViewLarger') }} <i class="fa fa-search-plus"></i></span></a>
								</div>	
							</div>
							@endforeach
							@endif

						</div>										
					</div>
					<div class="select-product">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs select-product-tab bxslider">
							<li class="active">
								<a href="#thumbnail_1" data-toggle="tab"><img src="{{ $detailProduct->images }}" alt="{{ $detailProduct->altImage }}" /></a>
							</li>
							@if ($detailProduct->mutilImage != null)
							@foreach ($detailProduct->mutilImage as $k => $e)
							<li>
								<a href="#thumbnail_{{ $k + 2 }}" data-toggle="tab"><img src="{{ url($e->image_thumb) }}" alt="{{ $detailProduct->name }}" /></a>
							</li>
							@endforeach
							@endif
						</ul>										
					</div>
				</div>
				<div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">
								<div class="single-product-descirption">
									<h2>{{ $detailProduct->name }}</h2>
									<div class="single-product-social-share">
										<!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>
									</div>
									<div class="single-product-price">
										<h2>{{ number_format($detailProduct->price,0,',','.') }} VNĐ</h2>
									</div>
									<div class="single-product-desc">
										<p>{{ $detailProduct->desc }}</p>
									</div>
									<div class="single-product-quantity">
										<p class="small-title">{{ trans('app.Quantity') }}</p> 
										<div class="cart-quantity">
											<div class="cart-plus-minus-button single-qty-btn">
												<input class="cart-plus-minus sing-pro-qty qtyti" type="text" name="qtybutton" value="1">
											</div>
										</div>
									</div>
									<div class="single-product-add-cart">
										<a class="add-cart-text buy_cart" title="Add to cart" href="javascript:void()" id="{{ $detailProduct->product_id }}">{{ trans('app.AddToCart') }}</a>
									</div>
								</div>
							</div>
			</div>
			<!-- SINGLE-PRODUCT-DESCRIPTION END -->
			<!-- SINGLE-PRODUCT INFO TAB START -->
			<div class="row">
				<div class="col-sm-12">
					<div class="product-more-info-tab">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs more-info-tab">
							<li class="active"><a href="#moreinfo" data-toggle="tab">{{ trans('app.MoreInfo') }}</a></li>
						</ul>
						  <!-- Tab panes -->
						<div class="tab-content">
							<div class="tab-pane active" id="moreinfo">
								<div class="tab-description">
									{!! $detailProduct->content !!}
								</div>
							</div>
						</div>									
					</div>
				</div>
			</div>
			<!-- SINGLE-PRODUCT INFO TAB END -->
			<!-- RELATED-PRODUCTS-AREA START -->
			<div class="row">
			@if (!empty($productRelated))
				<div class="col-sm-12">
					<div class="left-title-area">
						<h2 class="left-title">{{ trans('app.RelatedProducts') }}</h2>
					</div>	
				</div>
				<div class="related-product-area featured-products-area">
					<div class="col-sm-12">
						<div class=" row">
							<!-- RELATED-CAROUSEL START -->
							<div class="related-product">
								<!-- SINGLE-PRODUCT-ITEM START -->
								@foreach ($productRelated as $e)
												<div class="item">
												<div class="new-product">
													<div class="single-product-item">
														<div class="product-image">
															<a href="{{ url('chi-tiet-san-pham/' . $e->slug . '-' . $e->pid) }}"><img src="{{ $e->images }}" alt="{{ $e->altImage }}" /></a>
															<a class="new-mark-box">{{ trans('app.New') }}</a>
															<div class="overlay-content">
																<ul>
																	<li><a class="buy_cart" id="{{ $e->pid }}" href="javascript:void(0)"><i class="fa fa-shopping-cart"></i></a></li>
																</ul>
															</div>
														</div>
														<div class="product-info">
															<a href="{{ url('chi-tiet-san-pham/' . $e->slug . '-' . $e->pid) }}"><br><h3>{{ $e->name }}</h3></a>
															<div class="price-box">
																<span class="price">{{ $e->price }}</span>
															</div>
														</div>
													</div>
												</div>
											</div>
											@endforeach
								<!-- SINGLE-PRODUCT-ITEM END -->							
							</div>
							<!-- RELATED-CAROUSEL END -->
						</div>	
					</div>
				</div>
				@endif	
			</div>
			<!-- RELATED-PRODUCTS-AREA END -->
		</div>
		<!-- RIGHT SIDE BAR START -->
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<!-- SINGLE SIDE BAR START -->
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
			<!-- SINGLE SIDE BAR END -->
		</div>
		<!-- SINGLE SIDE BAR END -->				
	</div>
</div>

@endsection