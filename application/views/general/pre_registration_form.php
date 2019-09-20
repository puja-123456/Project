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
	<div class="text-success text-center col s12"><span>
		<strong>
			<?php echo $this->session->flashdata('success_message'); ?>
		</strong>
	</span><br><Br></div>
	<?php } ?>
		    	
				<?php 
				$attributes = array('onsubmit' => 'return subject_d_func()','name'=>'pre_registration_form','id'=>'pre_registration_form');
				echo form_open("crest/pre_registration_form",$attributes); ?>
					
					<div class="row">
						<br>
						<div class="col m6 s12 input-field">
							<i class="material-icons prefix">account_circle</i>
							<input id="name" name="name" type="text" required class="validate">
		          			<label for="name">Student Name</label>
							<?php echo form_error('name'); ?>
						</div>
						<div class="col m6 s12 input-field">
							<i class="material-icons prefix">account_balance</i>
			                <input id="school" name="school" type="text" required class="validate">
			                <label for="school">School Name</label>
			                <?php echo form_error('school'); ?>
						</div>
						<div class="col m6 s12 input-field">
							<i class="material-icons prefix">email</i>
							<input id="email" name="email" type="email" required class="validate">
		          			<label for="email">Email</label>
							<?php echo form_error('email'); ?>
						</div>
						<div class="col m6 s12 input-field">
							<i class="material-icons prefix">phone</i>
							<input id="phone" name="phone" type="text" required class="validate onlyNumbers">
		          			<label for="phone">Mobile Number</label>
							<?php echo form_error('phone'); ?>
						</div>
					</div>
					<div class="row">
						<div class="col m6 s12 input-field">
							<i class="material-icons prefix">mode_edit</i>
						    <select id="class" name="class" required>
								<option value="" disabled selected>Select Class</option>
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
							<label for="class">Class</label>
							<?php echo form_error('class'); ?>
						</div>
					</div>
					<?php $price = ' (INR 125/ USD 9.0)';?>
					<div class="row">
						<div class="col m6 s12 input-field">
							<i class="material-icons prefix">mode_edit</i>
							<select multiple id="subjects_d" name="subjects_d" >
								<option value="" disabled selected>Select Subjects</option>
								<option value="CMO">CREST Mathematics Olympiad<?=$price?></option>
								<option value="CSO">CREST Science Olympiad<?php echo $price;?></option>
								<option value="CEO">CREST English Olympiad<?php echo $price;?></option>
								<option value="CCO">CREST Cyber Olympiad<?php echo $price;?></option>
								<option value="CGKO">CREST General Knowledge Olympiad<?php echo $price;?></option>
								<option value="CRO">CREST Reasoning Olympiad<?php echo $price;?></option>
								<option value="CFO">CREST French Olympiad<?php echo $price;?></option>
							</select>
							<label for="subjects_d">Preferred Subjects</label>
							<?php echo form_error('subjects'); ?>
							<input type="hidden" id="subjects" name="subjects" value="">
						</div>
					</div>

					<div class="row">
						<div class="col m6 s12 input-field">
							<button class="btn col s6 offset-s3" type="submit">Submit<i class="material-icons right">send</i></button>
						</div>
					</div>
				<?php echo form_close(); ?>
		    </div>
		</div>
	</div>
</div>


<style type="text/css">
form input, form textarea, form button{
	margin: 3px 0px;
}
</style>
<script type="text/javascript">
	
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
		return true;		
	}
</script>