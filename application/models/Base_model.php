<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Base_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }


    //General database operations
    function run_query($query)
    {
        return ($this->db->query($query)->result());
    }

    public function get_details($table)
    {
        $query = $this->db->get($table);
        return $query->result_array();
    }

    // function get_categories(){

    //     $this->db->select('*');
    //     $this->db->from($this->db->dbprefix('categories'));

    //     $query = $this->db->get();

    //     $result = $query->result();

    //     return $result;
    // }


    // function get_products(){
        
    //     $this->db->select('*');
    //     $this->db->from($this->db->dbprefix('products'));

    //     $query = $this->db->get();

    //     $result = $query->result();

    //     return $result;
    // }

    // function get_users(){
        
    //     $this->db->select('*');
    //     $this->db->from($this->db->dbprefix('users'));

    //     $query = $this->db->get();

    //     $result = $query->result();

    //     return $result;
    // }

    // function getMaxId($TableName, $ColName)
    // {
    //     $query = $this->db->query(
    //         "select max(" . $ColName . ") as Id from "
    //         . $this->db->dbprefix($TableName)
    //     )->result();
    //     return $query[0]->Id;
    // }

    function insert_operation($table, $inputdata)
    {
       //echo "<pre>";print_r($table);
        //echo "<pre>";print_r($this->db->dbprefix($table),$inputdata);die;
        //echo "MMM<pre>";print_r($inputdata);die;
        if ($this->db->insert($this->db->dbprefix($table), $inputdata)){
            //die('yes');
            return 1;}
        else{
            //die('no');
            return 0;}
    }

    function insert_operation_id($table, $inputdata)
    {
        $result = $this->db->insert($this->db->dbprefix($table), $inputdata);

      //  print_r($result);die; 
    /*  $str = $this->db->last_query();

   

    echo "<pre>";

    print_r($str);

    exit;
*/        return $this->db->insert_id();
    }

    function update_operation($inputdata, $table, $where)
    {
        $result = $this->db->update(
            $this->db->dbprefix($table),
            $inputdata,
            $where
        );
        return $result;
    }

    function fetch_single_column_value($table, $column, $where = '')
    {
        $this->db->select($column, FALSE);
        $this->db->from($this->db->dbprefix($table));

        if (!empty($where))
            $this->db->where($where);
        $result_rs = $this->db->get();
        $result = $result_rs->result();
        if (count($result) > 0)
            $ret = $result[0]->$column;
        else
            $ret = '-';
        return $ret;
    }

    function fetch_records_from(
        $table,
        $condition = '',
        $select = '*',
        $order_by = '',
        $limit = ''
    )
    {
        $this->db->select($select, FALSE);
        $this->db->from($this->db->dbprefix($table));
        if (!empty($condition))
            $this->db->where($condition);
        if (!empty($order_by))
            $this->db->order_by($order_by);
        if (!empty($limit))
            $this->db->limit($limit);
        //die('fdfddf');
        $result = $this->db->get();
        //echo $result;exit;

        return $result->result();
    }

    // function changestatus($table, $inputdata, $where)
    // {
    //     $result = $this->db->update($this->db->dbprefix($table), $inputdata, $where);
    //     return $result;
    // }

    function delete_record($table, $where)
    {
        $result = $this->db->delete($table, $where);
        return $result;
    }

    // function check_duplicate($table_name, $cond, $cond_val)
    // {
    //     $col_name = '*';
    //     $this->db->where(array($cond => $cond_val));
    //     $this->db->from($this->db->dbprefix($table_name));
    //     $query = $this->db->get();
    //     $rows = $query->num_rows();
    //     if ($rows > 0) {
    //         return TRUE;
    //     } else {
    //         return FALSE;
    //     }
    // }

    // function check_duplicates($table_name, $conditions)
    // {
    //     $col_name = '*';
    //     $this->db->where($conditions);
    //     $this->db->from($this->db->dbprefix($table_name));
    //     $query = $this->db->get();
    //     $rows = $query->num_rows();
    //     if ($rows > 0) {
    //         return TRUE;
    //     } else {
    //         return FALSE;
    //     }
    // }

    

    function get_single_column_value($column_name, $table, $condition)
    {
        $this->db->select($column_name);
        $this->db->from($table);
        $this->db->where($condition);
        return $this->db->get()->row()->$column_name;
    }

    // function delete_category_assoc($catid){

    //     $where['catid'] = $catid;

    //     $query = $this->db->query("SELECT quizid FROM ".$this->db->dbprefix('quiz')." WHERE catid='$catid'");
    //     $quiz_ids = $query->result();

    //     foreach($quiz_ids as $rec){

    //         $quiz_id = $rec->quizid;
    //         $this->delete_quiz($quiz_id);
    //     }

    //     $this->db->where($where);
    //     $this->db->delete($this->db->dbprefix('subcategories'));
    // }

    // function delete_subcategory_assoc($subcatid){

    //     $where['subcatid'] = $subcatid;

    //     $query = $this->db->query("SELECT quizid FROM ".$this->db->dbprefix('quiz')." WHERE subcatid='$subcatid'");
    //     $quiz_ids = $query->result();

    //     foreach($quiz_ids as $rec){
    //         $quiz_id = $rec->quizid;
    //         $this->delete_quiz($quiz_id);
    //     }
    // }


    function get_product_status($product_id){

        $this->db->select('status');
        $this->db->from($this->db->dbprefix('products'));
        $this->db->where('id', $product_id);

        $query = $this->db->get();
        $record = $query->row();

        if($record->status == 'Active'){
            return true;
        } else if($record->status == 'Inactive'){
            return false;
        }
    }
    function get_category_status($cat_id){

        $this->db->select('status');
        $this->db->from($this->db->dbprefix('categories'));
        $this->db->where('catid', $cat_id);

        $query = $this->db->get();
        $record = $query->row();
        return  $record->status;
        if($record->status == 'Active'){
            return true;
        } else if($record->status == 'Inactive'){
            return false;
        }
    }
}
/* End of file base_model.php */
/* Location: ./application/models/base_model.php */