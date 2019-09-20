<div class="col-md-12 padd">
    <div class="bradcome-menu hide_on_phone">
<!--        <ul>
            <li><a href="<?php echo base_url(); ?>user">Home</a></li>
            <li><img  src="<?php echo base_url(); ?>assets/designs/images/arrow.png"></li>
            <li><a href="#"> Tests </a></li>
        </ul>-->
    </div>
</div>


<div class="row">

<?php
echo validation_errors();
if ($this->session->flashdata('message'))
    echo $this->session->flashdata('message');
?>
</div>
<br/>

<div class="row" bgcolor="#FFFFFF" ondragstart="return false" onselectstart="return false">
    <div class="col-md-12" style="overflow-x: auto;">
        <p>Thank you for participating in the Mock Test. The results will be declared on Monday and the answer key for the same will be available from Monday to Friday. If you would like to practice more, you may purchase Mock Test Series at 
            <a href="https://www.olympiadsuccess.com/buy" target="_blank">https://www.olympiadsuccess.com/buy</a></p>
        <p style="font-weight:bold">Process to Check Your Performance</p>
        <ul>
            <li>The answer key for this test will be available on Monday</li>
            <li>Login using same Google or Facebook id</li>
            <li>Once you login, click on ‘Performance’ on the left side. This provides a summary of the marks achieved. Click on ‘View’ under Detailed Result</li>
            <li style="color:#72080f">Important: Click on ‘Review’ button on the right to see the correct answers and explanations for every question</li>
        </ul>
    </div>
</div>