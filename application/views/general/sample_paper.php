<p>&nbsp;</p>
<div class="fuild-container">
	<div class="row">
	<h1 class="left-align"><?php echo $category['name']; ?> Sample Papers</h1>
        <div class="col m3 s12">
		<div class="syllabus-menu"> 
          <div class="row"> 
	<div class="col-md-12 col-sm-12 inner-menu-school">
		 <p class="pull-right inner-hed appear-after-scroll" id="headingid" style="display:none"><?php echo $schoolname[0]; ?> </p>
		  <ul class="nav nav-tabs nav-for-details">
			<a href="<?php echo base_url(); ?>umo"><li class="active btn">About</li></a> 
			<a href="<?php echo base_url().$url_sample_paper; ?>/marking-scheme"><li class="btn">Marking Scheme</li></a> 
			<a href="<?php echo base_url().$url_sample_paper; ?>/syllabus"><li class="btn">Syllabus<!-- <i class="right material-icons">format_align_left</i> --></li></a>
					 
		    <a href="<?php echo base_url().$url_sample_paper; ?>/sample-papers"><li class="btn">Sample Papers<!-- <i class="right material-icons">description</i> --></li></a>
			<a href="<?php echo base_url().$url_sample_paper; ?>/cut-off-and-rankings"><li class="btn">Cut Off<!-- <i class="right material-icons">description</i> --></li></a>
			<a target="_blank" href="<?php echo $this->config->item('main_site_link'); ?>courses/crest-olympiads/<?php echo strtolower(str_replace(" ","-",$category['name'])); ?>"><li class="btn"> Preparation Material<!-- <i class="right matertarget="_blank"ial-icons">description</i> --></li></a>
			<!-- <li><a href="">Paritcipate in Olympiad Exam</a></li> --> 		
		</ul>
		 
	</div>
</div> 
 
			<br>
		</div>
	</div>
 

	<div class="col m9 s12">
		<div class="">
			<h5>Subjects</h5>
			<div class="row">  
            <!--  <div class="col s1"><a href="<?php echo base_url().$category['slug']; ?>">About</a></div> -->
             <?php
				 /*$i=1;*/
				 //print_r($categories);die;
				foreach ($categories as $syllabus) {
					 if($syllabus['name'] != ucfirst($category['name'])) {
					?>
             <a href="<?php echo base_url().$syllabus['slug'].'/sample-papers'; ?>"><div class="col s12 m5 alllinks"><?php echo $syllabus['name'].' Sample Papers'; ?>
             	

             </div></a> 
					<?php 
			      }
				/*$i++;*/
			   } 
				?>
				 
			</div>
		</div>  
		 <div class="row">
			<?php
			foreach ($categories as $syllabus) { 
               if($syllabus['name'] == $category['name']){
				?>

				<div id="">
					<h5><?php echo $syllabus['name']; ?></h5>
					<p>
						<?php echo $syllabus['long_description']; ?>
					</p>
				</div>
				<?php
			}
			}
			?>
		</div>  
	</div> 
</div>
</div>

 

<style type="text/css">
.alllinks{
	margin-bottom: 10px;
	font-size: 13px;
}
p{
	font-size: 13px;
}
ul:not(.browser-default)>li {
    font-size: 13px;
    line-height: 1em;
    padding: 10px 0px 5px 0px;
    list-style-type: none;
}
@media only screen and (min-width: 768px){
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
		/*padding: 5px 10px;*/
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
		margin-top: 80px;
	}
}
.col .row
{
	margin: 0px !important;
}
@media only screen and (max-width: 768px){
.syllabus-menu{
		margin-top: 0px;
	}
.syllabus-menu ul li {
	color:#000;
     padding: 17px;
    line-height: 2px;
    margin: 3px;
}
 
.syllabus-menu ul li {
      padding: 17px;
    line-height: 2px;
    margin: 3px;
}
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
.left-align{
	padding-left:-40px !important;
	margin-top: -20px;
}
}


</style>