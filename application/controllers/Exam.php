<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Exam extends MY_Controller {


    function __construct() {
        
        parent::__construct();
        $this->validate_normaluser();
        $this->load->database();
        //$settings = $this->db->get('general_settings')->result()[0];

       // $this->data['settings'] = $settings;

        // $userAnswers = $this->base_model->run_query(
        //     "SELECT question_id, answer,status FROM users_answers  us WHERE us.user_id ='".$this->session->userdata('user_id')."' ORDER by us.question_id ASC"
        //     );

        $userAnswers = $this->base_model->run_query(
            "SELECT question_id, answer,status FROM users_answers  us WHERE us.user_id ='".$this->session->userdata('user_id')."'"
            );

         //$this->data['user_answers'] = $userAnswers;

          $this->session->set_userdata('userAnswers', $userAnswers);


    }

    //Default Function which is called if no function is called in this Class.
    public function index() {
        redirect('user', 'refresh');
    }

public function userSession() {
        $table = $this->db->dbprefix('users_answers');

        $sql = "SELECT * FROM " . $table . " WHERE user_id =".$this->input->post('user_id')." AND question_id=".$this->input->post('question_id')."";

        $answer_arr = $this->db->query($sql)->num_rows();

        if($answer_arr>0)
        {
            // if(!empty($this->input->post('status')))
            // {
            //     $status=$this->input->post('status');
            // }
            // else
            // {
            //  $status="n";   
            // }
            

        $query = "UPDATE  ".$table. " SET answer='".$this->input->post('answer')."',status='".$this->input->post('status')."' where user_id =".$this->input->post('user_id')." AND question_id=".$this->input->post('question_id')."";

               

        }

        else
        {

            // if(!empty($this->input->post('status')))
            // {
            //     $status=$this->input->post('status');
            // }
            // else
            // {
            //  $status="n";   
            // }

             $query = "INSERT IGNORE INTO ".$table. " (user_id,question_id,answer,status) VALUES ('".$this->input->post('user_id')."','".$this->input->post('question_id')."','".$this->input->post('answer')."','".$this->input->post('status')."')";
            
        }



       

        // echo $sql;
        // exit();
        $this->db->query($query);
    }
    

    //Get the subjects that are set for the selected Quiz/Exam, and prepare the questions.
    public function startexam() {

         date_default_timezone_set('Asia/Kolkata');

      
         // $quiz_subscription_info = $this->db->query("SELECT * FROM quizsubscriptions WHERE user_id='" . $this->session->userdata('user_id') . "' and status=1")->row_array();
          $quiz_subscription_info = $this->db->query("SELECT * FROM quizsubscriptions WHERE user_id='" . $this->session->userdata('user_id') . "' AND exam_status=1 AND DATE(from_date) = CURDATE()")->row_array();
          // print_r($quiz_subscription_info); die;

         $today_date= date('Y-m-d H:i:s');
         //$today_date='2019-03-22 00:00:00';

         if( $today_date >= $quiz_subscription_info['from_date'] && $today_date <= $quiz_subscription_info['to_date'])
         { 

            $this->session->set_userdata('from_date', $quiz_subscription_info['from_date']);
            $this->session->set_userdata('to_date', $quiz_subscription_info['to_date']);

            $this->session->set_userdata('quiz_subscription_id', $quiz_subscription_info['id']);



        //$id = $this->uri->segment(3);

        // $questions = $this->base_model->run_query(
        //     "SELECT questionid, questiontype, totalanswers, question, questionImage, answer1, 
        //     answer1Image, answer2, answer2Image, answer3, answer3Image, answer4, answer4Image, correctanswer,
        //     answer5, answer5Image, hint, hintImage, question_type, q.worksheet_id,section_name FROM questions  q 
            
        //     WHERE find_in_set('".$this->session->userdata('worksheet_id')."',assigned_worksheet_ids) <> 0 ORDER by q.questionid ASC"
        //     );

            /* old code for comma separated worksheet ids */


         // $questions = $this->base_model->run_query(
         //    "SELECT questionid, questiontype, totalanswers, question, questionImage, answer1, 
         //    answer1Image, answer2, answer2Image, answer3, answer3Image, answer4, answer4Image, correctanswer,
         //    answer5, answer5Image, hint, hintImage, question_type, q.worksheet_id,section_name FROM questions  q 
            
         //    WHERE find_in_set('".$this->session->userdata('worksheet_id')."',assigned_worksheet_ids) <> 0 ORDER by q.section_marks ASC"
         //    );

          $questions = $this->base_model->run_query(
            "SELECT questionid, questiontype, totalanswers, question, questionImage, answer1, 
            answer1Image, answer2, answer2Image, answer3, answer3Image, answer4, answer4Image, correctanswer,
            answer5, answer5Image, hint, hintImage, question_type, q.worksheet_id,section_name FROM questions  q 
            
            WHERE worksheet_id='".$this->session->userdata('worksheet_id')."' ORDER by q.section_marks ASC"
            );

         $totalQuestions = count($questions);

         if($totalQuestions==0)

         {

             redirect('/', 'refresh');
         }



        
        $quiz_slug = $this->uri->segment(3);

        // if ($quiz_slug == '') {
        //     $this->prepare_flashmessage("Invalid attempt to take exam**id prob...", 1);
        //     redirect('user/index', 'refresh');
        // }

        //print_r($this->session->userdata('question_id'));die;
        
        
        $sql = "SELECT `quizid` FROM `quiz` WHERE `slug`='" . $quiz_slug . "'";

        $quiz_arr = $this->db->query($sql)->row_array();
        $id = $quiz_arr['quizid'];
        $this->data['active_menu'] = 'exams';
        $this->data['content'] = 'user/exam/exampage';
        $this->data['page'] = 'exam_page';

        // print_r($this->session->userdata);die;

        // $data['user_id'] = $this->session->userdata('user_id');
        // $data['email'] = $this->session->userdata('email');
        // $data['ip_address'] = $this->session->userdata('ip_address');
        // $data['browser'] = $this->session->userdata('user_agent');
        // date_default_timezone_set('Asia/Kolkata');
        // $data['test_start_time'] = NOW();
        // $data['quiz_id'] = $id;

        $table = $this->db->dbprefix('testenter');
        $sql = "INSERT IGNORE INTO ".$table. " (user_id, email, ip_address, browser, test_start_time, quiz_id, formatted_start_time,test_minutes,test_seconds) VALUES ('".$this->session->userdata('user_id')."','".$this->session->userdata('email')."','".$this->session->userdata('ip_address')."','".$this->session->userdata('user_agent')."','".NOW()."','".$id."','".date("Y-m-d H:i:s")."',59,60)";

        // echo $sql;
        // exit();
        $this->db->query($sql);

        // $this->base_model->insert_operation($data, $table);

        //VALIDATE FOR PAID TEST
        //IF DIRECTLY COMES TO THE LINK
        // $account_validation = $this->session->userdata('account_validation');
        // $is_user_account_modified = $this->session->set_userdata('is_user_account_modified');
        // if (!isset($account_validation)) {
        //     $this->prepare_flashmessage("Invalid attempt to take exam**not set...", 1);
        //     redirect('user/index', 'refresh');
        // }


        
        //IF IS AUTHORIZED TO TAKE THE EXAM
        // if (!$account_validation['is_authorized']) {
        //     $this->prepare_flashmessage("please switch your profile to exam relevant...", 1);
        //     redirect('user/index', 'refresh');
        // }

        //IF IS QUIZ TYPE IS PAID AND VALIDITY TYPE IS ATTEMPTS
        // DECREMENT THE ATTEMPTS COUNT, UPDATE TO DATABASE AND MAINTAIN SESSION STATUS
        // if ($account_validation['quiz_type'] == 'Paid' &&
        //     $account_validation['validitytype'] == 'Attempts'
        //     ) {
        //     if ($account_validation['validityvalue'] != '' && $is_user_account_modified == 0) {
        //         $data['remainingattempts'] = $account_validation['validityvalue'] - 1;
        //         $where['id'] = $account_validation['account_id'];
        //         $this->base_model->update_operation($data, 'quizsubscriptions', $where);
        //         $this->session->set_userdata('is_user_account_modified', 1);
        //     }
        // }

        

        //QUIZ INFO
       /* $quizinfo = $this->base_model->run_query(
            "select q.* from "
            . $this->db->dbprefix('quiz') . " q," . $this->db->dbprefix('question_assign')
            . " qa inner join questions qs  where q.quizid=qa.quiz_id  "
            . " and qa.worksheet_id=qs.worksheet_id and q.quizid=" . $id
            );*/

        $quizinfo = $this->base_model->run_query(
            "select q.* from "
            . $this->db->dbprefix('quiz') . " q," . $this->db->dbprefix('question_assign')
            . " qa inner join questions qs  where q.quizid=qa.quiz_id  "
            . "  and q.quizid=" . $id
            );


        //print_r($quizinfo);die;


        

        
        // $totalQuestions = count($quizinfo);
        $quizinfo = $quizinfo[0];
        //TREATING AS TOTAL MARKS, CONSIDERING EACH QUESTION CARRIES 1 MARK.
        //Quiz Name
        $this->data['quizName'] = $quizinfo->name;
        $this->data['quizTime'] = $quizinfo->deauration;
        if ($quizinfo->negativemarkstatus == "Active") {
            $this->data['negativeMark'] = $quizinfo->negativemark;
        }

        if (isset($quizinfo)) {

            $this->data['title'] = $quizinfo->name;    //Quiz Name
        }

        $quizRecords = $this->base_model->run_query(
            "select q.* from "
            . $this->db->dbprefix('quiz') . " q where q.quizid=" . $id
            );

     

        
       /* $questions = $this->base_model->run_query(
            "SELECT questionid, questiontype, totalanswers, question, questionImage, answer1, 
            answer1Image, answer2, answer2Image, answer3, answer3Image, answer4, answer4Image, correctanswer,
            answer5, answer5Image, hint, hintImage, question_type, q.worksheet_id,section_name FROM questions  q 
            INNER JOIN question_assign qa ON  q.worksheet_id=qa.worksheet_id 
            WHERE qa.quiz_id ='" . $quizRecords[0]->quizid . "' AND q.worksheet_id=qa.worksheet_id "
            . " ORDER by q.questionid ASC"
            );*/

           

        // $questions = $this->base_model->run_query(
        //     "SELECT questionid, questiontype, totalanswers, question, questionImage, answer1, 
        //     answer1Image, answer2, answer2Image, answer3, answer3Image, answer4, answer4Image, correctanswer,
        //     answer5, answer5Image, hint, hintImage, question_type, q.worksheet_id,section_name FROM questions  q 
            
        //     WHERE find_in_set('".$this->session->userdata('worksheet_id')."',assigned_worksheet_ids) <> 0 ORDER by q.questionid ASC"
        //     );

        //  $totalQuestions = count($questions);

         // print_r($totalQuestions);die;

        /*echo "<pre/>";

        echo $this->db->last_query();die;*/


        $this->data['quiz_info'] = $quizRecords;

         // $userAnswers = $this->base_model->run_query(
         //    "SELECT question_id, answer,status FROM users_answers  us WHERE us.user_id ='".$this->session->userdata('user_id')."' ORDER by us.question_id ASC"
         //    );

         //$this->data['user_answers'] = $userAnswers;

          //$this->session->set_userdata('userAnswers', $userAnswers); 

        if ($this->session->userdata('isExamStarted') == 1) {

            $time = NOW();
            $this->session->set_userdata('test_start_time', $time);


            $this->session->set_userdata('questions', $questions);
            $userid = $this->session->userdata('user_id');
            $answers = '';
            $ans_explanation = '';
            
         
            foreach ($this->session->userdata('questions') as $q) {
                //foreach ($row as $q) {
                $answers[$q->questionid] = $q->correctanswer;
                //}

              
            }

              $table = $this->db->dbprefix('users_answers');

             $sql = "SELECT * FROM " . $table . " WHERE user_id =". $userid."";

        $answer_arr = $this->db->query($sql)->num_rows();

        if($answer_arr==0)
        {

             $j = 0;
            foreach ($this->session->userdata('questions') as $q) {                

                $insertAnswers[$j]['user_id'] = $userid;
                $insertAnswers[$j]['question_id'] = $q->questionid;
                $insertAnswers[$j]['answer'] = '';
                $insertAnswers[$j]['status'] = '';

              
        $sql = "INSERT IGNORE INTO ".$table. " (user_id, question_id, answer, status) VALUES ('". $userid."','".$q->questionid."','','')";

        // echo $sql;
        // exit();
        $this->db->query($sql);

                $j++;
            }

        }


            //print_r($insertAnswers);die;





       

        //$this->db->insert($this->db->dbprefix('users_answers'), $insertAnswers);



            $this->session->set_userdata('answers', $answers);
            $this->session->set_userdata('quiz_info', $quizinfo);
            
//            echo "<pre>";
//            print_r($totalQuestions);
//            exit;
            //INCLUDES SUBJECTS
            $this->session->set_userdata('quizRecords', $quizRecords); 
            $this->session->set_userdata('totalQuestions', $totalQuestions);
          //   echo "ravi";exit;

            $this->session->unset_userdata('minutes');
            $this->session->unset_userdata('seconds');


        }

          $time_query = "SELECT test_minutes,test_seconds from testenter where user_id = ".$this->session->userdata('user_id')." and quiz_id = ". $quizinfo->quizid . " and  DATE(`formatted_start_time`)=CURDATE()";
            $user_time_details = $this->db->query($time_query)->result_array();

             //print_r($user_time_details);die;



            $this->session->set_userdata('minutes', $user_time_details[0]['test_minutes']);
            $this->session->set_userdata('seconds', $user_time_details[0]['test_seconds']);

         

          $this->data['minutes'] = $this->session->userdata('minutes');
          $this->data['seconds'] = $this->session->userdata('seconds');

         

        
        // if($this->session->userdata('school_portal_id')) {
        //     $this->adminschoolLayout();
        // } else { 
            $this->_render_page('temp/usertemplate', $this->data);
        // }

        }

        else

            {

             redirect('/', 'refresh');
         }

    }
    
     function saveInterval() {
        if ($this->input->post('minutes') != "" && $this->input->post('seconds') != "") {

          



           $updateExamTimeQuery = "UPDATE testenter SET test_minutes = '" .  $this->input->post('minutes') ."', test_seconds = '" .  $this->input->post('seconds') ."' WHERE user_id = ". $this->session->userdata('user_id')."  and  DATE(`formatted_start_time`)=CURDATE()";

           $this->db->query($updateExamTimeQuery);


            // $this->session->set_userdata('minutes', $this->input->post('minutes'));
            // $this->session->set_userdata('seconds', $this->input->post('seconds'));
        }
    }

    function setInterval() {
        if ($this->input->post('minutes') != "" && $this->input->post('seconds') != "") {

            $this->session->set_userdata('minutes', $this->input->post('minutes'));
            $this->session->set_userdata('seconds', $this->input->post('seconds'));
        }
    }
    
    function resultInstructions() {
        $this->data['content'] = 'user/exam/result-instructions';
        $this->_render_page('temp/usertemplate', $this->data);
    }

    //Validate the User Exam by comparing answers of users with correct answers and Display the Result Page.
    
    function validateexam() {

        $quizinfo = $this->session->userdata('quiz_info');
        $totalQuestions = $this->session->userdata('totalQuestions');
        $quizRecords = $this->session->userdata('quizRecords');        
        $questions = $this->session->userdata('questions');
        $answers = $this->session->userdata('answers');

        // echo "<pre>";
       // print_r($questions);
       // exit;

        $score = 0;
        $useroptions = '';
        $not_attempted = 0;

        //$this->load->model('member');
        $userid = $this->session->userdata('user_id');
       // $this->data['isFreeMember'] = $this->member->isFreeMember($userid);
        


        if ($this->input->post('Finish') == 'Finish') {



            $userid = $this->session->userdata('user_id');
            $quiz_subscription_id = $this->session->userdata('quiz_subscription_id');

            $quiz_time = $quizinfo->deauration;

            $time_left_at_quiz_end_min = $this->session->userdata('minutes');
            $time_left_at_quiz_end_sec = $this->session->userdata('seconds');

            $this->load->helper('general');


            $query = "SELECT test_start_time from testenter where user_id = ".$userid." and quiz_id = ". $quizinfo->quizid . " order by id DESC limit 1";
            $result = $this->db->query($query)->result_array();

            $test_start_time = $result[0]['test_start_time'];
            // $time_take_to_atttempt_quiz = quizAttemptTime($quiz_time, $time_left_at_quiz_end_min, $time_left_at_quiz_end_sec);
            $test_finish_time = NOW();
            $time_take_to_atttempt_quiz = quizTimeTaken($test_start_time, $test_finish_time);

            if($time_take_to_atttempt_quiz > ($quiz_time*60)){
                $time_take_to_atttempt_quiz = $quiz_time*60;
            }

            $totalMinutes = floor($time_take_to_atttempt_quiz/60);
            $totalSeconds = $time_take_to_atttempt_quiz%60;



            $answerOptions = $this->input->post();

            $data['userid'] = $userid;
            $data['email'] = $this->session->userdata('email');
            $data['username'] = $this->session->userdata('username');
            $data['quiz_id'] = $quizinfo->quizid;
            
            
//         
//            $updateExamStatusQuery = " UPDATE testenter SET test_finish_time = '" .  date('Y-m-d H:i:s') ."', "
//                    . " ok_clicked = 'Y' WHERE user_id = ". $userid;
//            $this->db->query($updateExamStatusQuery);


             $updateExamStatusQuery = 
             "UPDATE testenter SET test_finish_time = '" .   $test_finish_time ."',formatted_finish_time = '" .  date('Y-m-d H:i:s') ."', ok_clicked = 'Y',finish_clicked = 'Y',cancel_clicked = 'N' WHERE user_id = ". $userid;
            $this->db->query($updateExamStatusQuery);


            $updateExamStatusQuery2 = 
             "UPDATE quizsubscriptions SET exam_status = 0 WHERE  id = ".$quiz_subscription_id;
            $this->db->query($updateExamStatusQuery2);
            

            $data['total_questions'] = $totalQuestions;
            $data['dateoftest'] = date('y-m-d');
            // $data['timeoftest'] = date('H:i');
            $data['timeoftest'] = $totalMinutes." : ".$totalSeconds ;

            $useroptions = array();

            $this->load->model('quiz');


            if (!empty($questions)) {

                $insertQuizResultHistory['userid'] = $userid;
                $insertQuizResultHistory['score'] = $score;
               // $insertQuizResultHistory['username'] = $this->session->userdata('username');
                $insertQuizResultHistory['quiz_id'] = $quizinfo->quizid;

                $insertQuizResultHistory['total_questions'] = $totalQuestions;

                $insertQuizResultHistory['dateoftest'] = date('Y-m-d');
                $insertQuizResultHistory['timeoftest'] =  $totalMinutes." : ".$totalSeconds ;
                
                //INSERT DATA INTO USER QUIZ RESULTS HISTORY
                $this->base_model->insert_operation($this->db->dbprefix('user_quiz_results_history'),$insertQuizResultHistory);
                
               /* $insert = " INSERT IGNORE INTO user_quiz_results_history (user_id,quiz_id,score,total_questions,dateoftest,timeoftest) "
                        . " VALUES (".$userid.",".$quizinfo->quizid.",".$score.",".$totalQuestions.",".date('Y-m-d').",". $time_take_to_atttempt_quiz. ")";
                
                        $insertQuestions = $this->db->query($insert);*/



//                echo "<pre>";
//                print_r($insertQuizResultHistory);
//                exit;
//                


                        $quiz_result_id = $this->db->insert_id();

//                echo "<pre>";
//                print_r($this->db->error());exit;


                        if (!empty($quiz_result_id)) {

                            foreach ($questions as $question) {

                                $question_id = $question->questionid;
                                $worksheet_id = $question->worksheet_id;

                                //$userAnswer = isset($answerOptions[$question_id])  ? $answerOptions[$question_id] : '';



                                // $userAnswer = isset($answerOptions[$question_id])  ? $answerOptions[$question_id] : '';

                                 $userAnswer = (isset($answerOptions[$question_id]) && $answerOptions[$question_id]!=$question_id)  ? $answerOptions[$question_id] : '';

                                



                                $answer_details = $this->quiz->getCorrectAnswer($question_id);

                                //print_r($answer_details);




                                if (!empty($answer_details)) {
                                    // if (strtolower($answer_details['correctanswer']) == strtolower($userAnswer))

                                    $correctanswer=strtolower($answer_details['correctanswer']);

                                    $useranswer=strtolower($userAnswer);

                                    $CorrectAnswer = explode(',',$correctanswer);
                                    if (in_array($useranswer, $CorrectAnswer))  


                                    {

                                        // print_r($answer_details);die;

                                        if($answer_details['section_marks']==2)
                                        {
                                            //$score+2;
                                            $score+=2;
                                            
                                        }

                                        else

                                        {
                                            $score++;

                                        }
                                        
                                    }
                                }

                                if (empty($userAnswer)) {

                                    $not_attempted++;
                                }

                                $option_choosen = isset($answerOptions[$question_id]) ? $answerOptions[$question_id] : 0;

                                $question_attempted = !empty($option_choosen) ? 'Y' : 'N';


                                if (strtolower($option_choosen) == 'a') {
                                    $insertQuestions = $this->db->query(
                                        " INSERT IGNORE INTO user_quiz_report(examination_id,worksheet_id, question_id, attempted, user_id, option_a) "
                                        . "  values ('" . $quiz_result_id . "', '" . $worksheet_id . "'," . $question_id . ", 'Y' , " . $userid . ", 'Y' )");
                                } else if (strtolower($option_choosen) == 'b') {
                                    $insertQuestions = $this->db->query(
                                        " INSERT IGNORE INTO user_quiz_report(examination_id,worksheet_id, question_id, attempted,  user_id,option_b) "
                                        . "  values ('" . $quiz_result_id . "', '" . $worksheet_id . "'," . $question_id . ", 'Y' ," . $userid . ", 'Y' )");
                                } else if (strtolower($option_choosen) == 'c') {
                                    $insertQuestions = $this->db->query(
                                        " INSERT IGNORE INTO user_quiz_report(examination_id,worksheet_id, question_id, attempted, user_id, option_c) "
                                        . "  values ('" . $quiz_result_id . "', '" . $worksheet_id . "'," . $question_id . ", 'Y' , " . $userid . ", 'Y' )");
                                } else if (strtolower($option_choosen) == 'd') {
                                    $insertQuestions = $this->db->query(
                                        " INSERT IGNORE INTO user_quiz_report(examination_id,worksheet_id, question_id, attempted,  user_id, option_d) "
                                        . "  values ('" . $quiz_result_id . "', '" . $worksheet_id . "'," . $question_id . ", 'Y' , " . $userid . ", 'Y')");
                                } else {
                                    $insertQuestions = $this->db->query(
                                        " INSERT IGNORE INTO user_quiz_report(examination_id,worksheet_id, question_id,  user_id, attempted) "
                                        . "  values ('" . $quiz_result_id . "', '" . $worksheet_id . "'," . $question_id . "," . $userid . ", 'N')");
                                }
                            }
                        } else {
                            die('There has been an error');
                        }

                        /* update score */
                        $userQuizResultsHistory['score'] = $score;
                        $userQuizResultsHistory['questions_attempted'] = ($totalQuestions - $not_attempted);
                        $where = array('id' => $quiz_result_id);
                        $this->base_model->update_operation(
                            $userQuizResultsHistory, $this->db->dbprefix('user_quiz_results_history'), $where);


                        /* Update User Quiz options */
                        /*                 * *************************** */
                        $user_option = json_encode($useroptions);
                        $this->db->query("INSERT INTO `user_quiz_options` (`quiz_id`,`user_id`,`quiz_result_id`,`user_options`)"
                            . " values ('" . $quizinfo->quizid . "', '" . $userid . "', '" . $quiz_result_id . "','" . $user_option . "')");
                        /*                 * ***************************** */

                        $this->load->model('quiz');
                        $this->quiz->updateMaxScore($quizinfo->quizid, $score);
                        //$this->quiz->updatePercentile($quiz_result_id);



                        $where['userid'] = $userid;
                        $where['quiz_id'] = $quizinfo->quizid;
                        $records = $this->base_model->fetch_records_from(
                            $this->db->dbprefix('user_quiz_results'), $where
                            );

                        //redirect('exam/resultInstructions');

                        //redirect('exam/examReview/'.$quiz_result_id);

                        redirect('exam/examReview/', 'refresh');
                        exit;
                    } else {
                //throw new Exception('Invalid attempt');
                    }
                }
            }

            function markQuestionFlag() {

                $userid = $this->session->userdata('user_id');
                $intQuestionId = $this->input->post('intQuestionId');

        /* $sql = " INSERT INTO flag_marked_questions (question_id,markedby_userid) "
          . " values (" . $intQuestionId ."," . $userid .")";
          $this->base_model->run_query($sql); */

          $currentDate = date("Y-m-d h:i:s");
          $insertData = array('question_id' => $intQuestionId, 'markedby_userid' => $userid, 'marked_dt' => $currentDate);

          $this->load->model('User');

          $this->User->markQuestionFlag($insertData);

          /* Update worksheet id */
          $sql = " UPDATE flag_marked_questions 
          LEFT JOIN questions ON flag_marked_questions.question_id = questions.questionid
          SET  flag_marked_questions.worksheet_id = questions.worksheet_id ";
          $this->db->query($sql);

          /*         * *************** */

          $response = array('success' => true, 'intQuestionId' => $intQuestionId);
          echo json_encode($response);
          exit;
      }

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
                    LEFT JOIN questions ON flag_marked_questions.question_id = questions.questionid
                 SET  flag_marked_questions.worksheet_id = questions.worksheet_id ";
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

    function examReview() {

//          date_default_timezone_set('Asia/Kolkata');

      
//          // $quiz_subscription_info = $this->db->query("SELECT * FROM quizsubscriptions WHERE user_id='" . $this->session->userdata('user_id') . "' and status=1")->row_array();

//           $quiz_subscription_info = $this->db->query("SELECT * FROM quizsubscriptions WHERE user_id='" . $this->session->userdata('user_id') . "'")->row_array();
//           // print_r($quiz_subscription_info); die;

//          $today_date= date('Y-m-d H:i:s');
//          //$today_date='2019-03-22 00:00:00';

//          if( $today_date >= $quiz_subscription_info['from_date'] && $today_date <= $quiz_subscription_info['to_date'])
//          { 

//         $userid = $this->session->userdata('user_id');

//         $intResultId = $this->uri->segment(3);

//         if ((empty($intResultId)) || !is_numeric($intResultId)) {
//             // throw new Exception('Unauthorize access');
//         }
        
//         $this->load->model('examination');
//         $this->load->model('quiz');

//         $arrExamResult = $this->examination->getExamResult($intResultId);
        

        

//         $this->data['examResult'] = $examResult = $arrExamResult[0];




//         $this->data['questions'] = $questions = $this->examination->getAllQuestionsOfExam($intResultId);

// //        echo "<pre>";
// //        print_r($questions);
// //        exit;



//         if (count($arrExamResult) <> 1) {
//             throw new Exception('Result not found.');
//         }

//         $intUserId = $arrExamResult[0]['userid'];

//         if ($userid <> $intUserId) {
//             //throw new Exception('Unauthorize access');
//         }

//         // $this->load->model('Member');
//         // $this->data['isFreeMember'] = $this->Member->isFreeMember($userid);

//         $intQuizId = $arrExamResult[0]['quiz_id'];

//         $quizinfo = $this->quiz->getQuiz($intQuizId);

//         $this->data['quiz_info'] = $quizinfo[0];

//         $this->data['score'] = $score = $arrExamResult[0]['score'];
//         $this->data['questions_attempted'] = $attempted = $examResult['questions_attempted'];
//         //$this->data['wrong_questions'] = ( $attempted - $score) < 0 ? 0 : ( $attempted - $score);
//         $this->data['questions_not_attempted'] = $not_attempted = $examResult['total_questions']-$attempted;
//         $this->data['total_questions'] = $totalQuestions = $examResult['total_questions'];


//         $this->data['attempted_percentage'] = 0;
//         if (!empty($attempted)) {
//             $this->data['attempted_percentage'] = number_format((($attempted / $totalQuestions) * 100), 2);
//         }

//         // $this->data['score_percentage'] = 0;
//         // if ($score != 0) {
//         //     $this->data['score_percentage'] = number_format((($score / $totalQuestions) * 100), 2);
//         // }


//         // $wrongAnswers = $attempted - $score;

//         // $this->data['wrong_percentage'] = 0;
//         // if ($wrongAnswers != 0) {
//         //     $this->data['wrong_percentage'] = number_format((($wrongAnswers / $totalQuestions) * 100), 2);
//         // }



//         $this->data['not_attempted__percentage'] = 0;
//         if ($not_attempted != 0) {
//             $this->data['not_attempted_percentage'] = number_format((($not_attempted / $totalQuestions) * 100), 2);
//         }


        $this->data['active_menu'] = 'examsreview';
        $this->data['title'] = 'Exam/Review';
        //   $this->data['content'] = 'user/exam/quiz_results';
        $this->data['content'] = 'user/exam/exam_review';

        // $this->_render_page('temp/usertemplate', $this->data);

        // if ($this->session->userdata('school_portal_id')) {
        //     $this->adminschoolLayout();
        // } else {
            $this->_render_page('temp/usertemplate', $this->data);
        // }
//     }

//     else
//      {
// // throw new Exception('Unauthorize access');
//              redirect('/', 'refresh');
//          }

}

}

/* End of file exam.php */
/* Location: ./application/controllers/exam.php */