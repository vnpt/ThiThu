<?php
    include 'Header.php';

?>
<div id="wrap_left">

</div>

<div id="wrap_right">

</div>
<div id="wrap_center">
    <form class="create_question" action="admin.php?adminManager=question&action=new" method="POST" >
        <p><textarea rows="7" type="text" name="question_content" placeholder="Nội dung câu hỏi" style=" margin-bottom: 20px; width: 500px;" required></textarea>
        </p>
        <textarea  type="text" name="question_answer_A" placeholder="Câu trả lời A" style="" required ></textarea>
        
        <textarea type="text" name="question_answer_B" placeholder="Câu trả lời B" style="" required></textarea>
        
        <textarea type="text" name="question_answer_C" placeholder="Câu trả lời C" style="" required></textarea>
        
        <textarea  type="text" name="question_answer_D"  placeholder="Câu trả lời D" style="" required></textarea>
        <select name="question_answer">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
        </select>
        <select name="question_groupid">
            <?php 
            
            foreach ($results['groups'] as $group){
                $id= $group->getGroup_id();
                $name =$group->getGroup_name();
                echo "<option value='$id'>$name</option>";
            }
            ?>
        </select>
        <select name="question_level">
            <option value="4">A</option>
            <option value="3">B</option>
            <option value="2">C</option>
            <option value="1">D</option>
        </select>
        <input type="submit" name="submit" value="Create" style=""/>
          
    </form>
    
</div>

<?php 
include 'Footer.php';
?>
