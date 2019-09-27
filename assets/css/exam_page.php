
<!-- 
<script>

    $( window ).load(function() {
    if (window.location.href.indexOf('reload')==-1) {
         window.location.replace(window.location.href+'?reload');
    }
});

</script>
 -->

 <link rel="stylesheet" href="<?php echo base_url()?>assets/css/main.css" type="text/css" media="all">
<!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script src="<?php echo base_url()?>assets/js/capture.js"></script>
    <script>
        

        setInterval(function(){ 
   $("#startbutton").click();
},20000);

      
        
    </script>

<?php
$this->session->set_userdata('isExamStarted', 0);
$img_url = $this->config->item('image_src_url');
$user_answers=$this->session->userdata('userAnswers');
/*print_r($user_answers);die;*/
?>
<div class="col-md-12 padd">
    <div class="bradcome-menu">
        <ul>
            <!-- <li><a href="#">Home</a></li>
            <li><img src="<?php echo base_url(); ?>assets/images/arrow.png"></li> -->
            <li><a href="#" style="font-size:20px;"><?php if (isset($quizName)) echo $quizName; ?></a>
            </li>
        </ul>
    </div>

        <div class="contentarea">
   <!--  <h1>
        MDN - WebRTC: Still photo capture demo
    </h1>
    <p>
        This example demonstrates how to set up a media stream using your built-in webcam, fetch an image from that stream, and create a PNG using that image.
    </p> -->
  <div class="camera" style="position: absolute;float: right;right: 0px;top: -113px;">
    <video id="video">Video stream not available.</video>
    <button id="startbutton" style="display:none">Take photo</button> 
<!--   <input type="button" id="startbutton" style="display:none" value="Take photo">  -->
  </div>
  <canvas id="canvas">
  </canvas>
  <div class="output" style="display: none">
    <img id="photo" alt="The screen capture will appear in this box."> 
  </div>

 <!--  <input type="hidden" name="url" value="<?php //echo $this->session->userdata('path_url').'exam/save_image'; ?>"  id="url"> -->
   <input type="hidden" name="uid" value="<?php echo $this->session->userdata('user_id'); ?>"  id="uid">

</div>
    
</div>
<div class="row margin exam-div" bgcolor="#FFFFFF" ondragstart="return false" onselectstart="return false">
    <div class="col-md-12 padd">
        <div class="col-md-4">
    <div class="timer" style="background-color: #3f51b533;">
        <div class="timer-img">
            <?php $img = $this->session->userdata('image');
            if (isset($img) && $img != '') { ?>
            <img
            src="<?php echo base_url(); ?>assets/uploads/images_200_200/<?php echo $this->session->userdata('image'); ?>"
            width="69" height="68">
            <?php } else { ?>
            <img src="<?php echo base_url(); ?>assets/uploads/images_200_200/dflt-user-icn.png" width="69"
            height="68">
            <?php } ?>

        </div>
       <!--  <h4 class="awareness-view-hed"> -->
            <div class="timer-img-con" style="color:#000;">Time Left : <span id="timerdiv"><strong><span id="mins"></span>:<span id="seconds"></span></strong></span>

            <?php if (isset($negativeMark)) echo "&nbsp;&nbsp;&nbsp;&nbsp;Negative Mark: " . $negativeMark; ?>
            <br>
            <!-- <small> --><strong><?php echo $this->session->userdata('username'); ?></strong><!-- </small> -->
        </div>
       <!--  </h4> -->

    </div>
    <div class="col-md-12 padd g-awareness">
        <div class="awareness-view" style="background-color: #3f51b533;">
            <!-- <h4 class="awareness-view-hed" style="color:#000;"><?php echo $quizName; ?>
                <br> -->
               <!--  <small>Question Palette :</small> -->
           <!--  </h4> -->
            <div class="col-md-12">
                <div class="number-plate">
                    <?php
                    $cnt = 1;
                    $i = 1;
                    $j=0;
                    foreach ($this->session->userdata('questions') as $q) {
//                                foreach ($row as $q) { ?>
<li id="<?php echo "number-" . $q->questionid . "_" . $i; ?>"
    onclick="showQuestion('<?php echo "#" . $q->questionid . "_" . $i; ?>');"
     <?php if(isset($user_answers[$j]->answer) && $user_answers[$j]->answer!="n" && $user_answers[$j]->status!="m" && !empty($user_answers[$j]->answer)) {echo 'class="btn bg-primary numbers q-answered"'; } else if (isset($user_answers[$j]->answer) && $user_answers[$j]->answer=="n") {
         echo 'class="btn bg-primary numbers n-answered"';
     } else if (isset($user_answers[$j]->answer) && $user_answers[$j]->status=="m") {
         echo 'class="btn bg-primary numbers m-answered"';
     } else { echo 'class="btn bg-primary numbers z-answered"';} ?>>
    <?php echo $cnt++; ?>
</li>
<?php
$i++;
$j++;
//                                }
}
?>
</div>
</div>
<div class="col-md-12">
    <div class="lagend" style="color:#000;">
        <table width="90%" border="0">
            <tr>
                <td>
                   <!--  <h4 class="mar-lgn">
                        <small>Legends :</small>
                    </h4> -->
                </td>
                <td></td>
            </tr>
           <br/>
            <tr>
                <td>
                    <div class="btn bg-primary answered mar-lgn"><span class="aq-answered">0</span>
                    </div>
                    Answered
                </td>
                <td>
                    <div class="btn bg-primary not-answered mar-lgn"><span
                        class="an-answered">0</span></div>
                        Not Answered
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <div class="btn bg-primary review mar-lgn"><span class="am-answered">0</span>
                        </div>
                        Review
                    </td>
                    <td>
                        <div class="btn bg-primary not-visited mar-lgn"><span
                            class="az-answered">0</span></div>
                            Not Attempted
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-12" style="padding:10px 0;">
        </div>
    </div>
</div>
</div>
        <div class="col-md-8" style="overflow-y: scroll;height:600px">
            <?php
            $attributes = array('class' => 'email', 'id' => 'myform', 'name' => 'myform');
            echo form_open_multipart("exam/validateexam", $attributes); ?>
          

            
           
           <!--  <div class="col-md-1 padd">
                <div class="sectin-hed"> -->
                    <!-- Subjects -->
               <!--  </div>
            </div>
            <div class="col-md-11">
                <div class="hed-line"></div>
            </div> -->

            <div class="col-md-12 padd">
                <!--Print questions here-->
                <div id="divs" class="notranslate">
                    <?php
                    $question_slno = 1;
                    if (count($this->session->userdata('questions'))) {

                        $totRowCount = 0;
                        $i = 0;
                        $j = 0;
                        
//                        echo "<pre>";
//                        print_r($this->session->userdata('questions'));
//                        exit;
//                        
                        foreach ($this->session->userdata('questions') as $q) {



//                            $totRowCount = $totRowCount + count($row);

//                            foreach ($row as $q) {
                            $i++;
                            ?>
                            <div id="<?php echo $q->questionid . "_" . $i; ?>" class="display_question">
                                <div class="bradcome-menu qu-pa">
                                    <div class="col-md-6">
                                    <span class="question" style="font-size: 15px"> Question No. <?php echo $question_slno++; ?></span>

                                    </div>
                                    <span style="float:right;padding-right:10px"><?php echo $q->section_name; ?></span>
                                </div>
                                <?php if(isset($q->question_type))
                                { ?>
                                <h4 class="quction">
                                    <?php echo $q->question_type; ?>
                                </h4>
                                <?php } ?>

                                <?php

                                if (isset($q->questionImage) && $q->questionImage != '') { 
                                    $question_image = '<img src="'.$img_url. $q->questionImage .'" ><br>'; ?>
                                    <h4 class="quction"><?php echo $q->question.'<br>'.$question_image ; ?></h4>
                                    <?php } else { ?>
                                    <h4 class="quction"><?php echo htmlText($q->question); ?></h4>
                                    <?php } ?>


                                    
                                    <div style="padding-bottom:10px">&nbsp;</div>
                                    <table width="100%" border="0" class="answeers">
                                        <input type="hidden" name="<?php echo $q->questionid; ?>" value="<?php echo $q->questionid; ?>" class="ans" value="0" id=""
                                        checked>
                                        <?php
                                       
                                        
                                        
                                        if (isset($q->answer1)) {;
                                            ?>
                                            <tr>
                                                <td style="width:10px" valign="top" align="left"><input type="radio" name="<?php echo $q->questionid; ?>" value="a"
                                                  id="" class="answer<?php echo $q->questionid; ?>"
                                                   <?php
                                            if(isset($user_answers[$j]->answer) && $user_answers[$j]->answer==='a') { echo 'checked'; } ?>></td>
                                                  <td style="padding-bottom: 5px;" valign="top" align="left">
                                                    <?php if(isset($q->answer1Image) && $q->answer1Image != ''){ ?><img src="<?php echo $img_url.$q->answer1Image ?>" ><br><?php } ?><?php echo htmlText($q->answer1); ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <?php
                                            if (isset($q->answer2)) {
                                                ?>
                                                <tr>
                                                    <td style="width:10px" valign="top" align="left">  <input type="radio" name="<?php echo $q->questionid; ?>" value="b"
                                                       id="" class="answer<?php echo $q->questionid; ?>" <?php
                                                  if(isset($user_answers[$j]->answer) && $user_answers[$j]->answer==='b') { echo 'checked';} ?>></td>
                                                       <td style="padding-bottom: 5px;" valign="top" align="left">

                                                        <?php if(isset($q->answer2Image) && $q->answer2Image != ''){ ?><img src="<?php echo $img_url.$q->answer2Image ?>" ><br><?php } ?><?php echo htmlText($q->answer2); ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                                <?php
                                                if (isset($q->answer3)) {
                                                    ?>
                                                    <tr>
                                                        <td style="width:10px" valign="top" align="left"> <input type="radio" name="<?php echo $q->questionid; ?>" value="c"
                                                           id="" class="answer<?php echo $q->questionid; ?>" <?php
                                                  if(isset($user_answers[$j]->answer) && $user_answers[$j]->answer==='c') { echo 'checked';} ?>></td>
                                                           <td style="padding-bottom: 5px;" valign="top" align="left">

                                                            <?php if(isset($q->answer3Image) && $q->answer3Image != ''){ ?><img src="<?php echo $img_url.$q->answer3Image ?>" ><br><?php } ?><?php echo htmlText($q->answer3); ?>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                    <?php
                                                    if (isset($q->answer4)) {
                                                        ?>
                                                        <tr>
                                                            <td style="width:10px" valign="top" align="left"><input type="radio" name="<?php echo $q->questionid; ?>" value="d"
                                                               id="" class="answer<?php echo $q->questionid; ?>" <?php
                                                  if(isset($user_answers[$j]->answer) && $user_answers[$j]->answer==='d') { echo 'checked';} ?>></td>
                                                               <td style="padding-bottom: 5px;" valign="top" align="left">

                                                                <?php if(isset($q->answer4Image) && $q->answer4Image != ''){ ?><img src="<?php echo $img_url.$q->answer4Image ?>" ><br><?php } ?><?php echo htmlText($q->answer4); ?>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                        <tr>
                                                         <td colspan="2">
                                                            <textarea id="<?php echo $q->questionid; ?>_comment" name="<?php echo $q->questionid; ?>_comment" style="display:none" placeholder="Every improvement counts even if it's small. Do provide specific details." rows="3" cols="40"></textarea>
                                                            <input id="<?php echo $q->questionid; ?>_flag_button" style="display:none;" type="button" class="btn bg-primary down-bt finished" value="Submit" name="" onclick="return sendFlagMail('<?php echo $q->questionid; ?>')"> 
                                                        </td>
                                                    </tr>
                                                    <?php
                                        //if (isset($q->answer5)) {
                                                    ?>
                                        <!--tr>
                        <td>
                           <input type="radio" name="<?php echo $q->questionid; ?>" value="5" id="">
                           <?php echo $q->answer5; ?>
                        </td>
                    </tr-->
                    <?php // } ?>
                </table>

                <span class="error" style="font-weight: 600"></span>
            </div>
            <?php
        $j++; }
    }
    ?>
</div>
<!--End Print questions here-->
</div>
<div class="col-md-12 padd  down-buttons">
    <div class="col-md-9">
        <div id="prev" class="btn bg-primary down-bt">Previous</div>
        <div id="mnext" class="btn bg-primary down-bt">Select and mark for review</div>
       <!-- <div id="mnext" class="btn bg-primary down-bt">Mark for Review</div> -->
        <div id="next" class="btn bg-primary down-bt">Next</div>
        <div id="clearAnswer" class="btn bg-primary down-bt">Clear Answer</div>
        <!-- <div id="flag" class="btn bg-primary down-bt" title="1 reward point = Re. 1 which can be redeemed for future purchases in next 12 months.">Suggest changes & earn reward points</div> -->

        <p id="instructions" style="font-weight: 600;font-size:15px"><span style="color:red">*</span> Please select next to record your answer</p>
    </div>

    <div class="col-md-3">
        <input type="button" class="btn bg-primary down-bt finished" onclick="dialog1();" value="Finish" />
        <input type="submit" style="display:none;" value="Finish" name="Finish" id="finish" ></input>
        <!-- -->
    </div>
</div>
<div>
</div>

<input type="hidden" name="minutes" id="mins1">
<input type="hidden" name="seconds" id="seconds1">




<?php echo form_close(); ?>
</div>

</div>
</div>

<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/font.css" rel="stylesheet">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>


<link href="<?php echo base_url(); ?>assets/css/jquery-confirm.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/js/jquery-confirm.min.js"></script>

<script type="text/javascript">

function toggleFullScreen(elem) {
    // ## The below if statement seems to work better ## if ((document.fullScreenElement && document.fullScreenElement !== null) || (document.msfullscreenElement && document.msfullscreenElement !== null) || (!document.mozFullScreen && !document.webkitIsFullScreen)) {
    if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
        if (elem.requestFullScreen) {
            elem.requestFullScreen();
        } else if (elem.mozRequestFullScreen) {
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullScreen) {
            elem.webkitRequestFullScreen();
        } else if (elem.msRequestFullscreen) {
            elem.msRequestFullscreen();
        } 

    } 
}


$().ready(function(){ 
    // $(document).mouseleave(function(){
        /*console.log(localStorage.attempts_for_test_remaining);
        if(isNaN(localStorage.attempts_for_test_remaining) || localStorage.attempts_for_test_remaining==undefined || localStorage.attempts_for_test_remaining<-1){
            localStorage.attempts_for_test_remaining = 3;
        }
        if(Number(localStorage.attempts_for_test_remaining)==0){
            var msg="You attempted to go outside of the test despite 3 warnings. The test will now finish.";
            $.confirm({
                 title: 'Warning!',
                 content: msg,
                 type: 'yellow',
                 typeAnimated: true,
                 buttons: {
                    ok: {
                        text: 'Submit the test!',
                        btnClass: 'btn-green',
                        action: function(){
                            saveExamResponse("OK");
                            stopInterval();
                            localStorage.attempts_for_test_remaining = undefined;
                            $("#finish").click();
                        },
                    }
                }
            });
            
        }else{
            var msg="You are attempting to go outside of the test. You have "+localStorage.attempts_for_test_remaining+" attempts till the exam automatically finishes. Please use 'Finish' button below to submit the test.";
            $.confirm({
                 title: 'Warning!',
                 content: msg,
                 type: 'yellow',
                 typeAnimated: true,
                 buttons: {
                    ok: {
                        text: 'Ok, I won\'t do it again!',
                        btnClass: 'btn-green',
                        action: function(){
                        },
                    }
                }
            });
            // alert("Warning! You are attempting to go outside of the test. You have "+localStorage.attempts_for_test_remaining+" attempts till the exam automatically finishes. Please use Finish button below to submit the test.");
        }
        localStorage.attempts_for_test_remaining--;*/

      /*    $.confirm({
            title: 'Important!',
            //content: 'Are you sure you want to submit the quiz?',
            content: 'You are not allowed to go out of test window!',
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
                    //text: 'Please return back to the test',
                    text: 'OK',
                    btnClass: 'btn-red',
                    action: function(){
                        saveExamResponse("CANCEL");
                        toggleFullScreen(document.body);
                    }
                }
            }
        });*/
    // });
    
    $(document.body).bind('webkitfullscreenchange mozfullscreenchange fullscreenchange', function(e) {
        e.preventDefault();
        var state = document.fullScreen || document.mozFullScreen || document.webkitIsFullScreen;
        var event = state ? 'FullscreenOn' : 'FullscreenOff';
        if(event == 'FullscreenOff'){
             $.confirm({
            title: 'Important!',
            //content: 'Are you sure you want to submit the quiz?',
            content: 'You are not allowed to go out of test window!',
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
                        saveExamResponse("CANCEL");
                        toggleFullScreen(document.body);
                    }
                }
            }
        });
        }
    });
    // document.onkeydown = function (e) {
    //     var state = document.fullScreen || document.mozFullScreen || document.webkitIsFullScreen;
    //     var event = state ? 'FullscreenOn' : 'FullscreenOff';
    //     if(event == 'FullscreenOff')
    //         // if ((e.which || e.keyCode) == 27)
    //         dialog1();
    //     toggleFullScreen(document.body);
    //     return false;
    // };

    $(document).keydown(function(e){
    e.preventDefault();
  });

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
         content: "Please Accept to Start the Exam",
         type: 'yellow',
         typeAnimated: true,
         buttons: {
            ok: {
                text: 'I accept, let\'s go for it',
                btnClass: 'btn-green',
                action: function(){
                    toggleFullScreen(document.body);
                    var mins = 60;
                    var sec = 60;

                    intilizetimer();
                },
            }
        }
    });

});

function dialog1(){     

    if(mins > 59){
             $.confirm({
            title: 'Important!',
            //content: 'Are you sure you want to submit the quiz?',
            content: 'You are not allowed to submit test!',
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
                        saveExamResponse("CANCEL");
                        toggleFullScreen(document.body);
                    }
                }
            }
        });
        }
        else

        {

    saveExamResponse("FINISH");   
    var notAnswered = parseInt($(".am-answered").text());
    if(notAnswered > 0) {
        msg = 'You have ' + notAnswered + ' questions marked for review. Do you want to review them?';
        $.confirm({
         title: 'Alert!',
         content: msg,
         type: 'yellow',
         typeAnimated: true,
         buttons: {
            ok: {
                text: 'Yes, let me  review first',
                btnClass: 'btn-green',
                action: function(){
                    saveExamResponse("CANCEL");
                },
            },
            cancel:{
                text: 'No, submit the test',
                btnClass: 'btn-red',
                action: function(){
                    saveExamResponse("OK");
                  //stopInterval();
                     $("#finish").removeAttr('disabled');
                        $("#finish").click();
                    
                }
            }
        }
    });
    }
    else{
        $.confirm({
            title: 'Alert!',
            content: 'Are you sure you want to submit the test?',
            type: 'yellow',
            typeAnimated: true,
            buttons: {
                ok: {
                    text: 'Yes, submit the test!',
                    btnClass: 'btn-green',
                    action: function(){
                        saveExamResponse("OK");
                        //stopInterval();
                        $("#finish").removeAttr('disabled');
                        $("#finish").click();
                    }
                },
                cancel:{
                    text: 'No, Let me check once again.',
                    btnClass: 'btn-red',
                    action: function(){
                        saveExamResponse("CANCEL");
                    }
                }
            }
        });

    }
}
}
function confirmFinish() {
    // res = false;
    var notAnswered = parseInt($(".am-answered").text());
    if(notAnswered > 0) {
        if(!confirm('You have ' + notAnswered + ' questions marked for review. Do you want to review them?')) {
            if( confirm('Are you sure you want to submit the quiz?') ) {
                return true;
            }
            return false;
        }

    }else {
        if(confirm('Are you sure you want to submit the quiz?')) {
            return true;
        }
        return false;
    }
}

function saveExamResponse(clicked) {
    var user_id = "<?php echo $this->session->userdata('user_id');?>";
    jQuery.ajax({
        type:'post',
        url:'<?php echo base_url()?>user/saveExamResponse',
        data:{user_id:user_id, clicked : clicked, '<?php echo $this->security->get_csrf_token_name();?>' : '<?php echo $this->security->get_csrf_hash();?>'},
        dataType:'json',
        async:false,
        success:function(response){
               // console.log(response);
           },
       });
}


function sendFlagMail(intQuestionId) {

    var description = $("#" + intQuestionId + "_comment").val();

    if(description == '' ) {
        alert('Please enter description');
        return false;
    }
     //Ajax
     $.ajax({
        type: 'POST',
        url: '<?php echo base_url('exam/sendFlagMail'); ?>',
        dataType : 'json',
        data: 'intQuestionId=' + intQuestionId + '&description=' + encodeURIComponent(description) + '&<?php echo $this->security->get_csrf_token_name();?>=<?php echo $this->security->get_csrf_hash();?>',
        //data: { intQuestionId :  intQuestionId , description :  description },
        cache: false,
        success: function (data) {
               // alert('Thanks for your feedback.');
               alert('Dear student, thank you for your valuable comment on this question. Our team will look into it and take necessary action.');
               $("#"+intQuestionId+"_comment").hide();
               $("#" + intQuestionId+ "_flag_button").hide();
           }
       });

 }




/* function markQuestionFlag(intQuestionId) {
         //Ajax
         $.ajax({
            type: 'POST',
            dataType : 'json',
            url: '<?php echo base_url('exam/markQuestionFlag'); ?>',
            data: 'intQuestionId=' + intQuestionId + '&<?php echo $this->security->get_csrf_token_name();?>=<?php echo $this->security->get_csrf_hash();?>',
            cache: false,
            success: function (data) {

            }
        });
     }*/
     </script>    

     <script>
     $(document).ready(function () {

// var radios = document.getElementsByName("seconds");
// var val = localStorage.getItem('seconds'); // local storage value
// for(var i=0;i<radios.length;i++){
//   if(radios[i].value == val){
//       radios[i].checked = true; // marking the required radio as checked
//   }
// }

//location.reload();








        $("#prev").hide();

        //Disable Browser Back Button
        history.pushState({page: 1}, "title 1", "#nbb");
        window.onhashchange = function (event) {
            window.location.hash = "nbb";

        };

        //DisableF5 key
        document.onkeydown = function (e) {
            return (e.which || e.keyCode) != 116;
        };

        // Disable Right click
        $(document).bind('contextmenu', function (e) {
            e.preventDefault();
        });

        updateSummary();
        $(".display_question").each(function (e) {
            if (e != 0)
                $(this).hide();
        });

        $("#next").click(function () {
            $(".error").hide();
            $("#prev").show();
            var numberPlateId = "#" + "number-" + $(".display_question:visible").attr('id');

              var answer = $(".display_question:visible table input:radio:checked").val();

            
              
            if(answer === undefined)
             {

                var userAnswer="n";
             }

             else
             {
                var userAnswer=answer;
             }





// alert($(".display_question:visible table input:radio:checked").attr('name'));

               //localStorage[$(".display_question:visible").attr('id')] = userAnswer;

            
               //localStorage.setItem('answers', val);

               //localStorage['answers'] = val;

            //alert(val);

             var question_id = $(".display_question:visible table input:radio:checked").attr('name');

             if(question_id === undefined)
             {
            var questionId = $(".display_question:visible table input:radio:not(:checked)").attr('name');                
             }

             else
             {
                var questionId=question_id;
             }

             

            
// alert($(".display_question:visible table input:radio:checked").val());
            if ($(".display_question:visible table input:radio:checked").length == 0)
                $(numberPlateId).removeClass('q-answered m-answered n-answered z-answered').addClass('n-answered');
            else
                $(numberPlateId).removeClass('q-answered m-answered n-answered z-answered').addClass('q-answered');
            if ($(".display_question:visible").next().length != 0)
                $(".display_question:visible").next().fadeIn(1000).prev().hide();
            else {

                $(this).hide();
            }
            

            
            updateSummary();
            
         /* var intTotal = (
                            parseInt($(".number-plate .m-answered").length) +
                            parseInt($(".number-plate .z-answered").length) +
                            parseInt($(".number-plate .n-answered").length) +
                            parseInt($(".number-plate .q-answered").length)
                            );
                    
           
            
            alert(intTotal);
            alert(intTotalQuestionsInQuiz); */


            var strQuestionNo =  $(".display_question:visible").attr('id') ;
            var array = strQuestionNo.split("_");
            var intCurrentQuestionId = array[1];

            //var questionId = array[0];
           



            
            var intTotalQuestionsInQuiz = '<?php echo count($this->session->userdata('questions')); ?>';

            //var radioName = "answer"+array[0];

            //alert(radioName);

            //alert($(".display_question:visible table input:radio:checked").val());

                //Ajax
    var userId = "<?php echo $this->session->userdata('user_id');?>";
     jQuery.ajax({
        type:'post',
        url:'<?php echo base_url()?>exam/userSession',
        data:{user_id:userId,question_id:questionId,answer:userAnswer,status:"n", '<?php echo $this->security->get_csrf_token_name();?>' : '<?php echo $this->security->get_csrf_hash();?>'},
        dataType:'json',
        async:false,
        success:function(response){
               // console.log(response);
           },
       });


 
           
       
            
           
            
            if(parseInt(intCurrentQuestionId) >= parseInt(intTotalQuestionsInQuiz)) {
                $("#next").hide();

            }else {
                $("#next").show();
            }
            
            return false;
        });

$("#mnext").click(function () {

    $("#prev").show();

    $(".error").hide();

     var answer = $(".display_question:visible table input:radio:checked").val();

            
              
            if(answer === undefined)
             {

                var userAnswer="m";
             }

             else
             {
                var userAnswer=answer;
             }


      var question_id = $(".display_question:visible table input:radio:checked").attr('name');

             if(question_id === undefined)
             {
            var questionId = $(".display_question:visible table input:radio:not(:checked)").attr('name');                
             }

             else
             {
                var questionId=question_id;
             }

    var numberPlateId = "#" + "number-" + $(".display_question:visible").attr('id');
    if ($(".display_question:visible table input:radio:checked").length == 0)
        $(numberPlateId).removeClass('q-answered m-answered n-answered z-answered').addClass('m-answered');
    else
        $(numberPlateId).removeClass('q-answered m-answered n-answered z-answered').addClass('m-answered');

    if ($(".display_question:visible").next().length != 0)
        $(".display_question:visible").next().fadeIn(1000).prev().hide();
    else {
        $(this).hide();
    }

    

     var userId = "<?php echo $this->session->userdata('user_id');?>";
     jQuery.ajax({
        type:'post',
        url:'<?php echo base_url()?>exam/userSession',
        data:{user_id:userId,question_id:questionId,answer:userAnswer,status:"m", '<?php echo $this->security->get_csrf_token_name();?>' : '<?php echo $this->security->get_csrf_hash();?>'},
        dataType:'json',
        async:false,
        success:function(response){
               // console.log(response);
           },
       });

      var strQuestionNo =  $(".display_question:visible").attr('id') ;
            var array = strQuestionNo.split("_");
            var intCurrentQuestionId = array[1];
            
            var intTotalQuestionsInQuiz = '<?php echo count($this->session->userdata('questions')); ?>';  

     if(parseInt(intCurrentQuestionId) >= parseInt(intTotalQuestionsInQuiz)) {
                $("#next").hide();

            }else {
                $("#next").show();
            }





    updateSummary();
    return false;
});

$("#prev").click(function () {
    $("#next").show();
    $(".error").hide();
    var strQuestionNo =  $(".display_question:visible").attr('id') ;
    var array = strQuestionNo.split("_");
    var intLastQuestionId = array[1];

    // alert(intCurrentQuestionId);

     if(parseInt(intLastQuestionId) == 2) {

        $("#prev").hide();

     }
     else
     {
        $("#prev").show();

     }


    if ($(".display_question:visible").prev().length != 0)
        $(".display_question:visible").prev().fadeIn(1000).next().hide();
    else {

        $(this).hide();
    }
    updateSummary();
    return false;
});


$("#flag").click(function(){
    var numberPlateId = "#" + "number-" + $(".display_question:visible").attr('id');
    var start_pos = numberPlateId.indexOf("-");
    var end_pos = numberPlateId.indexOf("_");
    res = numberPlateId.substring(start_pos+1, end_pos);
    $("#"+res+"_comment").show();
    $("#" + res+ "_flag_button").show();

    //markQuestionFlag(res);
});



$("#clearAnswer").click(function () {
            //$("#next").show();

             var answer = $(".display_question:visible table input:radio:checked").val();

            
              
            if(answer !== "")
             {

                var userAnswer="";
             }

            


      var question_id = $(".display_question:visible table input:radio:checked").attr('name');

             if(question_id === undefined)
             {
            var questionId = $(".display_question:visible table input:radio:not(:checked)").attr('name');                
             }

             else
             {
                var questionId=question_id;
             }

             

             var userId = "<?php echo $this->session->userdata('user_id');?>";
     jQuery.ajax({
        type:'post',
        url:'<?php echo base_url()?>exam/userSession',
        data:{user_id:userId,question_id:questionId,answer:userAnswer,status:"n", '<?php echo $this->security->get_csrf_token_name();?>' : '<?php echo $this->security->get_csrf_hash();?>'},
        dataType:'json',
        async:false,
        success:function(response){
               // console.log(response);
           },
       });

            var numberPlateId = "#" + "number-" + $(".display_question:visible").attr('id');
            if ($(".display_question:visible table input:radio:checked").length != 0) {
                $(".display_question:visible table input:radio:checked").removeAttr("checked");
                $(numberPlateId).removeClass('q-answered m-answered n-answered z-answered').addClass('z-answered');
            }
            else
                //alert('No Answer Selected');

            $('.error').show();

            $(".error").text("No Answer Selected");


            updateSummary();
            return false;
        });

// var mins = 60;
// var sec = 60;

// intilizetimer();

});


    $('input:radio').change(function() {

        var strQuestionNo =  $(".display_question:visible").attr('id') ;
            var array = strQuestionNo.split("_");
            var intCurrentQuestionId = array[1];
            var intTotalQuestionsInQuiz = '<?php echo count($this->session->userdata('questions')); ?>';
            if(parseInt(intCurrentQuestionId) >= parseInt(intTotalQuestionsInQuiz)) {


$("#next").click();

            }
        $('.error').hide();
    });





function showSubjectQuestions(id) {
    $('.display_question').hide();
    $('#' + id + '_1').fadeIn(1000);
    $("#next").show();
    $("#prev").show();
}

function showQuestion(id) {

    $('.display_question').hide();
    $(id).fadeIn(1000);
      var strQuestionNo =  $(".display_question:visible").attr('id') ;
            var array = strQuestionNo.split("_");
            var intCurrentQuestionId = array[1];
              var intTotalQuestionsInQuiz = '<?php echo count($this->session->userdata('questions')); ?>';

             if(parseInt(intCurrentQuestionId) >= parseInt(intTotalQuestionsInQuiz)) {
                $("#next").hide();
                $("#instructions").hide();
            }else {
                $("#next").show();
            }

            

             if(parseInt(intCurrentQuestionId) ==1) {
                $("#prev").hide();
            }else {
                $("#prev").show();
            }
    //$("#next").show();
    //$("#prev").show();
    $('.error').hide();
}

function updateSummary() {
    $(".am-answered").text($(".number-plate .m-answered").length);
    $(".az-answered").text($(".number-plate .z-answered").length);
    $(".an-answered").text($(".number-plate .n-answered").length);
    $(".aq-answered").text($(".number-plate .q-answered").length);
}

function isInt(value) {
  return !isNaN(value) && (function(x) { return (x | 0) === x; })(parseFloat(value))
}

function intilizetimer() {
        //totaltime = $("#totaltime").text().split(":");
        // if(localStorage.olympiad_minutes_remaining){
            if(!isNaN(localStorage.olympiad_minutes_remaining)){
                if((Number(localStorage.olympiad_minutes_remaining)!=0) || (Number(localStorage.olympiad_seconds_remaining)!=0)){
                    mins = localStorage.olympiad_minutes_remaining;
                    sec = localStorage.olympiad_seconds_remaining;   
                    
                }
                else{
                    mins = <?php if(isset($minutes) && $minutes != '') echo $minutes; else echo $quizTime; ?>;
                    sec = <?php if(isset($seconds) && $seconds != '') echo $seconds; else echo "0"; ?>;
                }
            }
            else{
                mins = <?php if(isset($minutes) && $minutes != '') echo $minutes; else echo $quizTime; ?>;
                sec = <?php if(isset($seconds) && $seconds != '') echo $seconds; else echo "0"; ?>;
            }
            // sec= '0';
            $("#mins").text(mins);
            $("#mins1").text(mins);
        // localStorage.setItem("minutes", mins);
        console.log(mins);
        console.log(sec);

        validity_time=<?php

$to_time = strtotime(date('Y-m-d H:i:s'));
$from_time = strtotime($this->session->userdata('to_date'));



 //echo round(abs($to_time - $from_time) / 60);

$interval = $from_time-$to_time;

echo  $interval;

?>;
        
        startInterval();
    }

    function tictac() {

        sec--;
        
//        if(sec.toString().length <= 1) {
//            sec = '0'+sec;
//            sec = parseInt(sec);
//        }
//var today_date = "<?php //echo date('Y-m-d H:i:s');?>";
//var to_date = "<?php //echo $this->session->userdata('to_date');?>";

// var validity_time="<?php

// $to_time = strtotime(date('Y-m-d H:i:s'));
// $from_time = strtotime($this->session->userdata('to_date'));



//  //echo round(abs($to_time - $from_time) / 60);

// $interval = $from_time-$to_time;

// echo  $interval;

// ?>";

 //alert(time);
 //alert(today_date);

//alert(validity_time);

validity_time--;

 if (validity_time<=0) {
        stopInterval();
        $("#mins").text('00');
        $("#mins1").text('00');
        $("#seconds").text('00');
        $("#seconds1").text('00');
        $.alert({
            title: 'Important!',
            content: "You exceeded the time to finish the exam. Click Ok to Submit. Your responses won't be recorded if you don't click on OK.",
            type: 'red',
            typeAnimated: true,
            buttons: {
                ok: {
                    text: 'Ok!',
                    btnClass: 'btn-green',
                    action: function(){
                        saveExamResponse("OK");
                        //stopInterval();
                       $("#finish").removeAttr('disabled');
                        $("#finish").click();
                    }
                }
            }
        });
        // alert('You exceeded the time to finish the exam. Click Ok to Submit.');
        // $('#finish').removeAttr('onclick');
        // $('#finish').click();


    }



if (sec <= 0) {

    mins--;
    if(mins<10)
    {
        minutes="0" + mins;
         $("#mins").text(minutes);
         $("#mins1").text(minutes);
    }

    else

    {
    $("#mins").text(mins);
    $("#mins1").text(mins);
    }

   
   
    if (mins < 5) {
        $("#timerdiv").css("background-color", "red");
        $("#timerdiv").css("color", "white");
        $("#timerdiv").css("font-size", "15px");
        $("#timerdiv").css("padding", "5px 10px");
        function blink_text() {
        $('#timerdiv').fadeOut(500);
        $('#timerdiv').fadeIn(500);
        }
        setInterval(blink_text, 1000);       
    }
    if (mins < 0) {
        stopInterval();
        $("#mins").text('00');
        $("#mins1").text('00');
        $.alert({
            title: 'Important!',
            content: "You exceeded the time to finish the exam. Click Ok to Submit. Your responses won't be recorded if you don't click on OK.",
            type: 'red',
            typeAnimated: true,
            buttons: {
                ok: {
                    text: 'Ok!',
                    btnClass: 'btn-green',
                    action: function(){
                        saveExamResponse("OK");
                        //stopInterval();
                         $("#finish").removeAttr('disabled');
                        $("#finish").click();
                    }
                }
            }
        });
        // alert('You exceeded the time to finish the exam. Click Ok to Submit.');
        // $('#finish').removeAttr('onclick');
        // $('#finish').click();


    }

    sec = 60;
}
if (mins >= 0) {
   if(sec<10)
    {
        seconds="0" + sec;
    $("#seconds").text(seconds);
    $("#seconds1").text(seconds);
    }
    else
    {
        $("#seconds").text(sec);
    $("#seconds1").text(sec);

    }
    
   
}
else {
    $("#seconds").text('00');
    $("#seconds1").text('00');
}

        //Ajax
        // $.ajax({

        //     type: 'POST',
        //     url: '<?php echo base_url();?>exam/setInterval',
        //     data: 'minutes=' + mins + '&seconds=' + sec + '&<?php echo $this->security->get_csrf_token_name();?>=<?php echo $this->security->get_csrf_hash();?>',
        //     cache: false,
        //     success: function (data) {

        //     }
        // });

         // mins = localStorage.olympiad_minutes_remaining;
         //            sec = localStorage.olympiad_seconds_remaining;   
                      //Ajax
        $.ajax({

            type: 'POST',
            url: '<?php echo base_url();?>exam/saveInterval',
            data: 'minutes=' + mins + '&seconds=' + sec + '&<?php echo $this->security->get_csrf_token_name();?>=<?php echo $this->security->get_csrf_hash();?>',
            cache: false,
            success: function (data) {

            }
        });           

localStorage.olympiad_minutes_remaining = mins;
localStorage.olympiad_seconds_remaining = sec;
}
function startInterval() {
    timer = setInterval("tictac()", 1000);
}
function stopInterval() {
    clearInterval(timer);

    localStorage.setItem("olympiad_minutes_remaining",0);
    localStorage.setItem("olympiad_seconds_remaining",0);
}


// $(document).mouseleave(function () {
//     console.log('out');
// });


// $(document).mouseenter(function () {
//     console.log('in');
// });

$("#myform").on("submit", function(){
   //Code: Action (like ajax...)
   // return false;

   stopInterval();
 })

 
  

</script>

<style>
@media all and (device-width: 768px) and (device-height: 1024px) and (orientation:portrait) {
  #finish{
    cursor: pointer !important;
  }
 
}
    .number-plate
    {
        height: auto;
    }
    .numbers
    {
    margin: 6px;
    min-height: 34px;
    padding: 5px 0;
    width: 35px;
    }

    .quction
    {
    padding-left: 0em !important;
    text-indent: 0em !important;
    }
</style>
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

             var base_url= "https://www.crestolympiads.com/crest/access_card";
             alert("You may view this link through a desktop only.");
             window.location.href = base_url;
        } else {
           
        }

    // });
});




</script>

<script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>







