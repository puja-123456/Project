<!-- Bootstrap -->

<link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/font.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/editor.css" type="text/css" rel="stylesheet"/>
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/editor.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<div class="col-md-12 padd">
   <div class="bradcome-menu">
      <ul class='breadcrumb'>
        <?php  //echo "<pre>";print_r($singlesubject[0]->name);die; ?>
         <li><a href="<?php echo base_url();?>admin">Home</a></li>
         <li><img  src="<?php echo base_url();?>assets/images/arrow.png"></li>
         <li><a href="<?php echo base_url();?>admin/aboutlisting"> CMS List</a></li>
         <li><img  src="<?php echo base_url();?>assets/images/arrow.png"></li>
         <li> <?php if(count($singleabout)>0) echo "Update CMS Page"; else echo "Add CMS Page";?></li>
      </ul>
   </div>
</div>
<div class="row">
   <div class="col-md-8">
      <div style="color:#FF0000; font-size:12px; padding-left:10px;"><?php 
         echo $this->session->flashdata('message');
         ?>
      </div>
      <form method="POST" action="<?php echo base_url();?>admin/addeditAbout/" id="subjects_form" enctype='multipart/form-data'>

    <!-- <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" /> -->
		<input type="hidden" name="id" value="<?php echo isset($singleabout[0]->id)?$singleabout[0]->id:''; ?>" />
			
         <div class="form-group">
            <label for="inputEmail">Page Name</label>

            <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($singleabout[0]->name)?$singleabout[0]->name:''?>" placeholder="Enter Page Name" >
         </div>
  
         <div class="form-group">
            <label for="inputEmail">Long Description</label>
            <!-- <input type="text" class="form-control" id="content" name="content" value="<?php echo isset($singleabout[0]->content)?$singleabout[0]->content:''?>" placeholder="Enter City Name" > -->
            <textarea class="form-control editors" id="longdescription" name="longdescription" placeholder="Enter Long Description">
              <?php echo isset($singleabout[0]->longdescription)?$singleabout[0]->longdescription:''?>
            </textarea>
         </div>

          <div class="form-group">
            <label for="inputEmail">Slug</label>

            <input type="text" class="form-control" id="slug" name="slug" value="<?php echo isset($singleabout[0]->slug)?$singleabout[0]->slug:''?>" placeholder="Enter Slug Name" >
         </div> 
         <div class="form-group">
            <label for="inputEmail">Meta Title</label>
            <input type="text" class="form-control" id="meta_title" name="meta_title" value="<?php echo isset($singleabout[0]->meta_title)?$singleabout[0]->meta_title:''?>" placeholder="Enter Meta Title" >
         </div>
         <div class="form-group">
            <label for="inputEmail">Meta Description</label>
            <input type="text" class="form-control" id="meta_description" name="meta_description" value="<?php echo isset($singleabout[0]->meta_description)?$singleabout[0]->meta_description:''?>" placeholder="Enter Meta Description" >
         </div>   
        
         <input type="submit" class="form-control" value="Add">
       </form>
   </div>
</div>

<!-- Validations -->
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript"> 
   (function($,W,D)
   {
      var JQUERY4U = {};
   
      JQUERY4U.UTIL =
      {
          setupFormValidation: function()
          {		
   		//form validation rules
              $("#subjects_form").validate({
   			rules: {
   				name: {
   					required: true,
   					rangelength: [2, 30]
   				}
   				
                  },
   			
   			messages: {
   				name: {
                          required: "Please enter subject name."
                      }
   			},
                  
                  submitHandler: function(form) {
                      form.submit();
                  }
              });
          }
      }
   
      //when the dom has loaded setup form validation rules
      $(D).ready(function($) {
          JQUERY4U.UTIL.setupFormValidation();
      });
   
   })(jQuery, window, document);
   
</script>

<script src="<?php echo base_url(); ?>assets/tinymce/tinymce.min.js"></script>
<script>tinymce.init({
    selector: 'textarea.editors',  // change this value according to your HTML
    menubar: true,
    skin: "lightgray",
     plugins: "code",
    theme: 'modern',
    height:300,
      menu: {
        file: {title: 'File', items: 'newdocument'},
        edit: {title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall'},
        tools: {title: 'Tools', items: 'spellchecker code'},
        insert: {title: 'Insert', items: 'link media | template hr'},
        view: {title: 'View', items: 'visualaid '},
        format: {title: 'Format', items: 'bold italic underline strikethrough superscript subscript | formats | removeformat'},
        table: {title: 'Table', items: 'inserttable tableprops deletetable | cell row column'},
      }
    });
</script>