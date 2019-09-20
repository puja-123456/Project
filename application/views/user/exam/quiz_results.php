<div class="col-md-12 padd">
    <div class="bradcome-menu hide_on_phone">
        <ul>
            <li><a href="<?php echo base_url(); ?>user">Home</a></li>
            <li><img src="<?php echo base_url(); ?>assets/designs/images/arrow.png"></li>
            <li><a href="#"> Worksheet Results </a></li>
        </ul>
    </div>
</div>
<div class="row margin">
    <div class="col-md-12">
        <div class="col-md-8 padd">
            <div class="col-md-12 padd">
                <div class="panel panel-default">
                    <div class="panel-heading p-hed">
                        <?php echo $quiz_info->name; ?>
                        <div>
                            <?php
                            
                            
//                            echo "<pre>";
//                            print_r($quizRecords);
//                            exit;
                            
                           // foreach ($quizRecords as $subj) { ?>
<!--                                <a href="#<?php echo $subj->subjectid . "_1"; ?>"><?php echo $subj->subjectname; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                            <?php //} ?>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body  pre-scrollable scroll-height">
                        <div id="morris-area-chart">
                            <?php $sno = 1;
                            foreach ($questions as $q) {
                               $i = 1;
//                                foreach ($row as $q) {
                                    ?>
                                    <div class="col-md-12 padd border" id="<?php echo $q->subjectid . "_" . $i++; ?>">
                                        <?php if (isset($q->questionImage) && $q->questionImage != '') { $question_image = '<img
                                            src="'.base_url() . 'assets/uploads/' . $q->questionImage .'"
                                            height="100" width="100"><br>'; } else { $question_image = ''; } ?>
                                        <h4 class="quction"><?php echo "<div class='one'>" . $sno++ . ". </div>" .$q->question.'<br>'.$question_image ; ?></h4>
                                        <table width="100%" border="0" class="answeers">
                                            <input type="radio" name="<?php echo $q->questionid; ?>" value="0" id=""
                                                   style="display:none;" <?php if (isset($user_options[$q->questionid])) if ($user_options[$q->questionid] == 0) echo "checked"; ?> >
                                            <?php
                                            if (isset($q->answer1)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <input type="radio" name="<?php echo $q->questionid; ?>"
                                                               value="1"
                                                               id="" <?php if (isset($user_options[$q->questionid])) if ($user_options[$q->questionid] == 'a') echo "checked"; ?> >
                                                        <?php if(isset($q->answer1Image) && $q->answer1Image != ''){ ?><img src="<?php echo base_url().'assets/uploads/'.$q->answer1Image ?>" height="100" width="100"><br><?php } ?><?php echo $q->answer1; ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <?php
                                            if (isset($q->answer2)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <input type="radio" name="<?php echo $q->questionid; ?>"
                                                               value="2"
                                                               id="" <?php if (isset($user_options[$q->questionid])) if ($user_options[$q->questionid] == 'b') echo "checked"; ?> >
                                                        <?php if(isset($q->answer2Image) && $q->answer2Image != ''){ ?><img src="<?php echo base_url().'assets/uploads/'.$q->answer2Image ?>" height="100" width="100"><br><?php } ?><?php echo $q->answer2; ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <?php
                                            if (isset($q->answer3)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <input type="radio" name="<?php echo $q->questionid; ?>"
                                                               value="3"
                                                               id="" <?php if (isset($user_options[$q->questionid])) if ($user_options[$q->questionid] == 'c') echo "checked"; ?> >
                                                        <?php if(isset($q->answer3Image) && $q->answer3Image != ''){ ?><img src="<?php echo base_url().'assets/uploads/'.$q->answer3Image ?>" height="100" width="100"><br><?php } ?><?php echo $q->answer3; ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <?php
                                            if (isset($q->answer4)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <input type="radio" name="<?php echo $q->questionid; ?>"
                                                               value="4"
                                                               id="" <?php if (isset($user_options[$q->questionid])) if ($user_options[$q->questionid] == 'd') echo "checked"; ?> >
                                                        <?php if(isset($q->answer4Image) && $q->answer4Image != ''){ ?><img src="<?php echo base_url().'assets/uploads/'.$q->answer4Image ?>" height="100" width="100"><br><?php } ?><?php echo $q->answer4; ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <?php
                                            //       if (isset($q->answer5)) {
                                            ?>
                                            <!--tr>
                              <td>
                                 <input type="radio" name="<?php echo $q->questionid; ?>" value="5" id="" <?php if (isset($user_options[$q->questionid])) if ($user_options[$q->questionid] == 5) echo "checked"; ?> >
                                 <?php echo $q->answer5; ?>
                              </td>
                           </tr-->
                                            <?php // } ?>
                                            <tr>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div
                                                        class="btn bg-primary   <?php if (isset($user_options[$q->questionid])) {
                                                            if ($user_options[$q->questionid] == $answers[$q->questionid]) echo "correct-answ"; else echo "wrong-answ";
                                                        } else echo "wrong-answ"; ?>">Correct
                                                        answer: <?php echo $answers[$q->questionid]; ?></div>
                                                    
                                                    
                                                    
                                                    
                                                    <?php if(!empty($user_options[$q->questionid])) { ?>
                                                        <div class="btn bg-primary correct-answ">Your answer: <?php echo $user_options[$q->questionid]; ?></div>
                                                    <?php } ?>
                                                     
                                                </td>
                                            </tr>
                                        </table>
                                        <span class="exp"><strong>Explanation:</strong> </br> 
                                            <?php 
                                            $supported_image = array('gif','jpg','jpeg','png','GIF','JPG','JPEG','PNG');
                                            $ext = strtolower(pathinfo($q->hint, PATHINFO_EXTENSION));
                                            if(in_array($ext, $supported_image)){
                                            	?>
                                            	<img src="<?php echo base_url().'assets/uploads/'.$q->hint ?>">
                                            	<?php 
                                            }else{
                                            	echo $q->hint;
                                            }
                                            
                                            ?>
                                            <?php  ?></span>
                                    </div>
                                <?php
                            } ?>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                    
                </div>
                
                <?php
              
                if($isFreeMember) { ?>
                    <a href="<?php echo base_url(); ?>buy" style="float:right;"><img src="<?php echo base_url().'assets/designs/images/buy_now.png'; ?>" alt="Buy Now" stylw="width:200px; height=50px"></a>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="lates-users">
                <div class="recent-msg-hed quiz-bhed">Quiz Info <i class="fa fa-exclamation-circle"></i></div>
                <div class="recent-msg-total">
                    <div class="lates-users-img-hed quiz-hed">
                        Total Questions:<br>
                    </div>
                    <div class="btn bg-primary wnm-user"><?php echo $totalQuestions; ?></div>
                </div>
                <div class="recent-msg-total">
                    <div class="lates-users-img-hed quiz-hed">
                        Time (minutes):<br>
                    </div>
                    <div class="btn bg-primary wnm-user"><?php echo $quiz_info->deauration; ?></div>
                </div>
                <?php if (isset($negativeMark)) { ?>
                    <div class="recent-msg-total">
                        <div class="lates-users-img-hed quiz-hed">
                            Negative Mark:<br>
                        </div>
                        <div class="btn bg-primary wnm-user"><?php echo $negativeMark; ?></div>
                    </div>
                <?php } ?>
            </div>
            <div class="lates-users top">
                <div class="recent-msg-hed quiz-bhed">General Info <i class="fa fa-clock-o"></i></div>
                <div class="recent-msg-total">
                    <div class="lates-users-img-hed quiz-hed">
                        Your Score is
                        :
                    </div>
                    <div class="btn bg-primary wnm-user"><?php echo $score; ?> / <?php echo $totalQuestions; ?></div>
                </div>
            </div>
            <div class="lates-users top">
                <div class="recent-msg-hed quiz-bhed">Results Summary <i class="fa fa-tasks"></i></div>
                <div class="recent-msg-total mar-resu-summ">
                    <div class="lates-users-img-hed quiz-hed result-sum-hed">
                        Attempted Questions : <?php echo $attempted_percentage . '%'; ?>
                    </div>
                    <div class="progress gress">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40"
                             aria-valuemin="0" aria-valuemax="100"
                             style="width: <?php echo $attempted_percentage . '%'; ?>">
                            <span class="sr-only"><?php echo $attempted_percentage . '%'; ?> Complete</span>
                        </div>
                    </div>
                </div>
                <div class="recent-msg-total mar-resu-summ">
                    <div class="lates-users-img-hed quiz-hed result-sum-hed">
                        Correct Answers : <?php echo $score_percentage . '%'; ?>
                    </div>
                    <div class="progress gress">
                        <div class="progress-bar  progress-bar-success" role="progressbar" aria-valuenow="20"
                             aria-valuemin="0" aria-valuemax="100"
                             style="width: <?php if ($score_percentage < 0) echo '0%'; else echo $score_percentage . '%'; ?>">
                            <span class="sr-only"><?php echo $score_percentage . '%'; ?> Complete</span>
                        </div>
                    </div
                        >
                </div>
                <div class="recent-msg-total mar-resu-summ">
                    <div class="lates-users-img-hed quiz-hed result-sum-hed">
                        Wrong Answers : <?php echo $wrong_percentage . '%'; ?>
                    </div>
                    <div class="progress gress">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="60"
                             aria-valuemin="0" aria-valuemax="100"
                             style="width: <?php echo $wrong_percentage . '%'; ?>">
                            <span class="sr-only"><?php echo $wrong_percentage . '%'; ?> Complete (warning)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lates-users top" style="display:none">
                <div class="recent-msg-hed quiz-bhed">High Scores in this Quiz <i class="fa fa-flag"></i></div>
                <?php if (count($previous_score)) {
                    foreach ($previous_score as $s) {
                        ?>
                        <div class="recent-msg-total">
                            <div class="lates-users-img">
                                <img
                                    src="<?php echo base_url(); ?>assets/uploads/images_200_200/<?php if (isset($s->image) && $s->image != '') echo $s->image; else echo "dflt-user-icn.png"; ?>"
                                    width="50" height="50">
                            </div>
                            <div class="lates-users-img-hed quiz-hed">
                                <?php echo $s->username; ?> <br>
                                <small><?php echo $s->dateoftest . "  " . $s->timeoftest; ?></small>
                                <br>
                            </div>
                            <div class="btn bg-primary wnm-user"><?php echo $s->score; ?>
                                / <?php echo $totalQuestions; ?></div>
                        </div>
                    <?php }
                } else echo '<div class="recent-msg-total">Please take an Exam to display the results here. If any taken Exam is still not available, please WhatsApp us at <strong>+91-92055-70955</strong>. </div>'; ?>
            </div>
        </div>
    </div>
</div>
<link href="<?php echo base_url(); ?>assets/designs/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/designs/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/designs/css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/designs/font.css" rel="stylesheet">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url(); ?>assets/designs/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url(); ?>assets/designs/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
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
    });
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/designs/js/TableBarChart.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/designs/css/TableBarChart.css"/>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript">
    $(function () {
        $('#source').tableBarChart('#target', '', false);
    });
</script>
<style>
    .progress-bar {
        border-radius: 2px;
        box-shadow: 0 2px 3px rgba(0, 0, 0, 0.25) inset;
        width: 250px;
        height: 20px;
        position: relative;
        display: block;
    }
    .progress-bar > span {
        background-color: blue;
        border-radius: 2px;
        display: block;
        text-indent: -9999px;
    }
</style>
