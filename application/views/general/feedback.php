
<style>@media (min-width: 992px)
{
.col-md-offset-3 {
    margin-left: 25%;
}

.col-md-6 {
    width: 50%;

}
}
</style>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-confirm.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<link href="<?php echo base_url(); ?>assets/css/jquery-confirm.css" rel="stylesheet">



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
    $("#add_feedback_form").on("click",function(){
        $.confirm({
            title: 'Unicus Olympiads- Feedback',
            content: 'url:<?=base_url();?>assets/feedback-form.html',
            buttons: {
                sayMyName: {
                    text: 'Submit',
                    btnClass: 'btn-orange',
                    action: function () {
                        var comment = this.$content.find('textarea#comment').val().trim();
                        var testimonial = this.$content.find('textarea#testimonial').val().trim();
                        if($(window).width()<768){
                            var scale = this.$content.find("select#select_scale").find("option:selected").val();
                        }else{
                            var scale = this.$content.find("input[name='scale']:checked").val();
                        }
                        var user_id = '<?=$this->session->userdata('user_id');?>';
                        var csrf_hash = '<?php echo $this->security->get_csrf_hash(); ?>';
                        var errorText = this.$content.find('.text-danger');
                        if ( (comment.length < 1) || !scale) {
                            $.alert({
                                title: "Your Feedback is Important",
                                content: "Please rate this test and provide your comment.",
                                type: 'red'
                            });
                            return false;
                        } else {
                            jQuery.ajax({
                                type: 'post',
                                url: '<?php echo base_url() ?>crest/add_feedback',
                                data: {user_id: user_id, comment: comment, testimonial: testimonial, rating: scale, csrf_test_name: csrf_hash},
                                dataType: 'json',
                                async: false,
                                success: function (response) {
                                    $.alert('Thanks, have a great day!');
                                }
                            });
                        }
                    }
                },
                later: {
                    text: 'Later',
                    action: function () {
                    }
                    // do nothing.
                }
            }
        });
    });
});
</script>
<style>
.jconfirm .jconfirm-box div.jconfirm-title-c .jconfirm-title { 
    font-size: 20px !important; 
}
@media only screen and (min-width: 768px){
.notas {
    padding: 3px;
    padding-left: 21% !important;
}

}
@media only screen and (max-width: 768px){
.jconfirm .jconfirm-box div.jconfirm-title-c .jconfirm-title {
    margin-right: 53px !important;
    font-size: 20px !important;
}
.jconfirm.jconfirm-modern .jconfirm-box {  
    padding: 24px 15px 15px;
}
.jconfirm { 
    left: -25px !important;
    }
}


</style>