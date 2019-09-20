<!-- Bootstrap -->
<link href="<?php echo base_url();?>assets/css/editor.css" type="text/css" rel="stylesheet"/>
<script src="<?php echo base_url();?>assets/js/editor.js"></script>
<?php
if(!isset($singlequestion)){
    $singlequestion = array();
}
?>
<?php
$img_url = $this->config->item('image_src_url');
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/questionslisting"> Questions List</a></li>
    <li class="breadcrumb-item"><?php if(count($singlequestion)>0) echo "Update Question";?></li>
</ol>
<div class="row">
   <div class="col-md-8">
      <div style="color:#FF0000; font-size:12px; padding-left:10px;"><?php 
         echo $this->session->flashdata('message');
         ?>
      </div>
      <form method="POST" action="<?php echo base_url();?>admin/editQuestion/<?php echo $singlequestion[0]->questionid; ?>" id="questions_form" enctype='multipart/form-data'>
    <!-- <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" /> -->
		<input type="hidden" name="questionid" value="<?php echo isset($singlequestion[0]->questionid)?$singlequestion[0]->questionid:''; ?>" />
			
         
         <div class="form-group">
            <label for="inputEmail">Question</label>
              <!-- <input type="text" class="form-control" id="long_description" name="long_description" value="<?php echo isset($singlequestion[0]->long_description)?$singlequestion[0]->long_description:''?>" placeholder="Enter Miscellaneous" > -->
              <textarea class="form-control editors" id="question" name="question">
                  <?php echo isset($singlequestion[0]->question)?$singlequestion[0]->question:''?>
              </textarea>
               
         </div>
         <div class="form-group">
            <label for="inputEmail">Question Type</label>
              <!-- <input type="text" class="form-control" id="long_description" name="long_description" value="<?php echo isset($singlequestion[0]->long_description)?$singlequestion[0]->long_description:''?>" placeholder="Enter Miscellaneous" > -->
             <!-- <input type="text" class="form-control" id="prizes" name="prizes" value="<?php echo isset($singlequestion[0]->prizes)?$singlequestion[0]->prizes:''?>" placeholder="Enter Prizes" > -->
               <textarea class="form-control editors" id="question_type" name="question_type">
                  <?php echo isset($singlequestion[0]->question_type)?$singlequestion[0]->question_type:''?>
              </textarea>
         </div>
          <div class="form-group">
            <label for="inputEmail">Question Image</label>
            <input type="text" class="form-control" id="questionImage" name="questionImage" value="<?php echo isset($singlequestion[0]->questionImage)?$singlequestion[0]->questionImage:''?>" placeholder="Enter Question Image Name" >
             <?php if(isset($singlequestion[0]->questionImage) && !empty($singlequestion[0]->questionImage)) { ?><img src="<?php echo $img_url.'uploads/'.$singlequestion[0]->questionImage; ?>" class="img-responsive" style="max-height: 70px;"><br>
           <?php } ?>
         </div>         
         <div class="form-group">
            <label for="inputEmail">Answer 1</label>
              <!-- <input type="text" class="form-control" id="long_description" name="long_description" value="<?php echo isset($singlequestion[0]->long_description)?$singlequestion[0]->long_description:''?>" placeholder="Enter Miscellaneous" > -->
             <!-- <input type="text" class="form-control" id="venues" name="venues" value="<?php echo isset($singlequestion[0]->venues)?$singlequestion[0]->venues:''?>" placeholder="Enter Venues" > -->
              <textarea class="form-control editors" id="answer1" name="answer1">
                  <?php echo isset($singlequestion[0]->answer1)?$singlequestion[0]->answer1:''?>
              </textarea> 
         </div>
         <div class="form-group">
            <label for="inputEmail">Answer1 Image</label>
            <input type="text" class="form-control" id="answer1Image" name="answer1Image" value="<?php echo isset($singlequestion[0]->answer1Image)?$singlequestion[0]->answer1Image:''?>" placeholder="Enter Answer 1 Image Name" >
             <?php if(isset($singlequestion[0]->answer1Image) && !empty($singlequestion[0]->answer1Image)) { ?><img src="<?php echo $img_url.'uploads/'.$singlequestion[0]->answer1Image; ?>" class="img-responsive" style="max-height: 70px;"><br>
           <?php } ?>
         </div>
         <div class="form-group">
            <label for="inputEmail">Answer 2</label>
              <!-- <input type="text" class="form-control" id="long_description" name="long_description" value="<?php echo isset($singlequestion[0]->long_description)?$singlequestion[0]->long_description:''?>" placeholder="Enter Miscellaneous" > -->
             <!-- <input type="text" class="form-control" id="venues" name="venues" value="<?php echo isset($singlequestion[0]->venues)?$singlequestion[0]->venues:''?>" placeholder="Enter Venues" > -->
              <textarea class="form-control editors" id="answer2" name="answer2">
                  <?php echo isset($singlequestion[0]->answer2)?$singlequestion[0]->answer2:''?>
              </textarea> 
         </div>
           <div class="form-group">
            <label for="inputEmail">Answer2 Image</label>
            <input type="text" class="form-control" id="answer2Image" name="answer2Image" value="<?php echo isset($singlequestion[0]->answer2Image)?$singlequestion[0]->answer2Image:''?>" placeholder="Enter Answer 2 Image Name" >
             <?php if(isset($singlequestion[0]->answer2Image) && !empty($singlequestion[0]->answer2Image)) { ?><img src="<?php echo $img_url.'uploads/'.$singlequestion[0]->answer2Image; ?>" class="img-responsive" style="max-height: 70px;"><br>
           <?php } ?>
         </div>
         <div class="form-group">
            <label for="inputEmail">Answer 3</label>
              <!-- <input type="text" class="form-control" id="long_description" name="long_description" value="<?php echo isset($singlequestion[0]->long_description)?$singlequestion[0]->long_description:''?>" placeholder="Enter Miscellaneous" > -->
             <!-- <input type="text" class="form-control" id="venues" name="venues" value="<?php echo isset($singlequestion[0]->venues)?$singlequestion[0]->venues:''?>" placeholder="Enter Venues" > -->
              <textarea class="form-control editors" id="answer3" name="answer3">
                  <?php echo isset($singlequestion[0]->answer3)?$singlequestion[0]->answer3:''?>
              </textarea> 
         </div>
          <div class="form-group">
            <label for="inputEmail">Answer 3 Image</label>
            <input type="text" class="form-control" id="answer3Image" name="answer3Image" value="<?php echo isset($singlequestion[0]->answer3Image)?$singlequestion[0]->answer3Image:''?>" placeholder="Enter Answer 3 Image Name" >
             <?php if(isset($singlequestion[0]->answer3Image) && !empty($singlequestion[0]->answer3Image)) { ?><img src="<?php echo $img_url.'uploads/'.$singlequestion[0]->answer3Image; ?>" class="img-responsive" style="max-height: 70px;"><br>
           <?php } ?>
         </div>
         <div class="form-group">
            <label for="inputEmail">Answer 4</label>
              <!-- <input type="text" class="form-control" id="long_description" name="long_description" value="<?php echo isset($singlequestion[0]->long_description)?$singlequestion[0]->long_description:''?>" placeholder="Enter Miscellaneous" > -->
             <!-- <input type="text" class="form-control" id="venues" name="venues" value="<?php echo isset($singlequestion[0]->venues)?$singlequestion[0]->venues:''?>" placeholder="Enter Venues" > -->
              <textarea class="form-control editors" id="answer4" name="answer4">
                  <?php echo isset($singlequestion[0]->answer4)?$singlequestion[0]->answer4:''?>
              </textarea> 
         </div>
          <div class="form-group">
            <label for="inputEmail">Answer 4 Image</label>
            <input type="text" class="form-control" id="answer4Image" name="answer4Image" value="<?php echo isset($singlequestion[0]->answer4Image)?$singlequestion[0]->answer4Image:''?>" placeholder="Enter Answer 4 Image Name" >
             <?php if(isset($singlequestion[0]->answer4Image) && !empty($singlequestion[0]->answer4Image)) { ?><img src="<?php echo $img_url.'uploads/'.$singlequestion[0]->answer4Image; ?>" class="img-responsive" style="max-height: 70px;"><br>
           <?php } ?>
         </div>
         <div class="form-group">
            <label for="inputEmail">Answer 5</label>
              <!-- <input type="text" class="form-control" id="long_description" name="long_description" value="<?php echo isset($singlequestion[0]->long_description)?$singlequestion[0]->long_description:''?>" placeholder="Enter Miscellaneous" > -->
             <!-- <input type="text" class="form-control" id="venues" name="venues" value="<?php echo isset($singlequestion[0]->venues)?$singlequestion[0]->venues:''?>" placeholder="Enter Venues" > -->
              <textarea class="form-control editors" id="answer5" name="answer5">
                  <?php echo isset($singlequestion[0]->answer5)?$singlequestion[0]->answer5:''?>
              </textarea> 
         </div>
         
         <div class="form-group">
            <label for="inputEmail">Correct Answer</label>
              <!-- <input type="text" class="form-control" id="long_description" name="long_description" value="<?php echo isset($singlequestion[0]->long_description)?$singlequestion[0]->long_description:''?>" placeholder="Enter Miscellaneous" > -->
             <!-- <input type="text" class="form-control" id="venues" name="venues" value="<?php echo isset($singlequestion[0]->venues)?$singlequestion[0]->venues:''?>" placeholder="Enter Venues" > -->
              <textarea class="form-control editors" id="correctanswer" name="correctanswer">
                  <?php echo isset($singlequestion[0]->correctanswer)?$singlequestion[0]->correctanswer:''?>
              </textarea> 
         </div>
           <div class="form-group">
            <label for="inputEmail">Hint</label>
              <!-- <input type="text" class="form-control" id="long_description" name="long_description" value="<?php echo isset($singlequestion[0]->long_description)?$singlequestion[0]->long_description:''?>" placeholder="Enter Miscellaneous" > -->
             <!-- <input type="text" class="form-control" id="venues" name="venues" value="<?php echo isset($singlequestion[0]->venues)?$singlequestion[0]->venues:''?>" placeholder="Enter Venues" > -->
              <textarea class="form-control editors" id="hint" name="hint">
                  <?php echo isset($singlequestion[0]->hint)?$singlequestion[0]->hint:''?>
              </textarea> 
         </div>
          <div class="form-group">
            <label for="inputEmail">Hint Image</label>
            <input type="text" class="form-control" id="hintImage" name="hintImage" value="<?php echo isset($singlequestion[0]->hintImage)?$singlequestion[0]->hintImage:''?>" placeholder="Enter Hint Image Name" >
             <?php if(isset($singlequestion[0]->hintImage) && !empty($singlequestion[0]->hintImage)) { ?><img src="<?php echo $img_url.'uploads/'.$singlequestion[0]->hintImage; ?>" class="img-responsive" style="max-height: 70px;"><br>
           <?php } ?>
         </div>
         <!-- <input type="hidden" name="id" value="<?php if(isset($id)) echo $id;?>"> -->
         <input type="submit" class="form-control" name="submit" value="Update">
       </form>
   </div>
</div>


<script src="<?php echo base_url(); ?>assets/tinymce/tinymce.min.js"></script>
<script>tinymce.init({
    selector: 'textarea.editors',  // change this value according to your HTML
    menubar: true,
    skin: "lightgray",
     plugins: "code",
    theme: 'modern',
  height: 200,
  theme: 'modern',
  plugins: 'print preview fullpage searchreplace autolink directionality  visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | bullist numlist | link unlink | image imageoptions | charmap pastetext | table tablecellprops ',
  image_advtab: true,
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
    });
</script>

