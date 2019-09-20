<!--	DON'T DELETE ANY DIV	-->
<div class="col-md-2 padd" style="background:#fff; color:#000;">
    <ul class=" sid-sub-menu" role="menu">
        <li class=" "><a href="<?php echo base_url(); ?>">Home</a></li>
        <li class=" <?php if (isset($active_menu) && $active_menu == "dashboard") echo "active"; ?>"><a
            href="<?php echo base_url(); ?>admin">Dashboard</a>
        </li>
       <!--  <li class=" <?php if (isset($active_menu) && $active_menu == "categories") echo "active"; ?>">
            <a href="<?php echo base_url(); ?>admin/categories">Course Groups</a>
        </li> -->
        <li class=" <?php if (isset($active_menu) && $active_menu == "subcategories") echo "active"; ?>">
            <a href="<?php echo base_url(); ?>Admin/faqslisting">FAQs</a>
        </li>
        <li class=" <?php if (isset($active_menu) && $active_menu == "subcategories") echo "active"; ?>">
            <a href="<?php echo base_url(); ?>Admin/subcategorieslisting">Subjects</a>
        </li>
        <li class=" <?php if (isset($active_menu) && $active_menu == "question") echo "active"; ?>">
            <a href="<?php echo base_url(); ?>admin/questionslisting">Questions</a>
        </li>
        <!-- <li class=" <?php if (isset($active_menu) && $active_menu == "class") echo "active"; ?>">
            <a href="<?php echo base_url(); ?>admin/classes">Classes</a>
        </li>
        <li class=" <?php if (isset($active_menu) && $active_menu == "cmspages") echo "active"; ?>">
            <a href="<?php echo base_url(); ?>admin/aboutUs">Dynamic Pages</a> -->
        </li>
        <li class=" <?php if (isset($active_menu) && $active_menu == "testimonials") echo "active"; ?>">
            <a href="<?php echo base_url(); ?>admin/testimonials">Testimonials</a>
        </li>
        <li class=" <?php if (isset($active_menu) && $active_menu == "Contact") echo "active"; ?>">
            <a href="<?php echo base_url(); ?>admin/contactUs">Contact Us</a>
        </li>
        <hr>
        <li class=" <?php if (isset($active_menu) && $active_menu == "Contact") echo "active"; ?>">
            <a href="<?php echo base_url(); ?>admin/registereduserslisting">Registered Users</a>
        </li>
        <li class=" <?php if (isset($active_menu) && $active_menu == "Contact") echo "active"; ?>">
            <a href="<?php echo base_url(); ?>admin/paiduserslisting">Paid Users</a>
        </li>
    </ul>
    <div class="clearfix"></div>
</div>
<div class="col-md-10 content">
<!--	DON'T DELETE ANY DIV	-->
