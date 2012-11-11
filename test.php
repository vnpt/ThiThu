<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//function tính số lượng từng loại câu hỏi cho mỗi chương
//input: id của chương, độ khó của chương.
function calcQuestion($Dokho, $chuong) {
    switch ($chuong) {
        case 8:
            $A = 0;
            $B = 1;
            $C = 1;
            $D = 1;
            $tongSoCau = 3;
            break;
        case 7:
            $A = 1;
            $B = 1;
            $C = 1;
            $D = 2;
            $tongSoCau = 5;
            break;
        case 4: case 5:
            $A = 1;
            $B = 1;
            $C = 2;
            $D = 2;
            $tongSoCau = 6;
            break;
        case 1: case 3:
            $A = 1;
            $B = 2;
            $C = 2;
            $D = 2;
            $tongSoCau = 7;
            break;
        case 2: case 6:
            $A = 2;
            $B = 2;
            $C = 2;
            $D = 2;
            $tongSoCau = 8;
            break;
        default:
            $A = 0;
            $B = 0;
            $C = 0;
            $D = 0;
            $tongSoCau = 0;
            break;
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

$results = calcQuestion(15, 7);


//xử lý xâu test_detail_scores: 
//echo "test";
//$detai_cores = '1:2-3:4-5:6-7:8';
//$results = explode("-", $detai_cores);
//foreach ($results as $result ){
//    $sores = explode(":", $result);
//    echo "ti le = ".($sores[0]/$sores[1]);
//    echo "<br></br>";
//}

$test_detai_core = '16:2-20:4-16:6-13:8-13:8-20:8-11:8-6:8';
$detai_cores = explode("-", $test_detai_core);
$chuong = 0;
$exam = array();
foreach ($detai_cores as $detai_core) {
    $chuong++;
    $sores = explode(":", $detai_core);
    $doKho = $sores[0];
    $soCauTrongChuong = calcQuestion($doKho, $chuong);
    $exam[$chuong] = $soCauTrongChuong;
}
//echo $exam[$chuong]["dokho"];


echo (int)((5*70) / 100);
$a = array();
for($i = 1; $i <3 ; $i++){
    $a[] = $i;
}

print_r($a);
?>
