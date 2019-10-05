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
	padding: 10px 0px 10px 0px;
	font-weight: 600;
	}

	tr
	{
		border-bottom: none;

	}

	td
	{
	/*	font-size:18px;		
		font-weight: 600;
		padding-top:1%;
		padding-left:30%;
		padding-bottom: 0px;*/

        font-size:17px;		
		/*font-weight: 600;*/
		/*padding-top:1%;*/
		padding-left:2%;
		/*padding-bottom: 0px;*/ 
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
}  
</style>


<style>
@media only screen and (min-width:993px){
.container{
	width: 80%;
}
}
table{
  border:1px solid #efefef;
}
table.striped > thead > tr > th {
      color: #fff;
    background-color: #26a69a !important;
}
tr.warning{
 	background-color: #e91e630f !important;
 }  
 tr.danger{
 	background-color: #00bcd41a !important;
 	
 }  
/*table.striped > tbody > tr:nth-child(even) {
  background-color: rgba(170, 213, 213, 0.5);
} */

#menu
{
	margin-top:40px;
} 
</style>

<div class="fuild-container" >
<div class="row contact">
			<div class="col s12 m2 well"> 
	<?php if ($this->ion_auth->logged_in()){ $this->load->view('templates/leftmenu'); }?>
	</div>
	<div class="col s12 m10 row text-center">
	<div class="row text-center" style="margin-left: 5px;">
		<h1>Main Exam</h1>
	</div>


	 <li id="exam_link" style="font-weight: 700;text-align: center;list-style-type: none !important;font-size:18px">To take exam, click <a href="https://www.crestolympiads.com/user/instructions" <?php if( $today_date >= $start_date && $today_date <= $end_date)
         { echo ""; } else { echo "style='pointer-events: none;'";} ?> >here</a></li>

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


<style>
@media screen and (min-width: 768px){
  #menu{
    max-height: 300px;
    overflow-y: scroll; 
    width: 16.666667% !important;
  }
  .fuild-container{
    margin-top:90px;
    height: 400px;
  }
  }
@media screen and (max-width: 768px){
  .fuild-container{
    margin-top:30px;
  }
  #menu{
  margin-top:-30px; margin-bottom: 40px;
  position: relative !important;
}
</style>





