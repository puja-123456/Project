<div class="row">
 

			<div class="row">
			<div class="col s12 l8 m8">
				<p><strong>Sample PDF of <?php echo $this_category->name; ?> for <?php echo $this_syllabus->name; ?>:</strong></p>
				<br>
				<!-- <?php

				$class=$this_syllabus->name;
				//$classname=str_replace(' ', '-', $class);
				//$slug=strtoupper($this_category->slug)."-"."Sample"."-"."Papers"."-"."for"."-".$classname; ?> -->
				<object data="<?php echo base_url().'assets/samplepapers/ceo-Sample-Papers-for-class-2.pdf'; ?>"
		        type='application/pdf' 
		        width='100%' 
		        height='700px' class="pdf_file">
				</object>
			<!-- 	<p>If your web browser doesn't have a PDF Plugin. Instead you can <a href="<?php //echo base_url().'assets/samplepapers/'.$slug.'.pdf'; ?>" target="_blank"> Click here to download the PDF</a></p> -->
				<p>If your web browser doesn't have a PDF Plugin. Instead you can <a href="<?php echo base_url().'assets/samplepapers/ceo-Sample-Papers-for-class-2.pdf'; ?>" target="_blank"> Click here to download the PDF</a></p>
			</div>
			</div>

	 
 
		

		

		<!-- </div> -->
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

@media only screen and (max-width: 768px){

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