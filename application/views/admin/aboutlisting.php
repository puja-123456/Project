<?php //echo "<pre>";print_r($subject);die;?>
<div style='float:right'>
<a  class='btn btn-primary' href="<?php echo base_url().'admin/aboutform'?>">Add CMSPAGE</a>
</div>
<div class="col-md-12 padd">
   <div class="bradcome-menu">
      <table class="table table-hover table-responsive table-striped">
      	<tr>
      		<td>S.No</td>
      		<td>Page Name</td>
            <td>Long Description</td>
            <td>slug</td>
            <td>Meta Title</td>
      		<td>Meta Description</td>
      		<td colspan='3'>Action</td>
      	</tr>
      	<?php $i=1;foreach ($allabout as $key => $value) {?>

<tr>
<td><?php echo $i++;?></td>
<td><?php echo $value->name?></td>
<td><?php echo $value->longdescription?></td>
<td><?php echo $value->slug?></td>
<td><?php echo $value->meta_title?></td>
<td><?php echo $value->meta_description?></td>

<td><a href="<?php echo base_url().'admin/aboutform/'.$value->id?>">Edit</a></td>
<td><a href="<?php //echo base_url().'admin/deleteTestimonials/'.$value->tid?>">Delete</a></td> 


</tr>




      	<?php }?>
      </table>							
   </div>
</div>
