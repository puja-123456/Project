
<style type="text/css">
.label-no-padding{
	padding: 0px !important;
}
.email-background{
	background-color: #fff !important;
	border: 1px solid #ccc !important;
	padding: 5px !important;
	margin-top: 0 !important;
}

.partner li{
	font-family: "Lato";
	font-style: normal;
	font-weight: 400;
	font-size: 16px;
	color: #272528;
}
</style>

<div>
	<p>&nbsp;</p>
	<div class="row" id="schools_list">
		
		<div class="col s12">
			<h2 style="text-align:left;">School List</h2>
			<!-- <p>
				The school Olympiad coordinators looking for registration form can fill the below form. And for students looking for individual registrations, please fill the form on <a href="http://www.crestolympiads.com/" target="_blank">Home Page</a>. If you have any query, then please email at <a href="mailto:info@crestolympiads.com">info@crestolympiads.com</a>
			</p>
			<p>
				Registration Fee for Indian Schools: A charge of Rs. 225 towards cost of examination is payable by each participating student for Schools in India.
			</p>
			<p>
				Registration fee for International Schools (outside India): A charge of $10 towards cost of examination is payable by each participating student for international schools.

			</p> -->
		<!-- </div>
		<div class="col l12 m12 s12"> -->

      <p style="font-size: 20px;font-weight: bold">

        Compete with students of 1200+ schools for CREST Olympiads.

      </p>

			<?php 



//for($i = 0, $char = 'A'; $i < 26; $i++, $char++) {




			

		?>
    <!-- <a href="<?php echo base_url();?>schools/#<?php echo $char; ?>" class="button"><?php   echo $char; ?></a> -->
  <?php// } ?>

   <!--   <h2 id="<?php echo $char; ?>"></h2> -->

<h1> International Schools</h1>

     <?php 





for($i = 0; $i < count($international_country_list); $i++) {

	
		?>
   
    
<!-- <div class="clear" id ="<?php echo $char; ?>" > -->
<?php 

      echo '<h2  class="schoolcat" align="left" id="'.$international_country_list[$i].'">' . $international_country_list[$i] . '</h2>';

      // for ($i=0; $i <count($international_schools_list) ; $i++) { 
      // 	# code...

      // 	echo $international_schools_list[$i][1];
      // }

        foreach ( $international_schools_list as $value ) {



        	 //echo $value[1];
        

        	
        	if($value[2]==$international_country_list[$i])
        	{
            echo '<a href="" title=""><div class="col-sm-3 col-lg-3 col-xs-12" style="width:25%;padding-bottom: 8px;text-decoration:underline; color: #978e43;">' . $value[0] . '</div></a>';
        }
    }

    
     ?>


<?php } ?>

<h1> Indian Schools</h1>

     <?php 
   


// for($i = 0, $char = 'A'; $i < 26; $i++, $char++) {

  // for($i = 0, $char = 'A'; $i < 26; $i++, $char++) {

     // echo "<pre/>";

     // print_r($indian_city_list);die;


  for($i = 0; $i < count($indian_city_list); $i++) {

	
		?>
   
    
<!-- <div class="clear" id ="<?php echo $char; ?>" > -->
<?php 

      echo '<h2  class="schoolcat" align="left" id="'.$indian_city_list[$i].'">' . $indian_city_list[$i] . '</h2>';

      // for ($i=0; $i <count($international_schools_list) ; $i++) { 
      // 	# code...

      // 	echo $international_schools_list[$i][1];
      // }

        foreach ( $indian_schools_list as $value ) {



        	 //echo $value[1];
        

        	
        	if(ucfirst(trim($value[1]))==$indian_city_list[$i])
        	{
            echo '<a href="" title=""><div class="col-sm-3 col-lg-3 col-xs-12" style="width:25%;float:left;padding-bottom: 8px;text-decoration:underline; color: #978e43;">' . $value[0] . '</div></a>';
        }
    }

    
     ?>


<?php } ?>


</div>
</div>
			
		</div>
	</div>

</div>
<div class="cl"></div>
<style> 

@media only screen and (max-width: 768px){
  #schools_list .col.s12 { 
    padding: 10px !important;
    }
    .col-xs-12{
      width: 100% !important;
         position: relative;
    min-height: 1px;
    padding-left: 15px;
    padding-right: 15px;
    }
}
#schools_list .col.s12 { 
    padding: 0px 89px;
    }
</style>
<script type="text/javascript">
if($(window).width()<768){
	$(".hide_on_phone").hide();
};


$(window).scroll(function() {
	$(".slideanim").each(function(){
		var pos = $(this).offset().top;

		var winTop = $(window).scrollTop();
		if (pos < winTop + 600) {
			$(this).addClass("slide");
		}
	});
});

</script>

<style type="text/css">

.button
{
background: #CBC9CF;
    color: #424143;
    padding: 12px 30px;
    text-transform: uppercase;
    display: inline-block;
    transition: all 0.3s ease-in-out;
    cursor: pointer;
    outline: none;
    border: none;
    text-decoration: none;
    position: relative;
    margin-top: 4px !important;

}

.schoolcat {
    clear: both;
    padding-top: 20px;
    margin-bottom: 5px;
    font-size: 32px;
    }

</style>