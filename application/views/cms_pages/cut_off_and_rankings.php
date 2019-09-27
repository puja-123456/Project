<?php  
if($subject == 'umo'){ ?>
<div class="row">
	<p>&nbsp;</p>
     	<div class="col m3 s12" id="coarid" >
		<div class="syllabus-menu">
			<!-- <p><?php// echo $category['name']; ?></p> -->
			<!-- <p class="flow-text">Explore</p> -->
          <div class="row">
	 
	<!-- <p class="hidden-sm">&nbsp;</p> -->
	<div class="col-md-12 col-sm-12 inner-menu-school">
		 <p class="pull-right inner-hed appear-after-scroll" id="headingid" style="display:none"><?php echo $schoolname[0]; ?> </p>
		  <ul class="nav nav-tabs nav-for-details">
			<!-- <a href="<?php echo $current_url; ?>"><li class="active btn">About</li></a>  -->
			<a href="<?php echo base_url(); ?>umo/marking-scheme"><li class="btn">Marking Scheme</li></a> 
			<a href="<?php echo base_url(); ?>umo/syllabus"><li class="btn">Syllabus<!-- <i class="right material-icons">format_align_left</i> --></li></a>
					 
		    <a href="<?php echo base_url(); ?>umo/sample-papers"><li class="btn">Sample Papers<!-- <i class="right material-icons">description</i> --></li></a>
			<a href="<?php echo base_url(); ?>umo/cut-off-and-rankings"><li class="btn">Cut Off<!-- <i class="right material-icons">description</i> --></li></a>
			<a target="_blank" href="https://www.olympiadsuccess.com/"><li class="btn"> Preparation Material<!-- <i class="right matertarget="_blank"ial-icons">description</i> --></li></a>
			<!-- <li><a href="">Paritcipate in Olympiad Exam</a></li> --> 		
		</ul>
		 
	</div>
</div> 
 
			<br>
		</div>
	</div>


	
	<div class="col s12 m9" id="umocid" >
		<div class="row">
			<h1 style="margin-top: 100px;">Cut-offs and Raking Criteria for all the subjects of Unicus Olympiads</h1>
			<!-- <a href="<?php //echo base_url(); ?>cro-rankers" target="_blank"><button style="background-color: #79554833 !important;border-radius: 5px;padding:10px;cursor: pointer;">CRO Rankers</button></a>
			<a href="<?php //echo base_url(); ?>cro-cutoff" target="_blank"><button style="background-color: #79554833 !important;border-radius: 5px;padding:10px;cursor: pointer;">CRO Cut-offs</button></a> -->
			
			<h2>Cut-off to Qualify for Final Round</h2>
			<p>UGKO, UCO and UCTO (classes 1 to 10) and UEO, USO and UMO (classes 1 and 2) will have just one round which will be the final round. Hence, no cut-off would be required in this case.</p>
			<p>While UEO, USO and UMO (classes 3 to 10) will have preliminary round followed by the final round if the student’s score is above the cut-off. The applicants of UEO, USO and UMO (classes 3 to 10) should fulfil any of the following 3 criteria to qualify for Final Round Olympiads exams:</p>
			<ul>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>Top 5% of candidates in a particular class that have given the Preliminary Round exam.</li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>Top 25 rank holders in a particular class and in a particular city (top 50 cities in India)/zone(remaining towns and cities including international locations is divided into <p style="margin-left:23px">5 zones - East, West, North and South, and International).</p></li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>Top 3 students (registered through school) from every school with more than 25 students in a class appearing for an Olympiad exam.</li>
			 
			</ul>
			<p> </p>
			<h2>Ranking Criteria for Final Round Exams</h2>
			<p>The ranks will be given on the following criteria:</p>
		 
			<ul>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>Total marks obtained in the exam.</li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>If two or more students score same total marks then the ranks will be determined on the basis of</li>
				<p style="text-indent: 20px;">a. marks scored in 'Achievers' section if the students have given only Final round</p>
				<p style="text-indent: 20px;">b. marks scored in 'Achievers' section of Preliminary Round exam</p>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>In case of a tie, the student completing the test in lesser time will be ranked higher.</li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>In case of a tie again, the younger student based on Date of Birth will be ranked higher.</li> 
				<li class=""><i class="material-icons">keyboard_arrow_right</i>Since Unicus Olympiads will be held on different days and sessions with different sets of question papers, final ranks will be announced based on normalization of the ranks for each session.</li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>In case two or more students score same marks under the criteria above, they will be awarded the same rank.</li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>In case of any confusion, decision of the Academic Council will be final & binding.</li>
			</ul> 
			
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
                    visible_height = 153 - scrollTop ;
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
<style> 
.material-icons
{
position: relative;
top: 5px;
}
 
@media only screen and (min-width: 768px){
	#umocid{
		margin-top: -28px;
	}
	.padding-right-70{
		padding-right: 50px;
	}
	.syllabus-menu{
		position: fixed;
		padding: 0px 10px;
		width: inherit;
	    top:145px;
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
	#coarid{
		margin-top: -55px;
	}
	#umocid{
		margin-top: -101px;
	}
.syllabus-menu ul{
		padding:0px;
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
	margin-top: -20px;
}
 }
</style>
<?php  } else if($subject == 'uso') { ?>
<div class="row">
	<p>&nbsp;</p>

<div class="col m3 s12" id="coarid" >
		<div class="syllabus-menu">
			<!-- <p><?php// echo $category['name']; ?></p> -->
			<!-- <p class="flow-text">Explore</p> -->
          <div class="row">
	 
	<!-- <p class="hidden-sm">&nbsp;</p> -->
	<div class="col-md-12 col-sm-12 inner-menu-school">
		 <p class="pull-right inner-hed appear-after-scroll" id="headingid" style="display:none"><?php echo $schoolname[0]; ?> </p>
		  <ul class="nav nav-tabs nav-for-details">
			<!-- <a href="<?php echo $current_url; ?>"><li class="active btn">About</li></a>  -->
			<a href="<?php echo base_url(); ?>uso/marking-scheme"><li class="btn">Marking Scheme</li></a> 
			<a href="<?php echo base_url(); ?>uso/syllabus"><li class="btn">Syllabus<!-- <i class="right material-icons">format_align_left</i> --></li></a>
					 
		    <a href="<?php echo base_url(); ?>uso/sample-papers"><li class="btn">Sample Papers<!-- <i class="right material-icons">description</i> --></li></a>
			<a href="<?php echo base_url(); ?>uso/cut-off-and-rankings"><li class="btn">Cut Off<!-- <i class="right material-icons">description</i> --></li></a>
			<a target="_blank" href="https://www.olympiadsuccess.com/"><li class="btn"> Preparation Material<!-- <i class="right matertarget="_blank"ial-icons">description</i> --></li></a>
			<!-- <li><a href="">Paritcipate in Olympiad Exam</a></li> --> 		
		</ul>
		 
	</div>
</div> 
 
			<br>
		</div>
	</div>



	<div class="col s12 m9" id="umocid">
		<div class="row">
			<h1 style="margin-top: 100px;">Cut-offs and Raking Criteria for all the subjects of Unicus Olympiads</h1>
			<!-- <a href="<?php //echo base_url(); ?>cro-rankers" target="_blank"><button style="background-color: #79554833 !important;border-radius: 5px;padding:10px;cursor: pointer;">CRO Rankers</button></a>
			<a href="<?php //echo base_url(); ?>cro-cutoff" target="_blank"><button style="background-color: #79554833 !important;border-radius: 5px;padding:10px;cursor: pointer;">CRO Cut-offs</button></a> -->
			
			<h2>Cut-off to Qualify for Final Round</h2>
			<p>UGKO, UCO and UCTO (classes 1 to 10) and UEO, USO and UMO (classes 1 and 2) will have just one round which will be the final round. Hence, no cut-off would be required in this case.</p>
			<p>While UEO, USO and UMO (classes 3 to 10) will have preliminary round followed by the final round if the student’s score is above the cut-off. The applicants of UEO, USO and UMO (classes 3 to 10) should fulfil any of the following 3 criteria to qualify for Final Round Olympiads exams:</p>
			<ul>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>Top 5% of candidates in a particular class that have given the Preliminary Round exam.</li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>Top 25 rank holders in a particular class and in a particular city (top 50 cities in India)/zone(remaining towns and cities including international locations is divided into <p style="margin-left:23px">5 zones - East, West, North and South, and International).</p></li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>Top 3 students (registered through school) from every school with more than 25 students in a class appearing for an Olympiad exam.</li>
			 
			</ul>
			<p> </p>
			<h2>Ranking Criteria for Final Round Exams</h2>
			<p>The ranks will be given on the following criteria:</p>
		 
			<ul>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>Total marks obtained in the exam.</li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>If two or more students score same total marks then the ranks will be determined on the basis of</li>
				<p style="text-indent: 20px;">a. marks scored in 'Achievers' section if the students have given only Final round</p>
				<p style="text-indent: 20px;">b. marks scored in 'Achievers' section of Preliminary Round exam</p>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>In case of a tie, the student completing the test in lesser time will be ranked higher.</li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>In case of a tie again, the younger student based on Date of Birth will be ranked higher.</li><br/>
				<li>Since Unicus Olympiads will be held on different days and sessions with different sets of question papers, final ranks will be announced based on normalization of the ranks for each session.</li>
				<li>In case two or more students score same marks under the criteria above, they will be awarded the same rank.</li>
				<li>In case of any confusion, decision of the Academic Council will be final & binding.</li>
			</ul> 
			
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
                    visible_height = 153 - scrollTop ;
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
<style> 
.material-icons
{
position: relative;
top: 5px;
}
 
@media only screen and (min-width: 768px){
	#umocid{
		margin-top: -28px;
	}
	.padding-right-70{
		padding-right: 50px;
	}
	.syllabus-menu{
		position: fixed;
		padding: 0px 10px;
		width: inherit;
	    top:145px;
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
	#coarid{
		margin-top: -55px;
	}
	#umocid{
		margin-top: -101px;
	}
.syllabus-menu ul{
		padding:0px;
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
	margin-top: -20px;
}
 }
</style>
 
<?php } else if($subject == 'ueo') { ?>
 <div class="row">
	<p>&nbsp;</p>

<div class="col m3 s12" id="coarid" >
		<div class="syllabus-menu">
			<!-- <p><?php// echo $category['name']; ?></p> -->
			<!-- <p class="flow-text">Explore</p> -->
          <div class="row">
	 
	<!-- <p class="hidden-sm">&nbsp;</p> -->
	<div class="col-md-12 col-sm-12 inner-menu-school">
		 <p class="pull-right inner-hed appear-after-scroll" id="headingid" style="display:none"><?php echo $schoolname[0]; ?> </p>
		  <ul class="nav nav-tabs nav-for-details">
			<!-- <a href="<?php echo $current_url; ?>"><li class="active btn">About</li></a>  -->
			<a href="<?php echo base_url(); ?>ueo/marking-scheme"><li class="btn">Marking Scheme</li></a> 
			<a href="<?php echo base_url(); ?>ueo/syllabus"><li class="btn">Syllabus<!-- <i class="right material-icons">format_align_left</i> --></li></a>
					 
		    <a href="<?php echo base_url(); ?>ueo/sample-papers"><li class="btn">Sample Papers<!-- <i class="right material-icons">description</i> --></li></a>
			<a href="<?php echo base_url(); ?>ueo/cut-off-and-rankings"><li class="btn">Cut Off<!-- <i class="right material-icons">description</i> --></li></a>
			<a target="_blank" href="https://www.olympiadsuccess.com/"><li class="btn"> Preparation Material<!-- <i class="right matertarget="_blank"ial-icons">description</i> --></li></a>
			<!-- <li><a href="">Paritcipate in Olympiad Exam</a></li> --> 		
		</ul>
		 
	</div>
</div> 
 
			<br>
		</div>
	</div>



	<div class="col s12 m9" id="umocid">
		<div class="row">
			<h1 style="margin-top: 100px;">Cut-offs and Raking Criteria for all the subjects of Unicus Olympiads</h1>
			<!-- <a href="<?php //echo base_url(); ?>cro-rankers" target="_blank"><button style="background-color: #79554833 !important;border-radius: 5px;padding:10px;cursor: pointer;">CRO Rankers</button></a>
			<a href="<?php //echo base_url(); ?>cro-cutoff" target="_blank"><button style="background-color: #79554833 !important;border-radius: 5px;padding:10px;cursor: pointer;">CRO Cut-offs</button></a> -->
			
			<h2>Cut-off to Qualify for Final Round</h2>
			<p>UGKO, UCO and UCTO (classes 1 to 10) and UEO, USO and UMO (classes 1 and 2) will have just one round which will be the final round. Hence, no cut-off would be required in this case.</p>
			<p>While UEO, USO and UMO (classes 3 to 10) will have preliminary round followed by the final round if the student’s score is above the cut-off. The applicants of UEO, USO and UMO (classes 3 to 10) should fulfil any of the following 3 criteria to qualify for Final Round Olympiads exams:</p>
			<ul>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>Top 5% of candidates in a particular class that have given the Preliminary Round exam.</li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>Top 25 rank holders in a particular class and in a particular city (top 50 cities in India)/zone(remaining towns and cities including international locations is divided into <p style="margin-left:23px">5 zones - East, West, North and South, and International).</p></li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>Top 3 students (registered through school) from every school with more than 25 students in a class appearing for an Olympiad exam.</li>
			 
			</ul>
			<p> </p>
			<h2>Ranking Criteria for Final Round Exams</h2>
			<p>The ranks will be given on the following criteria:</p>
		 
			<ul>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>Total marks obtained in the exam.</li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>If two or more students score same total marks then the ranks will be determined on the basis of</li>
				<p style="text-indent: 20px;">a. marks scored in 'Achievers' section if the students have given only Final round</p>
				<p style="text-indent: 20px;">b. marks scored in 'Achievers' section of Preliminary Round exam</p>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>In case of a tie, the student completing the test in lesser time will be ranked higher.</li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>In case of a tie again, the younger student based on Date of Birth will be ranked higher.</li> 
				<li class=""><i class="material-icons">keyboard_arrow_right</i>Since Unicus Olympiads will be held on different days and sessions with different sets of question papers, final ranks will be announced based on normalization of the ranks for each session.</li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>In case two or more students score same marks under the criteria above, they will be awarded the same rank.</li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>In case of any confusion, decision of the Academic Council will be final & binding.</li>
			</ul> 
			
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
                    visible_height = 153 - scrollTop ;
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
<style> 
.material-icons
{
position: relative;
top: 5px;
}
 
@media only screen and (min-width: 768px){
	#umocid{
		margin-top: -28px;
	}
	.padding-right-70{
		padding-right: 50px;
	}
	.syllabus-menu{
		position: fixed;
		padding: 0px 10px;
		width: inherit;
	    top:145px;
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
	#coarid{
		margin-top: -55px;
	}
	#umocid{
		margin-top: -101px;
	}
.syllabus-menu ul{
		padding:0px;
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
	margin-top: -20px;
}
 }
</style>

<?php  } else if($subject == 'ugko') { ?>
 <div class="row">
	<p>&nbsp;</p>

<div class="col m3 s12" id="coarid" >
		<div class="syllabus-menu">
			<!-- <p><?php// echo $category['name']; ?></p> -->
			<!-- <p class="flow-text">Explore</p> -->
          <div class="row">
	 
	<!-- <p class="hidden-sm">&nbsp;</p> -->
	<div class="col-md-12 col-sm-12 inner-menu-school">
		 <p class="pull-right inner-hed appear-after-scroll" id="headingid" style="display:none"><?php echo $schoolname[0]; ?> </p>
		  <ul class="nav nav-tabs nav-for-details">
			<!-- <a href="<?php echo $current_url; ?>"><li class="active btn">About</li></a>  -->
			<a href="<?php echo base_url(); ?>ugko/marking-scheme"><li class="btn">Marking Scheme</li></a> 
			<a href="<?php echo base_url(); ?>ugko/syllabus"><li class="btn">Syllabus<!-- <i class="right material-icons">format_align_left</i> --></li></a>
					 
		    <a href="<?php echo base_url(); ?>ugko/sample-papers"><li class="btn">Sample Papers<!-- <i class="right material-icons">description</i> --></li></a>
			<a href="<?php echo base_url(); ?>ugko/cut-off-and-rankings"><li class="btn">Cut Off<!-- <i class="right material-icons">description</i> --></li></a>
			<a target="_blank" href="https://www.olympiadsuccess.com/"><li class="btn"> Preparation Material<!-- <i class="right matertarget="_blank"ial-icons">description</i> --></li></a>
			<!-- <li><a href="">Paritcipate in Olympiad Exam</a></li> --> 		
		</ul>
		 
	</div>
</div> 
 
			<br>
		</div>
	</div>




	
	<div class="col s12 m9" id="umocid">
		<div class="row">
		 <h1 style="margin-top: 100px;">Cut-offs and Raking Criteria for all the subjects of Unicus Olympiads</h1>
			<!-- <a href="<?php //echo base_url(); ?>cro-rankers" target="_blank"><button style="background-color: #79554833 !important;border-radius: 5px;padding:10px;cursor: pointer;">CRO Rankers</button></a>
			<a href="<?php //echo base_url(); ?>cro-cutoff" target="_blank"><button style="background-color: #79554833 !important;border-radius: 5px;padding:10px;cursor: pointer;">CRO Cut-offs</button></a> -->
			
			<h2>Cut-off to Qualify for Final Round</h2>
			<p>UGKO, UCO and UCTO (classes 1 to 10) and UEO, USO and UMO (classes 1 and 2) will have just one round which will be the final round. Hence, no cut-off would be required in this case.</p>
			<p>While UEO, USO and UMO (classes 3 to 10) will have preliminary round followed by the final round if the student’s score is above the cut-off. The applicants of UEO, USO and UMO (classes 3 to 10) should fulfil any of the following 3 criteria to qualify for Final Round Olympiads exams:</p>
			<ul>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>Top 5% of candidates in a particular class that have given the Preliminary Round exam.</li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>Top 25 rank holders in a particular class and in a particular city (top 50 cities in India)/zone(remaining towns and cities including international locations is divided into <p style="margin-left:23px">5 zones - East, West, North and South, and International).</p></li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>Top 3 students (registered through school) from every school with more than 25 students in a class appearing for an Olympiad exam.</li>  
			 
			</ul>
			<p> </p>
			<h2>Ranking Criteria for Final Round Exams</h2>
			<p>The ranks will be given on the following criteria:</p>
		 
			<ul>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>Total marks obtained in the exam.</li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>If two or more students score same total marks then the ranks will be determined on the basis of</li>
				<p style="text-indent: 20px;">a. marks scored in 'Achievers' section if the students have given only Final round</p>
				<p style="text-indent: 20px;">b. marks scored in 'Achievers' section of Preliminary Round exam</p>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>In case of a tie, the student completing the test in lesser time will be ranked higher.</li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>In case of a tie again, the younger student based on Date of Birth will be ranked higher.</li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>Since Unicus Olympiads will be held on different days and sessions with different sets of question papers, final ranks will be announced based on normalization of the ranks for each session.</li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>In case two or more students score same marks under the criteria above, they will be awarded the same rank.</li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>In case of any confusion, decision of the Academic Council will be final & binding.</li>
			</ul> 
			
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
                    visible_height = 153 - scrollTop ;
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
<style> 
.material-icons
{
position: relative;
top: 5px;
}
 
@media only screen and (min-width: 768px){
	#umocid{
		margin-top: -28px;
	}
	.padding-right-70{
		padding-right: 50px;
	}
	.syllabus-menu{
		position: fixed;
		padding: 0px 10px;
		width: inherit;
	    top:145px;
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
	#coarid{
		margin-top: -55px;
	}
	#umocid{
		margin-top: -101px;
	}
.syllabus-menu ul{
		padding:0px;
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
	margin-top: -20px;
}
 }
</style>

 <?php } else if($subject == 'uco') { ?>
 <div class="row">
	<p>&nbsp;</p>


<div class="col m3 s12" id="coarid" >
		<div class="syllabus-menu">
			<!-- <p><?php// echo $category['name']; ?></p> -->
			<!-- <p class="flow-text">Explore</p> -->
          <div class="row">
	 
	<!-- <p class="hidden-sm">&nbsp;</p> -->
	<div class="col-md-12 col-sm-12 inner-menu-school">
		 <p class="pull-right inner-hed appear-after-scroll" id="headingid" style="display:none"><?php echo $schoolname[0]; ?> </p>
		  <ul class="nav nav-tabs nav-for-details">
			<!-- <a href="<?php echo $current_url; ?>"><li class="active btn">About</li></a>  -->
			<a href="<?php echo base_url(); ?>uco/marking-scheme"><li class="btn">Marking Scheme</li></a> 
			<a href="<?php echo base_url(); ?>uco/syllabus"><li class="btn">Syllabus<!-- <i class="right material-icons">format_align_left</i> --></li></a>
					 
		    <a href="<?php echo base_url(); ?>uco/sample-papers"><li class="btn">Sample Papers<!-- <i class="right material-icons">description</i> --></li></a>
			<a href="<?php echo base_url(); ?>uco/cut-off-and-rankings"><li class="btn">Cut Off<!-- <i class="right material-icons">description</i> --></li></a>
			<a target="_blank" href="https://www.olympiadsuccess.com/"><li class="btn"> Preparation Material<!-- <i class="right matertarget="_blank"ial-icons">description</i> --></li></a>
			<!-- <li><a href="">Paritcipate in Olympiad Exam</a></li> --> 		
		</ul>
		 
	</div>
</div> 
 
			<br>
		</div>
	</div>







	<h1 style="margin-top: 100px;">Cut-offs and Raking Criteria for all the subjects of Unicus Olympiads</h1>
	<div class="col s12 m9" id="umocid">
		<div class="row">
			<!-- <a href="<?php //echo base_url(); ?>cro-rankers" target="_blank"><button style="background-color: #79554833 !important;border-radius: 5px;padding:10px;cursor: pointer;">CRO Rankers</button></a>
			<a href="<?php //echo base_url(); ?>cro-cutoff" target="_blank"><button style="background-color: #79554833 !important;border-radius: 5px;padding:10px;cursor: pointer;">CRO Cut-offs</button></a> -->
			
			<h2>Cut-off to Qualify for Final Round</h2>
			<p>UGKO, UCO and UCTO (classes 1 to 10) and UEO, USO and UMO (classes 1 and 2) will have just one round which will be the final round. Hence, no cut-off would be required in this case.</p>
			<p>While UEO, USO and UMO (classes 3 to 10) will have preliminary round followed by the final round if the student’s score is above the cut-off. The applicants of UEO, USO and UMO (classes 3 to 10) should fulfil any of the following 3 criteria to qualify for Final Round Olympiads exams:</p>
			<ul>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>Top 5% of candidates in a particular class that have given the Preliminary Round exam.</li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>Top 25 rank holders in a particular class and in a particular city (top 50 cities in India)/zone(remaining towns and cities including international locations is divided into <p style="margin-left:23px">5 zones - East, West, North and South, and International).</p></li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>Top 3 students (registered through school) from every school with more than 25 students in a class appearing for an Olympiad exam.</li>
			 
			</ul>
			<p> </p>
			<h2>Ranking Criteria for Final Round Exams</h2>
			<p>The ranks will be given on the following criteria:</p>
		 
			<ul>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>Total marks obtained in the exam.</li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>If two or more students score same total marks then the ranks will be determined on the basis of</li>
				<p style="text-indent: 20px;">a. marks scored in 'Achievers' section if the students have given only Final round</p>
				<p style="text-indent: 20px;">b. marks scored in 'Achievers' section of Preliminary Round exam</p>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>In case of a tie, the student completing the test in lesser time will be ranked higher.</li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>In case of a tie again, the younger student based on Date of Birth will be ranked higher.</li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>Since Unicus Olympiads will be held on different days and sessions with different sets of question papers, final ranks will be announced based on normalization of the ranks for each session.</li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>In case two or more students score same marks under the criteria above, they will be awarded the same rank.</li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>In case of any confusion, decision of the Academic Council will be final & binding.</li>
			</ul> 
			
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
                    visible_height = 153 - scrollTop ;
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
<style> 
.material-icons
{
position: relative;
top: 5px;
}
 
@media only screen and (min-width: 768px){
	#umocid{
		margin-top: -28px;
	}
	.padding-right-70{
		padding-right: 50px;
	}
	.syllabus-menu{
		position: fixed;
		padding: 0px 10px;
		width: inherit;
	    top:145px;
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
	#coarid{
		margin-top: -55px;
	}
	#umocid{
		margin-top: -101px;
	}
.syllabus-menu ul{
		padding:0px;
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
	margin-top: -20px;
}
 }
</style>
 

<?php } else if($subject == 'ucto') { ?>
 <div class="row">
	<p>&nbsp;</p>

<div class="col m3 s12" id="coarid" >
		<div class="syllabus-menu">
			<!-- <p><?php// echo $category['name']; ?></p> -->
			<!-- <p class="flow-text">Explore</p> -->
          <div class="row">
	 
	<!-- <p class="hidden-sm">&nbsp;</p> -->
	<div class="col-md-12 col-sm-12 inner-menu-school">
		 <p class="pull-right inner-hed appear-after-scroll" id="headingid" style="display:none"><?php echo $schoolname[0]; ?> </p>
		  <ul class="nav nav-tabs nav-for-details">
			<!-- <a href="<?php echo $current_url; ?>"><li class="active btn">About</li></a>  -->
			<a href="<?php echo base_url(); ?>ucto/marking-scheme"><li class="btn">Marking Scheme</li></a> 
			<a href="<?php echo base_url(); ?>ucto/syllabus"><li class="btn">Syllabus<!-- <i class="right material-icons">format_align_left</i> --></li></a>
					 
		    <a href="<?php echo base_url(); ?>ucto/sample-papers"><li class="btn">Sample Papers<!-- <i class="right material-icons">description</i> --></li></a>
			<a href="<?php echo base_url(); ?>ucto/cut-off-and-rankings"><li class="btn">Cut Off<!-- <i class="right material-icons">description</i> --></li></a>
			<a target="_blank" href="https://www.olympiadsuccess.com/"><li class="btn"> Preparation Material<!-- <i class="right matertarget="_blank"ial-icons">description</i> --></li></a>
			<!-- <li><a href="">Paritcipate in Olympiad Exam</a></li> --> 		
		</ul>
		 
	</div>
</div> 
 
			<br>
		</div>
	</div> 


	<div class="col s12 m9" id="umocid">
		<div class="row">
			<h1 style="margin-top: 100px;">Cut-offs and Raking Criteria for all the subjects of Unicus Olympiads</h1>
			<!-- <a href="<?php //echo base_url(); ?>cro-rankers" target="_blank"><button style="background-color: #79554833 !important;border-radius: 5px;padding:10px;cursor: pointer;">CRO Rankers</button></a>
			<a href="<?php //echo base_url(); ?>cro-cutoff" target="_blank"><button style="background-color: #79554833 !important;border-radius: 5px;padding:10px;cursor: pointer;">CRO Cut-offs</button></a> -->
			
			<h2>Cut-off to Qualify for Final Round</h2>
			<p>UGKO, UCO and UCTO (classes 1 to 10) and UEO, USO and UMO (classes 1 and 2) will have just one round which will be the final round. Hence, no cut-off would be required in this case.</p>
			<p>While UEO, USO and UMO (classes 3 to 10) will have preliminary round followed by the final round if the student’s score is above the cut-off. The applicants of UEO, USO and UMO (classes 3 to 10) should fulfil any of the following 3 criteria to qualify for Final Round Olympiads exams:</p>
			<ul>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>Top 5% of candidates in a particular class that have given the Preliminary Round exam.</li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>Top 25 rank holders in a particular class and in a particular city (top 50 cities in India)/zone(remaining towns and cities including international locations is divided into <p style="margin-left:23px">5 zones - East, West, North and South, and International).</p></li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>Top 3 students (registered through school) from every school with more than 25 students in a class appearing for an Olympiad exam.</li>
			 
			</ul>
			<p> </p>
			<h2>Ranking Criteria for Final Round Exams</h2>
			<p>The ranks will be given on the following criteria:</p>
		 
			<ul>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>Total marks obtained in the exam.</li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>If two or more students score same total marks then the ranks will be determined on the basis of</li>
				<p style="text-indent: 20px;">a. marks scored in 'Achievers' section if the students have given only Final round</p>
				<p style="text-indent: 20px;">b. marks scored in 'Achievers' section of Preliminary Round exam</p>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>In case of a tie, the student completing the test in lesser time will be ranked higher.</li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>In case of a tie again, the younger student based on Date of Birth will be ranked higher.</li> 
				<li class=""><i class="material-icons">keyboard_arrow_right</i>Since Unicus Olympiads will be held on different days and sessions with different sets of question papers, final ranks will be announced based on normalization of the ranks for each session.</li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>In case two or more students score same marks under the criteria above, they will be awarded the same rank.</li>
				<li class=""><i class="material-icons">keyboard_arrow_right</i>In case of any confusion, decision of the Academic Council will be final & binding.</li>
			</ul> 
			
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
                    visible_height = 153 - scrollTop ;
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
<style> 
.material-icons
{
position: relative;
top: 5px;
}
 
@media only screen and (min-width: 768px){
	#umocid{
		margin-top: -28px;
	}
	.padding-right-70{
		padding-right: 50px;
	}
	.syllabus-menu{
		position: fixed;
		padding: 0px 10px;
		width: inherit;
	    top:145px;
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
	#coarid{
		margin-top: -55px;
	}
	#umocid{
		margin-top: -101px;
	}
.syllabus-menu ul{
		padding:0px;
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
	margin-top: -20px;
}
 }
</style>
 <?php } else if($subject == "cut-off-and-rankings") { ?>

 <div class="row">
	<p>&nbsp;</p>
		<div class="col m3 s12" id="coarid" >
		<div class="syllabus-menu">
			<!-- <p><?php// echo $category['name']; ?></p> -->
			<!-- <p class="flow-text">Explore</p> -->
          <div class="row">
	 
	<!-- <p class="hidden-sm">&nbsp;</p> -->
	<div class="col-md-12 col-sm-12 inner-menu-school">
		 <p class="pull-right inner-hed appear-after-scroll" id="headingid" style="display:none"><?php echo $schoolname[0]; ?> </p>
		  <ul class="nav nav-tabs nav-for-details">
			<!-- <a href="<?php echo $current_url; ?>"><li class="active btn">About</li></a>  -->
			<a href="<?php echo base_url(); ?>marking-scheme"><li class="btn">Marking Scheme</li></a> 
			<a href="<?php echo base_url(); ?>syllabus"><li class="btn">Syllabus<!-- <i class="right material-icons">format_align_left</i> --></li></a>
					 
		    <a href="<?php echo base_url(); ?>sample-papers"><li class="btn">Sample Papers<!-- <i class="right material-icons">description</i> --></li></a>
			<a href="<?php echo base_url(); ?>cut-off-and-rankings"><li class="btn">Cut Off<!-- <i class="right material-icons">description</i> --></li></a>
			<a target="_blank" href="<?php echo $this->config->item('main_site_link'); ?>courses/crest-olympiads/<?php echo strtolower(str_replace(" ","-",$category['name'])); ?>"><li class="btn"><?=strtoupper($category['slug']); ?> Preparation Material<!-- <i class="right matertarget="_blank"ial-icons">description</i> --></li></a>
			<!-- <li><a href="">Paritcipate in Olympiad Exam</a></li> --> 		
		</ul>
		 
	</div>
</div> 
 
			<br>
		</div>
	</div>
	<div class="col s12 m9">
		<div class="row">
			<h1  id="corheading">Cut-offs and Raking Criteria for all the subjects of Unicus Olympiads</h1>
			<!-- <a href="<?php //echo base_url(); ?>cro-rankers" target="_blank"><button style="background-color: #79554833 !important;border-radius: 5px;padding:10px;cursor: pointer;">CRO Rankers</button></a>
			<a href="<?php //echo base_url(); ?>cro-cutoff" target="_blank"><button style="background-color: #79554833 !important;border-radius: 5px;padding:10px;cursor: pointer;">CRO Cut-offs</button></a> -->
			
			<h4>Cut-off to Qualify for Final Round</h4>
			<p>UGKO, UCO and UCTO (classes 1 to 10) and UEO, USO and UMO (classes 1 and 2) will have just one round which will be the final round. Hence, no cut-off would be required in this case.</p>
			<p>While UEO, USO and UMO (classes 3 to 10) will have preliminary round followed by the final round if the student’s score is above the cut-off. The applicants of UEO, USO and UMO (classes 3 to 10) should fulfil any of the following 3 criteria to qualify for Final Round Olympiads exams:</p>
			<ul>
				<li class="coar"><i class="material-icons">keyboard_arrow_right</i>Top 5% of candidates in a particular class that have given the Preliminary Round exam.</li>
				<li class="coar"><i class="material-icons">keyboard_arrow_right</i>Top 25 rank holders in a particular class and in a particular city (top 50 cities in India)/zone(remaining towns and cities including international locations is divided into <p style="margin-left:23px">5 zones - East, West, North and South, and International).</p></li>
				<li class="coar"><i class="material-icons">keyboard_arrow_right</i>Top 3 students (registered through school) from every school with more than 25 students in a class appearing for an Olympiad exam.</li>
			 
			</ul>
			<p> </p>
			<h2>Ranking Criteria for Final Round Exams</h2>
			<p>The ranks will be given on the following criteria:</p>
		 
			<ul>
				<li class="coar"><i class="material-icons">keyboard_arrow_right</i>Total marks obtained in the exam.</li>
				<li class="coar"><i class="material-icons">keyboard_arrow_right</i>If two or more students score same total marks then the ranks will be determined on the basis of</li>
				<p style="text-indent: 20px;">a. marks scored in 'Achievers' section if the students have given only Final round</p>
				<p style="text-indent: 20px;">b. marks scored in 'Achievers' section of Preliminary Round exam</p>
				<li class="coar"><i class="material-icons">keyboard_arrow_right</i>In case of a tie, the student completing the test in lesser time will be ranked higher.</li>
				<li class="coar"><i class="material-icons">keyboard_arrow_right</i>In case of a tie again, the younger student based on Date of Birth will be ranked higher.</li> 
				<li class="coar"><i class="material-icons">keyboard_arrow_right</i>Since Unicus Olympiads will be held on different days and sessions with different sets of question papers, final ranks will be announced based on normalization of the</p><p style="text-indent: 23px;"> ranks for each session.</li>
				<li class="coar"><i class="material-icons">keyboard_arrow_right</i>In case two or more students score same marks under the criteria above, they will be awarded the same rank.</li>
				<li class="coar"><i class="material-icons">keyboard_arrow_right</i>In case of any confusion, decision of the Academic Council will be final & binding.</li>
			</ul> 
			
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
                    visible_height = 153 - scrollTop ;
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
#coarid{
	margin-top:60px;
}
.coar .material-icons{
	top: 7px;
}
.material-icons
{
position: relative; 
}
ul:not(.browser-default)>li {
    font-size: 14px;
    line-height: 1em;
    padding: 10px 0px 5px 0px;
    list-style-type: none;
}
#corheading{
	margin-top: 80px;
}
@media only screen and (max-width: 767px){
   #coarid{
	margin-top:-60px;
    }
    #corheading{
      margin-top: -20px;
     }
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
 
.left-align{
	margin-top: -20px;
}
 }
</style>

<?php } ?>


