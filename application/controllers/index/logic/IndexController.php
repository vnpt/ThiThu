<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    require APPLICATION_PATH . '/controllers/index/basic/IndexControllerAction.php';
    session_start();
    $typeManager= isset($_GET['typeManager']) ? $_GET['typeManager'] : "";
        
    
    
    if(!isset($indexControllerAction))
        $indexControllerAction = new IndexControllerAction();
    
    switch ($typeManager){
        case 'chuanbi':
            $indexControllerAction->chuanBi();
            break;
        case 'lambai':
            $indexControllerAction->lamBai();
            break;;
        case 'nopbai':
            $indexControllerAction->nopBai();
            break;
        case 'login':
            $indexControllerAction->dangNhap();
            break;
        case 'reg':
            $indexControllerAction->dangKi();
            break;
        default :
            $indexControllerAction->viewHomePage();
            break;
        
    }
    

?>
