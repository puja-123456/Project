<!--	DON'T DELETE ANY DIV	--><!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="keywords" content="<?php if(isset($site_data->site_keywords)) echo $site_data->site_keywords; else echo ""; ?>">
      <meta name="description" content="<?php if(isset($site_data->site_description)) echo $site_data->site_description; else echo ""; ?>">
      <title><?php if(isset($title)) echo $title; if(isset($site_data->site_title)) echo " - ".$site_data->site_title; ?></title>
      <!-- Bootstrap -->
      <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/css/morris-0.4.3.min.css" rel="stylesheet">

      <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/x-icon">
      
      
      <?php if(isset($site_data->google_analytics)) echo $site_data->google_analytics; ?>

      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      
            
                    <script>
                  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

                  ga('create', 'UA-81806453-1', 'auto');
                  ga('send', 'pageview');

                </script>

       <?php 
      // if( $this->router->fetch_class() === 'user' && $this->router->fetch_method() === 'paymentconfirmation')  { ?>

                <!-- Google Code for Success Conversion Conversion Page -->
              <!--   <script type="text/javascript">
                /* <![CDATA[ */
                var google_conversion_id = 875377743;
                var google_conversion_language = "en";
                var google_conversion_format = "3";
                var google_conversion_color = "ffffff";
                var google_conversion_label = "1ia9CI2PyWkQz-i0oQM";
                var google_remarketing_only = false;
                /* ]]> */
                </script>
                <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
                </script>
                <noscript>
                <div style="display:inline;">
                <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/875377743/?label=1ia9CI2PyWkQz-i0oQM&amp;guid=ON&amp;script=0"/>
                </div>
                </noscript> -->


      <?php //} ?>      
            
           
<script type = "text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>


   </head>
   <body style="background-image:url(<?php echo $this->config->item('backend_bgimage'); ?>)">
      <div class="container-fluid top-header padd" style="background-image:url('<?php echo $this->config->item('backend_bgimage'); ?>');">
         <div class="col-md-2 padd">
            <div class="logo">
                   
			<?php

				if(isset($page) && $page == "exam_page")
					$hlink = "#";
				else
                                    //$hlink = base_url()."user";
                                    $hlink = base_url();

			?>
             
               <a href="<?php echo $hlink;?>"><img src="<?php echo base_url();?>assets/images/logo/logo.png" ></a> 
            </div>
         </div>
      
      </div>
      <div class="container-fluid padd" style="background-image:url(<?php echo $this->config->item('backend_bgimage'); ?>)">
      <!--	DON'T DELETE ANY DIV	-->
