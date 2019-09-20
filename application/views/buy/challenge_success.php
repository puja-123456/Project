<div id="fb-root"></div>

<!-- Global site tag (gtag.js) - Google Ads: 752306966 --> 
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-752306966"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-752306966');
</script>

<!-- Event snippet for Purchased conversion page -->
<script>
  gtag('event', 'conversion', {
      'send_to': 'AW-752306966/cvWxCK2Qi5gBEJaW3eYC',
      'transaction_id': '<?php echo $txn_id; ?>'
  });
</script>

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

<style>
body  {
  overflow-y: scroll;
}



#successModal .modal-body {
  
 /* background: url("<?php //echo base_url(); ?>assets/images/certificate_bg.jpg");*/
  background: none;
  height:100px;

}

/*ul.cases li
{
  list-style-type: disc !important;
}*/



.btn
{
  margin-bottom: 10px;
}
</style>
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<!--   <script type="text/javascript"></script> -->
 <div class="modal fade" id="successModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"style="text-align: center">Challenge Submitted Successfully</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

          <!--   <div class="content"> -->

            <ul class="cases">

                <li><p> Thanks for submitting the challenge. It will be reviewed by the Academic Council and scores will be updated as needed.</p></li>               



            </ul>

              
            


            <!--  </div> -->
          
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

  <div class="container">
  	<?php if ($this->ion_auth->logged_in()){ $this->load->view('templates/leftmenu'); }?>

  	<input type="button" name="action" value="click" style="display:none;" id="trigger" data-toggle='modal' data-target='#successModal'>


  </div>

  <script>
  	  $(document).ready(function () {

   // $('#successModal').modal('show');

   $('#successModal').on('hidden.bs.modal', function () {
    location.reload();

    // similar behavior as an HTTP redirect
window.location.replace("https://www.crestolympiads.com/crest/challenge_test");

    
})

     $('#trigger').trigger('click'); 

});


  </script>


