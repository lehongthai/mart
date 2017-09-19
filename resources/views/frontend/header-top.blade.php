
	<div class="container">
		<div class="row">
			<!-- HEADER-LEFT-MENU START -->
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="header-left-menu">
					<div class="welcome-info">
						Welcome <span>{{ $manager->site_name }}</span>
					</div>
					<div class="selected-language">
						<div class="current-lang">
							<span class="current-lang-label">Language : </span><strong>
							@if ($lang == 'en')
								English
							@elseif($lang == 'vn')
								Vietnamese
							@endif
							</strong>
						</div>
						<ul class="languages-choose language-toogle">
							<li>
								<a href="javascript:void()" class="langWeb" data-lang='en' title="English">
									<span>English</span>
								</a>
							</li>
							<li>
								<a href="javascript:void()" class="langWeb" data-lang='vn' title="Vietnamese">
									<span>Vietnamese</span>
								</a>
							</li>
						</ul>										
					</div>
				</div>
			</div>
			<!-- HEADER-LEFT-MENU END -->
			<!-- HEADER-RIGHT-MENU START -->
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="header-right-menu">
					<nav>
						<ul class="list-inline">
							<li><a href="{{ url('checkout') }}">{{ trans('app.Checkout') }}</a></li>
							<li><a href="{{ url('cart') }}">{{ trans('app.Cart') }}</a></li>
						</ul>									
					</nav>
				</div>
			</div>
			<!-- HEADER-RIGHT-MENU END -->
		</div>
	</div>
