
<table bgcolor="#fdfdfd" width="736" border="0" cellspacing="0" cellpadding="0" align="center" style="border:4px solid #1f5a7d;margin:0 auto;padding:0;font-family:'Arial','sans-serif';">
  <tbody>
    <tr bgcolor="#fdfdfd" style="border-bottom:4px solid #1f5a7d">
      <td>
          
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <td width="100%" style="text-align:center">
                <a href="http://www.crestolympiads.com" target="_blank">
                <img src="http://www.crestolympiads.com/assets/images/logo/logo.png" width="150" alt="CREST Olympiads" height="90" style="margin:6px;text-align:center"></a>
              </td>
            </tr>    
          </tbody>
        </table>
          
      </td>
    </tr>

 <tr>
  <td align="center" valign="bottom" style="color:#145452;border-top:1px solid #e7e7e7;background:#e7e7e7;font-size:12px;padding-bottom:3px;margin-top:0px">    
      <div style="height:22px;line-height:22px;text-align: right;">Date: <?php echo date("d-m-Y"); ?>
      </div>
  </td>
</tr>
    <tr>
      <td style="font-size:22px;text-align:center;color:#000;padding:10px;font-weight:bold;">Invoice
      </td>
    </tr>

    <tr>
      <td align="left" valign="top" width="736" height="90" style="color:#000;padding-top: 10px">
        <table border="0" style="width: 75%;margin: 0px auto;border: 2px solid #000;padding: 15px 30px;">
          <tr>
            <td style="width:48%;text-align: right;">
              Student Name
            </td>
            <td style="width:3%">:</td>
            <td><strong><?php echo $this_user->username; ?></strong></td>
          </tr>
          <tr>
            <td style="width:48%;text-align: right;">
              Guardian Name
            </td>
            <td style="width:3%">:</td>
            <td><strong><?php echo $this_user->father_mother_guardian_name; ?></strong></td>
          </tr>
          <tr>
            <td style="width:48%;text-align: right;">
              Class
            </td>
            <td style="width:3%">:</td>
            <td><strong><?php echo $this_user->class; ?></strong></td>
          </tr>
          <tr>
            <td style="width:48%;text-align: right;">
              School
            </td>
            <td style="width:3%">:</td>
            <td>
              <strong><?php echo $this_user->school; ?></strong>
            </td>
          </tr>
          <tr>
            <td style="width:48%;text-align: right;">
              Subjects
            </td>
            <td style="width:3%">:</td>
            <td>
              <ul style="margin-left: 5px;">
                <?php
              //$subjects = $this_user->prefered_subject;

      $subjects=$this->session->userdata('subjects');
      rtrim($subjects,",");
      $subjects = explode(',', $subjects);
       //var_dump($subjects);
      //$all_sub = $this->config->item('main_categories');
      foreach ($subjects as $this_cus_sub) {
        
      //  foreach ($all_sub as $subj ) {
        
          //if($subj[1] == $this_cus_sub){
            //echo "<li><strong>".$subj[2]."</strong></li>";
            
            if($this_cus_sub=="CMO")
            {
                $subject="CREST Mathematics Olympiad";
            }
            else if($this_cus_sub=="CRO") {
                
                 $subject="CREST Reasoning Olympiad";
                
            }
            else if($this_cus_sub=="CCO") {
                
                 $subject="CREST Cyber Olympiad";
                
            }
            else if($this_cus_sub=="CEO") {
                
                 $subject="CREST English Olympiad";
                
            }
            else if($this_cus_sub=="CSO") {
                
                 $subject="CREST Science Olympiad";
                
            }
            else if($this_cus_sub=="CFO") {
                
                 $subject="CREST French Olympiad";
                
            }
            
            else
            {
                $subject="";
            }
            if(!empty($subject))
            {
            echo "<li><strong>".$subject."</strong></li>";
        	}
          //}
        //}
        
        //reset($all_sub);
      }
      ?>
              </ul></td>
          </tr>
          <tr>
            <td style="width:48%;text-align: right;">
              Amount
            </td>
            <td style="width:3%">:</td>
            <td><strong><?php echo $this->session->userdata('amount'); ?></strong></td>
          </tr>
        </table>
        <div style="clear:both"></div>
      </td>
    </tr>

    <tr>
      <td>
        <!-- <p><strong>Important Points:</strong></p> -->
        <ul style="padding: 20px 20px 0px 20px;">
         
          <li style="text-align:center;list-style:none;padding-left:1px;height:25px;margin-left:5px;color:#000;font-size:16px;margin-bottom:5px;margin-top:15px"> <strong>Important Instructions to Parents and Students</strong></li>
          <li style="list-style: url(https://www.olympiadsuccess.com/assets/designs/images/circle-icon1.png);padding-left: 6px;background-size: 8px 8px;line-height:23px;margin-left: 20px;color: #0e5d26;font-size: 16px;">CREST Olympiads will be conducted online and the student will have to take the exams from their residence or any other place where they have access to computer with good internet connectivity. Schools, subscribing to these exams, may decide to conduct these exams using their computer lab. The exam can't be taken using Mobile device. Hence, the student should have access to a good laptop/desktop with latest version of the browser (preferably Google Chrome) and 2 Mbps Internet connectivity.</li><br/>

          <li style="list-style: url(https://www.olympiadsuccess.com/assets/designs/images/circle-icon1.png);padding-left: 6px;background-size: 8px 8px;line-height:23px;margin-left: 20px;color: #0e5d26;font-size: 16px;">CREST Olympiads brings progressive thinking and hence, quite different from traditional Olympiad exams. Click <a href="<?=base_url();?>about-us#traditional-vs-crest-olympiads" target="_blank">here</a> to know more.</li><br/>

          <li style="list-style: url(https://www.olympiadsuccess.com/assets/designs/images/circle-icon1.png);padding-left: 6px;background-size: 8px 8px;line-height:23px;margin-left: 20px;color: #0e5d26;font-size: 16px;"> It&rsquo;s in the best interest of students not to use any unfair means while attempting these exams. These exams are just a first step for a much bigger goal of appearing for competitive exams that are being conducted online.</li><br/>

          <li style="list-style: url(https://www.olympiadsuccess.com/assets/designs/images/circle-icon1.png);padding-left: 6px;background-size: 8px 8px;line-height:23px;margin-left: 20px;color: #0e5d26;font-size: 16px;"> Please check the <a href="https://www.crestolympiads.com/exam-schedule" target="_blank">exam schedule</a>. We will provide flexibility to the students to select preferred dates for Level 1 exam.</li><br/>

          <li style="list-style: url(https://www.olympiadsuccess.com/assets/designs/images/circle-icon1.png);padding-left: 6px;background-size: 8px 8px;line-height:23px;margin-left: 20px;color: #0e5d26;font-size: 16px;">We take preparation seriously. Hence, there would be two (2) practice exams, provided complimentary as per exam schedule (<a href="https://www.crestolympiads.com/exam-schedule" target="_blank">exam schedule</a>) mentioned.</li><br>

          <li style="list-style: url(https://www.olympiadsuccess.com/assets/designs/images/circle-icon1.png);padding-left: 6px;background-size: 8px 8px;line-height:23px;margin-left: 20px;color: #0e5d26;font-size: 16px;">Please make sure that you book the slots in Slot/Access section of your dashboard before the exam dates to avoid missing the practice papers and main exam.</li><br/>


          <li style="list-style: url(https://www.olympiadsuccess.com/assets/designs/images/circle-icon1.png);padding-left: 6px;background-size: 8px 8px;line-height:23px;margin-left: 20px;color: #0e5d26;font-size: 16px;">Do read the Frequently Asked Questions (<a href="https://www.crestolympiads.com/faqs" target="_blank">FAQs</a>) thoroughly.</li><br/>

          <li style="list-style: url(https://www.olympiadsuccess.com/assets/designs/images/circle-icon1.png);padding-left: 6px;background-size: 8px 8px;line-height:23px;margin-left: 20px;color: #0e5d26;font-size: 16px;">Please remember to add <a href="mailto:info@crestolympiads.com" target="_blank">info@crestolympiads.com</a>  to your primary inbox, else you may miss important updates on Online Olympiad Exams.</li><br/>

        </ul><br>
      </td>  
    </tr>


    <tr>
      <td style="font-size:22px;text-align:center;color:#000;padding:10px;font-weight:bold;">
       <div style="color:#505050;font-family:'Times New Roman','serif';background:#fff;border:7px double #cb2027 ;padding:5px;width:80%;margin:0px auto;text-align: left">
       <br>&nbsp;
       What do we do next?

        <ul style="padding: 0px 20px 0px 20px;">
        <li style="list-style: url(https://www.olympiadsuccess.com/assets/designs/images/circle-icon1.png);padding-left: 6px;background-size: 8px 8px;line-height:23px;color: #000;font-size: 16px;float: left">Please mark this mail as 'Important' so that you don't miss any important information.</li>
        <li style="list-style: url(https://www.olympiadsuccess.com/assets/designs/images/circle-icon1.png);padding-left: 6px;background-size: 8px 8px;line-height:23px;color: #000;font-size: 16px;">Start preparing for the Olympiad Exams. You may wish to practice from Olympiad Success (<a href="https://www.olympiadsuccess.com" target="_blank">www.olympiadsuccess.com</a>), India's largest preparation platform for Olympiad preparation. Apply '<strong>CREST20</strong>' to avail 20% off.</li>
       <!--  <li style="list-style: url(https://www.olympiadsuccess.com/assets/designs/images/circle-icon1.png);padding-left: 6px;background-size: 8px 8px;line-height:23px;color: #000;font-size: 16px;">You would get '<strong>Access Card</strong>' with username and password in the month of October</li>
        <li style="list-style: url(https://www.olympiadsuccess.com/assets/designs/images/circle-icon1.png);padding-left: 6px;background-size: 8px 8px;line-height:23px;color: #000;font-size: 16px;">Remember that there are <strong>3 practice tests</strong> (not mandatory) in October/November </li> -->
      </ul>
     </td>
   </tr>

  <tr>
    <td>
      <div style="float:left;width:32px;height:32px;margin:15px 5px 15px 15px">
        <img style="height:inherit;width:inherit" src="https://www.olympiadsuccess.com/assets/designs/images/mailer/p_logo.png">
      </div>
      <div style="float:left;width:auto;height:32px;margin-top:17px;color:#fb7e1d;font-size:12px"><?php echo $this->config->item('support_phone');?><br>CREST Olympiads Support
      </div>
      <div style="float:right;width:auto;height:32px;margin:17px 5px 15px 5px;color:#fb7e1d;font-size:12px">
       Tower B4, Spaze i-Tech Park, <br>Sohna Road, Gurgaon 
     </div>
     <div style="float:left;margin:15px 5px 15px 75px">
       <a style="width:32px;height:32px;" href="https://www.facebook.com/crestolympiads/"><img style="height:inherit;width:inherit" src="https://www.olympiadsuccess.com/assets/designs/images/mailer/fb.png"></a>
     </div>
     <div style="float:left;margin:15px 5px 15px 5px">
       <a style="width:32px;height:32px;" href="https://www.linkedin.com/company/crestolympiads/"><img style="height:inherit;width:inherit" src="https://www.olympiadsuccess.com/assets/designs/images/mailer/li.png"></a>
     </div>
   </td>

 </tr>
 <tr>
  <td align="center" valign="bottom" style="color:#145452;border-top:1px solid #e7e7e7;background:#e7e7e7;font-size:12px;height:22px;line-height:22px;padding-bottom:3px;margin-top:0px">    
      <div style="height:22px;line-height:22px;text-align: left;padding-left:18px;">Powered by: CREST Olympiads
      </div>
  </td>
</tr>

</tbody>
</table>