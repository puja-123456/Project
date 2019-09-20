<?php //echo "<pre>";print_r($subject);die;?>

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
               <td>Student Name</td>
               <td>Class</td>
               <td>Subjects</td>
               <td>Email</td>
               <td>Phone</td>
               <td>Date of Registration</td>
               <td>City</td>
               <td>State</td>
               <td>Country</td>
            </tr>
         </thead>
         <tfoot>
            <tr>
               <td>S.No</td>
               <td>Student Name</td>
               <td>Class</td>
               <td>Subjects</td>
               <td>Email</td>
               <td>Phone</td>
               <td>Date of Registration</td>
               <td>City</td>
               <td>State</td>
               <td>Country</td>
            </tr>
         </tfoot>
         <tbody>
            
         <?php $i=1;foreach ($users as $u) {?>
            <tr>
               <td><?php echo $i++;?></td>
               <td><?php echo $u->username;?></td>
               <td><?php echo $u->class;?></td>
               <td><?php echo $u->subjects;?></td>
               <td><?php echo $u->email;?></td>
               <td><?php echo $u->phone;?></td>
               <td><?php echo $u->date_of_registration;?></td>
               <td><?php echo $u->city;?></td>
               <td><?php echo $u->state;?></td>
               <td><?php echo $u->country;?></td>
            </tr>
         <?php }?>
         </tbody>
      </table>							
   </div>
</div>