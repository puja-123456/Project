<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class School_reg extends MY_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model('base_model');

    }

    public function register(){
         
        $this->data['content'] = 'general/register_school';
        /* Set rules */
       $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('school', 'School Name', 'required|min_length[3]|max_length[75]');
        $this->form_validation->set_rules('location', 'Address', 'required|max_length[1200]');
        $this->form_validation->set_rules('name', 'Student Name', 'required|min_length[3]|max_length[75]');
        $this->form_validation->set_rules('country', 'Phone', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('message', 'Message', 'required');

        if ($this->form_validation->run()) {
            if ($this->input->post()) {
          // print_r($this->input->post());exit;
                $school = $data['school'] = htmlspecialchars($this->input->post('school'));
                $location = $data['location'] = htmlspecialchars($this->input->post('location'));
                
                  if($this->input->post('country')=="India")
                        {
                           $state = $data['state'] = htmlspecialchars($this->input->post('selectstate'));
                        }
                        else
                        {
                           $state = $data['state'] = htmlspecialchars($this->input->post('state_name'));
                 }
                 $country = $data['country'] = htmlspecialchars($this->input->post('country'));
              //  $country_code = $data['country_code'] = htmlspecialchars($this->input->post('country_code'));
            //    $state = $data['state'] = htmlspecialchars($this->input->post('state_name'));
                $name = $data['name'] = htmlspecialchars($this->input->post('name'));
                $phone = $data['phone'] = $this->input->post('phone');
                $email = $data['email'] = $this->input->post('email');
                $message = $data['message'] = htmlspecialchars($this->input->post('message'));
                $data['date'] = date('Y-m-d H:i:s');
                $this->load->model('Contact');
                $intLastInsertId = $this->Contact->add_school($data);
                
                $this->load->model('Emails_model');
                
                /* Insert into database */
                $mailParams = array('name' => $name, 'email' => $email , 'phone' => $phone,
                    'message' => $message, 'location' => $location, 'country' => $country,'state' => $state,'school' => $school);
             //   print_r($mailParams);die;


                if(!empty($intLastInsertId)) {
                    if(!$this->Emails_model->sendSchoolRegMail($email, $mailParams)) {
                    }
                    $this->session->set_flashdata('success_message', 'Congratulations! Our representative will get back to your official email within 48 working hours.');
            $this->data['content'] = 'general/reg_school_successful';

                    // redirect('zee');
                } else {
                    $this->session->set_flashdata('error_message', 'It seems some problem has occured, Please contact us at '.$this->config->item('support_phone').'.',1);
                }
            }
        }

        $this->data['active_menu'] = 'register-a-school';        
        $this->data['title'] = "Registration for Schools"; 
        $this->data['meta_title'] = "Registration for Schools"; 
        $this->data['meta_description'] = "Register with India's most trusted Online Olympiad Platform"; 
        


        // $this->data['pageDetail'] = $pageDetail[0]['description'];
        $this->_render_page('templates/template', $this->data);
    }

     public function school_list(){

        $this->data['content'] = 'general/school_list';
        $this->data['active_menu'] = 'school-list';        
        $this->data['title'] = "Schools List"; 
        $this->data['meta_title'] = "Schools List"; 
        $this->data['meta_description'] = "Schools List"; 

 $csv = base_url()."assets/schools_list.csv";

 $international_schools_list = array();
 $indian_schools_list = array();

 $international_city_list = array();
 $indian_city_list = array();



$handle = fopen($csv,"r");
while (($row = fgetcsv($handle, 10000, ",")) != FALSE) //get row vales
{


if($row[2]=="India")
{


    $indian_schools_list[]=$row; //rows in array

    $indian_city_list[]=ucfirst(trim($row[1]));
    

}

else

{
    $international_schools_list[]=$row;

    $international_city_list[] = $row[1];


    $international_country_list[] = $row[2];
   
   
}

    

   //here you can manipulate the values by accessing the array


}



unset($international_schools_list[0]);
unset($international_city_list[0]);
unset($international_country_list[0]);




asort($international_schools_list);
asort($indian_schools_list);



//echo "<pre/>";

//array_unique($indian_city_list);

$indianCityList = array_unique($indian_city_list);
$internationalCityList = array_unique($international_city_list);
$internationalCountryList = array_unique($international_country_list);
sort($indianCityList);
sort($internationalCityList);
sort($internationalCountryList);





        // $this->data['pageDetail'] = $pageDetail[0]['description'];

        $this->data['international_schools_list'] = $international_schools_list;
        $this->data['indian_schools_list'] = $indian_schools_list;
        $this->data['indian_city_list'] = $indianCityList;
        $this->data['international_city_list'] = $internationalCityList;
        $this->data['international_country_list'] = $internationalCountryList;
        $this->_render_page('templates/template', $this->data);
    }
    

}

?>