<div class="row">
<p>&nbsp;</p>
	<h1 class="left-align flow-text"><?php echo $this_category->name." ".$this_syllabus->name; ?> Sample Papers</h1>

<!-- <div class="col-md-4 col-xs-12 col-sm-12 quick-links">
	   <h2 class="inner-hed">Other Classes Sample Papers</h2>
		<div class="notif">
		    <ul>
		    <?php

		    // print_r($other_sample_paper_other_class);die;


		     foreach ($other_sample_paper_other_class as $key) {
		    ?> 
		        <li><a href="<?php echo base_url().$catslug."-sample-papers-".strtolower(str_replace(" ","-",$key->name)); ?>"> <?php echo $this_category->name." Sample Papers for  ".$key->name; ?> </a> </li>
		    <?php
		    } ?>
		    </ul>
		   </div>
		   <?php if($other_sample_paper_same_course){

		   // print_r($other_sample_paper_same_course);die; ?>
	   <h2 class="inner-hed">Other Subjects Sample Papers</h2>
		<div class="notif">
		    <ul>
		    <?php foreach ($other_sample_paper_same_course as $key) {
		    ?> 
		        <li><a href="<?php echo base_url().$key->slug."-sample-papers-".strtolower(str_replace(" ","-",$this_class)); ?>"> <?php echo $key->name." Sample Papers for  ".$this_class; ?> </a> </li>
		    <?php
		    } ?>
		    </ul>
		    </div>
		   <?php } ?>

		</div> -->
	 
	<div class="col s12">
		<!-- <div class="row"> -->
			<div class="row">
				<div class="col s12 l8 m8">
					<h2 class="flow-text">
						
					Syllabus:
					</h2>
					<p class="flow-text">
						<?= $this_syllabus->description;?>
					</p>
				<!-- <table class="hide_on_phone table hoverable responsive-table question_no_table center-align"><tr>
				<?php for ($i=1; $i < 11; $i++) { 
					?>
					<td>
						<a href="javascript:void(0)" onclick="gotoq('<?php echo $i; ?>')" class=" btn go_to_ques go_to_question_<?php echo $i; ?>"><?php echo "Q.".$i; ?></a>
					</td>
					<?php
				} ?>
				</tr></table> -->
				<!-- <div class="hide_on_desktop" style="display:none; padding:10px 5px;">
					<a href="javascript:void(0)" id="left_question" class="pull-left courses-btn">&lt;&lt;</a>
					<a href="javascript:void(0)" id="right_question" class="pull-right courses-btn">&gt;&gt;</a>
				</div> -->
				<!-- <?php 
				$i =0;
				foreach ($all_questions as $ques) {
					$i++;
					if($i>10)break;
					?> -->
					<!-- <table id="question_<?php echo $i; ?>" class="question table table-bordered table-responsive table-striped">
						<tr>
							<td width="10%"><p>Q.<?= $i; ?></p></td>
							<td colspan="4">
								<?php 
								if(isset($ques->question_type))
								{ 
								?>
								<p>
								<?php echo $ques->question_type; ?>
								</p>
								<?php 
								} 
								if (isset($ques->questionImage) && $ques->questionImage != '') 
								{ 
								$question_image = '<img src="'.$this->config->item('image_site_link') . 'assets/uploads/' . $ques->questionImage .'" ><br>'; ?>
								<p><?php echo htmlText($ques->question).'<br>'.$question_image ; ?></p>
								<?php 
								} 
								else { 
								?>
								<p><?php echo htmlText($ques->question); ?></p>
								<?php 
			                    } ?>
	                        </td>
						</tr>
						<tr>
							<td></td>
							<td class="row" colspan="2">
								<button class="col s12 waves-effect waves-light btn ans <?php if($ques->correctanswer == 'a') echo 'c-answer';else echo 'w-answer';?> answer1">
									a) <?php if(isset($ques->answer1Image) && $ques->answer1Image != ''){ ?><img src="<?php echo $this->config->item('image_site_link').'assets/uploads/'.$ques->answer1Image ?>" ><br><?php } ?><?php echo htmlText($ques->answer1); ?>
								</button>
							</td>
							 
							<td class="row" colspan="2">
								<button class="col s12 waves-effect waves-light btn ans <?php if($ques->correctanswer == 'b') echo 'c-answer';else echo 'w-answer'; ?> answer2">
									b) <?php if(isset($ques->answer2Image) && $ques->answer2Image != ''){ ?><img src="<?php echo $this->config->item('image_site_link').'assets/uploads/'.$ques->answer2Image ?>" ><br><?php } ?><?php echo htmlText($ques->answer2); ?>
								</button>
							</td>
						 
						</tr>
						<tr>
							<td></td>
							<td class="row" colspan="2">
								<button class="col s12 waves-effect waves-light btn ans <?php if($ques->correctanswer == 'c') echo 'c-answer';else echo 'w-answer'; ?> answer3">
									c) <?php if(isset($ques->answer3Image) && $ques->answer3Image != ''){ ?><img src="<?php echo $this->config->item('image_site_link').'assets/uploads/'.$ques->answer3Image ?>" ><br><?php } ?><?php echo htmlText($ques->answer3); ?>
								</button>
							</td>
							 
							<td class="row" colspan="2">
								<button class="col s12 waves-effect waves-light btn ans <?php if($ques->correctanswer == 'd') echo 'c-answer';else echo 'w-answer'; ?> answer4">
									d) <?php if(isset($ques->answer4Image) && $ques->answer4Image != ''){ ?><img src="<?php echo $this->config->item('image_site_link').'assets/uploads/'.$ques->answer4Image ?>" ><br><?php } ?><?php echo htmlText($ques->answer4); ?>
								</button>
							</td>
							 
						</tr>
					</table>
					<?php
				} ?>
				<p>Your Score: <span class="freepdfscore">0</span>/10</p>  -->
             
              	<div class="row">
			<div class="col s12 l10 m10">
				<p><strong>Sample PDF of <?php echo $this_category->name; ?> for <?php echo $this_syllabus->name; ?>:</strong></p>
				<br>
				<?php

				$class=$this_syllabus->name;
				$classname=str_replace(' ', '-', $class);
				$slug=strtoupper($this_category->slug)."-"."Sample"."-"."Papers"."-"."for"."-".$classname; ?>
				<object data="<?php echo base_url().'assets/samplepapers/'.$slug.'.pdf'; ?>"
		        type='application/pdf' 
		        width='100%' 
		        height='700px' class="pdf_file">
				</object>
				<p>If your web browser doesn't have a PDF Plugin. Instead you can <a href="<?php echo base_url().'assets/samplepapers/'.$slug.'.pdf'; ?>" target="_blank"> Click here to download the PDF</a></p>
			</div>
			</div>


				</div>
				<div class="quick-links">

					<!-- <a href="" class="white-text" id="desktop_link"><button class="btn btn-secondary" style="font-family: 'Melonheadz';" onclick="openPopup()">Test Yourself</button></a> -->
			<a href="<?php echo base_url()."daily-quiz/start"; ?>" class="white-text" id="phone_link"><button class="btn btn-secondary" style="font-family: 'Melonheadz';margin-top:30px">Test Yourself</button></a>
	   <h1 class="left-align flow-text">Other Classes Sample Papers</h1>
		<div class="notif">
		    <ul>
		    <?php

		    // print_r($other_sample_paper_other_class);die;


		     foreach ($other_sample_paper_other_class as $key) {
		    ?> 
		        <li><a href="<?php echo base_url().$catslug."-sample-papers-".strtolower(str_replace(" ","-",$key->name)); ?>"> <?php echo $this_category->name." Sample Papers for  ".$key->name; ?> </a> </li>
		    <?php
		    } ?>
		    </ul>
		   </div>
		   <?php if($other_sample_paper_same_course){

		   // print_r($other_sample_paper_same_course);die; ?>
	   <h1 class="left-align flow-text">Other Subjects Sample Papers</h1>
		<div class="notif">
		    <ul>
		    <?php foreach ($other_sample_paper_same_course as $key) {
		    	if($key->slug!="cgko")
		    	{
		    ?> 
		        <li><a href="<?php echo base_url().$key->slug."-sample-papers-".strtolower(str_replace(" ","-",$this_class)); ?>"> <?php echo $key->name." Sample Papers for  ".$this_class; ?> </a> </li>
		    <?php
		    }
		} ?>
		    </ul>
		    </div>
		   <?php } ?>

		</div>

				<!-- <div class="col s12 l8 m8">

				</div> -->
			</div>

			<!-- <p>Your Score: <span class="freepdfscore">0</span>/10</p> -->
			<div class="afterquestionsareover animated "></div>
			<hr>

		

			
		<div class="row all_answers hide_on_phone">
			<!-- <p>Answers to Sample Questions from CREST Olympiads:</p> -->
			<table class="table table-responsive table-striped table-bordered"><tr><?php 
			//$i = 1;
			//foreach ($all_questions as $q) {
				//if($i>10)break;
			//	echo "<td>Q.".$i."</td><td>".$q->correctanswer."</td>";
				//$i++;
			//} ?>
			</tr></table> 
		</div>

		<div class="hide_on_desktop">
			<p>Answers to Sample Questions from CREST Olympiads:</p>
				<p class="pull-left" style="padding:5px 0px;">
			<?php 
			$i = 1;
			foreach ($all_questions as $q) {
				if($i>10)break;
				echo "Q.".$i." : ".$q->correctanswer;
				if($i<10) echo " | ";
				$i++;
			} ?>
				</p>
		</div>

		

		

		<!-- </div> -->
	</div>
</div>

<style type="text/css">
	
.question .ans{
	cursor: pointer;
}

.disable_click{
	pointer-events:none;
}
button.col.s12.waves-effect.waves-light.btn.ans {
	text-transform: unset; 
    height: auto;
    padding: 5px;
}
h1.left-align.flow-text{
	margin-top:80px;
}
@media only screen and (max-width: 768px){
h1.left-align.flow-text{
	margin-top:10px;
}
	.row .col.m8{
		    width: 100%;
	}
    .hide_on_phone{
        display: none !important;
    }
    #phone_link{
    	 display: block !important;
    	 text-align: center;    	
    }
    #desktop_link{
    	display: none !important;
    }
    .max_height_40{
        max-height: 40px !important;
    }
    .quick-links h1
     {
     	text-align: center;
     }
     .notif
     {
     	text-align: center;
     }

    .pdf_file
    {
    	height:400px;
	}


.syllabus-menu ul li {
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
	margin-top: -20px;
}
.white-text button {
    display: none;
    }
.hide_on_desktop{
	display: none;
}
.pull-left {
    display: none;
   
}
.flow-text{
margin-top: -9px;
}

}
@media only screen and (min-width: 769px){
    .hide_on_desktop{
        display: none !important;
    }
    .quick-links
    {
    	float:right;
    }

     #phone_link{
    	 display: none !important;
    }
    
    #desktop_link{
    	display: block !important;
    	text-align: center;
    }

    .pdf_file
    {
    	height:700px;
	}
}

.fixediconstop
{
	display:none;
}

</style>



<script type="text/javascript">

	var i = 1;
	function gotoq(q_id){
		$( ".question" ).hide();
		$('.go_to_ques').parent().removeClass("active");
		$( "#question_"+q_id ).show();
		$('.go_to_question_'+q_id).parent().addClass("active");
		i = q_id;
	}
	$().ready(function(){
		$(".disable_click").click(function(){
			return false;
		});

		if($(window).width<768){
			$(".hide_on_phone").hide();
			$(".hide_on_desktop").show();
			$(".pdf_file").css("height","400px"); 
		};

		if($(window).width>768){
			$(".hide_on_desktop").hide();
			$(".pdf_file").css("height","700px");
		};

		$('.go_to_question_1').parent().addClass("active");
		$( ".question" ).hide();
		$( "#question_"+i ).show();
		$(".ans").click(function(){
			setTimeout(function(){
				$( "#question_"+i ).hide();
				$('.go_to_ques').parent().removeClass("active");
				i++;
				$( "#question_"+i ).show();
				$('.go_to_question_'+i).parent().addClass("active");
			}, 1000);
		});
		$("#left_question").click(function(){
			$( "#question_"+i ).hide();
			i--;
			$( "#question_"+i ).show();
		});
		$("#right_question").click(function(){
			$( "#question_"+i ).hide();
			i++;
			$( "#question_"+i ).show();
		});

	});

	function testAnim(x) {
	    $('.freepdfscore').parent().removeClass().addClass('flip animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
	      $(this).removeClass();
	    });
	  };

   $().ready(function(){
   	var freetotalscore = 0;
	$(".c-answer").click(function(){
		$('.freepdfscore').removeClass('animated flip');
		freetotalscore++;
		$(this).addClass("animated hinge green");
		$(this).parent().parent().siblings().children().children().addClass("disable_click");
		$('.freepdfscore').text(freetotalscore);
		testAnim();
	});
	$(".w-answer").click(function(){
		var obj = $(this);
		obj.parent().parent().siblings().children().children().addClass("disable_click");
		$('.freepdfscore').removeClass('animated flip');
		$(this).addClass("animated hinge red");
		setTimeout(function(){
			obj.parent().siblings().children(".c-answer").addClass("animated tada hover-bg");
			obj.removeClass("hinge").addClass("zoomIn");
		}, 1000);
	});
});

   		$().ready(function(){
		if($(window).width()<768){
		
		$("#phone_link").show();
		$("#desktop_link").hide();
	};
	if($(window).width()>768){		
        $("#desktop_link").show();
        $("#phone_link").hide();
	};
});
</script>