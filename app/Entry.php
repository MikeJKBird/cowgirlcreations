<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable = [
        'name', 'price', 'event_id', 'enrollment_id'
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
     * Enrollment that has entry
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }
}
