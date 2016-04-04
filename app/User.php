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
        'name', 'email', 'password', 'points', 'memberNumber', 'isadmin'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Horses that belong to the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function horses()
    {
        return $this->hasMany(Horse::class);
    }

    /**
     * Enrollments that the user has
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function enrollment()
    {
        return $this->hasMany(Enrollment::class);
    }
}
