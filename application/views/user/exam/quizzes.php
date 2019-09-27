<!-- Bootstrap -->
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/font.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/jquery.dataTables.css" rel="stylesheet">
<link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/images/img/fav.ico" type="image/x-icon">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function () {

        $('#example').dataTable({searching: false, paging: false});
    });




    function get_date_format(date)
    {
        var formattedDate = new Date(date);
        var d = formattedDate.getDate();
        var m = formattedDate.getMonth();
        m += 1;  // JavaScript months are 0-11
        var y = formattedDate.getFullYear();
        var formatted_date = d + "-" + m + "-" + y;

        return formatted_date;

    }



</script>


<div class="col-md-12 padd">
    <div class="bradcome-menu hide_on_phone">
        <ul>
            <li><a href="<?php echo base_url(); ?>user">Home</a></li>
            <li><img  src="<?php echo base_url(); ?>assets/images/arrow.png"></li>
            <li><a href="#"> Worksheets </a></li>
        </ul>
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
<!-- <div class="row">
    <div class="col-md-12">
    <p>
        Aryabhatta Inter-school Mathematics competition is an initiative of Summer Fields School, Kailash Colony, New Delhi. 
        
        </p>
        <p>We are conducting this mock test for classes 5 and 8. However, we are encouraging students of classes 4-6 to attempt class 5 test and students of classes 7-10 to attempt class 8 test.
        </p>
        <p>
        
            Please note that this is a <strong>2-hour test</strong> which would really test your numerical and conceptual understanding.
        
    </p>
    </div>
</div> -->

<div class="row" bgcolor="#FFFFFF" ondragstart="return false" onselectstart="return false">
    <div class="col-md-12" style="overflow-x: auto;">

        <table id="example" class="cell-border table table-striped table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Quiz Title</th>
                    <th>Course</th>
                    <th>Subject</th>
                    <th>Class</th>
                    <th>Duration</th>
                    <th>Action</th>
                </tr>
            </thead>
    <!--         <tfoot>
                <tr>
                    <th>S.No.</th>
                    <th>Quiz Title</th>
                    <th>Course</th>
                    <th>Subject</th>
                    <th>Class</th>
                    <th>Duration</th>
                    <th>Action</th>
                </tr>
            </tfoot>
     -->        <tbody>
                <?php
                $CI = & get_instance();
                $CI->load->model('Member');

                $i = 1;
             // print_r($records);die;

                if (count($records) > 0) {
                    foreach ($records as $r) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $r->name; ?></td>
                            <td><?php echo $r->catname; ?></td>
                            <td><?php echo $r->subcatname; ?></td>

                            <td><?php echo "class".$user_class; ?></td>
                            <td><?php echo $r->deauration; ?> Min</td>
                            <td>
        <?php
        $subcat_id = $r->subcatid;
        $userid = $this->ion_auth->get_user_id();
        $chk_payment_status = false;
        $quiz_id = $r->quizid;
        $pass_arg = $r->slug;
        $attemptsLeft = $CI->Member->getQuizRemainingAttempts($userid, $r->quizid);
   //  echo $attemptsLeft;die;
        //echo $attemptsLeft = $CI->Member->getQuizRemainingAttempts($userid, $r->quizid);

        
        ?>
                                <?php if (!empty($attemptsLeft)) { ?>
                                    <a <?php if ($r->quiztype == "Free" || $chk_payment_status == true) { ?>
                                        onclick="return set_session()"
                                        <?php }if ($r->quiztype == "Paid" && $chk_payment_status == false) { ?>onclick="return unset_session()"<?php } ?> href="<?php echo base_url(); ?>user/instructions/<?php echo ($pass_arg); ?>" class="btn bg-primary wnm-user" style="margin:0px"> <i class="fa fa-puzzle-piece"></i> Take Exam</a>
                                    <span style="font-size:10px; display:block; font-style: italic; color:red; padding-top: px; margin-top: 0px">
                                    <?php if ($attemptsLeft > 1) echo $attemptsLeft . ' attempts left';
                                    else echo $attemptsLeft . ' attempt left'; ?></span>
                                <?php } else { ?>
                                    <span style="font-size:10px; display:block; font-style: italic; color:red; padding-top: px; margin-top: 0px">0 attempt left</span>
                                    <?php } ?>

                            </td>
                        </tr>
                            <?php
                            }
                        } else
                            "<tr><td colspan='4'>Content is being updated. Please wait for 48 working hours and check again. If the quizzes are still not available, please WhatsApp us at <strong>+91-92055-70955</strong>. </td></tr>";
                        ?>

            </tbody>
        </table>
    </div>
</div>


<script type="text/javascript">
    $().ready(function () {

        var table = $('#example').DataTable();

        // table.search($("#cmbSubjects").val()).draw();


        $("#cmbSubjects").one(function () {
            table.search(this.value).draw();
        });


        $("#cmbSubjects").change(function () {
            table.search(this.value).draw();
        });

    });

</script>    

<style>
    .form-group > select {
        border-radius: 2px !important;
        font-weight: 600;
        padding: 2px !important;
        width: 100%;
    }
.logo img {
    width: 200px;
}
</style>
<script>
    function set_session() {
        $.ajax({
            type: 'post',
            data: {session: 'set', '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
            url: '<?php echo base_url(); ?>welcome/set_freetrial_session',
            async: false,
            success: function (data) {
                return  true;
            }
        });
    }

    function unset_session() {
        $.ajax({
            type: 'post',
            data: {session: 'unset', '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
            url: '<?php echo base_url(); ?>welcome/unset_freetrial_session',
            async: false,
            success: function (data) {
                return  true;
            }
        });
    }
</script>


<script>
    $(document).ready(function () {

        $('div').bind('copy paste cut', function (e) {
            e.preventDefault();
            return false;
        });
    });
</script>