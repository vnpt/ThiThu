<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of QuestionGroup
 *
 * @author DAT
 */
class QuestionGroup {
    //put your code here
   
    private $group_id = null;
    private $group_name =  null;
    private $group_description = null;
    private $number_question = null;
    
    public function __construct($data = array()) {
        if (isset($data['group_id']))
            $this->group_id = $data['group_id'];
        
        if (isset($data['group_name']))
            $this->group_name = $data['group_name'];
        
        if (isset($data['group_description']))
            $this->group_description = $data['group_description'];
        
        if (isset($data['number_question']))
            $this->number_question = $data['number_question'];
    }
    
    
    
    public function getGroup_id() {
        return $this->group_id;
    }

    public function setGroup_id($group_id) {
        $this->group_id = $group_id;
    }

    public function getGroup_name() {
        return $this->group_name;
    }

    public function setGroup_name($group_name) {
        $this->group_name = $group_name;
    }

    public function getGroup_description() {
        return $this->group_description;
    }

    public function setGroup_description($group_description) {
        $this->group_description = $group_description;
    }

    public function getNumber_question() {
        return $this->number_question;
    }

    public function setNumber_question($number_question) {
        $this->number_question = $number_question;
    }

}

?>
