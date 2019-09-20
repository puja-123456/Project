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
@media only screen and (min-width:767px){
#menu, #toggle-menu {
    height: 366px !important;
    overflow-y: scroll !important;
}
}
@media only screen and (max-width:767px){
	#menu, #toggle-menu {
    height: auto !important;
    overflow-y: hidden !important;
   }
	.text-center {
    width: 100% !important;
    margin-top: 37px;
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

<!-- <div class="container">
	<?php //if ($this->ion_auth->logged_in()){ $this->load->view('templates/leftmenu'); }?>
	<div class="row text-center">
		<h1>Update Password</h1>
	</div>
	<div class="row contact">
		<div class="col-md-12 text-center well" style="min-height:347px;"> -->


<div class="fuild-container">

  <div class="row contact">
      <div class="col s2 well"> 
       <?php if ($this->ion_auth->logged_in()){ $this->load->view('templates/leftmenu'); }?>
       </div> 
     
    
    <div class="col s10 offset-s2 text-center well" style="min-height:347px;padding: 0px 30px;">
      <h1>Update Password</h1> 
   
	<?php if ($this->session->flashdata('success_message')) { ?>
	<div class="text-success text-center col s12" style="margin-top: 0px"><span>
		<strong>
			<?php echo $this->session->flashdata('success_message'); ?>
		</strong>
	</span><br><Br></div>
	<?php } ?>
		    	
				<?php 
				$attributes = array('onsubmit' => 'return subject_d_func()','name'=>'update_password','id'=>'update_password');
				echo form_open("crest/update_password",$attributes); ?>
					
					<div class="row">
						<br />

						<div class="col m6 s12 input-field">
							<i class="material-icons prefix">lock</i>
							<?php
							/*	if(isset($this_user)){
									$val = $this_user->password;
								}
								// else if(isset($password)){
								// 	$val = $password->password;
								// }
								else{
									$val ="";
								}*/
							?>
							<input id="old_password" name="old_password" type="password" required class="validate" value="">
		          			<label for="old_password">Old Password</label>
							<?php echo form_error('old_password'); ?>
						</div>
					
						<div class="col m6 s12 input-field">
							<i class="material-icons prefix">lock</i>
							<?php
							/*	if(isset($this_user)){
									$val = $this_user->password;
								}
								// else if(isset($password)){
								// 	$val = $password->password;
								// }
								else{
									$val ="";
								}*/
							?>
							<input id="password" name="password" type="password" required class="validate" value="">
		          			<label for="password">Password</label>
							<?php echo form_error('password'); ?>
						</div>

						<div class="col m6 s12 input-field">
							<i class="material-icons prefix">lock</i>
							<?php
							/*	if(isset($this_user)){
									$val = $this_user->password;
								}
								// else if(isset($password)){
								// 	$val = $password->password;
								// }
								else{
									$val ="";
								}*/
							?>
							<input id="confirm_password" name="confirm_password" type="password" required class="validate" value="">
		          			<label for="confirm_password">Confirm Password</label>
							<?php echo form_error('confirm_password'); ?>
						</div>
						
					</div>
					
					<br>
				
					<div class="row">
						<div class="col offset-m3 m6 s12 input-field">
							<!-- <a href class="btn col s12 preview" id="preview" data-toggle="modal" data-target="#myModal">Preview</a>	
							<br/></br/>	 -->				
							<button class="btn col s12 register-pay" type="submit">Update<i class="material-icons right">send</i></button>
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
button.btn.col.s12.register-pay {
    color: #000;
}
</style>


<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>

   <script> $("#update_password").validate({
               rules: {

               	 old_password: { 
                     required: true,
                     minlength: 5

                   } , 
                   password: { 
                     required: true,
                     minlength: 5

                   } , 

                       confirm_password: { 
                       	required: true,
                        equalTo: "#password"
                   }

               },
                   errorPlacement: function(error, element) {
  if (element.attr("name") == "password" || element.attr("name") == "confirm_password" || element.attr("name") == "old_password") {
      error.insertAfter(element);
  } else {
    error.insertBefore(element);
  }
},
errorElement: 'div',
               messages: {
               	 old_password: {
                       required: "Please enter old password",
                       minlength: "Password must contain atleast 5 characters"
                   },
                   password: {
                       required: "Please enter password",
                       minlength: "Password must contain atleast 5 characters"
                   },
                   confirm_password: {
                   	   required: "Please enter confirm password",
                       equalTo: "Password and Confirm Password donnot match"
                   }
               }

           });

   </script>