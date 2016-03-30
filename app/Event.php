<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Event
 *
 * Mike Bird <mike.bird@outlook.com>
 **/
class Event extends Model
{
    protected $fillable = [
        'name', 'location', 'cosanction', 'deadline', 'producer',
        'notes', 'dresscode', 'option', 'timeonly', 'latefee',
        'arenafee', 'campingfee', 'stallfee', 'divisions', 'bbq', 'date', 'multiplier'
    ];


    protected $dates = ['created_at', 'updated_at', 'date'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
