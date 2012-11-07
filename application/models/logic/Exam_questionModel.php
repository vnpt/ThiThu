<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Exam_questionModel
 *
 * @author DAT
 */
class Exam_questionModel {
    //put your code here
    public static function getByExamID($exam_id){
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $sql1 = "SELECT * FROM tbl_exam_question WHERE exam_id = ?";
        $st = $conn->prepare($sql1);
        $st->bindValue(1, $exam_id, PDO::PARAM_INT);
        $st->execute();
        $list = array();
        while ($row = $st->fetch()) {
            $exam = new Exam_question($row);
            $list[] = $exam;
        }
        $totalRows = $st->rowCount();
        $conn = null;
        return ( array("results" => $list, "totalRows" => $totalRows) );
    }
    
}

?>
