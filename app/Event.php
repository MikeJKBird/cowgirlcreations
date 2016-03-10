<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name', 'maxNumberParticipants', 'location',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
