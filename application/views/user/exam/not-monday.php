<div class="col-md-12 padd">
    <div class="bradcome-menu hide_on_phone">
       
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
        <p>This link will be active from Monday to Friday only</p>
    </div>
</div>

