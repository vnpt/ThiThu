<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
ini_set("display_errors", true);
ini_set ('magic_quotes_gpc', 0);
date_default_timezone_set("Asia/Ho_Chi_Minh");
define("DB_DSN", "mysql:host=localhost;dbname=thithudh");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("NAME_WEBSITE", "Thi thử đại học");
define("ROOT_PATH", "http://localhost/ThiThuDH/");
define("ROOT_PATH_2", "http://localhost/ThiThuDH");
define("NUMBER_ARTICLE_PER_PAGE", 10);
define("PUBLIC_PATH", ROOT_PATH . "public");

define("CLASSBASIC_PATH", APPLICATION_PATH . "/models/basic");
define("CLASSLOGIC_PATH", APPLICATION_PATH . "/models/logic");

require (CLASSBASIC_PATH . "/Admin.php");
require (CLASSBASIC_PATH . "/User.php");
require (CLASSBASIC_PATH . "/QuestionGroup.php");
require (CLASSBASIC_PATH . "/Question.php");
require (CLASSBASIC_PATH . "/Exam.php");
require (CLASSBASIC_PATH . "/Results.php");

require (CLASSLOGIC_PATH . "/QuestionModel.php");
require (CLASSLOGIC_PATH . "/QuestionGroupModel.php");
require (CLASSLOGIC_PATH . "/AdminModel.php");
require (CLASSLOGIC_PATH . "/UserModel.php");
require (CLASSLOGIC_PATH . "/ExamModel.php");
require (CLASSLOGIC_PATH . "/ResultsModel.php");



?>
