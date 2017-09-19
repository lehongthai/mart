<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<!-- LOGO START -->
			<div class="logo">
				<a href="{{ url('') }}"><img src="{{ $manager->logo }}" alt="{{ $manager->site_name }}" /></a>
			</div>
			<!-- LOGO END -->
			<!-- HEADER-RIGHT-CALLUS START -->
			<div class="header-right-callus">
				<h3>{{ trans('app.CallUsNow') }}</h3>
				<span>{{ $manager->phone }}</span>
			</div>
			<!-- HEADER-RIGHT-CALLUS END -->
			<!-- CATEGORYS-PRODUCT-SEARCH START -->
			<div class="categorys-product-search">
				<form action="{{ url('tim-kiem') }}" method="get" class="search-form-cat">
					<div class="search-product form-group">
						<input type="text" class="form-control search-form" style="width: 100%" name="product" placeholder="{{ trans('app.EnterYourSearchKey') }} ... " />
						<button class="search-button" value="{{ trans('app.Search') }}" type="submit">
							{{ trans('app.Search') }}
						</button>									 
					</div>
				</form>
			</div>
			<!-- CATEGORYS-PRODUCT-SEARCH END -->
		</div>
	</div>
</div>