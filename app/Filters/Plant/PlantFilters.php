<?php


namespace App\Filters\Plant;


use App\Filters\FiltersAbstract;

class PlantFilters extends FiltersAbstract
{
    protected $filters = [
        'toxicity' => ToxicFilter::class
    ];

    public static function mappings() {
        $map = [
            'toxicity' => [
                'true' => 'is_toxic',
                'false' => 'not_toxic'
            ]
        ];

        return $map;
    }
}
