<div id="fb-root"></div>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">


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
#comment-box .img-responsive{
	padding: 2px;
	margin: 5px 0px;
	border: 5px double #000;
}
#lightbox {
	display: none;
	position:fixed; /* keeps the lightbox window in the current viewport */
	top:0; 
	left:0; 
	width:100%; 
	height:100%; 
	background:rgba(0,0,0,0.5) repeat; 
	text-align:center;
	z-index: 10;
}
#lightbox > div:first-child {
	float:right; 
	color:#fff; 
	margin:20px; 
	font-size:20px; 
}
#lightbox img {
	box-shadow:0 0 25px #111;
	-webkit-box-shadow:0 0 25px #111;
	-moz-box-shadow:0 0 25px #111;
	max-width:940px;
}

@media only screen and (max-width:767px){
	#picture_lightbox{
		overflow-x: scroll;
	}
	#main_pic{
		float: none !important;
		width: 100% !important;
		height: auto !important;
	}
	#share_buttons, #fb_comment{
		margin-left: 0px !important;
		margin-right: 0px !important;
	}
	#main_pic img{
		width: 90%;
		height: auto;
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
#picture_lightbox{
	/*height: 500px;*/
	/*height: 578px;*/
	height: 700px;
}
#main_pic{
	width: 60%;
	height: 100%;
	max-height: 100%;
	text-align: center;
	float: left;
}
#main_pic img{
	max-height: 100%;
	max-width: 100%;
	padding: 7px;
}
#share_buttons{
	padding-top: 15px;
	padding-bottom: 10px;
}
#fb_comment, #share_buttons{
	margin-left: 60%;
	margin-right: 2%;
	background-color: #fefefe;
}
.fb-comments{
	background-color: #fff;
}
.link_to_share{
	position: relative;
	background: #fff;
	padding: 0px 5px;
	top: -35px;
	text-align: center;
	margin: 0px 64px;
	left: 54px;
	border-radius: 6px;
}
.prev_button, .next_button{
	position: absolute;	
	color: #000;
}
.prev_button{
	left: 4%;
	top: 45%;
	font-size: 30px;
}
.next_button{
	right: 4%;
	top: 45%;
	font-size: 30px;
}
@media only screen and (max-width: 786px){
	.prev_button{
		left: 2%;
		top: 45%;
		font-size: 30px;
	}
	.next_button{
		right: 2%;
		top: 45%;
		font-size: 30px;
	}
	.prev_button span, .next_button span{
		display: none;
	}
	#share_buttons button{
		font-size: 11px;
		margin-bottom: 5px;
	}
} 
</style>

<div class="hide_on_phone" style="height:155px"></div>

<div class="container">
	

	<?php if(isset($slug) && $slug != ''){
		?> 
		<h2 class="inner-hed">Brain Yoga</h2>

		<?php if($prev_picture_slug != '0'){ 
			?><a class="prev_button" href="<?php echo base_url(); ?>brain-yoga/<?php echo $prev_picture_slug; ?>"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i><!-- <span> Prev</span> --></a>
			<?php 
		} ?>
		<?php if($next_picture_slug !='0'){  ?>
		<a class="next_button" href="<?php echo base_url(); ?>brain-yoga/<?php echo $next_picture_slug; ?>"><!-- <span>Next </span> --><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
		<?php } ?>
		<div id="picture_lightbox">
			

			<div id="main_pic">
				<img src="<?php echo $image_href; ?>">
			</div>
			<div id="share_buttons">

				<a data-text="<?php echo $data_text; ?>" data-link="<?php echo $whatsapp_url; ?>" class="whatsapp">
					<button class="btn btn-success">
						Share on Whatsapp <i class="fa fa-whatsapp"></i>
					</button>
				</a>
				<a data-text="<?php echo $data_text; ?>" class="fb-xfbml-parse-ignore facebook" target="_blank" href="<?php echo $fb_share_link; ?>">
					<button class="btn btn-primary" data-href="<?php echo $fb_share_link; ?>" data-layout="button" data-size="large" data-mobile-iframe="true">
						Share on Facebook <i class="fa fa-facebook"></i>
					</button>
				</a>
			</div>
			<div id="fb_comment">
				<div class="fb-comments" data-href="<?php echo $fb_comment_box_link; ?>" data-width="400" data-numposts="2"></div>
			</div>
		</div>

		<?php 
	} ?>
	<center>
		<!-- <h2>Click to view!</h2> -->
		<h2 class="inner-hed">Brain Yoga</h2>
		<!-- <h3>Brain Yoga</h3> -->
	</center>
	<ul class="list-unstyled row">
		<?php 
		foreach ($all_pictures->result() as $picture) {
			
			?>
			<li class="col-xs-6 col-sm-4 col-md-3">

				<?php
				$facebook_share_caption = "Brain Yoga";
				$facebook_share_description = "Brain Yoga";
				$facebook_share_url = base_url()."brain-yoga/".$picture->slug;
				// $facebook_share_image = base_url()."assets/designs/images/brain-yoga/".$picture->image;
				$facebook_share_image = base_url()."assets/images/brain-yoga/thumb/".$picture->image;
				$shareUrl = 'https://www.facebook.com/sharer.php?caption='.$facebook_share_caption.'&description='.urlencode($facebook_share_description).'&u='.urlencode($facebook_share_url).'&picture='.urlencode($facebook_share_image);
				?>

				<a href="<?php echo base_url(); ?>brain-yoga/<?php echo $picture->slug; ?>">
					<!-- <img class="img-responsive" title="" alt="" src="<?php echo base_url(); ?>assets/designs/images/brain-yoga/thumb/<?php echo $picture->image; ?>"> -->
					<img class="img-responsive" title="" alt="" src="<?php echo base_url(); ?>assets/images/brain-yoga/thumb/<?php echo $picture->image; ?>">
				</a>
				<div class="link_to_share">
					<span>Share : </span>
					<span class="wa_share">
						<span>
							<a data-text="Brain Yoga" data-link="<?php echo current_url()."/".$picture->slug; ?>" class="whatsapp">
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
			</li>
			<?php 
		}
		?>
	</ul>
</div>

<div id="lightbox">
	<div><i class="fa fa-close"></i></div>
	<div id="light_box_content">
	</div>
</div>
<div>
</div>
<p>&nbsp;</p>


<script type="text/javascript">

$(document).ready(function(){

	$(".link_to_share > span").hover(function(){
		$(this).css("cursor","pointer");
	});
});


$(document).ready(function(){

	$(document).keyup(function(event){
		if(event.which == 27){
			$('#lightbox').hide("slow");
			$('#light_box_content').html("");
		}
	});
	$('#lightbox > div:first-child').hover(function() { 
		$(this).css("cursor","pointer");
	});
	$('#lightbox > div:first-child').on('click', function() { 
		$('#lightbox').hide("slow");
		$('#light_box_content').html("");
	});
});

if($(window).width()<768){
	var winheight = $(window).height();
	$(".hide_on_phone").hide();
	$("#share_buttons button").addClass("btn-block");
};
$(document).ready(function(){
	$(".bottomBlackBar").hide();
});

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

		// if( isMobile.any() ) {

		// 	var text = $(this).attr("data-text");
		// 	var url = $(this).attr("data-link");
		// 	var message = encodeURIComponent(text) + " - " + encodeURIComponent(url);
		// 	var whatsapp_url = "whatsapp://send?text=" + message;
		// 	window.location.href = whatsapp_url;
		// } else {
		// 	alert("You may share this link only through a mobile phone.");
		// }

		if( isMobile.any() ) {

			var text = $(this).attr("data-text");
			var url = $(this).attr("data-link");
			var message = encodeURIComponent(text) + " - " + encodeURIComponent(url);
			var whatsapp_url = "whatsapp://send?text=" + message;
			//window.location.href = whatsapp_url;
			window.open(whatsapp_url, '_blank');
		} else {
			//alert("You may share this link only through a mobile phone.");

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

