<!--	DON'T DELETE ANY DIV	-->

<style>
.fixediconstop
{
  display: none;
}
</style>
<style>
    .close {
  float: right;
  font-size: 21px;
  font-weight: bold;
  line-height: 1;
  color: #000;
  text-shadow: 0 1px 0 #fff;
  filter: alpha(opacity=20);
  opacity: .2;
}
.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
  filter: alpha(opacity=50);
  opacity: .5;
}
button.close {
  -webkit-appearance: none;
  padding: 0;
  cursor: pointer;
  background: transparent;
  border: 0;
}
.modal-open {
  overflow: hidden;
}
.modal {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1050;
  display: none;
  overflow: auto;
  overflow-y: scroll;
  -webkit-overflow-scrolling: touch;
  outline: 0;
  background-color: transparent !important;
  max-height: initial!important;
  width: auto !important;

}
.modal.fade .modal-dialog {
  -webkit-transition: -webkit-transform .3s ease-out;
     -moz-transition:    -moz-transform .3s ease-out;
       -o-transition:      -o-transform .3s ease-out;
          transition:         transform .3s ease-out;
  -webkit-transform: translate(0, -25%);
      -ms-transform: translate(0, -25%);
          transform: translate(0, -25%);
}
.modal.in .modal-dialog {
  -webkit-transform: translate(0, 0);
      -ms-transform: translate(0, 0);
          transform: translate(0, 0);
}
.modal-dialog {
  position: relative;
  width: auto;
  margin: 10px;
}
.modal-content {
  position: relative;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #999;
  border: 1px solid rgba(0, 0, 0, .2);
  border-radius: 6px;
  outline: none;
  -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
          box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
}
.modal-backdrop {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1040;
  background-color: #000;
}
.modal-backdrop.fade {
  filter: alpha(opacity=0);
  opacity: 0;
}
.modal-backdrop.in {
  filter: alpha(opacity=50);
  opacity: .5;
}
.modal-header {
  min-height: 16.42857143px;
  padding: 15px;
  border-bottom: 1px solid #e5e5e5;
}
.modal-header .close {
  margin-top: -22px;
}
.modal-title {
  margin: 0;
  line-height: 1.42857143;
}
.modal-body {
  position: relative;
  padding: 20px; 
  background: url("<?php echo base_url(); ?>assets/images/certificate_bg.jpg");
  background-repeat: no-repeat;
  background-size: 900px 500px;
  height:500px;
}
.modal-footer {
  padding: 19px 20px 20px;
  margin-top: 15px;
  text-align: right;
  border-top: 1px solid #e5e5e5;
  background-color:transparent !important;
}
.modal-footer .btn + .btn {
  margin-bottom: 0;
  margin-left: 5px;
}
.modal-footer .btn-group .btn + .btn {
  margin-left: -1px;
}
.modal-footer .btn-block + .btn-block {
  margin-left: 0;
}
@media (min-width: 768px) {
  .modal-dialog {
    width: 600px;
    margin: 30px auto;
  }
  .modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
  }
  .modal-sm {
    width: 300px;
  }
}
@media (min-width: 992px) {
  .modal-lg {
    width: 900px;
  }
}

.modal-footer:before,
.modal-footer:after {
  display: table;
  content: " ";
}

.modal-footer:after {
  clear: both;
}

.content
{
    text-align:center;margin-top:20%;font-size: 36px;font-family:Edwardian Script ITC;line-height: 35px
}

.content > span
{

    display: inline-block; overflow: hidden;margin-top:0%;text-align:center;font-size: 20px;font-family:Arial, Helvetica, sans-serif; font-weight:600;line-height: 35px;text-transform: uppercase; position: relative; top: 10px;
 
}
#menu{
  position: absolute;
}
</style>
<!-- <div class="col-md-2 padd" style="background:#fff; color:#000;"> -->

  <div id="menu">
  <label for="tm" id="toggle-menu">MENU <!-- <span class="drop-icon">▾</span> --></label>
  <input type="checkbox" id="tm">
  <ul class="main-menu clearfix">
     <li class="<?php if (isset($active_menu) && ($active_menu == "profile" || $active_menu == "update_password" || $active_menu == "upload_documents" || $active_menu == "reward_points" )) { echo "active"; } ?> first">
      <a href="#">Account
           <span class="drop-icon">▾</span>
        <label title="Toggle Drop-down" class="drop-icon" for="sm1">▾</label>
      </a>
       <input type="checkbox" id="sm1">
      <ul class="sub-menu" id="sub-menu">
        <li class=""><a
            href="<?php echo base_url(); ?>crest/profile">Profile<hr></a>
          </li>
        <li class=""><a
            href="<?php echo base_url(); ?>crest/update_password">Update Password<hr></a>
        </li>
          <li class=" "><a
            href="<?php echo base_url(); ?>crest/upload_documents">Upload Documents<hr></a>
        </li> 
         <!--  <li class="">
            <a href="<?php //echo base_url()."crest/reward_points"; ?>">Rewards Points<hr></a>
        </li>    -->
      </ul>
    </li>
 

    <li class="<?php if (isset($active_menu) && ($active_menu == "registration" || $active_menu == "invoice")) { echo "active"; } ?> second">
      <a href="#">Subscription
           <span class="drop-icon">▾</span>
        <label title="Toggle Drop-down" class="drop-icon" for="sm2">▾</label>
      </a>
       <input type="checkbox" id="sm2">
      <ul class="sub-menu" id="sub-menu1">
          <li class="">
            <a href="<?php echo base_url(); ?>crest/reg_form">Subscribe<hr>
          </a>
        </li>
       <li class="">
            <a href="<?php echo base_url()."crest/invoice"; ?>">Invoice<hr></a>
          </li>
      </ul>
    </li>
     <li class="<?php if (isset($active_menu) && $active_menu == "subcategories") echo "active"; ?>">
            <a href id="preview" data-toggle="modal" data-target="#myModal">Preview Certificate</a>
        </li>
      
        <li class="<?php if (isset($active_menu) && $active_menu == "access_card") echo "active"; ?>">
            <a href="<?php echo base_url()."crest/access"; ?>">Slot/Access</a>
        </li> 
        
        <li class="<?php if (isset($active_menu) && $active_menu == "result") echo "active"; ?>">
            <a href="<?php echo base_url()."crest/result"; ?>">Result</a>
        </li> 
    
        <li class="<?php if (isset($active_menu) && $active_menu == "challenge_test") echo "active"; ?>" >
            <a href="<?php echo base_url()."crest/challenge_test"; ?>">View & Challenge</a>
        </li>
         <li class="<?php if (isset($active_menu) && $active_menu == "add_feedback_form") echo "active"; ?>" id="add_feedback_form" >
            <a href="javascript:void(0)">Feedback</a>
        </li>
  </ul>
</div>
<script>
	$("ul.main-menu.clearfix li.first a").click(function () {
		//alert("hello");
		$("#sub-menu").toggle();
    //$(".sub-menu").toggleClass("open").show();
	});
		$("ul.main-menu.clearfix li.second a").click(function () {
		//alert("hello");
		$("#sub-menu1").toggle();
    //$(".sub-menu").toggleClass("open").show();
	});
</script>
    <div class="clearfix"></div>

 <!-- <span id="hello"> 
  Hello <strong><?php echo $user_details[0]->username; ?></strong> 
  </span> -->

<!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"style="text-align: center">Certificate Preview</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

            <div class="content">
                This is to certify that <span id="uname" style="width:30%"><?php echo $user_details[0]->username; ?> </span>  of class <span id="uclass"><?php echo $user_details[0]->class; ?></span>  <br/>
                studying at <span id="uschool" style="width:40%"><?php echo $user_details[0]->school.", ".$user_details[0]->city; ?></span> <br/>
                has been awarded _______________ in <br/>
                <span id="exam"><?php echo "CREST Mathematics Olympiad";//echo rtrim($user_details[0]->prefered_subject,","); ?></span> <br/>
                conducted on <span id="date">DD MMM, 2019</span> </div>
          
        </div>
          
        
      </div>
    </div>
  </div>

  <?php $this->load->view('user/feedback');?>



  <script>
      
 $("#preview").click(function () {


    
    if ($(window).width() < 1200) {
   alert('The certificate is best viewed on desktop');
}
 
});

  </script>



<script type="text/javascript">

var popup;

function openPopup()

{

popup = window.open("<?php echo base_url()."crest/challenge_test"; ?>" ,"Daily Quiz", "height=800,width=1200")

}

function closePopup()

{

popup.close();

}

</script>

<style>
#toggle-menu, #menu a {
    padding: 0.7em 1em !important;
}
#main-menu ul li {
  background-color: #ffd223; 
}

#menu ul#main-menu li {
 /* background-color: #8b9695;*/
    background-color: #5b908d;
    color: #fff;
    box-shadow: 2px 2px 13px 2px #5b908d63;
}
#menu .sub-menu a {   
  padding: 2px 10px 2px 20px !important;
  text-indent:10px; 
  font-size: 15px;
}
#menu ul {
  margin: 0;
  padding: 0;
}

#menu .main-menu {
  display: none;
}

#tm:checked + .main-menu {
  display: block;
}

#menu input[type="checkbox"], 
#menu ul span.drop-icon {
  display: none;
}

#menu li, 
#toggle-menu, 
#menu .sub-menu {
  border-style: solid;
  border-color: rgba(0, 0, 0, .05);
}

#menu li, 
#toggle-menu {
  border-width: 0 0 1px;
}

#menu .sub-menu {
  /*background-color: #444;*/
  background-color: #26a69a;
  border-width: 1px 1px 0;
  margin: 0 1em;
}

#menu .sub-menu li:last-child {
  border-width: 0;
}

#menu li, 
#toggle-menu, 
#menu a {
  position: relative;
  display: block;
  background-color: #26a69a;
  color: white;
  text-shadow: 1px 1px 0 rgba(0, 0, 0, .125);
}

#menu, 
#toggle-menu {
  /*background-color: #09c;*/
  background-color: #751e49;
}

#toggle-menu, 
#menu a {
  padding: 1em 1.25em;
}

/*#toggle-menu {
  padding: 1em 1.5em;
}*/



#menu a {
  transition: all .125s ease-in-out;
  -webkit-transition: all .125s ease-in-out;
  font-size:18px;
}

#menu a:hover {
  background-color: white;
/*  color: #09c;*/
  color: #751e49;
}

#menu .sub-menu {
  display: none;
}

/*#menu input[type="checkbox"]:checked + .sub-menu {
  display: block;
}*/

#menu .sub-menu a:hover {
  color: #444;
}

#toggle-menu .drop-icon, 
#menu li label.drop-icon {
  position: absolute;
  /*right: 1.5em;
  top: 1.25em;*/
  right: 0;
  top: 0;
}

#menu label.drop-icon, #toggle-menu span.drop-icon {
  /*border-radius: 50%;
  width: 1em;
  height: 1em;*/
  padding: 1em;
  font-size: 1em;
  text-align: center;
  background-color: rgba(0, 0, 0, .125);
  text-shadow: 0 0 0 transparent;
  color: rgba(255, 255, 255, .75);
}

/*#menu .drop-icon {
  line-height: 1;
}*/

#toggle-menu {
    background: #333;
    text-align:center;
}

/*@media only screen and (max-width: 1024px) and (min-width: 768px) {
  #menu li {
    width: 33.333%;
  }

  #menu .sub-menu li {
    width: auto;
  }
}*/

#hello
{
  
  position: relative;
  top: 50px;
  
}

@media only screen and (max-width: 1199px) {

  #hello
{
  
  position: relative;
  top: 0px;
  
}


  }


@media only screen and (max-width: 1199px) {

  #hello
{
  
  position: relative;
  top: 0px;
  
}


  }

  @media only screen 
    and (min-width : 767px) 
    and (max-width : 1199px)  {

  /* STYLES GO HERE */


  #menu .main-menu {
    display: block;
  /*  margin-left: 25px;*/
  }

  #toggle-menu, 
  #menu label.drop-icon {
    display: none;
  }

  #menu ul span.drop-icon {
    display: inline-block;
  }

  #menu li {
    float: none !important;
    border-width: 0 1px 0 0;
  }

  #menu .sub-menu li {
    float: none;
  }

  #menu .sub-menu {
    border-width: 0;
    margin: 0;
    position: relative;
  /*  position: absolute;*/
    top: 100%;
    left: 0;
    width: 12em;
    z-index: 3000;
  }

 /* #menu .sub-menu, 
  #menu input[type="checkbox"]:checked + .sub-menu {
    display: none;
  }*/

  #menu .sub-menu li {
    border-width: 0 0 1px;
  }

  #menu .sub-menu .sub-menu {
    top: 0;
    left: 100%;
  }

  /*#menu li:hover > input[type="checkbox"] + .sub-menu {
    display: block;
  }*/
   
 

  .main-menu li
  {
     /*background-color: #09c;*/
     background-color: #751e49;
  }

  .sub-menu li
  {
    /* background-color: #444;*/
    background-color: #26a69a;
  }

  #menu .drop-icon {
  line-height: 1;
}

#hello
{
  
  position: relative;
  top: 50px;
  
}

h1
{
  text-align:center;
}

.container
{
  width:100%;
}

#menu a {
  font-size:15px;
  padding: 1em 1.5em;
}
   




}

.main-menu .active  {/*background-color: #444;*/background-color: #26a69a;}

@media only screen and (min-width: 1200px) {
  #menu .main-menu {
    display: block;
   /* margin-left: 25px;*/
  }

  #toggle-menu, 
  #menu label.drop-icon {
    display: none;
  }

  #menu ul span.drop-icon {
    display: inline-block;
  }

  #menu li {
    float: none !important;
    border-width: 0 1px 0 0;
  }

  #menu .sub-menu li {
    float: none;
  }

  #menu .sub-menu {
    border-width: 0;
    margin: 0;
    position: relative;
    top: 100%;
    left: 0;
    width: 12em;
    z-index: 3000;
  }

  #menu .sub-menu, 
  #menu input[type="checkbox"]:checked + .sub-menu {
    display: none;
  }

  #menu .sub-menu li {
    border-width: 0 0 1px;
  }

  #menu .sub-menu .sub-menu {
    top: 0;
    left: 100%;
  }

/*  #menu li:hover > input[type="checkbox"] + .sub-menu {
    display: block;
  }*/
  .main-menu li
  {
     /*background-color: #09c;*/
     background-color: #751e49;
  }

  .sub-menu li
  {
    /* background-color: #444;*/
    background-color: #26a69a;
  }

  #menu .drop-icon {
  line-height: 1;
}

#hello
{
  
  position: relative;
  top: 50px;
  
}

h1
{
  text-align:center;
}

.container
{
  width:80%;
}
   
}

.text-center

{
margin-top:-30px;
}

</style>
