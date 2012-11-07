<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExamModel
 *
 * @author DAT
 */
class ExamModel {
    //put your code here
    public static  function getAll(){
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $sql1 = "SELECT * FROM tbl_exam";
        $st = $conn->prepare($sql1);
        $st->execute();
        $list = array();
        while ($row = $st->fetch()) {
            $exam = new Exam($row);
            $list[] = $exam;
        }
        $totalRows = $st->rowCount();
        $conn = null;
        return ( array("results" => $list, "totalRows" => $totalRows) );
    }
    
    public static function getById($exam_id){
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $sql1 = "SELECT * FROM tbl_exam WHERE exam_id = ?";
        $st = $conn->prepare($sql1);
        $st->bindValue(1, $exam_id, PDO::PARAM_INT);
        $st->execute();
        $row = $st->fetch();
        if($row)
             return new Exam($row);
         return null;;
    }
            
}

?>
