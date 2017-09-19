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
<h2>Checkout</h2>
<span class="h-line"></span> </div>
 
<section class="checkout-holder">
<section class="span9 first">
 
<div class="accordion" id="accordion2">

<div class="accordion-group">
<div class="accordion-heading"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFifth"> Payment Information </a> </div>
<div id="collapseFifth" class="accordion-body collapse">
<div class="accordion-inner">
<form class="form-horizontal" method="post">
{{ csrf_field() }}
<div class="control-group">
<label class="control-label" for="inputCardname">{{ trans('form.name') }}<sup>*</sup></label>
<div class="controls">
<input type="text" id="inputCardname" placeholder="{{ trans('placeholder.name') }}" name="name" value="{{ old('name') }}"><br>
<span style="color: red">{{ $errors->first('name') }}</span>
</div>
</div>
<div class="control-group">
<label class="control-label" for="inputCardname">{{ trans('form.email') }}<sup>*</sup></label>
<div class="controls">
<input type="email" id="inputCardname" placeholder="{{ trans('placeholder.email') }}" name="email" value="{{ old('email') }}"><br>
<span style="color: red">{{ $errors->first('email') }}</span>
</div>
</div>
<div class="control-group">
<label class="control-label" for="inputCardname" >{{ trans('form.phone') }}<sup>*</sup></label>
<div class="controls">
<input type="text" id="inputCardname" placeholder="{{ trans('placeholder.phone') }}" name="phone" value="{{ old('phone') }}"><br>
<span style="color: red">{{ $errors->first('phone') }}</span>
</div>
</div>
<div class="control-group">
<label class="control-label" for="inputPassword">{{ trans('form.address') }}<sup>*</sup></label>
<div class="controls">
<textarea name="address" cols="2" rows="20">{{ old('address') }}</textarea><br>
<span style="color: red">{{ $errors->first('address') }}</span>
</div>
</div>

<div class="control-group">
<div class="controls">
<button type="submit" class="more-btn">Continue</button>
</div>
</div>
</form>
</div>
</div>
</div>
<div class="accordion-group">
<div class="accordion-heading"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseSixth"> Order Review </a> </div>
<div id="collapseSixth" class="accordion-body collapse">
<div class="accordion-inner no-p">
<table width="100%" border="0" cellpadding="14">
<tr class="heading-bar-table">
<th width="47%" align="left">Product Name</th>
<th width="18%">Price</th>
<th width="19%">Quantity</th>
<th width="16%">Subtotal </th>
</tr>
<tr>
<td width="47%" align="left"><a href="#">The Kite Runner</a> by Khalid Housseni</td>
<td width="18%">$1,680.00 </td>
<td width="19%">1 </td>
<td width="16%">$1,680.00 </td>
</tr>
<tr>
<td align="left"><a href="#">The Kite Runner</a> by Khalid Housseni </td>
<td>$60.50 </td>
<td>1 </td>
<td>$1,680.00 </td>
</tr>
<tr>
<td align="left"><a href="#">The Kite Runner</a> by Khalid Housseni </td>
<td>$180.20 </td>
<td>1</td>
<td>$1,680.00 </td>
</tr>
<tr>
<td colspan="3" align="right">
<p>Subtotal</p>
<p>Shipping & Handing (Flat rate: Fixed $25.00)</p>
<p>Grand Total</p> </td>
<td>
<p>$1,921.00</p>
<p>$25.00</p>
<p>$1,946.00</p> </td>
</tr>
<tr>
<td colspan="3" align="left">Forgot an items? Edit your cart</td>
<td><a href="#" class="more-btn">Place Order</a> </td>
</tr>
</table>
</div>
</div>
</div>
</div>
 
</section>
<section class="span3 first">
<div class="side-holder">
<div class="r-title-bar"> <strong><a href="#">Write Your Own Review > </a></strong> </div>
<ul class="review-list">
<li><a href="#">Billing Information</a></li>
<li><a href="#">Shipping Information</a></li>
<li><a href="#">Shipping Method</a></li>
<li><a href="#">Payment Method </a></li>
<li><a href="#">Order Review</a></li>
</ul>
</div>
</section>
</section>
 
</section>

@endsection