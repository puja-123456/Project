
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.js"></script> -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/contact_us.css">
<p>&nbsp;</p>
<div class="container">
	<div class="row text-center">
		<h1>Check Registration</h1>
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
				$attributes = array('name'=>'reg_form','id'=>'reg_form');
				echo form_open("crest/chk_reg",$attributes); ?>
					
					<div class="row">
						<br />
						<div class="col m6 s12 input-field">
							<i class="material-icons prefix">email</i>
							<input id="email" name="email" type="email" required class="validate">
		          			<label for="email">Email</label>
							<?php echo form_error('email'); ?>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col offset-m3 m6 s12 input-field">
							<button class="btn col s12" type="submit">Check Registration<i class="material-icons right">send</i></button>
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
