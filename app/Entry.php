<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable = [
        'entry_name', 'price', 'event_id'
    ];

    /**
     * Event that entry is for
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Enrollments for the entry
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
