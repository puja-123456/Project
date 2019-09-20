<?php
// x  $this->load->view('blog/article_popup_while_leaving');
  
	$data['this_article'] = array('article_id' => $article['id'], 'article_type' => $article_type);
	// $this->load->view('blog/article_rating',$data);
?>
<?php $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
<div class="hide_on_phone" style="height:145px"></div>
<div class="container">

<!-- <div class="row">
	<ol class="breadcrumb inner-breadcrumb" itemtype="https://schema.org/BreadcrumbList" itemscope=""  >
		<li itemtype="https://schema.org/ListItem" itemscope="" itemprop="itemListElement"><a href="<?php echo base_url(); ?>" itemprop="item">Home</a></li>
		<li itemtype="https://schema.org/ListItem" itemscope="" itemprop="itemListElement"><a href="<?php echo base_url(); ?>blog" itemprop="item">Blog</a></li>
		<li  itemtype="https://schema.org/ListItem" itemscope="" itemprop="itemListElement" class="active"><a href="<?php echo $actual_link; ?>" itemprop="item"><?php echo $article['title'];?></a></li>
	</ol>
</div> -->


<div class="row">
	
  <!-- <section> -->
  	<div class="row" id="contentSection">
  		<div class="col-lg-8 col-md-8 col-sm-12">
  			<div class="row">
  				
	  			<div class="left_content">
	  				<div class="single_page" itemscope itemtype="http://schema.org/NewsArticle">
	  					<h1 itemprop="headline" class="inner-hed"><?php echo $article['title']; ?></h1>
						<?php
							//Start point of our date range.
							$start = strtotime("27 March 2018");
							//End point of our date range.
							$end = strtotime("31 December 2018");								
							//Custom range.
							$timestamp = rand($start, $end);
							//Print it out.								
						?>							
						<meta itemprop="datePublished" content="<?php echo date("Y-m-d", $timestamp);?>"/>
						<meta itemprop="dateModified" content="<?php echo date("Y-m-d", $timestamp);?>"/>
						<meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?php echo $actual_link; ?>" />
						<!--<div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Admin</a> <span><i class="fa fa-calendar"></i>6:49 PM</span> </div>-->
							<meta itemprop="description" content="<?php echo $article['title']; ?>" />	
							
	  					<div class="single_page_content"> 

							<div class="col-md-12 col-sm-12">
							
								<div itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
									<meta itemprop="height" content="">
									<meta itemprop="width" content="">
									<meta itemprop="url" content="<?php echo base_url().'assets/images/blog/'.$article['featured_image']; ?>"> 
									 <img src="<?php echo base_url().'assets/images/blog/'.$article['featured_image']; ?>" data-src="" class="img-responsive featured-image" alt="<?php echo $article['title']; ?>"> 
								</div>								
								<hr>
								
								
								<div itemtype="https://schema.org/Person" style="display:none;"  itemscope="" itemprop="author">
									<span itemprop="name" class="Author-article">CREST Olympiads Teams</span>
							</div>
							<div style="display:none;" itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
										<div itemprop="logo" itemscope itemtype="http://schema.org/ImageObject">
											<meta itemprop="url" content="https://www.crestolympiads.com/assets/images/logo/logo.png">
											<img src="<? echo base_url();?>assets/images/logo.png" alt="CREST Olympiads">
										</div>
										<span itemprop="name">CREST Olympiads</span>
									</div>
								
								
							</div>
							<div itemprop="articleBody"><?php echo $article['long_description'] ?></div>
	  					</div>
	  					<hr />
	  					<div class="related_post">
	  						<h2>Related Articles <i class="fa fa-thumbs-o-up"></i></h2>
	  						<ul class="list-inline">
			            	<?php 
			            	foreach ($related_articles as $article) {
			            		?>
	  							<li class="col-sm-6 col-md-4">
	  								<div class="media"> 
	  									<a class="media-left-latest" href="<?php echo base_url()."blog/".$article['slug']; ?>"> 
		  									 <img src="<?php echo base_url()."assets/images/blog/thumb/".$article['featured_image']; ?>" data-src="" alt="<?php echo $article['title']; ?> image" class="img-responsive"> 
		  								</a>
	  									<div class="media-body"> 
	  										<a class="catg_title" href="<?php echo base_url()."blog/".$article['slug']; ?>"> 
	  											<?php echo substr($article['title'],0,60); ?>..
	  										</a> 
	  									</div>
	  								</div>
	  							</li>
			            		<?php
			            	}
			            	?>
	  						</ul>
	  					</div>
	  				</div>
	  			</div>
  			</div>
  		</div>

		
	    </div>
	</div>
  <!-- </section> -->

</div>
</div>
<div class="hide_on_phone" style="height:50px"></div>

<script type="text/javascript">
	$().ready(function(){
		$("#facebook_share").on("click",function(){
			var this_link = window.location.href;
			$(".fb-share-button a").attr("href",this_link);
			$(".fb-share-button a").click();
		});
	});
</script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
<!-- <script async type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script async type="text/javascript" src="<?=base_url();?>assets/js/hc-sticky.js"></script>
<script type="text/javascript">
    $().ready(function() {

        // console.log($('#contentSection'));
        $('.stick_this_item').hcSticky({
            innerTop: -50,
            stickTo: '#contentSection'
        });
    });
</script> -->

<style type="text/css">
	.single_page_content ul, .single_page_content ol{
		margin-left: 20px;
	}
	.single_page_content li{
		font-family: "Lato";
	    font-style: normal;
	    font-weight: 400;
	    font-size: 16px;
	    color: #272528;
	}
	.featured-image{
		margin:0 auto;
		height: auto;
		width: 80%;
	}
	@media only screen and (min-width: 519px) {

	.image-in-article{
		margin: 0 auto;
		max-width: 80%;
		height: auto;
		max-height: 400px;
	}
}
	.img-in-article{
		width: 100%;
		max-height: 175px;
	}
	@media only screen and (max-width: 520px) {
	.img-in-article{
		width: 100%;
		height: auto;
	}
}

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
