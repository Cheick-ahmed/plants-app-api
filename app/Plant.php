<?php

namespace App;


use App\Filters\Plant\PlantFilters;
use App\Http\Resources\ImageResource;
use App\Http\Resources\PlantResource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

class Plant extends Model
{
    use Searchable;

    protected $fillable = [
        'n_vernaculaire', 'ng_latin', 'ne_latin', 'is_toxic', 'user_id', 'family', 'slug'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->belongsToMany(Image::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function (Plant $plant) {
            $plant->slug = Str::slug($plant->n_vernaculaire);
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function toSearchableArray()
    {
        return array(new PlantResource($this));
    }

    public function scopeFilter(Builder $builder, Request $request, array $filters = [])
    {
        return (new PlantFilters($request))->add($filters)->filter($builder);
    }


}
