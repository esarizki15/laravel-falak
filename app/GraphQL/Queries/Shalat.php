<?php

namespace App\GraphQL\Queries;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use App\Bulan;
class Shalat
{
    /**
     * Return a value for the field.
     *
     * @param  null  $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param  mixed[]  $args The arguments that were passed into the field.
     * @param  \Nuwave\Lighthouse\Support\Contracts\GraphQLContext  $context Arbitrary data that is shared between all fields of a single query.
     * @param  \GraphQL\Type\Definition\ResolveInfo  $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     * @return mixed
     */
    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {

        return [
            'dzuhur' => [
                'WIS' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'], $args['sd'])['Dzuhur']['WIS'],
                'LMT' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'], $args['sd'])['Dzuhur']['LMT'],
                'WD' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'], $args['sd'])['Dzuhur']['WD'],
            ],
            'ashar' => [
                'B' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'], $args['sd'])['Ashar']['B'],
                'H' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'], $args['sd'])['Ashar']['H'],
                'F' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'], $args['sd'])['Ashar']['F'],
                'G' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'], $args['sd'])['Ashar']['G'],
                'Ashar' => [
                    'WIS' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'], $args['sd'])['Ashar']['WIS'],
                    'LMT' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'], $args['sd'])['Ashar']['LMT'],
                    'WD' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'], $args['sd'])['Ashar']['WD']
                ],
            ],
            'maghrib' => [
                'Dip' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'], $args['sd'])['Maghrib']['Dip'],
                'h' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'], $args['sd'])['Maghrib']['h'],
                'Maghrib' => [
                    'WIS' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'], $args['sd'])['Maghrib']['WIS'],
                    'LMT' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'], $args['sd'])['Maghrib']['LMT'],
                    'WD' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'], $args['sd'])['Maghrib']['WD']
                ],
            ],
            'isya' => [
                'WIS' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'], $args['sd'])['Isya']['WIS'],
                'LMT' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'], $args['sd'])['Isya']['LMT'],
                'WD' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'], $args['sd'])['Isya']['WD'],
            ],
            'shubuh' => [
                'WIS' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'], $args['sd'])['Subuh']['WIS'],
                'LMT' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'], $args['sd'])['Subuh']['LMT'],
                'WD' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'], $args['sd'])['Subuh']['WD'],
            ],
            'imsak' => [
                'WIS' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'], $args['sd'])['Imsak']['WIS'],
                'LMT' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'], $args['sd'])['Imsak']['LMT'],
                'WD' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'], $args['sd'])['Imsak']['WD'],
            ],
            'terbit' => [
                'h' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'], $args['sd'])['Terbit']['h'],
                'Terbit' => [
                    'WIS' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'], $args['sd'])['Terbit']['WIS'],
                    'LMT' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'], $args['sd'])['Terbit']['LMT'],
                    'WD' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'], $args['sd'])['Terbit']['WD'],
                ]
            ],
            'dhuha' => [
                'WIS' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'], $args['sd'])['Dhuha']['WIS'],
                'LMT' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'], $args['sd'])['Dhuha']['LMT'],
                'WD' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'], $args['sd'])['Dhuha']['WD'],
            ],
        ];
    }

    public function jadwalShalat($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo){
        $kabisatBasithoh = kabisatBasithoh($args['tanggalAwal']->year);
        if ($kabisatBasithoh == 'kabisat'){
            $jenisTahun = 1;
        }else{
            $jenisTahun = 0;
        }
        $tglAwal = $args['tanggalAwal']->day;
        $bulanAwal = $args['tanggalAwal']->month;
        $tahunAwal = $args['tanggalAwal']->year;
        
        $tglAkhir = $args['tanggalAkhir']->day;
        $bulanAkhir = $args['tanggalAkhir']->month;
        $tahunAkhir = $args['tanggalAkhir']->year;

        $hari = 0;

        if(($bulanAkhir - $bulanAwal) > 0){
            for($i = $bulanAwal; $i < $bulanAkhir; $i++){
                $hari += Bulan::where('jenis_tahun', $jenisTahun)->where('jenis_bulan', 'M')->where('nomor', $i)->first()->nilai;
            }
            $hari += $tglAkhir + 1;
            $hari -= $tglAwal;
        }else{
            $hari = $tglAkhir + 1 - $tglAwal;
        }
        $waktu = [];
        for($a = 0; $a < $hari; $a++){
            $tanggal = \Carbon\Carbon::create($args['tanggalAwal']->toDateTimeString())->add($a, 'day');
            $waktus = [
                'dzuhur' => [
                    'WIS' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $tanggal, $args['TZ'],$args['TT'], $args['sd'])['Dzuhur']['WIS'],
                    'LMT' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $tanggal, $args['TZ'],$args['TT'], $args['sd'])['Dzuhur']['LMT'],
                    'WD' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $tanggal, $args['TZ'],$args['TT'], $args['sd'])['Dzuhur']['WD'],
                    // 'WD' => $tanggal,
                ],
                'ashar' => [
                    'B' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $tanggal, $args['TZ'],$args['TT'], $args['sd'])['Ashar']['B'],
                    'H' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $tanggal, $args['TZ'],$args['TT'], $args['sd'])['Ashar']['H'],
                    'F' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $tanggal, $args['TZ'],$args['TT'], $args['sd'])['Ashar']['F'],
                    'G' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $tanggal, $args['TZ'],$args['TT'], $args['sd'])['Ashar']['G'],
                    'Ashar' => [
                        'WIS' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $tanggal, $args['TZ'],$args['TT'], $args['sd'])['Ashar']['WIS'],
                        'LMT' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $tanggal, $args['TZ'],$args['TT'], $args['sd'])['Ashar']['LMT'],
                        'WD' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $tanggal, $args['TZ'],$args['TT'], $args['sd'])['Ashar']['WD']
                    ],
                ],
                'maghrib' => [
                    'Dip' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $tanggal, $args['TZ'],$args['TT'], $args['sd'])['Maghrib']['Dip'],
                    'h' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $tanggal, $args['TZ'],$args['TT'], $args['sd'])['Maghrib']['h'],
                    'Maghrib' => [
                        'WIS' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $tanggal, $args['TZ'],$args['TT'], $args['sd'])['Maghrib']['WIS'],
                        'LMT' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $tanggal, $args['TZ'],$args['TT'], $args['sd'])['Maghrib']['LMT'],
                        'WD' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $tanggal, $args['TZ'],$args['TT'], $args['sd'])['Maghrib']['WD']
                    ],
                ],
                'isya' => [
                    'WIS' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $tanggal, $args['TZ'],$args['TT'], $args['sd'])['Isya']['WIS'],
                    'LMT' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $tanggal, $args['TZ'],$args['TT'], $args['sd'])['Isya']['LMT'],
                    'WD' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $tanggal, $args['TZ'],$args['TT'], $args['sd'])['Isya']['WD'],
                ],
                'shubuh' => [
                    'WIS' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $tanggal,$args['TZ'],$args['TT'], $args['sd'])['Subuh']['WIS'],
                    'LMT' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $tanggal,$args['TZ'],$args['TT'], $args['sd'])['Subuh']['LMT'],
                    'WD' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $tanggal,$args['TZ'],$args['TT'], $args['sd'])['Subuh']['WD'],
                ],
                'imsak' => [
                    'WIS' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $tanggal, $args['TZ'],$args['TT'], $args['sd'])['Imsak']['WIS'],
                    'LMT' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $tanggal, $args['TZ'],$args['TT'], $args['sd'])['Imsak']['LMT'],
                    'WD' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $tanggal, $args['TZ'],$args['TT'], $args['sd'])['Imsak']['WD'],
                ],
                'terbit' => [
                    'h' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $tanggal, $args['TZ'],$args['TT'], $args['sd'])['Terbit']['h'],
                    'Terbit' => [
                        'WIS' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $tanggal, $args['TZ'],$args['TT'], $args['sd'])['Terbit']['WIS'],
                        'LMT' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $tanggal, $args['TZ'],$args['TT'], $args['sd'])['Terbit']['LMT'],
                        'WD' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $tanggal, $args['TZ'],$args['TT'], $args['sd'])['Terbit']['WD'],
                    ]
                ],
                'dhuha' => [
                    'WIS' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $tanggal, $args['TZ'],$args['TT'], $args['sd'])['Dhuha']['WIS'],
                    'LMT' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $tanggal, $args['TZ'],$args['TT'], $args['sd'])['Dhuha']['LMT'],
                    'WD' => shalat($args['BT'], $args['LT'], $args['e'], $args['d'], $tanggal, $args['TZ'],$args['TT'], $args['sd'])['Dhuha']['WD'],
                ], 
            ];
            array_push($waktu, $waktus);
        }
        return $waktu;
    }
}
