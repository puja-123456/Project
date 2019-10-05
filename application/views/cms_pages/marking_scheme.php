<?php if($slug == "marking-scheme"){ ?>
<div class="row" style="margin-top:37px">
	<p>&nbsp;</p>
	
	<div class="col m3 s12">
		<div class="syllabus-menu"> 
          <div class="row">
	 
	 
	<div class="col-md-12 col-sm-12 inner-menu-school">
		 <p class="pull-right inner-hed appear-after-scroll" id="headingid" style="display:none"><?php echo $schoolname[0]; ?> </p>
		  <ul class="nav nav-tabs nav-for-details">
			<!-- <a href="<?php //echo base_url(); ?>umo"><li class="active btn">About</li></a>  -->
			<a href="<?php echo base_url().basename(base_url(uri_string())); ?>"><li class="btn">Marking Scheme</li></a> 
			<a href="<?php echo base_url(); ?>syllabus"><li class="btn">Syllabus<!-- <i class="right material-icons">format_align_left</i> --></li></a>
					 
		    <a href="<?php echo base_url();?>sample-papers"><li class="btn">Sample Papers<!-- <i class="right material-icons">description</i> --></li></a>
			<a href="<?php echo base_url(); ?>cut-off-and-rankings"><li class="btn">Cut Off<!-- <i class="right material-icons">description</i> --></li></a>
			<!-- <a target="_blank" href="<?php echo $this->config->item('main_site_link'); ?>courses/crest-olympiads/<?php echo strtolower(str_replace(" ","-",$category['name'])); ?>"><li class="btn"> Preparation Material</li></a> -->
			<!-- <li><a href="">Paritcipate in Olympiad Exam</a></li> --> 		
		</ul>
	 
	</div>
</div> 
 
			<br>
		</div>
	</div>

	<div class="col s12 m9" id="mkid">
		<h1 style="padding-left: 0px;">Marking Scheme</h1> 

		<div class="">
			<!-- <p class="flow-text">Pattern of Marking Scheme</p> -->
			 <p>Unicus Olympiads examinations are based on the immediate last 2 classes studied by the student. So, please find below the marking scheme for Main Exam for all the subjects under Unicus Olympiads. </p>
			 <p>Please select the subject to get complete detail of marking scheme about that subject.</p>
           
              <div class="row">
							<div class="col m4 l4 s12">
					<div class="card">
						<div class="card-content white-text center-align">
							<!-- <span>Card Title</span> -->

					<!-- <a class="card-title" href="http://localhost/crest_new/sample-questions-21">Class 1</a> -->
							<a class="card-title" href="<?php echo base_url(); ?>umo/marking-scheme"><h5>Unicus Mathematics Olympiad<br/>
							(UMO)</h5></a>
						</div>
					</div>
				</div>
								<div class="col m4 l4 s12">
					<div class="card">
						<div class="card-content white-text center-align">
							<!-- <span>Card Title</span> -->

					<!-- <a class="card-title" href="http://localhost/crest_new/sample-questions-22">Class 2</a> -->
							<a class="card-title" href="<?php echo base_url(); ?>uso/marking-scheme"><h5>Unicus Science Olympiad<br/>
							(USO)</h5></a>
						</div>
					</div>
				</div>
								<div class="col m4 l4 s12">
					<div class="card">
						<div class="card-content white-text center-align">
							<!-- <span>Card Title</span> -->

					<!-- <a class="card-title" href="http://localhost/crest_new/sample-questions-23">Class 3</a> -->
							<a class="card-title" href="<?php echo base_url(); ?>ueo/marking-scheme"><h5>Unicus English Olympiad<br/>
							(UEO)</h5></a>
						</div>
					</div>
				</div>
								<div class="col m4 l4 s12">
					<div class="card">
						<div class="card-content white-text center-align">
							<!-- <span>Card Title</span> -->

					<!-- <a class="card-title" href="http://localhost/crest_new/sample-questions-24">Class 4</a> -->
							<a class="card-title" href="<?php echo base_url(); ?>uco/marking-scheme"><h5>Unicus Cyber Olympiad<br/>(UCO)</h5></a>
						</div>
					</div>
				</div>
								<div class="col m4 l4 s12">
					<div class="card">
						<div class="card-content white-text center-align">
							<!-- <span>Card Title</span> -->

					<!-- <a class="card-title" href="http://localhost/crest_new/sample-questions-25">Class 5</a> -->
							<a class="card-title" href="<?php echo base_url(); ?>ugko/marking-scheme"><h5>Unicus General Knowledge Olympiad<br/>(UGKO)</h5></a>
						</div>
					</div>
				</div>
								<div class="col m4 l4 s12">
					<div class="card">
						<div class="card-content white-text center-align">
							<!-- <span>Card Title</span> -->

					<!-- <a class="card-title" href="http://localhost/crest_new/sample-questions-26">Class 6</a> -->
							<a class="card-title" href="<?php echo base_url(); ?>ucto/marking-scheme"><h5>Unicus Critical Thinking Olympiad<br/>(UCTO)</h5></a>
						</div>
					</div>
				</div>
								 
								 



			<div class="divider"></div>
		<!-- 	<p class="flow-text">Level 2 Marking Scheme</p>
			<div class="row">
				<ul class="left-align">
					<li><a href="#cmo-marking-scheme-l2">UNICUS Mathematics Olympiad</a></li>
					<li><a href="#cso-marking-scheme-l2">UNICUS Science Olympiad</a></li>
					<li><a href="#ceo-marking-scheme-l2">UNICUS English Olympiad</a></li>
				</ul>
			</div> -->
		</div>
	</div>
	<div class="col s12 m9">
		 

		<p>&nbsp;</p>
	</div>
</div>



<!-- <script type="text/javascript">

	$(document).ready(function() {

	    $().ready(function(){
	        $('.syllabus-menu a').click( function (e) {
	            var a = $(this).attr("href");
	            $("html, body").animate({scrollTop: $(a).offset().top - 125 }, 'slow');;
	        });
	    });
		if($(window).width()>768){

			$(window).scroll(function () {    
				var $el = $('.page-footer'),
				scrollTop = $(this).scrollTop(),
				scrollBot = scrollTop + $(this).height(),
				elTop = $el.offset().top,
				elBottom = elTop + $el.outerHeight(),
				visibleTop = elTop < scrollTop ? scrollTop : elTop,
				visibleBottom = elBottom > scrollBot ? scrollBot : elBottom;
				visible_height = visibleBottom - visibleTop;
				// console.log(visible_height);

                if(scrollTop <= 132){
                    visible_height = 253 - scrollTop ;
                    // console.log(visible_height);
                    $('.syllabus-menu').css("top",visible_height+"px");
                }
                else if(visible_height > -90){
                	$(".syllabus-menu h3").show(200);
                    visible_height = 90 - visible_height;
                    $('.syllabus-menu').css("top",visible_height+"px");
                }
                else if(scrollTop > 132 && visible_height < -90){
                	$(".syllabus-menu h3").show(200);
                	$('.syllabus-menu').css("top","145px");
				}
				// if(visible_height>0){
				// 	visible_height = 160 - visible_height;
				// 	$('.syllabus-menu').css("top",visible_height+"px");
				// }
				// else
				// 	$('.syllabus-menu').css("top","141px");
			});
		}
	});

</script>
 -->
<style type="text/css">
h5 {
	font-size: 14px !important;
}
ul:not(.browser-default)>li {
    font-size: 14px;
    line-height: 1em;
    padding: 10px 0px 5px 0px;
    list-style-type: none;
}
@media only screen and (min-width: 768px){
	.syllabus-menu{
		margin-top: 125px;
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
		margin-bottom: 10px;
		color:#000;
		width: 80%;
		border-bottom: 2px solid #47a69a;
		transition: all 1s ease;
	}
	.syllabus-menu ul li:hover{
		letter-spacing: 0.5px;
		border-bottom: 2px solid #11332f;
	}
#mkid{
	line-height: 15px; 
	 font-size: 13px;
	 margin-top: 0px;
   }
	
}

@media only screen and (max-width: 767px){
#mkid{
	margin-top: -67px;
   }
.syllabus-menu{
		margin-top: -76px;
	}
.left-align
	{
		padding-left:15px !important;
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
}

</style>


<?php } else{ ?> 



<div class="row" style="margin-top: 0px;"> 
		<div class="col m3 s12">
		<div class="syllabus-menu">
			<!-- <p><?php// echo $category['name']; ?></p> -->
			<!-- <p class="flow-text">Explore</p> -->
          <div class="row">
	 
	<!-- <p class="hidden-sm">&nbsp;</p> -->
	<div class="col-md-12 col-sm-12 inner-menu-school">
		 <p class="pull-right inner-hed appear-after-scroll" id="headingid" style="display:none"><?php echo $schoolname[0]; ?> </p>
		  <ul class="nav nav-tabs nav-for-details">
			<a href="<?php echo $current_url; ?>"><li class="active btn">About</li></a> 
			<a href="<?php echo base_url().$slugsubject; ?>/marking-scheme"><li class="btn">Marking Scheme</li></a> 
			<a href="<?php echo base_url().$slugsubject; ?>/syllabus"><li class="btn">Syllabus<!-- <i class="right material-icons">format_align_left</i> --></li></a>
					 
		    <a href="<?php echo base_url().$slugsubject; ?>/sample-papers"><li class="btn">Sample Papers<!-- <i class="right material-icons">description</i> --></li></a>
			<a href="<?php echo base_url().$slugsubject; ?>/cut-off-and-rankings"><li class="btn">Cut Off<!-- <i class="right material-icons">description</i> --></li></a>
		<!-- <a target="_blank" href="<?php echo $this->config->item('main_site_link'); ?>courses/crest-olympiads/<?php echo strtolower(str_replace(" ","-",$category['name'])); ?>"><li class="btn"><?=strtoupper($category['slug']); ?> Preparation Material</li></a> -->
			<!-- <li><a href="">Paritcipate in Olympiad Exam</a></li> --> 		
		</ul>
		
	</div>
</div> 
 
			<br>
		</div>
	</div>


<div class="col m9 s12">
	<p>&nbsp;</p>
	<h1 class="left-align">Marking Scheme</h1>
    <?php echo $ultitle; ?>
    <div> 
	<!-- <p class="hidden-sm">&nbsp;</p> -->
	<!-- <div class="col-md-12 col-sm-12 inner-menu-school"> --> 
		<ul class="nav nav-tabs nav-for-details">
		<a href="<?php echo base_url(); ?>umo/marking-scheme"><li class="active btn">UMO</li></a>
		<a href="<?php echo base_url(); ?>uso/marking-scheme"><li class="btn">USO</li></a>
        <a href="<?php echo base_url(); ?>ueo/marking-scheme"><li class="btn">UEO</li></a>
        <a href="<?php echo base_url(); ?>uco/marking-scheme"><li class="btn">UCO</li></a>
        <a href="<?php echo base_url(); ?>ugko/marking-scheme"><li class="btn">UGKO</li></a>
        <a href="<?php echo base_url(); ?>ucto/marking-scheme"><li class="btn">UCTO</li></a> 
	 	
		</ul> 
 
		</div> 
	 
	<div class="col s12 m12">
		<div class="row">
	 
		<!-- 	<h4>Level 1 Exam Pattern and Marking Scheme</h4>  -->
			<?php //echo $detailsoflevel1; ?> 

 
			<table class="responsive-table highlight">
				<tbody>
					<tr>
						<td>Classes</td>
						<td>Class and Topic/ Section</td>
						<td>Total Questions</td>
						<td>Marks per Question</td>
						<td>Total Marks</td>
					</tr>
					<tr>
						<td rowspan="3">
							1<sup>st</sup> & 2<sup>nd</sup>
						</td>
						<td>Previous Class Regular</td>
						<td>30</td>
						<td>1</td>
						<td>30</td>
					</tr>
					<tr>
						<td>Previous Class Achievers</td>
						<td>5</td>
						<td>2</td>
						<td>10</td>
					</tr>
					<tr>
						<td><strong>Grand Total</strong></td>
						<td><strong>35</strong></td>
						<td> </td>
						<td><strong>40</strong></td>
					</tr>
					<tr>
						<td rowspan="4">
							3<sup>rd</sup> to 5<sup>th</sup>
						</td>
					    <td>Previous Class Regular</td>
						<td>23</td>
						<td>1</td>
						<td>23</td>
					</tr>
					<tr>
						<td>Previous Class Achievers</td>
						<td>7</td>
						<td>2</td>
						<td>14</td>
					</tr>
						<tr>
						<td>Previous to Previous Class Achievers</td>
						<td>3</td>
						<td>2</td>
						<td>6</td>
					</tr>
					<tr>
						<td><strong>Grand Total</strong></td>
						<td><strong>40</strong></td>
						<td> </td>
						<td><strong>50</strong></td>
					</tr>


					<tr>
						<td rowspan="5">
							6<sup>th</sup> to 10<sup>th</sup>
						</td>
					    <td>Previous Class Regular</td>
						<td>28</td>
						<td>1</td>
						<td>28</td>
					</tr>
					<tr>
						<td>Previous Class Achievers</td>
						<td>7</td>
						<td>2</td>
						<td>14</td>
					</tr>
						<tr>
						<td>Previous to Previous Class Regular</td>
						<td>12</td>
						<td>1</td>
						<td>12</td>
					</tr>
						<tr>
						<td>Previous to Previous Class Achievers</td>
						<td>3</td>
						<td>2</td>
						<td>6</td>
					</tr>
					<tr>
						<td><strong>Grand Total</strong></td>
						<td><strong>50</strong></td>
						<td> </td>
						<td><strong>60</strong></td>
					</tr>
				</tbody>
			</table> 


			 <p>&nbsp;</p>
			 
			 
		</div>

		<p>&nbsp;</p>
	</div>
</div>
 


<script type="text/javascript">

	$(document).ready(function() {

	    $().ready(function(){
	        $('.syllabus-menu a').click( function (e) {
	            var a = $(this).attr("href");
	            $("html, body").animate({scrollTop: $(a).offset().top - 125 }, 'slow');;
	        });
	    });
		if($(window).width()>768){

			$(window).scroll(function () {    
				var $el = $('.page-footer'),
				scrollTop = $(this).scrollTop(),
				scrollBot = scrollTop + $(this).height(),
				elTop = $el.offset().top,
				elBottom = elTop + $el.outerHeight(),
				visibleTop = elTop < scrollTop ? scrollTop : elTop,
				visibleBottom = elBottom > scrollBot ? scrollBot : elBottom;
				visible_height = visibleBottom - visibleTop;
				// console.log(visible_height);

                if(scrollTop <= 132){
                    visible_height = 20 - scrollTop ;
                    // console.log(visible_height);
                    $('.syllabus-menu').css("top",visible_height+"px");
                }
                else if(visible_height > -90){
                	$(".syllabus-menu h3").show(200);
                    visible_height = 90 - visible_height;
                    $('.syllabus-menu').css("top",visible_height+"px");
                }
                else if(scrollTop > 132 && visible_height < -90){
                	$(".syllabus-menu h3").show(200);
                	$('.syllabus-menu').css("top","145px");
				}
				// if(visible_height>0){
				// 	visible_height = 160 - visible_height;
				// 	$('.syllabus-menu').css("top",visible_height+"px");
				// }
				// else
				// 	$('.syllabus-menu').css("top","141px");
			});
		}
	});

</script>

<style type="text/css">
td, th { 
    font-size: 13px;

}
ul:not(.browser-default)>li {
    font-size: 14px;
    line-height: 1em;
    padding: 10px 0px 5px 0px;
    list-style-type: none;
}
li.btn {
    color: #000;
}
@media only screen and (min-width: 768px){
	.syllabus-menu{
		margin-top: 135px;
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
		margin-bottom: 10px;
		color:#000;
	/*	padding: 5px 10px;*/
		width: 80%;
		border-bottom: 2px solid #47a69a;
		transition: all 1s ease;
	}
	.syllabus-menu ul li:hover{
		letter-spacing: 0.5px;
		border-bottom: 2px solid #11332f;
	}
	.left-align{
	margin-top: 90px;
     }
	
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
	margin-top: -80px;
}
 }

 
</style>
<?php } ?>