<!-- Bootstrap -->
<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.js"></script>

<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<body>

<ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/faqslisting">All Question</a></li>
        <li class="breadcrumb-item"><a href="#">Add/ Edit Question</a></li>
</ol>

<div class="row col-md-8">
    <div style="color:#FF0000; font-size:12px; padding-left:10px;">
        <?php 
            echo validation_errors();
            echo $this->session->flashdata('message');
        ?>
    </div>
    <?php
    $attributes = array("name" => "faq_form", "id" => "faq_form");
    echo form_open_multipart('admin/addeditFAQs', $attributes); ?>
    <?php if (count($data) > 0)
        $data = $data[0];
    ?>

    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
           value="<?php echo $this->security->get_csrf_hash(); ?>"/>

    <div class="form-group">
        <label for="inputEmail"> Question</label> <?php
        $val = '';
        if (($this->input->post('ques'))) {
            $val = $this->input->post('ques');
        } elseif (count($data)) {
            $val = $data->ques;
        }

        ?>
        <textarea rows="2" cols="40" id="ques" name="ques" placeholder="Enter Question"><?php if(isset($val)){echo $val;} ?></textarea>
         <!-- <input class="form-control" id="ques" name="ques" placeholder="Enter Question" type="text" value="<?php echo $val; ?>"> -->
    </div>
    <div class="form-group">                    
        <label>Answer</label>   
        <?php
        $val = '';
        if (($this->input->post('answer'))) {
            $val = $this->input->post('answer');
        } elseif (count($data)) {
            $val = $data->answer;
        }
        ?> 
        <textarea class="editors" rows="2" cols="40" name="answer" placeholder="Meta Description"><?php if(isset($val)){echo $val;} ?></textarea>
     </div>

    <input id="id" name="id" type="hidden" value= "<?php if (isset($id)) echo $id; ?>"> <input class= "btn btn-primary wnm-user" type="submit" value="submit">
    </form>
</div>

<script src="<?php echo base_url(); ?>assets/tinymce/tinymce.min.js"></script>
<script>

  tinymce.init({
  selector: 'textarea.editors',  // change this value according to your HTML',
  height: 100,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools'
  ],
  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });
 
    
</script>



</body>

