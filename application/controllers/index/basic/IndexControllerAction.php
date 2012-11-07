<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class IndexControllerAction{
    public function viewHomePage(){
        require APPLICATION_PATH.'/views/defaut/HomePage.php';
    }
    
    public function viewStartTest(){
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        if ($id != "")
            require APPLICATION_PATH.'/views/defaut/BaiThi.php';
        else
            require APPLICATION_PATH.'/views/defaut/StartTest.php';
    }
    
    public function nopBai(){
        
        
         foreach ($_POST["answer"] as $key=>$array)
            foreach ($array as $key1 => $value)
                echo $value;
        
    }
    
    public function dangKi(){
        
    }
    
    public function dangNhap(){
        if($_POST['login']){
            $user_name = $_POST['user_name'];
            $password = $_POST['user_password'];
            $data = UserModel::checkLogin($user_name, $password);
            if($data == NULL)
                echo "dang nhap khong thanh cong";
            else
                header ("location:admin.php?typeManager=homePage");
        }            
        else{
            require APPLICATION_PATH.'/views/defaut/Login.php';
        }
    }
    
    
    public function createExamByExamLevel($level){
        
    }
    
    
}
?>
