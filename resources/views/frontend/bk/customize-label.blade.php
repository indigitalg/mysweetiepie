@extends('layouts.sweetiepie')

@push('styles')

<style>

<?php

        $fontPath = public_path() . '/css/label-fonts';

        $fontIterator = new DirectoryIterator($fontPath);

        

        foreach ($fontIterator as $key => $fileinfo) {

            if (!$fileinfo->isDot()) {

?>

                @font-face {

                    font-family: <?php echo str_replace(' ','',substr($fileinfo, 0, strpos($fileinfo, "."))); ?>;

                    <?php 

                        $filetype = pathinfo($fileinfo, PATHINFO_EXTENSION);

                        if(strpos($fileinfo,'bold') !== false || strpos($fileinfo,'BOLD'))

                            echo "font-weight: bold;";

                    ?>

                    src: url("<?php echo url('css/label-fonts/'.$fileinfo); ?>") format("<?php echo $filetype == 'otf' ? 'opentype' :'truetype' ?>");

                }

<?php

            }

        }

?>

.sample-label {
  margin-bottom: 30px;
}

#sidebar-categories h3 {
  font-weight: bold;
  font-size: 120%;
}

#sidebar-categories a {
  display: block;
  margin-bottom: 5px;
}

#sidebar-categories a.active {
  color: #f993c3;
}

</style>


@endpush



@section('contents')



<div class="ps-hero bg--cover" data-background="/imagesmsp/product.jpg" style="height:300px !important;min-height:0px" background="url(/imagesmsp/product.jpg) no-repeat cover;">

  <div class="ps-hero__content">

    <h1>Customize your Cake Jar</h1>                           
    <div class="ps-breadcrumb">
      <ol class="breadcrumb">

        <li><a href="{{url('')}}">Home</a></li>

        <li class="active">Delivery Options</li>

      </ol>

    </div>

  </div>

</div>

<main class="ps-main" style="padding-top: 25px;">

  <div class="ps-container">

    <h2>Select a Label</h2>
    <hr/>
    <div class="row"> 
      <div class="col-sm-3">
        <div id="sidebar-categories">
          <h3>Categories</h3>
            <a href="#" class="occasiona-all active">All Categories</a>
            @foreach($occasions as $occasion)
              <a href="#" class="occasion-select" data-id="occasion{{$occasion->id}}" 
                                    data-name="{!! $occasion->name !!}">{!! $occasion->name !!}</a>
            @endforeach
        </div>
      </div>

      <div class="col-sm-9">
        <div class="row" id="label-thumbs">
          <div class="col-sm-12"><h4 id="category-name">All Categories</h4></div>
          <?php $counter = 0; ?>
          @foreach($labels as $label)
            <?php $counter++; ?>
            <div class="col-sm-3 label-item occasion{{$label->occasion_id}}">
              <div class="sample-label">
                <a href="{{url('shop/customize-label?item='.$item->id.'&step=2&label='.$label->id.'&options='.request()->options)}}">
                  <img src="/images/label/{{$label->picture}}" class="img-responsive" />
                </a>
              </div> 
            </div>  
            <?php if($counter>3) {
                
                echo '<div class="clearfix"></div>';
                $counter = 0;
                
            } ?>
          @endforeach
        </div>
      </div>
    </div>

  </div>

</main>



@endsection



@push('scripts')

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>


  $(document).ready(function(){

      $(".occasion-select").click(function(e){
          e.preventDefault();
          $(".occasiona-all").removeClass("active");
          $('.occasion-select').removeClass("active");
          $(this).addClass("active");
          var id = $(this).attr("data-id");
          var name = $(this).attr("data-name");
          $(".label-item").css("display","none");
          $("h4#category-name").text(name + ' Labels');
          $("."+id).css("display","block");
      })

      $(".occasiona-all").click(function(e){
         e.preventDefault();
         $(".occasiona-all").addClass("active");
         $("h4#category-name").text('All Labels');
         $(".label-item").css("display","block");
      })

  });



</script>

@endpush