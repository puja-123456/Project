<!DOCTYPE html>
<html>
<body>
<div>
    <p>&nbsp;</p>
    <p> Dear <?php echo ucfirst($your_name); ?>, </p>
    <p> Your name was provided by <?php echo ucwords($refered_by_name); ?>. We understand that you are appearing for an Olympiad exam soon. We are happy to provide 40% off on our subscription. For this, you may use <strong>RF40</strong> as coupon code. Do visit us at <a href="<?php echo $register_url; ?>">Olympiad Success</a>. </p>
    <p>&nbsp;</p>
    <p>Olympiad Success is an online platform to prepare for various Olympiad exams. Our platform, consisting of more than 2, 00,000 questions, provides extensive practice to students to handle difficult and tricky questions that come in various Olympiads. Moreover, you receive continuous feedback of your performance.</p>
    <p>&nbsp;</p>
    <p>Olympiad Success Advantages</p>
    <p>
    <ul>
        <li>We have large library of questions and believe in continuous practice. The question papers are administered in a disciplined manner.</li>
        <li>We provide continuous report on student's progress and identify improvement area.</li>
        <li>Class & subject wise online test series with progressive difficulty level.</li>
        <li>We guide the students to perfection by identifying weak areas and customize the questions to improve on those areas.</li>
        <li>Encourage student to review and retest.</li>
    </ul>
    </p>
    <p>&nbsp;</p>
    <p>We would be happy to assist you. Just call us at 92055-70955 or mail us at <a href="mailTo:support@olympiadsuccess.com">support@olympiadsuccess.com</a>. You may register at <a href="<?php echo $register_url; ?>">Olympiad Success</a>.</p>
    
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>Regards,<br>
    <?php echo $this->config->item('site_name') . ' team'; ?></p>  
    </div>

</div>
</body>
</html>