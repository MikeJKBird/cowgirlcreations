<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
/**
 * Class User
 *
 * Mike Bird <mike.bird@outlook.com>
 **/
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'points', 'memberNumber'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function events()
    {
        return $this->belongsToMany(Event::class)->withTimestamps();
    }

    public function horses()
    {
        return $this->hasMany(Horse::class);
    }
}
