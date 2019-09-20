<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() {
	FB.init({
		appId            : '379880269065174',
		autoLogAppEvents : true,
		xfbml            : true,
		version          : 'v2.9'
	});

	$(document).trigger('fbload');
	FB.AppEvents.logPageView();
};

(function(d, s, id){
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) {return;}
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<style type="text/css">

@media only screen and (max-width:767px){
	
	#share_buttons{
		margin-left: 0px !important;
		margin-right: 0px !important;
	}
	
	.link_to_share {
		left: 0px !important;
		top: -3px !important;
		margin: 0px auto !important;
		border: 1px solid #000;
	}
	#share_buttons button{
		padding: 5px;
	}
}

#share_buttons{
	padding-top: 15px;
	padding-bottom: 10px;
}
 #share_buttons{
	margin-left: 60%;
	margin-right: 2%;
	background-color: #fefefe;
}



@media only screen and (max-width: 786px){	
	#share_buttons button{
		font-size: 11px;
		margin-bottom: 5px;
	}
} 
</style>

  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
  <script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
  <script>
$(document).ready(function(){

	
var element = $("#result"); // global variable
var getCanvas; // global variable
 
    // $("#btn-Preview-Image").on('click', function () {
         html2canvas(element, {
         onrendered: function (canvas) {
                $("#previewImage").append(canvas);
                getCanvas = canvas;
             }
         });
    // });

	$("#btn-Convert-Html2Image").on('click', function () {
    var imgageData = getCanvas.toDataURL("image/png");
    // Now browser starts downloading it instead of just showing it
    var newData = imgageData.replace(/^data:image\/jpg/, "data:application/octet-stream");
    $("#btn-Convert-Html2Image").attr("download", "result.jpg").attr("href", newData);
	});

	$("#btn-Convert-Html2Pdf").on('click', function () {
    var options = {
    	'background': '#fff',
'border':'none',
  };
  var pdf = new jsPDF('p', 'pt', 'a4');
  pdf.addHTML($("#result"), 15, 15, options, function() {
    pdf.save('result.pdf');
  });
	});

});

</script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.js"></script> -->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/contact_us.css"> -->

<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">  -->

<p>&nbsp;</p>

<style>
#result
{
background:   url('<?php echo base_url();?>assets/images/result_bg.jpg') no-repeat center  ;
background-size: 700px 700px;
height:800px;
background-color: #fff;
border: 0;



}

@media only screen and (min-width: 601px){	

	 th {
	font-size:20px;
	color:#fff;
	text-align:center;
	/*padding: 55px;*/
	padding: 55px 80px 10px 65px;
	font-weight: 600;
	}

	tr
	{
		border-bottom: none;

	}

	td
	{
		font-size:18px;		
		font-weight: 600;
		padding-top:1%;
		padding-left:30%;
		padding-bottom: 0px;
	}

	#student_photograph
	{

	/*margin-top: -38px;  */
    float: left;
    /*margin-left: 142px;*/
    position: relative;
    left: 15%;
    top: -40px;
    height: 100px;
	}

	.link_to_share{

	width:50%;
	position: relative;
	/*background: #fff;
	padding: 0px 5px;*/
	top: 40px;
	text-align: center;
	/*margin: 0px 64px;
	left: 54px;
	border-radius: 6px;*/
}

#certificate
{
float:left;
position: relative;
left: 45%;
}
} 

@media only screen and (max-width: 600px){

th {
	font-size:15px;
	color:#fff;
	/*text-align:center;*/
	/*padding: 55px;*/
	/*padding: 55px 80px 10px 65px;*/
	font-weight: 600;
	}

	tr
	{
		border-bottom: none;

	}

	td
	{
		font-size:16px;		
		font-weight: 600;
		/*padding-top:1%;
		padding-left:10%;
		padding-bottom: 0px;*/
	}


	#student_photograph
	{

	/*margin-top: -38px;  
    float: left;
    margin-left: 142px;*/
    /*position: relative;
    left: 15%;
    top: -40px;*/
    height: 80px;
	}

	.link_to_share

	{
		border:none;
	}
	#certificate
{


    margin-left: 30%;
    position: relative;
    /* left: 21%; */
    margin-bottom: 10px;
}
} 





</style>

<div class="container">
	<?php if ($this->ion_auth->logged_in()){ $this->load->view('templates/leftmenu'); }?>
	<div class="row text-center">
		<h1>Result</h1>
	</div>
	<div class="row contact">
		<div class="col-md-12 text-center well" style="min-height:347px;">

<?php 

if(!empty($subjects) && !empty($results))
{

	
	


echo "<p>Please select the exam link given below to view the result.</p>";
$i=1;

$j=0;




foreach ($subjects as $key => $value) {
	// foreach ($user_subjects as $key1 => $value1) {
	// echo $user_subjects[$j]->short_subject_name;
	// echo $value;die;

	//if (in_array(strtoupper($user_subjects[$j]->short_subject_name), $subjects))
 if($user_subjects[$j]->short_subject_name==strtolower($value))
{
	echo $i." : "."<a href='".base_url()."crest/result/".strtolower($value)."'>$value</a>";
	echo "<br/>";
	$i++;
	$j++;
}
// }
}
}

else if (!empty($subject) && !empty($levels)) {

	?>

	<a  href="<?php echo base_url()."crest/result/";  ?>"><img src="<?php echo base_url();?>assets/images/go-back-button.png" height="40" ></a>


	<?php 
	# code...

	echo "<p>Please select the level link given below to view the result.</p>";
$k=1;

//$j=0;




foreach ($levels as $level) {

	


	// foreach ($user_subjects as $key1 => $value1) {
	// echo $user_subjects[$j]->short_subject_name;
	// echo $value;die;

	//if (in_array(strtoupper($user_subjects[$j]->short_subject_name), $subjects))

	echo $k." : "."<a href='".base_url()."crest/result/".$subject."/".$level->exam_name."'>".strtoupper($subject)." ".$level->exam_name."</a>";
	echo "<br/>";
	$k++;
	//$j++;

// }
}


}


else if(!empty($level) && !empty($result))
{
?>

<a  href="<?php echo base_url()."crest/result/$subject";  ?>"><img src="<?php echo base_url();?>assets/images/go-back-button.png" height="40" ></a>

 <!-- <a id="btn-Convert-Html2Image" href="#">Download</a> -->

 
							

				<?php
				$facebook_share_caption = "Crest Olympiads";
				$facebook_share_description = "Hey, 

I am excited to share my results of ".$result[0]->subject." with you.

Marks Obtained: ". $result[0]->score." out of ". $result[0]->max_score.". Check: ";
				
				//$facebook_share_image = base_url()."assets/images/logo/logo.png";
				 if($level=="Level 1")
				{

					$image=$subject."_".$result[0]->id.".jpg";
				}

				//$facebook_share_url = base_url();

				$facebook_share_url = base_url()."assets/uploads/cro_result_2019/".$image;

				$facebook_share_image = base_url()."assets/uploads/cro_result_2019/".$image; 
				$shareUrl = 'https://www.facebook.com/sharer.php?caption='.$facebook_share_caption.'&description='.urlencode($facebook_share_description).'&u='.urlencode($facebook_share_url).'&picture='.urlencode($facebook_share_image);
				?>

					<div class="link_to_share">
					<span>Share your result on : </span>				
					<span class="wa_share">
						<span>
							<a data-text="Hey, 

I am excited to share my results of <?php echo $result[0]->subject." ".$result[0]->exam_name;  ?>  with you.

Marks Obtained: <?php echo $result[0]->score." out of ".$result[0]->max_score;  ?>.<?php if($result[0]->recognition!='NA'){ echo ' I got '.$result[0]->recognition.'.';} ?> Check: " data-link="<?php  echo base_url(); //echo current_url(); ?>" class="whatsapp">
								<!-- <i class="fa fa-whatsapp"></i> -->
								<img src="<?php echo base_url();?>assets/images/WhatsApp.png" width="50" height="50">
							</a>
						</span>
					</span>
					<span class="fb_share">
						<span>
							<!-- <i class="fa fa-facebook" onclick="return shareOnFacebook('<?php echo $shareUrl; ?>')">
							</i> -->
							<img src="<?php echo base_url();?>assets/images/Facebook-share-icon.png" onclick="return shareOnFacebook('<?php echo $shareUrl; ?>')" width="50" height="50">
						</span>
					</span>
				</div>

						<?php if($level=="Level 1")
				{

					$image=$subject."_".$result[0]->id.".jpg";

?>

<!-- <a href="<?php //echo base_url();?>assets/uploads/cro_result_2019/cro_2856.jpg" download="cro_2856.jpg"> HERE </a> -->



<!-- <a style="float:left;margin-left: 50%"  href="<?php echo base_url();?>assets/uploads/cro_result_2019/<?php echo $image; ?>" download="<?php echo $image; ?>">Download Certificate</a> -->

<a href="<?php echo base_url();?>assets/uploads/cro_result_2019/<?php echo $image; ?>" download="<?php echo $image; ?>"><button style="background-color: #3f51b533 !important;border-radius: 5px;padding:10px;cursor: pointer;" id="certificate">Download Certificate</button></a>	

<?php  }
				 ?>
						

 <a style="float:right;" id="btn-Convert-Html2Image" href="#"><img src="<?php echo base_url();?>assets/images/download_image.png" height="40" ></a>		

 <a style="float:right;" id="btn-Convert-Html2Pdf" href="#"><img src="<?php echo base_url();?>assets/images/download.png" height="40" ></a>	
					
				<!--  	<a style="float:right;" href="<?php echo base_url()."crest/download_result/".$user_subjects[0]->short_subject_name;  ?>"><img src="<?php echo base_url();?>assets/images/download.png" height="40" ></a> -->	 
		   
					<div class="row" id="result">

							
						<table border="0">
							<thead>
							<tr>

								<th>

								<?php



								 if(!empty($result[0]->student_photograph))
								{
									
									echo '<img id="student_photograph" src='.base_url().'assets/uploads/user_details/'.$result[0]->student_photograph.'>';
								}

								else

								{

									
									echo '<img id="student_photograph" src='.base_url().'assets/uploads/images_200_200/dflt-user-icn.png >';
									

								}
							

								?>
								<?php echo $result[0]->exam_name;  ?> <br><?php echo str_replace(" ","&nbsp;", $result[0]->subject);  ?> :: 2019-20</th>
								</tr>							
							</thead>
							<tbody>
							<tr>
								<td>Student's Name: <span style="color:#B71C1C">
								  <?php $student_name=strtoupper($user_details[0]->username);
								   echo str_replace(" ","&nbsp;", $student_name); ?>
									
								</span></td>
								
							</tr>
							<tr>
								<td>School Name: <span style="color:#B71C1C">
									<?php $school_name=strtoupper($user_details[0]->school);
									$city_name=strtoupper($user_details[0]->city);
									echo str_replace(" ","&nbsp;", $school_name).", ".$city_name;  ?>
										
									</span></td>
								
							</tr>
							<tr>
								<td>Enrollment Number: <span style="color:#B71C1C"><?php echo $user_details[0]->id;  ?></span></td>
								
							</tr>
							<!-- <tr>
								<td>Exam Name : <span style="color:#B71C1C"><?php echo $result[0]->exam_name;  ?></span></td>
								
							</tr> -->
							<tr>
								<td>Class: <span style="color:#B71C1C"><?php echo $user_details[0]->class;  ?></span></td>
								
							</tr>
							<tr>
								<td>Marks Obtained: <span style="color:#B71C1C"><?php echo $result[0]->score;  ?></span></td>
								
							</tr>
							<tr>
								<td>Maximum Marks: <span style="color:#B71C1C"><?php echo $result[0]->max_score;  ?></span></td>
								
							</tr>
							<tr>
								<td>Percentage (%): <span style="color:#B71C1C"><?php $percentage=($result[0]->score/$result[0]->max_score)*100;
								echo round($percentage,2);  ?></span></td>
								
							</tr>
							<?php if($result[0]->percentile!=0){?>

								<tr>
								<td>Percentile (%): <span style="color:#B71C1C"><?php $percentile= $result[0]->percentile; echo $percentile;  ?></span></td>
							
							</tr>

							<?php } ?>
							<tr>
								<td>Recognition: <span style="color:#B71C1C"><?php echo $result[0]->recognition;  ?></span></td>
							
							</tr>
							<?php if($result[0]->award!=""){?>

								<tr>
								<td>Award: <span style="color:#B71C1C"><?php $award= $result[0]->award; echo $award;  ?></span></td>
							
							</tr>

							<?php } ?>

							
						</tbody>
						</table>
					

						
						
						
					
					</div>


				<?php }
				else
{

echo  "<p style='text-align:center'><strong>No results available.</strong></p>";

}
 ?>


				
					<br>			
				
				
		    </div>
		</div>
	</div>
</div>

<script type="text/javascript">


$(document).ready(function(){
	$(".link_to_share > span").hover(function(){
		$(this).css("cursor","pointer");
	});
});


if($(window).width()<768){
	var winheight = $(window).height();
	$(".hide_on_phone").hide();
};

function shareOnFacebook(url) {
	window.open(url);
	return false;
}


$(document).ready(function() {

	var isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
		BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
		iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
		Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
		Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
		any: function() {
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		}
	};
	$('.whatsapp').click(function() {

		if( isMobile.any() ) {

			//var text = "Crest Olympiads! "+$(this).attr("data-text");
			var text = $(this).attr("data-text");
			var url = $(this).attr("data-link");
			var message = encodeURIComponent(text) + " - " + encodeURIComponent(url);
			var whatsapp_url = "whatsapp://send?text=" + message;
			//window.location.href = whatsapp_url;
			window.open(whatsapp_url, '_blank');
		} else {
			//alert("You may share this link only through a mobile phone.");

			// text = "Crest Olympiads! "+$(this).attr("data-text");

			var text = $(this).attr("data-text");
			var url = $(this).attr("data-link");
			var message = encodeURIComponent(text) + " - " + encodeURIComponent(url);
			var whatsapp_url = "https://api.whatsapp.com/send?text=" + message;
			//window.location.href = whatsapp_url;
			window.open(whatsapp_url, '_blank');


		}

	});
});



</script>








