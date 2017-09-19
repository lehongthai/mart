<section class="row-fluid">
<section class="book-box">
<div class="book-outer">
<div id="mybook">
@foreach ($listSlider as $e)
<div title="first page">
<div class="left-page">
<div class="frame"><img src="{{ $e->images }}" alt="{{ $e->name }}"></div>
<div class="bottom">

</div>
</div>
</div>
<div title="second page">
<div class="right-page">
<div class="text">
<h1>{{ $e->name }}</h1>
<strong class="name">by Bonnier</strong>
<div class="rating-box"></div>
<a href="{{ url('thong-tin/' . $e->slug . '-' . $e->id) }}" class="btn-shop">{{ trans('app.ReadMore') }}</a> </div>
<div class="bottom">
<div class="text">
<div class="inner">
<p>{{ $e->desc }}</p>
<a href="{{ url('thong-tin/' . $e->slug . '-' . $e->id) }}" class="readmore">{{ trans('app.ReadMore') }}</a> </div>
<div class="batch-icon"><img src="{{ url('frontend/images') }}/batch-img.png" alt="img"></div>
</div>
</div>
</div>
</div>

@endforeach
</div>
</div>
</section>
<section class="span12 wellcome-msg m-bottom first">
<h2>WELCOME TO BookShoppe’.</h2>
<p>Offering a wide selection of books on thousands of topics at low prices to satisfy any book-lover!</p>
</section>
</section>