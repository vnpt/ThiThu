<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of QuestionGroupModel
 *
 * @author DAT
 */
class QuestionGroupModel {
    //put your code here
    public static function getAll(){
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $sql1 = "SELECT * FROM tbl_questiongroup ";
        $st = $conn->prepare($sql1);
        $st->execute();
        $list = array();
        while ($row = $st->fetch()) {
            $questiongroup = new QuestionGroup($row);
            $list[] = $questiongroup;
        }
        $totalRows = $st->rowCount();
        $conn = null;
        return ( array("results" => $list, "totalRows" => $totalRows) );
    }
}

?>
