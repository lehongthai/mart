@extends('layouts.admin') @section('title', $title) @section('css')
<!-- Waves Effect Css -->
<link href="{{ asset('css/plugins/node-waves/waves.css') }}" rel="stylesheet" />

<!-- Animation Css -->
<link href="{{ asset('css/plugins/animate-css/animate.css') }}" rel="stylesheet" />

<!-- Morris Chart Css-->
<link href="{{ asset('css/plugins/morrisjs/morris.css') }}" rel="stylesheet" />

<!-- Bootstrap Material Datetime Picker Css -->
<link href="{{ asset('css/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" />

<!-- Wait Me Css -->
<link href="{{ asset('css/plugins/waitme/waitMe.css') }}" rel="stylesheet" />

<!-- Bootstrap Select Css -->
<link href="{{ asset('css/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" /> {{-- embed Ckeditor And Ckfinder --}}
<script src="{!! asset('js/ckeditor/ckeditor.js') !!}"></script>
<script src="{!! asset('js/ckfinder/ckfinder.js') !!}"></script>
<script src="{!! asset('js/func_ckfinder.js') !!}"></script>
@endsection @section('content')

<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="body">
<form role="form" method="POST" action="{{ route('manager.update') }}">
{{ csrf_field() }}
<!-- Tabs With Icon Title -->
<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="header">
<h2>
Manager
</h2>
</div>
<div class="body">
<div class="row clearfix">
<div class="col-sm-12">
<label>Email</label>
<div class="form-group">
<div class="form-line">
<input type="email" name="email" value="{{ old('email', $result->email) }}" class="form-control" placeholder="Email" id="email" />
</div>
<label id="email-error" class="error">{{ $errors->first('email') }}</label>
</div>
<label>Phone</label>
<div class="form-group">
<div class="form-line">
<input type="text" name="phone" value="{{ old('phone', $result->phone) }}" class="form-control" placeholder="Phone" />
</div>
<label id="email-error" class="error">{{ $errors->first('phone') }}</label>
</div>
<label>Site Name</label>
<div class="form-group">
<div class="form-line">
<input type="text" name="site_name" value="{{ old('site_name', $result->site_name) }}" class="form-control" placeholder="Site Name" />
</div>
<label id="email-error" class="error">{{ $errors->first('site_name') }}</label>
</div>
<label>Address</label>
<div class="form-group">
<div class="form-line">
<input type="text" name="address" value="{{ old('address', $result->address) }}" class="form-control" placeholder="Address" />
</div>
<label id="email-error" class="error">{{ $errors->first('address') }}</label>
</div>
<label>Facebook</label>
<div class="form-group">
<div class="form-line">
<input type="text" name="facebook" value="{{ old('facebook', $result->facebook) }}" class="form-control" placeholder="Facebook" />
</div>
<label id="email-error" class="error">{{ $errors->first('facebook') }}</label>
</div>
<label>Google</label>
<div class="form-group">
<div class="form-line">
<input type="text" name="google" value="{{ old('google', $result->google) }}" class="form-control" placeholder="Google" />
</div>
<label id="email-error" class="error">{{ $errors->first('google') }}</label>
</div>
<label>Twitter</label>
<div class="form-group">
<div class="form-line">
<input type="text" name="twitter" value="{{ old('twitter', $result->twitter) }}" class="form-control" placeholder="Twitter" />
</div>
<label id="email-error" class="error">{{ $errors->first('twitter') }}</label>
</div>
<label>Fanpage</label>
<div class="form-group">
<div class="form-line">
<input type="text" name="fanpage" value="{{ old('fanpage', $result->fanpage) }}" class="form-control" placeholder="Fanpage" />
</div>
<label id="email-error" class="error">{{ $errors->first('fanpage') }}</label>
</div>

<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<label>Latibute</label>
			<div class="form-group">
			<div class="form-line">
			<input type="text" name="lat" value="{{ old('lat', $result->lat) }}" class="form-control" placeholder="Latibute" />
			</div>
			<label id="email-error" class="error">{{ $errors->first('lat') }}</label>
			</div>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<label>Longtibute</label>
			<div class="form-group">
			<div class="form-line">
			<input type="text" name="lng" value="{{ old('lng', $result->lng) }}" class="form-control" placeholder="Longtibute" />
			</div>
			<label id="email-error" class="error">{{ $errors->first('lng') }}</label>
			</div>
	</div>
</div>
<div class="row clearfix">
<div class="col-sm-12">
<label>Intro</label>
<div class="form-group">
<div class="form-line">
<textarea rows="4" name="intro" class="form-control no-resize" placeholder="Enter Description...">{{ old('intro', $result->intro) }}</textarea>
</div>
</div>
</div>
</div>

</div>
</div>


<div class="row clearfix">
<label>Image</label>
<div class="col-xs-12 thumbnail">
<img src="{!! old('image_link', $result->images) !!}" id="avatar">
<hr>
<input type="hidden" name="images" id="link_avatar" value="{!! old('image_link', $result->images) !!}">
<button type="button" class="btn bg-cyan btn-block btn-lg waves-effect" onclick="BrowseServer();">Chọn Ảnh</button>
<div style="color:red">{!! $errors->first('image_link') !!}</div>
</div>

<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<label>Favicon</label>
			<div class="form-group">
			<div class="col-xs-12 thumbnail">
			<img src="{!! old('favicon', $result->favicon) !!}" id="imgDetail1" style="width:50%;height:50%">
			<button style="margin-top:5px" type="button" class="btn btn-large btn-block btn-default" onclick="BrowseServerDetail1();">Chọn Ảnh</button>
			</div>
			<input type="hidden" name="favicon" id="detailImg1" class="form-control" value="{!! old('favicon', $result->favicon) !!}">
			<label id="email-error" class="error">{{ $errors->first('favicon') }}</label>
			</div>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<label>Logo</label>
			<div class="form-group">
			<div class="col-xs-12 thumbnail">
			<img src="{!! old('logo', $result->logo) !!}" id="imgDetail2" style="width:50%;height:50%">
			<button style="margin-top:5px" type="button" class="btn btn-large btn-block btn-default" onclick="BrowseServerDetail2();">Chọn Ảnh</button>
			</div>
			<input type="hidden" name="logo" id="detailImg2" class="form-control" value="{!! old('logo', $result->logo) !!}">
			<label id="email-error" class="error">{{ $errors->first('logo') }}</label>
			</div>
	</div>
</div>

</div>
</div>
</div>
<!-- #END# Tabs With Icon Title -->

<div class="row clearfix">
<div class="pull-right">
<button class="btn btn-block bg-pink waves-effect" type="submit">Update</button>
</div>
</div>
</form>
</div>
</div>
</div>

@endsection @section('js')
<script src="{{ asset('css/plugins/node-waves/waves.js') }}"></script>

<!-- Autosize Plugin Js -->
<script src="{{ asset('css/plugins/autosize/autosize.js') }}"></script>

<!-- Moment Plugin Js -->
<script src="{{ asset('css/plugins/momentjs/moment.js') }}"></script>

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="{{ asset('css/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
@endsection @section('js_admin')
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

<script src="{{ asset('js/pages/forms/basic-form-elements.js') }}"></script>
@endsection