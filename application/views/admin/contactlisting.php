
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
</script><?php //echo "<pre>";print_r($subject);die;?>
<script src="https://www.olympiadsuccess.com/assets/designs/js/bootstrap.min.js"></script>

<div class="col-md-12 padd">
   <div class="bradcome-menu">
      <table id="example"  class="table table-hover table-responsive table-striped">
      	<thead>
            <tr>
               <td>S.No</td>
               <td>Contact Name</td>
               <td>Email</td>
               <td>Message</td>
               <td>Date</td>
            </tr>
         </thead><tfoot>
            <tr>
               <td>S.No</td>
               <td>Contact Name</td>
               <td>Email</td>
               <td>Message</td>
               <td>Date</td>
            </tr>
         </tfoot>
         <tbody class="tbody">
            
         <?php $i=1;foreach ($allcontactus as $key => $value) {?>
            <tr id="<?=$value->id?>">
               <td><?php echo $value->id;?></td>
               <td><?php echo $value->name?></td>
               <td><?php echo $value->email?></td>
               <td><?php echo $value->message?></td>
               <td><?php echo $value->date?></td>
               
            </tr>
         <?php }?>
         </tbody>
      </table>
      <div style='float:right'>
             <a  class='btn btn-primary' href="<?php echo base_url().'admin/excelContactus'?>">Download Excel</a>
         </div>   							
   </div>
</div>
<!-- <td class="status"><?php echo $value->status?></td>
               <td>
                  <?php
                  $status = $value->status;
                  ?>
                  <select id="status">
                     <option value="Pending" <?php if($status == 'Pending') echo 'selected';?>>Pending</option>
                     <option value="Done" <?php if($status == 'Done') echo 'selected';?>>Done</option>
                  </select>
                  <a class="btn btn-primary update_status" href="javascript:void(0);">Update Status</a>
                  <input type="hidden" value="<?=$value->id?>">
               </td> -->
<script type="text/javascript">
   $(".update_status").on("click",function(){
      var status = $(this).prev().val();
      var id = $(this).next().val();
      // console.log(val);
       var csrf_hash = '<?php echo $this->security->get_csrf_hash(); ?>';
            jQuery.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>admin/update_status',
                data: {status: status, user_id:id, csrf_test_name: csrf_hash},
                dataType: 'json',
                async: false,
                success: function (response) {
                  id = '#'+response['id'];
                  $(".tbody").children(id).children('.status').val(status);
                },
            });
   });
</script>
