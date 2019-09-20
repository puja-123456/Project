<?php //echo "<pre>";print_r($questions);die;?>
<?php
$img_url = $this->config->item('image_src_url');
?>

<link href="https://www.olympiadsuccess.com/assets/designs/css/bootstrap.min.css" rel="stylesheet">
<link href="https://www.olympiadsuccess.com/assets/designs/css/font-awesome.css" rel="stylesheet">
<!-- <link href="https://www.olympiadsuccess.com/assets/designs/css/style.css" rel="stylesheet"> -->
<link href="https://www.olympiadsuccess.com/assets/designs/font.css" rel="stylesheet">
<link href="https://www.olympiadsuccess.com/assets/designs/css/jquery.dataTables.css" rel="stylesheet">
<script type="text/javascript" language="javascript"
        src="https://www.olympiadsuccess.com/assets/designs/js/jquery.js"></script>
<script type="text/javascript" language="javascript"
        src="https://www.olympiadsuccess.com/assets/designs/js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function () {
        $('#example').dataTable();
    });
</script>

<script src="https://www.olympiadsuccess.com/assets/designs/js/bootstrap.min.js"></script>
<div class="col-md-12 padd">
   <div class="bradcome-menu">
      <table id="example" class="table table-hover table-responsive table-striped">
         <thead>
            <tr>
               <td>S.No</td>
               <td>Question ID</td>
               <td>Question</td>           
               <td>Action</td>           
            </tr>
         </thead>       
         <tbody>
            
         <?php $i=1;foreach ($questions as $q) {?>
            <tr>
               <td><?php echo $i++;?></td>
               <td><?php echo $q->questionid;?></td>
               <td><?php echo $q->question;?></td>
               <td><a href="<?php echo base_url().'admin/editQuestion/'.$q->questionid;?>">Edit</a></td>             
               
               <!-- <td><a href="<?php //echo base_url().'admin/deleteQuestion/'.$q->questionid;?>">Delete</a></td>      -->   
            </tr>
         <?php }?>
         </tbody>
      </table>                   
   </div>
</div>