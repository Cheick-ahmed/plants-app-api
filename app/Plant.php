<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Plant extends Model
{
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
}
