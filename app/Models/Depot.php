<?php

namespace App\Models;

class Depot extends Base
{
    public $fillable = [
        'name',
        'location_id',
        'number_of_cage',
        'number_of_pallet',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
