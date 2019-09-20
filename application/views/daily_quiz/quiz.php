
<style type="text/css">
.mar-20 a, .mar-20 a:focus{
	text-decoration: none;
	color:#000;
}
.mar-20 a:hover{
	font-weight: bold;
}
.fixediconstop{
	position: fixed;
	right: 0px;
	top:20%;
}
.fixediconstop li{margin-bottom: 3px; background: #1a2432; color: #fff; width: 50px; overflow: hidden;}
.fixediconstop li img{
	height: 50px;
}
.fixediconstop li span{
}
.container .mar-20 .courses-btn{
	text-transform: none;
}
.green-bg, .red-bg, .yellow-bg{
	color: #fff;
}
.green-bg:hover, .red-bg:hover, .yellow-bg:hover{
	color: #fff;
	background: #960a00;
}
.yellow-bg{
	background: #cc8d2d;
}
.red-bg{
	background: #c73b0b;
}
.green-bg{
	background: #978e43;
}
.mar-20 a:first-child{
	margin-right: 10px;
}
.hover-bg{
	background: #adefc4 !important;
}
.disable_click{
	pointer-events:none;
}
.question .ans{
	cursor: pointer;
}
.question_no_table td:hover, .question_no_table td.active {
	background-color:#844141 !important;
}
.question_no_table td:hover a, .question_no_table td.active a{
	color:#fff; 
}
.subject-list a{
    padding: 10px 20px;
    border: 1px dashed #ffffff;
    text-align: center;
    background: #cc7c32;
    margin: 10px;
    color: #fff;
    border-radius: 4px;
    transition: 0.4s all ease;
}
.subject-list a:hover{
	border: 1px solid #fff;
    color: #fff;
    text-decoration: none;
}

.search{
padding: 10px 20px;
    border: 1px dashed #ffffff;
    text-align: center;
    background: #cc7c32;
    margin: 10px;
    color: #fff;
    border-radius: 4px;
    transition: 0.4s all ease;
}

 @media only screen and (min-width: 768px){
#quiz_form
{
	width:50%;
}
}

/*.breadcrumb>li {
    display: inline-block;
}*/
ul.breadcrumb {
  padding: 10px 16px;
  list-style: none;
  background-color: #eee;
}
ul.breadcrumb li {
  display: inline;
  font-size: 18px;
  color:#000;
}
ul.breadcrumb li+li:before {
  padding: 8px;
  color: #000;
  content: "/\00a0";
}
ul.breadcrumb li a {
  color: #0275d8;
  text-decoration: none;
}
ul.breadcrumb li a:hover {
  color: #01447e;
  text-decoration: underline;
}
</style>
<div class="hide_on_phone" style="height:115px"></div>
<!-- <div class="row">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<ol class="breadcrumb inner-breadcrumb">
					<ul class="breadcrumb">
					<li><a href="<?php echo base_url(); ?>">Home</a></li>
					<li>Daily Quiz</li>
				</ol>
			</div>
		</div>
	</div>
</div> -->

<div class="container">
	<div class="col-md-8 col-xs-12">
		<h5> Select the class & subject, and check how many questions you can answer correctly. You may take the test as many times as you want.</h5>
		<br/><br/>

		<form name="quiz_form" id="quiz_form" method="post" action="<?php echo base_url().'daily-quiz/start/'; ?>">
		<select name="class" id="classname" required>
		<option value="">Select Class</option>
		<option value="1">Class 1</option>
		<option value="2">Class 2</option>
		<option value="3">Class 3</option>
		<option value="4">Class 4</option>
		<option value="5">Class 5</option>
		<option value="6">Class 6</option>
		<option value="7">Class 7</option>
		<option value="8">Class 8</option>
		<option value="9">Class 9</option>
		<option value="10">Class 10</option>
		</select>
		<span id="classname_error" style="color:#FF0000;display:none">Please select class</span>
		<p>&nbsp;</p>

		<select name="subject" id="subjectname" required>
		<option value="">Select Subject</option>
		<option value="M">Maths</option>
		<option value="S">Science</option>
		<!-- <option value="E">English</option> -->
		<option value="C">Cyber</option>
		<!-- <option value="F">French</option>	 -->
		</select>
		<span id="subjectname_error" style="color:#FF0000;display:none">Please select subject</span>
		<p>&nbsp;</p>

		<div class="input-field col s12 m4">
			<input type="submit" name="search" class="btn btn-secondary" id="search" value="Start">
							
						</div>

		
		</form>

		<p>&nbsp;</p>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<ul class="list-unstyled">
					<div class="subject-list">
						<?php 
						$tsc = substr($this_student_class, -1);
							foreach ($available_subjects as $subj) {

								if($subj == 'No'){
									echo "<p><strong>No questions are available for this subject right now!</strong></p>";
								}
								// else{
								// 	echo '<a href="'.base_url().'daily-quiz/start/'.substr($subj, 0,1).'">'.$subj.'</a>';
								// }

							}
						 ?>
					</div>
				</ul>
			</div>
		</div>
		<p>&nbsp;</p>
		
	<!-- 	<div class="row">
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<ins class="adsbygoogle"
			style="display:block; text-align:center;"
			data-ad-layout="in-article"
			data-ad-format="auto"
			data-ad-client="ca-pub-2802646301126373"
			data-ad-slot="8710997337"></ins>
			<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
		</div> -->


	</div>

	<?php //echo $this->load->view('daily_quiz/quick_links'); ?>
	
</div>

<div class="hide_on_phone" style="height:45px"></div>
<?php //$this->load->view('daily_quiz/explore'); ?>
<script type="text/javascript">
	
	$().ready(function(){
		if($(window).width()<768){
			$(".hide_on_phone").hide();
			$(".hide_on_desktop").show();
		};
		if($(window).width()>768){
			$(".hide_on_desktop").hide();
		};

		$("a.takeafreetrialnow").click(function(){
			<?php echo "var free_trial_course = '".$sample_paper['course_slug']."'"; ?>;
			<?php echo "var free_trial_subject = '".$sample_paper['subject_slug']."'"; ?>;
			<?php echo "var free_trial_class = '".$sample_paper['class']."'"; ?>;
			setCookieForFreeTrial(free_trial_course,free_trial_subject,free_trial_class);
			return trackEvent('login','sample-papers',free_trial_class);
		});
	});
</script>


<script>
	$().ready(function(){

		$("#classname_error").hide();
		$("#subjectname_error").hide();
	
	$('#search').click(function(){ 
    var classname=$("#classname").val();
    var subjectname=$("#subjectname").val();

    if(classname=="" && subjectname=="")
    {
    	$("#classname_error").show();
		$("#subjectname_error").show();
    }
    else if (classname=="") {

    	$("#classname_error").show();
		$("#subjectname_error").hide();
    }
     else if (subjectname=="") {

     	$("#subjectname_error").show();
     	$("#classname_error").hide();
		

     }
     else
     {

     }

});

	$('#classname').change(function(){ 
    var classname=$("#classname").val();
   

    if(classname=="")
    {
    	$("#classname_error").show();
		
    }
    else
     {

    	$("#classname_error").hide();
		
    }
});

	$('#subjectname').change(function(){ 
   
    var subjectname=$("#subjectname").val();

    if(subjectname=="")
    {
    	
		$("#subjectname_error").show();
    }
    else
     {

    
		$("#subjectname_error").hide();
    }
});
    
    



});

</script>
