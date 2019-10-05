 
</div>
<style>
@media only screen and (min-width: 768px){
.right {
	margin-left: 24px;
   /* margin-top: 15px;*/
	}
}
.droopmenu>li i {
    vertical-align: middle !important;
}
ul:not(.browser-default)>li
  {
    font-size: 13px;
    line-height: 18px;
    padding: 5px 0px 5px 0px;
    list-style-type: none;
  }
.footer-img{
	background-color: white;
    padding: 8px 0px 0px 9px;
    line-height: 70px; 
    width: 200px;
    height: 80px;
    margin-left: -10px;
    margin-top: -36px;
}
.white-text {
    padding: 0;
    }
 i.small {
    font-size: 1.2rem;
    position: relative;
    top: 3px;
}

</style>
<footer class="page-footer">
<div class="row">
	<div class="col s12">
		

			<div class="col l2 m2 s12">
				<!-- <h5 class="white-text">Links</h5> -->

				<ul>
					 <a class="droopmenu-brand footer-img" href="<?php echo base_url(); ?>"><img class="responsive-img" src="<?php echo base_url(); ?>assets/images/logo/logo.png"  ></a></ul>
					 <div  style="text-align: center;margin-top: 110px;font-size: 13px;">					
						B4-1003, BPTP Freedom Park,
						<br>Sector-57,
						<br>Gurgaon, Haryana-122003	 
				
				</div>
			 
				
			</div>

			<div class="col l2 m2 s12">
				<!-- <h5 class="white-text">Links</h5> -->

				<ul>
					 
					<li><a class="white-text text-lighten-3" href="<?php echo base_url(); ?>">Home</a></li>
					<li><a class="white-text text-lighten-3" href="<?php echo base_url(); ?>about-us">About Us</a></li>
					<li><a class="white-text text-lighten-3" href="<?php echo base_url(); ?>faqs">FAQs</a></li>
					<li><a class="white-text text-lighten-3" href="<?php echo base_url(); ?>register-school">Register Your School</a></li>
					<li><a class="white-text text-lighten-3" href="<?php echo base_url(); ?>co-ordinator">Become Coordinator</a></li>
					<!-- <li><a class="white-text text-lighten-3" href="<?php echo base_url(); ?>pre-registration">Make Payment</a></li> -->
					<!-- <li><a class="white-text text-lighten-3" href="<?php echo base_url(); ?>#">Why CREST?</a></li> -->
					<!-- <li><a class="white-text text-lighten-3" href="<?php echo base_url(); ?>downloads">Downloads</a></li> -->
					<li><a class="white-text text-lighten-3" href="<?php echo base_url(); ?>sample-papers">Sample Papers</a></li>
					<li><a class="white-text text-lighten-3" href="<?php echo base_url(); ?>privacy-policy">Privacy Policy</a></li>
					<li><a class="white-text text-lighten-3" href="<?php echo base_url(); ?>terms-of-use">Terms of Use</a></li>
				</ul>
			</div>

			<div class="col l2 m2 s12">
				<!-- <h5 class="white-text">Links</h5> -->
				<ul>
					<li><a class="white-text text-lighten-3" href="<?php echo base_url(); ?>marking-scheme">Marking Scheme</a></li>
					<li><a class="white-text text-lighten-3" href="<?php echo base_url(); ?>exam-schedule">Exam Schedule</a></li>
					<li><a class="white-text text-lighten-3" href="<?php echo base_url(); ?>cut-off-and-rankings">Cut-Offs & Ranking Criteria</a></li>
					<li><a class="white-text text-lighten-3" href="<?php echo base_url(); ?>awards">Awards &amp; Recognition</a></li>
					<li><a class="white-text text-lighten-3" target="_blank" href="https://www.olympiadsuccess.com/">Olympiad Preparation</a></li>
					<!-- <li><a class="white-text text-lighten-3" target="_blank" href="<?php //echo base_url(); ?>brain-yoga">Brain Yoga</a></li> -->
					<li><a class="white-text text-lighten-3" target="_blank" href="<?php echo base_url(); ?>blog">Blog</a></li>
					<!-- <li><a class="white-text text-lighten-3" target="_blank" href="<?php //echo base_url(); ?>schools">Schools</a></li> -->
				</ul>
			</div>

			<div class="col l2 m2 s12">
				<!-- <h5 class="white-text">Links</h5> -->
				<ul>
					<?php 
					$mainCategories = $this->config->item('main_categories');
					foreach ($mainCategories as $key => $category) {
						?>
						<li>
							<a class="white-text text-lighten-3"  href="<?php echo base_url().$category[0]; ?>"><?php echo $category[2].' ('.$category[1].')'; ?></a>
						</li>
						<?php
					}
					?>
					<!-- <li><a class="white-text text-lighten-3" target="_blank" href="<?php //echo base_url(); ?>cro-rankers">CRO Rankers</a></li>
					<li><a class="white-text text-lighten-3" target="_blank" href="<?php //echo base_url(); ?>cro-cutoff">CRO Cut-off</a></li> -->
				</ul>
			</div>

			<div class="col l4 m4 s12">
				<form class="col s12">
					<div class="row center-align"><h5>Subscribe To Our Newsletter!</h5></div>
					<div class="row">
						<div class="input-field col s12 m8">
							<i class="material-icons prefix">account_circle</i>
							<input id="newsletter_email" type="email" class="validate" required>
							<label for="newsletter_email">Email</label>
						</div>
						<div class="input-field col s12 m4" id="subscribe_newsletter" >
							<button class="btn waves-effect waves-light col s12" style="color: #000;" onclick="return newsletterSubscribe()" type="submit" value="Subscribe">Submit
								<i class="material-icons right">send</i>
							</button>
						</div>
					</div>
				</form>
				<div class="divider"></div>
				<div class="row">
					<div class="col s1"></div>
					<div class="col s2">
						
					<a class="waves-effect waves-light btn-floating btn-large" target="_blank" href="<?=$this->config->item('facebook_link');?>">
						<i class="fa fa-facebook"></i>
					</a>
					</div>
					<div class="col s2">

					<a class="waves-effect waves-light btn-floating btn-large" target="_blank" href="<?=$this->config->item('twitter_link');?>">
						<i class="fa fa-twitter"></i>
					</a>
					</div><div class="col s2">
					<a class="waves-effect waves-light btn-floating btn-large" target="_blank" href="<?=$this->config->item('instagram_link');?>">
						<i class="fa fa-instagram"></i>
					</a>
					</div><div class="col s2">
					<a class="waves-effect waves-light btn-floating btn-large" target="_blank" href="<?=$this->config->item('pinterest_link');?>">
						<i class="fa fa-pinterest"></i>
					</a>
					</div><div class="col s2">
						<a class="waves-effect waves-light btn-floating btn-large" target="_blank" href="<?=$this->config->item('linkedin_link');?>">
							<i class="fa fa-linkedin"></i>
						</a>
					</div>
				</div><br/>

				<div class="footer-copyright">
			   <div id="contact_desktop"  style="position: relative;font-size: 13px;">
                <span class="right" href="#">Have Questions? visit <a href="https://www.crestolympiads.com/faqs" target="_blank">FAQs</a>
			, <div class="tooltip"><i class="material-icons small">email</i>
			<span class="tooltiptext">info@crestolympiads.com</span>
			</div>
			or call us  
			<div class="tooltip"><i class="material-icons small">local_phone</i>
			<span class="tooltiptext"><?php echo $this->config->item('support_phone'); ?></span>
			</div>
			</span>
            </div>
             </div>

			</div>
		</div>
	</div>
	<div class="container footer-copyright">
		 	 
			<div id="contact_desktop"  style="position: relative;margin-left:300px;font-size: 13px;">
			
			<span>
			<i class="material-icons small" style="font-size: 13px;">copyright</i> Unicus Olympiads<sup style="font-size: 8px">TM </sup><?=date("Y")-1; ?> &#8211; <?=date("Y"); ?>
			</span>
			</div>

			<div id="mobile_desktop" style="margin-top: -12px;">
			<span class="right" href="#">Have Questions?  visit <a href="https://www.crestolympiads.com/faqs" target="_blank">FAQs</a>
			,  
			<a href="mailto:info@crestolympiads.com"><i class="material-icons small">email</i></a>
			or call us  
			<a href="tel:<?php echo $this->config->item('support_phone'); ?>"><i class="material-icons small">local_phone</i></a>
			</span>
			<span>
			<i class="material-icons small" style="font-size: 13px;">copyright</i> Unicus Olympiads<sup style="font-size: 8px">TM </sup>  <?=date("Y")-1; ?> &#8211; <?=date("Y"); ?>
			</span>
			</div>
		</div>





	</div>
</footer>

<div class="progress scroll-progress" style="position:fixed;bottom:0;margin-bottom: 0px;height:3px;width:100%;">
	<div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="background-color:rgba(0,0,56,1)">
		70%
	</div>
</div>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.ba-cond.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/modernizr.custom.79639.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.slitslider.js"></script>

<script type="text/javascript">	


	$().ready(function(){
		// $(".onlyNumbers").ForceNumericOnly();
		var pattForZip = /[0-9]/;
		  $('.onlyNumbers').on('keyup input', function(event) {
		    if(event.type == "keyup") {
				if(pattForZip.test(event.key)) {
					return true;
				}
				return false;
		    }
		    if(event.type == 'input') {
				var bufferValue = $(this).val().replace(/\D/g,'');
				$(this).val(bufferValue);
		    }
		});
	});
	jQuery.fn.ForceNumericOnly =
	function()
	{
		return this.each(function()
		{
			$(this).keydown(function(e)
			{
				var key = e.charCode || e.keyCode || 0;

				if($(this).val().length == 10){
					return (
					key == 8 || 
					key == 9 ||
					key == 13 ||
					key == 46 ||
					key == 110 ||
					key == 190 ||
					(key >= 35 && key <= 40));
					// return false;
				}else{

				// allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
				// home, end, period, and numpad decimal
				return (
					key == 8 || 
					key == 9 ||
					key == 13 ||
					key == 46 ||
					key == 110 ||
					key == 190 ||
					(key >= 35 && key <= 40) ||
					(key >= 48 && key <= 57) ||
					(key >= 96 && key <= 105));
				}
			});
		});
	};



function newsletterSubscribe() {
	var email = $("#newsletter_email").val();
	var request = $.ajax({
		url: "<?php echo base_url(); ?>crest/subscribe_email",
		method: "POST",
		data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>', email: email},
		dataType: "json"
	});
	request.done(function (response) {
		if (response.success) {
			alert(response.msg);
			$("#newsletter_email").val('');
		} else {
			alert(response.msg);
		}
	});
	return false;
}
	$(function() {
		var Page = (function() {
			var $navArrows = $( '#nav-arrows' ),
			$nav = $( '#nav-dots > span' ),
			slitslider = $( '#slider' ).slitslider( {
				optOpacity: true,
				autoplay:true,
				interval: 5000,
				onBeforeChange : function( slide, pos ) {
					$nav.removeClass( 'nav-dot-current' );
					$nav.eq( pos ).addClass( 'nav-dot-current' );
				},
				onAfterChange : function( slide, pos ){

				}
			} ),
			init = function() {
				initEvents();
			},
			initEvents = function() {
				// add navigation events
				$navArrows.children( ':last' ).on( 'click', function() {
					slitslider.next();
					return false;
				} );
				$navArrows.children( ':first' ).on( 'click', function() {

					slitslider.previous();
					return false;
				} );
				$nav.each( function( i ) {
					$( this ).on( 'click', function( event ) {

						var $dot = $( this );

						if( !slitslider.isActive() ) {
							$nav.removeClass( 'nav-dot-current' );
							$dot.addClass( 'nav-dot-current' );
						}

						slitslider.jump( i + 1 );
						return false;
					} );

				} );
			};
			return { init : init };
		})();
		Page.init();
		/**
		 * Notes: 
		 * 
		 * example how to add items:
		 */
		/*
		
		var $items  = $('<div class="sl-slide sl-slide-color-2" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1"><div class="sl-slide-inner bg-1"><div class="sl-deco" data-icon="t"></div><h2>some text</h2><blockquote><p>bla bla</p><cite>Margi Clarke</cite></blockquote></div></div>');
		
		// call the plugin's add method
		ss.add($items);
		*/
	});
$().ready(function(){
	
	$("#olm_subjects img").hide();
	$(window).scroll(function(){
		if ($(this).scrollTop() < 100){
			$("#olm_subjects .nav").css({"margin-left":"15%"})
			$("#olm_subjects img").fadeOut();
		}
		else{
			$("#olm_subjects .nav").css({"margin-left":"0px"})
			$("#olm_subjects img").fadeIn();
		}
	});
});
</script>

<script type="text/javascript">
$().ready(function(){
	$(window).scroll(function(){
		var wintop = $(window).scrollTop(), docheight = $(document).height(), winheight = $(window).height();
		var totalScroll = (wintop/(docheight-winheight))*100;
		$(".scroll-progress > div").css("width",totalScroll+"%");
	});
});


$(window).scroll(function() {
	$(".slideanim").each(function(){
		var pos = $(this).offset().top;

		var winTop = $(window).scrollTop();
		if (pos < winTop + 600) {
			$(this).addClass("slide");
		}
	});
});
</script>

<style type="text/css">
.btn-floating.btn-large{
	width: 45px;
    height: 45px;
}
.btn-floating.btn-large i {
    line-height: 47px !important;
}
	.page-footer {
		background-color: #131111;
	}
	.footer a{
		letter-spacing: 1px;  
		padding: 2px;
	}
	.footer a:hover{
		text-decoration: none;
	}
	.footer-copyright i.small {
	    font-size: 1.2rem;
	    position: relative;
	    top: 3px;
	}
	@media only screen and (min-width: 520px){
		.footer > div:first-child{
			background: rgba(0,0,0,0);
			background-position: 115% center;
			background-size: auto 100%;
			background-repeat: no-repeat;
			min-height: 140px;
		}
		.footer > div:last-child{
			background: rgba(0,0,0,0);
			background-position:-65px center;
			background-size: auto 100%;
			background-repeat: no-repeat;
			min-height: 140px;
		}
		.footer .fa{
			padding: 0px 15px;
		}
	}
	@media only screen and (max-width: 768px){

      .droopmenu-header, .droopmenu-mclose, .droopmenu-navbar, .droopmenu-offcanvas .droopmenu-nav {
    background: #fff;
}
.droopmenu-toggle 
{
    background-color: #000 !important;
}
li.droopmenu-parent .material-icons {
    display: none;
}
.droopmenu .droopmenu-tabheader {
    background-color: #26a69a;
}
.droopmenu .droopmenu-tabheader.droopmenu-tab-active {
    background: #ffd223;
    color: #000;
}
.droopmenu .dm-block-title, .droopmenu .droopmenu-content p, .droopmenu li li:hover>a, .droopmenu li ul li a, .droopmenu-col h4 {
    font-weight: 400 !important;
    font-size: 1em !important;
    color: #000;
    margin-bottom: 6px;
}
ul.droopmenu-col.droopmenu-col3 h5 {
    font-size: 20px;
    color: #8a8585;
    font-weight: 600;
    line-height: inherit;
}









		/*.brand-logo img{display:none;}*/
		#contact_desktop{display:none;}
		.navbar-toggle{
			background-color: rgba(0,0,0,0.5);
			background-size: 90%;     
			background-position: center center;
			background-repeat: no-repeat;
		}
		.navbar-toggle .icon-bar{
			background: #e8d4a4;
		}

		.row .col.s2
		{
			width:17% !important;
		}
		.btn-floating.btn-large
		{
			width:34px !important;
			height:51px !important;
		}
		.btn-floating.btn-large i
		{   
			background-color: #fff !important;
			line-height: 51px !important;
		}
		#subscribe_newsletter
		{
			width:100% !important;
		}
		#newsletter_email
		{
			width:85% !important;
		}
	}
	.footer .fa{
		padding: 0px 10px;
	}
	.all-content{
		background-color: #fff;
	}
	@media only screen and (min-width: 769px){
		#mobile_desktop{display:none;}

     .btn-floating.btn-large i
		{   
			background-color: #fff !important;
		}
	}
.fa-facebook-f:before, .fa-facebook:before {
    color: #3b5998;
    content: "\f09a";
}
.fa-twitter:before {
    content: "\f099";
    color: #55acef;
}
.fa-instagram:before {
    content: "\f16d";
    color: #e45686;
}
.fa-pinterest:before {
    content: "\f0d2";
    color: #e6001a;
}
.fa-linkedin:before {
    content: "\f0e1";
    color: #0077b5;
}
	.tooltip {
 position: relative;
  display: inline-block;
  /*border-bottom: 1px dotted black;*/
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 180px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
  top:-10px;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}

@media only screen and (min-width: 601px) and (max-width: 768px)
{
.row .col.m2 {
	width:25%;
	}
}
</style>
<script type="text/javascript">
	$("#navbar-toggle").click(function(){
		$(this+" .icon-bar:first-child").animateRotate(-45);
		$(this+" .icon-bar:nth-child(2)").fade();
		$(this+" .icon-bar:last-child").animateRotate(45);
	});
</script>

<?php 

$url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

// $this->session->set_userdata("redirect_url",$url);
$string1 = "daily-quiz";
 
if (strpos($url, $string1) == false || !$this->ion_auth->logged_in()) {
?>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5b1a5f7910b99c7b36d4bf60/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<?php } else { } 

$first_segment=$this->uri->segment(1);



if ($first_segment != "crest") {
?>
<!---->
<style>

.marquee{display:block;}

</style>
<!---->

<?php } else {

?>

<style>

.marquee{display:none;}

</style>

<?php } ?>

</body>
</html>