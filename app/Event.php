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
        'name', 'location', 'deadline', 'producer', 'cosanction_id',
        'notes', 'dresscode', 'option', 'timeonly', 'latefee',
        'arenafee', 'campingfee', 'stallfee', 'bbq', 'date', 'multiplier',
        'resultspath', 'uploadedresults'
    ];


    protected $dates = ['created_at', 'updated_at', 'date'];

    /**
     * Enrollments for the event
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function enrollment()
    {
        return $this->hasMany(Enrollment::class);
    }

    /**
     * Entries for the event
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entries()
    {
        return $this->hasMany(Entry::class);
    }

    /**
     * Cosanctions for the event
     */
    public function cosanction()
    {
        return $this->belongsToMany(Cosanction::class);
    }

}
