<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="hide_on_phone" style="height:145px"></div>
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/contact_us.css" /> -->


<div class="container">

<!-- <div class="row">
	<ol class="breadcrumb inner-breadcrumb" itemtype="https://schema.org/BreadcrumbList" itemscope=""  >
		<li itemtype="https://schema.org/ListItem" itemscope="" itemprop="itemListElement"><a href="<?php echo base_url(); ?>" itemprop="item">Home</a></li>
		<li itemtype="https://schema.org/ListItem" itemscope="" itemprop="itemListElement" class="active"><a href="javascript:void(0)" itemprop="item">Blog</a></li>
	</ol>
</div>
 -->

		<div class="row" id="contentSection">
			<div class="col-md-8 col-sm-12 col-xs-12">
				<?php
				$i = 0;
				foreach ($all_articles as $article) {
					$i++;

					if($i%3 == 0){
						?>
						<!-- <div class="row">
						    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						    <ins class="adsbygoogle"
						         style="display:block; text-align:center;"
						         data-ad-layout="in-article"
						         data-ad-format="auto"
						         data-ad-client="ca-pub-2802646301126373"
						         data-ad-slot="8710997337"></ins>
						    <script>
						         (adsbygoogle = window.adsbygoogle || []).push({});
						    </script>
						</div> -->
						<?php
					}
						?>
						<div class="row mar-20">
							<div class="col-md-12">
								 <div class="col-md-4 col-sm-12 col-xs-12">
									<a href="<?php echo base_url().'blog/'.$article['slug']; ?>">
										<img src="<?php echo base_url().'assets/images/blog/thumb/'.$article['featured_image']; ?>" class="img-rounded img-responsive img-with-article" alt="<?php echo $article['title']; ?>">
									</a>
								</div> 
								<div class="col-md-8 col-sm-12 col-xs-12">
								<div class="row border_design">
									<h4><strong><a href="<?php echo base_url().'blog/'.$article['slug']; ?>"><?php echo $article['title']; ?></a></strong></h4>
									<p><?php echo $article['short_desc']; ?>...</p>
									<p class="text-right new_read_more"><a href="<?php echo base_url().'blog/'.$article['slug']; ?>"><strong>Read More</strong>&nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i><i class="fa fa-chevron-right" aria-hidden="true"></i></a></p>
								</div>
								</div>
							</div>
						</div>
						<?php
				}
				?>
			</div>
		
		
	</div>
<style type="text/css">
	.mar-20{
		margin-top:20px;
		margin-bottom: 20px;
	}
	.img-with-article{
		width: auto;
		height: 150px !important;
		margin: 0 auto;
	}

	.img-responsive, .thumbnail > img, .thumbnail a > img, .carousel-inner > .item > img, .carousel-inner > .item > a > img {
    display: block;
    max-width: 100%;
    max-height: 260px;
}
@media only screen and (max-width: 550px) {
.img-responsive, .thumbnail > img, .thumbnail a > img, .carousel-inner > .item > img, .carousel-inner > .item > a > img {
    display: block;
    max-width: 100%;
    max-height: auto;

}
}

	}
	
</style>
</div>
<script type="text/javascript">


function shareOnFacebook(url,title) {
	url = "http://www.facebook.com/share.php?u="+url+"&title="+title;
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
 <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
<!-- <script async type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> -->
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/hc-sticky.js"></script>
<script type="text/javascript">
    $().ready(function() {

        // console.log($('#contentSection'));
        $('.stick_this_item').hcSticky({
            innerTop: -50,
            stickTo: '#contentSection'
        });
    });
</script> -->

<style>

.tooltip
{
	opacity: unset;
}
h5
{
	font-size: 2.64rem;
    line-height: 110%;
    margin: 1.0933333333rem 0 .656rem 0;
}
	</style>