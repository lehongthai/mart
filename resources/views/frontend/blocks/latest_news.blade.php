<div class="container">
	<div class="row">
		<div class="latest-news-row">
			<div class="center-title-area">
				<h2 class="center-title"><a href="{{ url('tin-tuc') }}">{{ trans('app.LatestNews') }}</a></h2>
			</div>	
			<div class="col-xs-12">
				<div class="row">
					<!-- LATEST-NEWS-CAROUSEL START -->
					<div class="latest-news-carousel">
						<!-- LATEST-NEWS-SINGLE-POST START -->
						@foreach ($listPost as $e)
							<div class="item">
							<div class="latest-news-post">
								<div class="single-latest-post">
									<a href="{{ url('thong-tin-chi-tiet/' . $e->slug . '-' . $e->pid) }}"><img src="{{ $e->images }}" alt="{{ $e->altImage }}" /></a>
									<h2><a href="{{ url('thong-tin-chi-tiet/' . $e->slug . '-' . $e->pid) }}">{{ $e->name }}</a></h2>
									<p>{{ $e->desc }}</p>
									<div class="latest-post-info">
										<i class="fa fa-calendar"></i><span>2015-06-20 04:51:43</span>
									</div>
									<div class="read-more">
										<a href="{{ url('thong-tin-chi-tiet/' . $e->slug . '-' . $e->pid) }}">{{ trans('ReadMore') }} <i class="fa fa-long-arrow-right"></i></a>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						
						<!-- LATEST-NEWS-SINGLE-POST END -->									
					</div>	
					<!-- LATEST-NEWS-CAROUSEL START -->
				</div>
			</div>
		</div>
	</div>
</div>