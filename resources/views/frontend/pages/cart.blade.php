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
				<span>{{ trans('app.YourShoppingCart') }}</span>
			</div>
			<!-- BSTORE-BREADCRUMB END -->
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<!-- SHOPPING-CART SUMMARY START -->
			<h2 class="page-title">{{ trans('app.ShoppingCartSummary') }} <span class="shop-pro-item">{{ trans('app.YourShoppingCartContains') }}: 2 {{ trans('app.Product') }}</span></h2>
			<!-- SHOPPING-CART SUMMARY END -->
		</div>	
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<!-- CART TABLE_BLOCK START -->
			<div class="table-responsive">
				<!-- TABLE START -->
				<table class="table table-bordered" id="cart-summary">
					<!-- TABLE HEADER START -->
					<thead>
						<tr>
							<th width="14%">&nbsp;</th>
							<th class="cart-product">{{ trans('app.Product') }}</th>
							<th class="cart-unit text-right">{{ trans('app.UnitPrice') }}</th>
							<th class="cart_quantity text-center">{{ trans('app.Quantity') }}</th>
							<th class="cart-total text-right">{{ trans('app.Subtotal') }}</th>
							<th width="6%"></th>
							<th class="cart-delete">&nbsp;</th>
						</tr>
					</thead>
					<!-- TABLE HEADER END -->
					<!-- TABLE BODY START -->
					<tbody>
					<form action="" method="post" id="form_cart">
					<input type="hidden" name="_token" class="form-control" value="{!! csrf_token() !!}">
					<input type="hidden" class="form-control" id="urlCur" value='cart'>	
						<!-- SINGLE CART_ITEM START -->
						@if (!empty($listCart))
							@foreach ($listCart as $e)
						<tr>
							<td><img src="{{ $e->options['images'] }}" class="img-responsive" alt="{{ $e->name }}"></td>
							<td class="cart-product">
								<a href="{{ url('chi-tiet-san-pham/' . $e->slug . '-' . $e->id) }}">{{ $e->name }}</a>
							</td>
							<td class="cart-unit">
								<ul class="price text-right">
									<li class="price">{{ number_format($e->price,0,',','.') }} VNĐ</li>
								</ul>
							</td>
							<td class="cart_quantity text-center">
								<div class="cart-plus-minus-button">
									<input class="cart-plus-minus" type="text" name="quantity" value="{{ $e->qty }}">
								</div>
							</td>
							
							<td class="cart-total">
								<span class="price">{{ number_format($e->price * $e->qty,0,',','.') }}</span>
							</td>
							<td class="cart-delete text-center">
								<span>
									<a href="javascript:void(0)" id="{!! $e->rowId !!}" class="update_cart">{{ trans('app.Edit') }}</a>
								</span>
							</td>
							<td class="cart-delete text-center">
								<span>
									<a href="{{ url('delete-cart/' . $e->rowId) }}" class="cart_quantity_delete" title="Delete"><i class="fa fa-trash-o"></i></a>
								</span>
							</td>
						</tr>
						@endforeach
						@endif
						<!-- SINGLE CART_ITEM END -->
					</tbody>
					<!-- TABLE BODY END -->
					<!-- TABLE FOOTER START -->
					<tfoot>										
						<tr>
							<td class="total-price-container text-right" colspan="6">
								<span>{{ trans('app.Subtotal') }}</span>
							</td>
							<td id="total-price-container" class="price" colspan="1">
								<span id="total-price">{{ Cart::Subtotal(0,',','.') }} VNĐ</span>
							</td>
						</tr>
					</tfoot>		
					<!-- TABLE FOOTER END -->									
				</table>
				<!-- TABLE END -->
			</div>
			<!-- CART TABLE_BLOCK END -->
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<!-- RETURNE-CONTINUE-SHOP START -->
			<div class="returne-continue-shop">
				<a href="index.html" class="continueshoping"><i class="fa fa-chevron-left"></i>{{ trans('app.ContinueShopping') }}</a>
				<a href="{{ url('checkout') }}" class="procedtocheckout">{{ trans('app.ProceedToCheckout') }}<i class="fa fa-chevron-right"></i></a>
			</div>	
			<!-- RETURNE-CONTINUE-SHOP END -->						
		</div>
	</div>
</div>

@endsection