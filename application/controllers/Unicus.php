<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unicus extends MY_Controller {

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
		$this->load->model('base_model');
		$this->load->library('ion_auth');
        $this->load->library('form_validation');

         $userid = $this->ion_auth->get_user_id();

		  if (is_numeric($userid)) {
          
             $result = $this->base_model->run_query("select * FROM  users where id=" . $userid);

                 
           $this->data['user_details'] = $result;

        }
        else
        {

        }

	}

	public function index()
	{


		/*$this->data['meta_description'] = 'CREST Olympiads is an online Olympiad exam for classes 1 to 10 which focuses on the practical knowledge of the student rather than theoretical knowledge.';
		$this->data['title'] = 'Online Olympiad Exams 2019 - Individual Registration Open for Classes 1 to 10 - CREST Olympiads';*/
		$this->data['meta_description'] = 'Individual Registration Open for 2019 online Olympiad exam for classes 1 to 10. It focuses on the practical knowledge of the student rather than theoretical knowledge.';
		$this->data['title'] = 'Online Olympiad Exams Registration 2019 Open for Classes 1 to 10 - CREST Olympiads';
		$this->data['active_menu'] = 'home';

		$this->data['categories'] = $this->base_model->get_details('categories');

		$this->data['content'] = "general/index";

		$this->load->model('Contact');
		$this->load->helper('captcha');

		

		// $random_number = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
  //       $vals = array(
  //           'word' => $random_number,
  //           'img_path' => './assets/captcha/',
  //           'img_url' => base_url() . 'assets/captcha/',
  //           'img_width' => 140,
  //           'img_height' => 32,
  //           'expiration' => 7200
  //       );
  //       $this->data['captcha'] = create_captcha($vals);
  //       $this->session->set_userdata('captchaWord', $this->data['captcha']['word']);

		$query = "SELECT users_feedback_table.testimonial,users.student_photograph,users.username,users.school FROM users_feedback_table INNER JOIN users on users.id=users_feedback_table.user_id WHERE users_feedback_table.testimonial !='' AND users_feedback_table.feedback_status!=0"; 
			$testimonials = $this->db->query($query)->result_array();

			$this->data['testimonials'] = $testimonials;

		

		$this->_render_page('templates/template', $this->data);
	}


	//Fetch products from DB
	public function category_page()
	{
		$slug = $this->uri->segment(1);

		if($slug!=''){
			$this->data['categories'] = $this->base_model->get_details('categories');
		
			$query = "SELECT * FROM `categories` WHERE `slug`='".$slug."'";
			$category = $this->db->query($query)->result_array();
			if (!$category){
			//var_dump($query);
			//exit();
				redirect(base_url());
			}

			$this->data['category'] = $category[0];

			$this->data['title'] = $category[0]['meta_title'];
			$this->data['meta_description'] = $category[0]['meta_description'];

			$this->data['content'] = "general/cat_page";
			$this->_render_page('templates/template', $this->data);

		}
		else{
			redirect(base_url());
		}
		
	}

          
    /* public function subjectDetails($slug=''){

	
		$swhere['slug']= $this->uri->segment(3);
		

		$this_school = $this->base_model->fetch_single_column_value('schools_details','*',$swhere);
		
		$data_count['view_counter'] = $this_school[0]->view_counter + 1;
		$result = $this->base_model->update_operation($data_count, 'schools_details', $swhere);

		$this->session->set_userdata('school_id_for_review',$this_school[0]->id); 
		// var_dump($this->db->last_query());
		// exit();
		
		$cwhere['city_slug'] = $this->uri->segment(2);

		if( $this_school[0]->city_slug != $cwhere['city_slug'] ){
			$newURL = 's/'.$this_school[0]->city_slug.'/'.$this_school[0]->slug;
			redirect($newURL,'location',301);
		}

		$this_city = $this->base_model->fetch_single_column_value('schools_statecity','*',$cwhere);
 
	 	$this->data['current_url']= base_url(uri_string());	 // For current url
		$this->data['content'] = "general/subjectdetails";
		$this->_render_page('templates/template', $this->data);
	}*/
 


	public function cro_rankers()
	{ 

            $querycro = "SELECT * FROM subject_result"; 
			$croresult = $this->db->query($querycro)->result_array(); 
/*			print_r($croresult);die;
*/			$this->data['croresult'] = $croresult; 
			$this->data['title'] = "CRO Toppers List 2019 - CREST Olympiads";
			$this->data['meta_description'] = "Check CREST Reasoning Olympiad 2019 toppers list.";
            $this->data['content'] = "general/cro_rankers";
			$this->_render_page('templates/template', $this->data); 

	}

public function cro_cutoff()
	{ 

            $qcrocutoff = "SELECT * FROM subject_cutoff"; 
			$crorescutoff = $this->db->query($qcrocutoff)->result_array(); 
/*			print_r($croresult);die;
*/			$this->data['crorescutoff'] = $crorescutoff;
			$this->data['title'] = "CRO 2019 Cut Off Released - Check details here";
			$this->data['meta_description'] = "CRO Cut Off 2019 - CREST Reasoning Olympiad cut off announced. Check whether you are qualified for Medals, Merit certificates, Trophies or not."; 
            $this->data['content'] = "general/cro_cutoff";
			$this->_render_page('templates/template', $this->data); 

	}


public function syllabus_class_pages()
	{ 
    //echo "jdfjfjefne";die;
      $slug =  $this->uri->segment(1);
      $slugs = $this->uri->segment(2);
       //echo $slugs;die;
        if($slug!=''){
			$slug_array = explode('-', $slugs); 
           //  print_r($slug_array[0]);die;
			if($slug_array[0] != 'syllabus'){
				redirect(base_url());
			}
			$catslug = $slug;
			//echo $catslug;die;
			 
			$this->data['categories'] = $this->base_model->get_details('categories');
		
			$query = "SELECT * FROM `categories` WHERE `slug`='".$catslug."'";
			$category = $this->db->query($query)->result_array();
			if (!$category){
				redirect(base_url());
			}

			$catid['catid'] = $category[0]['catid'];
			//var_dump($category[0]);
			 //exit();

			$all_syllabus = $this->base_model->fetch_records_from('syllabus',$catid);
			$this->data['url'] = $slug_array[0].'-'.$slug_array[1].'-'.$slug_array[2];
            $this->data['class_name'] = $slug_array[2].' '.$slug_array[3];
            $this->data['class_static_name'] = "umo-syllabus-class";
             //print_r($all_syllabus);die;
			$this->data['all_syllabus'] = $all_syllabus;
			$this->data['category'] = $category[0];

			$this->data['title'] = $category[0]['meta_title'];
			$this->data['meta_description'] = $category[0]['meta_description'];

			$this->data['title'] = $category[0]['name'].' - '.strtoupper($category[0]['short_cat']).' Syllabus for Classes 1 to 10';
			$this->data['meta_description'] = 'Find complete syllabus for '.strtoupper($category[0]['short_cat']).' exams for classes 1, 2, 3, 4, 5, 6, 7, 8, 9, 10';

			$this->data['content'] = "general/syllabus_page";
			$this->_render_page('templates/template', $this->data);
 
    } 

    } 



public function syllabuss_pages()
	{
      
           $slug =  $this->uri->segment(1);
         // echo $slug;die;
            $this->data['categories'] =$this->base_model->get_details('categories');
 
           
           //syllabus_pages  
           //print_r($this->data['categories']);die;
            $catslug = $this->data['categories'];
            // echo "<pre>";
            // print_r($catslug);die;
          for ($i=0; $i <count($catslug) ; $i++) { 
          	# code...

          //	$slugs[]=$categories[$i]['slug'];
        /* SELECT categories.`slug` , categories.`name` , syllabus.`name` FROM categories, syllabus WHERE syllabus.`catid` = categories.`catid`*/

          $query = "SELECT * FROM `categories` WHERE `slug`='".$catslug[$i]['slug']."'";
			$category = $this->db->query($query)->result_array();
				$catid[] = $category[0]['slug'];
               $catids[] = $category[0]['catid'];

            //$all_syllabus = $this->base_model->fetch_records_from('syllabus',$catids[$i]);
            //$this->data['all_syllabus'] = $all_syllabus;
            //print_r($all_syllabus);
			 $syabuss[] =$catid[$i].'-syllabus-class';
          }
          //die;
         // echo $catid[$i];die;
         // print_r($catid);die;
		
          
			/*if (!$category){
				redirect(base_url());
			}*/

      	
				
		
	/*$query = "SELECT * FROM `categories` WHERE `slug`='".$catslug[$i]['slug']."'";
			$category = $this->db->query($query)->result_array();
				$catid[] = $category[0]['slug'];
				$this->data['url'] = $catid.'-syllabus-class';*/




		//var_dump($category[0]);
		//	exit();

			
            //print_r($all_syllabus);die;
			
			$this->data['category'] = $category[0];
            $this->data['class_static_name'] = "";
            $this->data['url']=$syabuss;
            
			$this->data['title'] = $category[0]['meta_title'];
			$this->data['meta_description'] = $category[0]['meta_description'];

			$this->data['title'] = $category[0]['name'].' - '.strtoupper($category[0]['short_cat']).' Syllabus for Classes 1 to 10';
			$this->data['meta_description'] = 'Find complete syllabus for '.strtoupper($category[0]['short_cat']).' exams for classes 1, 2, 3, 4, 5, 6, 7, 8, 9, 10';

			$this->data['content'] = "general/syllabus_page";
			$this->_render_page('templates/template', $this->data);  

	} 

	public function syllabus_pages()
	{
		$slug =  $this->uri->segment(1);
       $slugs =  $this->uri->segment(2);
        // echo $slug;die;
		if($slug!=''){
			$slug_array = explode('-', $slug);
			//print_r($slug_array);die;
			if($slugs != 'syllabus'){
				redirect(base_url());
			}
			$catslug = $slug_array[0];
			 //echo $catslug;die;
			// exit();
			$this->data['categories'] = $this->base_model->get_details('categories');
		
			$query = "SELECT * FROM `categories` WHERE `slug`='".$catslug."'";
			$category = $this->db->query($query)->result_array();
			if (!$category){
				redirect(base_url());
			}

			$catid['catid'] = $category[0]['catid'];
			//var_dump($category[0]);
			 //exit();

			$all_syllabus = $this->base_model->fetch_records_from('syllabus',$catid);
             //print_r($all_syllabus);die;
			$this->data['all_syllabus'] = $all_syllabus;
			$this->data['category'] = $category[0]; 
			 $this->data['class_static_name'] = "umo-syllabus";
            $this->data['url'] = $slug_array[0];
			$this->data['title'] = $category[0]['meta_title'];
			$this->data['meta_description'] = $category[0]['meta_description'];

			$this->data['title'] = $category[0]['name'].' - '.strtoupper($category[0]['short_cat']).' Syllabus for Classes 1 to 10';
			$this->data['meta_description'] = 'Find complete syllabus for '.strtoupper($category[0]['short_cat']).' exams for classes 1, 2, 3, 4, 5, 6, 7, 8, 9, 10';

			$this->data['content'] = "general/syllabus_page";
			$this->_render_page('templates/template', $this->data);

		}
		else{
			redirect(base_url());
		}
		# code...
	}

	public function sample_papers()
	{
		$slug =  $this->uri->segment(1);
		if($slug!=''){
			$slug_array = explode('-', $slug);
			if($slug_array[1] != 'sample' && $slug_array[1] != 'papers'){
				redirect(base_url());
			}
			$catslug = $slug_array[0];
			// echo $catslug;
			// exit();
			$this->data['categories'] = $this->base_model->get_details('categories');
		
			$query = "SELECT * FROM `categories` WHERE `slug`='".$catslug."'";
			$category = $this->db->query($query)->result_array();
			if (!$category){
				redirect(base_url());
			}

			$catid['catid'] = $category[0]['catid'];

			$all_syllabus = $this->base_model->fetch_records_from('syllabus',$catid);
			$query =   'SELECT s.worksheet_id, q.* FROM syllabus s INNER JOIN questions q ON s.worksheet_id = q.worksheet_id WHERE s.catid ='.$catid['catid'].' ORDER BY rand()';
			/*echo $this->last->query(); die;*/
			$questions = $this->db->query($query)->result();
			//print_r($questions);die;
			$all_questions = $questions;

			$this->data['all_syllabus'] = $all_syllabus;
			$this->data['category'] = $category[0];

			if($category[0]['short_cat']=='umo')
			{
				$this->data['title'] = 'CREST Mathematics Olympiad Sample Papers, Mock Test Papers, Question Papers for Classes 1 to 10';
			$this->data['meta_description'] = 'CREST Mathematics Olympiad sample papers, mock tests for classes 1 to 10. CMO is an International Mathematics Olympiad which attracts students from all across the globe.';

			}
			elseif ($category[0]['short_cat']=='uso') {
				# code...
				$this->data['title'] = 'CREST Science Olympiad Sample Papers, Mock Test Papers, Question Papers for Classes 1 to 10';
			$this->data['meta_description'] = 'CREST Science Olympiad sample papers, mock tests for classes 1 to 10. CSO is an International Science Olympiad which attracts students from all across the globe.';
			}
			elseif ($category[0]['short_cat']=='ueo') {
				# code...
				$this->data['title'] = 'CREST English Olympiad Sample Papers, Mock Test Papers, Question Papers for Classes 1 to 10';
			$this->data['meta_description'] = 'CREST English Olympiad sample papers, mock tests for classes 1 to 10. CEO is an International English Olympiad which attracts students from all across the globe.';
			}
			elseif ($category[0]['short_cat']=='uro') {
				# code...
				$this->data['title'] = 'CREST Reasoning Olympiad Sample Papers, Mock Test Papers, Question Papers for Classes 1 to 10';
			$this->data['meta_description'] = 'CREST Reasoning Olympiad sample papers, mock tests for classes 1 to 10. CRO is an International Reasoning Olympiad which attracts students from all across the globe.';
			}
			elseif ($category[0]['short_cat']=='uco') {
				# code...
				$this->data['title'] = 'CREST Cyber Olympiad Sample Papers, Mock Test Papers, Question Papers for Classes 1 to 10';
			$this->data['meta_description'] = 'CREST Cyber Olympiad sample papers, mock tests for classes 1 to 10. CCO is an International Cyber Olympiad which attracts students from all across the globe.';
			}
			elseif ($category[0]['short_cat']=='ufo') {
				# code...
				$this->data['title'] = 'CREST French Olympiad Sample Papers, Mock Test Papers, Question Papers for Classes 6 to 10';
			$this->data['meta_description'] = 'CREST French Olympiad sample papers, mock tests for classes 6 to 10. CFO is an International French Olympiad which attracts students from all across the globe.';
			}

			// $this->data['title'] = $category[0]['name'].' - '.strtoupper($category[0]['short_cat']).' Sample Papers, '.strtoupper($category[0]['short_cat']).' Question Papers';
			// $this->data['meta_description'] = 'Find complete preparation guide for '.strtoupper($category[0]['short_cat']).' exams through multiple sample papers, practice papers & mock test papers for classes 1, 2, 3, 4, 5, 6, 7, 8, 9, 10';

			$this->data['slug'] = $slug;
			//echo $slug;die;
			$this->data['catslug'] = $slug_array[0];
			
			$this->data['content'] = "general/sample_paper";
			$this->_render_page('templates/template', $this->data);

		}
		else{
			redirect(base_url());
		}
		# code...
	}
	public function sample_questions()
	{

		$slug =  $this->uri->segment(1);

		if($slug!=''){
			$slug_array = explode('-', $slug);


			$catslug = $slug_array[0];
			$catname = strtoupper($slug_array[3])." ".$slug_array[4];

			$query = "SELECT * FROM `categories` WHERE `slug`='".$catslug."'";
			$category = $this->db->query($query)->result_array();
			if (!$category){
				redirect(base_url());
			}

			// $catid['catid'] = $category[0]['catid'];
			// $catid['name'] =  $catname;

			//$all_syllabus = $this->base_model->fetch_records_from('syllabus',$catid);
			// if($slug_array[0] != 'sample' && $slug_array[1] != 'questions'){
			// 	redirect(base_url());
			// }
			//$classid = $slug_array[2];
			// echo $catslug;
			// exit();
			// $this->data['categories'] = $this->base_model->get_details('categories');
		
			// $query = "SELECT * FROM `syllabus` WHERE `id`='".$classid."'";
			// $this_syllabus = $this->db->query($query)->result_array();

			//$where['id'] = $classid;
			$where['catid'] =  $category[0]['catid'];
			$where['name'] = $catname;

			$where2['catid'] =  $category[0]['catid'];
			$where2['name !='] = $catname;

			$this->data['other_sample_paper_other_class'] = $this->base_model->fetch_records_from('syllabus',$where2);





			$this_syllabus = $this->base_model->fetch_records_from('syllabus',$where);
			if (!$this_syllabus){
				redirect(base_url());
			}
			$where_cat['catid'] = $this_syllabus[0]->catid;
			$this_category = $this->base_model->fetch_records_from('categories',$where_cat);

			// $query =   'SELECT q.* FROM syllabus s INNER JOIN questions q ON s.worksheet_id = q.worksheet_id WHERE s.id ='.$classid.' ORDER BY rand()';

			// echo 'SELECT q.* FROM syllabus s INNER JOIN questions q ON s.worksheet_id = q.worksheet_id WHERE s.id ='.$this_syllabus[0]->id.' ORDER BY rand()';die;
			$query =   'SELECT q.* FROM syllabus s INNER JOIN questions q ON s.worksheet_id = q.worksheet_id WHERE s.id ='.$this_syllabus[0]->id.' ORDER BY rand()';
			$questions = $this->db->query($query)->result();

			//print_r($questions);die;
			
			$all_questions = $questions;

			$where3['catid !='] =  $this_syllabus[0]->catid;
			

			$this->data['other_sample_paper_same_course'] = $this->base_model->fetch_records_from('categories',$where3);

			
	    	/*$query =  "SELECT * FROM `sample_papers` WHERE `slug` != '".$slug."' AND subject = '".$this_sample_paper['subject']."' AND course = '".$this_sample_paper['course']."'".$level2;
	    	$this->data['other_sample_paper_other_class'] = $this->db->query($query)->result_array();

	    	$query =  "SELECT * FROM `sample_papers` WHERE `slug` != '".$slug."' AND course = '".$this_sample_paper['course']."' AND class = '".$this_sample_paper['class']."'".$level2;
	    	$this->data['other_sample_paper_same_course'] = $this->db->query($query)->result_array();*/

			$this->data['this_category'] = $this_category[0];
			$this->data['this_syllabus'] = $this_syllabus[0];
			$this->data['all_questions'] = $all_questions;
			$this->data['this_class'] = ucwords($slug_array[3])." ".$slug_array[4];

			//$this->data['slug'] = $slug;
			$this->data['catslug'] = $slug_array[0];
			$this->data['catclass'] = $slug_array[4];

if($this_category[0]->short_cat=='cmo')
			{
				$this->data['title'] = $this_syllabus[0]->name.' Math Olympiad Sample Papers, Sample Questions for '.$this_syllabus[0]->name.' Maths - CREST Olympiads';
			$this->data['meta_description'] = 'Find '.$this_syllabus[0]->name.' Math Olympiad sample papers for CREST Mathematics Olympiad Exam 2019.';

			}
			elseif ($this_category[0]->short_cat=='cso') {
				# code...
				$this->data['title'] = $this_syllabus[0]->name.' Science Olympiad Sample Papers, Sample Questions for '.$this_syllabus[0]->name.' Science - CREST Olympiads';
			$this->data['meta_description'] = 'Find '.$this_syllabus[0]->name.' Science Olympiad sample papers for CREST Science Olympiad Exam 2019.';
			}
			elseif ($this_category[0]->short_cat=='ceo') {
				# code...
				$this->data['title'] = $this_syllabus[0]->name.' English Olympiad Sample Papers, Sample Questions for '.$this_syllabus[0]->name.' English - CREST Olympiads';
			$this->data['meta_description'] = 'Find '.$this_syllabus[0]->name.' English Olympiad sample papers for CREST English Olympiad Exam 2019.';
			}
			elseif ($this_category[0]->short_cat=='cro') {
				# code...
				$this->data['title'] = $this_syllabus[0]->name.' Reasoning Olympiad Sample Papers, Sample Questions for '.$this_syllabus[0]->name.' Reasoning - CREST Olympiads';
			$this->data['meta_description'] = 'Find '.$this_syllabus[0]->name.' Reasoning Olympiad sample papers for CREST Reasoning Olympiad Exam 2019.';
			}
			elseif ($this_category[0]->short_cat=='cco') {
				# code...
				$this->data['title'] = $this_syllabus[0]->name.' Cyber Olympiad Sample Papers, Sample Questions for '.$this_syllabus[0]->name.' Cyber - CREST Olympiads';
			$this->data['meta_description'] = 'Find '.$this_syllabus[0]->name.' Cyber Olympiad sample papers for CREST Cyber Olympiad Exam 2019.';
			}
			elseif ($this_category[0]->short_cat=='cfo') {
				# code...
				$this->data['title'] = $this_syllabus[0]->name.' French Olympiad Sample Papers, Sample Questions for '.$this_syllabus[0]->name.' French - CREST Olympiads';
			$this->data['meta_description'] = 'Find '.$this_syllabus[0]->name.' French Olympiad sample papers for CREST French Olympiad Exam 2019.';
			}
			/*$this->data['title'] = $this_category[0]->name.' Sample Questions for '.$this_syllabus[0]->name.' - CREST Olympiads';
			$this->data['meta_description'] = 'Find complete preparation guide for '.strtoupper($this_category[0]->short_cat).' exams through multiple sample questions for '.$this_syllabus[0]->name;*/

			//$this->data['slug'] = $slug;

			$this->data['content'] = "general/sample_questions";
			$this->_render_page('templates/template', $this->data);

		}
		else{
			redirect(base_url());
		}
		# code...
	}


    function subject_questions(){

        $slug = '';
        $slug = $this->uri->segment(2);
        
        $title_of_pic = false;

        if ($slug != '') {

            $id = $slug;
            $picture_arr = $this->db->query("SELECT * FROM `sample_question_images` WHERE `slug`='" . $id . "' and `category` = 'superminds'")->row_array();
            if (!$picture_arr){
                redirect('superminds', 'refresh');
            }

            $next_picture_slug = $prev_picture_slug = '0';
            
            if($picture_arr['id'] < 53){
                $next_picture_id = $picture_arr['id']+1;
                $next_picture = $this->db->query("SELECT * FROM `sample_question_images` WHERE `id`='" . $next_picture_id . "'")->row_array();
                $next_picture_slug = $next_picture['slug'];
            }

            if($picture_arr['id'] > 21){
                $prev_picture_id = $picture_arr['id']-1;
                $prev_picture = $this->db->query("SELECT * FROM `sample_question_images` WHERE `id`='" . $prev_picture_id . "'")->row_array();
                $prev_picture_slug = $prev_picture['slug'];
            }

            // echo $prev_picture_slug.$next_picture_slug;
            // exit;

            $image_href     = base_url() . 'assets/games/superminds/'.$picture_arr['image'];
            $data_text      = $picture_arr['title'];
            $image_alt      = $picture_arr['alt'];
            //$data_text = "Amazing Facts which will blow your mind!";
            $fb_share_link       = "https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.olympiadsuccess.in%2Fsuperminds%2F".$id."&amp;src=sdkpreparse";
            $fb_comment_box_link = base_url() . 'superminds/'.$id;

            $this->data = array('image_alt' => $image_alt,'slug' => $id,'data_text' => $data_text, 'image_href' => $image_href, 'whatsapp_url' => $fb_comment_box_link, 'fb_share_link' => $fb_share_link, 'fb_comment_box_link' => $fb_comment_box_link );
            
            $this->data['next_picture_slug'] = $next_picture_slug;
            $this->data['prev_picture_slug'] = $prev_picture_slug;


            $this->data['title'] = $picture_arr['title'];
            $this->data['meta_description'] = $picture_arr['description'];    
            $title_of_pic = true;
            
        }
        $all_pictures    = $this->db->query("SELECT * FROM `sample_question_images` WHERE `category`='superminds'");
        $this->data['all_pictures'] = $all_pictures;
        if($title_of_pic == false){        
            $this->data['title'] = 'Super Minds Puzzles for everybody!';
            $this->data['meta_description'] = 'Super Mind puzzles for your child can be found here';
        }
        
        $this->data['content'] = "breaktime/superminds";
        $this->_render_page('temp/template', $this->data);
    }
    

public function cmss_page()
	{
      	$slug =  $this->uri->segment(1); 

		if($slug!=''){
		 
		 if($slug == "marking-scheme"){


		 	    $this->data['slug'] = $slug;
				$this->data['title'] = 'Olympiad Exam Pattern and Marking Scheme 2019 | CREST Olympiads';
				$this->data['meta_description'] = 'CREST Olympiads has released the exam pattern and marking scheme for 2019-20 Olympiad exams.'; 
				$this->data['content'] = "cms_pages/marking_scheme";
			}
			  
			$this->_render_page('templates/template', $this->data);

		 } 
	}
	public function cms_page()
	{
		
		$slug =  $this->uri->segment(2);
		$slugsubject =  $this->uri->segment(1);
     //  echo $slugsubject;die;
		// $route['exam-schedule'] = 'crest/cms_page';
		// $route['marking-scheme'] = 'crest/cms_page';
		// $route['cut-off-and-rankings'] = 'crest/cms_page';
		// $route['awards'] = 'crest/cms_page';

		if($slugsubject!=''){
			if($slugsubject == 'exam-schedule'){
				$this->data['title'] = 'Olympiad Exam Dates & Schedule 2019-20 | CREST Olympiads';
				$this->data['meta_description'] = 'Check important Olympiad exam dates for CREST Olympiads 2019-20.';

				$this->data['content'] = "cms_pages/exam_schedule";
			}
			else if($slug == 'marking-scheme'){
                 
                 if($slugsubject == 'umo') 

                {
                 $this->data['ultitle'] = 'UNICUS Mathematics Olympiad';
                 $this->data['detailsoflevel1'] = '<h3 id="cmo-marking-scheme-l1">UNICUS Mathematics Olympiad (CMO)</h3>
			<table class="responsive-table highlight">
				<tbody>
					<tr>
						<td>Class</td>
						<td>Topic/ Section</td>
						<td>No. of Questions</td>
						<td>Marks per Question</td>
						<td>Total Marks</td>
					</tr>
					<tr>
						<td rowspan="3">
							1<sup>st</sup> to 4<sup>th</sup>
						</td>
						<td>Practical Mathematics</td>
						<td>25</td>
						<td>1</td>
						<td>25</td>
					</tr>
					<tr>
						<td>Achievers Section</td>
						<td>10</td>
						<td>2</td>
						<td>20</td>
					</tr>
					<tr>
						<td><strong>Grand Total</strong></td>
						<td><strong>35</strong></td>
						<td> </td>
						<td><strong>45</strong></td>
					</tr>
					<tr>
						<td rowspan="3">
							5<sup>th</sup> to 10<sup>th</sup>
						</td>
						<td>Practical Mathematics</td>
						<td>40</td>
						<td>1</td>
						<td>40</td>
					</tr>
					<tr>
						<td>Achievers Section</td>
						<td>10</td>
						<td>2</td>
						<td>20</td>
					</tr>
					<tr>
						<td><strong>Grand Total</strong></td>
						<td><strong>50</strong></td>
						<td> </td>
						<td><strong>60</strong></td>
					</tr>
				</tbody>
			</table>';

            $this->data['detailsoflevel2'] ='<h3 id="cmo-marking-scheme-l2">UNICUS Mathematics Olympiad (UMO)</h3>
			<table class="responsive-table highlight">
				<tbody>
					<tr>
						<td>Class</td>
						<td>Topic/ Section</td>
						<td>No. of Questions</td>
						<td>Marks per Question</td>
						<td>Total Marks</td>
					</tr>
					<tr>
						<td rowspan="3">
							3<sup>rd</sup> to 10<sup>th</sup>
						</td>
						<td>Practical Mathematics</td>
						<td>40</td>
						<td>1</td>
						<td>40</td>
					</tr>
					<tr>
						<td>Achievers Section</td>
						<td>10</td>
						<td>2</td>
						<td>20</td>
					</tr>
					<tr>
						<td><strong>Grand Total</strong></td>
						<td><strong>50</strong></td>
						<td> </td>
						<td><strong>60</strong></td>
					</tr>
				</tbody>
			</table>';

                }

                else if($slugsubject == 'uso') { 

                 $this->data['ultitle'] = 'UNICUS Science Olympiad';
                 $this->data['detailsoflevel1'] ='<h3 id="cso-marking-scheme-l1">UNICUS Science Olympiad (USO)</h3>
			<table class="responsive-table highlight">
				<tbody>
					<tr>
						<td>Class</td>
						<td>Topic/ Section</td>
						<td>No. of Questions</td>
						<td>Marks per Question</td>
						<td>Total Marks</td>
					</tr>
					<tr>
						<td rowspan="3">
							1<sup>st</sup> to 4<sup>th</sup>
						</td>
						<td>Practical Science</td>
						<td>25</td>
						<td>1</td>
						<td>25</td>
					</tr>
					<tr>
						<td>Achievers Section</td>
						<td>10</td>
						<td>2</td>
						<td>20</td>
					</tr>
					<tr>
						<td><strong>Grand Total</strong></td>
						<td><strong>35</strong></td>
						<td> </td>
						<td><strong>45</strong></td>
					</tr>
					<tr>
						<td rowspan="3">
							5<sup>th</sup> to 10<sup>th</sup>
						</td>
						<td>Practical Science</td>
						<td>40</td>
						<td>1</td>
						<td>40</td>
					</tr>
					<tr>
						<td>Achievers Section</td>
						<td>10</td>
						<td>2</td>
						<td>20</td>
					</tr>
					<tr>
						<td><strong>Grand Total</strong></td>
						<td><strong>50</strong></td>
						<td> </td>
						<td><strong>60</strong></td>
					</tr>
				</tbody>
			</table>
		 '; 
                 $this->data['detailsoflevel2'] ='<h3 id="cso-marking-scheme-l2">UNICUS Science Olympiad (USO)</h3>
			<table class="responsive-table highlight">
				<tbody>
					<tr>
						<td>Class</td>
						<td>Topic/ Section</td>
						<td>No. of Questions</td>
						<td>Marks per Question</td>
						<td>Total Marks</td>
					</tr>
					<tr>
						<td rowspan="3">
							3<sup>rd</sup> to 10<sup>th</sup>
						</td>
						<td>Practical Science</td>
						<td>40</td>
						<td>1</td>
						<td>40</td>
					</tr>
					<tr>
						<td>Achievers Section</td>
						<td>10</td>
						<td>2</td>
						<td>20</td>
					</tr>
					<tr>
						<td><strong>Grand Total</strong></td>
						<td><strong>50</strong></td>
						<td> </td>
						<td><strong>60</strong></td>
					</tr>
				</tbody>
			</table>';
                }
                 else if($slugsubject == 'ueo') { 

                 $this->data['ultitle'] = 'UNICUS English Olympiad';
                 $this->data['detailsoflevel1'] ='<h3 id="ceo-marking-scheme-l1">UNICUS English Olympiad (UEO)</h3>
			<table class="responsive-table highlight">
				<tbody>
					<tr>
						<td>Class</td>
						<td>Topic/ Section</td>
						<td>No. of Questions</td>
						<td>Marks per Question</td>
						<td>Total Marks</td>
					</tr>
					<tr>
						<td rowspan="3">
							1<sup>st</sup> to 4<sup>th</sup>
						</td>
						<td>English Language</td>
						<td>25</td>
						<td>1</td>
						<td>25</td>
					</tr>
					<tr>
						<td>Achievers Section</td>
						<td>10</td>
						<td>2</td>
						<td>20</td>
					</tr>
					<tr>
						<td><strong>Grand Total</strong></td>
						<td><strong>35</strong></td>
						<td> </td>
						<td><strong>45</strong></td>
					</tr>
					<tr>
						<td rowspan="3">
							5<sup>th</sup> to 10<sup>th</sup>
						</td>
						<td>English Language</td>
						<td>40</td>
						<td>1</td>
						<td>40</td>
					</tr>
					<tr>
						<td>Achievers Section</td>
						<td>10</td>
						<td>2</td>
						<td>20</td>
					</tr>
					<tr>
						<td><strong>Grand Total</strong></td>
						<td><strong>50</strong></td>
						<td> </td>
						<td><strong>60</strong></td>
					</tr>
				</tbody>
			</table>';
                 $this->data['detailsoflevel2'] ='<h3 id="ceo-marking-scheme-l2">CREST English Olympiad (CEO)</h3>
			<table class="responsive-table highlight">
				<tbody>
					<tr>
						<td>Class</td>
						<td>Topic/ Section</td>
						<td>No. of Questions</td>
						<td>Marks per Question</td>
						<td>Total Marks</td>
					</tr>
					<tr>
						<td rowspan="3">
							3<sup>rd</sup> to 10<sup>th</sup>
						</td>
						<td>English Language</td>
						<td>40</td>
						<td>1</td>
						<td>40</td>
					</tr>
					<tr>
						<td>Achievers Section</td>
						<td>10</td>
						<td>2</td>
						<td>20</td>
					</tr>
					<tr>
						<td><strong>Grand Total</strong></td>
						<td><strong>50</strong></td>
						<td> </td>
						<td><strong>60</strong></td>
					</tr>
				</tbody>
			</table>';
             }
                $this->data['slug'] == $slugsubject;
				$this->data['title'] = 'Olympiad Exam Pattern and Marking Scheme 2019 | CREST Olympiads';
				$this->data['meta_description'] = 'CREST Olympiads has released the exam pattern and marking scheme for 2019-20 Olympiad exams.';

				$this->data['content'] = "cms_pages/marking_scheme";

			}

           
			else if($slugsubject == 'cut-off-and-rankings'){
				$this->data['title'] = 'Olympiad Exam Cut Off and Ranking Criteria - CREST Olympiads';
				$this->data['meta_description'] = 'Know about cut off and ranking criteria for qualification in CEO, CRO, CMO, CFO, CGKO, CSO, CCO.';

				$this->data['content'] = "cms_pages/cut_off_and_rankings";
			}
			else if($slugsubject == 'awards'){
				$this->data['title'] = 'Awards/Scholarships - CREST Olympiads';
				$this->data['meta_description'] = 'Know about awards or prizes in CEO, CRO, CMO, CFO, CGKO, CSO, CCO.';

				$this->data['content'] = "cms_pages/awards";
			}
			else if($slugsubject == 'sample-papers'){
				$this->data['title'] = 'CREST Olympiads Sample Papers, Practice Papers, Mock Tests';
				$this->data['meta_description'] = 'Get latest Sample question Papers for CEO, CRO, CMO, CFO, CGKO, CSO, CCO.';
                $this->data['categories'] = $this->base_model->get_details('categories');
				$this->data['content'] = "cms_pages/sample_paper";
			}
			else if($slugsubject == 'terms-of-use'){
				$this->data['title'] = 'CREST Olympiads Terms of Use';
				$this->data['meta_description'] = 'Terms of Use of CREST Olympiads';

				$this->data['content'] = "cms_pages/terms_of_use";
			}
			else if($slugsubject == 'privacy-policy'){
				$this->data['title'] = 'CREST Olympiads Privacy Policy';
				$this->data['meta_description'] = 'Privacy Policy of CREST Olympiads';

				$this->data['content'] = "cms_pages/privacy_policy";
			}
			else{
				redirect(base_url());
			}

			$this->_render_page('templates/template', $this->data);

		}
		else{
			redirect(base_url());
		}
		# code...
	}
	public function contact(){

		$this->data['title'] = 'Contact Us';
		$this->data['active_menu'] = 'contact';

		
        // $vals = array(
        //     'word' => $random_number,
        //     'img_path' => './assets/captcha/',
        //     'img_url' => base_url() . 'assets/captcha/',
        //     'img_width' => 140,
        //     'img_height' => 32,
        //     'expiration' => 7200
        // );
        // $this->load->helper('captcha');
        // $this->data['captcha'] = create_captcha($vals);
        
        // $this->load->model('general_model');
        // $insert = array('page' => 'CONTACTUS', 'token' => $token, 'captcha_value' => $random_number, 
        //     'ip_address' => $_SERVER['REMOTE_ADDR'], 'createtime' => date('Y-m-d H:i:s'));
        // $this->general_model->saveCaptchaInDb($insert);
        
        
        
        // $this->session->set_userdata('captchaWord', $this->data['captcha']['word']);
        
		// $this->load->model('contact');
		$this->load->model('Contact');
		//$this->load->helper('captcha');

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('name_contact', 'Contact Person', 'required|min_length[3]|max_length[75]');
		$this->form_validation->set_rules('email_contact', 'Email', 'required|valid_email|max_length[75]');
		$this->form_validation->set_rules('phone_contact', 'Phone', 'required|max_length[20]');
		$this->form_validation->set_rules('message_contact', 'Message', 'max_length[300]');
		// $this->form_validation->set_rules('userCaptcha', 'Captcha', 'required|callback_check_captcha');
  //       $userCaptcha = $this->input->post('userCaptcha');


		if ($this->form_validation->run()) {
			if ($this->input->post()) {
				// $data = $this->input->post();
				
				$base_url=base_url();

				$contact_url1=base_url() . 'contact-us';
				$contact_url2=base_url() . 'crest/contact';

				
				// $badWords = array("sex","sexy","sexe","fuck","?????","bitcoin","can't live","cash bonus","claim","claim now","cryptocurrency","dollars","Earn $","fast money","forex","free girl","free money","free offer","http://","Hurry up","income","Instant earnings","instant income","Invest","Make $","million","Million dollars","mining","more money","no claim","only $","score with babes","serious cash","spam","Viagra","Weight loss","winner","winning","you are a winner","zero risk");

				$badWords = array("sex","sexy","sexe","fuck","bitcoin","cash bonus","claim","claim now","cryptocurrency","dollars","Earn","fast money","forex","free girl","free money","free offer","Hurry up","income","Instant earnings","instant income","Invest","Make","million","Million dollars","mining","more money","no claim","only","score with babes","serious cash","spam","Viagra","Weight loss","winner","winning","you are a winner","zero risk","http","https");

				$string = $this->input->post('message_contact');

				$matches = array();
				$matchFound = preg_match_all(
				                "/\b(" . implode($badWords,"|") . ")\b/i", 
				                $string, 
				                $matches
				              );

				if ($matchFound==0) {

		 if($this->input->post('confirm_terms')=='' && ($_SERVER['HTTP_REFERER']==$base_url || $_SERVER['HTTP_REFERER']==$contact_url1 || $_SERVER['HTTP_REFERER']==$contact_url2 ))
                {
				$name = $this->input->post('name_contact');
				$phone = $this->input->post('phone_contact');
				$email = $this->input->post('email_contact');
				$message = $this->input->post('message_contact');
				$query_type = $this->input->post('query_type');


	            /* Insert into database */
	            $insert = $mailParams = array('name' => $name, 'email' => $email , 'phone' => $phone,
	                    'message' => $message ,'query_type' => $query_type , 'ip_address' => $_SERVER['HTTP_X_REAL_IP'],'date' => date('Y-m-d H:i:s'));

				// $data['date'] = date('d-m-Y H:i:s');
				$intLastInsertId = $this->Contact->add($insert);

				if(!empty($intLastInsertId)) {

                	$this->load->model('Emails_model');
	                if(!$this->Emails_model->sendContactUsMail($email, $mailParams)) {
	                    //$response = array('success' => false, 'message' =>'');exit;
						$this->session->set_flashdata('success_message', 'Thanks! We\'ll get back to you as soon as possible.');
	                }
				} else {
					$this->session->set_flashdata('error_message', 'It seems some problem has occured, Please contact us at '.$this->config->item('support_phone').'.',1);
				}
			}
		}
	}
}

		// $random_number = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
  //       $vals = array(
  //           'word' => $random_number,
  //           'img_path' => './assets/captcha/',
  //           'img_url' => base_url() . 'assets/captcha/',
  //           'img_width' => 140,
  //           'img_height' => 32,
  //           'expiration' => 7200
  //       );
  //       $this->data['captcha'] = create_captcha($vals);
  //       $this->session->set_userdata('captchaWord', $this->data['captcha']['word']);

		$this->data['content'] = "general/contact_us";
		$this->_render_page('templates/template', $this->data);
	}

	public function pre_registration_form(){

		if ($this->input->post()) {

		// $this->data['title'] = 'Contact Us';
		// $this->data['active_menu'] = 'contact';

		// // $this->load->model('contact');
		// $this->load->model('Contact');

		$this->form_validation->set_error_delimiters('<div class="red-text" style="position:absolute;">', '</div>');
		$this->form_validation->set_rules('name', 'Contact Person', 'required|min_length[3]|max_length[75]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[75]');
		$this->form_validation->set_rules('phone', 'Phone', 'required|max_length[20]');
		$this->form_validation->set_rules('school', 'School', 'required');
		$this->form_validation->set_rules('class', 'Class', 'required');

		$data['username'] = $this->input->post('name');
		$data['email'] = $this->input->post('email');
		$data['class'] = $this->input->post('class');
		$data['school'] = $this->input->post('school');
		$data['country'] = $this->input->post('country');
		$data['phone'] = $this->input->post('phone');					
		$data['date_of_registration'] = date("Y-m-d H:i:s");
        //$data['ip_address'] = $_SERVER['REMOTE_ADDR'];
        $data['ip_address']=$_SERVER['HTTP_X_REAL_IP'];
        $data['register_from_page'] = 'home_page';

		//$this->base_model->insert_operation('temp_users',$data);

		$this->data['content'] = "general/reg_form";

		$user_registered = false;
		if ($this->form_validation->run()) {
			if ($this->input->post()) {
				$email = $data1['email'] = $this->input->post('email');
				
				if( $this->base_model->fetch_records_from('users',$data1) ){
					$user_registered = true;
					$res = $this->base_model->fetch_records_from('users',$data1);
					$this->data['this_user'] = $res[0];
					$this->session->set_flashdata('error_message', 'You have already registered with this email id.',1);
					$this->data['content'] = "general/reg_form";
				
				}
				else{
					$email= $data2['email'] = $this->input->post('email');
					$phone = $data2['phone'] = $this->input->post('phone');
					$name = $data2['username'] = $this->input->post('name');
					$class = $data2['class'] = $this->input->post('class');
					$school = $data2['school'] = $this->input->post('school');
					$country = $data2['country'] = $this->input->post('country');
					// $subjects = $data2['prefered_subject'] = $this->input->post('subjects');
					$data2['date_of_registration'] = date("Y-m-d H:i:s");
            		$data2['ip_address'] = $_SERVER['HTTP_X_REAL_IP'];
            		//$data['register_from_page'] = 'home_page';

		            /* Insert into database */
		            $mailParams = array('name' => $name, 'email' => $email , 'phone' => $phone,
	                    'subjects' => $subjects, 'class' => $class, 'school' => $school);

                	$this->load->model('Emails_model');
                	if($user_registered == false){
						
						$intLastInsertId = $this->base_model->insert_operation_id('temp_users', $data2);
                		// if(!$this->Emails_model->sendSignupMail($email, $mailParams)) {
		                // 	// $this->session->set_flashdata('success_message', 'Thanks! We\'ll get back to you as soon as possible.');
		                // }
                	}
					// var_dump($subjects);
					// exit();
					// $data[''] = $this->input->post();
					// $data['date'] = date('d-m-Y H:i:s');
					
					// $intLastInsertId = $this->Contact->add($data);

					if(!empty($intLastInsertId)) {
						// $this->session->set_flashdata('success_message', 'Thanks! We\'ll contact you soon.');
						$res = $this->base_model->fetch_records_from('temp_users',$data1);
						$this->data['this_user'] = $res[0];
						$this->data['content'] = "general/reg_form";
					} else {
						$this->session->set_flashdata('error_message', 'It seems some problem has occured, Please contact us at '.$this->config->item('support_phone'),1);
						$this->data['content'] = "errors/general";
					}
					
					// $this->session->set_flashdata('error_message', 'You have already registered with this email id.',1);
				}
			}
		}
		// redirect(base_url());
		$this->_render_page('templates/template', $this->data);
	}
	else
	{
		redirect('/');
	}
	}
	public function buy_more_subjects(){

		if($this->input->post()){
			// $email = $this->input->post('email');
			$user_id = $this->input->post('user_id');
			$subjects = $this->input->post('subjects');
			$amount = $this->input->post('amount');

			$this->session->set_userdata('user_id', $user_id);
			$this->session->set_userdata('subjects', $subjects);
			$this->session->set_userdata('amount', $amount);
			// var_dump($this->input->post());
			// exit();
			redirect('crest/payment/ccavenue/');
		}
		else{
			redirect('already_paid');
		}
		

	}
	public function chk_reg()
	{

		$this->form_validation->set_error_delimiters('<div class="red-text" style="position:absolute;">', '</div>');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		$this->data['content'] = "general/check_registration";
		if($this->input->post()){
			if($this->input->post('email')){
				$chk_user['email'] = $this->input->post('email');
				//registered user
				// 	1.unpaid
				//	2.paid - full - partial
				if( $this->base_model->fetch_records_from('users',$chk_user) ){
					// $user_registered = true;
					$res = $this->base_model->fetch_records_from('users',$chk_user);
					$this->data['this_user'] = $res[0];
					$where['user_id'] = $res[0]->id;
					$where['cc_order_status'] = 'Success';
					// $subjects = $res[0]->prefered_subject;
					$paid_user_chk = $this->base_model->fetch_records_from('payments',$where);
					// var_dump($paid_user_chk);
					// exit();

					$where1['user_id']=$res[0]->id;

					$user_transaction_details = $this->base_model->fetch_records_from('user_transaction_details',$where1);

					$this->data['wallet_amount'] = $user_transaction_details[0]->wallet_amount;

					//user has already paid
					if($paid_user_chk){
						$amount = $paid_user_chk[0]->cc_amount;
						$subjects = $paid_user_chk[0]->subjects;
						// $pre_subjects = $this->config->item('main_categories');
						// $purchased_subjects = '';
						// $not_purchased_subjects = '';
						// foreach ($pre_subjects as $subj) {
						// 	if(strpos($subjects, $subj[1]) > -1){
						// 		//this subject is already purchased
						// 		$purchased_subjects .= $subj[1].",";

						// 	}else{
						// 		//these subjects aren't purchased
						// 		$not_purchased_subjects .= $subj[1].",";
						// 	}
						// }
						// // var_dump($purchased_subjects);
						// $not_purchased_subjects_ar = explode(',',$not_purchased_subjects);
						// if(count($not_purchased_subjects_ar) > 0){
						// // var_dump($not_purchased_subjects);
						// 	$this->data['not_subjects'] = $not_purchased_subjects;
						// }
						// echo $this->data['not_subjects'];
						// exit();
            			$this->session->set_userdata('user_id', $res[0]->id);
            			$this->session->set_userdata('subjects', $subjects);
            			$this->session->set_userdata('amount', $amount);
						// redirect('pay/ccavenue');
						$this->session->set_flashdata('error_message', 'You have already paid and registered with this email id.',1);
						
						redirect('already_paid');
						// $this->data['content'] = "buy/already_paid";
					}else{
						//user has not paid but registered partially
						$this->data['content'] = "general/reg_form";
						
					}

				
				}else{
					//new user
					$this_user = (object)[];
					$this_user->email = $this->input->post('email');
					$this->data['email'] = $this_user;
					$this->data['content'] = "general/reg_form";

				}
			}
		}
		
		
		$this->_render_page('templates/template', $this->data);

		
	}
	public function already_paid()
	{
		$user_id = $data['id'] = $this->session->userdata('user_id');
		if( !isset($user_id) ){
			redirect('registration');
		}
		$where_id['user_id'] = $user_id;
    	$paid_res = $this->base_model->fetch_records_from('payments',$where_id);
    	$subjects = $paid_res[0]->subjects;
		$pre_subjects = $this->config->item('main_categories');
		$purchased_subjects = '';
		$not_purchased_subjects = '';
		foreach ($pre_subjects as $subj) {
			if(strpos($subjects, $subj[1]) > -1){
				//this subject is already purchased
				$purchased_subjects .= $subj[1].",";

			}else{
				//these subjects aren't purchased
				$not_purchased_subjects .= $subj[1].",";
			}
		}
		// var_dump($purchased_subjects);
		$not_purchased_subjects_ar = explode(',',$not_purchased_subjects);
		if(count($not_purchased_subjects_ar) > 0){
		// var_dump($not_purchased_subjects);
			$this->data['not_subjects'] = $not_purchased_subjects;
		}

    	$res = $this->base_model->fetch_records_from('users',$data);
        $this->data['this_user'] = $res[0];
		$this->data['content'] = "buy/already_paid";
		$this->_render_page('templates/template', $this->data);
		# code...
	}

	public function checkUserEmail(){
		
		if ($this->input->post()) {
			
				$where['email']  =  $this->input->post('email');
				

				$res = $this->base_model->fetch_records_from('users',$where);
				


				//already pre-registered user
				if(count($res)==1 ){
					echo "0";
					

					// $this->data['content'] = "general/reg_form";

					
			}else{
				echo "1";
				// var_dump($this->input->post());
				//$this->data['content'] = "general/reg_form";		
			}
	
		// redirect(base_url());
		//$this->_render_page('templates/template', $this->data);
		}
	  
	}

	public function checkSchoolUserEmail(){
		
		if ($this->input->post()) {
			
				$where['email']  =  $this->input->post('email');
				

				$res = $this->base_model->fetch_records_from('interschool_users',$where);
				


				//already pre-registered user
				if(count($res)==1 ){
					echo "0";
					

					// $this->data['content'] = "general/reg_form";

					
			}else{
				echo "1";
				// var_dump($this->input->post());
				//$this->data['content'] = "general/reg_form";		
			}
	
		// redirect(base_url());
		//$this->_render_page('templates/template', $this->data);
		}
	  
	}

	public function checkReferralcode(){
		
		if ($this->input->post()) {
			
				$where['email !=']  =  $this->input->post('email');
				$where['referral_code'] = $this->input->post('referral_code');
				$where['referral_code_status !='] = 0;


				
				

				$res = $this->base_model->fetch_records_from('users',$where);
				


				//already pre-registered user
				if(count($res)<1 ){
					echo "0";
					

					// $this->data['content'] = "general/reg_form";

					
			}else{
				echo "1";
				// var_dump($this->input->post());
				//$this->data['content'] = "general/reg_form";		
			}
	
		// redirect(base_url());
		//$this->_render_page('templates/template', $this->data);
		}
	  
	}

	   public function create_referral_code($username) {

	   			$name = preg_replace("/[^a-zA-Z]/", "", $username);
	   			$uname=strtoupper($name);
	   			//$uname=strtoupper($username);
	   			$name = substr(str_replace(" ", "", $uname),0,4);
                
                $permitted_chars = '123456789';
				// Output: g6swmAP8X5VG4jCi
				$code=substr(str_shuffle($permitted_chars), 0, 4);
					// ini_set('display_errors', 1); 

				$referral_code=$name.$code;
           

			 	$refer_code_query = "SELECT referral_code FROM users where referral_code='".$referral_code."'";
				 
				$referral_code_query = $this->db->query($refer_code_query);

				 

                
                if($referral_code_query->num_rows() > 0) {
                    $this->create_referral_code();
                }else{
                    return $referral_code;
                }
                
            }

	public function reg_form(){

		$this->data['title'] = 'Registration For Individual';
		$this->data['active_menu'] = 'registration';

		// // $this->load->model('contact');
		// $this->load->model('Contact');
		$this->config->load('ion_auth', TRUE);

		$this->form_validation->set_error_delimiters('<div class="red-text" style="position:absolute;">', '</div>');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('name', 'Student Name', 'required');
		$this->form_validation->set_rules('father_mother_guardian_name', 'Father/Mother Guardian Name', 'required');
		$this->form_validation->set_rules('dob', 'Date of Birth', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('country', 'Country', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		// $this->form_validation->set_rules('country_code', 'Country Code', 'required');
		// $this->form_validation->set_rules('phone', 'Phone', 'required');
		// $this->form_validation->set_rules('amount', 'Amount', 'required');

		$user_registered = false;
		if ($this->input->post()) {
			if ($this->form_validation->run()) {
				$email = $data['email'] = $this->input->post('email');
				$amount = $this->input->post('amount');
				$subjects = $this->input->post('subjects');
				$payment_type=$this->input->post('payment_type');



				

				$res = $this->base_model->fetch_records_from('users',$data);

				//already pre-registered user
				if( $res ){

					// $this->data['content'] = "general/reg_form";

					$user_registered = true;
					
					
					$this->data['this_user'] = $res[0];
					$where['user_id'] = $res[0]->id;
					$where['cc_order_status'] = 'Success';
					// $subjects = $res[0]->prefered_subject;
					$paid_user_chk = $this->base_model->fetch_records_from('payments',$where);
					// var_dump($paid_user_chk);
					// exit();
					// if($paid_user_chk){
					// 	$amount = $paid_user_chk[0]->cc_amount;
					// 	$subjects = $paid_user_chk[0]->subjects;
     //        			$this->session->set_userdata('user_id', $res[0]->id);
     //        			$this->session->set_userdata('subjects', $subjects);
     //        			$this->session->set_userdata('amount', $amount);
					// 	// redirect('pay/ccavenue');
					// 	$this->session->set_flashdata('error_message', 'You have already paid and registered with this email id.',1);
					// 	redirect("already_paid");
					// }else{

						$subjects=rtrim($subjects,',');

            			$this->session->set_userdata('user_id', $res[0]->id);
            			$this->session->set_userdata('subjects', $subjects);
            			$this->session->set_userdata('amount', $amount);
						//$this->data['content'] = "buy/invoice";
						// $this->data['content'] = "general/reg_form";
						
					// }

					if( $res[0]->prefered_subject != $subjects ){
						$new_input_data['father_mother_guardian_name'] = $this->input->post('father_mother_guardian_name');
						$new_input_data['dob'] = $this->input->post('dob');
						$new_input_data['school_address'] = $this->input->post('school_address');
						$new_input_data['home_address'] = $this->input->post('home_address');
						/*$new_input_data['home_address1'] = $this->input->post('home_address1');
						$new_input_data['home_address2'] = $this->input->post('home_address2');*/
						$new_input_data['city'] = $this->input->post('city');
						if($this->input->post('country')=="India")
						{
							$new_input_data['state'] = $this->input->post('state_name');
						}
						else
						{
							$new_input_data['state'] = $this->input->post('state');
						}
						$new_input_data['country'] = $this->input->post('country');
						$new_input_data['country_code'] = $this->input->post('country_code');
						$new_input_data['pincode'] = $this->input->post('pincode');
						$new_input_data['prefered_subject'] = $subjects;
						// $new_input_data['subjects'] = $this->input->post('subjects');
						$where = array("id" => $res[0]->id);
						$res_update_q = $this->base_model->update_operation($new_input_data, 'users',$where);
						// echo $this->db->last_query();
						// exit();
					}

					$referral_code=$this->input->post('referral_code');


					if($referral_code!='')
					{

					
					// $subjects = $res[0]->prefered_subject;

					$table = $this->db->dbprefix('users');

					
		            $where2['referral_code'] = $this->input->post('referral_code');

		            $user_details = $this->base_model->fetch_records_from($table,$where2);


		            $referrer_id=$user_details[0]->id; 


		            
		            // echo $this->db->last_query();die;

					}

					else
					{

						$referrer_id="";
					}

					  $this->session->set_userdata('referrer_id', $referrer_id);

						// $transaction_date=date('Y-m-d H:i:s');
						// $transaction_status=0;

						// $table = $this->db->dbprefix('user_transaction_details');

						// $where1 = array("user_id" => $res[0]->id);

						// $transaction_details = $this->base_model->fetch_records_from($table,$where1);

						// $wallet_amount=$this->input->post('wallet_amount');

						// $max_wallet_amount=$transaction_details[0]->max_wallet_amount+$amount;

						// $wallet_amount=$transaction_details[0]->wallet_amount-$wallet_amount;


						// $transactionParams = array('user_id' => $res[0]->id, 'referrer_id' => $referrer_id ,'preferred_subjects' => $subjects, 'max_wallet_amount' => $max_wallet_amount, 'wallet_amount' => $wallet_amount,'transaction_date' => $transaction_date,'transaction_status' => $transaction_status);

						

						// $transaction_Details = $this->base_model->update_operation($transactionParams,$table,$where1);

					 
					  
					  if($amount>0 && ($amount>$user_details[0]->wallet_amount))
					  {

					  	// $amount1=$amount-$user_details[0]->wallet_amount;
					  	$this->session->set_userdata('amount', $amount);

					  	if($payment_type=="ccavenue")
					  	{
					  		redirect('pay/ccavenue');

					  	}

					  	else if ($payment_type=="razorpay") {
					  		# code...
					  		redirect('crest/payment_razorpay/razorpay');

					  	}

						
					}

					//else if($amount>0 && ($amount<$user_details[0]->wallet_amount))
					else if($amount<0)
					{

						$where1['user_id']=$res[0]->id;

            $order_by="id DESC";

            $limit=1;

           $user_transaction_details = $this->base_model->fetch_records_from('user_transaction_details',$where1,"*",$order_by,$limit);

           // echo $this->db->last_query();die;

         
           				$subjects=rtrim($subjects,',');

           				// $SubjectsArray=explode(',', $subjects);

           				// $preferred_subjects = end($SubjectsArray);


						$transaction_date=date('Y-m-d H:i:s');
						$transaction_status=1;

						$referrer_id=0;
						$final_amount = trim($amount, '-');
						//$transaction_amount=$final_amount;
						$max_wallet_amount= $user_transaction_details[0]->max_wallet_amount-$final_amount;

						
						
						$wallet_amount=$user_transaction_details[0]->wallet_amount-$final_amount;

						 $table1 = $this->db->dbprefix('user_transaction_details');
						


							$transactionParams = array('user_id' => $res[0]->id, 'referrer_id' => 0 ,'preferred_subjects' => $subjects, 'transaction_amount' => 0, 'max_wallet_amount' => $max_wallet_amount, 'wallet_amount' => $wallet_amount,'transaction_date' => $transaction_date,'transaction_status' => $transaction_status);

						

						$this->base_model->insert_operation($table1,$transactionParams);

					}

					else

					{

						 $where1['user_id']=$res[0]->id;

            $order_by="id DESC";

            $limit=1;

           $user_transaction_details = $this->base_model->fetch_records_from('user_transaction_details',$where1,"*",$order_by,$limit);

           // echo $this->db->last_query();die;

         
           				$subjects=rtrim($subjects,',');

           				// $SubjectsArray=explode(',', $subjects);

           				// $preferred_subjects = end($SubjectsArray);


						$transaction_date=date('Y-m-d H:i:s');
						$transaction_status=1;

						$referrer_id=0;
						$transaction_amount=$amount;
						$max_wallet_amount= 0;
						$wallet_amount=0;

						 $table1 = $this->db->dbprefix('user_transaction_details');
						


							$transactionParams = array('user_id' => $res[0]->id, 'referrer_id' => 0 ,'preferred_subjects' => $subjects, 'transaction_amount' => $transaction_amount, 'max_wallet_amount' => $max_wallet_amount, 'wallet_amount' => $wallet_amount,'transaction_date' => $transaction_date,'transaction_status' => $transaction_status);

						

						$this->base_model->insert_operation($table1,$transactionParams);
					}

					//$this->data['content'] = "buy/success_registration";
				
				}
				else{
					//it's a new user

					$referral_code=$this->input->post('referral_code');
					if($referral_code!='')
					{
					
					// $subjects = $res[0]->prefered_subject;

					$table = $this->db->dbprefix('users');

		            $where['referral_code'] = $this->input->post('referral_code');

		            $user_details = $this->base_model->fetch_records_from($table,$where);

		            // $updateStatus=  array('referral_code_status' => 0,'wallet'=>$user_details[0]->package_amount);

		            $referrer_id=$user_details[0]->id;
		           
		            // $this->base_model->update_operation($updateStatus, $table, $where);


		            // echo $this->db->last_query();die;

		           /* $table1 = $this->db->dbprefix('user_transaction_details');

						$where1 = array("user_id" => $referrer_id);

						$transaction_details = $this->base_model->fetch_records_from($table1,$where1);

						 //print_r($transaction_details);die;


						//$wallet_amount=$this->input->post('wallet_amount');

						//$max_wallet_amount=$transaction_details[0]->max_wallet_amount;

						if ($transaction_details[0]->wallet_amount<$transaction_details[0]->max_wallet_amount) {
							# code...

							$referer_wallet_amount=$transaction_details[0]->wallet_amount+225;
						}

						else

						{
							$referer_wallet_amount=$transaction_details[0]->wallet_amount;
						}



						$transaction_params = array('wallet_amount' => $referer_wallet_amount);

						

						$this->base_model->update_operation($transaction_params,$table1,$where1);*/




					}

					else
					{
						$referrer_id="";
					}

					  $this->session->set_userdata('referrer_id', $referrer_id);

            		 
					$name = $data['username'] = $this->input->post('name');
					$phone = $data['phone'] = $this->input->post('phone');
					$class = $data['class'] = $this->input->post('class');
					$school = $data['school'] = $this->input->post('school');
					//$subjects = $data['prefered_subject'] = $this->input->post('subjects');
					$subjects = $data['prefered_subject'] = rtrim($this->input->post('subjects'),',');
					$data['date_of_registration'] = date("Y-m-d H:i:s");
            		/*$data['ip_address'] = $_SERVER['HTTP_X_REAL_IP'];*/
					$data['ip_address'] = $_SERVER['REMOTE_ADDR'];
					$data['father_mother_guardian_name'] = $this->input->post('father_mother_guardian_name');
					$data['dob'] = $this->input->post('dob');
					$data['school_address'] = $this->input->post('school_address');
					$data['home_address'] = $this->input->post('home_address').'-'.$this->input->post('home_address1').'-'.$this->input->post('home_address2');
						//echo $new_input_data['home_address'];die;
					$data['city'] = $this->input->post('city');
					if($this->input->post('country')=="India")

						{
							$data['state'] = $this->input->post('selectstate');
						}
						else
						{
							$data['state'] = $this->input->post('state');
						}
					$data['country'] = $this->input->post('country');
					$data['country_code'] = $this->input->post('country_code');
					$data['pincode'] = $this->input->post('pincode');
					$data['active'] = 1;

					$data['referral_code'] = $this->create_referral_code($name);

					$user_password=$this->input->post('password');
				$this->load->model('ion_auth_model');

                $data['password'] = $this->ion_auth_model->hash_password($user_password);


					$amount = $this->input->post('amount');
        			$this->session->set_userdata('amount', $amount);
        		
        			$this->data['this_user'] = (object) $data;

        			//$subjects=rtrim($subjects,',');

		            /* Insert into database */
		            $mailParams = array('name' => $name, 'email' => $email , 'phone' => $phone,
	                    'subjects' => $subjects, 'class' => $class, 'school' => $school);

                	$this->load->model('Emails_model');
                	if($user_registered == false){
						
						$intLastInsertId = $this->base_model->insert_operation_id('users', $data);

					/*	$transaction_date=date('Y-m-d H:i:s');
						$transaction_status=0;


						 $transactionParams = array('user_id' => $intLastInsertId, 'referrer_id' => $referrer_id ,'preferred_subjects' => $subjects, 'max_wallet_amount' => $amount, 'wallet_amount' => 0,'transaction_date' => $transaction_date,'transaction_status' => $transaction_status);

						 $transaction_Details = $this->base_model->insert_operation('user_transaction_details', $transactionParams);*/

                		// if(!$this->Emails_model->sendSignupMail($email, $mailParams)) {
		                // 	// $this->session->set_flashdata('success_message', 'Thanks! We\'ll get back to you as soon as possible.');
		                // }
                	}

					if(!empty($intLastInsertId)) {
            			$this->session->set_userdata('user_id', $intLastInsertId);
            			$this->session->set_userdata('subjects', $subjects);
            			// $this->data['this_user'] = $data;
            			// var_dump($this->data['this_user']);
            			// exit();
            			//$this->data['content'] = "buy/invoice";
            			// $this->disableLayout("buy/invoice");

            			if($payment_type=="ccavenue")
					  	{
					  		redirect('pay/ccavenue');

					  	}

					  	else if ($payment_type=="razorpay") {
					  		# code...
					  		redirect('crest/payment_razorpay/razorpay');

					  	}
						 //redirect('pay/ccavenue');
						$this->session->set_flashdata('success_message', 'Thanks! We\'ll contact you soon.');
					} else {

						$this->session->set_flashdata('error_message', 'It seems some problem has occured, Please contact us at '.$this->config->item('support_phone'),1);
					}
					// $this->data['content'] = "buy/success_registration";
				}
			}else{
				// var_dump($this->input->post());
				$this->data['content'] = "general/reg_form";		
			}
		}else{
			// echo "no input";
			

			if ($this->ion_auth->logged_in()) {
			 $userid = $this->ion_auth->get_user_id();
                            if (is_numeric($userid)) {
                                $result = $this->base_model->run_query("select * FROM  users where id=" . $userid);

			$chk_user['email'] = $result[0]->email;
			$chk_user_details['user_id'] = $userid;
			

                                    $res = $this->base_model->fetch_records_from('users',$chk_user);
                                     $res2 = $this->base_model->fetch_records_from('user_transaction_details',$chk_user_details);

                                    


                                     $res2 = $this->base_model->run_query("SELECT GROUP_CONCAT(preferred_subjects SEPARATOR ',') as subjects FROM user_transaction_details WHERE user_id= ".$userid." and preferred_subjects!='0'");

                                


                                    $this->data['this_user'] = $res[0];
                                    if(count($res2)>0)
                                     {
                                     	 $this->data['this_user_details'] = $res2[0];
                                     }

                                    $where1['user_id']=$res[0]->id;

                    //$user_transaction_details = $this->base_model->fetch_records_from('user_transaction_details',$where1);

            $order_by="id DESC";

            $limit=1;
                    $user_transaction_details = $this->base_model->fetch_records_from('user_transaction_details',$where1,"*",$order_by,$limit);

           // echo $this->db->last_query();die;

           $this->data['wallet_amount'] = $user_transaction_details[0]->wallet_amount;

                    $this->data['wallet_amount'] = $user_transaction_details[0]->wallet_amount;
                }

            }

			$this->data['content'] = "general/reg_form";		

			// exit();
		}
		
		// redirect(base_url());
		$this->_render_page('templates/template', $this->data);
	}

	public function reward_points(){

		if (!$this->ion_auth->logged_in()) {

		 	 redirect('auth/login', 'refresh');

		 }

		$this->data['title'] = 'Reward Points';
		$this->data['active_menu'] = 'reward_points';
			

		 $userid = $this->ion_auth->get_user_id();

		  if (is_numeric($userid)) {
          
            $where1['user_id']=$userid;
            $where2['id']=$userid;

            $order_by="id DESC";

            $limit=1;

           $user_transaction_details = $this->base_model->fetch_records_from('user_transaction_details',$where1,"*",$order_by,$limit);

           // echo $this->db->last_query();die;

           $user_details = $this->base_model->fetch_records_from('users',$where2);

           $this->data['wallet_amount'] = $user_transaction_details[0]->wallet_amount;
           $this->data['referral_code'] = $user_details[0]->referral_code;

        }

        $this->data['content'] = "general/reward_points";



		$this->_render_page('templates/template', $this->data);

	}

	public function admit_card(){

		if (!$this->ion_auth->logged_in()) {

		 	 redirect('auth/login', 'refresh');

		 }

		$this->data['title'] = 'Access Card';
		$this->data['active_menu'] = 'admit_card';
			

		 $userid = $this->ion_auth->get_user_id();

		  if (is_numeric($userid)) {
          
             $result = $this->base_model->run_query("select * FROM  users where id=" . $userid);

           $this->data['username'] = $result[0]->email;
           $this->data['password'] = "user1234";           
           $this->data['subject'] = $result[0]->prefered_subject;

        }

        $this->data['content'] = "general/admit_card";



		$this->_render_page('templates/template', $this->data);

	}

	public function access(){

		if (!$this->ion_auth->logged_in()) {

		 	 redirect('auth/login', 'refresh');

		 }

		$this->data['title'] = 'Slot/Access';
		$this->data['active_menu'] = 'access';

		// if(!empty($this->input->post('exam_name')))
		// {
		// 	$slug =  $this->input->post('exam_name');
		// }

		
			

		 $userid = $this->ion_auth->get_user_id();

		 $user_details = $this->base_model->run_query("select class FROM  users where id=" . $userid);

		  if (is_numeric($userid)) {

		  
             $examname = $this->base_model->run_query("select GROUP_CONCAT(exam_name) as exam_name FROM  quizsubscriptions where user_id=" . $userid);

		  	// $result = $this->base_model->run_query("select preferred_subjects FROM  user_transaction_details where user_id=" . $userid." and transaction_amount!=0 order by id DESC LIMIT 1");

		  	 $result = $this->base_model->run_query("select preferred_subjects FROM  user_transaction_details where user_id=" . $userid." and preferred_subjects!='0' order by id DESC LIMIT 1");



           // $this->data['username'] = $result[0]->email;
           // $this->data['password'] = "user1234";           
           //$this->data['subject'] = $result[0]->prefered_subject;

           $preferred_subjects = rtrim($result[0]->preferred_subjects,',');

           $subjects_array=explode(",",$preferred_subjects);

			 $result_subjects = "'" . implode ( "', '", $subjects_array ) . "'"; 





           $exam_slot = $this->base_model->run_query("select slot_time FROM  slot_details  where  slot_exam in(".strtolower($result_subjects).") and slot_balance=0");
           // print_r($examname);die;

             $exam_name=explode(",",$examname[0]->exam_name);

			 $exam_names = "'" . implode ( "', '", $exam_name ) . "'"; 

            $this->data['exam_slot'] = $exam_slot;
            $this->data['exam_name'] = $exam_name;

             



           if(!empty($preferred_subjects))
           {
           	$subjects=explode(',',$preferred_subjects);
           }
           else
           {
           	$subjects='';
           }


           // if(!empty($slug))
           // {

           	 // $olympiad_exam_name = $this->base_model->run_query("select DISTINCT olympiad_exam_name,olympiad_exam_slug FROM  exam_schedule where exam_status=1 and olympiad_exam_slug = '".$slug."'");
           	  // $this->data['slug'] = $slug;

           	  //  $olympiad_exam_level = $this->base_model->run_query("select DISTINCT exam_level FROM  exam_schedule where exam_status=1 and olympiad_exam_slug = '".$slug."'");

           // }

           // else
           // {

           	 // $olympiad_exam_name = $this->base_model->run_query("select DISTINCT olympiad_exam_name,olympiad_exam_slug FROM  exam_schedule where exam_status=1 and olympiad_exam_slug NOT in (".$exam_names.")");

           	  $olympiad_exam_name = $this->base_model->run_query("select DISTINCT olympiad_exam_name,olympiad_exam_slug FROM  exam_schedule where exam_status=1 ");

           // }



           	


          

          

           // print_r($olympiad_exam_name);die;

            // echo $olympiad_exam_name[0]->olympiad_exam_name;die;

           // $olympiad_exam_name = array_map("unserialize", array_unique(array_map("serialize", $olympiad_exam_name)));

           // $olympiad_exam_name = array_values(array_filter($olympiad_exam_name));


           // $olympiad_exam_level = $this->base_model->run_query("select DISTINCT exam_level FROM  exam_schedule where exam_status=1");
           
           //echo $olympiad_exam_level;die;

            $olympiad_exam_level = $this->base_model->run_query("select DISTINCT exam_level FROM  exam_schedule where exam_level!='Level 2' and exam_status=1");
            // print_r($olympiad_exam_level);die;

            $cro_exam_level = $this->base_model->run_query("select DISTINCT exam_level FROM  exam_schedule where exam_status=1 and olympiad_exam_slug='cro'");

            $cso_exam_level = $this->base_model->run_query("select DISTINCT exam_level FROM  exam_schedule where exam_status=1 and olympiad_exam_slug='cso'");

            $cmo_exam_level = $this->base_model->run_query("select DISTINCT exam_level FROM  exam_schedule where exam_status=1 and olympiad_exam_slug='cmo'");

            $cco_exam_level = $this->base_model->run_query("select DISTINCT exam_level FROM  exam_schedule where exam_status=1 and olympiad_exam_slug='cco'");

            $cfo_exam_level = $this->base_model->run_query("select DISTINCT exam_level FROM  exam_schedule where exam_status=1 and olympiad_exam_slug='cfo'");

            $ceo_exam_level = $this->base_model->run_query("select DISTINCT exam_level FROM  exam_schedule where exam_status=1 and olympiad_exam_slug='ceo'");

            $cro_edit_exam_level = $this->base_model->run_query("select exam_level FROM  quizsubscriptions where user_id='" . $this->session->userdata('user_id') . "' and exam_status=1 and exam_name='cro' order by to_date");

            $cso_edit_exam_level = $this->base_model->run_query("select exam_level FROM  quizsubscriptions where user_id='" . $this->session->userdata('user_id') . "' and exam_status=1 and exam_name='cso' order by to_date");

            $cmo_edit_exam_level = $this->base_model->run_query("select exam_level FROM  quizsubscriptions where user_id='" . $this->session->userdata('user_id') . "' and exam_status=1 and exam_name='cmo' order by to_date");

            $cco_edit_exam_level = $this->base_model->run_query("select exam_level FROM  quizsubscriptions where user_id='" . $this->session->userdata('user_id') . "' and exam_status=1 and exam_name='cco' order by to_date");

            $cfo_edit_exam_level = $this->base_model->run_query("select exam_level FROM  quizsubscriptions where user_id='" . $this->session->userdata('user_id') . "' and exam_status=1 and exam_name='cfo' order by to_date");

            $ceo_edit_exam_level = $this->base_model->run_query("select exam_level FROM  quizsubscriptions where user_id='" . $this->session->userdata('user_id') . "' and exam_status=1 and exam_name='ceo' order by to_date");

           //print_r($olympiad_exam_level);die;

            // echo $olympiad_exam_name[0]->olympiad_exam_name;die;

           // $olympiad_exam_name = array_map("unserialize", array_unique(array_map("serialize", $olympiad_exam_name)));

           // $olympiad_exam_name = array_values(array_filter($olympiad_exam_name));



           	// $olympiad_exam_date = $this->base_model->run_query("select *  FROM  quizsubscriptions where user_id=".$userid." order by exam_level ASC");

           	//print_r($olympiad_exam_date);die;



           	 //print_r($olympiad_exam_date);die;

           if ($this->input->post('book_slot')) {

           	// print_r($this->input->post());die;

           	 $date=$this->input->post('exam_date'); 

           	 $exam=$this->input->post('olympiad_exam_name');

           	 $exam_level=$this->input->post('olympiad_exam_level');

           	 $user_class=$this->input->post('user_class');

           	 		

           	$slot_time=$this->input->post('olympiad_exam_slot');

           	$hours_time = substr($slot_time,0,2);

           	$mins_time = substr($slot_time,-2);

           

           	$to_time=	$hours_time+2;

           	$from_date=$date." ".$hours_time.":".$mins_time.":00";
           	$to_date=$date." ".$to_time.":".$mins_time.":00";

           		$booked_date=date('Y-m-d H:i:s');

           		$worksheet_details = $this->db->query("SELECT GROUP_CONCAT(QUOTE(worksheet_id)) as ids FROM quizsubscriptions WHERE user_id='" . $this->session->userdata('user_id') . "'")->result_array();

           		  $worksheet_id=$worksheet_details[0]['ids'];



           		// $worksheet_details = $this->base_model->run_query("select id,worksheet_id,worksheet_balance FROM  worksheets where subject_name='".$exam."' AND  exam_level='".$exam_level."' AND class='".$user_class."' AND worksheet_balance!=0 AND worksheet_status=1 ORDER BY RAND() LIMIT 1");

           		  if(!empty($worksheet_id))
           		  {
           		  	$cond="AND worksheet_id NOT IN(".$worksheet_id.")";
           		  }

           		  else

           		  {
           		  	$cond="";
           		  }

           		  
           		$worksheet_details = $this->base_model->run_query("select id,worksheet_id,worksheet_balance FROM  worksheets where subject_name='".$exam."' AND  exam_level='".$exam_level."' AND class='".$user_class."' AND worksheet_balance!=0 AND worksheet_status=1 ".$cond."  ORDER BY RAND() LIMIT 1");

           		// print_r($worksheet_details);die;

           		if($worksheet_details[0]->worksheet_id!='')
	           		{
	           			$worksheet_id=$worksheet_details[0]->worksheet_id;
	           		}
           			else
           			{
           				$worksheet_id='';
           			}



           	$insertData = array('user_id' => $userid,'worksheet_id' => $worksheet_id,'user_class' => $user_class, 'from_date' => $from_date,'to_date' => 	$to_date,'exam_name' => $exam,'exam_level' => $exam_level,'exam_slot' => $slot_time,'slot_booked_date' => $booked_date,'exam_status' => 1);

           	// print_r($insertData);die;

           	 $olympiad_user_slot_details = $this->base_model->run_query("select * FROM  quizsubscriptions where user_id='".$userid."' AND  from_date='".$from_date."' AND to_date='".$to_date."' AND exam_level='".$exam_level."' AND exam_slot='".$slot_time."'");

				if(count($olympiad_user_slot_details)==0)
				{
           	 

      		

      		 $intLastInsertId = $this->base_model->insert_operation_id('quizsubscriptions', $insertData);
      		}


      		 $olympiad_exam_slot_details = $this->base_model->run_query("select * FROM  slot_details where slot_exam='".$exam."' AND slot_date='".date('d-m-Y', strtotime($date))."' AND slot_level='".$exam_level."' AND slot_time='".$slot_time."' AND slot_status=1");



      		 //print_r($olympiad_exam_slot_details);die;

      		    //$count=count($olympiad_exam_slot_details); 

      		// if($count>0)
      		// {

      			$slot_balance=$olympiad_exam_slot_details[0]->slot_balance-1;

      			$slot_table='slot_details';

      			$slotData = array('slot_balance' => $slot_balance);

      			$slot_condition['slot_id']=$olympiad_exam_slot_details[0]->slot_id;

      			$this->base_model->update_operation($slotData, $slot_table, $slot_condition);

      			$worksheet_balance=$worksheet_details[0]->worksheet_balance-1;

      			$worksheet_table='worksheets';

      			$worksheetData = array('worksheet_balance' => $worksheet_balance);

      			$worksheet_condition['id']=$worksheet_details[0]->id;

      			$this->base_model->update_operation($worksheetData, $worksheet_table, $worksheet_condition);

      		

      		
      			// $this->base_model->run_query("update slot_details set slot_balance=".$slot_balance." where  slot_id=".$olympiad_exam_slot_details[0]->slot_id."");
      		// }

      		// else
      		// {

      		//    $slotData = array('slot_exam' => $exam, 'slot_level' => $exam_level,'slot_date' => 	$from_date,'slot_time' => 	$slot_time,'slot_balance' => 100,'slot_status' => 1);

      		// 	$this->base_model->insert_operation_id('slot_details', $slotData);
      		// }


      	

      		// if($intLastInsertId)
      		// {
      			$this->session->set_flashdata('slot_success_message', 'Your slot has been booked.');
      		// }

						
				

           }

             if ($this->input->post('edit_slot')) {

            	

           	 

           	$exam_date=$this->input->post('exam_date'); 

           	$exam_name=$this->input->post('olympiad_edit_exam_name');

           	$exam_level=$this->input->post('olympiad_edit_exam_level');

           	$user_class=$this->input->post('user_class');           	 		

           	$slot_time=$this->input->post('olympiad_exam_slot');

           	$previous_details = $this->db->query("SELECT exam_slot,from_date FROM  quizsubscriptions where user_id='".$userid."' AND exam_name='".$exam_name."' AND exam_level='".$exam_level."'")->result_array();

           		 //print_r($previous_details);die;

           		  $previous_exam_slot=$previous_details[0]['exam_slot'];
           		  $previous_exam_date=$previous_details[0]['from_date'];


           	$this->session->set_userdata('exam_date', $exam_date);

            $this->session->set_userdata('exam_name', $exam_name);

            $this->session->set_userdata('exam_level', $exam_level);

            $this->session->set_userdata('user_class', $user_class);

            $this->session->set_userdata('exam_slot', $slot_time);

            $this->session->set_userdata('previous_exam_slot', $previous_exam_slot);

            $this->session->set_userdata('previous_exam_date', $previous_exam_date);



            $amount=30;

			if($amount>0)
			{

			$this->session->set_userdata('amount', $amount);



			 //redirect('crest/payment_razorpay/razorpay');
			 redirect('crest/slot_payment/razorpay');
			}




						
				

           }

          $user_subjects=explode(',',strtolower($preferred_subjects));

          // print_r($user_subjects);die;

           for ($counter=0; $counter < count($user_subjects) ; $counter++) { 
           	# code...



           	  $olympiad_user_exam_level = $this->base_model->run_query("select exam_name,exam_level FROM  quizsubscriptions where user_id='".$userid."' and exam_name='".$user_subjects[$counter]."'");

           	  $olympiad_user_exam_date = $this->base_model->run_query("select *  FROM  quizsubscriptions where user_id=".$userid." and exam_name='".$user_subjects[$counter]."'");

           	  // print_r($olympiad_user_exam_date);die;

           	 $key1=$user_subjects[$counter]."_user_exam_level";
           	 $key2=$user_subjects[$counter]."_user_exam_date";

           	$this->data[$key1]=$olympiad_user_exam_level;
           	$this->data[$key2]=$olympiad_user_exam_date;

           	  
           }



          // print_r($this->data);die;




          

           // print_r($olympiad_exam_level);
           //  print_r( $olympiad_user_exam_level);die;

         
 

           $this->data['olympiad_exam_name'] = $olympiad_exam_name;

           $this->data['olympiad_exam_level'] = $olympiad_exam_level;

           $this->data['cro_exam_level'] = $cro_exam_level;
           
           $this->data['cmo_exam_level'] = $cmo_exam_level;
           
           $this->data['cso_exam_level'] = $cso_exam_level;
           
           $this->data['ceo_exam_level'] = $ceo_exam_level;
           
           $this->data['cco_exam_level'] = $cco_exam_level;

           $this->data['cfo_exam_level'] = $cfo_exam_level;

           $this->data['cro_edit_exam_level'] = $cro_edit_exam_level;
           
           $this->data['cmo_edit_exam_level'] = $cmo_edit_exam_level;
           
           $this->data['cso_edit_exam_level'] = $cso_edit_exam_level;
           
           $this->data['ceo_edit_exam_level'] = $ceo_edit_exam_level;
           
           $this->data['cco_edit_exam_level'] = $cco_edit_exam_level;

           $this->data['cfo_edit_exam_level'] = $cfo_edit_exam_level;


           // $this->data['olympiad_exam_date'] = $olympiad_exam_date;

           //$this->data['olympiad_user_exam_level'] = $olympiad_user_exam_level;

			

		   $this->data['subject'] = $subjects;

		 



        }

          // $quiz_subscription_info = $this->db->query("SELECT * FROM quizsubscriptions WHERE user_id='" . $this->session->userdata('user_id') . "' and exam_status=1")->row_array();



        $quiz_subscription_info = $this->db->query("SELECT * FROM quizsubscriptions WHERE user_id='" . $this->session->userdata('user_id') . "' AND exam_status=1 AND DATE(from_date) = CURDATE()")->row_array();

           
          // print_r($quiz_subscription_info); die;

         $today_date= date('Y-m-d H:i:s');
         //$today_date='2019-03-22 00:00:00';

     

        
// $date=  date(strtotime($quiz_subscription_info['from_date']), strtotime("-10 minute"));

// echo date('Y-m-d H:i:s',strtotime($date));die;

$start_date=date("Y-m-d H:i:s", strtotime($quiz_subscription_info['from_date']) - 600);

$end_date=$quiz_subscription_info['to_date'];


        $this->data['start_date'] = $start_date;

        $this->data['end_date'] = $end_date;

        $this->data['today_date'] = $today_date;

        $this->data['user_class'] = $user_details[0]->class;


        $this->data['content'] = "general/access";



		$this->_render_page('templates/template', $this->data);

	}

	public function exam_dates()
	{

  if ($this->input->post()) {

  	// echo $this->ion_auth->get_user_id();

		   	$olympiad_exam_name = $this->input->post('olympiad_exam_name');
		   	$olympiad_exam_level = $this->input->post('olympiad_exam_level');

		   	$olympiad_exam_date = $this->base_model->run_query("select exam_id,exam_date  FROM  exam_schedule where exam_status=1 and olympiad_exam_name ='".$olympiad_exam_name."' and exam_level='".$olympiad_exam_level."'");

		   	 //print_r($olympiad_exam_date);die;

		   	for ($i=0; $i <count($olympiad_exam_date) ; $i++) { 
		   		# code...
		   

		   	 // echo '<option value="'.$olympiad_exam_date[$i]->exam_id.'">'.$olympiad_exam_date[$i]->exam_date.'</option>';

		   		echo ' <label style="color:#000;position:relative"><input type="radio" name="exam_date" class="exam_date" value="'.$olympiad_exam_date[$i]->exam_date.'"> '.date("d-m-Y", strtotime($olympiad_exam_date[$i]->exam_date)).'</label><br>';

		   		





	}


		   	 //echo json_encode($olympiad_exam_date);

		 exit;


		   }

	}

	public function slot_timings()
	{

  if ($this->input->post()) {

  	// echo $this->ion_auth->get_user_id();

  			$olympiad_exam_date = date("d-m-Y", strtotime($this->input->post('olympiad_exam_date')));
		   	$olympiad_exam_name = $this->input->post('olympiad_exam_name');
		   	$olympiad_exam_level = $this->input->post('olympiad_exam_level');



		   	// echo "select slot_time  FROM  slot_details where slot_status=1 and slot_exam ='".$olympiad_exam_name."' and slot_level='".$olympiad_exam_level."' and slot_date='".$olympiad_exam_date."'";die;

		   	$olympiad_exam_date = $this->base_model->run_query("select slot_time  FROM  slot_details where slot_status=1 and slot_exam ='".$olympiad_exam_name."' and slot_level='".$olympiad_exam_level."' and slot_date='".$olympiad_exam_date."' and slot_balance > 0");

		   	 // print_r($olympiad_exam_date);die;



		   	echo  '<select id="olympiad_exam_slot" name="olympiad_exam_slot" required class="validate">';
		   		if(count($olympiad_exam_date)>0)
		   		{

		   		 echo '<option value="">Please select your slot</option>';

		   

		   	for ($i=0; $i <count($olympiad_exam_date) ; $i++) { 
		   		# code...
		   

		   	 echo '<option  value="'.$olympiad_exam_date[$i]->slot_time.'">'.$olympiad_exam_date[$i]->slot_time.'</option>';

		   		 // echo '<input type="radio" name="exam_date" class="exam_date" value="'.$olympiad_exam_date[$i]->slot_time.'"> '.$olympiad_exam_date[$i]->slot_time;

		   		 // echo '<input type="radio" name="exam_date" class="exam_date" value="'.$olympiad_exam_date[$i]->slot_time.'"> '.$olympiad_exam_date[$i]->slot_time;

		   		 // echo '<input type="checkbox" name="slot_date" value="'.$olympiad_exam_date[$i]->slot_time.'"> '.$olympiad_exam_date[$i]->slot_time;





		}
	}

	else
	{		echo '<option value="">No slots available</option>';
			
	}

		echo "</select>";

	


		   	 //echo json_encode($olympiad_exam_date);

		 exit;


		   }

	}


	public function result(){

		if (!$this->ion_auth->logged_in()) {

		 	 redirect('auth/login', 'refresh');

		 }

		$this->data['title'] = 'Result';
		$this->data['active_menu'] = 'result';

		 $userid = $this->ion_auth->get_user_id();

		  if (is_numeric($userid)) {
          
           //$where1['id']=$userid;
         
          // $where1['preferred_subjects' !=]=0;


           //$user_details = $this->base_model->fetch_records_from('users',$where1);

           $user_details = $this->base_model->run_query("select preferred_subjects FROM  user_transaction_details where user_id=" . $userid." and transaction_amount!=0 order by id DESC LIMIT 1");

           // print_r($user_details);die;

           

           $user_result_query = "SELECT short_subject_name FROM results WHERE `user_id` =".$userid." and status = 1";



            $user_subjects = $this->db->query($user_result_query)->result();

            // print_r($user_subjects);die;


             $this->data['user_subjects'] = $user_subjects;  

           // $questions_ids_query = "SELECT * FROM results WHERE user_id =".$userid." order by id DESC LIMIT 1 ";

           //  $questions_ids = $this->db->query($questions_ids_query)->result();
           }

		$subject = $this->uri->segment(3);
		$level = ucwords(str_replace("%20"," ",$this->uri->segment(4)));

		if(!empty($subject) && empty($level))
		{

			$level_query = "SELECT DISTINCT(exam_name) FROM results  WHERE `user_id` =".$userid." and short_subject_name = '".$subject."' and status=1";



            $levels = $this->db->query($level_query)->result();


// print_r($results);die;

             $this->data['subject'] = $subject;  

             $this->data['levels'] = $levels;       


		
//   		$result_query = "SELECT results.*,users.student_photograph FROM results INNER JOIN users on results.user_id=users.id WHERE `user_id` =".$userid." and short_subject_name = '".$subject."' and status=1";



//             $results = $this->db->query($result_query)->result();


// // print_r($results);die;

//              $this->data['subject'] = $subject;  

//              $this->data['result'] = $results;       
        

		}

		else if(!empty($subject) && !empty($level))
		{

			

			  		$result_query = "SELECT results.*,users.student_photograph,users.id FROM results INNER JOIN users on results.user_id=users.id WHERE `user_id` =".$userid." and short_subject_name = '".$subject."' and exam_name= '".$level."' and status=1";



            $results = $this->db->query($result_query)->result();


// print_r($results);die;

             $this->data['subject'] = $subject;  

             $this->data['level'] = $level;  

             $this->data['result'] = $results;   



		}

		else

		{

			$result_query = "SELECT * FROM results WHERE `user_id` =".$userid." and status=1";



            $results = $this->db->query($result_query)->result();

			$preferred_subjects = rtrim($user_details[0]->preferred_subjects,','); 

			$subjects=explode(',',$preferred_subjects);

			$this->data['results'] = $results;
			$this->data['subjects'] = $subjects;
		}
			


        $this->data['content'] = "general/result";



		$this->_render_page('templates/template', $this->data);

	}
	public function download_result()
  { 
		ob_clean();
		
		//load mPDF library
		$this->load->library('pdf');
		//load mPDF library


		//now pass the data//
		 // $this->data['title']="Invoice";
		 // $this->data['description']="Invoice Details";
		// $this->data['description']="$this->official_copies";
		 //now pass the data //

		  $userid = $this->ion_auth->get_user_id();

		  $subject = $this->uri->segment(3);

		  $result_query = "SELECT * FROM results WHERE `user_id` =".$userid." and short_subject_name = '".$subject."' and status=1";



            $user_result_details = $this->db->query($result_query)->result();

            $user_details = $this->base_model->run_query("select * FROM  users where id=" . $userid."");

	/*	  if (is_numeric($userid)) {*/
          
           // $where1['user_id']=$userid;
           // $where1['id']=$_GET['id'];

           // $user_transaction_details = $this->base_model->fetch_records_from('user_transaction_details',$where1);

           // $this->data['invoice'] = $user_transaction_details;

      /*  }*/
 
		
		//$html=$this->load->view('general/invoice',$this->data, true); //load the pdf_output.php by passing our data and get all data in $html varriable.
 	 
		//this the the PDF filename that user will get to download
		$pdfFilePath ="result".time().".pdf";

	
		// $html="<img src='".base_url()."assets/images/logo/logo.png'>";
		// $html.="&emsp;&emsp;&emsp;&emsp;&emsp;<b class='title'>RESULT</b>";
		// $html.="&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
		// &emsp;<b class='date'>Date: ".date('d-m-Y')."</b>";
		// $html.="<br><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
		// &emsp;&emsp;&emsp;
		// &emsp;&emsp;&emsp;
		// &emsp;&emsp;&emsp;
		// &emsp;&emsp;&emsp;
		// &emsp;&emsp;&emsp;
		// &emsp;&emsp;&emsp;
		// &emsp;&emsp;&emsp;
		// &emsp;&emsp;&emsp;&emsp;
		// &emsp;&nbsp;&nbsp;<b class='invoice_no'>Invoice No: 2019/".$userid."</b>";
		// $html.="<br><br><br>";
		// $html.="<b>CREST OLYMPIADS</b><br>";
		// $html.="<b>(a venture of Assessment Square)</b><br>";
		// $html.="<b>Tower B4, 1110-B</b><br>";
		// $html.="<b>Spaze IT Park, Sohna Road</b><br>";
		// $html.="<b>Sector 49, Gurgaon</b><br>";
		// $html.="<b>Haryana - 122018</b><br>";

		if(!empty($user_details[0]->student_photograph))
			{
				
				$student_photograph = '<img id="student_photograph" src='.base_url().'assets/uploads/'.$user_details[0]->student_photograph.' height="100">';
			}

			else

			{
				
				$student_photograph = '<img id="student_photograph" src='.base_url().'assets/uploads/images_200_200/dflt-user-icn.png height="100">';				

			}

		$html="<div class='row' id='result'>";
		$html.="<table cellspacing=0 cellpadding=20 class='result_details'>
			<thead>
			<tr>
			<th>
			".$student_photograph."&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;".$user_result_details[0]->exam_name."<br>".$user_result_details[0]->subject." :: 2019-20
			</th>
			</tr>							
			</thead>			
			<tbody>						
			";
		$html.=	"<tr><td>Student's Name : <span style='color:#B71C1C'>".$user_details[0]->username."</span></td></tr>
			<tr><td>School Name  : <span style='color:#B71C1C'>".$user_details[0]->school.",".$user_details[0]->city."</span></td></tr>
			<tr><td>Enrollment Number : <span style='color:#B71C1C'>".$user_details[0]->id."</span></td></tr>	
			<tr><td>Class : <span style='color:#B71C1C'>".$user_details[0]->class."</span></td></tr>
			<tr><td>Marks Obtained : <span style='color:#B71C1C'>".$user_result_details[0]->score."</span></td></tr>
			<tr><td>Maximum Marks : <span style='color:#B71C1C'>".$user_result_details[0]->max_score."</span></td></tr>
			<tr><td>Recognition : <span style='color:#B71C1C'>".$user_result_details[0]->recognition."</span></td></tr>
			";

			$html.="</tbody></table></div>";
			
			// $html.="<p style='text-align:center;margin-top:75%;'>This is a computer-generated document. No Signature is required.</p>";

		
// print_r($html);die;



		
		//actually, you can pass mPDF parameter on this load() function
		$pdf = $this->pdf->load();

		
		//generate the PDF!
		$external_css=base_url()."assets/css/pdf2.css";
		$stylesheet = file_get_contents($external_css); // external css
		$pdf->WriteHTML($stylesheet,1);
		$pdf->WriteHTML($html,2);
		//offer it to user via browser download! (The PDF won't be saved on your server HDD)
		
		ob_end_flush();
		ini_set('display_errors', 0);
		$pdf->Output($pdfFilePath, "I");
		 
		 	
  }
	public function challenge_test(){


		if (!$this->ion_auth->logged_in()) {

		 	 redirect('auth/login', 'refresh');

		 }

		$this->data['title'] = 'Challenge';
		$this->data['active_menu'] = 'challenge_test';
			

		 $userid = $this->ion_auth->get_user_id();

		 date_default_timezone_set('Asia/Kolkata');

      
         $quiz_subscription_info = $this->db->query("SELECT * FROM quizsubscriptions WHERE user_id='" . $userid . "' and challenge_status=1 and ( DATE(from_challenge_date) = CURDATE() OR DATE(to_challenge_date) = CURDATE() ) ")->row_array();
         // print_r($quiz_subscription_info); die;

         $today_date= date('Y-m-d H:i:s');
         //$today_date='2019-03-22 00:00:00';

         $this->data['quiz_subscription_info'] = $quiz_subscription_info;

		


		  if (is_numeric($userid)) {
          
          // $where1['id']=$userid;
         
          // $where1['preferred_subjects' !=]=0;


           //$user_details = $this->base_model->fetch_records_from('users',$where1);

           	$user_subject_details = $this->base_model->run_query("select preferred_subjects FROM  user_transaction_details where user_id=" . $userid." and transaction_amount!=0 order by id DESC LIMIT 1");

           $this->data['user_subject_details'] = $user_subject_details;

           $user_result_query = "SELECT worksheet_id FROM user_quiz_report WHERE `user_id` =".$userid." group by id DESC limit 1";
// print_r( $user_result_query);die;

            $user_subjects = $this->db->query($user_result_query)->result();


             $this->data['user_subjects'] = $user_subjects;  

           // $questions_ids_query = "SELECT * FROM results WHERE user_id =".$userid." order by id DESC LIMIT 1 ";

           //  $questions_ids = $this->db->query($questions_ids_query)->result();
           }

		  // if (is_numeric($userid)) {
          
    //        $where1['id']=$userid;
         
    //       // $where1['preferred_subjects' !=]=0;


    //        $user_details = $this->base_model->fetch_records_from('users',$where1);

    //        $this->data['result'] = $user_details;

    //     }

           //$where1['user_id']=$userid;
         
          // $where1['preferred_subjects' !=]=0;


           //$questions = $this->base_model->fetch_records_from('users_answers',$where1);

 		   //$questions_ids_query = "SELECT question_id FROM `users_answers` WHERE `user_id` =".$userid."";

//questions_ids_query = "SELECT question_id FROM `users_answers` WHERE `user_id` =".$userid."";

              $subject = $this->uri->segment(3);

		if(empty($subject))
		{

   //           $preferred_subjects = rtrim($user_subject_details[0]->preferred_subjects,','); 

			// $subjects=explode(',',$preferred_subjects);



			$quiz_subscription_subjects = $this->db->query("SELECT DISTINCT exam_name FROM quizsubscriptions WHERE user_id='" . $userid . "' and challenge_status=1 and ( DATE(from_challenge_date) = CURDATE() OR DATE(to_challenge_date) = CURDATE() ) ")->row_array();

			// print_r($quiz_subscription_subjects);die;

			$this->data['subjects'] = $quiz_subscription_subjects;

		}

		else
		{

			 

         if( $today_date >= $quiz_subscription_info['from_challenge_date'] && $today_date <= $quiz_subscription_info['to_challenge_date'])
         { 

			// $sub= strtoupper($subject[1]);

			// if($sub=="R")

			// {
			// 	$challenge_subject="L";
			// }

			// else

			// {
			// 	$challenge_subject=$sub;
			// }

			$challenge_subject=$user_subjects[0]->worksheet_id;



			 // $questions_ids_query = "SELECT max(id) as id,question_id FROM `user_quiz_report` WHERE `user_id` =".$userid." and worksheet_id LIKE '".$challenge_subject."%' group by question_id order by id desc"; 

			 // $questions_ids_query = "SELECT max(id) as id,question_id FROM `user_quiz_report` WHERE `user_id` =".$userid." and worksheet_id = '".$challenge_subject."' group by question_id  ASC"; 

			$questions_ids_query = "SELECT max(id) as id,question_id FROM `user_quiz_report` WHERE `user_id` =".$userid." and worksheet_id = '".$challenge_subject."' group by question_id order by id ASC"; 

			// $questions_ids_query = "SELECT uqr.question_id FROM user_quiz_report as uqr inner JOIN questions as q on q.questionid=uqr.question_id  WHERE uqr.user_id =".$userid." and uqr.worksheet_id = '".$challenge_subject."'"; 

            $questions_ids = $this->db->query($questions_ids_query)->result();

            // print_r($questions_ids);die;


           // $questions_ids_answers_query = "SELECT question_id,answer FROM `users_answers` WHERE `user_id` =".$userid."";

 //            $questions_ids_answers_query = "SELECT max(id) as id,question_id,option_a,option_b,option_c,option_d
           
 // FROM `user_quiz_report` WHERE `user_id` =".$userid." group by question_id order by id desc";

//             $questions_ids_answers_query = "SELECT *
           
//  FROM `user_quiz_report` WHERE id in
// (select max(id) from user_quiz_report group by question_id) and `user_id` =".$userid." order by id DESC";

// $questions_ids_answers_query = "SELECT *  FROM `user_quiz_report` WHERE `user_id` =".$userid." and worksheet_id LIKE '".$challenge_subject."%' order by id DESC LIMIT 100";

 $questions_ids_answers_query = "SELECT *  FROM `user_quiz_report` WHERE `user_id` =".$userid." and worksheet_id = '".$challenge_subject."' order by id ASC";

// $questions_ids_answers_query = "SELECT uqr.*  FROM user_quiz_report as uqr  inner JOIN questions as q on q.questionid=uqr.question_id WHERE uqr.user_id =".$userid." and uqr.worksheet_id = '".$challenge_subject."'";




            $questions= $this->db->query($questions_ids_answers_query)->result();



          

          
            //$questions = $this->input->post();
            // echo "<pre/>";
            // print_r($questions);
            $user_id=$this->session->userdata('user_id');
            $this->session->set_userdata('challenge_id', $quiz_subscription_info['id']);
            $inputdata['user_id'] = $user_id;
            $quiz_id = $inputdata['quiz_id'] = $this->input->post('worksheet_id');
            $usr_cls=$this->input->post('student_class');

            // function array_except($array, $keys)
            // {
            // return array_diff_key($array, array_flip((array) $keys));   
            // } 

            //    $question_ids = array_except($questions, ['worksheet_id', 'student_class','counter','comment']);
            //    $questionids = array_pop($question_ids);

            //  array_keys($question_ids);

             // print_r($question_ids);die;


             $ids="";
             $i=0;

             
             
            foreach ($questions_ids as $key => $value) {
            	foreach ($value as $key1 => $value1) {
            		# code...
            		if($key1!='id')
            		{

 



            		$ids.=$value1.",";
                $i++;
            }
            	}
                

                
            

            }

            $q_ids=rtrim($ids,",");
           // echo $q_ids;die;

            
            // if($this->base_model->insert_operation($this->db->dbprefix('open_questions_quiz_history'),$inputdata))
            // {
            //     //echo "WORKSHEET SUCCESSFULLY";
            // } 

            

            

          /*  date_default_timezone_set('Asia/Kolkata');
            $timestamp = date("Y-m-d H:i:s");*/


            
/*
            foreach ($questions as $q_key => $q_ans) {
                // echo $q_key;
                if(is_numeric($q_key)){
                    // exit();
                    
                    if(strlen($q_ans) > 0){
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

                        $updatedata1['attempt_counter']=$this->input->post('counter')+1;
                        $this->base_model->update_operation($updatedata1,$this->db->dbprefix('open_questions'),$where1);
                        //echo $this->db->last_query();die;
                    }
                }
            }*/
            // $question_array = (object)[];
            //$query = "SELECT * FROM `open_questions` WHERE `worksheet_id` = '".$inputdata['quiz_id']."' LIMIT 10";

            

            //$query = "SELECT * FROM `open_questions` WHERE `worksheet_id` = '".$inputdata['quiz_id']."' LIMIT 10";

           
if(!empty($q_ids))
{
            // $query = "SELECT * FROM `questions` WHERE `questionid` IN  (".$q_ids.") ORDER BY FIND_IN_SET(questionid, '".$q_ids."')";

             $query = "SELECT * FROM `questions` WHERE `questionid` IN  (".$q_ids.") ORDER BY section_marks ASC";


            $questions_correct = $this->db->query($query)->result();

        }

        // print_r($questions);

        //     print_r($questions_correct);die;


// $questions_array=array();
// $j=0;
// foreach ($questions as $key => $value) {
// 	# code...
// foreach ($value as $key1 => $value1) {
// $questions_array[$j][$key1]=$value1;

// $j++;
// }
// }

 
 

    
            $i =0;
            foreach ($questions_correct as $q) {
                foreach ($questions as $q_key1 => $q_ans1) {

                	
                	$q_key=$questions[$i]->question_id;

                	if($questions[$i]->option_a=='Y')
                	{
                		$q_ans='a';
                	}
                	else if($questions[$i]->option_b=='Y')
                	{
                		$q_ans='b';
                	}
                	else if($questions[$i]->option_c=='Y')
                	{
                		$q_ans='c';
                	}
                	else if($questions[$i]->option_d=='Y')
                	{
                		$q_ans='d';
                	}
                	else
                	{
                		$q_ans='';
                	}
                	

                	
                	
                    if(is_numeric($q_key)){
                        // exit();


                        if((int)$q->questionid == $q_key){
                            $question_array[$i]->question_type = $q->question_type;
                            $question_array[$i]->questionid = $q->questionid;
                            $question_array[$i]->question = $q->question;
                            $question_array[$i]->questionImage = $q->questionImage;
                            $question_array[$i]->answer1 = $q->answer1;
                            $question_array[$i]->answer2 = $q->answer2;
                            $question_array[$i]->answer3 = $q->answer3;
                            $question_array[$i]->answer4 = $q->answer4;
                            $question_array[$i]->answer1Image = $q->answer1Image;
                            $question_array[$i]->answer2Image = $q->answer2Image;
                            $question_array[$i]->answer3Image = $q->answer3Image;
                            $question_array[$i]->answer4Image = $q->answer4Image;
                            $question_array[$i]->correctAnswer = $q->correctanswer;
                            $question_array[$i]->acheiverSection = $q->section_name;
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

//             	function cmp($a, $b)
// {
//     if ($a->questionid == $b->questionid) {
//         return 0;
//     }
//     return ($a->questionid < $b->questionid) ? -1 : 1;
// }

// usort($question_array,"cmp");

        

        $this->data['subject'] = $subject;

    }
}


		if($this->input->post())
		{

			$errors = array_filter($this->input->post());





if (!empty($errors)) { 



			date_default_timezone_set('Asia/Kolkata');
			$currentDate = date("Y-m-d h:i:s");
			$j=0;
			$k=0;


			
			$array=array();
			 foreach ($questions as $q_key1 => $q_ans1) {



			 		$q_key=$questions[$j]->question_id;

			 		$option=$q_key."_option";
			 		$description=$q_key."_comment";

			 		$array[$j]['option']= $this->input->post($option);
			 		$array[$j]['description']= $this->input->post($description);
      
      				if(!empty($array[$j]['option']) && !empty($array[$j]['description']))
      				{ 
      					$insertData = array('question_id' => $q_key, 'markedby_userid' => $userid,'user_option' => $array[$j]['option'],'description' => $array[$j]['description'], 'marked_dt' => $currentDate);

      				 $this->db->insert($this->db->dbprefix('flag_marked_questions'), $insertData);

        $this->db->insert_id('flag_marked_questions');

        /* Update worksheet id */
        $sql = " UPDATE flag_marked_questions 
                    LEFT JOIN questions ON flag_marked_questions.question_id = questions.questionid
                 SET  flag_marked_questions.worksheet_id = questions.worksheet_id ";
        $this->db->query($sql);

        $k++;
       
    }




			 		$j++;
			 }

			$amount=100*$k;

			if($amount>0)
			{

			$this->session->set_userdata('amount', $amount);



			 //redirect('crest/payment_razorpay/razorpay');
			 redirect('crest/challenge_payment/razorpay');
			}
			else
			{
				 $this->session->set_flashdata('error_message', 'Please enter both option and justification.');

			}
// print_r($array);
		}
		else
		{
			 
			$this->session->set_flashdata('error_message', 'Please enter option and justification.');
		}

	}

	

            
            $this->data['this_student_class'] = $usr_cls;
            $this->data['this_subject'] = $this_subject;
            $this->data['this_subject_name'] = $this_subject_name;

            $this->data['question_array'] = $question_array;

          /*  $this->data['content'] = "daily_quiz/correct_answers";
            $this->_render_page('templates/template', $this->data);*/

         
        

        $this->data['content'] = "general/challenge_test";



		$this->_render_page('templates/template', $this->data);

	}

	    //Payment Process for challenge

    function challenge_payment($param1) {    	

    	date_default_timezone_set("Asia/Kolkata");
       
        $this->load->model('base_model');
       
        $subscription_info['user_id'] = $this->session->userdata('user_id');
       
        $price = $this->session->userdata('amount');     
       
        
        $subscription_info['status'] = 'Active';
        $subscription_info['dateofsubscription'] = date('Y-m-d H:i:s');
        //PAYMENT METHODS VALIDATION
       
        if($param1 == "razorpay"){
       
            $amount = $price;
            if (1) {
              
                $config['return'] = $returnUrl = base_url() . 'crest/challenge_payment_success';
                $config['cancel_return'] = $cancelUrl = base_url() . 'crest/challenge_payment_cancel';
               
                $coupon_discount = '';
                
                $amount = (float) $price;
               
                $user_id = $this->session->userdata('user_id');
                $result = $this->base_model->run_query("select id, username,home_address,city,state,pincode,country,phone,email FROM  users where id=" . $user_id);
               
                $merchant_data = '';
                $order_id = $this->generateRandomString($user_id);
                $this->session->set_userdata('txn_id', $order_id);
                

                $data['return_url'] = site_url().'razorpay/challenge_callback';
                $data['surl'] = site_url().'razorpay/success';
                $data['url'] = site_url().'razorpay/failed';
                $data['currency_code'] = 'INR';

                //$data['productinfo'] = $this->session->userdata('subjects');
                $data['productinfo'] = "challenge_test";
                $data['txnid'] =  $order_id;
                $data['surl'] = site_url().'razorpay/success';
                $data['furl'] = site_url().'razorpay/failed';        
                $data['key_id'] = RAZOR_KEY_ID;
                $data['currency_code'] = 'INR';            
                $data['total'] = ($amount * 100); 
                $data['amount'] = $amount;
                $data['merchant_order_id'] = $result[0]->id;
                $data['card_holder_name'] = $result[0]->username;
                $data['email'] = $result[0]->email;
                //$data['phone'] = $result[0]->phone;
                $data['phone'] = '';
                $data['name'] = 'CREST Olympiads';
                $data['return_url'] = site_url().'razorpay/challenge_callback';



                $this->data['content'] = 'razorpay/checkout';
                $this->load->view('razorpay/checkout', $data);

            } else {
                $this->prepare_flashmessage("Please contact admin for this payment gateway", 1);
               
                redirect('challenge_payment_success/', 'refresh');
            }
        }
        
    }

     //Payment Success
    function challenge_payment_success() {
       
	    $response = $this->session->flashdata('transaction_details'); 
        if (empty($response)) {
            $this->prepare_flashmessage(
                    "Payment unsuccessful, We're sorry, but we are not able to process your payment due to system error.", 0);
            redirect('crest/payment_error/');
        }
        date_default_timezone_set("Asia/Kolkata");
     
        $error_code = $response['error_code'];
        $order_status_message = '';
        if (empty($error_code)) {
            $order_status="Success";
            $order_status_message = " Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";
        } 
        
         else {
            $order_status_message = "Security Error. Illegal access detected";
        }

        if(!empty($response['card']))
        {
            $payment_mode="card";
        }
        else if (!empty($response['bank'])) {
            # code...
             $payment_mode="bank";
        }
        else if (!empty($response['wallet'])) {
            $payment_mode="wallet";
        }
        else if (!empty($response['vpa'])) {
            $payment_mode="vpa";
        }
        else
        {
            $payment_mode="";
        }

         $this->load->model('base_model');
                $userId = $this->session->userdata('user_id');
                $result = $this->base_model->run_query("select username,home_address,phone,email,city,state,country,pincode FROM  users where id=" . $userId);


        $ccAvenueResponse = array(
            'cc_order_id' => isset($response['id']) ? $response['id'] : '',
            'cc_tracking_id' => isset($response['id']) ? $response['id'] : '',
            'cc_bank_ref_no' => isset($response['card']['id']) ? $response['card']['id']: '',
            'cc_order_status' => isset($order_status) ? $order_status : '',
            'cc_failure_message' => isset($response['error_description']) ? $response['error_description'] : '',
            'cc_payment_mode' => isset($payment_mode) ? $payment_mode : '',
            'cc_card_name' => isset($response['card']['network']) ? $response['card']['network'] : '',
             'cc_status_code' => isset($response['captured']) ? $response['captured'] : '',
            'cc_status_message' => isset($response['status']) ? $response['status'] : '',
            'cc_amount' => isset($response['amount']) ? $response['amount']/100 : '',
             'cc_billing_name' => isset($result[0]->username) ? $result[0]->username : '',
            'cc_billing_address' => isset($result[0]->home_address) ? $result[0]->home_address : '',
            'cc_billing_city' => isset($result[0]->city) ? $result[0]->city : '',
            'cc_billing_state' => isset($result[0]->state) ? $result[0]->state : '',
            'cc_billing_zip' => isset($result[0]->pincode) ? $result[0]->pincode : '',
            'cc_billing_country' => isset($result[0]->country) ? $result[0]->country : '',
            'cc_billing_tel' => isset($response['contact']) ? $response['contact'] : '',
            'cc_billing_email' => isset($response['email']) ? $response['email'] : '',
            'cc_offer_type' => isset($response['offer_type']) ? $response['offer_type'] : '',
            'cc_offer_code' => isset($response['offer_code']) ? $response['offer_code'] : '',
            'cc_discount_value' => isset($response['discount_value']) ? $response['discount_value'] : '',
            'cc_mer_amount' => isset($response['amount']) ? $response['amount']/100 : '',
            'cc_response_code' => isset($response['response_code']) ? $response['response_code'] : '',
            'cc_order_status_message' => $order_status_message
        );
        $olympiadTransactionId = $this->session->userdata('txn_id');
      
        $user_id = $this->session->userdata('user_id');
        $subjects =  $this->session->userdata('subjects');
        // $where['id'] = $this->session->userdata('user_id');
        $this->load->model('base_model');
        $query = "SELECT * FROM `users` WHERE `id`='" . $user_id . "'";
        // echo $query;
        // exit();
        $usr_info_arr = $this->db->query($query)->row_array();
        $this_user = $this->db->query($query)->row();
        // $usr_info_arr = $this->base_model->fetch_records_from('users',$where);
        // $usr_info_arr = (array) $usr_info_arr[0];
        // $user
        /* Delete all reward points of this user */
        // $this->load->model('Member');
        $subscriptioninfo = array();
        $subscriptioninfo = $this->session->userdata('subscription_data');
        $subscriptioninfo['transaction_id'] = $olympiadTransactionId;
        $subscriptioninfo['payer_id'] = $user_id;
        $subscriptioninfo['payer_email'] = $usr_info_arr['email'];
        $subscriptioninfo['payer_name'] = $usr_info_arr['username'];
        $subscriptioninfo['user_id'] = $user_id;
        $subscriptioninfo['subjects'] = $subjects;
        // $subscriptioninfo['school_portal_id'] = $this->session->userdata('school_id_for_payment');
        
        // $this->session->set_userdata('school_id_for_payment',0);

        $transaction_id1 = $subscriptioninfo['transaction_id'];
        $payer_id1 = $subscriptioninfo['user_id'];
        $payer_email1 = $subscriptioninfo['payer_email'];
        $payer_name1 = $subscriptioninfo['payer_name'];

        if ($order_status === "Success" || strtolower($order_status) == "success") {
            // $examname = $this->session->userdata('subscription_examname');
            $subscriptioninfo['status'] = 'Active';
            $subscriptioninfo['dateofsubscription'] = date('Y-m-d H:i:s');


	        $mailParams = array('this_user' => $this_user);
	    	$this->load->model('Emails_model');
    		if(!$this->Emails_model->sendPaymentSuccessMail($usr_info_arr['email'], $mailParams)) {
	    	
	    	}

            
            $userId = $this->session->userdata('user_id');
            // if (!empty($userId)) {
            //     $this->Member->deleteRewardPoints($userId);
            // }
            $this->load->model('base_model');
            // $res = $this->base_model->insert_operation($subscriptioninfo, 'payments');
            $res = $this->base_model->insert_operation('challenge_payments', $subscriptioninfo);
            
           
            $this->session->set_userdata('payment_response', 'true');
            // redirect('user/instructions/' . $slug, 'refresh');
            /* Update CC Avenue response */
            $table = $this->db->dbprefix('challenge_payments');
            $where['transaction_id'] = $olympiadTransactionId;
            $this->base_model->update_operation($ccAvenueResponse, $table, $where);
            /*             * ************************ */
            $this->prepare_flashmessage(
                    "Payment has been received Successfully.", 0
            );
            
            redirect('crest/challenge_payment_confirmation/');
        } else {
            $ccAvenueResponse['transaction_id'] = $subscriptioninfo['transaction_id'];
            $ccAvenueResponse['payer_id'] = $subscriptioninfo['payer_id'];
            $ccAvenueResponse['payer_email'] = $subscriptioninfo['payer_email'];
            $ccAvenueResponse['payer_name'] = $subscriptioninfo['payer_name'];
            $ccAvenueResponse['user_id'] = $subscriptioninfo['user_id'];
            /* Insert CC Avenue response */
            $this->load->model('base_model');
            // $this->base_model->insert_operation($ccAvenueResponse, 'payments');
            $this->base_model->insert_operation('challenge_payments',$ccAvenueResponse);
            /*             * ****************************** */
            redirect('crest/challenge_payment_error/');
        }
    }

    function challenge_payment_confirmation() {
        // $this->prepare_flashmessage("Payment Confirmed!", 0);
//        if($this->session->userdata('txn_id') == '') {
//           redirect('user');
//        }
        // $this->data['content'] = 'user/payment/confirmation';
        $payment_conf = $this->session->userdata('payment_response');
        $challenge_id = $this->session->userdata('challenge_id');
        $txn_id = $this->session->userdata('txn_id');
        if(isset($txn_id) && isset($payment_conf)){
        	if($payment_conf != 'true'){
        		redirect(base_url());
        	}
        	$data['id'] = $this->session->userdata('user_id');
	    	$res = $this->base_model->fetch_records_from('users',$data);
	        $this->data['this_user'] = $res[0];
	        $this->data['txn_id'] = $this->session->userdata('txn_id');
	        $this->session->unset_userdata('txn_id');
	        $this->session->unset_userdata('payment_response');
	        // $this->data['']
	        // redirect('successful_registration');

	        $table = $this->db->dbprefix('quizsubscriptions');

        	$updateStatus=  array('challenge_status' => 1);
            $where['user_id'] = $this->session->userdata('user_id');
            $where['id'] = $this->session->userdata('challenge_id');
            $this->base_model->update_operation($updateStatus, $table, $where);

            $table2 = $this->db->dbprefix('flag_marked_questions');

        	$updateStatus2=  array('payment_status' => 1);
            $where2['markedby_userid'] = $this->session->userdata('user_id');
            $this->base_model->update_operation($updateStatus2, $table2, $where2);

            //$referrer_id = $this->session->userdata('referrer_id');

            // $subjects=$this->session->userdata('subjects');
			$amount=$this->session->userdata('amount');

			//$subjects=rtrim($subjects,',');

     if ($this->ion_auth->logged_in())
   	 {
	        //$this->data['content'] = 'buy/success_registration';
   	 	$this->data['content'] = 'buy/challenge_success';
        }else{
        	redirect(base_url());
        }
        // $route['my-photos'] = "user/myphotos";

        // $this->layout();
		$this->_render_page('templates/template', $this->data);

        // $this->_render_page('temp/usertemplate');
    }
}
    function challenge_payment_error() {
        // $this->data['content'] = 'user/payment/error';
        $this->prepare_flashmessage("Payment Error", 1);

        $this->data['errorMessage'] = $this->session->userdata('txn_id');
        $this->session->unset_userdata('txn_id');
        // redirect('failed_registration');
        $data['id'] = $this->session->userdata('user_id');
    	$res = $this->base_model->fetch_records_from('users',$data);
        $this->data['this_user'] = $res[0];
        // $this->data['content'] = 'buy/failed_registration';
		$this->_render_page('templates/template', $this->data);

        // $this->content = 'auth/my-photos';
        // $this->layout();
        // $this->_render_page('temp/usertemplate');
    }

     //Payment Process for Slot Update 
	
    function slot_payment($param1) {    	

    	date_default_timezone_set("Asia/Kolkata");
       
        $this->load->model('base_model');
       
        $subscription_info['user_id'] = $this->session->userdata('user_id');
       
        $price = $this->session->userdata('amount');     
       
        
        $subscription_info['status'] = 'Active';
        $subscription_info['dateofsubscription'] = date('Y-m-d H:i:s');
        //PAYMENT METHODS VALIDATION
       
        if($param1 == "razorpay"){
       
            $amount = $price;
            if (1) {
              
                $config['return'] = $returnUrl = base_url() . 'crest/slot_payment_success';
                $config['cancel_return'] = $cancelUrl = base_url() . 'crest/slot_payment_cancel';
               
                $coupon_discount = '';
                
                $amount = (float) $price;
               
                $user_id = $this->session->userdata('user_id');
                $result = $this->base_model->run_query("select id, username,home_address,city,state,pincode,country,phone,email FROM  users where id=" . $user_id);
               
                $merchant_data = '';
                $order_id = $this->generateRandomString($user_id);
                $this->session->set_userdata('txn_id', $order_id);
                

                $data['return_url'] = site_url().'razorpay/slot_callback';
                $data['surl'] = site_url().'razorpay/success';
                $data['url'] = site_url().'razorpay/failed';
                $data['currency_code'] = 'INR';

                //$data['productinfo'] = $this->session->userdata('subjects');
                $data['productinfo'] = "slot_update";
                $data['txnid'] =  $order_id;
                $data['surl'] = site_url().'razorpay/success';
                $data['furl'] = site_url().'razorpay/failed';        
                $data['key_id'] = RAZOR_KEY_ID;
                $data['currency_code'] = 'INR';            
                $data['total'] = ($amount * 100); 
                $data['amount'] = $amount;
                $data['merchant_order_id'] = $result[0]->id;
                $data['card_holder_name'] = $result[0]->username;
                $data['email'] = $result[0]->email;
                //$data['phone'] = $result[0]->phone;
                $data['phone'] = '';
                $data['name'] = 'CREST Olympiads';
                $data['return_url'] = site_url().'razorpay/slot_callback';



                $this->data['content'] = 'razorpay/checkout';
                $this->load->view('razorpay/checkout', $data);

            } else {
                $this->prepare_flashmessage("Please contact admin for this payment gateway", 1);
               
                redirect('slot_payment_success/', 'refresh');
            }
        }
        
    }

     //Payment Success
    function slot_payment_success() {
       
	    $response = $this->session->flashdata('transaction_details'); 
        if (empty($response)) {
            $this->prepare_flashmessage(
                    "Payment unsuccessful, We're sorry, but we are not able to process your payment due to system error.", 0);
            redirect('crest/payment_error/');
        }
        date_default_timezone_set("Asia/Kolkata");
     
        $error_code = $response['error_code'];
        $order_status_message = '';
        if (empty($error_code)) {
            $order_status="Success";
            $order_status_message = " Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";
        } 
        
         else {
            $order_status_message = "Security Error. Illegal access detected";
        }

        if(!empty($response['card']))
        {
            $payment_mode="card";
        }
        else if (!empty($response['bank'])) {
            # code...
             $payment_mode="bank";
        }
        else if (!empty($response['wallet'])) {
            $payment_mode="wallet";
        }
        else if (!empty($response['vpa'])) {
            $payment_mode="vpa";
        }
        else
        {
            $payment_mode="";
        }

         $this->load->model('base_model');
                $userId = $this->session->userdata('user_id');
                $result = $this->base_model->run_query("select username,home_address,phone,email,city,state,country,pincode FROM  users where id=" . $userId);


        $ccAvenueResponse = array(
            'cc_order_id' => isset($response['id']) ? $response['id'] : '',
            'cc_tracking_id' => isset($response['id']) ? $response['id'] : '',
            'cc_bank_ref_no' => isset($response['card']['id']) ? $response['card']['id']: '',
            'cc_order_status' => isset($order_status) ? $order_status : '',
            'cc_failure_message' => isset($response['error_description']) ? $response['error_description'] : '',
            'cc_payment_mode' => isset($payment_mode) ? $payment_mode : '',
            'cc_card_name' => isset($response['card']['network']) ? $response['card']['network'] : '',
             'cc_status_code' => isset($response['captured']) ? $response['captured'] : '',
            'cc_status_message' => isset($response['status']) ? $response['status'] : '',
            'cc_amount' => isset($response['amount']) ? $response['amount']/100 : '',
             'cc_billing_name' => isset($result[0]->username) ? $result[0]->username : '',
            'cc_billing_address' => isset($result[0]->home_address) ? $result[0]->home_address : '',
            'cc_billing_city' => isset($result[0]->city) ? $result[0]->city : '',
            'cc_billing_state' => isset($result[0]->state) ? $result[0]->state : '',
            'cc_billing_zip' => isset($result[0]->pincode) ? $result[0]->pincode : '',
            'cc_billing_country' => isset($result[0]->country) ? $result[0]->country : '',
            'cc_billing_tel' => isset($response['contact']) ? $response['contact'] : '',
            'cc_billing_email' => isset($response['email']) ? $response['email'] : '',
            'cc_offer_type' => isset($response['offer_type']) ? $response['offer_type'] : '',
            'cc_offer_code' => isset($response['offer_code']) ? $response['offer_code'] : '',
            'cc_discount_value' => isset($response['discount_value']) ? $response['discount_value'] : '',
            'cc_mer_amount' => isset($response['amount']) ? $response['amount']/100 : '',
            'cc_response_code' => isset($response['response_code']) ? $response['response_code'] : '',
            'cc_order_status_message' => $order_status_message
        );
        $olympiadTransactionId = $this->session->userdata('txn_id');
      
        $user_id = $this->session->userdata('user_id');
        //$subjects =  $this->session->userdata('subjects');
        $subjects= $this->session->userdata('exam_name');
        $previous_exam_slot= $this->session->userdata('previous_exam_slot');
        $previous_exam_date= $this->session->userdata('previous_exam_date');
        // $where['id'] = $this->session->userdata('user_id');
        $this->load->model('base_model');
        $query = "SELECT * FROM `users` WHERE `id`='" . $user_id . "'";
        // echo $query;
        // exit();
        $usr_info_arr = $this->db->query($query)->row_array();
        $this_user = $this->db->query($query)->row();
        // $usr_info_arr = $this->base_model->fetch_records_from('users',$where);
        // $usr_info_arr = (array) $usr_info_arr[0];
        // $user
        /* Delete all reward points of this user */
        // $this->load->model('Member');
        $subscriptioninfo = array();
        $subscriptioninfo = $this->session->userdata('subscription_data');
        $subscriptioninfo['transaction_id'] = $olympiadTransactionId;
        $subscriptioninfo['payer_id'] = $user_id;
        $subscriptioninfo['payer_email'] = $usr_info_arr['email'];
        $subscriptioninfo['payer_name'] = $usr_info_arr['username'];
        $subscriptioninfo['user_id'] = $user_id;
        $subscriptioninfo['subjects'] = $subjects;
        $subscriptioninfo['previous_exam_slot'] = $previous_exam_slot;
        $subscriptioninfo['previous_exam_date'] = $previous_exam_date;
        // $subscriptioninfo['school_portal_id'] = $this->session->userdata('school_id_for_payment');
        
        // $this->session->set_userdata('school_id_for_payment',0);

        $transaction_id1 = $subscriptioninfo['transaction_id'];
        $payer_id1 = $subscriptioninfo['user_id'];
        $payer_email1 = $subscriptioninfo['payer_email'];
        $payer_name1 = $subscriptioninfo['payer_name'];

        if ($order_status === "Success" || strtolower($order_status) == "success") {
            // $examname = $this->session->userdata('subscription_examname');
            $subscriptioninfo['status'] = 'Active';
            $subscriptioninfo['dateofsubscription'] = date('Y-m-d H:i:s');


	        $mailParams = array('this_user' => $this_user);
	    	$this->load->model('Emails_model');
    		if(!$this->Emails_model->sendPaymentSuccessMail($usr_info_arr['email'], $mailParams)) {
	    	
	    	}

            
            $userId = $this->session->userdata('user_id');
            // if (!empty($userId)) {
            //     $this->Member->deleteRewardPoints($userId);
            // }
            $this->load->model('base_model');
            // $res = $this->base_model->insert_operation($subscriptioninfo, 'payments');
            $res = $this->base_model->insert_operation('slot_payments', $subscriptioninfo);
            
           
            $this->session->set_userdata('payment_response', 'true');
            // redirect('user/instructions/' . $slug, 'refresh');
            /* Update CC Avenue response */
            $table = $this->db->dbprefix('slot_payments');
            $where['transaction_id'] = $olympiadTransactionId;
            $this->base_model->update_operation($ccAvenueResponse, $table, $where);
            /*             * ************************ */
            $this->prepare_flashmessage(
                    "Payment has been received Successfully.", 0
            );
            
            redirect('crest/slot_payment_confirmation/');
        } else {
            $ccAvenueResponse['transaction_id'] = $subscriptioninfo['transaction_id'];
            $ccAvenueResponse['payer_id'] = $subscriptioninfo['payer_id'];
            $ccAvenueResponse['payer_email'] = $subscriptioninfo['payer_email'];
            $ccAvenueResponse['payer_name'] = $subscriptioninfo['payer_name'];
            $ccAvenueResponse['user_id'] = $subscriptioninfo['user_id'];
            /* Insert CC Avenue response */
            $this->load->model('base_model');
            // $this->base_model->insert_operation($ccAvenueResponse, 'payments');
            $this->base_model->insert_operation('slot_payments',$ccAvenueResponse);
            /*             * ****************************** */
            redirect('crest/slot_payment_error/');
        }
    }

    function slot_payment_confirmation() {
        // $this->prepare_flashmessage("Payment Confirmed!", 0);
//        if($this->session->userdata('txn_id') == '') {
//           redirect('user');
//        }
        // $this->data['content'] = 'user/payment/confirmation';
        $payment_conf = $this->session->userdata('payment_response');
        $slot_id = $this->session->userdata('slot_id');
        $txn_id = $this->session->userdata('txn_id');
        if(isset($txn_id) && isset($payment_conf)){
        	if($payment_conf != 'true'){
        		redirect(base_url());
        	}
        	$data['id'] = $this->session->userdata('user_id');
	    	$res = $this->base_model->fetch_records_from('users',$data);
	        $this->data['this_user'] = $res[0];
	        $this->data['txn_id'] = $this->session->userdata('txn_id');
	        $this->session->unset_userdata('txn_id');
	        $this->session->unset_userdata('payment_response');
	        // $this->data['']
	        // redirect('successful_registration');


           	// $exam_date=$this->session->userdata('exam_date'); 

           	// $exam_name=$this->session->userdata('olympiad_edit_exam_name');

           	// $exam_level=$this->session->userdata('olympiad_edit_exam_level');

           	// $user_class=$this->session->userdata('user_class');           	 		

           	// $slot_time=$this->session->userdata('olympiad_exam_slot');

           	$userid = $this->session->userdata('user_id');

           	$exam_date=$this->session->userdata('exam_date'); 

           	$exam_name=$this->session->userdata('exam_name');

           	$exam_level=$this->session->userdata('exam_level');

           	$user_class=$this->session->userdata('user_class');           	 		

           	$slot_time=$this->session->userdata('exam_slot');


	        
           	$hours_time = substr($slot_time,0,2);

           	$mins_time = substr($slot_time,-2);

           

           	$to_time=	$hours_time+2;

           	$from_date=$exam_date." ".$hours_time.":".$mins_time.":00";
           	$to_date=$exam_date." ".$to_time.":".$mins_time.":00";

           		$slot_updated_date=date('Y-m-d H:i:s');

           		

           		$previous_details = $this->db->query("SELECT exam_slot,from_date FROM  quizsubscriptions where user_id='".$userid."' AND exam_name='".$exam_name."' AND exam_level='".$exam_level."'")->result_array();

           		// print_r($worksheet_details);die;

           		  $previous_exam_slot=$previous_details[0]['exam_slot'];
           		  $previous_exam_date=$previous_details[0]['from_date'];



           	


           	$updateslotData = array('from_date' => $from_date,'to_date' => 	$to_date,'exam_slot' => $slot_time,'slot_updated_date' => $slot_updated_date);

           	 // print_r($updateslotData);die;

           	 // $olympiad_user_slot_details = $this->base_model->run_query("select * FROM  quizsubscriptions where user_id='".$userid."' AND exam_name='".$exam_name."' AND  from_date='".$from_date."' AND to_date='".$to_date."' AND exam_level='".$exam_level."' AND exam_slot='".$slot_time."'");

				// if(count($olympiad_user_slot_details)==0)
				// {

           	$slot_update_condition['user_id']=$userid;
           	$slot_update_condition['exam_name']=$exam_name;
           	$slot_update_condition['exam_level']=$exam_level;
           	 

      		$this->base_model->update_operation($updateslotData, 'quizsubscriptions', $slot_update_condition);

      		// echo $this->db->affected_rows();die;

      		 //$intLastInsertId = $this->base_model->insert_operation_id('quizsubscriptions', $insertData);
      		// }

      		 $olympiad_exam_update_slot_details = $this->base_model->run_query("select * FROM  slot_details where slot_exam='".$exam_name."' AND slot_date='".date('d-m-Y', strtotime($previous_exam_date))."' AND slot_level='".$exam_level."' AND slot_time='".$previous_exam_slot."' AND slot_status=1");

      		 //print_r($olympiad_exam_update_slot_details);die;

      		    $update_slot_balance=$olympiad_exam_update_slot_details[0]->slot_balance+1;

      			$slot_table='slot_details';

      			$updateslotData = array('slot_balance' => $update_slot_balance);

      			$update_slot_condition['slot_id']=$olympiad_exam_update_slot_details[0]->slot_id;

      		$this->base_model->update_operation($updateslotData, $slot_table, $update_slot_condition);



      		 $olympiad_exam_slot_details = $this->base_model->run_query("select * FROM  slot_details where slot_exam='".$exam_name."' AND slot_date='".date('d-m-Y', strtotime($exam_date))."' AND slot_level='".$exam_level."' AND slot_time='".$slot_time."' AND slot_status=1");



      		 //print_r($olympiad_exam_slot_details);die;

      		    //$count=count($olympiad_exam_slot_details); 

      		// if($count>0)
      		// {

      			$slot_balance=$olympiad_exam_slot_details[0]->slot_balance-1;

      			//$slot_table='slot_details';

      			$slotData = array('slot_balance' => $slot_balance);

      			$slot_condition['slot_id']=$olympiad_exam_slot_details[0]->slot_id;

      			$this->base_model->update_operation($slotData, $slot_table, $slot_condition);

      			// $worksheet_balance=$worksheet_details[0]->worksheet_balance-1;

      			// $worksheet_table='worksheets';

      			// $worksheetData = array('worksheet_balance' => $worksheet_balance);

      			// $worksheet_condition['id']=$worksheet_details[0]->id;

      			// $this->base_model->update_operation($worksheetData, $worksheet_table, $worksheet_condition);

      		

      		
      			// $this->base_model->run_query("update slot_details set slot_balance=".$slot_balance." where  slot_id=".$olympiad_exam_slot_details[0]->slot_id."");
      		// }

      		// else
      		// {

      		//    $slotData = array('slot_exam' => $exam, 'slot_level' => $exam_level,'slot_date' => 	$from_date,'slot_time' => 	$slot_time,'slot_balance' => 100,'slot_status' => 1);

      		// 	$this->base_model->insert_operation_id('slot_details', $slotData);
      		// }


      	

      		// if($intLastInsertId)
      		// {
      			$this->session->set_flashdata('slot_update_success_message', 'Your slot has been updated.');
      		// }

      			//redirect('crest/access', 'refresh');

      			redirect('crest/access');


            

            //$referrer_id = $this->session->userdata('referrer_id');

            // $subjects=$this->session->userdata('subjects');
			$amount=$this->session->userdata('amount');

			//$subjects=rtrim($subjects,',');

     // if ($this->ion_auth->logged_in())
   	 // {
	    //     $this->data['content'] = 'general/access';
     //    }else{
     //    	redirect(base_url());
     //    }
        // $route['my-photos'] = "user/myphotos";

        // $this->layout();
		$this->_render_page('templates/template', $this->data);

        // $this->_render_page('temp/usertemplate');
    }
}

  // function slot_success() {
       
  //       $this->data['content'] = 'buy/slot_success';
		// $this->_render_page('templates/template', $this->data);

    
  //   }
    function slot_payment_error() {
        // $this->data['content'] = 'user/payment/error';
        $this->prepare_flashmessage("Payment Error", 1);

        $this->data['errorMessage'] = $this->session->userdata('txn_id');
        $this->session->unset_userdata('txn_id');
        // redirect('failed_registration');
        $data['id'] = $this->session->userdata('user_id');
    	$res = $this->base_model->fetch_records_from('users',$data);
        $this->data['this_user'] = $res[0];
        // $this->data['content'] = 'buy/failed_registration';
		$this->_render_page('templates/template', $this->data);

        // $this->content = 'auth/my-photos';
        // $this->layout();
        // $this->_render_page('temp/usertemplate');
    }

	public function invoice(){

		if (!$this->ion_auth->logged_in()) {

		 	 redirect('auth/login', 'refresh');

		 }

		$this->data['title'] = 'Invoice';
		$this->data['active_menu'] = 'invoice';
			

		 $userid = $this->ion_auth->get_user_id();

		  if (is_numeric($userid)) {
          
           $where1['user_id']=$userid;
           $where1['transaction_amount !=']=0;
          // $where1['preferred_subjects' !=]=0;


           $user_transaction_details = $this->base_model->fetch_records_from('user_transaction_details',$where1);

           $this->data['invoice'] = $user_transaction_details;

        }

        $this->data['content'] = "general/invoice";



		$this->_render_page('templates/template', $this->data);

	}

	 public function download_invoice()
  { 
		ob_clean();
		
		//load mPDF library
		$this->load->library('pdf');
		//load mPDF library


		//now pass the data//
		 // $this->data['title']="Invoice";
		 // $this->data['description']="Invoice Details";
		// $this->data['description']="$this->official_copies";
		 //now pass the data //

		  $userid = $this->ion_auth->get_user_id();

	/*	  if (is_numeric($userid)) {*/
          
           $where1['user_id']=$userid;
           $where1['id']=$_GET['id'];

           $user_transaction_details = $this->base_model->fetch_records_from('user_transaction_details',$where1);

           // $this->data['invoice'] = $user_transaction_details;

      /*  }*/
 
		
		//$html=$this->load->view('general/invoice',$this->data, true); //load the pdf_output.php by passing our data and get all data in $html varriable.
 	 
		//this the the PDF filename that user will get to download
		$pdfFilePath ="invoice".time().".pdf";

	
		$html="<img src='".base_url()."assets/images/logo/logo.png'>";
		$html.="&emsp;&emsp;&emsp;&emsp;&emsp;<b class='title'><u>INVOICE</u></b>";
		$html.="&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
		&emsp;<b class='date'>Date: ".date('d-m-Y', strtotime($user_transaction_details[0]->transaction_date))."</b>";
		$html.="<br><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
		&emsp;&emsp;&emsp;
		&emsp;&emsp;&emsp;
		&emsp;&emsp;&emsp;
		&emsp;&emsp;&emsp;
		&emsp;&emsp;&emsp;
		&emsp;&emsp;&emsp;
		&emsp;&emsp;&emsp;
		&emsp;&emsp;&emsp;&emsp;
		&emsp;&nbsp;&nbsp;<b class='invoice_no'>Invoice No: 2019/".$userid."</b>";
		$html.="<br><br><br>";
		$html.="<b>CREST OLYMPIADS</b><br>";
		$html.="<b>(a venture of Assessment Square)</b><br>";
		$html.="<b>Tower B4, 1110-B</b><br>";
		$html.="<b>Spaze IT Park, Sohna Road</b><br>";
		$html.="<b>Sector 49, Gurgaon</b><br>";
		$html.="<b>Haryana - 122018</b><br>";
		
		$html.="<hr><br>";
		$html.="<table border=1 cellspacing=0 cellpadding=20 class='invoice_details'>
			<thead>
	    	
	    	<tr>
			<th>Particulars</th>
			<th>Amount Due</th>
			<th>Amount Paid</th>							
			<th>Wallet Used</th>
			<th>Transaction Date</th>
			</thead>
			</tr>
			<tbody>						
			<tr>";
		$html.=	"<td style='text-align:center'>".rtrim($user_transaction_details[0]->preferred_subjects,",")."</td>
			<td style='text-align:center'>".$user_transaction_details[0]->transaction_amount."</td>
			<td style='text-align:center'>".$user_transaction_details[0]->transaction_amount."</td>		
			<td style='text-align:center'>".$user_transaction_details[0]->wallet_amount."</td>
			<td style='text-align:center'>".date('d-m-Y', strtotime($user_transaction_details[0]->transaction_date))."</td>";

			$html.="</tr></tbody></table>";
			
			$html.="<p style='text-align:center;margin-top:75%;'>This is a computer-generated document. No Signature is required.</p>";

		
// print_r($html);die;



		
		//actually, you can pass mPDF parameter on this load() function
		$pdf = $this->pdf->load();

		
		//generate the PDF!
		$external_css=base_url()."assets/css/pdf.css";
		$stylesheet = file_get_contents($external_css); // external css
		$pdf->WriteHTML($stylesheet,1);
		$pdf->WriteHTML($html,2);
		//offer it to user via browser download! (The PDF won't be saved on your server HDD)
		
		ob_end_flush();
		ini_set('display_errors', 0);
		$pdf->Output($pdfFilePath, "I");
		 
		 	
  }

	public function profile(){

		 if (!$this->ion_auth->logged_in()) {

		 	 redirect('auth/login', 'refresh');

		 }

		$this->data['title'] = 'Profile';
		$this->data['active_menu'] = 'profile';
			

		 $userid = $this->ion_auth->get_user_id();

		  if (is_numeric($userid)) {
          
        


           $chk_user['id'] = $userid;
           $res = $this->base_model->fetch_records_from('users',$chk_user);
           $this->data['this_user'] = $res[0];

        }

        $this->data['content'] = "general/profile";

        $this->data['redirect_url'] = basename($_SERVER['HTTP_REFERER']);



		$this->_render_page('templates/template', $this->data);

	}

	public function update_password(){

		if (!$this->ion_auth->logged_in()) {

		 	 redirect('auth/login', 'refresh');

		 }

		$this->data['title'] = 'Update Password ';
		$this->data['active_menu'] = 'update_password';
			
		$this->form_validation->set_rules('old_password', 'Old Password', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required');
		// $this->form_validation->set_rules('phone', 'Phone', 'required');
		// $this->form_validation->set_rules('amount', 'Amount', 'required');

	
		if ($this->input->post()) {
			if ($this->form_validation->run()) {

			//$password=$this->input->post('password');
			

		 //$userid = $this->ion_auth->get_user_id();
           $identity = $this->session->userdata('identity');
		  //$identity = $this->ion_auth->get_user_id();
            $change = $this->ion_auth->change_password($identity, $this->input->post('old_password'), $this->input->post('password'));
            //print_r($change);die;
            if ($change) {
                //if the password was successfully changed
                // $this->prepare_flashmessage($this->ion_auth->messages(), 0);
                $this->session->set_flashdata('success_message', 'Password Updated Successfully.');
                redirect('crest/update_password', 'refresh');
                //$this->logout();
            } else {
                // $msg = $this->ion_auth->errors() . "The old password does not match.";
                // $this->prepare_flashmessage($msg, 1);
                // $this->prepare_flashmessage($this->ion_auth->errors(), 1);
                 $this->session->set_flashdata('success_message', 'The old password does not match.');
                redirect('crest/update_password', 'refresh');
            }

		  // if (is_numeric($userid)) {

				// $this->load->model('ion_auth_model');

		  // 	 $data['password'] = $this->ion_auth_model->hash_password($password);
		  
          
    //         $table = $this->db->dbprefix('users');
    //         $where['id'] = $userid;
    //         $this->base_model->update_operation($data, $table, $where);

             


          

    //     }
    }
}


        $this->data['content'] = "general/update_password";



		$this->_render_page('templates/template', $this->data);

	}


	public function upload_documents(){

		if (!$this->ion_auth->logged_in()) {

		 	 redirect('auth/login', 'refresh');

		 }

		$this->data['title'] = 'Upload Documents ';
		$this->data['active_menu'] = 'upload_documents';
			

		// $this->form_validation->set_rules('school_id_proof', 'School ID Proof', 'required');
		// $this->form_validation->set_rules('previous_year_marksheet', 'Previous Year Marksheet', 'required');	
		// $this->form_validation->set_rules('student_photograph', 'Student Photograph', 'required');
		// $this->form_validation->set_rules('phone', 'Phone', 'required');
		// $this->form_validation->set_rules('amount', 'Amount', 'required');


		if (!empty($_FILES['school_id_proof']['name']) || !empty($_FILES['previous_year_marksheet']['name']) || !empty($_FILES['student_photograph']['name'])) {
			// if ($this->form_validation->run()) {

			 $userid = $this->ion_auth->get_user_id();
			 $this->load->model('ion_auth_model');

		if (!empty($_FILES['school_id_proof']['name']))
		{
			$ext1 = explode('.', $_FILES['school_id_proof']['name']);
			$school_id_proof = $_FILES['school_id_proof']['name'];
			$newfilename1='sip_'.$userid.'.'.$ext1[1];
			$data['school_id_proof'] = $newfilename1;
			move_uploaded_file(
                $_FILES['school_id_proof']['tmp_name'], 'assets/uploads/user_details/' . $newfilename1
                    );
		}
		if (!empty($_FILES['previous_year_marksheet']['name']))
		{
		
		$ext2 = explode('.', $_FILES['previous_year_marksheet']['name']);
		$previous_year_marksheet = $_FILES['previous_year_marksheet']['name'];
		$newfilename2='pym_'.$userid.'.'.$ext2[1];
		$data['previous_year_marksheet'] = $newfilename2;
		 move_uploaded_file(
                $_FILES['previous_year_marksheet']['tmp_name'], 'assets/uploads/user_details/' . $newfilename2
                    );

		}

		if (!empty($_FILES['student_photograph']['name']))
		{

		$ext3 = explode('.', $_FILES['student_photograph']['name']);
		$student_photograph = $_FILES['student_photograph']['name'];
		$newfilename3='sp_'.$userid.'.'.$ext3[1];
		$data['student_photograph'] = $newfilename3;
		    move_uploaded_file(
                $_FILES['student_photograph']['tmp_name'], 'assets/uploads/user_details/' . $newfilename3
                    );



		}
			// $school_id_proof=$this->input->post('school_id_proof');
			// $previous_year_marksheet=$this->input->post('previous_year_marksheet');
			// $student_photograph=$this->input->post('student_photograph');
		
		  // if (is_numeric($userid)) {
		  
          
            $table = $this->db->dbprefix('users');
            $where['id'] = $userid;
            $this->base_model->update_operation($data, $table, $where);            
           
        
              $this->session->set_flashdata('success_message', 'Documents Uploaded Successfully.');
          

        // }
    // }
}

 $userid = $this->ion_auth->get_user_id();

		  if (is_numeric($userid)) {

		  	 $chk_user['id'] = $userid;
           $res = $this->base_model->fetch_records_from('users',$chk_user);
           $this->data['school_id_proof'] = $res[0]->school_id_proof;
           $this->data['previous_year_marksheet'] = $res[0]->previous_year_marksheet;
           $this->data['student_photograph'] = $res[0]->student_photograph;

		  	}


        $this->data['content'] = "general/upload_documents";



		$this->_render_page('templates/template', $this->data);

	}


    //Payment Process
    function payment($param1) {
        // , $param2=''
                $this->load->model('base_model');

        // date_default_timezone_set("Asia/Kolkata");
        // $relative_cat = array();
        // $table = $this->db->dbprefix('subcategories');
        // $condition['subcatid'] = $param2;
        // $examdetails = $this->base_model->fetch_records_from($table, $condition);
        // $buy_class = isset($_COOKIE['buy_class']) ? $_COOKIE['buy_class'] : '';
        // $subscription_info['class'] = $buy_class;
        // if (count($examdetails) <= 0)
            // redirect('user/payment');
        // $examdetails = $examdetails[0];
        $subscription_info['user_id'] = $this->session->userdata('user_id');
        // $subscription_info['quizid'] = $examdetails->subcatid;
        $price = $this->session->userdata('amount');
        // $newtable = $this->db->dbprefix('categories');
        // $newcondition['catid'] = $examdetails->catid;
        // $cource = $this->base_model->fetch_records_from(
                // $newtable, $newcondition);
        // $relative_cat = $this->session->userdata('discount_categories');
        // if (!empty($relative_cat)) {
            // $this->session->set_userdata('related_categories', $relative_cat);
        // }
        date_default_timezone_set("Asia/Kolkata");
        
        $subscription_info['status'] = 'Active';
        $subscription_info['dateofsubscription'] = date('Y-m-d H:i:s');
        //PAYMENT METHODS VALIDATION
        // if ($param1 == "ccavenue" && isset($param2) &&
                // $param2 != '' && is_numeric($param2)) {
        if($param1 == "ccavenue"){
            // $subscription_examname = array();
            // $this->session->set_userdata('subscription_data', $subscription_info);
            // $subscription_examname[] = $cource[0]->name . '/' . $examdetails->name;
            // $payment_info = $this->base_model->fetch_records_from(
            //         'paypal', array('status' => 'Active')
            // );
            $amount = $price;
            if (1) {
                // $payment_info = $payment_info[0];
                // $config['business'] = $payment_info->paypal_email;
                // $config['cpp_header_image'] = base_url() . "assets/uploads/paypal_logo/logo.jpg";
                $config['return'] = $returnUrl = base_url() . 'crest/payment_success';
                $config['cancel_return'] = $cancelUrl = base_url() . 'crest/payment_cancel';
                // $config['notify_url'] = ''; //'process_payment.php'; //IPN Post
                // $config['production'] = FALSE;
                // if ($payment_info->account_type != 'Sandbox')
                //     $config['production'] = TRUE;
                $coupon_discount = '';
                // $config['currency_code'] = $payment_info->currency_code;
                // $this->load->library('paypal', $config);
                // $this->paypal->add($cource[0]->name . '/' . $examdetails->name, $price);
                $amount = (float) $price;
                // var_dump($price);
                // exit();
                // if (!empty($relative_cat)) {
                //     foreach ($relative_cat as $val) {
                //         $relative_cat_arr = $this->base_model->fetch_records_from(
                //                 $this->db->dbprefix('subcategories'), array('subcatid' => $val));
                //         if (!empty($relative_cat_arr)) {
                //             $this->paypal->add($cource[0]->name . '/' . $relative_cat_arr->name, $relative_cat_arr[0]->price);
                //             $amount = $amount + (float) $relative_cat_arr[0]->price;
                //             $subscription_examname[] = $cource[0]->name . '/' . $relative_cat_arr[0]->name;
                //         }
                //     }
                // }
//                echo "<pre>";
//                print_r( $this->session->userdata('arr_selected_sub_categories_for_payment') ) ;
//                exit;
                // $this->load->model('category');
                // $amount = $this->category->getTotalAmount($this->session->userdata('arr_selected_sub_categories_for_payment'));
                /* Redeem Reward Points */
                // $this->load->model('Member');
                $user_id = $this->session->userdata('user_id');
                $result = $this->base_model->run_query("select username,home_address,city,state,pincode,country,phone,email FROM  users where id=" . $user_id);
                // if (!empty($userId)) {
                    // $rewardPoints = $this->Member->getRewardPoints($userId);
                    // $amount = $amount - $rewardPoints;
                // }
//                echo "<pre>";
//                print_r($subscription_info);
//                exit;
                /*                 * ************************** */
                // $this->session->set_userdata('subscription_examname', $subscription_examname);
                // $this->session->unset_userdata('discount_categories');
                //$this->paypal->pay(); //Proccess the payment
                $merchant_data = '';
                $order_id = $this->generateRandomString($user_id);
                $this->session->set_userdata('txn_id', $order_id);
                $working_key = '6E4C72802A8D5B27033D49B3B30BFDAA'; //Shared by CCAVENUES
                $access_code = 'AVBI78FF77BU15IBUB'; //Shared by CCAVENUES
                //$merchant_data = 'tid=&merchant_id=181092&order_id=' . $order_id . '&amount=' . $amount . '&currency=INR&redirect_url=' . $returnUrl . '&cancel_url=' . $cancelUrl . '&language=EN&billing_name=&billing_address=&billing_city=&billing_state=&billing_zip=&billing_country=&billing_tel=&billing_email=&delivery_name=&delivery_address=&delivery_city=&delivery_state=&delivery_zip=&delivery_country=&delivery_tel=&merchant_param1=&merchant_param2=&merchant_param3=&merchant_param4=&merchant_param5=&promo_code=&customer_identifier=&';
                 // $merchant_data = 'tid=&merchant_id=181092&order_id=' . $order_id . '&amount=' . $amount . '&currency=INR&redirect_url=' . $returnUrl . '&cancel_url=' . $cancelUrl . '&language=EN&billing_name=' . $result[0]->username . '&billing_address=' . $result[0]->home_address . '&billing_city=' . $result[0]->city . '&billing_state=' . $result[0]->state . '&billing_zip=' . $result[0]->pincode . '&billing_country=' . $result[0]->country . '&billing_tel=' . $result[0]->phone . '&billing_email=' . $result[0]->email . '&delivery_name=&delivery_address=&delivery_city=&delivery_state=&delivery_zip=&delivery_country=&delivery_tel=&merchant_param1=&merchant_param2=&merchant_param3=&merchant_param4=&merchant_param5=&promo_code=&customer_identifier=&';
                $merchant_data = 'tid=&merchant_id=181092&order_id=' . $order_id . '&amount=' . $amount . '&currency=INR&redirect_url=' . $returnUrl . '&cancel_url=' . $cancelUrl . '&language=EN&billing_name=' . $result[0]->username . '&billing_address=' . $result[0]->home_address . '&billing_city=' . $result[0]->city . '&billing_state=' . $result[0]->state . '&billing_zip=' . $result[0]->pincode . '&billing_country=' . $result[0]->country . '&billing_tel=&billing_email=' . $result[0]->email . '&delivery_name=&delivery_address=&delivery_city=&delivery_state=&delivery_zip=&delivery_country=&delivery_tel=&merchant_param1=&merchant_param2=&merchant_param3=&merchant_param4=&merchant_param5=&promo_code=&customer_identifier=&';
                $encrypted_data = $this->encrypt($merchant_data, $working_key);
                // echo $encrypted_data;
                // $encrypted_data2 = $this->encrypt2($merchant_data, $working_key);
                // echo $encrypted_data2;
                //     exit();

                echo '<html><body><form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction">
                            <input type=hidden name=encRequest value=' . $encrypted_data . '>
                            <input type=hidden name=access_code value=' . $access_code . '>
                            </form>
                            </center>';
                echo "<script language='javascript'>document.redirect.submit();</script></body></html>";
            } else {
                $this->prepare_flashmessage("Please contact admin for this payment gateway", 1);
                // $quizid = $subscriptioninfo['quizid'];
                //remove session data
                // $this->session->unset_userdata('subscription_data');
                // $this->session->unset_userdata('subscription_examname');
                // $this->session->unset_userdata('discount_amount');
                // redirect('user/instructions/' . $quizid, 'refresh');
                redirect('payment_success/', 'refresh');
            }
        }
        $this->prepare_flashmessage("Invalid request", 1);
        redirect('registration', 'refresh');
    }
    //Payment Success
    function payment_success() {
        $encResponse = isset($_REQUEST['encResp']) ? $_REQUEST['encResp'] : '';
        $rcvdString = $this->decrypt($encResponse, '6E4C72802A8D5B27033D49B3B30BFDAA');
//        echo "<pre>";
//        print_r($rcvdString);
//        exit;
//        
        if (empty($rcvdString)) {
            $this->prepare_flashmessage(
                    "Payment unsuccessful, We're sorry, but we are not able to process your payment due to system error.", 0);
            redirect('crest/payment_error/');
        }
        date_default_timezone_set("Asia/Kolkata");
                
        $decryptValues = explode('&', $rcvdString);
        $dataSize = sizeof($decryptValues);
        $decryptValues = array_values($decryptValues);
        $response = array();
        if (count($decryptValues) > 0) {
            foreach ($decryptValues as $value) {
                $arr = explode('=', $value);
                $response[$arr[0]] = $arr[1];
            }
        }
        for ($i = 0; $i < $dataSize; $i++) {
            $information = explode('=', $decryptValues[$i]);
            if ($i == 3)
                $order_status = $information[1];
        }
        $order_status_message = '';
        if ($order_status === "Success") {

        	// $table = $this->db->dbprefix('users');

        	// $updateStatus=  array('referral_code_status' => 1);
         //    $where['id'] = $this->session->userdata('user_id');
         //    $this->base_model->update_operation($updateStatus, $table, $where);

            $order_status_message = "Thank you for subscribing for CREST Olympiad Exam with us. Please note that your transaction is successful. You may visit https://www.crestolympiads.com/login and check dashboard for the details.";
        } else if ($order_status === "Aborted") {
            $order_status_message = "Thank you for shopping with us. We will keep you posted regarding the status of your order through e-mail";
        } else if ($order_status === "Failure") {
            $order_status_message = "Thank you for shopping with us. However, the transaction has been declined.";
        } else {
            $order_status_message = "Security Error. Illegal access detected";
        }
        $ccAvenueResponse = array(
            'cc_order_id' => isset($response['order_id']) ? $response['order_id'] : '',
            'cc_tracking_id' => isset($response['tracking_id']) ? $response['tracking_id'] : '',
            'cc_bank_ref_no' => isset($response['bank_ref_no']) ? $response['bank_ref_no'] : '',
            'cc_order_status' => isset($response['order_status']) ? $response['order_status'] : '',
            'cc_failure_message' => isset($response['failure_message']) ? $response['failure_message'] : '',
            'cc_payment_mode' => isset($response['payment_mode']) ? $response['payment_mode'] : '',
            'cc_card_name' => isset($response['card_name']) ? $response['card_name'] : '',
            'cc_status_code' => isset($response['status_code']) ? $response['status_code'] : '',
            'cc_status_message' => isset($response['status_message']) ? $response['status_message'] : '',
            'cc_amount' => isset($response['amount']) ? $response['amount'] : '',
            'cc_billing_name' => isset($response['billing_name']) ? $response['billing_name'] : '',
            'cc_billing_address' => isset($response['billing_address']) ? $response['billing_address'] : '',
            'cc_billing_city' => isset($response['billing_city']) ? $response['billing_city'] : '',
            'cc_billing_state' => isset($response['billing_state']) ? $response['billing_state'] : '',
            'cc_billing_zip' => isset($response['billing_zip']) ? $response['billing_zip'] : '',
            'cc_billing_country' => isset($response['billing_country']) ? $response['billing_country'] : '',
            'cc_billing_tel' => isset($response['billing_tel']) ? $response['billing_tel'] : '',
            'cc_billing_email' => isset($response['billing_email']) ? $response['billing_email'] : '',
            'cc_offer_type' => isset($response['offer_type']) ? $response['offer_type'] : '',
            'cc_offer_code' => isset($response['offer_code']) ? $response['offer_code'] : '',
            'cc_discount_value' => isset($response['discount_value']) ? $response['discount_value'] : '',
            'cc_mer_amount' => isset($response['mer_amount']) ? $response['mer_amount'] : '',
            'cc_response_code' => isset($response['response_code']) ? $response['response_code'] : '',
            'cc_order_status_message' => $order_status_message
        );
        $olympiadTransactionId = $this->session->userdata('txn_id');
        // $subcat_arr = array();
        // $related = array();
        // $examname = array();
        $user_id = $this->session->userdata('user_id');
        $subjects =  $this->session->userdata('subjects');
        // $where['id'] = $this->session->userdata('user_id');
        $this->load->model('base_model');
        $query = "SELECT * FROM `users` WHERE `id`='" . $user_id . "'";
        // echo $query;
        // exit();
        $usr_info_arr = $this->db->query($query)->row_array();
        $this_user = $this->db->query($query)->row();
        // $usr_info_arr = $this->base_model->fetch_records_from('users',$where);
        // $usr_info_arr = (array) $usr_info_arr[0];
        // $user
        /* Delete all reward points of this user */
        // $this->load->model('Member');
        $subscriptioninfo = array();
        $subscriptioninfo = $this->session->userdata('subscription_data');
        $subscriptioninfo['transaction_id'] = $olympiadTransactionId;
        $subscriptioninfo['payer_id'] = $user_id;
        $subscriptioninfo['payer_email'] = $usr_info_arr['email'];
        $subscriptioninfo['payer_name'] = $usr_info_arr['username'];
        $subscriptioninfo['user_id'] = $user_id;
        $subscriptioninfo['subjects'] = $subjects;
        // $subscriptioninfo['school_portal_id'] = $this->session->userdata('school_id_for_payment');
        
        // $this->session->set_userdata('school_id_for_payment',0);

        $transaction_id1 = $subscriptioninfo['transaction_id'];
        $payer_id1 = $subscriptioninfo['user_id'];
        $payer_email1 = $subscriptioninfo['payer_email'];
        $payer_name1 = $subscriptioninfo['payer_name'];

        if ($order_status === "Success" || strtolower($order_status) == "success") {
            // $examname = $this->session->userdata('subscription_examname');
            $subscriptioninfo['status'] = 'Active';
            $subscriptioninfo['dateofsubscription'] = date('Y-m-d H:i:s');


	        $mailParams = array('this_user' => $this_user);
	    	$this->load->model('Emails_model');
    		if(!$this->Emails_model->sendPaymentSuccessMail($usr_info_arr['email'], $mailParams)) {
	    	
	    	}

            
            $userId = $this->session->userdata('user_id');
            // if (!empty($userId)) {
            //     $this->Member->deleteRewardPoints($userId);
            // }
            $this->load->model('base_model');
            // $res = $this->base_model->insert_operation($subscriptioninfo, 'payments');
            $res = $this->base_model->insert_operation('payments', $subscriptioninfo);
            
            // $related = $this->session->userdata('related_categories');
            // if (!empty($related)) {
            //     foreach ($related as $val) {
            //         if ($val != 0) {
            //             $this->base_model->insert_operation(array('user_id' => $this->ion_auth->user()->row()->id,
            //                 'quizid' => $val, 'class' => $usr_info_arr['class'], 'status' => 'Active', 'dateofsubscription' => date('Y-m-d H:i:s'),
            //                 // 'school_portal_id' => $subscriptioninfo['school_portal_id'],
            //                 'transaction_id' => $transaction_id1,
            //                 'payer_id'=> $payer_id1, 
            //                 'payer_email' => $payer_email1, 
            //                 'payer_name'=> $payer_name1), 'prosubscriptions');
            //         }
            //     }
            // }
            // $exam_nm = '';
            // if (!empty($examname)) {
            //     foreach ($examname as $val) {
            //         $exam_nm .= $val . '<br>';
            //     }
            // }
            // $quizid = $subscriptioninfo['quizid'];
            // $quiz_arr = $this->db->query("SELECT `slug` FROM `subcategories` WHERE `subcatid`='" . $quizid . "'")->row_array();
            // $slug = $quiz_arr['slug'];
            //remove session data
            // $this->session->unset_userdata('subscription_data');
            // $this->session->unset_userdata('subscription_examname');
            // $this->session->unset_userdata('coupon_discount');
            // $this->session->unset_userdata('txn_id');
            // $this->session->unset_userdata('discount_amount');
            $this->session->set_userdata('payment_response', 'true');
            // redirect('user/instructions/' . $slug, 'refresh');
            /* Update CC Avenue response */
            $table = $this->db->dbprefix('payments');
            $where['transaction_id'] = $olympiadTransactionId;
            $this->base_model->update_operation($ccAvenueResponse, $table, $where);
            /*             * ************************ */
            $this->prepare_flashmessage(
                    "Payment has been received Successfully.", 0
            );
            
            redirect('crest/paymentconfirmation/');
        } else {
            $ccAvenueResponse['transaction_id'] = $subscriptioninfo['transaction_id'];
            $ccAvenueResponse['payer_id'] = $subscriptioninfo['payer_id'];
            $ccAvenueResponse['payer_email'] = $subscriptioninfo['payer_email'];
            $ccAvenueResponse['payer_name'] = $subscriptioninfo['payer_name'];
            $ccAvenueResponse['user_id'] = $subscriptioninfo['user_id'];
            /* Insert CC Avenue response */
            $this->load->model('base_model');
            // $this->base_model->insert_operation($ccAvenueResponse, 'payments');
            $this->base_model->insert_operation('payments',$ccAvenueResponse);
            /*             * ****************************** */
            redirect('crest/payment_error/');
        }
    }

    //Payment Process
    function payment_razorpay($param1) {
    	
        // , $param2=''
                $this->load->model('base_model');

        // date_default_timezone_set("Asia/Kolkata");
        // $relative_cat = array();
        // $table = $this->db->dbprefix('subcategories');
        // $condition['subcatid'] = $param2;
        // $examdetails = $this->base_model->fetch_records_from($table, $condition);
        // $buy_class = isset($_COOKIE['buy_class']) ? $_COOKIE['buy_class'] : '';
        // $subscription_info['class'] = $buy_class;
        // if (count($examdetails) <= 0)
            // redirect('user/payment');
        // $examdetails = $examdetails[0];
        $subscription_info['user_id'] = $this->session->userdata('user_id');
        // $subscription_info['quizid'] = $examdetails->subcatid;
        $price = $this->session->userdata('amount');
        // $newtable = $this->db->dbprefix('categories');
        // $newcondition['catid'] = $examdetails->catid;
        // $cource = $this->base_model->fetch_records_from(
                // $newtable, $newcondition);
        // $relative_cat = $this->session->userdata('discount_categories');
        // if (!empty($relative_cat)) {
            // $this->session->set_userdata('related_categories', $relative_cat);
        // }
        date_default_timezone_set("Asia/Kolkata");
        
        $subscription_info['status'] = 'Active';
        $subscription_info['dateofsubscription'] = date('Y-m-d H:i:s');
        //PAYMENT METHODS VALIDATION
        // if ($param1 == "ccavenue" && isset($param2) &&
                // $param2 != '' && is_numeric($param2)) {
        if($param1 == "razorpay"){
            // $subscription_examname = array();
            // $this->session->set_userdata('subscription_data', $subscription_info);
            // $subscription_examname[] = $cource[0]->name . '/' . $examdetails->name;
            // $payment_info = $this->base_model->fetch_records_from(
            //         'paypal', array('status' => 'Active')
            // );
            $amount = $price;
            if (1) {
                // $payment_info = $payment_info[0];
                // $config['business'] = $payment_info->paypal_email;
                // $config['cpp_header_image'] = base_url() . "assets/uploads/paypal_logo/logo.jpg";
                $config['return'] = $returnUrl = base_url() . 'crest/payment_success_razorpay';
                $config['cancel_return'] = $cancelUrl = base_url() . 'crest/payment_cancel';
                // $config['notify_url'] = ''; //'process_payment.php'; //IPN Post
                // $config['production'] = FALSE;
                // if ($payment_info->account_type != 'Sandbox')
                //     $config['production'] = TRUE;
                $coupon_discount = '';
                // $config['currency_code'] = $payment_info->currency_code;
                // $this->load->library('paypal', $config);
                // $this->paypal->add($cource[0]->name . '/' . $examdetails->name, $price);
                $amount = (float) $price;
                // var_dump($price);
                // exit();
                // if (!empty($relative_cat)) {
                //     foreach ($relative_cat as $val) {
                //         $relative_cat_arr = $this->base_model->fetch_records_from(
                //                 $this->db->dbprefix('subcategories'), array('subcatid' => $val));
                //         if (!empty($relative_cat_arr)) {
                //             $this->paypal->add($cource[0]->name . '/' . $relative_cat_arr->name, $relative_cat_arr[0]->price);
                //             $amount = $amount + (float) $relative_cat_arr[0]->price;
                //             $subscription_examname[] = $cource[0]->name . '/' . $relative_cat_arr[0]->name;
                //         }
                //     }
                // }
//                echo "<pre>";
//                print_r( $this->session->userdata('arr_selected_sub_categories_for_payment') ) ;
//                exit;
                // $this->load->model('category');
                // $amount = $this->category->getTotalAmount($this->session->userdata('arr_selected_sub_categories_for_payment'));
                /* Redeem Reward Points */
                // $this->load->model('Member');
                $user_id = $this->session->userdata('user_id');
                $result = $this->base_model->run_query("select id, username,home_address,city,state,pincode,country,phone,email FROM  users where id=" . $user_id);
                // if (!empty($userId)) {
                    // $rewardPoints = $this->Member->getRewardPoints($userId);
                    // $amount = $amount - $rewardPoints;
                // }
//                echo "<pre>";
//                print_r($subscription_info);
//                exit;
                /*                 * ************************** */
                // $this->session->set_userdata('subscription_examname', $subscription_examname);
                // $this->session->unset_userdata('discount_categories');
                //$this->paypal->pay(); //Proccess the payment
                $merchant_data = '';
                $order_id = $this->generateRandomString($user_id);
                $this->session->set_userdata('txn_id', $order_id);
                //$working_key = '6E4C72802A8D5B27033D49B3B30BFDAA'; //Shared by CCAVENUES
                //$access_code = 'AVBI78FF77BU15IBUB'; //Shared by CCAVENUES
                //$merchant_data = 'tid=&merchant_id=181092&order_id=' . $order_id . '&amount=' . $amount . '&currency=INR&redirect_url=' . $returnUrl . '&cancel_url=' . $cancelUrl . '&language=EN&billing_name=&billing_address=&billing_city=&billing_state=&billing_zip=&billing_country=&billing_tel=&billing_email=&delivery_name=&delivery_address=&delivery_city=&delivery_state=&delivery_zip=&delivery_country=&delivery_tel=&merchant_param1=&merchant_param2=&merchant_param3=&merchant_param4=&merchant_param5=&promo_code=&customer_identifier=&';
                 //$merchant_data = 'tid=&merchant_id=181092&order_id=' . $order_id . '&amount=' . $amount . '&currency=INR&redirect_url=' . $returnUrl . '&cancel_url=' . $cancelUrl . '&language=EN&billing_name=' . $result[0]->username . '&billing_address=' . $result[0]->home_address . '&billing_city=' . $result[0]->city . '&billing_state=' . $result[0]->state . '&billing_zip=' . $result[0]->pincode . '&billing_country=' . $result[0]->country . '&billing_tel=' . $result[0]->phone . '&billing_email=' . $result[0]->email . '&delivery_name=&delivery_address=&delivery_city=&delivery_state=&delivery_zip=&delivery_country=&delivery_tel=&merchant_param1=&merchant_param2=&merchant_param3=&merchant_param4=&merchant_param5=&promo_code=&customer_identifier=&';
                //$encrypted_data = $this->encrypt($merchant_data, $working_key);
                // echo $encrypted_data;
                // $encrypted_data2 = $this->encrypt2($merchant_data, $working_key);
                // echo $encrypted_data2;
                //     exit();

                // echo '<html><body><form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction">
                //             <input type=hidden name=encRequest value=' . $encrypted_data . '>
                //             <input type=hidden name=access_code value=' . $access_code . '>
                //             </form>
                //             </center>';
                // echo "<script language='javascript'>document.redirect.submit();</script></body></html>";

                $data['return_url'] = site_url().'razorpay/callback';
                $data['surl'] = site_url().'razorpay/success';
                $data['url'] = site_url().'razorpay/failed';
                $data['currency_code'] = 'INR';

                $data['productinfo'] = $this->session->userdata('subjects');
                $data['txnid'] =  $order_id;
                $data['surl'] = site_url().'razorpay/success';
                $data['furl'] = site_url().'razorpay/failed';        
                $data['key_id'] = RAZOR_KEY_ID;
                $data['currency_code'] = 'INR';            
                $data['total'] = ($amount * 100); 
                $data['amount'] = $amount;
                $data['merchant_order_id'] = $result[0]->id;
                $data['card_holder_name'] = $result[0]->username;
                $data['email'] = $result[0]->email;
                //$data['phone'] = $result[0]->phone;
                $data['phone'] = '';
                $data['name'] = 'CREST Olympiads';
                $data['return_url'] = site_url().'razorpay/callback';



                $this->data['content'] = 'razorpay/checkout';
                $this->load->view('razorpay/checkout', $data);

            } else {
                $this->prepare_flashmessage("Please contact admin for this payment gateway", 1);
                // $quizid = $subscriptioninfo['quizid'];
                //remove session data
                // $this->session->unset_userdata('subscription_data');
                // $this->session->unset_userdata('subscription_examname');
                // $this->session->unset_userdata('discount_amount');
                // redirect('user/instructions/' . $quizid, 'refresh');
                redirect('payment_success_razorpay/', 'refresh');
            }
        }
        // $this->prepare_flashmessage("Invalid request", 1);
        // redirect('registration', 'refresh');
    }
    //Payment Success
    function payment_success_razorpay() {
        // $encResponse = isset($_REQUEST['encResp']) ? $_REQUEST['encResp'] : '';
        // $rcvdString = $this->decrypt($encResponse, '6E4C72802A8D5B27033D49B3B30BFDAA');
//        echo "<pre>";
//        print_r($rcvdString);
//        exit;
//       
	    $response = $this->session->flashdata('transaction_details'); 
        if (empty($response)) {
            $this->prepare_flashmessage(
                    "Payment unsuccessful, We're sorry, but we are not able to process your payment due to system error.", 0);
            redirect('crest/payment_error/');
        }
        date_default_timezone_set("Asia/Kolkata");
                
        // $decryptValues = explode('&', $rcvdString);
        // $dataSize = sizeof($decryptValues);
        // $decryptValues = array_values($decryptValues);
        // $response = array();
        // if (count($decryptValues) > 0) {
        //     foreach ($decryptValues as $value) {
        //         $arr = explode('=', $value);
        //         $response[$arr[0]] = $arr[1];
        //     }
        // }
        // for ($i = 0; $i < $dataSize; $i++) {
        //     $information = explode('=', $decryptValues[$i]);
        //     if ($i == 3)
        //         $order_status = $information[1];
        // }
        $error_code = $response['error_code'];
        $order_status_message = '';
        if (empty($error_code)) {
            $order_status="Success";
            $order_status_message = " Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";
        } 
        //  else if ($order_status === "Aborted") {
        //     $order_status_message = "Thank you for shopping with us. We will keep you posted regarding the status of your order through e-mail";
        // } else if ($order_status === "Failure") {
        //     $order_status_message = "Thank you for shopping with us. However, the transaction has been declined.";
        // }
         else {
            $order_status_message = "Security Error. Illegal access detected";
        }

        if(!empty($response['card']))
        {
            $payment_mode="card";
        }
        else if (!empty($response['bank'])) {
            # code...
             $payment_mode="bank";
        }
        else if (!empty($response['wallet'])) {
            $payment_mode="wallet";
        }
        else if (!empty($response['vpa'])) {
            $payment_mode="vpa";
        }
        else
        {
            $payment_mode="";
        }

         $this->load->model('base_model');
                $userId = $this->session->userdata('user_id');
                $result = $this->base_model->run_query("select username,home_address,phone,email,city,state,country,pincode FROM  users where id=" . $userId);


        $ccAvenueResponse = array(
            'cc_order_id' => isset($response['id']) ? $response['id'] : '',
            'cc_tracking_id' => isset($response['id']) ? $response['id'] : '',
            'cc_bank_ref_no' => isset($response['card']['id']) ? $response['card']['id']: '',
            'cc_order_status' => isset($order_status) ? $order_status : '',
            'cc_failure_message' => isset($response['error_description']) ? $response['error_description'] : '',
            'cc_payment_mode' => isset($payment_mode) ? $payment_mode : '',
            'cc_card_name' => isset($response['card']['network']) ? $response['card']['network'] : '',
             'cc_status_code' => isset($response['captured']) ? $response['captured'] : '',
            'cc_status_message' => isset($response['status']) ? $response['status'] : '',
            'cc_amount' => isset($response['amount']) ? $response['amount']/100 : '',
             'cc_billing_name' => isset($result[0]->username) ? $result[0]->username : '',
            'cc_billing_address' => isset($result[0]->home_address) ? $result[0]->home_address : '',
            'cc_billing_city' => isset($result[0]->city) ? $result[0]->city : '',
            'cc_billing_state' => isset($result[0]->state) ? $result[0]->state : '',
            'cc_billing_zip' => isset($result[0]->pincode) ? $result[0]->pincode : '',
            'cc_billing_country' => isset($result[0]->country) ? $result[0]->country : '',
            'cc_billing_tel' => isset($response['contact']) ? $response['contact'] : '',
            'cc_billing_email' => isset($response['email']) ? $response['email'] : '',
            'cc_offer_type' => isset($response['offer_type']) ? $response['offer_type'] : '',
            'cc_offer_code' => isset($response['offer_code']) ? $response['offer_code'] : '',
            'cc_discount_value' => isset($response['discount_value']) ? $response['discount_value'] : '',
            'cc_mer_amount' => isset($response['amount']) ? $response['amount']/100 : '',
            'cc_response_code' => isset($response['response_code']) ? $response['response_code'] : '',
            'cc_order_status_message' => $order_status_message
        );
        $olympiadTransactionId = $this->session->userdata('txn_id');
        // $subcat_arr = array();
        // $related = array();
        // $examname = array();
        $user_id = $this->session->userdata('user_id');
        $subjects =  $this->session->userdata('subjects');
        // $where['id'] = $this->session->userdata('user_id');
        $this->load->model('base_model');
        $query = "SELECT * FROM `users` WHERE `id`='" . $user_id . "'";
        // echo $query;
        // exit();
        $usr_info_arr = $this->db->query($query)->row_array();
        $this_user = $this->db->query($query)->row();
        // $usr_info_arr = $this->base_model->fetch_records_from('users',$where);
        // $usr_info_arr = (array) $usr_info_arr[0];
        // $user
        /* Delete all reward points of this user */
        // $this->load->model('Member');
        $subscriptioninfo = array();
        $subscriptioninfo = $this->session->userdata('subscription_data');
        $subscriptioninfo['transaction_id'] = $olympiadTransactionId;
        $subscriptioninfo['payer_id'] = $user_id;
        $subscriptioninfo['payer_email'] = $usr_info_arr['email'];
        $subscriptioninfo['payer_name'] = $usr_info_arr['username'];
        $subscriptioninfo['user_id'] = $user_id;
        $subscriptioninfo['subjects'] = $subjects;
        // $subscriptioninfo['school_portal_id'] = $this->session->userdata('school_id_for_payment');
        
        // $this->session->set_userdata('school_id_for_payment',0);

        $transaction_id1 = $subscriptioninfo['transaction_id'];
        $payer_id1 = $subscriptioninfo['user_id'];
        $payer_email1 = $subscriptioninfo['payer_email'];
        $payer_name1 = $subscriptioninfo['payer_name'];

        if ($order_status === "Success" || strtolower($order_status) == "success") {
            // $examname = $this->session->userdata('subscription_examname');
            $subscriptioninfo['status'] = 'Active';
            $subscriptioninfo['dateofsubscription'] = date('Y-m-d H:i:s');


	        $mailParams = array('this_user' => $this_user);
	    	$this->load->model('Emails_model');
    		if(!$this->Emails_model->sendPaymentSuccessMail($usr_info_arr['email'], $mailParams)) {
	    	
	    	}

            
            $userId = $this->session->userdata('user_id');
            // if (!empty($userId)) {
            //     $this->Member->deleteRewardPoints($userId);
            // }
            $this->load->model('base_model');
            // $res = $this->base_model->insert_operation($subscriptioninfo, 'payments');
            $res = $this->base_model->insert_operation('payments', $subscriptioninfo);
            
            // $related = $this->session->userdata('related_categories');
            // if (!empty($related)) {
            //     foreach ($related as $val) {
            //         if ($val != 0) {
            //             $this->base_model->insert_operation(array('user_id' => $this->ion_auth->user()->row()->id,
            //                 'quizid' => $val, 'class' => $usr_info_arr['class'], 'status' => 'Active', 'dateofsubscription' => date('Y-m-d H:i:s'),
            //                 // 'school_portal_id' => $subscriptioninfo['school_portal_id'],
            //                 'transaction_id' => $transaction_id1,
            //                 'payer_id'=> $payer_id1, 
            //                 'payer_email' => $payer_email1, 
            //                 'payer_name'=> $payer_name1), 'prosubscriptions');
            //         }
            //     }
            // }
            // $exam_nm = '';
            // if (!empty($examname)) {
            //     foreach ($examname as $val) {
            //         $exam_nm .= $val . '<br>';
            //     }
            // }
            // $quizid = $subscriptioninfo['quizid'];
            // $quiz_arr = $this->db->query("SELECT `slug` FROM `subcategories` WHERE `subcatid`='" . $quizid . "'")->row_array();
            // $slug = $quiz_arr['slug'];
            //remove session data
            // $this->session->unset_userdata('subscription_data');
            // $this->session->unset_userdata('subscription_examname');
            // $this->session->unset_userdata('coupon_discount');
            // $this->session->unset_userdata('txn_id');
            // $this->session->unset_userdata('discount_amount');
            $this->session->set_userdata('payment_response', 'true');
            // redirect('user/instructions/' . $slug, 'refresh');
            /* Update CC Avenue response */
            $table = $this->db->dbprefix('payments');
            $where['transaction_id'] = $olympiadTransactionId;
            $this->base_model->update_operation($ccAvenueResponse, $table, $where);
            /*             * ************************ */
            $this->prepare_flashmessage(
                    "Payment has been received Successfully.", 0
            );
            
            redirect('crest/paymentconfirmation/');
        } else {
            $ccAvenueResponse['transaction_id'] = $subscriptioninfo['transaction_id'];
            $ccAvenueResponse['payer_id'] = $subscriptioninfo['payer_id'];
            $ccAvenueResponse['payer_email'] = $subscriptioninfo['payer_email'];
            $ccAvenueResponse['payer_name'] = $subscriptioninfo['payer_name'];
            $ccAvenueResponse['user_id'] = $subscriptioninfo['user_id'];
            /* Insert CC Avenue response */
            $this->load->model('base_model');
            // $this->base_model->insert_operation($ccAvenueResponse, 'payments');
            $this->base_model->insert_operation('payments',$ccAvenueResponse);
            /*             * ****************************** */
            redirect('crest/payment_error/');
        }
    }
    
    function paymentconfirmation() {
        // $this->prepare_flashmessage("Payment Confirmed!", 0);
//        if($this->session->userdata('txn_id') == '') {
//           redirect('user');
//        }
        // $this->data['content'] = 'user/payment/confirmation';
        $payment_conf = $this->session->userdata('payment_response');
        $txn_id = $this->session->userdata('txn_id');
        if(isset($txn_id) && isset($payment_conf)){
        	if($payment_conf != 'true'){
        		redirect(base_url());
        	}
        	$data['id'] = $this->session->userdata('user_id');
	    	$res = $this->base_model->fetch_records_from('users',$data);
	        $this->data['this_user'] = $res[0];
	        $this->data['txn_id'] = $this->session->userdata('txn_id');
	        $this->session->unset_userdata('txn_id');
	        $this->session->unset_userdata('payment_response');
	        // $this->data['']
	        // redirect('successful_registration');

	        $table = $this->db->dbprefix('users');

        	$updateStatus=  array('referral_code_status' => 1);
            $where['id'] = $this->session->userdata('user_id');
            $this->base_model->update_operation($updateStatus, $table, $where);

            $referrer_id = $this->session->userdata('referrer_id');

            $subjects=$this->session->userdata('subjects');
			$amount=$this->session->userdata('amount');

			$subjects=rtrim($subjects,',');

     if ($this->ion_auth->logged_in())
     {

 			  $userid = $this->ion_auth->get_user_id();

           //$chk_user['id'] = $userid;
            $result = $this->base_model->run_query("select * FROM  user_transaction_details where user_id=" . $userid." order by id DESC limit 1");

        $transaction_date=date('Y-m-d H:i:s');
						$transaction_status=1;

						$referrer_id=0;

						// if(!empty($result[0]->max_wallet_amount) && !empty($result[0]->wallet_amount))
						// {
						// 	$max_wallet_amount=0;
						// }
						// else
						// {
							$max_wallet_amount=$result[0]->max_wallet_amount-$result[0]->wallet_amount+$amount;
						// }
						

						// if(!empty($result[0]->wallet_amount))
						// {
						// $wallet_amount=$amount;
						// }

						// else

						// {
							$wallet_amount=0;	
						// }

						 $table1 = $this->db->dbprefix('user_transaction_details');
						


							$transactionParams = array('user_id' => $userid, 'referrer_id' => $referrer_id ,'preferred_subjects' => $subjects,'transaction_amount' => $amount, 'max_wallet_amount' => $max_wallet_amount, 'wallet_amount' => $wallet_amount,'transaction_date' => $transaction_date,'transaction_status' => $transaction_status);						

						$this->base_model->insert_operation($table1,$transactionParams);

            
		}

            else if(!empty($referrer_id))
            {

             $table1 = $this->db->dbprefix('user_transaction_details');

						$where1 = array("user_id" => $referrer_id);

						$transaction_details = $this->base_model->fetch_records_from($table1,$where1);
						
						 //print_r($transaction_details);die;


						$wallet_amount=$transaction_details[0]->wallet_amount;

						$max_wallet_amount=$transaction_details[0]->max_wallet_amount;

						if($transaction_details[0]->max_wallet_amount<$amount)
						{
							$ref_amount=$transaction_details[0]->max_wallet_amount;
						}
						else
						{
							$ref_amount=$amount;
						}

						if ($transaction_details[0]->wallet_amount<$transaction_details[0]->max_wallet_amount) {
							# code...

							//$referer_wallet_amount=$transaction_details[0]->wallet_amount+$amount;

							$referer_wallet_amount=$ref_amount;
						}

						else

						{
							$referer_wallet_amount=$transaction_details[0]->wallet_amount;
						}



						// $transaction_params = array('wallet_amount' => $referer_wallet_amount);
						$transaction_date=date('Y-m-d H:i:s');
						$transaction_status=1;

						//$transaction_amount=$amount;


						


							$transactionParams1 = array('user_id' => $res[0]->id, 'referrer_id' => $referrer_id ,'preferred_subjects' => $subjects, 'transaction_amount' => $amount, 'max_wallet_amount' => $amount, 'wallet_amount' => 0,'transaction_date' => $transaction_date,'transaction_status' => $transaction_status);

							$transactionParams2 = array('user_id' => $referrer_id, 'referrer_id' => 0 ,'preferred_subjects' => 0, 'transaction_amount' => 0, 'max_wallet_amount' => $max_wallet_amount, 'wallet_amount' => $referer_wallet_amount,'transaction_date' => $transaction_date,'transaction_status' => $transaction_status);

						

						$this->base_model->insert_operation($table1,$transactionParams1);
						$this->base_model->insert_operation($table1,$transactionParams2);

						// $transaction_details = $this->base_model->fetch_records_from($table,$where1);

						// $wallet_amount=$this->input->post('wallet_amount');

						// $max_wallet_amount=$transaction_details[0]->max_wallet_amount+$amount;

						// $wallet_amount=$transaction_details[0]->wallet_amount-$wallet_amount;


						// $transactionParams = array('user_id' => $res[0]->id, 'referrer_id' => $referrer_id ,'preferred_subjects' => $subjects, 'max_wallet_amount' => $max_wallet_amount, 'wallet_amount' => $wallet_amount,'transaction_date' => $transaction_date,'transaction_status' => $transaction_status);

						

						// $transaction_Details = $this->base_model->update_operation($transactionParams,$table,$where1);

					}

					else
					{
						$transaction_date=date('Y-m-d H:i:s');
						$transaction_status=1;

						$referrer_id=0;
						$transaction_amount=$amount;
						$max_wallet_amount=$amount;
						$wallet_amount=0;

						 $table1 = $this->db->dbprefix('user_transaction_details');
						


							$transactionParams = array('user_id' => $res[0]->id, 'referrer_id' => $referrer_id ,'preferred_subjects' => $subjects, 'transaction_amount' => $transaction_amount, 'max_wallet_amount' => $max_wallet_amount, 'wallet_amount' => $wallet_amount,'transaction_date' => $transaction_date,'transaction_status' => $transaction_status);

						

						$this->base_model->insert_operation($table1,$transactionParams);
					}

					$this->data['referral_code'] = $res[0]->referral_code;



	        $this->data['content'] = 'buy/success_registration';
        }else{
        	redirect(base_url());
        }
        // $route['my-photos'] = "user/myphotos";

        // $this->layout();
		$this->_render_page('templates/template', $this->data);

        // $this->_render_page('temp/usertemplate');
    }
    function payment_error() {
        // $this->data['content'] = 'user/payment/error';
        $this->prepare_flashmessage("Payment Error", 1);

        $this->data['errorMessage'] = $this->session->userdata('txn_id');
        $this->session->unset_userdata('txn_id');
        // redirect('failed_registration');
        $data['id'] = $this->session->userdata('user_id');
    	$res = $this->base_model->fetch_records_from('users',$data);
        $this->data['this_user'] = $res[0];
        $this->data['content'] = 'buy/failed_registration';
		$this->_render_page('templates/template', $this->data);

        // $this->content = 'auth/my-photos';
        // $this->layout();
        // $this->_render_page('temp/usertemplate');
    }
    //Payment Cancel
    function payment_cancel() {
        // $subscriptioninfo = $this->session->userdata('subscription_data');
        // $examname = $this->session->userdata('subscription_examname');
        // $subscriptioninfo['transaction_id'] = $this->session->userdata('txn_id');
        // $exam_nm = '';
        // if (!empty($examname)) {
        //     foreach ($examname as $val) {
        //         $exam_nm .= $val . '<br>';
        //     }
        // }
        $data['id'] = $this->session->userdata('user_id');
    	$res = $this->base_model->fetch_records_from('users',$data);
        $this->data['this_user'] = $res[0];
        $this->prepare_flashmessage("Payment Cancelled", 1);
        // $quizid = $subscriptioninfo['quizid'];
        // $coupon_id = $this->session->userdata('coupon_discount');
        // if ($coupon_id) {
        //     $attr['status'] = '0';
        //     $table = $this->db->dbprefix('coupons');
        //     $where['coupon_id'] = $userid;
        //     $this->base_model->update_operation($attr, $table, $where);
        // }
        // $quiz_arr = $this->db->query("SELECT `slug` FROM `subcategories` WHERE `subcatid`='" . $quizid . "'")->row_array();
        // $slug = $quiz_arr['slug'];
        //remove session data
        // $this->session->unset_userdata('subscription_data');
        // $this->session->unset_userdata('subscription_examname');
        // $this->session->unset_userdata('coupon_discount');
        $this->session->unset_userdata('txn_id');
        // $this->session->unset_userdata('discount_amount');
        $this->session->set_userdata('payment_response', 'false');

        $this->data['content'] = 'buy/payment_cancelled';
		$this->_render_page('templates/template', $this->data);
        // redirect('failed_registration');

        // $this->content = 'auth/my-photos';
        // $this->layout();
        // redirect('user/profile', 'refresh');
    }

    //payment function ends ------------------------------------------------------------

	public function coordinator(){

		$this->data['title'] = 'Become a Co-ordinator';
		$this->data['active_menu'] = 'coord';

		// $this->load->model('contact');
		$this->load->model('Contact');
		$this->load->helper('captcha');

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('name', 'Contact Person', 'required|min_length[3]|max_length[75]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[75]');
		$this->form_validation->set_rules('message', 'Message', 'max_length[300]');
		$this->form_validation->set_rules('userCaptcha', 'Captcha', 'required|callback_check_captcha');
        
        $userCaptcha = $this->input->post('userCaptcha');


		if ($this->form_validation->run()) {
			if ($this->input->post()) {
				//$data = $this->input->post();

				$data['name'] = $this->input->post('name');
				$data['phone'] = $this->input->post('phone');
				$data['email'] = $this->input->post('email');
				$data['message'] = $this->input->post('message');
				$data['query_type']  = $this->input->post('query_type'); 
				$data['ip_address'] = $_SERVER['HTTP_X_REAL_IP'];
				$data['date'] = date('Y-m-d H:i:s');
				$intLastInsertId = $this->Contact->add($data);

				if(!empty($intLastInsertId)) {
					$this->session->set_flashdata('success_message', 'Thanks! We\'ll get back to you as soon as possible.');
				} else {
					$this->session->set_flashdata('error_message', 'It seems some problem has occured, Please contact us at .'.$this->config->item('support_phone'),1);
				}
			}
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


		$this->data['content'] = "general/become_a_coord";
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

	public function subscribe_email(){

		// $product_table = $this->all_tables['products'];
		// $cat_table = $this->all_tables['categories'];
        $email = $this->input->post('email');
        if(empty($email)) {
            echo json_encode(array('success' => false, 'msg' => 'Please enter your email ID.'));
            exit;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(array('success' => false, 'msg' => 'Please enter a valid email address.'));
            exit;
        }
        $this->load->model('Contact');
        
        $this->Contact->NewsletterSubscribe($email);
        echo json_encode(array('success' => true, 'msg' => 'Thank you for subscribing to the CREST Olympiads Newsletter!'));
        exit;
	}

	public function about(){
		
		$this->data['title'] = 'About Us';
		$this->data['active_menu'] = 'about';

		$this->data['content'] = "general/about";
		$this->_render_page('templates/template', $this->data);
	}

	public function faqs(){
		
		$this->data['title'] = 'FAQs';
		$this->data['active_menu'] = 'about';
		$order_by="id ASC";
	

		$questions = $this->base_model->fetch_records_from('faqs','','*',$order_by);
		$this->data['questions'] = $questions;

		$this->data['content'] = "general/faqs";
		$this->_render_page('templates/template', $this->data);
	}

	public function downloads(){
		
		$this->data['title'] = 'Downloads';
		$this->data['active_menu'] = 'downloads';

		$this->data['meta_description'] = 'Downloads for CREST Olympiads';
		$this->data['title'] = 'Downloads for CREST Olympiads';

		$this->data['content'] = "general/downloads";
		$this->_render_page('templates/template', $this->data);
	}

	

	public function blog(){

		$product_table = $this->all_tables['products'];
		$cat_table = $this->all_tables['categories'];
		$this->load->helper('text');
		
		// $this->data['navbar_products'] = $this->get_navbar_products();
		$this->data['categories'] = $this->base_model->get_details($cat_table);

		$this->data['navbar_products'] = $this->get_navbar_products();
		$this->data['categories'] = $this->base_model->get_details($cat_table);


		
		$this->data['title'] = 'Blog';
		$this->data['active_menu'] = 'blog';
		$this->data['articles'] = $this->db->query("SELECT * FROM `blog`")->result_array();

		$slug = $this->uri->segment(2);
		if($slug != ''){
			$article = $this->db->query("SELECT * FROM `blog` WHERE slug like '".$slug."'")->row_array();

			if($article){
				$this->data['article'] = $article;
				$this->data['title'] = $article['title'];
				$this->data['meta_title'] = $article['meta_keywords'];
				$this->data['meta_description'] = $article['meta_description'];
				$this->data['content'] = "blog/page";
				$this->_render_page('templates/template', $this->data);
				// exit();
			}
			else{
				$this->data['content'] = "blog/index";
				$this->_render_page('templates/template', $this->data);
			}
			// var_dump($article);
			// exit();
		}
		else{
			$this->data['content'] = "blog/index";
			$this->_render_page('templates/template', $this->data);
		}
	}

		public function brain_yoga(){

		        // $all_pictures    = $this->db->query("SELECT * FROM `breaktime_images` WHERE `category`='facts'");
        // $this->data['all_pictures'] = $all_pictures;

        $slug = '';
        $slug = $this->uri->segment(2);
            $title_of_pic = false;

        
        if ($slug != '') {

            $id = $slug;
            $picture_arr = $this->db->query("SELECT * FROM `brain_yoga` WHERE `slug`='" . $id . "'")->row_array();
            if (!$picture_arr){
                redirect('brain_yoga', 'refresh');
            }

            $next_picture_slug = $prev_picture_slug = '0';
            
            if($picture_arr['id'] < 20){
                $next_picture_id = $picture_arr['id']+1;
                $next_picture = $this->db->query("SELECT * FROM `brain_yoga` WHERE `id`='" . $next_picture_id . "'")->row_array();
                $next_picture_slug = $next_picture['slug'];
            }


            if($picture_arr['id'] > 1){
                $prev_picture_id = $picture_arr['id']-1;
                $prev_picture = $this->db->query("SELECT * FROM `brain_yoga` WHERE `id`='" . $prev_picture_id . "'")->row_array();
                $prev_picture_slug = $prev_picture['slug'];
            }

            $image_href     = base_url() . 'assets/images/brain-yoga/'.$picture_arr['image'];
            // $data_text      = $picture_arr['title'];
            // $image_alt      = $picture_arr['alt'];

            $data_text="Brain Yoga";
            
            $fb_share_link       = "https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.crestolympiads.com%2Fbrain-yoga%2F".$id."&amp;src=sdkpreparse";
            $fb_comment_box_link = base_url() . 'brain-yoga/'.$id;

            // $this->data = array('image_alt' => $image_alt,'slug' => $id,'data_text' => $data_text, 'image_href' => $image_href, 'whatsapp_url' => $fb_comment_box_link, 'fb_share_link' => $fb_share_link, 'fb_comment_box_link' => $fb_comment_box_link );

              $this->data = array('slug' => $id,'data_text' => $data_text, 'image_href' => $image_href, 'whatsapp_url' => $fb_comment_box_link, 'fb_share_link' => $fb_share_link, 'fb_comment_box_link' => $fb_comment_box_link );

            $this->data['student_details']=$picture_arr;
            
            $this->data['next_picture_slug'] = $next_picture_slug;
            $this->data['prev_picture_slug'] = $prev_picture_slug;
            $this->data['title'] = $picture_arr['title'];
            $this->data['meta_description'] = $picture_arr['description'];  
            $title_of_pic = true;
            
        }
        $all_pictures    = $this->db->query("SELECT * FROM `brain_yoga`");

        $this->data['all_pictures'] = $all_pictures;
         if($title_of_pic == false){        
        $this->data['title'] = 'Brain Yoga';
        $this->data['meta_description'] = 'Brain Yoga';
             }
       

        $this->data['content'] = "general/brain_yoga";
        $this->_render_page('templates/template', $this->data);
	}

	   public function add_feedback()
    {
        //$inputdata = $this->input->post();

         date_default_timezone_set("Asia/Kolkata");



         $inputdata = array('user_id' => $this->input->post('user_id'),'comment' => $this->input->post('comment'), 'testimonial' => $this->input->post('testimonial'), 'rating' => $this->input->post('rating'),'timestamp' => date('Y-m-d H:i:s')  );

        $table = 'users_feedback_table';

        if($this->base_model->insert_operation($table,$inputdata)){
            echo json_encode(array('success' => true, 'msg' => 'Thank you for your feedback!'));
        }else{
            echo json_encode(array('failure' => true, 'msg' => 'Seems we have a problem, please write to us @ <a href="mailto:info@crestolympiads.com">info@crestolympiads.com</a>!'));
            
        }
        exit;
    }

    //CISRO page
	
	public function cisro_inter_school()
	{

		$this->config->load('ion_auth', TRUE);

		// $slug = $this->uri->segment(1);

		// if($slug!=''){
		// 	$this->data['categories'] = $this->base_model->get_details('categories');
		
			//$query = "SELECT * FROM `slot_details` WHERE `slot_exam`='cisro'";
			$cisro_exam_level = $this->base_model->run_query("select DISTINCT slot_level FROM slot_details WHERE `slot_exam`='cisro' AND slot_status=1 ");
			//print_r($cisro_exam_level);die;
			// $category = $this->db->query($query)->result_array();
			// if (!$category){
			// var_dump($query);
			// exit();
			// 	redirect(base_url());
			// }



			$cisro_practice_slot = $this->base_model->run_query("select slot_time  FROM  slot_details where slot_status=1 and slot_exam ='cisro' and slot_level='Practice Round' and slot_date='11-11-2019' and slot_balance > 0");

			//print_r($cisro_practice_exam_date);die;

			// $user_registered = false;
			

				$cisro_exam_level = $this->base_model->run_query("select group_id  FROM interschool_users ORDER BY id DESC LIMIT 1");

				//print_r($cisro_exam_level);die;
			if ($this->input->post()) {

				// print_r($this->input->post());die;

				$this->load->model('ion_auth_model');
				$this->load->model('Emails_model');

				if($this->input->post('country')=="India")
					{
						$amount = 500;
					}
					else
					{
						$amount = 1750;
					}

				$subjects = "CISRO";

				//$amount = $this->input->post('amount');
        		$this->session->set_userdata('amount', $amount);
        		$this->session->set_userdata('subjects', $subjects);

				$cisro_group_id = $this->base_model->run_query("select group_id  FROM interschool_users ORDER BY id DESC LIMIT 1");


				if(empty($cisro_group_id))
				{
					$group_id=1;
				}
				else
				{
					$group_id=$cisro_group_id[0]->group_id+1;
				}

					//For New School User 1

					$data1['group_id'] = $group_id;
					$email1 = $data1['email'] = $this->input->post('email1');
					$name1 = $data1['username'] = $this->input->post('name1');
					$phone1 = $data1['phone'] = $this->input->post('phone1');
					$class = $data1['class'] = $this->input->post('class');

					$date_of_birth1 = $this->input->post('dob1');
					$dob1 = date("Y-m-d", strtotime($date_of_birth1));
					
					$data1['dob'] = $dob1;
					$data1['prefered_subject'] = $subjects;
					$data1['date_of_registration'] = date("Y-m-d H:i:s");
            		$data1['ip_address'] = $_SERVER['REMOTE_ADDR'];
					$school = $data1['school'] = $this->input->post('school_name');					
					$data1['school_address'] = $this->input->post('school_address');					
					$data1['city'] = $this->input->post('city');

					//echo $this->input->post('country');die;

					if($this->input->post('country')=="India")
						{
							$data1['state'] = $this->input->post('selectstate');
						}
						else
						{
							$data1['state'] = $this->input->post('state');
						}
					//$data['state'] = $this->input->post('state');
					$data1['country'] = $this->input->post('country');
					$data1['country_code'] = $this->input->post('country_code');
					$data1['pincode'] = $this->input->post('pincode');
					$data1['active'] = 1;

					$check_email_user1 = $this->base_model->run_query("select email  FROM users where email='".$email1."'");

					if(count($check_email_user1)==0)
					{
						$password1=$this->create_referral_code($name1);
						//$data1['password']=$password1;
						$data1['password'] = $this->ion_auth_model->hash_password($password1);
						$data1['user_status'] = 0;
					}

					else
					{
						$password1="Please use your existing credentials to login";	
						$data1['password'] = "";
						$data1['user_status'] = 1;					
					}						

                	
				
		            /* Insert into database */
		            $mailParams1 = array('name' => $name1, 'email' => $email1 , 'password' => $password1 , 'phone' => $phone1, 'subjects' => $subjects, 'class' => $class, 'school' => $school);               	
  
						
					$intLastInsertId1 = $this->base_model->insert_operation_id('interschool_users', $data1);
				

                		$this->Emails_model->sendSignupMail2($email1, $mailParams1);
		                

		            //For New School User 2

		            $data2['group_id'] = $group_id;
					$email2 = $data2['email'] = $this->input->post('email2');
					$name2 = $data2['username'] = $this->input->post('name2');
					$phone2 = $data2['phone'] = $this->input->post('phone2');
					$class = $data2['class'] = $this->input->post('class');

					$date_of_birth2 = $this->input->post('dob2');
					$dob2 = date("Y-m-d", strtotime($date_of_birth2));
					
					$data2['dob'] = $dob2;
					$data2['prefered_subject'] = $subjects;
					$data2['date_of_registration'] = date("Y-m-d H:i:s");
            		$data2['ip_address'] = $_SERVER['REMOTE_ADDR'];
					$school = $data2['school'] = $this->input->post('school_name');					
					$data2['school_address'] = $this->input->post('school_address');					
					$data2['city'] = $this->input->post('city');

					//echo $this->input->post('country');die;

					if($this->input->post('country')=="India")
						{
							$data2['state'] = $this->input->post('selectstate');
						}
						else
						{
							$data2['state'] = $this->input->post('state');
						}
					//$data['state'] = $this->input->post('state');
					$data2['country'] = $this->input->post('country');
					$data2['country_code'] = $this->input->post('country_code');
					$data2['pincode'] = $this->input->post('pincode');
					$data2['active'] = 1;				

					$check_email_user2 = $this->base_model->run_query("select email  FROM users where email='".$email2."'");

					if(count($check_email_user2)==0)
					{
						$password2=$this->create_referral_code($name2);
						//$data1['password']=$password1;
						$data2['password'] = $this->ion_auth_model->hash_password($password2);
						$data2['user_status'] = 0;
					}

					else
					{
						$password2="Please use your existing credentials to login";	
						$data2['password'] = "";	
						$data2['user_status'] = 1;				
					}						

				
		            /* Insert into database */
		            $mailParams2 = array('name' => $name2, 'email' => $email2, 'password' => $password2 , 'phone' => $phone2, 'subjects' => $subjects, 'class' => $class, 'school' => $school);               	
  
						
					$intLastInsertId2 = $this->base_model->insert_operation_id('interschool_users', $data2);
				

                		$this->Emails_model->sendSignupMail2($email2, $mailParams2);

		            //For New School User 3
		            
		            $data3['group_id'] = $group_id;
					$email3 = $data3['email'] = $this->input->post('email3');
					$name3 = $data3['username'] = $this->input->post('name3');
					$phone3 = $data3['phone'] = $this->input->post('phone3');
					$class = $data3['class'] = $this->input->post('class');

					$date_of_birth3 = $this->input->post('dob3');
					$dob3 = date("Y-m-d", strtotime($date_of_birth3));
					
					$data3['dob'] = $dob3;
					$data3['prefered_subject'] = $subjects;
					$data3['date_of_registration'] = date("Y-m-d H:i:s");
            		$data3['ip_address'] = $_SERVER['REMOTE_ADDR'];
					$school = $data3['school'] = $this->input->post('school_name');					
					$data3['school_address'] = $this->input->post('school_address');					
					$data3['city'] = $this->input->post('city');

					//echo $this->input->post('country');die;

					if($this->input->post('country')=="India")
						{
							$data3['state'] = $this->input->post('selectstate');
						}
						else
						{
							$data3['state'] = $this->input->post('state');
						}
					//$data['state'] = $this->input->post('state');
					$data3['country'] = $this->input->post('country');
					$data3['country_code'] = $this->input->post('country_code');
					$data3['pincode'] = $this->input->post('pincode');
					$data3['active'] = 1;				

					$check_email_user3 = $this->base_model->run_query("select email  FROM users where email='".$email3."'");

					if(count($check_email_user3)==0)
					{
						$password3=$this->create_referral_code($name3);
						//$data1['password']=$password1;
						$data3['password'] = $this->ion_auth_model->hash_password($password3);
						$data3['user_status'] = 0;
					}

					else
					{
						$password3="Please use your existing credentials to login";	
						$data3['password'] = "";
						$data3['user_status'] = 1;					
					}	
				
		            /* Insert into database */
		            $mailParams3 = array('name' => $name3, 'email' => $email3, 'password' => $password3 , 'phone' => $phone3,  'subjects' => $subjects, 'class' => $class, 'school' => $school);               	
  
						
					$intLastInsertId3 = $this->base_model->insert_operation_id('interschool_users', $data3);
				

                	$this->Emails_model->sendSignupMail2($email3, $mailParams3);

		            //For New School User 4


		            $data4['group_id'] = $group_id;
					$email4 = $data4['email'] = $this->input->post('email4');
					$name4 = $data4['username'] = $this->input->post('name4');
					$phone4 = $data4['phone'] = $this->input->post('phone4');
					$class = $data4['class'] = $this->input->post('class');

					$date_of_birth4 = $this->input->post('dob4');
					$dob4 = date("Y-m-d", strtotime($date_of_birth4));
					
					$data4['dob'] = $dob4;
					$data4['prefered_subject'] = $subjects;
					$data4['date_of_registration'] = date("Y-m-d H:i:s");
            		$data4['ip_address'] = $_SERVER['REMOTE_ADDR'];
					$school = $data4['school'] = $this->input->post('school_name');					
					$data4['school_address'] = $this->input->post('school_address');					
					$data4['city'] = $this->input->post('city');

					//echo $this->input->post('country');die;

					if($this->input->post('country')=="India")
						{
							$data4['state'] = $this->input->post('selectstate');
						}
						else
						{
							$data4['state'] = $this->input->post('state');
						}
					//$data['state'] = $this->input->post('state');
					$data4['country'] = $this->input->post('country');
					$data4['country_code'] = $this->input->post('country_code');
					$data4['pincode'] = $this->input->post('pincode');
					$data4['active'] = 1;				

					$check_email_user4 = $this->base_model->run_query("select email  FROM users where email='".$email4."'");

					if(count($check_email_user4)==0)
					{
						$password4=$this->create_referral_code($name4);
						//$data1['password']=$password1;
						$data4['password'] = $this->ion_auth_model->hash_password($password4);
						$data4['user_status'] = 0;
					}

					else
					{
						$password4="Please use your existing credentials to login";	
						$data4['password'] = "";
						$data4['user_status'] = 1;					
					}
				
		            /* Insert into database */
		            $mailParams4 = array('name' => $name4, 'email' => $email4, 'password' => $password4 , 'phone' => $phone4, 'subjects' => $subjects, 'class' => $class, 'school' => $school);               	
  
						
					$intLastInsertId4 = $this->base_model->insert_operation_id('interschool_users', $data4);
				

                		$this->Emails_model->sendSignupMail2($email4, $mailParams4);



					$userIds=array($intLastInsertId1,$intLastInsertId2,$intLastInsertId3,$intLastInsertId4);

					$this->session->set_userdata('user_id', $intLastInsertId1);

            		$this->session->set_userdata('group_id', $group_id);

					$this->session->set_userdata('user_ids', $userIds);

					
					$this->session->set_userdata('user_class', $this->input->post('class'));

					$this->session->set_userdata('practice_date', $this->input->post('practice_date'));

					$this->session->set_userdata('preliminary_date', $this->input->post('preliminary_date'));

					$this->session->set_userdata('practice_slot', $this->input->post('practice_slot'));

					$this->session->set_userdata('preliminary_slot', $this->input->post('preliminary_slot'));
					


                	$UserIds=$this->session->userdata('user_ids');

                	
				

                		// if(!$this->Emails_model->sendSignupMail($email4, $mailParams4)) {
		                // 	// $this->session->set_flashdata('success_message', 'Thanks! We\'ll get back to you as soon as possible.');
		                // }

					// $UserIds=array($intLastInsertId1,$intLastInsertId2,$intLastInsertId3,$intLastInsertId4);
                

					// if(count($UserIds)==4) {

     //        			//$this->session->set_userdata('user_id', $intLastInsertId1);
     //        			//$this->session->set_userdata('group_id', $group_id);

     //        			// Slot booking for all 4 Users		             

		   //         	 $exam="cisro";

		   //         	 //$user_class=$this->input->post('user_class');

		   //         	 $practice_exam_date=$this->input->post('practice_date'); 

		   //         	 $preliminary_exam_date=$this->input->post('preliminary_date'); 

		   //         	 $practice_exam_level="Practice Round";		           	 		

		   //         	$practice_slot_time=$this->input->post('practice_slot');

		   //         	$preliminary_slot_time=$this->input->post('preliminary_slot');

		   //         	$practice_hours_time = substr($practice_slot_time,0,2);

		   //         	$practice_mins_time = substr($practice_slot_time,-2);
		           

		   //         	$practice_to_time=	$practice_hours_time+2;

		   //         	$practice_from_date=$practice_exam_date." ".$practice_hours_time.":".$practice_mins_time.":00";
		   //         	$practice_to_date=$practice_exam_date." ".$practice_to_time.":".$practice_mins_time.":00";

		   //         	$preliminary_hours_time = substr($preliminary_slot_time,0,2);

		   //         	$preliminary_mins_time = substr($preliminary_slot_time,-2);

		   //         	 $preliminary_exam_level="Preliminary Round";	
		           

		   //         	$preliminary_to_time=	$preliminary_hours_time+2;

		   //         	$preliminary_from_date=$preliminary_exam_date." ".$preliminary_hours_time.":".$preliminary_mins_time.":00";
		   //         	$preliminary_to_date=$preliminary_exam_date." ".$preliminary_to_time.":".$preliminary_mins_time.":00";

		   //         		$booked_date=date('Y-m-d H:i:s');

		   //         		for($i=0;$i<count($UserIds);$i++)
		   //         		{
					// 	$practiceinsertData = array('user_id' => $UserIds[$i],'user_class' => $class, 'from_date' => $practice_from_date,'to_date' => 	$practice_to_date,'exam_name' => $exam,'exam_level' => $practice_exam_level,'exam_slot' => $practice_slot_time,'slot_booked_date' => $booked_date,'exam_status' => 1);						
						
					// 	$preliminaryinsertData = array('user_id' => $UserIds[$i],'user_class' => $class, 'from_date' => $preliminary_from_date,'to_date' => 	$preliminary_to_date,'exam_name' => $exam,'exam_level' => $preliminary_exam_level,'exam_slot' => $preliminary_slot_time,'slot_booked_date' => $booked_date,'exam_status' => 1);

					// 	$this->base_model->insert_operation_id('interschool_quizsubscriptions', $practiceinsertData);
					// 	$this->base_model->insert_operation_id('interschool_quizsubscriptions', $preliminaryinsertData);
					// 	}

		           	// print_r($insertData);die;

		    //        	 $olympiad_user_slot_details = $this->base_model->run_query("select * FROM  quizsubscriptions where user_id='".$userid."' AND  from_date='".$from_date."' AND to_date='".$to_date."' AND exam_level='".$exam_level."' AND exam_slot='".$slot_time."'");

						// if(count($olympiad_user_slot_details)==0)
						// {   

		      		// $this->base_model->insert_operation_id('quizsubscriptions', $insertData);
		      		// }           			         		
            			
					  		# code...
					  		redirect('crest/cisro_payment_razorpay/razorpay');

					  	//}
						
						$this->session->set_flashdata('success_message', 'Thanks! We\'ll contact you soon.');
					} else {

						$this->session->set_flashdata('error_message', 'It seems some problem has occured, Please contact us at '.$this->config->item('support_phone'),1);
					}


			$this->data['cisro_exam_level'] = $cisro_exam_level;
			$this->data['cisro_practice_slot'] = $cisro_practice_slot;

			$this->data['title'] = "CREST Inter-school Reasoning Olympiad (CISRO) – Registation Started";
			$this->data['meta_description'] = "CREST Inter-school Reasoning Olympiad (CISRO) – Registation Started. Exam is scheduled on 5th Dec 2019. Know how to participate in CISRO, syllabus, ranking criteria, awards, exam fees, exam dates & more.";

			$this->data['content'] = "general/cisro_inter_school";
			$this->_render_page('templates/template', $this->data);

	
	}

	//Payment Process
    function cisro_payment_razorpay($param1) {
    	
     
        $this->load->model('base_model');

    
        $subscription_info['user_id'] = $this->session->userdata('user_id');
       
        $price = $this->session->userdata('amount');
      
        date_default_timezone_set("Asia/Kolkata");
        
        $subscription_info['status'] = 'Active';
        $subscription_info['dateofsubscription'] = date('Y-m-d H:i:s');
     
        if($param1 == "razorpay"){
        
            $amount = $price;
            if (1) {
               
                $config['return'] = $returnUrl = base_url() . 'crest/cisro_payment_success';
                $config['cancel_return'] = $cancelUrl = base_url() . 'crest/cisro_payment_cancel';
               
                $coupon_discount = '';
               
                $amount = (float) $price;
               
                $user_id = $this->session->userdata('user_id');
                $result = $this->base_model->run_query("select id, username,home_address,city,state,pincode,country,phone,email FROM  interschool_users where id=" . $user_id);
                
                $merchant_data = '';
                $order_id = $this->generateRandomString($user_id);
                $this->session->set_userdata('txn_id', $order_id);
               
                $data['return_url'] = site_url().'razorpay/cisro_callback';
                $data['surl'] = site_url().'razorpay/success';
                $data['url'] = site_url().'razorpay/failed';
                $data['currency_code'] = 'INR';

                $data['productinfo'] = $this->session->userdata('subjects');
                $data['txnid'] =  $order_id;
                $data['surl'] = site_url().'razorpay/success';
                $data['furl'] = site_url().'razorpay/failed';        
                $data['key_id'] = RAZOR_KEY_ID;
                $data['currency_code'] = 'INR';            
                $data['total'] = ($amount * 100); 
                $data['amount'] = $amount;
                $data['merchant_order_id'] = $result[0]->id;
                $data['card_holder_name'] = $result[0]->username;
                $data['email'] = $result[0]->email;
                //$data['phone'] = $result[0]->phone;
                $data['phone'] = '';
                $data['name'] = 'CREST Olympiads';
                $data['return_url'] = site_url().'razorpay/cisro_callback';



                $this->data['content'] = 'razorpay/checkout';
                $this->load->view('razorpay/checkout', $data);

            } else {
                $this->prepare_flashmessage("Please contact admin for this payment gateway", 1);
              
                redirect('cisro_payment_success/', 'refresh');
            }
        }
        // $this->prepare_flashmessage("Invalid request", 1);
        // redirect('registration', 'refresh');
    }
    //Payment Success
    function cisro_payment_success() {

	    $response = $this->session->flashdata('transaction_details'); 
        if (empty($response)) {
            $this->prepare_flashmessage(
                    "Payment unsuccessful, We're sorry, but we are not able to process your payment due to system error.", 0);
            redirect('crest/payment_error/');
        }
        date_default_timezone_set("Asia/Kolkata");
                
       
        $error_code = $response['error_code'];
        $order_status_message = '';
        if (empty($error_code)) {
            $order_status="Success";
            $order_status_message = " Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";
        } 
       
         else {
            $order_status_message = "Security Error. Illegal access detected";
        }

        if(!empty($response['card']))
        {
            $payment_mode="card";
        }
        else if (!empty($response['bank'])) {
            # code...
             $payment_mode="bank";
        }
        else if (!empty($response['wallet'])) {
            $payment_mode="wallet";
        }
        else if (!empty($response['vpa'])) {
            $payment_mode="vpa";
        }
        else
        {
            $payment_mode="";
        }

         $this->load->model('base_model');
                $userId = $this->session->userdata('user_id');
                $result = $this->base_model->run_query("select username,home_address,phone,email,city,state,country,pincode FROM  interschool_users where id=" . $userId);


        $ccAvenueResponse = array(
            'cc_order_id' => isset($response['id']) ? $response['id'] : '',
            'cc_tracking_id' => isset($response['id']) ? $response['id'] : '',
            'cc_bank_ref_no' => isset($response['card']['id']) ? $response['card']['id']: '',
            'cc_order_status' => isset($order_status) ? $order_status : '',
            'cc_failure_message' => isset($response['error_description']) ? $response['error_description'] : '',
            'cc_payment_mode' => isset($payment_mode) ? $payment_mode : '',
            'cc_card_name' => isset($response['card']['network']) ? $response['card']['network'] : '',
             'cc_status_code' => isset($response['captured']) ? $response['captured'] : '',
            'cc_status_message' => isset($response['status']) ? $response['status'] : '',
            'cc_amount' => isset($response['amount']) ? $response['amount']/100 : '',
             'cc_billing_name' => isset($result[0]->username) ? $result[0]->username : '',
            'cc_billing_address' => isset($result[0]->home_address) ? $result[0]->home_address : '',
            'cc_billing_city' => isset($result[0]->city) ? $result[0]->city : '',
            'cc_billing_state' => isset($result[0]->state) ? $result[0]->state : '',
            'cc_billing_zip' => isset($result[0]->pincode) ? $result[0]->pincode : '',
            'cc_billing_country' => isset($result[0]->country) ? $result[0]->country : '',
            'cc_billing_tel' => isset($response['contact']) ? $response['contact'] : '',
            'cc_billing_email' => isset($response['email']) ? $response['email'] : '',
            'cc_offer_type' => isset($response['offer_type']) ? $response['offer_type'] : '',
            'cc_offer_code' => isset($response['offer_code']) ? $response['offer_code'] : '',
            'cc_discount_value' => isset($response['discount_value']) ? $response['discount_value'] : '',
            'cc_mer_amount' => isset($response['amount']) ? $response['amount']/100 : '',
            'cc_response_code' => isset($response['response_code']) ? $response['response_code'] : '',
            'cc_order_status_message' => $order_status_message
        );
        $olympiadTransactionId = $this->session->userdata('txn_id');
      
        $user_id = $this->session->userdata('user_id');
        $subjects =  $this->session->userdata('subjects');
      
        $this->load->model('base_model');
        $query = "SELECT * FROM `interschool_users` WHERE `id`='" . $user_id . "'";
        // echo $query;
        // exit();
        $usr_info_arr = $this->db->query($query)->row_array();
        $this_user = $this->db->query($query)->row();
       
        $subscriptioninfo = array();
        $subscriptioninfo = $this->session->userdata('subscription_data');
        $subscriptioninfo['transaction_id'] = $olympiadTransactionId;
        $subscriptioninfo['payer_id'] = $user_id;
        $subscriptioninfo['payer_email'] = $usr_info_arr['email'];
        $subscriptioninfo['payer_name'] = $usr_info_arr['username'];
        $subscriptioninfo['user_id'] = $user_id;
        $subscriptioninfo['subjects'] = $subjects;
        

        $transaction_id1 = $subscriptioninfo['transaction_id'];
        $payer_id1 = $subscriptioninfo['user_id'];
        $payer_email1 = $subscriptioninfo['payer_email'];
        $payer_name1 = $subscriptioninfo['payer_name'];

        if ($order_status === "Success" || strtolower($order_status) == "success") {
            // $examname = $this->session->userdata('subscription_examname');
            $subscriptioninfo['status'] = 'Active';
            $subscriptioninfo['dateofsubscription'] = date('Y-m-d H:i:s');


	        $mailParams = array('this_user' => $this_user);
	    	$this->load->model('Emails_model');
    		if(!$this->Emails_model->sendPaymentSuccessMailCisro($usr_info_arr['email'], $mailParams)) {
	    	
	    	}

            
            $userId = $this->session->userdata('user_id');
            
            $this->load->model('base_model');
            // $res = $this->base_model->insert_operation($subscriptioninfo, 'payments');
            $res = $this->base_model->insert_operation('interschool_payments', $subscriptioninfo);
            
           
            $this->session->set_userdata('payment_response', 'true');
          
            $table = $this->db->dbprefix('interschool_payments');
            $where['transaction_id'] = $olympiadTransactionId;
            $this->base_model->update_operation($ccAvenueResponse, $table, $where);
            /*             * ************************ */
            $this->prepare_flashmessage(
                    "Payment has been received Successfully.", 0
            );
            
            redirect('crest/cisro_paymentconfirmation/');
        } else {
            $ccAvenueResponse['transaction_id'] = $subscriptioninfo['transaction_id'];
            $ccAvenueResponse['payer_id'] = $subscriptioninfo['payer_id'];
            $ccAvenueResponse['payer_email'] = $subscriptioninfo['payer_email'];
            $ccAvenueResponse['payer_name'] = $subscriptioninfo['payer_name'];
            $ccAvenueResponse['user_id'] = $subscriptioninfo['user_id'];
            /* Insert CC Avenue response */
            $this->load->model('base_model');
            // $this->base_model->insert_operation($ccAvenueResponse, 'payments');
            $this->base_model->insert_operation('interschool_payments',$ccAvenueResponse);
            /*             * ****************************** */
            redirect('crest/cisro_payment_error/');
        }
    }
    
    function cisro_paymentconfirmation() {
      
        $payment_conf = $this->session->userdata('payment_response');
        $txn_id = $this->session->userdata('txn_id');
        if(isset($txn_id) && isset($payment_conf)){
        	if($payment_conf != 'true'){
        		redirect(base_url());
        	}
        	$data['id'] = $this->session->userdata('user_id');
	    	$res = $this->base_model->fetch_records_from('interschool_users',$data);
	        $this->data['this_user'] = $res[0];
	        $this->data['txn_id'] = $this->session->userdata('txn_id');
	        $this->session->unset_userdata('txn_id');
	        $this->session->unset_userdata('payment_response');
	        // $this->data['']
	        // redirect('successful_registration');

	        $table = $this->db->dbprefix('interschool_users');

        	$updateStatus=  array('referral_code_status' => 1);
            //$where['id'] = $this->session->userdata('user_id');
            $where['group_id'] = $this->session->userdata('group_id');
            $this->base_model->update_operation($updateStatus, $table, $where);

            //$referrer_id = $this->session->userdata('referrer_id');

            $subjects=$this->session->userdata('subjects');
			$amount=$this->session->userdata('amount');

			//$subjects=rtrim($subjects,',');

			$UserIds=$this->session->userdata('user_ids');

			if(count($UserIds)==4) {

    			// $this->session->set_userdata('user_id', $intLastInsertId1);
    			// $this->session->set_userdata('group_id', $group_id);

    			// Slot booking for all 4 Users		             

           	 $exam="cisro";

           	 $class=$this->session->userdata('user_class');

           	 $practice_exam_date=$this->session->userdata('practice_date'); 

           	 $preliminary_exam_date=$this->session->userdata('preliminary_date'); 

           	 $practice_exam_level="Practice Round";		           	 		

           	$practice_slot_time=$this->session->userdata('practice_slot');

           	$preliminary_slot_time=$this->session->userdata('preliminary_slot');

           	$practice_hours_time = substr($practice_slot_time,0,2);

           	$practice_mins_time = substr($practice_slot_time,-2);
           

           	$practice_to_time=	$practice_hours_time+2;

           	$practice_from_date=$practice_exam_date." ".$practice_hours_time.":".$practice_mins_time.":00";
           	$practice_to_date=$practice_exam_date." ".$practice_to_time.":".$practice_mins_time.":00";

           	$preliminary_hours_time = substr($preliminary_slot_time,0,2);

           	$preliminary_mins_time = substr($preliminary_slot_time,-2);

           	 $preliminary_exam_level="Preliminary Round";	
           

           	$preliminary_to_time=	$preliminary_hours_time+2;

           	$preliminary_from_date=$preliminary_exam_date." ".$preliminary_hours_time.":".$preliminary_mins_time.":00";
           	$preliminary_to_date=$preliminary_exam_date." ".$preliminary_to_time.":".$preliminary_mins_time.":00";

           		$booked_date=date('Y-m-d H:i:s');

           		for($i=0;$i<count($UserIds);$i++)
           		{
				$practiceinsertData = array('user_id' => $UserIds[$i],'user_class' => $class, 'from_date' => $practice_from_date,'to_date' => 	$practice_to_date,'exam_name' => $exam,'exam_level' => $practice_exam_level,'exam_slot' => $practice_slot_time,'slot_booked_date' => $booked_date,'exam_status' => 1);						
				
				$preliminaryinsertData = array('user_id' => $UserIds[$i],'user_class' => $class, 'from_date' => $preliminary_from_date,'to_date' => 	$preliminary_to_date,'exam_name' => $exam,'exam_level' => $preliminary_exam_level,'exam_slot' => $preliminary_slot_time,'slot_booked_date' => $booked_date,'exam_status' => 1);

				$this->base_model->insert_operation_id('interschool_quizsubscriptions', $practiceinsertData);
				$this->base_model->insert_operation_id('interschool_quizsubscriptions', $preliminaryinsertData);
				}
			}

			 $this->session->unset_userdata('group_id');
			 $this->session->unset_userdata('practice_date');
			 $this->session->unset_userdata('preliminary_date');
			 $this->session->unset_userdata('practice_slot');
			 $this->session->unset_userdata('preliminary_slot');
			 $this->session->unset_userdata('user_ids');
			 $this->session->unset_userdata('user_class');


   

			//$this->data['referral_code'] = $res[0]->referral_code;

			$this->session->set_flashdata('cisro_success_message', 'Your team has been registered successfully for CISRO!');
      		// }

      			//redirect('crest/access', 'refresh');

      			redirect('crest/cisro_inter_school');



	        //$this->data['content'] = 'buy/success_registration';
        }else{
        	redirect(base_url());
        }
        // $route['my-photos'] = "user/myphotos";

        // $this->layout();
		$this->_render_page('templates/template', $this->data);

        // $this->_render_page('temp/usertemplate');
    }
    function cisro_payment_error() {
        // $this->data['content'] = 'user/payment/error';
        $this->prepare_flashmessage("Payment Error", 1);

        $this->data['errorMessage'] = $this->session->userdata('txn_id');
        $this->session->unset_userdata('txn_id');
        // redirect('failed_registration');
        $data['id'] = $this->session->userdata('user_id');
    	$res = $this->base_model->fetch_records_from('interschools_users',$data);
        $this->data['this_user'] = $res[0];
        $this->data['content'] = 'buy/failed_registration';
		$this->_render_page('templates/template', $this->data);

        // $this->content = 'auth/my-photos';
        // $this->layout();
        // $this->_render_page('temp/usertemplate');
    }
    //Payment Cancel
    function cisro_payment_cancel() {

        $data['id'] = $this->session->userdata('user_id');
    	$res = $this->base_model->fetch_records_from('interschool_users',$data);
        $this->data['this_user'] = $res[0];
        $this->prepare_flashmessage("Payment Cancelled", 1);
     
        $this->session->unset_userdata('txn_id');
        // $this->session->unset_userdata('discount_amount');
        $this->session->set_userdata('payment_response', 'false');

        $this->data['content'] = 'buy/payment_cancelled';
		$this->_render_page('templates/template', $this->data);
        
    }

    //payment function ends ------------------------------------------------------------



    public function generateRandomString($user_id, $length = 10) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = $user_id;
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function encrypt($plainText, $key) {

        $key = $this->hextobin(md5($key));
        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $openMode = openssl_encrypt($plainText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
        $encryptedText = bin2hex($openMode);
        return $encryptedText;
    }
    public function decrypt($encryptedText, $key) {

        $key = $this->hextobin(md5($key));
        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $encryptedText = $this->hextobin($encryptedText);
        $decryptedText = openssl_decrypt($encryptedText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
        return $decryptedText;
    }

    //********** Hexadecimal to Binary function for php 4.0 version ********
    public function hextobin($hexString) {
        $length = strlen($hexString); 
        $binString="";   
        $count=0; 
        while($count<$length) 
        {       
            $subString =substr($hexString,$count,2);           
            $packedString = pack("H*",$subString); 
            if ($count==0)
        {
            $binString=$packedString;
        } 
            
        else 
        {
            $binString.=$packedString;
        } 
            
        $count+=2; 
        } 
        return $binString; 
    }

public function download_instruction()
  { 
	  $this->data['content'] = 'general/downloadable-instruction';
		$this->_render_page('templates/template', $this->data);
		 
		 	
  }

}
