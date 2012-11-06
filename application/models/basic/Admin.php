<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author DAT
 */
class Admin {
    //put your code here
    private $admin_id = null;
    private $admin_username = null;
    private $admin_password = null;
    
    public function __construct($data = array()) {
        if (isset($data['admin_id']))
            $this->admin_id = $data['admin_id'];
        
        if (isset($data['admin_username']))
            $this->admin_username = $data['admin_username'];
        
        if (isset($data['admin_password']))
            $this->admin_password = $data['admin_password']; 
        
    }
    
    public function getAdmin_id() {
        return $this->admin_id;
    }

    public function setAdmin_id($admin_id) {
        $this->admin_id = $admin_id;
    }

    public function getAdmin_username() {
        return $this->admin_username;
    }

    public function setAdmin_username($admin_username) {
        $this->admin_username = $admin_username;
    }

    public function getAdmin_password() {
        return $this->admin_password;
    }

    public function setAdmin_password($admin_password) {
        $this->admin_password = $admin_password;
    }


    
}

?>
