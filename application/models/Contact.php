
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Model
{
    // public $strCondition = '';

    function __construct()
    {
        parent::__construct();
    }

    public function add($data) {
        $this->db->insert('contact_us', $data);
        return $this->db->insert_id();
    }
    public function add_school($data) {
        $this->db->insert('schools', $data);
        return $this->db->insert_id();
    }


    public function NewsletterSubscribe($email) {
        if(empty($email)) {
            throw new Exception("Please provide email Id.");
        }
        $currentDate = Date('Y-m-d H:i:s');
        $sql = " INSERT INTO subscribe_emails (email, subscription_dt)  "
                . " VALUES('". trim($email). "','".$currentDate."')"; 
        $this->db->query($sql);
    }
}