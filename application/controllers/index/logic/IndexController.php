<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    require APPLICATION_PATH . '/controllers/index/basic/IndexControllerAction.php';
    if(!isset($indexControllerAction))
        $indexControllerAction = new IndexControllerAction();
    $indexControllerAction->viewHomePage();

?>
