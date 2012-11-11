<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author DAT
 */
class User {
    //put your code here
    private $user_id = null;
    private $user_name = null;
    private $user_password = null;
    private $user_level = null;
    private $user_email = null;
    private $user_sex = null;
    private $user_address = null;
    private $user_phone = null;
    private $user_age = null;
    private $level_exam_current = null;
    private $date_reg = null;
    private $user_fullname = null;
    
    public function __construct($data = array()) {
        if (isset($data['user_id']))
            $this->user_id = $data['user_id'];
        
        if (isset($data['user_name']))
            $this->user_name = $data['user_name'];
        
        
        
        if (isset($data['user_password']))
            $this->user_password = $data['user_password'];
        
        if (isset($data['user_level']))
            $this->user_level = $data['user_level'];
        
        if (isset($data['user_email']))
            $this->user_email = $data['user_email'];
        
        if (isset($data['user_sex']))            
            $this->user_sex = $data['user_sex'];
        
        if (isset($data['user_address']))            
            $this->user_address = $data['user_address'];
        
        if (isset($data['user_phone']))            
            $this->user_phone = $data['user_phone'];
        
        if (isset($data['user_age']))            
            $this->user_age = $data['user_age'];
        
        if (isset($data['level_exam_current']))            
            $this->level_exam_current = $data['level_exam_current'];
        
        if (isset($data['date_reg']))
            $this->date_reg = $data['date_reg'];
        
         if (isset($data['user_fullname']))
            $this->user_fullname = $data['user_fullname'];
    }
    
    public function getUser_id() {
        return $this->user_id;
    }

    public function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

    public function getUser_name() {
        return $this->user_name;
    }

    public function setUser_name($user_name) {
        $this->user_name = $user_name;
    }

    public function getUser_password() {
        return $this->user_password;
    }

    public function setUser_password($user_password) {
        $this->user_password = $user_password;
    }

    public function getUser_level() {
        return $this->user_level;
    }

    public function setUser_level($user_level) {
        $this->user_level = $user_level;
    }

    public function getUser_email() {
        return $this->user_email;
    }

    public function setUser_email($user_email) {
        $this->user_email = $user_email;
    }

    public function getUser_sex() {
        return $this->user_sex;
    }

    public function setUser_sex($user_sex) {
        $this->user_sex = $user_sex;
    }

    public function getUser_address() {
        return $this->user_address;
    }

    public function setUser_address($user_address) {
        $this->user_address = $user_address;
    }

    public function getUser_phone() {
        return $this->user_phone;
    }

    public function setUser_phone($user_phone) {
        $this->user_phone = $user_phone;
    }

    public function getUser_age() {
        return $this->user_age;
    }

    public function setUser_age($user_age) {
        $this->user_age = $user_age;
    }
    
    public function getLevel_exam_current() {
        return $this->level_exam_current;
    }

    public function setLevel_exam_current($level_exam_current) {
        $this->level_exam_current = $level_exam_current;
    }
    public function getDate_reg() {
        return $this->date_reg;
    }

    public function setDate_reg($date_reg) {
        $this->date_reg = $date_reg;
    }


}

?>
