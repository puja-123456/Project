<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script type="text/javascript">

$(document).ready(function() {

	function getVisible() {    
		var $el = $('footer'),
		scrollTop = $(this).scrollTop(),
		scrollBot = scrollTop + $(this).height(),
		elTop = $el.offset().top,
		elBottom = elTop + $el.outerHeight(),
		visibleTop = elTop < scrollTop ? scrollTop : elTop,
		visibleBottom = elBottom > scrollBot ? scrollBot : elBottom;
		visible_height = visibleBottom - visibleTop + $(".bottomBlackBar").height();
		if(visible_height>0){
			visible_height = 140 - visible_height;
			$('.right-links').css("top",visible_height+"px");
		}
		else
			$('.right-links').css("top","120px");
	}

	if($(window).width()>768){
		$(window).on('scroll', getVisible);
	}
	var new_fb_width = $(".fb-comments").parents().width();
	$(".fb-comments").attr("data-width",new_fb_width);
});

if($(window).width()<768){
	$(".hide_on_phone").hide();
	$(".show_on_phone").show();
	$("#share_buttons button").addClass("btn-block");
}
else{
	$(".hide_on_phone").show();
	$(".show_on_phone").hide();
};


function shareOnFacebook(url,title) {
	url = "http://www.facebook.com/share.php?u="+url+"&title="+title;
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

			var text = $(this).attr("data-text");
			var url = $(this).attr("data-link");
			var message = encodeURIComponent(text) + " - " + encodeURIComponent(url);
			var whatsapp_url = "whatsapp://send?text=" + message;
			window.location.href = whatsapp_url;
		} else {
			alert("You may share this link only through a mobile phone.");
		}

	});
});


</script>