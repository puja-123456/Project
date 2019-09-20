<div class="row" style="height:100vh">
	<div class="container-slider slider-main">
		<div id="slider" class="sl-slider-wrapper">
			<div class="sl-slider">
				<div class="sl-slide bg-1" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
					<div class="sl-slide-inner">
						<video class="slider_video_1" width="100%" playsinline autoplay muted loop>
							<source src="<?php echo base_url(); ?>assets/video/slide1.mp4" type="video/mp4">
							</source>
							Your browser does not support HTML5 video.
						</video>
						<a href="<?php echo base_url();?>">
							<div class="deco" ><img src="<?php echo base_url();?>assets/images/logo/rajwayu_logo.png"></div>
							<h2>Rajwayu</h2>
						</a>
					</div>
				</div>
				<div class="sl-slide bg-2" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
					<div class="sl-slide-inner">
						<video class="slider_video_1" width="100%" playsinline autoplay muted loop>
							<source src="<?php echo base_url(); ?>assets/video/slide2.mp4" type="video/mp4">
							</source>
							Your browser does not support HTML5 video.
						</video>
						<div class="deco h1" ><i class="fa fa-icon fa-group"></i></div>
						<div class="deco h2" ><i class="fa fa-icon fa-envira"></i></div>
						<div class="deco h3" ><i class="fa fa-icon fa-fort-awesome"></i></div>
						<h2 class="h1">Raj</h2>
						<h2 class="h2">Ayu</h2>
						<h2 class="h3">Rajwa</h2>
					</div>
				</div>
				<div class="sl-slide bg-3" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
					<div class="sl-slide-inner">
						<div class="deco" ></div>
						<h2>Dum spiro, spero</h2>
					</div>
				</div>
			</div><!-- /sl-slider -->
			<nav id="nav-arrows" class="nav-arrows">
				<span class="nav-arrow-prev">Previous</span>
				<span class="nav-arrow-next">Next</span>
			</nav>
			<nav id="nav-dots" class="nav-dots">
				<span class="nav-dot-current"></span>
				<span></span>
				<span></span>
			</nav>
		</div><!-- /slider-wrapper -->
	</div>
</div>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/slippry.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/slider.css">

<style type="text/css">

</style>


<?php 
if($main_page_products){
	?>
	<div class="container">
		<div class="row home_page_products">
			<div class="col-md-12 text-center design_bg">
				<h2>Featured Products</h2>
			</div>

			<?php
			foreach ($main_page_products as $product) {
				?>
				<div class="col-md-3">
					<div class="col-md-12">
						<a href="<?php echo base_url();?>products/<?php echo $product->cat_slug;?>/<?php echo $product->product_slug;?>">
							<div style="min-height:250px;">
								<img class="img-responsive" src="<?php echo base_url(); ?>assets/images/products/<?php echo $product->image;?>">
							</div>
						</a>
						<!-- <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/products/<?php echo $product ?>.png"> -->
						<a href="<?php echo base_url();?>products/<?php echo $product->cat_slug;?>/<?php echo $product->product_slug;?>">
							<div style="min-height:50px;"><h4 class="text-center"><?php echo $product->name; ?></h4></div>
						</a>
					</div>
				</div>
				<?php 
			}
			?>
		</div>
	</div>
	
	<?php } ?>
	<br>
	<div class="container">

		<div class="row ">
			<div class="col-md-12 text-center">
				<h2>Brand</h2>
			</div>
			<div class="col-md-4 text-center">
				<div class="row slideanim" style="margin-bottom:30px;">
					<span style="font-size:20px"><i class="fa fa-icon fa-group"></i></span>
					<h4 style="margin-bottom:0px;">RAJ</h4>
					<p>To <strong>rule</strong> (over the illnesses) and command respect, beauty, and elegance</p>
				</div>
				<div class="row slideanim" style="margin-bottom:30px;">
					<span style="font-size:20px"><i class="fa fa-icon fa-envira"></i></span>
					<h4 style="margin-bottom:0px;">WAYU</h4>
					<p><strong>Life, Ayurvedic secrets</strong> and practices carried over centuries</p>
				</div>
				<div class="row slideanim" style="margin-bottom:30px;">
					<span style="font-size:20px"><i class="fa fa-icon fa-fort-awesome"></i></span>
					<h4 style="margin-bottom:0px;">RAJWA</h4>
					<p>Short for <strong>Rajwada</strong>, meaning palace. </p>
				</div>
			</div>

			<div class="col-md-8">
				<div>
					<video id="main_video" width="100%" controls>
						<source src="<?php echo base_url(); ?>assets/video/draft2.mp4" type="video/mp4">
						</source>
						Your browser does not support HTML5 video.
					</video>
				</div>
			</div>
		</div>
	</div>


	<br>

<script src="<?php echo base_url(); ?>assets/js/slippry.min.js">
</script>
<script>
	jQuery('#shop-demo').slippry({
		// general elements & wrapper
		slippryWrapper: '<div class="sy-box shop-slider" />', // wrapper to wrap everything, including pager
		elements: 'article', // elments cointaining slide content

		// options
		adaptiveHeight: false, // height of the sliders adapts to current slide
		start: 2, // num (starting from 1), random
		loop: true, // first -> last & last -> first arrows
		captionsSrc: 'article',
		captions: 'custom', // Position: overlay, below, custom, false
		captionsEl: '.product-name',

		// pager
		pager: false,

		// transitions
		slideMargin: 20, // spacing between slides (in %)
		useCSS: true,
		transition: 'horizontal',

		// slideshow
		auto: false
	});

	$().ready(function(){

	});

</script>

	<style type="text/css">
	.ingredients_on_home_page .one-ingredient{
	}
	.home_page_products .col-md-3 .col-md-12{
		padding-top: 20px;
		margin: 0px 5px;
		box-shadow: 1px 1px 5px 0px rgba(30,0,0,0.4);
		transition: box-shadow 0.5s ease;
		overflow: hidden;
	}
	.home_page_products .col-md-3 .col-md-12:hover{
		box-shadow: 1px 1px 15px 0px rgba(56,0,0,0.7);
	}
	@media only screen and (max-width: 768px){
		.home_page_products .col-md-3{
			padding: 20px 15px;
		}
	}
	.sl-slide-inner .deco img{
		height: 85%;
		margin: 20px;
	}
	</style>