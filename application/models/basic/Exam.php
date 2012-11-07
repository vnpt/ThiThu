<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Exam
 *
 * @author DAT
 */
class Exam {
    //put your code here
    private $exam_id = null;
    private $exam_level = null;
    private $exam_date = null;
    
    public function __construct($data = array()) {
        if (isset($data['exam_id']))
            $this->exam_id = $data['exam_id'];
        
        if (isset($data['exam_level']))
            $this->exam_level = $data['exam_level'];
        
        if (isset($data['exam_date']))
            $this->exam_date = $data['exam_date'];
    }
    
    public function getExam_id() {
        return $this->exam_id;
    }

    public function setExam_id($exam_id) {
        $this->exam_id = $exam_id;
    }

    public function getExam_level() {
        return $this->exam_level;
    }

    public function setExam_level($exam_level) {
        $this->exam_level = $exam_level;
    }

    public function getExam_date() {
        return $this->exam_date;
    }

    public function setExam_date($exam_date) {
        $this->exam_date = $exam_date;
    }


}

?>
