<!-- Bootstrap -->
<link href="<?php echo base_url(); ?>assets/designs/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/designs/css/font-awesome.css"
      rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/designs/css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/designs/font.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/designs/css/morris-0.4.3.min.css"
      rel="stylesheet">
<link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/designs/images/img/fav.ico" type="image/x-icon">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url(); ?>assets/designs/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/designs/js/bootstrap.min.js"></script>



<div class="col-md-12 padd">

    <div class="bradcome-menu hide_on_phone">
        <ul>
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li><img src="<?php echo base_url(); ?>assets/designs/images/arrow.png"></li>
            <li><a href="#"> OMR </a></li>
        </ul>
    </div>

</div>

<div class="row" style="text-align:center;">

    <?php echo $this->session->flashdata('message'); ?>
    <div class="col-md-12">
    Click <a target="_blank" onclick="ga('send','event','OMR_Sheet_download','OS_OMR','OS_omrsheet_download');" media="print" type="application/pdf" download href="<?php echo base_url(); ?>assets/downloads/os_omr_sample.pdf">here</a></li> to download Sample Olympiad Success OMR Sheet.
    An OMR Sheet looks as follows: 
    </div>
    <div class="col-md-6">
        <img style="max-width:90%;padding:1%;" src="<?php echo base_url(); ?>assets/designs/images/omr/omr_oss1.jpg">
    </div>
    <div class="col-md-6">
        <img style="max-width:90%;padding:1%;" src="<?php echo base_url(); ?>assets/designs/images/omr/omr_oss2.jpg">
    </div>
</div>