
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/contact_us.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/ingredients.css">

<script type="text/javascript">
<?php 
if(isset($active_ingredient) && $active_ingredient != ''){
	?>
	$(document).ready(function(){
		$("#ing-<?php echo $active_ingredient; ?>").modal('show');
	});
	<?php
}
?>
</script>
<?php
$i =0;
if($ingredients){
	?>
	<div class="container all-ingredients">
		<div class="row">
			<h2>
				<div class="text-center">Ingredients</div>
			</h2>
			<ul class="list-unstyled text-center">
				<?php 
				foreach ($ingredients as $ingredient) {
					?>
					<div role="button" class="col-md-4 col-sm-12 col-xs-12 all_ingredients" data-toggle="modal" data-target="#ing-<?php echo $ingredient['slug']; ?>">
						<div class="single_ingredient">
							<div class="col-md-12 col-sm-12 col-xs-12 ing_image">
								<img src="<?php echo base_url().'assets/images/ingredients/'.$ingredient['image']; ?>">
							</div>
							<p><?php echo $ingredient['name']; ?></p>
						</div>
					</div>

					<!-- Modal -->
					<div id="ing-<?php echo $ingredient['slug']; ?>" class="modal fade" role="dialog">
						<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title"><?php echo $ingredient['name']; ?></h4>
								</div>
								<div class="modal-body">
									<div class="row">
										<img class="col-md-4 col-sm-12 col-xs-12" src="<?php echo base_url().'assets/images/ingredients/'.$ingredient['image']; ?>">
										<p><?php echo $ingredient['ingredient_page_details']; ?></p>
									</div>
									<br>
									<ul class="text-left">
										<?php
										foreach ($pr_ing as $key) {
											if($ingredient['id'] == $key['ingredient_id']){
												echo "<li> Use of ".$ingredient['name']." in ".$key['product_name'].": ".$key['product_page_details']."</li><br>";
											}
										} 
										?>
									</ul>
									<hr>
									<div class="row text-left">
										Our products with this ingredient:<br>
										<?php 
										$mainCategories = $this->config->item('main_categories');
										foreach ($pr_ing as $key) {
											if($ingredient['id'] == $key['ingredient_id']){
												if(array_key_exists($key['category_id'], $mainCategories))
													$category_url = $mainCategories[$key['category_id']][0];
												?>

												<a href="<?php echo base_url(); ?>products/<?php echo $category_url.'/'.$key['product_slug']; ?>">
													<div class="col-md-3 text-center">
														<img class="img-responsive" src="<?php echo base_url(); ?>assets/images/products/<?php echo $key['product_image']; ?>"> <br>
														<?php echo $key['product_name']; ?>
													</div>	
												</a> 
												<?php
											}
										}
										?>

									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>

						</div>
					</div>
					<?php
				}
				?>
				<br><hr>
			</ul>
		</div>
		<?php
	}
	?> 
</div>
<script type="text/javascript">

$().ready(function(){
	$().keypress(function (e) {
		var key = e.which;
        if(key == 27)  // the escape key code
        {
        	$(".modal-footer > button").click();
        }
    });
});
</script>
<style type="text/css">
.all_ingredients{
	padding: 15px;
	overflow: hidden;
	/*margin: 5px 15px; */
}
.all-content{
	background-image: url(http://rajwayu.com/assets/images/bg2.png), url(http://rajwayu.com/assets/images/bg2.png), url(http://rajwayu.com/assets/images/bg_ing.jpg) !important;
    background-position: left top, right top, left top !important;
    background-repeat: repeat-y, repeat-y, repeat !important;
    background-color: rgba(0,0,0,0) !important;
    background-blend-mode: color-dodge;
    background-attachment: fixed;
}
.all_ingredients > div{
	padding: 19px 5px 10px 5px;
	/*box-shadow: 1px 1px 15px 0 rgba(56,0,0,0.4);*/
	overflow: hidden;
	cursor: pointer;
}
.all_ingredients img.ing_image{
	max-height: 80px;
}
@media (min-width: 768px){
	.modal-dialog{
		width: 750px;
	}
}

.single_ingredient p::after{
	/*border-bottom: solid 1px #000; */
	background-color: #000; 
	width: 100%;
	height: 1px;
}
.single_ingredient:hover p::after{
}
</style>