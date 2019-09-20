<?php

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
class Emails_model extends CI_Model
{

    public function sendMail($to , $subject, $message) {
        
        $config = Array(
        'protocol' => 'mail',
        'mailtype' => 'html',
        'smtp_host' => $this->config->item('smtp_host'),
        'smtp_user' => $this->config->item('smtp_user'),
        'smtp_pass' => $this->config->item('smtp_pass'),
        'smtp_port' => $this->config->item('smtp_port'),
        'smtp_timeout'=> 30,
        'charset' => 'utf-8',
        'newline' => '\r\n',
        'wordwrap' => TRUE
        );
        
        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from($this->config->item('contact_email'), $this->config->item('site_name'));
        $this->email->to($to);
        $this->email->bcc($this->config->item('ng_email'));
        // $this->email->bcc($this->config->item('support_mails_fwd'));
         
        $this->email->subject($subject);
        $this->email->message($message);
        
    
        if ($this->email->send()) {

            //echo "true";
            return true;
        } else {

            //echo "false";
            return false;
        }
    }
    
    public function sendMail2($to , $subject, $message) {
        
        $config = Array(
        'protocol' => 'mail',
        'mailtype' => 'html',
        'smtp_host' => $this->config->item('smtp_host'),
        'smtp_user' => $this->config->item('smtp_user'),
        'smtp_pass' => $this->config->item('smtp_pass'),
        'smtp_port' => $this->config->item('smtp_port'),
        'smtp_timeout'=> 30,
        'charset' => 'utf-8',
        'newline' => '\r\n',
        'wordwrap' => TRUE
        );
        
        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from($this->config->item('contact_email'), $this->config->item('site_name'));
        $this->email->to($to);
        // $this->email->bcc($this->config->item('support_mails_fwd'));
         
        $this->email->subject($subject);
        $this->email->message($message);
        
    
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }
    
    
    function sendSignupMail($to, $params) {
        
        $subject = "Welcome to " . $this->config->item('site_name');
         
        $message = $this->load->view('emails/signup.php',$params,TRUE);
        
        return $this->sendMail($to, $subject, $message);
        
    }
    function sendSchoolRegMail($to, $params) {
        
        $subject1 = "Registration on " . $this->config->item('site_name');

        $subject2 = "Registration on " . $this->config->item('site_name')."- School";
         
        $message = $this->load->view('emails/signupschools.php',$params,TRUE);
        
        $toAdmin = $this->config->item('school_mails_fwd');
        
        $this->sendMail2($toAdmin, $subject2, $message);
        
        return $this->sendMail($to, $subject1, $message);

        
    }

    function sendPaymentSuccessMail($to, $params) {
        
        $subject = "Welcome to " . $this->config->item('site_name');
         
        $message = $this->load->view('emails/pay_success.php',$params,TRUE);
        
        return $this->sendMail($to, $subject, $message);
        
    }

    function sendPaymentFailMail($to, $params) {
        
        $subject = "Welcome to " . $this->config->item('site_name');
         
        $message = $this->load->view('emails/pay_fail.php',$params,TRUE);
        
        return $this->sendMail($to, $subject, $message);
        
    }
    
    function sendForgotPasswordMail($to, $params) {
        
        $subject = "Forgotten password mail from " . $this->config->item('site_name');
         
        $message = $this->load->view('emails/forgot_password.php',$params,TRUE);
        
        return $this->sendMail($to, $subject, $message);
    }
    
    
    
    function sendContactUsMail($to, $params) {
        $subject = 'Contact Us Query';
         
        $message = $this->load->view('emails/contactus.php',$params,TRUE);
        
        //echo $message;exit;
        $toAdmin = $this->config->item('support_mails_fwd');
        $res = $this->sendMail2($toAdmin, $subject, $message);
        $toAdmin = $this->config->item('contact_email');
        $res = $this->sendMail2($toAdmin, $subject, $message);
        // echo $toAdmin;
        // exit();
        
        return $this->sendMail($to, $subject, $message);
        
        
    }

      function sendCoordinatorMail($to, $params) {
        $subject = 'Coordinator Query';
         
        $message = $this->load->view('emails/coordinator.php',$params,TRUE);
        
        //echo $message;exit;
        $toAdmin = $this->config->item('support_mails_fwd');
        $res = $this->sendMail2($toAdmin, $subject, $message);
        $toCoord = $this->config->item('coord_mail_fwd');
        $res = $this->sendMail2($toCoord, $subject, $message);
        // echo $toAdmin;
        // exit();
        
        return $this->sendMail($to, $subject, $message);
        
        
    }
    
    
    
    
    
    
    
    
    

}
