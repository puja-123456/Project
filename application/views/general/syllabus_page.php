<?php if($class_static_name == 'umo-syllabus-class'){  ?>
<p>&nbsp;</p>
<div class="fuild-container">
	<div class="row">
    <div class="col m3 s12">
	 <div class="syllabus-menu left-menu" >
			 
          <div class="row">
	 
	<!-- <p class="hidden-sm">&nbsp;</p> -->
	<div class="col-md-12 col-sm-12 inner-menu-school">
		 <p class="pull-right inner-hed appear-after-scroll" id="headingid" style="display:none"><?php echo $schoolname[0]; ?> </p>
		  <ul class="nav nav-tabs nav-for-details">
			<a href="<?php echo base_url().$category['slug']; ?>"><li class="active btn">About</li></a> 
			<a href="<?php echo base_url().$category['slug']; ?>/marking-scheme"><li class="btn">Marking Scheme</li></a> 
			<a href="<?php echo base_url().$category['slug']; ?>/syllabus"><li class="btn">Syllabus<!-- <i class="right material-icons">format_align_left</i> --></li></a>
					 
		    <a href="<?php echo base_url().$category['slug']; ?>/sample-papers"><li class="btn">Sample Papers<!-- <i class="right material-icons">description</i> --></li></a>
			<a href="<?php echo base_url().$category['slug']; ?>/cut-off-and-rankings"><li class="btn">Cut Off<!-- <i class="right material-icons">description</i> --></li></a>
			<a target="_blank" href="<?php echo $this->config->item('main_site_link'); ?>courses/crest-olympiads/<?php echo strtolower(str_replace(" ","-",$category['name'])); ?>"><li class="btn">Preparation Material<!-- <i class="right matertarget="_blank"ial-icons">description</i> --></li></a>
			<!-- <li><a href="">Paritcipate in Olympiad Exam</a></li> --> 		
		</ul>
		 
	</div>
</div> 
 
			<br>
		</div>
	</div>

<div class="col m9 s12">

	<h1 class="left-align"><?php echo $category['name']; ?> Syllabus</h1>
	
		<div>
			<h5>Classes</h5>
			<div class="row">  
            <!--  <div class="col s1"><a href="<?php echo base_url().$category['slug']; ?>">About</a></div> -->
             <?php
				 $i=1;
				foreach ($all_syllabus as $syllabus) {
					 if($syllabus->name != ucfirst($class_name)) {
					?>
             <a href="<?php echo base_url().$url.'-'.$i; ?>"><div class="col s12 m1 alllinks"><?php echo ucfirst($syllabus->name); ?></div></a> 
					<?php 
				}
				$i++;
			   } 
				?>
				 
			</div>
		</div>  
		 <div class="row">
			<?php
			foreach ($all_syllabus as $syllabus) { 
               if($syllabus->name == ucfirst($class_name)){
				?>

				<div id="syllabus-<?php echo $syllabus->id; ?>">
					<h5><?php echo $syllabus->name; ?></h5>
					<p>
						<?php echo $syllabus->description; ?>
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
p{
	font-size: 13px;
}
.alllinks{
	font-size: 13px;
	padding-left: 0px !important;
}
ul:not(.browser-default)>li {
    font-size: 14px;
    line-height: 1em;
    padding: 10px 0px 5px 0px;
    list-style-type: none;
}
@media only screen and (min-width: 768px){
	.syllabus-menu{
		position: absolute;
		padding: 0px 10px;
		width: inherit;
		margin-top: 80px;
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
	.left-align {
		margin-top: 80px;
	}

	 
}
@media only screen and (max-width: 768px){
.syllabus-menu{
	margin-top: -20px;
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
.left-align {
		margin-top: 0px;
}

}
.col .row
{
	margin: 0px !important;
}
</style>
<?php } else if($class_static_name == 'umo-syllabus') { ?>
<p>&nbsp;</p>
<div class="fuild-container">
	<div class="row">
	<h1 class="left-align"><?php echo ucfirst($category['name']); ?> Syllabus</h1>
        <div class="col m3 s12">
		<div class="syllabus-menu">
			<!-- <p><?php echo $category['name']; ?></p> -->
			<!-- <p class="flow-text">Explore</p> -->
          <div class="row">
	 
	<!-- <p class="hidden-sm">&nbsp;</p> -->
	<div class="col-md-12 col-sm-12 inner-menu-school">
		 <p class="pull-right inner-hed appear-after-scroll" id="headingid" style="display:none"><?php echo $schoolname[0]; ?> </p>
		  <ul class="nav nav-tabs nav-for-details">
			<a href="<?php echo base_url().$category['slug']; ?>"><li class="active btn">About</li></a> 
			<a href="<?php echo base_url().$category['slug']; ?>/marking-scheme"><li class="btn">Marking Scheme</li></a> 
			<a href="<?php echo base_url().$category['slug']; ?>/syllabus"><li class="btn">Syllabus<!-- <i class="right material-icons">format_align_left</i> --></li></a>
					 
		    <a href="<?php echo base_url().$category['slug']; ?>/sample-papers"><li class="btn">Sample Papers<!-- <i class="right material-icons">description</i> --></li></a>
			<a href="<?php echo base_url().$category['slug']; ?>/cut-off-and-rankings"><li class="btn">Cut Off<!-- <i class="right material-icons">description</i> --></li></a>
			<a target="_blank" href="<?php echo $this->config->item('main_site_link'); ?>courses/crest-olympiads/<?php echo strtolower(str_replace(" ","-",$category['name'])); ?>"><li class="btn">Preparation Material<!-- <i class="right matertarget="_blank"ial-icons">description</i> --></li></a>
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
             <a href="<?php echo base_url().$syllabus['slug'].'/syllabus'; ?>"><div class="col s12 m4 alllinks"><?php echo $syllabus['name']; ?></div></a> 
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
	font-size: 13px;
	    margin-bottom: 5px;
}
p{
	font-size: 13px;
}
ul:not(.browser-default)>li {
    font-size: 14px;
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
.syllabus-menu ul li {
	color:#000;
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
	margin-top: -20px;
}

}
 
</style>
<?php } else if($class_static_name == ''){ ?> 
 

<p>&nbsp;</p>
<div class="fuild-container">
	<div class="row">
	<h1 class="left-align">Syllabus</h1>
    <p style="padding: 0px 14px 0px 15px;">Unicus Olympiads syllabus is carefully designed by our intellectual team of subject matter experts. Unicus Olympiads considers the syllabus for all the subjects taking into consideration the syllabus for immediate last two years studied in school for classes 3-10 while it considers the syllabus of just the last class for classes 1 and 2.</p> 
<p style="padding: 0px 14px 0px 15px;">The syllabus for all the classes under every subject of Unicus Olympiads is given below.</p>    

    <div class="col m3 s12">
		<div class="syllabus-menu">
			<!-- <p><?php //echo $category['name']; ?></p> -->
			<!-- <p class="flow-text">Explore</p> -->
          <div class="row">
	 
	<!-- <p class="hidden-sm">&nbsp;</p> -->
	<div class="col-md-12 col-sm-12 inner-menu-school">
		 <p class="pull-right inner-hed appear-after-scroll" id="headingid" style="display:none"><?php echo $schoolname[0]; ?> </p>
		  <ul class="nav nav-tabs nav-for-details">
			<!-- <a href="<?php echo base_url(); ?>umo"><li class="active btn">About</li></a>  -->
			<a href="<?php echo base_url(); ?>marking-scheme"><li class="btn">Marking Scheme</li></a> 
			<a href="<?php echo base_url(); ?>syllabus"><li class="btn">Syllabus<!-- <i class="right material-icons">format_align_left</i> --></li></a>
					 
		    <a href="<?php echo base_url(); ?>sample-papers"><li class="btn">Sample Papers<!-- <i class="right material-icons">description</i> --></li></a>
			<a href="<?php echo base_url(); ?>cut-off-and-rankings"><li class="btn">Cut Off<!-- <i class="right material-icons">description</i> --></li></a>
			
			<a target="_blank" href="https://www.olympiadsuccess.com/"><li class="btn">Preparation Material<!-- <i class="right matertarget="_blank"ial-icons">description</i> --></li></a>
			<!-- <li><a href="">Paritcipate in Olympiad Exam</a></li> --> 		
		</ul>
		 
	</div>
</div> 
 
			<br>
		</div>
	</div>


	<div class="col m9 s12">
		<!-- <div class="syllabus-menu"> -->
		<!-- 	<p>Classes</p> -->
			<div class="row">  
			
            <!--  <div class="col s1"><a href="<?php //echo base_url().$category['slug']; ?>">About</a></div> -->
             <?php
				 /*$i=1;*/
				 //print_r($categories);die;

				 $j=0;
				foreach ($categories as $syllabus) {
					
			     if($syllabus['name'] != ucfirst($category['name'])) {
					?>
                  <h5 style="color: #000;line-height: 40px;" class="col s12 m12 l12"><?php echo $syllabus['name']; ?></h5><br/>
					 <a href="<?php echo base_url().$syllabus['slug'].'/syllabus'; ?>"><div class="col m1 s12 alllink">All</div></a>

				  <?php 
				     for ($i=1; $i <= 10; $i++) { 
				     	# code...
				     
					 //print_r($syllabuss);die;
					 //if($syllabus->name != ucfirst($class_name)) {
					?>
                <!--  <?php //print_r($url);die; ?> -->
                  <a href="<?php echo base_url().$url[$j].'-'.$i; ?>"><div class="col m1 s12 alllinks" style="margin-bottom: 10px;    padding-left: 0px;">Class <?php echo $i; ?></div></a>
					<?php 
				   //}
				 
			     } 
			      }
				$j++;
			   }  
				?>

			<!-- </div> -->
		</div>  
		  
	</div> 
</div>
</div>

 

<style type="text/css">
p{
	font-size: 13px;
}
.alllinks{
	font-size: 13px;
}
.alllink{
	font-size: 13px;
}
ul:not(.browser-default)>li {
    font-size: 14px;
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
		color:#000;
		margin-bottom: 10px;
		/*padding: 5px 10px;*/
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
@media only screen and (max-width: 768px){

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
	margin-top: -20px;
}
.alllink{
	    margin-bottom: 10px;
}


}
.col .row
{
	margin: 0px !important;
}
</style>
<?php }?>