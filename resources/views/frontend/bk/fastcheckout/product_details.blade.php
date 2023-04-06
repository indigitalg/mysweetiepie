@extends('fastcheckout/sweetiepie')

@push('styles')
<style>
@import url('https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,500;0,700;1,500;1,700&display=swap');


#select-pickup {
    display: flex;
    flex-direction: row;
    align-items: stretch;
    margin-bottom: 20px;
    justify-content: stretch;
}

.pickuploc {
    border: 1px solid #DDD;
    padding: 20px;
    background: url(/img/storefront.png) no-repeat right 50px center;
}

#select-pickup .pickuploc {
    width: calc(100% - 200px);
}

#date-select {
    display: flex;
    flex-direction:column;
    align-items:stretch;
    justify-content:stretch;
}

#date-select label {
    display: flex;
    border: 1px solid #DDD;
    padding: 20px;
    text-align:center;
    cursor: pointer;
    margin: 0px;
    border-left: 0px;
    height:50%;
    align-items:center;
    justify-content:center;
}

#date-select label:first-child {
    border-bottom: 0px;
}

#date-select label span {
    font-weight: bold;
    text-transform: uppercase;
}


#date-select label.active {
    border: 1px solid #ce6f9b;
}

#select-pickup #date-select {
   width: 200px;
}
    
#date-select label:hover {
    background: #ce6f9b;
    color: #FFF;
}

</style>

@endpush

 @section('contents')

    <div class="ps-hero bg--cover" style="height:130px !important;min-height:0px"  no-repeat cover;">
        <div class="ps-hero__content">
            
        </div>
    </div>
        
    <div class="catgmain">
        <div id="page-category-title" class="top-title">
            <h2 class="text-center">Continue checkout</h2>
        </div>
        <div class="clearfix"></div>
    </div>

    <main class="ps-main" style="padding-bottom: 15px;">

      <div class="ps-container">

        <div class="ps-product--detail" style="margin-bottom:0px;">

          <div class="row">

            <div class="col-sm-6 col-sm-offset-3">
            
                <form action="/fundraiser/add-cart" method="POST" />
                @csrf
                <input type="hidden" name="postvars" value="{{$postvars}}"/>
                
                <div id="select-pickup">
            
                    <div class="pickuploc">
                        <h4>Pick up from</h4>
                        <h5>{{strtoupper($store->store_code)}}</h5>
                        <p>{{$store->name}}<br>{{$store->address}}<br>{{$store->city}}, {{$store->postalcode}}</p>
                    </div>
                    <div id="date-select" >
                            <label ><input type="radio" name="pickup_date" value="2021-12-21" checked="checked" /> &nbsp; 21<sup>th</sup> &nbsp; <span>December</span></label>
                            <label ><input type="radio" name="pickup_date" value="2021-12-22" checked="checked" /> &nbsp; 22<sup>th</sup> &nbsp; <span>December</span></label>
                            <label ><input type="radio" name="pickup_date" value="2021-12-23" checked="checked" /> &nbsp; 23<sup>th</sup> &nbsp; <span>December</span></label>
                    </div>
                </div>
                
                
                <div style="margin:30px auto;text-align:center;"><button type="submit" class="ps-btn ps-btn--yellow submit-order" style="width:100%;" >Proceed To Checkout</button></div>
                
                </form>
        
            </div>

          </div>

        </div>

      </div>

    </main>

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2887.062192746794!2d-79.40897748450247!3d43.64687437912149!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b34e6b54646b7%3A0xf7279ee6ea52590b!2s654%20Queen%20St%20W%2C%20Toronto%2C%20ON%20M6J%201E5!5e0!3m2!1sen!2sca!4v1620225112381!5m2!1sen!2sca" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                

   

     @endsection

     @push('scripts')

    <script>
    
    alert('here cmes');
    
    $(document).ready(function(){
        alert('here3 comes');
    
    });
    
        $(function(){
        alert('loaded');
        
        $(".select-date").click(function(){
        alert('here comes');
            $(".select-date").removeClass("active");
            $(this).addClass("active");
        
        });
    
    
    </script>

     @endpush