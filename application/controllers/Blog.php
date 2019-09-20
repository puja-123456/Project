<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Blog extends MY_Controller
{

	function __construct(){
		parent::__construct();
	}

	public function index() {
		
		$slug = '';
		$slug = $this->uri->segment(2);
		$slug = htmlspecialchars($slug);

		$this->load->helper('text');
		if ($slug != '') {
			$this->data['content'] = "blog/".$slug;
			if($slug == 'meet-maryam--the-only-female-to-get-greatest-honour-of-mathematics'){
				$this->data['title'] = 'Meet Maryam, the only female to get greatest honour of Mathematics - Blog Olympiad Success';
				$this->data['meta_description'] = 'Blog - Olympiad Success, Best online olympiad exam helper with guide, preparation tips and expert advice can also be found here';
			}
			else{
				redirect('welcome','refresh');
			}
		}
		else{
			redirect('welcome','refresh');
			// $this->data['content'] = "blog/index";
			// $this->data['title'] = 'Blog - Olympiad Success';
			// $this->data['meta_description'] = 'Olympiad Success Blog';
		}

		$this->_render_page('templates/template', $this->data);
	}

	public function articles(){
		
		$slug = $this->uri->segment(2);

		if(!$this->session->userdata('user_id')){
			$this->session->set_userdata( 'post_login_url', $this->uri->uri_string() );
		}else{
		 	$this->session->unset_userdata('post_login_url');
		}
		
		if($slug != ""){
			// $id = $this->input->post('id');
			$arr = array('slug' =>$slug);
	    	$article = $this->base_model->fetch_records_from('articles',$arr);
	    	
	    	if(!$article){
	    		redirect('blog');
	    	}
	    	// $this->update_view_counter('articles',$article[0]->id);

	    	
			
			$countofarticles = $this->base_model->fetch_records_from('articles');
			$this->data['article'] = (array) $article[0];
			$this->data['meta_title'] = $article[0]->meta_title;
			$this->data['meta_description'] =  $article[0]->meta_description;
			$this->data['title'] =  $article[0]->meta_title;
			$this->data['og_image_url'] =  base_url().'assets/images/articles/'.$article[0]->featured_image;

			$this_id = $article[0]->id;
			if($this_id > 1) {
				$prev_id = $this_id - 1;
				$p_arr = array('id' => $prev_id);
	    		$res = $this->base_model->fetch_records_from('articles',$p_arr);
	    		if($res)
					$this->data['prev_article'] = (array) $res[0];
			}

			if($this_id < count($countofarticles)){
				$next_id = $this_id + 1;
				$n_arr = array('id' => $next_id);
	    		$res = $this->base_model->fetch_records_from('articles',$n_arr);
				if($res)
					$this->data['next_article'] = (array) $res[0];
			}

			// var_dump($this->data['next_article']);
			// var_dump($this->data['prev_article']);
			// exit();

			$this->data['related_articles'] = $this->db->query("SELECT * FROM `articles` WHERE status = 'Active' ORDER BY rand() LIMIT 6")->result_array();
			

			$popup_articles = $this->db->query("SELECT * FROM `articles` WHERE status = 'Active' ORDER BY rand() desc LIMIT 9")->result_array();
			$this->data['popup_articles'] = $popup_articles;

			$this->data['active_menu'] = 'articles';
			$this->data['article_type'] = 'article';


			$this->data['content'] = "blog/article";
			$this->_render_page('templates/template', $this->data);
			// $this->_render_page('templates/english_template', $this->data);
			// $this->_render_page('templates/hr_template', $this->data);
		}
		else{

			$this->data['meta_title'] = 'CREST Olympiads Blog';
			$this->data['meta_description'] = 'Read CREST Olympiads blog';
			$this->data['title'] = 'CREST Olympiads Blog';
			$this->data['active_menu'] = 'articles';
			
			
			$popup_articles = $this->db->query("SELECT * FROM `articles` WHERE status = 'Active' ORDER BY rand() desc LIMIT 9")->result_array();
			$this->data['popup_articles'] = $popup_articles;
			
			$all_articles = $this->db->query("SELECT * FROM `articles` where status='Active' ")->result_array();
			$this->data['all_articles'] = $all_articles;
			// var_dump($all_articles);
			// exit();
			$this->data['content'] = "blog/articles";
			$this->_render_page('templates/template', $this->data);
			// $this->_render_page('templates/english_template', $this->data);
			// redirect('articles');
		}
	}



   /* public function article_rating(){
        if($this->input->post()){
            // $where['id'] =  $this->input->post('id');
            $inputdata['article_type'] = $where['article_type'] =  $this->input->post('article_type');
            $inputdata['article_id'] = $where['article_id'] =  $this->input->post('article_id');
            $inputdata['portal'] = $where['portal'] = $this->config->item('this_portal_name');
            $comment = $this->input->post('comment');
            $inputdata['comment'] = htmlentities(htmlspecialchars($comment));
            $inputdata['ip_address'] = $_SERVER['REMOTE_ADDR'];

            // $article_rating = $this->base_model->fetch_single_column_value('article_ratings','*',$where);

            $thumbs_up = $this->input->post('thumbs_up');
            $thumbs_down = $this->input->post('thumbs_down');
            // if(strlen($comment) < 2){
            //     echo json_encode("no_comment");
            //     die();
            // }
            
            if($thumbs_up == "1"){
                $inputdata['thumbs_up'] = 1;
            }else if($thumbs_down == "1"){
                $inputdata['thumbs_down'] = 1;
            }
            $result = $this->base_model->insert_operation($inputdata, 'article_ratings');

            if($result == 1){
                echo json_encode("success");
                die();
            }
        }
    }*/
}
?>