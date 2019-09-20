<div class="row">
	<p>&nbsp;</p>
	<h1 class=""><?=$title?></h1>
	<div class="col s12 m12">
		<p>CREST Olympiads, a venture of Assessment Square (registered office at Tower B4, Unit 1110, Spaze IT Park, Sohna Road, Gurgan - 122018, India) understands that privacy is an important issue for visitors to the website&nbsp;<a href="https://www.crestolympiads.com">www.crestolympiads.com</a>. The following information is designed to help visitors understand what information we gather from our site, and how we handle the information once we gather it.</p>
		<p><strong>Information Collection and Use</strong><br /> CREST Olympiads collects personally identifiable information ("Personal Information") such as your full name, student name, email address, mailing address and/or telephone number, etc. only in order to create or enhance your experience while navigating the site or giving the tests. When we collect this information from you, it is because you voluntarily submit the information to us in order to register for Online Olympiads, blogs, contests and bulletin boards, in connection with content or suggestions you submit to us or because you want us to furnish you with products, services or information. We may also obtain Personal Information from third parties.</p>
		<p><strong>Cookies</strong><br /> Cookies are small bits of information that the CREST Olympiads website place on the hard drive of your computer. Cookies remember information about your activities on our site and enable CREST Olympiads to make your visits to our site more enjoyable. For example, cookies can store your password for easy login to a site you have previously visited. It can also save your preferences for a personalized home page. Information about your activities on CREST Olympiads site and other non-personally identifiable information about you may also be used to limit the online ads you encounter to those we believe are consistent with your interests.</p>
		<p>You can program your computer to warn you each time a cookie is being sent or to refuse cookies completely. However, without cookies you will not have access to certain features on CREST Olympiads web site.</p>
        <p><strong>Sharing of Information</strong><br />Every User hereby expressly agrees and that this Website may share the Information collected from the you with its affiliates, employees, agents, third party service provider, sellers, suppliers, banks, payment gateway operators and such other individuals and institutions located within or outside India from time to time to ensure efficient management of User accounts, to detect and prevent identity theft and other illegal acts, to provide specialized, respond to legal, judicial, quasi judicial law enforcement agencies or in connection with an investigation on matters related to public safety, as permitted by law and for such other purposes that this Website may deem fit from time to time.<br />

            Every User hereby represents and warrants that that sharing of such Information shall not cause any wrongful loss/gain or damage to either the User or to any third party.</p>
		<p>CREST Olympiads web site may be linked to Internet sites operated by other companies. Some of these third party sites may be co-branded with a CREST Olympiads logo, even though they are not operated or maintained by CREST Olympiads. CREST Olympiads's website may also carry advertisements from other companies. CREST Olympiads is not responsible for the privacy practices of web sites operated by third parties that are linked to our site or for the privacy practices of third party or Internet advertising companies. Once you&rsquo;ve left the CREST Olympiads site via such a link or by clicking on an advertisement, you should check the applicable privacy policy of the third party or advertiser site to determine how they will handle any Personal Information they collect from you.</p>
		<p><strong>Opt Out</strong><br />CREST Olympiads considers opt-out requests very seriously. All unsubscribe or opt-out requests should be sent to us by filling up the form on the 'Contact Us' Page of this Website and we will process your request within a reasonable time after receipt. However, we are not responsible for, and in some cases we are incapable of, removing your personally identifiable information from the lists of any third party who has previously been provided your information in accordance with this Privacy Policy or your consent. You should contact such third parties directly. If you would like to update or correct any personally identifiable information that you have provided to us, please fill up the form on the 'Contact Us' Page of this Website and once we confirm your information, we will update such information within a reasonable amount of time.</p>
		<p><strong>Use of Personal Information</strong><br />CREST Olympiads will use your Personal Information provided under this Policy in a manner that is consistent with this Policy. If CREST Olympiads obtains Personal Information from a third party, such as a business partner, our use of that information is governed by this Policy.</p>
		<p>CREST Olympiads may share your Personal Information with companies that are affiliated with us. CREST Olympiads may also share your Personal Information with advertisers and business partners that are not affiliated with CREST Olympiads, but would like to send you information about their products and services.</p>
		<p>CREST Olympiads may also enter into agreements with outside companies that possess the technology that allows CREST Olympiads to customize the advertising and marketing messages you receive on our websites. Your non-Personal Information and click stream data about your activities on our sites may be shared with these companies so this customization can be accomplished. These companies will not share your information with any third party or use it for any other purposes. Anonymous click stream and demographic information may also be shared with CREST Olympiads advertisers and business partners.</p>
		<p><strong>Changes to CREST Olympiads's Internet Privacy Policy</strong><br /> CREST Olympiads may, from time to time, make changes to this policy. We recommend that visitors to this site re-visit this privacy policy on every occasion to learn of new privacy practices or changes to our policy.</p>
		<p><strong>How to contact CREST Olympiads about this Privacy Policy</strong><br /> If site visitors have any questions, concerns, or complaints about this Privacy Policy, or want to let us know what they think about any of our offerings and services, they can do so by sending an email using the form on the 'Contact Us' page of this website</a></p>
		<p>&nbsp;</p>
		<p></p>Note: To ensure the safety and protection of consumer information, we will continue to review and improve our Privacy Policy and Procedures. Our Privacy Policy is subject to change at any time without notice. To make sure you are aware of any changes, please review this policy periodically.</p>
	</div>
</div>



<script type="text/javascript">

	$(document).ready(function() {

	    $().ready(function(){
	        $('.syllabus-menu a').click( function (e) {
	            var a = $(this).attr("href");
	            $("html, body").animate({scrollTop: $(a).offset().top - 125 }, 'slow');;
	        });
	    });
		if($(window).width()>768){

			$(window).scroll(function () {    
				var $el = $('.page-footer'),
				scrollTop = $(this).scrollTop(),
				scrollBot = scrollTop + $(this).height(),
				elTop = $el.offset().top,
				elBottom = elTop + $el.outerHeight(),
				visibleTop = elTop < scrollTop ? scrollTop : elTop,
				visibleBottom = elBottom > scrollBot ? scrollBot : elBottom;
				visible_height = visibleBottom - visibleTop;
				// console.log(visible_height);

                if(scrollTop <= 132){
                    visible_height = 253 - scrollTop ;
                    // console.log(visible_height);
                    $('.syllabus-menu').css("top",visible_height+"px");
                }
                else if(visible_height > -90){
                	$(".syllabus-menu h3").show(200);
                    visible_height = 90 - visible_height;
                    $('.syllabus-menu').css("top",visible_height+"px");
                }
                else if(scrollTop > 132 && visible_height < -90){
                	$(".syllabus-menu h3").show(200);
                	$('.syllabus-menu').css("top","145px");
				}
				// if(visible_height>0){
				// 	visible_height = 160 - visible_height;
				// 	$('.syllabus-menu').css("top",visible_height+"px");
				// }
				// else
				// 	$('.syllabus-menu').css("top","141px");
			});
		}
	});

</script>

<style type="text/css">
@media only screen and (min-width: 768px){
	.syllabus-menu{
		position: fixed;
		padding: 0px 10px;
		width: inherit;
		/*top:145px;*/
	}
	.syllabus-menu .divider{
		margin-right: 75px;
	}
	.syllabus-menu .flow-text{
		margin-top: 0px;
		margin-bottom: 10px;
	}
	.syllabus-menu ul li{
		padding: 5px 10px;
		width: 80%;
		border-bottom: 2px solid #47a69a;
		transition: all 1s ease;
	}
	.syllabus-menu ul li:hover{
		letter-spacing: 0.5px;
		border-bottom: 2px solid #11332f;
	}
}
</style>
