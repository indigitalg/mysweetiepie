<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/favicon/favicon-32x32.png')}}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('assets/favicon/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('assets/favicon/apple-icon-60x60.png')}}">
    <link href="favicon.png" rel="icon">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('description')">
    <meta name="token" content="{{csrf_token()}}">
    <title>@yield('title') My SweetiePie</title>
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bakery-icon/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/slick/slick/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/lightGallery-master/dist/css/lightgallery.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/mspcss/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/mspcss/overlay.css')}}">
    
    <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
    <!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
    <!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
    <!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->
    <style>
        .validation_error {
            width:100%;
            text-align:center;
            color:red;
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #cd9b33 !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            position: absolute;
            width: 100%;
            z-index: 8;
            top: 19%;
        }
        .select2-container--default .select2-selection--single {
            padding-right: 20px;
            padding-left: 20px;
            text-indent: 10px;
            background-color: #d3d3d3;
            color: #000;
            height: 45px;
            -webkit-border-radius: 50px;
            -moz-border-radius: 50px;
            -ms-border-radius: 50px;
            border-radius: 50px;
        }
        .select2-container--open .select2-dropdown--below {
            background-color: #d3d3d3;
        }
        .select2-container--default .select2-search--dropdown .select2-search__field{
            background: #d3d3d3;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 26px;
            position: absolute;
            top: 8px;
            right: 7px;
            width: 22px;
        }
        .select2-container--default .select2-selection--single .select2-selection__clear {
            cursor: pointer;
            float: right;
            font-weight: bold;
            padding-right: 7%;
            font-size: 20px;
        }

        #header-wr {
          display: none;
        }


    </style>
    @stack('styles')
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-22591984-31"></script>

    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-22591984-31');
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->

  </head>
  
  <body>
    <div class="ps-search">
      <div class="ps-search__content" style="background-color:white;"><a class="ps-search__close" href="#" style="background-color:white"><span></span></a>
        <form class="ps-form--search-2" action="{{url('search')}}" method="get">
            {{csrf_field()}}
          <h3>Enter your keyword</h3>
          <div class="form-group">
            <input class="form-control" type="text" placeholder="Keyword or item#" name="term" value="{{old('term')}}">
            
          </div>
          <input type="submit" class="ps-btn active ps-btn--fullwidth" value="Search" style="color:white;width: 200px;background-color: #ce6f9b;">
        </form>
      </div>
    </div>
    <!-- header-->
    <header class="header header--3" data-sticky="true">
     
      <nav class="navigation">
        <div class="ps-container"><a class="ps-logo" href="{{url('/')}}" ><img src="{{ asset('assets/images/logo.png')}}" alt=""></a>
          <div class="menu-toggle"><span></span></div>
          <div class="header__actions">
              <a href="tel:+16472453301" class="hidden-xs" style="font-size: 13px;border: 1px solid #000;display: inline;top: 12px;padding: 5px;font-weight: 500;border-radius: 20px;"><i class="fa fa-phone" style="position: relative;top: 1px;left: 0;transform: none;font-size: 17px;display: inline-block;padding: 0px 5px;"></i>Call Us Now</a>
              <a class="ps-search-btn" href="#"><i class="ba-magnifying-glass"></i></a>
              <a href="{{url('myaccount')}}"><i class="ba-profile"></i></a>
            <div class="ps-cart"><a class="ps-cart__toggle" href="#"><span style="right:2px !important;background-color:#f993c3;"><b style="font-size:12px;padding-left:27%;color:white;">{{ getCartCount() }}</b></span><i class="ba-shopping" style="top:51% !important;left:37% !important"></i></a>
             @if(isset($basketAll) && getCartCount() >0)
              <div class="ps-cart__listing">
                <div class="ps-cart__content">
                    @php $m=0; @endphp
                    @foreach($basketAll['items'] as $b)
                  <div class="ps-cart-item">
                      <!--<a class="ps-cart-item__close" href="#"></a>-->
                    <div class="ps-cart-item__thumbnail"><a href=""></a><img src="{{env('PRODUCT_FILES').$b->picture}}" alt="">
                    </div>
                    <!--<a href="{{url('deleteproduct/'.$b['id'])}}"><i class="fa fa-trash" style="color:white"></i></a>-->
                    <div class="ps-cart-item__content"><a class="ps-cart-item__title" href="">{{$b['product_name']}}</a><a href="{{url('deleteproduct/'.$b['id'])}}"><i class="fa fa-trash" style="color:white;position: absolute;left: 195px;"></i></a>
                      <p><span>Quantity:<i>{{$b['quantity']}}</i></span><span>Total:<i>${{$b['price_amount']*$b['quantity']}}</i></span></p>
                      @php $m=$m+($b['price_amount']*$b['quantity']);@endphp
                    </div>
                  </div>
                  @endforeach
                </div>
                <div class="ps-cart__total">
                  <p>Number of items:<span>{{count($basketAll['items'])}}</span></p>
                  <p>Total:<span>${{$m}}</span></p>
                </div>
                <div class="ps-cart__footer"><a href="{{url('shop/cart')}}">View Cart</a></div>
              </div>
              @endif
            </div>
           </div>
           
           
           {!!getMenu('main-menu',['id'=>'header-wr'])!!} 
           
            @if(session('cityIdSet') != '')
                    <a href="/delivery-options" class="delivery-point"><small>{{session('shippingType') == 'pickup' ? 'Pickup at':'Delivery to'}}</small> {{ucfirst(session('cityIdSet'))}}</a>
            @endif
        </div>
        <div class="clear" style="clear:both;"></div>
      </nav>

    </header>
    @yield('contents')
    
    <div class="ps-home-contact-2" style="height:485px;background-color: #F6F6F6 !important;"> 
      <div class="ps-container" style="background-color: transparent  !important; ">
        <div class="ps-block--working-time" style="padding-bottom: 20px;">
            <?php 
                    $strs = getStores(); 
                    $days = ['0'=>'Sunday','1'=>'Monday','2'=>'Tuesday','3'=>'Wednesday','4'=>'Thursday','5'=>'Friday','6'=>'Saturday'];
   
            ?>
          <h4>Operating Hours</h4>

          <select name="store" id="select_timing" style="width: 250px; padding:5px; display:block; margin: -10px auto 10px auto;border: 1px solid #DDD">
              @foreach($strs as $str) 
                <option value="store_{{$str->id}}">{{$str->name}}</option>
              @endforeach
          </select>


          @php $cnt = 0; @endphp
          

          
            @foreach($strs as $str)
                <ul class="timing" id="timing_{{$str->id}}" style="max-width:300px; margin: 0px auto;display:none;">
                    @foreach($str->store_timing as $timing)
                        <li style="padding: 5px;"><?php if(isset($days[$timing->day])) {
                                
                                echo $days[$timing->day];
                                echo '<span>'.date('g:ia',strtotime($timing->open)) .' - '. date('g:ia',strtotime($timing->close)).'</span>';

                        } ?></li>
                    @endforeach
                </ul>
            @endforeach
            
          
          
        </div>
        
        <form class="ps-form--get-in-touch" action="{{url('contact')}}" method="post" >
            	{{ csrf_field()}}
          <h3 style="color:#f993c3;margin-bottom:0px;">Get in touch</h3>
          	@if(Session::has('flash_message'))
				<div class="alert alert-success">Thank you for getting in touch. We will revert back to you soon</div>
			@endif
          <div class="form-group"  style="margin-bottom:7px;">
            <label>Name <sup>*</sup></label>
            <input class="form-control" type="text" name="name" title="Name should only contain letters. e.g. john" value="{{ old('name') }}" required>
            @if($errors->has('name'))
				<small class="form-text invalid-feedback " style="color:red">{{ $errors->first('name')}}</small>
			@endif
          </div>
          <div class="form-group" style="margin-bottom:7px;">
            <label>Email <sup>*</sup></label>
            <input class="form-control" type="email" name="email" title="Please Enter Valid Email ID" value="{{ old('email') }}" required>
            @if($errors->has('email'))
				<small class="form-text invalid-feedback" style="color:red">{{ $errors->first('email')}}</small>
			@endif
          </div>
          <div class="form-group" style="margin-bottom:7px;">
            <label>Phone Number <sup>*</sup></label>
            <input class="form-control" type="text" name="phone" value="{{ old('phone') }}" maxlength="10" required>
             @if($errors->has('phone'))
				<small class="form-text invalid-feedback" style="color:red">{{ $errors->first('phone')}}</small>
			@endif
          </div>
          <div class="form-group" style="margin-bottom:7px;">
            <label>Message <sup>*</sup></label>
            <input class="form-control" type="text" name="message" value="{{ old('message') }}" maxlength="255" required>
             @if($errors->has('message'))
				<small class="form-text invalid-feedback" style="color:red">{{ $errors->first('message')}}</small>
			@endif
          </div>
          <input type="hidden" name="subject" value="MySweetiePie Contact message" />
          <div class="text-center">
            <div class="g-recaptcha" data-sitekey="{{'6LdF0VAaAAAAAFom-8QQQ1Y39Kc60Tmg0QI97J1Y'}}" data-callback="enableBtn" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;margin:0px auto;"></div>
          </div>
          <div class="form-group submit" style="padding-top:0px;margin-top:0px;">
            <button type="submit" class="ps-btn" style="border: 2px solid #f993c3;color: pink;"> Contact us</button>
          </div>
          <center><font color="white">Call Us Now : <a href="tel:+1 (647) 245-3301">+1 (647) 245-3301</a></font></center>
        </form>
       
        <form class="ps-form--subscribe-offer" action="{{url('subscribe')}}" method="post">
            	{{ csrf_field()}}
          <h4>Sign Up for News & Updates</h4>
           @if(Session::has('result'))
                <div class="alert alert-success">Thank you for subscribing! You are successfully subscribed to MySweetiePie.ca</div>
              @endif
          <div class="form-group" >
            <input class="form-control" type="email" placeholder="Your Email..." name="email1" required style="border: 2px solid #f993c3;"> 
            
            <button type="submit" style="background-color:#f993c3">Subscribe</button>
             
          </div>
          <p>* Don't worry, we never spam</p>
          
          <p><img src="images/marlies.png" style="max-width:100%;height:auto;padding: 50px;" /></p>
        </form>
      </div>
    </div>


    <div class="ps-footer--2" style="clear:both;float:none;">
      <div class="ps-footer__content">
         
           
<p><a href="{{url('contact')}}"> Contact Us </a> <span style="
    padding-left: 10px;padding-right:10px
    
"> | </span> <a href="{{url('corporate')}}"> Corporate </a> <span style="
    padding-left: 10px;padding-right:10px
    
"> | </span> <a href="{{url('weddings')}}"> Wedding </a> <span style="
    padding-left: 10px;padding-right:10px
    
"> | 

    </span><a href="{{url('shipping_policies')}}"> Shipping Policy </a>

 <span style="
    padding-left: 10px;padding-right:10px
    
"> | </span><a href="{{url('faqs')}}">FAQ</a><span style="
    padding-left: 10px;padding-right:10px
    
"> | </span><a href="{{url('policies')}}">Our Policies</a><span style="
    padding-left: 10px;padding-right:10px
    
">|</span><a href="{{url('gallery')}}">Media</a></p>
          
        
        <div class="container">
            <!--<a class="ps-logo" href="{{url('/')}}"> <img src="{{ asset('assets/images/logowhite.png')}}" alt=""> </a>-->
        <a class="ps-logo footer_logo" href="{{url('/')}}"><img src="{{ asset('assets/images/mspt.png')}}" alt=""> </a>
          <ul class="ps-list--social">
            <li><a href="https://www.facebook.com/mysweetiepie.ca/?ref=br_rs" target="_blank"><i class="fa fa-facebook"></i></a></li>
            
            <li><a href="https://www.instagram.com/mysweetiepie.ca/" target="_blank"><i class="fa fa-instagram"></i></a></li>
          </ul>
                                
          <p>Head Office <span> | </span>36 Colville Rd, North York<span> | </span>ON, M6M 2Y4<span> | </span> <a href="tel://+16472453301"><i class="fa fa-phone"></i> +1 647-245-3301</a> <span> | </span> <a href="tel://+14166759436"><i class="fa fa-phone"></i> +1 416-675-9436</a></p>
          
          <p>Queen Street <span> | </span>654 Queen Street West, Toronto<span> | </span>ON, M6J 1E5<span> | </span> <a href="tel://+16472453301"><i class="fa fa-phone"></i> +1 647-245-3301 ext. 272</a></p>
          
          <p>Harbord <span> | </span>326 Harbord St, Toronto<span> | </span>ON, M6G 1H1<span> | </span> <a href="tel://+16472453301"><i class="fa fa-phone"></i> +1 647-245-3301 ext. 222</a></p>
          
          <p>Unionville <span> | </span> 190 Main St Unionville, Markham<span> | </span>ON, L3R 2G9<span> | </span> <a href="tel://+16472453301"><i class="fa fa-phone"></i> +1 647-245-3301 ext. 226</a></p>
          
          <p>Danforth <span> | </span> 563 Danforth Ave, Toronto<span> | </span> ON M4K 1P9<span> | </span> <a href="tel://+16472453301"><i class="fa fa-phone"></i> +1 647-245-3301 ext. 273</a></p>
 
          <p>Distillery <span> | </span>  6 Case Goods Lane, Toronto<span> | </span> ON M5A 3C4 | <a href="tel://+16472453301"><i class="fa fa-phone"></i> +1 647-245-3301 ext. 274</a></p>
          
          <p>Leaside <span> | </span>  1639 B Bayview Ave East York, Toronto<span> | </span> ON M4G 3B5 | <a href="tel://+16472453301"><i class="fa fa-phone"></i> +1 647-245-3301 ext. 275</a></p>
          
          <p>Yonge st<span> | </span>  3308 Yonge st, Toronto<span> | </span> ON M4N 2M4 | <a href="tel://+16472453301"><i class="fa fa-phone"></i> +1 647-245-3301 ext. 276</a></p>
 
          <p>First Canadian Place<span> | </span>  100 King Street West, Toronto<span> | </span> ON M5X 1A9 | <a href="tel://+16472453301"><i class="fa fa-phone"></i> +1 647-245-3301</a></p>
 
        
          
          <ul class="ps-list--payment">
                <li><a href="#"><img src="{{asset('assets/images/visa.png')}}" alt=""></a></li>
                <li><a href="#"><img src="{{asset('assets/images/master-card.png')}}" alt=""></a></li>
                <!--<li><a href="#"><img src="images/payment-method/paypal.png" alt=""></a></li>-->
              </ul>
          <!--<a class="ps-btn" href="#"><i class="ba-route"></i> Find us on map</a>-->
          
          <a id='scrolltop' href="#" class="scroll_top"><i class="fa fa-arrow-up"></i></a>
        </div>
        
        
        
      </div>
      <div class="ps-footer__copyright">
        <div class="container">
          <p>
             © {{date('Y')}} MySweetiepie.ca,  All rights are reserved.</p>
        </div>
      </div>
      @yield('order')
    </div>
    <!--if(session('cityIdSet') == '')-->
    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          
          <div class="modal-body">
              <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close" style="font-size: 110%;">
          <span aria-hidden="true">&times;</span>
        </button>
            <img src="/images/nutrition_info/sample.jpg" style="width: 100%; height:auto;" id="nutri-image" />
          </div>
          
        </div>
      </div>
    </div>


   
    <!-- Load Facebook SDK for JavaScript -->
     <div id="fb-root"></div>
     <script>
       window.fbAsyncInit = function() {
         FB.init({
           xfbml            : true,
           version          : 'v8.0'
         });
       };

       (function(d, s, id) {
       var js, fjs = d.getElementsByTagName(s)[0];
       if (d.getElementById(id)) return;
       js = d.createElement(s); js.id = id;
       js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
       fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));</script>

     <!-- Your Chat Plugin code -->
     <div class="fb-customerchat"
       attribution=setup_tool
       page_id="102769771471649"
 theme_color="#f691c1">
     </div>
    
    <!-- Plugins-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="{{ asset('assets/plugins/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/jquery.waypoints.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/jquery.countTo.js')}}"></script>
    <script src="{{ asset('assets/plugins/jquery.matchHeight-min.js')}}"></script>
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/gmap3.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/lightGallery-master/dist/js/lightgallery-all.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/slick/slick/slick.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/slick-animation.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/jquery.slimscroll.min.js')}}"></script>
    <!-- Custom scripts-->
    
    <script>
    

    
    $(document).ready(function($) { 
        
        console.log('Page loaded')
    
        $(".nutrientinfo").click(function(e){
            e.preventDefault();
            var imgpath = $(this).attr("data-pic");
            $("#nutri-image").attr("src",imgpath)
            $("#exampleModal").modal("show");
        
            $("#nutrients-modal").attr("style","display:block;");
          
        });
        
        $("#select_timing").change(function(e){
            var curstore = $(this).val();
            curstore = curstore.slice(6);
            $(".timing").css("display","none");
            $("#timing_"+curstore).css("display","block");
        })
        
        $("#select_timing").trigger("change");
    
    });
    
    console.log('This is also working...')
    
    </script>
    
    <script src="{{ asset('assets/js/mspjs/main.js')}}"></script>

    <script  src="/js/mspjs/leadgenpro.js"></script>

    @stack('scripts')
    
    
   
  </body>
  <script>
    function minus(i)
    {
        var q=$('#qty-'+i).val();
        var a=$('#amount-'+i).val();
        if((q-1)==0)
        {
            var t=1*a; 
        }
        else
        {
        var t=(q-1)*a;
        }
        $('#tot-'+i).html(t);
        
    }
    function plus(i)
    {
        var q=$('#qty'+i).val();
        var a=$('#amount-'+i).val();
        if((q-1)==0)
        {
            var t=1*a; 
        }
        else
        {
        var t=(q+1)*a;
        }
        $('#tot-'+i).html(t);
        
    }
    

  </script>
   <script type='text/javascript'>
    // Accordian Action

    var action = 'click';
    var speed = "500";
    jQuery(document).ready(function($) {



      $("li .faq-title").on("click", function() {
          $(this).next().toggle("linear");
          $(this).toggleClass("rotate");
      });
    });               
   $(window).scroll(function(){
  var bn = $('#scrolltop');
  if($(window).scrollTop() > 300) {
    bn.css({position:'fixed', right:'10px', bottom:'10px'});
  }
  else{
    bn.css('position', 'static');
  }
});
</script>
</html>