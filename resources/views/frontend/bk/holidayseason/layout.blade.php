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
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon/favicon-32x32.png')}}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('favicon/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('favicon/apple-icon-60x60.png')}}">
    <link href="favicon.png" rel="icon">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('description')">
    <meta name="token" content="{{csrf_token()}}">
    <title>@yield('title') My SweetiePie</title>
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
    <link rel="stylesheet" href="{{ asset('css/mspcss/overlay.css')}}">
    <link rel="stylesheet" href="//cgc.mysweetiepie.ca/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" />
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

    </style>
    @stack('styles')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>
  <!-- Global site tag (gtag.js) - Google Analytics -->

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-22591984-31"></script>

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-22591984-31');
</script>
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
        <div class="ps-container"><a class="ps-logo"  ><img src="{{ asset('imagesmsp/SweetiePie_Logo_santa.png')}}" alt=""></a>
          <div class="menu-toggle"><span></span></div>
          <div class="header__actions">
              <a href="tel:+16472453301" class="hidden-xs" style="font-size: 13px;border: 1px solid #000;display: inline;top: 12px;padding: 5px;font-weight: 500;border-radius: 20px;"><i class="fa fa-phone" style="position: relative;top: 1px;left: 0;transform: none;font-size: 17px;display: inline-block;padding: 0px 5px;"></i>Call Us Now</a>
              
            
           </div>
           
           
           
        </div>
        <div class="clear" style="clear:both;"></div>
      </nav>

    </header>
    @yield('contents')
    


    <div class="ps-footer--2" style="clear:both;float:none;">
      <div class="ps-footer__content">
         
           

          
        
        <div class="container">
            <!--<a class="ps-logo" href="{{url('/')}}"> <img src="{{ asset('imagesmsp/logowhite.png')}}" alt=""> </a>-->
        <a class="ps-logo footer_logo"><img src="{{ asset('imagesmsp/mspt.png')}}" alt=""> </a>
         
          
          <p>Head Office <span> | </span>301 Evans Ave, Etobicoke<span> | </span>ON, M8Z 1K2<span> | </span> <a href="tel://+16472453301"><i class="fa fa-phone"></i> +1 647-245-3301</a></p>
          
          <p>Queen Street <span> | </span>654 Queen Street West, Toronto<span> | </span>ON, M6J 1E5<span> | </span> <a href="tel://+14166139372"><i class="fa fa-phone"></i> +1 416-613-9372</a></p>
          
          <p>Harbord <span> | </span>326 Harbord St, Toronto<span> | </span>ON, M6G 1H1<span> | </span> <a href="tel://+14168407501"><i class="fa fa-phone"></i> +1 416-840-7501</a></p>
          
          <p>Unionville <span> | </span> 190 Main St Unionville, Markham<span> | </span>ON, L3R 2G9<span> | </span> <a href="tel://+19054159961"><i class="fa fa-phone"></i> +1  905-415-9961</a></p>
          
          <p>Danforth <span> | </span> 563 Danforth Ave, Toronto<span> | </span> ON M4K 1P9<span> | </span> <a href="tel://+4166139372"><i class="fa fa-phone"></i> +1  416-613-9372</a></p>
 
          <p>Distillery <span> | </span>  6 Case Goods Lane, Toronto<span> | </span> ON ON M5A 3C4</p>
 
          <ul class="ps-list--payment">
                <li><a href="#"><img src="{{asset('imagesmsp/visa.png')}}" alt=""></a></li>
                <li><a href="#"><img src="{{asset('imagesmsp/master-card.png')}}" alt=""></a></li>
                <!--<li><a href="#"><img src="images/payment-method/paypal.png" alt=""></a></li>-->
              </ul>
          <!--<a class="ps-btn" href="#"><i class="ba-route"></i> Find us on map</a>-->
        </div>
        
        
        
      </div>
      <div class="ps-footer__copyright">
        <div class="container">
          <p>
             © {{date('Y')}} MySweetiepie.ca,  All rights are reserved.</p>
        </div>
      </div>
    </div>
    <!--if(session('cityIdSet') == '')-->
   
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
    <script src="{{ asset('plugins/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('plugins/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('plugins/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('plugins/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
    <script src="{{ asset('plugins/jquery.waypoints.min.js')}}"></script>
    <script src="{{ asset('plugins/jquery.countTo.js')}}"></script>
    <script src="{{ asset('plugins/jquery.matchHeight-min.js')}}"></script>
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('plugins/gmap3.min.js')}}"></script>
    <script src="{{ asset('plugins/lightGallery-master/dist/js/lightgallery-all.min.js')}}"></script>
    <script src="{{ asset('plugins/slick/slick/slick.min.js')}}"></script>
    <script src="{{ asset('plugins/slick-animation.min.js')}}"></script>
    <script src="{{ asset('plugins/jquery.slimscroll.min.js')}}"></script>
    <!-- Custom scripts-->
    <script src="{{ asset('js/mspjs/main.js')}}"></script>
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxtvJ0YJGFFXjutPrmPSIOBtxk-XRvThI&callback=initMap"></script>
    <!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.min.js"></script>-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    @stack('scripts')
    <script src="//cgc.mysweetiepie.ca/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous"></script>
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
   
</script>
</html>