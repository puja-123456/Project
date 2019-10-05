
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.js"></script> -->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/contact_us.css"> -->

<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">  -->

<p>&nbsp;</p>

<div class="fuild-container">
	<div class="row contact">
    <div class="col s12 m2 well"> 
	<?php if ($this->ion_auth->logged_in()){ $this->load->view('templates/leftmenu'); }?>
    </div>
    <div class="col s12 m10 offset-s2 text-center well">
	<div class="text-center" id="invid">
		<h1>Invoice</h1>
	</div>
	
		<div class="col-md-12 text-center well" style="min-height:347px;">


		   
					<div class="row">
				
				
					
						<table class="responsive-table">
							<th>S.No.</th>
							<th>Subject Name</th>
						<!-- 	<th>Amount Due</th> -->
							<th>Amount Paid</th>								
							<!-- <th>Wallet Point</th> -->
							<th>Transaction Date</th>
							<th>Transaction Status</th>
							<th>Action</th>
							

							<?php 

							$j=1;


							for ($i=0; $i <count($invoice) ; $i++) { 
								# code...

								if($invoice[$i]->transaction_status==1)
								{
									$status="Complete";
								}
								else
								{
									$status="Pending";
								}

								echo "<tr>";
								echo "<td>".$j."</td>";
								echo "<td>".$invoice[$i]->preferred_subjects."</td>";
								/*echo "<td>".$invoice[$i]->transaction_amount."</td>";*/
								echo "<td>".$invoice[$i]->transaction_amount."</td>";
								/*echo "<td>".$invoice[$i]->wallet_amount."</td>";*/
								echo "<td>".$invoice[$i]->transaction_date."</td>";
								echo "<td>".$status."</td>";
								echo "<td><a href=".base_url()."unicus/download_invoice?id=".$invoice[$i]->id." target='_blank'>Download<a></td>";

								echo "</tr>";

								// if($invoice[$i]->cc_order_status==0)
								// {
								// 	echo "<td>Pending</td>";
								// }

								// else

								// {
								// 	echo "<td>Complete</td>";
								// }

								

								$j++;
							}
								

								
							



							?>
					
						</table>
					

						
						
						
					
					</div>
				
					<br>			
				
				
		    </div>
		</div>
	</div>
</div>

</div>
<style>
td, th {
    padding: 8px 0px;
      font-size: 14px;
    }
#invid{
	margin-top: 65px;
}
#menu{
	margin-top: 40px;
}
@media screen and (min-width: 768px){
  /*#menu{
    max-height: 400px;
    overflow-y: scroll; 
    width: 16.666667% !important;
  }*/
.fuild-container{
	margin-top:70px;
}
.row .col.m10 {
    width: 81.333333%;
    margin-left: 15px;
    }
}
@media screen and (max-width: 768px){

.fuild-container{
	margin-top:30px;
}
[type="checkbox"]+span:not(.lever) {
  line-height: 17px;
}
#menu{ 
	margin-top:-30px; 
	position: relative !important;
}
.row .col.offset-s2 {
    margin-left: 0;
}
.row .col.offset-m3 {
     margin-left: 0;
}
}
</style>




