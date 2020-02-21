<?php
if (!function_exists('sinDegree')) {

    function sinDegree($variable)
    {
        return round(sin($variable * pi() / 180), 14);
    }
}

if (!function_exists('cosDegree')) {

    function cosDegree($variable)
    {
        return round(cos($variable * pi() / 180),14);
    }
}

if (!function_exists('tanDegree')) {

    function tanDegree($variable)
    {
        return round(tan($variable * pi() / 180),14);
    }
}

if (!function_exists('asinDegree')) {

    function asinDegree($variable)
    {
        return round(asin($variable) * (180/pi()),14);
    }
}

if (!function_exists('acosDegree')) {

    function acosDegree($variable)
    {
        return round(acos($variable) * (180/pi()),14);
    }
}

if (!function_exists('atanDegree')) {

    function atanDegree($variable)
    {
        return round(atan($variable) * (180/pi()),14);
    }
}

if (!function_exists('formatDMS')) {

    function formatDMS($variable)
    {   
        $da = floor(abs($variable));
        if($variable < 0){
          $da = (floor(abs($variable)) - floor(abs($variable)) * 2);
          $da == 0 ? $da = -$da : $da = $da;
        }
        $ma = abs((($variable) - $da) * 60);
        $mb = floor($ma);
        $sa = $ma - $mb;
        $sb = round((($sa/60) * 3600) ,2);
        $hasil = $da . "° " . $mb . "' " . $sb . "\"";
        return $hasil;
    }
}

if (!function_exists('formatJam')) {

    function formatJam($variable, $satuan)
    {   
        $variable < 0 ? $variable += 24 : $variable = $variable;
        $da = floor(abs($variable));
        if($variable < 0){
          $da = (floor(abs($variable)) - floor(abs($variable)) * 2);
        }
        $ma = abs((($variable) - $da) * 60);
        $mb = floor($ma);
        $sa = $ma - $mb;
        $sb = round((($sa/60) * 3600) ,2);
        $hasil = $da . ":" . $mb . ":" . $sb . " " . $satuan;
        return $hasil;
    }
}
if (!function_exists('cariHari')) {

    function cariHari($hariIni)
    {   
        $day = $hariIni->day;
        $month = $hariIni->month;
        $year = $hariIni->year;

        if($month < 3){
            $month += 12;
            $year -= 1;
        }

        if($day < 15 && $month <= 10 && $year <= 1582){
            $B = 0;
        }else{
            $B = 2 - (int)($year / 100) + (int)((int)($year / 100) / 4);
        }
        $AM = (int)(365.25 * $year) + (int)(30.6001 * ($month + 1)) + $day + $B - 428;
        $Hr = $AM - (int)($AM / 7) * 7;
        $Psr = $AM - (int)($AM / 5) * 5;

        if($Hr == 1){
            $hari = "Sabtu";
        }elseif($Hr == 2){
            $hari = "Ahad";
        }elseif($Hr == 3){
            $hari = "Senin";
        }elseif($Hr == 4){
            $hari = "Selasa";
        }elseif($Hr == 5){
            $hari = "Rabu";
        }elseif($Hr == 6){
            $hari = "Kamis";
        }elseif($Hr == 7 || $Hr == 0){
            $hari = "Jumat";
        }

        if($Psr == 1){
            $pasaran = "Kliwon";
        }elseif($Psr == 2){
            $pasaran = "Legi";
        }elseif($Psr == 3){
            $pasaran = "Pahing";
        }elseif($Psr == 4){
            $pasaran = "Pon";
        }elseif($Psr == 5 || $Psr == 0){
            $pasaran = "Wage";
        }

        if($month == 10 && $year == 1582){
            if($day > 4 && $day < 15){
                $B = "Tanggal tidak tercatat di dalam sejarah";
                $AM = "Tanggal tidak tercatat di dalam sejarah";
                $hari = "Tanggal tidak tercatat di dalam sejarah";
                $pasaran = "Tanggal tidak tercatat di dalam sejarah";
            }
        }

        return [
            'B' => $B,
            'AM' => $AM,
            'Hari' => $hari,
            'Pasaran' => $pasaran
        ];
    }
}
if (!function_exists('angle')) {

    function angle($variable)
    {   
        // pembulatan
        $depan = floor(abs($variable));
        $belakang = abs($variable) - floor(abs($variable));
        if($variable < 0){
          $depan = floor(abs($variable)) - floor(abs($variable)) * 2;
          $belakang -= $belakang * 2;
        }
        if($depan >= 360 || $depan <= -360){
            $depan = $depan % 360;
        }
        // pembulatan
        return $depan + $belakang;
    }
}

if (!function_exists('pecahJam')) {

    function pecahJam($WIS, $e, $TZ, $BT)
    {   
        $LMT = angle($WIS - $e);
        $WD = angle($LMT + (($TZ * 15) - $BT) / 15);
        // pembulatan
        return [
            'WIS' => formatJam($WIS, 'WIS'),
            'LMT' => formatJam($LMT, 'LMT'),
            'WD' => formatJam($WD, 'WD'),
        ];
    }
}

if (!function_exists('desimalJam')) {

    function desimalJam($WIS, $e, $TZ, $BT)
    {   
        $LMT = angle($WIS - $e);
        $WD = angle($LMT + (($TZ * 15) - $BT) / 15);
        // pembulatan
        return [
            'WIS' => $WIS,
            'LMT' => formatImsak($LMT, "LMT"),
            'WD' => formatImsak($WD, "WD"), 
        ];
    }
}

if (!function_exists('formatImsak')) {

    function formatImsak($WIS, $satuan)
    {   
        // pembulatan
        $WIS < 0 ? $WIS += 24 : $WIS = $WIS;
        $da = floor(abs($WIS));
        if($WIS < 0){
          $da = (floor(abs($WIS)) - floor(abs($WIS)) * 2);
        }
        $ma = abs((($WIS) - $da) * 60);
        $mb = floor($ma);
        $sa = $ma - $mb;
        $sb = round((($sa/60) * 3600) ,2);
            if($mb < 10){
                $da -= 1;
                $mb += 50; 
            }else{
                $mb -= 10;
            }
        $hasil = $da . ":" . $mb . ":" . $sb . " " . $satuan;
        return $hasil;
    }
}

if (!function_exists('jeanMeus')) {

    function jeanMeus($date)
    {   
        // $date = \Carbon\Carbon::now();
        $A = (int)($date->year / 100);
        
        // Data Tes
        // $tahun = 2004;
        // $bulan = 1;
        // $hari = 1;

        $A = (int)($date->year / 100);
        $B = (int)($A / 4);
        $G = (2 - $A + $B);
    
        if($date->month < 3){
            $M = $date->month + 12;
            $Y = $date->year - 1;
        }else{
            $M = $date->month;
            $Y = $date->year;
        }
        // Data Tes
        // if($bulan < 3){
        //     $M = $bulan + 12;
        //     $Y = $tahun - 1;
        // }else{
        //     $M = $bulan;
        //     $Y = $tahun;
        // }
    
        $W = (12 + (30 / 60) - 7) / 24;
        $JDa = (int)(365.25 * $Y);
        $JDb = (int)(30.6001 * ($M + 1));
        //Julian Date
        $JD = $JDa + $JDb + $date->day + 1720994.5 + $W + $G; 
        $T = ($JD - 2415020) / 36525;
        $WSa = (279.69668 + 36000.76892 * $T + 0.0003025 * pow($T, 2)) / 360;
        //Wasatus Syams
        $WS = ($WSa -(int)$WSa) * 360; 
        $KSa = (358.47583 + 35999.04975 * $T - 0.00015 * pow($T, 2) - 0.0000033 * pow($T, 3)) / 360;
        //Khosoh Syams
        $KS = ($KSa -(int)$KSa) * 360;
        // Ta'dilu Syams
        $TDS = (1.91946 - 0.004789 * $T - 0.000014 * pow($T, 2)) * sinDegree($KS) + (0.020094 - 0.0001 * $T) * sinDegree(2 * $KS) + 0.000293 * sinDegree(3 * $KS);
        //Thulusy Syams
        $TS = $WS + $TDS;
        // Maillul Kulli 
        $Mkl = 23.452294 - 0.0130125 * $T - 0.000000164 * pow($T, 2) + 0.000000503 * pow($T, 3);
        // Mailusy Syams
        $Dek = asinDegree(sinDegree($TS) * sinDegree($Mkl));
        $QA = 0.5 * $Mkl;
        $A = round(pow(tanDegree($QA), 2), 14);
        $E1 = round((0.01675104 - 0.0000418 * $T), 14);
        $E2 = round((0.000000126 * pow($T, 2)), 14);
        $E = round(($E1 + $E2), 14);
        $Q1 = round($A * sinDegree(2 * $WS), 14);
        $Q2 = round(2 *$E * sinDegree($KS), 14);
        $Q3 = round((4 * $E * $A * sinDegree($KS) * cosDegree(2 * $WS)),14);
        $Q4 = round((0.5 * pow($A, 2) * sinDegree(4 * $WS)), 14);
        $Q5 = round((1.25 * pow($E, 2) * sinDegree(2 * $KS)), 14);
        $Q = round(($Q1 - $Q2 + $Q3 - $Q4 - $Q5),14);
        // Daqoiqut Tafawut
        $W = ($Q * 57.29577951) / 15;
        return [
            'JD' => $JD,
            'WS' => $WS,
            'KS' => $KS,
            'TDS' => $TDS,
            'TS' => $TS,
            'Mkl' => $Mkl,
            'Dek' => $Dek,
            'W' => $W
        ];
    }
}