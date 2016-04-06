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
        'arenafee', 'campingfee', 'stallfee', 'divisions', 'bbq', 'date', 'multiplier',
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
}
