<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{

    protected $fillable = [
        'user_id', 'event_id', 'horse_id', 'entry_id', 'camping', 'stall', 'bbqtickets', 'carryover', 'cosanction', 'totalprice'
    ];

    /**
     * User who is enrolled
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Event that the enrollment is for
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function events()
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Entry for the given enrollment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entries()
    {
        return $this->belongsTo(Entry::class);
    }


}
