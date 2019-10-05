<p style="font-family: font-family:Arial, Helvetica, sans-serif;">Hello <?php echo $name; ?>,</p>
<p style="font-family:font-family:Arial, Helvetica, sans-serif;">Welcome to Unicus Olympiads. Kindly find below the details submitted by you:</p>
<p>&nbsp;</p>
<p style="font-family:Arial, Helvetica, sans-serif;"><strong>Name:</strong>&nbsp;<span style="font-family:Arial, Helvetica, sans-serif;"><?php echo $name; ?></span></p> 
<p style="font-family:Arial, Helvetica, sans-serif;"><strong>Email:</strong>&nbsp;<span style="font-family:Arial, Helvetica, sans-serif;"><?php echo $email; ?></span></p> 
<p style="font-family:Arial, Helvetica, sans-serif;"><strong>Phone:</strong>&nbsp;<span style="font-family:Arial, Helvetica, sans-serif;"><?php echo $phone; ?></span></p> 
<p style="font-family:Arial, Helvetica, sans-serif;"><strong>Location:</strong>&nbsp;<span style="font-family:Arial, Helvetica, sans-serif;"><?php echo $location; ?></span></p>
<p style="font-family:Arial, Helvetica, sans-serif;"><strong>School:</strong>&nbsp;<span style="font-family:Arial, Helvetica, sans-serif;"><?php echo $school; ?></span></p> 
<p style="font-family:Arial, Helvetica, sans-serif;"><strong>Message:</strong>&nbsp;<span style="font-family:Arial, Helvetica, sans-serif;"><?php echo $message; ?></span></p> 

<p>&nbsp;</p>

<p><strong>Points to be noted:</strong></p>

<p style="font-family:Arial, Helvetica, sans-serif;">1) You can find the <a href="https://www.unicusolympiads.com/exam-dates" target="_blank">Summer Olympiad exam dates</a> here. </p>

<p style="font-family:Arial, Helvetica, sans-serif;">2) Visit <a href="https://www.unicusolympiads.com/faqs" target="_blank">FAQs</a> section for more details.</p>


<p style="font-family:Arial, Helvetica, sans-serif;">3) We believe in replying to queries promptly. But, in case, you don't hear from us within 1 working day, feel free to reach us at <?php echo $this->config->item('support_phone'); ?></p>

<!-- <p style="font-family:Arial, Helvetica, sans-serif;">Feel free to reach us at <?php //echo $this->config->item('support_phone'); ?></p> -->

<p>Please remember to add <a href="mailto:info@unicusolympiads.com" target="_blank">info@unicusolympiads.com</a> to your primary inbox, else you may miss important updates on Online Summer Olympiad Exams.</p>
<p>&nbsp;</p>

<p style="font-family:Arial, Helvetica, sans-serif;">Regards,</p>
<p style="font-family:Arial, Helvetica, sans-serif;"><?php echo $this->config->item('site_name'); ?></p>
   