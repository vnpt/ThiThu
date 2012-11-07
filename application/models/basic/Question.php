<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Question
 *
 * @author DAT
 */
class Question {
    //put your code here
    private $question_id = null;
    private $question_groupid = 0;
    private $question_content = null;
    private $question_answer = null;
    private $question_level = 0;
    private $question_count_true = 0;
    private $question_count_false = 0;
    private $question_answer_A =null;
    private $question_answer_B = null;
    private $question_answer_C = null;
    private $question_answer_D = null;
    

    public function __construct($data = array()) {
        if (isset($data['question_id']))
            $this->question_id = $data['question_id'];

        if (isset($data['question_groupid']))
            $this->question_groupid = $data['question_groupid'];

        if (isset($data['question_content']))
            $this->question_content = $data['question_content'];

        if (isset($data['question_answer']))
            $this->question_answer = $data['question_answer'];

        if (isset($data['question_level']))
            $this->question_level = $data['question_level'];

        if (isset($data['question_answer_A']))
            $this->question_answer_A = $data['question_answer_A'];

        if (isset($data['question_answer_B']))
            $this->question_answer_B = $data['question_answer_B'];
        
        if (isset($data['question_answer_C']))
            $this->question_answer_C = $data['question_answer_C'];
        
        if (isset($data['question_answer_D']))
            $this->question_answer_D = $data['question_answer_D'];
        
       
    }

    public function getQuestion_id() {
        return $this->question_id;
    }

    public function setQuestion_id($question_id) {
        $this->question_id = $question_id;
    }

    public function getQuestion_groupid() {
        return $this->question_groupid;
    }

    public function setQuestion_groupid($question_groupid) {
        $this->question_groupid = $question_groupid;
    }

    public function getQuestion_content() {
        return $this->question_content;
    }

    public function setQuestion_content($question_content) {
        $this->question_content = $question_content;
    }

    public function getQuestion_answer() {
        return $this->question_answer;
    }

    public function setQuestion_answer($question_answer) {
        $this->question_answer = $question_answer;
    }

    public function getQuestion_level() {
        return $this->question_level;
    }

    public function setQuestion_level($question_level) {
        $this->question_level = $question_level;
    }

    public function getQuestion_count_true() {
        return $this->question_count_true;
    }

    public function setQuestion_count_true($question_count_true) {
        $this->question_count_true = $question_count_true;
    }

    public function getQuestion_count_false() {
        return $this->question_count_false;
    }

    public function setQuestion_count_false($question_count_false) {
        $this->question_count_false = $question_count_false;
    }

    public function getQuestion_answer_A() {
        return $this->question_answer_A;
    }

    public function setQuestion_answer_A($question_answer_A) {
        $this->question_answer_A = $question_answer_A;
    }

    public function getQuestion_answer_B() {
        return $this->question_answer_B;
    }

    public function setQuestion_answer_B($question_answer_B) {
        $this->question_answer_B = $question_answer_B;
    }

    public function getQuestion_answer_C() {
        return $this->question_answer_C;
    }

    public function setQuestion_answer_C($question_answer_C) {
        $this->question_answer_C = $question_answer_C;
    }

    public function getQuestion_answer_D() {
        return $this->question_answer_D;
    }

    public function setQuestion_answer_D($question_answer_D) {
        $this->question_answer_D = $question_answer_D;
    }


}

?>
