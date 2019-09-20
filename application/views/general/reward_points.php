<div id="fb-root"></div>
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
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.js"></script> -->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/contact_us.css"> -->

<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">  -->

<p>&nbsp;</p>

<div class="container">
	<?php if ($this->ion_auth->logged_in()){ $this->load->view('templates/leftmenu'); }?>
	<div class="row text-center">
		<h1>Reward Points</h1>
	</div>
	<div class="row contact">
		<div class="col-md-12 text-center well" style="min-height:347px;">


		   
					<div class="row">

						<ol>
							<li>You will get 100% cashback to the extent of the payment made by your friend/s.</li>
							<li>Do ensure that your friend/s use your referral code while registering.</li>
							<li>The reward points can be used for future purchases on CREST Olympiads or its partners.</li>
							<li>Check <a href="https://www.crestolympiads.com/faqs" target="_blank">FAQs</a> for more details.</li>
						</ol>

							
						<div class="col m6 s12 input-field">
							<i class="material-icons prefix">redeem</i>
							<?php
								if(isset($referral_code)){
									$val = $referral_code;
								}else{
									$val ="N/A";
								}
							?>
							<input id="refer_code" name="refer_code" type="text" class="validate" value="<?=$val?>" readonly>
		          			<label for="refer_code">Your Referral Code</label>
							<?php echo form_error('refer_code'); ?>

				<?php
				$facebook_share_caption = "Crest Olympiads";
				$facebook_share_description = "Hey, 

Use my referral code ".$referral_code." to sign up with https://www.crestolympiads.com/.
Once registered, share your referral code with your friends/family and get 100% cashback.

Thanks CREST Olympiads! ";
				$facebook_share_url = base_url();
				$facebook_share_image = base_url()."assets/images/logo/logo.png";
				$shareUrl = 'https://www.facebook.com/sharer.php?caption='.$facebook_share_caption.'&description='.urlencode($facebook_share_description).'&u='.urlencode($facebook_share_url).'&picture='.urlencode($facebook_share_image);
				?>

					<div class="link_to_share">
					<span>Share your referral code on : </span>
					<br/>
					<span class="wa_share">
						<span>
							<a data-text="Hey, 

Use my referral code <?php echo $referral_code; ?> to sign up with https://www.crestolympiads.com/.
Once registered, share your referral code with your friends/family and get 100% cashback.

Thanks CREST Olympiads! " data-link="<?php  echo base_url(); //echo current_url(); ?>" class="whatsapp">
								<!-- <i class="fa fa-whatsapp"></i> -->
								<img src="<?php echo base_url();?>assets/images/WhatsApp.png" width="50" height="50">
							</a>
						</span>
					</span>
					<span class="fb_share">
						<span>
							<!-- <i class="fa fa-facebook" onclick="return shareOnFacebook('<?php echo $shareUrl; ?>')">
							</i> -->
							<img src="<?php echo base_url();?>assets/images/Facebook-share-icon.png" onclick="return shareOnFacebook('<?php echo $shareUrl; ?>')" width="50" height="50">
						</span>
					</span>
				</div>
						</div>

						<div class="col m6 s12 input-field">

							<i class="material-icons prefix">account_balance_wallet</i>
							<?php
								if(isset($wallet_amount)){
									$val = $wallet_amount;
								}else{
									$val ="0";
								}
							?>
							<input id="wallet_amount" name="wallet_amount" type="text" class="validate" value="<?=$val?>" readonly>
		          			<label for="wallet_amount">Your Wallet Amount</label>
							<?php echo form_error('wallet_amount'); ?>

							
						</div>
				
				
					
						<!-- <p>Your total reward points in your wallet is &#8377; <?php echo $wallet_amount; ?> </p> -->
					

						
						
						
					
					</div>
				
					<br>			
				
				
		    </div>
		</div>
	</div>
</div>
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

			//var text = "Crest Olympiads! "+$(this).attr("data-text");
			var text = $(this).attr("data-text");
			var url = $(this).attr("data-link");
			var message = encodeURIComponent(text) + " - " + encodeURIComponent(url);
			var whatsapp_url = "whatsapp://send?text=" + message;
			//window.location.href = whatsapp_url;
			window.open(whatsapp_url, '_blank');
		} else {
			//alert("You may share this link only through a mobile phone.");

			// text = "Crest Olympiads! "+$(this).attr("data-text");

			var text = $(this).attr("data-text");
			var url = $(this).attr("data-link");
			var message = encodeURIComponent(text) + " - " + encodeURIComponent(url);
			var whatsapp_url = "https://api.whatsapp.com/send?text=" + message;
			//window.location.href = whatsapp_url;
			window.open(whatsapp_url, '_blank');


		}

	});
});



</script>






