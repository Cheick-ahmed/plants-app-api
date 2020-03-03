<?php


namespace App\Filters\Plant;


use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

class ToxicFilter extends FilterAbstract
{
    public function filter(Builder $builder, $value)
    {
        if ($value == null) {
            return $builder;
        }

        return $builder->where('is_toxic', $value);
    }
}
