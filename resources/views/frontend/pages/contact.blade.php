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
				<span>{{ trans('app.Contact') }}</span>
			</div>
			<!-- BSTORE-BREADCRUMB END -->
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h2 class="page-title contant-page-title">{{ trans('app.CustomerServiceContactUs') }}</h2>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<!-- CONTACT-US-FORM START -->
			<div class="contact-us-form">
				<div class="contact-form-center">
					<h3 class="contact-subheading">{{ trans('app.SendContact') }}</h3>
					<!-- CONTACT-FORM START -->
					<form class="contact-form" method="post" id="contactForm" action="{{ route('home.storeContact') }}">
					{{ csrf_field() }}
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
								<div class="form-group primary-form-group">
									<label>{{ trans('app.Name') }}<sup>*</sup></label>
									<input type="text" class="form-control input-feild" name="name" value="{{ old('name') }}">
									<span style="color: red">{{ $errors->first('name') }}</span>
								</div>		
								<div class="form-group primary-form-group">
									<label>Email<sup>*</sup></label>
									<input type="email" class="form-control input-feild" name="email" value="{{ old('email') }}" />
									<span style="color: red">{{ $errors->first('email') }}</span>
								</div>
								<div class="form-group primary-form-group">
									<label>{{ trans('app.Subject') }}<sup>*</sup></label>
									<input type="text" class="form-control input-feild" name="subject" value="{{ old('subject') }}">
									<span style="color: red">{{ $errors->first('subject') }}</span>
								</div>
								<br>	
								<button type="submit" class="send-message main-btn">{{ trans('app.Send') }} <i class="fa fa-chevron-right"></i></button>
							</div>
							<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
							<div class="type-of-text">
									<div class="form-group primary-form-group">
										<label>{{ trans('app.Message') }}<sup>*</sup></label>
										<textarea class="contact-text" name="comments">{{ old('comments') }}</textarea>
									</div>
									<span style="color: red">{{ $errors->first('comments') }}</span>												
								</div>
								</div>
						</div>
					</form>
					<!-- CONTACT-FORM END -->
				</div>
			</div>
			<!-- CONTACT-US-FORM END -->
		</div>
	</div>
</div>

@endsection