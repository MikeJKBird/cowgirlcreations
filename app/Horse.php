<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horse extends Model
{
    protected $fillable = [
        'name', 'user_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
