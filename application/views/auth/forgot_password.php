



<!-- Slider-->

<!-- <div class="row">

    <div id="myCarousel" class="carousel slide inner-banner" data-ride="carousel">

        <div class="container">

            <img alt="banner" style="width:100%" src="" data-src="<?=$this->config->item('static_res_url');?>designs/images/img/company-banner.jpg">

        </div>

    </div>

</div> -->

<!-- Slider-->

<!-- Middle Content-->

<div class="container-fluid">

 

   <!-- <div class="container">

   <div class="row">

      <div class="col-md-12 col-xs-12">

         <div class="bradcome-menu">

           <ol class="breadcrumb inner-breadcrumb">

               <li><a href="<?php echo base_url(); ?>">Home</a></li>

             

               <li><a href="#"> Forgot Password</a></li>

            </ol>

         </div>

      </div>

      </div>

   </div> -->

   <div class="container inner-content padding">

      <div class="col-md-8 col-xs-12">

         <h2 class="inner-hed" style="margin-top: 10%;font-size:30px">Forgot Password</h2>

         <div class="col-md-12 formgro" style="margin-bottom: 10%">

            <div id="infoMessage"><?php  echo $message;?></div>

            <?php echo form_open("auth/forgot_password",'class="form-signin" id="forgot_password_form"');?>

            <div class="form-group paddin-cont">

               <label class="col-lg-3 control-label" for="ftname">Email <span style="color:red;">*</span></label>

               <div class="col-lg-9 ">

                  <?php echo form_input($email);?>

               </div>

            </div>
            <p></p>

            <div style="" class="form-group ">

               <div class="col-lg-offset-1 col-lg-10 padd">

                  <?php echo form_submit('submit', lang('forgot_password_submit_btn'),'class="btn btn-danger butt"');?>

               </div>

            </div>

            </form>

         </div>

      </div>

     <p></p>

   </div>

   

   <div class="spacer"></div>



</div>

<!-- Middle Content-->

<!-- Validations -->

<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>

<script type="text/javascript"> 

   (function($,W,D)

   {

      var JQUERY4U = {};

   

      JQUERY4U.UTIL =

      {

          setupFormValidation: function()

          {	

   		

   		//form validation rules

              $("#forgot_password_form").validate({

                  rules: {

                      "email": {

                          required: true,

   					email: true

                      }

                  },

   			

   			messages: {

   				"email": {

                          required: "Please enter your email-id."

                      }

   			},

                  

                  submitHandler: function(form) {

                      form.submit();

                  }

              });

          }

      }

   

      //when the dom has loaded setup form validation rules

      $(D).ready(function($) {

          JQUERY4U.UTIL.setupFormValidation();

      });

   

   })(jQuery, window, document);

   

</script>



