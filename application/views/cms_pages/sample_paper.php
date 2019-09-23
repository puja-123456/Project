
<div class="row">
<h1 class="left-align" >Sample Papers</h1>
<!-- <h1>Sample Papers</h1> -->
 <div class="col m3 s12">
		<div class="syllabus-menu">
		 
	<div class="col-md-12 col-sm-12 inner-menu-school">
		 <p class="pull-right inner-hed appear-after-scroll" id="headingid" style="display:none"><?php echo $schoolname[0]; ?> </p>
		  <ul class="nav nav-tabs nav-for-details">
			<!-- <a href="<?php //echo $current_url; ?>"><li class="active btn">About</li></a>  -->
			<a href="<?php echo base_url(); ?>marking-scheme"><li class="btn">Marking Scheme</li></a> 
			<a href="<?php echo base_url(); ?>syllabus"><li class="btn">Syllabus<!-- <i class="right material-icons">format_align_left</i> --></li></a>
					 
		    <a href="<?php echo base_url(); ?>sample-papers"><li class="btn">Sample Papers<!-- <i class="right material-icons">description</i> --></li></a>
			<a href="<?php echo base_url(); ?>cut-off-and-rankings"><li class="btn">Cut Off<!-- <i class="right material-icons">description</i> --></li></a>
			<a target="_blank" href="<?php echo $this->config->item('main_site_link'); ?>courses/crest-olympiads/<?php echo strtolower(str_replace(" ","-",$category['name'])); ?>"><li class="btn"> Preparation Material<!-- <i class="right matertarget="_blank"ial-icons">description</i> --></li></a>
			<!-- <li><a href="">Paritcipate in Olympiad Exam</a></li> --> 		
		</ul>
		 
    </div>  
		</div>
	</div>
 
	
	<div class="col m9 s12">
	<!-- 	<h1>Sample Papers</h1> -->
		<div  class="row">
		<?php 
			$mainCategories2 = $this->config->item('main_categories');
			foreach ($mainCategories2 as $key => $category) {
				?>
				  <h5 style="color: #000;line-height: 40px;" class="col s12 m12 l12"><?php echo $category[1]; ?> Sample Papers</h5><br/>
				<!-- <a class="col s4 center" href="<?php //echo base_url().$category[0]; ?>-sample-papers">
					Sample Questions of <?php //echo $category[1]; ?> -->
				<!-- <p>&nbsp;</p> -->
				</a> 
              <a href="<?php echo base_url().$category[0]; ?>/sample-papers"><div class="col m1 s12 alllink">All</div></a>
              <?php 

					 
			for ($i=1; $i <= 10; $i++) { 
				     	# code...
				     
					 //print_r($syllabuss);die;
					 //if($syllabus->name != ucfirst($class_name)) {
					?>
					
                  <a href="<?php echo base_url().$category[0].'/sample-papers-class-'.$i; ?>"><div class="col m1 s12" style="margin-bottom: 10px;">Class <?php echo $i; ?></div></a>
					<?php 
				   //}
				 
			     }

 
			}
      	?>


		</div>
	</div>
</div>

<style>
ul:not(.browser-default)>li {
    font-size: 14px;
    line-height: 1em;
    padding: 10px 0px 5px 0px;
    list-style-type: none;
}
@media only screen and (min-width: 768px){
	.circle{
		height: 95px !important;
	}
	
	.syllabus-menu{
		position: absolute;
		padding: 0px 10px;
		width: inherit;
		/*top:145px;*/
	}
	.syllabus-menu .divider{
		margin-right: 75px;
	}
	.syllabus-menu .flow-text{
		margin-top: 0px;
		margin-bottom: 10px;
	}
	.syllabus-menu ul li{
	/*	padding: 5px 10px;*/
	   color:#000;
		margin-bottom: 10px;
		width: 80%;
		border-bottom: 2px solid #47a69a;
		transition: all 1s ease;
	}
	.syllabus-menu ul li:hover{
		letter-spacing: 0.5px;
		border-bottom: 2px solid #11332f;
	}
	.left-align{
	margin-top: 120px;
   }
}
.col .row
{
	margin: 0px !important;
}
@media only screen and (max-width: 768px){
.syllabus-menu ul {
    padding: 0px !important;
}
.syllabus-menu ul li {
     padding: 17px;
    line-height: 2px;
    margin: 3px;
}
 
.syllabus-menu ul li {
	 color:#000;
     padding: 17px;
     line-height: 2px;
     margin: 3px;
} 
.left-align{
	margin-top: 20px;
}
.alllink{
	    margin-bottom: 10px;
}

}
</style>




