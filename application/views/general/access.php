<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0">
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
     

<p>&nbsp;</p>

<div class="fuild-container">

  <div class="row contact">
      <div class="col s2 well"> 
       <?php if ($this->ion_auth->logged_in()){ $this->load->view('templates/leftmenu'); }?>
       </div> 
     
    
    <div class="col s10 offset-s2 text-center well" style="min-height:347px;padding: 0px 30px;">
      <h1>Slot/Access</h1>


 <!--  <?php //if ($this->ion_auth->logged_in()){ $this->load->view('templates/leftmenu'); }?>
  <div class="row text-center">
    <h1>Slot/Access</h1>
  </div>
  <div class="row contact">
    <div class="col-md-12 text-center well" style="min-height:347px;"> -->
<style type="text/css">
.row .col.offset-s3 {
    margin-left: 21%;
}
.well{
  background-color: #ffd22317;
    padding: 30px;
}

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

            <ul class="instructions">

              <li style="text-align: center">All the slot timings are in Indian Standard Time (IST)</li><br/>
              <li id="exam_link" style="font-weight: 700;text-align: center;list-style-type: none !important;font-size:18px">To take exam, click <a href="https://www.crestolympiads.com/user/instructions" <?php if( $today_date >= $start_date && $today_date <= $end_date)
         { echo ""; } else { echo "style='pointer-events: none;'";} ?> >here</a></li>
              <li id="exam_mobile_link" style="font-weight: 700;text-align: center;list-style-type: none !important;font-size:18px;display: none;color:#960a00">You can take exam only on desktop/laptop.</li>



            </ul>

            <?php echo $this->session->flashdata('message'); ?>

                        <?php if ($this->session->flashdata('slot_success_message')) { ?>
    <div class="text-success text-center col s12"><span style="color:#008000;font-weight:bold">
        <strong>
            <?php echo $this->session->flashdata('slot_success_message'); ?>
        </strong>
    </span><br></div>
    <?php } ?>

    <div>

        <table border="1" class="responsive-table">

            <thead>
            <tr>
            <th id="examname">Exam Name</th>
            <th>Exam Level</th>
            <th>Exam Date</th>
            <th>Slot Time (IST)</th>
            <th id="action" style="text-align:center;">Action</th>
            </tr>
            </thead>

            <tbody>

            <?php 







                 

                

                 for($i=0;$i<count($olympiad_exam_name);$i++) {

                  if (in_array(strtoupper($olympiad_exam_name[$i]->olympiad_exam_slug), $subject))

                     {
                     # code...







                  echo "<tr>";

                  echo "<td class='exam_name'>".$olympiad_exam_name[$i]->olympiad_exam_name."</td>";

                  echo "<td>";
                  // echo count($olympiad_exam_level);die;
                  for($j=0;$j<count($olympiad_exam_level);$j++) {
                  echo "<p>".$olympiad_exam_level[$j]->exam_level."</p>";
              }
                  echo "</td>";

                  echo "<td style='color:#FF0000'>";
                  //$exam_slug=$olympiad_exam_name[$i]->olympiad_exam_slug;

                  if($olympiad_exam_name[$i]->olympiad_exam_slug=='cro')
                  {
                    $olympiad_exam_date=$cro_user_exam_date;
                    
                  }
                  else if ($olympiad_exam_name[$i]->olympiad_exam_slug=='cmo') {
                      # code...
                     $olympiad_exam_date=$cmo_user_exam_date;
                  }
                   else if ($olympiad_exam_name[$i]->olympiad_exam_slug=='ceo') {
                      # code...
                     $olympiad_exam_date=$ceo_user_exam_date;
                  }
                   else if ($olympiad_exam_name[$i]->olympiad_exam_slug=='cso') {
                      # code...
                     $olympiad_exam_date=$cso_user_exam_date;
                  }
                   else if ($olympiad_exam_name[$i]->olympiad_exam_slug=='cco') {
                      # code...
                     $olympiad_exam_date=$cco_user_exam_date;
                  }
                   else if ($olympiad_exam_name[$i]->olympiad_exam_slug=='cfo') {
                      # code...
                     $olympiad_exam_date=$cfo_user_exam_date;
                  }
                  else
                  {
                     
                  }

                  // print_r($olympiad_exam_date);die;

                

                  

                  if(count($olympiad_exam_date)==0)
                  {
                    for($j=0;$j<count($olympiad_exam_level);$j++)
                        {
                        echo "<p>To be booked</p>";
                        }

                  }

                  else
                  {
                      $iteration=0;

                      //print_r($olympiad_exam_level);die;


                  for ($k=0;$k<count($olympiad_exam_level);$k++) {

                    $key = array_search($olympiad_exam_level[$k]->exam_level, array_column($olympiad_exam_date, 'exam_level'));





                        if(in_array($olympiad_exam_level[$k]->exam_level, array_column($olympiad_exam_date, 'exam_level')))
                        {

                        

                           

                        // if($olympiad_exam_name[$i]->olympiad_exam_slug==$olympiad_exam_date[$k]->exam_name)



                        // {
                    // if(!empty($olympiad_exam_date[$k]->from_date))
                    // {
                            echo "<p>".date('d-m-Y',strtotime($olympiad_exam_date[$key]->from_date))."</p>";
                    // }

                            //$iteration++;
                  }
                    //     }
                    // }
                        else

                     {

                        //continue;
                        // echo date("d-m-Y", strtotime($olympiad_exam_date[$k]->exam_date))."<br/>";
                        echo "<p>To be booked</p>";
                         //echo $olympiad_exam_date[$k]->exam_date."<br/>";
                     }
                  
              }
          }
                  echo "</td>";

                   echo "<td style='color:#FF0000'>";
                  //$exam_slug=$olympiad_exam_name[$i]->olympiad_exam_slug;

                       if(count($olympiad_exam_date)==0)
                  {
                    for($j=0;$j<count($olympiad_exam_level);$j++)
                        {
                       echo "<p>To be booked</p>";
                        }

                  }

                  else
                  {

                     $iteration=0;

   for ($k=0;$k<count($olympiad_exam_level);$k++) { 

    // if(!in_array($olympiad_exam_name[$i]->olympiad_exam_slug, array_column($olympiad_exam_date, 'exam_name')))
    // {echo $olympiad_exam_name[$i]->exam_level;
                                            
    //                     if($olympiad_exam_name[$i]->olympiad_exam_slug==$olympiad_exam_date[$k]->exam_name)

    //                     {
       $key = array_search($olympiad_exam_level[$k]->exam_level, array_column($olympiad_exam_date, 'exam_level'));



     if(in_array($olympiad_exam_level[$k]->exam_level, array_column($olympiad_exam_date, 'exam_level')))
                        {

                          

     // if(!empty($olympiad_exam_date[$k]->from_date))
     //                {
                            echo "<p>".$olympiad_exam_date[$key]->exam_slot."</p>";
                        // }

                            //$iteration++;
                    }
                  // }
                        else

                     {
                        //continue;
                        // echo date("d-m-Y", strtotime($olympiad_exam_date[$k]->exam_date))."<br/>";
                        echo "<p>To be booked</p>";
                         //echo $olympiad_exam_date[$k]->exam_date."<br/>";
                     }
                  
              }
          }
                  echo "</td>";

                  echo "<td class='olympiad_name' style='display:none'><span><b>".$olympiad_exam_name[$i]->olympiad_exam_name."</b></span></td>";

                    echo "<td class='book_button'>";

                    // $data_target="data-target=#".$olympiad_exam_name[$i]->olympiad_exam_slug."Modal";
                    if(count($olympiad_exam_date)==3)
                    {

                        $button_state="disabled";

                    }
                    else

                    {
                        $button_state="";
                    }

                   

                  
                  echo '<a href="javascript:void(0);" data-toggle="modal" data-target="#slotModal">'.'<button class="btn col s6 offset-s3 book" type="submit" name="book" value='.$olympiad_exam_name[$i]->olympiad_exam_slug.' '.$button_state.'>Book</button></a>';



                    // echo '<span style="display:none" id="exam_name">'.$olympiad_exam_name[$i]->olympiad_exam_slug.'</span>';

                    // echo '<a href="javascript:void(0);">'.'<button class="btn col s6 offset-s3" type="submit" name="book" id="book">Book Slot</button></a>';
              
                  echo "</td>";

                  echo "</tr>";
               

                 // echo "<option value=".$olympiad_exam_name[$i]->olympiad_exam_slug.">".$olympiad_exam_name[$i]->olympiad_exam_name."</option>";
                   
              
                }
            }

                    ?>

                </tbody>


        </table>


    </div>

                        <div>
                            <!-- The Modal -->
  <div class="modal fade" id="slotModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"style="text-align: center">Slot Booking</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

          <!--   <div class="content"> -->

              <input type="hidden" name="popup" id="popup" value="">

                <form id="cro_slot_form" name="slot_form" class="slot_form" method="POST" action="<?php echo base_url().'crest/access_card';?>">

                       <input type="hidden" name="user_class" value="<?php echo $user_class; ?>">


                            <p>Choose your slot for examination</p>

                            <div class="col s12 input-field">


                            <select id="cro_exam_name" name="olympiad_exam_name" required class="validate">
                            <option value="cro">CREST Reasoning Olympiad (CRO)</option>


                 <?php 

                 

                

            //      for($i=0;$i<count($olympiad_exam_name);$i++) {

            //       if (in_array(strtoupper($olympiad_exam_name[$i]->olympiad_exam_slug), $subject))

            //          {
            //          # code...





                  
               

            //      echo "<option value=".$olympiad_exam_name[$i]->olympiad_exam_slug.">".$olympiad_exam_name[$i]->olympiad_exam_name."</option>";
                   
              
            //     }
            // }

                    ?>

                    </select>

                </div>

                <div class="col s12 input-field">


                      <select id="cro_exam_level" name="olympiad_exam_level" required class="validate olympiad_exam_level">
                            <option value="">Please select exam level</option>


                 <?php 

                 

                 

                 for($i=0;$i<count($cro_exam_level);$i++) {
                     # code...

                    // if (in_array($cro_exam_level[$i]->exam_level, $olympiad_user_exam_level))

                    if(!in_array($cro_exam_level[$i]->exam_level, array_column($cro_user_exam_level, 'exam_level')))
                    {


                  
               

                 echo "<option value='".$cro_exam_level[$i]->exam_level."'>".$cro_exam_level[$i]->exam_level."</option>";

             }
                   
              
                }

                    ?>

                    </select>

                </div>

                     <div id="cro_exam_date" class="col s12 input-field olympiad_exam_date">

                       

                           

                    </div>


                  <!--   <select id="olympiad_exam_date" name="olympiad_exam_date">
                            <option value="">Please select exam date</option>

                    </select> -->

                    <div id="cro_exam_slot" class="col s12 input-field olympiad_exam_slot">


                    <!--   <select id="olympiad_exam_slot" name="olympiad_exam_slot" required class="validate"> -->
                          <!--   <option value="">Please select exam slot</option> -->

              

           <!--   <?php if(!in_array(10, array_column($exam_slot, 'slot_time'))) { 
             // search value in the array ?>

             <option value="10">10-10:30 am</option>";

             <?php } ?>   
             -->

                   <!--  </select> -->
                </div>

                    <input class="btn col s6 offset-s3 book_slot" type="submit" name="book_slot" value="Book Slot">

                   <!-- <button class="btn col s6 offset-s3" type="submit" name="book">Book Slot</button> -->

                </form>

                <form id="cso_slot_form" name="slot_form" class="slot_form" style="display: none;" method="POST" action="<?php echo base_url().'crest/access_card';?>">

                       <input type="hidden" name="user_class" value="<?php echo $user_class; ?>">


                            <p>Choose your slot for examination</p>

                            <div class="col s12 input-field">


                            <select id="cso_exam_name" name="olympiad_exam_name" required class="validate">
                            <option value="cso">CREST Science Olympiad (CSO)</option>


                 <?php 

                 

                

            //      for($i=0;$i<count($olympiad_exam_name);$i++) {

            //       if (in_array(strtoupper($olympiad_exam_name[$i]->olympiad_exam_slug), $subject))

            //          {
            //          # code...





                  
               

            //      echo "<option value=".$olympiad_exam_name[$i]->olympiad_exam_slug.">".$olympiad_exam_name[$i]->olympiad_exam_name."</option>";
                   
              
            //     }
            // }

                    ?>

                    </select>

                </div>

                <div class="col s12 input-field">


                      <select id="cso_exam_level" name="olympiad_exam_level" required class="validate olympiad_exam_level">
                            <option value="">Please select exam level</option>


                 <?php 

                  

                 

                 for($i=0;$i<count($cso_exam_level);$i++) {


                    if(!in_array($cso_exam_level[$i]->exam_level, array_column($cso_user_exam_level, 'exam_level')))
                    {
                     # code...



                  
               

                  echo "<option value='".$cso_exam_level[$i]->exam_level."'>".$cso_exam_level[$i]->exam_level."</option>";

              }
                   
              
                }

                    ?>

                    </select>

                </div>

                     <div id="cso_exam_date" class="col s12 input-field olympiad_exam_date">

                       

                           

                    </div>


                  <!--   <select id="olympiad_exam_date" name="olympiad_exam_date">
                            <option value="">Please select exam date</option>

                    </select> -->

                    <div id="cso_exam_slot" class="col s12 input-field olympiad_exam_slot">


                     <!--  <select id="olympiad_exam_slot" name="olympiad_exam_slot" required class="validate">
                            <option value="">Please select exam slot</option>

              

             <?php if(!in_array(10, array_column($exam_slot, 'slot_time'))) { 
             // search value in the array ?>

             <option value="10">10-10:30 am</option>";

             <?php } ?>   
            

                    </select> -->
                </div>

                    <input class="btn col s6 offset-s3 book_slot" type="submit" name="book_slot" value="Book Slot">

                   <!-- <button class="btn col s6 offset-s3" type="submit" name="book">Book Slot</button> -->

                </form>

                <form id="ceo_slot_form" name="slot_form" class="slot_form" style="display: none;" method="POST" action="<?php echo base_url().'crest/access_card';?>">

                       <input type="hidden" name="user_class" value="<?php echo $user_class; ?>">


                            <p>Choose your slot for examination</p>

                            <div class="col s12 input-field">


                            <select id="ceo_exam_name" name="olympiad_exam_name" required class="validate">
                            <option value="ceo">CREST English Olympiad (CEO)</option>


                 <?php 

                 

                

            //      for($i=0;$i<count($olympiad_exam_name);$i++) {

            //       if (in_array(strtoupper($olympiad_exam_name[$i]->olympiad_exam_slug), $subject))

            //          {
            //          # code...





                  
               

            //      echo "<option value=".$olympiad_exam_name[$i]->olympiad_exam_slug.">".$olympiad_exam_name[$i]->olympiad_exam_name."</option>";
                   
              
            //     }
            // }

                    ?>

                    </select>

                </div>

                <div  class="col s12 input-field">


                      <select id="ceo_exam_level" name="olympiad_exam_level" required class="validate olympiad_exam_level">
                            <option value="">Please select exam level</option>


                 <?php 

                 

                 

                 for($i=0;$i<count($ceo_exam_level);$i++) {
                     # code...


                 if(!in_array($ceo_exam_level[$i]->exam_level, array_column($ceo_user_exam_level, 'exam_level')))
                    {
                  
               

               echo "<option value='".$ceo_exam_level[$i]->exam_level."'>".$ceo_exam_level[$i]->exam_level."</option>";
             }
                   
              
                }

                    ?>

                    </select>

                </div>

                     <div id="ceo_exam_date" class="col s12 input-field olympiad_exam_date">

                       

                           

                    </div>


                  <!--   <select id="olympiad_exam_date" name="olympiad_exam_date">
                            <option value="">Please select exam date</option>

                    </select> -->

                    <div id="ceo_exam_slot" class="col s12 input-field olympiad_exam_slot">




                      <!-- <select id="olympiad_exam_slot" name="olympiad_exam_slot" required class="validate">
                            <option value="">Please select exam slot</option>

              

             <?php if(!in_array(10, array_column($exam_slot, 'slot_time'))) { 
             // search value in the array ?>

             <option value="10">10-10:30 am</option>";

             <?php } ?>   
            

                    </select> -->
                </div>

                    <input class="btn col s6 offset-s3 book_slot" type="submit" name="book_slot" value="Book Slot">

                   <!-- <button class="btn col s6 offset-s3" type="submit" name="book">Book Slot</button> -->

                </form>

                <form id="cco_slot_form" name="slot_form" class="slot_form" style="display: none;" method="POST" action="<?php echo base_url().'crest/access_card';?>">

                       <input type="hidden" name="user_class" value="<?php echo $user_class; ?>">


                            <p>Choose your slot for examination</p>

                            <div class="col s12 input-field">


                            <select id="cco_exam_name" name="olympiad_exam_name" required class="validate">
                            <option value="cco">CREST Cyber Olympiad (CCO)</option>


                 <?php 

                 

                

            //      for($i=0;$i<count($olympiad_exam_name);$i++) {

            //       if (in_array(strtoupper($olympiad_exam_name[$i]->olympiad_exam_slug), $subject))

            //          {
            //          # code...





                  
               

            //      echo "<option value=".$olympiad_exam_name[$i]->olympiad_exam_slug.">".$olympiad_exam_name[$i]->olympiad_exam_name."</option>";
                   
              
            //     }
            // }

                    ?>

                    </select>

                </div>

                <div class="col s12 input-field">


                      <select id="cco_exam_level" name="olympiad_exam_level" required class="validate olympiad_exam_level">
                            <option value="">Please select exam level</option>


                 <?php 

                 

                 

                 for($i=0;$i<count($cco_exam_level);$i++) {

                    if(!in_array($cco_exam_level[$i]->exam_level, array_column($cco_user_exam_level, 'exam_level')))
                    {
                     # code...



                  
               

                 echo "<option value='".$cco_exam_level[$i]->exam_level."'>".$cco_exam_level[$i]->exam_level."</option>";
                   
              
                }
            }

                    ?>

                    </select>

                </div>

                     <div id="cco_exam_date" class="col s12 input-field olympiad_exam_date">

                       

                           

                    </div>


                  <!--   <select id="olympiad_exam_date" name="olympiad_exam_date">
                            <option value="">Please select exam date</option>

                    </select> -->

                    <div id="cco_exam_slot" class="col s12 input-field olympiad_exam_slot">


                      <!-- <select id="olympiad_exam_slot" name="olympiad_exam_slot" required class="validate">
                            <option value="">Please select exam slot</option>

              

             <?php if(!in_array(10, array_column($exam_slot, 'slot_time'))) { 
             // search value in the array ?>

             <option value="10">10-10:30 am</option>";

             <?php } ?>   
            

                    </select> -->
                </div>

                    <input class="btn col s6 offset-s3 book_slot" type="submit" name="book_slot" value="Book Slot">

                   <!-- <button class="btn col s6 offset-s3" type="submit" name="book">Book Slot</button> -->

                </form>


                <form id="cmo_slot_form" name="slot_form" class="slot_form" style="display: none;" method="POST" action="<?php echo base_url().'crest/access_card';?>">

                       <input type="hidden" name="user_class" value="<?php echo $user_class; ?>">


                            <p>Choose your slot for examination</p>

                            <div class="col s12 input-field">


                            <select id="cmo_exam_name" name="olympiad_exam_name" required class="validate">
                            <option value="cmo">CREST Mathematics Olympiad (CMO)</option>


                 <?php 

                 

                

            //      for($i=0;$i<count($olympiad_exam_name);$i++) {

            //       if (in_array(strtoupper($olympiad_exam_name[$i]->olympiad_exam_slug), $subject))

            //          {
            //          # code...





                  
               

            //      echo "<option value=".$olympiad_exam_name[$i]->olympiad_exam_slug.">".$olympiad_exam_name[$i]->olympiad_exam_name."</option>";
                   
              
            //     }
            // }

                    ?>

                    </select>

                </div>

                <div class="col s12 input-field">


                      <select id="cmo_exam_level" name="olympiad_exam_level" required class="validate olympiad_exam_level">
                            <option value="">Please select exam level</option>


                 <?php 

                 

                 

                 for($i=0;$i<count($cmo_exam_level);$i++) {
                     # code...

                   if(!in_array($cmo_exam_level[$i]->exam_level, array_column($cmo_user_exam_level, 'exam_level')))
                    {

                  
               

                  echo "<option value='".$cmo_exam_level[$i]->exam_level."'>".$cmo_exam_level[$i]->exam_level."</option>";
                   
              }
                }

                    ?>

                    </select>

                </div>

                     <div id="cmo_exam_date" class="col s12 input-field olympiad_exam_date">

                       

                           

                    </div>


                  <!--   <select id="olympiad_exam_date" name="olympiad_exam_date">
                            <option value="">Please select exam date</option>

                    </select> -->

                    <div id="cmo_exam_slot" class="col s12 input-field olympiad_exam_slot">


                     <!--  <select id="olympiad_exam_slot" name="olympiad_exam_slot" required class="validate">
                            <option value="">Please select exam slot</option>

              

             <?php if(!in_array(10, array_column($exam_slot, 'slot_time'))) { 
             // search value in the array ?>

             <option value="10">10-10:30 am</option>";

             <?php } ?>   
            

                    </select> -->
                </div>

                    <input class="btn col s6 offset-s3 book_slot" type="submit" name="book_slot" value="Book Slot">

                   <!-- <button class="btn col s6 offset-s3" type="submit" name="book">Book Slot</button> -->

                </form>



                <form id="cfo_slot_form" name="slot_form" class="slot_form" style="display: none;" method="POST" action="<?php echo base_url().'crest/access_card';?>">

                       <input type="hidden" name="user_class" value="<?php echo $user_class; ?>">


                            <p>Choose your slot for examination</p>

                            <div class="col s12 input-field">


                            <select id="cfo_exam_name" name="olympiad_exam_name" required class="validate">
                            <option value="cfo">CREST French Olympiad (CFO)</option>


                 <?php 

                 

                

            //      for($i=0;$i<count($olympiad_exam_name);$i++) {

            //       if (in_array(strtoupper($olympiad_exam_name[$i]->olympiad_exam_slug), $subject))

            //          {
            //          # code...





                  
               

            //      echo "<option value=".$olympiad_exam_name[$i]->olympiad_exam_slug.">".$olympiad_exam_name[$i]->olympiad_exam_name."</option>";
                   
              
            //     }
            // }

                    ?>

                    </select>

                </div>

                <div class="col s12 input-field">


                      <select id="cfo_exam_level" name="olympiad_exam_level" required class="validate olympiad_exam_level">
                            <option value="">Please select exam level</option>


                 <?php 

                 

                 

                 for($i=0;$i<count($cfo_exam_level);$i++) {
                     # code...


                     if(!in_array($cfo_exam_level[$i]->exam_level, array_column($cfo_user_exam_level, 'exam_level')))
                    {
                  
               

                 echo "<option value='".$cfo_exam_level[$i]->exam_level."'>".$cfo_exam_level[$i]->exam_level."</option>";

             }
                   
              
                }

                    ?>

                    </select>

                </div>

                     <div id="cfo_exam_date"  class="col s12 input-field olympiad_exam_date">

                       

                           

                    </div>


                  <!--   <select id="olympiad_exam_date" name="olympiad_exam_date">
                            <option value="">Please select exam date</option>

                    </select> -->

                    <div id="cfo_exam_slot" class="col s12 input-field olympiad_exam_slot">


                    
                </div>

              

                    <input class="btn col s6 offset-s3 book_slot" type="submit" name="book_slot" value="Book Slot">

                   <!-- <button class="btn col s6 offset-s3" type="submit" name="book">Book Slot</button> -->

                </form>
            


            <!--  </div> -->
          
        </div>
        
        <!-- Modal footer -->
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div> -->
        
      </div>
    </div>
  </div>

                            



                        </div>

                        <br>







                           <!--  <p><strong>Username:</strong> Same as your login credentials.</p>
                            <p><strong>Password:</strong> Same as your login credentials.</p> -->
        <?php //if(isset($subject) && !empty($subject))

 // if (in_array("cso", $exam_name))
 // {
 //    echo "test";die;
 // }
                if(isset($exam_name) && !empty($exam_name))
                {   //foreach ($exam_name as $key => $value) {

                    // for ($i=0; $i <count($exam_name) ; $i++) { 
                  

          // if(strtoupper($exam_name[$i])=='CMO')
          // {
          //  $background_color='#e91e6333';
          // }
          // elseif (strtoupper($exam_name[$i])=='CSO') {
          //  # code...
          //  $background_color='#00bcd433';
          // }
          // elseif (strtoupper($exam_name[$i])=='CEO') {
          //  # code...
          //  $background_color='#cddc3933';
          // }
          // elseif (strtoupper($exam_name[$i])=='CRO') {
          //  # code...
          //  $background_color='#79554833';
          // }
          // elseif (strtoupper($exam_name[$i])=='CCO') {
          //  # code...
          //  $background_color='#673ab733';
          // }
          // elseif (strtoupper($exam_name[$i])=='CFO') {
          //  # code...
          //  $background_color='#ffc10733';
          // }
     //                else
     //                {

     //                }

        ?>

          
     <!-- <div class="card" <?php if (in_array("cmo", $exam_name)){ echo 'style=display:inline-block'; 
                } else { echo 'style=display:none';} ?>>
       <div id="cmo-top" style="background-color:#e91e6333;width:200px;height:200px;font-family: 'Melonheadz';font-size: 22px;padding:50px">    <table>                         
                            <tr><td style="text-align: center;">CMO Admit Card</td></tr>
                            
                        </table> </div>
       <div id="cmo-back" style="background-color:#fff;width:200px;height:200px">
        <table>                         
                            <tr><td>Link:</td><td><a href=""><?php echo "Will be uploaded 3 days before practice exam"; ?></a></td></tr>
                            <tr><td>Time:</td><td><?php echo "Will be uploaded 3 days before practice exam"; ?></td></tr>
                        </table> 
       </div>

    </div>
 <div class="card" <?php if (in_array("cso", $exam_name)){ echo 'style=display:inline-block'; 
        } else { echo 'style=display:none';} ?>>
       <div id="cso-top" style="background-color:#00bcd433;width:200px;height:200px;font-family: 'Melonheadz';font-size: 22px;padding:50px">  <table>             
              <tr><td style="text-align: center;">CSO Admit Card</td></tr>
              
            </table> </div>
       <div id="cso-back" style="background-color:#fff;width:200px;height:200px">
        <table>             
              <tr><td>Link:</td><td><a href=""><?php echo "Will be uploaded 3 days before practice exam"; ?></a></td></tr>
              <tr><td>Time:</td><td><?php echo "Will be uploaded 3 days before practice exam"; ?></td></tr>
            </table> 
       </div>

    </div>

    <div class="card" <?php if (in_array("ceo", $exam_name)){ echo 'style=display:inline-block'; 
        } else { echo 'style=display:none';} ?>>
       <div id="ceo-top" style="background-color:#cddc3933;width:200px;height:200px;font-family: 'Melonheadz';font-size: 22px;padding:50px">  <table>             
              <tr><td style="text-align: center;">CEO Admit Card</td></tr>
              
            </table> </div>
       <div id="ceo-back" style="background-color:#fff;width:200px;height:200px"><table>              
              <tr><td>Link:</td><td><a href=""><?php echo "Will be uploaded 3 days before practice exam"; ?></a></td></tr>
              <tr><td>Time:</td><td><?php echo "Will be uploaded 3 days before practice exam"; ?></td></tr>
            </table> </div>

    </div>

    <div class="card" <?php if (in_array("cro", $exam_name)){ echo 'style=display:inline-block'; 
        } else { echo 'style=display:none';} ?>>
       <div id="cro-top" style="background-color:#79554833;width:200px;height:200px;font-family: 'Melonheadz';font-size: 22px;padding:50px">  <table>             
              <tr><td style="text-align: center;">CRO Admit Card</td></tr>
              
            </table> </div>
       <div id="cro-back" style="background-color:#fff;width:200px;height:200px"><table>              
              <tr><td>Link:</td><td><a href=""><?php echo "Will be uploaded 3 days before practice exam"; ?></a></td></tr>
              <tr><td>Time:</td><td><?php echo "Will be uploaded 3 days before practice exam"; ?></td></tr>
            </table> </div>

    </div>

    <div class="card" <?php if (in_array("cco", $exam_name)){ echo 'style=display:inline-block'; 
        } else { echo 'style=display:none';} ?>>
       <div id="cco-top" style="background-color:#673ab733;width:200px;height:200px;font-family: 'Melonheadz';font-size: 22px;padding:50px">  <table>             
              <tr><td style="text-align: center;">CCO Admit Card</td></tr>
              
            </table> </div>
       <div id="cco-back" style="background-color:#fff;width:200px;height:200px"><table>              
              <tr><td>Link:</td><td><a href=""><?php echo "Will be uploaded 3 days before practice exam"; ?></a></td></tr>
              <tr><td>Time:</td><td><?php echo "Will be uploaded 3 days before practice exam"; ?></td></tr>
            </table> </div>

    </div>

    <div class="card" <?php if (in_array("cfo", $exam_name)){ echo 'style=display:inline-block'; 
        } else { echo 'style=display:none';} ?>>
       <div id="cfo-top" style="background-color:#ffc10733;width:200px;height:200px;font-family: 'Melonheadz';font-size: 22px;padding:50px">  <table>             
              <tr><td style="text-align: center;">CFO Admit Card</td></tr>
              
            </table> </div>
       <div id="cfo-back" style="background-color:#fff;width:200px;height:200px"><table>              
              <tr><td>Link:</td><td><a href=""><?php echo "Will be uploaded 3 days before practice exam"; ?></a></td></tr>
              <tr><td>Time:</td><td><?php echo "Will be uploaded 3 days before practice exam"; ?></td></tr>
            </table> </div>

    </div> -->

              
<!-- 
              <table>
              <tr><td>Username : </td><td><?php echo "Will be uploaded 3 days before practice exam"; ?></td></tr>
              <tr><td>Password : </td><td><?php echo "Will be uploaded 3 days before practice exam"; ?></td></tr>
              <tr><td>Link : </td><td><a href=""><?php echo "Will be uploaded 3 days before practice exam"; ?></a></td></tr>
              <tr><td>Subject : </td><td><?php echo "Will be uploaded 3 days before practice exam"; ?></td></tr>
              <tr><td>Time : </td><td><?php echo "Will be uploaded 3 days before practice exam"; ?></td></tr>
            </table>  -->
          
            
          

            
            <?php 
                      // } 
                    }
                    else
                    {
                        echo "Access Card not avaliable";
                    }
                    ?>
            
          
          </div>
        
          <br>



        <script type="text/javascript">

                     


    $(document).ready(function() {

        $('#slotModal').on('hidden.bs.modal', function () {
    location.reload();
})


$(".slot_form").hide();

$('.book').click(function(){

var subject=$(this).val();
   
if(subject=='cro')
{

$("#cro_slot_form").show();
$("#ceo_slot_form").hide();
$("#cso_slot_form").hide();
$("#cmo_slot_form").hide();
$("#cco_slot_form").hide();
$("#cfo_slot_form").hide();
    
$("#popup").val(subject);

}

else if(subject=='ceo')

{
$("#ceo_slot_form").show();
$("#cro_slot_form").hide();
$("#cso_slot_form").hide();
$("#cmo_slot_form").hide();
$("#cco_slot_form").hide();
$("#cfo_slot_form").hide();

$("#popup").val(subject);
}

else if(subject=='cso')

{
$("#cso_slot_form").show();
$("#ceo_slot_form").hide();
$("#cro_slot_form").hide();
$("#cmo_slot_form").hide();
$("#cco_slot_form").hide();
$("#cfo_slot_form").hide();

$("#popup").val(subject);
}

else if(subject=='cmo')

{
$("#cmo_slot_form").show();
$("#cro_slot_form").hide();
$("#cso_slot_form").hide();
$("#ceo_slot_form").hide();
$("#cco_slot_form").hide();
$("#cfo_slot_form").hide();

$("#popup").val(subject);
}

else if(subject=='cco')

{
$("#cco_slot_form").show();
$("#ceo_slot_form").hide();
$("#cso_slot_form").hide();
$("#cmo_slot_form").hide();
$("#cro_slot_form").hide();
$("#cfo_slot_form").hide();

$("#popup").val(subject);
}

else if(subject=='cfo')

{
$("#cfo_slot_form").show();
$("#ceo_slot_form").hide();
$("#cso_slot_form").hide();
$("#cmo_slot_form").hide();
$("#cco_slot_form").hide();
$("#cro_slot_form").hide();

$("#popup").val(subject);
}


    });

 $(".olympiad_exam_level").change(function () {

     var olympiad_exam_level=$( ".olympiad_exam_level option:selected" ).val();
     var olympiad_exam_slot=$( "#olympiad_exam_slot option:selected" ).val();



     if(olympiad_exam_level=="" || typeof olympiad_exam_slot === "undefined")
     {
$(".book_slot").addClass("disabled");
     }

       else

       {
         $(".book_slot").removeClass("disabled");
       }

    

 });


 $(".olympiad_exam_slot").change(function () {

    var sub=$("#popup").val();

    if(sub=="cro")
    {
         var olympiad_exam_level=$( "#cro_exam_level option:selected" ).val();
    }
    else if (sub=="ceo") {

        var olympiad_exam_level=$( "#ceo_exam_level option:selected" ).val();
    }
     else if (sub=="cso") {

        var olympiad_exam_level=$( "#cso_exam_level option:selected" ).val();
    }

     else if (sub=="cmo") {

        var olympiad_exam_level=$( "#cmo_exam_level option:selected" ).val();
    }

     else if (sub=="cco") {

        var olympiad_exam_level=$( "#cco_exam_level option:selected" ).val();
    }

     else if (sub=="cfo") {

        var olympiad_exam_level=$( "#cfo_exam_level option:selected" ).val();
    }

     var olympiad_exam_slot=$( "#olympiad_exam_slot option:selected" ).val();
    

// alert(olympiad_exam_slot);

// alert(olympiad_exam_level);

     if(olympiad_exam_slot=="" || olympiad_exam_level=="")
     {
$(".book_slot").addClass("disabled");
     }

       else

       {
         $(".book_slot").removeClass("disabled");
       }

    

 });



        
$(".book_slot").addClass("disabled");
       

        // if (exam_name=="" || exam_level=="" || exam_slot=="" ) 
        // {
        //     $("#book_slot").addClass("disabled");
        // }

        // else 
        // {
        //     $("#book_slot").removeClass("disabled");
        // }


        $(".olympiad_exam_date").change(function () {

             var sub=$("#popup").val();


            // alert(sub);
    
    // This will redirect to the value, relative to the current path
    // location.href = $(this).val();
      var olympiad_exam_date= $(".exam_date").val();   


      //var olympiad_exam_name = $("#olympiad_exam_name option:selected" ).text();
      if(sub=="cro")
            {
            var olympiad_exam_name = $("#cro_exam_name option:selected" ).val();
            var olympiad_exam_level = $("#cro_exam_level option:selected").text();
            }
            else if (sub=="ceo")
            {
            var olympiad_exam_name = $("#ceo_exam_name option:selected" ).val();
            var olympiad_exam_level = $("#ceo_exam_level option:selected").text();
            }
            else if (sub=="cso")
            {
            var olympiad_exam_name = $("#cso_exam_name option:selected" ).val();
            var olympiad_exam_level = $("#cso_exam_level option:selected").text();
            }
            else if (sub=="cmo")
            {
            var olympiad_exam_name = $("#cmo_exam_name option:selected" ).val();
            var olympiad_exam_level = $("#cmo_exam_level option:selected").text();
            }
            else if (sub=="cco")
            {
            var olympiad_exam_name = $("#cco_exam_name option:selected" ).val();
            var olympiad_exam_level = $("#cco_exam_level option:selected").text();
            }
            else if (sub=="cfo")
            {
            var olympiad_exam_name = $("#cfo_exam_name option:selected" ).val();
            var olympiad_exam_level = $("#cfo_exam_level option:selected").text();
            }
            else 
            {
            var olympiad_exam_name = "";
            var olympiad_exam_level = "";
            }

     

            if(olympiad_exam_name && olympiad_exam_level ) {
                $.ajax({
                     type: 'POST',
            url: '<?php echo base_url('crest/slot_timings'); ?>',
            // dataType : 'json',
             cache: false,
             data: 'olympiad_exam_name=' + olympiad_exam_name + '&olympiad_exam_level=' + olympiad_exam_level + '&olympiad_exam_date=' + olympiad_exam_date  + '&<?php echo $this->security->get_csrf_token_name();?>=<?php echo $this->security->get_csrf_hash();?>',
                    success:function(data) {

                        // $('#olympiad_exam_date').show();

                        // $('select[name="olympiad_exam_date"]').empty();

                         //$('#olympiad_exam_slot').html(data);
                        // $.each(data, function(key, value) {
                        //     $('select[name="olympiad_exam_date"]').append('<option value="'+ value.exam_id +'">'+ value.exam_date +'</option>');
                        // });

                         if(sub=="cro")
                    {
                        $('#cro_exam_slot').html(data);
                    }

                    else if(sub=="ceo")

                    {
                        $('#ceo_exam_slot').html(data);

                    }
                     else if(sub=="cso")

                    {
                        $('#cso_exam_slot').html(data);

                    }

                     else if(sub=="cmo")

                    {
                        $('#cmo_exam_slot').html(data);

                    }

                     else if(sub=="cco")

                    {
                        $('#cco_exam_slot').html(data);

                    }

                     else if(sub=="cfo")

                    {
                        $('#cfo_exam_slot').html(data);

                    }

                    else

                    {

                    }
                    }
                });
            }else{
                // $('select[name="olympiad_exam_date"]').empty();
            }


 
});
        
   

        $('#olympiad_exam_name').change(function(){

           
    $('#olympiad_exam_date').hide();
 
             
    //$('#olympiad_exam_level option:first').prop('selected', 'selected');
});


        $('select[name="olympiad_exam_level"]').on('change', function() {

            var sub=$("#popup").val();


            if(sub=="cro")
            {
            var olympiad_exam_name = $("#cro_exam_name option:selected" ).text();
            var olympiad_exam_level = $("#cro_exam_level option:selected").text();
            }
            else if (sub=="ceo")
            {
            var olympiad_exam_name = $("#ceo_exam_name option:selected" ).text();
            var olympiad_exam_level = $("#ceo_exam_level option:selected").text();
            }
            else if (sub=="cso")
            {
            var olympiad_exam_name = $("#cso_exam_name option:selected" ).text();
            var olympiad_exam_level = $("#cso_exam_level option:selected").text();
            }
            else if (sub=="cmo")
            {
            var olympiad_exam_name = $("#cmo_exam_name option:selected" ).text();
            var olympiad_exam_level = $("#cmo_exam_level option:selected").text();
            }
            else if (sub=="cco")
            {
            var olympiad_exam_name = $("#cco_exam_name option:selected" ).text();
            var olympiad_exam_level = $("#cco_exam_level option:selected").text();
            }
            else if (sub=="cfo")
            {
            var olympiad_exam_name = $("#cfo_exam_name option:selected" ).text();
            var olympiad_exam_level = $("#cfo_exam_level option:selected").text();
            }
            else 
            {
            var olympiad_exam_name = "";
            var olympiad_exam_level = "";
            }


            

 

            
            if(olympiad_exam_name && olympiad_exam_level ) {
                $.ajax({
                     type: 'POST',
            url: '<?php echo base_url('crest/exam_dates'); ?>',
            // dataType : 'json',
             cache: false,
             data: 'olympiad_exam_name=' + olympiad_exam_name + '&olympiad_exam_level=' + olympiad_exam_level + '&<?php echo $this->security->get_csrf_token_name();?>=<?php echo $this->security->get_csrf_hash();?>',
                    success:function(data) {

                      if(sub=="cro")
                    {

                        $('#cro_exam_date').show();

                        $('select[name="cro_exam_date"]').empty();

                        $('#cro_exam_date').html(data);
                    }

                    else if(sub=="ceo")

                    {
                        $('#ceo_exam_date').show();

                        $('select[name="ceo_exam_date"]').empty();

                        $('#ceo_exam_date').html(data);

                    }
                     else if(sub=="cso")

                    {
                        $('#cso_exam_date').show();

                        $('select[name="cso_exam_date"]').empty();

                        $('#cso_exam_date').html(data);

                    }

                     else if(sub=="cmo")

                    {
                        $('#cmo_exam_date').show();

                        $('select[name="cmo_exam_date"]').empty();

                        $('#cmo_exam_date').html(data);

                    }

                     else if(sub=="cco")

                    {
                        $('#cco_exam_date').show();

                        $('select[name="cco_exam_date"]').empty();

                        $('#cco_exam_date').html(data);

                    }

                     else if(sub=="cfo")

                    {
                        $('#cfo_exam_date').show();

                        $('select[name="cfo_exam_date"]').empty();

                        $('#cfo_exam_date').html(data);

                    }

                    else

                    {

                    }
                        // $.each(data, function(key, value) {
                        //     $('select[name="olympiad_exam_date"]').append('<option value="'+ value.exam_id +'">'+ value.exam_date +'</option>');
                        // });
                    }
                });
            }else{
                $('select[name="olympiad_exam_date"]').empty();
            }
        });

        // $('#book').click(function(){

        //      var exam_name = $("#exam_name").text();

        //    // alert(exam_name);


        //     $.ajax({
        //              type: 'POST',
        //     url: '<?php echo base_url('crest/access_card'); ?>',
        //     // dataType : 'json',
        //      cache: false,
        //      data: 'exam_name=' + exam_name + '&<?php echo $this->security->get_csrf_token_name();?>=<?php echo $this->security->get_csrf_hash();?>',
        //             success:function(data) {

        //                 $('#slotModal').modal('show');

        //                 // $('#olympiad_exam_date').show();

        //                 // $('select[name="olympiad_exam_date"]').empty();

        //                 // $('#olympiad_exam_date').html(data);
        //                 // $.each(data, function(key, value) {
        //                 //     $('select[name="olympiad_exam_date"]').append('<option value="'+ value.exam_id +'">'+ value.exam_date +'</option>');
        //                 // });
        //             }
        //         });






        // });
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

<style>
  
#slotModal .modal-body {
  
 /* background: url("<?php //echo base_url(); ?>assets/images/certificate_bg.jpg");*/
  background: none;
  height:450px;

}

#olympiad_exam_slot
{
    display: block;
    width: 50%;
}

ul.instructions li
{
  list-style-type: none !important;
}

@media only screen and (max-width:600px){
.text-center {
    width: 100% !important;
    margin-top: 37px;
    margin-left: 10px !important;
}
#menu, #toggle-menu {
    background-color: #751e49;
    width: 250px;
       }
#menu {
    position: relative !important;
    margin-top: -37px;
    left: 36px;
      }
.row .col.offset-s3
{
  margin-left: 0px;
}
.row .col.s6 {

  width:100%;

}

#exam_link
{
 display: none !important;
}

#exam_mobile_link
{
 display: block !important;
}
  }

  @media only screen 
    and (min-width : 601px) 
    and (max-width : 1199px)  { 

      .row .col.s6 {

  width:100%;

}




    }

     @media only screen 
    and (min-width : 320px) 
    and (max-width : 600px)  { 
    /* STYLES GO HERE */
   
    #action{
      display:none;
    }
    #examname{
      display:none;
    }

    .exam_name{
      display:none !important;
    }

    .olympiad_name
    {
      display:block !important;
      position: relative;
    left: 12px;
    /* top: 54%; */
  /*  margin-top: 125px;*/
    padding-bottom: 10px;
    margin-top: 128px;
}


    

    .book_button{

    position: relative;
    top: 70px;
    right: 25%;
    border-bottom: 1px solid #fff;


  }

  td
  {
    padding: 10px 12px 22px 10px;

  }
  th
  {
    padding:15px 40px;
  }

  .btn
  {
    height: 30px;
    line-height: 30px;
    padding: 0px 5px;
  }



  }

  @media only screen 
    and (min-width : 601px) 
    and (max-width : 1199px)  {

    .book_slot 
    {
      width:50% !important;
    }

    }




</style>

<script type="text/javascript">


// alert(start_time);
// if(timestamp==start_time)

// {
//     alert("start your test now");
// }

//var timestamp = '<?=time();?>';
function updateTime(){

        var x = new Date();

    // date part ///
var month=x.getMonth()+1;
var day=x.getDate();
var year=x.getFullYear();
if (month <10 ){month='0' + month;}
if (day <10 ){day='0' + day;}
var timestamp= year+'-'+month+'-'+day;

// time part //
var hour=x.getHours();
var minute=x.getMinutes();
var second=x.getSeconds();
if(hour <10 ){hour='0'+hour;}
if(minute <10 ) {minute='0' + minute; }
if(second<10){second='0' + second;}

var timestamp = timestamp + ' ' +  hour+':'+minute+':'+second;


var start_time = '<?php echo $start_date;?>';

  //$('#time').html(Date(timestamp));

  // alert(start_time);

  // alert(timestamp);
  // alert(start_time);

  if(timestamp==start_time)

{
   location.reload(true);
}
  timestamp++;
}
$(function(){
  setInterval(updateTime, 1000);
});
</script>







