<?php

namespace App\GraphQL\Queries;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class Hari
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
        $data = [];
        if(!is_null($args['batasAwal']) && !is_null($args['batasAkhir'])){
            $start = $args['batasAwal'];
            $end = $args['batasAkhir'];
            $period = \Carbon\CarbonPeriod::create($start, $end);
            $dates = $period->toArray();
            for($a = 0; $a < count($dates); $a++){
                array_push($data, [
                    'B' => cariHari($dates[$a])['B'],
                    'AM' => cariHari($dates[$a])['AM'],
                    'Hari' => cariHari($dates[$a])['Hari'],
                    'Pasaran' => cariHari($dates[$a])['Pasaran']
                ]);
            }
        }
        if(!is_null($args['tanggal'])){
            for($b = 0; $b < count($args['tanggal']); $b++){
                array_push($data,[
                    'B' => cariHari($args['tanggal'][$b])['B'],
                    'AM' => cariHari($args['tanggal'][$b])['AM'],
                    'Hari' => cariHari($args['tanggal'][$b])['Hari'],
                    'Pasaran' => cariHari($args['tanggal'][$b])['Pasaran']
                ]);
            }        
        }
        if(is_null($args['tanggal']) && is_null($args['batasAwal']) && is_null($args['batasAkhir'])){
            $tanggal = \Carbon\Carbon::now();
            array_push($data,[
                'B' => cariHari($tanggal)['B'],
                'AM' => cariHari($tanggal)['AM'],
                'Hari' => cariHari($tanggal)['Hari'],
                'Pasaran' => cariHari($tanggal)['Pasaran']
            ]);
        }
        return $data;
    }

    public function hariHijri($rootValue, array $args){
        $tanggal = $args['tanggal'];
        return [
            'AH' => hariHijri($tanggal)['AH'],
            'Hari' => hariHijri($tanggal)['Hari'],
            'Pasaran' => hariHijri($tanggal)['Pasaran']
        ];
    }

    public function hijriMiladi($rootValue, array $args){
        return [
            'AW' => conversiHijriMiladi($args['tanggal'], $args['mabdaHijri'], $args['hari'], $args['bulan'], $args['tahun'])['AW'],
            'AH' => conversiHijriMiladi($args['tanggal'], $args['mabdaHijri'], $args['hari'], $args['bulan'], $args['tahun'])['AH'],
            'AM' => conversiHijriMiladi($args['tanggal'], $args['mabdaHijri'], $args['hari'], $args['bulan'], $args['tahun'])['AM'],
            'tanggal' => conversiHijriMiladi($args['tanggal'], $args['mabdaHijri'], $args['hari'], $args['bulan'], $args['tahun'])['tanggal'],
            'bulan' => conversiHijriMiladi($args['tanggal'], $args['mabdaHijri'], $args['hari'], $args['bulan'], $args['tahun'])['bulan'],
            'tahun' => conversiHijriMiladi($args['tanggal'], $args['mabdaHijri'], $args['hari'], $args['bulan'], $args['tahun'])['tahun'],
            'hari' => conversiHijriMiladi($args['tanggal'], $args['mabdaHijri'], $args['hari'], $args['bulan'], $args['tahun'])['hari'],
            'pasaran' => conversiHijriMiladi($args['tanggal'], $args['mabdaHijri'], $args['hari'], $args['bulan'], $args['tahun'])['pasaran'],
        ];
    }

    public function miladiHijri($rootValue, array $args){
        return [
            'AW' => conversiMiladiHijri($args['tanggal'], $args['mabdaHijri'], $args['hari'], $args['bulan'], $args['tahun'])['AW'],
            'AH' => conversiMiladiHijri($args['tanggal'], $args['mabdaHijri'], $args['hari'], $args['bulan'], $args['tahun'])['AH'],
            'AM' => conversiMiladiHijri($args['tanggal'], $args['mabdaHijri'], $args['hari'], $args['bulan'], $args['tahun'])['AM'],
            'tanggal' => conversiMiladiHijri($args['tanggal'], $args['mabdaHijri'], $args['hari'], $args['bulan'], $args['tahun'])['tanggal'],
            'bulan' => conversiMiladiHijri($args['tanggal'], $args['mabdaHijri'], $args['hari'], $args['bulan'], $args['tahun'])['bulan'],
            'tahun' => conversiMiladiHijri($args['tanggal'], $args['mabdaHijri'], $args['hari'], $args['bulan'], $args['tahun'])['tahun'],
            'hari' => conversiMiladiHijri($args['tanggal'], $args['mabdaHijri'], $args['hari'], $args['bulan'], $args['tahun'])['hari'],
            'pasaran' => conversiMiladiHijri($args['tanggal'], $args['mabdaHijri'], $args['hari'], $args['bulan'], $args['tahun'])['pasaran'],
        ];
    }
}
