<!-- Bootstrap -->
<link href="<?php echo base_url(); ?>assets/designs/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/designs/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/designs/css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/designs/font.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/designs/css/morris-0.4.3.min.css" rel="stylesheet">
<link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/designs/images/img/fav.ico" type="image/x-icon">

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url(); ?>assets/designs/js/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url(); ?>assets/designs/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/designs/js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url(); ?>assets/designs/js/plugins/morris/raphael-2.1.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets/designs/js/plugins/morris/morris.js"></script>
<script src="<?php echo base_url(); ?>assets/designs/js/demo/dashboard-demo.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/designs/js/bar-chart.js"></script>

<script type="text/javascript">
    <?php if($result!="") { ?>
    google.load("visualization", "1", {packages: ["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            <?php echo $result;?>
        ]);

        var options = {
            title: 'My Performance in Quizzes',
            vAxis: {title: 'Quiz', titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
    <?php } ?>

</script>

<div class="col-md-12 padd">
    <div class="bradcome-menu">
        <ul>
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li><img src="<?php echo base_url(); ?>assets/designs/images/arrow.png"></li>
            <li><a href="#"> User Dashboard </a></li>
        </ul>
    </div>
</div>
<?php
$message = $this->session->flashdata('message');
if (isset($message)) echo $message; ?>
<div class="row">
    <div class="col-md-12">
        <a href="<?php echo base_url(); ?>" title="Go to home page">
            <div class="module dashboard">
                <div class="module-img"><img src="<?php echo base_url(); ?>assets/designs/images/home.png" width="49"
                                             height="48"></div>
                <div class="module-hed">Home</div>
            </div>
        </a>
<!--         <a href="<?php echo base_url(); ?>user">
            <div class="module dashboard">
                <div class="module-img"><i class="fa fa-dashboard" style="font-size:46px;color:#3c3c3c;"></i></div>
                <div class="module-hed">Dashboard</div>
            </div>
        </a>-->
        
        <a href="<?php echo base_url(); ?>user/quizzes" title="Take a quiz!">
            <div class="module dashboard">
                <div class="module-img"><img src="<?php echo base_url(); ?>assets/designs/images/exam.png" width="49"
                                             height="48"></div>
                <div class="module-hed">Worksheets</div>
            </div>
        </a>
        
<!--         <a href="<?php echo base_url(); ?>welcome/categories">
            <div class="module dashboard">
                <div class="module-img"><img src="<?php echo base_url(); ?>assets/designs/images/categories.png" width="49"
                                             height="48"></div>
                <div class="module-hed">Courses</div>
            </div>
        </a>-->
       
        <a href="<?php echo base_url(); ?>user/payment_history" title="View your payment history">
            <div class="module dashboard">
                <div class="module-img"><img src="<?php echo base_url(); ?>assets/designs/images/histroy.png" width="49"
                                             height="48"></div>
                <div class="module-hed">Payment History</div>
            </div>
        </a> 
        
        <a href="<?php echo base_url(); ?>user/quiz_history" title="View your performance">
            <div class="module dashboard">
                <div class="module-img"><img src="<?php echo base_url(); ?>assets/designs/images/histroy.png" width="49"
                                             height="48"></div>
                <div class="module-hed">Performance</div>
            </div>
        </a> 
        
        <a href="<?php echo base_url(); ?>user/profile" title="Update your profile">
            <div class="module dashboard">
                <div class="module-img"><img src="<?php echo base_url(); ?>assets/designs/images/profile.png" width="49"
                                             height="48"></div>
                <div class="module-hed">My Profile</div>
            </div>
        </a>
        
        <a href="<?php echo base_url(); ?>auth/change_password" title="Change your password">
            <div class="module dashboard">
                <div class="module-img"><img src="<?php echo base_url(); ?>assets/designs/images/profile.png" width="49"
                                             height="48"></div>
                <div class="module-hed">Change Password</div>
            </div>
        </a>
    </div>
</div>
<?php /*?><div class="row margin">
    <div class="col-md-12">
        <div class="col-md-9 padd">
            <div class="panel panel-default">
                <div class="panel-heading p-hed">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Chart of My Performance in Quizzes
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <?php if ($result != "") { ?>
                        <div id="chart_div"></div>
                    <?php } else { ?>
                        No Data Available
                    <?php } ?>
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
        <div class="col-md-3">
            <div class="recent-msg">
                <div class="recent-msg-hed">Recent User Quizzes</div>
                <div class="recent-msg-con">
                    <?php if (count($recentUserQuizzes)) {
                        foreach ($recentUserQuizzes as $l) {

                            ?>
                            <div class="recent-msg-total">
                                <div class="recent-msg-img">
                                    <img
                                        src="<?php echo base_url(); ?>assets/uploads/images_200_200/<?php if (isset($l->image) && $l->image != '') echo $l->image; else echo "dflt-user-icn.png"; ?>"
                                        width="50" height="50">
                                </div>
                                <div class="recent-msg-img-hed">
                                    <?php echo $l->username; ?><br>
                                    <small><?php echo $l->dateoftest; ?></small>
                                    <br>
                                    <small><?php echo $l->name . ": " . $l->score . "/" . $l->total_questions; ?></small>
                                    <br>
                                </div>
                            </div>
                        <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div><?php */?>
<?php /*?><div class="row">
    <div class="col-md-12 padd">
        <div class="col-md-6">
            <div class="lates-users">
                <div class="recent-msg-hed" id="latest_quizzes">Latest Quizzes</div>
                <?php if (count($exams) > 0) {
                    foreach ($exams as $exam) {
                        ?>
                        <div class="recent-msg-total">
                            <div class="lates-users-img-hed">
                                <?php echo $exam->name; ?><br>
                                <small>Exam Type: <?php echo $exam->quiztype; ?>&nbsp;
                                    Duration:<?php echo $exam->deauration; ?></small>
                                <br>
                            </div>
                           <!--  <a href="<?php echo base_url(); ?>user/instructions/<?php echo $exam->quizid; ?>/<?php echo $exam->name; ?>">
                                <div class="btn bg-primary wnm-user">View</div>
                            </a> -->
                            <a onclick="return set_session()" href="<?php echo base_url(); ?>user/instructions/<?php echo $exam->quizid; ?>/<?php echo $exam->name; ?>">
                                <div class="btn bg-primary wnm-user">Take Quiz</div>
                            </a>
                        </div>
                    <?php }
                } else {
                    ?>
                    <div class="recent-msg-total">
                        <div class="lates-users-img-hed">
                            No Exams Available<br>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="lates-users">
                <div class="recent-msg-hed">Top Rankers</div>
                <?php if (count($topRankers)) {
                    foreach ($topRankers as $t) {
                        ?>
                        <div class="recent-msg-total">
                            <div class="lates-users-img">
                                <img
                                    src="<?php echo base_url(); ?>assets/uploads/images_200_200/<?php if (isset($t->image) && $t->image != '') echo $t->image; else echo "dflt-user-icn.png"; ?>"
                                    width="50" height="50">
                            </div>
                            <div class="lates-users-img-hed">
                                <?php echo $t->username; ?><br>
                                <small><?php echo $t->dateoftest . " " . $t->timeoftest; ?></small>
                                <br>
                            </div>
                            <div class="btn bg-primary wnm-user not-hover"
                                 style="cursor:default;"><?php echo $t->name . ": " . $t->score . "/" . $t->total_questions; ?></div>
                        </div>
                    <?php }
                }
                ?>
            </div>
        </div>
    </div>
</div><?php */?>
<script>
function set_session(){
    $.ajax({
        type:'post',
        data:{session:'set','<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'},
        url:'<?php echo base_url();?>welcome/set_freetrial_session',
        async:false,
        success:function(data){
                        return  true;
                }
    });
}
</script>
