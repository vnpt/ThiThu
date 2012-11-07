<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminModel
 *
 * @author DAT
 */
class AdminModel {
    //put your code here
    public static function changePassword($admin_username,$admin_password)
    {
        $conn= new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $sql= "UPDATE tbl_admin set admin_password= ? WHERE admin_username=?";
        $st= $conn->prepare($sql);
        $st->bindValue(1, $admin_password, PDO::PARAM_STR);
        $st->bindValue(2, $admin_username, PDO::PARAM_STR);
        $result= $st->execute();
        $conn= null;
        return $result;
    }
    
    public static function checkLogin($admin_username,$admin_password)
    {
        $conn= new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $sql= "select count(admin_username) from tbl_admin WHERE admin_username=? and admin_password= ?";
        $st= $conn->prepare($sql);
        $st->bindValue(1, $admin_username, PDO::PARAM_STR);
        $st->bindValue(2, $admin_password, PDO::PARAM_STR);
        $st->execute();
        $row= $st->fetch();
        $result= $row['count(admin_username)'];
        $conn= null;
        return $result;
    }
}

?>
