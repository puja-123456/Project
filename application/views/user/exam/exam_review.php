<?php
$img_url = $this->config->item('image_src_url');
?>


<script>

    //$(window).load(function() {

$(document).ready(function () {
    
 // localStorage.setItem("minutes_remaining",0);
 //    localStorage.setItem("seconds_remaining",0);

 window.localStorage.clear();

    // localStorage.removeItem("minutes_remaining");
    // localStorage.removeItem("seconds_remaining");

});

</script>


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

<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/designs/js/TableBarChart.js"></script>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/designs/css/TableBarChart.css"/> -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript">
//    $(function () {
//        $('#source').tableBarChart('#target', '', false);
//    });
$(function () {
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
            //content: 'Are you sure you want to submit the quiz?',
            content: 'Thanks for taking the test, we will redirect you to the home page! (The answer keys will be available only on 30th and 31st July (Tuesday and Wednesday) in the View and Challenge section of your dashboard)',
            type: 'yellow',
            typeAnimated: true,
            buttons: {
                ok: {
                    text: 'OK',
                    btnClass: 'btn-green',
                    action: function(){
                        // saveExamResponse("OK");
                        // stopInterval();
                        // $("#finish").click();
                        window.location.href = "<?php echo base_url()?>";
                    }
                }
               
            }
        });

});
    
    
    function viewFlagBox(intQuestionId) {
        $("#"+  intQuestionId +"_comment").toggle();
        $("#"+ intQuestionId + "_flag_button").toggle();
        
        markQuestionFlag(intQuestionId);
    }
    
    function markQuestionFlag(intQuestionId) {
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
            data: 'intQuestionId=' + intQuestionId + '&description=' + description + '&<?php echo $this->security->get_csrf_token_name();?>=<?php echo $this->security->get_csrf_hash();?>',
            //data: { intQuestionId :  intQuestionId , description :  description },
            cache: false,
            success: function (data) {
                    alert('Thanks for your feedback.');
                    $("#"+intQuestionId+"_comment").hide();
                    $("#" + intQuestionId+ "_flag_button").hide();
            }
        });
    }
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

