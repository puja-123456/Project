<p style="font-family: font-family:Arial, Helvetica, sans-serif;">Hello <?php echo $name; ?>,</p>
<p style="font-family:font-family:Arial, Helvetica, sans-serif;">Your contact query has been received by us. Please find below the details submitted by you:</p>
<p>&nbsp;</p>
<p style="font-family:Arial, Helvetica, sans-serif;"><strong>Name:</strong>&nbsp;<span style="font-family:Arial, Helvetica, sans-serif;"><?php echo $name; ?></span></p> 
<p style="font-family:Arial, Helvetica, sans-serif;"><strong>Email:</strong>&nbsp;<span style="font-family:Arial, Helvetica, sans-serif;"><?php echo $email; ?></span></p> 
<p style="font-family:Arial, Helvetica, sans-serif;"><strong>Phone:</strong>&nbsp;<span style="font-family:Arial, Helvetica, sans-serif;"><?php echo $phone; ?></span></p> 

<p style="font-family:Arial, Helvetica, sans-serif;"><strong>Message:</strong>&nbsp;<span style="font-family:Arial, Helvetica, sans-serif;"><?php echo $message; ?></span></p> 

<p>&nbsp;</p>


<p><strong>Points to be noted:</strong></p>

<p style="font-family:Arial, Helvetica, sans-serif;">We believe in solving our customer queries promptly. But, in case, if you do not hear from us within 24 hours, feel free to reach us at <?php echo $this->config->item('support_phone'); ?></p>

<p>Please remember to add <a href="mailto:info@unicusolympiads.com" target="_blank">info@unicusolympiads.com</a> to your primary inbox, else you may miss important updates on Online Summer Olympiad Exams.</p>
<p>&nbsp;</p>

<p style="font-family:Arial, Helvetica, sans-serif;">Regards,</p>
<p style="font-family:Arial, Helvetica, sans-serif;"><?php echo $this->config->item('site_name'); ?></p>
   