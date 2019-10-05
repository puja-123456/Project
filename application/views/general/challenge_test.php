<?php
$img_url = $this->config->item('image_src_url');

?>
  <!-- <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.js"></script> -->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/contact_us.css"> -->

<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">  -->
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0">

<script  src="<?php echo base_url();?>assets/js/custom.jquery.wizard.js"></script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>


<!-- <link href="<?php echo base_url(); ?>assets/css/jquery-confirm.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/js/jquery-confirm.min.js"></script> -->




<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery.wizard.css">

<script>
	/*$(document).on('keydown', function(e) {
    if(e.ctrlKey && (e.key == "p" || e.charCode == 16 || e.charCode == 112 || e.keyCode == 80) ){
        alert("Print option is disabled.");
        e.cancelBubble = true;
        e.preventDefault();

        e.stopImmediatePropagation();
    }  
});*/

     //DisableF5 key
        // document.onkeydown = function (e) {
        //     return (e.which || e.keyCode) != 116;
        // };

        //Disable Right click
        $(document).bind('contextmenu', function (e) {
            e.preventDefault();
        });

        $(document).keydown(function(e){
     var regex = new RegExp("^[a-zA-Z0-9 ]");
    var key = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (e.which == 0 || e.ctrlKey || e.metaKey || e.altKey && (regex.test(key))) {
     
        e.preventDefault();
      
    }
    
  });

//   $(document).on('keypress', '.comment', function (e) {
//     var regex = new RegExp("^[a-zA-Z0-9 ]");
//     var key = String.fromCharCode(!e.charCode ? e.which : e.charCode);
//     if (e.which !== 0 || !e.ctrlKey || !e.metaKey || !e.altKey && (!regex.test(key))) {
//         e.preventDefault();
      
//     }
// });


</script>

<?php if (count($question_array)) { 
?> 


<script>

	// $(document).ready(function() {

		//toggleFullScreen(document.body);

// });





// 	function toggleFullScreen(elem) {
//     // ## The below if statement seems to work better ## if ((document.fullScreenElement && document.fullScreenElement !== null) || (document.msfullscreenElement && document.msfullscreenElement !== null) || (!document.mozFullScreen && !document.webkitIsFullScreen)) {
//     if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
//         if (elem.requestFullScreen) {
//             elem.requestFullScreen();
//         } else if (elem.mozRequestFullScreen) {
//             elem.mozRequestFullScreen();
//         } else if (elem.webkitRequestFullScreen) {
//             elem.webkitRequestFullScreen();
//         } else if (elem.msRequestFullscreen) {
//             elem.msRequestFullscreen();
//         } 

//     } 
// }


/*$().ready(function(){    
    
    $(document.body).bind('webkitfullscreenchange mozfullscreenchange fullscreenchange', function(e) {
        e.preventDefault();
        var state = document.fullScreen || document.mozFullScreen || document.webkitIsFullScreen;
        var event = state ? 'FullscreenOn' : 'FullscreenOff';
        if(event == 'FullscreenOff'){
             $.confirm({
            title: 'Important!',
            //content: 'Are you sure you want to submit the quiz?',
            content: 'You are not allowed to go out of this window while viewing the answers',
            type: 'yellow',
            typeAnimated: true,
            buttons: {
                // ok: {
                //     text: 'Yes, I have reviewed all questions!',
                //     btnClass: 'btn-green',
                //     action: function(){
                //         saveExamResponse("OK");
                //         stopInterval();
                //         $("#finish").click();
                //     }
                // },
                cancel:{
                    //text: 'No, Let me check once again..',
                    text: 'OK',
                    btnClass: 'btn-red',
                    action: function(){
                       
                        toggleFullScreen(document.body);
                    }
                }
            }
        });
        }
    });*/
    // document.onkeydown = function (e) {

     
        // if(e.ctrlKey==true && e.which == '83')
        // {
        //      alert('Action not allowed');
        //         return false;
        // }
        // else if(e.ctrlKey==true && e.which == '67')
        // {
        //      alert('Action not allowed');
        //         return false;
        // }
        // else if(e.ctrlKey==true && e.which == '85')
        // {
        //      alert('Action not allowed');
        //         return false;
        // }
        // else if(e.ctrlKey==true && e.which == '16' && e.which == '73')
        // {
        //      alert('Action not allowed');
        //         return false;
        // }
        //  else if(e.which == '91')
        // {
        //      alert('Action not allowed');
        //         return false;
        // }
        // else if( e.which == '9' && e.which == '18')
        // {
        //      alert('Action not allowed');
        //         return false;
        // }
        // var state = document.fullScreen || document.mozFullScreen || document.webkitIsFullScreen;
        // var event = state ? 'FullscreenOn' : 'FullscreenOff';
        // if(event == 'FullscreenOff')
        //     // if ((e.which || e.keyCode) == 27)
        //     //dialog1();
        // toggleFullScreen(document.body);
        // return false;
    // };





/*
    jconfirm.defaults = {
        typeAnimated: true,
        animateFromElement: true,
        smoothContent: true,
        columnClass: 'col-md-6 col-md-offset-3 col-xs-12 ',
        containerFluid: true, 
        theme: 'modern'
    };

    $.confirm({
         title: 'Important!',
         content: "View answers (You may challenge if you find incorrect answers)",
         type: 'yellow',
         typeAnimated: true,
         buttons: {
            ok: {
                text: 'Ok',
                btnClass: 'btn-green',
                action: function(){
                    toggleFullScreen(document.body);
                    // var mins = 60;
                    // var sec = 60;

                    //intilizetimer();
                },
            }
        }
    });


});*/
</script>

<?php } ?>
<p>&nbsp;</p>


<style>
body  {
  overflow-y: scroll;
}

.mar-20 a, .mar-20 a:focus{
	text-decoration: none;
	color:#000;
}
.mar-20 a:hover{
	font-weight: bold;
}
.fixediconstop{
	display:none;
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
   /* background: #007fbe;*/
    color: #FFF;
    font-size: 22px;
    padding: 8px 30px;
    font-weight: 300;
    margin: 0 -30px 10px;
    position: relative;
}
.display_question .quction p{
	color:#000;
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
    background: url(<?=$img_url . 'images/blue-arrow-down-2.png';?>) no-repeat left 0;
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


/*#result
{
background:   url('<?php echo base_url();?>assets/images/result_bg.jpg') no-repeat center  ;
background-size: 800px 800px;
height:800px;



}*/

/* th {
	font-size:20px;
	color:#fff;
	text-align:center;
	padding: 35px;
	font-weight: 600;
	}

	tr
	{
		border-bottom: none;

	}

	td
	{
		font-size:18px;		
		font-weight: 600;
		padding-top:4%;
		padding-left:30%;
	}*/

.select-wrapper
{
/*width:25%;*/
}

::-webkit-input-placeholder {
   text-align: center;
}

:-moz-placeholder { /* Firefox 18- */
   text-align: center;  
}

::-moz-placeholder {  /* Firefox 19+ */
   text-align: center;  
}

:-ms-input-placeholder {  
   text-align: center; 
}

.brand-logo
{
    display:none !important;
}

.all-content
{
padding-bottom:10px;
}

#challengeModal .modal-body {
  
 /* background: url("<?php //echo base_url(); ?>assets/images/certificate_bg.jpg");*/
  background: none;
  height:350px;

}

ul.cases li
{
  list-style-type: disc !important;
}

.top-actions
{
  display:none !important;
}


.btn
{
  margin-bottom: 10px;
}

@media only screen 
    and (min-width : 601px) 
    and (max-width : 1199px)  { 

      .container
      {
        padding:10px;
      }


      }

</style>

 <div class="modal fade" id="challengeModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"style="text-align: center">Challenge Cases</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

          <!--   <div class="content"> -->

            <ul class="cases">

                <li><p> When the question is found to be incorrect or incomplete or none of the answers are correct, the question will be dropped and the marks allocated to that question will be awarded to all the students.</p></li>
                 <li><p> When the question is correct but the official answer key provided by <b>CREST</b> Olympiads is incorrect and the other option is correct, the correct answer will be changed and the score of all the students will be recalculated.</p> </li>
                  <li><p> When the question is correct and the official answer provided by <b>CREST</b> Olympiads is correct. However, there is another option which is correct too, the students' score, who marked the option correctly (which was initially marked as incorrect), will be updated.</p></li>



            </ul>

              
            


            <!--  </div> -->
          
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
<style>
<style>
#invid{
  margin-top: 65px;
}
#menu{
  margin-top: 40px;
}
@media screen and (min-width: 768px){
  #menu{
    max-height: 400px;
    overflow-y: scroll; 
    width: 16.666667% !important;
  }
  .fuild-container{
    margin-top:90px;
  }
  }
@media screen and (max-width: 768px){
  .fuild-container{
    margin-top:30px;
  }
[type="checkbox"]+span:not(.lever) {
  line-height: 17px;
}
#menu{
  margin-top:-30px; 
  position: relative !important;
}
.row .col.offset-s2 {
    margin-left: 0;
}
.row .col.offset-m3 {
     margin-left: 0;
}
}
</style>
</style>
<div class="fuild-container"> 
  <div class="row contact">
  <div class="col s12 m3 well"> 
	<?php if ($this->ion_auth->logged_in()){ $this->load->view('templates/leftmenu'); }?>
</div>
	 <div class="col s12 m9 offset-s2 text-center well row" style="min-height:447px;" id="invid">
		<h1>View and Challenge the answers</h1>
	

	<?php 

if(!empty($subjects))
{

echo "<p>You may view the questions and answers. In case, you would like to challenge any question/answer, you are required to pay Rs. 100 per question. The fee paid will be refunded if the challenge is found correct. However, no challenge will be entertained without receipt of the processing fee.<br>
    Check how we change/update the marks for all the correct/incorrect questions and answers <a href='' data-toggle='modal' data-target='#challengeModal'><b>here!</b></a></p>";
$i=1;

$j=0;
foreach ($subjects as $key => $value) {
	//foreach ($user_subjects as $key1 => $value1) {
if( substr($user_subjects[$j]->worksheet_id, 0, 1)=="L")
{
    $short_subject_name="CRO";
}
else if(substr($user_subjects[$j]->worksheet_id, 0, 1)=="M")
{
     $short_subject_name="CMO";
}
else if(substr($user_subjects[$j]->worksheet_id, 0, 1)=="S")
{
     $short_subject_name="CSO";
}
else if(substr($user_subjects[$j]->worksheet_id, 0, 1)=="E")
{
     $short_subject_name="CEO";
}
else if(substr($user_subjects[$j]->worksheet_id, 0, 1)=="C")
{
     $short_subject_name="CCO";
}
else if(substr($user_subjects[$j]->worksheet_id, 0, 1)=="F")
{
     $short_subject_name="CFO";
}
else
{

}


	
//if($user_subjects[$j]->short_subject_name==strtolower($value))
         if (in_array(strtolower($short_subject_name), $subjects))
{
	echo $i.": "."<a href='".base_url()."crest/challenge_test/".strtolower($value)."'>".strtoupper($value)." ".$quiz_subscription_info['exam_level']."</a> (Challenge Window: ".$quiz_subscription_info['from_challenge_date']." to ".$quiz_subscription_info['to_challenge_date'].")";
	echo "<br/>";
	$i++;
	$j++;
}
// }
}
echo "<p></p>";
}
else
{

	   if (count($question_array)) { 

// $currentURL = current_url();

//  if($currentURL=="view-source:http://localhost/crest-olympiads/crest/challenge_test/cmo"){ echo "die";die;}


?>
	<p>
					* Please note that Rs. 100 will be charged for every question which you challenge. If your challenge is accepted by our Academic Council, the amount will be reimbursed to you. For any queries, write to us at <a href="mailto:info@crestolympiads.com">info@crestolympiads.com</a>.
					Every question challenged should be supported by justification.
				</p><br/>
		<?php if ($this->session->flashdata('error_message')) { ?>
	<div class="text-warning text-center col s12" style="color:#DC143C"><span>
		<strong>
			<?php echo $this->session->flashdata('error_message'); ?>
		</strong>
	</span><br><br></div>
	<?php } ?>
	<!-- <div class="container"> -->
	<div class="col-md-8 col-xs-12">
		<!-- <h1 class="inner-hed" style="padding:0px;font-size:18px;border-bottom-style: none;"> 
			Correct Answers for <?=$this_subject_name;?> Quiz on <?=date('d M, Y');?> for Class <?=$this_student_class;?> 
		</h1> -->
		<div class="row">


			<div class="col-md-12 col-sm-12 col-xs-12">
            <!-- <div class="col-md-12 padd"> -->


            	<?php  echo form_open("crest/challenge_test/".$subject."",'class="form-horizontal" name="challenge_test" id="challenge_test"'); ?>

              <input type="hidden" name="action" value="" id="action">
              <input type="hidden" name="count" value="<?php echo count($question_array); ?>" id="count">

              <div data-wizard-init>
               
       
      
          <ul class="steps" style="padding:10px" id="desktop">
           <!--  <?php
           /* for ($i=0; $i < 100; $i++) { 

             

              if($i%10==0)
              {
                echo "<br>";
              }
              ?>
            <li data-step="<?=$i+1;?>">Q <?=$i+1;?></li>
              <?php
            }*/
            ?> -->



           <?php   $j=1; for ($i=0; $i < count($question_array); $i++) { 

             if($i%20==0)
              {
                echo "<br>";
              }

              

               $counter_id=$question_array[$i]->questionid."_".$j;
              


          ?>
         
            <a href="javascript:void(0)" data-step="<?=$i+1;?>" onclick="gotoq('<?php echo $counter_id; ?>')" class="btn go_to_ques go_to_question_<?php echo $i+1; ?>" <?php if($j<10){ echo "style='padding: 0 20px;'"; } ?>><?php echo $i+1; ?></a>
         
          <?php
          $j++;
        } ?>

          </ul>

          <ul class="steps" style="padding:10px" id="potrait">
           <!--  <?php
           /* for ($i=0; $i < 100; $i++) { 

             

              if($i%10==0)
              {
                echo "<br>";
              }
              ?>
            <li data-step="<?=$i+1;?>">Q <?=$i+1;?></li>
              <?php
            }*/
            ?> -->



           <?php  $j=1; for ($i=0; $i < count($question_array); $i++) { 

             if($i%12==0)
              {
                echo "<br>";
              }

              

               $counter_id=$question_array[$i]->questionid."_".$j;
              


          ?>
         
            <a href="javascript:void(0)" data-step="<?=$i+1;?>" onclick="gotoq('<?php echo $counter_id; ?>')" class="btn go_to_ques go_to_question_<?php echo $i+1; ?>" <?php if($j<10){ echo "style='padding: 0 20px;'"; } ?>><?php echo $i+1; ?></a>
         
          <?php
          $j++;
        } ?>

          </ul>


          <ul class="steps" style="padding:10px" id="landscape">
           <!--  <?php
           /* for ($i=0; $i < 100; $i++) { 

             

              if($i%10==0)
              {
                echo "<br>";
              }
              ?>
            <li data-step="<?=$i+1;?>">Q <?=$i+1;?></li>
              <?php
            }*/
            ?> -->



           <?php  $j=1; for ($i=0; $i < count($question_array); $i++) { 

             if($i%19==0)
              {
                echo "<br>";
              }

              

               $counter_id=$question_array[$i]->questionid."_".$j;
              


          ?>
         
            <a href="javascript:void(0)" data-step="<?=$i+1;?>" onclick="gotoq('<?php echo $counter_id; ?>')" class="btn go_to_ques go_to_question_<?php echo $i+1; ?>" <?php if($j<10){ echo "style='padding: 0 20px;'"; } ?>><?php echo $i+1; ?></a>
         
          <?php
          $j++;
        } ?>

          </ul>

          

      

                <div id="divs" class="steps-content">
                    <?php
                    $question_slno = 1;
                 
                        $totRowCount = 0;
                        $i = 0;

                        foreach ($question_array as $q) {
						    $i++;
	                        ?>

                          <div id="question_<?php echo $i; ?>">
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
                                    $question_image = '<img src="'.$img_url. $q->questionImage .'" ><br>'; ?>
                                    <h4 class="quction">
                                     <p>Question No. <?php echo $question_slno++; ?></p>
                                     <p><?php if(isset($q->question_type) && $q->question_type != '')
                                { ?>
                                  <!-- <h4 class="quction"> -->
                                      <?php echo $q->question_type; ?>
                                  <!-- </h4> -->
                                  <?php 
                              } ?></p>
                                     <p><?php echo $q->question.'</p><br>'.$question_image ; ?>
                                   <!--  <p style="font-size:14px"><?php //echo $q->questionid; ?></p> -->
                                     
                                    </h4>
                                     <span style="float:right;padding-right:10px"><?php echo $q->acheiverSection; ?></span>
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
                                     <span style="float:right;padding-right:10px"><?php echo $q->acheiverSection; ?></span>
                                    <?php 
                                } ?>



                                 

                                <table border="0" class="table answeers">
                                	 <?php  if (isset($q->answer1)) { 
                                            ?>
                                            <tr>
                                                <!-- <td style="width:10px" valign="top" align="left"><input type="radio" name="<?php echo $q->questionid; ?>" value="a"
                                                  id="" class="answer<?php echo $q->questionid; ?>"
                                                   <?php
                                            if(isset($q->y_ans) && $q->y_ans==='a') { echo 'checked'; } ?>></td> -->
                                                  <td style="padding-bottom: 5px;" valign="top" align="left">
                                                    <?php if(isset($q->answer1Image) && $q->answer1Image != ''){ echo "a : " ?><img src="<?php echo $img_url.$q->answer1Image ?>" ><br><?php } else {  echo "a : ".strip_tags($q->answer1); } ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <?php
                                            if (isset($q->answer2)) {
                                                ?>
                                                <tr>
                                                    <!-- <td style="width:10px" valign="top" align="left">  <input type="radio" name="<?php echo $q->questionid; ?>" value="b"
                                                       id="" class="answer<?php echo $q->questionid; ?>" <?php
                                                  if(isset($q->y_ans) && $q->y_ans==='b') { echo 'checked';} ?>></td> -->
                                                       <td style="padding-bottom: 5px;" valign="top" align="left">

                                                        <?php if(isset($q->answer2Image) && $q->answer2Image != ''){ echo "b : "  ?><img src="<?php echo $img_url.$q->answer2Image ?>" ><br><?php } else {  echo "b : ".strip_tags($q->answer2); } ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                                <?php
                                                if (isset($q->answer3)) {
                                                    ?>
                                                    <tr>
                                                      <!--   <td style="width:10px" valign="top" align="left"> <input type="radio" name="<?php echo $q->questionid; ?>" value="c"
                                                           id="" class="answer<?php echo $q->questionid; ?>" <?php
                                                  if(isset($q->y_ans) && $q->y_ans==='c') { echo 'checked';} ?>></td> -->
                                                           <td style="padding-bottom: 5px;" valign="top" align="left">

                                                            <?php if(isset($q->answer3Image) && $q->answer3Image != ''){ echo "c : "  ?><img src="<?php echo $img_url.$q->answer3Image ?>" ><br><?php } else {  echo "c : ". strip_tags($q->answer3); } ?>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                    <?php
                                                    if (isset($q->answer4)) {
                                                        ?>
                                                        <tr>
                                                         <!--    <td style="width:10px" valign="top" align="left"><input type="radio" name="<?php echo $q->questionid; ?>" value="d"
                                                               id="" class="answer<?php echo $q->questionid; ?>" <?php
                                                  if(isset($q->y_ans) && $q->y_ans==='d') { echo 'checked';} ?>></td> -->
                                                               <td style="padding-bottom: 5px;" valign="top" align="left">

                                                                <?php if(isset($q->answer4Image) && $q->answer4Image != ''){ echo "d : "  ?><img src="<?php echo $img_url.$q->answer4Image ?>" ><br><?php } else {  echo "d : ". strip_tags($q->answer4); } ?>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>

                                    <tr>
                                    	<td width="30%">Your Answer</td>
	                                    <td><?php echo htmlText($q->y_ans); ?></td>
                                    </tr>
                                    <tr>
                                    	<td>Correct Answer <br/>
                                       <!--  (There may be multiple correct answers) -->
                                        </td>
	                                     <td><?php //if(!empty($q->c_img))
	                                    // {
	                                    //  echo '<img src="'.$img_url . 'uploads/' . $q->c_img .'" ><br>';;
	                                    // }
	                                    ?>
	                                    <?php echo htmlText($q->correctAnswer); ?></td>
                                    </tr>

                                     <tr>
                                            <td>
                                          	<!-- <input type="text" name="<?php echo $q->questionid; ?>_option" id="<?php echo $q->questionid; ?>_option" style="display:none;height:auto;" placeholder="Your Option">
                                                <textarea id="<?php echo $q->questionid; ?>_comment" name="<?php echo $q->questionid; ?>_comment" style="display:none;height:auto;" rows="5" cols="40" placeholder="Every improvement counts even if it's small. Do provide specific details."></textarea>
                                                <input id="<?php echo $q->questionid; ?>_flag_button" style="display:none; float:left; margin:8px; " type="button" class="btn bg-primary down-bt finished" value="Submit" name="" onclick="return sendFlagMail('<?php echo $q->questionid; ?>')">  -->
                                           <!--  </td> -->
<!-- 
                                           <input type="text" name="<?php echo $q->questionid; ?>_option" id="<?php echo $q->questionid; ?>_option" style="height:auto;" placeholder="Your Option"> -->

                                           <span>Select the option which you think is correct ?</span>

                                           <select name="<?php echo $q->questionid; ?>_option" id="<?php echo $q->questionid; ?>_option" class="option" style="height:auto;" <?php if($q->correctAnswer=="Question abandoned") { echo "disabled"; } ?>>
                                           	<option value="">Select Option</option>

                                            <?php $correctAnswers = explode(',' ,$q->correctAnswer); ?>

                                           	 <?php if (!in_array("a", $correctAnswers)) { echo "<option value='a'>a</option>";} ?>
                                           	 <?php if (!in_array("b", $correctAnswers)) { echo "<option value='b'>b</option>";} ?>
                                          	 <?php if (!in_array("c", $correctAnswers)) { echo "<option value='c'>c</option>";} ?>
                                           	 <?php if (!in_array("d", $correctAnswers)) { echo "<option value='d'>d</option>";} ?>
                                           	<option value="others">Others</option>
                                           	</select>

                                           </td>
                                     <!--   </tr>
                                           <tr> -->
                                           	<td>                                         	
                                        
                                                <textarea id="<?php echo $q->questionid; ?>_comment" name="<?php echo $q->questionid; ?>_comment" class="comment" style="height:auto; padding-top: 100px" rows="10" cols="40" placeholder="Justification for Your Answer." <?php if($q->correctAnswer=="Question abandoned") { echo "disabled"; } ?>></textarea>

                                            </td>
                                              
                                    </tr>

                                     <!-- <input type="button" class="btn bg-primary down-bt" title="" value="Suggest Changes" style="float:right; height: 36px; margin:8px; color:white" onclick="viewFlagBox('<?php echo $q->questionid; ?>')">-->

                                    <!--  <a href="javascript:void(0);" id="flag" style="margin: 10px;border: 1px solid #dadce0;border-radius: 4px;color: #1967d2;font-family: 'Google Sans',Roboto,sans-serif;font-size: 14px;font-weight: 500;padding: 7px 15px;float:right; height: 36px; margin:8px;" title="Challenge Question" onclick="viewFlagBox('<?php echo $q->questionid; ?>')"><b>Challenge Question</b></a> -->
 
            					</table>
    						</div>
              </div>
				            <?php
				        }
				    
				    ?>
				</div>

      </div>
				<!-- <div>
					
				</div> -->

				<p>
					* Please note that Rs. 100 will be charged for every question which you challenge. If your challenge is accepted by our Academic Council, the amount will be reimbursed to you. For any queries, write to us at <a href="mailto:info@crestolympiads.com">info@crestolympiads.com</a>.
					Every question challenged should be supported by justification.
				</p>
				<button class="btn col s6 offset-s3" id="btnSubmit" type="button">               
                    Challenge<i class="material-icons right">send</i></button>
				<?php echo form_close();
			} else {
				# code...

				echo "<a style='float:left;' href='".base_url()."crest/challenge_test'><img src=".base_url()."assets/images/go-back-button.png height='40' ></a>";
				echo "<p style='text-align:center'>The answer key is not available for the subject.</p>";
			} ?>
			</div>
		</div>
	</div>



	<?php


}
	 //echo $this->load->view('daily_quiz/quick_links'); ?>
	
<!-- </div> -->

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
   // $(function () {
        // $(document).keydown(function (e) {
        //     return (e.which || e.keyCode) != 116;
        // });
        //  $(document).keydown(function (e) {
        //     return (e.which || e.keyCode) != 13;
        // });

        //  $(document).keydown(function (e) {
        //     return (e.which || e.keyCode) != 65;
        // });

        //   $(document).keydown(function (e) {
        //     return (e.which || e.keyCode) != 82;
        // });


  //  });

    $(document).bind("contextmenu",function(e){
    return false;
});
</script>

<script type="text/javascript">
    function viewFlagBox(intQuestionId) {
    	$("#"+  intQuestionId +"_option").toggle();
        $("#"+  intQuestionId +"_comment").toggle();
        $("#"+ intQuestionId + "_flag_button").toggle();
        
        //markQuestionFlag(intQuestionId);
    }
    
/*    function markQuestionFlag(intQuestionId) {
         //Ajax
        $.ajax({
            type: 'POST',
            dataType : 'json',
            url: '<?php echo base_url('daily_quiz/markQuestionFlag'); ?>',
            data: 'intQuestionId=' + intQuestionId + '&<?php echo $this->security->get_csrf_token_name();?>=<?php echo $this->security->get_csrf_hash();?>',
            cache: false,
            success: function (data) {
                    
            }
        });
}*/

// $("input[id^='_option']").each(function() {
// var val = $("option:selected",this).text();   
// alert(val);
// 	});



 $("#btnSubmit").click(function(){

// var arr1 = [];
// i = 0;
//         $('.option').each(function(input){
//    // var comment = $('.comment').val();
//       arr1[i++] = $('.option').val();

   
// });

// // alert(arr1.length);
//         var arr2 = [];
// j = 0;

//         $('.comment').each(function(input){
//     // var option = $('.option').val();    
//      arr2[i++] = $('.comment').val();
   
// });

//         if(arr1.length==0 || arr2.length==0 )
//         {
//         	alert('Please enter Option or Justification. ');
//         }

//         else
//         {
        	$('#challenge_test').submit();

        // }

    }); 
    
    
    function sendFlagMail(intQuestionId) {
    
    	var option = $("#" + intQuestionId + "_option").val();
        var description = $("#" + intQuestionId + "_comment").val();
        
        // if(description == '' ) {
        //     alert('Please enter description');
        //     return false;
        // }
         //Ajax
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('crest/sendFlagMail'); ?>',
            dataType : 'json',
            data: 'intQuestionId=' + intQuestionId + '&option=' + option  + '&description=' + description + '&<?php echo $this->security->get_csrf_token_name();?>=<?php echo $this->security->get_csrf_hash();?>',
            //data: { intQuestionId :  intQuestionId , description :  description },
            cache: false,
            success: function (data) {
            alert('Dear student, thank you for your valuable comment on this question. Our team will look into it and take necessary action.');
                    // alert('Thanks for your feedback.');
                    $("#"+intQuestionId+"_option").hide();
                    $("#"+intQuestionId+"_comment").hide();
                    $("#" + intQuestionId+ "_flag_button").hide();
            }
        });
    }
</script>

<script>

    $(document).ready(function() {

    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            //return navigator.userAgent.match(/iPhone|iPad|iPod/i);
            return navigator.userAgent.match(/iPhone/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };
    // $('.whatsapp').click(function() {

        if( isMobile.any() ) {

            // var text = $(this).attr("data-text");
            // var url = $(this).attr("data-link");
            // var message = encodeURIComponent(text) + " - " + encodeURIComponent(url);
            // var whatsapp_url = "whatsapp://send?text=" + message;
            // window.location.href = whatsapp_url;

             var base_url= "https://www.crestolympiads.com/";
             alert("You may view this link through a desktop only.");
             window.location.href = base_url;
        } else {
           
        }

    // });
});


</script>

<script>


  var i = 1;
  function gotoq(q_id){

var counter = q_id.substr(q_id.indexOf("_") + 1);



if(counter==1)

{

$( ".btn-prev" ).hide();

}

else

{

  $( ".btn-prev" ).show();

}

var count = $( "#count" ).val() ;

if(counter==count)

{

$( ".btn-next" ).hide();

}

else

{
  $( ".btn-next" ).show();
}



 if($('.display_question').hasClass('active'))

 {
  $( ".display_question" ).removeClass("active");
 }

 if($('.btn-prev').hasClass('disabled hidden'))

 {
  $( ".btn-prev" ).removeClass("disabled hidden");
 }




  
  

     $("#"+q_id).addClass('active');

    
    //$( ".display_question" ).hide();
    $('.go_to_ques').parent().removeClass("active");
    $( "#question_"+q_id ).show();
    $('.go_to_question_'+q_id).parent().addClass("active");
    //i = q_id;
    i= counter;
  }



  $().ready(function(){

    


   /*if(i==1)

   {
    // $( ".left-actions" ).hide();
    //$('.left-actions').attr('style','display:none !important');
   }*/


    //$( ".display_question" ).hide();
    $( "#question_"+i ).show();


  });



//   $(".btn-next").click(function(){

//       alert("sdsd");
//     $("#action").val("previous");
// });


// $(".btn-prev").click(function(e){

//   alert("ccdsads");
//     var idClicked = e.target.id;
//     alert(idClicked);
// });

if($(window).width() < 767){

  $("#desktop").hide();
   $("#potrait").show();
    $("#landscape").hide();

}
else if($(window).width() > 768 && $(window).width() < 1199 ){
  $("#desktop").hide();
   $("#potrait").hide();
    $("#landscape").show();
}
else
{
  $("#desktop").show();
   $("#potrait").hide();
    $("#landscape").hide();
}

  </script>

	</div>
</div>
</div> 

</div>


