<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cosanction extends Model
{
    protected $fillable = [
        'cosanction_name', 'cosanction_price'
    ];


    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
}
