

@extends('layouts.sweetiepie')

        @section('contents')

<style>

.col-sm-8.blogright{

    padding-left:0px; 

 }  

 .col-sm-8.blogright .ps-post__container{

     padding-left:10px !important;

 }

 .ps-post--vertical .ps-post__title a{

     line-height: 32px !important;

     font-size:26px !important;

 }

  .ps-post--vertical .col-sm-4.blogleft .ps-post__thumbnail img {

    width: 100%;

    height: 180px !important;

    object-fit: cover;

} 

 @media only screen and (max-width: 768px) {

  .ps-post--vertical {

    width:70%;

    margin-left:auto;

    margin-right:auto;

  }

  .ps-blog__sidebar{

      width:70%;

    margin-left:auto;

    margin-right:auto;  

  }

 .ps-post--vertical .col-sm-4.blogleft .ps-post__thumbnail img {

       height:auto !important;

   }

}

 @media only screen and (max-width: 640px) {

       .ps-post--vertical{

         width:100%;  

       }

         .ps-blog__sidebar{

             width:100%;

         }

 }

</style>

<div class="ps-hero bg--cover" style="height:130px !important;min-height:0px"  no-repeat cover;">
    <div class="ps-hero__content">
      
    </div>
</div>
  
<div class="catgmain">
      <div id="page-category-title" class="top-title">
          <h2 class="text-center">Recipes</h2>
      </div>
      <div class="clearfix"></div>
</div>

    <main class="ps-main">

      <div class="ps-container">

        <div class="row">

          <div class="col-sm-9">

              @foreach($blog as $bl)

            <div class="ps-post--vertical">

              <div class="col-sm-4 blogleft">

              <div class="ps-post__thumbnail" style="margin-top:6px"><a class="ps-post__overlay" href="#"></a><img src="{{asset('images/blogs/'.$bl['picture'])}}" alt=""></div></div>

<div class="col-sm-8 blogright">

              <div class="ps-post__content">

                <div class="ps-post__meta">

                    @php

                    @endphp

                  <div class="ps-post__posted"><span class="date">{{$bl['created_at']->format('d')}}</span><span class="month">{{$bl['created_at']->format('M')}}</span></div>

                  <div class="ps-post__actions">

                    <!--<div class="ps-post__action red"><a href="#"><i class="ba-heart"></i><span><i>10</i></span></a></div>-->

                    <!--<div class="ps-post__action cyan"><a href="#"><i class="fa fa-comment-o"></i><span><i>5</i></span></a></div>-->

                    <div class="ps-post__action shared"><a href="#"><i class="fa fa-share-alt"></i> Share</a>

                      <ul class="ps-list--shared">

                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>

                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>

                        <li class="google"><a href="#"><i class="fa fa-google-plus"></i></a></li>

                      </ul>

                    </div>

                  </div>

                </div>

                <div class="ps-post__container">

                  <h3 class="ps-post__title"><a href="{{url('recipesdetail/'.$bl['id'])}}">{{$bl['name']}}</a></h3>

                  <div class="ps-post__byline"><a href="#">{{$bl['cname']}}</a></div>

                  <p>{!!$bl['description']!!}</p><a class="ps-post__morelink" href="{{url('recipesdetail/'.$bl['id'])}}">READ MORE</a>

                </div>

              </div>

              </div>

              <div class="clear" style="clear:both;"></div>

            </div>

            @endforeach

            <!--<div class="mt-50">-->

            <!--  <div class="ps-pagination">-->

            <!--    <ul class="pagination">-->

            <!--      <li><a href="#"><i class="fa fa-angle-double-left"></i></a></li>-->

            <!--      <li class="active"><a href="#">{{$blog['links']}}</a></li>-->

                  <!--<li><a href="#">2</a></li>-->

                  <!--<li><a href="#">3</a></li>-->

                  <!--<li><a href="#">4</a></li>-->

            <!--      <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>-->

            <!--    </ul>-->

            <!--  </div>-->

            <!--</div>-->

          </div>

          <div class="col-sm-3">

            <div class="ps-blog__sidebar">

             <!-- <div class="widget widget_search">

                <form class="ps-form--widget-search" action="do_action" method="post">

                  <input class="form-control" type="text" placeholder="Search Post...">

                  <button><i class="ba-magnifying-glass"></i></button>

                </form>

              </div>-->

              <!--<div class="widget widget_category">-->

              <!--  <h3 class="widget-title">Archive</h3>-->

              <!--  <ul class="ps-list--arrow">-->

              <!--    <li><a href="#">All Shoes (321)</a></li>-->

              <!--    <li><a href="#">Amazin’ Glazin’</a></li>-->

              <!--    <li><a href="#">The Crusty Croissant</a></li>-->

              <!--    <li><a href="#">The Rolling Pin</a></li>-->

              <!--    <li><a href="#">Skippity Scones</a></li>-->

              <!--    <li><a href="#">Mad Batter</a></li>-->

              <!--    <li><a href="#">Confection Connection</a></li>-->

              <!--  </ul>-->

              <!--</div>-->

              <!--<div class="widget widget_ads">-->

              <!--  <h3 class="widget-title">Ads Banner</h3><img src="images/widget-ads.jpg" alt="">-->

              <!--</div>-->

              <div class="widget widget_recent-posts">

                <h3 class="widget-title">Recent Post</h3>

                @foreach($blog as $b)

                <div class="ps-post--sidebar">

                  <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="#"></a><img src="{{asset('images/blogs/'.$b['picture'])}}" alt=""></div>

                  <div class="ps-post__content"><a class="ps-post__title" href="{{url('recipesdetail/'.$b['id'])}}">{{$b['name']}}</a>

                    <p>{{$b['created_at']->format('M d Y')}}</p>

                  </div>

                </div>

                @endforeach

                <!--<div class="ps-post--sidebar">-->

                <!--  <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="#"></a><img src="images/posts/blog-2.jpg" alt=""></div>-->

                <!--  <div class="ps-post__content"><a class="ps-post__title" href="blog-detail.html">Micenas Placerat Nibh Loreming Fentum</a>-->

                <!--    <p>Sep 29, 2017</p>-->

                <!--  </div>-->

                <!--</div>-->

                <!--<div class="ps-post--sidebar">-->

                <!--  <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="#"></a><img src="images/posts/blog-3.jpg" alt=""></div>-->

                <!--  <div class="ps-post__content"><a class="ps-post__title" href="blog-detail.html">Micenas Placerat Nibh Loreming Fentum</a>-->

                <!--    <p>Sep 29, 2017</p>-->

                <!--  </div>-->

                <!--</div>-->

              </div>

              <!--<div class="widget widget_tags">-->

              <!--  <h3 class="widget-title">Tags</h3><a href="#">Men</a><a href="#">Woman</a><a href="#">B&C</a><a href="#">Ugly fashion</a><a href="#">Nike</a><a href="#">Diar</a><a href="#">Adidas</a>-->

              <!--</div>-->

            </div>

          </div>

        </div>

      </div>

    </main>

    @endsection

