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
<form role="form" method="POST" action="{{ route('post.update', $post->id) }}">
{{ csrf_field() }}
<!-- Tabs With Icon Title -->
<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="header">
<h2>
UPDATE Post
</h2>
</div>
<div class="body">
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
<li role="presentation" class="active">
<a href="#home_with_icon_title" data-toggle="tab">
<i class="material-icons">home</i> Post Detail
</a>
</li>
<li role="presentation">
<a href="#profile_with_icon_title" data-toggle="tab">
<i class="material-icons">face</i> Seo post
</a>
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
<div class="row clearfix">
<div class="col-sm-2">
<label>Post Categories</label>
</div>
<div class="col-sm-6">
<select class="form-control show-tick" name="cate_id">
<option value="">-- Please select --</option>
@foreach($listCate as $cate)
<option value="{{ $cate->id }}" @if(old('cate_id') == $cate->id || $post->category_id == $cate->id) selected @endif >{{ $cate->name }}</option>
@endforeach
</select>

</div>
<div class="col-sm-4">
<div class="form-group">
<label id="email-error" class="error">{{ $errors->first('cate_id') }}</label>
</div>
</div>
</div>
@foreach ($post->detailPost as $e)
@if ($e->lang == 'vn')
<div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title_sub">
<div class="row clearfix">
<div class="col-sm-12">
<label>Post Name</label>
<div class="form-group">
<div class="form-line">
<input type="text" name="name_vn" value="{{ old('name_vn', $e->name) }}" class="form-control" placeholder="Tên Sản Phẩm" id="title" />
</div>
<label id="email-error" class="error">{{ $errors->first('name_vn') }}</label>
</div>
<label>Post Slug</label>
<div class="form-group">
<div class="form-line">
<input type="text" readonly name="slug_vn" value="{{ old('slug_vn', $e->slug) }}" class="form-control" placeholder="Đường dẫn" id="slug" />
</div>
<label id="email-error" class="error">{{ $errors->first('slug_vn') }}</label>
</div>

<div class="row clearfix">
<div class="col-sm-12">
<label>Post Desc</label>
<div class="form-group">
<div class="form-line">
<textarea rows="4" name="desc_vn" class="form-control no-resize" placeholder="Enter Description...">{{ old('desc_vn', $e->desc) }}</textarea>
</div>
</div>
</div>
</div>

<label>Content</label>
<div class="form-group">
<div class="form-line">
<textarea class="form-control" rows="5" name="contents_vn">{!! old('contents_vn', $e->content) !!}</textarea>
<script type="text/javascript">
ckeditor('contents_vn')
</script>
</div>
</div>

</div>
</div>

</div>
@elseif($e->lang == 'en')

<div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title_sub">
<div class="row clearfix">
<div class="col-sm-12">
<label>Post Name</label>
<div class="form-group">
<div class="form-line">
<input type="text" name="name_en" value="{{ old('name_en', $e->name) }}" class="form-control" placeholder="post Name" id="title_en" />
</div>
<label id="email-error" class="error">{{ $errors->first('name_en') }}</label>
</div>
<label>Post Slug</label>
<div class="form-group">
<div class="form-line">
<input type="text" readonly name="slug_en" value="{{ old('slug_en', $e->slug) }}" class="form-control" placeholder="post Slug" id="slug_en" />
</div>
<label id="email-error" class="error">{{ $errors->first('slug_en') }}</label>
</div>

<div class="row clearfix">
<div class="col-sm-12">
<label>Post Desc</label>
<div class="form-group">
<div class="form-line">
<textarea rows="4" name="desc_en" class="form-control no-resize" placeholder="Enter Description...">{{ old('desc_en', $e->desc) }}</textarea>
</div>
</div>
</div>
</div>

<label>Content</label>
<div class="form-group">
<div class="form-line">
<textarea class="form-control" rows="5" name="contents_en">{!! old('contents_en', $e->content) !!}</textarea>
<script type="text/javascript">
ckeditor('contents_en')
</script>
</div>
</div>

</div>
</div>
</div>
@endif
@endforeach  
<div class="row clearfix">
<label>Ảnh hiển thị</label>
<div class="col-xs-12 thumbnail">
<img src="{!! old('image_link', $post->images) !!}" id="avatar">
<hr>
<input class="form-control" name="altImage" placeholder="Chú thích ảnh" value="{!! old('altImage', $post->altImage) !!}"  />
</div>
<input type="hidden" name="image_link" id="link_avatar" value="{!! old('image_link', $post->images) !!}" >
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
@foreach ($post->detailPost as $e)
@if ($e->lang == 'vn')
<div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title_sub_meta">
<div class="row clearfix">
<div class="col-sm-12">
<label>Keywords</label>
<div class="form-group">
<div class="form-line">
<textarea rows="2" name="keywords_vn" class="form-control no-resize" placeholder="Enter your keywords ..">{{ old('keywords_vn', $e->keywords) }}</textarea>
</div>
</div>
</div>
</div>
<div class="row clearfix">
<div class="col-sm-12">
<label>Description</label>
<div class="form-group">
<div class="form-line">
<textarea rows="4" name="description_vn" class="form-control no-resize" placeholder="Enter your description...">{{ old('description_vn', $e->description) }}</textarea>
</div>
</div>
</div>
</div>
</div>
@elseif($e->lang == 'en')
<div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title_sub_meta">
<div class="row clearfix">
<div class="col-sm-12">
<label>Keywords</label>
<div class="form-group">
<div class="form-line">
<textarea rows="2" name="keywords_en" class="form-control no-resize" placeholder="Enter your keywords ..">{{ old('keywords_en', $e->keywords) }}</textarea>
</div>
</div>
</div>
</div>
<div class="row clearfix">
<div class="col-sm-12">
<label>Description</label>
<div class="form-group">
<div class="form-line">
<textarea rows="4" name="description_en" class="form-control no-resize" placeholder="Enter your description...">{{ old('description_en',$e->description) }}</textarea>
</div>
</div>
</div>
</div>
</div>
@endif
@endforeach
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
<button class="btn btn-block bg-pink waves-effect" type="submit">UPDATE</button>
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
<script src="{{ asset('csrf_fields/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
@endsection @section('js_admin')
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

<script src="{{ asset('js/pages/forms/basic-form-elements.js') }}"></script>
@endsection