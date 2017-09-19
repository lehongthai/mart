<div class="container">
	<div class="footer-top-container">
		<div class="row">

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<!-- FOOTER-TOP-RIGHT-1 START -->
				<div class="footer-top-right-1">
					<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 hidden-sm">
							<!-- STATICBLOCK START -->
							<div class="about-us-area">
								<h2>FanPage</h2>
								<div>{!! $manager->fanpage !!}</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 hidden-sm">
							<!-- STATICBLOCK START -->
							<div class="about-us-area">
								<h2>{{ trans('app.Intro') }}</h2>
								<p>{{ $manager->intro }}</p>
							</div>
							<!-- ABOUT-US-AREA END -->
							<!-- FLLOW-US-AREA START -->
							<div class="fllow-us-area">
								<h2>{{ trans('app.Follow') }}</h2>
								<ul class="flow-us-link">
									<li><a href="{{ $manager->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
									<li><a href="{{ $manager->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
									<li><a href="{{ $manager->google }}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
								</ul>
							</div>
							<!-- STATICBLOCK END -->
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
							<!-- STORE-INFORMATION START -->
							<div class="Store-Information">
								<h2>Store Information</h2>
								<ul>
									<li>
										<div class="info-lefticon">
											<i class="fa fa-map-marker"></i>
										</div>
										<div class="info-text">
											<p>{{ $manager->address }}</p>
										</div>
									</li>
									<li>
										<div class="info-lefticon">
											<i class="fa fa-phone"></i>
										</div>
										<div class="info-text call-lh">
											<p>{{ trans('app.CallUsNow') }} : {{ $manager->phone }}</p>
										</div>
									</li>
									<li>
										<div class="info-lefticon">
											<i class="fa fa-envelope-o"></i>
										</div>
										<div class="info-text">
											<p>Email : <a href="mailto:{{ $manager->email }}"><i class="fa fa-angle-double-right"></i> {{ $manager->email }}</a></p>
										</div>
									</li>
								</ul>
							</div>
							<!-- STORE-INFORMATION END -->
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
							<!-- GOOGLE-MAP-AREA START -->
							<div class="Store-Information">
								<h2>Store Information</h2>
								<div class="google-map">
									<div id="googleMap" style="width:262px;height:220px;"></div>
								</div>
							</div>
							<!-- GOOGLE-MAP-AREA END -->
						</div>
					</div>
				</div>
				<!-- FOOTER-TOP-RIGHT-1 END -->
			</div>
		</div>
	</div>
</div>