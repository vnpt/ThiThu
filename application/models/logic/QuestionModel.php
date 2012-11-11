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
    public static function insertQuestion(Question $question) {
        $conn= new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $sql = "INSERT INTO tbl_question(question_groupid, question_content, question_answer , 
            question_level , question_count_true , question_count_false , 
            question_answer_A , question_answer_B , question_answer_C , question_answer_D ) 
            VALUES (?,?,?,?,?,?,?,?,?,?)";
            
       

        $st= $conn->prepare($sql);
        $st->bindValue(1, $question->getQuestion_groupid(), PDO::PARAM_INT);
        $st->bindValue(2, $question->getQuestion_content(),PDO::PARAM_STR);
        $st->bindValue(3, $question->getQuestion_answer(),PDO::PARAM_INT);
        $st->bindValue(4, $question->getQuestion_level(),PDO::PARAM_INT);
        $st->bindValue(5, $question->getQuestion_count_true(),PDO::PARAM_INT);
        $st->bindValue(6, $question->getQuestion_count_false(),PDO::PARAM_INT);
        $st->bindValue(7, $question->getQuestion_answer_A(),PDO::PARAM_STR);
        $st->bindValue(8, $question->getQuestion_answer_B(),PDO::PARAM_STR);
        $st->bindValue(9, $question->getQuestion_answer_C(),PDO::PARAM_STR);
        $st->bindValue(10,$question->getQuestion_answer_D(),PDO::PARAM_STR);
  
        $result= $st->execute();
//        print_r($question);
        $conn= null;
        return $result;

    }

    public static function checkAnswer($question_id, $answer) {
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $sql = "select count(question_id) from tbl_question WHERE question_id=? and answer= ?";
        $st = $conn->prepare($sql);
        $st->bindValue(1, $question_id,PDO::PARAM_INT);
        $st->bindValue(2, $answer,PDO::PARAM_INT);
        $st->execute();
        $row = $st->fetch();
        $result = $row['count(question_id)'];
        $conn = null;
        return $result;
    }

    public static function update($question_id, Question $question) {
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $sql = "UPDATE tbl_question SET question_groupid = ? , question_content = ? , question_answer = ?, 
            question_level = ?, question_count_true = ?, question_count_false = ?, 
            question_answer_A = ?, question_answer_B = ?, question_answer_C = ?, question_answer_D  = ?
            WHERE question_id= ?";
        $st = $conn->prepare($sql);
        $st->bindValue(1, $question->getQuestion_groupid(), PDO::PARAM_INT);
        $st->bindValue(2, $question->getQuestion_content(),PDO::PARAM_STR);
        $st->bindValue(3, $question->getQuestion_answer(),PDO::PARAM_INT);
        $st->bindValue(4, $question->getQuestion_level(),PDO::PARAM_INT);
        $st->bindValue(5, $question->getQuestion_count_true(),PDO::PARAM_INT);
        $st->bindValue(6, $question->getQuestion_count_false(),PDO::PARAM_INT);
        $st->bindValue(7, $question->getQuestion_answer_A(),PDO::PARAM_STR);
        $st->bindValue(8, $question->getQuestion_answer_B(),PDO::PARAM_STR);
        $st->bindValue(9, $question->getQuestion_answer_C(),PDO::PARAM_STR);
        $st->bindValue(10,$question->getQuestion_answer_D(),PDO::PARAM_STR);
        $st->bindValue(11, $question_id,PDO::PARAM_INT);
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
        $st->bindValue(1, $question_id,PDO::PARAM_INT);
        $st->execute();
        $conn = null;
    }

    public static function getAll() {
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

    public static function getById($question_id) {
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $sql1 = "SELECT * FROM tbl_question 
                WHERE question_id = ?
            ORDER BY question_groupid DESC";
        $st = $conn->prepare($sql1);
        $st->bindValue(1, $question_id,PDO::PARAM_INT);
        $st->execute();
        $row = $st->fetch();
        $conn = null;
        if ($row)
            return new Question($row);
    }

    public static function getByGroupID($group_id) {
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $sql1 = "SELECT * FROM tbl_question 
                WHERE question_groupid = ?
            ORDER BY question_level DESC";
        $st = $conn->prepare($sql1);
        $st->bindValue(1, $group_id,PDO::PARAM_INT);
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

    public static function getByLevel($level) {
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $sql1 = "SELECT * FROM tbl_question 
                WHERE question_level = ?
            ORDER BY question_groupid DESC";
        $st = $conn->prepare($sql1);
        $st->bindValue(1, $level,PDO::PARAM_INT);
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
    
    
    //lấy random $number câu hỏi có thông tin $group_id và $level
    public static function getByGroupId_Level($group_id, $level, $number) {
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $sql1 = "SELECT * FROM tbl_question 
                WHERE question_groupid = ? and question_level = ?
                ORDER BY RAND() LIMIT ?";

        $st = $conn->prepare($sql1);
        $st->bindValue(1, $group_id,PDO::PARAM_INT);
        $st->bindValue(2, $level,PDO::PARAM_INT);
        $st->bindValue(3, $number,PDO::PARAM_INT);
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
