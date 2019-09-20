<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends MY_Controller {
 
    //Authenticate User for each function by calling the Parent Method validate_normaluser() in Constructor.
    function __construct() {
        
       
        

        parent::__construct();

        //$this->load->library('googleplus');
        
        //date_default_timezone_set('Asia/Kolkata');

        $this->validate_normaluser();
        
        
        //$settings = $this->db->get('general_settings')->result()[0];
        // $this->data['settings'] = $settings;

        // if ($this->ion_auth->logged_in() && !$this->ion_auth->is_admin()) {
        //     // echo "login";
        //     // exit();
        //     $user_id = $this->ion_auth->get_user_id();
        //     $table = 'users';
        //     $user_arr = $this->base_model->run_query("select course, class from " . $table . " where id='" . $user_id . "'");
        //     $this->usr_course = $user_arr[0]->course;
        //     $this->usr_cls = $user_arr[0]->class;

        // }
    }

    //User Dashboard (Default Function. If no function is called, this function will be called)
    public function index() {
        
    
    } 


    public function instructions() {
        //$this->session->unset_userdata('discount_amount');
        date_default_timezone_set('Asia/Kolkata');

      
         // $quiz_subscription_info = $this->db->query("SELECT * FROM quizsubscriptions WHERE user_id='" . $this->session->userdata('user_id') . "' and status=1")->row_array();
          $quiz_subscription_info = $this->db->query("SELECT * FROM quizsubscriptions WHERE user_id='" . $this->session->userdata('user_id') . "' AND exam_status=1 AND DATE(from_date) = CURDATE()")->row_array();
          // print_r($quiz_subscription_info); die;

         $today_date= date('Y-m-d H:i:s');
         //$today_date='2019-03-22 00:00:00';

     

        
// $date=  date(strtotime($quiz_subscription_info['from_date']), strtotime("-10 minute"));

// echo date('Y-m-d H:i:s',strtotime($date));die;

$start_date=date("Y-m-d H:i:s", strtotime($quiz_subscription_info['from_date']) - 600);





         if( $today_date >= $start_date && $today_date <= $quiz_subscription_info['to_date'])
         { 

           /*  $quiz_id_info = $this->db->query("SELECT quiz_id FROM question_assign WHERE find_in_set('" . $quiz_subscription_info['worksheet_id'] . "',assigned_worksheet_ids) <> 0")->row_array();*/

         

              $quiz_id_info = $this->db->query("SELECT quiz_id FROM question_assign WHERE worksheet_id='"  . $quiz_subscription_info['worksheet_id'] . "'")->row_array();

              // print_r($quiz_slug_info);die;

             


              $quiz_slug_info = $this->db->query("SELECT slug FROM quiz WHERE quizid='" . $quiz_id_info['quiz_id'] . "'")->row_array();

         // print_r($quiz_slug_info);die;


        //$sub_cat ="mock-test---47-0";
        $sub_cat =$quiz_slug_info['slug']; 
       
        $this->data['records_for_all'] = array();
      
        $this->data['records'] = $this->base_model->run_query(
                "select q.*,c.name as catname,s.name as subcatname from "
                . $this->db->dbprefix('quiz') . " q," . $this->db->dbprefix('category')
                . " c," . $this->db->dbprefix('subcategory') . " s where c.catid=q.catid
		and s.subcatid=q.subcatid"
        );
      
        $options_for_all = array();
        $options = array();
        $this->data['is_authorized'] = FALSE;
        $i = 0;
        
        foreach ($this->data['records'] as $key => $val) {

            $options[$i] = $val->quizid;
            $i++;
        }
        
        $this->data['quiz_ids'] = $options;
        $j = 0;
        foreach ($this->data['records_for_all'] as $key => $val) {

            $options_for_all[$j] = $val->quizid;
            $j++;
        }
        
        $records = array();
        $this->data['quiz_ids_for_all'] = $options_for_all;
        //$quiz_slug = $this->uri->segment(3);
        //$quiz_slug = "mock-test---47-0";
        $quiz_slug=$quiz_slug_info['slug'];
        $quiz_info = $this->db->query("SELECT * FROM `quiz` WHERE `slug`='" . $quiz_slug . "'")->row_array();
        //$id = $this->uri->segment(3);
        $id = $intQuizId = $quiz_info['quizid'];

        //print_r($quiz_info);die;
        
       
        

        if ($sub_cat != '') {
            //$free_tr = $this->session->userdata('freetrial');
            $this->data['title'] = 'Exam/Quiz Instructions';
            $this->data['active_menu'] = 'exams';
            $this->data['content'] = 'user/exam/examinstructions';

            // if ($free_tr) {
                $this->data['is_authorized'] = TRUE;
                $table = $this->db->dbprefix('quiz');
                $condition['quizid'] = $id;
                $records = $this->base_model->fetch_records_from(
                        $table, $condition, $select = '*', $order_by = ''
                );
            // } else {
                // $table = $this->db->dbprefix('subcategory');
                // $sub_cat_slug = $sub_cat;
                // $sub_cat_info = $this->db->query("SELECT * FROM `subcategory` WHERE `slug`='" . $sub_cat_slug . "'")->row_array();
                // $sub_cat_id = $sub_cat_info['subcatid'];

                // $condition['subcatid'] = $sub_cat_id;
                // $records = $this->base_model->fetch_records_from(
                //         $table, $condition, $select = '*', $order_by = ''
                // );
            // }

                

            $this->data['exams'] = $records;
            $cource_id = $records[0]->catid;
            $newtable = $this->db->dbprefix('category');
            $newcondition['catid'] = $cource_id;
            $cource = $this->base_model->fetch_records_from(
                    $newtable, $newcondition, $select = '*', $order_by = ''
            );
            $this->data['cource'] = $cource;
            $subcat_arr = $this->base_model->fetch_records_from(
                    $this->db->dbprefix('subcategory'), array('catid' => $records[0]->catid), $select = '*', $order_by = ''
            );

            $this->data['subcat'] = $subcat_arr;

            $sub_cat = $records[0]->subcatid;
            //$payment_info = $this->base_model->run_query("select *, DATEDIFF(expirydate,CURDATE()) AS validity from quizsubscriptions where quizid = " . $id . " and user_id=" . $this->ion_auth->user()->row()->id . " and status='Active' and (case when validitytype = 'Attempts' then remainingattempts>0 else expirydate>=CURDATE() end)");
            // $payment_info = $this->base_model->run_query("select * from quizsubscriptions where quizid = " . $sub_cat . " "
            //         . " and user_id=" . $this->ion_auth->user()->row()->id);


//                        echo "<pre>";
//                        print_r($payment_info);
//                        exit;
//           
            // if ((isset($payment_info) && count($payment_info) > 0) || $records[0]->quiztype == 'Free') {

                $this->data['is_authorized'] = TRUE;
                //$this->data['payment_info'] = $payment_info;


                // $this->load->model('quiz');
                // $quizResult = $this->quiz->getValidity($intQuizId);

                //$this->data['remaining_attempts'] = 0;

//                echo "<pre>";
//                print_r($quizResult);
//                exit;
//                

                // if (count($quizResult) > 0) {
                //     $quiz_type = $quizResult[0]['quiztype'];
                //     if ($quiz_type == 'Free' || strtolower($quiz_type) == 'free') {
                //         $this->data['validity_required'] = false;
                //     } else {
                //         $this->data['validity_required'] = true;
                //     }

                //     $this->load->model('member');
                //     /* Added by ravi */
                //     $objMember = new Member();
                //     $this->data['remaining_attempts'] = $objMember->getQuizRemainingAttempts($this->ion_auth->get_user_id(), $intQuizId);
                // }



                /*                 * THIS BELOW INFORMATION WILL BE FETCHED BACK AT THE TIME OF STARTING THE EXAM(exam/startexam)
                 * * DESTROYED AFTER FINISHING EXAM
                 * */
                $validity_type = '';
                $account_id = '';
                // if ($records[0]->quiztype == 'Paid') {
                //     $validity_type = $payment_info[0]->remainingattempts;
                //     $account_id = $payment_info[0]->id;
                // }
                $account_validation = array(
                    'is_authorized' => $this->data['is_authorized'],
                    'quiz_type' => $records[0]->quiztype,
                    'validitytype' => $records[0]->validitytype,
                    'validityvalue' => $validity_type,
                    'account_id' => $account_id
                );
                $this->session->set_userdata('account_validation', $account_validation);
                $this->session->set_userdata('is_user_account_modified', 0);
                //UNSET SESSION QUESTIONS. AND SET THE isExamStarted BIT TO 1.
                //So that for every request (quiz/exam) new questions will be created.
                $this->session->set_userdata('worksheet_id', $quiz_subscription_info['worksheet_id']);//set worksheet id
                $this->session->unset_userdata('questions');
                $this->session->set_userdata('isExamStarted', 1);

                $this->data['start_date'] = $quiz_subscription_info['from_date'];
                $this->data['end_date'] = $quiz_subscription_info['to_date'];
                $this->data['today_date'] = $today_date;
            // } else {
            //     // echo "Error";exit;
            // }

            // if ($this->session->userdata('school_portal_id')) {
            //     $this->adminschoolLayout();
            // } else {
                $this->_render_page('temp/usertemplate', $this->data);
            // }



            // $this->_render_page('temp/usertemplate', $this->data);
        }
        } else { 
            $this->prepare_flashmessage(" You can take the test only in the slot selected by you or you have already appeared for the test.", 1);
            //redirect('/');
           
            // $this->session->unset_userdata('identity');
            // $this->session->unset_userdata('user_id');
            redirect('crest/access_card', 'refresh');
        }
    }



  
    // Function For Logout
    function logout() {
        $postLogoutUrl = $this->session->userdata('postLogoutUrl');
        $this->session->sess_destroy();
        $this->googleplus->revokeToken();
        $this->prepare_flashmessage("Logout Successful.", 0);
        redirect($postLogoutUrl);
    }

  
  

    public function generateRandomString($length = 10) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

   public function user_entries() {
        $user_id = $this->input->post('user_id');
        $email = $this->input->post('email');
        $ip_address = $this->input->post('ip_address');
        $browser = $this->input->post('browser');

        $data['user_id'] = $user_id;
        $data['email'] = $email;
        $data['ip_address'] = $ip_address;
        $data['browser'] = $browser;
        date_default_timezone_set('Asia/Kolkata');
        $data['date'] = date("d-m-Y h:i:s A");

        $table = $this->db->dbprefix('testEnter');

        $this->base_model->insert_operation($data, $table);
        // $this->session->set_userdata('ins_page', '1');
        echo json_encode(TRUE);
        exit;
    }

    

    
    public function saveExamResponse() {        
        $user_id = $this->input->post('user_id');
        $clicked = trim($this->input->post('clicked'));
        date_default_timezone_set('Asia/Kolkata');
        
        if($clicked == 'CANCEL') {
            $sql = " UPDATE `testEnter` SET cancel_clicked ='Y' WHERE user_id = " . $user_id;
             // echo $sql;exit;
            $this->base_model->run_query($sql);
        } else if($clicked == 'OK') {
            $sql = " UPDATE `testEnter` SET ok_clicked ='Y', test_finish_time ='". NOW()."', formatted_finish_time = '".date("Y-m-d H:i:s")."'  WHERE user_id = " . $user_id;
             // echo $sql;exit;
            $this->base_model->run_query($sql);
        } else if($clicked == 'FINISH') {
            $sql = " UPDATE `testEnter` SET finish_clicked ='Y' WHERE user_id = " . $user_id;
            $this->base_model->run_query($sql);
             // echo $sql;exit;
        }
       // echo $sql;exit;
        
       
        echo json_encode(TRUE);
        exit;
    }
    
    

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */