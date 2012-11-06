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
    private $question_groupid = null;
    private $question_description = null;
    private $question_answer = null;
    private $question_lever = null;
    private $question_count_true = null;
    private $question_count_false = null;
    private $question_answer_A =null;
    private $question_answer_B = null;
    private $question_answer_C = null;
    private $question_answer_D = null;
    

    public function __construct($data = array()) {
        if (isset($data['question_id']))
            $this->question_id = $data['question_id'];

        if (isset($data['question_groupid']))
            $this->question_groupid = $data['question_groupid'];

        if (isset($data['question_description']))
            $this->question_description = $data['question_description'];

        if (isset($data['question_answer']))
            $this->question_answer = $data['question_answer'];

        if (isset($data['question_lever']))
            $this->question_lever = $data['question_lever'];

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

    public function getQuestion_description() {
        return $this->question_description;
    }

    public function setQuestion_description($question_description) {
        $this->question_description = $question_description;
    }

    public function getQuestion_answer() {
        return $this->question_answer;
    }

    public function setQuestion_answer($question_answer) {
        $this->question_answer = $question_answer;
    }

    public function getQuestion_lever() {
        return $this->question_lever;
    }

    public function setQuestion_lever($question_lever) {
        $this->question_lever = $question_lever;
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
