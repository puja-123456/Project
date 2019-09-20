
<!-- Slider-->
<!-- Middle Content-->
<!-- <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="bradcome-menu">
            <ol class="breadcrumb inner-breadcrumb">
                <li><a href="<?php //echo base_url(); ?>">Home</a></li>
                <li><a href="#"> Olympiad Login </a></li>
            </ol>
        </div>
    </div>
</div> -->
<div class="row" style="width:50%;margin-top:5%;">
    <div class="login-div">
        <div class="col-md-8 col-xs-12 col-sm-12 login-txt">
           <br/>
            <h2 class="inner-hed">Login Panel</h2>
            <div class="col-md-9 col-xs-12">
                <div class="formgro">

                    <?php echo $this->session->flashdata('message'); ?>
                    <?php echo form_open("auth/olympiad_login", 'class="form-signin" id="login_form"'); ?>
                    <div class="form-group">
                        <label>User ID<span style="color:red;">*</span></label>
                        <?php 
                        $identity=array('name'=>'identity','class' => 'form-control','type' => 'text');
                        ?>
                        <?php echo form_input($identity); ?>
                    </div>
                    <div class="form-group">
                        <label>Password<span style="color:red;">*</span></label>
                        <?php 
                        $identity=array('name'=>'password','class' => 'form-control','type' => 'password');
                        ?>
                        <?php echo form_input($identity); ?>
                    </div>
                  <!-- <div class="form-group paddin-cont">
                        <label class="col-lg-3 control-label" for="ftname"></label>
                        <div class="col s12 input-field">
                            <label for="captcha"><?php echo $captcha['image']; ?></label>
                        </div>
                    </div> -->
                   <!--  <div class="form-group paddin-cont">     -->
                        <!-- <label class="col-lg-3 control-label" for="ftname">Captcha <span style="color:red;">*</span></label> -->
                        <!-- <div class="col s12 input-field">
                            <input class="form-control" type="text" autocomplete="off" name="userCaptcha" placeholder="Enter above text" required value="<?php if(!empty($userCaptcha)){ echo $userCaptcha;} ?>" />
                            <?php  if (form_error('userCaptcha')){
                                ?>
                                    <span class="help-inline"><?php echo form_error('userCaptcha'); ?></span>
                                <?php 
                            }?>
                        </div> -->
                    <!-- </div>   -->  
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="row login-btn">
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                        <?php echo form_submit('submit', 'Login', 'class="btn btn-lg btn-primary butt"'); ?>

                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Middle Content-->
<!-- Validations -->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript">
    (function ($, W, D) {
        var JQUERY4U = {};

        JQUERY4U.UTIL =
        {
            setupFormValidation: function () {
                //form validation rules
                $("#login_form").validate({
                    rules: {
                        userid: {
                            required: true                            
                        },
                        password: {
                            required: true
                        }
                    },

                    messages: {
                        userid: {
                            required: "Please enter your user-id."
                        },
                        password: {
                            required: "Please enter password."
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

