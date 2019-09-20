<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119742610-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	 
	  gtag('config', 'UA-119742610-1');
	</script>

	<!-- Global site tag (gtag.js) - Google Ads: 752306966 --> 
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-752306966"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-752306966');
</script>

<script>
  gtag('event', 'page_view', {
    'send_to': 'AW-752306966',
    'items': [{
      'id': 'replace with value',
      'location_id': 'replace with value',
      'google_business_vertical': 'education'
    }]
  });
</script>

<!-- Event snippet for Registration conversion page --> 
<!-- <script>
  gtag('event', 'conversion', {'send_to': 'AW-752306966/QRfBCP7H_5kBEJaW3eYC'});
</script> -->



	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords"
	content="<?php if (isset($meta_keywords))
	echo $meta_keywords;elseif (isset($site_data->site_keywords))
	echo $site_data->site_keywords;else
	echo "";?>">
	<meta name="description"
	content="<?php if (isset($meta_description))
	echo $meta_description;elseif (isset($site_data->site_description))
	echo $site_data->site_description;
	else
		echo "";?>">
	<title><?php echo (isset($title)) ? $title : 'CREST Olympiads'; ?>
	</title>
	<?php
	$version = "2.0";
	?>

	<meta property="og:url"           content="<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
	<meta property="og:type"          content="<?php echo (isset($slug) && $slug != '') ? 'website' : 'article'; ?>" />
	<meta property="og:title"         content="<?php if(isset($og_title)) echo $og_title; else if(isset($title)) echo $title; else echo 'CREST Olympiads'; ?>" />
	<meta property="og:description"   content="<?php echo (isset($meta_description)) ? $meta_description : 'CREST Olympiads'; ?>" />
	<meta property="fb:app_id"      content="<?php echo $this->config->item('facebook_api_key'); ?>"/>
	<meta property="og:image"         content="<?php echo (isset($og_image_url)) ? $og_image_url : base_url().'assets/images/favicon.ico'; ?>"/>

	<!-- Insert this to the head section of your web page. -->

<meta name="google" value="notranslate">

	<!-- Bootstrap -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	 

	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/x-icon"> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.js"></script> 
      <script defer src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script> 
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"> -->
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.min.css">


	<script type="text/javascript">
      /* First CSS File */
      var giftofspeed = document.createElement('link');
      giftofspeed.rel = 'stylesheet';
      giftofspeed.href = '<?php echo base_url(); ?>assets/css/font-awesome.css';
      giftofspeed.type = 'text/css';
      var godefer = document.getElementsByTagName('link')[0];
      godefer.parentNode.insertBefore(giftofspeed, godefer);

      /* Second CSS File */
      var giftofspeed2 = document.createElement('link');
      giftofspeed2.rel = 'stylesheet';
      giftofspeed2.href = '<?php echo base_url(); ?>assets/css/theme.css';
      giftofspeed2.type = 'text/css';
      var godefer2 = document.getElementsByTagName('link')[0];
      godefer2.parentNode.insertBefore(giftofspeed2, godefer2);


      /* Second CSS File */
      var giftofspeed3 = document.createElement('link');
      giftofspeed3.rel = 'stylesheet';
      giftofspeed3.href = '<?php echo base_url(); ?>assets/css/slices_and_all.css';
      giftofspeed3.type = 'text/css';
      var godefer3 = document.getElementsByTagName('link')[0];
      godefer3.parentNode.insertBefore(giftofspeed3, godefer3);

      /* Second CSS File */
      var giftofspeed4 = document.createElement('link');
      giftofspeed4.rel = 'stylesheet';
      giftofspeed4.href = '<?php echo base_url(); ?>assets/css/homePageSlider.css';
      giftofspeed4.type = 'text/css';
      var godefer4 = document.getElementsByTagName('link')[0];
      godefer4.parentNode.insertBefore(giftofspeed4, godefer4);

	</script>

	<noscript>
		<link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/theme.css">
		<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/homePageGenSlider.css" /> -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/slices_and_all.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/homePageSlider.css" />
	</noscript>


<link rel="manifest" href="<?php echo base_url(); ?>manifest.json" />
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>

   var OneSignal = window.OneSignal || [];
        OneSignal.push(["init", {
            appId: "37848fa2-0ceb-4f3c-bbc5-8dd8d2b32742",
        }]);
    
        OneSignal.push(function() {
           OneSignal.showHttpPermissionRequest();
        });

</script>

<script type="text/javascript">
$(document).ready(function(){
    $('select').not('.disabled').formSelect();
});
</script>
 

	<?php
	$is_home = ($this->router->fetch_class() === 'crest' && $this->router->fetch_method() === 'index') ? true : false;
	
	if ($is_home) {
		?>
		<link rel="canonical" href="<?php echo base_url(); ?>" />
		<?php 
	} else { 
		?>
		<link rel="canonical" href="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
		<?php 
	} ?>
	
	<style type="text/css">
		body p, body span{
			font-family: "Lato",sans-serif;
			line-height: 29px;
		}
		strong{
			font-weight: 700 !important;
		}
		.brand-logo{
			/*background: #fff;*/
			/*float:left;*/
			padding-bottom: 5px;
			padding-top: 5px;
			padding-right: 10px;
			/*width:12%;*/
			max-height: 110px;
		}
		nav.nav-extended .brand-logo img{
			margin: 37px 0px 15px 15px; 
            max-height: 76px;
			transition: all 0.5s ease;
		}
		nav.nav-extended.sticky .brand-logo img{
			max-height: 70px;
		}
		@media only screen and (max-width:600px) {
			.brand-logo{
				width:20%;
			}
			.brand-logo img{

				max-width: 75%;
				    float: right;
			}
		}
		.fixed-action-btn{
			left:23px;
			right: 100%;
		}
		nav.nav-extended {
			z-index: 1000;
			background-color: #fff;
		/*	background: url('<?php //echo base_url();?>assets/images/header_bk.jpg');*/
			background-repeat: repeat-x;
			transition: all 0.5s ease;
		}
		nav.nav-extended ul#nav-mobile li.active {
		    background-color: #ff4a4a52;
		}
		nav.nav-extended ul#nav-mobile li a {
			font-family: sans-serif;
			/*font-family: 'Melonheadz';*/
			font-size: 16px;
		}
		nav.nav-extended ul#nav-mobile li a i {
			font-size: 22px;
		}
		@media only screen and (min-width: 601px)
		{
			nav.nav-extended, nav.nav-extended .nav-wrapper i, nav.nav-extended a.sidenav-trigger, nav.nav-extended a.sidenav-trigger i {
			    height: 110px;
			    line-height: 39px;
			}
			nav.nav-extended.sticky, nav.nav-extended.sticky .nav-wrapper i, nav.nav-extended.sticky a.sidenav-trigger, nav.nav-extended.sticky a.sidenav-trigger i {
			    height: 108px;
			    line-height: 70px;
			}
		}
		@media only screen and (min-width: 601px){
			nav.nav-extended .nav-wrapper {
			    min-height: 64px;
			}
			nav.nav-extended.sticky .nav-wrapper {
			    min-height: 50px;
			}
		}
		nav ul .register-li a:hover{
			background-color: rgba(0,0,0,0);
		}
		nav ul .register-li a .btn{
		    font-family: 'Melonheadz';
    		font-size: 16px;
		}
		.dropdown-content li {
			min-height: 35px;
			line-height: 1rem;
		}
		.fixed-action-btn ul li a{
			display: block;
			width: 200px;
			text-transform: none;
		}
		
			.hide_this_div{
			position: absolute;
			width: 100%;
		    background: #43cec9;
		    display: none;
		    transition: all 0.5s ease;
		}
		.hide_this_div.active{
			display: block !important;
		}
		.hide_this_div p{
			padding-left: 20px;
		}
		.hide_this_div ul{
			margin-bottom: 0px;
		}
		.hide_this_div a li{
			display: inline-block;
			height: 100px;
			width: 100%;
			margin: 1px;
			font-size: 18px;
			float: left;
			padding: 15px;
			cursor: pointer;
		}
		.hide_this_div a.col.m2.l2{
			color: #fff;
			padding: 1px;
		}
		.hide_this_div a:hover li{
			background-color: #26a69a;
		}
		.hidden_div.sticky{
		    transform: translateY(70px);
		}
		.hidden_div{
		    position: fixed;
		    width: 100%;
		   /* height: 200px;*/
		    transform: translateY(110px);
		    z-index: 1;
		    /*display: none;*/
		}
		.hidden_div.active{
			display: block !important;
		}
		#nav-mobile .home-tab, #mobile-menu .home-tab{
			background-color: unset !important;
		}
		#nav-mobile .cmo, #mobile-menu .cmo{
			background-color: #e91e6333 !important;
		}
		#nav-mobile .cco, #mobile-menu .cco{
			background-color: #673ab733 !important;
		}
		#nav-mobile .cso, #mobile-menu .cso{
			background-color: #00bcd433 !important;
		}
		#nav-mobile .ceo, #mobile-menu .ceo{
			background-color: #cddc3933 !important;
		}
		#nav-mobile .cgko, #mobile-menu .cgko{
			background-color: #ffc10733 !important;
		}
		#nav-mobile .cro, #mobile-menu .cro{
			background-color: #79554833 !important;
		}
		/*#nav-mobile .cfo, #mobile-menu .cfo{
			background-color: #00968833 !important;
		}*/
		#nav-mobile .cfo, #mobile-menu .cfo{
			background-color: #ffc10733 !important;
		}

.card .card-content{
	padding: 20px;
}
	.fixediconstop{
		position: fixed;
		right: 1px;
		/*left:1px;*/
		top:20%;
		z-index: 2;
	}
	.fixediconstop li{margin-bottom: 3px; background: #1a2432; color: #fff; width: 60px; overflow: hidden; text-align:center;padding:7px 7px 7px 9px;height:60px;border-radius: 3px;
	}
	.fixediconstop i.medium{
		font-size: 3rem;
	}
	.fixediconstop ul li:nth-child(1){
		background: #165d0bd9;
	}
	.fixediconstop ul li:nth-child(2){
		background: #b1a32ad9;
	}
	.fixediconstop ul li:nth-child(3){
		background: #0b1f8ed9;
	}
	.fixediconstop ul li:nth-child(4){
		background: #f399b9d9;
	}
	.fixediconstop ul li:nth-child(5){
		background: #33a093d9;
		    /*background: #165d0bd9;*/
	}
	.fixediconstop li a{
		color:#fff;
		padding-top: 30px;
	}
	@media only screen and (max-width: 768px){
		.marquee{
			margin-top:57px;
		}
       nav.nav-extended .brand-logo img{
			margin-top:0px;
			max-height: 110px;
			transition: all 0.5s ease;
		}
		.fixediconstop{
			display: none;
		}
		.fixediconstop li a i{
			margin-top: 5px;
		}
		/*.responsive-img
		{
			display:none;
		}*/
	}

 
	/*@media only screen and (min-width: 768px){*/
		#mobile-menu .collapsible-body li i{
		    margin-top: 24px;
		}
	/*}*/
 
	

		@media only screen and (min-width: 1200px){

		.white-text button
		{
			font-size:16px;
		}

		.tab a{
				padding: 0px;
			}


		}

		@media only screen 
		and (min-width : 601px) 
		and (max-width : 1199px)  { 
		/* STYLES GO HERE */

		.white-text button
				{
					font-size:14px;
				}

				/*.row .col.s6 {

					width: 100% !important;
				}*/

				.brand-logo{
				display: none !important;
			}

			.tab a{
				padding: 0 20px !important;
			}

			.row .col.s2{
				width: 18.333334%;
			}


		}

		@media only screen and (max-width: 600px){

		.white-text button
		{
			font-size:10px;
			letter-spacing: 0px;
		}

		.btn
		{
			padding: 0px 5px;
		}

		h2,h3
		{
			padding-left: 10px;
		}

		}


		.marquee {
  width: 100%;
  overflow: hidden;
  border: 1px solid #26a69a;
  background: #26a69a;
  color: #fff;
    position: fixed;
    z-index: 99;
    /*margin-top:-10px;*/
        font-size: 15px;

   

}
.marquee a {


color:#fff;
text-decoration: underline;
font-size:;

	}

	@media only screen and (min-width: 601px)
		{
			.marquee/*.sticky*/ {
			    /*height: 70px;
			    line-height: 70px;*/
			    /*transform: translateY(-42px);*/
			    height:35px;
			    line-height: 35px;
			}
		}


		


.btn, .btn-large, .btn-small { 
    background-color: #ffd223 !important;
}
nav.nav-extended ul#nav-mobile li.active {
    background-color: unset;
}
.sidenav .collapsible-header, .sidenav.fixed .collapsible-header { 
	background-color: #26a69a;
    padding: 16px;
}
.sidenav li { 
    line-height: 23px; 
}
#mobile-menu .collapsible-body li {
    padding: 0px 18px 19px 18px;
    border: 1px solid #efefef;
    color: #000;
}	
.pink.lighten-1 {
    background-color: #216764 !important;
} 
.pink.darken-2 {
    background-color: #216764 !important;
}
.dropdown-content{
	top: 86px !important;
   /* height: 290px;*/
    /*height: 302px;*/
    height: auto;
}
.dropdown-content li {
    font-family: sans-serif;
    line-height: 2rem;
    }
ul#dropdown1 a { 
    padding: 0px;
}
ul#dropdown2 a { 
    padding: 0px;
}

.yellow{
    padding: 5px 5px 7px 17px;
    }
nav.nav-extended.sticky .nav-wrapper i{
	line-height: 37px;
}

.sidenav .collapsible-header:hover, .sidenav.fixed .collapsible-header:hover
{
	background-color:#26a69a;
	color:#fff;

}
.sidenav .collapsible-header, .sidenav.fixed .collapsible-header {
    background-color: #26a69a;
    color: #fff;
}
.droopmenu .droopmenu-col li a {
    display: block;
    padding: 5px 0;
    border-bottom: 0;
    font-weight: 400;
    font-size: 13px;
}
	</style>

	

		<script type="text/javascript">
		$().ready(function(){
			if($(window).width() > 768){
				$(".fixediconstop li a i").addClass("medium");
			}
			$(".dropdown-trigger").dropdown();
			if( !sessionStorage.getItem("showTaptarget")){
				sessionStorage.setItem("showTaptarget", true);
				$('.tap-target').tapTarget();
	    		$(".tap-target").tapTarget('open');
			}
			// $().one(function(){
				$('.fixed-action-btn').floatingActionButton({
					direction: 'top',
					hoverEnabled: false
					// toolbarEnabled: true
				});
				 $('.tooltipped').tooltip();
			// });
			// document.addEventListener('DOMContentLoaded', function() {
			//     var elems = document.querySelectorAll('.fixed-action-btn');
			//     var instances = M.FloatingActionButton.init(elems, {
			//     	toolbarEnabled: true
			// 	});
			// });
			$("#other-menu").on("click",function(){
				$(this).parent().toggleClass("active");
			});
			$('.sidenav').sidenav();
			$('.tabs').tabs();
			$('select').formSelect();
			$('.collapsible').collapsible();

			$("#nav-mobile li a").each(function(){
				$(this).on("click",function(){
					var parent = $(this).parent();

					var target = $(this).data('target');
					// $(".hide_this_div").hide('slow');
					// $(target).toggle('slow');
					// $(target).show('slow');

					// $(".hidden_div").show();
					if( $( target ).hasClass( "active" )){
						$("#nav-mobile li").removeClass("active");
						$(".hide_this_div").removeClass('active');
					// 	$( ".hidden_div" ).addClass( "active" );
					}else{
						$("#nav-mobile li").removeClass("active");
						parent.addClass("active");
						$(".hide_this_div").removeClass('active');
						$( target ).addClass( "active" );
						// console.log('else');
					// 	$( ".hidden_div" ).removeClass( "active" );
					}
					// console.log( $(this).data('target') );

				});
			});
			$(".hidden_div a").on("click",function(){
				$(".hide_this_div").removeClass('active');
			});

			// $(document).ready(function(){
			// 	$('.datepicker').datepicker({
			// 		yearRange: [2000,2017],
			// 		format: 'yyyy-mm-dd',
			// 		defaultDate: new Date(2000, 0, 0)
			// 	});
			// });

			$(document).ready(function () {
			    $(window).scroll(function () {
			        if ($(this).scrollTop() > 200) {
			            $('nav.nav-extended').addClass("sticky");
			            $('div.hidden_div').addClass("sticky");
			        }
			        else {
			            $('nav.nav-extended').removeClass("sticky");
			            $('div.hidden_div').removeClass("sticky");
			        }
			    });
			});

		});
		</script>

		<!-- Facebook Pixel Code --> 
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1433286716736326');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=1433286716736326&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

</head>
<body>




<div class="navbar-fixed">
	<nav class="nav-extended">
			<div class="marquee"><!-- Answer key for CRO Practice 1 available under <a href="https://www.crestolympiads.com/crest/challenge_test">View & Challenge</a> section | -->CRO Practice 2 Test is Scheduled on 11<sup>th</sup> July, 2019 | Book your Exam Slot/Access by <a href="<?php echo base_url(); ?>login">Login here</a> <!-- | Results for CRO Practice 1 will be delcared by 1st July, 2019 --> | Check CRO Sample Papers <a href="<?php echo base_url(); ?>cro-sample-papers">here</a> | See Marking Scheme <a href="<?php echo base_url(); ?>marking-scheme">here</a> | <a href="<?php echo base_url(); ?>faqs">Frequently Asked Questions (FAQs)</a> | Buy Practice Papers for CREST Olympiads <a href="https://www.olympiadsuccess.com/buy/crest-olympiads" target="_blank">here</a> | <!-- Last Date for CREST Reasoning Olympiads <a href="https://www.crestolympiads.com/cro">(CRO)</a> Registration is 20<sup>th</sup> June 2019  --> <a href="<?php echo base_url(); ?>cro"> CREST Reasoning Olympiads (CRO)</a> is scheduled for June/July. <a href="<?php echo base_url(); ?>registration">Apply now</a></div>
		   <div class="nav-wrapper">
			    <a class="brand-logo col s1 " href="<?php echo base_url(); ?>"><img class="responsive-img" src="<?php echo base_url(); ?>assets/images/logo/logo.png"  width="200px" ></a>
		 
			<a href="#" data-target="mobile-menu" class="sidenav-trigger teal-text darken-2"><i class="material-icons">menu</i></a>
			  <ul id="nav-mobile" class="col l1-offset hide-on-med-and-down pull-right" style="margin-top: 20px;font-weight: bold;font-size: 20px;padding-top: 22px;/* margin: 20px; *//* background-color: #ffd223 !important; */height: 89px !important;"> 
					 	<li><a class="btn col s6 offset-s3 black-text dropdown-trigger" href="#!" data-target="dropdown1">Subjects<i class="material-icons right">arrow_drop_down</i></a></li> 
					 	<li class="tab col s2">
					 	  <a class=" btn col s6 offset-s3 dropdown-item black-text" href="<?php echo base_url(); ?>exam-schedule" style="padding: 0 30px;"> Exam Schedule<!-- <i class="material-icons right">arrow_drop_down</i> --></a>
					 	</li>
					 	<li class="tab col s2"> 
                       <li><a class="btn col s6 offset-s3 black-text dropdown-trigger" href="#!" data-target="dropdown2">Quick Links<i class="material-icons right">arrow_drop_down</i></a></li> 
					 
					 	</li>
					 	<li class="tab col s2">
					 		<a class=" btn col s6 offset-s3 dropdown-item black-text" href="<?php echo base_url(); ?>/contact-us"  style="padding: 0 30px;"> Contact<!-- <i class="material-icons right">arrow_drop_down</i> --></a>
					 	</li> 
					 	 
				 <?php $this->load->library('ion_auth'); 
                    if (!$this->ion_auth->logged_in()){?>
                    	<li><a href="<?=base_url()?>login" class="btn col s6 offset-s3 dropdown-item black-text">Login</a></li>
			     <li> <a href="<?=base_url()?>registration" class="btn col s6 offset-s3 dropdown-item black-text">Register</a></li><?php } else { ?>
				</li><a href="<?=base_url()?>crest/reg_form" class="btn col s6 offset-s3 dropdown-item black-text">Dashboard</a></li>
				</li><a href="<?=base_url()?>auth/logout" class="btn col s6 offset-s3 dropdown-item black-text">Logout</a></li><?php } ?> 
			</ul> 
		</div> 
	</nav>
<ul id="dropdown1" class="dropdown-content">
<?php 
			$mainCategories2 = $this->config->item('main_categories'); 
			foreach ($mainCategories2 as $key => $category) { 
          //print_r($category);
				?> 
   
<a class="col m2 l2" href="<?php echo base_url().$category[0]; ?>"><li class="yellow <?php echo $category[3]; ?>"><?php echo $category[1]; ?></li></a>
 
   <?php } ?>
</ul>


<ul id="dropdown2" class="dropdown-content">
	<a class="col m2 l2" href="<?php echo base_url(); ?>faqs"><li class="yellow lighten-1">
							<!-- <i class="material-icons right">blur_circular</i> -->FAQs</li></a>  
	<a class="col m2 l2" href="<?php echo base_url(); ?>marking-scheme"><li class="yellow lighten-2" >
							<!-- <i class="material-icons">content_copy</i> -->Marking Scheme</li></a> 
	<a class="col m2 l2" href="<?php echo base_url(); ?>register-school"><li class="yellow darken-1"><!-- <i class="material-icons">dashboard</i> -->School Registration</li></a> 
	<a class="col m2 l2" href="<?php echo base_url(); ?>co-ordinator"><li class="yellow darken-2"><!-- <i class="material-icons">mood</i> -->Become A Co ordinator</li></a>  
	<!-- <a class="col m2 l2" href="<?php //echo base_url(); ?>"><li class="yellow darken-3">
	 <i class="material-icons">mood</i> Contact Us</li></a> -->

    <a target="_blank" class="col m2 l2" href="<?php echo base_url(); ?>/sample-papers"><li class="yellow darken-4"><!-- <i class="material-icons">devices</i> -->Sample Papers</li></a> 
   
</ul>
</div>




  	<ul id="mobile-menu" class="sidenav hide-on-med-and-up">
		<li class="no-padding">
			<ul class="collapsible collapsible-accordion"> 
						<li class="cmo">
			<div class="collapsible-header">Subjects<i class="material-icons right">arrow_drop_down</i></div>
			<div class="collapsible-body">
			<ul>
            <?php 
			$mainCategories2 = $this->config->item('main_categories'); 
			foreach ($mainCategories2 as $key => $category) { 
             //print_r($category);
				?> 
				<a class="col m2 l2" href="<?php echo base_url().$category[0]; ?>"><li class="yellow <?php echo $category[3]; ?>"><br/><?php echo $category[1]; ?></li></a>
					<!-- 	<a class="col m2 l2" href="<?php //echo base_url(); ?>"><li class="darken-1 yellow">
                         <i class="right" style="font-size: 15px;">(UEO)</i>
							 <br>English</li></a> -->
						 
					 <?php } ?>
				</ul>
				   </div>
						</li>
						
			</ul>
			<ul class="collapsible collapsible-accordion"> 
						<li class="cmo">
			<div class="collapsible-header">Quick Links<i class="material-icons right">arrow_drop_down</i></div>
			<div class="collapsible-body">
			 <ul>
						<a class="col m2 l2" href="<?php echo base_url(); ?>"><li class="darken-1 yellow"> 
							<i class="material-icons right">info</i><br>Frequently Asked Questions</li></a>

						<a class="col m2 l2" href="<?php echo base_url(); ?>"><li class="darken-1 yellow">
                       <i class="material-icons right">assignment_ind</i><br>Individual Registration</li></a>

						<a class="col m2 l2" href="<?php echo base_url(); ?>-syllabus"><li class="yellow darken-1"><i class="material-icons right">account_balance</i><br>School Registration</li></a>

						<a class="col m2 l2" href="<?php echo base_url(); ?>cut-off-and-rankings"><li class="yellow darken-2"><i class="material-icons right">account_balance</i><br>Become A Co-ordinator</li></a> 

						<a class="col m2 l2" href="<?php echo base_url(); ?>awards"><li class="yellow darken-3"><i class="material-icons right">phone</i><br>Contact Us</li></a>

						<a target="_blank" class="col m2 l2" href=""><li class="darken-4 yellow"><i class="material-icons right">dvr</i><br>Sample Papers</li></a> 
				 
			 		</ul>
				    		</div>
						</li>
						
			</ul>
		</li> 
		<li><div class="divider"></div></li>
		<li><a href="<?php echo base_url(); ?>faqs">Schedule</a></li>  
		<li><a href="<?php echo base_url(); ?>contact-us">Contact Us</a></li>
		<li><a href="<?php echo base_url(); ?>registration">Login</a></li>
		<li><a href="<?php echo base_url(); ?>register-school">Register</a></li>
	 
		
    </ul>







 

<?php 
$url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

// $this->session->set_userdata("redirect_url",$url);
$string = "daily-quiz";
if (strpos($url, $string) == false) {
?>


<?php } else { } ?>

<?php 

	$string = "olympiad-exam";

 	if (strpos($url, $string) == true) { ?>

	 <script>

	 	$().ready(function(){
		if($(window).width()<768){

	  	alert('You are not allowed to visit this page on mobile.');
	  	window.location.href = "<?php echo base_url(); ?>";

		}
		});
	   </script>


	 <?php } else {} ?>



<!-- 
	<div class="header-container first-container">
		<nav class="navbar">
			<div class="container-fluid">
				<div class="navbar-header">
					<div class="pull-left" style="max-height: 30px;overflow: visible;">
			      		<img class="img-responsive" src="<?php echo base_url(); ?>assets/images/logo/logo_tm.png">
					</div>
					<button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span> 
					</button>
					<a class="navbar-brand visible-xs-block text-center" style="float: none;" href="#">Crest Olympiads</a>

				</div>
				<div class="collapse navbar-collapse navbar-right" id="myNavbar">
			      <ul class="nav navbar-nav">
			        <li <?php if(isset($active_menu) && $active_menu == 'home') {?> class="active" <?php } ?> ><a data-toggle="modal" data-target="#login-modal" href="#<?php //echo base_url(); ?>">Login</a></li>
			       
			      </ul>
			    </div>
			</div>
		</nav>
	</div>
 -->
<!-- login modal -->
	<div class="all-content">
		<script type="text/javascript">

		</script>
		<script type="text/javascript">

			$().ready(function(){
		if($(window).width()<768){
		
		$("#phone_link").show();
		$("#desktop_link").hide();
	};
	if($(window).width()>768){		
        $("#desktop_link").show();
        $("#phone_link").hide();
	};
});

			var popup;

			function openPopup()

			{

			popup = window.open("<?php echo base_url()."daily-quiz/start"; ?>" ,"Daily Quiz", "height=800,width=1200")

			}

			function closePopup()

			{

			popup.close();

			}

		</script>

		<!-- <script src="https://cdn.jsdelivr.net/jquery.marquee/1.3.1/jquery.marquee.min.js"></script> -->
		<script src="<?php echo base_url(); ?>assets/js/jquery.marquee.min.js"></script>
<script>
	
	$('.marquee').marquee({
    //speed in milliseconds of the marquee
    duration: 15000,
    //gap in pixels between the tickers
    gap: 50,
    //time in milliseconds before the marquee will start animating
    delayBeforeStart: 0,
    //'left' or 'right'
    direction: 'left',
    //true or false - should the marquee be duplicated to show an effect of continues flow
    //duplicated: true

    pauseOnHover: true
});

		$(document).ready(function () {
			    $(window).scroll(function () {
			        if ($(this).scrollTop() > 200) {
			            $('.marquee').addClass("sticky");
			           
			        }
			        else {
			            $('.marquee').removeClass("sticky");
			           
			        }
			    });
			});



</script>

<style>
@media all and (device-width: 768px) and (device-height: 1024px) and (orientation:portrait) {
/* #mobileMenu{
 	display: none;
 }
 #mobmenu{
 	display: block !important;
 }
*/
}
</style> 
<script type="text/javascript">
	document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, options);
    var instance = M.Tabs.init(el, options);
  });

  // Initialize collapsible (uncomment the lines below if you use the dropdown variation)
  // var collapsibleElem = document.querySelector('.collapsible');
  // var collapsibleInstance = M.Collapsible.init(collapsibleElem, options);

  // Or with jQuery

  $(document).ready(function(){
    $('.sidenav').sidenav();
  });
  $(document).ready(function(){
    $('.tabs').tabs();
  });
</script>
<script>
	document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems, options);
  });

  // Or with jQuery

  $('.dropdown-trigger').dropdown();
</script>
<script type="text/javascript">
	document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.collapsible').collapsible();
  });
</script>

