<p style="font-family: font-family:Arial, Helvetica, sans-serif;">Hello <?php echo $name; ?>,</p>
<p style="font-family:font-family:Arial, Helvetica, sans-serif;">Thank you for registering with CREST Olympiads. Here are the details submitted by you:</p>
<p>&nbsp;</p>
<p style="font-family:Arial, Helvetica, sans-serif;"><strong>Name:</strong>&nbsp;<span style="font-family:Arial, Helvetica, sans-serif;"><?php echo $name; ?></span></p> 
<p style="font-family:Arial, Helvetica, sans-serif;"><strong>Email:</strong>&nbsp;<span style="font-family:Arial, Helvetica, sans-serif;"><?php echo $email; ?></span></p> 
<p style="font-family:Arial, Helvetica, sans-serif;"><strong>Phone:</strong>&nbsp;<span style="font-family:Arial, Helvetica, sans-serif;"><?php echo $phone; ?></span></p> 
<p style="font-family:Arial, Helvetica, sans-serif;"><strong>Class:</strong>&nbsp;<span style="font-family:Arial, Helvetica, sans-serif;"><?php echo $class; ?></span></p>
<p style="font-family:Arial, Helvetica, sans-serif;"><strong>School:</strong>&nbsp;<span style="font-family:Arial, Helvetica, sans-serif;"><?php echo $school; ?></span></p> 
<p style="font-family:Arial, Helvetica, sans-serif;"><strong>Subjects:</strong>&nbsp;<span style="font-family:Arial, Helvetica, sans-serif;"><?php echo $subjects; ?></span></p> 

				<p><strong>Important Points:</strong></p>

				<ul class="list">

				<li style="list-style-type: disc !important;">
  				
  				You have not paid for the selected subjects yet. To make the payment please visit <a href="https://www.crestolympiads.com/" target="_blank">here</a> 
					</li>
				<br>
				

				<li>
  				
  				Please check <a href="https://www.crestolympiads.com/exam-schedule" target="_blank">exam schedule</a> here.
					</li>
				<br>
				<li>
					Please ensure that the required documents are uploaded otherwise Access card will not be issued.
			    </li>
			    <br>
				<li>
					Check <a href="https://www.crestolympiads.com/faqs" target="_blank">FAQs</a> for more details.
				</li>
				<br>
				<li>
					Please remember to add <a href="mailto:info@crestolympiads.com" target="_blank">info@crestolympiads.com</a> to your primary inbox, else you may miss important updates on Online Olympiad Exams.
				</li>
				</ul>

<p>&nbsp;</p>

<p style="font-family:Arial, Helvetica, sans-serif;">Feel free to reach us at <?php echo $this->config->item('support_phone'); ?></p>
<p>&nbsp;</p>

<p style="font-family:Arial, Helvetica, sans-serif;">Regards,</p>
<p style="font-family:Arial, Helvetica, sans-serif;"><?php echo $this->config->item('site_name'); ?></p>
   