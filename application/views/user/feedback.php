
<!-- <script src="<?php //echo base_url(); ?>assets/js/jquery.min.js"></script> -->

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

<link href="<?php echo base_url(); ?>assets/css/jquery-confirm.css" rel="stylesheet">

<script src="<?php echo base_url(); ?>assets/js/jquery-confirm.min.js"></script>

<script type="text/javascript">
    $("#add_feedback_form").on("click",function(){
        $("#feedback-form").focus();
    });
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
            title: 'CREST Olympiads - Feedback',
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
                        var ppv_check = 0;
                        if ($('input.checkbox_check').is(':checked')) {
                            ppv_check = 1;
                        }
                        //var testimonial_video = this.$content.find('input#testimonial_video').val().trim();
                        //var testimonial_video_name = $('#testimonial_video')[0].files[0].name;
                        // var fsize = $('#testimonial_video')[0].files[0].size;
                        // var file_size = fsize / (1024 * 1024);
                        var user_id = '<?=$this->session->userdata('user_id');?>';
                        var csrf_hash = '<?php echo $this->security->get_csrf_hash(); ?>';
                        var errorText = this.$content.find('.text-danger');
                        if ( (comment.length < 1) || !scale) {
                            $.alert({
                                title:"Your Feedback is Important",
                                content: "Please rate this test and provide your comment.",
                                type: 'red'
                            });
                            return false;
                        }
                      //   else if(testimonial_video.length > 1)
                      //   {
                      //   var ext = $('#testimonial_video').val().split('.').pop().toLowerCase();
                      //   if($.inArray(ext, ['avi','flv','wmv','mov','mp4']) == -1) {
                      //       //alert('Invalid extension for Video uploaded!');
                      //        $.alert({
                      //           content: "Please upload a valid video file (e.g. avi, flv, wmv, mov, mp4)(max. size 25 MB)",
                      //           type: 'red'
                      //       });
                      //       return false;
                      //   }
                      // }
                       else {
                            jQuery.ajax({
                                type: 'post',
                                url: '<?php echo base_url() ?>crest/add_feedback',
                                data: {user_id: user_id, comment: comment, testimonial: testimonial, rating: scale, ppv_check:ppv_check, csrf_test_name: csrf_hash},
                                dataType: 'json',
                                async: false,
                                success: function (response) {
                                    $.alert('Thanks for your feedback. Have a great day!');
                                }
                            });
                        }
                    }
                },
                later: function () {
                    // do nothing.
                }
            }
        });
    });
});
</script>