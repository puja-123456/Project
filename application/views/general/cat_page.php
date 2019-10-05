<p>&nbsp;</p>
<div class="row">
	<h1 class="left-align"><?php echo $category['name']; ?></h1>
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
			<a href="<?php echo base_url().basename(base_url(uri_string())); ?>/marking-scheme"><li class="btn">Marking Scheme</li></a> 
			<a href="<?php echo base_url().$category['slug']; ?>/syllabus"><li class="btn">Syllabus<!-- <i class="right material-icons">format_align_left</i> --></li></a>
					 
		    <a href="<?php echo base_url().$category['slug']; ?>/sample-papers"><li class="btn">Sample Papers<!-- <i class="right material-icons">description</i> --></li></a>
			<a href="<?php echo base_url().$category['slug']; ?>/cut-off-and-rankings"><li class="btn">Cut Off<!-- <i class="right material-icons">description</i> --></li></a>
			<a target="_blank" href="https://www.olympiadsuccess.com"><li class="btn">Preparation Material<!-- <i class="right matertarget="_blank"ial-icons">description</i> --></li></a>
			<!-- <li><a href="">Paritcipate in Olympiad Exam</a></li> --> 		
		</ul>
		 
	</div>
</div> 
 
			<br>
		</div>
	</div>
	<div class="col m9 s12 ">
		<div class="row padding-right-70">
			<div class="row">
				<div class="col s12 m11">
					<h5 style="margin-top: 0px;">About</h5>
					<!-- <img src="<?=base_url()?>assets/images/original/<?php echo $category['slug']; ?>-banner.jpg" class="responsive-img"> -->
					<div class="row">
					<div id="about">
						<?php echo $category['long_description']; ?>
					</div>
					</div>
				</div>
			</div>
			
		</div>
		
	</div>

</div>

<script type="text/javascript">

	$(document).ready(function() {

	    $().ready(function(){
	        $('.syllabus-menu a').click( function (e) {
	            var a = $(this).attr("href");
	            // console.log($(this).attr("href").offset().top);
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

<style type="text/css">
p{
	font-size: 13px;
}
ul:not(.browser-default)>li {
    font-size: 13px;
    line-height: 1em;
    padding: 10px 0px 5px 0px;
    list-style-type: none;
}
@media only screen and (max-width: 767px){

	i.right
	{
		margin:0px !important;
	}
	.syllabus-menu ul
	{
		padding:0px !important;
	}

	}
@media only screen and (min-width: 980px){
	.padding-right-70{
		padding-right: 70px;
	}
}
@media only screen and (min-width: 768px){
	.padding-right-70{
		padding-right: 50px;
	}
	.syllabus-menu{
		position: fixed;
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
.col .row
{
	margin: 0px !important;
}
.btn{
	margin-bottom: 10px;
}
@media screen and (orientation:portrait) 
{
#responsive-img
{
display:none;
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
 }
</style>
















