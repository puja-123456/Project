<?php

class Quiz extends CI_Model {
    
    public function getQuiz($intQuizId) {
        $sql = " SELECT * FROM quiz "
                . "  WHERE quizid = " . $intQuizId ;
        return $this->db->query($sql)->result_array();
    }
    
    public function getValidity($intQuizId) {
        $sql = " SELECT quiztype, validitytype, validityvalue FROM quiz "
                . "  WHERE quizid = " . $intQuizId ;
        
      
        return $this->db->query($sql)->result_array();
    }
    
    function updateMaxScore($intQuizId, $score) {

        $sql = " SELECT highest_score FROM question_assign WHERE quiz_id = " . $intQuizId;

        $result = $this->db->query($sql)->result_array();

        if (count($result) > 0) {
            if ($result[0]['highest_score'] <= $score) {
                //$percentile = round( (  ($score / $result[0]['highest_score']) * 100 ) ,2 ) ;
                $sql = " UPDATE question_assign SET  "
                        . " highest_score = " . $score . " WHERE quiz_id = " . $intQuizId;

                $this->db->query($sql);
            }

        }
    }
    
    
    function getHighestScore($intQuizId) {
        $sql = " SELECT highest_score FROM question_assign WHERE quiz_id = " . $intQuizId;
        $result = $this->db->query($sql)->result_array();
        if (count($result) > 0) {
            return $result[0]['highest_score'];
        }
        return '';
    }
    
    function getDefaultHighestScore($intQuizId) {
        $sql = " SELECT highest_score FROM question_assign WHERE "
                . "  quiz_id = " . $intQuizId;
        $result = $this->db->query($sql)->result_array();

        if (count($result) > 0) {
            return $result[0]['highest_score'];
        }
        return 0;
    }
    
    function updatePercentile($quiz_result_id) {

        $sql = " SELECT quiz_id, score FROM user_quiz_results_history WHERE id = " . $quiz_result_id;

        $result = $this->db->query($sql)->result_array();

        if (count($result) > 0) {
            $defaultHighestScore = $this->getDefaultHighestScore($result[0]['quiz_id']);
            $score = $result[0]['score'];

            if (!empty($defaultHighestScore)) {
                $percentile = round(( ($score / $defaultHighestScore) * 100), 2);
            } else {
                $percentile = 0;
            }

            $update = " UPDATE user_quiz_results_history SET percentile = " . $percentile . " WHERE "
                    . " id = " . $quiz_result_id;
            $this->db->query($update);
        }
    }
    
    
    
    
    public function getTesttUrl($intQuizId) {
        
        $sql = " SELECT slug FROM quiz "
                . "  WHERE quizid = " . $intQuizId ;
        $result = $this->db->query($sql)->result_array();
        
        $testUrl = '';
        if(count($result) > 0 ) {
            $testUrl = $result[0]['slug'];
        }
        
        return $testUrl;
      
    }
    
    public function getQuizScore($intQuizId) {
        $sql = " SELECT score FROM user_quiz_results_history WHERE quiz_id = " . $intQuizId;
        return $this->db->query($sql)->result_array();
    }
    
    public function getMedian($intQuizId) {
        $response = $this->getQuizScore($intQuizId);
        $arrScores = array();
        if(count($response) > 0 ) {
            foreach($response as $row) {
                $arrScores[] = $row['score'];
            }
        }
        $this->load->helper('general');
        return calculate_median($arrScores);
    }
    
    
    public function getCorrectAnswer($intQuestionId) {
        
        $sql = " SELECT correctanswer,section_marks FROM questions where questionid = " . $intQuestionId;
        $result = $this->db->query($sql)->result_array();
        
        if(count($result) > 0 ) {
            //return $result[0]['correctanswer'];
            return $result[0];
        }
        
        return '';
    }
    
    public function getMappedClasses($classId) {
        $sql = " SELECT id, mapped_class_ids FROM mapped_classes where class_id = " . $classId;
        $result = $this->db->query($sql)->result_array();
        
        if(count($result) > 0 ) {
            $mapped_class_ids = $result[0]['mapped_class_ids'];
            return explode(",",$mapped_class_ids);
        }
        
        return array();
        
    }
    
    public function synchronizeQuizes() {
        
        $sql = ' UPDATE mapped_classes
                        SET mapped_class_ids = REPLACE(mapped_class_ids,"|",",")' ;
        //echo $sql;exit;
        $this->db->query($sql);
        
        
        $sql = " SELECT * FROM mapped_classes " ;
        $result = $this->db->query($sql)->result_array();
        
        if(count($result) > 0 ) {
            foreach($result as $row) {
                $class_id         = $row['class_id'];
                $arrMainClassWorksheets  = $this->getWorksheets($class_id);
                
                $mapped_class_ids = $row['mapped_class_ids'];
                
                $arrMappedClassIds = explode(",", $mapped_class_ids);
                
                if(count($arrMappedClassIds) > 0  ) {
                    
                    foreach($arrMappedClassIds as $newClassId) {
                        
                    $arrNewClassWorksheets = $this->getWorksheets($newClassId);
                    
                   /* echo "<pre>";
                    print_r($arrMainClassWorksheets);
                    
                      echo "<pre>";
                    print_r($arrNewClassWorksheets);
                    */
                    
                    
                    
                    
                    
                    $arrDifference = array_diff($arrMainClassWorksheets,$arrNewClassWorksheets);
                    
                    /* echo "<pre>";
                    print_r($arrDifference);
                    */
                  
                    
               
                    
                    
                    
                    if(count($arrDifference) >0 ) {
                        
                        while( list( $key, $value ) = each ( $arrDifference ) ) {

                            $Worksheet = $value;
                            $QuizId    = $key;
    
                            if(!$this->isWorksheetAssigned($newClassId, $Worksheet) ) {

                                $sql = " SELECT * FROM quiz WHERE quizid = ". $QuizId ;
                                $result = $this->db->query($sql)->result_array();
                               
                                $this->load->model('Category');
                                
                                if(count($result) > 0) {
                                    foreach($result  as $row) {
                                        
                                        
                                        $subCategorySlug = $this->Category->getShortCategoryNameByClassId($newClassId);
                                        
                                   
                                        $insert = array('quiztype' => $row['quiztype'], 'quiz_for' => $row['quiz_for'], 
                                            'validitytype' => $row['validitytype'],
                                            'validityvalue' => $row['validityvalue'], 'quizcost' => $row['quizcost'], 
                                            'name' => $row['name'], 'classid' => $newClassId, 
                                            'negativemarkstatus' => $row['negativemarkstatus'], 
                                            'difficultylevel' => $row['difficultylevel'],
                                            'hint' => $row['hint'],'status' => $row['status'], 
                                            'deauration' => $row['deauration'], 'userattempts' => $row['userattempts'], 
                                            'slug' => $subCategorySlug . $row['slug']);
                                        
                                     
                                        $this->db->insert('quiz', $insert);

                                        $intNewQuizId = $this->db->insert_id('quiz');
                                        
                                        if(!empty($intNewQuizId)) {

                                            $sqlAssign = " SELECT * FROM quiz where quizid = " .   

                                            $sql = " INSERT INTO question_assign (quiz_id, worksheet_id, display_id, duration) "
                                                    . "  SELECT " . $intNewQuizId.",'".$Worksheet."', display_id, duration from question_assign"
                                                    . "  WHERE quiz_id = " . $QuizId;

                                            $this->db->query($sql);
                                        }
                                    }
                                }
                            }  
                        }
                        
                        
                    }
                }
            }
        }
        }
        
        
        $sql = " UPDATE quiz INNER JOIN class ON quiz.classid = class.classid
                                SET    quiz.catid = class.catid,
                                       quiz.subcatid = class.subcatid " ;
        $this->db->query($sql);
    }
    
    
    function getQuizAssignDetails($worksheet) {
        $sql = " SELECT * FROM question_assign WHERE worksheet_id = '". $worksheet ."'";
        $result = $this->db->query($sql)->result_array();
        return $result;
    }
        
        
    function getWorksheets($class_id) {

        $sql = " SELECT quiz_id, worksheet_id from question_assign "
                . "  inner join quiz on question_assign.quiz_id = quiz.quizid  where 1 and quiz.classid = " . $class_id;

       $result = $this->db->query($sql)->result_array();

        $arrWorksheets = array();

        if(count($result) > 0 ) {
            foreach($result as $row) {
                $quiz_id = $row['quiz_id'];
                $arrWorksheets[$quiz_id] = $row['worksheet_id'];
            }
        }

        return $arrWorksheets;
    }
    
   /* function isQuizExists($class_id) {
        
        $sql = " SELECT count(quizid) as tot from quiz where classid = " . $class_id;
        
        $result = $this->db->query($sql)->result_array();
        
        if($result[0]['tot'] > 0 ) {
            return true;
        }
        
        return false;
    } */
        
        
    function isWorksheetAssigned($class_id, $Worksheet) {
        $sql = " SELECT quiz_id, worksheet_id from question_assign "
                    . "  inner join quiz on question_assign.quiz_id = quiz.quizid  where 1 "
                . "  and quiz.classid = " . $class_id ." and worksheet_id = '" . $Worksheet ."' ";
        
        $result = $this->db->query($sql)->result_array();
        
        if(count($result) > 0 ) {
            return true;
        }
        return false;
    }    
    
    function getQuizesof($class_id) {

        $sql = " SELECT quizid from quiz where classid = " . $class_id;
        $result = $this->db->query($sql)->result_array();
        return $result;
    }
    
    
}
