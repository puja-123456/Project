<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Breaktime extends MY_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model('base_model');

    }

    function sample_questions(){

        $slug = '';
        $slug = $this->uri->segment(1);
        // $mainslug = $this->uri->segment(1);
        
        $title_of_pic = false;
        
        $slug_array = explode('-', $slug);
        $cat = strtoupper($slug_array[0]);
        // if($slug_array[1] != 'examples' || $slug_array[1] != 'class'){
        //     redirect(base_url());
        // }
        if ($slug != '' && $slug_array[1] != 'examples') {

            $id = $slug;
            $picture_arr = $this->db->query("SELECT * FROM `image_questions` WHERE `slug`='" . $id . "' and `category` = '".$cat."'")->row_array();
            if (!$picture_arr){
                // redirect('superminds', 'refresh');
            }

            $next_picture_slug = $prev_picture_slug = '0';
            
            if($picture_arr['id'] < 53){
                $next_picture_id = $picture_arr['id']+1;
                $next_picture = $this->db->query("SELECT * FROM `image_questions` WHERE `id`='" . $next_picture_id . "'")->row_array();
                $next_picture_slug = $next_picture['slug'];
            }

            if($picture_arr['id'] > 21){
                $prev_picture_id = $picture_arr['id']-1;
                $prev_picture = $this->db->query("SELECT * FROM `image_questions` WHERE `id`='" . $prev_picture_id . "'")->row_array();
                $prev_picture_slug = $prev_picture['slug'];
            }

            // echo $prev_picture_slug.$next_picture_slug;
            // exit;

            $image_href     = base_url() . 'assets/images/compressed/sample_questions/'.$picture_arr['image'];
            $data_text      = $picture_arr['title'];
            $image_alt      = $picture_arr['alt'];
            //$data_text = "Amazing Facts which will blow your mind!";
            $fb_share_link       = "https://www.facebook.com/sharer/sharer.php?u=".urlencode(base_url().$id)."&amp;src=sdkpreparse";
            $fb_comment_box_link = base_url().$id;

            $this->data['image_alt'] = $image_alt;
            $this->data['slug'] = $id;
            $this->data['data_text'] = $data_text;
            $this->data['og_image_url'] = $this->data['image_href'] = $image_href;
            $this->data['whatsapp_url'] = $fb_comment_box_link;
            $this->data['fb_share_link'] = $fb_share_link;
            $this->data['fb_comment_box_link'] = $fb_comment_box_link ;
            
            $this->data['next_picture_slug'] = $next_picture_slug;
            $this->data['prev_picture_slug'] = $prev_picture_slug;


            $this->data['title'] = $picture_arr['title'];
            $this->data['meta_description'] = $picture_arr['description'];    
            $title_of_pic = true;
        // var_dump($id);
        // exit();
            
        }
        $cat_where['category'] = strtoupper($cat);

        $all_pictures    = $this->base_model->fetch_records_from('image_questions',$cat_where);
        // $all_pictures    = $this->base_model->query("SELECT * FROM `image_questions` WHERE `category`='".$cat."'")->result();
        $this->data['all_pictures'] = $all_pictures;
        if($title_of_pic == false){
            $this->data['og_image_url'] = base_url() . 'assets/images/original/'.$cat.'-banner.jpg';
            $this->data['title'] = 'Important Questions and Examples';
            $this->data['meta_description'] = 'Super Mind puzzles for your child can be found here';
        }
        
        $this->data['content'] = "breaktime/sample_questions";
        $this->_render_page('templates/template', $this->data);
        // $this->_render_page('temp/template', $this->data);
    }
    


    function games(){
        $this->data['title'] = 'Logical Games and Puzzles';
        $this->data['meta_description'] = 'Games and puzzles for your child can be found here';

        $this->data['content'] = "breaktime/games";

        // $this->_render_page('temp/template', $this->data);
        $this->_render_page('templates/template', $this->data);

    }
    

    function amazing_facts(){

        
        // $all_pictures    = $this->db->query("SELECT * FROM `breaktime_images` WHERE `category`='facts'");
        // $this->data['all_pictures'] = $all_pictures;

        $slug = '';
        $slug = $this->uri->segment(2);
            $title_of_pic = false;

        
        if ($slug != '') {

            $id = $slug;
            $picture_arr = $this->db->query("SELECT * FROM `breaktime_images` WHERE `slug`='" . $id . "'")->row_array();
            if (!$picture_arr){
                redirect('amazing_facts', 'refresh');
            }

            $next_picture_slug = $prev_picture_slug = '0';
            
            if($picture_arr['id'] < 20){
                $next_picture_id = $picture_arr['id']+1;
                $next_picture = $this->db->query("SELECT * FROM `breaktime_images` WHERE `id`='" . $next_picture_id . "'")->row_array();
                $next_picture_slug = $next_picture['slug'];
            }


            if($picture_arr['id'] > 1){
                $prev_picture_id = $picture_arr['id']-1;
                $prev_picture = $this->db->query("SELECT * FROM `breaktime_images` WHERE `id`='" . $prev_picture_id . "'")->row_array();
                $prev_picture_slug = $prev_picture['slug'];
            }

            $image_href     = base_url() . 'assets/games/amazing-facts/'.$picture_arr['image'];
            $data_text      = $picture_arr['title'];
            $image_alt      = $picture_arr['alt'];
            
            $fb_share_link       = "https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.olympiadsuccess.in%2Famazing-facts%2F".$id."&amp;src=sdkpreparse";
            $fb_comment_box_link = base_url() . 'amazing_facts/'.$id;

            $this->data = array('image_alt' => $image_alt,'slug' => $id,'data_text' => $data_text, 'image_href' => $image_href, 'whatsapp_url' => $fb_comment_box_link, 'fb_share_link' => $fb_share_link, 'fb_comment_box_link' => $fb_comment_box_link );
            
            $this->data['next_picture_slug'] = $next_picture_slug;
            $this->data['prev_picture_slug'] = $prev_picture_slug;
            $this->data['title'] = $picture_arr['title'];
            $this->data['meta_description'] = $picture_arr['description'];  
            $title_of_pic = true;
            
        }
        $all_pictures    = $this->db->query("SELECT * FROM `breaktime_images` WHERE `category`='facts'");
        $this->data['all_pictures'] = $all_pictures;
         if($title_of_pic == false){        
        $this->data['title'] = 'Top 20 Amazing Facts which will blow your mind!';
        $this->data['meta_description'] = 'Top 20 Astonishing facts for everybody to read';
             }
       

        $this->data['content'] = "breaktime/facts";
        $this->_render_page('temp/template', $this->data);        
    }
    
    public function currentaffairs(){

        $this->data['title'] = 'Current Affairs for IGKO, SKGKO, HGO and IGO Olympiad Exams!';
        $this->data['meta_description'] = 'Current Affairs for IGKO, SKGKO, HGO and IGO Olympiad Exams';

        $this->data['content'] = "breaktime/current-affairs";
        $this->_render_page('temp/template', $this->data);  

    }

    public function eventz(){

        $slug = '';
        $slug = $this->uri->segment(1);

        if($slug == 'diwali-celebrations'){
            $this->data['title'] = 'Celebrations with Olympiad Success!';
            $this->data['celebration_title'] = 'Diwali with Olympiad Success!';
            $this->data['meta_description'] = '';
            $this->data['page_to_view'] = 'breaktime/diwali';
        }
        else if($slug == 'holi-celebrations'){
            $this->data['title'] = 'Celebrations with Olympiad Success!';
            $this->data['celebration_title'] = 'Holi with Olympiad Success!';
            $this->data['meta_description'] = '';
            $this->data['page_to_view'] = 'breaktime/holi';
        }
        else if($slug == 'celebration-time'){
            redirect('holi-celebrations');
        }
        else{
            redirect(base_url());
        }

        $this->data['content'] = "breaktime/celebration";
        $this->_render_page('temp/template', $this->data);  
    } 

}

?>