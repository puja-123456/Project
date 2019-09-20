<!-- Bootstrap -->
<link href="<?php echo base_url();?>assets/designs/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/designs/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/designs/css/style.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/designs/font.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/designs/css/jquery.dataTables.css" rel="stylesheet">
<link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/designs/images/img/fav.ico" type="image/x-icon">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/designs/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/designs/js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" class="init">
   $(document).ready(function() {
   	$('#example').dataTable();
   });
</script>
<script src="<?php echo base_url();?>assets/designs/js/bootstrap.min.js"></script>
<div class="col-md-12 padd">
   <div class="bradcome-menu">
      <ul>
         <li><a href="<?php echo base_url();?>user">Home</a></li>
         <li><img  src="<?php echo base_url();?>assets/designs/images/arrow.png"></li>
         <li><a href="#">Payment history</a></li>
      </ul>
   </div>
</div>
<div class="row">
   <?php echo validation_errors();
      echo $this->session->flashdata('message');
      ?>
</div>
<div class="row">
   <div class="col-md-12" style="overflow-x: auto;">
      <table id="example" class="cell-border" cellspacing="0" width="100%">
         <thead>
             <tr>
               <th>S.No.</th>
               <th>Course</th>
               <th>Price Paid</th>
               <th>Payer Name</th>
               <th>Payer Email</th>
                <th>Transaction Id</th>
                <th>Subscribed Date</th>
            </tr>
         </thead>
         <tfoot>
            <tr>
               <th>S.No.</th>
               <th>Course</th>
               <th>Price Paid</th>
               <th>Payer Name</th>
               <th>Payer Email</th>
                <th>Transaction Id</th>
                <th>Subscribed Date</th>
			   
              
            </tr>
         </tfoot>
         <tbody>
            <?php if (count($records)>0) { 
					$i=1;
					foreach ($records as $r) {
               ?>
            <tr>
               <td><?php echo $i++;?></td>
               <td><?php echo $r->quizname;?></td>
               <td style="text-align:right"><?php echo number_format($r->cc_amount,2);?></td>
               <td><?php echo $r->payer_name;?></td>
               <td><?php echo $r->payer_email;?></td>
                <td><?php echo $r->transaction_id;?></td>
                <td><?php echo date('d-m-Y',strtotime($r->dateofsubscription));?></td>
            </tr>
            <?php } 
			} 
			else "<tr><td colspan='4'>No Data Available.</td></tr>"; 
			?>
         </tbody>
      </table>
   </div>
</div>

