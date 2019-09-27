
<!-- Slider-->
<!-- Middle Content-->
<div class="row" id="logid">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="bradcome-menu">
            <ol class="breadcrumb inner-breadcrumb">
              <!--   <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li><a href="#">Login </a></li> -->
            </ol>
        </div>
    </div>
</div>
<div class="row" style="width:50%;margin-top:5%">
    <div class="login-div">
        <div class="col-md-8 col-xs-12 col-sm-12 login-txt">
            <h2 class="inner-hed">Login</h2>
            <div class="col-md-9 col-xs-12">
                <div class="formgro">

                    <?php echo $this->session->flashdata('message'); ?>
                    <?php echo form_open("auth/login", 'class="form-signin" id="login_form"'); ?>
                    <div class="form-group">
                        <label>User Email<span style="color:red;">*</span></label>
                        <?php 
                        $identity=array('name'=>'identity','class' => 'form-control','type' => 'email');
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
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="row login-btn">
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                        <?php echo form_submit('login', 'Login', 'class="btn btn-lg btn-primary butt"'); ?>
                                         <a href="<?php echo base_url().'forgot-password';?>" style="color: #428bca;text-decoration: none;float:right">
                                          Forgot Password
                                </a>

                                    </div>
                                    <p style="text-align: center">New to Unicus Olympiads?                                   
                                    <a href="<?php echo base_url().'registration';?>" style="color: #428bca;text-decoration: none;">
                                    Register Now</a>                               
                                </p>
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
                        identity: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true
                        }
                    },

                    messages: {
                        identity: {
                            required: "Please enter your email-id."
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
<style>
.butt{
    color: #000 !important;
}
#logid{
    margin-top:80px;
}
@media screen and (max-width: 768px)
{
    #logid{
    margin-top:-10px;
}
}
</style>


