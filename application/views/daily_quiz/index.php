

    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-2802646301126373",
        enable_page_level_ads: true
      });
    </script>
<style type="text/css">
.mar-20 a, .mar-20 a:focus{
	text-decoration: none;
	color:#000;
}
.mar-20 a:hover{
	font-weight: bold;
}
.fixediconstop{
	position: fixed;
	right: 0px;
	top:20%;
}
.fixediconstop li{margin-bottom: 3px; background: #1a2432; color: #fff; width: 50px; overflow: hidden;}
.fixediconstop li img{
	height: 50px;
}
.fixediconstop li span{
}
.container .mar-20 .courses-btn{
	text-transform: none;
}
.green-bg, .red-bg, .yellow-bg{
	color: #fff;
}
.green-bg:hover, .red-bg:hover, .yellow-bg:hover{
	color: #fff;
	background: #960a00;
}
.yellow-bg{
	background: #cc8d2d;
}
.red-bg{
	background: #c73b0b;
}
.green-bg{
	background: #978e43;
}
.mar-20 a:first-child{
	margin-right: 10px;
}
.hover-bg{
	background: #adefc4 !important;
}
.disable_click{
	pointer-events:none;
}
.question .ans{
	cursor: pointer;
}
.question_no_table td:hover, .question_no_table td.active {
	background-color:#844141 !important;
}
.question_no_table td:hover a, .question_no_table td.active a{
	color:#fff; 
}

ul.breadcrumb {
  padding: 10px 16px;
  list-style: none;
  background-color: #eee;
}
ul.breadcrumb li {
  display: inline;
  font-size: 18px;
  color:#000;
}
ul.breadcrumb li+li:before {
  padding: 8px;
  color: #000;
  content: "/\00a0";
}
ul.breadcrumb li a {
  color: #0275d8;
  text-decoration: none;
}
ul.breadcrumb li a:hover {
  color: #01447e;
  text-decoration: underline;
}
</style>
<div class="hide_on_phone" style="height:115px"></div>
<div class="row">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url(); ?>">Home</a></li>					
				</ol>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="col-md-8 col-xs-12">
		<h1 class="inner-hed">Start Quiz</h1>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<p><strong>Crest Olympiad Daily Quiz</strong></p>

				<input type="button" class="btn btn-secondary" value="Take This Test" onclick="openPopup()" />

<script type="text/javascript">

var popup;

function openPopup()

{

popup = window.open("<?php echo base_url()."daily-quiz/start"; ?>" ,"Daily Quiz", "height=800,width=1200")

}

function closePopup()

{

popup.close();

}

</script>
				
			</div>
		</div>

		<!-- <div class="row">
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<ins class="adsbygoogle"
			style="display:block; text-align:center;"
			data-ad-layout="in-article"
			data-ad-format="auto"
			data-ad-client="ca-pub-2802646301126373"
			data-ad-slot="8710997337"></ins>
			<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
		</div> -->

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				
			</div>
		</div>
		
		<div class="col-md-12 col-sm-12 col-xs-12">
    	    <?php //echo $this->load->view('answerkeys/result_form'); ?>
		</div>

	</div>


        <?php //echo $this->load->view('general/quick_links'); ?>
	
</div>

<div class="hide_on_phone" style="height:45px"></div>

<script type="text/javascript">

	if($(window).width()<768){
		$(".hide_on_phone").hide();
		$(".hide_on_desktop").show();
	};
	if($(window).width()>768){
		$(".hide_on_desktop").hide();
	};
	$().ready(function(){

		$("a.takeafreetrialnow").click(function(){
			<?php echo "var free_trial_course = '".$sample_paper['course_slug']."'"; ?>;
			<?php echo "var free_trial_subject = '".$sample_paper['subject_slug']."'"; ?>;
			<?php echo "var free_trial_class = '".$sample_paper['class']."'"; ?>;
			setCookieForFreeTrial(free_trial_course,free_trial_subject,free_trial_class);
			return trackEvent('login','sample-papers',free_trial_class);
		});
	});
</script>

