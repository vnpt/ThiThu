<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Results
 *
 * @author DAT
 */
class Results {
    //put your code here
    private $result_id = null;
    private $user_id = null;
    private $test_scores = null;
    private $test_detail_scores = null;
    private $exam_id = null;
    private $result_pubDate = null;
    
    
    public function __construct($data = array()) {
        if (isset($data['result_id']))
            $this->result_id = $data['result_id'];
        
        if (isset($data['user_id']))
            $this->user_id = $data['user_id'];
        
        if (isset($data['test_scores']))
            $this->test_scores = $data['test_scores'];
        
        if (isset($data['test_detail_scores']))
            $this->test_detail_scores = $data['test_detail_scores'];

        if (isset($data['exam_id']))
            $this->exam_id = $data['exam_id'];
        
        if (isset($data['result_pubDate']))
            $this->result_pubDate = $data['result_pubDate'];
    }
    
    
    public function getResult_id() {
        return $this->result_id;
    }

    public function setResult_id($result_id) {
        $this->result_id = $result_id;
    }

    public function getUser_id() {
        return $this->user_id;
    }

    public function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

    public function getTest_scores() {
        return $this->test_scores;
    }

    public function setTest_scores($test_scores) {
        $this->test_scores = $test_scores;
    }
    
    public function getTest_detail_scores() {
        return $this->test_detail_scores;
    }

    public function setTest_detail_scores($test_detail_scores) {
        $this->test_detail_scores = $test_detail_scores;
    }

    public function getResult_pubDate() {
        return $this->result_pubDate;
    }

    public function setResult_pubDate($result_pubDate) {
        $this->result_pubDate = $result_pubDate;
    }

        
    public function getExam_id() {
        return $this->exam_id;
    }

    public function setExam_id($exam_id) {
        $this->exam_id = $exam_id;
    }

    public function getDate_do_exam() {
        return $this->result_pubDate;
    }

    public function setDate_do_exam($result_pubDate) {
        $this->result_pubDate = $result_pubDate;
    }


    
}

?>
