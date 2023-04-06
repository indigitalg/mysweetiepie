 @extends('fastcheckout/sweetiepie')
 
 
 @push('styles')
 <style>
 @font-face {
    font-family: 'DK Woolwich';
    src: url('/fonts/DKWoolwich-Regular.eot');
    src: url('/fonts/DKWoolwich-Regular.eot?#iefix') format('embedded-opentype'),
        url('/fonts/DKWoolwich-Regular.woff2') format('woff2'),
        url('/fonts/DKWoolwich-Regular.woff') format('woff'),
        url('/fonts/DK Woolwich.otf') format('otf'),
        url('/fonts/DKWoolwich-Regular.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;
    font-display: swap;
}
@font-face {
    font-family: 'BERNIERTM';
    src: url('/fonts/BERNIERREGULAR.eot');
    src: url('/fonts/BERNIERREGULAR.eot?#iefix') format('embedded-opentype'),
        url('/fonts/BERNIERREGULAR.woff2') format('woff2'),
        url('/fonts/BERNIERREGULAR.woff') format('woff'),
        url('/fonts/BERNIERREGULAR.ttf') format('truetype'),
        url('/fonts/BERNIERREGULAR.svg#BERNIERREGULAR') format('svg');
    font-weight: normal;
    font-style: normal;
    font-display: swap;
}
.fundraiser-banner img{
    width:100%;
}
.pie-drive-cnt{
    background-color:#f5eff1;
	justify-content: center;
	display: flex;
	flex-direction: column;	
	padding:15px;
}
.pie-drive-cnt h2{
    font-family: 'DK Woolwich';
    color:#b63d84;
	font-size:48px;
	line-height: 55px;
	margin-bottom:15px;
}
.pie-drive-cnt h5{
    font-family: 'DK Woolwich';
    color:#000;
	font-size:28px;
	line-height:30px;
}
.pie-drive-cnt ul li{
	font-family: 'BERNIERTM';
	color:#000;
	font-size:20px;
	line-height:43px;
}
.fundraiser_subscptnform h3{
    font-size:26px;
    line-height:36px;
    background-color:#b63d83;
    color:#fff;
    margin-bottom:15px;
    text-align:center;
}
.fundraiser_subscptnform form input[type="text"], .fundraiser_subscptnform form input[type="email"], .fundraiser_subscptnform form input[type="date"]{
    background-color:#f6f6f6;
    padding: 7px 10px;
    margin-bottom:20px;
    width:100%;
    border:none;
}
.fundraiser_subscptnform form label{
    color:#505050;
    font-size:12px;
    line-height:22px;
    margin-bottom:5px;
    font-family: 'Poppins', sans-serif;
    font-weight:500;
    display:inline-block;
}
.fundraiser_subscptnform form input[type="submit"]{
    background-color:#a9a9a9;
    color:#fff;
    padding: 10px 20px;
    border:none;
    font-family: 'Poppins', sans-serif;
    font-weight:500;
    font-size:11px;
    line-height:22px;
    border:1px solid #a9a9a9;
}
.currentpiedrive-box{
    border:2px dashed #f993c3;
}
.currentpiedrive-box {
  border: 3px dashed #f993c3;
  border-radius: 25px;
  text-align:center;
  position:relative;
  margin-top:30px;
}
.currentpiedrive_info .opd-title{
  background-color:#f993c3;
  padding-left:20px;
  padding-right:20px;
  position:absolute;
  left: 0;
  right: 0;
  width: 435px;
  margin-left: auto;
  margin-right: auto;
  top: -35px;
}
.currentpiedrive_info .opd-title h2{
  font-family: 'BERNIERTM';
  color:#fff;
  font-size:60px;
  line-height:66px;  
  margin-bottom:0;
}
.opd-content {
  margin-top: 40px;
  display:flex;
  flex-direction:row;
}
.opd-content .opd-list{
   width: 50%;
   text-align: center;
   padding:25px;
}
.opd-content h3{
  font-family: 'Poppins', sans-serif;
  font-weight:700;
  font-size:35px;
  line-height:45px;
  color:#000;
  font-weight:800;
  width: 350px;
  margin-left: auto;
  margin-right: auto;
  max-width: 100%;
}
.fundraiser_subscptnform form input[type="submit"]:hover{
    color:#505050;
    background-color:#fff;
}
.fundraiser-content {
  padding-bottom: 50px;
}
.col-md-6.piedrive-img{
  padding-right:0;
}
.col-md-6.piedrive-infobox{
  padding-left:0;  
}
@media only screen and (max-width:1200px) {
 .pie-drive-cnt h2{
    font-size: 40px;
    line-height: 50px;  
 }
 .pie-drive-cnt h5{
   font-size: 26px;
   line-height:30px;    
 }   
 .pie-drive-cnt ul li {
  font-size: 17px;
  line-height: 32px;
}   
}  
@media only screen and (max-width:992px) {
.fundraiser-banner{
   margin-bottom:25px; 
}
.fundraiser_subscptnform {
  margin-top: 25px;
  margin-bottom: 25px;
}
.fundraiser-content {
  padding-bottom:25px;
}
.currentpiedrive_info .opd-title{
  width:380px;
}
.currentpiedrive_info .opd-title h2{
  font-size:50px;
  line-height:60px;
}
.opd-content h3{
    font-size:30px;
    line-height:40px;
}
.opd-content .opd-list{
    padding:20px;
}
.col-md-6.piedrive-img{
  padding-right:15px;
}
.col-md-6.piedrive-infobox{
  padding-left:15px;  
}
}
@media only screen and (max-width:640px) {
.pie-drive-cnt h2{
  font-size: 35px;
   line-height: 45px;  
}
.pie-drive-cnt h5{
  font-size: 23px;
  line-height:28px;    
}   
.pie-drive-cnt ul li {
  font-size: 16px;
  line-height: 28px;
} 
.opd-content .opd-list{
  padding:10px;
}
.opd-content h3{
   color: #000;
   font-weight: 600;
   font-size: 25px;
}
} 

@media only screen and (max-width:480px) {
 .currentpiedrive_info .opd-title h2 {
  font-size: 35px;
  line-height: 45px;
}  
.currentpiedrive_info .opd-title{
    top:-25px;
}
.currentpiedrive_info .opd-title {
  width: 270px;
}
.opd-content{
  display:block;    
}
.opd-content .opd-list {
  width: 100%;
  text-align: left;
  padding:0 15px 10px;
}
.opd-content h3{
  width:auto;
  font-size: 20px;
  line-height: 25px;
}

}
 </style>
 
 @endpush
 
 @section('contents')


<div class="ps-hero bg--cover" style="height:130px !important;min-height:0px;">
    <div class="ps-hero__content">
        
    </div>
</div>

<div class="fundraiser-content">
<div class="fundraiser-banner mb-50">
	<img src="/imagesmsp/sweetiepie_sweetiepie_piedrive_banner.jpg" alt="Sweetie Pie Fundraising Pie Drive" title="Sweetie Pie Fundraising Pie Drive" />
</div> 
<div class="pie-drive-info pb-50 pt-50">
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-6" class="piedrive-img">
				<div class="pie-drive-img">
					<img src="/imagesmsp/piedrive-image.jpg" alt="piedrive-image"/>
				</div>
			</div>
			<div class="col-md-6" class="piedrive-infobox">
				<div class="pie-drive-cnt p-3">
					<h2>Get a branded Pie Drive page for your school</h2>
					<h5>What the school will get</h5>
					<ul>
						<li>A branded school splash page</li>
						<li>Simple order and payment process</li>
						<li>Email order confirmation to parents</li>
						<li>Select your start and end dates for pie drive</li>
						<li>Select your pick-up dates and store location</li>
						<li>Raise money for your school programs</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>   
   
<div class="fundraiser_subscptnform mb-50 mt-50">
    <div class="container">
        <div class="row clearfix">
        <div class="col-md-12">
            <h3>Sign Up Now</h3>
            <form action="#" method="post" class="leadgenpro_form">
                <div class="row clearfix leadgen-field">
                    <div class="col-sm-6">
                        <label for="school-name">School Name</label><br>
                        <input type="text" id="school-name" name="name">
                    </div>
                    <div class="col-sm-6 leadgen-field">
                        <label for="contact-email">Contact Email</label><br>
                        <input type="email" id="contact-email" name="email">
                    </div>
                </div>
                <div class="row clearfix leadgen-field">
                    <div class="col-sm-6">
                        <label for="school-contact">School Contact</label><br>
                        <input type="text" id="school-contact" name="mobile">
                    </div>
                    <div class="col-sm-6">
                        <label for="expected_date">Expected Date for Your Pie Drive</label><br>
                        <input type="date" id="expected_date" name="piedrive-expected_date">
                    </div>
                </div>
                <div class="row clearfix leadgen-field">
                    <div class="col-sm-12 text-center mt-20 mb-20">
                        <input type="checkbox" id="promotnl_commctn" name="receive_promotional_communication" value="Yes" style="margin-right:7px;"><label for="promotnl_commctn"> I agree to receive promotional communication 
                            from my Sweeie Pie</label>
                    </div>
                </div>    
                <div class="row clearfix leadgen-field">
                    <div class="col-sm-12 text-center">
                        <input type="hidden" id="success_url" name="success_url" value="https://mysweetiepie.ca/fundraiser/thankyou">
                        <input type="submit" value="Submit">
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>    

<div class="currentpiedrive_info pb-50 pt-50">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="currentpiedrive-box">
                    <div class="opd-title"><h2>On Going Pie Drive</h2></div>
                    <div class="opd-content">
                        <div class="opd-list"><h3>Toronto District School Board</h3></div>
                        <div class="opd-list"><h3>Charles G.Fraser Public School</h3></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection