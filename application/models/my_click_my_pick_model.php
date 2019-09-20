<?php

class My_click_my_pick_model extends CI_Model
{

    public $strCondition = '';
    public $objDb = null;
    
    public function __construct() {
        $this->objDb = $this->load->database('my_click_my_pick', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.
    }
    
    
    public function getCmsPages() {
        
        
        $sql = "select * from cms_pages where 1 " ;
        
        if(!empty($this->strCondition)) {
            $sql .= $this->strCondition;
        }
       
        $result = $this->objDb->query($sql)->result_array();
       
        return $result;
    }
    
    public function updateCmsPage($data, $id) {
        $this->objDb->where(array('id' => $id));
        return $this->objDb->update('cms_pages', $data);
        //echo $this->output->enable_profiler(TRUE);exit;
    }
    
    
    

}