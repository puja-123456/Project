<?php

class Examination extends CI_Model
{

    function getExamResult($intExaminationId) {
        $sql = " SELECT * FROM user_quiz_results_history WHERE id = " . $intExaminationId;
        return $this->db->query($sql)->result_array();
        
    }
    
    function getAllQuestionsOfExam($intExaminationId) {
        $sql = " SELECT q.*, uqr.* FROM user_quiz_report uqr INNER JOIN questions q ON uqr.question_id  = q.questionid "
                . "  WHERE examination_id = " . $intExaminationId;
        
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
    
}
