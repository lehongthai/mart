@extends('layouts.frontend')
@section('title', (!empty($seoWebsite)) ? $seoWebsite['title'] : 'Danh muc san pham')
@section('keywords', (!empty($seoWebsite)) ? $seoWebsite['keywords'] : 'Keywords')
@section('description', (!empty($seoWebsite)) ? $seoWebsite['description'] : 'description')
@section('og-title', (!empty($seoWebsite)) ? $seoWebsite['og-title'] : 'Danh muc san pham')
@section('og-image', (!empty($seoWebsite)) ? $seoWebsite['og-image'] : 'og-image')
@section('og-url', route('home.contact'))
@section('og-site_name', (!empty($seoWebsite)) ? $seoWebsite['og-site_name'] : 'og-site_name')
@section('od-description', (!empty($seoWebsite)) ? $seoWebsite['od-description'] : 'od-description')
@section('twitter-title', (!empty($seoWebsite)) ? $seoWebsite['twitter-title'] : 'twitter-title')
@section('twitter-image', (!empty($seoWebsite)) ? $seoWebsite['twitter-image'] : 'twitter-image')
@section('twitter-url', route('home.contact'))
@section('twitter-card', (!empty($seoWebsite)) ? $seoWebsite['twitter-card'] : 'twitter-card')

@section('content')

<section class="row-fluid">
<div class="heading-bar">
<h2>Contact Us</h2>
<span class="h-line"></span> </div>
 
<section class="span9 first">

 
<section class="map-holder">
<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.mu/?ie=UTF8&amp;ll=-20.234496,57.603722&amp;spn=0.093419,0.169086&amp;t=m&amp;z=13&amp;output=embed"></iframe>
</section>
 
<div class="span6 c-form-holder first">
 
<form class="form-horizontal" method="post" action="{{ url('/contact') }}">
{{ csrf_field() }}
<div class="control-group">
<label class="control-label" for="inputEmail">Name <sup>*</sup></label>
<div class="controls">
<input type="text" name="name" id="inputEmail" placeholder="" value="{{ old('name') }}"><br>
<span style="color: red">{{ $errors->first('name') }}</span>
</div>
</div>
<div class="control-group">
<label class="control-label" for="inputPassword">Email <sup>*</sup></label>
<div class="controls">
<input type="email" name="email" id="inputPassword" placeholder="" {{ old('email') }}><br>
<span style="color: red">{{ $errors->first('email') }}</span>
</div>
</div>
<div class="control-group">
<label class="control-label" for="inputPassword">Subject <sup>*</sup></label>
<div class="controls">
<input type="text" name="subject" id="inputPassword" placeholder="" value="{{ old('subject') }}"><br>
<span style="color: red">{{ $errors->first('subject') }}</span>
</div>
</div>
<div class="control-group">
<label class="control-label" for="inputPassword">Message <sup>*</sup></label>
<div class="controls">
<textarea name="comments" id="comments_area" cols="2" rows="20">{{ old('comments') }}</textarea><br>
<span style="color: red">{{ $errors->first('comments') }}</span>
</div>
</div>
<div class="control-group">
<div class="controls">
<button type="submit" class="more-btn2">SEND REQUEST</button>
</div>
</div>
</form>
 
</div>
{!! $setting->content !!}
</section>
 
 
<section class="span3">

@include('frontend.blocks.sidebar')

</section>
 
</section>

@endsection