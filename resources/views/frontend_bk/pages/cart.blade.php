@extends('layouts.frontend')
@section('title')
@section('keywords')
@section('descriptions')

@section('content')

<section class="row-fluid">
 
<section class="span12 cart-holder">
<div class="heading-bar">
<h2>SHOPPING CART</h2>
<span class="h-line"></span>
<a href="#" class="more-btn">proceed to checkout</a>
</div>
<div class="cart-table-holder">
<table width="100%" border="0" cellpadding="10">
<tr>
<th width="14%">&nbsp;</th>
<th width="43%" align="left">Product Name</th>
<th width="6%"></th>
<th width="10%">Unit Price</th>
<th width="10%">Quantity</th>
<th width="12%">Subtota</th>
<th width="5%">&nbsp;</th>
</tr>
<form action="" method="post" id="form_cart">
<input type="hidden" name="_token" class="form-control" value="{!! csrf_token() !!}">
<input type="hidden" class="form-control" id="urlCur" value='cart'>
@if (!empty($listCart))
@foreach ($listCart as $e)
<tr bgcolor="#FFFFFF" class="product-detail">
<td valign="top"><img src="{{ $e->options['image'] }}"/></td>
<td valign="top"><a href="{{ url('chi-tiet-san-pham/' . $e->slug . '-' . $e->id) }}">{{ $e->name }}</a></td>
<td align="center" valign="top">{{ $e->price }}</td>
<td align="center" valign="top"><input name="quantity" class="qty" type="text" value="{{ $e->qty }}"/></td>
<td align="center" valign="top"><a href="javascript:void(0)" id="{!! $e->rowId !!}" class="update_cart">Edit</a></td>
<td align="center" valign="top">{{ $e->price * $e->qty }}</td>
<td align="center" valign="top"><a href="{{ url('delete-cart/' . $e->rowId) }}"> <i class="icon-trash"></i></a></td>
</tr>
@endforeach
@endif
</form>
</table>
</div>
        </section>
        <!-- End Main Content -->
    </section>

@endsection