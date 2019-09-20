<script>

function do_user_photo_div(action)
{
    if (action == "show") {
        $('#user_photo_div').fadeIn();
        $('html, body').animate({scrollTop: $('#user_photo_div').offset().top}, 2000);
        $('#user_photo').focus();
    }
    else if (action == "hide") {
        $('#user_photo_div').fadeOut();
        $('#user_photo').val('');
    }

}
</script>

<?php
if (count($details)) {
    foreach ($details as $d) {
        ?>
        <div class="col-md-12 padd">
            <div class="bradcome-menu">
                <ul>
                    <li><a href="<?php echo base_url(); ?>user">Home</a></li>
                    <li><img  src="<?php echo base_url(); ?>assets/designs/images/arrow.png"></li>
                    <li><a href="#">  My Profile </a></li>
                </ul>
            </div>
        </div>
        <div class="row margin">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="col-md-12">
                <div class="col-md-2 col-sm-3 col-xs-12">
                    <img src="<?php echo base_url(); ?>assets/uploads/images_200_200/<?php if ($d->image != '') echo $d->image;
                    else echo 'dflt-user-icn.png'; ?>"  class="img-responsive thumbnail">
                    <a id="user_change_photo" onclick="do_user_photo_div('show')" style="cursor:pointer;">Upload Student's Picture</a>
                </div>


                <div class="col-md-9 col-sm-9 col-xs-12">


                    <div class="col-md-12 padd">

                        <div class="sectin-hed">
                            Personal Details
                        </div>

                        <?php if (!empty($rewardPoints)) { ?>
                        <span style="color:red;">You have <?php echo $rewardPoints; ?> reward points in your account. You can redeem the points <a href="<?php echo base_url(); ?>buy" alt="" target="_blank">here</a></span>
                        <?php } ?>


                    </div>
                    <div class="col-md-8">
                        <div class="hed-line"> </div>
                    </div>
                    <div class="col-md-12 padd">
                        <form method="post" id="user_profile_form" action="<?php echo base_url(); ?>user/update_profile" enctype="multipart/form-data">

                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />

<!--                            <div class="details"> 
<strong>Your Name</strong>: <?php echo $d->first_name . ' ' . $d->last_name; ?> 

</div>-->

<div class="details"> 
    <strong>Email</strong> : <?php echo $d->email; ?>
</div>


<div class="details">
    <strong> Student's Name<span class="red">*</span> </strong>: 
    <input type="text" name="student_name" id="student_name" value="<?php echo $d->student_name; ?>">             

</div>


<div class="details">
    <strong> Course </strong>: Free Saturday to Saturday Mock Test
    <input type="hidden" name="course" id="course" value="14">

</div>

<div class="details">
    <strong> Phone<span class="red">*</span> </strong>: 
<div>
                  <?php
                  
                  if(empty($d->phone)) {
                            ?><div class="input-group col-lg-6 col-md-6" style="float:left;padding-right:10px">
                   <?php
                    $this->load->view('auth/select_phone');
                    ?>
                  </div>
                  <div class="input-group col-lg-6 col-md-6">
                    <?php
                  }
                  else{
                  ?>
                  <div class="input-group col-lg-12 col-md-12">
                  <?php
                }
                  ?>
                   <input type="text" name="phone" maxlength="17" value="<?php echo $d->phone;?>" <?php if(!empty($d->phone)) echo 'readonly=""'; ?> />
                   </div>
                   </div>
    <!--                   <input type="hidden" name="phone" value="<?php echo $d->phone; ?>">-->
    <input type="hidden" name="user" value="<?php echo $d->id; ?>">

</div>

<?php if(empty($d->class)) { ?>
<div class="details">
    <strong> Class<span class="red">*</span> </strong>: 
    <?php 
    $classes = array();
    for($i = 1; $i<=10; $i++) {
        $classes['Class '.$i] = 'Class '.$i;
    }
    ?>
    <select class="form-control" id="schoolclass" name="schoolclass">
        <option value="">--Select--</option>
        <option value="KG/Prep">KG/ Prep</option>
        <?php 
        foreach($classes as $class) { ?>
        <option value="<?php echo $class; ?>" <?php if($class == $d->class) echo "selected"; ?>><?php echo $class; ?></option>
        <?php }
        ?>
    </select>

</div> 
<?php } else { ?>
<div class="details">
    <strong><?php echo $d->class; ?></strong>
        <input type="hidden" name="schoolclass" id="schoolclass" value="<?php echo $d->class; ?>">
    </div>
    <?php } ?>


    <div class="details">
        <strong> Date of Birth<span class="red">*</span> </strong>: 
        <input type="text" name="dob" id="dob" maxlength="150" value="<?php echo $d->dob; ?>" />
    </div>

    <div class="details">
        <strong> Gender<span class="red">*</span> </strong>: 
        <?php
        if(empty($d->gender)){
            ?>

        <select class="form-control" id="gender" name="gender">
            <option value="">--Select--</option>
            <option value="Male" <?php if($gender == $d->gender) echo "selected"; ?>>Male</option>
            <option value="Female" <?php if($gender == $d->gender) echo "selected"; ?>>Female</option>
        </select>
            <?php
        }
        else{
            ?>
            <strong><?php echo $d->gender; ?></strong>
        <input type="hidden" name="gender" id="gender" value="<?php echo $d->gender; ?>">
    <?php
        }
        ?>
    </div>
    <div class="details">
        <strong> School<span class="red">*</span> </strong>: <input type="text" name="school" id="school" maxlength="150" value="<?php echo $d->school; ?>" />
    </div>
    <div class="details">
        <strong> School Address<span class="red">*</span> </strong>: <input type="text" name="school_address" maxlength="150" value="<?php echo $d->school_address; ?>" />
    </div>

    <div class="details col-md-12" id="user_photo_div" style="display:none;margin-top:0;padding-left:0;">
        <div class="col-md-3">
            <strong> Upload Photo </strong>: 
        </div>
        <div class="col-md-8">
            <input type="file" name="image" id="user_photo" style="border: medium none; background: none repeat scroll 0% 0% rgb(250, 250, 250) ! important;">
        </div>
        <div class="col-md-1">
            <a id="cancel_user_change_photo" title="Cancel uploading photo." onclick="do_user_photo_div('hide')" style="cursor:pointer;">Cancel</a>
        </div>
    </div>
    <input type="submit" name="submit" value="Update" class="btn bg-primary  exam-histry-btn" />
</form>
</div>
</div>
</div>
</div>
<?php }
} ?>
<!-- Validations -->
<script src="<?php echo base_url(); ?>assets/designs/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/designs/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/designs/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/designs/js/additional-methods.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/designs/js/datepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/designs/js/jquery.autocomplete.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/designs/css/datepicker.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/designs/css/jquery.autocomplete.css" />
<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
<!--        <link rel="stylesheet" href="/resources/demos/style.css">-->
<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->


<script type="text/javascript">

$().ready(function() {

    $( "#school" ).autocomplete({
        minLength: 3 ,
        source: function( request, response ) {
            $.ajax({
                url: "<?php echo base_url(); ?>general/getAutoSuggestSchools",
                dataType: "json",
                data: {
                    q: request.term
                },
                success: function( data ) {
                    response(data);
                }
            });
        },
    });
    $( "#dob" ).datepicker({
        date: new Date(1970, 1, 1),
        format: "yyyy-mm-dd"
    });
});

(function ($, W, D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function ()
        {
//Additional Methods			
$.validator.addMethod("lettersonly", function (a, b) {
    return this.optional(b) || /^[a-z ]+$/i.test(a)
}, "Please enter valid name.");

$.validator.addMethod("phoneNumber", function (uid, element) {
    return (this.optional(element) || uid.match(/^\+?[0-9]*-?[0-9]*$/));
}, "Please enter a valid number.");

//form validation rules
$("#user_profile_form").validate({
    rules: {
        student_name: {
            required: true,
            lettersonly: true,
            rangelength: [3, 30]
        },
        phone: {
            required: true,
            phoneNumber: true,
            rangelength: [10, 17]
        },
        school: {
            required: true,
        },
        image: {
            required: true,
            accept: "jpg|jpeg|png"
        },
        schoolclass:{
            required: {
                depends: function (element) {
                    return $("#schoolclass").val() == '';
                }
            },
        },
        school_address:{
            required:true,
        }
    },
    messages: {
        student_name: {
            required: "Please enter Student's Name."
        },

        phone: {
            required: "Please enter your Phone Number."
        },
        school: {
            required: "Please enter your School Name."
        },
        image: {
            required: "Please upload your photo.",
            accept: "Only jpg / jpeg / png images are accepted."
        },
        schoolclass:{
            required: "Please select the class.",
        },
        school_address:{
            required: "Please update School Address with City.",
        }
    },
    submitHandler: function (form) {
        form.submit();
    }
});
}
}

//when the dom has loaded setup form validation rules
$(D).ready(function ($) {
    JQUERY4U.UTIL.setupFormValidation();
});

})(jQuery, window, document);

</script>
<!-- 
<link href="<?php echo base_url(); ?>assets/designs/css/jquery-confirm.css" rel="stylesheet">
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
    if (!sessionStorage.alreadyClicked) {
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
        sessionStorage.alreadyClicked = 1;
    }
}); 

</script>

 -->