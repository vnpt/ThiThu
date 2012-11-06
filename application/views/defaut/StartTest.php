<?php
include 'Header.php';
?>
<div class="wrap_doTest_center">
    <div class="boxstandard">
        <div class="boxheader"><div><div></div></div></div>
        <div class="boxcontent">
            <div class="body">
                <!--Inside table-->
                <!--img src="http://hocmai.vn/theme/hocmai/images/quiz/banner_quiz.gif" />
        <br /> <br /> <p></p-->

                <table width="898" style=" border:1px solid #73addb" align="center">
                    <tbody><tr height="61" class="bgr_info">
                            <!---manhhv put height = size of bgr_show_info.gif -->
                            <!--manhhv created border for table. and then, created border-right for tr. That's a result-->
                            <td width="449" style="border-right:solid 1px #73addb; font-weight: bold; text-align: center;">Trung tâm tư vấn giáo dục và bổ trợ kiến trúc phổ thông</td>
                            <td style="font-weight: bold; text-align: center;"> Thi thử đại học</td>

                        </tr>

                        <tr height="57" bgcolor="#dbebf8">
                            <td class="text_left">
                                Đề kiểm tra								</td>

                            <td class="text_right">
                                Môn: Vật lí <br> Lần thì đầu tiên của bạn								</td>

                        </tr>
                        <tr height="53" bgcolor="#dbebf8">
                            <td valign="top" class="text_italic">
                                <p align="center">(Đề kiểm tra có: 50 câu)</p>						 
                            </td>

                            <td valign="top" class="text_italic">
                                <p align="center">Thời gian làm bài: 90 phút </p>
                                <script language="javascript" type="text/javascript">
                                    <!--
                                    var timesup = "Thời gian vượt quá !";
                                    //var quizclose = -1351616745; // in seconds
                                    var quizopen = 0; // in seconds
                                    //var quizTimerValue = ; // in seconds
                                    var curtime = 1351616400; // in seconds

                                    //parseInt(quizTimerValue);

                                    // @EC PF : client time when page was opened
                                    var ec_page_start = new Date().getTime();
                                    // @EC PF : client time when quiz should end
                                    var ec_quiz_finish = 345000;

                                    // -->
                                </script>
                                <script language="javascript" type="text/javascript" src="timer.js"></script>
                                <div id="timer" style="display:none">
                                    <!--EDIT BELOW CODE TO YOUR OWN MENU-->        
                                    <div style="text-align:center;border:1px solid #73addb;width:150px;height:45px;float:right;padding-top:5px;font-style:normal;">
                                        <form id="clock">
                                            Thời gian hiện tại:			<input onfocus="blur()" type="text" id="time" class="time-clock" size="8">
                                        </form>
                                    </div>
                                    <!--END OF EDIT-->
                                </div>
                                <script language="javascript" type="text/javascript">
                                    <!--

                                    var timerbox = xGetElementById('timer');
                                    var theTimer = xGetElementById('QuizTimer');
                                    var theTop = 270;
                                    var old = theTop;

                                    //movecounter();

                                    document.onload = countup_clock(theTimer);

                                    timerbox.style.display = 'block';
                                    // -->
                                </script>
                            </td>
                        </tr>
                    </tbody></table>
                <br>
                <input type="button" value="" onclick="javascript: window.open('<?php echo ROOT_PATH ?>index.php?typeManager=lambai&id=12', '_self', '');" class="start_quiz">


                <br><br>

                <table class="bgvote" width="100%" cellpadding="5" cellspacing="0" align="center">
                    <tbody><tr>
                            <td width="10" colspan="2"></td><td align="left" class="quiz_vote" width="100">&nbsp;Đánh giá: &nbsp;1085</td><td align="left">&nbsp; <img src="http://hocmai.vn/theme/hocmai/pix/t/star_vote_active.gif" alt="start" align="top" border="0"> <img src="http://hocmai.vn/theme/hocmai/pix/t/star_vote_active.gif" alt="start" align="top" border="0"> <img src="http://hocmai.vn/theme/hocmai/pix/t/star_vote_active.gif" alt="start" align="top" border="0"> <img src="http://hocmai.vn/theme/hocmai/pix/t/star_vote_active.gif" alt="start" align="top" border="0"> <img src="http://hocmai.vn/theme/hocmai/pix/t/star_vote_blur.gif" alt="start" align="top" border="0"></td><td align="right" class="quiz_numberattempts">Số người làm bài:  64430</td><td width="10" colspan="2"></td>
                        </tr>
                    </tbody></table>

            </div>
        </div>
        <div class="boxfooter"><div><div></div></div></div>
    </div>
</div> <!--wrap_doTest_center -->
<?php
include 'Footer.php';
?>
