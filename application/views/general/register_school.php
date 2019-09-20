
<style type="text/css">
.label-no-padding{
	padding: 0px !important;
}
.email-background{
	background-color: #fff !important;
	border: 1px solid #ccc !important;
	padding: 5px !important;
	margin-top: 0 !important;
}

.partner li{
	font-family: "Lato";
	font-style: normal;
	font-weight: 400;
	font-size: 16px;
	color: #272528;
}
</style>

<div class="container">
	<p>&nbsp;</p>
	<div class="row">
		
		<div class="col s12">
			<h1 style="text-align:left;">Registration Form For Schools</h1>
			<p>
				The school Olympiad coordinators looking for registration form can fill the below form. And for students looking for individual registrations, please fill the form on <a href="http://www.crestolympiads.com/" target="_blank">Home Page</a>. If you have any query, then please email at <a href="mailto:info@crestolympiads.com">info@crestolympiads.com</a>
			</p>
			<p>
				Registration Fee for Indian Schools: A charge of Rs. 225 towards cost of examination is payable by each participating student for Schools in India.
			</p>
			<p>
				Registration fee for International Schools (outside India): A charge of $10 towards cost of examination is payable by each participating student for international schools.

			</p>
		</div>
		<div class="col l12 m12 s12">
			
			<?php if ($this->session->flashdata('success_message')) { ?>
			<div class="text-success"><span><?php echo $this->session->flashdata('success_message'); ?></span></div>
			<?php } ?>
			<p>
				<em>Our representative will contact you within <strong>48 working hours</strong>.</em>
			</p>
			<?php echo form_open("school_reg/register",'class="form-horizontal" name="principals"'); ?>
			<!-- <form class=""  method="POST" action= > -->
			<div class="row">
				<div class="col s12 m6 input-field">
					<i class="material-icons prefix">account_balance</i>
					<input id="school" name="school" type="text" required class="validate" value="<?php echo set_value('school'); ?>">
					<label for="school">School Name<span style="color:red;">*</span></label>
					<?php echo form_error('school'); ?>
				</div>
				<div class="col s12 m6 input-field">
					<i class="material-icons prefix">location_on</i>
					<input id="location" name="location" type="text" required class="validate" value="<?php echo set_value('location'); ?>">
					<label for="location">City<span style="color:red;">*</span></label>
					<?php echo form_error('location'); ?>
				</div>

				<div class="col s12 m6 input-field">
					<i class="material-icons prefix">location_on</i>
				<!-- 	<input id="location" name="location" type="text" required class="validate" value="<?php //echo set_value('location'); ?>"> -->
					<!-- <label for="location">Country<span style="color:red;">*</span></label> -->
					<?php $this->load->view('auth/select_phone'); ?>
					<label for="country">Country <span style="color:red">*</span></label>
		          			<input type="hidden" id="country_code"  name="country_code" value="<?php echo set_value('country'); ?>">
					<?php echo form_error('country'); ?>
				</div>
				<div class="col s12 m6 input-field" id="state_name" >
					<i class="material-icons prefix">location_on</i>
				                                     
                    <input id="state" name="state_name" type="text" class="validate" value="<?php echo set_value('state_name'); ?>" oninput="this.value = this.value.toUpperCase()">
			        <label for="state">School State <span style="color:red">*</span></label>
			         <?php echo form_error('state'); ?>  
				</div>

                 <div class="col m6 s12 input-field" id="state_list">
                   <i class="material-icons prefix">location_on</i>
                  <?php  if($this_user->state == '0' || $this_user->state == ''){?>
                    <select class="form-control" id="selectstate" name="selectstate" style="margin-top: 24px;" >
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
 

				<div class="col s12 m6 input-field">
					<i class="material-icons prefix">account_circle</i>
					<input id="name" name="name" type="text" required class="validate" value="<?php echo set_value('name'); ?>">
					<label for="name">Contact Person<span style="color:red;">*</span></label>
					<?php echo form_error('name'); ?>
				</div>
				<div class="col s12 m6 input-field">
					<i class="material-icons prefix">phone</i>
					<input id="phone" name="phone" type="text" required class="validate onlyNumbers" value="<?php echo set_value('phone'); ?>">
					<label for="phone">Phone Number<span style="color:red;">*</span></label>
					<?php echo form_error('phone'); ?>
				</div>

				<div class="col s12 m6 input-field">
					<i class="material-icons prefix">email</i>
					<input id="email" name="email" type="email" required class="validate" value="<?php echo set_value('email'); ?>">
					<label for="email">Email<span style="color:red;">*</span></label>
					<?php echo form_error('email'); ?>
				</div>
				<div class="cl"></div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<i class="material-icons prefix">mode_edit</i>
					<textarea id="message" class="materialize-textarea" name="message"></textarea>
					<label for="message">Message <span style="color:red">*</span></label>
					<?php echo form_error('message'); ?>
				</div>
			</div>
			<div class="row">
				<div class="col s12 form-group">
					<button class="btn col s6 offset-s3" type="submit">Submit<i class="material-icons right">send</i></button>
				</div>
			</div>
			<?php echo form_close();?>
		</div>
	</div>

</div>
<div class="cl"></div>

<script type="text/javascript">
if($(window).width()<768){
	$(".hide_on_phone").hide();
};


$(window).scroll(function() {
	$(".slideanim").each(function(){
		var pos = $(this).offset().top;

		var winTop = $(window).scrollTop();
		if (pos < winTop + 600) {
			$(this).addClass("slide");
		}
	});
});

</script>
<?php if ($this->session->flashdata('success_message')) { ?>
	<script type="text/javascript">
		alert("<?php echo $this->session->flashdata('success_message'); ?>");
		$('form')[0].reset();
	</script>
<?php } ?>
<style type="text/css">
.features-new div > span:first-child {
	position: relative;
	top: 5px;
	min-height: 20px;
	padding: 3px 5px 3px 3px;
}
.features-new{
	float:right;
	padding-top: 20px;
}

.slideanim {visibility:hidden;
}
.slideanim > div{
	min-height: 125px;
}
.slide {
  animation-name: slide;
  -webkit-animation-name: slide;
  animation-duration: 1s;
  -webkit-animation-duration: 1s;
  visibility: visible;
}
@keyframes slide {
	0% {
	  opacity: 0;
	  transform: translateY(70%);
  } 
  100% {
	  opacity: 1;
	  transform: translateY(0%);
  }
}
@-webkit-keyframes slide {
	0% {
	  opacity: 0;
	  -webkit-transform: translateY(70%);
  } 
  100% {
	  opacity: 1;
	  -webkit-transform: translateY(0%);
  }
}
</style>

<?php
//if(isset($this_user)){
	//if(isset($this_user->country)){
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
	//}
//}

?>
<?php 
 

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
		//alert("hello");

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
	</script>