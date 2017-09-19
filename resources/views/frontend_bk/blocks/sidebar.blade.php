<div class="side-holder">
<article class="banner-ad"><img src="{{ url('frontend/images') }}/image20.jpg" alt="Banner Ad"/></article>
</div>
 
<div class="side-holder">
<article class="shop-by-list">
<h2>Shop by</h2>
<div class="side-inner-holder">
@if (!empty($listCategory))
<strong class="title">Category</strong>
<ul class="side-list">
@foreach ($listCategory as $e)
	<li><a href="{{ url('bai-viet/' . $e->slug . '-' . $e->cid) }}">{{ $e->name }}</a></li>
@endforeach
</ul>
@endif
<strong class="title">Author</strong>
<ul class="side-list">
<li><a href="#">Khalid Hoessini (9)</a></li>
<li><a href="#">William Blake (2)</a></li>
<li><a href="#">Anna Kathrinena (1)</a></li>
<li><a href="#">Gray Alvin (3)</a></li>
</ul>
</div>
</article>
</div>
 
 
<div class="side-holder">
<article class="l-reviews">
<h2>Latest Reviews</h2>
<div class="side-inner-holder">
@if (!empty($listProductSale))
@foreach ($listProductSale as $e)

<article class="r-post" style="text-align: center;">
<div class="r-img-title">
<a href="{{ url('chi-tiet-san-pham/' . $e->slug . '-' . $e->pid) }}"><img src="{{ $e->images }}"/></a>
<strong class="r-author"><a href="{{ url('chi-tiet-san-pham/' . $e->slug . '-' . $e->pid) }}">{{ $e->name }}</a></strong>
<span>{{ $e->price }}</span>
<div class="r-det-holder">

</div>
</div>
</article>

@endforeach
@endif
</div>
</article>
</div>
 