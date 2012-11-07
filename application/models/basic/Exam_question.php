<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Exam_question
 *
 * @author DAT
 */
class Exam_question {
    //put your code here
    private $exam_id = null;
    private $question_id = null;
    public function __construct($data = array()) {
        if (isset($data['exam_id']))
            $this->exam_id = $data['exam_id'];
        
        if (isset($data['question_id']))
            $this->question_id = $data['question_id'];       
    }
    
    public function getExam_id() {
        return $this->exam_id;
    }

    public function setExam_id($exam_id) {
        $this->exam_id = $exam_id;
    }

    public function getQuestion_id() {
        return $this->question_id;
    }

    public function setQuestion_id($question_id) {
        $this->question_id = $question_id;
    }
}

?>
