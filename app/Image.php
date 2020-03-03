<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'name', 'path', 'hash_name'
    ];

    public function plants()
    {
        return $this->belongsToMany(Plant::class);
    }
}
