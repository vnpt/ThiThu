<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of QuestionModel
 *
 * @author DAT
 */
class QuestionModel {
    //put your code here
     public static function insertQuestion(Question $question)
    {
        $conn= new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
         $sql = "INSERT INTO tbl_question(question_groupid, question_description, question_answer, 
            question_lever, question_count_true, question_count_false, 
            question_answer_A, question_answer_B, question_answer_C, question_answer_D) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,? )";
        $st= $conn->prepare($sql);
        $st->bindParam(1, $question->getQuestion_groupid());
        $st->bindParam(2, $question->getQuestion_description());
        $st->bindParam(3, $question->getQuestion_answer());
        $st->bindParam(4, $question->getQuestion_lever());
        $st->bindParam(5, $question->getQuestion_count_true());
        $st->bindParam(6, $question->getQuestion_count_false());
        $st->bindParam(7, $question->getQuestion_answer_A());
        $st->bindParam(8, $question->getQuestion_answer_B());
        $st->bindParam(9, $question->getQuestion_answer_C());
        $st->bindParam(10,$question->getQuestion_answer_D());
        
        $result= $st->execute();
        $conn= null;
        return $result;
    }
    
    public static function checkAnswer($question_id,$answer)
    {
        $conn= new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $sql= "select count(question_id) from tbl_question WHERE question_id=? and answer= ?";
        $st= $conn->prepare($sql);
        $st->bindParam(1, $question_id);
        $st->bindParam(2, $answer);
        $st->execute();
        $row= $st->fetch();
        $result= $row['count(question_id)'];
        $conn= null;
        return $result;
    }
    
    public static function update($question_id, Question $question) {
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $sql = "UPDATE tbl_question SET question_groupid = ? , question_description = ? , question_answer = ?, 
            question_lever = ?, question_count_true = ?, question_count_false = ?, 
            question_answer_A = ?, question_answer_B = ?, question_answer_C = ?, question_answer_D  = ?
            WHERE question_id= ?";
        $st = $conn->prepare($sql);
        $st->bindParam(1, $question->getQuestion_groupid());
        $st->bindParam(2, $question->getQuestion_description());
        $st->bindParam(3, $question->getQuestion_answer());
        $st->bindParam(4, $question->getQuestion_lever());
        $st->bindParam(5, $question->getQuestion_count_true());
        $st->bindParam(6, $question->getQuestion_count_false());
        $st->bindParam(7, $question->getQuestion_answer_A());
        $st->bindParam(8, $question->getQuestion_answer_B());
        $st->bindParam(9, $question->getQuestion_answer_C());
        $st->bindParam(10,$question->getQuestion_answer_D());
        $st->bindParam(11,$question_id);
        $st->execute();
        $conn = null;
    }

    /*
     * 
     */

    public static function delete($question_id) {
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $sql = "DELETE FROM tbl_question WHERE question_id= ? LIMIT 1";
        $st = $conn->prepare($sql);
        $st->bindParam(1, $question_id);
        $st->execute();
        $conn = null;
    }
    
    public static function getAll(){
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $sql1 = "SELECT * FROM tbl_question 
            ORDER BY question_groupid DESC";
        $st = $conn->prepare($sql1);
        $st->execute();
        $list = array();
        while ($row = $st->fetch()) {
            $question = new Question($row);
            $list[] = $question;
        }
        $totalRows = $st->rowCount();
        $conn = null;
        return ( array("results" => $list, "totalRows" => $totalRows) );
    }
    
    public static function getById($question_id){
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $sql1 = "SELECT * FROM tbl_question 
                WHERE question_id = ?
            ORDER BY question_groupid DESC";
        $st = $conn->prepare($sql1);
        $st->bindParam(1, $question_id);
        $st->execute();
        $row = $st->fetch();
        $conn = null;
        if ($row)
            return new Question($row);
        
    }
     public static function getByGroupID($group_id){
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $sql1 = "SELECT * FROM tbl_question 
                WHERE question_groupid = ?
            ORDER BY question_lever DESC";
        $st = $conn->prepare($sql1);
        $st->bindParam(1, $group_id);
        $st->execute();
        $list = array();
        while ($row = $st->fetch()) {
            $question = new Question($row);
            $list[] = $question;
        }
        $totalRows = $st->rowCount();
        $conn = null;
        return ( array("results" => $list, "totalRows" => $totalRows) );
    }
    
    public static function getByLever($lever){
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $sql1 = "SELECT * FROM tbl_question 
                WHERE question_lever = ?
            ORDER BY question_groupid DESC";
        $st = $conn->prepare($sql1);
        $st->bindParam(1, $lever);
        $st->execute();
        $list = array();
        while ($row = $st->fetch()) {
            $question = new Question($row);
            $list[] = $question;
        }
        $totalRows = $st->rowCount();
        $conn = null;
        return ( array("results" => $list, "totalRows" => $totalRows) );
    }
    
    public static function getByGroupId_Lever($group_id, $lever){
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $sql1 = "SELECT * FROM tbl_question 
                WHERE question_groupid = ? and question_lever = ?" ;
            
        $st = $conn->prepare($sql1);
        $st->bindParam(1, $group_id);
        $st->bindParam(2, $lever);
        $st->execute();
        $list = array();
        while ($row = $st->fetch()) {
            $question = new Question($row);
            $list[] = $question;
        }
        $totalRows = $st->rowCount();
        $conn = null;
        return ( array("results" => $list, "totalRows" => $totalRows) );
    }
}

?>
