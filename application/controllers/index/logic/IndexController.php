<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    require APPLICATION_PATH . '/controllers/index/basic/IndexControllerAction.php';
    $action= isset($_GET['action']) ? $_GET['action'] : "";
        
    
    
    if(!isset($indexControllerAction))
        $indexControllerAction = new IndexControllerAction();
    
    switch ($action){
        case 'lambai':
            $indexControllerAction->viewStartTest();
            break;
        default :
            $indexControllerAction->viewHomePage();
        
    }
    

?>
