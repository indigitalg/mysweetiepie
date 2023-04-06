@extends('layouts.mobile')

@section('contents')

<div id="box-wrapper">

    <div id="box">
        <p id="logo" style="text-align:center;"><img src="/imagesmsp/mspt.png" style="width:200px;height:auto;" /></p>
        
        

        @if(isset($item))

           @if($item->status === 2 && !empty($item->delivered_at))

                <h1 style="text-align:center;">Delivery Confirmed</h1>

                <p id="delivery-type"><br/>
                  <img src="/img/true.png" />
                  <br/><br/>
                </p>

                <address>
                
                    <p><strong>This product is already delivered</strong></p>

                </address>

           @else

                <form action="" method="POST">

                    <h1>Delivery Confirmation</h1>
                    
                    <address id="address">
                        <p>{{$item->address->firstname.' '.$item->address->lastname}}<br/>
                        {{$item->address->address}}<br/>
                        {{$item->address->city}}, {{$item->address->province}} {{$item->address->postalcode}}</p>
                    </address>

                    <p id="delivery-type">
                        <label>Select a delivery type</label>
                        <select name="delivery_type">
                            <option value="Left at the door">Left at the door</option>
                            <option value="Left with doorman">Left with dooorman</option>
                            <option value="Left with recipient">Left with recipient</option>
                            <option value="Not able to deliver">Not able to deliver</option>
                        </select>
                    </p>
                    
                    <p>
                        <button type="submit">Confirm Delivery</button>
                        @csrf
                        <input type="hidden" name="item_id" value="{{$item->id}}">
                    </p>
                </form>


           @endif
        
        @else
            <h1>Delivery Completed</h1>

            
            <p id="delivery-type"><br/>
              <img src="/img/true.png" />
              <br/><br/>
            </p>

            

            <address>
            
                <p><strong>Thank you for confirming the Delivery</strong></p>

            </address>
            


        @endif
    </div>

</div>


@endsection


@section('bottom-scripts')

<script type="text/javascript">
    
    $(document).ready(function(){
        @if(!isset($item))

        setTimeout(function(){
          /*  window.location.href = '{{url('/')}}';*/
        }, 3000);
 
        @endif
    })



</script>


@endsection



@section('pagestyles')

<style>


#box-wrapper {
   display: block;
}


#box {
    max-width: 600px;
    margin:0px auto;
    padding: 15px 25px;
    text-align:center;
    line-height: 150%;
}

h1, #box h1 {
    font-weight: 900;
    font-size: 200%;
}


address, #box address {
    font-size: 120%;
    font-style: normal !important;
    border: 3px dashed #EEE;
    padding: 15px;
    margin: 20px 0;
}

p {
    margin: 20px 0;
}

p#logo {
    margin-bottom: 25px;
}

p#delviery-type {
      
}

select {
    width: 100%;
    padding: 15px;
}




#box ul li label {
    vertical-align: middle;
    font-size: 120%;
    font-weight: bold;
    line-height: 150%;
}

#box ul li input[type=radio] {
    border: 0px;
    vertical-align: text-bottom;
    width: 1.2em;
    height: 1.2em;
    margin-right: 15px;
}

#box button {
    background: #a80505;
    color: #FFF;
    font-weight: bolder;
    padding: 15px 30px;
    border: none;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    width: 100%;
    text-transform: uppercase;
    font-size: 120%;
    border-bottom: 3px solid rgba(0,0,0,0.5);
    border-right: 3px solid  rgba(0,0,0,0.5);
    outline: none;

}

#box button:active {
    border: none;
}

</style>

@endsection
