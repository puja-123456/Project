<div class="col-md-4 col-xs-12 col-sm-12 quick-links">
   <h2 class="inner-hed">Quick Links</h2>
   <div class="notif">
      <ul>
         <li><a href="<?php echo base_url();?>">Home</a></li>
         
         <?php $this->load->library('ion_auth');		
         if ($this->ion_auth->logged_in() && !$this->ion_auth->is_admin())
         {
            ?>
            <li><a href="<?php echo base_url();?>user">My Dashboard</a></li>
            <li><a href="<?php echo base_url();?>user/profile">Profile</a></li>
            <li><a href="<?php echo base_url();?>user/quiz_history">Performance</a></li>
            <li><a href="<?php echo base_url();?>user/quizzes">Worksheet</a></li>
            <li><a href="<?php echo base_url();?>daily-quiz">Daily Quiz</a></li>
            <?php 
         } 
         else if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) { 
            ?>
            <li><a href="<?php echo base_url();?>admin">My Dashboard</a></li>
            <li><a href="<?php echo base_url();?>admin/profile">Profile</a></li>
            <?php 
         } else { 
            ?>
            <li><a href="<?php echo base_url(); ?>free-trial"> Free Trial </a></li>
            <li><a href="<?php echo base_url(); ?>buy"> Buy </a></li>
            <?php 
         } ?>
         <br>
         <a class="btn courses-btn yellow-bg" style="margin-left:-15px" data-toggle="modal" data-target="#htb_video" onclick="makeevent('buy video','Play','Buy Practice Papers Video')" >How to Buy Online Practice Papers</a>
         <br><br>
         <li><a href="<?php echo base_url(); ?>olympiad-exam-dates"> Olympiad Exam Dates </a></li>
         <li><a href="<?php echo base_url(); ?>olympiad-exam-help/"> Olympiad Preparation Tips</a></li>
         <li><a href="<?php echo base_url(); ?>olympiad-test-practice"> Saturday to Saturday Mock Test</a></li>
         <br>
         <li><a href="<?php echo base_url(); ?>superminds"> Super Minds </a></li>
         <li><a href="<?php echo base_url(); ?>games"> Mini Games </a></li>
         <li><a href="<?php echo base_url(); ?>contact"> Contact Us </a> </li>
      </ul>
   </div>
   <h2 class="inner-hed">How to take a Free Trial</h2>
   <div class="notif">
      <div class="how_to_image">
         <img onclick="makeevent('free trial video','Play','Free Trial Video')" data-toggle="modal" data-target="#taft_video" class="image_2 img-responsive" src="<?php echo base_url();?>assets/designs/images/how-to-2.jpg">
      </div>
      <!-- <button type="button" class="btn btn-info btn-lg">Open Modal</button> -->
   </div>
</div>

<!-- Modal -->
<div id="taft_video" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <!-- <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
       -->
      <div class="modal-body">
         <div style="position:relative;height:0;padding-bottom:56.25%"><iframe width="100%" height="100%" style="position:absolute;width:100%;height:100%;left:0" src="https://www.youtube.com/embed/87A5jy1cfGM?ecver=2" frameborder="0" allowfullscreen></iframe></div>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="htb_video" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <!-- <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
       -->
      <div class="modal-body">
         <div style="position:relative;height:0;padding-bottom:56.25%"><iframe width="100%" height="100%" style="position:absolute;width:100%;height:100%;left:0" src="https://www.youtube.com/embed/YI5-3eQaSrw?ecver=2" frameborder="0" allowfullscreen></iframe></div>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">
   function makeevent(var1,var2,var3){
      var3 = var3 + ' on page ' + window.location.pathname;
      ga('send','event',var1,var2,var3);
   }
</script>
<?php 
if(isset($active_page)){
   ?>
   <script type="text/javascript">

   $(document).ready(function() {

      if($(window).width()>768){
        
         $(window).scroll(function () {    
            var $el = $('footer'),
            scrollTop = $(this).scrollTop(),
            scrollBot = scrollTop + $(this).height(),
            elTop = $el.offset().top,
            elBottom = elTop + $el.outerHeight(),
            visibleTop = elTop < scrollTop ? scrollTop : elTop,
            visibleBottom = elBottom > scrollBot ? scrollBot : elBottom;
            visible_height = visibleBottom - visibleTop + $(".bottomBlackBar").height();
            console.log(visible_height);
            if(visible_height>0){
               visible_height = 140 - visible_height;
               $('.quick-links').css("top",visible_height+"px");
            }
            else
               $('.quick-links').css("top","161px");
         });
      }
   });

   </script>

   <style type="text/css">
   @media only screen and (min-width: 768px){
      .quick-links{
         position: fixed;
         right: 161px;
         top:161px;
      }
   }
   </style>
   <?php
}
?>
<style type="text/css">  
.yellow-bg{
   background: #cc8d2d;
}
</style>
