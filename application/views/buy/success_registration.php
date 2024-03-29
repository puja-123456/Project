<div id="fb-root"></div>

<!-- Global site tag (gtag.js) - Google Ads: 752306966 --> 
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-752306966"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-752306966');
</script>

<!-- Event snippet for Purchased conversion page -->
<script>
  gtag('event', 'conversion', {
      'send_to': 'AW-752306966/cvWxCK2Qi5gBEJaW3eYC',
      'transaction_id': '<?php echo $txn_id; ?>'
  });
</script>

<script>
window.fbAsyncInit = function() {
	FB.init({
		appId            : '379880269065174',
		autoLogAppEvents : true,
		xfbml            : true,
		version          : 'v2.9'
	});

	$(document).trigger('fbload');
	FB.AppEvents.logPageView();
};

(function(d, s, id){
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) {return;}
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<style type="text/css">

@media only screen and (max-width:767px){
	
	#share_buttons{
		margin-left: 0px !important;
		margin-right: 0px !important;
	}
	
	.link_to_share {
		left: 0px !important;
		top: -3px !important;
		margin: 0px auto !important;
		border: 1px solid #000;
	}
	#share_buttons button{
		padding: 5px;
	}
}

#share_buttons{
	padding-top: 15px;
	padding-bottom: 10px;
}
 #share_buttons{
	margin-left: 60%;
	margin-right: 2%;
	background-color: #fefefe;
}

.link_to_share{
	/*position: relative;
	background: #fff;
	padding: 0px 5px;
	top: -35px;*/
	text-align: center;
	/*margin: 0px 64px;
	left: 54px;
	border-radius: 6px;*/
}

@media only screen and (max-width: 786px){	
	#share_buttons button{
		font-size: 11px;
		margin-bottom: 5px;
	}
} 
</style>
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<!--   <script type="text/javascript"></script> -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/contact_us.css">
<p>&nbsp;</p>
<div class="container">
	<div class="row text-center">
		<h1>Successful Registration</h1>
	</div>
	<div class="row contact">
		<div class="col-md-12 text-center well" style="min-height:347px;">

	<?php if ($this->session->flashdata('success_message')) { ?>
	<div class="text-success text-center col s12"><span>
		<strong>
			<?php echo $this->session->flashdata('success_message'); ?>
		</strong>
	</span><br><br></div>
	<?php } ?>
	<?php
	if(isset($this_user)){
		?>
		<p><strong>Congratulations!</strong> You are enrolled with email Id: <strong><?=$this_user->email;?></strong>. These are the details and the subjects you have selected:</p>
		<p>Student Name: <?=$this_user->username;?></p>
		<p>Class: <?=$this_user->class;?></p>
		<p>School: <?=$this_user->school;?></p>
		<p>Subjects:
		<ul style="margin-left: 30px;">
			<?php
			//$subjects = $this_user->prefered_subject;

			$subjects=$this->session->userdata('subjects');
			$subjects = explode(',', $subjects);
			 //var_dump($subjects);
			//$all_sub = $this->config->item('main_categories');
			foreach ($subjects as $this_cus_sub) {
				
			//	foreach ($all_sub as $subj ) {
				
					//if($subj[1] == $this_cus_sub){
						//echo "<li><strong>".$subj[2]."</strong></li>";
						
						if($this_cus_sub=="UMO")
						{
						    $subject="Unicus Mathemactics Olympiad";
						}
						else if($this_cus_sub=="UCTO") {
						    
						     $subject="unicus Critical Thinking Olympiad";
						    
						}
						else if($this_cus_sub=="UCO") {
						    
						     $subject="Unicus Cyber Olympiad";
						    
						}
						else if($this_cus_sub=="UEO") {
						    
						     $subject="Unicus English Olympiad";
						    
						}
						else if($this_cus_sub=="USO") {
						    
						     $subject="Unicus Science Olympiad";
						    
						}
						else if($this_cus_sub=="UGKO") {
						    
						     $subject="Unicus General Knowledge Olympiad";
						    
						}
						
						else
						{
						    $subject="";
						}
						echo "<li><strong>".$subject."</strong></li>";
					//}
				//}
				
				//reset($all_sub);
			}
			?>
		</ul>
	</p>
		<?php
	}

	?>
	<p>Note:</p>
	<ol>
		<li>Please <u><a href="https://www.unicusolympiads.com/login" target="_blank">login</a></u> to Unicus Olympiads dashboard with your user email and password to upload documents & view information about certificate, your exam slot details, etc.</li>
		<li>Please check exam dates <u><a href="https://www.unicusolympiads.com/exam-dates" target="_blank">here</a></u>.</li>
		Visit <a href="https://www.unicusolympiads.com/faqs" target="_blank">FAQs</a> section for more details.</li>

				<?php
				$facebook_share_caption = "Unicus Olympiads";
				$facebook_share_description = "Hello! Register for Unicus Olympiads, a Summer Olympiad exam for Classes 1-10 that helps assess your kid's previous class conceptual understanding.";
				$facebook_share_url = base_url();
				$facebook_share_image = base_url()."assets/images/logo/logo.png";
				$shareUrl = 'https://www.facebook.com/sharer.php?caption='.$facebook_share_caption.'&description='.urlencode($facebook_share_description).'&u='.urlencode($facebook_share_url).'&picture='.urlencode($facebook_share_image);
				?>

					<div class="link_to_share">
					<span>Share : </span>
					<span class="wa_share">
						<span>
							<a data-text="<?php echo $facebook_share_description; ?>" data-link="<?php echo base_url(); ?>" class="whatsapp">
								<i class="fa fa-whatsapp"></i>
							</a>
						</span>
					</span>
					<span class="fb_share">
						<span>
							<i class="fa fa-facebook" onclick="return shareOnFacebook('<?php echo $shareUrl; ?>')">
							</i>
						</span>
					</span>
				</div>
	</ol>
	<p>Thanks for enrolling with Unicus Olympiads. If you have any query, you may contact us at '<a href="mailto:<?=$this->config->item('contact_email');?>"><?=$this->config->item('contact_email');?></a>'.</p>
		</div>
	</div>
</div>


<style type="text/css">
form input, form textarea, form button{
	margin: 3px 0px;
}
</style>

<script type="text/javascript">


$(document).ready(function(){
	$(".link_to_share > span").hover(function(){
		$(this).css("cursor","pointer");
	});
});


if($(window).width()<768){
	var winheight = $(window).height();
	$(".hide_on_phone").hide();
};

function shareOnFacebook(url) {
	window.open(url);
	return false;
}


$(document).ready(function() {

	var isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
		BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
		iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
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
	$('.whatsapp').click(function() {

		if( isMobile.any() ) {

			//var text = "unicus Olympiads! "+$(this).attr("data-text");
			var text = $(this).attr("data-text");
			var url = $(this).attr("data-link");
			var message = encodeURIComponent(text) + " - " + encodeURIComponent(url);
			var whatsapp_url = "whatsapp://send?text=" + message;
			window.location.href = whatsapp_url;
		} else {
			alert("You may share this link only through a mobile phone.");
		}

	});
});



</script>