<p style="font-family: font-family:Arial, Helvetica, sans-serif;">Hello <?php echo $name; ?>,</p>
<p style="font-family:font-family:Arial, Helvetica, sans-serif;">Thank you for registering with CREST Olympiads. Here are the details submitted by you:</p>
<p>&nbsp;</p>
<p style="font-family:Arial, Helvetica, sans-serif;"><strong>Name:</strong>&nbsp;<span style="font-family:Arial, Helvetica, sans-serif;"><?php echo $name; ?></span></p> 
<p style="font-family:Arial, Helvetica, sans-serif;"><strong>Email:</strong>&nbsp;<span style="font-family:Arial, Helvetica, sans-serif;"><?php echo $email; ?></span></p> 
<p style="font-family:Arial, Helvetica, sans-serif;"><strong>Phone:</strong>&nbsp;<span style="font-family:Arial, Helvetica, sans-serif;"><?php echo $phone; ?></span></p> 
<p style="font-family:Arial, Helvetica, sans-serif;"><strong>Location:</strong>&nbsp;<span style="font-family:Arial, Helvetica, sans-serif;"><?php echo $location; ?></span></p>
<p style="font-family:Arial, Helvetica, sans-serif;"><strong>School:</strong>&nbsp;<span style="font-family:Arial, Helvetica, sans-serif;"><?php echo $school; ?></span></p> 
<p style="font-family:Arial, Helvetica, sans-serif;"><strong>Message:</strong>&nbsp;<span style="font-family:Arial, Helvetica, sans-serif;"><?php echo $message; ?></span></p> 

<p>&nbsp;</p>

<p><strong>Important Points:</strong></p>

<p style="font-family:Arial, Helvetica, sans-serif;">1) Please check the <a href="https://www.crestolympiads.com/exam-schedule" target="_blank">exam schedule</a>. We will provide flexibility to the students to select preferred dates for Level 1 exam. </p>

<p style="font-family:Arial, Helvetica, sans-serif;">2) Do visit <a href="https://www.crestolympiads.com/faqs" target="_blank">FAQs</a> section.</p>


<p style="font-family:Arial, Helvetica, sans-serif;">3) In case, you don't hear from us within 1 working day, feel free to reach us at <?php echo $this->config->item('support_phone'); ?></p>

<!-- <p style="font-family:Arial, Helvetica, sans-serif;">Feel free to reach us at <?php //echo $this->config->item('support_phone'); ?></p> -->

<p>Please remember to add <a href="mailto:info@crestolympiads.com" target="_blank">info@crestolympiads.com</a> to your primary inbox, else you may miss important updates on Online Olympiad Exams.</p>
<p>&nbsp;</p>

<p style="font-family:Arial, Helvetica, sans-serif;">Regards,</p>
<p style="font-family:Arial, Helvetica, sans-serif;"><?php echo $this->config->item('site_name'); ?></p>
   