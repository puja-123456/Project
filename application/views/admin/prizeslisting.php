<?php //echo "<pre>";print_r($subject);die;?>

<div class="col-md-12 padd">
   <div class="bradcome-menu">
      <table class="table table-hover table-responsive table-striped">
      	<tr>
      		<td>S.No</td>
      		<td>Name</td>
      		<td>Meta Description</td>
      		<td>Logo Image</td>
      		<td colspan='3'>Action</td>
      	</tr>
      	<?php $i=1;foreach ($prizeslisting as $key => $value) {?>

<tr>
<td><?php echo $i++;?></td>
<td><?php echo $value->prizes?></td>
<td><?php echo $value->venues?></td>
<td><?php echo $value->dates?></td>
<td><a href="<?php echo base_url().'admin/subcategories/'.$value->catid?>">Edit</a></td>
<!-- <td><a href="<?php echo base_url().'admin/delete/'.$value->catid?>">Delete</a></td> -->


</tr>




      	<?php }?>
      </table>							
   </div>
</div>
