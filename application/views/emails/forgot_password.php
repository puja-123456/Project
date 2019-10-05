<!DOCTYPE html>
<html>
<body>
<div>
<p style="font-family: font-family:Arial, Helvetica, sans-serif;">Hello <?php echo $name; ?>,</p>
<p style="font-family:font-family:Arial, Helvetica, sans-serif;">We would be glad in assisting you to change your password.</p>
<p>&nbsp;</p>
<p style="font-family: Arial, Helvetica, sans-serif">Your Username: <?php echo $email; ?></p>
<p style="font-family: Arial, Helvetica, sans-serif">Your New Password: <?php echo $password; ?></p>
<p><strong>Points to be noted:</strong></p>

					<ul class="list">						
						<li style="list-style-type: disc !important;">
						Do not forget to change the machine generated password (given above) once you <a href="<?=base_url();?>login" target="_blank">Login here</a>
					</li> 
					<br>									
				    <li>
						You can find the <a href="<?php echo base_url(); ?>exam-dates" target="_blank">Summer Olympiad exam dates</a> here.
					</li>
					<br>
					<li>
						Please note that you upload the required documents before your exam. 
				    </li>
				    <br>
					<li>
						Visit <a href="<?php echo base_url(); ?>faqs" target="_blank">FAQs</a> section for more details.
					</li>
					<br>
				<li>
					Please remember to add <a href="mailto:info@unicusolympiads.com" target="_blank">info@unicusolympiads.com</a> to your primary inbox, else you may miss important updates on Online Summer Olympiad Exams.
				</li>
				</ul>
</div>
</body>
</html>