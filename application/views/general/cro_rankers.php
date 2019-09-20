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
@media only screen and (min-width: 786px){ 
#interid{
	padding-left: 0px;
	text-align:center;
}
}
@media only screen and (max-width: 786px){	
	td{
		padding: 3px 5px;
	  }
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
	/*padding: 55px 80px 10px 65px;*/
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
		padding-left:3.5%;*/
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
table.striped > thead > tr > th {
	padding: 4px 5px !important;
}
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
	padding: 5px 19px 5px 10px;
      color: #fff;
    background-color: #26a69a !important;

}
/*table.striped > tbody > tr:nth-child(even) {
  background-color: rgba(170, 213, 213, 0.5); 
} 

table.striped > tbody > tr:nth-child(odd) {
  background-color:#e91e6326 !important
} 
table.striped > tbody > tr:nth-child(3) {
  background-color: #cddc3933 !important;
}
table.striped > tbody > tr:nth-child(4) {
 background-color: #79554833 !important;
 }
table.striped > tbody > tr:nth-child(5) {
 background-color: #673ab733 !important;
 }
 table.striped > tbody > tr:nth-child(6) {
background-color: #ffc10733 !important;
 }
*/
 tr.warning{
 	background-color: #e91e630f !important;
 }  
 tr.danger{
 	background-color: #00bcd41a !important;
 	
 }  

 #menu
{
	margin-top:40px;
} 
</style>

<div class="container">

	<?php if ($this->ion_auth->logged_in()){ $this->load->view('templates/leftmenu'); }?>
	<div class="row text-center" style="margin-top: 65px">
		<h1>CREST Reasoning Olympiad (CRO) - Rank Holders</h1>
	</div>

			
	<div class="row contact">
		<div class="col-md-12 text-center well" > 

			<a href="<?php echo base_url(); ?>cro-cutoff" target="_blank"><button style="background-color: #79554833 !important;border-radius: 5px;padding:10px;cursor: pointer;">CRO Cut-offs</button></a>
			<br><br>
  
<!-- <h2>CREST Reasoning Olympiad(CRO) - Top Ranker</h2> -->
<table class="responsive-table striped">
<thead>
  <tr>
      <th>Class</th>
      <th>International Rank</th>
      <th>Student Name</th>
      <th>School</th>
      <th>Country/State</th>
  </tr>
</thead>

<tbody>
 <?php
foreach($croresult as $rows) {
	//foreach ($value as $rows) {
		# code...
	
	 ?>
	<tr class="<?php echo $rows['class']%2?'warning':'danger' ?>">
      <td><?=$rows['class'];?></td>
      <td id="interid"><?=$rows['rank'];?></td>
      <td><?=$rows['name'];?></td>
      <td><?=$rows['school'].", ".ucwords(strtolower($rows['city']));?></td>
      <td id="interid"><?=$rows['country']."/".ucwords(strtolower($rows['state']));?></td>
  </tr>

<?php } ?> 
 
</tbody>
</table> 	
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








