<?php

namespace App;

use App\Http\Resources\PlantResource;
use Illuminate\Database\Eloquent\Model;
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
        return array(new  PlantResource($this));
    }
}
