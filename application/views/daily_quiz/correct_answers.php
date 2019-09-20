<?php
$img_url = $this->config->item('image_src_url');
?>


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
.display_question{
	display: block;
    border: solid 1px #e3e3e3;
    padding: 10px 20px 0px;
    box-shadow: inset 0 0 30px rgba(000,000,000,0.1), inset 0 0 4px rgba(255,255,255,1);
    border-radius: 3px;
    margin: 10px 10px;
}
.display_question .quction img{
	margin: 10px;
}
.display_question .quction tr
{
color: #000;
}
.display_question .quction{
    background: #007fbe;
    color: #FFF;
    font-size: 22px;
    padding: 8px 30px;
    font-weight: 300;
    margin: 0 -30px 10px;
    position: relative;
}
.display_question .quction p{
	color:#fff;
}
.display_question table {
	margin-bottom: 15px;
}
.display_question table tr{
    padding: 6px;
    border-radius: 6px;
    border: solid 1px #dde7e8;
    font-weight: 400;
    font-size: 13px;
    font-family: Arial, sans-serif;
}
.display_question .quction:before, .display_question .quction:after {
    background: url(<?=$img_url . 'designs/images/blue-arrow-down-2.png';?>) no-repeat left 0;
    display: block;
    position: absolute;
    top: 100%;
    width: 9px;
    height: 7px;
    content: '.';
    left: 0;
    text-align: left;
    font-size: 0;
}
.display_question .quction:after {
    left: auto;
    right: 0;
    background-position: -10px 0;
}

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


@media screen and (max-width: 768px){
.quction img {
  width: 60%;
 } 

.answeers img
 {
  width: 60%;
 } 
}

.quction li 
{
    color:#000;
    font-family: "Lato",sans-serif;
    list-style-type:disc !important;
}

.quction span 
{
    color:#000 !important;
    /*font-size:0pt !important;
    font-family: "Lato",sans-serif !important;*/
}
</style>
<div class="hide_on_phone" style="height:20px"></div>
<div class="hide_on_desktop" style="height:0px"></div>
<!-- <div class="row">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url(); ?>">Home</a></li>
					<li><a href="<?php echo base_url(); ?>daily-quiz"> Daily Quiz</a></li>
					<li> <?php echo $this_subject_name;?> Answers</li>
				</ol>
			</div>
		</div>
	</div>
</div> -->

<div class="container">
	<div class="col-md-8 col-xs-12">
		<h1 class="inner-hed" style="padding:0px;font-size:18px;border-bottom-style: none;"> 
			Correct Answers for <?=$this_subject_name;?> Quiz on <?=date('d M, Y');?> for Class <?=$this_student_class;?> 
		</h1>
		<div class="row">

			<div class="col-md-12 col-sm-12 col-xs-12">
            <!-- <div class="col-md-12 padd"> -->

                <div id="divs">
                    <?php
                    $question_slno = 1;
                    if (count($question_array)) {
                        $totRowCount = 0;
                        $i = 0;

                        foreach ($question_array as $q) {
						    $i++;
	                        ?>
	                        <div id="<?php echo $q->questionid . "_" . $i; ?>" class="display_question" data-step="<?=$i?>">
	                            <div class="bradcome-menu qu-pa">
	                                <div class="col-md-6">
	                                	<span class="question"></span>
                                    </div>
                                </div>
                               <!--  <?php if(isset($q->question_type) && $q->question_type != '')
                                { ?>
                            	    <h4 class="quction">
	                                    <?php echo $q->question_type; ?>
	                                </h4>
	                                <?php 
	                            } ?> -->

                                <?php
                                if (isset($q->questionImage) && $q->questionImage != '') { 
                                    $question_image = '<img src="'.$img_url . 'uploads/' . $q->questionImage .'" ><br>'; ?>
                                    <h4 class="quction">
                                     <p>Question No. <?php echo $question_slno++; ?></p>
                                     <p><?php echo $q->question.'</p><br>'.$question_image ; ?>
                                   <!--  <p style="font-size:14px"><?php //echo $q->questionid; ?></p> -->
                                    </h4>
                                    <?php 	
                                } else {     
                                	?>

                                	 <?php 
                                     //if($this_subject_name=="Mathematics")
                                	// {

                                	// 	 $style="<style>
                                	// 	 .quction {
                                	// 	 	background-color: #e91e6333 !important;
                                	// 	 }
                                	// 	 .quction p {
                                	// 	 	color:#000 !important;
                                	// 	 }
                                	// 	 </style>
                                	// 	 	";

                                	// }
                                	// else if($this_subject_name=="Science")

                                	// {
                                		 

                                	// 	 $style="<style>
                                	// 	 .quction {
                                	// 	 	background-color: #00bcd433 !important;
                                	// 	 }
                                	// 	 .quction p {
                                	// 	 	color:#000 !important;
                                	// 	 }
                                	// 	 </style>
                                	// 	 	";

                                	// }

                                	// else if($this_subject_name=="English")

                                	// {
                                		

                                	// 	 $style="<style>
                                	// 	 .quction {
                                	// 	 	background-color: #cddc3933 !important;
                                	// 	 }
                                	// 	 .quction p {
                                	// 	 	color:#000 !important;
                                	// 	 }
                                	// 	 </style>
                                	// 	 	";

                                	// }

                                	// else if($this_subject_name=="Cyber")

                                	// {
                                		

                                	// 	 $style="<style>
                                	// 	 .quction {
                                	// 	 	background-color: #673ab733 !important;
                                	// 	 }
                                	// 	 .quction p {
                                	// 	 	color:#000 !important;
                                	// 	 }
                                	// 	 </style>
                                	// 	 	";

                                	// }

                                	// else if($this_subject_name=="French")

                                	// {
                                		 

                                	// 	 $style="<style>
                                	// 	 .quction {
                                	// 	 	background-color: #ffc10733 !important;
                                	// 	 }
                                	// 	 .quction p {
                                	// 	 	color:#000 !important;
                                	// 	 }
                                	// 	 </style>
                                	// 	 	";

                                	// }

                                	// else
                                	// {

                                	// }

                                    $style="<style>
    
                                       .quction {
                                          background-color: #fff! important;
                                          border: 3px solid #ccc;
                                      }
                                      .quction p {
                                          color:#000 !important;
                                       }
                                       </style>
                                          ";
                                	?>

                                	<?php echo $style; ?>
                                    <h5 class="quction">
                                    	<p>Question No. <?php echo $question_slno++; ?></p>
                                    	
                                    	<?php if(isset($q->question_type) && $q->question_type != '')
		                                { 
		                            	  
			                                    echo "<p>".$q->question_type."</p>";			                                
			                                
			                            } ?>
			                           
			                             <p><?php echo htmlText($q->question); ?> </p>

                                         <!-- <p style="font-size:14px"><?php //echo $q->questionid; ?></p> -->
                                    </h5>
                                    <?php 
                                } ?>

                                <table border="0" class="table answeers">
                                    <tr>
                                    	<td width="30%">Your Answer</td>
	                                    <td><?php echo htmlText($q->y_ans); ?></td>
                                    </tr>
                                    <tr>
                                    	<td>Correct Answer <br/>
                                        (There may be multiple correct answers)
                                        </td>
	                                    <td><?php if(!empty($q->c_img))
	                                    {
	                                     echo '<img src="'.$img_url . 'uploads/' . $q->c_img .'" ><br>';;
	                                    }
	                                    ?>
	                                    <?php echo htmlText($q->c_ans); ?></td>
                                    </tr>

                                     <tr>
                                          <!--   <td> -->
                                                <textarea id="<?php echo $q->questionid; ?>_comment" name="<?php echo $q->questionid; ?>_comment" style="display:none;height:auto;" rows="5" cols="40" placeholder="Every improvement counts even if it's small. Do provide specific details."></textarea>
                                                <input id="<?php echo $q->questionid; ?>_flag_button" style="display:none; float:left; margin:8px; " type="button" class="btn bg-primary down-bt finished" value="Submit" name="" onclick="return sendFlagMail('<?php echo $q->questionid; ?>')"> 
                                           <!--  </td> -->
                                    </tr>

                                     <!-- <input type="button" class="btn bg-primary down-bt" title="" value="Suggest Changes" style="float:right; height: 36px; margin:8px; color:white" onclick="viewFlagBox('<?php echo $q->questionid; ?>')">-->

                                     <a href="javascript:void(0);" id="flag" style="margin: 10px;border: 1px solid #dadce0;border-radius: 4px;color: #1967d2;font-family: 'Google Sans',Roboto,sans-serif;font-size: 14px;font-weight: 500;padding: 7px 15px;float:right; height: 36px; margin:8px;" title="Suggest Changes" onclick="viewFlagBox('<?php echo $q->questionid; ?>')"><b>Suggest changes</b></a>
 
            					</table>
    						</div>
				            <?php
				        }
				    }
				    ?>
				</div>
				<div>
					<!-- <a href="<?=base_url().'daily-quiz';?>"> &lt;&lt; Test Again with a diffrent set of questions.</a> -->
                    Test again with a different set of questions. <a href="https://www.crestolympiads.com/daily-quiz/start"><button class="btn btn-secondary">Take Test Again</button></a>
				</div>
			</div>
		</div>
	</div>

	<?php
	 //echo $this->load->view('daily_quiz/quick_links'); ?>
	
</div>

<!-- <div class="hide_on_phone" style="height:45px"></div> -->

<script type="text/javascript">
	function get_subjects(){
		var class1 = 1;
		var html = '';
		$.ajax({
			type:'post',
			data:{class:class1,'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'},
			url:'<?php echo base_url();?>daily_quiz/get_questions',
			async:false,
			success:function(data){
				questions = JSON.parse(data);
				// console.log( typeof questions[0].question );
				$(questions).each( function(){
					// console.log("HI");
					html += '<p>';
					html += this.question;
					html += '</p>';
					$("#").append(html);
					console.log(this.question);
				});
				return  true;
			}
		});
	}
	if($(window).width()<768){
		
		$(".hide_on_desktop").show();
        $(".hide_on_phone").hide();
	};
	if($(window).width()>768){
        $(".hide_on_phone").show();
		$(".hide_on_desktop").hide();
        
	};
	$().ready(function(){
		$(".top-actions").hide();
		$(".right-actions").children("span").addClass("disabled");
		$(".right-actions").children("span").children(".finished-text").text("Finish");
		$(".display_question.step-pane.active").children('input').each(function(){
			$(this).on("keyup", function(e){
				var input = $(this).val();
				if(input.length > 0){
					$(".right-actions").children("span").removeClass("disabled");
				}
				else{
					$(".right-actions").children("span").addClass("disabled");
				}
			});
		});

		$(".right-actions").children("span").on("click", function(){
			$(this).addClass("disabled");
			$(".display_question.step-pane.active").children('input').each(function(){
				$(this).on("keyup", function(e){
					var input = $(this).val();
					if(input.length > 0){
						$(".right-actions").children("span").removeClass("disabled");
					}
					else{
						$(".right-actions").children("span").addClass("disabled");
					}
				});
			});
		});

		// $(".display_question input").on("")
		$(".finished-text").click(function(){
			$("#finish").trigger("click");
		});
		$("a.takeafreetrialnow").click(function(){
			<?php echo "var free_trial_course = '".$sample_paper['course_slug']."'"; ?>;
			<?php echo "var free_trial_subject = '".$sample_paper['subject_slug']."'"; ?>;
			<?php echo "var free_trial_class = '".$sample_paper['class']."'"; ?>;
			setCookieForFreeTrial(free_trial_course,free_trial_subject,free_trial_class);
			return trackEvent('login','sample-papers',free_trial_class);
		});
	});
</script>

<script type="text/javascript">
    $(function () {
        $(document).keydown(function (e) {
            return (e.which || e.keyCode) != 116;
        });
         $(document).keydown(function (e) {
            return (e.which || e.keyCode) != 13;
        });

         $(document).keydown(function (e) {
            return (e.which || e.keyCode) != 65;
        });

          $(document).keydown(function (e) {
            return (e.which || e.keyCode) != 82;
        });


    });

    $(document).bind("contextmenu",function(e){
    return false;
});
</script>

<script type="text/javascript">
    function viewFlagBox(intQuestionId) {
        $("#"+  intQuestionId +"_comment").toggle();
        $("#"+ intQuestionId + "_flag_button").toggle();
        
        //markQuestionFlag(intQuestionId);
    }
    
//     function markQuestionFlag(intQuestionId) {
//          //Ajax
//         $.ajax({
//             type: 'POST',
//             dataType : 'json',
//             url: '<?php echo base_url('daily_quiz/markQuestionFlag'); ?>',
//             data: 'intQuestionId=' + intQuestionId + '&<?php echo $this->security->get_csrf_token_name();?>=<?php echo $this->security->get_csrf_hash();?>',
//             cache: false,
//             success: function (data) {
                    
//             }
//         });
// }
    
    
    function sendFlagMail(intQuestionId) {
    
        var description = $("#" + intQuestionId + "_comment").val();
        
        // if(description == '' ) {
        //     alert('Please enter description');
        //     return false;
        // }
         //Ajax
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('daily_quiz/sendFlagMail'); ?>',
            dataType : 'json',
            data: 'intQuestionId=' + intQuestionId + '&description=' + description + '&<?php echo $this->security->get_csrf_token_name();?>=<?php echo $this->security->get_csrf_hash();?>',
            //data: { intQuestionId :  intQuestionId , description :  description },
            cache: false,
            success: function (data) {
            alert('Dear student, thank you for your valuable comment on this question. Our team will look into it and take necessary action.');
                    // alert('Thanks for your feedback.');
                    $("#"+intQuestionId+"_comment").hide();
                    $("#" + intQuestionId+ "_flag_button").hide();
            }
        });
    }
</script>
</script>