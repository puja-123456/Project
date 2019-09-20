<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct() {
        parent::__construct();
    }
	public function index()
	{
	// 	$this->load->view('landing/index');
	// }
	// public function contact(){
		
        // echo "Test";
        // exit;


        /* Set rules */
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        //$this->form_validation->set_rules('school', 'School Name', 'required|min_length[3]|max_length[75]');
        //$this->form_validation->set_rules('location', 'City/State', 'required|min_length[3]|max_length[75]');
        $this->form_validation->set_rules('name', 'Contact Person', 'required|min_length[3]|max_length[75]');
        //$this->form_validation->set_rules('phone', 'Phone', 'required|max_length[10]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[75]');
        $this->form_validation->set_rules('message', 'Message', 'max_length[300]');
        // $this->form_validation->set_rules('class_name', 'Class', 'required');
        // $this->form_validation->set_rules('prefered_duration', 'Preferred duration', 'required');
        // $this->form_validation->set_rules('explain_why', 'Explanation', 'required|max_length[1200]');


        if ($this->form_validation->run()) {
            // echo "pre>";
               
            //    exit;
               if ($this->input->post()) {
               // echo "<pre>";
               // print_r($this->input->post());
               // exit;
                $data = $this->input->post();
                $data['date'] = date('d-m-Y H:i:s');
                $this->load->model('contact');
                // $this->load->model('Register_School_Model');
                $intLastInsertId = $this->contact->add($data);
                
                if(!empty($intLastInsertId)) {
                    $this->session->set_flashdata('success_message', 'Thanks! We\'ll get back to you as soon as possible.');
                    //redirect('sch_form');
                } else {
                    $this->session->set_flashdata('error_message', 'It seems some problem has occured, Please contact us at +91-92055-70955.',1);
                }
            }
        }

        $this->_render_page('templates/template', $this->data);
	}
}
