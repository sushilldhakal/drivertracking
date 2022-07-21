<?php

namespace App\Models;

class Log extends Base
{
    public $fillable = [
        'type',
        'load_type',
        'location_id',
        'cage',
        'pallet',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
