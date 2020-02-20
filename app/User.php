<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'is_confirmed'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function is_confirmed()
    {
        return $this->is_confirmed == 0 ? false : true;
    }

    public function scopeConfirmed(Builder $builder)
    {
        $builder->where('is_confirmed', true);
    }

    public function scopeNotConfirmed(Builder $builder)
    {
        $builder->where('is_confirmed', true);
    }

    public function getRouteKeyName()
    {
        return 'last_name';
    }

    public function plants()
    {
        return $this->hasMany(Plant::class);
    }
}
