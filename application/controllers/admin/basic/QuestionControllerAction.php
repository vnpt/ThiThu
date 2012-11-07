<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of QuestionControllerAction
 *
 * @author DAT
 */
class QuestionControllerAction {
    //put your code here
    public function newQuestion(){
        if (isset($_POST["submit"])) {
            
            $question = new Question($_POST);
//            print_r($question);
            QuestionModel::insertQuestion($question);
            
            header("location:admin.php?adminManager=question&action=list");
        }
        else
        {
            $results= array();
            $data = QuestionGroupModel::getAll();
            $results['groups'] = $data["results"];
            $results['nbGroup'] = $data["totalRows"];
            //print_r($results['groups']);
            require APPLICATION_PATH.'/views/admin/NewQuestion.php';
        }
    }
    
    public function listQuestion(){
        $results= array();
        $data = QuestionModel::getAll();
        $results['questions'] = $data["results"];
        $results['nbQuestion'] = $data["totalRows"];
        require APPLICATION_PATH.'/views/admin/ViewListQuestion.php';
    }
    

}

?>
