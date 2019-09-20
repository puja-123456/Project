<?php //echo "<pre>";print_r($subject);die;?>
<div style='float:right'>
<a  class='btn btn-primary' href="<?php echo base_url().'admin/testimonials'?>">Add Testimonials</a>
</div>
<div class="col-md-12 padd">
   <div class="bradcome-menu">
      <table class="table table-hover table-responsive table-striped">
      	<tr>
      		<td>S.No</td>
      		<td>Author Name</td>
      		<td>Description</td>
      		<td>Author Image</td>
      		<td colspan='3'>Action</td>
      	</tr>
      	<?php $i=1;foreach ($alltestimonials as $key => $value) {?>

<tr>
<td><?php echo $i++;?></td>
<td><?php echo $value->author?></td>
<td><?php echo $value->description?></td>
<td><?php if(isset($value->author_photo) && base_url().'authorimage/'.$value->author_photo){ ?>


   <img src="<?php echo base_url().'authorimage/'.$value->author_photo ?>" width='100px'>
   <?php }   else{echo 'No Any Image';}?></td>
<td><a href="<?php echo base_url().'admin/testimonials/'.$value->tid?>">Edit</a></td>
<td><a href="<?php echo base_url().'admin/deleteTestimonials/'.$value->tid?>">Delete</a></td> 


</tr>




      	<?php }?>
      </table>							
   </div>
</div>
