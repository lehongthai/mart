@extends('layouts.frontend')

@include('frontend.blocks.meta')

@section('content')

<div class="container">
				<div class="row">
					<!-- MAIN-SLIDER-AREA START -->
					<div class="main-slider-area">
						<!-- SLIDER-AREA START -->
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
							<div class="slider-area">
								<div id="wrapper">
								@if (!empty($listSlider))
									<div class="slider-wrapper">
										<div id="mainSlider" class="nivoSlider">
										@foreach ($listSlider as $s)
											<img src="{{ $s->images }}" alt="{{ $s->name }}" title="#htmlcaption{{ $s->id }}"/>
										@endforeach
										</div>
										@foreach ($listSlider as $s)
										<div id="htmlcaption{{ $s->id }}" class="nivo-html-caption slider-caption">
											<div class="slider-progress"></div>
											<div class="slider-cap-text slider-text1">
												<div class="d-table-cell">
													<h2 class="animated bounceInDown">{{ $s->name }}</h2>
													<p class="animated bounceInUp">{{ $s->desc }}</p>	
													<a class="wow zoomInDown" data-wow-duration="1s" data-wow-delay="1s" href="{{ url('thong-tin/' . $s->slug . '-' . $s->id) }}">{{ trans('app.ReadMore') }} <i class="fa fa-caret-right"></i></a>													
												</div>
											</div>
										</div>
										@endforeach
									</div>
								@endif
									
								</div>								
							</div>							
						</div>
						<!-- SLIDER-AREA END -->
						<!-- SLIDER-RIGHT START -->
						@if ($listBlock['sliderLeft'] != null)
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
							<div class="slider-right zoom-img m-top">
								<a href="{{ url('thong-tin/' . $listBlock['sliderLeft']->slug . '-' . $listBlock['sliderLeft']->id) }}"><img class="img-responsive" src="{{ $listBlock['sliderLeft']->images }}" alt="{{ $listBlock['sliderLeft']->name }}" /></a>
							</div>
						</div>
						@endif
						
						<!-- SLIDER-RIGHT END -->
					</div>
					<!-- MAIN-SLIDER-AREA END -->
				</div>
				<!-- TOW-COLUMN-PRODUCT START -->
				<div class="row tow-column-product">
				@if (!empty($listProductNew))
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<!-- NEW-PRODUCT-AREA START -->
						<div class="new-product-area">
							<div class="left-title-area">
								<h2 class="left-title">{{ trans('app.NewProducts') }}</h2>
							</div>						
							<div class="row">
								<div class="col-xs-12">
									<div class="row">
										<!-- NEW-PRO-CAROUSEL START -->
										<div class="new-pro-carousel">
											<!-- NEW-PRODUCT-SINGLE-ITEM START -->
											@foreach ($listProductNew as $e)
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
																<span class="price">{{ number_format($e->price,0,',','.') }} VNĐ</span>
															</div>
														</div>
													</div>
												</div>
											</div>
											@endforeach
											
											<!-- NEW-PRODUCT-SINGLE-ITEM END -->
											<!-- NEW-PRODUCT-SINGLE-ITEM START -->										
										</div>
										<!-- NEW-PRO-CAROUSEL END -->
									</div>
								</div>
							</div>
						</div>
						<!-- NEW-PRODUCT-AREA END -->
					</div>
					@endif
					@if (!empty($listProductSale))
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<!-- SALE-PRODUCTS START -->
						<div class="Sale-Products">
							<div class="left-title-area">
								<h2 class="left-title">{{ trans('app.SaleProducts') }}</h2>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<div class="row">
										<!-- SALE-CAROUSEL START -->
										<div class="sale-carousel">
											<!-- SALE-PRODUCTS-SINGLE-ITEM START -->
											@foreach ($listProductSale as $e)
												<div class="item">
												<div class="new-product">
													<div class="single-product-item">
														<div class="product-image">
															<a href="{{ url('chi-tiet-san-pham/' . $e->slug . '-' . $e->pid) }}"><img src="{{ $e->images }}" alt="{{ $e->altImage }}" /></a>
															<a class="new-mark-box">{{ trans('app.Sale') }}</a>
															<div class="overlay-content">
																<ul>
																	<li><a class="buy_cart" id="{{ $e->pid }}" href="javascript:void(0)"><i class="fa fa-shopping-cart"></i></a></li>

																</ul>
															</div>
														</div>
														<div class="product-info">
															<a href="{{ url('chi-tiet-san-pham/' . $e->slug . '-' . $e->pid) }}"><br><h3>{{ $e->name }}</h3></a>
															<div class="price-box">
																<span class="price">{{ number_format($e->price,0,',','.') }} VNĐ</span>
																<span class="old-price">{{ number_format($e->old_price,0,',','.') }} VNĐ</span>
															</div>
														</div>
													</div>
												</div>
											</div>
											@endforeach
											
											<!-- SALE-PRODUCTS-SINGLE-ITEM END -->							
										</div>
										<!-- SALE-CAROUSEL END -->
									</div>
								</div>
							</div>
						</div>
						<!-- SALE-PRODUCTS END -->
					</div>
					@endif
				</div>
				<!-- TOW-COLUMN-PRODUCT END -->
				<div class="row">
					<!-- ADD-TWO-BY-ONE-COLUMN START -->
					<div class="add-two-by-one-column">
					@if ($listBlock['betweenLeft'] != null)
						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
							<div class="tow-column-add zoom-img">
								<a href="{{ url('thong-tin/' . $listBlock['betweenLeft']->slug . '-' . $listBlock['betweenLeft']->id) }}"><img src="{{ $listBlock['betweenLeft']->images }}" alt="{{ $listBlock['betweenLeft']->name }}" /></a>
							</div>
						</div>
					@endif
					@if ($listBlock['betweenRight'] != null)	
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="one-column-add zoom-img">
								<a href="{{ url('thong-tin/' . $listBlock['betweenRight']->slug . '-' . $listBlock['betweenRight']->id) }}"><img src="{{ $listBlock['betweenRight']->images }}" alt="{{ $listBlock['betweenRight']->name }}" /></a>
							</div>								
						</div>
					@endif
					</div>
					<!-- ADD-TWO-BY-ONE-COLUMN END -->
				</div>
				<div class="row">
					<div class="col-xs-12">
						<!-- TAB-BG-PRODUCT-AREA START -->
						<div class="tab-bg-product-area">
							<!-- TAB PANES START -->
							<div class="tab-content bg-tab-content">
								<!-- TABS ONE START-->
								<div role="tabpanel" class="tab-pane active" id="women-tab">
									<div class="bg-tab-content-area tab-carousel-1">
										<!-- TAB-SINGLE-ITEM START -->
										<div class="item">
											<div class="single-product-item">
												<div class="product-image">
													<a href="#"><img src="{{ asset('frontend/') }}/img/product/sale/3.jpg" alt="product-image" /></a>
													<a href="#" class="new-mark-box">{{ trans('app.New') }}</a>
													<div class="overlay-content">
														<ul>
															<li><a href="#" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
														</ul>
													</div>
												</div>
												<div class="product-info">
													<div class="customar-comments-box">
														<div class="rating-box">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-half-empty"></i>
														</div>
														<div class="review-box">
															<span>1 Review(s)</span>
														</div>
													</div>
													<a href="single-product.html">Short Sleeves T-shirt</a>
													<div class="price-box">
														<span class="price">$16.51</span>
													</div>
												</div>
											</div>							
										</div>
										<!-- TAB-SINGLE-ITEM END -->
									</div>	
								</div>
								<!-- TABS ONE END-->
								<!-- TABS TWO START-->
								<div role="tabpanel" class="tab-pane" id="tops-tab">
									<div class="bg-tab-content-area tab-carousel-2">
										<!-- TAB-SINGLE-ITEM START -->
										<div class="item">
											<div class="single-product-item">
												<div class="product-image">
													<a href="#"><img src="{{ asset('frontend/') }}/img/product/sale/9.jpg" alt="product-image" /></a>
													<a href="#" class="new-mark-box">sale!</a>
													<div class="overlay-content">
														<ul>
															<li><a href="#" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
														</ul>
													</div>
												</div>
												<div class="product-info">
													<div class="customar-comments-box">
														<div class="rating-box">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-half-empty"></i>
															<i class="fa fa-star-half-empty"></i>
														</div>
														<div class="review-box">
															<span>1 Review(s)</span>
														</div>
													</div>
													<a href="single-product.html">Printed Dress</a>
													<div class="price-box">
														<span class="price">$23.40</span>
														<span class="old-price">$26.00</span>
													</div>
												</div>
											</div>							
										</div>
										<!-- TAB-SINGLE-ITEM END -->
									</div>	
								</div>
								<!-- TABS TWO END-->
								<!-- TABS THREE START-->
								<div role="tabpanel" class="tab-pane" id="t-shirts">
									<div class="bg-tab-content-area tab-carousel-3">
										<!-- TAB-SINGLE-ITEM START -->
										<div class="item">
											<div class="single-product-item">
												<div class="product-image">
													<a href="#"><img src="{{ asset('frontend/') }}/img/product/sale/5.jpg" alt="product-image" /></a>
													<a href="#" class="new-mark-box">new</a>
													<div class="overlay-content">
														<ul>
															<li><a href="#" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
														</ul>
													</div>
												</div>
												<div class="product-info">
													<div class="customar-comments-box">
														<div class="rating-box">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-half-empty"></i>
														</div>
														<div class="review-box">
															<span>1 Review(s)</span>
														</div>
													</div>
													<a href="single-product.html">Printed Dress</a>
													<div class="price-box">
														<span class="price">$50.99</span>
													</div>
												</div>
											</div>							
										</div>
										<!-- TAB-SINGLE-ITEM END -->
									</div>					
								</div>
								<!-- TABS THREE END-->
							</div>	
							<!-- TAB PANES END -->
							<!-- TABS MENU START-->
							<div class="tab-carousel-menu">
								<ul class="nav nav-tabs product-bg-nav">
									<li class="active"><a href="#women-tab" data-toggle="tab">Women</a></li>
									<li><a href="#tops-tab" data-toggle="tab">tops</a></li>
									<li><a href="#t-shirts" data-toggle="tab">t-shirts</a></li>
								</ul>
							</div>
							<!-- TABS MENU END-->					
						</div>
						<!-- TAB-BG-PRODUCT-AREA END -->
					</div>
				</div>
				<div class="row">
					<!-- IMAGE-ADD-AREA START -->
					<div class="image-add-area">
					@if ($listBlock['endLeft'] != null)
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<!-- ONEHALF-ADD START -->
							<div class="onehalf-add-shope zoom-img">
								<a href="{{ url('thong-tin/' . $listBlock['endLeft']->slug . '-' . $listBlock['endLeft']->id) }}"><img src="{{ $listBlock['endLeft']->images }}" alt="{{ $listBlock['endLeft']->name }}" /></a>
							</div>
							<!-- ONEHALF-ADD END -->
						</div>
					@endif
					@if ($listBlock['endRight'] != null)	
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<!-- ONEHALF-ADD START -->
							<div class="onehalf-add-shope zoom-img">
								<a href="{{ url('thong-tin/' . $listBlock['endRight']->slug . '-' . $listBlock['endRight']->id) }}"><img src="{{ $listBlock['endRight']->images }}" alt="{{ $listBlock['endRight']->name }}" /></a>
							</div>
							<!-- ONEHALF-ADD END -->
						</div>
					@endif						
					</div>
					<!-- IMAGE-ADD-AREA END -->
				</div>
			</div>
			
@if (!empty($listPost))
<section class="latest-news-area">
@include('frontend.blocks.latest_news')
</section>
@endif
@endsection
