<?php

class Member extends CI_Model
{

    public function isFreeMember($intUserId) {
        $freeUser = true;
       
       /* Check in subscription table */
        if(!empty($intUserId)) {
            $sql =" SELECT COUNT(user_id) as tot FROM quizsubscriptions WHERE user_id = " . $intUserId ;
            $result = $this->db->query($sql)->result_array();
            
            if($result[0]['tot'] > 0 ) {
                return false;
            }
       }
       return $freeUser;
    }
    
    
    public function createUserManually($data) {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }
    
    public function update($data, $email) {
        if(empty($email)) {
            throw new Exception('Email not found.');
        }
        
        $this->db->where('email', $email);
        return $this->db->update('users', $data);
    }
    
    public function updateViaMobile($data, $mobile) {
       
        $this->db->where('phone', $mobile);
        return $this->db->update('users', $data);
    }
    
    public function getQuizRemainingAttempts($intUserId, $intQuizId) {
        $sql = " SELECT COUNT(id) as tot FROM user_quiz_results_history "
                . " WHERE userid = " . $intUserId. " AND quiz_id = " . $intQuizId;
        $result = $this->db->query($sql)->result_array();
        
        $this->load->model('quiz');
        $validityvalue = 3;
        $quizResult = $this->quiz->getValidity($intQuizId);
        if(count($quizResult) > 0 ) {
            $validityvalue = $quizResult[0]['validityvalue'];
        }
        
        $quizAttempted = $result[0]['tot'];
        
        $attemptsLeft = ($validityvalue - $quizAttempted);

        return $attemptsLeft < 0 ? 0 : $attemptsLeft;
    }
    
    
    public function getQuizResult($intUserId, $intQuizId) {
        $query = " SELECT * FROM user_quiz_results WHERE userid = " . $intUserId . " "
                . " AND quiz_id = " . $intQuizId ." ORDER BY id desc limit 0 , 1";
        return $this->db->query($query)->result_array();
    }
    
    public function getFlagMarkedByUserDetail($intQuestionId) {
        
        $sql = "  SELECT * FROM flag_marked_questions INNER JOIN users
         ON flag_marked_questions.markedby_userid = users.id WHERE flag_marked_questions.question_id = " .$intQuestionId ." 
         ORDER BY rec_id LIMIT 0,1 " ;
        
     
        $result = $this->db->query($sql)->result_array();
        
        return $result;
    }
    
    public function getUserDetail($intUserId) {
        $sql = "  SELECT * FROM users WHERE id = " .$intUserId  ;
        return $this->db->query($sql)->result_array();
    }
    
     public function getUserDetailByEmail($email) {
        $sql = "  SELECT * FROM users WHERE email = '" .$email ."'"  ;
        return $this->db->query($sql)->result_array();
    }
    
    public function addRewardPoints($flagMarkedByUserId, $flagQuesionId){
        $sql = " INSERT IGNORE INTO reward_points(user_id,quesion_id,points,reward_dt) "
                . " VALUES (" . $flagMarkedByUserId ."," . $flagQuesionId.",1,NOW())";
        

        $this->db->query($sql);
    }
    
    public function isRewardPointsAlreadyGiven($intQuestionId, $intUserId) {
        
        $sql = " SELECT COUNT(*) as tot from reward_points where user_id = " . $intUserId ." AND "
                . "  quesion_id = " . $intQuestionId ;
        $result = $this->db->query($sql)->result_array();
        
        if($result[0]['tot'] > 0 ) {
            return true;
        }
        
        return false;
    }
    
    
    public function getRewardPoints($intUserId) {
        
        $sql = " SELECT COUNT(*) as tot FROM reward_points WHERE user_id = " . $intUserId ;
        $result = $this->db->query($sql)->result_array();
        return $result[0]['tot'];
    }
    
    public function deleteRewardPoints($intUserId) {
        $sql = " DELETE FROM reward_points WHERE user_id = " . $intUserId ;
        $this->db->query($sql);
    }

    public function getHighestScore($intQuizId) {
        $query = " SELECT MAX(score) AS score FROM user_quiz_results_history "
                . "  WHERE quiz_id = " . $intQuizId;
        $result =  $this->db->query($query)->result_array();
        return $result[0]['score'];
    }
    
    public function getPerformanceReport($intUserId) {
        $sql = " SELECT * FROM user_quiz_results 
                    INNER JOIN quiz ON user_quiz_results.quiz_id = quiz.quizid
                      WHERE userid = " .$intUserId ." ORDER BY dateoftest DESC " ;
        
        $result =  $this->db->query($sql)->result_array();
        return $result;
    }
    
    public function getQuestionAttempted($intUserQuizResultsHistory) {
        $sql = " select questions_attempted as questionAttempted FROM user_quiz_results_history "
                . " WHERE id = " . $intUserQuizResultsHistory;
        $result =  $this->db->query($sql)->result_array();
        return $result[0]['questionAttempted'];
    }
    
    
    public function getMedian($intUserId, $intQuizId) {
        $sql = " select qr.score as score from user_quiz_results_history qr, quiz q 
               where q.quizid=qr.quiz_id and qr.userid= ". $intUserId ." and quiz_id = ". $intQuizId;
        $result =  $this->db->query($sql)->result_array();
        $score = 0 ;
        if(count($result) > 0 ) {
            foreach($result as $row) {
                $score += $row['score'];
            }
            return round( ($score / count($result)) , 2 )  ;
        }
        return 0;
    }
    
    function calculatePercentile($quizScore, $highestScore) {
        if(empty($highestScore)) { return '0'; }
        return round( (  ($quizScore / $highestScore) * 100 ) ,2 ) ;
    }
    
    
    function isUserExists($email) {
        $query = " SELECT COUNT(*) as tot FROM users "
                . "  WHERE email = '" . $email."'";
        $result =  $this->db->query($query)->result_array();
        if( $result[0]['tot'] > 0) {
            return true;
        }
        return false;
    }
    
    function isEmailExists($email) {
        $query = " SELECT COUNT(*) as tot FROM users "
                . "  WHERE email = '" . $email."' LIMIT 0,1";
        $result =  $this->db->query($query)->result_array();
        if( $result[0]['tot'] > 0) {
            return true;
        }
        return false;
    }
    
    function verifyOTP($mobile, $otp) {
        $query = " SELECT COUNT(*) as tot FROM users "
                . "  WHERE phone = '" . $mobile."' AND otp = '". $otp."' limit 0,1 ";
        $result =  $this->db->query($query)->result_array();
        if( $result[0]['tot'] > 0) {
            return true;
        }
        return false;
    }
    
    
    function isPhonenoExists($mobile) {
        $query = " SELECT COUNT(*) as tot FROM users "
                . "  WHERE phone = '" . $mobile."'";
        $result =  $this->db->query($query)->result_array();
        if( $result[0]['tot'] > 0) {
            return true;
        }
        return false;
    }
    
    
    function createUser($email) {
        
        $data['date_of_registration'] = date('Y-m-d');
        $data['email']                = $email;
        $data['ip_address']           = $_SERVER['REMOTE_ADDR'];
        
                    
        /* Generate Password */
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        
        $newPassword =  implode($pass); //turn the array into a string

        $this->load->model('ion_auth_model');
        $newPasswordEncrypted = $this->ion_auth_model->hash_password($newPassword);
        /*****************************/
        $data['password'] = $newPasswordEncrypted;
        $data['active']   = '1';
        $this->db->insert($this->db->dbprefix('users'), $data);
        $user_id = $this->db->insert_id('users');
        
        
        if(!empty($user_id)) {
            /* Get User details for sending newly generated password mail */
            $this->load->model('member');
            $arrUserDetail = $this->member->getUserDetail($user_id);

            $name = $arrUserDetail[0]['first_name'] . ' ' . $arrUserDetail[0]['last_name'];
                    
            /* Sending Mail */
            $message = "Dear " . $name.",";
            $message .= "<br>";
            $message .= "Thanks for signing up with " . $this->config->item('site_name');
            $message .= "<br>";
            $message .= "<br>";
            $message .= "Your Login details is as follow: ";
            $message .= "<br>";
            $message .= "Your user name is: <strong>" . $email."</strong>";
            $message .= "<br>";
            $message .= "Your password is: <strong>" . $newPassword."</strong>";
            $message .= "<br>";
            $message .= "<br>";
            $message .= "Regards,";
            $message .= "<br>";
            $message .= $this->config->item('site_name') . ' team';

            $from = $this->config->item('site_settings')->contact_email;

                   
            $sub = "Welcome to " . $this->config->item('site_name');

            /* Setup Email configuration */
            $config = Array(
                'mailtype' 	=> 'html',
                'smtp_host' => $this->config->item('smtp_host'),
                'smtp_user' => $this->config->item('smtp_user'),
                'smtp_pass' => $this->config->item('smtp_pass'),
                'smtp_port' => $this->config->item('smtp_port'),
                'charset' 	=> 'utf-8',
                'newline' 	=> '\r\n',
                'mailtype' 	=> 'html',		
                'wordwrap' => TRUE			
            );
                    
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");

            $this->email->from($from, $this->config->item('site_name'));
            $this->email->to($email);
            $this->email->subject($sub);
            $this->email->message($message);
            $this->email->send();
            /********************************************/

            
            $this->session->set_userdata('user_id', $user_id);
            $this->session->set_userdata('identity', $email);
            $this->session->set_userdata('username', $name);
            $this->session->set_userdata('email', $email);

            
            return $user_id;
        }
        
        return 0;
    }
    
    public function getWithoutPasswordUsers() {
        $sql = " SELECT * from users where ( password = '' and import_from_csv ='Y') ";
        return $this->db->query($sql)->result_array();
    }
    
    
    public function addReferalAccount($data) {
        $this->db->insert('referal_users', $data);
        return $this->db->insert_id();
    }
    
    public function updateReferalEmail( $referal_email, $email ) {
        $sql = " SELECT refered_by_emails from users where email = '" . $referal_email ."'";
        $result =  $this->db->query($sql)->result_array();
        
        $refered_email = '';
        if(count($result) > 0 ) {
            $refered_email = $result[0]['refered_by_emails'] . "," . $email;
        }
        
        $update = " UPDATE users SET refered_by_emails = '" .$refered_email."' WHERE email = '". $referal_email ."'";
        $this->db->query($update);
    }
    
    public function isEmailAlreadyReferred($email) {
        $sql = " SELECT email from referal_users where email = '" . $email ."' LIMIT 0,1";
        $result =  $this->db->query($sql)->result_array();
        
        if(count($result) > 0 ) {
            return true;
        }
        
        return false;
    }
    
    public function createLoginSessionViaEmail($email) {
        $sql = " SELECT id, username, email from users where email = '" .$email."' LIMIT 0,1";
        $result = $this->db->query($sql)->result_array();
        
        if(count($result) > 0 ) {
            $this->session->set_userdata('identity', $email);
            $this->session->set_userdata('username', $result[0]['username']);
            $this->session->set_userdata('email', $email);
            $this->session->set_userdata('user_id', $result[0]['id']);
            return true;
        }
        
        return false;
    }
    
    public function createLoginSessionViaMobile($phone) {
        $sql = " SELECT id, username, email from users where phone = '" .$phone."' LIMIT 0,1";
        $result = $this->db->query($sql)->result_array();
        
//        echo "<pre>";
//        print_r($result);
//        exit;
        
        if(count($result) > 0 ) {
            $this->session->set_userdata('identity', $result[0]['email']);
            $this->session->set_userdata('username', $result[0]['username']);
            $this->session->set_userdata('email', $result[0]['email']);
            $this->session->set_userdata('user_id', $result[0]['id']);
            return true;
        }
        
        return false;
    }
    
    
    public function isProfileUpdated($intUserId) {
        $sql = " SELECT student_name, course, class, phone, school, school_address FROM users WHERE id = " . $intUserId;
        
        
        $result = $this->db->query($sql)->result_array();
        
        if(count($result) > 0 ) {

            $data = $result[0]['phone'];
            $result[0]['phone'] = substr($data, strpos($data, "-") + 1);

            if(empty($result[0]['student_name']) || empty($result[0]['course']) 
                    ||  empty($result[0]['class']) || empty($result[0]['phone']) 
                    || empty($result[0]['school']) || empty($result[0]['school_address']) ) {
                return false;
            }
            return true;
        }
        
        return false;
    }
    
}

?>
