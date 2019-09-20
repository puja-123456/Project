<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title><?php if(isset($title)) echo $title." - Admin Panel "; if(isset($site_data->site_title)) echo " - ".$site_data->site_title; ?></title>
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      
      <script type = "text/javascript" >
         function preventBack(){window.history.forward();}
          setTimeout("preventBack()", 0);
          window.onunload=function(){null};
      </script>

      <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/x-icon">

      <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.js"></script>
      <!-- Bootstrap -->
      <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
      <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

      <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet">


   </head>
    <body style="">
      <div class="container-fluid top-header padd" style="">
   
         <div class="col-md-2 padd">
            <a href="<?php echo base_url();?>">
                  <img class="img-responsive" style="max-height: 60px;" src="<?php echo base_url();?>assets/images/logo/logo.png" >
            </a>
         </div>
         <div class="col-md-10">
            <div class="small-menu">
               <nav class="navbar navbar-default menu-nav" role="navigation">
                  <div class="container-fluid">
                     <!-- Brand and toggle get grouped for better mobile display -->
                     <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Brand</a>
                     </div>
                     <!-- Collect the nav links, forms, and other content for toggling -->
                     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                           <li class="dropdown">
                              <a href="<?php echo base_url();?>admin/logout" class="dropdown-toggle" > <i class="fa fa-lock"></i> Logout </a>        
                           </li>
                        </ul>
                     </div>
                     <!-- /.navbar-collapse -->
                  </div>
                  <!-- /.container-fluid -->
               </nav>
            </div>
         </div>
      </div>
      <div class="container-fluid padd">
      <!--	DON'T DELETE ANY DIV	-->

