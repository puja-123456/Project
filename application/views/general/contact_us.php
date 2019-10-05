
<script src="https://www.google.com/recaptcha/api.js"></script>
<script type="text/javascript">

$(document).ready(function() { 
  $("#contactform").submit(function() { 
 
    var v = grecaptcha.getResponse();
    if(v.length == 0)
    {
        document.getElementById('captcha').innerHTML="Please verify that you are human.";
        return false;
    }
    else
    {
        document.getElementById('captcha').innerHTML="Captcha verified";
        return true; 
    }
 
});

});
</script>
 
<style type="text/css"> 
.tabs .indicator {
    position: absolute;
    bottom: 0;
    height: 2px;
    background-color: #ffd223 !important;
  }
 
  .input-field {
    margin-top: 0.4rem !important;
  }
  .input-field.col label {
/*    left: .75rem;*/
    font-size: 13px;
}
 p{
 	font-size: 13px;
 }
.solid:before 
{
    content:"";
    display:block;
    position:absolute;
    z-index:-1;
    top:2px;
    left:2px;
    right:2px;
    bottom:2px;
    border:2px solid #fedd59;
    border-radius: 3em;
  }
  .solid{
    position:relative; z-index:10; padding:30px; background:#fff; border:2px solid #36F;margin-top: 70px;border-radius: 3em;
  }
  h3{
    font-style: unset !important;
  }
</style>
 
<div class="container" id="conid" >   
<div class="row"> 
 
<!--   </div>#095d807a !important
 -->    <div class="col s12 m4 l12 solid" >
    	<div class="col-s12 m8 l8" >  
	<?php if(isset($active_menu) && $active_menu == 'contact'){
		?>
		<p>&nbsp;</p>
		<!-- <div class="row left-align"> -->    
		<div class="center-align">
			<h2 style="text-align:center;font-weight: 700;text-transform: uppercase;font-style: 'lucida sans'">Contact Us</h2>
		</div>
		<?php
	} else {
		?>
		<div class="center-align">
			<h2 style="text-align:center;font-weight: 700;text-transform: uppercase;font-style: 'lucida sans'">Contact Us</h2>
		</div>

		<?php
	} ?>
	
	<?php if ($this->session->flashdata('success_message')) { ?>
	<div class="text-success center-align col-sm-12"><span>
		<strong>
			<?php echo $this->session->flashdata('success_message'); ?>
		</strong>
	</span><br></div>
	<?php } ?>

			<?php
			 $attributes = array('name'=>'contactform','id' => 'contactform' );
			 echo form_open("crest/contact", $attributes); ?>
			<div style="text-align: center;">
				<p style="color: #655c5c;font-size: 15px;">Write to us and we'll get back to you within 48 working hours.</p>
				<div class="col s12 m4 input-field">
					<i class="material-icons prefix">account_circle</i>
					<input id="name_contact" name="name_contact" type="text" required class="validate">
          			<label for="name_contact">Name</label>
					<?php echo form_error('name_contact'); ?>
				</div>
				<div class="col s12 m4 input-field">
					<i class="material-icons prefix">email</i>
					<input id="email_contact" name="email_contact" type="email" required class="validate">
          			<label for="email_contact">Email</label>
					<?php echo form_error('email_contact'); ?>
				</div>
				<div class="col s12 m4 input-field">
					<i class="material-icons prefix">phone</i>
					<input id="phone_contact" name="phone_contact" type="number" maxlength="10" required class="validate onlyNumbers">
          			<label for="phone_contact">Phone Number</label>
					<?php echo form_error('phone_contact'); ?>
				</div>
			</div>
			<div>
				<div class="input-field col s12 m12">
					<i class="material-icons prefix">mode_edit</i>
					<textarea id="message_contact" class="materialize-textarea" name="message_contact"></textarea>
					<label for="message_contact">Message</label>
					<?php echo form_error('message_contact'); ?>
				</div>
			</div>
			<!--  <div class="form-group paddin-cont">
                    	<label class="col-lg-3 control-label" for="ftname"></label>
                    	<div class="col s12 input-field">
                    		<label for="captcha"><?php echo $captcha['image']; ?></label>
                   		</div>
                    </div> -->

                    <div class="form-group paddin-cont">	
                    	<!-- <label class="col-lg-3 control-label" for="ftname">Captcha <span style="color:red;">*</span></label> -->
                    	
                    	<!-- <div class="col s12 input-field">
                    		<input class="form-control" type="text" autocomplete="off" name="userCaptcha" placeholder="Enter above text" required value="<?php if(!empty($userCaptcha)){ echo $userCaptcha;} ?>" />
                   			<?php  if (form_error('userCaptcha')){
	                        	?>
	                        		<span class="help-inline"><?php echo form_error('userCaptcha'); ?></span>
	                        	<?php 
	                        }?>
                   		</div> -->
                   	<!--

                   	For Talent Olympiads
                   	 	<div class="g-recaptcha" data-sitekey="6LeOSJ8UAAAAANaxxN5kMlm669pV6jw2A9b5oKqv" data-callback="correctCaptcha"> -->

                   		<!-- 	<div class="g-recaptcha" data-sitekey="6LfQP6kUAAAAAFCz5BoCw63BfRdIEX8S8_W8vjXg" data-callback="correctCaptcha">
                   			
                   		</div> -->
                   		<span id="captcha" style="margin-left:100px;color:red"></span> 
                   		
                    </div>    
			<div>
				<div style="padding: 0;">
					<input type="hidden" name="query_type" value="contactus">
					<button class="btn waves-effect waves-light col s3 offset-s5 input-field"  id="submit" type="submit">Submit<i class="material-icons right">send</i></button>
				</div>
			</div>
			<?php echo form_close(); ?>
		 
	</div>
<!-- #B18F69 -->

    </div>
 
  
  </div>


</div>
<style type="text/css">
@media screen and (min-width: 768px)
{
#conid{
		margin-top:80px;margin-bottom: 30px;
	}
#submit{
    top: -27px;left: -40px;font-size: 18px;background-color: #fedd59 !important;color: #000;
  }
}
@media screen and (max-width: 768px)
{
#conid{
		margin-top:-30px;margin-bottom: 60px;
	}
  #submit{
  top: -27px;left:0px;font-size: 14px;background-color: #fedd59 !important;color: #000;
}
}
form input, form textarea, form button{
	/*margin: 3px 0px;*/
}
.contact .well{
	padding: 15px;

/*	background: radial-gradient(rgba(0,0,56,1),#000);
	background-color: rgba(0,0,56,1);
	color:rgba(255,255,255,1);*/
}
.contact .well a {/*
	background: rgba(0,0,0,0);
	color:rgba(255,255,255,1);	*/
}

.row 
{
margin-bottom:0px;
	
}
</style>

