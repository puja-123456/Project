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

@media only screen and (max-width:767px){
.text-center {
    width: 100% !important;
    margin-top: 49px;
    margin-left: 10px !important;
}
#menu, #toggle-menu {
    background-color: #751e49;
    width: 250px;
       }
#menu {
   position: relative !important;
    margin-top: -37px;
    left: 36px;
      }

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
	/*position: relative;
	background: #fff;
	padding: 0px 5px;
	top: -35px;*/
	text-align: center;
	/*margin: 0px 64px;
	left: 54px;
	border-radius: 6px;*/
}
input:not([type]):disabled, input:not([type])[readonly="readonly"], input[type=text]:not(.browser-default):disabled, input[type=text]:not(.browser-default)[readonly="readonly"], input[type=password]:not(.browser-default):disabled, input[type=password]:not(.browser-default)[readonly="readonly"], input[type=email]:not(.browser-default):disabled, input[type=email]:not(.browser-default)[readonly="readonly"], input[type=url]:not(.browser-default):disabled, input[type=url]:not(.browser-default)[readonly="readonly"], input[type=time]:not(.browser-default):disabled, input[type=time]:not(.browser-default)[readonly="readonly"], input[type=date]:not(.browser-default):disabled, input[type=date]:not(.browser-default)[readonly="readonly"], input[type=datetime]:not(.browser-default):disabled, input[type=datetime]:not(.browser-default)[readonly="readonly"], input[type=datetime-local]:not(.browser-default):disabled, input[type=datetime-local]:not(.browser-default)[readonly="readonly"], input[type=tel]:not(.browser-default):disabled, input[type=tel]:not(.browser-default)[readonly="readonly"], input[type=number]:not(.browser-default):disabled, input[type=number]:not(.browser-default)[readonly="readonly"], input[type=search]:not(.browser-default):disabled, input[type=search]:not(.browser-default)[readonly="readonly"], textarea.materialize-textarea:disabled, textarea.materialize-textarea[readonly="readonly"] {
     font-size: 14px;
     font-family: "Lucida Sans";
}
/* .cyan-text {
    color: #ffd223 !important;
}*/
.input-field .prefix { 
    font-size: 1.5rem !important;
}
@media only screen and (max-width: 786px){	
	#share_buttons button{
		font-size: 11px;
		margin-bottom: 5px;
	}
}


</style>
<script type="text/javascript">
	
$(document).ready(function(){
	// var instance = M.Datepicker.getInstance(elem);
	// var 
	$('.datepicker').datepicker({
		maxYear: 2017,
		minYear: 1990,
		format: 'yyyy-mm-dd',
		defaultDate: new Date(1980, 01, 00)
	});
	// var elem = document.querySelectorAll('.datepicker');
	// var instance2 = M.Datepicker.getInstance(elem);
	// var instance = 
	$(".datepicker").focus(function(){
		$(this).click();
	});
});
</script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.js"></script> -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/contact_us.css">
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">  -->

<p>&nbsp;</p>

<?php if($this_user->popup_id==1)

{ ?>

	<style>

@media only screen and (max-width: 1199px){	

#popupModal .modal-body {
  
 background: url("<?php echo base_url(); ?>assets/images/cashback_mobile_bg.png") no-repeat center ;
 /* background: none;*/
  height:400px;
  background-size: 100%;

}  
}

@media only screen and (min-width: 1200px){	

#popupModal .modal-body {
  
 background: url("<?php echo base_url(); ?>assets/images/cashback_desktop_bg.png") no-repeat center ;
 /* background: none;*/
  height:500px;

}  
}

</style>


<?php }

else if($this_user->popup_id==2) 
	{ ?>

	<style>

@media only screen and (max-width: 1199px){	

#popupModal .modal-body {
  
 background: url("<?php echo base_url(); ?>assets/images/pop_up.jpg") no-repeat center ;
 /* background: none;*/
  height:400px;
  background-size: 100%;

}  
}

@media only screen and (min-width: 1200px){	

#popupModal .modal-body {
  
 background: url("<?php echo base_url(); ?>assets/images/pop_up.jpg") no-repeat center ;
 /* background: none;*/
  height:500px;

}  
}

</style>


<?php }

else if($this_user->popup_id==3) 
	{ ?>

	<style>

@media only screen and (max-width: 1199px){	

#popupModal .modal-body {
  
 background: url("<?php echo base_url(); ?>assets/images/cashback_mobile_bg.png") no-repeat center ;
 /* background: none;*/
  height:400px;
  background-size: 100%;

}  
}

@media only screen and (min-width: 1200px){	

#popupModal .modal-body {
  
 background: url("<?php echo base_url(); ?>assets/images/cashback_bg.png") no-repeat center ;
 /* background: none;*/
  height:500px;

}  
}

</style>


<?php }

else if($this_user->popup_id==4) 
	{ ?>

	<style>

@media only screen and (max-width: 1199px){	

#popupModal .modal-body {
  
 background: url("<?php echo base_url(); ?>assets/images/cashback_mobile_bg.png") no-repeat center ;
 /* background: none;*/
  height:400px;
  background-size: 100%;

}  
}

@media only screen and (min-width: 1200px){	

#popupModal .modal-body {
  
 background: url("<?php echo base_url(); ?>assets/images/cashback_bg.png") no-repeat center ;
 /* background: none;*/
  height:500px;

}  
}

</style>


<?php }

else if($this_user->popup_id==5) 
	{ ?>

	<style>

@media only screen and (max-width: 1199px){	

#popupModal .modal-body {
  
 background: url("<?php echo base_url(); ?>assets/images/cashback_mobile_bg.png") no-repeat center ;
 /* background: none;*/
  height:400px;
  background-size: 100%;

}  
}

@media only screen and (min-width: 1200px){	

#popupModal .modal-body {
  
 background: url("<?php echo base_url(); ?>assets/images/cashback_bg.png") no-repeat center ;
 /* background: none;*/
  height:500px;

}  
}

</style>


<?php }

 ?>
<style>
form#reg_form ol li {
    font-size: 14px;
    font-family: "Lucida Sans";
} 
</style>
<a href='javascript:void(0);' style="display:none;" id="modal_link" data-toggle='modal' data-target='#popupModal'></a>

 <div class="modal fade" id="popupModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <!-- <h4 class="modal-title"style="text-align: center">Challenge Cases</h4> -->
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

          <!--   <div class="content"> -->

           <!--  <ul class="cases">

                <li><p> When the question is found to be incorrect or incomplete or none of the answers are correct, the question will be dropped and the marks allocated to that question will be awarded to all the students.</p></li>
                 <li><p> When the question is correct but the official answer key provided by <b>CREST</b> Olympiads is incorrect and the other option is correct, the correct answer will be changed and the score of all the students will be recalculated.</p> </li>
                  <li><p> When the question is correct and the official answer provided by <b>CREST</b> Olympiads is correct. However, there is another option which is correct too, the students' score, who marked the option correctly (which was initially marked as incorrect), will be updated.</p></li>



            </ul> -->

              
            


            <!--  </div> -->
          
        </div>
        
        <!-- Modal footer -->
      <!--   <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div> -->
        
      </div>
    </div>
  </div>
<div class="fuild-container">

  <div class="row contact">
      <div class="col s12 m2 well"> 
       <?php if ($this->ion_auth->logged_in()){ $this->load->view('templates/leftmenu'); }?>
       </div> 
     
    
    <div class="col s12 m10 offset-s2 text-center well" style="min-height:347px;padding: 0px 30px;">
      <h1>Profile</h1> 

 
	<!-- <?php// if ($this->ion_auth->logged_in()){ $this->load->view('templates/leftmenu'); }?>
	<div class="row text-center">
		<h1>Profile</h1>
	</div>
	<div class="row contact">
		<div class="col-md-12 text-center well" style="min-height:347px;"> -->

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

				<ol class="profileu"> 
<!-- <li>Information once submitted can't be edited</li>
<li>Home address should be correct since certificate would be sent at this address, if applicable</li>
<li>School Name & Student Name should be mentioned as you would like to appear in the <a href="" id="preview" data-toggle="modal" data-target="#myModal">Certificate</a></li>
<li>In case of any query, please write to us at <a href="mailto:info@crestolympiads.com">info@crestolympiads.com</a></li> -->
</ol>
					
					<div class="row">
						<br /> 
					
						<div class="col m6 s12 input-field">
							<i class="material-icons prefix cyan-text">account_circle</i>
							<?php
								if(isset($this_user)){
									$val = $this_user->username;
								}else{
									$val ="";
								}
							?>
							<input id="name" name="name" type="text" required class="validate" value="<?=$val?>" oninput="this.value = this.value.toUpperCase()" maxlength="30">
		          			<label for="name">Student Name</label>
							<?php echo form_error('name'); ?>
						</div>
						<div class="col m6 s12 input-field">
							<i class="material-icons prefix cyan-text">account_circle</i>
							<?php
								if(isset($this_user)){
									$val = $this_user->father_mother_guardian_name;
								}else{
									$val ="";
								}
							?>
							<input id="father_mother_guardian_name" name="father_mother_guardian_name" type="text" required class="validate" value="<?=$val?>" oninput="this.value = this.value.toUpperCase()">
		          			<label for="father_mother_guardian_name">Parent/Guardian Name</label>
							<?php echo form_error('father_mother_guardian_name'); ?>
						</div>
						<div class="col m6 s12 input-field">
							<i class="material-icons prefix cyan-text">event</i>
							<?php
								if(isset($this_user)){
									$val = $this_user->dob;
								}else{
									$val ="";
								}
							?>
					    	<input id="dob" name="dob" type="text" class="datepicker" value="<?=$val?>">
			                <label for="dob">Date of Birth</label>
			                <?php echo form_error('dob'); ?>
						</div>
                        <div class="col m6 s12 input-field">
							<i class="material-icons prefix cyan-text">email</i>
							<?php
								if(isset($this_user)){
									$val = $this_user->email;
								}else if(isset($email)){
									$val = $email->email;
								}else{
									$val ="";
								}
							?>
							<input id="email" name="email" type="email" required class="validate" value="<?=$val?>">
		          			<label for="email">Email</label>
							<?php echo form_error('email'); ?>
						</div>
                      <div class="col m6 s12 input-field">
							<i class="material-icons prefix cyan-text">phone</i>
							<?php
								if(isset($this_user)){
									$val = $this_user->phone;
								}else{
									$val ="";
								}
							?>
							<input id="phone" name="phone" type="text" required class="validate onlyNumbers" value="<?=$val?>">
		          			<label for="phone">Mobile Number</label>
							<?php echo form_error('phone'); ?>
						</div>
							<div class="col m6 s12 input-field">
							<i class="material-icons prefix cyan-text">mode_edit</i>
							<?php
								if(isset($this_user)){
									$val = $this_user->class;
								}else{
									$val ="";
								}
							?>
						    <select id="class" name="class" required disabled="">
								<option value="" disabled <?php if($val == "") echo "selected"; ?>>Select Class</option>
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
							<label for="class">Class</label>
							<?php echo form_error('class'); ?>
						</div>


						<div class="col m6 s12 input-field">
							<i class="material-icons prefix cyan-text">location_on</i>
							<?php
							$add = $this_user->home_address;
                             //$this_user->home_address
							//echo $a = implode("-/",$add);
                             $res = preg_replace('/[^A-Za-z0-9]/', ', ', $add);
                             $ressu = str_replace(', , ',', ',$res);
                             $ressult = substr_replace($ressu ,"",-2);

                             $hstring = $ressult;
                             $split = explode(",",$hstring);
                              //var_dump($split[0]);die;
                              //echo $ressu;die;
                             //echo $string = preg_replace('/-+/', '-', $add);
							//die;
						    if(isset($this_user)){
									$val = $split;
								}else{
									$val ="";
								}
							?>
							 <!-- <textarea id="home_address" name="home_address" class="validate materialize-textarea" required oninput="this.value = this.value.toUpperCase()"><?=$val?></textarea> -->
							 <input id="home_address" name="home_address" type="text" style="height: 2.1rem;" required class="validate" value="<?=$val[0]?>" oninput="this.value = this.value.toUpperCase()">
							 <input id="home_address1" name="home_address" type="text" style="height: 2.1rem;" required class="validate" value="<?=$val[1]?>" oninput="this.value = this.value.toUpperCase()">
							 <input id="home_address2" name="home_address" type="text" style="height: 2.1rem;" required class="validate" value="<?=$val[2]?>" oninput="this.value = this.value.toUpperCase()">
		          			<label for="home_address">Home Address</label>
							<?php echo form_error('home_address'); ?>
						</div>
						<div class="col m6 s12 input-field">
							<i class="material-icons prefix cyan-text">account_balance</i>
							<?php
							//echo $this_user->school;die;
								if(isset($this_user)){
									$val = $this_user->school;
								}else{
									$val ="";
								}
							?>
			                <input id="school" name="school" type="text" required class="validate" value="<?=$val?>" oninput="this.value = this.value.toUpperCase()" maxlength="30">
			                <label for="school">School Name</label>
			                <?php echo form_error('school'); ?>
						</div>

                          
						<div class="col m6 s12 input-field">
							<i class="material-icons prefix cyan-text">location_on</i>
							<?php
								if(isset($this_user)){
									$val = $this_user->school_address;
								}else{
									$val ="";
								}
							?>
							<input id="school_address" name="school_address" type="text" required class="validate" value="<?=$val?>" oninput="this.value = this.value.toUpperCase()">
		          			<label for="school_address">School Address</label>
							<?php echo form_error('school_address'); ?>
						</div>

						<div class="col m6 s12 input-field">
							<i class="material-icons prefix cyan-text">location_on</i>
							<?php
								if(isset($this_user)){
									$val = $this_user->pincode;
								}else{
									$val ="";
								}
							?>
							<input id="pincode" name="pincode" type="text" required class="validate onlyNumbers" value="<?=$val?>">
		          			<label for="pincode">Pincode</label>
							<?php echo form_error('pincode'); ?>
						</div>
					

                       	<div class="col m6 s12 input-field">
							<i class="material-icons prefix cyan-text">location_on</i>
							<?php
								if(isset($this_user)){
									$val = $this_user->city;
								}else{
									$val ="";
								}
							?>
							<input id="city" name="city" type="text" required class="validate" value="<?=$val?>" oninput="this.value = this.value.toUpperCase()" maxlength="10">
		          			<label for="city">City</label>
							<?php echo form_error('city'); ?>
						</div>
 





						<div class="col m6 s12 input-field">
							<i class="material-icons prefix cyan-text">location_on</i>
							<?php
								if(isset($this_user)){
									$val = $this_user->state;
								}else{
									$val ="";
								}
							?>
							<input id="state" name="state" type="text" required class="validate" value="<?=$val?>" oninput="this.value = this.value.toUpperCase()">
		          			<label for="state">State</label>
							<?php echo form_error('state'); ?>
						</div>
						<div class="col m6 s12 input-field">
							<i class="material-icons prefix cyan-text">location_on</i>
							<?php $this->load->view('auth/select_phone'); ?>
		          			<label for="country">Country</label>
							<?php echo form_error('country'); ?>
						</div>

						

						<div class="col m6 s12 input-field">
							<i class="material-icons prefix cyan-text">phone</i>
							<input id="country_code_value" name="country_code_value" type="text" required disabled class="validate onlyNumbers">
		          			<label for="country_code">Country Code</label>
							<input type="hidden" id="country_code" name="country_code" value="" required class="validate">
							<?php echo form_error('country_code'); ?>
						</div>
						
					<!-- 	<div class="col m6 s12 input-field">
							<i class="material-icons prefix">lock</i>
							<?php
								if(isset($this_user)){
									$val = $this_user->password;
								}
								// else if(isset($password)){
								// 	$val = $password->password;
								// }
								else{
									$val ="";
								}
							?>
							<input id="password" name="password" type="password" required class="validate" value="<?=$val?>">
		          			<label for="password">Password</label>
							<?php echo form_error('password'); ?>
						</div> -->
					
					</div>
					<p>Please click on the <a href="<?php echo base_url(); ?>/unicus/reg_form">link</a> to see your subscriptions or apply for more subjects.</p>
					<!-- <div class="row subjects_div">
					<?php $price = ' (INR 225/ USD 10.0)';?>
						
						<?php
						$val ="";
							if(isset($this_user)){
								$subjects = $this_user->prefered_subject;
							}else{
								$subjects ="";
							}
						?>
						<div class="col m12 s12 input-field">
							<label>Subjects</label>
						</div>
						<div class="col m6 s12 input-field">
							<?php 
							if(strpos($subjects,"CMO") > -1){
								$val = 'checked="checked" disabled';
							}else{$val ="disabled";}
							?>
							<label> <input class="subjects" type="checkbox" onclick="" value="CMO" <?=$val;?>><span>CREST Mathematics Olympiad<?=$price?></span></label>
						</div>
						<div class="col m6 s12 input-field">
							<?php 
							if(strpos($subjects,"CSO") > -1){
								$val = 'checked="checked" disabled';
							}else{$val ="disabled";}
							?>
							<label> <input class="subjects" type="checkbox" onclick="" value="CSO" <?=$val;?>><span>CREST Science Olympiad<?=$price?></span></label>
						</div>
						<div class="col m6 s12 input-field">
							<?php 
							if(strpos($subjects,"CEO") > -1){
								$val = 'checked="checked" disabled';
							}else{$val ="disabled";}
							?>
							<label> <input class="subjects" type="checkbox" onclick="" value="CEO" <?=$val;?>><span>CREST English Olympiad<?=$price?></span></label>
						</div>
						<div class="col m6 s12 input-field">
							<?php 
							if(strpos($subjects,"CCO") > -1){
								$val = 'checked="checked" disabled';
							}else{$val ="disabled";}
							?>
							<label> <input class="subjects" type="checkbox" onclick="" value="CCO" <?=$val;?>><span>CREST Cyber Olympiad<?=$price?></span></label>
						</div>
						 <div class="col m6 s12 input-field">
							<?php 
							if(strpos($subjects,"CRO") > -1){
								$val = 'checked="checked" disabled';
							}else{$val ="disabled";}
							?>
							<label> <input class="subjects" type="checkbox" onclick="" value="CRO" <?=$val;?>><span>CREST Reasoning Olympiad<?=$price?></span></label>
						</div>
						<div class="col m6 s12 input-field">
							<?php 
							if(strpos($subjects,"CGKO") > -1){
								$val = 'checked="checked"';
							}else{$val ="";}
							?>
							<label> <input class="subjects" type="checkbox" onclick="" value="CGKO" <?=$val;?>><span>CREST General Knowledge Olympiad<?=$price?></span></label>
						</div> -->
						<!-- <?php
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
								$val = 'checked="checked"';
							}else{$val ="";}
							?>
							<label> <input class="subjects" name="CFO" type="checkbox" onclick="" value="CFO" <?=$val;?>><span>CREST French Olympiad<?=$price?></span></label>
						</div>
						<input type="hidden" id="subjects" name="subjects" value="">
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p class="country_india_cost">Cost of 1 Subject: INR 225</p>
						<p class="country_other_cost">Cost of 1 Subject: INR 700 ≈ USD 10</p>
					</div>  -->
					<br>
					<div class="row">
						<!-- <div class="col m6 s12 input-field">
							<i class="material-icons prefix">show_chart</i>
							<input type="hidden" id="amount" name="amount" value="">

							<input id="amount_show" name="amount_show" type="text" required disabled class="validate onlyNumbers">
		          			<label for="amount_show">Total Amount</label>
							<?php echo form_error('amount'); ?>
						</div> -->
						<!-- <div class="col m6 s12 input-field">
							<i class="material-icons prefix">account_circle</i>
							<?php
								// if(isset($this_user)){
								// 	$val = $this_user->referral_code;
								// }else{
								// 	$val ="";
								// }
							?>
							<input id="referral_code" name="referral_code" type="text" class="validate" value="" oninput="this.value = this.value.toUpperCase()">
		          			<label for="referral_code">Enter Referral Code</label>
							<?php echo form_error('referral_code'); ?>
						</div> -->
					</div>
					<div class="row">
						<div class="col offset-m3 m6 s12 input-field">
							<!-- <a href class="btn col s12 preview" id="preview" data-toggle="modal" data-target="#myModal">Preview</a>	
							<br/></br/>	 -->				
							<!-- <button class="btn col s12 register-pay" type="submit">Register<i class="material-icons right">send</i></button> -->
						</div>
					</div>

				<?php echo form_close(); ?>


		    </div>
		</div>
	</div>
</div>


 

<button id="calculate_total_amount" style="display:none"></button>
<style type="text/css">
form input, form textarea, form button{
	margin: 3px 0px;
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
			// var data_val = $("#country").attr('data-value');
			// var data_val2 = $("#country").data('value');
			// console.log(country);
			console.log(option);
			// console.log(data_val);
			// console.log(data_val2);
			// console.log($("#country"));
		</script>
		<?php
	}
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
			if(country_sel == "Select Country"){
				alert("Please select the Country first.");
				$("#country").click();
				 e.stopPropagation();
				return false;
			}else{
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
			// $("#country_code").val(option);
			$("#country_code_value").val(option);
			var country_sel = $('#country option:selected').val();
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

		        var total_amount=amount-wamount;
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

			// $("#amount").val(amount);
			// $("#amount_show").val(amount);
			$("#amount").val(total_amount);
			$("#amount_show").val(total_amount);
			$("#amount_show").next().addClass('active');
			$(".register-pay").removeClass("disabled");	
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
		// var instance = M.FormSelect.getInstance(elem);
		// var vals = instance.getSelectedValues();
		// if(vals.length < 1){
		// 	alert("Please choose at least 1 Subject");
		// 	return false;
		// }
		// for (var i = vals.length - 1; i >= 0; i--) {

		// }
		$("#subjects").val(subjects);
		var amount = $("#amount").val();
		// if(amount < 1){
			if(amount < 0){
			return false;
		}
		// console.log(subjects);
		return true;		
	}

	
// document.addEventListener('DOMContentLoaded', function() {
//  	var options = {
// 		yearRange: [1950,2017],
// 		format: 'yyyy-mm-dd',
// 		defaultDate: new Date(1980, 01, 00)
// 	};
//     var elems = document.querySelectorAll('.datepicker');
//     var instances = M.Datepicker.init(elems, options);
// });


/*
    $("#preview").click(function () {


    
    

        //Get
var uname = $('#name').val();
var uclass = $('#class').val();
var uschool = $('#school').val();
// var uschool_address = $('#school_address').val();
var ucity = $('#city').val();
// var ustate = $('#state').val();
// var upincode = $('#pincode').val();
var uexam = $('.subjects:checkbox:checked').next().text();
var exam = uexam.split(' ').slice(0,3).join(" ");



//Set
$('#uname').text(uname);
$('#uclass').text(uclass);
$('#uschool').text(uschool);
// $('#uschool_address').text(uschool_address);
$('#ucity').text(ucity);
// $('#ustate').text(ustate);
// $('#upincode').text(upincode);
$('#exam').text(exam);

});*/

    $("#referral_code").on("change",function(){
    var email = $("#email").val();
    var referral_code = $("#referral_code").val();

    

    jQuery.ajax({
        type:'post',
        url:'<?php echo base_url()?>crest/checkReferralcode',
        data:{email:email,referral_code:referral_code,'<?php echo $this->security->get_csrf_token_name();?>' : '<?php echo $this->security->get_csrf_hash();?>'},
        dataType:'json',
        async:false,
        success:function(response){
               // console.log(response);

               if(response==0)
               {
               	alert("Not a Valid Referral code");
               	$("#referral_code").val('')
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



$("#reg_form :input").prop("disabled", true);

</script>
<style>
@media only screen and (max-width: 768px){	

.row.contact {
    margin-top: 0px;
}
}
@media only screen and (min-width: 768px){	

.row.contact {
    margin-top: 62px;
}
}
</style>
<script type="text/javascript">


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

<?php  if($this_user->popup_id>0 && $redirect_url=="login")
{
	echo '<script type="text/javascript">
   
    $(document).ready(function() {

    $("#modal_link").click();
});
</script>';

}
?>