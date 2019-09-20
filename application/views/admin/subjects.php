<!-- Bootstrap -->
<link href="<?php echo base_url();?>assets/css/editor.css" type="text/css" rel="stylesheet"/>
<script src="<?php echo base_url();?>assets/js/editor.js"></script>
<?php
if(!isset($singlesubject)){
    $singlesubject = array();
}
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/subcategorieslisting"> Subcategories List</a></li>
    <li class="breadcrumb-item"><?php if(count($singlesubject)>0) echo "Update Subcategories"; else echo "Add Subcategories";?></li>
</ol>
<div class="row">
   <div class="col-md-8">
      <div style="color:#FF0000; font-size:12px; padding-left:10px;"><?php 
         echo $this->session->flashdata('message');
         ?>
      </div>
      <form method="POST" action="<?php echo base_url();?>admin/addeditSubjects/" id="subjects_form" enctype='multipart/form-data'>
    <!-- <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" /> -->
		<input type="hidden" name="catid" value="<?php echo isset($singlesubject[0]->catid)?$singlesubject[0]->catid:''; ?>" />
			
         <div class="form-group">
            <label for="inputEmail">Subject Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($singlesubject[0]->name)?$singlesubject[0]->name:''?>" placeholder="Enter Subject Name" >
         </div>
         
         <div class="form-group">
            <label for="inputEmail">Status</label>
               <select name ='status' class="form-control">
                <option value=''></option>
                <option value='Active'<?php if(isset($singlesubject[0]->status) && $singlesubject[0]->status=='Active'){echo "selected";}?> >Active</option>
                <option value='Inactive'<?php if(isset($singlesubject[0]->status) && $singlesubject[0]->status=='Inactive'){echo "selected";}?> >Inactive</option>
               </select>
         </div>
         <div class="form-group">
            <label for="inputEmail">Order No</label>
              <input type="text" class="form-control" id="order_no" name="order_no" value="<?php echo isset($singlesubject[0]->order_no)?$singlesubject[0]->order_no:''?>" placeholder="Enter Order Number" >
               
         </div>   
          <div class="form-group">
            <label for="inputEmail">slug</label>
            <?php 
                if (isset($singlesubject[0]->catid)) {?>
                <input type="text" class="form-control" id="slug" name="slug" disabled="disabled"  value="<?php echo isset($singlesubject[0]->slug)?$singlesubject[0]->slug:''?>" placeholder="Enter Slug Name" >
                <?php }else{?>
              <input type="text" class="form-control" id="slug" name="slug" value="<?php echo isset($singlesubject[0]->slug)?$singlesubject[0]->slug:''?>" placeholder="Enter Slug Name" >
               <?php }?>
         </div> 
         <div class="form-group">
            <label for="inputEmail">Meta Title</label>
              <input type="text" class="form-control" id="meta_title" name="meta_title" value="<?php echo isset($singlesubject[0]->meta_title)?$singlesubject[0]->meta_title:''?>" placeholder="Enter Meta Title" >
               
         </div>
               <div class="form-group">
            <label for="inputEmail">Meta Description</label>
              <input type="text" class="form-control" id="meta_description" name="meta_description" value="<?php echo isset($singlesubject[0]->meta_description)?$singlesubject[0]->meta_description:''?>" placeholder="Enter Meta Description" >
               
         </div>
         <div class="form-group">
            <label for="inputEmail">Seo Keyword</label>
              <input type="text" class="form-control" id="seo_keywords" name="seo_keywords" value="<?php echo isset($singlesubject[0]->seo_keywords)?$singlesubject[0]->seo_keywords:''?>" placeholder="Enter Seo Keyword" >
               
         </div>
         <div class="form-group">
            <label for="inputEmail">Miscellaneous Code</label>
              <input type="text" class="form-control" id="miscellaneous" name="miscellaneous_code" value="<?php echo isset($singlesubject[0]->miscellaneous_code)?$singlesubject[0]->miscellaneous_code:''?>" placeholder="Enter Miscellaneous" >
               
         </div>
         <div class="form-group">
            <label for="inputEmail">Long Description</label>
              <!-- <input type="text" class="form-control" id="long_description" name="long_description" value="<?php echo isset($singlesubject[0]->long_description)?$singlesubject[0]->long_description:''?>" placeholder="Enter Miscellaneous" > -->
              <textarea class="form-control editors" id="long_description" name="long_description">
                  <?php echo isset($singlesubject[0]->long_description)?$singlesubject[0]->long_description:''?>
              </textarea>
               
         </div>
         <div class="form-group">
            <label for="inputEmail">Prizes</label>
              <!-- <input type="text" class="form-control" id="long_description" name="long_description" value="<?php echo isset($singlesubject[0]->long_description)?$singlesubject[0]->long_description:''?>" placeholder="Enter Miscellaneous" > -->
             <!-- <input type="text" class="form-control" id="prizes" name="prizes" value="<?php echo isset($singlesubject[0]->prizes)?$singlesubject[0]->prizes:''?>" placeholder="Enter Prizes" > -->
               <textarea class="form-control editors" id="prizes" name="prizes">
                  <?php echo isset($singlesubject[0]->prizes)?$singlesubject[0]->prizes:''?>
              </textarea>
         </div>
         <div class="form-group">
            <label for="inputEmail">Venues</label>
              <!-- <input type="text" class="form-control" id="long_description" name="long_description" value="<?php echo isset($singlesubject[0]->long_description)?$singlesubject[0]->long_description:''?>" placeholder="Enter Miscellaneous" > -->
             <!-- <input type="text" class="form-control" id="venues" name="venues" value="<?php echo isset($singlesubject[0]->venues)?$singlesubject[0]->venues:''?>" placeholder="Enter Venues" > -->
              <textarea class="form-control editors" id="venues" name="venues">
                  <?php echo isset($singlesubject[0]->venues)?$singlesubject[0]->venues:''?>
              </textarea> 
         </div>
         <div class="form-group">
            <label for="inputEmail">Dates</label>
           
              <!-- <input type="text" class="form-control" id="long_description" name="long_description" value="<?php echo isset($singlesubject[0]->long_description)?$singlesubject[0]->long_description:''?>" placeholder="Enter Miscellaneous" > -->
             <!-- <input type="text" class="form-control" id="dates" name="dates" value="<?php echo isset($singlesubject[0]->dates)?$singlesubject[0]->dates:''?>" placeholder="Enter Venues" > -->
               <textarea class="form-control editors" id="dates" name="dates">
                  <?php echo isset($singlesubject[0]->dates)?$singlesubject[0]->dates:''?>
              </textarea> 
         </div>
         <div class="form-group">
            <label for="inputEmail">Sample Papers</label>
  
              <!-- <input type="text" class="form-control" id="long_description" name="long_description" value="<?php echo isset($singlesubject[0]->long_description)?$singlesubject[0]->long_description:''?>" placeholder="Enter Miscellaneous" > -->
             <!-- <input type="text" class="form-control" id="samplepapers" name="samplepapers" value="<?php echo isset($singlesubject[0]->samplepapers)?$singlesubject[0]->samplepapers:''?>" placeholder="Enter SamplePaper" > -->
               <textarea class="form-control editors" id="samplepapers" name="samplepapers">
                  <?php echo isset($singlesubject[0]->samplepapers)?$singlesubject[0]->samplepapers:''?>
              </textarea> 
         </div>
         <div class="form-group">
            <label for="inputEmail">Logo Image</label>
              <?php if(count($singlesubject)>0){?>
              <img src="<?php echo base_url().'uploadlogo/'.$singlesubject[0]->logo_image; ?>" class="img-responsive" style="max-height: 70px;"><br>
              <input type='file' name='logo' value="Change Logo"> 
              <!-- <input type="file" class="form-control" id="logo_image" name="gg" value="<?php //echo isset($singlesubject[0]->long_description)?$singlesubject[0]->long_description:''?>" placeholder="Enter Miscellaneous" > -->
              <?php }
              else{?>
              <input type='file' name='logo'> 
                <?php } ?>
         </div>
         <!-- <input type="hidden" name="id" value="<?php if(isset($id)) echo $id;?>"> -->
         <input type="submit" class="form-control" value="Add">
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
  height: 500,
  theme: 'modern',
  plugins: 'print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help',
  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | bullist numlist | link unlink | image imageoptions | charmap pastetext | table tablecellprops ',
  image_advtab: true,
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
    });
</script>

