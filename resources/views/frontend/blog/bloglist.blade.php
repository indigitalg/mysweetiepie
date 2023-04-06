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
          <h2 class="text-center">Blogs & Media</h2>
      </div>
      <div class="clearfix"></div>
</div>

    <main class="ps-main">

      <div class="ps-container">

        <div class="row">

         

          <div class="col-sm-9">

               @if(isset($blog) && count($blog)>0)

              @foreach($blog as $bl)

            <div class="ps-post--vertical">

            <div class="col-sm-4 blogleft">

              <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="#"></a><img src="{{asset('images/blogs/'.$bl['picture'])}}" alt=""/></div>

            </div>

            <div class="col-sm-8 blogright">

              <div class="ps-post__content">

                <div class="ps-post__meta">

                   

                  <div class="ps-post__posted"><span class="date">{{date('d',strtotime($bl['published_at']))}}</span><span class="month">{{date('M',strtotime($bl['published_at']))}}</span></div>

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

                  <h3 class="ps-post__title"><a href="{{url('blogdetail/'.$bl['id'])}}">{{$bl['name']}}</a></h3>

                  <div class="ps-post__byline"><a href="#">{{$bl['cname']}}</a></div>

                  <p>{!!$bl['description']!!}</p><a class="ps-post__morelink" href="{{url('blogdetail/'.$bl['id'])}}">READ MORE</a>

                </div>

              </div>

              </div>

               <div class="clear" style="clear:both;"></div>

            </div>

            @endforeach

             @else

         <center> Sorry No Blogs Availiable</center>

          @endif

          </div>

         

          <div class="col-sm-3">

            <div class="ps-blog__sidebar">

             

              <div class="widget widget_recent-posts">

                <h3 class="widget-title">Recent Post</h3>

                @foreach($post as $b)

                <div class="ps-post--sidebar">

                  <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="#"></a><img src="{{asset('images/blogs/'.$b['picture'])}}" alt=""></div>

                  <div class="ps-post__content"><a class="ps-post__title" href="{{url('blogdetail/'.$b['id'])}}">{{$b['name']}}</a>

                    <p>{{date('M d Y',strtotime($b['published_at']))}}</p>

                  </div>

                </div>

                @endforeach

                

              </div>

              <div class="widget widget_recent-posts">

                <h3 class="widget-title">Categories</h3>

                <ul>

                @foreach($cat as $b)

                <div class="ps-post--sidebar">

                  <!--<div class="ps-post__thumbnail"><a class="ps-post__overlay" href="#"></a><img src="{{asset('images/blogs/'.$b['picture'])}}" alt=""></div>-->

                  <div class="ps-post__content">

                     <li> <a class="ps-post__title" href="{{url('blogs?cat='.$b['slug'])}}">{{$b['name']}}</a></li>

                  </div>

                </div>

                @endforeach

                </ul>

              </div>

             

            </div>

          </div>

        </div>

      </div>

    </main>

    @endsection