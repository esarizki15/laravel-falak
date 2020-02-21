<?php

namespace App\GraphQL\Queries;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class Qiblat
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
        if(is_null($args['tanggal']) && is_null($args['e']) && is_null($args['d'])){
            $e = jeanMeus(\Carbon\Carbon::now())['W'];
            $d = jeanMeus(\Carbon\Carbon::now())['Dek'];
        }elseif(!is_null($args['tanggal']) && is_null($args['e']) && is_null($args['d'])){
            $e = jeanMeus($args['tanggal'])['W'];
            $d = jeanMeus($args['tanggal'])['Dek'];
        }elseif(!is_null($args['tanggal']) && !is_null($args['e']) && is_null($args['d'])){
            $e = $args['e'];
            $d = jeanMeus($args['tanggal'])['Dek'];
        }elseif(!is_null($args['tanggal']) && is_null($args['e']) && !is_null($args['d'])){
            $e = jeanMeus($args['tanggal'])['W'];
            $d = $args['d'];
        }elseif(is_null($args['tanggal']) && !is_null($args['e']) && !is_null($args['d'])){
            $e = $args['e'];
            $d = $args['d'];
        }elseif(!is_null($args['tanggal']) && !is_null($args['e']) && !is_null($args['d'])){
            $e = $args['e'];
            $d = $args['d'];
        }
        // Arah Qiblat
        $A = angle(360 - $args['BK'] + $args['BT']);
        $h = angle(asinDegree(sinDegree($args['LT']) * sinDegree($args['LK']) + cosDegree($args['LT']) * cosDegree($args['LK']) * cosDegree($A)));
        $AZ = angle(acosDegree((sinDegree($args['LK']) - sinDegree($args['LT']) * sinDegree($h)) / cosDegree($args['LT']) / cosDegree($h) ));
        $A > 180 ? $AQ = $AZ : $AQ = 360 - $AZ;

        // Roshdul QIblat
        $B = angle(90 - $args['LT']);
        $P = angle(atanDegree(1/(cosDegree($B) * tanDegree($AQ)))); 
        $Ca = angle(acosDegree(tanDegree($d) * tanDegree($B) * cosDegree($P)));
        $WIS1 = angle(-($P - $Ca) / 15 + 12);
        $LMT1 = angle($WIS1 - $e);
        $WD1 = angle($LMT1 + (($args['TZ'] * 15) - $args['BT']) / 15);

        $WIS2 = angle(-($P + $Ca) / 15 + 12);
        $LMT2 = angle($WIS2 - $e);
        $WD2 = angle($LMT2 + (($args['TZ'] * 15) - $args['BT']) / 15);

        // Jarak
        $E = angle($args['BT'] - $args['BK']);
        $M1 = angle(acosDegree(sinDegree($args['LT']) * sinDegree($args['LK']) + cosDegree($args['LT']) * cosDegree($args['LK']) * cosDegree($E)));
        $KM1 = ($M1 / 360) * 6.283185307 * 6378.388;

        if($AQ > 90 && $AQ < 180){
            $JAQ = angle($AQ - 90);
        }elseif ($AQ > 180 && $AQ < 270) {
            $JAQ = angle($AQ - 180);
        }elseif ($AQ > 270 && $AQ < 360) {
            $JAQ = angle($AQ - 270);
        }else{
            $JAQ = $AQ;
        }

        $C = angle(90 - $args['LK']);
        $M2 = angle(asinDegree(sinDegree($C) * sinDegree(abs($E)) / cosDegree($JAQ)));
        $KM2 = $M2 * 111.319;
        
        return [
            'e' => formatDMS($e),
            'd' => formatDMS($d),
            'A'=> formatDMS($A),
            'h'=> formatDMS($h),
            'AZ' => formatDMS($AZ),
            'AQ' => formatDMS($AQ) . " dari arah utara searah jarum jam",
            'RQ' => [
                'B' => formatDMS($B),
                'P' => formatDMS($P),
                'Ca' => formatDMS($Ca),
                'BQ1' => [
                    'WIS'=> formatJam($WIS1, "WIS"),
                    'LMT'=> formatJam($LMT1, "LMT"),
                    'WD' => formatJam($WD1, "WD"),
                ],
                'BQ2' => [
                    'WIS'=> formatJam($WIS2, "WIS"),
                    'LMT'=> formatJam($LMT2, "LMT"),
                    'WD' => formatJam($WD2, "WD"),
                ]
            ],
            'Jarak' => [
                'cara1' => [
                    'E' => formatDMS($E),
                    'M' => formatDMS($M1),
                    'KM' => $KM1 . " KM"
                ],
                'cara2' => [
                    'AQ' => formatDMS($JAQ),
                    'C' => formatDMS($C),
                    'E' => formatDMS(abs($E)),
                    'M' => formatDMS($M2),
                    'KM' => $KM2 . " KM"
                ]
            ]
        ];
    }
   
}
