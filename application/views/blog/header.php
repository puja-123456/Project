<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<style type="text/css">
.row{
	margin-right: 0px;
	margin-left: 0px;
}

hr{
	width: 100%;
}
p > strong > a{
	color: #000;
}
.blog-content p{
	font-family: "Lato";
	font-style: normal;
	font-weight: normal;
	font-size: 16px;
	line-height: 29px;
}
.blog-content img{
	max-width: 100%;
	padding: 2%; 
}
.blog-content ul{
	/*padding-left: 10px;*/
	margin-bottom: 20px;
}
.blog-content ul li p{
	/*padding-left: 10px;*/
}
.right-links .well *{
	color:#999;
}
.right-links .well a:hover{
	color:#000;
}

@media only screen and (min-width: 768px){
	.right-links{
		position: fixed;
		right: 50px;
		top:120px;
	}
}
.blog-ad{
	border: 1px solid #bbb;
	padding: 10px;
	margin: 10px auto;
}
.blog-ad a{
	font-family: "Lato";
	font-style: normal;
	font-weight: normal;
	font-size: 16px;
	line-height: 29px;
}
</style>
<div class="hide_on_phone" style="height:115px"></div>
