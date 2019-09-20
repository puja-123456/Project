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
.center-align{
	margin-top: 70px;
}	
	/*@media only screen and (max-width: 768px){*/

.collapsible-body
{
 padding:1rem !important;
}
@media only screen and (max-width: 767px){
li.droopmenu-parent.dmtoggle-open .material-icons {
    display: none;
}
li.droopmenu-parent .material-icons {
    display: none;
}
.dm-nav-brand a img, .droopmenu-brand img {
    height:auto;
    position: relative;
    top: -5px;
}
.droopmenu-header, .droopmenu-mclose, .droopmenu-navbar, .droopmenu-offcanvas .droopmenu-nav {
    background: #ffffff !important;
}
.droopmenu-toggle i:after, .droopmenu-toggle i:before {
    background: #342f2f;
}
.center-align{
	margin-top: -30px;
}	 
 }
</style> 
<div class="row">
<p>&nbsp;</p>
	<h1 class="center-align" >Frequently Asked Questions</h1>
	<div class="col s12">
		<ul class="collapsible">
		<?php

		$i=1;
		foreach ($questions as $q) {
			?>
			
				<li <?php if($i=1){ ?> class="active" <?php } else { } ?> >
					<div class="collapsible-header"><?php echo "Q.".$i; ?><i class="material-icons rotate">keyboard_arrow_right</i><?=$q->ques;?></div>
					<div class="collapsible-body"><span><?=$q->answer;?></span></div>
				</li>
			

			<?php
		$i++;
	}
		?>
		</ul>
	</div>
</div>
<!-- 
<script type="text/javascript">
	$().ready(function(){
		$(".collapsible-header").click(function(){
			$(this).children('.material-icons').toggleClass("down");
		})
	});
</script> -->

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
 

 
