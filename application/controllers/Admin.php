<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');

    }

    public function index()
    {

        if($this->ion_auth->logged_in()){
            redirect('admin/dashboard');
        }
        else{
            redirect('auth/login');
        }
    }
    
    //moderator dashboard

    //admin dashboard

    /***Admin Dashboard***/
    function dashboard()
    {
        $this->validate_admin();

        $this->data['title'] = 'Admin Dashboard';
        $this->data['active_menu'] = 'dashboard';
        $this->data['content'] = 'admin/index';
        $this->_render_page('templates/admintemplate', $this->data);

    }
   function subcategories($id='')
    {
      
        $arr = array('catid' =>$id );
        $this->data['singlesubject']=$this->base_model->fetch_records_from('categories',$arr);
      


        $this->data['title'] = 'Category';
        $this->data['active_menu'] = 'users';
        $this->data['content'] = 'admin/subjects';
        $this->_render_page('templates/admintemplate',$this->data);

    }
    function aboutPages($id='')
    {
      
        $arr = array('id' =>$id );
        $this->data['aboutPage']=$this->base_model->fetch_records_from('cmspages',$arr);
      


        $this->data['title'] = 'About';
        $this->data['active_menu'] = 'users';
        $this->data['content'] = 'admin/about';
        $this->_render_page('templates/admintemplate',$this->data);

    }
    function testimonials($id='')
    {
      
        $arr = array('tid' =>$id );
        $this->data['singletestimonials']=$this->base_model->fetch_records_from('testimonials',$arr);
      


        $this->data['title'] = 'Testimonials';
        $this->data['active_menu'] = 'users';
        $this->data['content'] = 'admin/testimonialsform';
        $this->_render_page('templates/admintemplate',$this->data);

    }

    function testimonialslisting()
    {
        $this->data['alltestimonials']=$this->base_model->run_query("SELECT * FROM testimonials ORDER BY tid desc ");
        $this->data['title'] = 'About Listing';
        $this->data['active_menu'] = 'Category';
        $this->data['content'] = 'admin/testimonialslisting';
        $this->_render_page('templates/admintemplate',$this->data);
    }
    function aboutlisting()
    {
        $this->data['allabout']=$this->base_model->run_query("SELECT * FROM cmspages ORDER BY id desc ");
        $this->data['title'] = 'About Listing';
        $this->data['active_menu'] = 'Category';
        $this->data['content'] = 'admin/aboutlisting';
        $this->_render_page('templates/admintemplate',$this->data);
    } 
    function aboutform($id='')
    {
      
        $arr = array('id' =>$id );
        $this->data['singleabout']=$this->base_model->fetch_records_from('cmspages',$arr);
        $this->data['title'] = 'Testimonials';
        $this->data['active_menu'] = 'users';
        $this->data['content'] = 'admin/aboutform';
        $this->_render_page('templates/admintemplate',$this->data);

    }
    function addeditAbout()
    {
       $id=$this->input->post('id');

        //$this->validate_admin();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Page Name', 'trim|required');
        $this->form_validation->set_rules('longdescription', 'Long Description', 'trim|required');
        $this->form_validation->set_rules('slug', 'Slug', 'trim|required');
        $this->form_validation->set_rules('meta_title', 'Meta Title', 'trim|required');
        $this->form_validation->set_rules('meta_description', 'Meta Description', 'trim|required');
    
        if ($this->input->post()) {
            
        $logo='';
            
            if ($this->form_validation->run() == true) {


                $inputdata['name'] = $this->input->post('name');
                $inputdata['longdescription'] = $this->input->post('longdescription');
                $inputdata['slug'] = $this->input->post('slug');
                $inputdata['meta_title'] = $this->input->post('meta_title');
                $inputdata['meta_description'] = $this->input->post('meta_description');

                if ($id == '') {
                    $this->base_model->insert_operation(
                        
                        $this->db->dbprefix('cmspages'),$inputdata
                    );

                    $msg = "Record Added Successfully";
                } else {
                    $where['id'] = $this->input->post('id');
                    $this->base_model->update_operation(
                        $inputdata,
                        $this->db->dbprefix('cmspages'),
                        $where
                    );
                    $msg = "Record Updated Successfully";
                }
                
                $this->prepare_flashmessage($msg, 0);
                redirect('admin/aboutlisting', 'refresh');
            } else {
                
                $this->prepare_flashmessage(validation_errors(), 1);
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
        if ($this->uri->segment(3) != '' && is_numeric($this->uri->segment(3))) {
            // $this->data['data'] = $this->base_model->run_query(
            //     "select * from " . $this->db->dbprefix('subjects')
            //     . " where subjectid=" . $this->uri->segment(3)
            // ); 
            $this->data['data'] = $this->base_model->run_query(
                "select * from " . $this->db->dbprefix('cmspages')
                . " where id=" . $this->uri->segment(3)
            );
            $this->data['id'] = $id;
            $this->data['title'] = 'Update Subject';
        } else {
            $this->data['data'] = array();
            $this->data['id'] = '';
            $this->data['title'] = 'Add Subject';
        }
        $Options['Active'] = 'Active';
        $Options['Inactive'] = 'Inactive';
        $this->data['element'] = $Options;
        $this->data['active_menu'] = 'subjects';
        //$this->data['content'] = 'admin/addeditTestimonials';
        $this->_render_page('templates/admintemplate', $this->data);
    }
    function subcategorieslisting()
    {
        $this->data['subject']=$this->base_model->run_query("SELECT * FROM categories ORDER BY catid desc ");
        $this->data['title'] = 'Category Listing';
        $this->data['active_menu'] = 'Category';
        $this->data['content'] = 'admin/subjectslisting';
        $this->_render_page('templates/admintemplate',$this->data);
    } 

     function questionslisting()
    {
        $this->data['questions']=$this->base_model->run_query("SELECT * FROM open_questions ORDER BY questionid desc ");
        $this->data['title'] = 'Question Listing';
        $this->data['active_menu'] = 'Question';
        $this->data['content'] = 'admin/questionslisting';
        $this->_render_page('templates/admintemplate',$this->data);
    } 

    function editQuestion($id='')
    {
      
       

       if ($this->input->post('submit') == "Update") {

                $inputdata['question'] = $this->input->post('question');
                $inputdata['question_type'] = $this->input->post('question_type');
                $inputdata['questionImage'] = $this->input->post('questionImage');
                $inputdata['answer1'] = $this->input->post('answer1');
                $inputdata['answer1Image'] = $this->input->post('answer1Image');
                $inputdata['answer2'] = $this->input->post('answer2');
                $inputdata['answer2Image'] = $this->input->post('answer2Image');
                $inputdata['answer3'] = $this->input->post('answer3');
                $inputdata['answer3Image'] = $this->input->post('answer3Image');
                $inputdata['answer4'] = $this->input->post('answer4');
                $inputdata['answer4Image'] = $this->input->post('answer4Image');
                $inputdata['answer5'] = $this->input->post('answer5');                
                $inputdata['correctanswer'] = $this->input->post('correctanswer');
                $inputdata['hint'] = $this->input->post('hint');
                $inputdata['hintImage'] = $this->input->post('hintImage');
               
                $where['questionid'] = $this->input->post('questionid');
                $this->base_model->update_operation($inputdata,$this->db->dbprefix('open_questions'),$where);
                
                $msg = "Question Updated Successfully";
               
                
                $this->prepare_flashmessage($msg, 0);
                redirect($this->uri->uri_string());
                //redirect('admin/editQuestion', 'refresh');
        }
        else
        {

        $arr = array('questionid' =>$id );
        $this->data['singlequestion']=$this->base_model->fetch_records_from('open_questions',$arr);     


        

        $this->data['title'] = 'Edit Question';
        $this->data['active_menu'] = 'Question';
        $this->data['content'] = 'admin/edit_question';
        $this->_render_page('templates/admintemplate',$this->data);

    }

    }

    //CRUD for products for admin

    //view users, create a moderator for the product updation

    //View All Users
    function viewAllUsers()
    {
        $this->validate_admin();

        $allUsers = $this->base_model->run_query(
            "SELECT u.* FROM users u, users_groups g WHERE u.id=g.user_id
        and g.group_id=2 and u.id!=1 ORDER BY u.id desc "
        );
        $this->data['allUsers'] = $allUsers;
        $this->data['title'] = 'General Users';
        $this->data['active_menu'] = 'users';
        $this->data['content'] = 'admin/view_all_users';
        $this->_render_page('templates/admintemplate', $this->data);
    }


    //Delete User
    function deleteUser()
    {
        $this->validate_admin();

        if ($this->uri->segment(3) != '' && is_numeric($this->uri->segment(3))) {
            $where['id'] = $this->uri->segment(3);
            $this->base_model->delete_record(
                $this->db->dbprefix('users'),
                $where
            );
            $this->prepare_flashmessage("Record Deleted Successfully", 0);
            if ($this->uri->segment(4) != '' && $this->uri->segment(4) == 'admin')
                redirect('admin/admins');
            elseif ($this->uri->segment(4) != '' && $this->uri->segment(4) == 'moderator')
                redirect('admin/moderators');
            else
                redirect('admin/viewAllUsers');
        }

    }
    //Delete Testimonials
    function deleteTestimonials()
    {
        $this->validate_admin();

        if ($this->uri->segment(3) != '' && is_numeric($this->uri->segment(3))) {
            $where['tid'] = $this->uri->segment(3);
            $r=$this->base_model->delete_record(
                $this->db->dbprefix('testimonials'),
                $where
            );
            if($r){
            $this->prepare_flashmessage("Record Deleted Successfully", 0);
                redirect('admin/testimonialslisting');
                }

        }

    }
        //Delete SubCategory
    function deleteSubcategory()
    {
        $this->validate_admin();

        if ($this->uri->segment(3) != '' && is_numeric($this->uri->segment(3))) {
            $where['catid'] = $this->uri->segment(3);
            $r=$this->base_model->delete_record(
                $this->db->dbprefix('categories'),
                $where
            );
            if($r){
            $this->prepare_flashmessage("Record Deleted Successfully", 0);
                redirect('admin/subcategorieslisting');
                }

        }

    }


    //View All Admins
    function moderators()
    {
        $this->validate_admin();

        $moderators = $this->base_model->run_query("SELECT u.* FROM users u, users_groups g WHERE u.id=g.user_id and g.group_id=4 ORDER BY u.id desc ");
        $this->data['users'] = $moderators;

        $this->data['active_menu'] = 'users';
        $this->data['title'] = 'Moderators - Super Admin Dashboard';
        $this->data['heading'] = 'Moderators';

        $this->data['content'] = 'admin/moderators';
        $this->data['user_type'] = 'moderator';

        $this->_render_page('templates/admintemplate', $this->data);
    }


    public function _image_check($image = '', $param2 = '')
    {

        $name = explode('.', $param2);

        if (count($name) > 2 || count($name) <= 0) {
            $this->form_validation->set_message('_image_check', 'Only jpg / jpeg / png images are accepted.');
            return FALSE;
        }

        $ext = $name[1];

        $allowed_types = array('jpg', 'jpeg', 'png');

        if (!in_array($ext, $allowed_types)) {
            $this->form_validation->set_message('_image_check', 'Only jpg / jpeg / png images are accepted.');
            return FALSE;
        } else {
            return TRUE;
        }
    }


    //Create User
    function create_user($user_type = '')
    {
        $this->validate_admin();

        $this->data['title'] = "Create User";

        //$this->load->config('ion_auth');
        $this->config->load('ion_auth', TRUE);
        $tables = $this->config->item('tables', 'ion_auth');

        if ($this->input->post('submit') != '') {
            //validate form input
            $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required|xss_clean');
            $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required|xss_clean');
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
            $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'required|xss_clean|integer');

            $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
            $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

            if (!empty($_FILES['image']['name'])) {

                $this->form_validation->set_rules('image', "Image", 'callback__image_check[' . $_FILES['image']['name'] . ']');

            }

            if ($this->form_validation->run() == true) {
                $username = $this->input->post('first_name') . ' ' . $this->input->post('last_name');
                $email = strtolower($this->input->post('email'));
                $password = $this->input->post('password');
                $image = $_FILES['image']['name'];

                $additional_data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'phone' => $this->input->post('phone'),
                    'date_of_registration' => date('Y-m-d')
                );

                if (!empty($image))
                    $additional_data['image'] = $image;

                $id = $this->ion_auth->register($username, $password, $email, $additional_data);

                if ($this->input->post('user_type') == "admin") {
                    $empdata['group_id'] = "3";
                    $redirect_path = "admin/admins";
                } else {
                    $empdata['group_id'] = "4";
                    $redirect_path = "admin/moderators";
                }

                $this->db->where('user_id', $id);
                if ($this->db->update('users_groups', $empdata)) {

                    $this->prepare_flashmessage($this->ion_auth->messages(), 2);
                    redirect($redirect_path, 'refresh');

                }
            } else {
                //display the create user form
                //set the flash data error message if there is one
                $this->prepare_flashmessage((validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message'))), 1);
                redirect("admin/create_user", 'refresh');

            }
        }

        $this->data['first_name'] = array(
            'name' => 'first_name',
            'class' => 'form-control',
            'placeholder' => 'First Name',
            'id' => 'first_name',
            'type' => 'text',
            'value' => $this->form_validation->set_value('first_name'),
        );
        $this->data['last_name'] = array(
            'name' => 'last_name',
            'class' => 'form-control',
            'placeholder' => 'Last Name',
            'id' => 'last_name',
            'type' => 'text',
            'value' => $this->form_validation->set_value('last_name'),
        );
        $this->data['email'] = array(
            'name' => 'email',
            'class' => 'form-control',
            'placeholder' => 'User Email',
            'id' => 'email',
            'type' => 'text',
            'value' => $this->form_validation->set_value('email'),
        );
        $this->data['company'] = array(
            'name' => 'company',
            'class' => 'form-control',
            'placeholder' => 'Company',
            'id' => 'company',
            'type' => 'text',
            'value' => $this->form_validation->set_value('company'),
        );
        $this->data['phone'] = array(
            'name' => 'phone',
            'class' => 'form-control',
            'placeholder' => 'Phone',
            'id' => 'phone',
            'type' => 'text',
            'value' => $this->form_validation->set_value('phone'),
        );
        $this->data['password'] = array(
            'name' => 'password',
            'class' => 'form-control',
            'placeholder' => 'Password',
            'id' => 'password',
            'type' => 'password',
            'value' => $this->form_validation->set_value('password'),
        );
        $this->data['password_confirm'] = array(
            'name' => 'password_confirm',
            'class' => 'form-control',
            'placeholder' => 'Confirm Password',
            'id' => 'password_confirm',
            'type' => 'password',
            'value' => $this->form_validation->set_value('password_confirm'),
        );

        $this->data['user_type'] = $user_type;

        $this->data['content'] = 'admin/create_user';
        $this->_render_page('templates/admintemplate', $this->data);
    }

    //edit a user
    function edit_user($id = '', $user_type = '')
    {
        $this->validate_admin();

        $this->data['title'] = "Edit User";

        if ($id == "") {

            $id = $this->input->post('id');

        }

        if (!is_numeric($id)) {
            return;
        }

        $user = $this->ion_auth->user($id)->row();
        $groups = $this->ion_auth->groups()->result_array();
        $currentGroups = $this->ion_auth->get_users_groups($id)->result();

        //validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required|xss_clean');

        if (!empty($_FILES['image']['name'])) {

            $this->form_validation->set_rules('image', "Image", 'callback__image_check[' . $_FILES['image']['name'] . ']');

        }

        if (isset($_POST) && !empty($_POST)) {
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'company' => $this->input->post('company'),
                'phone' => $this->input->post('phone'),
                'username' => $this->input->post('first_name') . ' ' . $this->input->post('last_name'),
            );

            $image = $_FILES['image']['name'];

            //update the password if it was posted
            if ($this->input->post('password')) {
                $this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
                $this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');

                $data['password'] = $this->input->post('password');
            }

            if ($this->form_validation->run() === TRUE) {

                if (!empty($image)) {

                    if (file_exists('assets/uploads/images/' . $user->image)) {
                        unlink('assets/uploads/images/' . $user->image);
                    }
                    if (file_exists('assets/uploads/images_200_200/' . $user->image)) {
                        unlink('assets/uploads/images_200_200/' . $user->image);
                    }

                    if (file_exists('assets/uploads/images_50_50/' . $user->image)) {
                        unlink('assets/uploads/images_50_50/' . $user->image);
                    }

                    $ext = explode('.', $image);

                    if (count($ext) > 2 || count($ext) <= 0) {
                        $this->form_validation->set_message('_image_check', 'Only jpg / jpeg / png images are accepted.');
                        return FALSE;
                    }

                    $img = $ext[0] . "_" . $user->id . "." . $ext[1];

                    $data['image'] = $img;

                }

                $this->ion_auth->update($user->id, $data);

                if ($this->input->post('user_type') == "admin") {
                    $redirect_path = "admin/admins";
                } else {
                    $redirect_path = "admin/moderators";
                }

                $this->prepare_flashmessage('User Updated Successfully.', 0);
                redirect($redirect_path, 'refresh');
            }
        }

        //display the edit user form
        $this->data['csrf'] = $this->_get_csrf_nonce();

        //set the flash data error message if there is one
        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

        //pass the user to the view
        $this->data['user'] = $user;
        $this->data['groups'] = $groups;
        $this->data['currentGroups'] = $currentGroups;

        $this->data['first_name'] = array(
            'name' => 'first_name',
            'class' => 'form-control',
            'placeholder' => 'First Name',
            'id' => 'first_name',
            'type' => 'text',
            'value' => $this->form_validation->set_value('first_name', $user->first_name),
        );
        $this->data['last_name'] = array(
            'name' => 'last_name',
            'class' => 'form-control',
            'placeholder' => 'Last Name',
            'id' => 'last_name',
            'type' => 'text',
            'value' => $this->form_validation->set_value('last_name', $user->last_name),
        );
        $this->data['company'] = array(
            'name' => 'company',
            'class' => 'form-control',
            'placeholder' => 'Company',
            'id' => 'company',
            'type' => 'text',
            'value' => $this->form_validation->set_value('company', $user->company),
        );
        $this->data['phone'] = array(
            'name' => 'phone',
            'class' => 'form-control',
            'placeholder' => 'Phone',
            'id' => 'phone',
            'type' => 'text',
            'value' => $this->form_validation->set_value('phone', $user->phone),
        );
        $this->data['email'] = array(
            'name' => 'email',
            'class' => 'form-control',
            'placeholder' => 'User Email',
            'id' => 'email',
            'type' => 'text',
            'readonly' => 'readonly',
            'value' => $this->form_validation->set_value('email', $user->email),
        );
        $this->data['password'] = array(
            'name' => 'password',
            'class' => 'form-control',
            'placeholder' => 'Password',
            'id' => 'password',
            'type' => 'password'
        );
        $this->data['password_confirm'] = array(
            'name' => 'password_confirm',
            'class' => 'form-control',
            'placeholder' => 'Confirm Password',
            'id' => 'password_confirm',
            'type' => 'password'
        );

        $this->data['user_type'] = $user_type;
        $this->data['content'] = 'admin/edit_user';
        $this->_render_page('templates/admintemplate', $this->data);
        //$this->_render_page('auth/edit_user', $this->data);
    }

//Excel download with data
    public function excelSchool()
    {
// $array = Array (
//         0 => Array (
//                 0 => "How was the Food?",
//                 1 => 3,
//                 2 => 4 
//         ),
//         1 => Array (
//                 0 => "How was the first party of the semester?",
//                 1 => 2,
//                 2 => 4,
//                 3 => 0 
//         ) 
// );
$this->data['subject']=$this->db->query("SELECT * FROM categories ORDER BY catid desc ")->result_array();
header("Content-Disposition: attachment; filename=\"subject.xls\"");
header("Content-Type: application/vnd.ms-excel;");
header("Pragma: no-cache");
header("Expires: 0");
$out = fopen("php://output", 'w');
foreach ($this->data['subject'] as $data)
{
    fputcsv($out, $data,"\t");
}
fclose($out);

//$this->excel->setActiveSheetIndex(0);
// $this->excel->getActiveSheet()->setTitle('test worksheet');
// $this->excel->getActiveSheet()->setCellValue('A1', 'This is just some text value');
// $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
// $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
// $this->excel->getActiveSheet()->mergeCells('A1:D1');
//$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 
// $filename='subjects.xls';
// header('Content-Type: application/vnd.ms-excel'); 
// header('Content-Disposition: attachment;filename="'.$filename.'"'); 
// header('Cache-Control: max-age=0'); 

// $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
// $objWriter->save('php://output');
//redirect($_SERVER['HTTP_REFERER']);

    }
     public function excelContactus()
    {
$this->data['contactus']=$this->db->query("SELECT * FROM contact_us ORDER BY id desc ")->result_array();
header("Content-Disposition: attachment; filename=\"contactUs.xls\"");
header("Content-Type: application/vnd.ms-excel;");
header("Pragma: no-cache");
header("Expires: 0");
$out = fopen("php://output", 'w');
foreach ($this->data['contactus'] as $data)
{
    fputcsv($out, $data,"\t");
}
fclose($out);

    }
    public function contactUs()
    {
         $this->data['allcontactus']=$this->base_model->run_query("SELECT * FROM contact_us ORDER BY id desc ");
        $this->data['title'] = 'Contact Listing';
        $this->data['active_menu'] = 'Contact';
        $this->data['content'] = 'admin/contactlisting';
        $this->_render_page('templates/admintemplate',$this->data);
    }
    //Admin Profile
    function profile()
    {
        $this->validate_admin();

        $userid = $this->session->userdata('user_id');
        if (isset($userid) && $userid != '' && is_numeric($userid)) {
            $table = $this->db->dbprefix('users');
            $condition['id'] = $userid;
            $records = $this->base_model->fetch_records_from(
                $table,
                $condition,
                $select = 'id, username, first_name, last_name, email, phone, 
            image, active',
                $order_by = ''
            );
            $this->data['details'] = $records;
            $this->data['content'] = 'admin/profile';
            $this->data['title'] = 'Admin Profile';
            $this->_render_page('templates/admintemplate', $this->data);
        } else {
            $this->prepare_flashmessage('Session Expired!', 2);
            redirect('login', 'refresh');
        }
    }

    //CRUD Operations for Categories
    function categories()
    {
        $this->validate_admin();

        if ($this->uri->segment(3) != '' && is_numeric($this->uri->segment(3))) {

            $this->base_model->delete_category_assoc($this->uri->segment(3));

            $where['catid'] = $this->uri->segment(3);
            $this->db->select('image');
            $rec = $this->db->get_where('categories', array("catid" => $this->uri->segment(3)))->result()[0];
            unlink('./assets/uploads/category_images/' . $rec->image);
            $this->base_model->delete_record(
                $this->db->dbprefix('categories'),
                $where
            );
            $this->prepare_flashmessage("Record Deleted Successfully", 0);
            redirect('admin/categories', 'refresh');
        }
        $this->data['title'] = 'Categories';
        $this->data['active_menu'] = 'categories';
        $this->data['records'] = $this->base_model->fetch_records_from(
            $this->db->dbprefix('categories')
        );
        $this->data['content'] = 'admin/categories/categories';
        $this->_render_page('templates/admintemplate', $this->data);
    }

    function addeditCategories()
    {
        $catid=$this->input->post('catid');
        $this->validate_admin();

        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'name','Category Name','trim|required',
            'order_no','Order No','trim|required',
            'meta_title','Meta Title','trim|required',
            'meta_description','Meta Description','trim|required',
            'seo_keywords','Seo Keywords','trim|required',
            'miscellaneous_code','Miscellaneous Code','trim|required',
            'slug','Slug','trim|required',
            'long_description','Long Description','trim|required'
        );

        if ($this->form_validation->run() == true) {
            $inputdata['name'] = $this->input->post('name');
            $inputdata['status'] = $this->input->post('status');
            $inputdata['order_no'] = $this->input->post('order_no');
            $inputdata['meta_title'] = $this->input->post('meta_title');
            $inputdata['meta_description'] = $this->input->post('meta_description');
            $inputdata['seo_keywords'] = $this->input->post('seo_keywords');
            $inputdata['miscellaneous_code'] = $this->input->post('miscellaneous_code');
            $inputdata['slug'] = $this->input->post('slug');
            $inputdata['long_description'] = $this->input->post('long_description');
            
            /* if ($_FILES['userfile']['name'] != "") {
                $f_type = explode(".", $_FILES['userfile']['name']);
                $last_in = (count($f_type) - 1);
                if (($f_type[$last_in] != "gif") && ($f_type[$last_in] != "jpg") && ($f_type[$last_in] != "png")) {
                    $this->prepare_flashmessage("invalid_file", 1);
                    redirect('admin/categories');
                }
            } */


            if ($this->input->post('catid') == '') {
                $ref = $this->base_model->insert_operation_id(
                    $inputdata,
                    $this->db->dbprefix('categories')
                );
                if ($ref > 0) {
                    $config['upload_path'] = './assets/uploads/category_images';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['overwrite'] = TRUE;
                    $config['file_name'] = "category_" . $ref;

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload()) {
                        $inputdata1['image'] = base_url() . "assets/uploads/category_images/category_" . $ref . "." . $f_type[$last_in];

                        $where['catid'] = $ref;
                        $this->base_model->update_operation($inputdata1, $this->db->dbprefix('categories'), $where);
                    }

                }
                $msg = "Record Added Successfully";
            } else {
                $where['catid'] = $this->input->post('catid');

                if ($this->base_model->update_operation($inputdata,
                    $this->db->dbprefix('categories'), $where)
                ) {
                    $config['upload_path'] = './assets/uploads/category_images';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['overwrite'] = TRUE;
                    $config['file_name'] = "category_" . $this->input->post('catid');

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload()) {
                        $inputdata1['image'] = base_url() . "assets/uploads/category_images/category_" . $this->input->post('catid') . "." . $f_type[$last_in];

                        $where['catid'] = $this->input->post('catid');
                        $this->base_model->update_operation($inputdata1, $this->db->dbprefix('categories'), $where);
                    }

                }
                $msg = "Record Updated Successfully";
            }
            $this->prepare_flashmessage($msg, 0);
            redirect('admin/categories', 'refresh');
        }
        if ($this->uri->segment(3) != '' && is_numeric($this->uri->segment(3))) {
            $intCourseId = $this->uri->segment(3);
            $sql = "select * from " . $this->db->dbprefix('categories')
                . " where catid=" . $intCourseId;
            $this->data['data'] = $this->base_model->run_query($sql);
            $this->data['id'] = $this->uri->segment(3);
            $this->data['title'] = 'Update Category';
            
            
            $result = $this->base_model->run_query($sql);

            if(count($result) <> 1) {
                throw new Exception('Course detail not found.');
            }
            
            $this->data['long_description'] = $result[0]->long_description;
        } else {
            $this->data['data'] = array();
            $this->data['id'] = '';
            $this->data['title'] = 'Add Category';
        }
        $Options['Active'] = 'Active';
        $Options['Inactive'] = 'Inactive';
        $this->data['element'] = $Options;
        $this->data['total_cat'] = count($this->db->get('categories')->result_array());
        $this->data['active_menu'] = 'categories';
        $this->data['content'] = 'admin/categories/addeditCategories';
        $this->_render_page('templates/admintemplate', $this->data);
    }

    //CRUD Operations for Subjects
    function subjects()
    {
        //die('hchcbxhcxch');
        $this->validate_admin();

        if ($this->uri->segment(3) != '' && is_numeric($this->uri->segment(3))) {
            $where['subjectid'] = $this->uri->segment(3);
            $this->base_model->delete_record($this->db->dbprefix('categories'), $where);
            $this->prepare_flashmessage("Record Deleted Successfully", 0);
            redirect('admin/subjects');
        }

        $this->data['title'] = 'Subjects';
        $this->data['active_menu'] = 'subjects';
        $this->data['records'] = $this->base_model->fetch_records_from(
            $this->db->dbprefix('categories')
        );
        $this->data['content'] = 'admin/subjects';
        $this->_render_page('templates/admintemplate', $this->data);
    }

    function addeditSubjects()
    {
       
       
        $catid=$this->input->post('catid');

        $this->validate_admin();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Subject Name', 'trim');
        if(empty($catid))
            $this->form_validation->set_rules('slug', 'Slug Name', 'trim');
        $this->form_validation->set_rules('order_no', 'Order No', 'trim');
        $this->form_validation->set_rules('meta_title', 'Meta Title', 'trim');
        $this->form_validation->set_rules('meta_description', 'Meta Description', 'trim');
        $this->form_validation->set_rules('seo_keywords', 'Seo Keywords', 'trim');
        $this->form_validation->set_rules('miscellaneous_code', 'Miscellaneous Code', 'trim');
        $this->form_validation->set_rules('long_description', 'Long Description', 'trim');
        $this->form_validation->set_rules('prizes', 'Prizes', 'trim');
        $this->form_validation->set_rules('venues', 'Venues', 'trim');
        $this->form_validation->set_rules('dates', 'Dates', 'trim');
        // $this->form_validation->set_rules('samplepapers', 'Sample Papers', 'trim');
        $this->form_validation->set_rules('status', 'Status', 'trim');
        // $this->form_validation->set_rules('logo_image', 'Logo Image', 'trim|required');
        if ($this->input->post()) {
            $logo='';
            if($_FILES['logo'])
                {
                    $config['upload_path'] =  dirname(BASEPATH).'/uploadlogo/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    //$config['max_size'] = '100';
                   // $config['max_width'] = '1024';
                   // $config['max_height'] = '768';
                //echo "<pre>";print_r($config);die;
                    $this->load->library('upload', $config);
                    if($this->upload->do_upload('logo'))
                    {
                    $data = array('upload_data' => $this->upload->data());
                    $logo=$data['upload_data']['file_name'];
                    }
                    else
                    {
                    $error = array('error' => $this->upload->display_errors());
                    //echo $error;
                    }
                }
            if ($this->form_validation->run() == true) {


                $inputdata['name'] = $this->input->post('name');
                $inputdata['slug'] = $this->input->post('slug');
                $inputdata['order_no'] = $this->input->post('order_no');
                $inputdata['meta_title'] = $this->input->post('meta_title');
                $inputdata['meta_description'] = $this->input->post('meta_description');
                $inputdata['seo_keywords'] = $this->input->post('seo_keywords');
                $inputdata['miscellaneous_code'] = $this->input->post('miscellaneous_code');
                $inputdata['long_description'] = $this->input->post('long_description');
                $inputdata['venues'] = $this->input->post('venues');
                $inputdata['prizes'] = $this->input->post('prizes');
                $inputdata['dates'] = $this->input->post('dates');
                // $inputdata['samplepapers'] = $this->input->post('samplepapers');
                $inputdata['status'] = $this->input->post('status');
                $inputdata['logo_image'] = $logo;

                if ($catid == '') {
                    $this->base_model->insert_operation(
                        
                        $this->db->dbprefix('categories'),$inputdata
                    );

                    $msg = "Record Added Successfully";
                } else {
                    $where['catid'] = $this->input->post('catid');
                    $this->base_model->update_operation(
                        $inputdata,
                        $this->db->dbprefix('categories'),
                        $where
                    );
                    $msg = "Record Updated Successfully";
                }
                
                $this->prepare_flashmessage($msg, 0);
                redirect('admin/subcategorieslisting', 'refresh');
            } else {
                
                $this->prepare_flashmessage(validation_errors(), 1);

                redirect($_SERVER['HTTP_REFERER']);
            }
        }
        if ($this->uri->segment(3) != '' && is_numeric($this->uri->segment(3))) {
            // $this->data['data'] = $this->base_model->run_query(
            //     "select * from " . $this->db->dbprefix('subjects')
            //     . " where subjectid=" . $this->uri->segment(3)
            // ); 
            $this->data['data'] = $this->base_model->run_query(
                "select * from " . $this->db->dbprefix('categories')
                . " where catid=" . $this->uri->segment(3)
            );
            $this->data['id'] = $catid;
            $this->data['title'] = 'Update Subject';
        } else {
            $this->data['data'] = array();
            $this->data['id'] = '';
            $this->data['title'] = 'Add Subject';
        }
        $Options['Active'] = 'Active';
        $Options['Inactive'] = 'Inactive';
        $this->data['element'] = $Options;
        $this->data['active_menu'] = 'subjects';
        $this->data['content'] = 'admin/addeditSubjects';
        $this->_render_page('templates/admintemplate', $this->data);
    }
    function addeditTestimonials()
    {
       $tid=$this->input->post('tid');

        //$this->validate_admin();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('author', 'Author Name', 'trim|required');
        $this->form_validation->set_rules('country', 'Country Name', 'trim|required');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
    
        if ($this->input->post()) {
            
$logo='';
            if($_FILES['authorimage'])
                {
                    $config['upload_path'] =  dirname(BASEPATH).'/authorimage/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    //$config['max_size'] = '100';
                   // $config['max_width'] = '1024';
                   // $config['max_height'] = '768';
                //echo "<pre>";print_r($config);die;
                    $this->load->library('upload', $config);
                    if($this->upload->do_upload('authorimage'))
                    {
                    $data = array('upload_data' => $this->upload->data());
                    $logo=$data['upload_data']['file_name'];
                    }
                    else
                    {
                    $error = array('error' => $this->upload->display_errors());
                    //echo $error;
                    }
                }
            if ($this->form_validation->run() == true) {


                $inputdata['author'] = $this->input->post('author');
                $inputdata['country'] = $this->input->post('country');
                $inputdata['city'] = $this->input->post('city');
                $inputdata['description'] = $this->input->post('description');                
                $inputdata['author_photo'] = $logo;

                if ($tid == '') {
                    $this->base_model->insert_operation(
                        
                        $this->db->dbprefix('testimonials'),$inputdata
                    );

                    $msg = "Record Added Successfully";
                } else {
                    $where['tid'] = $this->input->post('tid');
                    $this->base_model->update_operation(
                        $inputdata,
                        $this->db->dbprefix('testimonials'),
                        $where
                    );
                    $msg = "Record Updated Successfully";
                }
                
                $this->prepare_flashmessage($msg, 0);
                redirect('admin/testimonialslisting', 'refresh');
            } else {
                
                $this->prepare_flashmessage(validation_errors(), 1);
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
        if ($this->uri->segment(3) != '' && is_numeric($this->uri->segment(3))) {
            // $this->data['data'] = $this->base_model->run_query(
            //     "select * from " . $this->db->dbprefix('subjects')
            //     . " where subjectid=" . $this->uri->segment(3)
            // ); 
            $this->data['data'] = $this->base_model->run_query(
                "select * from " . $this->db->dbprefix('testimonials')
                . " where tid=" . $this->uri->segment(3)
            );
            $this->data['id'] = $tid;
            $this->data['title'] = 'Update Subject';
        } else {
            $this->data['data'] = array();
            $this->data['id'] = '';
            $this->data['title'] = 'Add Subject';
        }
        $Options['Active'] = 'Active';
        $Options['Inactive'] = 'Inactive';
        $this->data['element'] = $Options;
        $this->data['active_menu'] = 'subjects';
        //$this->data['content'] = 'admin/addeditTestimonials';
        $this->_render_page('templates/admintemplate', $this->data);
    }
 function addeditPrizes()
    {
       
        $catid=$this->input->post('catid');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Subject Name', 'trim|required');
        if(empty($catid))
        $this->form_validation->set_rules('slug', 'Slug Name', 'trim|required');
        $this->form_validation->set_rules('order_no', 'Order No', 'trim|required');
        $this->form_validation->set_rules('meta_title', 'Meta Title', 'trim|required');
        $this->form_validation->set_rules('meta_description', 'Meta Description', 'trim|required');
        $this->form_validation->set_rules('seo_keywords', 'Seo Keywords', 'required');
        $this->form_validation->set_rules('miscellaneous_code', 'Miscellaneous Code', 'trim|required');
        $this->form_validation->set_rules('long_description', 'Long Description', 'trim|required');
        // $this->form_validation->set_rules('status', 'Status', 'trim|required');
        if ($this->input->post()) {
            if ($this->form_validation->run() == true) {
                $inputdata['name'] = $this->input->post('name');
                $inputdata['slug'] = $this->input->post('slug');
                $inputdata['order_no'] = $this->input->post('order_no');
                $inputdata['meta_title'] = $this->input->post('meta_title');
                $inputdata['meta_description'] = $this->input->post('meta_description');
                $inputdata['seo_keywords'] = $this->input->post('seo_keywords');
                $inputdata['miscellaneous_code'] = $this->input->post('miscellaneous_code');
                $inputdata['long_description'] = $this->input->post('long_description');
                if ($catid == '') {
                    $this->base_model->insert_operation(
                        
                        $this->db->dbprefix('categories'),$inputdata
                    );

                    $msg = "Record Added Successfully";
                } else {
                    $where['catid'] = $this->input->post('catid');
                    $this->base_model->update_operation(
                        $inputdata,
                        $this->db->dbprefix('categories'),
                        $where
                    );
                    $msg = "Record Updated Successfully";
                }
                
                $this->prepare_flashmessage($msg, 0);
                redirect('admin/subcategorieslisting', 'refresh');
            } else {
                
                $this->prepare_flashmessage(validation_errors(), 1);
                redirect('admin/subjects', 'refresh');
            }
        }
        if ($this->uri->segment(3) != '' && is_numeric($this->uri->segment(3))) {
            // $this->data['data'] = $this->base_model->run_query(
            //     "select * from " . $this->db->dbprefix('subjects')
            //     . " where subjectid=" . $this->uri->segment(3)
            // ); 
            $this->data['data'] = $this->base_model->run_query(
                "select * from " . $this->db->dbprefix('categories')
                . " where catid=" . $this->uri->segment(3)
            );
            $this->data['id'] = $catid;
            $this->data['title'] = 'Update Subject';
        } else {
            $this->data['data'] = array();
            $this->data['id'] = '';
            $this->data['title'] = 'Add Subject';
        }
        $Options['Active'] = 'Active';
        $Options['Inactive'] = 'Inactive';
        $this->data['element'] = $Options;
        $this->data['active_menu'] = 'subjects';
        $this->data['content'] = 'admin/addeditSubjects';
        $this->_render_page('templates/admintemplate', $this->data);
    }



    public function socialNetworks($param = '', $param1 = '')
    {
        $this->data['message'] = "";

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
            redirect('auth', 'refresh');

        $network_settings = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('social_networks'));
        if (count($network_settings) > 0)
            $this->data['network_settings'] = $network_settings[0];
        else
            $this->data['network_settings'] = array();
        $this->data['title'] = "Social Network Settings";
        $this->data['content'] = "admin/social_networks";
        $table_name = "social_networks";


        if ($this->input->post('submit') == "Update") {
            $this->form_validation->set_rules('facebook', 'Facebook', 'xss_clean');
            $this->form_validation->set_rules('twitter', 'Twitter', 'xss_clean');
            $this->form_validation->set_rules('google_plus', 'Google+', 'xss_clean');
            $this->form_validation->set_rules('linkedin', 'Linkedin', 'xss_clean');
            $this->form_validation->set_rules('instagram', 'Instagram', 'xss_clean');
            $this->form_validation->set_rules('pinterest', 'Pinterest', 'xss_clean');
            $this->form_validation->set_rules('youtube', 'Youtube', 'xss_clean');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if ($this->form_validation->run() == TRUE) {
                $inputdata['facebook'] = $this->input->post('facebook');
                $inputdata['twitter'] = $this->input->post('twitter');
                $inputdata['google_plus'] = $this->input->post('google_plus');
                $inputdata['linkedin'] = $this->input->post('linkedin');
                $inputdata['instagram'] = $this->input->post('instagram');
                $inputdata['pinterest'] = $this->input->post('pinterest');
               $inputdata['youtube'] = $this->input->post('youtube');
                $where['id'] = $this->input->post('update_rec_id');
                if ($this->base_model->update_operation($inputdata, $table_name, $where)) {
                    $this->prepare_flashmessage("Updated Successfully", 0);
                    redirect('admin/socialNetworks', 'refresh');
                } else {
                    $this->prepare_flashmessage("Unable to update", 1);
                    redirect('admin/socialNetworks');
                }
            } else {
                $this->prepare_flashmessage(validation_errors(), 1);
                redirect('admin/socialNetworks/' . $this->input->post('update_rec_id'));
            }

            $cond = "id";
            $cond_val = $param1;
            if (!is_numeric($param1) || !$this->base_model->check_duplicate($table_name, $cond, $cond_val)) {
                $this->prepare_flashmessage("Invalid Operation", 1);
                redirect('admin/socialNetworks', 'refresh');
            }
        }

        $this->_render_page('templates/admintemplate', $this->data);
    }


    public function mcmp_cms()
    {
         
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) redirect('auth', 'refresh');
        
        $this->data['active_menu'] = "mcmp_cms";
        $this->data['title']       = "Mange Pages";
        $this->data['content']     = "admin/my-click-my-pick/cms";
        
        $this->load->model('my_click_my_pick_model');
        $this->data['pages'] = $this->my_click_my_pick_model->getCmsPages();
        
        $this->_render_page('templates/admintemplate', $this->data);
    }
    
    public function mcmp_cms_edit() {
        $this->data['id'] = $id = $this->uri->segment(3);
        
        $this->data['active_menu'] = "mcmp_cms";
        $this->data['title']   = "Edit Pages";
        
        $this->form_validation->set_rules('title', 'Title', 'xss_clean|required');
        $this->form_validation->set_rules('description', 'Description');
        $this->form_validation->set_rules('meta_tag', 'Meta Tag');
        $this->form_validation->set_rules('meta_tag_keywords', 'Meta Description');
        $this->form_validation->set_rules('seo_keywords', 'SEO Keywords');
        $this->form_validation->set_rules('status', 'Status', 'xss_clean');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        
        if ($this->input->post()) {
            if ($this->form_validation->run() == TRUE) {
                $inputdata['name'] = $this->input->post('title');
                $inputdata['description'] = $this->input->post('description');
                $inputdata['short_description'] = $this->input->post('short_description');
                $inputdata['meta_tag'] = $this->input->post('meta_tag');
                $inputdata['meta_description'] = $this->input->post('meta_tag_keywords');
                $inputdata['seo_keywords'] = $this->input->post('seo_keywords');
                $inputdata['status'] = $this->input->post('status');
                $inputdata['slug'] = $this->input->post('slug');

                $this->load->model('my_click_my_pick_model');
                if($this->my_click_my_pick_model->updateCmsPage($inputdata, $id)) {
                    $this->prepare_flashmessage("Page Updated Successfully", 0);
                    redirect('admin/mcmp_cms');
                } else {
                    $this->prepare_flashmessage("There has been an error.", 1);
                    redirect('admin/mcmp_cms_edit/' . $id, 'refresh');
                }
            }
         }
         
        
        $this->load->model('my_click_my_pick_model');
        $this->my_click_my_pick_model->strCondition = " AND cms_pages.id = " . $id;
        $arrPageDetail = $this->my_click_my_pick_model->getCmsPages();
        
        if(count($arrPageDetail) != 1) {
            show_404();
        }
        
        $this->data['arrPageDetail'] = $arrPageDetail[0];

        $this->data['content'] = "admin/my-click-my-pick/cms_edit";
        $this->_render_page('templates/admintemplate', $this->data);
    }
    function faqslisting(){
        $this->validate_admin();
        
        $this->data['questions']=$this->base_model->run_query("SELECT * FROM `faqs`");

        $this->data['title'] = 'FAQs Listing';
        $this->data['active_menu'] = 'faqs';
        $this->data['content'] = 'admin/faqslisting';
        $this->_render_page('templates/admintemplate',$this->data);
    } 

    function addeditFAQs()
    {
        $catid=$this->input->post('id');
        $this->validate_admin();

        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'ques','Publisher Name','trim|required',
            'answer','Subject Name','trim|required'
        );


        if ($this->form_validation->run() == true) {
            $inputdata['ques'] = $this->input->post('ques');
            $inputdata['answer'] = $this->input->post('answer');

            if ($this->input->post('id') == '') {
                $ref = $this->base_model->insert_operation_id(
                    $this->db->dbprefix('faqs'),
                    $inputdata
                );
                $msg = "Record Added Successfully";
            } else {
                $where['id'] = $this->input->post('id');

                if ($this->base_model->update_operation($inputdata,
                    $this->db->dbprefix('faqs'), $where)
                ){

                }
                $msg = "Record Updated Successfully";
            }
            $this->prepare_flashmessage($msg, 0);
            redirect('admin/faqslisting', 'refresh');
        }
        if ($this->uri->segment(3) != '' && is_numeric($this->uri->segment(3))) {
            $intCourseId = $this->uri->segment(3);
            $sql = "select * from " . $this->db->dbprefix('faqs')
                . " where id=" . $intCourseId;
            $this->data['data'] = $this->base_model->run_query($sql);
            $this->data['id'] = $this->uri->segment(3);
            $this->data['title'] = 'Update FAQ';
            
            
            $result = $this->base_model->run_query($sql);

            if(count($result) <> 1) {
                throw new Exception('Question not found.');
            }
        } else {
            $this->data['data'] = array();
            $this->data['id'] = '';
            $this->data['title'] = 'Add Question';
        }

        $this->data['total_cat'] = count($this->db->get('faqs')->result_array());
        $this->data['active_menu'] = 'faqs';
        $this->data['content'] = 'admin/addeditFAQs';
        $this->_render_page('templates/admintemplate', $this->data);
    }



    function registereduserslisting(){
        $this->validate_admin();
        $query = "SELECT username, class, email, phone, prefered_subject as subjects, date_of_registration, city, state, country FROM users";
        $this->data['users']=$this->base_model->run_query($query);

        $this->data['title'] = 'Registered Users';
        $this->data['active_menu'] = 'reg_users';
        $this->data['content'] = 'admin/registereduserslisting';
        $this->_render_page('templates/admintemplate',$this->data);
    } 

    function paiduserslisting(){
        $this->validate_admin();
        
        $query = "SELECT u.username as student_name, u.class, p.payer_email as email, p.payer_name as name, u.country as country, p.cc_order_status as status, p.cc_amount as amount, p.cc_billing_tel as phone, p.cc_billing_email as cc_email, p.subjects, dateofsubscription as dos FROM users u inner join payments p on u.id = p.user_id";
        
        $this->data['users']=$this->base_model->run_query($query);

        $this->data['title'] = 'Paid Users';
        $this->data['active_menu'] = 'paid_users';
        $this->data['content'] = 'admin/paiduserslisting';
        $this->_render_page('templates/admintemplate',$this->data);
    } 



    // Function For Logout
    function logout()
    {
        $this->session->sess_destroy();
        $this->prepare_flashmessage("You have successfully logout", 0);
        redirect(base_url());

    }




    //CMS pages can be managed by admin / moderator

    //
}