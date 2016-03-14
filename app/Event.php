<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name', 'maxNumberParticipants', 'location',
    ];

    protected $dates = ['created_at', 'updated_at', 'occuring_on'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
