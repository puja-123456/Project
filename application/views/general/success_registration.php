<script type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/contact_us.css">
<p>&nbsp;</p>
<div class="container" id="srid">
	<div class="row text-center">
		<h1>Successful Registration</h1>
	</div>
	<div class="row contact">
		<div class="col-md-12 text-center well" style="min-height:347px;">

	<?php if ($this->session->flashdata('success_message')) { ?>
	<div class="text-success text-center col s12"><span>
		<strong>
			<?php echo $this->session->flashdata('success_message'); ?>
		</strong>
	</span><br><Br></div>
	<?php } else if($this->session->flashdata('error_message')) { ?>
	<div class="text-success text-center col s12"><span>
		<strong>
			<?php echo $this->session->flashdata('error_message'); ?>
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
#srid{
	margin-top:90px; 
}
@media screen and (max-width: 768px){
	#srid{
	margin-top:30px;

}
}
</style>