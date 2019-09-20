<script type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/contact_us.css">
<p>&nbsp;</p>
<div class="container">
	<div class="row text-center">

	</div>
	<div class="row contact">
		<div class="col-md-12 text-center well" style="min-height:347px;">
			<?php 
			if ($this->session->flashdata('error_message')) { ?>
				<div class="text-warning text-center col s12">
					
					<br><br>
				<p>You have already registered with email Id: <strong><?=$this_user->email;?></strong>. These are the details and the subjects you have selected:</p>
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
				</div>
				<?php 
			} ?>

<p>Feel free to reach us at <?php echo $this->config->item('support_phone'); ?></p>
<p>&nbsp;</p>
		</div>
	</div>
</div>


<style type="text/css">
form input, form textarea, form button{
	margin: 3px 0px;
}
strong{
	font-weight: 700;
}
</style>