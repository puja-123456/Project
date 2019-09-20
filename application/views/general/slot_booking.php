
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.js"></script> -->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/contact_us.css"> -->

<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">  -->

<p>&nbsp;</p>

<div class="container">
    <?php if ($this->ion_auth->logged_in()){ $this->load->view('templates/leftmenu'); }?>
    <div class="row text-center">
        <h1>Book Slot</h1>
    </div>
    <div class="row contact">
        <div class="col-md-12 text-center well" style="min-height:347px;">
<style type="text/css">
    .card {
        width: 200px;
        height: 200px;
        position: relative;
        display: inline-block;
        margin: 50px;
    }
    .card #cmo-back {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 99;
    }
    .card:hover #cmo-back {
        display: inline;
    }

    .card #cso-back {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 99;
    }
    .card:hover #cso-back {
        display: inline;
    }

    .card #cso-back {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 99;
    }
    .card:hover #cso-back {
        display: inline;
    }

    .card #ceo-back {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 99;
    }
    .card:hover #ceo-back {
        display: inline;
    }

    .card #cro-back {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 99;
    }
    .card:hover #cro-back {
        display: inline;
    }

    .card #cco-back {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 99;
    }
    .card:hover #cco-back {
        display: inline;
    }

    .card #cfo-back {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 99;
    }
    .card:hover #cfo-back {
        display: inline;
    }

    

</style>






           
                    <div class="row">

                        <?php if ($this->session->flashdata('success_message')) { ?>
    <div class="text-success text-center col s12"><span style="color:#008000;font-weight:bold">
        <strong>
            <?php echo $this->session->flashdata('success_message'); ?>
        </strong>
    </span><br></div>
    <?php } ?>

    

                        

                            <form id="slot_form" name="slot_form" method="POST" action="<?php echo base_url().'crest/access_card';?>">


                            <p>Choose your slot for examination</p>

                            <div class="col s12 input-field">


                            <select id="olympiad_exam_name" name="olympiad_exam_name" required class="validate">
                            <option value="">Please select exam</option>


                 <?php 

                 

                

                 for($i=0;$i<count($olympiad_exam_name);$i++) {

                  if (in_array(strtoupper($olympiad_exam_name[$i]->olympiad_exam_slug), $subject))

                     {
                     # code...





                  
               

                 echo "<option value=".$olympiad_exam_name[$i]->olympiad_exam_slug.">".$olympiad_exam_name[$i]->olympiad_exam_name."</option>";
                   
              
                }
            }

                    ?>

                    </select>

                </div>

                <div class="col s12 input-field">


                      <select id="olympiad_exam_level" name="olympiad_exam_level" required class="validate">
                            <option value="">Please select exam level</option>


                 <?php 

                 

                 

                 for($i=0;$i<count($olympiad_exam_level);$i++) {
                     # code...



                  
               

                 echo "<option value='".$olympiad_exam_level[$i]->exam_level."'>".$olympiad_exam_level[$i]->exam_level."</option>";
                   
              
                }

                    ?>

                    </select>

                </div>

                     <div id="olympiad_exam_date" class="col s12 input-field">

                       

                           

                    </div>


                  <!--   <select id="olympiad_exam_date" name="olympiad_exam_date">
                            <option value="">Please select exam date</option>

                    </select> -->

                    <div class="col s12 input-field">


                      <select id="olympiad_exam_slot" name="olympiad_exam_slot" required class="validate">
                            <option value="">Please select exam slot</option>


               

             <?php if(!in_array(10, array_column($exam_slot, 'slot_time'))) { 
             // search value in the array ?>

             <option value="10">10-10:30 am</option>";

             <?php } ?>   
              <?php if(!in_array(11, array_column($exam_slot, 'slot_time'))) { 
             // search value in the array ?>

              <option value="11">11-11:30 am</option>";

             <?php } ?> 

             <?php if(!in_array(12, array_column($exam_slot, 'slot_time'))) { 
             // search value in the array ?>

             <option value="12">12-12:30 am</option>";

             <?php } ?> 


             <?php if(!in_array(13, array_column($exam_slot, 'slot_time'))) { 
             // search value in the array ?>

              <option value="13">13-13:30 am</option>";

             <?php } ?> 

             <?php if(!in_array(14, array_column($exam_slot, 'slot_time'))) { 
             // search value in the array ?>

              <option value="14">14-14:30 am</option>";

             <?php } ?> 

             <?php if(!in_array(15, array_column($exam_slot, 'slot_time'))) { 
             // search value in the array ?>

             <option value="15">15-15:30 am</option>";

             <?php } ?> 

             <?php if(!in_array(16, array_column($exam_slot, 'slot_time'))) { 
             // search value in the array ?>

              <option value="16">16-16:30 am</option>";

             <?php } ?> 


             <?php if(!in_array(17, array_column($exam_slot, 'slot_time'))) { 
             // search value in the array ?>

             <option value="17">17-17:30 am</option>";

             <?php } ?> 


             <?php if(!in_array(18, array_column($exam_slot, 'slot_time'))) { 
             // search value in the array ?>

              <option value="18">18-18:30 am</option>";

             <?php } ?> 


             <?php if(!in_array(19, array_column($exam_slot, 'slot_time'))) { 
             // search value in the array ?>

              <option value="19">19-19:30 am</option>";

             <?php } ?> 

             <?php if(!in_array(20, array_column($exam_slot, 'slot_time'))) { 
             // search value in the array ?>

              <option value="20">20-20:30 am</option>";

             <?php } ?> 

             <?php if(!in_array(21, array_column($exam_slot, 'slot_time'))) { 
             // search value in the array ?>

              <option value="21">21-21:30 am</option>";

             <?php } ?> 

             <?php if(!in_array(22, array_column($exam_slot, 'slot_time'))) { 
             // search value in the array ?>

              <option value="22">22-22:30 am</option>";

             <?php } ?> 
                 
               <!--  <option value="13">13-13:30 am</option>";
                <option value="14">14-14:30 am</option>";
                <option value="15">15-15:30 am</option>";
                <option value="16">16-16:30 am</option>";
                <option value="17">17-17:30 am</option>";
                <option value="18">18-18:30 am</option>";
                <option value="19">19-19:30 am</option>";
                <option value="20">20-20:30 am</option>";
                <option value="21">21-21:30 am</option>";
                <option value="22">22-22:30 am</option>"; -->

                   
              
                

                    

                    </select>

                    <input class="btn col s6 offset-s3" type="submit" name="book_slot" id="book_slot" value="Book Slot">

                   <!-- <button class="btn col s6 offset-s3" type="submit" name="book">Book Slot</button> -->

                </form>



                        </div>

                        <br>
                
                    
                    </div>
                
                    <br>



                <script type="text/javascript">

                     


    $(document).ready(function() {

        
$("#book_slot").addClass("disabled");
       

        // if (exam_name=="" || exam_level=="" || exam_slot=="" ) 
        // {
        //     $("#book_slot").addClass("disabled");
        // }

        // else 
        // {
        //     $("#book_slot").removeClass("disabled");
        // }

        $('#olympiad_exam_name').change(function(){

           
    $('#olympiad_exam_date').hide();
 
             
    //$('#olympiad_exam_level option:first').prop('selected', 'selected');
});


        $('select[name="olympiad_exam_level"]').on('change', function() {

            var olympiad_exam_name = $("#olympiad_exam_name option:selected" ).text();
            var olympiad_exam_level = $("#olympiad_exam_level option:selected").text();

 $("#book_slot").removeClass("disabled");

            
            if(olympiad_exam_name && olympiad_exam_level ) {
                $.ajax({
                     type: 'POST',
            url: '<?php echo base_url('crest/slot_timings'); ?>',
            // dataType : 'json',
             cache: false,
             data: 'olympiad_exam_name=' + olympiad_exam_name + '&olympiad_exam_level=' + olympiad_exam_level + '&<?php echo $this->security->get_csrf_token_name();?>=<?php echo $this->security->get_csrf_hash();?>',
                    success:function(data) {

                        $('#olympiad_exam_date').show();

                        $('select[name="olympiad_exam_date"]').empty();

                        $('#olympiad_exam_date').html(data);
                        // $.each(data, function(key, value) {
                        //     $('select[name="olympiad_exam_date"]').append('<option value="'+ value.exam_id +'">'+ value.exam_date +'</option>');
                        // });
                    }
                });
            }else{
                $('select[name="olympiad_exam_date"]').empty();
            }
        });
    });
</script>
                
            </div>
        </div>
    </div>
</div>

<style>

[type="radio"]:not(:checked), [type="radio"]:checked {
    position: relative;
    opacity: unset !important;
    pointer-events:initial !important;
 }
</style>







