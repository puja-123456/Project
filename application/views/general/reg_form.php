<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() {
	FB.init({
		appId            : '379880269065174',
		autoLogAppEvents : true,
		xfbml            : true,
		version          : 'v2.9'
	});

	$(document).trigger('fbload');
	FB.AppEvents.logPageView();
};

(function(d, s, id){
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) {return;}
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<style type="text/css">

@media only screen and (max-width:1199px){
	
	#share_buttons{
		margin-left: 0px !important;
		margin-right: 0px !important;
	}
	
	.link_to_share {
		left: 0px !important;
		top: -3px !important;
		margin: 0px auto !important;
		border: 1px solid #000;
	}
	#share_buttons button{
		padding: 5px;
	}

	.row .col.s6
	{
		width: 100% !important;
	}

	.subjects_div span
	{
		font-size:0.80rem !important;
	}


.row .col.offset-m3 {
	margin-left:10%;
}

#share_buttons{
	padding-top: 15px;
	padding-bottom: 10px;
}
 #share_buttons{
	margin-left: 60%;
	margin-right: 2%;
	background-color: #fefefe;
}

.link_to_share{
 
	text-align: center;
	 
}

.well
{
	padding:15px;
}
}

@media only screen and (max-width: 786px){	
	#regid{
		margin-top:-106px;
	}
	#share_buttons button{
		font-size: 11px;
		margin-bottom: 5px;
	}
} 

@media only screen and (min-width: 601px)
{
.datepicker-modal {
	
	top: 1% !important;
    max-height: 350px !important;



	}
}
</style>
<script type="text/javascript">

	document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems, options);
  });
	
$(document).ready(function(){
	 
	$('.datepicker').datepicker({
	 
		yearRange: [2000,2019],
		format: 'yyyy-mm-dd',
		 
		defaultDate: new Date()
	});
 
});
</script>
     
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
 
<p>&nbsp;</p>
<p>&nbsp;</p>

<?php if (!$this->ion_auth->logged_in()){?>


 <script>
  
  
  $(document).ready(function(){

    

     

     $('#home_address').click(function(e) {
var add1=$('#home_address').val();

     if(add1==""){
      $('.address').css('top','50px');
    }

 });

     $('#home_address').focus(function(e) {
var add2=$('#home_address').val();

     if(add2==""){
      $('.address').css('top','50px');
    }

 });

      $('#home_address').blur(function(e) {

var add3=$('#home_address').val();
     if(add3==""){
      $('.address').css('top','10px');
    }
    else
    {
      $('.address').css('top','50px');
    }

 });

       $('#home_address').change(function(e) {
        var add4=$('#home_address').val();
      
       if(add4!=""){
         $('.address').css('top','50px');
       }

       
    
 });
     

    $("#razorpay_button").hide();
    $("#ccavenue_button").hide();

    $("#preview").addClass("disabled");

  $('#preview').click(function() {


  // it is checked
if ($('.instructions').is(":checked"))
{ 
   
   var name = $("#name").val();
   var father_mother_guardian_name = $("#father_mother_guardian_name").val();
   var dob = $("#dob").val();
   var home_address = $("#home_address").val();
   var school = $("#school").val();
   var school_address = $("#school_address").val();
   var city = $("#city").val();
   var country = $('#country').val();
   if(country=="India")
   {
     var state = $("#selectstate").val();
   }
   else
   {
     var state = $("#state").val();
   }
  
   var school = $("#school").val();
   var pincode = $("#pincode").val();
   var email = $("#email").val();
   var phone = $("#phone").val();
   var student_class=$('#class').val();

   

    if(name=='' || father_mother_guardian_name=='' || dob=='' || home_address=='' || school=='' || school_address=='' || city=='' || state=='' || school=='' || pincode=='' || email=='' || phone =='')
   {
    alert("Please enter all the fields");
    return false;
   }

 
}

else
{
  alert("Please check the instructions.");
  return false;
}

      $('#student_name').text(name);
     $('#parent_name').text(father_mother_guardian_name);
     $('#home_add').text(home_address);
     $('#school_name').text(school);
     $('#school_add').text(school_address);
     $('#date_of_birth').text(dob);
     $('#student_city').text(city);
     $('#student_state').text(state);
     $('#student_country').text(country);
     $('#student_pincode').text(pincode);
     $('#mobile_number').text(phone);
     $('#email_address').text(email);
     $('#student_class').text(student_class);

 
  

});

  $('#cancel').click(function(){
    
    $("#razorpay_button").hide();
    $("#ccavenue_button").hide();
 
});

  $('#razorpay').click(function(){
    
    $("#razorpay_button").click();
   
  
});
  $('#ccavenue').click(function(){
    
    $("#ccavenue_button").click();
    
  
});
 });



 </script>

<?php } ?>







<!-- Modal Trigger -->
<!--   <a class="waves-effect waves-light btn modal-trigger" id="submitBtn" href="#confirm-submit">Modal</a> -->

  <!-- Modal Structure -->
  <div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               
                <h4 style="text-align: center">Confirm the details</h4>
            </div>
            <div class="modal-body">
                <p style="">Are you sure you want to submit the following details?<br>
                Please note that you will not be able to edit the details later.</p>
                <table class="table">
                    <tr>
                        <th>Student Name</th>
                        <td id="student_name"></td>
                    </tr>
                    <tr>
                        <th>Parent/Guardian Name</th>
                        <td id="parent_name"></td>
                    </tr>
                    <tr>
                        <th>Date of Birth</th>
                        <td id="date_of_birth"></td>
                    </tr>
                     <tr>
                        <th>Home Address</th>
                        <td id="home_add"></td>
                    </tr>
                    <tr>
                        <th>School Name</th>
                        <td id="school_name"></td>
                    </tr>
                     <tr>
                        <th>School Address</th>
                        <td id="school_add"></td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td id="student_city"></td>
                    </tr>
                    <tr>
                        <th>State</th>
                        <td id="student_state"></td>
                    </tr>
                     <tr>
                        <th>Pincode</th>
                        <td id="student_pincode"></td>
                    </tr>
                     <tr>
                        <th>Country</th>
                        <td id="student_country"></td>
                    </tr>
                    <tr>
                        <th>Mobile Number</th>
                        <td id="mobile_number"></td>
                    </tr>
                    <tr>
                        <th>Email Address</th>
                        <td id="email_address"></td>
                    </tr>
                    <tr>
                        <th>Student Class</th>
                        <td id="student_class"></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
               <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> -->
                 <a href="#!" id="cancel" class="modal-action modal-close btn btn-danger">Go Back</a>
                <a href="#!" id="razorpay" class="modal-action modal-close btn btn-primary">Pay With RazorPay</a>
                 <a href="#!" id="ccavenue" class="modal-action modal-close btn btn-success">Pay With CCAvenue</a>
            </div>
        </div>
    </div>
</div>

<style>

  .btn-danger
  {

    color: #fff;
    background-color: #d9534f;
    border-color: #d43f3a;
  }

  .btn-primary
  {

    color: #fff;
    background-color: #286090;
    border-color: #204d74;
  }

  .btn-success
  {

    color: #fff;
    background-color: #449d44;
    border-color: #398439;

  }


</style>
 

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.modal').modal();
  });
</script>
<style>
      .blink-two {
         animation: blinker-two 2.4s linear infinite;
         color: #ff0000;
         font-weight: bold;
         font-size:18px;
         text-align: center;
        
       }
       .blink-two a{
        color: #ff0000 !important;
       }
       @keyframes blinker-two {  
         100% { opacity: 0; }
       }

       @-webkit-keyframes blinker-two {  
         100% { opacity: 0; }
       }
@media screen and (max-width: 768px){
[type="checkbox"]+span:not(.lever) {
  line-height: 17px;
}
#menu{
	margin-top:30px;
	margin-bottom: 20px;
	position: relative !important;
}
.row .col.offset-s2 {
    margin-left: 0;
}
.row .col.offset-m3 {
     margin-left: 0;
}
}


  </style>

<div class="fuild-container" id="regid"> 
    
    <div class="row contact">
      <div class="col s12 m2 well"> 
	<?php if ($this->ion_auth->logged_in()){ $this->load->view('templates/leftmenu'); }?>
</div> 
	<div class="col s12 m10 offset-s2 text-center well row ">
		<h1><?php if ($this->ion_auth->logged_in()){ echo "Subscription to Olympiad Exam/s"; } else {?>Individual Registration Form <?php } ?></h1>
	
	<?php if (!$this->ion_auth->logged_in()){ ?> 
	<ol> 
<li>You cannot edit the information after submitting it.</li>
<li>School Name & Student Name will be printed on the certificate. So they must be mentioned as you would like them to appear on the certificate.</li>
<li>School Name & Student Name should be mentioned as you would like them to appear on the certificate.</li>
</ol>

<?php  } ?>
	
		<div class="col-md-12 text-center well" style="min-height:347px;">

	<?php if ($this->session->flashdata('success_message')) { ?>
	<div class="text-success text-center col s12"><span>
		<strong>
			<?php echo $this->session->flashdata('success_message'); ?>
		</strong>
	</span><br><Br></div>
	<?php } ?>
		    	
				<?php 
				$attributes = array('onsubmit' => 'return subject_d_func()','name'=>'reg_form','id'=>'reg_form');
				echo form_open("crest/reg_form",$attributes); ?>
					
					<div class="row">
						 
						<div class="col m6 s12 input-field" <?php if ($this->ion_auth->logged_in()){ echo "style=display:none";} ?>>
							<i class="material-icons prefix">redeem</i>
							 
							<input id="referral_code" name="referral_code" type="text" class="validate" value="" oninput="this.value = this.value.toUpperCase()">
		          			<label for="referral_code">Enter Referral Code (if available)</label>
							<?php echo form_error('referral_code'); ?>
						</div>

						
					
						<div class="col m6 s12 input-field" <?php if ($this->ion_auth->logged_in()){ echo "style=display:none";} ?>>
							<i class="material-icons prefix">account_circle</i>
							<?php
								if(isset($this_user)){
									$val = $this_user->username;
								}
								else if($this->input->post('name')){
								$val = $this->input->post('name');
								}else{
									$val ="";
								}
							?>
							<input id="name" name="name" type="text" required class="validate" value="<?=$val?>" oninput="this.value = this.value.toUpperCase()" maxlength="30">
		          			<label for="name">Student Name <span style="color:red">*</span></label>

							<?php echo form_error('name'); ?>
						</div>
						<div class="col m6 s12 input-field" <?php if ($this->ion_auth->logged_in()){ echo "style=display:none";} ?>>
							<i class="material-icons prefix">account_circle</i>
							<?php
								if(isset($this_user)){
									$val = $this_user->father_mother_guardian_name;
								}else{
									$val ="";
								}
							?>
							<input id="father_mother_guardian_name" name="father_mother_guardian_name" type="text" required class="validate" value="<?=$val?>" oninput="this.value = this.value.toUpperCase()">
		          			<label for="father_mother_guardian_name">Parent/Guardian Name <span style="color:red">*</span></label>
							<?php echo form_error('father_mother_guardian_name'); ?>
						</div>
						<div class="col m6 s12 input-field" <?php if ($this->ion_auth->logged_in()){ echo "style=display:none";} ?>>
							<i class="material-icons prefix">event</i>
							<?php
								if(isset($this_user)){
									$val = $this_user->dob;
								}else{
									$val ="";
								}
							?>
					    	<input id="dob" name="dob" type="text" class="datepicker" value="<?=$val?>">
			                <label for="dob">Date of Birth <span style="color:red">*</span></label>
			                <?php echo form_error('dob'); ?>
						</div>
						<div class="col m6 s12 input-field" <?php if ($this->ion_auth->logged_in()){ echo "style=display:none";} ?>>
							<i class="material-icons prefix">location_on</i>
							<?php
								if(isset($this_user)){
									$val = $this_user->home_address;
								}else{
									$val ="";
								}
							?>
							<input id="home_address" name="home_address" type="text" required class="validate" value="<?=$val?>" oninput="this.value = this.value.toUpperCase()" placeholder="Flat / House No. / Floor / Building">
							<input id="home_address1" name="home_address1" type="text" required class="validate" value="<?=$val?>" oninput="this.value = this.value.toUpperCase()" placeholder="Colony / Street / Locality">
							<input id="home_address2" name="home_address2" type="text" required class="validate" value="<?=$val?>" oninput="this.value = this.value.toUpperCase()" placeholder="Landmark (E.g. Near AIIMS Flyover, Behind Regal Cinema, etc.)">
		          			   <label for="home_address">Home Address <span style="color:red">*</span><!-- <span class="address" style="position: relative;top:10px; float: left; color: #808080; /* font-weight: 500; */">(Enter complete home address with pincode, city and state)</span> --></label>
							<?php echo form_error('home_address'); ?>
						</div>
						<div class="col m6 s12 input-field" <?php if ($this->ion_auth->logged_in()){ echo "style=display:none";} ?>>
							<i class="material-icons prefix">account_balance</i>
							<?php
								if(isset($this_user)){
									$val = $this_user->school;
								}
								else if($this->input->post('school')){
								$val = $this->input->post('school');
								}
								else{
									$val ="";
								}
							?>
			                <input id="school" name="school" type="text" required class="validate" value="<?=$val?>" oninput="this.value = this.value.toUpperCase()" maxlength="30">
			                <label for="school">School Name <span style="color:red">*</span></label>
			                <?php echo form_error('school'); ?>
						</div>
						<div class="col m6 s12 input-field" <?php if ($this->ion_auth->logged_in()){ echo "style=display:none";} ?>>
							<i class="material-icons prefix">location_on</i>
							<?php
								if(isset($this_user)){
									$val = $this_user->school_address;
								}else{
									$val ="";
								}
							?>
							<input id="school_address" name="school_address" type="text" required class="validate" value="<?=$val?>" oninput="this.value = this.value.toUpperCase()">
		          			<label for="school_address">School Address <span style="color:red">*</span></label>
							<?php echo form_error('school_address'); ?>
						</div>
						<div class="col m6 s12 input-field" <?php if ($this->ion_auth->logged_in()){ echo "style=display:none";} ?>>
							<i class="material-icons prefix">location_on</i>
							<?php
								if(isset($this_user)){
									$val = $this_user->city;
								}else{
									$val ="";
								}
							?>
							<input id="city" name="city" type="text" required class="validate" value="<?=$val?>" oninput="this.value = this.value.toUpperCase()" maxlength="30">
		          			<label for="city">School City <span style="color:red">*</span></label>
							<?php echo form_error('city'); ?>
						</div>
						
						<div class="col m6 s12 input-field" <?php if ($this->ion_auth->logged_in()){ echo "style=display:none";} ?>>
							<i class="material-icons prefix">location_on</i>
							<?php $this->load->view('auth/select_phone'); ?>
		          			<label for="country">Country <span style="color:red">*</span></label>
		          			<input type="hidden" id="country_code" name="country_code" value="">
							<?php echo form_error('country'); ?>
						</div>
						 <div class="col m6 s12 input-field" id="state_name" <?php if ($this->ion_auth->logged_in()){ echo "style=display:none";} ?>>
			              <i class="material-icons prefix">location_on</i>
			              <?php
			                if(isset($this_user)){
			                  $val = $this_user->state;
			                }else{
			                  $val ="";
			                }
			              ?>
			              <input id="state" name="state" type="text" required class="validate" value="<?=$val?>" oninput="this.value = this.value.toUpperCase()">
			                    <label for="state">School State <span style="color:red">*</span></label>
			              <?php echo form_error('state'); ?>
			            </div>

						 <div class="col m6 s12 input-field" id="state_list" <?php if ($this->ion_auth->logged_in()){ echo "style=display:none";} ?>>
                   <i class="material-icons prefix">location_on</i>
                  <?php  if($this_user->state == '0' || $this_user->state == ''){?>
                    <select class="form-control" id="selectstate" name="selectstate" style="margin-top: 24px;" required>
                      <option value="">Select State</option>
                      <option value="Andaman &amp; Nicobar Island">Andaman &amp; Nicobar Island</option>
                      <option value="Andhra Pradesh">Andhra Pradesh</option>
                      <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                      <option value="Assam">Assam</option>
                      <option value="Bihar">Bihar</option>
                      <option value="Chhattisgarh">Chhattisgarh</option>
                      <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                      <option value="Daman and Diu">Daman and Diu</option>
                      <option value="Delhi">Delhi</option>
                      <option value="Goa">Goa</option>
                      <option value="Gujarat">Gujarat</option>                      
                      <option value="Haryana">Haryana</option>
                      <option value="Himachal Pradesh">Himachal Pradesh</option>                     
                      <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                      <option value="Jharkhand">Jharkhand</option>
                      <option value="Karnataka">Karnataka</option>
                      <option value="Kerala">Kerala</option>
                      <option value="Lakshadweep">Lakshadweep</option>
                      <option value="Madhya Pradesh">Madhya Pradesh</option>
                      <option value="Maharashtra">Maharashtra</option>
                      <option value="Manipur">Manipur</option>
                      <option value="Meghalaya">Meghalaya</option>
                      <option value="Mizoram">Mizoram</option>
                      <option value="Nagaland">Nagaland</option>
                      <option value="Odisha">Odisha</option>
                      <option value="Puducherry">Puducherry</option>
                      <option value="Punjab">Punjab</option>
                      <option value="Rajasthan">Rajasthan</option>
                      <option value="Sikkim">Sikkim</option>
                      <option value="Tamil Nadu">Tamil Nadu</option>
                      <option value="Telangana">Telangana</option>
                      <option value="Tripura">Tripura</option>
                      <option value="Uttar Pradesh">Uttar Pradesh</option>
                      <option value="Uttarakhand">Uttarakhand</option>
                      <option value="West Bengal">West Bengal</option>
                  </select>
                  <?php }else{
                    echo $this_user->state;
                  }?>
                  <label for="state">School State <span style="color:red">*</span></label>
              <?php echo form_error('state'); ?>
               </div>

						<div class="col m6 s12 input-field" <?php if ($this->ion_auth->logged_in()){ echo "style=display:none";} ?>>
							<i class="material-icons prefix">location_on</i>
							<?php
								if(isset($this_user)){
									$val = $this_user->pincode;
								}else{
									$val ="";
								}
							?>
							<!-- <input id="pincode" name="pincode" type="text" required class="validate onlyNumbers" value="<?=$val?>"> -->
              <input id="pincode" name="pincode" type="text" required class="validate" value="<?=$val?>">
		          			<label for="pincode">Pincode <span style="color:red">*</span></label>
							<?php echo form_error('pincode'); ?>
						</div>

						<div class="col m6 s12 input-field" style="display:none">
							<i class="material-icons prefix">phone</i>
							<input id="country_code_value" name="country_code_value" type="text" required disabled class="validate onlyNumbers">
		          			<label for="country_code">Country Code <span style="color:red">*</span></label>
							<!-- <input type="hidden" id="country_code" name="country_code" value="" required class="validate"> -->
							<?php echo form_error('country_code'); ?>
						</div>
						<div class="col m6 s12 input-field" <?php if ($this->ion_auth->logged_in()){ echo "style=display:none";} ?>>
							<i class="material-icons prefix">phone</i>
							<?php
								if(isset($this_user)){
									$val = $this_user->phone;
								}
								else if($this->input->post('phone')){
								$val = $this->input->post('phone');
								}
								else{
									$val ="";
								}
							?>
							<input id="phone" name="phone" type="text" required class="validate onlyNumbers" value="<?=$val?>" maxlength="15">
		          			<label for="phone">Mobile Number <span style="color:red">*</span></label>
							<?php echo form_error('phone'); ?>
						</div>
						<div class="col m6 s12 input-field" <?php if ($this->ion_auth->logged_in()){ echo "style=display:none";} ?>>
							<i class="material-icons prefix">email</i>
							<?php
								if(isset($this_user)){
									$val = $this_user->email;
								}
								else if($this->input->post('email')){
								$val = $this->input->post('email');
								}
								else if(isset($email)){
									$val = $email->email;
								}else{
									$val ="";
								}
							?>
							<input id="email" name="email" type="email" required class="validate" value="<?=$val?>">
		          			<label for="email">Email <span style="color:red">*</span></label>
							<?php echo form_error('email'); ?>
						</div>
						<div class="col m6 s12 input-field" <?php if ($this->ion_auth->logged_in()){ echo "style=display:none";} ?>>
							<i class="material-icons prefix">lock</i>
							<?php
								if(isset($this_user)){
									$val = $this_user->password;
								}
								 
								else{
									$val ="";
								}
							?>
							<input id="password" name="password" type="password" required class="validate" value="<?=$val?>">
		          			<label for="password">Password <span style="color:red">*</span></label>
							<?php echo form_error('password'); ?>
						</div>
						<div class="col m6 s12 input-field" <?php if ($this->ion_auth->logged_in()){ echo "style=display:none";} ?>>
							<i class="material-icons prefix">mode_edit</i>
							<?php
								if(isset($this_user)){
									$val = $this_user->class;
								}else{
									$val ="";
								}
							?>
						    <select id="class" name="class" required class="validate" >
								<option value="" disabled <?php if($val == "") echo "selected"; ?>>Select Class </option>
								<option value="1" <?php if($val == 1) echo "selected"; ?>>Class 1</option>
								<option value="2" <?php if($val == 2) echo "selected"; ?>>Class 2</option>
								<option value="3" <?php if($val == 3) echo "selected"; ?>>Class 3</option>
								<option value="4" <?php if($val == 4) echo "selected"; ?>>Class 4</option>
								<option value="5" <?php if($val == 5) echo "selected"; ?>>Class 5</option>
								<option value="6" <?php if($val == 6) echo "selected"; ?>>Class 6</option>
								<option value="7" <?php if($val == 7) echo "selected"; ?>>Class 7</option>
								<option value="8" <?php if($val == 8) echo "selected"; ?>>Class 8</option>
								<option value="9" <?php if($val == 9) echo "selected"; ?>>Class 9</option>
								<option value="10" <?php if($val == 10) echo "selected"; ?>>Class 10</option>
							</select>
							<label for="class">Class <?php echo "(".date('Y')."-".date('Y', strtotime('+1 year')).")";?><span style="color:red">*</span></label>
							<?php echo form_error('class'); ?>
						</div>
					</div>
					<div class="row subjects_div">
					<?php $price = ' (INR 225/ USD 10.0)';$cisro_price = ' (INR 500/ USD 25.0)';?>
						
						<?php
						$val ="";
							if(isset($this_user_details)){
								$subjects = $this_user_details->subjects;
							}else{
								$subjects ="";
							}
						?>
						<div class="col m12 s12 input-field">
							<label>Subjects <span style="color:red">*</span></label>
						</div>
						<div class="col m6 s12 input-field">
							<?php 
							if(strpos($subjects,"CMO") > -1){
								$val = 'checked="checked" disabled';
							}else{$val ="";}
							?>
							<label> <input class="subjects" type="checkbox" onclick="" value="CMO" <?=$val;?>><span>CREST Mathematics Olympiad<?=$price?></span></label>
						</div>
						<div class="col m6 s12 input-field">
							<?php 
							if(strpos($subjects,"CSO") > -1){
								$val = 'checked="checked" disabled';
							}else{$val ="";}
							?>
							<label> <input class="subjects" type="checkbox" onclick="" value="CSO" <?=$val;?>><span>CREST Science Olympiad<?=$price?></span></label>
						</div>
						<div class="col m6 s12 input-field">
							<?php 
							if(strpos($subjects,"CEO") > -1){
								$val = 'checked="checked" disabled';
							}else{$val ="";}
							?>
							<label> <input class="subjects" type="checkbox" onclick="" value="CEO" <?=$val;?>><span>CREST English Olympiad<?=$price?></span></label>
						</div>
						<div class="col m6 s12 input-field">
							<?php 
							if(strpos($subjects,"CCO") > -1){
								$val = 'checked="checked" disabled';
							}else{$val ="";}
							?>
							<label> <input class="subjects" type="checkbox" onclick="" value="CCO" <?=$val;?>><span>CREST Cyber Olympiad<?=$price?></span></label>
						</div>

						<?php 
							if(strpos($subjects,"CRO") > -1){
								$val = 'checked="checked" disabled';
								
							}
							else
								{
									$val ="";
									
								}
							?>
							<?php if(!empty($val)) 
							{?>
					 	 <div class="col m6 s12 input-field"  >
							
							<label> <input class="subjects" type="checkbox" onclick="" value="CRO" <?=$val;?>><span>CREST Reasoning Olympiad<?=$price?></span></label>
						</div> 
						<?php } ?>
             <?php 
              if(strpos($subjects,"CISRO") > -1){
                $val = 'checked="checked" disabled';
                
              }
              else
                {
                  $val ="";
                  
                }
              ?>
              <?php if(!empty($val)) 
              {?>
             <div class="col m6 s12 input-field"  >
              
              <label> <input class="subjects" type="checkbox" onclick="" value="CISRO" <?=$val;?>><span>CREST Inter-school Reasoning Olympiad<?=$cisro_price?></span></label>
            </div> 
            <?php } ?>
						 
						<?php
						$hide_cfo = "";
							if(isset($this_user)){
								if($this_user->class < 6 ){
									$hide_cfo = 'style="display:none;"';
								}
							}

						?>
						<div class="col m6 s12 input-field" <?=$hide_cfo;?>>
							<?php 
							if(strpos($subjects,"CFO") > -1){
								$val = 'checked="checked" disabled';
							}else{$val ="";}
							?>
							<label> <input class="subjects" name="CFO" type="checkbox" onclick="" value="CFO" <?=$val;?>><span>CREST French Olympiad<?=$price?></span></label>
						</div>
						<input type="hidden" id="subjects" name="subjects" value="">
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p class="country_india_cost">Cost of 1 Subject: INR 225</p>
						<p class="country_other_cost">Cost of 1 Subject: INR 700 ≈ USD 10</p>
					</div>
					<br>

					<?php
					 if ($this->ion_auth->logged_in()){
								if(isset($wallet_amount)){
									$val = $wallet_amount;
								}else{
									$val ="0";
								}

								echo "Total amount due : " .'<input id="total_amount_show" name="total_amount_show" type="text" required disabled class="validate onlyNumbers">';
							
							echo "<br>";

														

								echo "You are subscribing to : ".'<input id="total_school_subscribed" name="total_school_subscribed" type="text" required disabled>';
							
							echo "<br>";

							
								if(isset($wallet_amount)){
									$val = $wallet_amount;
								}else{
									$val ="0";
								}

								echo "(-) Your wallet amount : ".$val;
							

							echo "<br>";

						}

							
								if(isset($wallet_amount)){
									$val = $wallet_amount;
								}else{
									$val ="0";
								}
								 if ($this->ion_auth->logged_in()){

								echo "Net amount due (-ve amount indicates +ve wallet balance): ".'<input id="amount_show" name="amount_show" type="text" required disabled class="validate onlyNumbers">';
							}
							else
							{

								echo "Net amount due : ".'<input id="amount_show" name="amount_show" type="text" required disabled class="validate onlyNumbers">';

							}
							?>
					<div class="row">						
						
						<div class="col m6 s12 input-field" style="display: none;">

							<i class="material-icons prefix">account_circle</i>
							<?php
								if(isset($wallet_amount)){
									$val = $wallet_amount;
								}else{
									$val ="0";
								}
							?>
							<input id="wallet_amount" name="wallet_amount" type="text" class="validate" value="<?=$val?>" readonly>
		          			<label for="wallet_amount">Your Wallet Amount</label>
							<?php echo form_error('wallet_amount'); ?>

							
						</div>
						<input type="hidden" id="amount" name="amount" value="">
 

						
						
					</div>
					<div class="row">

					

					<p><strong>Important Instructions:</strong></p>

					<ul class="list">
						<li>
						Unicus Olympiads will be conducted online and the students will have to take the exams from their residence or any other place where they have access to computer with good Internet connectivity. The schools who have subscribed to these exams, may decide to conduct these exams using their computer lab. The exam can't be taken using Mobile device. Hence, the student should have access to a good laptop/desktop with latest version of the browser (preferably Google Chrome) and 2 Mbps Internet connectivity.
					</li> 
					<br>
					<li>
						Unicus Olympiads brings progressive thinking and hence, is quite different from traditional Olympiad exams. Click <a href="<?=base_url();?>about-us#traditional-vs-unicus-olympiads" target="_blank">here</a> to know more.

					</li>
					<br>
					<li>
						It’s in the best interest of students not to use any unfair means while attempting these exams. These exams are just a first step for a much bigger goal of appearing for competitive exams that are being conducted online these days. Although all the exams will require the students to have access to the webcam.
				    </li>
				    <br>
				    <li>
						Please check the <a href="https://www.crestolympiads.com/exam-schedule" target="_blank">exam schedule</a>. We will provide flexibility to the students to select preferred dates for Preliminary Round exam.
					</li>
					<br>
					<li>
						We take preparation seriously. Hence, there would be one mock test, provided complimentary. The student can appear for the test 3 times. He/she can view the performance too on his/her dashboard.
          </li>
					<br>
					<li>
						Do read the <a href="https://www.crestolympiads.com/faqs" target="_blank">Frequently Asked Questions (FAQs)</a> thoroughly.
					</li>
					<br>
					<li>
            Kindly make payment only after reading the above statements. The fees once paid is non-refundable. For any queries or suggestions,  do write to us at <a href="mailto:info@crestolympiads.com">info@crestolympiads.com</a>.
						</li>
					</ul>
					 
					<label> <input class="instructions" type="checkbox"  onclick="" value="" required><span>I acknowledge that I have read and agree to the above Instructions.</span></label>
			
					</div>
					<style>
					.hr-text {
  line-height: 2.5em;
/*  position: relative;
*/  outline: 0;
  border: 0;
  color: black;
  /*text-align: center;*/
  height: 1.5em;
  opacity: .5;
}
 
  .hr-text:after {
    content: attr(data-content);
    position: relative;
    display: inline-block;
    color: black; 
    padding: 0 .5em;
    line-height: 1.5em; 
    color: #818078;
    background-color: #fcfcfa;
  }
  @media only screen and (max-width: 1199px){

  	
 
#hrid{
  	max-width: 50%; margin: 25px 175px;
  }
   .hr-text:before {
    content: ''; 
    background: linear-gradient(to right, transparent, #818078, transparent);
    position: absolute;
    left: 0;
    top: 50%;
    width: 98%;
    height: 1px;
  } 
}
@media only screen and (min-width: 1200px){	
 
 #hrid{
  	max-width: 50%;margin: 22px 161px;
  }
   .hr-text:before {
    content: ''; 
    background: linear-gradient(to right, transparent, #818078, transparent);
    position: absolute;
    left: 0;
    top: 50%;
    width: 50%;
    height: 1px;
  }
}
   
				</style>
				 <div class="row">
             
              <div class="col offset-m3 m9 s12 input-field">
               
             
              <input type="hidden" id="payment_type" name="payment_type">
                <?php if (!$this->ion_auth->logged_in()){?> 
                <a class="btn col s6 btn modal-trigger register-pay" id="preview" href="#confirm-submit">Preview & Pay</a>
              <br><br>

            <?php }   ?>
            
              <button class="btn col s6 register-pay" id="razorpay_button"  type="submit" style="margin-right: 1px;">Pay With RazorPay
              <i class="material-icons right">send</i></button>
              <button class="btn col s6 register-pay" id="ccavenue_button" type="submit">Pay With CCAvenue
              <i class="material-icons right">send</i></button>
               
            </div>
          </div>
				<?php echo form_close(); ?>
		    </div>
		</div>
	</div>
	</div>
</div>


 

<button id="calculate_total_amount" style="display:none"></button>
<style type="text/css">
form input, form textarea, form button{
	margin: 3px 0px;
}

ul.list li {
  list-style-type: disc !important;
      margin-left: 15px;
}
</style>
<?php
if(isset($this_user)){
	if(isset($this_user->country)){
		?>
		<script type="text/javascript">
			var country = '<?=$this_user->country;?>';
			$("#country").val(country);

			var option = $('#country option:selected').attr("data-value");
			// $("#country_code_value").val(option);
			$("#country_code").val(option);
			$("#country_code_value").val(option);
			$("#country_code_value").next().addClass('active');
			 
			console.log(option);
			 
		</script>
		<?php
	}
}

?>
<?php 

 if (!$this->ion_auth->logged_in()){

  if(empty($this_user->country)){
    ?>

<script>

    $(document).ready(function() {

$("#state_list").hide();
$("#state_name").hide();


  

});

  </script>

<?php }


  
  else if($this_user->country=="India")
    { ?>
<script>
$("#state_list").show();
$("#state_name").hide();
</script>

    <?php } else{ ?>

      <script>
      $("#state_name").show();
      $("#state_list").hide();
    </script>
    <?php }

  }


?>
<script type="text/javascript">

	$().ready(function(){
		$(".register-pay").addClass("disabled");
		$(".country_india_cost").hide();
		$(".country_other_cost").hide();
		<?php
		if(!isset($this_user)){
			?>
			$(".subjects_div").hide();
			<?php
		}
		?>

		var amount = 0;
			var sclass = $("#class").val();
			var country_sel = $('#country option:selected').val();
				// console.log(country_sel );
			var option = $('#country option:selected').attr("data-value");
			$("#country_code").val(option);
			if(country_sel == "Select Country"){
				//alert("Please select the Country first.");
				$("#country").click();
				 e.stopPropagation();
				return false;
			}
			else if(amount == 0)
			{
				$(".register-pay").addClass("disabled");
			}

			else {
				$(".register-pay").removeClass("disabled");
			}
			if(country_sel.toLowerCase() != 'india' ){
				$("input:checkbox[class=subjects]:checked").not(":disabled").each(function () {
					if(sclass < 6 ){
						if($(this).val() != 'CFO'){
						amount += 700;
						}
					}else{
					amount += 700;

					}
		        });
			}else{
				$("input:checkbox[class=subjects]:checked").not(":disabled").each(function () {
					if(sclass < 6 ){
						if($(this).val() != 'CFO'){
							amount += 225;
						}
					}else{
					amount += 225;
						
					}
		        });

			}

			$("#amount").val(amount);
			$("#amount_show").val(amount);
			$("#amount_show").next().addClass('active');
			
		// get_total_amount();
	});
	$().ready(function(){
	$("#country").on("change",function(e){

			var option = $('#country option:selected').attr("data-value");
			// $("#country_code_value").val(option);
			 $("#country_code").val(option);
			$("#country_code_value").val(option);
			var country_sel = $('#country option:selected').val();
       if(country_sel=="India")
      {
        $("#state_list").show();
        $("#state_name").hide();    
      }

      else

      {
        $("#state_name").show();
        $("#state_list").hide();
      }
			// console.log(country_sel);
			if(country_sel == "Select Country"){
				alert("Please select the Country first.");
				$("#country").click();
				 e.stopPropagation();
				return false;
			}else{
				$("#country_code_value").next().addClass('active');
				// console.log($(this).val());
				if(country_sel.toLowerCase() == 'india'){
					$(".country_india_cost").show();
					$(".country_other_cost").hide();
				}else{
					$(".country_india_cost").hide();
					$(".country_other_cost").show();
				}
				$("#calculate_total_amount").click();
				// get_total_amount();
			}
		});
	});
	$("#class").on("change",function(){
		$(".subjects_div").show(400);
		$(".red-text").hide();
		
		if($("#class").val() > 5){
			$("input:checkbox[name=CFO]").parent().parent().show(100);
		}
		if($("#class").val() < 6){
			// console.log($("#class").val());
			$("input:checkbox[name=CFO]").prop("checked", false);
			$("input:checkbox[name=CFO]").parent().parent().hide(100);
		}
	});
	$(".subjects").on("click",function(e){
		var country_sel = $('#country option:selected').val();
		if(country_sel == "Select Country"){
			alert("Please select the Country first.");
			$("#country").click();
			 e.stopPropagation();
			return false;
		}else{
			$("#calculate_total_amount").click();
		}
	});
	$("#calculate_total_amount").on("click",function(){
		// function get_total_amount(){
			// var elem = $('.subjects_d');
			var amount = 0;
			var sclass = $("#class").val();
			var wamount = $("#wallet_amount").val();

			var country_sel = $('#country option:selected').val();
				// console.log(country_sel );
			if(country_sel.toLowerCase() != 'india' ){
				$("input:checkbox[class=subjects]:checked").not(":disabled").each(function () {
					if(sclass < 6 ){
						if($(this).val() != 'CFO'){
						amount += 700;
						}
					}else{
					amount += 700;

					}
		        });

		        if(amount>0 && amount>wamount )
		        {

		        var total_amount=amount-wamount;
		    }
		    else
		    {
		    	var total_amount=wamount-amount;
		    }
			}else{
				$("input:checkbox[class=subjects]:checked").not(":disabled").each(function () {
					if(sclass < 6 ){
						if($(this).val() != 'CFO'){
							amount += 225;
						}
					}else{
					amount += 225;
						
					}
		        });


		         var total_amount=amount-wamount;

		        

			}

			var val = [];
        $(':checkbox:checked').not(":disabled").each(function(i){
          val[i] = $(this).val();
        });

 //    if(val=="")
    
 //    {    

 //    	$(".register-pay").click();
	// 			 e.stopPropagation();
	// 			return false;
	// }
	// else{

	// 			$(".register-pay").removeClass("disabled");
	// 		}
		

 if(val=="")
 {
 	var total_amount=0;
 	$(".register-pay").addClass("disabled");
				
 }

 else
 {
 	$(".register-pay").removeClass("disabled");

 }

 if(total_amount<=0)
 {
 	//$(".register-pay").html('Subscribe');
 }
 else
 {
 	//$(".register-pay").html('Pay');
 }

			// $("#amount").val(amount);
			// $("#amount_show").val(amount);
			$("#amount").val(total_amount);
			$("#amount_show").val(total_amount);
			$("#total_amount_show").val(amount);
			$("#total_school_subscribed").val(val);
			$("#amount_show").next().addClass('active');
			//$(".register-pay").removeClass("disabled");	
		// }
	// 	Materialize.updateTextFields();
	});
	function subject_d_func() {
		var elem = $('.subjects_d');
		var sclass = $("#class").val();
		var subjects = '';
		$("input:checkbox[class=subjects]:checked").each(function () {
			if(sclass < 6 ){
				if($(this).val() != 'CFO'){
					subjects += $(this).val() + ',';
				}
			}else{
					subjects += $(this).val() + ',';
			}
            // alert("Id: " + $(this).attr("id") + " Value: " + $(this).val());
        });
		 
		$("#subjects").val(subjects);
		var amount = $("#amount").val();
		 
		return true;		
	}

	
 

    $("#email").on("change",function(){
    var email = $("#email").val();
    // var referral_code = $("#referral_code").val();

    

    jQuery.ajax({
        type:'post',
        url:'<?php echo base_url()?>crest/checkUserEmail',
        data:{email:email,'<?php echo $this->security->get_csrf_token_name();?>' : '<?php echo $this->security->get_csrf_hash();?>'},
        dataType:'json',
        async:false,
        success:function(response){
               // console.log(response);

               if(response==0)
               {
               	alert("User Already Exist!");
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

     $("#school").on("change",function(){

       var school = $("#school").val();

       if(school.length<10)
       {
        alert("Please mention the full name of the school.");
        $("#school").val('');
       }


     });

    

$("#razorpay_button").on("click",function(){

ga('send','event','Register','Register','User-Registration');
	
	if ($('.instructions').is(":checked"))
{	
  // it is checked
   // var name = $("#name").val();
   // var father_mother_guardian_name = $("#father_mother_guardian_name").val();
   // var dob = $("#dob").val();
   // var home_address = $("#home_address").val();
   // var school = $("#school").val();
   // var school_address = $("#school_address").val();
   // var city = $("#city").val();
   // var state = $("#state").val();
   // var school = $("#school").val();
   // var pincode = $("#pincode").val();
   // var email = $("#email").val();
   // var phone = $("#phone").val();

   //  if(name=='' || father_mother_guardian_name=='' || dob=='' || home_address=='' || school=='' || school_address=='' || city=='' || state=='' || school=='' || pincode=='' || email=='' || phone =='')
   // {
   // 	alert("Please enter all the fields");
   // }

   // else

   // {


  var payment_type="razorpay";
  $("#payment_type").val(payment_type);
  $("#reg_form").submit(); // Submit the form

// }
}

else
{
	alert("Please check the instructions.");
}

	

});

$("#ccavenue_button").on("click",function(){

ga('send','event','Register','Register','User-Registration');

	if ($('.instructions').is(":checked"))
{	

   

   	var payment_type="ccavenue";
   $("#payment_type").val(payment_type);  
   $("#reg_form").submit(); // Submit the form

   
   
}

else
{
	alert("Please check the instructions.");
}

});



</script>

<script type="text/javascript">

if (window.performance && window.performance.navigation.type == window.performance.navigation.TYPE_BACK_FORWARD) {
     location.reload(true);
}

$(document).ready(function(){
	$(".link_to_share > span").hover(function(){
		$(this).css("cursor","pointer");
	});

	 
});


if($(window).width()<768){
	var winheight = $(window).height();
	$(".hide_on_phone").hide();
};

function shareOnFacebook(url) {
	window.open(url);
	return false;
}


$(document).ready(function() {

	var isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
		BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
		iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
		Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
		Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
		any: function() {
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		}
	};
	$('.whatsapp').click(function() {

		if( isMobile.any() ) {

			var text = "Crest Olympiads! "+$(this).attr("data-text");
			var url = $(this).attr("data-link");
			var message = encodeURIComponent(text) + " - " + encodeURIComponent(url);
			var whatsapp_url = "whatsapp://send?text=" + message;
			window.location.href = whatsapp_url;
		} else {
			alert("You may share this link only through a mobile phone.");
		}

	});
});





</script>