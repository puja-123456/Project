<!-- Bootstrap -->
<link href="<?php echo base_url(); ?>assets/designs/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/designs/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/designs/css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/designs/font.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/designs/css/jquery.dataTables.css" rel="stylesheet">
<link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/designs/images/img/fav.ico" type="image/x-icon">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url(); ?>assets/designs/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url(); ?>assets/designs/js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/designs/js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function () {

        $('#example').dataTable({searching: false, paging: false});
    });




    function get_date_format(date)
    {
        var formattedDate = new Date(date);
        var d = formattedDate.getDate();
        var m = formattedDate.getMonth();
        m += 1;  // JavaScript months are 0-11
        var y = formattedDate.getFullYear();
        var formatted_date = d + "-" + m + "-" + y;

        return formatted_date;

    }



</script>


<div class="col-md-12 padd">
    <div class="bradcome-menu hide_on_phone">
        <ul>
            <li><a href="<?php echo base_url(); ?>user">Home</a></li>
            <li><img  src="<?php echo base_url(); ?>assets/designs/images/arrow.png"></li>
            <li><a href="#"> Worksheets </a></li>
        </ul>
    </div>
</div>


<div class="row">

<?php
echo validation_errors();
if ($this->session->flashdata('message'))
    echo $this->session->flashdata('message');
?>
</div>
<br/>


<div class="row" bgcolor="#FFFFFF" ondragstart="return false" onselectstart="return false">
    <div class="col-md-12" style="overflow-x: auto;">
        <?php if(!$saturday) { ?>
        <p>This link will be live on Saturday</p>
        <?php } ?>
        
         <?php if(!$monday) { ?>
        <p>This link will be live on Monday</p>
        <?php } ?>
        
    </div>
</div>


<script type="text/javascript">
    $().ready(function () {

        var table = $('#example').DataTable();

        table.search($("#cmbSubjects").val()).draw();


        $("#cmbSubjects").one(function () {
            table.search(this.value).draw();
        });


        $("#cmbSubjects").change(function () {
            table.search(this.value).draw();
        });

    });

</script>    

<style>
    .form-group > select {
        border-radius: 2px !important;
        font-weight: 600;
        padding: 2px !important;
        width: 100%;
    }
</style>
<script>
    function set_session() {
        $.ajax({
            type: 'post',
            data: {session: 'set', '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
            url: '<?php echo base_url(); ?>welcome/set_freetrial_session',
            async: false,
            success: function (data) {
                return  true;
            }
        });
    }

    function unset_session() {
        $.ajax({
            type: 'post',
            data: {session: 'unset', '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
            url: '<?php echo base_url(); ?>welcome/unset_freetrial_session',
            async: false,
            success: function (data) {
                return  true;
            }
        });
    }
</script>


<script>
    $(document).ready(function () {

        $('div').bind('copy paste cut', function (e) {
            e.preventDefault();
            return false;
        });
    });
</script>