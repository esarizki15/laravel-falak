<?php
use App\Hari;
use App\Bulan;

if (!function_exists('sinDegree')) {

    function sinDegree($variable)
    {
        return sin($variable * pi() / 180);
    }
}

if (!function_exists('cosDegree')) {

    function cosDegree($variable)
    {
        return cos($variable * pi() / 180);
    }
}

if (!function_exists('tanDegree')) {

    function tanDegree($variable)
    {
        return tan($variable * pi() / 180);
    }
}

if (!function_exists('asinDegree')) {

    function asinDegree($variable)
    {
        return asin($variable) * (180/pi());
    }
}

if (!function_exists('acosDegree')) {

    function acosDegree($variable)
    {
        return acos($variable) * (180/pi());
    }
}

if (!function_exists('atanDegree')) {

    function atanDegree($variable)
    {
        return atan($variable) * (180/pi());
    }
}

if (!function_exists('shalat')) {

    function shalat($BT, $LT, $e, $d, $tanggal, $TZ, $TT, $sd)
    {
        if ($tanggal != null){
            $e == null ? $e = jeanMeus($tanggal)['W'] : $e = $e;
            $d == null ? $d = jeanMeus($tanggal)['Dek'] : $d = $d;
            $sd == null ? $sd = jeanMeus($tanggal)['sd'] : $sd = $sd;
        }
        // Ashar
        $B = $LT - $d;
        $H = atanDegree(1 / ((tanDegree($B) + 1)));
        $F = -tanDegree($LT) * tanDegree($d);
        $G = cosDegree($LT) * cosDegree($d);
        $As = 12 + acosDegree($F + sinDegree($H) / $G) / 15;

        // Maghrib
        $Dip = (1.76 / 60) * sqrt($TT);
        $h = -($sd + (34.5 / 60) + $Dip) - 0.0024;
        $Mg = 12 + acosDegree($F + (sinDegree($h) / $G)) /15;

        // Isya
        $isya = 12 + acosDegree($F + sinDegree(-18) / $G) / 15;
        
        // Shubuh
        $subuh = 12 - acosDegree($F + sinDegree(-20) / $G) / 15;
        
        // Terbit
        $terbit = 12 - acosDegree($F + sinDegree($h) / $G) / 15;

        // Dhuha dan I'ed
        $dhuha = 12 - acosDegree($F + sinDegree(4.5) / $G) / 15;

        return [
            'Dzuhur' => [
                'WIS' => pecahJam(12, $e, $TZ, $BT)['WIS'],
                'LMT' => pecahJam(12, $e, $TZ, $BT)['LMT'],
                'WD' => pecahJam(12, $e, $TZ, $BT)['WD']
            ],
            'Ashar' => [
                'B' => formatDMS(abs($B)),
                'H' => formatDMS($H),
                'F' => formatDMS($F),
                'G' => formatDMS($G),
                'WIS' => pecahJam($As, $e, $TZ, $BT)['WIS'],
                'LMT' => pecahJam($As, $e, $TZ, $BT)['LMT'],
                'WD' => pecahJam($As, $e, $TZ, $BT)['WD'],
            ],
            'Maghrib' => [
                'Dip' => formatDMS($Dip),
                'h' => formatDMS($h),
                'WIS' => pecahJam($Mg, $e, $TZ, $BT)['WIS'],
                'LMT' => pecahJam($Mg, $e, $TZ, $BT)['LMT'],
                'WD' => pecahJam($Mg, $e, $TZ, $BT)['WD'],
                'UTC' => pecahJam($Mg, $e, $TZ, $BT)['UTC'],
            ],
            'Isya' => [
                'WIS' => pecahJam($isya, $e, $TZ, $BT)['WIS'],
                'LMT' => pecahJam($isya, $e, $TZ, $BT)['LMT'],
                'WD' => pecahJam($isya, $e, $TZ, $BT)['WD']
            ],
            'Subuh' => [
                'WIS' => pecahJam($subuh, $e, $TZ, $BT)['WIS'],
                'LMT' => pecahJam($subuh, $e, $TZ, $BT)['LMT'],
                'WD' => pecahJam($subuh, $e, $TZ, $BT)['WD']
            ],
            'Imsak' => [
                'WIS' => formatImsak($subuh, "WIS"),
                'LMT' => desimalJam($subuh, $e, $TZ, $BT)['LMT'],
                'WD' => desimalJam($subuh, $e, $TZ, $BT)['WD']
            ],
            'Terbit' => [
                'h' => formatDMS($h),
                'WIS' => pecahJam($terbit, $e, $TZ, $BT)['WIS'],
                'LMT' => pecahJam($terbit, $e, $TZ, $BT)['LMT'],
                'WD' => pecahJam($terbit, $e, $TZ, $BT)['WD']
            ],
            'Dhuha' => [
                'WIS' => pecahJam($dhuha, $e, $TZ, $BT)['WIS'],
                'LMT' => pecahJam($dhuha, $e, $TZ, $BT)['LMT'],
                'WD' => pecahJam($dhuha, $e, $TZ, $BT)['WD']
            ],
        ];
    }
}
if (!function_exists('jadwalShalat')) {

    function jadwalShalat($BT, $LT, $e, $d, $tanggalAwal, $tanggalAkhir, $TZ, $TT, $sd)
    {
        $kabisatBasithoh = kabisatBasithoh($tanggalAwal->year);
        if ($kabisatBasithoh == 'kabisat'){
            $jenisTahun = 1;
        }else{
            $jenisTahun = 0;
        }
        $tglAwal = $tanggalAwal->day;
        $bulanAwal = $tanggalAwal->month;
        $tahunAwal = $tanggalAwal->year;
        
        $tglAkhir = $tanggalAkhir->day;
        $bulanAkhir = $tanggalAkhir->month;
        $tahunAkhir = $tanggalAkhir->year;

        $hari = 0;
        if(($bulanAkhir - $bulanAwal) > 0){
            for($i = $bulanAwal; $i < $bulanAkhir; $i++){
                $hari += Bulan::where('jenis_tahun', $jenisTahun)->where('jenis_bulan', 'M')->where('nomor', $i)->first()->nilai;
            }
            $hari += $tglAkhir + 1;
            $hari -= $tglAwal;
        }else{
            $hari += Bulan::where('jenis_tahun', $jenisTahun)->where('jenis_bulan', 'M')->where('nomor', $bulanAwal)->first()->nilai;
        }
        for($a  = 0; $a <= $hari; $a++){
            $waktu = [
                'Dzuhur' => [
                    'WIS' => $hari,
                ]    
            ];
        }
        // for($i = $tanggalAwal; $i < $tanggalAkhir; $i++){
        //   $dz = [ 'Dzuhur' => [
        //         'WIS' => pecahJam(12, $e, $TZ, $BT)['WIS'],
        //     ]];
        // };
        return [ 
            $waktu 
        ];
    }
}

if (!function_exists('hilal')) {

    function hilal($BT, $LT, $e, $d, $tanggal, $TZ, $TT)
    {   
        $Aa = (int)($tanggal->year / 100);
        $A = (int)($Aa / 4);
        $B = 2 - $Aa + $A;
        $tanggal < \Carbon\Carbon::create("1582-10-15") ? $B = 0 : $B = $B;
        
        $sd = jeanMeus($tanggal)['sd'];
        $maghribUTC = shalat($BT, $LT, $e, $d, $tanggal, 0, $TT, $sd)['Maghrib']['UTC'];
        
        $JDa = (365.25 * ($tanggal->year + 4716));
        $JDb = (int)(30.6001 * (10 + 1));
        $JDc = $tanggal->day + ($maghribUTC / 24) + $B - 1524.5 ;
        $JD = $JDa + $JDb + $JDc;
        $T = ($JD - 2451545) / 36525;

        $Sa = (280.46645 + (36000.76983 * $T)) / 360;
        $S = ($Sa - (int)$Sa) * 360;

        $ma = (357.52910 + (35999.05030 * $T)) / 360;
        $m = ($ma - (int)$ma) * 360;

        $Na = (125.04 - (1934.136 * $T)) / 360;
        $N = ($Na - (int)$Na) * 360;

        $K1 = (17.264 / 3600) * sinDegree($N) + (0.206 / 3600) * sinDegree(2 * $N);
        $K2 = (-1.264 / 3600) * sinDegree(2 * $S);
        
        $R1 = (9.23 / 3600) * cosDegree($N) - (0.090 / 3600) * cosDegree(2 * $N);
        $R2 = (0.548 / 3600) * cosDegree(2 * $S);

        $Q1 = 23.43929111 + $R1 + $R2 - (46.8150 / 3600) * $T;
        $E = (6898.06 / 3600) * sinDegree($m) + (72.095 / 3600) * sinDegree(2 * $m) + (0.966 / 3600) * sinDegree(3 * $m);
        $S1 = $S + $E + $K1 + $K2 - (20.47 / 3600);
        $d = asinDegree(sinDegree($S1) * sinDegree($Q1));
        $PT = atanDegree(tanDegree($S1) * cosDegree($Q1));
        if($S1 >= 90  && $S1 < 270){
            $PT += 180;
        }else if($S1 >= 270  && $S1 <= 360){
            $PT += 360;
        }
        $eHilal = (-1.915 * sinDegree($m) + -0.02 * sinDegree(2 * $m) + 2.466 * sinDegree(2 * $S1) + -0.053 * sinDegree(4 * $S1)) / 15;
        $sdHilal = 0.267 / (1 - 0.017 * cosDegree($m));
        $Dip = (1.76 / 60) * sqrt($TT);
        $h = -($sdHilal + (34.5 / 60) + $Dip);
        $t = acosDegree(-tanDegree($LT) * tanDegree($d) + sinDegree($h) / cosDegree($LT) / cosDegree($d));
        $Grb = $t / 15 + (12 - $eHilal);
        $GrbWD = $Grb + (($TZ * 15) - $BT) / 15;
        $AzBarat = atanDegree(-sindegree($LT) / tanDegree($t) + cosDegree($LT) * tanDegree($d) / sinDegree($t));
        $AzUtara = $AzBarat + 270;
        $Ra = 1.00014 - 0.01671 * cosDegree($m) - 0.00014 * cosDegree(2 * $m);
        $R = $Ra * 149597870;
        // Data Matahari
        // Data Bulan
        $Ma = (218.31617 + 481267.88088 * $T) / 360;
        $M = ($Ma - (int)$Ma) * 360;
        $AaHilal = (134.96292 + 477198.86753 * $T) / 360;
        $AHilal = ($AaHilal - (int)$AaHilal) * 360;
        $Fa = (093.27283 + 483202.01873 * $T) / 360;
        $F = ($Fa - (int)$Fa) * 360;
        $Da = (297.85027 + 445267.11135 * $T) / 360;
        $D = ($Da - (int)$Da) * 360;
        $T1 = (22640 / 3600) * sinDegree($AHilal);
        $T2 = (-4586 / 3600) * sinDegree($AHilal - (2 * $D));
        $T3 = (2370 / 3600) * sinDegree(2 * $D);
        $T4 = (769 / 3600) * sinDegree(2 * $AHilal);
        $T5 = (-668 / 3600) * sinDegree($m);
        $T6 = (-412 / 3600) * sinDegree(2 * $F);
        $T7 = (-212 / 3600) * sinDegree((2 * $AHilal) - (2 * $D));
        $T8 = (-206 / 3600) * sinDegree($AHilal + $m - (2 * $D));
        $T9 = (192 / 3600) * sinDegree($AHilal + (2 * $D));
        $T10 = (-165 / 3600) * sinDegree($m - (2 * $D));
        $T11 = (148 / 3600) * sinDegree($AHilal - $m);
        $T12 = (-125 / 3600) * sinDegree($D);
        $T13 = (-110 / 3600) * sinDegree($AHilal + $m);
        $T14 = (-55 / 3600) * sinDegree((2 * $F) - (2 * $D));
        $C = $T1 + $T2 + $T3 + $T4 + $T5 + $T6 + $T7 + $T8 + $T9 + $T10 + $T11 + $T12 + $T13 + $T14;
        $Mo = ($M + $C + $K1 + $K2 - (20.47 / 3600));
        $A1 = $AHilal + $T2 + $T3 + $T5;
        $L1 = (18461 / 3600) * sinDegree($F) + (1010 / 3600) * sinDegree($AHilal + $F) + (1000 / 3600) * sinDegree($AHilal - $F) - (624 / 3600) * sinDegree($F - (2 * $D)) - (199 / 3600) * sinDegree($AHilal - $F - (2 * $D)) - (167 / 3600) * sinDegree($AHilal + $F - (2 * $D));
        $x = atanDegree(sinDegree($Mo) * tanDegree($Q1));
        $y = ($L1 + $x);
        $dc = asinDegree(sinDegree($Mo) * sinDegree($Q1) * sinDegree($y) / sinDegree($x));
        $PTc = acosDegree(cosDegree($Mo) * cosDegree($L1) / cosDegree($dc));
        if($Mo >= 180 && $Mo <= 360){
            $PTc = 360 - $PTc;
        }
        $tc = ($PT - $PTc) + $t;
        $hc = asinDegree(sinDegree($LT) * sinDegree($dc) + cosDegree($LT) * cosDegree($dc) * cosDegree($tc));

        $p = (384401 * (1 - pow(0.0549, 2)) / (1 + 0.0549 * cosDegree($A1 + $T1)));
        $p1 = $p / 384401;
        $HP = 0.9507 / $p1;
        $sdc = (0.5181 / $p1) / 2;
        $P = $HP * cosDegree($hc);
        $Ref = 0.0167 / tanDegree($hc + 7.31 / ($hc + 4.4));
        $hc1 = $hc - $P;
        if($hc1 >= 0){
            $hc1 += $sdc + $Ref + $Dip;
        }

        $AzcBarat = atanDegree(-sinDegree($LT) / tanDegree($tc) + cosDegree($LT) * tanDegree($dc) / sinDegree($tc));
        $AzcUtara = $AzcBarat + 270;
        $z = $AzcUtara - $AzUtara;
        $Dc = ($PTc - $PT) / 15;
        $AL = acosDegree(cosDegree(abs($hc1 - $h)) * cosDegree(abs($AzcUtara - $AzUtara)));
        $Cw = (1 -cosDegree($AL)) * $sdc * 60;
        $EL = acosDegree(cosDegree($Mo - $S1) * cosDegree($L1));
        $FIa = acosDegree(- cosDegree($EL));
        $FI = (1 + cosDegree($FIa)) / 2;
        $FIPersen = $FI * 100;
        $Ms = $GrbWD + $Dc;

        return [
            'Aa' => $Aa,
            'A' => $A,
            'B' => $B,
            'JDa' => $JDa,
            'JDb' => $JDb,
            'JDc' => $JDc,
            'JD' => $JD,
            'T' => $T,
            'S' => formatDMS($S),
            'm' => formatDMS($m),
            'N' => formatDMS($N),
            'K1' => formatDMS($K1),
            'K2' => formatDMS($K2),
            'R1' => formatDMS($R1),
            'R2' => formatDMS($R2),
            'Q1' => formatDMS($Q1),
            'E' => formatDMS($E),
            'S1' => formatDMS($S1),
            'd' => formatDMS($d),
            'PT' => formatDMS($PT),
            'e' => formatJam($eHilal, ""),
            'sd' => formatDMS($sdHilal),
            'Dip' => formatDMS($Dip),
            'h' => formatDMS($h),
            't' => formatDMS($t),
            'Grb' => [
                'LMT' => formatJam($Grb, "LMT"),
                'WD' => formatJam($GrbWD, "WD")
            ],
            'Az' => [
                'Barat' => formatDMS($AzBarat),
                'Utara' => formatDMS($AzUtara)
            ],
            'Ra' => $Ra . " (AU)",
            'R' => $R . " (Km)",
            'M' => formatDMS($M),
            'A' => formatDMS($AHilal),
            'F' => formatDMS($F),
            'D' => formatDMS($D),
            'T1' => formatDMS($T1),
            'T2' => formatDMS($T2),
            'T3' => formatDMS($T3),
            'T4' => formatDMS($T4),
            'T5' => formatDMS($T5),
            'T6' => formatDMS($T6),
            'T7' => formatDMS($T7),
            'T8' => formatDMS($T8),
            'T9' => formatDMS($T9),
            'T10' => formatDMS($T10),
            'T11' => formatDMS($T11),
            'T12' => formatDMS($T12),
            'T13' => formatDMS($T13),
            'T14' => formatDMS($T14),
            'C' => formatDMS($C),
            'Mo' => formatDMS($Mo),
            'A1' => formatDMS($A1),
            'L1' => formatDMS($L1),
            'x' => formatDMS($x),
            'y' => formatDMS($y),
            'dc' => formatDMS($dc),
            'PTc' => formatDMS($PTc),
            'tc' => formatDMS($tc),
            'hc' => formatDMS($hc),
            'p' => $p . " (km)",
            'p1' => $p1,
            'HP' => formatDMS($HP),
            'sdc' => formatDMS($sdc),
            'P' => formatDMS($P),
            'Ref' => formatDMS($Ref),
            'hc1' => formatDMS($hc1),
            'Azc' => [
                'Barat' => formatDMS($AzcBarat),
                'Utara' => formatDMS($AzcUtara)
            ],
            'z' => formatDMS($z),
            'Dc' => formatJam($Dc, ""),
            'AL' => formatDMS($AL),
            'Cw' => $Cw . " M",
            'EL' => formatDMS($EL),
            'FIa' => formatDMS($FIa),
            'FI' => $FI ." / " . round($FIPersen, 2) . "%",
            'Ms' => formatJam($Ms, "WD"),
            
        ];
    }
}

if (!function_exists('ijtima')) {

    function ijtima($tahun, $bulan, $jenis, $TZ)
    {   
        $HY = $tahun + ($bulan * 29.53) / 354.3671;
        $K = round(($HY - 1410) * 12) - $jenis;
        $T = $K / 1200;
        $JD = 2447740.652 + 29.53058868 * $K + 0.0001178 * pow($T, 2);
        $Ma = (207.9587074 + 29.10535608 * $K + -0.0000333 * pow($T, 2)) / 360;
        $M = ($Ma - (int)$Ma) * 360;
        // M'
        $MQa = (111.1791307 + 385.81691806 * $K + 0.0107306 * pow($T, 2)) / 360;
        $Mq = ($MQa - (int)$MQa) * 360;
        $Fa = (164.2162296 + 390.67050646 * $K + -0.0016528 * pow($T, 2)) / 360;
        $F = ($Fa - (int)$Fa) * 360;

        $T1 = (0.1734 - 0.000393 * $T) * sinDegree($M);
        $T2 = 0.0021 * sinDegree(2 * $M);
        $T3 = -0.4068 * sinDegree($Mq);
        $T4 = 0.0161 * sinDegree(2 * $Mq);
        $T5 = -0.0004 * sinDegree(3 * $Mq);
        $T6 = 0.0104 * sinDegree(2 * $F);
        $T7 = -0.0051 * sinDegree($M + $Mq);
        $T8 = -0.0074 * sinDegree($M - $Mq);
        $T9 = 0.0004 * sinDegree((2 * $F) + $M);
        $T10 = -0.0004 * sinDegree((2 * $F) - $M);
        $T11 = -0.0006 * sinDegree((2 * $F) + $Mq);
        $T12 = 0.0010 * sinDegree((2 * $F) - $Mq);
        $T13 = 0.0005 * sinDegree($M + (2 * $Mq));
        $MT = $T1 + $T2 + $T3 + $T4 + $T5 + $T6 + $T7 + $T8 + $T9 + $T10 + $T11 + $T12 + $T13; 

        $JDI = $JD + 0.5 + $MT;
        $W1 = ($JDI - (int)$JDI) * 24;
        $WD = $W1 + $TZ;

        if((int)$JDI < 2299161){
            $Z = (int)($JDI);
            $A = $Z;
        }else{
            $Z = (int)($JDI);
            $AA = (int)(($Z - 1867216.25) / 36524.25);
            $A = $Z + 1 + $AA - (int)($AA / 4);
        }

        $B = $A + 1524;
        $C = (int)(($B - 122.1) / 365.25);
        $D = (int)(365.25 * $C);
        $E = (int)(($B - $D) / 30.6001);

        $TGL = (int)($B - $D - (int)(30.6001 * $E));
        $WD > 24 ? $TGL += 1 : $TGL = $TGL;
        $E < 13.5 ? $BLN = $E -1 : $BLN = $E;

        // Harus di uji
        $BLN < 2.5 ? $THN = $C - 4715 : $THN = $C - 4716;

        $PA = (int)($Z) + 2;

        $date =  $THN . "-" . $BLN . "-" . $TGL;
        return [
            'HY' => $HY,
            'K' => $K,
            'T' => $T,
            'JD' => $JD,
            'M' => formatDMS($M),
            'Mq' => formatDMS($Mq),
            'F' => formatDMS($F),
            'T1' => formatDMS($T1),
            'T2' => formatDMS($T2),
            'T3' => formatDMS($T3),
            'T4' => formatDMS($T4),
            'T5' => formatDMS($T5),
            'T6' => formatDMS($T6),
            'T7' => formatDMS($T7),
            'T8' => formatDMS($T8),
            'T9' => formatDMS($T9),
            'T10' => formatDMS($T10),
            'T11' => formatDMS($T11),
            'T12' => formatDMS($T12),
            'T13' => formatDMS($T13),
            'MT' => formatDMS($MT),
            'JDI' => $JDI,
            'W1' => formatJam($W1, "UT"),
            'WD' => formatJam($WD, "WD"),
            'A' => $A,
            'B' => $B,
            'C' => $C,
            'D' => $D,
            'E' => $E,
            'TGL' => $TGL,
            'BLN' => $BLN,
            'THN' => $THN,
            'Hari' => cariHari(\Carbon\Carbon::create($date))['Hari'],
            'Pasaran' => cariHari(\Carbon\Carbon::create($date))['Pasaran'],
        ];
    }
}

if (!function_exists('quarter')) {

    function quarter($tahun, $bulan, $jenis, $TZ)
    {   
        $HY = $tahun + ($bulan * 29.53) / 354.3671;
        $K = round(($HY - 1410) * 12) - $jenis;
        $T = $K / 1200;
        $JD = 2447740.652 + 29.53058868 * $K + 0.0001178 * pow($T, 2);
        $Ma = (207.9587074 + 29.10535608 * $K + -0.0000333 * pow($T, 2)) / 360;
        $M = ($Ma - (int)$Ma) * 360;
        // M'
        $MQa = (111.1791307 + 385.81691806 * $K + 0.0107306 * pow($T, 2)) / 360;
        $Mq = ($MQa - (int)$MQa) * 360;
        $Fa = (164.2162296 + 390.67050646 * $K + -0.0016528 * pow($T, 2)) / 360;
        $F = ($Fa - (int)$Fa) * 360;

        $T1 = (0.1721 - 0.0004 * $T) * sinDegree($M);
        $T2 = 0.0021 * sinDegree(2 * $M);
        $T3 = -0.6280 * sinDegree($Mq);
        $T4 = 0.0089 * sinDegree(2 * $Mq);
        $T5 = -0.0004 * sinDegree(3 * $Mq);
        $T6 = 0.0079 * sinDegree(2 * $F);
        $T7 = -0.0119 * sinDegree($M + $Mq);
        $T8 = -0.0047 * sinDegree($M - $Mq);
        $T9 = 0.0003 * sinDegree((2 * $F) + $M);
        $T10 = -0.0004 * sinDegree((2 * $F) - $M);
        $T11 = -0.0006 * sinDegree((2 * $F) + $Mq);
        $T12 = 0.0021 * sinDegree((2 * $F) - $Mq);
        $T13 = 0.0003 * sinDegree($M + (2 * $Mq));
        $T14 = 0.0004 * sinDegree($M - (2 * $Mq));
        $T15 = -0.0003 * sinDegree((2 * $M) + $Mq);
        $MT1 = $T1 + $T2 + $T3 + $T4 + $T5 + $T6 + $T7 + $T8 + $T9 + $T10 + $T11 + $T12 + $T13 + $T14 + $T15; 
        $MT = $MT1 + (0.0028 - (0.0004 * cosDegree($Mq)) + (0.0003 * cosDegree($Mq)));
        $JDI = $JD + 0.5 + $MT;
        $W1 = ($JDI - (int)$JDI) * 24;
        $WD = $W1 + $TZ;

        if((int)$JDI < 2299161){
            $A = $JDI;
        }else{
            $Z = (int)($JDI);
            $AA = (int)(($Z - 1867216.25) / 36524.25);
            $A = $Z + 1 + $AA - (int)($AA / 4);
        }

        $B = $A + 1524;
        $C = (int)(($B - 122.1) / 365.25);
        $D = (int)(365.25 * $C);
        $E = (int)(($B - $D) / 30.6001);

        $TGL = (int)($B - $D - (int)(30.6001 * $E));
        $WD > 24 ? $TGL += 1 : $TGL = $TGL;

        $E < 13.5 ? $BLN = $E -1 : $BLN = $E;

        // ?Harus di uji
        $BLN < 2.5 ? $THN = $C - 4715 : $THN = $C - 4716;

        $PA = (int)($Z) + 2;

        $date =  $THN . "-" . $BLN . "-" . $TGL ;
        return [
            'HY' => $HY,
            'K' => $K,
            'T' => $T,
            'JD' => $JD,
            'M' => formatDMS($M),
            'Mq' => formatDMS($Mq),
            'F' => formatDMS($F),
            'T1' => formatDMS($T1),
            'T2' => formatDMS($T2),
            'T3' => formatDMS($T3),
            'T4' => formatDMS($T4),
            'T5' => formatDMS($T5),
            'T6' => formatDMS($T6),
            'T7' => formatDMS($T7),
            'T8' => formatDMS($T8),
            'T9' => formatDMS($T9),
            'T10' => formatDMS($T10),
            'T11' => formatDMS($T11),
            'T12' => formatDMS($T12),
            'T13' => formatDMS($T13),
            'T14' => formatDMS($T14),
            'T15' => formatDMS($T15),
            'MT' => formatDMS($MT),
            'JDI' => $JDI,
            'W1' => formatJam($W1, "UT"),
            'WD' => formatJam($WD, "WD"),
            'A' => $A,
            'B' => $B,
            'C' => $C,
            'D' => $D,
            'E' => $E,
            'TGL' => $TGL,
            'BLN' => $BLN,
            'THN' => $THN,
            'Hari' => cariHari(\Carbon\Carbon::create($date))['Hari'],
            'Pasaran' => cariHari(\Carbon\Carbon::create($date))['Pasaran'],
        ];
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
        $variable > 24 ? $variable -= 24 : $variable = $variable;
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

if (!function_exists('conversiMiladiHijri')) {

    function conversiMiladiHijri($tanggals, $AW, $hari, $bulan, $tahun)
    {   
        $B = cariHari($tanggals)['B'];
        $AM = cariHari($tanggals)['AM'];
        $AH = $AM - $AW;
        $tahunHijri = (int)($AH / 354.3671);
        $hariA = $tahunHijri * 354.3671;
        $haria = $AH - $hariA;
        $haria < 0 ? $hari = floor(($haria)) : $hari = ceil($haria); 
        $jenis = kabisatBasithohHijri(abs($tahunHijri));

        if($jenis == "basithoh"){
            $hari < 0 ? $hari += 354 : $hari == $hari;
            $bulan = Bulan::where('jenis_tahun', 0)->where('jenis_bulan', 'H')->where('jumlah', '>=', ($hari))->first();
            $namaBulan = $bulan->nama;
            $tanggal = Bulan::where('jenis_tahun', 0)->where('jenis_bulan', 'H')->where('jumlah', '<', ($hari))->latest('id')->first();
            $jumlahTanggal = $tanggal->jumlah;
        }
        else{
            $hari < 0 ? $hari += 354 : $hari == $hari;
            $bulan = Bulan::where('jenis_tahun', 1)->where('jenis_bulan', 'H')->where('jumlah', '>=', ($hari))->first();
            $namaBulan = $bulan->nama;
            $tanggal = Bulan::where('jenis_tahun', 1)->where('jenis_bulan', 'H')->where('jumlah', '<', ($hari))->latest('id')->first();
            $jumlahTanggal = $tanggal->jumlah;
        }

        $tanggal = $hari - $jumlahTanggal;
        return [
            'AW' => $tanggal,
            'AH' => $AH,
            'AM' => $AM,
            'tanggal' => $tanggal,
            'bulan' => $namaBulan,
            'tahun' => $tahunHijri,
            'hari' => cariHari($tanggals)['Hari'],
            'pasaran' => cariHari($tanggals)['Pasaran'],
        ];
    }
}

if (!function_exists('conversiHijriMiladi')) {

    function conversiHijriMiladi($tanggal, $mabda , $hari, $bulan, $tahun)
    {   
        if(!is_null($hari) && !is_null($bulan) && !is_null($tahun)){
            $day = $hari;
            $month = $bulan;
            $year = $tahun;
        }else{
            $day = $tanggal->day;
            $month = $tanggal->month;
            $year = $tanggal->year;
        }

        $AW = $mabda;
        $AHa = (int)(11 * ($year/30));
        $AHb = (int)(354 * $year);
        $AHc = $month * 30;
        $AHd = (int)(($month - 1) / 2);
        $AH = $AHa + $AHb + $AHc - $AHd + $day - 384;
        $AM = $AH + $AW;
        $AMa = (int)($AM / 1461);
        // Tahun Miladi
        $AMb = $AMa * 4;
        $AMc = $AMa * 1461;
        // Jumlah Hari
        $AMd = $AM - $AMc;
        $AMe = (int)($AMd / 365); 
        $AMf = $AMe * 365;
        // Sisa Hari 
        $AMg = $AMd - $AMf;
        // Jumlah Tahun
        $y = $AMb + $AMe + 1;
        if($y <= 1582 && $AMg < 288){
            $B = 0;
        }else{
            $A = (int)($y / 100);
            $AB = (int)($A / 4); 
            $B = 2 - $A + $AB;
        }
        // Jumlah Hari
        $AMh = $AMg - $B;
        if(kabisatBasithoh($y) == "basithoh"){
            $bulan = Bulan::where('jenis_tahun', 0)->where('jenis_bulan', 'M')->where('jumlah', '>', ($AMh))->first();
            $namaBulan = $bulan->nama;
            $tanggal = Bulan::where('jenis_tahun', 0)->where('jenis_bulan', 'M')->where('jumlah', '<', ($AMh))->latest('id')->first();
            $jumlahTanggal = $tanggal->jumlah;
        }else{
            $bulan = Bulan::where('jenis_tahun', 1)->where('jenis_bulan', 'M')->where('jumlah', '>', ($AMh))->first();
            $namaBulan = $bulan->nama;
            $tanggal = Bulan::where('jenis_tahun', 1)->where('jenis_bulan', 'M')->where('jumlah', '<', ($AMh))->latest('id')->first();
            $jumlahTanggal = $tanggal->jumlah;
        }

        $tanggal = $AMh - $jumlahTanggal;
        $date = \Carbon\Carbon::create($y . "-" . $bulan->nomor . "-" . $tanggal) ;

        return [
            'AW' => $AW,
            'AH' => $AH,
            'AM' => $AM,
            'tanggal' => $tanggal,
            'bulan' => $namaBulan,
            'tahun' => $y,
            'hari' => cariHari($date)['Hari'],
            'pasaran' => cariHari($date)['Pasaran'],
        ];
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

        if($hariIni < '1582-10-15'){
            $B = 0;
        }else{
            $B = 2 - (int)($year / 100) + (int)((int)($year / 100) / 4);
        }
        $AM = (int)(365.25 * $year) + (int)(30.6001 * ($month + 1)) + $day + $B - 428;
        $Hr = $AM - (int)($AM / 7) * 7;
        $Psr = $AM - (int)($AM / 5) * 5;

        $hari = Hari::where('jenis', 7)->where('nilai', $Hr)->first()->nama;
        $pasaran = Hari::where('jenis', 5)->where('nilai', $Psr)->first()->nama;
        
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

if (!function_exists('hariHijri')) {

    function hariHijri($hariIni)
    {   
        $day = $hariIni->day;
        $month = $hariIni->month;
        $year = $hariIni->year;

        // if($month < 3){
        //     $month += 12;
        //     $year -= 1;
        // }
        // if($day < 15 && $month <= 10 && $year <= 1582){
        //     $B = 0;
        // }else{
        //     $B = 2 - (int)($year / 100) + (int)((int)($year / 100) / 4);
        // }
        $AH = (int)((11 * $year) / 30) + (int)(354 * $year) + (int)($month * 30) - (int)(($month - 1) / 2) + $day - 384;
        $Hr = $AH - (int)($AH / 7) * 7;
        $Psr = $AH - (int)($AH / 5) * 5;
        
        $Hr == 0 ? $Hr = 6 : $Hr-= 1;
        $Psr == 4 ? $Psr = 0 : $Psr += 1;
    
        $hari = Hari::where('jenis', 7)->where('nilai', $Hr)->first()->nama;
        $pasaran = Hari::where('jenis', 5)->where('nilai', $Psr)->first()->nama;

        return [
            'AH' => $AH,
            'Hari' => $hari,
            'Pasaran' => $pasaran
        ];
    }
}

if (!function_exists('kabisatBasithohHijri')) {

    function kabisatBasithohHijri($y)
    {   
        $a = ($y / 30) - (int)($y / 30);
        $hasil = round($a * 30);
        if ($hasil == 2 || $hasil == 5 || $hasil == 7 || $hasil == 10 || $hasil == 13 || $hasil == 16 || $hasil == 18 || $hasil == 21 || $hasil == 24 || $hasil == 26 || $hasil == 29){
            $jenis = "kabisat";
        }else{
            $jenis = "basithoh";
        }

        return $jenis;
    }
}

if (!function_exists('kabisatBasithoh')) {

    function kabisatBasithoh($y)
    {   
        $length = strlen($y);
        $abad = substr($y, ($length - 2));
        if ($abad == 00){
            if($y % 400 == 0){
                $jenis = "kabisat";
            }else{
                $jenis = "basithoh";
            }
        }elseif($y % 4 == 0){
            $jenis = "kabisat";
        }else{
            $jenis = "basithoh";
        }

        return $jenis;
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
            'UTC' => $WD,
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
        // $A = (int)($date->year / 100);
        
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
        // semi diameter matahari irsyadul murid - harus di uji
        $sd = 0.267 / (1 - 0.017 * cosDegree($KS));
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
            'W' => $W,
            'sd' => $sd
        ];
    }
}