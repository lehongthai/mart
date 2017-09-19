<section class="container-fluid container">
<section class="row-fluid">
<section class="span4">
<h1 id="logo"> <a href="{{ url('') }}"><img src="{{ $manager->logo }}"/></a> </h1>
</section>
<section class="span8">
<div class="search-bar">
<form action="{{ url('tim-kiem') }}" role="search">
	<input name="product" type="text" value="search entire store here..."/>
	<input name="submit" type="submit" value="Serach"/>
	</form>
</div>
</section>
</section>
</section>
 
<nav id="nav">
<div class="navbar navbar-inverse">
<div class="navbar-inner">
<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
<div class="nav-collapse collapse">
<ul class="nav">
<li> <a href="grid-view.html">Home</a> </li>
<li class="dropdown"> <a class="dropdown-toggle" href="grid-view.html" data-toggle="dropdown"><i class="icon-heart"></i> Danh Mục Sản Phẩm<b class="caret"></b> </a>
<ul class="dropdown-menu">
<li><a href="about-us.html">About Us</a></li>
<li><a href="blog.html">Blog</a></li>
<li><a href="blog-detail.html">Blog Detail</a></li>
<li><a href="grid-view.html">Product Grid View</a></li>
<li><a href="list-view.html">Product List View</a></li>
<li><a href="grid-view-without-side-bar.html">Product Grid View Without Side Bar</a></li>
<li><a href="shortcodes.html">Short Codes</a></li>
<li><a href="blog-detail.html">News</a></li>
<li><a href="contact.html">Contact Us</a></li>
</ul>
</li>
<li class="dropdown"> <a class="dropdown-toggle" href="grid-view.html" data-toggle="dropdown">Danh Mục Bài Đăng <b class="caret"></b> </a>
<ul class="dropdown-menu">
<li><a href="#">Submenu Detail Column 1</a></li>
<li><a href="#">Submenu Detail Column 2</a></li>
<li><a href="#">Submenu Detail Column 3</a></li>
</ul>
</li>
<li> <a href="{{ url('tin-tuc') }}">Tin Tức</a></li>
<li> <a href="{{ url('about') }}">About Us</a> </li>
<li><a href="{{ url('contact') }}">Contact Us</a></li>
</ul>
</div>
 
</div>
 
</div>
 
</nav>