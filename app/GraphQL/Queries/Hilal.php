<?php

namespace App\GraphQL\Queries;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class Hilal
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
            "Aa" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['Aa'],
            "A" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['A'],
            "B" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['B'],
            "JDa" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['JDa'],
            "JDb" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['JDb'],
            "JDc" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['JDc'],
            "JD" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['JD'],
            "T" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['T'],
            "S" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['S'],
            "m" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['m'],
            "N" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['N'],
            "K1" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['K1'],
            "K2" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['K2'],
            "R1" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['R1'],
            "R2" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['R2'],
            "Q1" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['Q1'],
            "E" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['E'],
            "S1" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['S1'],
            "d" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['d'],
            "PT" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['PT'],
            "e" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['e'],
            "sd" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['sd'],
            "Dip" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['Dip'],
            "h" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['h'],
            "t" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['t'],
            "Grb" => [
                'LMT' => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['Grb']['LMT'],
                'WD' => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['Grb']['WD']
            ],
            "Az" => [
                'Barat' =>hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['Az']['Barat'],
                'Utara' =>hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['Az']['Utara'],
            ],
            "Ra" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['Ra'],
            "R" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['R'],
            "M" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['M'],
            "AHilal" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['A'],
            "F" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['F'],
            "D" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['D'],
            "T1" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['T1'],
            "T2" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['T2'],
            "T3" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['T3'],
            "T4" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['T4'],
            "T5" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['T5'],
            "T6" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['T6'],
            "T7" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['T7'],
            "T8" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['T8'],
            "T9" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['T9'],
            "T10" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['T10'],
            "T11" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['T11'],
            "T12" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['T12'],
            "T13" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['T13'],
            "T14" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['T14'],
            "C" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['C'],
            "Mo" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['Mo'],
            "A1" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['A1'],
            "L1" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['L1'],
            "x" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['x'],
            "y" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['y'],
            "dc" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['dc'],
            "PTc" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['PTc'],
            "tc" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['tc'],
            "hc" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['hc'],
            "p" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['p'],
            "p1" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['p1'],
            "HP" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['HP'],
            "sdc" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['sdc'],
            "P" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['P'],
            "Ref" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['Ref'],
            "hc1" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['hc1'],
            "Azc" => [
                'Barat' =>hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['Azc']['Barat'],
                'Utara' =>hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['Azc']['Utara'],
            ],
            "z" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['z'],
            "Dc" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['Dc'],
            "AL" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['AL'],
            "Cw" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['Cw'],
            "EL" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['EL'],
            "FIa" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['FIa'],
            "FI" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['FI'],
            "Ms" => hilal($args['BT'], $args['LT'], $args['e'], $args['d'], $args['tanggal'],$args['TZ'],$args['TT'])['Ms'],
            
        ];
    }
}
