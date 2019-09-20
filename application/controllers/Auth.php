<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->library('form_validation');
        // $this->load->library('googleplus');
        $this->load->helper('url');
        $this->load->library('email');
        // Load MongoDB library instead of native db driver if required
        $this->config->item('use_mongodb', 'ion_auth') ?
                        $this->load->library('mongo_db') :
                        $this->load->database();
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        $this->load->helper('language');
        // $settings = $this->db->get('general_settings')->result()[0];
        /// $this->data['settings'] = $settings;
    }
    //redirect if needed, otherwise display the user list
    function index() {
        if (!$this->ion_auth->logged_in()) {
            //redirect them to the login page
            redirect('login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) { //remove this elseif if you want to enable this for non-admins
            //redirect them to the home page because they must be an administrator to view this
            return show_error('You must be an administrator to view this page');
        } else {
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            //list the users
            $this->data['users'] = $this->ion_auth->users()->result();
            foreach ($this->data['users'] as $k => $user) {
                $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
            }
            $this->data['content'] = 'general/index';
            $this->_render_page('templates/template', $this->data);
        }
    }
    //log the user in
    //log the user in
    function login() {
        //die('login');
        if (!$this->ion_auth->logged_in()) {
            $this->data['title'] = "Login";
            $this->data['title'] = 'Login | CREST Olympiad Exams';
            $this->data['meta_description'] = 'Login here to book exam slots/timing, upload your documents and many more.';
            if ($this->input->post('login') != '') {
                //die('hhhhhhhh');
                //echo 'ggg'.$this->input->post('identity');die;
                //validate form input
                $this->form_validation->set_rules('identity', 'Identity', 'required|valid_email');
                $this->form_validation->set_rules('password', 'Password', 'required');
                if ($this->form_validation->run() == true) {
                    //die('true');
                    //check to see if the user is logging in
                    //check for "remember me"
                    $remember = (bool) $this->input->post('remember');
                    if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'))) {
                        //die('dddddd');
                        //if the login is successful
                        //redirect them back to the home page
                        if ($this->ion_auth->is_admin()) {
                            
                            //$this->session->set_flashdata('message', $this->ion_auth->messages());
                            $this->prepare_flashmessage($this->ion_auth->messages(), 0);

                            //redirect('admin', 'refresh');
                            redirect('admin/dashboard', 'refresh');
                            //die('fdfdfdfdfdf');
                        } elseif ($this->ion_auth->is_moderator()) {
                            //$this->session->set_flashdata('message', $this->ion_auth->messages());
                            $this->prepare_flashmessage($this->ion_auth->messages(), 0);
                            redirect('moderator', 'refresh');
                        } else {
                            //Check wether the user has updated his group or not
                            $userid = $this->ion_auth->get_user_id();
                            if (is_numeric($userid)) {
                                $result = $this->base_model->run_query("select * FROM  users where id=" . $userid);

                                $this->session->set_userdata('ip_address', $_SERVER['HTTP_X_REAL_IP']);
                                $this->session->set_userdata('user_agent', $_SERVER['HTTP_USER_AGENT']);

                                //print_r($result);die;
                               
                                
                                // if(!empty($result[0]->school_portal_id)) {
                                    
                                //     $this->load->model('ion_auth_model');
                                //     $token = md5(time());
                                    
                                //     $this->load->model('school_model');
                                //     $this->school_model->updateAutoLoginToken($userid, $token);
                                //     redirect(base_url('school/autoLogin/'.$userid.'/'.$token));
                                // }
                                
                                // if ($result[0]->group == 0) {
                                //     redirect('user/profile');
                                // }
                                if ($result[0]->email == "admin@crest.com") {
                                    redirect('user/profile');
                                }
                                else
                                {

                                    

                                   redirect('crest/profile'); 
                                }

                            }
                            $this->prepare_flashmessage($this->ion_auth->messages(), 0);
                            redirect('user', 'refresh');
                        }
                    } else {
                        //die('dfdfdfdf');
                        //if the login was un-successful
                        //redirect them back to the login page
                        $this->prepare_flashmessage($this->ion_auth->errors(), 1);
                        redirect('login', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
                    }
                } else {
                    //die('false');
                    //the user is not logging in so display the login page
                    //set the flash data error message if there is one
                    $this->prepare_flashmessage(validation_errors(), 1);
                    //redirect('login', 'refresh');
                }
            } else if (isset($_POST['facebook_login']) && $_POST['facebook_login'] == 'true') {
                $email = $_POST['email'];
                $name = $_POST['name'];
                $temp_array = explode(' ', $name);
                $first_name = $temp_array[0];
                $last_name = $temp_array[1];
                $fb_id = $_POST['fb_id'];
                $user_id = '';
                $data['email'] = $email;
                $data['username'] = $name;
                $data['first_name'] = $first_name;
                $data['last_name'] = $last_name;
                $data['social_identifier'] = 'facebook';
                /* Check if user is logged in with selecting exam details */
                if ($this->input->post('subject')) {
                    $data['prefered_subject'] = $this->input->post('subject');
                }
                if ($this->input->post('course')) {
                    $courseSlug = $this->input->post('course');
                    $this->load->model('category');
                    $intCourseId = $this->category->getCourseIdBySlug($courseSlug);
                }
                if ($this->input->post('classes')) {
                    $choosenClass = str_replace('-', ' ', $this->input->post('classes'));
                }
                /*                 * *************************************** */
                $result = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('users') . " WHERE email='" . $email . "'");
                $misMatchProfile = false;
                if (count($result) > 0) {
                    if ($this->input->post('course') && $this->input->post('classes')) {
                        $intExistingCourseId = $result[0]->course;
                        if ($intCourseId != $intExistingCourseId) {
                            $this->prepare_flashmessage("You are already registered with the email ( <strong>" . $email . "</strong> ) for different course. Please use other email for your choosen course or continue with your existing course.", 1);
                            // redirect('auth/profile', 'refresh');
                            $misMatchProfile = true;
                        }
                        $existingClass = $result[0]->class;
                        if ($choosenClass != $existingClass) {
                            $this->prepare_flashmessage("You are already registered with the email ( <strong>" . $email . "</strong> ) for different class. Please use other email for your choosen class or continue with your existing class.", 1);
                            // redirect('auth/profile', 'refresh');
                            $misMatchProfile = true;
                        }
                    }
                    /* Get the course and class */
                    $id = $result[0]->id;
                    $this->db->where('id', $id);
                    $this->db->update($this->db->dbprefix('users'), $data);
                    $this->session->set_userdata('user_id', $id);
                } else {
                    $this->load->helper('general_helper');
                    $newPassword = cleanFileName($name) . '5678';
                    $this->load->model('ion_auth_model');
                    $newPasswordEncrypted = $this->ion_auth_model->hash_password($newPassword);
                    $data['password'] = $newPasswordEncrypted;
                    if ($this->input->post('course')) {
                        $data['course'] = $intCourseId;
                    }
                    if ($this->input->post('classes')) {
                        $data['class'] = str_replace('-', ' ', $this->input->post('classes'));
                    }
                    $data['active'] = '1';
                    $data['date_of_registration'] = date('Y-m-d H:i:s');
                    $data['last_login']           = date('Y-m-d H:i:s');
                    $data['ip_address']           = $_SERVER['REMOTE_ADDR'];
                    $data['register_from_page']   = 'LOGIN';
                
                    $this->db->insert($this->db->dbprefix('users'), $data);
                    $user_id = $this->db->insert_id('users');
                    /* Get User details for sending newly generated password mail */
                    $this->load->model('member');
                    $arrUserDetail = $this->member->getUserDetail($user_id);
                    $this->session->set_userdata('user_id', $user_id);
                    $params = array('username' => $email, 'password' => $newPassword);
                    $this->load->model('Emails_model');
                    $this->Emails_model->sendSignupMail($email, $params);
                    $this->session->set_userdata('user_id', $user_id);
                }
                $this->session->set_userdata('identity', $email);
                $this->session->set_userdata('username', $name);
                $this->session->set_userdata('email', $email);
                $this->session->set_userdata('fb_login', 'true');
                if ($misMatchProfile) {
                    ob_clean();
                    echo 'mismatch';
                    exit;
                    die;
                } else {
                    ob_clean();
                    echo 'success';
                    exit;
                    die;
                }
            }
            $this->data['identity'] = array('name' => 'identity',
                'id' => 'identity',
                'class' => 'form-control',
                'placeholder' => 'User Email',
                'type' => 'text',
                'value' => $this->form_validation->set_value('identity'),
            );
            $this->data['password'] = array('name' => 'password',
                'id' => 'password',
                'class' => 'form-control',
                'placeholder' => 'Password',
                'type' => 'password',
            );
            //$this->data['google_plus_login_url'] = $this->googleplus->loginURL();
           // die('hhhhhkkkkkkk');
            $this->data['content'] = "auth/login";
            $this->_render_page('templates/template', $this->data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

   function olympiad_login() {
        //die('login');

    
       
           $this->load->helper('captcha');
            if ($this->input->post('submit') != '') {
                //die('hhhhhhhh');
                //echo 'ggg'.$this->input->post('identity');die;
                //validate form input
                //$this->form_validation->set_rules('userid', 'Userid', 'required');
                //$this->form_validation->set_rules('identity', 'Identity', 'required');
                $this->form_validation->set_rules('identity', 'Identity', 'required|valid_email');
                $this->form_validation->set_rules('password', 'Password', 'required');
             /*   $this->form_validation->set_rules('userCaptcha', 'Captcha', 'required|callback_check_captcha');*/
        
      /*  $userCaptcha = $this->input->post('userCaptcha');*/
                if ($this->form_validation->run() == true) {
                    // die('true');

                     if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'))) {
    

                            //Check wether the user has updated his group or not
                            $email = $this->input->post('identity');
                            $user_id = $this->ion_auth->get_user_id();
                            //$password=$this->input->post('password');
                            // if (is_numeric($userid)) {
                               // if($userid=="2354" && $password=="1234")
                               // {

                                 // if ($this->ion_auth->login($this->input->post('userid'), $this->input->post('password')))
                                 //    {

                                   
                                    
                                $this->session->set_userdata('identity', $email);
                                $this->session->set_userdata('user_id', $user_id);
                                $this->session->set_userdata('ip_address', $_SERVER['REMOTE_ADDR']);
                                $this->session->set_userdata('user_agent', $_SERVER['HTTP_USER_AGENT']);

                                $redirect_url=base_url(uri_string());
                                
                                set_cookie('adminLoginUrl',$redirect_url,'3600');  
                 
              
          
                               // $this->session->set_userdata('userid', $userid);
                               

                                redirect('user/instructions');

                                 // }
                               
                                                          
                            // }
                           
                        }
                    }
                }
                    else {
           
        
                     

            $this->data['title'] = "Login";
            $this->data['title'] = 'Login for CREST Olympiads';
            $this->data['meta_description'] = 'Login now to take CREST olympiads exams.';
               
            
            $this->data['userid'] = array('name' => 'userid',
                'id' => 'userid',
                'class' => 'form-control',
                'placeholder' => 'User ID',
                'type' => 'text',
                'value' => $this->form_validation->set_value('userid'),
            );
            $this->data['password'] = array('name' => 'password',
                'id' => 'password',
                'class' => 'form-control',
                'placeholder' => 'Password',
                'type' => 'password',
            );
            
            $this->data['content'] = "auth/olympiad_login";
            $this->_render_page('templates/template', $this->data);
        } 
    }

    function send_reset_password_mail() {
        $this->load->model('Member');
        $arrWithoutPasswordUsers = $this->Member->getWithoutPasswordUsers();
        if (count($arrWithoutPasswordUsers) > 0) {
            foreach ($arrWithoutPasswordUsers as $user) {
                $email = $user['email'];
                /* Generate Password */
                $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                $pass = array(); //remember to declare $pass as an array
                $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
                for ($i = 0; $i < 8; $i++) {
                    $n = rand(0, $alphaLength);
                    $pass[] = $alphabet[$n];
                }
                $newPassword = implode($pass); //turn the array into a string
                $this->load->model('ion_auth_model');
                $newPasswordEncrypted = $this->ion_auth_model->hash_password($newPassword);
                /*                 * ************************** */
                $data['password'] = $newPasswordEncrypted;
                $this->Member->update($data, $email);
                $name = $user['first_name'] . ' ' . $user['last_name'];
                /* Sending Mail */
                $changePasswordLink = $this->config->item('base_url') . 'auth/change_password';
                $message = "Dear " . $name . ",";
                $message .= "<br>";
                $message .= "Thanks for signing up with " . $this->config->item('site_name');
                $message .= "<br>";
                $message .= "<br>";
                $message .= "Your Login details is as follow: ";
                $message .= "<br>";
                $message .= "Your user name is: <strong>" . $email . "</strong>";
                $message .= "<br>";
                $message .= "Your password is: <strong>" . $newPassword . "</strong>";
                $message .= "<br>";
                $message .= "<br>";
                $message .= "If you want to reset your password, click on the link given below.";
                $message .= "<br>";
                $message .= "<a href=" . $changePasswordLink . ">Change Password</a>";
                $message .= "<br>";
                $message .= "<br>";
                $message .= "<p>If you're having trouble clicking the change password link, copy and paste the URL below "
                        . " into your web browser. </p>";
                $message .= "<br>";
                $message .= $changePasswordLink;
                $message .= "<br>";
                $message .= "<br>";
                $message .= "Regards,";
                $message .= "<br>";
                $message .= $this->config->item('site_name') . ' team';
                $from = $this->config->item('site_settings')->contact_email;
                $sub = "Welcome to " . $this->config->item('site_name');
                /* Setup Email configuration */
                $config = Array(
                    'mailtype' => 'html',
                    'smtp_host' => $this->config->item('smtp_host'),
                    'smtp_user' => $this->config->item('smtp_user'),
                    'smtp_pass' => $this->config->item('smtp_pass'),
                    'smtp_port' => $this->config->item('smtp_port'),
                    'charset' => 'utf-8',
                    'newline' => '\r\n',
                    'mailtype' => 'html',
                    'wordwrap' => TRUE
                );
                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                $this->email->from($from, $this->config->item('site_name'));
                $this->email->to($email);
                $this->email->subject($sub);
                $this->email->message($message);
                if (!$this->email->send()) {
                    throw new Exception("Error in sending mail" . $this->email->print_debugger());
                }
                /*                 * ***************************************** */
            }
            $this->prepare_flashmessage("Mail has been sent successfully.", 0);
        } else {
            $this->prepare_flashmessage("No record found.", 1);
        }
        redirect('admin/viewAllUsers', 'refresh');
    }
    //log the user out
    function logout() {
        $this->data['title'] = "Logout";
        //log the user out
        $logout = $this->ion_auth->logout();
        //redirect them to the login page
        $this->prepare_flashmessage($this->ion_auth->messages(), 0);
        //redirect('auth/login', 'refresh');
        redirect(base_url());
    }
    //change password
    function change_password() {
        $this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
        $this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
        $this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');
        if (!$this->ion_auth->logged_in()) {
            redirect('login', 'refresh');
        }
        $user = $this->ion_auth->user()->row();
        if ($this->form_validation->run() == false) {
            //display the form
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
            $this->data['old_password'] = array(
                'name' => 'old',
                'class' => 'form-control',
                'placeholder' => 'Old Password',
                'id' => 'old',
                'type' => 'password',
            );
            $this->data['new_password'] = array(
                'name' => 'new',
                'class' => 'form-control',
                'placeholder' => 'New Password',
                'id' => 'new',
                'type' => 'password',
            );
            $this->data['new_password_confirm'] = array(
                'name' => 'new_confirm',
                'class' => 'form-control',
                'placeholder' => 'New Confirm Password',
                'id' => 'new_confirm',
                'type' => 'password',
            );
            $this->data['user_id'] = array(
                'name' => 'user_id',
                'id' => 'user_id',
                'type' => 'hidden',
                'value' => $user->id,
            );
            $this->data['active_menu'] = 'change_password';
            $this->data['content'] = 'auth/change_password';
            $this->data['title'] = 'Change Password';
            $this->data['user_type'] = 'user';
            $template_type = "usertemplate";
            if ($this->ion_auth->is_admin()) {
                $this->data['user_type'] = 'admin';
                $template_type = "admintemplate";
            } elseif ($this->ion_auth->is_moderator()) {
                $this->data['user_type'] = 'moderator';
                $template_type = "moderatortemplate";
            }
            if ($this->session->userdata('school_portal_id')) {
                $this->adminschoolLayout();
            } else {
                $this->_render_page('temp/' . $template_type, $this->data);
            }
        } else {
            $identity = $this->session->userdata('identity');
            $change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));
            if ($change) {
                //if the password was successfully changed
                $this->prepare_flashmessage($this->ion_auth->messages(), 0);
                redirect('auth/change_password', 'refresh');
                //$this->logout();
            } else {
                $msg = $this->ion_auth->errors() . "The old password does not match. Please contact <strong>+91-92055-70955</strong>.";
                $this->prepare_flashmessage($msg, 1);
                // $this->prepare_flashmessage($this->ion_auth->errors(), 1);
                redirect('auth/change_password', 'refresh');
            }
        }
    }
    //forgot password
    function forgot_password() {
        $this->form_validation->set_rules('email', $this->lang->line('forgot_password_validation_email_label'), 'required');
        if ($this->form_validation->run() == false) {
            //setup the input
            $this->data['email'] = array(
                'name' => 'email',
                'class' => 'form-control',
                'placeholder' => 'User Email',
                'id' => 'email',
            );
            if ($this->config->item('identity', 'ion_auth') == 'username') {
                $this->data['identity_label'] = $this->lang->line('forgot_password_username_identity_label');
            } else {
                $this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
            }
            //set any errors and display the form
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->data['title'] = 'Forgot Password';
            $this->data['content'] = 'auth/forgot_password';
            $this->_render_page('templates/template', $this->data);
        } else {
            // get identity from username or email
            if ($this->config->item('identity', 'ion_auth') == 'username') {
                $identity = $this->ion_auth->where('username', strtolower($this->input->post('email')))->users()->row();
            } else {
                $identity = $this->ion_auth->where('email', strtolower($this->input->post('email')))->users()->row();
            }
            if (empty($identity)) {
                //$this->ion_auth->set_message('forgot_password_email_not_found');
                //$this->session->set_flashdata('message', $this->ion_auth->messages());
                
                $this->prepare_flashmessage('Your email id is not registered with CREST Olympiads. You may register <a href="https://www.crestolympiads.com/registration">here</a>', 1);
                 
                redirect("auth/forgot_password", 'refresh');
            }
            
            /* Generate Password and send it on mail */
            
//            echo "<pre>";
//            print_r($identity);
//            exit;
            
            $username = $identity->username;
            $email = $identity->email;
            $name= strtok($username, " ");
            $this->load->helper('general_helper');
            $permitted_chars = '123456789';
                // Output: g6swmAP8X5VG4jCi
            $code=substr(str_shuffle($permitted_chars), 0, 4);
            $newPassword = cleanFileName($name) . $code;
            $this->load->model('ion_auth_model');
            $newPasswordEncrypted = $this->ion_auth_model->hash_password($newPassword);
            //ini_set('display_errors', 1);
            $this->load->model('member');
            $updateData = array('password' => $newPasswordEncrypted);
            $this->member->update($updateData, $email);
            
            $mailParams = array('email' => $email, 'password' => $newPassword );
            $this->load->model('Emails_model');
            $this->Emails_model->sendForgotPasswordMail($email, $mailParams);
            
            $this->prepare_flashmessage('Password has been sent to your email id.', 0);
            redirect("login", 'refresh'); //w
        
            //run the forgotten password method to email an activation code to the user
            //$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});
//            if ($forgotten) {
//
//                //if there were no errors
//
//                $this->prepare_flashmessage($this->ion_auth->messages(), 0);
//
//                redirect("login", 'refresh'); //we should display a confirmation page here instead of the login page
//            } else {
//
//                $this->prepare_flashmessage($this->ion_auth->errors(), 1);
//
//                redirect("auth/forgot_password", 'refresh');
//            }
        }
    }
    //reset password - final step for forgotten password
    public function reset_password($code = NULL) {
        if (!$code) {
            show_404();
        }
        $user = $this->ion_auth->forgotten_password_check($code);
//    
//        echo "<pre>";
//        print_r($user);
//       exit;
        if ($user) {
            //if the code is valid then display the password reset form
            $this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
            $this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');
            if ($this->form_validation->run() == false) {
                //display the form
                //set the flash data error message if there is one
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
                $this->data['new_password'] = array(
                    'name' => 'new',
                    'class' => 'form-control',
                    'placeholder' => 'New Password (at least 8 characters long)',
                    'id' => 'new',
                    'type' => 'password',
                );
                $this->data['new_password_confirm'] = array(
                    'name' => 'new_confirm',
                    'class' => 'form-control',
                    'placeholder' => 'Confirm New Password',
                    'id' => 'new_confirm',
                    'type' => 'password',
                );
                $this->data['user_id'] = array(
                    'name' => 'user_id',
                    'id' => 'user_id',
                    'type' => 'hidden',
                    'value' => $user->id,
                );
                $this->data['csrf'] = $this->_get_csrf_nonce();
                $this->data['code'] = $code;
                //set any errors and display the form
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $this->data['content'] = 'auth/reset_password';
                $this->_render_page('templates/template', $this->data);
            } else {
                // do we have a valid request?
                if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id')) {
                    //something fishy might be up
                    // $this->ion_auth->clear_forgotten_password_code($code);
                    show_error($this->lang->line('error_csrf'));
                } else {
                    // finally change the password
                    $identity = $user->{$this->config->item('identity', 'ion_auth')};
                    $change = $this->ion_auth->reset_password($identity, $this->input->post('new'));
                    if ($change) {
                        //if the password was successfully changed
                        $this->prepare_flashmessage($this->ion_auth->messages(), 0);
                        $this->logout();
                    } else {
                        $this->prepare_flashmessage($this->ion_auth->errors(), 1);
                        redirect('auth/reset_password/' . $code, 'refresh');
                    }
                }
            }
        } else {
            //if the code is invalid then send them back to the forgot password page
            $this->prepare_flashmessage($this->ion_auth->errors(), 1);
            redirect("auth/forgot_password", 'refresh');
        }
    }
    //activate the user
    function activate($id, $code = false) {
        if ($code !== false) {
            $activation = $this->ion_auth->activate($id, $code);
        } else if ($this->ion_auth->is_admin()) {
            $activation = $this->ion_auth->activate($id);
        }
        if ($activation) {
            //redirect them to the auth page
            $this->prepare_flashmessage($this->ion_auth->messages(), 0);
            redirect("login", 'refresh');
        } else {
            //redirect them to the forgot password page
            $this->prepare_flashmessage($this->ion_auth->errors(), 1);
            redirect("auth/forgot_password", 'refresh');
        }
    }
    //deactivate the user
    function deactivate($id = NULL) {
        $id = $this->config->item('use_mongodb', 'ion_auth') ? (string) $id : (int) $id;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label'), 'required');
        $this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label'), 'required|alpha_numeric');
        if ($this->form_validation->run() == FALSE) {
            // insert csrf check
            $this->data['csrf'] = $this->_get_csrf_nonce();
            $this->data['user'] = $this->ion_auth->user($id)->row();
            $this->_render_page('auth/deactivate_user', $this->data);
        } else {
            // do we really want to deactivate?
            if ($this->input->post('confirm') == 'yes') {
                // do we have a valid request?
                if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id')) {
                    show_error($this->lang->line('error_csrf'));
                }
                // do we have the right userlevel?
                if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
                    $this->ion_auth->deactivate($id);
                }
            }
            //redirect them back to the auth page
            redirect('auth', 'refresh');
        }
    }
    public function _image_check($image = '', $param2 = '') {
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
    //create a new user
    function create_user() {
        $this->load->library('form_validation');
        $this->data['title'] = "Create User";
        $this->data['google_plus_login_url'] = $this->googleplus->loginURL();
        //$this->load->config('ion_auth');
        $this->config->load('ion_auth', TRUE);
        $tables = $this->config->item('tables', 'ion_auth');
        $this->load->helper('captcha');
        if ($this->input->post('submit') != '') {
            //validate form input
            $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required|xss_clean|min_length[2]|max_length[15]');
            //  $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'min_length[2]|max_length[15]|xss_clean');
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
            $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'required|xss_clean');
            //$this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'required|xss_clean');
            $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
            $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');
            // $this->form_validation->set_rules('school', $this->lang->line('create_user_validation_school_label'), 'required|xss_clean|min_length[2]|max_length[30]');
            // $this->form_validation->set_rules('school_address', $this->lang->line('create_user_validation_school_add_label'), 'required|xss_clean|min_length[2]|max_length[50]');
            //  $this->form_validation->set_rules('home_address', $this->lang->line('create_user_validation_home_add_label'), 'required|xss_clean|min_length[2]|max_length[50]');
            $this->form_validation->set_message('is_unique', '%s is already exist.');
            //  $this->form_validation->set_rules('father_mother_guardian_name', $this->lang->line('create_user_validation_guardian_label'), 'required|xss_clean|min_length[2]|max_length[30]');
            //  $this->form_validation->set_rules('student_class', $this->lang->line('create_user_validation_class_label'), 'required|xss_clean|callback_customInArray');
            //  $this->form_validation->set_rules('student_course', $this->lang->line('create_user_validation_course_label'), 'required|xss_clean|callback_courseInArray');
            $this->form_validation->set_rules('userCaptcha', 'Captcha', 'required|callback_check_captcha');
            $userCaptcha = $this->input->post('userCaptcha');
            //  if (!empty($_FILES['image']['name'])) {
            //$this->form_validation->set_rules('image', "Image", 'callback__image_check[' . $_FILES['image']['name'] . ']');
            //  }
            if ($this->form_validation->run() == true) {
                // $username = $this->input->post('first_name') . ' ' . $this->input->post('last_name');
                $username = $this->input->post('first_name');
                $email = strtolower($this->input->post('email'));
                $password = $originalPassword = $this->input->post('password');
                //$image = $_FILES['image']['name'];
                if($this->input->post('country_code')){
                    $phone = '+'.$this->input->post('country_code').'-'.$this->input->post('phone');
                }
                else{
                    $phone = $this->input->post('phone');
                }
                $this->load->model('ion_auth_model');

                $password = $this->ion_auth_model->hash_password($password);
                $additional_data = array(
                    'first_name' => $this->input->post('first_name'),
                    'username' => $this->input->post('first_name'),
                    'email' => $email,
                    'phone' => $phone,
                    'date_of_registration' => date('Y-m-d'),
                    'register_from_page' => 'register',
                    'password' => $password,
                    'ip_address' => $_SERVER['REMOTE_ADDR'],
                    'active' => 1
                );
                $this->load->model('member');
                $intLastInsertId = $this->member->createUserManually($additional_data);
                if (!empty($intLastInsertId)) {
                    $arrUserDetail = $this->member->getUserDetail($intLastInsertId);
                    if (count($arrUserDetail) > 0) {
                        $this->session->set_userdata('user_id', $arrUserDetail[0]['id']);
                        $this->session->set_userdata('identity', $arrUserDetail[0]['email']);
                        $this->session->set_userdata('username', $arrUserDetail[0]['username']);
                        $this->session->set_userdata('email', $arrUserDetail[0]['email']);
                        //                    $this->prepare_flashmessage($this->ion_auth->messages(), 2);
                        $from = $this->config->item('contact_email');
                        $params = array('username' => $email, 'password' => $originalPassword);
                        $message = $this->load->view('emails/signup.php', $params, TRUE);
                        $sub = "Welcome to " . $this->config->item('site_name');
                        /* Setup Email configuration */
                        $config = Array(
                            'mailtype' => 'html',
                            'smtp_host' => $this->config->item('smtp_host'),
                            'smtp_user' => $this->config->item('smtp_user'),
                            'smtp_pass' => $this->config->item('smtp_pass'),
                            'smtp_port' => $this->config->item('smtp_port'),
                            'charset' => 'utf-8',
                            'newline' => '\r\n',
                            'mailtype' => 'html',
                            'wordwrap' => TRUE
                        );
                        $this->load->library('email');
                        $this->email->initialize($config);
                        $this->email->set_newline("\r\n");
                        $this->email->from($from, $this->config->item('site_name'));
                        $this->email->to($email);
                        $this->email->subject($sub);
                        $this->email->message($message);
                        if (!$this->email->send()) {
                            //                        echo "<pre>";
                            //                        print_r($this->email->print_debugger());
                            //                        exit;
                        }
                        /*                         * ***************************************** */
                        redirect("user/profile");
                    }
                }
                //redirect("login", 'refresh');
                redirect("register_success");
            }
            /*  if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data)) {
              //check to see if we are creating the user
              //redirect them back to the admin page
              $this->prepare_flashmessage($this->ion_auth->messages(), 2);
              redirect("auth/login", 'refresh');
              } else {
              //display the create user form
              //set the flash data error message if there is one
              $this->prepare_flashmessage((validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message'))), 1);
              redirect("auth/create_user", 'refresh');
              } */
        }
        $random_number = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
        $vals = array(
            'word' => $random_number,
            'img_path' => './assets/captcha/',
            'img_url' => base_url() . 'assets/captcha/',
            'img_width' => 140,
            'img_height' => 32,
            'expiration' => 7200
        );
        $this->data['captcha'] = create_captcha($vals);
        $this->session->set_userdata('captchaWord', $this->data['captcha']['word']);
        $this->data['courses'] = $this->base_model->run_query('SELECT * FROM `categories`');
        $this->data['content'] = 'auth/create_user';
        $this->_render_page('templates/template', $this->data);
    }
    function create_user1() {
        $this->load->library('form_validation');
        $this->data['title'] = "Create User";
        $this->data['google_plus_login_url'] = $this->googleplus->loginURL();
        //$this->load->config('ion_auth');
        $this->config->load('ion_auth', TRUE);
        $tables = $this->config->item('tables', 'ion_auth');
        $this->load->helper('captcha');
        /* $this->data['first_name'] = array(
          'name' => 'first_name',
          'class' => 'form-control',
          'placeholder' => 'First Name',
          'id' => 'first_name',
          'type' => 'text',
          'value' => $_POST['first_name'],
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
          ); */
        if ($this->input->post('submit') != '') {
            //validate form input
            $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required|xss_clean|min_length[2]|max_length[15]');
            //  $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'min_length[2]|max_length[15]|xss_clean');
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
            $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'required|xss_clean|integer|min_length[10]|max_length[11]');
            //$this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'required|xss_clean');
            $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
            $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');
            // $this->form_validation->set_rules('school', $this->lang->line('create_user_validation_school_label'), 'required|xss_clean|min_length[2]|max_length[30]');
            // $this->form_validation->set_rules('school_address', $this->lang->line('create_user_validation_school_add_label'), 'required|xss_clean|min_length[2]|max_length[50]');
            //  $this->form_validation->set_rules('home_address', $this->lang->line('create_user_validation_home_add_label'), 'required|xss_clean|min_length[2]|max_length[50]');
            $this->form_validation->set_message('is_unique', '%s is already exist.');
            //  $this->form_validation->set_rules('father_mother_guardian_name', $this->lang->line('create_user_validation_guardian_label'), 'required|xss_clean|min_length[2]|max_length[30]');
            //  $this->form_validation->set_rules('student_class', $this->lang->line('create_user_validation_class_label'), 'required|xss_clean|callback_customInArray');
            //  $this->form_validation->set_rules('student_course', $this->lang->line('create_user_validation_course_label'), 'required|xss_clean|callback_courseInArray');
            $this->form_validation->set_rules('userCaptcha', 'Captcha', 'required|callback_check_captcha');
            $userCaptcha = $this->input->post('userCaptcha');
            //  if (!empty($_FILES['image']['name'])) {
            //$this->form_validation->set_rules('image', "Image", 'callback__image_check[' . $_FILES['image']['name'] . ']');
            //  }
            if ($this->form_validation->run() == true) {
                // $username = $this->input->post('first_name') . ' ' . $this->input->post('last_name');
                $username = $this->input->post('first_name');
                $email = strtolower($this->input->post('email'));
                $password = $this->input->post('password');
                //$image = $_FILES['image']['name'];
                $additional_data = array(
                    'first_name' => $this->input->post('first_name'),
                    // 'last_name' => $this->input->post('last_name'),
                    'phone' => $this->input->post('phone'),
                    'date_of_registration' => date('Y-m-d'),
                    'register_from_page' => 'register1'
                        //  'class' => $this->input->post('student_class'),
                        //  'school' => $this->input->post('school'),
                        //  'school_address' => $this->input->post('school_address'),
                        //  'father_mother_guardian_name' => $this->input->post('father_mother_guardian_name'),
                        //   'home_address' => $this->input->post('home_address'),
                        //	'course' => $this->input->post('student_course'),
                );
                //if (!empty($image))
                //  $additional_data['image'] = $image;
                $register = $this->ion_auth->register($username, $password, $email, $additional_data);
                $this->prepare_flashmessage($this->ion_auth->messages(), 2);
                //redirect("login", 'refresh');
                redirect("register_success");
            }
            /*  if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data)) {
              //check to see if we are creating the user
              //redirect them back to the admin page
              $this->prepare_flashmessage($this->ion_auth->messages(), 2);
              redirect("auth/login", 'refresh');
              } else {
              //display the create user form
              //set the flash data error message if there is one
              $this->prepare_flashmessage((validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message'))), 1);
              redirect("auth/create_user", 'refresh');
              } */
        }
        $random_number = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
        $vals = array(
            'word' => $random_number,
            'img_path' => './assets/captcha/',
            'img_url' => base_url() . 'assets/captcha/',
            'img_width' => 140,
            'img_height' => 32,
            'expiration' => 7200
        );
        $this->data['captcha'] = create_captcha($vals);
        $this->session->set_userdata('captchaWord', $this->data['captcha']['word']);
        $this->data['courses'] = $this->base_model->run_query('SELECT * FROM `categories`');
        $this->data['content'] = 'auth/create_user1';
        $this->_render_page('templates/template', $this->data);
    }
    function create_user2() {
        $this->load->library('form_validation');
        $this->data['title'] = "Create User";
        $this->data['google_plus_login_url'] = $this->googleplus->loginURL();
        //$this->load->config('ion_auth');
        $this->config->load('ion_auth', TRUE);
        $tables = $this->config->item('tables', 'ion_auth');
        $this->load->helper('captcha');
        if ($this->input->post('submit') != '') {
            //validate form input
            $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required|xss_clean|min_length[2]|max_length[15]');
            //  $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'min_length[2]|max_length[15]|xss_clean');
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
            $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'required|xss_clean|integer|min_length[10]|max_length[11]');
            //$this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'required|xss_clean');
            $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
            $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');
            // $this->form_validation->set_rules('school', $this->lang->line('create_user_validation_school_label'), 'required|xss_clean|min_length[2]|max_length[30]');
            // $this->form_validation->set_rules('school_address', $this->lang->line('create_user_validation_school_add_label'), 'required|xss_clean|min_length[2]|max_length[50]');
            //  $this->form_validation->set_rules('home_address', $this->lang->line('create_user_validation_home_add_label'), 'required|xss_clean|min_length[2]|max_length[50]');
            $this->form_validation->set_message('is_unique', '%s is already exist.');
            //  $this->form_validation->set_rules('father_mother_guardian_name', $this->lang->line('create_user_validation_guardian_label'), 'required|xss_clean|min_length[2]|max_length[30]');
            //  $this->form_validation->set_rules('student_class', $this->lang->line('create_user_validation_class_label'), 'required|xss_clean|callback_customInArray');
            //  $this->form_validation->set_rules('student_course', $this->lang->line('create_user_validation_course_label'), 'required|xss_clean|callback_courseInArray');
            $this->form_validation->set_rules('userCaptcha', 'Captcha', 'required|callback_check_captcha');
            $userCaptcha = $this->input->post('userCaptcha');
            //  if (!empty($_FILES['image']['name'])) {
            //$this->form_validation->set_rules('image', "Image", 'callback__image_check[' . $_FILES['image']['name'] . ']');
            //  }
            if ($this->form_validation->run() == true) {
                // $username = $this->input->post('first_name') . ' ' . $this->input->post('last_name');
                $username = $this->input->post('first_name');
                $email = strtolower($this->input->post('email'));
                $password = $this->input->post('password');
                //$image = $_FILES['image']['name'];
                $additional_data = array(
                    'first_name' => $this->input->post('first_name'),
                    // 'last_name' => $this->input->post('last_name'),
                    'phone' => $this->input->post('phone'),
                    'date_of_registration' => date('Y-m-d'),
                    'register_from_page' => 'register1'
                        //  'class' => $this->input->post('student_class'),
                        //  'school' => $this->input->post('school'),
                        //  'school_address' => $this->input->post('school_address'),
                        //  'father_mother_guardian_name' => $this->input->post('father_mother_guardian_name'),
                        //   'home_address' => $this->input->post('home_address'),
                        //	'course' => $this->input->post('student_course'),
                );
                //if (!empty($image))
                //  $additional_data['image'] = $image;
                $register = $this->ion_auth->register($username, $password, $email, $additional_data);
                $this->prepare_flashmessage($this->ion_auth->messages(), 2);
                $this->load->model('Member');
                for ($i = 1; $i <= 10; $i++) {
                    $name = $this->input->post('refer_friendname_' . $i);
                    $class = $this->input->post('refer_friendclass_' . $i);
                    $referal_email = $this->input->post('refer_friendemail_' . $i);
                    if (!empty($name) && !empty($referal_email)) {
                        $referal_data = array(
                            'first_name' => $name,
                            'refered_by' => $email,
                            'email' => $referal_email,
                            'refered_dt' => date('Y-m-d H:i:s'),
                            'class' => $class
                        );
                        $intLastInsertId = $this->Member->addReferalAccount($referal_data);
                        if (!empty($intLastInsertId)) {
                            $register_page_url = base_url() . 'register2';
                            $data = array('register_url' => $register_page_url,
                                'your_name' => ucwords($name),
                                'refered_by_name' => $username);
                            $message = $this->load->view('emails/referral_email', $data, TRUE);
                            $from = $this->config->item('site_settings')->contact_email;
                            $sub = ucwords($username) . " recommends " . $this->config->item('site_name') . " to you";
                            /* Setup Email configuration */
                            $config = Array(
                                'mailtype' => 'html',
                                'smtp_host' => $this->config->item('smtp_host'),
                                'smtp_user' => $this->config->item('smtp_user'),
                                'smtp_pass' => $this->config->item('smtp_pass'),
                                'smtp_port' => $this->config->item('smtp_port'),
                                'charset' => 'utf-8',
                                'newline' => '\r\n',
                                'mailtype' => 'html',
                                'wordwrap' => TRUE
                            );
                            $this->load->library('email', $config);
                            $this->email->set_newline("\r\n");
                            $this->email->from($from, $this->config->item('site_name'));
                            $this->email->to($referal_email);
                            $this->email->subject($sub);
                            $this->email->message($message);
                            if (!$this->email->send()) {
                                echo $this->email->print_debugger();
                                exit;
                            }
                            /*                             * ***************************************** */
                        }
                    }
                }
                //redirect("login", 'refresh');
                redirect("register_success");
            }
            /*  if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data)) {
              //check to see if we are creating the user
              //redirect them back to the admin page
              $this->prepare_flashmessage($this->ion_auth->messages(), 2);
              redirect("auth/login", 'refresh');
              } else {
              //display the create user form
              //set the flash data error message if there is one
              $this->prepare_flashmessage((validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message'))), 1);
              redirect("auth/create_user", 'refresh');
              } */
        }
        $random_number = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
        $vals = array(
            'word' => $random_number,
            'img_path' => './assets/captcha/',
            'img_url' => base_url() . 'assets/captcha/',
            'img_width' => 140,
            'img_height' => 32,
            'expiration' => 7200
        );
        $this->data['captcha'] = create_captcha($vals);
        $this->session->set_userdata('captchaWord', $this->data['captcha']['word']);
        $this->data['courses'] = $this->base_model->run_query('SELECT * FROM `categories`');
        $this->data['content'] = 'auth/create_user2';
        $this->_render_page('templates/template', $this->data);
    }
    public function check_captcha($str) {
        $word = $this->session->userdata('captchaWord');
        if (strcmp(strtoupper($str), strtoupper($word)) == 0) {
            return true;
        } else {
            $this->form_validation->set_message('check_captcha', 'Please enter correct words!');
            return false;
        }
    }
    public function customInArray($str) {
        $possible_values = array('Class 1', 'Class 2', 'Class 3', 'Class 4', 'Class 5', 'Class 6', 'Class 7', 'Class 8', 'Class 9', 'Class 10', 'Class 11', 'Class 12');
        if (in_array($str, $possible_values)) {
            return true;
        } else {
            $this->form_validation->set_message('customInArray', 'Please select class');
            return false;
        }
    }
    public function courseInArray($str) {
        if ($str == '0' || $str == 0) {
            $this->form_validation->set_message('courseInArray', 'Please select course');
            return false;
        } else {
            return true;
        }
    }
    //edit a user
    function edit_user($id) {
        $this->data['title'] = "Edit User";
        if (!$this->ion_auth->logged_in() || !($this->ion_auth->user()->row()->id == $id)) {
            redirect('auth', 'refresh');
        }
        $user = $this->ion_auth->user($id)->row();
        $groups = $this->ion_auth->groups()->result_array();
        $currentGroups = $this->ion_auth->get_users_groups($id)->result();
        //validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required|xss_clean');
        $this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'required|xss_clean');
        $this->form_validation->set_rules('groups', $this->lang->line('edit_user_validation_groups_label'), 'xss_clean');
        if (isset($_POST) && !empty($_POST)) {
            // do we have a valid request?
            if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id')) {
                show_error($this->lang->line('error_csrf'));
            }
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'company' => $this->input->post('company'),
                'phone' => $this->input->post('phone'),
            );
            $image = $_FILES['image']['name'];
            if (!empty($image)) {
                unlink('assets/uploads/images/' . $user->image);
                unlink('assets/uploads/images_200_200/' . $user->image);
                unlink('assets/uploads/images_50_50/' . $user->image);
                $ext = explode('.', $image);
                $img = $ext[0] . "_" . $user->id . "." . $ext[1];
                $data['image'] = $img;
            }
            // Only allow updating groups if user is admin
            if ($this->ion_auth->is_admin()) {
                //Update the groups user belongs to
                $groupData = $this->input->post('groups');
                if (isset($groupData) && !empty($groupData)) {
                    $this->ion_auth->remove_from_group('', $id);
                    foreach ($groupData as $grp) {
                        $this->ion_auth->add_to_group($grp, $id);
                    }
                }
            }
            //update the password if it was posted
            if ($this->input->post('password')) {
                $this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
                $this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
                $data['password'] = $this->input->post('password');
            }
            if ($this->form_validation->run() === TRUE) {
                $this->ion_auth->update($user->id, $data);
                //check to see if we are creating the user
                //redirect them back to the admin page
                $this->session->set_flashdata('message', "User Saved");
                if ($this->ion_auth->is_admin()) {
                    redirect('auth', 'refresh');
                } else {
                    redirect('/', 'refresh');
                }
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
        $this->data['content'] = 'auth/edit_user';
        $this->_render_page('common/user_template', $this->data);
        //$this->_render_page('auth/edit_user', $this->data);
    }
//scholarship form a new user
    function scholarship() {
        $this->data['title'] = 'Apply Today for Olympiad Scholarship';
        $this->data['meta_description'] = 'Register today and avail upto 40% on olympiad scholarship. Try Today!';
        //$this->load->config('ion_auth');
        $this->config->load('ion_auth', TRUE);
        $tables = $this->config->item('tables', 'ion_auth');
        $table = 'categories';
        $this->ion_auth->logged_in();
        if (!$this->ion_auth->logged_in()) {
            $this->data['course'] = $this->base_model->run_query('SELECT name,catid FROM ' . $this->db->dbprefix($table));
        } elseif ($this->ion_auth->is_admin()) {
            $this->data['course'] = $this->base_model->run_query('SELECT name,catid FROM ' . $this->db->dbprefix($table));
        } else {
            $user_id = $this->ion_auth->get_user_id();
            $student_info = $this->base_model->run_query("SELECT course FROM " . $this->db->dbprefix('users') . " WHERE `id`='" . $user_id . "'");
            $this->data['course'] = $this->base_model->run_query("SELECT name,catid FROM " . $this->db->dbprefix($table) . " WHERE catid='" . $student_info[0]->course . "'");
        }
        $this->data['content'] = 'auth/scholarship';
        $this->_render_page('templates/template', $this->data);
    }
    function scholarship_form() {
        $this->load->library('email');
        $email_config = $this->config->item('email_config', 'ion_auth');
        $this->load->library('form_validation');
        $course = serialize($this->input->post('course'));
        $quizdata = $this->input->post('course');
        $this->form_validation->set_rules('course', 'Course', 'required|xss_clean');
        foreach ($quizdata as $val) {
            $value.=$val . ' , ';
        }
        $msg = '<table>
        <tr>
               <td align="center"><img src="' . base_url() . 'assets/uploads/logo.png"></td>
        </tr>
        <tr>
               <td>
                   <table>
                              <tr>
                              <td>Student Name</td> <td>' . $this->input->post('student_name') . '</td>
                              </tr>
                            <tr>
                              <td>Email</td> <td>' . $this->input->post('email') . '</td>
                              </tr>
                              <tr>
                              <td>Phone </td> <td>' . $this->input->post('phone') . '</td>
                              </tr>
                              <tr>
                              <td>Class</td> <td>' . $this->input->post('studentclass') . '</td>
                              </tr>
                             
                              <tr>
                              <td>School Name</td> <td>' . $this->input->post('school') . '</td>
                              </tr>
                              
                              <tr>
                              <td>School Address </td> <td>' . $this->input->post('school_address') . '</td>
                              </tr>
                               <tr>
                              <td>Guardian Name</td> <td>' . $this->input->post('father_mother_guardian_name') . '</td>
                              </tr>
                               <tr>
                              <td>Home Address </td> <td>' . $this->input->post('home_address') . '</td>
                              </tr>
 
                               <tr>
                              <td>Courses applied </td> <td>' . $value . '</td>
                              </tr>
                                <tr>
                              <td>Academic Record </td> 
                              </tr>
                              <tr>
                              <td>Last class </td> <td>' . $this->input->post('last_class') . '</td>
                              </tr>
                              <tr>
                              <td>Grade/percentage </td> <td>' . $this->input->post('grade') . '</td>
                              </tr>
                              <tr>
                              <td>Competitive exams </td> <td>' . $this->input->post('competitive_exam') . '</td>
                              </tr>
                              <tr>
                              <td>Olympiads, NSTSE ,other</td> <td>' . $this->input->post('olympiad_grade') . '</td>
                              </tr>
                              <tr>
                              <td>Roll No. </td> <td>' . $this->input->post('roll_no') . '</td>
                              </tr>
                              <tr>
                              <td>Position </td> <td>' . $this->input->post('position') . '</td>
                              </tr>
                              <tr>
                              <td>Marks </td> <td>' . $this->input->post('marks') . '</td>
                              </tr>
                              <tr>
                              <td>Remarks </td> <td>' . $this->input->post('remarks') . '</td>
                              </tr>
                              
                   </table>
               </td>
        </tr>
        <tr>
        </tr>
        <tr>
               <td align="center"> © 2016 Olympiad Success. All Rights Reserved.</td>
        </tr>
</table>';
        $additional_data = array(
            'student_name' => $this->input->post('student_name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'class' => $this->input->post('studentclass'),
            'school' => $this->input->post('school'),
            'school_address' => $this->input->post('school_address'),
            'father_mother_guardian_name' => $this->input->post('father_mother_guardian_name'),
            'home_address' => $this->input->post('home_address'),
            'course' => $course,
            'last_class' => $this->input->post('last_class'),
            'competitive_exam' => $this->input->post('competitive_exam'),
            'roll_no' => $this->input->post('roll_no'),
            'marks' => $this->input->post('marks'),
            'grade' => $this->input->post('grade'),
            'olympiad_grade' => $this->input->post('olympiad_grade'),
            'position' => $this->input->post('position'),
            'other' => $this->input->post('other'),
            'remarks' => $this->input->post('remarks'),
            'brief_discription' => $this->input->post('brief_discription'),
        );
        //print_r($additional_data); 
        $result = $this->base_model->insert_operation($additional_data, $this->db->dbprefix('scholarship'));
        if ($result == '1') {
            //$from=$this->input->post('email');
            //$to = "info@olympiadsuccess.com";
            $subject = "Scholarship Request";
            $this->load->library('email');
            $config = Array(
                'protocol' => 'smtp',
                'mailtype' => 'html',
                'smtp_host' => $this->config->item('smtp_host'),
                'smtp_user' => $this->config->item('smtp_user'),
                'smtp_pass' => $this->config->item('smtp_pass'),
                'smtp_port' => $this->config->item('smtp_port'),
                'charset' => 'utf-8',
                'newline' => '\r\n',
                'mailtype' => 'html',
                'wordwrap' => TRUE
            );
            $this->email->initialize($config);
            $this->email->set_newline("\r\n");
            $to = "support@olympiadsuccess.com";
            //mail($to,$subject,$msg,$headers);
            $from = 'info@olympiadsuccess.com';
            $this->email->from($from, 'Olympiad Success');
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($msg);
            $this->email->send();
            if ($this->email->send()) {
                $this->session->set_flashdata('message', 'Your request has been submitted successfully. We will get back to you with scholarship details within 24 hours.');
            } else {
                echo "There has been an error";
                exit;
            }
            redirect("auth/scholarship", 'refresh');
        } else {
            $this->session->set_flashdata('message', 'scholarship form submit error');
            redirect("auth/scholarship", 'refresh');
        }
    }
    // create a new group
    function create_group() {
        $this->data['title'] = $this->lang->line('create_group_title');
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('auth', 'refresh');
        }
        //validate form input
        $this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label'), 'required|alpha_dash|xss_clean');
        $this->form_validation->set_rules('description', $this->lang->line('create_group_validation_desc_label'), 'xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('description'));
            if ($new_group_id) {
                // check to see if we are creating the group
                // redirect them back to the admin page
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("auth", 'refresh');
            }
        } else {
            //display the create group form
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
            $this->data['group_name'] = array(
                'name' => 'group_name',
                'id' => 'group_name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('group_name'),
            );
            $this->data['description'] = array(
                'name' => 'description',
                'id' => 'description',
                'type' => 'text',
                'value' => $this->form_validation->set_value('description'),
            );
            $this->_render_page('auth/create_group', $this->data);
        }
    }
    //edit a group
    function edit_group($id) {
        // bail if no group id given
        if (!$id || empty($id)) {
            redirect('auth', 'refresh');
        }
        $this->data['title'] = $this->lang->line('edit_group_title');
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('auth', 'refresh');
        }
        $group = $this->ion_auth->group($id)->row();
        //validate form input
        $this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'required|alpha_dash|xss_clean');
        $this->form_validation->set_rules('group_description', $this->lang->line('edit_group_validation_desc_label'), 'xss_clean');
        if (isset($_POST) && !empty($_POST)) {
            if ($this->form_validation->run() === TRUE) {
                $group_update = $this->ion_auth->update_group($id, $_POST['group_name'], $_POST['group_description']);
                if ($group_update) {
                    $this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));
                } else {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
                }
                redirect("auth", 'refresh');
            }
        }
        //set the flash data error message if there is one
        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
        //pass the user to the view
        $this->data['group'] = $group;
        $this->data['group_name'] = array(
            'name' => 'group_name',
            'id' => 'group_name',
            'type' => 'text',
            'value' => $this->form_validation->set_value('group_name', $group->name),
        );
        $this->data['group_description'] = array(
            'name' => 'group_description',
            'id' => 'group_description',
            'type' => 'text',
            'value' => $this->form_validation->set_value('group_description', $group->description),
        );
        $this->_render_page('auth/edit_group', $this->data);
    }
    public function validate_before_buy() {
        if ($this->input->is_ajax_request()) {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            $mobile = $this->input->post('mobile');
            $country_code = $this->input->post('country_code');
            $confirm_password = $this->input->post('confirm_password');
            $buy_class = $this->input->post('buy_class');
            $choose_course_slug = $this->input->post('choose_course');
            $arrSubjects = $this->input->post('categories');
            $this->load->model('category');
            $intCourseId = $this->category->getCourseIdBySlug($choose_course_slug);
            $school_id   = $this->input->post('school_id');
            
            $name = trim($name);
            $email = trim($email);
            $password = trim($password);
            $confirm_password = trim($confirm_password);
            if (empty($intCourseId)) {
                $response = array('success' => false, 'message' => 'Please choose the course');
                echo json_encode($response);
                exit;
            }
            if (count($arrSubjects) == 0 || empty($arrSubjects)) {
                $response = array('success' => false, 'message' => 'Please select atleast one subject');
                echo json_encode($response);
                exit;
            }
            if (empty($buy_class)) {
                $response = array('success' => false, 'message' => 'Please choose the class');
                echo json_encode($response);
                exit;
            }
            if (empty($name)) {
                $response = array('success' => false, 'message' => 'Please enter your name');
                echo json_encode($response);
                exit;
            }
            if (empty($email)) {
                $response = array('success' => false, 'message' => 'Please enter your email');
                echo json_encode($response);
                exit;
            }
           if (empty($mobile)) {
               $response = array('success' => false, 'message' => 'Please enter your mobile number');
               echo json_encode($response);
               exit;
           }
            if (empty($password)) {
                $response = array('success' => false, 'message' => 'Please enter password');
                echo json_encode($response);
                exit;
            }
            if (empty($confirm_password)) {
                $response = array('success' => false, 'message' => 'Please enter confirm password');
                echo json_encode($response);
                exit;
            }
            if ($confirm_password != $password) {
                $response = array('success' => false, 'message' => 'Your password and confirmation password does not match');
                echo json_encode($response);
                exit;
            }
            $this->load->model('member');
            if ($this->member->isEmailExists($email)) {
                $arrUserDetail = $this->member->getUserDetailByEmail($email);
                $existingClass = $arrUserDetail[0]['class'];
                if ($existingClass != $buy_class) {
                    if (empty($existingClass)) {
                        $this->load->model('member');
                        $update = array('class' => $buy_class);
                        $this->member->update($update, $email);
                    } else {
                        $response = array('success' => false, 'message' => 'This email Id is already registered for ' . $existingClass . '. Please choose the same class or change the email id to proceed');
                        echo json_encode($response);
                        exit;
                    }
                }
                $intExistingCourseId = $arrUserDetail[0]['course'];
                if ($intCourseId != $intExistingCourseId) {
                    if (empty($intExistingCourseId)) {
                        $update = array('course' => $intCourseId);
                        $this->member->update($update, $email);
                    } else {
                        $this->load->model('course_model');
                        $this->course_model->strCondition = " AND categories.catid = " . $intExistingCourseId;
                        $arrCourseDetail = $this->course_model->getCourseDetail();
                        $courseName = $arrCourseDetail[0]['name'];
                        $response = array('success' => false, 'message' => 'This email Id is already registered for ' . $courseName . '. Please choose the same course or change the email id to proceed');
                        echo json_encode($response);
                        exit;
                    }
                }
                $update = array('password' => $this->ion_auth_model->hash_password($password));
                $this->member->update($update, $email);
                if ($this->member->createLoginSessionViaEmail($email)) {
                    $response = array('success' => true);
                    echo json_encode($response);
                    exit;
                }
//                echo "<pre>";
//                print_r($arrUserDetail);
//                exi
            } else {
                /* Create new user */
                $mobile = '+'.$country_code.'-'.$mobile;
                $data = array('ip_address' => $_SERVER['REMOTE_ADDR'], 'username' => $name, 'password' => $this->ion_auth_model->hash_password($password),
                    'email' => $email, 'active' => '1', 'first_name' => $name, 'course' => $intCourseId,
                    'class' => $buy_class, 'date_of_registration' => date('Y-m-d H:i:s'), 'register_from_page' => 'BUY',
                    'school_portal_id' => $school_id, 'phone' => $mobile, 'last_login' => date('Y-m-d H:i:s'));
                $intLastInsertId = $this->member->createUserManually($data);
                if (!empty($intLastInsertId)) {
                    /* Keep the school Id in session to save in database and destroy it after successfull payment */
                    $this->session->set_userdata('school_id_for_payment',$school_id);
                    if ($this->member->createLoginSessionViaEmail($email)) {
                        $response = array('success' => true, '');
                        echo json_encode($response);
                        exit;
                    }
                }
            }
           
            $response = array('success' => false);
            echo json_encode($response);
            exit;
        }
    }
}
