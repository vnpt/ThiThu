<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class IndexControllerAction {

    public function viewHomePage() {
        require APPLICATION_PATH . '/views/defaut/HomePage.php';
    }

    public function chuanBi() {
        require APPLICATION_PATH . '/views/defaut/ChuanBi.php';
    }

    public function lamBai() {
        if (isset($_SESSION["username"])) {
            $userName = $_SESSION["username"];
            $data = createExamByExamLevel($userName); // data chứa mảng 50 câu hỏi đã được tạo ra bằng function createExamByExamLevel
            require APPLICATION_PATH . '/views/defaut/BaiThi.php';
        } else {
            $results["status"] = "Bạn chưa đăng nhập";
            header("location:index.php");
        }
    }

    public function nopBai() {


        foreach ($_POST["answer"] as $key => $array)
            foreach ($array as $key1 => $value)
                echo $value;
    }

    public function dangKi() {
        
    }

    public function dangNhap() {
        if ($_POST['login']) {
            $user_name = $_POST['user_name'];
            $password = $_POST['user_password'];
            $data = UserModel::checkLogin($user_name, $password);
            if ($data == NULL)
                echo "dang nhap khong thanh cong";
            else {
                $_SESSION["username"] = $user_name;
                header("location:admin.php?typeManager=homePage");
            }
        } else {
            require APPLICATION_PATH . '/views/defaut/Login.php';
        }
    }

    /* =======================================================================================================
     * tạo đề thi dựa vào thông tin người dùng hiện thời đang có
     * input:   thông tin người dùng
     *          lịch sử 5 bài làm gần nhất
     * oupt:    bài thi phù hợp trình độ
      ======================================================================================================= */

    public function createExamByExamLevel($userName) {
        $user = UserModel::getByUserName($userName);
        $userId = $user->getUser_id();
        $dataTest = null;
        $user_level = $user->getUser_level();
        $level_exam_current = $user->getLevel_exam_current();
        $exam = array();

        if ($user_level == 0) {
            //nếu level = 0: chứng tỏ là lần đầu vào và ko nhập trình độ lúc đăng kí
            //=> cho bài thi với mức độ khó bằng mức độ khó của đề thi đại học chuẩn của bộ giáo dục
            // tức là mức độ khó là 125
            // cho ra bài thi đại học chuẩn
            for ($chuong = 1; $chuong<= 8 ; $chuong++) {
                $soCauTrongChuong = calcQuestion(0, $chuong);// nếu giá trị trả về  = null (chưa xử lý)
                $exam[$chuong] = $soCauTrongChuong;
            }
        } else {
            //lấy về thông tin người dùng liên quan đến bài thi tbl_results
            $data = ResulstModel::get5ExamRecent($userId);
            $examResults = $data["results"];
            //tính điểm trung bình 5 bài thi gần nhất
            $diemTB = 0;
            $count = 0;
            foreach ($examResults as $examResult) {
                $diemTB += $examResult->getTest_scores();
                $count++;
            }
            $diemTB = $diemTB / $count;
            $doTang = 0;
            if (100 >= $diemTB && $diemTB >= 75)
                $doTang = 5;
            elseif (65 > $diemTB && $diemTB >= 45) {
                $doTang = -10;
            } elseif (45 > $diemTB && $diemTB >= 0) {
                $doTang = -15;
            }
            //thông tin bài thi gần nhất
            $chuong = 0;
            $test_detai_core = $examResults[0]->getTest_detail_scores();
            $detai_cores = explode("-", $test_detai_core);
            foreach ($detai_cores as $detai_core) {
                $chuong++;
                $sores = explode(":", $detai_core);
                $doKho = $sores[0];
                $soCauTrongChuong = calcQuestion($doKho, $chuong);// nếu giá trị trả về  = null (chưa xử lý)
                $exam[$chuong] = $soCauTrongChuong;
            }
            
            if ($doTang == 0) {      
            }else{
                $chuong = 0;
                $rate = array();
                foreach ($detai_cores as $detai_core) {
                    $chuong++;
                    $sores = explode(":", $detai_core);
                    $rate[$chuong] = $sores[1]/$sores[0];                    
                }
                if($doTang <0){
                        //tìm chương có rate cao nhất để giảm 70% độ khó
                        $giam_1 = (int)((abs($doTang)*70) / 100);
                        $giam_2 = abs($doTang) - $giam_1;
                        $max = 0;
                        $chuong_1 = 0;
                        for($pos = 1; $pos <= 8 ; $pos++){
                            if($rate[$pos]>$max){
                                $max = $rate[$pos];
                                $chuong_1 = $pos;
                            }
                        }
                        $doKho = $exam[$chuong_1]["dokho"]-$giam_1;
                        $soCauTrongChuong = calcQuestion($doKho, $chuong_1);// nếu giá trị trả về  = null (chưa xử lý)
                        $exam[$chuong_1] = $soCauTrongChuong;
                        
                        //tìm chương có rate cao thứ 2 để giảm 30% độ khó
                        $max = 0;
                        $chuong_2 = 0;
                        for($pos = 1; $pos <= 8 ; $pos++){
                            if($pos == $chuong_1){
                                continue;
                            }
                            if($rate[$pos] < $max){
                                $max = $rate[$pos];
                                $chuong_2 = $pos;
                            }
                        }
                        $doKho = $exam[$chuong_2]["dokho"]-$giam_2;
                        $soCauTrongChuong = calcQuestion($doKho, $chuong_2);// nếu giá trị trả về  = null (chưa xử lý)
                        $exam[$chuong_2] = $soCauTrongChuong;
                    
                }  else {
                        //tìm chương có rate thấp nhất để tăng 70% độ khó
                        $tang_1 = (int)(($doTang*70) / 100);
                        $tang_2 = $doTang - $tang_1;
                        $min = 10000;
                        $chuong_1 = 0;
                        for($pos = 1; $pos <= 8 ; $pos++){
                            if($rate[$pos]<$min){
                                $min = $rate[$pos];
                                $chuong_1 = $pos;
                            }
                        }
                        $doKho = $exam[$chuong_1]["dokho"]+$tang_1;
                        $soCauTrongChuong = calcQuestion($doKho, $chuong_1); // nếu giá trị trả về  = null (chưa xử lý)
                        $exam[$chuong_1] = $soCauTrongChuong;
                        
                        //tìm chương có rate thấp nhất thứ 2 để tăng 30% độ khó
                        $min = 10000;
                        $chuong_2 = 0;
                        for($pos = 1; $pos <= 8 ; $pos++){
                            if($pos == $chuong_1){
                                continue;
                            }
                            if($rate[$pos] < $min){
                                $min = $rate[$pos];
                                $chuong_2 = $pos;
                            }
                        }
                        $doKho = $exam[$chuong_2]["dokho"]+$tang_2;
                        $soCauTrongChuong = calcQuestion($doKho, $chuong_2);// nếu giá trị trả về  = null (chưa xử lý)
                        $exam[$chuong_2] = $soCauTrongChuong;
                    
                }
                    
            }
            
            //đến đây là đã tính xong mọi số lượng câu khó dễ của từng chương rồi
            //thao tác với csdl để lấy ra 50 câu hỏi thỏa mãn độ khó và thuộc vào chương chỉ định
            $listQuestion = array();
            for($chuong = 1; $chuong <= 8 ; $chuong++){
                $a = $exam[$chuong]["a"];
                $b = $exam[$chuong]["b"];
                $c = $exam[$chuong]["c"];
                $d = $exam[$chuong]["d"];
                $listQuestion[] = QuestionModel::getByGroupId_Level($chuong, 4, $a);
                $listQuestion[] = QuestionModel::getByGroupId_Level($chuong, 3, $b);
                $listQuestion[] = QuestionModel::getByGroupId_Level($chuong, 2, $c);
                $listQuestion[] = QuestionModel::getByGroupId_Level($chuong, 1, $d);
            }
            return $listQuestion;
            
        }
    }

    public function calcQuestion($Dokho, $chuong) {
        switch ($chuong) {
            case 8:
                $A = 0;$B = 1;$C = 1;$D = 1;
                $tongSoCau = 3;
                break;
            case 7:
                $A = 1;$B = 1;$C = 1;$D = 2;
                $tongSoCau = 5;
                break;
            case 4: case 5:
                $A = 1;$B = 1;$C = 2;$D = 2;
                $tongSoCau = 6;
                break;
            case 1: case 3:
                $A = 1;$B = 2;$C = 2;$D = 2;
                $tongSoCau = 7;
                break;
            case 2: case 6:
                $A = 2;$B = 2;$C = 2;$D = 2;
                $tongSoCau = 8;
                break;
            default:
                return null;
        }
        if($Dokho == 0){
            $Dokho = $A*4 + $B*3 + $C*2 + $D*1;
        }

        $result_a = 0;
        $result_b = 0;
        $result_c = 0;
        $result_d = 0;
        $distance = 10000;
        $distance_A = 10000;
        $distance_B = 10000;
        $distance_C = 10000;
        $distance_D = 10000;
        for ($a = 0; $a <= $tongSoCau; $a++) {
            for ($b = 0; $b <= $tongSoCau; $b++) {
                for ($c = 0; $c <= $tongSoCau; $c++) {
                    for ($d = 0; $d <= $tongSoCau; $d++) {
                        if ((4 * $a + 3 * $b + 2 * $c + 1 * $d) == $Dokho && ($a + $b + $c + $d == $tongSoCau)) { // 10  = độ khó của chương. 7 = số lượng câu trong chương đó
                            $temp = abs($a - $A) + abs($b - $B) + abs($c - $C) + abs($d - $D); // khoảng cách này được tính theo từng chương
                            //echo $a."  ".$b."  ".$c."  ".$d."  "."Khoang cách = ".$temp;
                            //echo "<br></br>";

                            if ($temp < $distance) {
                                $distance = $temp;
                                $distance_A = abs($a - $A);
                                $distance_B = abs($b - $B);
                                $distance_C = abs($c - $C);
                                $distance_D = abs($D - $D);
                                $result_a = $a;
                                $result_b = $b;
                                $result_c = $c;
                                $result_d = $d;
                            } elseif ($temp == $distance) {
                                // nếu tổng khoảng cách $distance vừa tính bằng kết quả thấp nhất đã lưu, thì 
                                //Ưu tiên độ chênh lệch thấp nhất so với số câu chuẩn
                                if ($distance_A == 0) {
                                    if ($distance_B > abs($b - $B)) {
                                        $result_a = $a;
                                        $result_b = $b;
                                        $result_c = $c;
                                        $result_d = $d;
                                    }
                                } elseif ($distance_A > abs($a - $A))
                                    $result_a = $a; $result_b = $b;
                                $result_c = $c;
                                $result_d = $d;
                            }
                        }
                    }
                }
            }
        }
        //echo "Ket qua la ::::::   ".$result_a."  ".$result_b."  ".$result_c."  ".$result_d."  "."Khoang cách = ".$distance;
        //echo "<br></br>";
        $results = array("a" => $result_a, "b" => $result_b, "c" => $result_c, "d" => $result_d, "dokho" =>$Dokho);
        return $results;
    }

    //Xây dựng function tạo đề thi từ độ khó nhập vào
}

?>
