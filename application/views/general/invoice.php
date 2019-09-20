
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.js"></script> -->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/contact_us.css"> -->

<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">  -->

<p>&nbsp;</p>

<div class="container">
	<?php if ($this->ion_auth->logged_in()){ $this->load->view('templates/leftmenu'); }?>
	<div class="row text-center">
		<h1>Invoice</h1>
	</div>
	<div class="row contact">
		<div class="col-md-12 text-center well" style="min-height:347px;">


		   
					<div class="row">
				
				
					
						<table>
							<th>S.No.</th>
							<th>Subject Name</th>
							<th>Amount Due</th>
							<th>Amount Paid</th>								
							<th>Wallet Point</th>
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
								echo "<td>".$invoice[$i]->transaction_amount."</td>";
								echo "<td>".$invoice[$i]->transaction_amount."</td>";
								echo "<td>".$invoice[$i]->wallet_amount."</td>";
								echo "<td>".$invoice[$i]->transaction_date."</td>";
								echo "<td>".$status."</td>";
								echo "<td><a href=".base_url()."crest/download_invoice?id=".$invoice[$i]->id." target='_blank'>Download<a></td>";

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







