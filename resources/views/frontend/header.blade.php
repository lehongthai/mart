@php
	$route = \Request::route()->getName();
@endphp
<div class="container">
	<div class="row">
		<!-- SHOPPING-CART START -->
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-right shopingcartarea">
			<div class="shopping-cart-out pull-right">
				<div class="shopping-cart showCart">
					{!! $html !!}
				</div>
			</div>
		</div>	
		<!-- SHOPPING-CART END -->
		<!-- MAINMENU START -->
		<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 no-padding-right menuarea">
			<div class="mainmenu">
				<nav>
					<ul class="list-inline mega-menu">
						<li class=@if ($route == 'home.index')
							"active"
						@endif ><a href="{{ url('') }}">{{ trans('app.Home') }}</a>
						</li>
						<li class=@if ($route == 'home.productSale')
							"active"
						@endif >
							<a href="{{ url('san-pham') }}">{{ trans('app.Product') }}</a>
						</li>
						<li class=@if ($route == 'home.blog')
							"active"
						@endif >
							<a href="{{ url('bai-viet') }}">{{ trans('app.News') }}</a>
						</li>
						</li class=@if ($route == 'home.about')
							"active"
						@endif >
						<li><a href="{{ url('about') }}">{{ trans('app.About') }}</a></li>
						<li class=@if ($route == 'home.contact')
							"active"
						@endif ><a href="{{ url('contact') }}">{{ trans('app.Contact') }}</a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- MAINMENU END -->
	</div>
	<div class="row">
		<!-- MOBILE MENU START -->
		<div class="col-sm-12 mobile-menu-area">
			<div class="mobile-menu hidden-md hidden-lg" id="mob-menu">
				<span class="mobile-menu-title">MENU</span>
				<nav>
					<ul>
						<li class=@if ($route == 'home.index')
							"active"
						@endif ><a href="{{ url('') }}">{{ trans('app.Home') }}</a>
						</li>								
						<li class=@if ($route == 'home.productSale')
							"active"
						@endif ><a href="{{ url('san-pham') }}">{{ trans('app.Product') }}</a>
						</li>
						<li class=@if ($route == 'home.blog')
							"active"
						@endif ><a href="{{ url('bai-viet') }}">{{ trans('app.News') }}</a>
						<li class=@if ($route == 'home.about')
							"active"
						@endif ><a href="{{ url('about') }}">{{ trans('app.About') }}</a></li>
						<li class=@if ($route == 'home.contact')
							"active"
						@endif ><a href="{{ url('contact') }}">{{ trans('app.Contact') }}</a></li>
					</ul>
				</nav>
			</div>						
		</div>
		<!-- MOBILE MENU END -->
	</div>
</div>