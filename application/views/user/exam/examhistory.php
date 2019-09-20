<link href="<?php echo base_url(); ?>assets/designs/css/jquery.dataTables.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/1.0.0/css/dataTables.responsive.css" rel="stylesheet">
<link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/designs/images/img/fav.ico" type="image/x-icon">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/designs/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/designs/js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/designs/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/1.0.3/js/dataTables.responsive.js"/>
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function () {
    $('#example').dataTable({searching: false, paging: false});
});
</script>
<style type="text/css">
@media only screen and (min-width: 768px){
    #cmbSubjects{
        width: 40%;
    }
}
</style>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!--<script src="<?php echo base_url(); ?>assets/general/js/bootstrap.min.js"></script>-->
<div class="col-md-12 padd">
    <div class="bradcome-menu hide_on_phone">
        <ul>
            <li><a href="<?php echo base_url(); ?>user">Home</a></li>
            <li><img  src="<?php echo base_url(); ?>assets/designs/images/arrow.png"></li>
            <li><a href="#"> Test </a></li>
        </ul>
    </div>
</div>

<?php
$CI = & get_instance();
$CI->load->model('Member');
?>         
<div class="row">
    <div class="col-md-12" style="overflow-x: auto;">

        <table id="example" class="cell-border table table-striped table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Quiz</th>
                    <th>Course</th>
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Score</th>
                    <th>H.Score</th>
                    <th>Median Score</th>
                    <th>Percentile</th>
                    <th>Detailed Result</th>
                </tr>
            </thead>
<!--                 <tfoot>
                    <tr>
                        <th>S.No.</th>
                        <th>Quiz</th>
                        <th>Course</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Score</th>
                        <th>H.Score</th>
                        <th>Median Score</th>
                        <th>Percentile</th>
                        <th>Detailed Result</th>
                    </tr>
                </tfoot> -->
                <tbody>
                    <?php

                    if (count($quiz_history) > 0) {
                        $q = 1;
                        foreach ($quiz_history as $h) {
                            ?>
                            <tr>
                                <td style="text-align:right"><?php echo $q; ?></td>
                                <td><?php echo $h->name; ?></td>
                                <td><?php echo $h->category_name; ?></td>
                                <td>
                                    <?php echo $h->sub_category_name; ?>
                                </td>
                                <td><?php echo $h->dateoftest; ?></td>
                                <td style="text-align:center"><?php echo $h->score; ?></td>
                                <td style="text-align:center">
                                    <?php echo $h->highest_score; ?>
                                </td>
                                <td style="text-align:center">
                                    <?php
                                    echo $h->median;
                                    ?>
                                </td>
                                <td style="text-align:center">
                                    <?php
                                    //echo empty($h->percentile) ? $h->percentile : $h->percentile .'%' ;
                                    //echo $h->percentile.'%';
                                    $percentile = $CI->Member->calculatePercentile($h->score, $h->highest_score);
                                    if (empty($percentile))
                                        echo '0';
                                    else
                                        echo $percentile . ' %'; 
                                    ?>
                                </td>
                                <td> <a href="<?php echo base_url(); ?>user/performance/<?php echo $h->id; ?>" target="_blank">
                                    <div class="btn bg-primary  exam-histry-btn"> View</div>
                                </a></td>
                            </tr>
                            <?php
                            $q++;
                        }
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>


   <!--  <link href="<?php echo base_url(); ?>assets/designs/css/jquery-confirm.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/designs/js/jquery-confirm.min.js"></script>

    <script type="text/javascript">

    $().ready(function(){ 
        jconfirm.defaults = {
            typeAnimated: true,
            animateFromElement: true,
            smoothContent: true,
            columnClass: 'col-md-6 col-md-offset-3 col-xs-12 ',
            containerFluid: true, 
            theme: 'modern'
        };
    });
    $().ready(function(){
            $.confirm({
                title: 'Important!',
                content: 'The results of August 26<sup>th</sup> Mathematics Mock test have not been declared. The test has been rescheduled for <strong>2<sup>nd</sup> September</strong> along with <strong>Science</strong> Mock test. A number of users were not able to submit the test due to slow server. This was due to unprecedented traffic on our site on August 26<sup>th</sup>. We are currently upgrading our server.<br><br> We deeply regret inconvenience caused to our dear students.<br><br> We hope to see more students practicing for <strong>Science</strong> & <strong>Mathematics</strong> Mock tests this week!',
                type: 'green',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Okay',
                        btnClass: 'btn-green',
                        action: function(){
                        }
                    }
                }
            });
    });

    </script> -->