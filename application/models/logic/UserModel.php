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
         $sql = "INSERT INTO tbl_user(user_name, user_password, user_lever, 
            user_email, user_sex, user_address, user_phone, lever_exam_current, date_reg) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, FROM_UNIXTIME(?))";
        $st= $conn->prepare($sql);
        $st->bindParam(1, $user->getUser_name());
        $st->bindParam(2, $user->getUser_password());
        $st->bindParam(3, $user->getUser_lever());
        $st->bindParam(4, $user->getUser_email());
        $st->bindParam(5, $user->getUser_sex());
        $st->bindParam(6, $user->getUser_address());
        $st->bindParam(7, $user->getUser_phone());
        $st->bindParam(8, $user->getLever_exam_current());
        $st->bindParam(9, $user->getDate_reg());
        
        $result= $st->execute();
        $conn= null;
        return $result;
    }
    
    public static function checkLogin($user_name,$password)
    {
        $conn= new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $sql= "select count(user_name) from tbl_user WHERE user_name=? and user_password= ?";
        $st= $conn->prepare($sql);
        $st->bindParam(1, $user_name);
        $st->bindParam(2, $password);
        $st->execute();
        $row= $st->fetch();
        $result= $row['count(user_name)'];
        $conn= null;
        return $result;
    }
    
    public static function update($user_id, User $user) {
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $sql = "UPDATE tbl_user SET user_password= ?,  user_lever= ?, 
            user_email= ?,user_sex= ?,user_address= ?,user_phone= ?, lever_exam_current= ? 
            WHERE user_id= ?";
        $st = $conn->prepare($sql);
        $st->bindParam(1, $user->getUser_password());
        $st->bindParam(2, $user->getUser_lever());
        $st->bindParam(3, $user->getUser_email());
        $st->bindParam(4, $user->getUser_sex());
        $st->bindParam(5, $user->getUser_address());
        $st->bindParam(6, $user->getUser_phone());
        $st->bindParam(7, $user->getLever_exam_current());
        $st->bindParam(8, $user_id);
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
        $st->bindParam(1, $article_id);
        $st->execute();
        $conn = null;
    }
    
    public static function getAll(){
        
    }
    
    public static function getById(){
        
    }
}

?>
