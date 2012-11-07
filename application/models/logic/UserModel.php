<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserModel
 *
 * @author DAT
 */
class UserModel {
    //put your code here
    
    public static function insertUser(User $user)
    {
        $conn= new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
         $sql = "INSERT INTO tbl_user(user_name, user_password, user_level, 
            user_email, user_sex, user_address, user_phone, level_exam_current, date_reg) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, FROM_UNIXTIME(?))";
        $st= $conn->prepare($sql);
        $st->bindValue(1, $user->getUser_name(),PDO::PARAM_STR);
        $st->bindValue(2, $user->getUser_password(),PDO::PARAM_STR);
        $st->bindValue(3, $user->getUser_level(),PDO::PARAM_INT);
        $st->bindValue(4, $user->getUser_email(),PDO::PARAM_STR);
        $st->bindValue(5, $user->getUser_sex(),PDO::PARAM_STR);
        $st->bindValue(6, $user->getUser_address(),PDO::PARAM_STR);
        $st->bindValue(7, $user->getUser_phone(),PDO::PARAM_STR);
        $st->bindValue(8, $user->getLever_exam_current(),PDO::PARAM_INT);
        $st->bindValue(9, $user->getDate_reg(),PDO::PARAM_INT);
        
        $result= $st->execute();
        $conn= null;
        return $result;
    }
    
    public static function checkLogin($user_name,$password)
    {
        $conn= new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $sql= "select count(user_name) from tbl_user WHERE user_name=? and user_password= ?";
        $st= $conn->prepare($sql);
        $st->bindValue(1, $user_name,PDO::PARAM_STR);
        $st->bindValue(2, $password,PDO::PARAM_STR);
        $st->execute();
        $row= $st->fetch();
        $result= $row['count(user_name)'];
        $conn= null;
        return $result;
    }
    
    public static function update($user_id, User $user) {
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $sql = "UPDATE tbl_user SET user_password= ?,  user_level= ?, 
            user_email= ?,user_sex= ?,user_address= ?,user_phone= ?, level_exam_current= ? 
            WHERE user_id= ?";
        $st = $conn->prepare($sql);
        $st->bindValue(1, $user->getUser_password(),PDO::PARAM_STR);
        $st->bindValue(2, $user->getUser_level(),PDO::PARAM_INT);
        $st->bindValue(3, $user->getUser_email(),PDO::PARAM_STR);
        $st->bindValue(4, $user->getUser_sex(),PDO::PARAM_STR);
        $st->bindValue(5, $user->getUser_address(),PDO::PARAM_STR);
        $st->bindValue(6, $user->getUser_phone(),PDO::PARAM_STR);
        $st->bindValue(7, $user->getLever_exam_current(),PDO::PARAM_INT);
        $st->bindValue(8, $user_id);
        $st->execute();
        $conn = null;
    }

    /*
     * 
     */

    public static function delete($user_id) {
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $sql = "DELETE FROM tbl_user WHERE user_id= ? LIMIT 1";
        $st = $conn->prepare($sql);
        $st->bindValue(1, $user_id,PDO::PARAM_INT);
        $st->execute();
        $conn = null;
    }
    
    public static function getAll(){
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $sql1 = "SELECT * FROM tbl_user ";

        $st = $conn->prepare($sql1);
        $st->execute();
        $list = array();
        while ($row = $st->fetch()) {
            $user = new User($row);
            $list[] = $user;
        }
        $totalRows = $st->rowCount();
        $conn = null;
        return ( array("results" => $list, "totalRows" => $totalRows) );
    }
    
    public static function getById($user_id){
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $sql1 = "SELECT * FROM tbl_user 
                WHERE user_id = ?";

        $st = $conn->prepare($sql1);
        $st->bindValue(1, $user_id,PDO::PARAM_INT);        
        $st->execute();
        $conn = null;
        $row = $st->fetch();
        if($row)
            return   new User($row);          
        return null;
        
        
    }
}

?>
