 @extends('fastcheckout/sweetiepie')
 
 
 @push('styles')
 <style>
     
    .fundraiser_banner {
        background: url(/imagesmsp/fundraiser.webp) no-repeat center center;
        min-height:700px;
        background-size:cover;
    }
     
     
    .orderbutton {
        margin-bottom: 30px;
    }
     
     .form-group--number.quantitybox input.form-control{
    float:left;
    max-width:calc(100% - 80px);
}
.form-group--number.quantitybox button{
      float:left;  
}  
.orderbutton{
    margin-bottom:60px;
    text-align:right;
}
.orderbutton button{
    padding-top:11px;
    padding-bottom:9px;
}
.category_selector {
    padding: 0px;
    margin-top: 50px;
    margin-bottom:30px;
}

.category_selector h3 {
    color: #f993c3;
    text-decoration:underline;
    margin-bottom: 25px;
}


.category_selector ul {
    list-style:none;
    padding:0px;
    margin:0px;
}

.category_selector li{
    padding:0px;
    list-style:none;
    margin-bottom: 15px;
    
}
.category_selector li a{
    color: #000;
    font-size: 130%;
    font-family:ChunkFive;
}

.category_selector li a:hover {
    color: #f993c3;
    text-decoration: underline;
}



.addtocart_button button{
    width:90%;
    padding-left: 15px;
    padding-right: 15px;
    padding-top: 11px;
    padding-bottom: 9px;
}
.stickycategorylsts{
    position:sticky;
    top:20px;
}
@media only screen and (max-width: 992px) {
 .category_selector{
     width:100%;
 }   
 .addtocart_button button{
      width:100%;
 }
}    
     
 </style>
 
 @endpush
 
 @section('contents')


<div class="ps-hero bg--cover" style="height:130px !important;min-height:0px;">
      <div class="ps-hero__content">
        
      </div>
  </div>
    
    <div class="catgmain fundraiser_banner">
        <div class="container">
        <h2 class="text-center">Sweetie Pie Fundraiser Program Order Form</h2>
        </div>
    </div>
    


<div class="ps-home-product ps-menu-product bg--cover" data-background="">
  <div class="ps-container">
      
    <div class="row">

        <div class="col-md-12">
            <div style="text-align:center; padding-bottom: 100px;">
                <h2>Thank You for your interest in Charles G. Fraser Public School Pie Drive 2021. The Pie Drive is now closed.</h2>
                
                <p>
                    <a class="ps-btn" href="/menu"  style="background-color: rgb(249, 147, 195); border: none; color: white;">View our menu</a>
                </p>
                
                
            </div>
            
        </div>

       
    </div>
      
    

  </div>
</div>


@endsection