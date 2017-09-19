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
<form role="form" method="POST" @if ($check == 'block')
	action="{{ route('block.create') }}"
	@else
	action="{{ route('slider.create') }}"
@endif>
{{ csrf_field() }}
<!-- Tabs With Icon Title -->
<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="header">
<h2>
Create Slider
</h2>
</div>
<div class="body">
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
<li role="presentation" class="active">
<a href="#home_with_icon_title" data-toggle="tab">
<i class="material-icons">home</i> Slider Detail
</a>
</li>
<li role="presentation">
<a href="#profile_with_icon_title" data-toggle="tab">
<i class="material-icons">face</i> Seo Slider
</a>
</li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
<div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title">
<ul class="nav nav-tabs" role="tablist">
<li role="presentations" class="active">
<a href="#home_with_icon_title_sub" data-toggle="tab">
<i class="material-icons">language</i> VietNam
</a>
</li>
<li role="presentations">
<a href="#profile_with_icon_title_sub" data-toggle="tab">
<i class="material-icons">language</i> English
</a>
</li>
</ul>
<div class="tab-content">


<div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title_sub">
<div class="row clearfix">
<div class="col-sm-12">
<label>Slider Name</label>
<div class="form-group">
<div class="form-line">
<input type="text" name="name_vn" value="{{ old('name_vn') }}" class="form-control" placeholder="Tên Sản Phẩm" id="title" />
</div>
<label id="email-error" class="error">{{ $errors->first('name_vn') }}</label>
</div>
<label>Slider Slug</label>
<div class="form-group">
<div class="form-line">
<input type="text" readonly name="slug_vn" value="{{ old('slug_vn') }}" class="form-control" placeholder="Đường dẫn" id="slug" />
</div>
<label id="email-error" class="error">{{ $errors->first('slug_vn') }}</label>
</div>
<div class="row clearfix">
<div class="col-sm-12">
<label>Slider Desc</label>
<div class="form-group">
<div class="form-line">
<textarea rows="4" name="desc_vn" class="form-control no-resize" placeholder="Enter slider Description...">{{ old('desc_vn') }}</textarea>
</div>
</div>
</div>
</div>
<label>Content</label>
<div class="form-group">
<div class="form-line">
<textarea class="form-control" rows="5" name="contents_vn">{!! old('contents_vn') !!}</textarea>
<script type="text/javascript">
ckeditor('contents_vn')
</script>
</div>
</div>

</div>
</div>

</div>

<div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title_sub">
<div class="row clearfix">
<div class="col-sm-12">
<label>Slider Name</label>
<div class="form-group">
<div class="form-line">
<input type="text" name="name_en" value="{{ old('name_en') }}" class="form-control" placeholder="slider Name" id="title_en" />
</div>
<label id="email-error" class="error">{{ $errors->first('name_en') }}</label>
</div>
<label>Slider Slug</label>
<div class="form-group">
<div class="form-line">
<input type="text" readonly name="slug_en" value="{{ old('slug_en') }}" class="form-control" placeholder="slider Slug" id="slug_en" />
</div>
<label id="email-error" class="error">{{ $errors->first('slug_en') }}</label>
</div>
<div class="row clearfix">
<div class="col-sm-12">
<label>Slider Desc</label>
<div class="form-group">
<div class="form-line">
<textarea rows="4" name="desc_en" class="form-control no-resize" placeholder="Enter slider Description...">{{ old('desc_en') }}</textarea>
</div>
</div>
</div>
</div>
<label>Content</label>
<div class="form-group">
<div class="form-line">
<textarea class="form-control" rows="5" name="contents_en">{!! old('contents_en') !!}</textarea>
<script type="text/javascript">
ckeditor('contents_en')
</script>
</div>
</div>

</div>
</div>
</div>

<div class="row clearfix">
<div class="col-sm-12">
<label>Slider Status</label>
<div class="demo-radio-button">
<input name="publish" value="1" type="radio" id="radio_7" class="radio-col-red" @if(old('publish') == 1) checked @endif />
<label for="radio_7">Publish</label>
<input name="publish" value="2" type="radio" id="radio_8" class="radio-col-pink" @if(old('publish') == 2) checked @endif />
<label for="radio_8">No Publish</label>
</div>
</div>
@if ($check == 'block')

<div class="col-sm-12">
<label>Location</label>
<div class="demo-radio-button">
<input name="location" value="1" type="radio" id="radio_100" class="radio-col-red" @if(old('location') == 1) checked @endif />
<label for="radio_100">Trái Slider</label>
<input name="location" value="2" type="radio" id="radio_99" class="radio-col-pink" @if(old('location') == 2) checked @endif />
<label for="radio_99">Giữa Trái</label>
<input name="location" value="3" type="radio" id="radio_98" class="radio-col-red" @if(old('location') == 3) checked @endif />
<label for="radio_98">Giữa Phải</label>
<input name="location" value="4" type="radio" id="radio_97" class="radio-col-pink" @if(old('location') == 4) checked @endif />
<label for="radio_97">Cuối Trái</label>
<input name="location" value="5" type="radio" id="radio_96" class="radio-col-pink" @if(old('location') == 5) checked @endif />
<label for="radio_96">Cuối Phải</label>
</div>
</div>
	
@endif
</div>
<div class="row clearfix">
<label>Ảnh hiển thị</label>
<div class="col-xs-12 thumbnail">
<img src="{!! old('image_link') !!}" id="avatar">
<hr>
<input class="form-control" name="altImage" placeholder="Chú thích ảnh" value="{!! old('altImage') !!}" />
</div>
<input type="hidden" name="image_link" id="link_avatar" value="{!! old('image_link') !!}">
<button type="button" class="btn bg-cyan btn-block btn-lg waves-effect" onclick="BrowseServer();">Chọn Ảnh</button>
<div style="color:red">{!! $errors->first('image_link') !!}</div>
</div>
<br>

</div>
</div>
<div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
<ul class="nav nav-tabs" role="tablist">
<li role="presentations" class="active">
<a href="#home_with_icon_title_sub_meta" data-toggle="tab">
<i class="material-icons">language</i> VietNam
</a>
</li>
<li role="presentations">
<a href="#profile_with_icon_title_sub_meta" data-toggle="tab">
<i class="material-icons">language</i> English
</a>
</li>
</ul>
<div class="tab-content">

<div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title_sub_meta">
<div class="row clearfix">
<div class="col-sm-12">
<label>Keywords</label>
<div class="form-group">
<div class="form-line">
<textarea rows="2" name="keywords_vn" class="form-control no-resize" placeholder="Enter your keywords ..">{{ old('keywords_vn') }}</textarea>
</div>
</div>
</div>
</div>
<div class="row clearfix">
<div class="col-sm-12">
<label>Description</label>
<div class="form-group">
<div class="form-line">
<textarea rows="4" name="description_vn" class="form-control no-resize" placeholder="Enter your description...">{{ old('description_vn') }}</textarea>
</div>
</div>
</div>
</div>
</div>


<div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title_sub_meta">
<div class="row clearfix">
<div class="col-sm-12">
<label>Keywords</label>
<div class="form-group">
<div class="form-line">
<textarea rows="2" name="keywords_en" class="form-control no-resize" placeholder="Enter your keywords ..">{{ old('keywords_en') }}</textarea>
</div>
</div>
</div>
</div>
<div class="row clearfix">
<div class="col-sm-12">
<label>Description</label>
<div class="form-group">
<div class="form-line">
<textarea rows="4" name="description_en" class="form-control no-resize" placeholder="Enter your description...">{{ old('description_en') }}</textarea>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
<div class="row clearfix">
<label>Language</label>
<div class="demo-checkbox">
<input type="checkbox" id="md_checkbox_21" class="filled-in chk-col-red" name="vietnam" value="vietnam" @if (old('vietnam') == 'vietnam')
checked
@endif  />
<label for="md_checkbox_21">VietNam</label>
<input type="checkbox" name="english" id="md_checkbox_22" class="filled-in chk-col-pink" value="english" @if (old('english') == 'english')
checked
@endif />
<label for="md_checkbox_22">English</label>
</div>
</div>
</div>
</div>
</div>
<!-- #END# Tabs With Icon Title -->

<div class="row clearfix">
<div class="pull-right">
<button class="btn btn-block bg-pink waves-effect" type="submit">CREATE</button>
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