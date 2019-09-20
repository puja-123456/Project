<script type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/contact_us.css">
<p>&nbsp;</p>
<div class="container">
	<div class="row text-center">
		<h1>Payment Cancelled</h1>
	</div>
	<div class="row contact">
		<div class="col-md-12 text-center well" style="min-height:347px;">

	<?php if($this->session->flashdata('error_message')) { ?>
	<div class="red-text col s12"><span>
		<strong>
			Your Payment was cancelled. Please contact at <?=$this->config->item('support_phone');?> if any problem occured or Contact us at <a href="mailto:<?=$this->config->item('contact_email');?>"><?=$this->config->item('contact_email');?></a>.
		</strong>
	</span><br><Br></div>
	<?php }?>

		</div>
	</div>
</div>


<style type="text/css">
form input, form textarea, form button{
	margin: 3px 0px;
}
</style>