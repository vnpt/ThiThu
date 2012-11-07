<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require APPLICATION_PATH . '/controllers/admin/basic/QuestionControllerAction.php';

    if (!isset($QuestionAction))
        $QuestionAction = new QuestionControllerAction();
    $action = isset($_GET['action']) ? $_GET['action'] : "";
    
    switch ($action) {
        case 'new':
            $QuestionAction->newQuestion();
            break;
        case 'list':
            $QuestionAction->listQuestion();
            break;
        default :
            break;
    }
?>
