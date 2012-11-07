<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    require APPLICATION_PATH . '/controllers/admin/basic/AdminControllerAction.php';

    if (!isset($AdminAction))
        $AdminAction = new AdminControllerAction();
    $adminManager = isset($_GET['adminManager']) ? $_GET['adminManager'] : "";
    
    switch ($adminManager) {
        case 'question':
            require 'QuestionController.php';
            break;
        default :
            $AdminAction->goHomepage();
            break;
    }
?>
