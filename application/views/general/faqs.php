<style type="text/css">
.rotate{
    -moz-transition: all 0.2s linear;
    -webkit-transition: all 0.2s linear;
    transition: all 0.2s linear;
}

.rotate.down{
    -ms-transform: rotate(90deg);
    -moz-transform: rotate(90deg);
    -webkit-transform: rotate(90deg);
    transform: rotate(90deg);
}
#center-align{
	margin-top: 80px;
}	
	/*@media only screen and (max-width: 768px){*/

.collapsible-body
{
 padding:1rem !important;
}
@media only screen and (max-width: 767px){
 
#center-align{
	margin-top: -30px;
}	 
 }
</style> 
<div class="row">
<p>&nbsp;</p>
	<h1 id="center-align" >Frequently Asked Questions</h1>
	<div class="col s12">
		<ul class="collapsible">
		<?php

		$i=1;
		foreach ($questions as $q) {
			//echo $i;
			?>
			
				<li <?php if($i=1){ ?> class="active" <?php } else { } ?> >
					<div class="collapsible-header"><?php echo "Q.".$q->id; ?><i class="material-icons rotate">keyboard_arrow_right</i><?=$q->ques;?></div>
					<div class="collapsible-body"><span><?=$q->answer;?></span></div>
					
				</li>
			
 	
			<?php
	$i++;
	}

		?>
		</ul>
	</div>
</div>
 

<script>
	document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems, options);

  });

  // Or with jQuery

  $(document).ready(function(){
    $('.collapsible').collapsible();
  });

</script>
 

 
