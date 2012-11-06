<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
ini_set("display_errors", true);
ini_set ('magic_quotes_gpc', 0);
date_default_timezone_set("Asia/Ho_Chi_Minh");
define("DB_DSN", "mysql:host=localhost;dbname=tsbzamzy_dbbanhang");
define("DB_USERNAME", "tsbzamzy_bh");
define("DB_PASSWORD", "dbbanhang12345");
define("NAME_WEBSITE", "Thi thử đại học");
define("ROOT_PATH", "http://localhost/ThiThuDH/");
define("ROOT_PATH_2", "http://localhost/ThiThuDH");
define("NUMBER_ARTICLE_PER_PAGE", 10);
define("CLASS_PATH", APPLICATION_PATH . "/models/basic");

define("PUBLIC_PATH", ROOT_PATH . "public");
require (CLASS_PATH . "/Admin.php");
require (CLASS_PATH . "/User.php");
require (CLASS_PATH . "/QuestionGroup.php");
require (CLASS_PATH . "/Question.php");
require (CLASS_PATH . "/Exam.php");

?>
