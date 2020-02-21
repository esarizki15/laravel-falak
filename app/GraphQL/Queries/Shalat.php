<?php

namespace App\GraphQL\Queries;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

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
        // Ashar
        $B = $args['LT'] - $args['d'];
        $H = atanDegree(1 / ((tanDegree($B) + 1)));
        $F = -tanDegree($args['LT']) * tanDegree($args['d']);
        $G = cosDegree($args['LT']) * cosDegree($args['d']);
        $As = 12 + acosDegree($F + sinDegree($H) / $G) / 15;

        // Maghrib
        // $Dip = (1.76/60) * sqrt($args['TT']);
        // $h = -($sd + (34.5 / 60) + $Dip) - 0.0024;

        // Isya
        $isya = 12 + acosDegree($F + sinDegree(-18) / $G) / 15;

        // Shubuh
        $subuh = 12 - acosDegree($F + sinDegree(-20) / $G) / 15;

        // Terbit
        // $terbit = 12 - acosDegree($F + sinDegree($h) / $G) / 15;

        // Dhuha dan I'ed
        $dhuha = 12 - acosDegree($F + sinDegree(4.5) / $G) / 15;

        return [
            'dzuhur' => [
                'WIS' => pecahJam(12, $args['e'], $args['TZ'], $args['BT'])['WIS'],
                'LMT' => pecahJam(12, $args['e'], $args['TZ'], $args['BT'])['LMT'],
                'WD' => pecahJam(12, $args['e'], $args['TZ'], $args['BT'])['WD'],
            ],
            'ashar' => [
                'B' => formatDMS(abs($B)),
                'H' => formatDMS($H),
                'F' => formatDMS($F),
                'G' => formatDMS($G),
                'As' => [
                    'WIS' => pecahJam($As, $args['e'], $args['TZ'], $args['BT'])['WIS'],
                    'LMT' => pecahJam($As, $args['e'], $args['TZ'], $args['BT'])['LMT'],
                    'WD' => pecahJam($As, $args['e'], $args['TZ'], $args['BT'])['WD'],
                ]
            ],
            'maghrib' => formatDMS($args['TZ']),
            'isya' => [
                'WIS' => pecahJam($isya, $args['e'], $args['TZ'], $args['BT'])['WIS'],
                'LMT' => pecahJam($isya, $args['e'], $args['TZ'], $args['BT'])['LMT'],
                'WD' => pecahJam($isya, $args['e'], $args['TZ'], $args['BT'])['WD'],
            ],
            'shubuh' => [
                'WIS' => pecahJam($subuh, $args['e'], $args['TZ'], $args['BT'])['WIS'],
                'LMT' => pecahJam($subuh, $args['e'], $args['TZ'], $args['BT'])['LMT'],
                'WD' => pecahJam($subuh, $args['e'], $args['TZ'], $args['BT'])['WD'],
            ],
            'imsak' => [
                'WIS' => formatImsak($subuh, "WIS"),
                'LMT' => desimalJam($subuh, $args['e'], $args['TZ'], $args['BT'])['LMT'],
                'WD' => desimalJam($subuh, $args['e'], $args['TZ'], $args['BT'])['WD'],
            ],
            'terbit' => [

            ],
            'dhuha' => [
                'WIS' => pecahJam($dhuha, $args['e'], $args['TZ'], $args['BT'])['WIS'],
                'LMT' => pecahJam($dhuha, $args['e'], $args['TZ'], $args['BT'])['LMT'],
                'WD' => pecahJam($dhuha, $args['e'], $args['TZ'], $args['BT'])['WD'],
            ],
        ];
    }
}
