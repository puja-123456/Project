<p style="font-family: font-family:Arial, Helvetica, sans-serif;">Hello <?php echo $name; ?>,</p>
<p style="font-family:font-family:Arial, Helvetica, sans-serif;">We have received your coordinator query. Here are the details submitted by you:</p>
<p>&nbsp;</p>
<p style="font-family:Arial, Helvetica, sans-serif;"><strong>Name:</strong>&nbsp;<span style="font-family:Arial, Helvetica, sans-serif;"><?php echo $name; ?></span></p> 
<p style="font-family:Arial, Helvetica, sans-serif;"><strong>Email:</strong>&nbsp;<span style="font-family:Arial, Helvetica, sans-serif;"><?php echo $email; ?></span></p> 
<p style="font-family:Arial, Helvetica, sans-serif;"><strong>Phone:</strong>&nbsp;<span style="font-family:Arial, Helvetica, sans-serif;"><?php echo $phone; ?></span></p> 

<p style="font-family:Arial, Helvetica, sans-serif;"><strong>Message:</strong>&nbsp;<span style="font-family:Arial, Helvetica, sans-serif;"><?php echo $message; ?></span></p> 

<p>&nbsp;</p>

<p style="font-family:Arial, Helvetica, sans-serif;">If you do not hear from us within 24 hours, Feel free to reach us at <?php echo $this->config->item('support_phone'); ?></p>
<p>&nbsp;</p>

<p style="font-family:Arial, Helvetica, sans-serif;">Regards,</p>
<p style="font-family:Arial, Helvetica, sans-serif;"><?php echo $this->config->item('site_name'); ?></p>
   