<?php 

// print_r($_COOKIE);die;
//  echo get_cookie('isExamStarted');die; ?>
<link href="<?php echo base_url(); ?>assets/css/font.css" rel="stylesheet">
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/x-icon">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script>
        // echo date('d-m-Y h:i:s A');

        function isChecked() {
            if (document.getElementById("exam_chkbox").checked == true) {
                <?php set_cookie('isExamStarted','1','3600');  ?>
                // var user_id = "<?php echo $this->session->userdata('user_id');?>";
                // var email = "<?php echo $this->session->userdata('email'); ?>";
                // var ip_address = "<?php echo $this->session->userdata('ip_address'); ?>";
                // var browser = "<?php echo $this->session->userdata('user_agent'); ?>";
                // var csrf_hash = '<?php echo $this->security->get_csrf_hash(); ?>';
                
                // jQuery.ajax({
                //   type:'post',
                //   url:'<?php echo base_url()?>user/user_entries',
                //   data:{user_id:user_id,email:email,ip_address:ip_address,browser:browser,csrf_test_name:csrf_hash},
                //   dataType:'json',
                //   async:false,
                //   success:function(response){
                     // return true;
                     window.location = '<?php echo base_url();?>exam/startexam/<?php echo $exams[0]->slug;?>';
                     // window.open("<?php echo base_url();?>exam/startexam/<?php echo $exams[0]->slug;?>" ,"Daily Quiz", 'height='+screen.height+', width='+screen.width)
                     
             //     },
             // });
               
            }
            else {
                alert("Please check the instructions.");
                return false;
            }
        }

     
  


        </script>
        <div class="col-md-12 padd">
            <div class="bradcome-menu hide_on_phone">
                <ul>
                   <!--  <li><a href="<?php echo base_url(); ?>user">Home</a></li>
                    <li><img src="<?php echo base_url(); ?>assets/images/arrow.png"></li> -->
                   <!--  <li><a href="#">Test Instructions</a></li> -->
                     <li><a href="#" style="font-size:20px;"><?php $record = $exams[0]; if (isset($record->name)) echo $record->name; ?></a>
                </ul>
            </div>
        </div>

        <?php
        $message = $this->session->flashdata('message');


    ?>
    <div class="row margin">
        <div class="col-md-12">
            <div class="col-md-12 padd">
              
               <!--   <div class="sectin-hed">
                  
                    <span style="color:#000"><?php $record = $exams[0];
                    echo $record->name;
                    ?></span>
                </div> -->
               
     <!-- <center><em><strong>Please read the following instructions carefully</strong></em></center> -->
 </div>
 <div class="col-md-8 col-xs-12 col-sm-12 padd" style="font-size: 17px;">
  <!--   <div class="sectin-hed"> -->
       <!--  General Instructions: -->
       <center><em><strong>Please read the following instructions carefully</strong></em></center>

    <!-- </div> -->
</div>
<div class="col-md-8 col-xs-12 col-sm-12" style="font-size: 15px;">
    <ol>
        <li>This exam is based on <strong>MCQ Pattern</strong>. There are 4 options for each question of which only 1 option is <span class="text-success"><strong>correct</strong></span>.</li>
        <li>This test is of <strong><?php echo $record->deauration; ?> minutes</strong> duration and the countdown will begin as soon as you click on <strong>Start Test</strong> button at the bottom.</li>
        <li>You have to select the <strong>Correct Answer</strong> and click on <strong>Next</strong> or <strong>Previous</strong> to navigate. Your answer is saved only when you click on the next button.</li>
        <li>You have an option to <strong>Select and mark for review</strong> to review the question again.</li>
        <li><strong>Clear Answer</strong> unselects the answer and mark the question as <strong>Not Answered</strong>.</li>
        <li>Click on <strong>Finish</strong> to submit the answers. You won't be able to change the answers once you click on <strong>Finish</strong>. Make sure to review all the questions before ending it.</li>
        <li>When the clock runs out, the exam ends by default. Please make sure that you click OK to submit your exam.</li>
        <li>You may be barred from the exam or required to appear for retest if you are found using unfair means or if any suspicious activity is detected.</li>
        <li>The last 10 questions in the test are Achiever Section questions.</li>
        <p class="blink-two">Please Note: Anyone found taking videos or screenshots of the exam will be disqualified without notice.
        </p>
    </ol>

    <style>
     .blink-two {
         animation: blinker-two 2.4s linear infinite;
         color: #ff0000;
         font-weight: bold;
         font-size:15px;
       }
       @keyframes blinker-two {  
         100% { opacity: 0; }
       }

</style>
    <div class="infor-mation">
  
                <div class="row">
                    <div class="col-md-12">
                        
                      
                        <table width="100%" border="0">
                          
                            <tr>
                                <td width="4%" valign="top">
                                    <form name="form1" method="post" action="">
                                        <input type="checkbox" name="checkbox" id="exam_chkbox" checked="checked">
                                        <label for="checkbox"></label>
                                    </form>
                                </td>
                                <td colspan="2">&nbsp;The computer available to me is in proper working condition. I have read and understood the instructions given above.
                                </td>
                            </tr>
                       
                            <tr>
                                <td>&nbsp;</td>
                                <td colspan="2">
                                    <?php if( $today_date >= $start_date && $today_date <= $end_date)
         { ?>
                                   
                                    <a style="cursor:pointer;" onclick="isChecked(); return false;">
                                        <div class="btn bg-primary wnm-user rig-ht" style="background: #26a69a;"><!-- <i class="fa fa-sign-in"></i> --><?php 
                                        if(get_cookie('isExamStarted')==1)
                                        { 
                                            echo "Resume Test";
                                             } else
                                              { echo "Start Test"; } ?> 
                                        </div>
                                    </a>
                                <?php } else { ?>

                                       <a style="pointer-events: none;" onclick="isChecked(); return false;">
                                        <div class="btn bg-primary wnm-user rig-ht" style="background: #26a69a;"><!-- <i class="fa fa-sign-in"></i> --><?php 
                                        if(get_cookie('isExamStarted')==1)
                                        { 
                                            echo "Resume Test";
                                             } else
                                              { echo "Start Test"; } ?> 
                                        </div>
                                    </a><?php } ?>
                                   

                        </td>

                    </tr>
                </table>


<p id="time"></p>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
<script type="text/javascript">


// alert(start_time);
// if(timestamp==start_time)

// {
//     alert("start your test now");
// }

//var timestamp = '<?=time();?>';
function updateTime(){

        var x = new Date();

    // date part ///
var month=x.getMonth()+1;
var day=x.getDate();
var year=x.getFullYear();
if (month <10 ){month='0' + month;}
if (day <10 ){day='0' + day;}
var timestamp= year+'-'+month+'-'+day;

// time part //
var hour=x.getHours();
var minute=x.getMinutes();
var second=x.getSeconds();
if(hour <10 ){hour='0'+hour;}
if(minute <10 ) {minute='0' + minute; }
if(second<10){second='0' + second;}

var timestamp = timestamp + ' ' +  hour+':'+minute+':'+second;


var start_time = '<?php echo $start_date;?>';

  $('#time').html(Date(timestamp));

  // alert(start_time);

  // alert(timestamp);
  // alert(start_time);

  if(timestamp==start_time)

{
   location.reload(true);
}
  timestamp++;
}
$(function(){
  setInterval(updateTime, 1000);
});
</script>
               
            </div>
        </div>


    </div>
</div>


<div class="col-md-4 col-xs-12 col-sm-12" style="font-size: 15px;">
  
                <div class="row">
                    <div class="col-md-12">
                        
                      
                         The question palette at the left of screen shows one of the following status of each question:
            <br>
            <table width="100%" border="0" class="pallette_table">
                <tr>
                    <td>
                        <div class="btn bg-primary not-visited"><!-- <i class="fa fa-eye-slash"></i> --><i class="fa"></i></div>
                    </td>
                    <td>You have not visited the question yet.</td>
                </tr>
                <tr>
                    <td>
                        <div class="btn bg-primary not-answered"><!-- <i class="fa fa-times-circle"></i> --><i class="fa"></i></div>
                    </td>
                    <td>You have not answered the question.</td>
                </tr>
                <tr>
                    <td>
                        <div class="btn bg-primary answered"><!-- <i class="fa fa-check-square-o"></i> --><i class="fa"></i></div>
                    </td>
                    <td>You have answered the question.</td>
                </tr>
                <tr>
                    <td>
                        <div class="btn bg-primary review"><!-- <i class="fa fa-bolt"></i> --><i class="fa"></i></div>
                    </td>
                    <td>You have answered the question but have marked the question for review.</td>
                </tr>
            </table>
               
            </div>
        </div>


    </div>

</div>
</div>

<script>
function check_subcat(){
	var categories = [];
	
    jQuery.each(jQuery("input[name='subcat_ids']:checked"), function(){            
    	categories.push(jQuery(this).val());
    });
    
    var csrf_hash = '<?php echo $this->security->get_csrf_hash(); ?>';
    jQuery.ajax({
      type:'post',
      url:'<?php echo base_url()?>user/set_discountcat',
      data:{categories:categories,csrf_test_name:csrf_hash},
      dataType:'json',
      async:false,
      success:function(response){
       return true;
   },
});
    return true;
}
</script>


<?php //echo $this->output->enable_profiler(TRUE); ?>

<style>
    .pallette_table td
    {
        
            padding:5px;
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