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
					<span>
						<strong>
							<?php echo $this->session->flashdata('error_message'); ?>
						</strong>
					</span>
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