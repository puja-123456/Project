
<!--  <div class="container-fluid footer">-->
<footer>
    <div class="row top-footer">
        <div class="col-md-12"><!-- 
            <div class="row">
                <div class="container">
                    <div class="row"> -->
                        <div class="col-md-4 col-sm-12 footer-links">
                            <ul class="list-inline" style="margin-bottom:0px;margin-top: 5px;">
                                <li><a href="<?php echo base_url(); ?>company">About Us</a></li>
                                <li><a href="<?php echo base_url(); ?>faqs">FAQs</a></li>
                                <li><a href="<?php echo base_url(); ?>sitemap">Site Map</a></li>
                                <li><a href="<?php echo base_url(); ?>terms-of-use">Terms of Use</a></li>
                                <li><a href="<?php echo base_url(); ?>privacy">Privacy</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-12 pull-right">
                            <div id="stnewsletter-2" class="widget widget_stnewsletter">        
                                <div class="connect-widget-wrapper">
                                    <div class="input-group">
                                         <input type="email" class="form-control textinput" placeholder="Enter your Email" id="newsletter_email" name="newsletter_email" data-toggle="tooltip" data-placement="top" title="Subscribe to our Newsletter!">
                                         <span class="input-group-btn">
                                            <button class="btn btn submit-btn subscribe" type="submit"  onclick="return newsletterSubscribe()">Subscribe</button>
                                         </span>
                                    </div>
                                    <div class="cl"></div> 
                                </div>
                            </div>
                        </div>         
                        <div class="col-md-4 col-sm-12">
                            <ul class="social">
                                <li><a href="https://www.facebook.com/OlympiadSuccess/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/OlympiadSuccess/" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://plus.google.com/+OlympiadSuccess-OfficialPage" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.linkedin.com/company/olympiad-success" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="https://www.instagram.com/olympiadsuccess/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="https://in.pinterest.com/olympiadsuccess/" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="https://www.youtube.com/c/OlympiadSuccess" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                            </ul>
                            <div class="cl"></div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <p class="copyright text-left">&copy; <?php echo date('Y') - 1; ?> to <?php echo date('Y'); ?> Olympiad Success. All Rights Reserved.</p>
                        </div>
                            <!--             
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</footer>
<style type="text/css">
.top-footer {
    padding: 25px 0 40px 0;
}
.top-footer .footer-links .list-inline a{
    color: #ababab;
    padding-bottom: 4px;
    text-decoration: none;
    transition: all 0.5s ease;
}
.top-footer .footer-links .list-inline a:hover{
    /*text-decoration: underline;*/
    color: #eee;
} 
.social i {
    margin: 0px 25%;
    font-size: 16px;
}
.social{
    margin-top: 0px;
}
.social li {
    list-style: none;
    display: inline-block;
    height: 33px;
    margin-right: 5px;
    border-radius: 50%;
    border: 1px solid #272727;
    width: 33px;
    transition: all 1s ease;
}
.social li:hover{
    border-color: #fff;
}
#stnewsletter-2 .input-group .form-control{
    margin-top: 0px;
}
#stnewsletter-2 .input-group .input-group-btn span{
    margin-top: 0px;
    line-height: 21px;
}
#stnewsletter-2 .input-group .input-group-btn span:hover .btn{
    color:#fff;
}
#stnewsletter-2 .input-group .form-control + .tooltip > .tooltip-inner {
      color: #FFFFFF;
      font-size: 14px;
  }
</style>