<?php //echo "<pre>";print_r($subject);die;?>
<div style='float:right'>
<a  class='btn btn-primary' href="<?php echo base_url().'admin/subcategories'?>">Add Subcategories</a>
</div>
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
      	<?php $i=1;
         foreach ($subject as $key => $value) {?>

<tr>
<td><?php echo $i++;?></td>
<td><?php echo $value->name?></td>
<td><?php echo $value->meta_description?></td>
<td><?php if(isset($value->logo_image) && base_url().'uploadlogo/'.$value->logo_image){ ?>


   <img src="<?php echo base_url().'uploadlogo/'.$value->logo_image ?>" width='100px'>
   <?php }
   else{echo 'No Any Image';}?></td>
<td><a href="<?php echo base_url().'admin/subcategories/'.$value->catid?>">Edit</a></td>
 <td><a href="<?php echo base_url().'admin/deleteSubcategory/'.$value->catid?>">Delete</a></td>


</tr>




      	<?php }?>
         
      </table>	
      <div style='float:right'>
             <a  class='btn btn-primary' href="<?php echo base_url().'admin/excelSchool'?>">Download Excel</a>
         </div>						
   </div>
</div>
