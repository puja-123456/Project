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
.validate{

	color:#000 !important;
}

.error
{
	color:#FF0000;
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


<div class="fuild-container">

  <div class="row contact">
      <div class="col s2 well"> 
       <?php if ($this->ion_auth->logged_in()){ $this->load->view('templates/leftmenu'); }?>
       </div> 
     
    
    <div class="col s10 offset-s2 text-center well" style="min-height:347px;padding: 0px 30px;">
      <h1>Upload Documents</h1> 

<!-- <div class="container">
	<?php //if ($this->ion_auth->logged_in()){ $this->load->view('templates/leftmenu'); }?>
	<div class="row text-center">
		<h1>Upload Documents</h1>
	</div>
	<div class="row contact">
		<div class="col-md-12 text-center well" style="min-height:347px;"> -->

	<?php if ($this->session->flashdata('success_message')) { ?>
	<div class="text-success text-center col s12" style="margin-top: 0px;"><span>
		<strong>
			<?php echo $this->session->flashdata('success_message'); ?>
		</strong>
	</span><br><Br></div>
	<?php } ?>
		    	
				<?php 
				$attributes = array('onsubmit' => 'return subject_d_func()','name'=>'upload_documents','id'=>'upload_documents');
				echo form_open_multipart("crest/upload_documents",$attributes); ?>
					
					<div class="row">
						<ol>
							<li><!-- Please ensure that the required documents are uploaded. Otherwise "<strong>Access Card</strong>" will not be issued. -->
								You are required to upload the documents before the exam.
							</li>
							<li>Maximum size of each document is 200 KB. In case the file size is more than 200 KB, <a href="https://compressimage.toolur.com/" target="_blank" rel="nofollow">click here</a> to compress image.</li>
						</ol>
					
						<div class="col m12 s12 input-field">
							<!-- <i class="material-icons prefix">lock</i> -->
							School ID Proof:
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
							<input id="school_id_proof" name="school_id_proof" type="file"  class="validate">
							 <?php if(!empty($school_id_proof)) {
							 echo "<style>#school_id_proof{ 
        color:transparent;
    }</style>"; ?>
                    <img src="<?php echo base_url(); ?>assets/uploads/user_details/<?php echo $school_id_proof; ?>" width="100"
                         height="100">


                    <?php } ?>
		          			<!-- <label for="school_id_proof">School ID Proof</label> -->
							<?php echo form_error('school_id_proof'); ?>
						</div>

						<div class="col m12 s12 input-field">
							Previous Year Marksheet:
						<!-- 	<i class="material-icons prefix">lock</i> -->
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
							<input id="previous_year_marksheet" name="previous_year_marksheet" type="file"  class="validate">
		          			<!-- <label for="previous_year_marksheet">Previous Year Marksheet</label> -->
		          				 <?php if(!empty($previous_year_marksheet)) {
		          				 echo "<style>#previous_year_marksheet{ 
        color:transparent;
    }</style>"; ?>
                    <img src="<?php echo base_url(); ?>assets/uploads/user_details/<?php echo $previous_year_marksheet; ?>" width="100"
                         height="100">
                    <?php } ?>
							<?php echo form_error('previous_year_marksheet'); ?>
						</div>

						<div class="col m12 s12 input-field">
							Student Photograph:
							<!-- <i class="material-icons prefix">lock</i> -->
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
							<input id="student_photograph" name="student_photograph" type="file"  class="validate">
		          		<!-- 	<label for="previous_year_marksheet">Student Photograph</label> -->
		          		<?php if(!empty($student_photograph)) {
		          		echo "<style>#student_photograph{ 
        color:transparent;
    }</style>"; ?>
                    <img src="<?php echo base_url(); ?>assets/uploads/user_details/<?php echo $student_photograph; ?>" width="100"
                         height="100">
                    <?php } ?>
							<?php echo form_error('student_photograph'); ?>
						</div>
						
					</div>
					
					<br>
				
					<div class="row">
						<div class="col offset-m3 m6 s12 input-field">
							<!-- <a href class="btn col s12 preview" id="preview" data-toggle="modal" data-target="#myModal">Preview</a>	
							<br/></br/>	 -->				
							<button class="btn col s12 register-pay" type="submit">Upload<i class="material-icons right">send</i></button>
						</div>
					</div>
				<?php echo form_close(); ?>
		    </div>
		</div>
	</div>
</div>


 

<button id="calculate_total_amount" style="display:none"></button>
<style type="text/css">
.register-pay{
	color:#000;
margin-bottom: 26px;
}
form input, form textarea, form button{
	margin: 3px 0px;
}
</style>


<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>assets/js/additional-methods.min.js"></script>

   <script>

    
        
    (function($,W,D)
    {
       var JQUERY4U = {};
   
       JQUERY4U.UTIL =
       {
           setupFormValidation: function()
           {
               //Additional Methods			
   		// $.validator.addMethod("lettersonly",function(a,b){return this.optional(b)||/^[a-z ]+$/i.test(a)},"Please enter valid name.");
   					
    	// 	$.validator.addMethod("phoneNumber", function(uid, element) {
    	// 		return (this.optional(element) || uid.match(/^\+?[0-9]*-?[0-9]*$/));
    	// 	},"Please enter a valid number.");

     //    $.validator.addMethod("pinCode", function(uid, element) {
     //      return (this.optional(element) || uid.match(/^\+?[0-9]*-?[0-9]*$/));
     //    },"Please enter a valid pincode.");  

        $.validator.addMethod('filesize', function (value, element, param) {
    return this.optional(element) || (element.files[0].size <= param)
}, 'File size must be less than equal to 200 KB');			
   		
    		//form validation rules

    		 $("#upload_documents").validate({
               rules: {
                   school_id_proof: { 
                    accept: "jpg|jpeg|png|pdf",
                    filesize:200000

                   } , 

                    previous_year_marksheet: { 
                    accept: "jpg|jpeg|png|pdf",
                    filesize:200000

                   } , 
                   student_photograph: { 
                    accept: "jpg|jpeg|png",
                    filesize:200000

                   } 



               },
                   errorPlacement: function(error, element) {
  if (element.attr("name") == "school_id_proof" || element.attr("name") == "previous_year_marksheet" || element.attr("name") == "student_photograph") {
      error.insertAfter(element);
  } else {
    error.insertBefore(element);
  }
},
errorElement: 'div',
               messages: {
                   school_id_proof: {
                        accept: "Only jpg / jpeg / png / pdf files are accepted."
                   },
                    previous_year_marksheet: {
                        accept: "Only jpg / jpeg / png / pdf files are accepted."
                   },
                    student_photograph: {
                        accept: "Only jpg / jpeg / png  files are accepted."
                   }
               },
                submitHandler: function(form) {
                       form.submit();
                   }
               });

           }
       }
   
       //when the dom has loaded setup form validation rules
       $(D).ready(function($) {
          JQUERY4U.UTIL.setupFormValidation();
      });
   
    })(jQuery, window, document);
    

   </script>