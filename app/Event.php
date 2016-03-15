<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name', 'maxNumberParticipants', 'location', 'date'
    ];

    protected $dates = ['created_at', 'updated_at', 'date'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
