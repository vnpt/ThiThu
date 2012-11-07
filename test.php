<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
define("DB_DSN", "mysql:host=localhost;dbname=db_banhang");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("NAME_WEBSITE", "Thi thử đại học");
$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$sql = "INSERT INTO tbl_admin(admin_username, admin_password) VALUES (?, ?)";
        $st = $conn->prepare($sql);
        $st->bindParam(1, "aaaaaa");
        $st->bindParam(2, "bbbbbb");
        
        $st->execute();
    $conn = null;
    
?>
