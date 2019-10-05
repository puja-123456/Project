 <script>
   document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems, options);
  }); 
  $(document).ready(function(){ 
   $('.carousel').carousel({
    padding: 5,
     fullWidth: true 
}).style.height = window.innerHeight + "px"; 
autoplay();
function autoplay() {
    $('.carousel').carousel('next');
    setTimeout(autoplay, 4500);
}
  });
</script>
<style type="text/css">
    .solid{
	    margin-top: -60px !important;
     }
	.home_page_reading_material .card-content img{
		height: 150px;
	}
	.home_page_imp_links .card .card-image .card-title{
		position: unset;
	}
	.home_page_imp_links .card .card-image img:hover{
		padding: 20px 20px 0px 20px;
	}
	.home_page_imp_links .card .card-image img{
		transition: all 0.2s ease;
	}
	.home_page_reading_material .card-content{
		padding: 0px;
	}
	.home_page_reading_material .card-content a{
		padding: 0px;
		line-height: 1;
	}
	#student_form .input-field, #school_form .input-field {
	    margin-top: 0.25rem;
	    margin-bottom: 0.25em;
	}
	#student_form .dropdown-content li>a, .dropdown-content li>span{
		padding: 8px 16px;
	}
	@media screen and (min-width:600px) and (max-width:767px) 
	{
.row .col.m8
    {
     width:51%;
	}

	.row .col.m4
	{
     width:49%;
	}
	.tabs
	{
    overflow-x: hidden;
	} 
}

@media screen and (min-width:768px) and (max-width:1199px) 
{ 
.row .col.s6
{
	width: 50%;
} 
}
 
@media screen and (max-width: 768px)
{
.droopmenu-header, .droopmenu-mclose, .droopmenu-navbar, .droopmenu-offcanvas .droopmenu-nav {
    background: #fff;
}
.droopmenu-toggle 
{
    background-color: #000 !important;
}
li.droopmenu-parent .material-icons {
    display: none;
}
.droopmenu .droopmenu-tabheader {
    background-color: #26a69a;
}
.droopmenu .droopmenu-tabheader.droopmenu-tab-active {
    background: #ffd223;
    color: #000;
}
.droopmenu .dm-block-title, .droopmenu .droopmenu-content p, .droopmenu li li:hover>a, .droopmenu li ul li a, .droopmenu-col h4 {
    font-weight: 400 !important;
    font-size: 1em !important;
    color: #000;
    margin-bottom: 6px;
}
ul.droopmenu-col.droopmenu-col3 h5 {
    font-size: 20px;
    color: #8a8585;
    font-weight: 600;
    line-height: inherit;
}
.col.s4 {
    width: 100% !important;
 }
.aboutclass{
	    margin-top: 332px;
}
#register{
	background-color: #43cec9 !important; 
	 border-radius: 3em;
	 border: none; 
	 position:absolute;
	 right: 0;
	 z-index:999;
	 margin-top:-45px;
	}
.service {
    margin-top: 60px;
}
.service_1{
	margin-top:65px;
	margin-bottom: 65px;
}
.service_3{
	margin-top:65px;
	margin-bottom: 65px;
}
.service_5{
	margin-top:65px;
	margin-bottom: 65px;
}
.service_7 {
    margin-top: 65px;
    }
.carousel {
    height: 230px;
}
#fbsubmit{
	margin-left: 23.666667%;
}
}

@media screen and (min-width: 768px)
{
.center-align{
	margin-top: 60px;
}
#sogeid{
	margin-top: 0px;
}
#register{
	background-color: #43cec9 !important; 
	 border-radius: 3em;
	 border: none; 
	 position:absolute;
	 right: 0;
	 margin: 10px 26px;
	 z-index:1;
	 margin-top:66px;
	}
.slider-main .sl-slider-wrapper {
    /*height: 476px !important;*/
	position: relative;
    width: 65%;
    height: 65%;
    top: 180px;
    left: 0;
 }
 .sl-slider {
    position: relative;
    top: 0;
    left: 0;
}
.sl-slide, .sl-slides-wrapper, .sl-slide-inner {
    position: relative;
    } 
} 

.tabs .indicator {
    background-color: #ffd223;
}
.input-field>label:not(.label-icon).active {
    top: 48px;
    -webkit-transform: translateY(-11px) scale(0.8) !important;
}
</style>

<div class="row">
<p>&nbsp;</p>
	<div class="col s12 m12 l12 hide-on-small-only" style="position:relative">

			<div id="slider" class="sl-slider-wrapper">
				<div class="sl-slider"> 
			     <a href="<?php echo base_url();?>pre-registration" target="_blank">
				  <img class="hide-on-small-only" src="<?php echo base_url().'assets/images/img/unicus_banner.jpg';?>" width="100%" height="470px">
				  <img class="hide-on-med-and-up" src="<?php echo base_url().'assets/images/img/unicus_banner.jpg';?>" width="100%" height="470px">
				</a> 
				</div> 
			</div>
 
	</div> 
<style type="text/css">

input:not([type]):focus.invalid ~ label,input[type=text]:not(.browser-default):focus.invalid ~ label,input[type=password]:not(.browser-default):focus.invalid ~ label,input[type=email]:not(.browser-default):focus.invalid ~ label,input[type=url]:not(.browser-default):focus.invalid ~ label,input[type=time]:not(.browser-default):focus.invalid ~ label,input[type=date]:not(.browser-default):focus.invalid ~ label,input[type=datetime]:not(.browser-default):focus.invalid ~ label,input[type=datetime-local]:not(.browser-default):focus.invalid ~ label,input[type=tel]:not(.browser-default):focus.invalid ~ label,input[type=number]:not(.browser-default):focus.invalid ~ label,input[type=search]:not(.browser-default):focus.invalid ~ label,textarea.materialize-textarea:focus.invalid ~ label{color:#F44336;
top:15px !important;
}
 .input-field.col .prefix ~ label, .input-field.col .prefix ~ .validate ~ label {
    top: 1px !important;
}

#student_form .input-field, #school_form .input-field {
    margin-top: 0.25rem !important;
    background-color: #fff;
    margin-bottom: 0.25em;
} 
 #student_form .input-field, #school_form .input-field{
    padding: 0px 10px 0px 11px;
    margin-left: 32px;
} 
.white-text {
    padding: 10px 10px 5px 15px;
    line-height: 1em;
}
.tabs .tab a {
    color: #000;
    font-size: 14px;
    text-transform: none;
}
.tabs .tab a:hover, .tabs .tab a.active {
    background-color: #ffd223 !important;
    color: #000 !important;
    font-weight: 700 !important;
    font-size: 14px !important;
}
.input-field .prefix {
    position: absolute; 
    font-size: 1.51rem;
}
input:not([type]), input[type=text]:not(.browser-default), input[type=password]:not(.browser-default), input[type=email]:not(.browser-default), input[type=url]:not(.browser-default), input[type=time]:not(.browser-default), input[type=date]:not(.browser-default), input[type=datetime]:not(.browser-default), input[type=datetime-local]:not(.browser-default), input[type=tel]:not(.browser-default), input[type=number]:not(.browser-default), input[type=search]:not(.browser-default), textarea.materialize-textarea {
    background-color: transparent;
    border: none;
    border-bottom: 1px solid #9e9e9e;
    border-radius: 0;
    outline: none;
    height: 2rem !important;
    }
 input:not([type]):focus:not([readonly])+label, input[type=text]:not(.browser-default):focus:not([readonly])+label, input[type=password]:not(.browser-default):focus:not([readonly])+label, input[type=email]:not(.browser-default):focus:not([readonly])+label, input[type=url]:not(.browser-default):focus:not([readonly])+label, input[type=time]:not(.browser-default):focus:not([readonly])+label, input[type=date]:not(.browser-default):focus:not([readonly])+label, input[type=datetime]:not(.browser-default):focus:not([readonly])+label, input[type=datetime-local]:not(.browser-default):focus:not([readonly])+label, input[type=tel]:not(.browser-default):focus:not([readonly])+label, input[type=number]:not(.browser-default):focus:not([readonly])+label, input[type=search]:not(.browser-default):focus:not([readonly])+label, textarea.materialize-textarea:focus:not([readonly])+label{
 	top:12px !important;
 	display: none !important
 }
</style>
<div class="col s12 m4 l4" id="register"> 
<div class="row"> 
		      <ul class="tabs">
		        <li class="tab col s6"><a class="active" href="#student_form">Individual Applicant</a></li>
		        <li class="tab col s6"><a href="#school_form">School Registration</a></li>
		      </ul>
		    <div id="student_form">
		    	
					<?php 
					$attributes = array('onsubmit' => 'return subject_d_func()','name'=>'pre_registration_form','id'=>'pre_registration_form');
					echo form_open("unicus/pre_registration_form",$attributes); ?>
					
					<div class=""> 
						<div class="col s10 input-field">
							<i class="material-icons prefix">account_circle</i>
							<input id="name" name="name" type="text" required class="validate" maxlength="30">
		          			<label for="name">Student Name</label>
							<?php echo form_error('name'); ?>
						</div>
						<div class="col s10 input-field">
							<i class="material-icons prefix">class</i>
			                <select id="class" name="class" required class="validate" >
								<option value="" >Select Class </option>
								<option value="1">Class 1</option>
								<option value="2">Class 2</option>
								<option value="3">Class 3</option>
								<option value="4">Class 4</option>
								<option value="5">Class 5</option>
								<option value="6">Class 6</option>
								<option value="7">Class 7</option>
								<option value="8">Class 8</option>
								<option value="9">Class 9</option>
								<option value="10">Class 10</option>
							</select>
			               <!--  <label for="school">Student Class</label> -->
			                <?php echo form_error('class'); ?>
						</div>
						
						<div class="col s10 input-field">
							<i class="material-icons prefix">school</i>
			                <input id="school" name="school" type="text" required class="validate" maxlength="50">
			                <label for="school">School Name</label>
			                <?php echo form_error('school'); ?>
						</div>
						<div class="col s10 input-field">
							<i class="material-icons prefix">email</i>
							<input id="email" name="email" type="email" required class="validate">
		          			<label for="email">Email</label>
							<?php echo form_error('email'); ?>
						</div>
						<div class="col s10 input-field">
							<i class="material-icons prefix">location_on</i>
							<?php $this->load->view('auth/select_phone'); ?>
		          			<!-- <label for="country">Country</label> -->
							<?php echo form_error('country'); ?>
						</div>
						<div class="col s10 input-field">
							<i class="material-icons prefix">phone</i>
							<input id="phone" name="phone" type="text" required class="validate onlyNumbers" maxlength="10">
		          			<label for="phone">Mobile Number</label>
							<?php echo form_error('phone'); ?>
						</div>
						
					</div> 
					<div class="row">
						<div class="col s10">
							<button class="btn col s6 offset-s4" style="margin-bottom: 10px;color: #000;" type="submit">Submit<i class="material-icons right">send</i></button>
						</div>
					</div>
					<?php echo form_close(); ?>
		    </div>
		    <div id="school_form" class="col s12">

		        <?php echo form_open("school_reg/register",'name="principals"'); ?>
		        <!-- <form class=""  method="POST" action= > -->
		        <div class="row"> 
		            <div class="col s10 input-field">
		                <i class="material-icons prefix">account_balance</i>
		                <input id="school" name="school" type="text" required class="validate" placeholder="School Name">
		               <!--  <label for="school">School Name</label> -->
		                <?php echo form_error('school'); ?>
		            </div>
		            <div class="col s10 input-field">
		                <i class="material-icons prefix">location_on</i>
		                <input id="location" name="location" type="text" required class="validate" placeholder="City/State">
		                <!-- <label for="location">City/State</label> -->
		                <?php echo form_error('location'); ?>
		            </div>
		            	<div class="col s10 input-field">
							<i class="material-icons prefix">location_on</i>
							<?php $this->load->view('auth/country_list'); ?>
		          			<!-- <label for="country">Country</label> -->
							<?php echo form_error('country'); ?>
						</div>
		            <div class="col s10 input-field">
		                <i class="material-icons prefix">account_circle</i>
		                <input id="name" name="name" type="text" required class="validate" placeholder="Contact Person">
		               <!--  <label for="name">Contact Person</label> -->
		                <?php echo form_error('name'); ?>
		            </div>
		            <div class="col s10 input-field">
		                <i class="material-icons prefix">phone</i>
		                <input id="phone" name="phone" type="text" required class="validate onlyNumbers" placeholder="Phone Number">
		               <!--  <label for="phone">Phone Number</label> -->
		                <?php echo form_error('phone'); ?>
		            </div>

		            <div class="col s10 input-field">
		                <i class="material-icons prefix">email</i>
		                <input id="email" name="email" type="email" required class="validate" placeholder="Email">
		               <!--  <label for="email">Email</label> -->
		                <?php echo form_error('email'); ?>
		            </div>
		            <div class="cl"></div>
		        </div>
		        <div class="row">
		            <div class="col s10">
		      <button class="btn col s6 offset-s4" style="margin-bottom: 10px;color: #000" type="submit" >Submit<i class="material-icons right">send</i></button>
		            </div>
		        </div>
		        <?php echo form_close();?>
		    </div>
		</div>
 	</div>
	</div>
 
</div>
 
  
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/slippry.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/slider.css">

<style type="text/css">

</style>
<br/><br/><br/><br/>
<div class="row">
	<div class="col-md-12 aboutclass">
		<h3 style="font-weight: bold;margin-left:26px;text-align: center;">About Olympiads</h3>
	</div>
	<div class="col-md-12" style="background-color: #43cec9;">
		<p style="margin: 10px;padding: 15px 42px 15px 42px;font-size: 13px">
        Unicus Olympiads are the only Summer Olympiads
        Why should a student be burdened with extra exams during his/her class year? 
        Many people say that ‘Life is a race’ and in this race we compel our children to study what will come next rather than making their previous concepts clear. If the children understand what they have studied and how to practically apply those studies then automatically they will ace this race. </p>
	</div>
 </div> 

<style>
.service {
    box-shadow: 0 0 13px rgba(0, 0, 0, 0.1);
    padding: 0 10%;
    position: relative;
    text-align: center;
   /*background: #ffc10d;*/
}
.service::before {
    bottom: 0;
    content: "";
    height: 5px;
    left: 0;
    position: absolute;
    width: 100%;
   box-shadow: 8px 0 10px rgba(0, 0, 0, 0.2);
   background: #f7cb4f none repeat scroll 0 0;
}
.service .service__icon {
    -webkit-transition: 0.3s;
    -moz-transition: 0.3s;
    -ms-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s;
}

.service .service__icon {
    background: #fff none repeat scroll 0 0;
    border-radius: 100%;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    height: 85px;
    left: 50%;
    line-height: 85px;
    margin: auto;
    position: absolute;
    text-align: center;
    top: -43px;
    transform: translateX(-50%);
    width: 85px;
}
.service .service__icon {
    -webkit-transition: 0.3s;
    -moz-transition: 0.3s;
    -ms-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s;
}
.service .service__details {
    padding-bottom: 38px;
    padding-top: 62px;
}
.service .service__details h6 a {
    color: #000;
    display: block;
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 21px;
}
.service .service__details h6 a { 
    display: block;
    font-family: "Lucida Sans";
    font-size: 17px;
    font-weight: 700;
    margin-bottom: 21px;
    transition: all 0.3s ease 0s;
}
.service .service__details p {
    color: #000;
    line-height: 23px;
}

.service__details p {
    color: #777777;
    font-size: 13px;
    line-height: 27px;
}

.service .service__btn {
    margin-top: 28px;
}


.service_1 {
    box-shadow: 0 0 13px rgba(0, 0, 0, 0.1);
    padding: 0 10%;
    position: relative;
    text-align: center;
   /*background: #ffc10d;*/
}
.service_1::before { 
    background: #f5594e none repeat scroll 0 0;
    bottom: 0;
    content: "";
    height: 5px;
    left: 0;
    position: absolute;
    width: 100%;
   box-shadow: 8px 0 10px rgba(0, 0, 0, 0.2);
   
}
.service_1 .service__icon {
    -webkit-transition: 0.3s;
    -moz-transition: 0.3s;
    -ms-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s;
}

.service_1 .service__icon {
    background: #fff none repeat scroll 0 0;
    border-radius: 100%;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    height: 85px;
    left: 50%;
    line-height: 85px;
    margin: auto;
    position: absolute;
    text-align: center;
    top: -43px;
    transform: translateX(-50%);
    width: 85px;
}
.service_1 .service__icon {
    -webkit-transition: 0.3s;
    -moz-transition: 0.3s;
    -ms-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s;
}
.service_1 .service__details {
    padding-bottom: 38px;
    padding-top: 62px;
}
.service_1 .service__details h6 a {
    color: #000;
    display: block;
    font-size: 17px;
    font-weight: 700;
    margin-bottom: 21px;
}
.service_1.service__details h6 a {
    color: #333333;
    display: block;
    font-family: "Lucida Sans";
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 21px;
    transition: all 0.3s ease 0s;
}
.service_1 .service__details p {
    color: #000;
    line-height: 20px;
}

.service_1 .service__btn {
    margin-top: 28px;
}

.service_2 {
    box-shadow: 0 0 13px rgba(0, 0, 0, 0.1);
    padding: 0 10%;
    position: relative;
    text-align: center;
  /* background: #ffc10d;*/
}
.service_2::before { 
	background: #68b9d8 none repeat scroll 0 0; 
    bottom: 0;
    content: "";
    height: 5px;
    left: 0;
    position: absolute;
    width: 100%;
   box-shadow: 8px 0 10px rgba(0, 0, 0, 0.2);
   
}
.service_2 .service__icon {
    -webkit-transition: 0.3s;
    -moz-transition: 0.3s;
    -ms-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s;
}

.service_2 .service__icon {
    background: #fff none repeat scroll 0 0;
    border-radius: 100%;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    height: 85px;
    left: 50%;
    line-height: 85px;
    margin: auto;
    position: absolute;
    text-align: center;
    top: -43px;
    transform: translateX(-50%);
    width: 85px;
}
.service_2 .service__icon {
    -webkit-transition: 0.3s;
    -moz-transition: 0.3s;
    -ms-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s;
}
.service_2 .service__details {
    padding-bottom: 38px;
    padding-top: 62px;
}
.service_2 .service__details h6 a {
    color: #000;
    display: block;
    font-size: 17px;
    font-weight: 700;
    margin-bottom: 21px;
}
.service_2.service__details h6 a {
    color: #333333;
    display: block;
    font-family: "Lucida Sans";
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 21px;
    transition: all 0.3s ease 0s;
}
.service_2 .service__details p {
    color: #000;
    line-height: 20px;
}

.service_2 .service__btn {
    margin-top: 28px;
}
 
.service_3 {
    box-shadow: 0 0 13px rgba(0, 0, 0, 0.1);
    padding: 0 10%;
    position: relative;
    text-align: center;
 /*  background: #b1c642;*/
}
.service_3::before { 
	background: #b1c642 none repeat scroll 0 0; 
    bottom: 0;
    content: "";
    height: 5px;
    left: 0;
    position: absolute;
    width: 100%;
   box-shadow: 8px 0 10px rgba(0, 0, 0, 0.2);
   
}
.service_3 .service__icon {
    -webkit-transition: 0.3s;
    -moz-transition: 0.3s;
    -ms-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s;
}

.service_3 .service__icon {
    background: #fff none repeat scroll 0 0;
    border-radius: 100%;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    height: 85px;
    left: 50%;
    line-height: 85px;
    margin: auto;
    position: absolute;
    text-align: center;
    top: -43px;
    transform: translateX(-50%);
    width: 85px;
}
.service_3 .service__icon {
    -webkit-transition: 0.3s;
    -moz-transition: 0.3s;
    -ms-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s;
}
.service_3 .service__details {
    padding-bottom: 38px;
    padding-top: 62px;
}
.service_3 .service__details h6 a {
    color: #000;
    display: block;
    font-size: 17px;
    font-weight: 700;
    margin-bottom: 21px;
}
.service_3.service__details h6 a {
    color: #333333;
    display: block;
    font-family: "Lucida Sans";
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 21px;
    transition: all 0.3s ease 0s;
}
.service_3 .service__details p {
    color: #000;
    line-height: 20px;
}

.service_3 .service__btn {
    margin-top: 28px;
} 



.service_4 {
    box-shadow: 0 0 13px rgba(0, 0, 0, 0.1);
    padding: 0 10%;
    position: relative;
    text-align: center;
   /*background: #ffc10d;*/
}
.service_4::before {
    bottom: 0;
    content: "";
    height: 5px;
    left: 0;
    position: absolute;
    width: 100%;
   box-shadow: 8px 0 10px rgba(0, 0, 0, 0.2);
   background: #f7cb4f none repeat scroll 0 0;
}
.service_4 .service__icon {
    -webkit-transition: 0.3s;
    -moz-transition: 0.3s;
    -ms-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s;
}

.service_4 .service__icon {
    background: #fff none repeat scroll 0 0;
    border-radius: 100%;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    height: 85px;
    left: 50%;
    line-height: 85px;
    margin: auto;
    position: absolute;
    text-align: center;
    top: -43px;
    transform: translateX(-50%);
    width: 85px;
}
.service_4 .service__icon {
    -webkit-transition: 0.3s;
    -moz-transition: 0.3s;
    -ms-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s;
}
.service_4 .service__details {
    padding-bottom: 38px;
    padding-top: 62px;
}
.service_4 .service__details h6 a {
      color: #000;
    display: block;
    font-size: 17px;
    font-weight: 700;
    margin-bottom: 21px;
}
.service_4 .service__details h6 a { 
    display: block;
    font-family: "Lucida Sans";
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 21px;
    transition: all 0.3s ease 0s;
}
.service_4 .service__details p {
      color: #000;
    line-height: 20px;
} 

.service_4 .service__btn {
    margin-top: 28px;
}
  
.service_5 {
    box-shadow: 0 0 13px rgba(0, 0, 0, 0.1);
    padding: 0 10%;
    position: relative;
    text-align: center;
   /*background: #ffc10d;*/
}
.service_5::before { 
    background: #f5594e none repeat scroll 0 0;
    bottom: 0;
    content: "";
    height: 5px;
    left: 0;
    position: absolute;
    width: 100%;
   box-shadow: 8px 0 10px rgba(0, 0, 0, 0.2);
   
}
.service_5 .service__icon {
    -webkit-transition: 0.3s;
    -moz-transition: 0.3s;
    -ms-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s;
}

.service_5 .service__icon {
    background: #fff none repeat scroll 0 0;
    border-radius: 100%;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    height: 85px;
    left: 50%;
    line-height: 85px;
    margin: auto;
    position: absolute;
    text-align: center;
    top: -43px;
    transform: translateX(-50%);
    width: 85px;
}
.service_5 .service__icon {
    -webkit-transition: 0.3s;
    -moz-transition: 0.3s;
    -ms-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s;
}
.service_5 .service__details {
    padding-bottom: 38px;
    padding-top: 62px;
}
.service_5 .service__details h6 a {
      color: #000;
    display: block;
    font-size: 17px;
    font-weight: 700;
    margin-bottom: 21px;
}
.service_5.service__details h6 a {
    color: #333333;
    display: block;
    font-family: "Lucida Sans";
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 21px;
    transition: all 0.3s ease 0s;
}
.service_5 .service__details p {
    color: #000;
    line-height: 20px;
}

.service_5 .service__btn {
    margin-top: 28px;
}

.service_6 {
    box-shadow: 0 0 13px rgba(0, 0, 0, 0.1);
    padding: 0 10%;
    position: relative;
    text-align: center;
   /*background: #ffc10d;*/
}
.service_6::before { 
	background: #68b9d8 none repeat scroll 0 0; 
    bottom: 0;
    content: "";
    height: 5px;
    left: 0;
    position: absolute;
    width: 100%;
   box-shadow: 8px 0 10px rgba(0, 0, 0, 0.2);
   
}
.service_6 .service__icon {
    -webkit-transition: 0.3s;
    -moz-transition: 0.3s;
    -ms-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s;
}

.service_6 .service__icon {
    background: #fff none repeat scroll 0 0;
    border-radius: 100%;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    height: 85px;
    left: 50%;
    line-height: 85px;
    margin: auto;
    position: absolute;
    text-align: center;
    top: -43px;
    transform: translateX(-50%);
    width: 85px;
}
.service_6 .service__icon {
    -webkit-transition: 0.3s;
    -moz-transition: 0.3s;
    -ms-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s;
}
.service_6 .service__details {
    padding-bottom: 38px;
    padding-top: 62px;
}
.service_6 .service__details h6 a {
      color: #000;
    display: block;
    font-size: 17px;
    font-weight: 700;
    margin-bottom: 21px;
}
.service_6.service__details h6 a {
    color: #333333;
    display: block;
    font-family: "Lucida Sans";
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 21px;
    transition: all 0.3s ease 0s;
}
.service_6 .service__details p {
    color: #000;
    line-height: 20px;
}

.service_6 .service__btn {
    margin-top: 28px;
} 

.service_7 {
    box-shadow: 0 0 13px rgba(0, 0, 0, 0.1);
    padding: 0 10%;
    position: relative;
    text-align: center;
   /*background: #ffc10d;*/
}
.service_7::before { 
	background: #b1c642 none repeat scroll 0 0; 
    bottom: 0;
    content: "";
    height: 5px;
    left: 0;
    position: absolute;
    width: 100%;
   box-shadow: 8px 0 10px rgba(0, 0, 0, 0.2);
   
}
.service_7 .service__icon {
    -webkit-transition: 0.3s;
    -moz-transition: 0.3s;
    -ms-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s;
}

.service_7 .service__icon {
    background: #fff none repeat scroll 0 0;
    border-radius: 100%;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    height: 85px;
    left: 50%;
    line-height: 85px;
    margin: auto;
    position: absolute;
    text-align: center;
    top: -43px;
    transform: translateX(-50%);
    width: 85px;
}
.service_7 .service__icon {
    -webkit-transition: 0.3s;
    -moz-transition: 0.3s;
    -ms-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s;
}
.service_7 .service__details {
    padding-bottom: 38px;
    padding-top: 62px;
}
.service_7 .service__details h6 a {
    color: #000;
    display: block;
    font-size: 17px;
    font-weight: 700;
    margin-bottom: 21px;
}
.service_7.service__details h6 a {
    color: #333333;
    display: block;
    font-family: "Lucida Sans";
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 21px;
    transition: all 0.3s ease 0s;
}
.service_7 .service__details p {
    color: #000;
    line-height: 20px;
}

.service_7 .service__btn {
    margin-top: 28px;
}  
.dcare__btn{
	background: #444444 none repeat scroll 0 0;
    color: #666666;
}
.dcare__btn{
    font-size: 16px;
    height: 37px;
    line-height: 35px;
    padding: 0 25px;
}
.dcare__btn {
    transform: perspective(1px) translateZ(0px);
    transition-duration: 0.3s;
    background: #fe5629 none repeat scroll 0 0;
    box-shadow: 0 0 1px transparent;
    transform: perspective(1px) translateZ(0px);
    transition-duration: 0.5s;
    border-radius: 5px;
    color: #fff;
    cursor: pointer;
    display: block;
    font-size: 16px;
    font-weight: 700;
    height: 48px;
    line-height: 48px;
    overflow: hidden;
    padding: 0 24px;
    position: relative;
    display: inline-block;
    text-transform: capitalize;
    z-index: 2;
}
</style>
<div class="row">
<div class="col-md-12 col s12 center-align">
	<div class="col s12 m3 l3s" >  
    <div class="service">
		<div class="service__icon">
		<i class="medium material-icons" style="padding: 10px;color: #f7cb4f;">assignment</i>
		 </div>
			<div class="service__details">
			<h6><a href="<?php echo base_url(); ?>exam-schedule">Fees and Exam Schedule</a></h6>
			<p>The fee per subject per student is Rs. 225 for students studying</p>
			<div class="service__btn">
			<a class="dcare__btn" href="<?php echo base_url().'exam-schedule'; ?>">Read More</a>
			</div></div>  
	   </div>
  </div>

	<div class="col s12 m3 l3s" >
	<div class="service_1">
		<div class="service__icon">
			<i class="medium material-icons" style="padding: 10px;color: #f5594e;">equalizer</i> 
		 </div>
			<div class="service__details">
			<h6><a href="<?php echo base_url(); ?>marking-scheme">Marking Scheme</a></h6>
			<p>The marking scheme for both the rounds i.e. preliminary and final round for all the subjects under</p>
			<div class="service__btn">
			<a class="dcare__btn" href="<?php echo base_url().'marking-scheme'; ?>">Read More</a>
			</div></div>  
	   </div>
	</div>

<div class="col s12 m3 l3s" >
 <div class="service_2">
		<div class="service__icon">
			<i class="medium material-icons" style="padding: 10px;color: #68b9d8 ;">description</i> 
		 </div>
			<div class="service__details">
			<h6><a href="<?php echo base_url(); ?>sample-papers">Sample Papers</a></h6>
			<p>The sample papers for all the subjects in Unicus Olympiads are designed by a team of experts.</p>
			<div class="service__btn">
			<a class="dcare__btn" href="<?php echo base_url().'sample-papers'; ?>">Read More</a>		
			</div></div>  
	   </div> 
	</div>

<div class="col s12 m3 l3s" >
	<div class="service_3">
		<div class="service__icon">
			<i class="medium material-icons" style="padding: 10px;color: #b1c642;">subject</i>  
		 </div>
			<div class="service__details">
			<h6><a href="<?php echo base_url(); ?>syallbus">Syallbus</a></h6>
			<p>Unicus Olympiads syllabus is carefully designed by our intellectual team of subject matter experts.</p>
			<div class="service__btn">
			<a class="dcare__btn" href="<?php echo base_url().'syallbus'; ?>">Read More</a>
			</div></div>  
	   </div>
	</div>
</div> 
</div>
<div class="row">
<div class="col-md-12 col s12 center-align">
	<div class="col s12 m3 l3s" >
		<div class="service_4">
		<div class="service__icon">
		 <i class="medium material-icons" style="padding: 10px;color: #41c2bd;">graphic_eq</i>
		 </div>
			<div class="service__details">
			<h6><a href="<?php echo base_url(); ?>cut-off-and-rankings">Ranking Criteria</a></h6>
			<p>UGKO, UCO and UCTO (classes 1 to 10) and UEO, USO and UMO </p>
			<div class="service__btn">
			<a class="dcare__btn" href="<?php echo base_url(); ?>cut-off-and-rankings">Read More</a>
			</div></div>  
	   </div>
	</div>

	<div class="col s12 m3 l3s" > 
		<div class="service_5">
		<div class="service__icon">
		 <i class="medium material-icons" style="padding: 10px;color: #f5594e;">grade</i>
		 </div>
			<div class="service__details">
			<h6><a href="<?php echo base_url(); ?>awards">Awards</a></h6>
			<p>For students appearing for UGKO, UCO and UCTO (classes 1 to 10)</p>
			<div class="service__btn">
			<a class="dcare__btn" href="<?php echo base_url(); ?>awards">Read More</a>
			</div></div>  
	   </div> 
	</div>

	<div class="col s12 m3 l3s" > 
		<div class="service_6">
		<div class="service__icon">
		 <i class="medium material-icons" style="padding: 10px;color: #68b9d8;">content_copy</i>
		 </div>
			<div class="service__details">
			<h6><a href="https://www.olympiadsuccess.com/" target="_blank">Exam Prepration</a></h6>
			<p>Clicking this link will open Olympiad Success website.</p>
			<div class="service__btn">
			<a class="dcare__btn" target="blank" href="https://www.olympiadsuccess.com/">Read More</a>
			</div></div>  
	   </div>  
	</div> 

	<div class="col s12 m3 l3s" >
		<div class="service_7">
		<div class="service__icon">
		 <i class="medium material-icons" style="padding: 10px;color: #b1c642;">live_help</i>
		 </div>
			<div class="service__details">
			<h6><a href="<?php echo base_url(); ?>faqs">FAQs</a></h6>
			<p>Q.1. Who all are eligible to sit for Unicus Olympiads?</p>
			<div class="service__btn">
			<a class="dcare__btn" href="<?php echo base_url(); ?>faqs">Read More</a>
			</div></div>  
	   </div>  
		 
	</div>
</div>
 
</div>
<br/><br/>
<!-------------------->
 

	<div class="fuild-container image-slider">
		<div class="row">
<div class="carousel">
	 
    <a class="carousel-item" href="#"><img src="https://lorempixel.com/250/250/nature/1">
    <p class="img__description">This image looks super neat.</p></a>
    <a class="carousel-item" href="#two!"><img src="https://lorempixel.com/250/250/nature/2">
    <p class="img__description">This image looks super neat.</p></a>
    <a class="carousel-item" href="#three!"><img src="https://lorempixel.com/250/250/nature/3">
    <p class="img__description">This image looks super neat.</p></a>
    <a class="carousel-item" href="#four!"><img src="https://lorempixel.com/250/250/nature/4">
    <p class="img__description">This image looks super neat.</p></a>
    <a class="carousel-item" href="#five!"><img src="https://lorempixel.com/250/250/nature/5">
    <p class="img__description">This image looks super neat.</p></a>
  </div>
</div>
</div>
<style type="text/css">
@media only screen and (min-width: 768px){
.image-slider{
	margin-left: 147px;
}
.carousel{
	height:220px; 
}
}

@media only screen and (max-width: 768px){
.image-slider{
	margin-left: 50px;
}
.carousel{
	width:87%;
}

}
	.carousel .carousel-item  {
    left: 263px !important;
}
.carousel .carousel-item {
    visibility: hidden;
    width: 259px;
    max-height: 200px;
    overflow: hidden;
    }

.carousel .carousel-item>img:hover {
    width: 100%;
    opacity: 3;
}
/* relevant styles */
.carousel-item {
  position: relative;
  height: 100%;
  width: auto;
}

.img__description {
  position: absolute;
  top: -15px;
  bottom: 0;
  left: 0;
  padding: 0px;
  right: 0; 
  width: 259px;
  height: 260px;
  background: #ffd223;
  color: #fff;
  visibility: hidden;
  opacity: 0;

  /* transition effect. not necessary */
  transition: opacity .2s, visibility .2s;
}

.carousel-item:hover .img__description {
  visibility: visible;
  opacity: 1;
}


</style>
<!---------------------->
<!-- <div class="clear" style="margin-bottom: 0px !important;"></div> -->
<div class="container" >
	<div class="col s12 m2 l2">
	</div>
<div class="col s12 m8 l8">
<table class="responsive-table striped centered">
  <thead>
    <tr style="background-color:#43cec9;">
      <th scope="col" style="border: solid 2px #bbb;">Subjects</th>
      <th scope="col" style="border: solid 2px #bbb;">Syllabus</th>
      <th scope="col" style="border: solid 2px #bbb;">Sample papers</th>
      <th scope="col" style="border: solid 2px #bbb;">Marking Scheme</th>
      <th scope="col" style="border: solid 2px #bbb;">Preparation</th>
    </tr>
  </thead>
  <tbody style="border: solid 2px #bbb;">
  	 <tr style="border: solid 2px #bbb;">
      <th scope="row">Maths</th>
      <td style="border: solid 2px #bbb;"><a href="<?php echo base_url(); ?>umo/syllabus">See here</a></td>
      <td style="border: solid 2px #bbb;"><a href="<?php echo base_url(); ?>umo/sample-papers">See here</a></td>
      <td style="border: solid 2px #bbb;"><a href="<?php echo base_url(); ?>umo/marking-scheme">See here</a></td>
      <td style="border: solid 2px #bbb;"><a href="https://www.olympiadsuccess.com/">See here</a></td> 
    </tr>
     <tr style="border: solid 2px #bbb;">
      <th scope="row">Science</th>
       <td style="border: solid 2px #bbb;"><a href="<?php echo base_url(); ?>uso/syllabus">See here</a></td>
      <td style="border: solid 2px #bbb;"><a href="<?php echo base_url(); ?>uso/marking-scheme">See here</a></td>
      <td style="border: solid 2px #bbb;"><a href="<?php echo base_url(); ?>uso/sample-papers">See here</a></td>
      <td style="border: solid 2px #bbb;"><a href="https://www.olympiadsuccess.com/">See here</a></td>
    </tr>
    <tr style="border: solid 2px #bbb;">
      <th scope="row">English</th> 
      <td style="border: solid 2px #bbb;"><a href="<?php echo base_url(); ?>ueo/syllabus">See here</a></td>
      <td style="border: solid 2px #bbb;"><a href="<?php echo base_url(); ?>ueo/marking-scheme">See here</a></td>
      <td style="border: solid 2px #bbb;"><a href="<?php echo base_url(); ?>ueo/sample-papers">See here</a></td>
      <td style="border: solid 2px #bbb;"><a href="https://www.olympiadsuccess.com/">See here</a></td>
    </tr> 
   
    <tr style="border: solid 2px #bbb;">
      <th scope="row">Gk</th>
      <td style="border: solid 2px #bbb;"><a href="<?php echo base_url(); ?>ugko/syllabus">See here</a></td>
      <td style="border: solid 2px #bbb;"><a href="<?php echo base_url(); ?>ugko/marking-scheme">See here</a></td>
      <td style="border: solid 2px #bbb;"><a href="<?php echo base_url(); ?>ugko/sample-papers">See here</a></td>
      <td style="border: solid 2px #bbb;"><a href="https://www.olympiadsuccess.com/">See here</a></td>
    </tr>
    <tr style="border: solid 2px #bbb;">
      <th scope="row">Cyber</th>
      <td style="border: solid 2px #bbb;"><a href="<?php echo base_url(); ?>uco/syllabus">See here</a></td>
      <td style="border: solid 2px #bbb;"><a href="<?php echo base_url(); ?>uco/marking-scheme">See here</a></td>
      <td style="border: solid 2px #bbb;"><a href="<?php echo base_url(); ?>uco/sample-papers">See here</a></td>
      <td style="border: solid 2px #bbb;"><a href="https://www.olympiadsuccess.com/">See here</a></td>
    </tr>
    <tr style="border: solid 2px #bbb;">
      <th scope="row">Critical Thinking</th>
       <td style="border: solid 2px #bbb;"><a href="<?php echo base_url(); ?>ucto/syllabus">See here</a></td>
      <td style="border: solid 2px #bbb;"><a href="<?php echo base_url(); ?>ucto/marking-scheme">See here</a></td>
      <td style="border: solid 2px #bbb;"><a href="<?php echo base_url(); ?>ucto/sample-papers">See here</a></td>
      <td style="border: solid 2px #bbb;"><a href="https://www.olympiadsuccess.com/">See here</a></td>
    </tr>
    
  </tbody>
</table>
</div>
</div>

<div class="col s12 m2 l2">
	</div>
</div>
	 

<!-- --------------- -->
<div class="row" style="background-color: #43cec9;">
<style type="text/css">
	
	#blah {
  /*box-shadow: 0 1px 10px rgba(255, 0, 0, 0.46);*/
}

.icon-wrapper {
  display: inline-block;
}

.page-number-core {
  border: 3px solid #fff;
  padding: 10px;
  -webkit-border-radius: 1100%;
  -moz-border-radius: 100%;
  -o-border-radius: 100%;
  border-radius: 100%;
  box-shadow: 0 1px 10px rgba(255, 0, 0, 0.46);
  text-align: center;
  display: table-cell;
  vertical-align: middle;
}

.fix-editor {
  display: none;
}

.bold {
  font-weight: bold;
}
</style>
<div class="col-md-12">
	<h3 align="center" style="font-weight: bold;padding: 25px 10px 0px 10px;">Steps to Give Exam</h3>
</div>
	
<div class="col-md-12 col s12 center-align" id="sogeid">
	<div class="col s12 m3 l3s" >
		<h4 style="font-weight: normal; font-size: 13px;">
		  
		  <span class="fa-stack fa-3x">
        <i id='blah' class="fa fa-circle-o fa-stack-2x"></i>
        <strong class="fa-stack-1x">1</strong>
      </span>
            <br/>
		Login to the website <a href="<?php echo base_url(); ?>" style="color:yellow">www.unicusolympiads.com</a></h4>
	</div>
	<div class="col s12 m3 l3s" >
		<h4 style="font-weight: normal; font-size: 13px;">
            <span class="fa-stack fa-3x">
        <i id='blah' class="fa fa-circle-o fa-stack-2x"></i>
        <strong class="fa-stack-1x">2</strong>
      </span>
            <br/>
		Go to the dashboard and click Book Slot. Book your preferred time slot on that page.</h4>
	</div>

<div class="col s12 m3 l3s" >

		<h4 style="font-weight: normal; font-size: 13px;">

           <span class="fa-stack fa-3x">
        <i id='blah' class="fa fa-circle-o fa-stack-2x"></i>
        <strong class="fa-stack-1x">3</strong>
      </span>
            <br/>
	   Go to My Details and click Upload Documents. Then, upload all the required documents.</h4>
	</div>
<div class="col s12 m3 l3s" >
		<h4 style="font-weight: normal; font-size: 13px;">
          <span class="fa-stack fa-3x">
        <i id='blah' class="fa fa-circle-o fa-stack-2x"></i>
        <strong class="fa-stack-1x">4</strong>
      </span>
            <br/>
		Click ‘Take Exam’ to appear for the exam</h4>
	</div>
</div>
<button class="btn col s6 offset-s5" id="fbsubmit" type="submit" style="margin-bottom:25px;background-color: #ffd223 !important; margin-top: 20px; width: 200px;">
	 <?php $this->load->library('ion_auth'); 
                    if (!$this->ion_auth->logged_in()){?>
        <a href="<?=base_url()?>registration" class="black-text" style="font-weight: bold; font-size: 20px; margin: 20px;     background-color: #ffd223 !important; height: 50px !important; ">Start Now</a>
                    	 <?php } else { ?>
			 <a href="<?=base_url()?>crest/reg_form" class="black-text" style="font-weight: bold; font-size: 20px; margin: 20px;background-color: #ffd223 !important; height: 50px !important; ">Start Now</a>
			<?php } ?>  
</button>

</div>
<!-- ------------ -->
<div class="clear" style="margin-bottom: 0px !important;"></div>

 


 
	<?php
	$this->load->view('general/contact_us');
	?>
 
<br><br/>
 

 
 

<script src="<?php echo base_url(); ?>assets/js/slippry.min.js">
</script>
<script>
	function subject_d_func() {
		var elem = $('#subjects_d');
		var subjects = '';
		var instance = M.FormSelect.getInstance(elem);
		var vals = instance.getSelectedValues();
		if(vals.length < 1){
			alert("Please choose at least 1 Subject");
			return false;
		}
		for (var i = vals.length - 1; i >= 0; i--) {
			subjects += vals[i]+ ',';

		}
		$("#subjects").val(subjects);
		
		console.log(subjects);
		return true;		
	}
	$().ready(function(){

		$("#class").on("change",function(){
			//$(".subjects_div").show(400);
			if($("#class").val() > 5){
				//$("input:checkbox[name=CFO]").parent().parent().show(100);
			}
			if($("#class").val() < 6){

				 $("#subjects_d option[id='CFO']").hide(); 

				 
			}
			 
		});

		$("#subjects_d").on("blur",function(){
			subject_d_func();
			// $(this).each(function(){
			// });
		});
	});
	jQuery('#shop-demo').slippry({
		// general elements & wrapper
		slippryWrapper: '<div class="sy-box shop-slider" />', // wrapper to wrap everything, including pager
		elements: 'article', // elments cointaining slide content

		// options
		adaptiveHeight: false, // height of the sliders adapts to current slide
		start: 2, // num (starting from 1), random
		loop: true, // first -> last & last -> first arrows
		captionsSrc: 'article',
		captions: 'custom', // Position: overlay, below, custom, false
		captionsEl: '.product-name',

		// pager
		pager: false,

		// transitions
		slideMargin: 20, // spacing between slides (in %)
		useCSS: true,
		transition: 'horizontal',

		// slideshow
		auto: false
	});

  $("#email").on("change",function(){
    var email = $("#email").val();
    // var referral_code = $("#referral_code").val();   

    jQuery.ajax({
        type:'post',
        url:'<?php echo base_url()?>unicus/checkUserEmail',
        data:{email:email,'<?php echo $this->security->get_csrf_token_name();?>' : '<?php echo $this->security->get_csrf_hash();?>'},
        dataType:'json',
        async:false,
        success:function(response){
               // console.log(response);

               if(response==0)
               {
               	alert("User Already Exist. Please use Login button to login.");
               	$("#email").val('')
               }
               else if (response==1)
               {

               }
               else
               {

               }
           },
       });
});
  </script>
