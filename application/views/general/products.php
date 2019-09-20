<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/contact_us.css">


<div class="container" style="width:100%;padding:0px;">
	<ol class="breadcrumb" style="padding-left:10%;">
		<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
		<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>products/<?php echo $category['slug']; ?>"><?php echo $category['name']; ?></a></li>
	</ol>
</div>

<div>
	<center>
		<h1><?php echo $category['name']; ?></h1>
	</center>


	<div class="container">
		<div class="row">
			<?php 
			foreach ($products as $product) {
				if($product->status == 'Active'){

				?>


				<div class="col-md-6 product-details">
					<div class="col-md-6 col-xs-12">
						<div class="product_image">
							<div class="under_product_image">
							<!-- product image -->
							<a href="<?php echo base_url();?>products/<?php echo $category['slug'];?>/<?php echo $product->slug;?>">
								<img class="img-responsive" src="<?php echo base_url(); ?>assets/images/products/<?php echo $product->image_1;?>">
							</a>
							</div>
						</div>
						<br>
					</div>


					<div class="col-md-6 col-xs-12">
						<div class="col-md-12">
							<h4><a href="<?php echo base_url();?>products/<?php echo $category['slug'];?>/<?php echo $product->slug;?>"> <?php echo $product->name; ?></a></h4>
						</div>
						<div class="row">
							<div class="col-md-12">
								<p class="description">
									<?php echo word_limiter($product->highlight,20); ?>
									<a href="<?php echo base_url();?>products/<?php echo $category['slug'];?>/<?php echo $product->slug;?>"> read more</a>
								</p>
							</div>
						</div>
					</div>
				</div>
				<?php
				}
			}
			?>
		</div>
	</div>

</div>

<style type="text/css">
.under_product_image{
	background: rgba(255,255,255,1);
	position: relative;
	height: 99.9%;
	top:-10px;

}
.product_image{
	border-radius: 25px;
	border-style: solid;
	border: 1px solid rgba(56,0,0,0.4);
	max-width: 100%;
	height: 220px;
	transition:all 0.5s ease;
}
.product_image img{
	max-height: 200px;
	margin: 10px auto;
	padding-top: 10px;
}
.product_image:hover{
	border-radius: 0px;
	border: 1px solid rgba(56,0,0,1);
	box-shadow: 1px 1px 15px rgba(0,0,0,0.4);
}
.product-details{
	
}
</style>