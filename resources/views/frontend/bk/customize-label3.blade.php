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

#custom-labeler {
  padding: 25px;
  border: 1px solid #EEE;
  margin: 30px 0px;
}

#label-sidebar h3 {
  font-weight: bold;
  font-size: 110%;
}

#label-sidebar p {
  margin: 25px 0px;
  position: relative;
}

#label-sidebar p a.trash {
  display:none;
  float: right;
  position: absolute;
  z-index: 15;
  right:5px;
  top:12px;
}

#label-sidebar p:hover a.trash {
  display: block;
}

#label-sidebar input, .editor-input{
   border: 1px solid #DDD;
   width: 100%;
   padding: 10px;
   background: transparent;
   border-radius: 5px;
   color: #333;
   font-weight: bold;
}

#label-sidebar #add-field {
  border: 1px solid #f993c3;
  padding: 10px;
  font-weight: bold;
  width: 100%;
  display: block;
  text-align: center;
  font-size: 110%;
  color: #d771a1;
  border-radius: 5px;
}

#label-image {
  width:700px;
  height: 280px;
  margin: 30px auto;
  position: relative;
}

#customizable-area {
  position: absolute;
  z-index: 50;
  width: 320px;
  top: 0px;
  bottom: 0px;
  left:190px;
  font-size: 110%;
  background: url(/images/label/{{$label->picture}}) center center no-repeat;
  background-size: 700px 280px;
}

.text-line {
  text-align: center;
  margin: 15px 0px;
  font-family: Arial, Helvetica, sans;
  font-size:18px;
  color: #FFF;
  position: absolute;
  z-index: 150;
  padding: 10px;

}

.text-line:hover {
  border:1px dashed #DD0000;
}

.text-line.active {
  border: 1px solid #EEE;
}

#dynamic-edit {
  postion: absolute !important;
  z-index:100;
  width: 400px;
  box-shadow: 0px 0px 10px #555;
  border:1px solid #DDD;
  background: #FFF;
}

#dynamic-edit input {
  border-radius: 0px;
}

#dynamic-edit .editor-tool {
  padding: 5px; 
  border-right: 1px solid #DDD;
  float: left;
}

#dynamic-edit .editor-tool select {
  border-radius: 25px;
  border: 1px solid #EEE;
  padding: 5px 10px;

}

.editor-font {
  font-family: Arial;
}

#editor-close {
  padding: 3px;
}

#product-picture {
  position: relative;
  width: 450px;
  margin:0px auto;
}

#product-picture #labelPreview{
  position: absolute;
  z-index: 50;
  top:150px;
  left: 95px;
  width:255px;
  height:220px;
  overflow: hidden;
}

#product-picture #labelPreview img {

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
    <h2>Customize Label</h2>
    <div id="custom-labeler">
      <div class="row"> 
        <div class="col-sm-3">
          <div id="label-sidebar">
            <h3>Enter Text</h3>
            <p><a href="#" id="add-field">Add New Text Field</a></p>
            <div id="label-texts">
              
            </div>
          </div>
        </div><!-- Sidebar //-->

        <div class="col-sm-9">
          <div id="label-image">
            <img src="/images/label/{{$label->picture}}" class="img-responsive" /> 
            <div id="customizable-area">

            </div>
            <div id="dynamic-edit" style="display:none;">
              <a href="#" id="editor-close" class="pull-right"><i class="fa fa-times" ></i></a>
              <div class="dynamic-top">
                <div class="editor-tool">
                  <select name="font" class="edit-box" id="editor-font">
                    <option value="Arial, Helvetica, sans">Arial - Default font</option>
                    <?php foreach ($fontIterator as $key => $fileinfo) {
                          if(!$fileinfo->isDot()) { ?>
                          <option value="<?php echo str_replace(' ','',substr($fileinfo, 0, strpos($fileinfo, "."))); ?>" 
                            style="font-family:<?php echo str_replace(' ','',substr($fileinfo, 0, strpos($fileinfo, "."))); ?>;"><?php echo ucwords(substr($fileinfo, 0, strpos($fileinfo, "."))); ?></option>
                      <?php } } ?>
                  </select>
                </div>
                <div class="editor-tool">
                  <select name="font" class="edit-box" id="editor-size">
                    <option value="">Text Size</option>
                    <?php for($i=8;$i<300;$i+=2) { ?>
                      <option value="<?php echo $i;?>"><?php echo $i;?></option>
                    <?php    
                      }
                    ?>
                  </select>
                </div>
                <div class="editor-tool">
                  <input type="color" class="edit-box" id="editor-color" />
                  <input type="hidden" id="edit-id" value="">
                </div>
              </div>
              <div class="dynamic-bottom"><input type="text" value="" id="edit-text" class="editor-input"></div>
            </div>
          </div>
        </div><!-- Col //-->
      </div><!-- Row //-->
      <div id="submit-label" class="text-right">
        <form action="{{url('products/'.$item->slug)}}" method="POST" id="LabelForm" >
            <input type="hidden" name="item" value="{{$item->id}}" />
            <input type="hidden" name="new_label" value="" id="new-label" />
            <input type="hidden" name="label_customized" value="yes" />
            <?php $options = request()->options; ?>
            @foreach(unserialize(decrypt($options)) as $key=>$val)
              @if($key != '_token')
                <input type="hidden" name="{{$key}}" value="{{$val}}" />
              @endif
            @endforeach
            <button type="button" class="ps-btn" value="Cancel" id="CancelContinue">Cancel & Continue</button> 
            @csrf 
            <button type="button" class="ps-btn ps-btn--yellow" id="shotPreview" name="Preview">Preview & Checkout</button>
        </form>
      </div>
    </div><!-- Custom Labeler //-->
  </div>
</main>

<div class="modal" tabindex="-1" role="dialog" id="previewDialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Custom Label Preview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="product-picture">
          <img src="/images/products/{{$item->picture}}" />
          <div id="labelPreview"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="ps-btn" data-dismiss="modal">Close</button>
        <button type="button"  class="ps-btn ps-btn--yellow" id="saveValues" >Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection



@push('scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="/js/html2canvas.js"></script>
<script>

$(document).ready(function(){

  //var textid = addField('Your Full Name');
  //addTextLine(textid);

  //textid = addField('Event Name');
  //addTextLine(textid);

  //textid = addField('Date or Event');
  //addTextLine(textid);

  $("#saveValues").click(function(e){
      e.preventDefault();
      $("#LabelForm").submit();
  })

  $("#CancelContinue").click(function(e){
     $("#LabelForm").submit();
  })

  $("#customizable-area").mouseleave(function(){
      if($("#edit-id").val() == '') {
          $(".text-line").removeClass("active")
      }
  })

  $("#editor-close").click(function(e){
      e.preventDefault();
      $("#dynamic-edit").css("display","none");
      $("#edit-id").val('');
      $("#editor-font").val('');
      $("#editor-size").val('');
      $("#editor-color").val('');
  })

  $("#editor-font").change(function(){
      var id = $("#edit-id").val()
      $("#show_"+id).css("font-family",$(this).val());
      $(this).css("font-family",$(this).val());
  });

  $("#editor-size").change(function(){
      var id = $("#edit-id").val()
      $("#show_"+id).css("font-size",$(this).val()+'px');
  });

  $("#editor-color").change(function(){
      var id = $("#edit-id").val()
      $("#show_"+id).css("color",$(this).val());
  })

  $("#edit-text").keyup(function(){
      var id = $("#edit-id").val();
      $("#text_"+id).val($(this).val());
      $("#show_"+id).text($(this).val());
  })

  $("body").delegate(".text-line","click",function(){
      $(".text-line").removeClass("active")
      var id = $(this).attr("id");
      $(this).addClass("active");
      id = id.slice(5);

      $("#edit-text").val($("#text_"+id).val());
      $("#edit-id").val(id);

      $(this).addClass("active");

      var position = $(this).position();

      $("#dynamic-edit").attr("style","display:block;");

      $("#editor-color").val($("#show_"+id).css("color"));
      $("#editor-font").val($("#show_"+id).css("font-family"));
      $("#editor-size").val($("#show_"+id).css("font-size").slice(0,-2));
      $("#editor-font").css("font-family",$("#show_"+id).css("font-family"));

      $("#dynamic-edit").css("bottom",Math.floor(280-position.top)+"px");
      $("#dynamic-edit").css("left",Math.floor(position.left+210)+"px");
      $("#dynamic-edit").css("position","absolute");
  });

  $("body").delegate(".text-input","keyup", function(){
      var id = $(this).attr("id");
      id = id.slice(5);
      $("#show_"+id).text($(this).val())
  });

  $("#add-field").click(function(e){
      e.preventDefault();
      var textid = addField('New text line');
      addTextLine(textid);
  });

  $("body").delegate("a.trash","click",function(e){
      e.preventDefault();
      var id=$(this).attr("data-id");
      $("#show_"+id).remove();
      $(this).parent().remove();
  })

  function addField(value = '') {
      var unique_id = myUniqueID();
      if($("#customizable-area").children().length < 4) {
        $("#label-texts").append('<p><input type="text" value="'+value+'" placeholder="Enter Text" id="text_'+unique_id+'" class="text-input" />  <a href="#" class="trash" data-id="'+unique_id+'"><i class="fa fa-trash" aria-hidden="true"></i></a></p>');
      }
      return unique_id;
  }

  function addTextLine(textid = '') {
      var text = $("#text_"+textid).val();

      if($("#customizable-area").children().length < 4) {
        $("#customizable-area").append('<div class="text-line draggable" id="show_'+textid+'">'+text+'</div>');
        $("#show_"+textid ).draggable();
      }
  }

})

$("#shotPreview").click(function(){
    $(".text-line").removeClass("active")

    let div = document.getElementById('customizable-area'); 

    html2canvas(div,{logging:true,scale:1}).then(function(canvas) { 
        var canvasImg = canvas.toDataURL("image/jpg");
        $("#new-label").val(canvas.toDataURL());
        $('#labelPreview').html('<img src="'+canvasImg+'" />');
        $("#previewDialog").modal("show")
    }) 
})

function myUniqueID(){
    return Math.random().toString(36).slice(7);
}

</script>
@endpush