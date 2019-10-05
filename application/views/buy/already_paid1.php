<?php
	$this->session->set_userdata('email',$this_user->email);
	$this->session->set_userdata('user_id',$this_user->id);
?>
<script type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/contact_us.css">
<p>&nbsp;</p>
<div class="container">
	<div class="row text-center">

	</div>
	<div class="row contact">
		<div class="col-md-12 text-center well" style="min-height:347px;">
			
				<div class="text-warning text-center col s12">
					<br><br>
					<p>You have already paid and are registered with email Id: <strong><?=$this_user->email;?></strong>. These are the details and the subjects you have selected:</p>
					<p>Student Name: <?=$this_user->username;?></p>
					<p>Class: <?=$this_user->class;?></p>
					<p>School: <?=$this_user->school;?></p>
					<p>Subjects:</p>
					<ul style="margin-left: 30px;">
						<?php
						$subjects = $this_user->prefered_subject;
						$subjects = explode(',', $subjects);
						// var_dump($subjects);
						$all_sub = $this->config->item('main_categories');
						foreach ($subjects as $this_cus_sub) {
							
							foreach ($all_sub as $subj ) {
							
								if($subj[1] == $this_cus_sub){
									echo "<li><strong>".$subj[2]."</strong></li>";
								}
							}
							reset($all_sub);
						}
						?>
					</ul>

					<div class="row">
						<?php 
						if(strtolower($this_user->country) == 'india'){
							// $var_dump
							$price = ' (INR 125/ USD 9.0)';
						}
						// var_dump($not_subjects);
							if(isset($not_subjects)){
								$not_subjects = explode(",",$not_subjects);
								?>

							<?php 
							$attributes = array('onsubmit' => 'return subject_d_func()','name'=>'reg_form','id'=>'reg_form');
							echo form_open("crest/buy_more_subjects",$attributes); ?>
							<p>Would you like to purchase more subjects?</p>
								<input id="user_id" name="user_id" type="hidden" value="<?=$this_user->id?>">
								<input id="country" name="country" type="hidden" value="<?=$this_user->country?>">
								<input type="hidden" id="subjects" name="subjects" value="">
								<div class="row">
									<div>
									<?php
									$all_sub = $this->config->item('main_categories');
									$show_cfo = false;
									if($this_user->class > 5){
										$show_cfo = true;
									}
									foreach ($not_subjects as $subj) {
										foreach ($all_sub as $subject) {
											if($subj == $subject[1]){
												if($show_cfo && $subject[1] != 'CFO'){
													?>
													<div class="col m6 s12 input-field">
														<label><input class="subjects" type="checkbox" onclick="" value="<?=$subject[1]?>" ><span><?=$subject[2]?> <?=$price?></span></label>
													</div>
													<?php
												}
											}
										}
										reset($all_sub);
									}
									?>
									</div>
								</div>
								<div class="row">
									<div class="col m6 s12 input-field">
										<i class="material-icons prefix">show_chart</i>
										<input type="hidden" id="amount" name="amount" value="">

										<input id="amount_show" name="amount_show" type="text" required disabled class="validate onlyNumbers">
					          			<label for="amount_show">Total Amount</label>
										<?php echo form_error('amount'); ?>
									</div>
								</div>

								<div class="row">
									<div class="col offset-m3 m6 s12 input-field">
										<button class="btn col s12" type="submit">Pay Now<i class="material-icons right">send</i></button>
									</div>
								</div>
							<?php echo form_close(); ?>

							<?php
							}
						?>
						
					</div>
				</div>

<p>Feel free to reach us at <?php echo $this->config->item('support_phone'); ?></p>
<p>&nbsp;</p>
		</div>
	</div>
</div>

<script type="text/javascript">

	$(".subjects").on("click",function(e){
		var amount = 0;
		var sclass = $("#class").val();
		var country_sel = $('#country').val();
		// console.log(country_sel.);
		if(country_sel.toLowerCase() != 'india' ){
			$("input:checkbox[class=subjects]:checked").each(function () {
				if(sclass < 6 ){
					if($(this).val() != 'CFO'){
						amount += 595;
					}
				}else{
					amount += 595;
				}
	        });
		}else{
			$("input:checkbox[class=subjects]:checked").each(function () {
				// console.log($(this).val());
				if(sclass < 6 ){
					if($(this).val() != 'CFO'){
						amount += 125;
					}
				}else{
					amount += 125;
				}
	        });
		}
		$("#amount").val(amount);
		$("#amount_show").val(amount);
		$("#amount_show").next().addClass('active');
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
        });
		$("#subjects").val(subjects);
		var amount = $("#amount").val();
		if(amount < 1){
			return false;
		}
		return true;		
	}
</script>
<style type="text/css">
form input, form textarea, form button{
	margin: 3px 0px;
}
strong{
	font-weight: 700;
}
</style>