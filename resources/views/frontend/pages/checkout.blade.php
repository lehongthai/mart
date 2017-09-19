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
				<span>{{ trans('app.InfoShipping') }}</span>
			</div>
			<!-- BSTORE-BREADCRUMB END -->
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h2 class="page-title">{{ trans('app.InfoShipping') }}</h2>
		</div>	
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<!-- PERSONAL-INFOMATION START -->
			<div class="personal-infomation">
				<form class="primari-box personal-info-box" id="personalInfo" method="post" action="">
				{{ csrf_field() }}
					<h3 class="box-subheading">{{ trans('app.YourPersonalInformation') }}</h3>
					<div class="personal-info-content">
						<div class="form-group primary-form-group p-info-group">
							<label>{{ trans('app.Title') }}</label>
							<span class="radio-box">
								<input id="radio1" type="radio" name="sex" value="1" @if (old('sex') == 1)
									checked="checked"
								@endif>
								<label for="radio1">{{ trans('app.Mr') }}.</label>
							</span>
							<span class="radio-box">
								<input id="radio2" type="radio" name="sex" value="2" @if (old('sex') == 2)
									checked="checked"
								@endif>
								
								<label for="radio2">{{ trans('app.Mrs') }}.</label>
							</span>
						</div>
						<div class="form-group primary-form-group p-info-group">
							<label for="name">{{ trans('app.FullName') }} <sup>*</sup></label>
							<input type="text" value="{{ old('name') }}" name="name" id="firstname" class="form-control input-feild">
							<span style="color: red">{{ $errors->first('name') }}
						</div>
						<div class="form-group primary-form-group p-info-group">
							<label for="lastname">{{ trans('app.Phone') }}<sup>*</sup></label>
							<input type="text" value="{{ old('phone') }}" name="phone" id="lastname" class="form-control input-feild">
							<span style="color: red">{{ $errors->first('phone') }}
						</div>
						<div class="form-group primary-form-group p-info-group">
							<label for="email">Email<sup>*</sup></label>
							<input type="email" value="{{ old('email') }}" name="email" id="email" class="form-control input-feild">
							<span style="color: red">{{ $errors->first('email') }}
						</div>
						<div class="form-group primary-form-group p-info-group">
							<div class="type-of-text">
									<div class="form-group primary-form-group">
										<label>{{ trans('app.Address') }}Address<sup>*</sup></label>
										<textarea class="contact-text" style="height: 100px;" name="address">{{ old('address') }}</textarea>
									</div>
									<span style="color: red">{{ $errors->first('address') }}</span>													
								</div>
						</div>
						<div class="submit-button p-info-submit-button">
										<button type="submit" class="btn main-btn">
											<span>
												{{ trans('app.Accept') }}
											</span>	
										</button>
									</div>
					</div>
				</form>							
			</div>
			<!-- PERSONAL-INFOMATION END -->
		</div>
	</div>
</div>

@endsection