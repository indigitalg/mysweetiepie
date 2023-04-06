<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7"><![endif]-->
<!--[if IE 8]><html class="ie ie8"><![endif]-->
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="favicon.png" rel="icon">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>My SweetiePie</title>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script%7CLora:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/bakery-icon/style.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/owl-carousel/assets/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-select/dist/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/slick/slick/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/lightGallery-master/dist/css/lightgallery.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/mspcss/style.css')}}">
    <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
    <!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
    <!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
    <!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->
  </head>
  <body>
    <div class="ps-search">
      <div class="ps-search__content"><a class="ps-search__close" href="#"><span></span></a>
        <form class="ps-form--search-2" action="{{url('search')}}" method="get">
            {{csrf_field()}}
          <h3>Enter your keyword</h3>
          <div class="form-group">
            <input class="form-control" type="text" placeholder="Keyword or item#" name="term" value="{{old('term')}}">
            <input type="submit" class="ps-btn active ps-btn--fullwidth" value="Search">
          </div>
        </form>
      </div>
    </div>
    <!-- header-->
    <header class="header header--3" data-sticky="false">
      <!--<div class="header__top">-->
      <!--  <div class="ps-container">-->
      <!--    <div class="left">-->
      <!--      <p>460 West 34th Street, 15th floor, New York  -  Hotline: 804-377-3580 - 804-399-3580</p>-->
      <!--    </div>-->
      <!--    <div class="right">-->
      <!--      <div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">USD<i class="fa fa-angle-down"></i></a>-->
      <!--        <ul class="dropdown-menu">-->
      <!--          <li><a href="#"> USD</a></li>-->
      <!--          <li><a href="#"> SGD</a></li>-->
      <!--          <li><a href="#">JPN</a></li>-->
      <!--        </ul>-->
      <!--      </div>-->
      <!--      <div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Language<i class="fa fa-angle-down"></i></a>-->
      <!--        <ul class="dropdown-menu">-->
      <!--          <li><a href="#">English</a></li>-->
      <!--          <li><a href="#">Japanese</a></li>-->
      <!--        </ul>-->
      <!--      </div>-->
      <!--      <ul class="ps-list--social">-->
      <!--        <li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
      <!--        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>-->
      <!--        <li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
      <!--      </ul>-->
      <!--    </div>-->
      <!--  </div>-->
      <!--</div>-->
      <nav class="navigation">
        <div class="ps-container"><a class="ps-logo" href="{{url('/')}}"><img src="{{ asset('imagesmsp/mspt.png')}}" alt=""></a>
          <div class="menu-toggle"><span></span></div>
          <div class="header__actions"><a class="ps-search-btn" href="#"><i class="ba-magnifying-glass"></i></a><a href="{{url('myaccount')}}"><i class="ba-profile"></i></a>
            <div class="ps-cart"><a class="ps-cart__toggle" href="{{url('shop/cart')}}"><span><b>{{getCartCount()}}</b></span><i class="ba-shopping"></i></a>
              <!--<div class="ps-cart__listing">-->
              <!--  <div class="ps-cart__content">-->
              <!--    <div class="ps-cart-item"><a class="ps-cart-item__close" href="#"></a>-->
              <!--      <div class="ps-cart-item__thumbnail"><a href="product-detail.html"></a><img src="images/shopping-cart/1.png" alt="">-->
              <!--      </div>-->
              <!--      <div class="ps-cart-item__content"><a class="ps-cart-item__title" href="product-detail.html">Kingsman</a>-->
              <!--        <p><span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span></p>-->
              <!--      </div>-->
              <!--    </div>-->
              <!--    <div class="ps-cart-item"><a class="ps-cart-item__close" href="#"></a>-->
              <!--      <div class="ps-cart-item__thumbnail"><a href="product-detail.html"></a><img src="images/shopping-cart/2.png" alt="">-->
              <!--      </div>-->
              <!--      <div class="ps-cart-item__content"><a class="ps-cart-item__title" href="product-detail.html">Joseph</a>-->
              <!--        <p><span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span></p>-->
              <!--      </div>-->
              <!--    </div>-->
              <!--    <div class="ps-cart-item"><a class="ps-cart-item__close" href="#"></a>-->
              <!--      <div class="ps-cart-item__thumbnail"><a href="product-detail.html"></a><img src="images/shopping-cart/3.png" alt="">-->
              <!--      </div>-->
              <!--      <div class="ps-cart-item__content"><a class="ps-cart-item__title" href="product-detail.html">Todd Snyder</a>-->
              <!--        <p><span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span></p>-->
              <!--      </div>-->
              <!--    </div>-->
              <!--    <div class="ps-cart-item"><a class="ps-cart-item__close" href="#"></a>-->
              <!--      <div class="ps-cart-item__thumbnail"><a href="product-detail.html"></a><img src="images/shopping-cart/1.png" alt="">-->
              <!--      </div>-->
              <!--      <div class="ps-cart-item__content"><a class="ps-cart-item__title" href="product-detail.html">Todd Snyder</a>-->
              <!--        <p><span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span></p>-->
              <!--      </div>-->
              <!--    </div>-->
              <!--    <div class="ps-cart-item"><a class="ps-cart-item__close" href="#"></a>-->
              <!--      <div class="ps-cart-item__thumbnail"><a href="product-detail.html"></a><img src="images/shopping-cart/1.png" alt="">-->
              <!--      </div>-->
              <!--      <div class="ps-cart-item__content"><a class="ps-cart-item__title" href="product-detail.html">Todd Snyder</a>-->
              <!--        <p><span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span></p>-->
              <!--      </div>-->
              <!--    </div>-->

              <!--  <div class="ps-cart__total">-->
              <!--    <p>Number of items:<span>36</span></p>-->
              <!--    <p>Item Total:<span>£528.00</span></p>-->
              <!--  </div>-->
              <!--  <div class="ps-cart__footer"><a href="cart.html">Check out</a></div>-->
              <!--</div>-->
            </div>
          </div>
          
          
  <!--            <div class="header-nav-wr">-->
		<!--	<div class="container-fluid">-->
		<!--		<div class="header-nav center">-->
		<!--			{!!getMenu('main-menu',['id'=>'header-wr'])!!}-->
		<!--		</div> <!-- header-nav center -->
		<!--	</div>-->
		<!--</div>-->
		<!--<ul class="menu">-->
	
              	{!!getMenu('main-menu',['id'=>'header-wr'])!!}
             
            <!--<li><a href="#">Homepage</a>-->
            <!--  <ul class="sub-menu">-->
            <!--    <li><a href="index.html">Homepage 1</a></li>-->
            <!--    <li><a href="homepage-2.html">Homepage 2</a></li>-->
            <!--    <li><a href="homepage-3.html">Homepage 3</a></li>-->
            <!--  </ul>-->
            <!--</li>-->
            <!--<li><a href="about.html">About</a></li>-->
            <!--<li class="menu-item-has-children"><a href="product-listing.html">product</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>-->
            <!--  <ul class="sub-menu">-->
            <!--    <li><a href="product-listing.html">Product List</a></li>-->
            <!--    <li><a href="product-detail.html">Product Detail</a></li>-->
            <!--    <li><a href="order-form.html">Order Form</a></li>-->
            <!--  </ul>-->
            <!--</li>-->
            <!--<li class="menu-item-has-children"><a href="about.html">Pages</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>-->
            <!--  <ul class="sub-menu">-->
            <!--    <li><a href="menu.html">Menu</a></li>-->
            <!--    <li><a href="cart.html">Shopping Cart</a></li>-->
            <!--    <li><a href="checkout.html">Checkout</a></li>-->
            <!--    <li><a href="whishlist.html">Whishlist</a></li>-->
            <!--    <li><a href="compare.html">Compare</a></li>-->
            <!--    <li><a href="404-page.html">Page 404</a></li>-->
            <!--  </ul>-->
            <!--</li>-->
            <!--<li class="menu-item-has-children"><a href="blog-grid.html">Blogs</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>-->
            <!--  <ul class="sub-menu">-->
            <!--    <li><a href="blog-grid.html">Blog Grid</a></li>-->
            <!--    <li class="menu-item-has-children"><a href="blog-list.html">Blog Listing</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>-->
            <!--      <ul class="sub-menu">-->
            <!--        <li><a href="blog-list.html">Blog List Has Sidebar</a></li>-->
            <!--        <li><a href="blog-list.html">Blog List No Sidebar</a></li>-->
            <!--      </ul>-->
            <!--    </li>-->
            <!--    <li><a href="blog-detail.html">Blog Detail</a></li>-->
            <!--  </ul>-->
            <!--</li>-->
            <!--<li><a href="contact.html">Contact Us</a></li>-->
          <!--</ul>-->
        </div>
      </nav>
      <?php /*echo env('DB_DATABASE', 'forge'); */ ?>
    </header>