<?php
$img_url = $this->config->item('image_src_url');
?>
<script  src="<?php echo base_url();?>assets/js/jquery.wizard.js"></script>
<!-- <script async src="<?php echo base_url();?>assets/js/mathquill.min.js"></script>
<script async src="<?php echo base_url();?>assets/js/matheditor.js"></script> -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery.wizard.css">
<!-- <link rel="stylesheet" href="<?php echo base_url();?>assets/css/mathquill.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/matheditor.css"> -->
<!-- <script src="https://cdn.ckeditor.com/4.11.1/standard-all/ckeditor.js"></script> -->


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
.hidden
{
	display:none;
}

.wizard ul.steps > li .step-text {
	padding-right: 15px;
}

.quction 
{
    font-size: 20px;    
}

.quction td
{
    font-size: 14px;
    font-weight: bold;
}

@media screen and (max-width: 768px){
.quction img {
  width: 60%;
 } 
}

.wizard tr
{
	border-bottom: none;
}
</style>
<div class="hide_on_phone" style="height:70px"></div>
<div class="hide_on_desktop" style="height:10px"></div>
<!-- <div class="row">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url(); ?>">Home</a></li>
					<li><a href="<?php echo base_url(); ?>daily-quiz"> Daily Quiz</a></li>
					<li><?php echo $this_subject_name;?></li>
				</ol>
			</div>
		</div>
	</div>
</div> -->
<body>
<div class="container" style="margin-top:5%;">
	<div class="col-md-8 col-xs-12">
		<!-- <h1 class="inner-hed" style="border-bottom-style: none;"> </h1> -->
		<div class="row">

			<?php
			// var_dump($questions);
	            $attributes = array('class' => 'email', 'id' => 'myform', 'name' => 'myform');
	            echo form_open_multipart("daily_quiz/submit", $attributes); 
				// echo form_open('daily_quiz/submit');
				?>
        	<input type="hidden" name="worksheet_id" id="worksheet_id" value="<?=$questions[0]->worksheet_id;?>">
        	<input type="hidden" name="student_class" id="student_class" value="<?=$this_student_class;?>">
			<div class="col-md-12 col-sm-12 col-xs-12">
            <!-- <div class="col-md-12 padd"> -->
    			<div data-wizard-init>
				  <ul class="steps">
				  	<?php
				  	for ($i=0; $i < 10; $i++) { 
				  		?>
						<li data-step="<?=$i+1;?>">Q <?=$i+1;?></li>
				  		<?php
				  	}
				  	?>
				  </ul>
	                <div id="divs" class="steps-content">
	                    <?php
	                    $question_slno = 1;
	                    if (count($questions)) {
	                        $totRowCount = 0;
	                        $i = 0;

	                        foreach ($questions as $q) {
						    $i++;
	                        ?>
	                        
	                        <div id="<?php echo $q->questionid . "_" . $i; ?>" class="display_question" data-step="<?=$i?>">
	                            
	                                <?php if(isset($q->question_type))
	                                { ?>
	                            	    <h5 class="quction">
		                                    <?php echo $q->question_type; ?>
		                                </h5>
		                                <!-- <br /> -->
		                                <?php 
		                            } ?>

	                                <?php
	                                if (isset($q->questionImage) && $q->questionImage != '') { 
	                                    $question_image = '<img src="'.$img_url . 'uploads/' . $q->questionImage .'" ><br>'; ?>
	                                    <h5 class="quction"><?php echo $q->question.'<br>'.$question_image ; ?></h5>
	                                    <?php 	
	                                } else { 
	                                	?>
	                                    <h5 class="quction"><?php echo htmlText($q->question); ?></h5>
	                                    <?php 
	                                } ?>
		                                <!-- <br /> -->

	                                <table width="100%" border="0" class="answeers">
	                                	<input type="hidden" name="counter" value="<?php echo $q->attempt_counter; ?>">
	                                 <!-- <input placeholder="Enter your answer here" type="text" name="<?php echo $q->questionid; ?>" id="<?php echo $q->questionid; ?>_ans"  >-->

	                                 <div id="answer<?php echo $i; ?>"></div>
                     
	                                <p>Use symbols given below if required:<br/>

	                                <button type="button" id="set_deg<?php echo $i; ?>">°</button>&nbsp;
									<button type="button" id="set_mew<?php echo $i; ?>">μ</button>&nbsp;
									<button type="button" id="set_root<?php echo $i; ?>">√</button>&nbsp;
									<button type="button" id="set_ohm<?php echo $i; ?>">Ω</button>&nbsp;
									<button type="button" id="set_pi<?php echo $i; ?>">π</button>&nbsp;
									<button type="button" id="set_theta<?php echo $i; ?>">θ</button>&nbsp;
									<button type="button" id="set_angle<?php echo $i; ?>">∠</button>&nbsp;
								</p>
									
									<!-- <button type="button" id="set_sup<?php echo $i; ?>">x<sup>n</sup></button>&nbsp;
									<button type="button" id="set_sub<?php echo $i; ?>">x<sub>n</sub></button> -->



	                                  <input placeholder="Enter your answer here" type="text" name="<?php echo $q->questionid; ?>" id="ans<?php echo $i; ?>">

	                                   <!--  <textarea name="<?php echo $q->questionid; ?>" id="ans<?php echo $i; ?>" >
	                                    Enter your answer here</textarea> -->

	                                    <tr>
                                                                        <td colspan="2">
                                                                            <textarea id="<?php echo $q->questionid; ?>_comment" name="comment" style="display:none;height:auto;" placeholder="Every improvement counts even if it's small. Do provide specific details." rows="5" cols="40"></textarea>
                                                                            <input id="<?php echo $q->questionid; ?>_flag_button" style="display:none;" type="button" class="btn bg-primary down-bt finished" value="Submit" name="" onclick="return sendFlagMail('<?php echo $q->questionid; ?>')"> 
                                                                        </td>
                                                                    </tr>



	                                


	                                    
	                                    

	                                   <!--  <textarea cols="10"  name="<?php echo $q->questionid; ?>" id="answer<?php echo $i; ?>" rows="10">Enter your answer here</textarea> -->
                                    
	            					</table>
	    						</div>
					            <?php
					        }
					    }
					    ?>

					    <a href="javascript:void(0);" id="flag" style="margin: 10px;border: 1px solid #dadce0;border-radius: 4px;color: #1967d2;font-family: 'Google Sans',Roboto,sans-serif;font-size: 14px;font-weight: 500;padding: 12px 15px; float:right" title="Suggest Changes"><b>Suggest changes</b></a>
					</div>
					<!-- <div id="submit" class="btn bg-primary down-bt" style="" title="Submit">Submit Test</div> -->
				</div>
				<!-- <script type="text/javascript" src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script> -->

				 
			

				    <div class="col-md-4 hidden">
				        <input type="submit" value="Finish" name="Finish" id="finish" />
				        
				    </div>
				<?php
					echo form_close();
				?>
			</div>
		</div>

	</div>

	<?php
	 // echo $this->load->view('general/quick_links'); ?>
	
</div>

<!-- <div class="hide_on_phone" style="height:45px"></div> -->

<script>
						  $(function(){

						  	var getNumericPart = function(id) {
						    var $num = id.replace(/[^\d]+/, '');
						    return $num;
							}

							var getStringPart = function(id) {
						    //var $str = id.replace(/[^\d]+/, '');
						    
						    var $str = id.replace(/\d+/g, '');
						    return $str;
							}

						  	$(document).on("click","button",function(){
						    var id = this.id;
						    var number=getNumericPart(id);
						    var buttontext = $(this).text();

						    var string=getStringPart(id);
						   

						   if(buttontext=="°")
						   {

						     $('#ans'+number).val(function()
						      {
						       return this.value + "°";
							  });
						 }

						    if(buttontext=="μ")
						   {

						      $('#ans'+number).val(function()
						      {
						       return this.value + "μ";
							  });

						  }

						  if(buttontext=="Ω")
						   {

							  $('#ans'+number).val(function()
						      {
						       return this.value + "Ω";
							  });

							}


							if(buttontext=="√")
						   {

							  $('#ans'+number).val(function()
						      {
						       return this.value + "√";
							  });


							}

							if(buttontext=="π")
						   {


							  $('#ans'+number).val(function()
						      {
						       return this.value + "π";
							  });

							}

							if(buttontext=="θ")
						   {

							  $('#ans'+number).val(function()
						      {
						       return this.value + "θ";
							  });

							}
							if(buttontext=="∠")
						   {

							  $('#ans'+number).val(function()
						      {
						       return this.value + "∠";
							  });

							}
								

						  	});
						
						});
					</script>



<script type="text/javascript">
    $(function () {
        // $(document).keydown(function (e) {
        //     return (e.which || e.keyCode) != 116;
        // });
        //  $(document).keydown(function (e) {
        //     return (e.which || e.keyCode) != 13;
        // });
        //   $(document).keydown(function (e) {
        //     return (e.which || e.keyCode) != 82;
        // });


    });

    $(document).bind("contextmenu",function(e){
    return false;
});
</script>


</body>

<script type="text/javascript">
	
	$().ready(function(){
		if($(window).width()<768){
		$(".hide_on_phone").hide();
		$(".hide_on_desktop").show();
	};
	if($(window).width()>768){
		$(".hide_on_desktop").hide();
        $(".hide_on_phone").show();
	};

		$("#submit").click(function(){
			$("#finish").trigger("click");
		});

		$(".finished-text").click(function(){
			if(confirm("Are you sure you want to submit the test?")){
        $("#finish").trigger("click");
	    }
	    else{
	        return false;
	    }
		});
		$(".top-actions").hide();
		$(".right-actions").children("span").children(".next-text").addClass("disabled");
		$(".right-actions").children("span").children(".next-text").children(".finished-text").text("Finish");
		$(".display_question.step-pane.active").children('input').each(function(){
			$(this).on("keyup", function(e){
				var input = $(this).val();
				if(input.length > 0){
					$(".right-actions").children("span").children(".next-text").removeClass("disabled");
				}
				else{
					$(".right-actions").children("span").children(".next-text").addClass("disabled");
				}
			});
		});

		$(".right-actions").children("span").children(".next-text").on("click", function(){
			$(this).addClass("disabled");
			$(".display_question.step-pane.active").children('input').each(function(){
				$(this).on("keyup", function(e){
					var input = $(this).val();
					if(input.length > 0){
						$(".right-actions").children("span").children(".next-text").removeClass("disabled");
					}
					else{
						$(".right-actions").children("span").children(".next-text").addClass("disabled");
					}
				});
			});
		});

	});
</script>
<script>

	$("#flag").click(function(){

    var numberPlateId = "#" + "number-" + $(".display_question:visible").attr('id');
    var start_pos = numberPlateId.indexOf("-");
    var end_pos = numberPlateId.indexOf("_");
    res = numberPlateId.substring(start_pos+1, end_pos);
    $("#"+res+"_comment").show();
    $("#" + res+ "_flag_button").show();
    //markQuestionFlag(res);
});

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
        data: 'intQuestionId=' + intQuestionId + '&description=' + encodeURIComponent(description) + '&<?php echo $this->security->get_csrf_token_name();?>=<?php echo $this->security->get_csrf_hash();?>',
        //data: { intQuestionId :  intQuestionId , description :  description },
        cache: false,
        success: function (data) {
            //alert('Thanks for your feedback.');
            alert('Dear student, thank you for your valuable comment on this question. Our team will look into it and take necessary action.');
            $("#"+intQuestionId+"_comment").hide();
            $("#" + intQuestionId+ "_flag_button").hide();
        }
    }); 
}
// function markQuestionFlag(intQuestionId) {
//     //Ajax
//     $.ajax({
//         type: 'POST',
//         dataType : 'json',
//         url: '<?php echo base_url('daily_quiz/markQuestionFlag'); ?>',
//         data: 'intQuestionId=' + intQuestionId + '&<?php echo $this->security->get_csrf_token_name();?>=<?php echo $this->security->get_csrf_hash();?>',
//         cache: false,
//         success: function (data) {
//         }
//     });
// }
</script>    

<script type="text/javascript">
  /*var myEditor1 = new MathEditor('answer1');
  var myEditor2 = new MathEditor('answer2');
  var myEditor3 = new MathEditor('answer3');
  var myEditor4 = new MathEditor('answer4');
  var myEditor5 = new MathEditor('answer5');
  var myEditor6 = new MathEditor('answer6');
  var myEditor7 = new MathEditor('answer7');
  var myEditor8 = new MathEditor('answer8');
  var myEditor9 = new MathEditor('answer9');
  var myEditor10 = new MathEditor('answer10');*/
  // me.removeButtons(['fraction']);
  // me.setTemplate('floating-toolbar');

 // myEditor.buttons = ["fraction","square_root","cube_root","root",'superscript','subscript','multiplication','division','plus_minus','pi','degree','not_equal','greater_equal','less_equal','greater_than','less_than','angle','parallel_to','perpendicular','triangle','parallelogram'];["fraction","square_root","cube_root","root",'superscript','subscript','multiplication','division','plus_minus','pi','degree','not_equal','greater_equal','less_equal','greater_than','less_than','angle','parallel_to','perpendicular','triangle','parallelogram'];

 // myEditor.setTemplate('keypad');

//var value=myEditor.getValue();



// $('#answer').bind("DOMSubtreeModified",function(){

// 	var input=$('#answer').text();
//   alert(input);
// });

// $("body").on('DOMSubtreeModified', "#answer1", function() {
//     var input1=$('#answer1').text();
//      $("#ans1").val(input1);
  	
// });
// $("body").on('DOMSubtreeModified', "#answer2", function() {
//     var input2=$('#answer2').text();
//      $("#ans2").val(input2);
  	
// });
// $("body").on('DOMSubtreeModified', "#answer3", function() {
//     var input3=$('#answer3').text();
//      $("#ans3").val(input3);
  	
// });
// $("body").on('DOMSubtreeModified', "#answer4", function() {
//     var input4=$('#answer4').text();
//      $("#ans4").val(input4);
  	
// });
// $("body").on('DOMSubtreeModified', "#answer5", function() {
//     var input5=$('#answer5').text();
//      $("#ans5").val(input5);
  	
// });
// $("body").on('DOMSubtreeModified', "#answer6", function() {
//     var input6=$('#answer6').text();
//      $("#ans6").val(input6);
  	
// });
// $("body").on('DOMSubtreeModified', "#answer7", function() {
//     var input7=$('#answer7').text();
//      $("#ans7").val(input7);
  	
// });
// $("body").on('DOMSubtreeModified', "#answer8", function() {
//     var input8=$('#answer8').text();
//      $("#ans8").val(input8);
  	
// });
// $("body").on('DOMSubtreeModified', "#answer9", function() {
//     var input9=$('#answer9').text();
//      $("#ans9").val(input9);
  	
// });
// $("body").on('DOMSubtreeModified', "#answer10", function() {
//     var input10=$('#answer10').text();
//      $("#ans10").val(input);
  	
// });

</script>

<script>

	// $('textarea[id^="answer"]').each(function(input){
 //    var value = $(this).val();
 //    var id = $(this).attr('id');
   // alert('id: ' + id + ' value:' + value);
//     CKEDITOR.replace('answer1', {
//       extraPlugins: 'mathjax',
//       mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
//       height: 200
//     });
    
//      CKEDITOR.replace('answer2', {
//       extraPlugins: 'mathjax',
//       mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
//       height: 200
//     });
   

//      CKEDITOR.replace('answer3', {
//       extraPlugins: 'mathjax',
//       mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
//       height: 200
//     });
   

//      CKEDITOR.replace('answer4', {
//       extraPlugins: 'mathjax',
//       mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
//       height: 200
//     });
    


//      CKEDITOR.replace('answer5', {
//       extraPlugins: 'mathjax',
//       mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
//       height: 200
//     });
    

//      CKEDITOR.replace('answer6', {
//       extraPlugins: 'mathjax',
//       mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
//       height: 200
//     });
    

//      CKEDITOR.replace('answer7', {
//       extraPlugins: 'mathjax',
//       mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
//       height: 200
//     });
//      CKEDITOR.replace('answer8', {
//       extraPlugins: 'mathjax',
//       mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
//       height: 200
//     });
    
//     CKEDITOR.replace('answer9', {
//       extraPlugins: 'mathjax',
//       mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
//       height: 200
//     });
    
//     CKEDITOR.replace('answer10', {
//       extraPlugins: 'mathjax',
//       mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
//       height: 200
//     });
    
    

// //});
    

//     if (CKEDITOR.env.ie && CKEDITOR.env.version == 8) {
//       document.getElementById('ie8-warning').className = 'tip alert';
//     }

  </script>

				<!-- <textarea name="editor1" id="editor1" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor.
            </textarea> -->
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                // CKEDITOR.replace( 'editor1' );
            </script> 

<style>
	
/*myEditor.styleMe({

  width: 500,

  height: 40,

  textarea_background: "#FFFFFF",

  textarea_foreground: "#000000",

  textarea_border: "#000000",

  toolbar_background: "#FFFFFF",

  toolbar_foreground: "#000000",

  toolbar_border: "#000000",

  button_background: "#FFFFFF",

  button_border: "#000000",

});
*/

</style>



