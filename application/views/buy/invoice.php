<?php 
if($this_user->country != 'India'){
	$curr = "INR";
}else{
	$curr = "INR";
}
?>
<script type="text/javascript"></script>
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/contact_us.css"> -->
<p>&nbsp;</p>
<div class="container">
	<div class="row text-center">
			<!-- <div class="right"><a id="pay-btn" href="javascript:void(0);" class="right btn btn-large waves-effect waves-light ">Pay Now: <?php echo $curr." ".$this->session->userdata('amount'); ?></a></div> -->
		<!-- <h1>Invoice</h1> -->
		<!-- <h2></h2> -->
		<div class="card-panel red darken-4 white-text">
			<p class="flow-test">We thank you for submitting your name for Summer Olympiads. But, this is to inform you that we have stopped taking payments for new registrations. <br> Once we start accepting registrations for 2020, we will get in touch with you.</p>
		</div>
	</div>
	<div class="row contact">
		<div class="text-warning text-center col s12 m10 offset-m1">
			<!-- <h3>Here are the details submitted by you:</h3> -->
			<!-- <p class="right"><strong>Total Amount: <?php echo $curr." ".$this->session->userdata('amount'); ?></strong></p> -->
			<p>Student Name: <?=$this_user->username;?></p>
			<p>Email Id: <strong><?=$this_user->email;?></strong></p>
			<p>Class: <?=$this_user->class;?></p>
			<p>School: <?=$this_user->school;?></p>
			<p>Subjects:</p>
			<ul style="margin-left: 20px;">
				<?php
				$subjects = $this_user->prefered_subject;
				$subjects = explode(',', $subjects);
				// var_dump($subjects);
				$all_sub = $this->config->item('main_categories');
				foreach ($subjects as $this_cus_sub) {
					
					foreach ($all_sub as $subj ) {
					
						if($subj[1] == $this_cus_sub){
							echo "<li><strong>".$subj[2]."</strong></li>";
						}
					}
					reset($all_sub);
				}
				?>
			</ul>
			<!-- <p>Total Amount: Rs.<?php echo $this->session->userdata('amount'); ?></p> -->
			<br><br>
			<div class="card-panel teal darken-4 white-text">
				<p class="center"><strong>Please read the below instructions carefully</strong></p>
				<br>
				<ul>
				<li><i class="material-icons">keyboard_arrow_right</i><p>Unicus Olympiads will be conducted either online (for individual applicants and school registrations) or pen/paper (for school registrations only).</p></li>

				<li><i class="material-icons">keyboard_arrow_right</i><p>In case of online exams, the students will have to take the exams from their residence or any other place where they have access to computer with good Internet (2 Mbps or more) connectivity and latest version of the browser (preferably Google Chrome).</p></li>

				<li><i class="material-icons">keyboard_arrow_right</i><p>The online exam can't be taken using Mobile device.</p></li>

				<li><i class="material-icons">keyboard_arrow_right</i><p>The schools who have subscribed to these exams, may decide to conduct these exams using their computer lab. Hence, the student should have access to a good laptop/desktop with latest version of the browser (preferably Google Chrome) and 2 Mbps Internet connectivity.</p></li>

				<li><i class="material-icons">keyboard_arrow_right</i><p>As all the online exams will be proctored through a webcam, hence, it is compulsory to have webcam on your system.</p></li>

				<li><i class="material-icons">keyboard_arrow_right</i><p>Unicus Olympiads brings progressive thinking and hence, is quite different from traditional Olympiad exams. Click <a href="https://www.unicusolympiads.com/about" target="_blank">here</a> to know more.</p></li>

				<li><i class="material-icons">keyboard_arrow_right</i><p>We take preparation seriously. Hence, there would be one mock test, provided complimentary. The student can appear for this mock test 3 times. He/she can view the performance too on his/her dashboard.</p></li>

				<li><i class="material-icons">keyboard_arrow_right</i><p>The main exam will be based on the syllabus of the last 2 classes the student studied. This will be valid for classes 3-10 only. For classes 1 and 2, questions from their respective class' syllabus will come.</p></li>

				<li><i class="material-icons">keyboard_arrow_right</i><p>Visit the <a href="https://www.unicusolympiads.com/exam-dates" target="_blank">exam dates</a> page to know about the Summer Olympiad exam schedule.</p></li>

				<li><i class="material-icons">keyboard_arrow_right</i> <p>Please make payment only after reading the above statements. For any queries, do write to us at <a href="mailto:infor@unicusolympiads.com">info@unicusolympiads.com</a>.</p></li>
				</ul>
				<br>
				<!-- <p>
					<label>
						<input type="checkbox" class="filled-in black" id="accept_ins" name="accept_ins" checked="checked">
						<span class="white-text">I have read the above statements carefully and accept them.</span>
					</label>
				</p> -->
				<br> 
			</div>
			<br>
			<!-- <div class="right"><a id="pay-btn2" href="javascript:void(0);" class="right btn btn-large waves-effect waves-light ">Pay Now: <?php echo $curr." ".$this->session->userdata('amount'); ?></a></div> -->

		</div>
	</div>
</div>

<script type="text/javascript">
	$("#pay-btn").on("click",function(){
		if( $("input[name=accept_ins]:checked").length < 1 ){
			return false;
		}
        // window.location.href = "<?php echo base_url() ?>unicus/payment/ccavenue/";
	});
	$("#accept_ins").on("click",function(){
		if( $("input[name=accept_ins]:checked").length < 1 ){
			// $("#pay-btn").addClass("disable-click");
			$("#pay-btn").addClass("disabled");
		}else{
			$("#pay-btn").removeClass("disabled");
		}
	});
	$("#pay-btn2").on("click",function(){
		// $("#pay-btn").click();
	});
	$(".disable-click").click(function(e){
		e.preventDefault();
		return false;
	});

</script>
<style type="text/css">
.card-panel li p{
	padding-left: 25px;
}
.card-panel li i{
    transform: translateY(4px);
    float: left;
}
#pay-btn.disable-click{
	cursor: no-drop;
}
#pay-btn{
	cursor: pointer;
}
form input, form textarea, form button{
	margin: 3px 0px;
}
</style>