<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    require APPLICATION_PATH . '/controllers/index/basic/IndexControllerAction.php';
    $typeManager= isset($_GET['typeManager']) ? $_GET['typeManager'] : "";
        
    
    
    if(!isset($indexControllerAction))
        $indexControllerAction = new IndexControllerAction();
    
    switch ($typeManager){
        case 'lambai':
            $indexControllerAction->viewStartTest();
            break;
        case 'nopbai':
            $indexControllerAction->nopBai();
            break;
        default :
            $indexControllerAction->viewHomePage();
        
    }
    

?>
