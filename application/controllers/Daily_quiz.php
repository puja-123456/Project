<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Daily_quiz extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('base_model');

        // $this->load->library('ion_auth');
        //         if ($this->ion_auth->logged_in() && !$this->ion_auth->is_admin()) {
        //     $user_id = $this->ion_auth->get_user_id();
        //     $table = 'users';
        //     $user_arr = $this->base_model->run_query("select class from " . $table . " where id='" . $user_id . "'");
        //     // $this->usr_course = $user_arr[0]->course;
        //     $this->usr_cls = $user_arr[0]->class;
        // }
    }
    function index(){

        if($this->uri->segment(1) != 'daily-quiz'){
            redirect(base_url());
        }
        // if (!$this->ion_auth->logged_in()) {
        //     $this->session->set_userdata('post_login_url','daily-quiz');
        //     redirect('login', 'refresh');
        // }else{
            redirect('daily-quiz/start');
        // }

        // $this->data['title'] = 'Daily Quiz for everybody!';
        // $this->data['meta_description'] = 'Daily Quiz for your child can be found here';

        // $this->data['content'] = "daily_quiz/index";
        // $this->_render_page('templates/template', $this->data);
    }

    function start(){



         if ($this->input->post()) {
            # code...

            $class=$this->input->post('class');
            $subject=$this->input->post('subject');

            //$this->usr_cls = $class;

            //$url=base_url().$subject;

            if($class < 10)
            {
               $cls="0".$class;  
            }
            else
            {                
                $cls=$class;
            }

            redirect(base_url().'daily-quiz/start/'.$subject.$cls);

        }

        // if (!$this->ion_auth->logged_in()) {
        //     $this->session->set_userdata('post_login_url','daily-quiz/start');
        //     redirect('login', 'refresh');
        // }
        // $this->session->unset_userdata('post_login_url');

        //$date = date("Y-m-d");
        //$where['date_to_show'] = $date;
        //$where['date_to_show'] = "2018-08-16";


       // $where2['user_id'] = $this->ion_auth->get_user_id();

        //$today = date("Y-m-d");
       // $where2['date(timestamp)'] = $today;
        //$where2['date(timestamp)'] = "2018-08-16";
        //check which tests are already given
       //  $check_test = $this->base_model->fetch_records_from('open_questions_quiz_history',$where2,'DISTINCT(quiz_id)');
        
       //  // $tests_given = (array) $check_test;
       //  $tests_given = "(";
       //  foreach ($check_test as $test) {
       //      $tests_given .= "'".$test->quiz_id."'".',';
       //  }
       //  $tests_given = rtrim($tests_given,',');
       //  $tests_given .= ")";



       //  $class = trim( substr($this->usr_cls, -1, 2) );
       //  $cls = (int) $class;
       //  if($cls == 0){
       //      $class = '1'.$class;
       //  }
       //  else if($cls < 10){
       //      $class = '0'.$class;
       //  }

       //  if($tests_given == '()'){
       //      $query = "SELECT DISTINCT(worksheet_id) FROM `open_questions` WHERE `worksheet_id` REGEXP '[A-Z]".$class.".*' LIMIT 10";
       //  }
       //  else{
       //      // echo $query = "SELECT DISTINCT(worksheet_id) FROM `open_questions` WHERE `worksheet_id` REGEXP '[A-Z]".$class.".*' AND worksheet_id NOT IN ".$tests_given." LIMIT 10";die;

       //       $query = "SELECT DISTINCT(worksheet_id) FROM `open_questions` WHERE `worksheet_id` REGEXP '[A-Z]".$class.".*'  LIMIT 10"; 
       //  }


       //  $subjects = $this->base_model->run_query($query);
       
       //  $subjects = $this->base_model->fetch_records_from('open_questions',$where,'DISTINCT(worksheet_id)');
       // //echo $this->db->last_query;die;
       //  if($subjects){
       //      $subjects1 = (array) $subjects[0];

       //      // $subjects = array_unique($subjects1);
       //      foreach ($subjects1 as $subj) {
       //          $this_subject  = substr($subj,0,1);
       //          if($this_subject == 'S'){
       //              $available_subjects[] = 'Science';
       //          }
       //          else if($this_subject == 'M'){
       //              $available_subjects[] = 'Mathematics';
       //          }
       //          else if($this_subject == 'E'){
       //              $available_subjects[] = 'English';
       //          }
       //          else if($this_subject == 'C'){
       //              $available_subjects[] = 'Cyber';
       //          }
       //          // else if($this_subject == 'L'){
       //          //     $available_subjects[] = 'Logical Reasoning';
       //          // }
       //          else if($this_subject == 'F'){
       //              $available_subjects[] = 'French';
       //          }
       //      }
            
       //  }else{
       //      $available_subjects[] = "No";
       //  }

        // $this->data['this_student_class'] = $this->usr_cls;

        // $this->data['available_subjects'] = $available_subjects;
        $this->data['title'] = 'Daily Quiz for everybody!';
        $this->data['meta_description'] = 'Daily Quiz for your child can be found here';

        $this->data['content'] = "daily_quiz/quiz";
        $this->_render_page('templates/template', $this->data);
    }

    function get_questions(){


        // if (!$this->ion_auth->logged_in()) {
        //     $this->session->set_userdata('post_login_url','daily-quiz/start');
        //     redirect('login', 'refresh');
        // }
        // $this->session->unset_userdata('post_login_url');

        $user_id_query = "SELECT DISTINCT user_id FROM open_questions_ans";

 
       
        $user_ids = $this->db->query($user_id_query)->result();

             function create_user_id() {
                
                $id = rand();

                
                if (in_array($id, $user_ids)) {
                    $this->create_ref();
                }else{
                    return $id;
                }
                
            }

      


            $user_id = create_user_id();

         $this->session->set_userdata('user_id',$user_id);

        //$date = date("Y-m-d");
        $current_url = $this->uri->segment(3);
        // $where['date_to_show'] = $date;
        if($current_url=="C01")
        {
            $url="C02";
        }
        else
        {
            $url=$current_url;
        }
        // $where['worksheet_id LIKE'] = "$url%";

        // $subjects = $this->base_model->fetch_records_from('open_questions',$where);

         $query = "SELECT * FROM ( SELECT questionid,question,questionImage,answer1,answer1Image,answer2,answer2Image,answer3,answer3Image,answer4,answer4Image,answer5,answer5Image,correctanswer,question_type,worksheet_id,attempt_counter FROM open_questions WHERE worksheet_id LIKE '"."$url"."%"."' ORDER BY rand() LIMIT 10 ) T1  ORDER BY attempt_counter ASC"; 

          $questions = $this->db->query($query)->result();



        if(count($questions)==0)
        {
            $available_subjects[] = "No";
        

        //$this->data['this_student_class'] = $this->usr_cls;

        $this->data['available_subjects'] = $available_subjects;
        $this->data['title'] = 'Daily Quiz for everybody!';
        $this->data['meta_description'] = 'Daily Quiz for your child can be found here';

        $this->data['content'] = "daily_quiz/quiz";
        $this->_render_page('templates/template', $this->data);
        }

        else
        {

        //$where2['user_id'] = $this->ion_auth->get_user_id();

        //$today = date("Y-m-d");
        //$where2['date(timestamp)'] = $today;
        // $where2['date(timestamp)'] = $today;
        // //check which tests are already given
        // $check_test = $this->base_model->fetch_records_from('open_questions_quiz_history',$where2,'DISTINCT(quiz_id)');
        // $tests_given = (array) $check_test;
        // $tests_given = "(";
        // foreach ($check_test as $test) {
        //     $tests_given .= "'".$test->quiz_id."'".',';
        // }
        // $tests_given = rtrim($tests_given,',');
        // $tests_given .= ")";

        // $class = trim( substr($this->usr_cls, -1, 2) );
        // $cls = (int) $class;
        // if($cls == 0){
        //     $class = '1'.$class;
        // }
        // else if($cls < 10){
        //     $class = '0'.$class;
        // }

        // if($tests_given == '()'){
            // $query = "SELECT * FROM ( SELECT * FROM open_questions WHERE worksheet_id LIKE '"."$url"."%"."' ORDER BY rand() LIMIT 50 ) T1  ORDER BY attempt_counter ASC";

 
            //echo $query;die;
        // }
        // else{
        //    $query = "SELECT * FROM `open_questions` WHERE `worksheet_id` LIKE '"."$url"."%"."' AND worksheet_id NOT IN ".$tests_given." LIMIT 10"; 
        // }
        // var_dump($query);
        // exit();
        // echo "HI";
        // echo $this->db->last_query();
        // exit();
        // var_dump($query);
        // exit();
        // $subjects1 = (array) $subjects[0];

        // $questions = $this->base_model->fetch_records_from('open_questions',$where,'*','','10');
        // $questions = $this->db->query($query)->result();
        // $subjects = array_unique($subjects1);
        //$this_subject  = $url;
        $this_subject  = substr($url,0,1);
        if($this_subject == 'S'){
            $this_subject_name = 'Science';
        }
        else if($this_subject == 'M'){
            $this_subject_name = 'Mathematics';
        }
        else if($this_subject == 'E'){
            $this_subject_name = 'English';
        }
        else if($this_subject == 'C'){
            $this_subject_name = 'Cyber';
        }
        // else if($this_subject == 'L'){
        //     $this_subject_name = 'Logical Reasoning';
        // }
        else if($this_subject == 'F'){
            $this_subject_name = 'French';
        }

         $this_class  = substr($url,1,2);
         if ($current_url=="C01") {
             # code...
            $usr_cls="1";
         }
         else if($this_class<10)
         {
            $usr_cls=substr($this_class,1,1);
            
         }         
         else
         {
            
            $usr_cls=$this_class;
         }
        // foreach ($subjects1 as $subj) {
        // }
        $this->data['this_subject'] = $this_subject;
        $this->data['this_subject_name'] = $this_subject_name;

        $this->data['this_student_class'] = $usr_cls;

        $this->data['questions'] = $questions;
        $this->data['title'] = 'Daily Quiz for everybody!';
        $this->data['meta_description'] = 'Daily Quiz for your child can be found here';

        $this->data['content'] = "daily_quiz/questions";
        // echo "<pre>";
        // var_dump( $this->data);
        // exit();
        $this->_render_page('templates/template', $this->data);
    }
    }

    function submit(){
        // if (!$this->ion_auth->logged_in()) {
        //     $this->session->set_userdata('post_login_url','daily-quiz/start');
        //     redirect('login', 'refresh');
        // }
        // $this->session->unset_userdata('post_login_url');

        if($this->input->post()){

            
          
            $questions = $this->input->post();
            // echo "<pre/>";
            // print_r($questions);die;
            $user_id=$this->session->userdata('user_id');
            $inputdata['user_id'] = $user_id;
            $quiz_id = $inputdata['quiz_id'] = $this->input->post('worksheet_id');
            $usr_cls=$this->input->post('student_class');

            function array_except($array, $keys)
            {
            return array_diff_key($array, array_flip((array) $keys));   
            } 

               $question_ids = array_except($questions, ['worksheet_id', 'student_class','counter','comment']);
               $questionids = array_pop($question_ids);

             array_keys($question_ids);

             // print_r($question_ids);die;


             $ids="";

             
            foreach ($question_ids as $key => $value) {
                # code...

                $ids.=$key.",";

            }

            $q_ids=rtrim($ids,",");
            //echo $q_ids;die;

            
            // if($this->base_model->insert_operation($this->db->dbprefix('open_questions_quiz_history'),$inputdata))
            // {
            //     //echo "WORKSHEET SUCCESSFULLY";
            // } 

            

            

            date_default_timezone_set('Asia/Kolkata');
            $timestamp = date("Y-m-d H:i:s");


            

            foreach ($questions as $q_key => $q_ans) {
                // echo $q_key;
                if(is_numeric($q_key)){
                    // exit();
                    
                    if( strlen($q_ans) > 0){
                        // echo $q_ans;
                        //$question_ids[]=$q_key;
                        $inputdata1['questionid'] = $q_key;
                        $inputdata1['answer'] = htmlspecialchars($q_ans);
                        $inputdata1['user_id'] = $user_id;
                        $inputdata1['timestamp'] = $timestamp;
                        // echo $q_key." ".$q_ans."<br>";
                        if($this->base_model->insert_operation($this->db->dbprefix('open_questions_ans'),$inputdata1)){
                            // echo "SUCCESS";

                        }

                         $where1['questionid'] = $q_key;

                         $query = "SELECT attempt_counter FROM open_questions WHERE questionid = '".$q_key."'";         


                        $attempt_counter_details = $this->db->query($query)->result();
                        //print_r($attempt_counter_details);


                        $updatedata1['attempt_counter']=$attempt_counter_details[0]->attempt_counter+1;
                        $this->base_model->update_operation($updatedata1,$this->db->dbprefix('open_questions'),$where1);
                        //echo $this->db->last_query();die;
                    }
                }
            }
            // $question_array = (object)[];
            //$query = "SELECT * FROM `open_questions` WHERE `worksheet_id` = '".$inputdata['quiz_id']."' LIMIT 10";

            

            //$query = "SELECT * FROM `open_questions` WHERE `worksheet_id` = '".$inputdata['quiz_id']."' LIMIT 10";

           

            $query = "SELECT * FROM `open_questions` WHERE `questionid` IN  (".$q_ids.") ORDER BY FIND_IN_SET(questionid, '".$q_ids."')";

            $questions_correct = $this->db->query($query)->result();



            $i =0;
            foreach ($questions_correct as $q) {
                foreach ($questions as $q_key => $q_ans) {
                    if(is_numeric($q_key)){
                        // exit();

                        if((int)$q->questionid == $q_key){
                            $question_array[$i]->question_type = $q->question_type;
                            $question_array[$i]->questionid = $q->questionid;
                            $question_array[$i]->question = $q->question;
                            $question_array[$i]->questionImage = $q->questionImage;
                            $c_ans_key = $q->correctanswer;
                            if($c_ans_key == 'a'){
                                $question_array[$i]->c_ans = $q->answer1;
                                $question_array[$i]->c_img = $q->answer1Image;
                            }
                            else if($c_ans_key == 'b'){
                                $question_array[$i]->c_ans = $q->answer2;
                                $question_array[$i]->c_img = $q->answer2Image;
                            }
                            else if($c_ans_key == 'c'){
                                $question_array[$i]->c_ans = $q->answer3;
                                $question_array[$i]->c_img = $q->answer3Image;
                            }
                            else{
                                $question_array[$i]->c_ans = $q->answer4;
                                $question_array[$i]->c_img = $q->answer4Image;
                            }
                            $question_array[$i]->y_ans = $q_ans;
                            $question_array[$i]->hint = $q->hint;

                            $i++;
                        }
                    }
                }
            }
            // echo "<pre>";
            // var_dump($question_array);
            // exit();
            // $this_subject  = $url;
            $this_subject  = substr($quiz_id,0,1);
            if($this_subject == 'S'){
                $this_subject_name = 'Science';
            }
            else if($this_subject == 'M'){
                $this_subject_name = 'Mathematics';
            }
            else if($this_subject == 'E'){
                $this_subject_name = 'English';
            }
            else if($this_subject == 'C'){
                $this_subject_name = 'Cyber';
            }
            // else if($this_subject == 'L'){
            //     $this_subject_name = 'Logical Reasoning';
            // }
            else if($this_subject == 'F'){
                $this_subject_name = 'French';
            }

            
            $this->data['this_student_class'] = $usr_cls;
            $this->data['this_subject'] = $this_subject;
            $this->data['this_subject_name'] = $this_subject_name;

            $this->data['question_array'] = $question_array;
            $this->data['content'] = "daily_quiz/correct_answers";
            $this->_render_page('templates/template', $this->data);

        }
        else{
            redirect('daily-quiz');
        }
    }

    //  function markQuestionFlag() {


     

    //     $userid = $this->session->userdata('user_id');
    //     $intQuestionId = $this->input->post('intQuestionId');

    //     /* $sql = " INSERT INTO flag_marked_questions (question_id,markedby_userid) "
    //       . " values (" . $intQuestionId ."," . $userid .")";
    //       $this->base_model->run_query($sql); */

    //     $currentDate = date("Y-m-d h:i:s");
    //     $insertData = array('question_id' => $intQuestionId, 'markedby_userid' => $userid, 'marked_dt' => $currentDate);

       

    //     $this->db->insert($this->db->dbprefix('flag_marked_questions'), $insertData);

    //     $this->db->insert_id('flag_marked_questions');

    //     /* Update worksheet id */
    //     $sql = " UPDATE flag_marked_questions 
    //                 LEFT JOIN open_questions ON flag_marked_questions.question_id = open_questions.questionid
    //              SET  flag_marked_questions.worksheet_id = open_questions.worksheet_id ";
    //     $this->db->query($sql);

    //     /*         * *************** */

    //     $response = array('success' => true, 'intQuestionId' => $intQuestionId);
    //     echo json_encode($response);
    //     exit;
    
    // }

    public function sendFlagMail() {

        if($this->input->post()){

        $userid = $this->session->userdata('user_id');
        $intQuestionId = $this->input->post('intQuestionId');

        $description = $this->input->post('description');

        if(!empty($description))
        {

        /* Update Database */
        // $this->db->where(array('question_id' => $intQuestionId, 'markedby_userid' => $userid));
        // $data = array('description' => $description);
        // $this->db->update($this->db->dbprefix('flag_marked_questions'), $data);
         date_default_timezone_set('Asia/Kolkata');
           

        $currentDate = date("Y-m-d h:i:s");
        $insertData = array('question_id' => $intQuestionId, 'markedby_userid' => $userid,'description' => $description, 'marked_dt' => $currentDate);

       

        $this->db->insert($this->db->dbprefix('flag_marked_questions'), $insertData);

        $this->db->insert_id('flag_marked_questions');

        /* Update worksheet id */
        $sql = " UPDATE flag_marked_questions 
                    LEFT JOIN open_questions ON flag_marked_questions.question_id = open_questions.questionid
                 SET  flag_marked_questions.worksheet_id = open_questions.worksheet_id ";
        $this->db->query($sql);

        }

        /* Sending Mail */
       /* $this->load->library('email');
        $message = 'The question having Id : ' . $intQuestionId . ' is flagged by ' . $userid;
        $from_email = $this->config->item('smtp_user');
        $site_title = $this->config->item('site_name');
        

        $this->load->model('question');
        $questionDetail = $this->question->getQuestionDetail($userid);

        $worksheetId = '';
        if (count($questionDetail) > 0) {
            $worksheetId = $questionDetail[0]['worksheet_id'];
        }


        $message = "Hello Admin,<br/><br/> ";
        $message .= 'The question having Id : ' . $intQuestionId . ' is flagged by ' . $userid;

        if (!empty($description)) {
            $message .= "<br/><br/> The description is as follows : <br/><br/> ";
            $message .= $description;
        }


        $to = 'support@loyaltysquare.com';
        $sub = $site_title . ' - Question Flagged of worksheet: ' . $worksheetId;



        $this->email->from($from_email, 'Olympiad');
        $this->email->to($to);
        $this->email->subject($sub);
        $this->email->message($message);



        if ($this->email->send()) {
            echo "true";
            exit;
        } else {
            echo $this->email->print_debugger();
            exit;
        } */
         echo "true";
            exit;
    }
}
}

?>