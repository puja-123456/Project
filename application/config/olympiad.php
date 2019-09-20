<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Olympiad extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
    }
    
    public function category() {

        $category = $this->uri->segment(1);
        
        if( !($category == 'cyber-olympiad' || $category == 'math-olympiad' || 
           $category == 'english-olympiad' || $category == 'science-olympiad' || $category == 'general-knowledge-olympiad')) {
           show_404();
   }

   if( $category == 'cyber-olympiad') {
    $this->data['title'] = "Cyber Olympiad Sample Papers, Exam Date, Syllabus, Mock Test Papers for Class 1 to 10";
    $this->data['meta_description'] = "Stay updated with the different Cyber Olympiad exam dates, syllabus, sample papers, mock test papers for students of classes 1,2,3,4,5,6,7,8,9,10.";
} else if($category == 'math-olympiad') {
    $this->data['title'] = "Maths Olympiad Sample Papers, Exam Date, Syllabus, Mock Test Papers for Class 1 to 10";
    $this->data['meta_description'] = "Stay updated with the different Mathematics Olympiad exam dates, syllabus, sample papers, mock test papers for students of classes 1,2,3,4,5,6,7,8,9,10.";
} else if($category == 'english-olympiad') {
    $this->data['title'] = "English Olympiad Sample Papers, Exam Date, Syllabus, Mock Test Papers for Class 1 to 10";
    $this->data['meta_description'] = "Stay updated with the different English Olympiad exam dates, syllabus, sample papers, mock test papers for students of classes 1,2,3,4,5,6,7,8,9,10.";
} else if( $category == 'science-olympiad') {
    $this->data['title'] = "Science Olympiad Sample Papers, Exam Date, Syllabus, Mock Test Papers for Class 1 to 10";
    $this->data['meta_description'] = "Stay updated with the different Science Olympiad exam date, syllabus, sample papers, mock test papers to students of classes 1,2,3,4,5,6,7,8,9,10.";
} else if( $category == 'general-knowledge-olympiad') {
    $this->data['title'] = "General Knowledge (GK) Olympiad Sample Papers, Exam Date, Syllabus, Mock Test Papers for Class 1 to 10";
    $this->data['meta_description'] = "Stay updated with the different General Knowledge GK Olympiad exam date, syllabus, sample papers, mock test papers to students of classes 1,2,3,4,5,6,7,8,9,10.";
}


$arrOlympiadCategories = $this->config->item('olympiad-categories');

$this->data['categoryKey'] = $category;
$this->data['pageTitle'] = $arrOlympiadCategories[$category];


$this->data['content'] = 'olympiad/category';
$this->_render_page('temp/template', $this->data);
}

public function other_olympiads(){

    $this->data['pageTitle'] = "Other Leading Olympiad Exams";
    $this->data['active_tab'] = 'other-olympiads';        
    $this->data['title'] = "Other Olympiads' Exam Preparation provided by Olympiad Success"; 
    $this->data['meta_description'] = "Register for practicing with India's most trusted Online Olympiad Preparation Platform"; 

    $this->data['content'] = 'olympiad/other-olympiads';
    $this->_render_page('temp/template', $this->data);
}

public function others(){

    $slug = $this->uri->segment(2);

    if($slug){
        $data['slug'] = $slug;
    }
    else{
        redirect('other-olympiads');
    }

    //this chillar olympiad data
    $query = "SELECT * FROM other_olympiads WHERE slug = '".$slug."' AND is_olympiad = 'Y'";
    $result = $this->db->query($query)->row_array();
    $this->data['course'] = $result;
    $olympiad_id = $this->data['course']['id'];
    // var_dump($olympiad_id);
    // exit();
    
    //this chillar olympiad subjects
    $query2 = "SELECT * FROM other_olympiads WHERE olympiad_id = '".$olympiad_id."' AND is_olympiad = 'N'";
    $result2 = $this->db->query($query2)->result_array();
    $this->data['subjects'] = $result2;

    //other chillar olympiad data for menu
    $query = "SELECT slug, name FROM other_olympiads WHERE is_olympiad = 'Y' AND id != ".$olympiad_id." order BY order_no";
    $result = $this->db->query($query)->result_array();
    $this->data['olympiad_names'] = $result;

    $this->data['active_tab'] = $this->data['course']['slug'];
    $this->data['title'] = $this->data['course']['meta_title']; 
    $this->data['meta_description'] = $this->data['course']['meta_description']; 

    $this->data['content'] = 'olympiad/other-olympiad-index';
    $this->_render_page('temp/template', $this->data);
}

public function other_ol_subject(){
    
    $course = $this->uri->segment(2);
    $subject = $this->uri->segment(3);

    if($subject){
        $data['slug'] = $subject;
    }
    else{
        redirect('other-olympiads');
    }

    //this subject data
    $query = "SELECT * FROM other_olympiads WHERE slug = '".$subject."' AND is_olympiad = 'N'";
    $result = $this->db->query($query)->row_array();

    //if this subject is not available
    if(!$result){
        redirect('other-olympiads');
    }

    $this->data['thissubject'] = $result;
    
    //this chillar olympiad data
    $query = "SELECT * FROM other_olympiads WHERE slug = '".$course."' AND is_olympiad = 'Y'";
    $result = $this->db->query($query)->row_array();
    $this->data['course'] = $result;

    //other chillar olympiad data for menu
    $query = "SELECT slug, name FROM other_olympiads WHERE is_olympiad = 'Y' order BY order_no";
    $result = $this->db->query($query)->result_array();
    $this->data['olympiad_names'] = $result;

    //other subjects for same olympiad data 
    $query = "SELECT slug, name FROM other_olympiads WHERE olympiad_id = ".$this->data['thissubject']['olympiad_id']." AND id != ".$this->data['thissubject']['id']." AND is_olympiad = 'N' order BY order_no";
   
    $result = $this->db->query($query)->result_array();
    $this->data['other_subject_names'] = $result;


    $this->data['active_tab'] = $this->data['thissubject']['slug'];
    $this->data['title'] = $this->data['thissubject']['meta_title']; 
    $this->data['meta_description'] = $this->data['thissubject']['meta_description']; 
    
    $this->data['content'] = 'olympiad/other-olympiad-subject';
    $this->_render_page('temp/template', $this->data);
}
}
