<?php //echo "<pre>";print_r($subject);die;?>

<div class="col-md-12 padd">
   <div class="bradcome-menu">
      <a href="<?=base_url().'admin/addeditFAQs/';?>">Add/ Edit Question</a>
      <table class="table table-hover table-responsive table-striped">
      	<tr>
      		<td>S.No</td>
      		<td>question</td>
      		<td>Action</td>
      	</tr>
      	<?php $i=1;foreach ($questions as $key => $value) {?>
            <tr>
               <td><?php echo $i++;?></td>
               <td><?php echo $value->ques;?></td>
               <td><a href="<?php echo base_url().'admin/addeditFAQs/'.$value->id;?>">Edit</a></td>
            </tr>
         <?php }?>
      </table>							
   </div>
</div>