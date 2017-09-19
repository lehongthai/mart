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
				<span>Info Shipping</span>
			</div>
			<!-- BSTORE-BREADCRUMB END -->
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h2 class="page-title">Info Shipping</h2>
		</div>	
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<!-- PERSONAL-INFOMATION START -->
			<div class="personal-infomation">
				<form class="primari-box personal-info-box" id="personalinfo" method="post" action="#">
					<h3 class="box-subheading">Your personal information</h3>
					<div class="personal-info-content">
						<div class="form-group primary-form-group p-info-group">
							<label>Title</label>
							<span class="radio-box">
								<input id="radio1" type="radio" name="sex" value="1" @if (old('sex') == 1)
									checked="checked"
								@endif>
								<label for="radio1">Mr.</label>
							</span>
							<span class="radio-box">
								<input id="radio2" type="radio" name="sex" value="2" @if (old('sex') == 2)
									checked="checked"
								@endif>
								
								<label for="radio2">Mrs.</label>
							</span>
						</div>
						<div class="form-group primary-form-group p-info-group">
							<label for="name">FullName <sup>*</sup></label>
							<input type="text" value="{{ old('name') }}" name="name" id="firstname" class="form-control input-feild">
							<span style="color: red">{{ $errors->first('name') }}
						</div>
						<div class="form-group primary-form-group p-info-group">
							<label for="lastname">Phone<sup>*</sup></label>
							<input type="text" value="{{ old('phone') }}" name="phone" id="lastname" class="form-control input-feild">
							<span style="color: red">{{ $errors->first('phone') }}
						</div>
						<div class="form-group primary-form-group p-info-group">
							<label for="email">Email<sup>*</sup></label>
							<input type="email" value="{{ old('email') }}" name="email" id="email" class="form-control input-feild">
							<span style="color: red">{{ $errors->first('email') }}
						</div>
						<div class="form-group primary-form-group p-info-group">
							<label>Date of Birth</label>
							<div class="birth-day">
								<select id="d-b-day" name="day">
									<option value="">- &nbsp;&nbsp;</option>
									@for ($i = 1; $i < 32; $i++)
										<option value="{{ $i }}" @if (old('old') == $i)
											selected 
										@endif>{{ $i }} </option>
									@endfor
								</select>												
							</div>
							<div class="birth-month">
								<select id="d-b-month" name="month">
									<option value="">- &nbsp;&nbsp;</option>
									@for ($i = 1; $i < 13; $i++)
										<option value="{{ $i }}" @if (old('old') == $i)
											selected 
										@endif>{{ $i }} </option>
									@endfor
								</select>												
							</div>
							<div class="birth-year">
								<select id="d-b-year" name="year">
									<option value="">-  &nbsp;&nbsp;</option>
									@for ($i = 1950; $i < date('Y'); $i++)
										<option value="{{ $i }}" @if (old('old') == $i)
											selected 
										@endif>{{ $i }} </option>
									@endfor
								</select>													
							</div>

						</div>
						<div class="form-group primary-form-group p-info-group">
							<div class="type-of-text">
									<div class="form-group primary-form-group">
										<label>Address<sup>*</sup></label>
										<textarea class="contact-text" style="height: 100px;" name="address">{{ old('address') }}</textarea>
									</div>
									<span style="color: red">{{ $errors->first('address') }}</span>													
								</div>
						</div>
						<div class="submit-button p-info-submit-button">
										<button type="submit" class="btn main-btn">
											<span>
												Register
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