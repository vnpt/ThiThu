<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ResulstModel
 *
 * @author DAT
 */
class ResulstModel {
    //put your code here
    //lấy 5 bài thi gần nhất của người dùng, sắp xếp theo thời gian gần nhất
    //input: user_id
    public static function get5ExamRecent($user_id){
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $sql1 = "SELECT *, UNIX_TIMESTAMP(result_pubDate) as dateExam FROM tbl_results 
                WHERE user_id = ?
                ORDER BY dateExam DESC LIMIT 5";
        $st = $conn->prepare($sql1);
        $st->bindValue(1, $user_id,PDO::PARAM_INT);
        $st->execute();
        $list = array();
        while ($row = $st->fetch()) {
            $results = new Results($row);
            $list[] = $results;
        }
        $totalRows = $st->rowCount();
        $conn = null;
        return ( array("results" => $list, "totalRows" => $totalRows) );
    }
}

?>
