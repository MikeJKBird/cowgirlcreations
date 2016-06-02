<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cSponsor extends Model
{
    protected $fillable = [
        'name', 'website', 'value', 'logo'
    ];
}
