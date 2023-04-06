@extends('layouts.sweetiepie')

@section('contents')

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

          <div class="col-lg-9 col-md-4 col-sm-12 col-xs-12 ">

            <div class="ps-post--detail">

              <div class="ps-post__thumbnail"><img src="{{asset('images/blogs/'.$blog->picture)}}" alt="" style="width:200px;"></div>

              <div class="ps-post__content">

                <div class="ps-post__meta">

                  <div class="ps-post__posted"><span class="date">{{date('d',strtotime($blog->published_at))}}</span><span class="month">{{date('M',strtotime($blog->published_at))}}</span></div>

                  <div class="ps-post__actions">

                    <!--<div class="ps-post__action red"><a href="#"><i class="ba-heart"></i></a></div>-->

                    <!--<div class="ps-post__action cyan"><a href="#"><i class="fa fa-comment-o"></i></a></div>-->

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

                  <h3 class="ps-post__title">{{$blog->name}}</h3>

                  <p class="ps-post__info"> <a href="">{{$blog->cname}}</a></p>

                  <p>{!! $blog->description !!}</p>

                 

                </div>

              </div>

              

            </div>

           

          </div>

          <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 ">

            <div class="ps-blog__sidebar">

              

              <div class="widget widget_recent-posts">

                <h3 class="widget-title">Recent Post</h3>

                @foreach($rp as $r)

                <div class="ps-post--sidebar">

                  <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="#"></a><img src="{{asset('images/blogs/'.$r['picture'])}}" alt=""></div>

                  <div class="ps-post__content"><a class="ps-post__title" href="{{url('blogdetail/'.$r['id'])}}">{{$r['name']}}</a>

                    <p>{{date('M d Y',strtotime($r['published_at']))}}</p>

                  </div>

                </div>

                @endforeach

                

              </div>

              <div class="widget widget_recent-posts">

                <h3 class="widget-title">Categories</h3>

                <ul>

                @foreach($cat as $b)

                <div class="ps-post--sidebar">

                  

                  <div class="ps-post__content">

                     <li> <a class="ps-post__title" href="{{url('blogs?cat='.$b['slug'])}}">{{$b['name']}}</a></li>

                  </div>

                </div>

                @endforeach

                </ul>

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