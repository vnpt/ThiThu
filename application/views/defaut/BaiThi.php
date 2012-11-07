<?php
include 'Header.php';
?>
<div class="wrap_doTest_center">
    <form name="" action="<?php echo ROOT_PATH?>index.php?typeManager=nopbai" method="POST">
        <div class="boxstandard">
            <div class="boxheader2"><div><div>Bài làm của bạn</div></div></div>
            <div class="boxcontent2">
                <div class="body">

                    <?php
                    for ($i = 1; $i <= 50; $i++) {
                        ?>
                        <div id="q338413" class="que multichoice clearfix">
                            <div class="info">
                                <span class="firstletter"><?php echo $i ?>,</span>
                            </div>
                            <div class="content">
                                <div class="qtext">
                                    <div align="justify" style="text-align: justify">Vật dao động điều hoà: Thời gian ngắn nhất vật đi từ vị trí cân bằng đến li độ x = 0,5A là 0,1 s. Chu kỳ dao động của vật là:</div></div>


                                <div class="ablock clearfix">
                                    <div class="prompt">
                                        Câu trả lời của bạn:  </div>

                                    <table class="answer">
                                        <tbody>
                                            <tr class="r0">
                                                <td class="c0 control">
                                                    <input  id="" name="answer[<?php echo $i; //id cua cau hoi ?>][]" type="radio" value="<?php echo $i ?>_A" alt="0,12 s." onclick="limit_checkbox('answer[<?php echo $i ?>][]',this)" >        </td>
                                                <td class="c1 text ">
                                                    <label for="">
                                                        A. 0,12 s.          </label>
                                                </td>
                                                <td class="c0 feedback">
                                                </td>
                                            </tr>
                                            <tr class="r1">
                                                <td class="c0 control">
                                                    <input  id="" name="answer[<?php echo $i ?>][]" type="radio" value="<?php echo $i ?>_B" alt="0,24 s." onclick="limit_checkbox('answer[<?php echo $i ?>][]',this)">        </td>
                                                <td class="c1 text ">
                                                    <label for="">
                                                        B. 0,24 s.          </label>
                                                </td>
                                                <td class="c0 feedback">
                                                </td>
                                            </tr>
                                            <tr class="r0">
                                                <td class="c0 control">
                                                    <input  id="" name="answer[<?php echo $i ?>][]" type="radio" value="<?php echo $i ?>_C" alt="0,8 s." onclick="limit_checkbox('answer[<?php echo $i ?>][]',this)">        </td>
                                                <td class="c1 text ">
                                                    <label for="">
                                                        C. 0,8 s.          </label>
                                                </td>
                                                <td class="c0 feedback">
                                                </td>
                                            </tr>
                                            <tr class="r1">
                                                <td class="c0 control">
                                                    <input  id="" name="answer[<?php echo $i ?>][]" type="radio" value="<?php echo $i ?>_D" alt="1,2 s." onclick="limit_checkbox('answer[<?php echo $i ?>][]',this)">        </td>
                                                <td class="c1 text ">
                                                    <label for="">
                                                        D. 1,2 s.          </label>
                                                </td>
                                                <td class="c0 feedback">
                                                </td>
                                            </tr>
                                        </tbody></table>
                                </div>
                                <script type="text/javascript">
                                    function limit_checkbox(name,obj)
                                    {
                                        
                                        var x=document.getElementsByName(name);
                                        if(obj.checked){
                                            for(var i=0; i < x.length; i++){
                                                if(x[i] != obj)
                                                    x[i].checked = false;
                                            }
                                        }
                                        
                                    }
                                </script>

                            </div>
                        </div>
                        <?php
                    }
                    ?>





                    <br><br>
                </div>
            </div>
            <div class="boxfooter"><div><div></div></div></div>
        </div>
        <div class="submitbtns mdl-align clearfix">
            <input type="submit" class="replystop" name="finishattempt" value="">
            <input type="hidden" name="timeup" value="0">
        </div>

    </form>
</div> <!--end wrap_doTest_center -->
<?php
include 'Footer.php';
?>
