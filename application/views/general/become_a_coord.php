
<script src="https://www.google.com/recaptcha/api.js"></script>
<script type="text/javascript">

	$(document).ready(function() {
	

  $("#contactform").submit(function() {


// 	function get_action(form) 
// {
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
// }
});

});
</script>
<script type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/contact_us.css">
<p>&nbsp;</p>
<div class="container">
	<div class="row text-center">
		<h1>Become a Co-ordinator</h1>
	</div>
	<div class="row contact">
		<div class="col-md-12 text-center well" style="min-height:347px;">

	<?php if ($this->session->flashdata('success_message')) { ?>
	<div class="text-success text-center col s12" style="padding: 0px;"><span>
		<strong>
			<?php echo $this->session->flashdata('success_message'); ?>
		</strong>
	</span><br></div>
	<?php } ?>

			<?php echo form_open("crest/coordinator"); ?>
				<div class="row inner content">
				<p>For all the teachers, principals, mentors, educationists, or any other people, you can join us to become our coordinator for your specified location.</p>
				<div class="col s12 m6  input-field">
					<input class="form-control" id="name" name="name" type="text" required>
					<label for="name">Your Name</label><br>
					<?php echo form_error('name'); ?>
				</div>
				<div class="col s12 m6  input-field">
					<input class="form-control" id="email" name="email" type="email" required>
					<label for="email">Email</label><br>
					<?php echo form_error('email'); ?>
				</div>
				<div class="col s12 m6 input-field">
					<input id="phone" name="phone" type="text" required class="validate">
          			<label for="phone">Phone Number</label>
					<?php echo form_error('phone'); ?>
				</div>
				<div class="col s12 input-field">
					<textarea id="message" class="materialize-textarea" name="message"></textarea>
					<label for="message">Message</label><br>
					<?php echo form_error('message'); ?>
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

                   			<div class="g-recaptcha" data-sitekey="6LfQP6kUAAAAAFCz5BoCw63BfRdIEX8S8_W8vjXg" data-callback="correctCaptcha">
                   			
                   		</div>
                   		<span id="captcha" style="margin-left:100px;color:red"></span>
                    </div>    
			</div>
			<div class="row">
				<div class="col-sm-12  input-field">
					<input type="hidden" name="query_type" value="coordinator">
					<button class="btn right" type="submit">Submit</button>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>


<style type="text/css">
form input, form textarea, form button{
	margin: 3px 0px;
}
</style>
